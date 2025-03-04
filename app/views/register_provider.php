<?php
require_once '../../vendor/autoload.php';
require_once '../config/config.php';
require_once '../classes/db.class.php';

class RegisterProvider extends Database {
    public function __construct() {
        parent::__construct();
    }

    public function register($data) {
        $this->connect();

        try {
            // Start transaction
            mysqli_begin_transaction($this->db_conn);

            // Insert into providers table
            $stmt = mysqli_prepare($this->db_conn, 
                "INSERT INTO providers (name, email, username, password, category, description, 
                                     phone, website, location, address, city, state, 
                                     weekday_hours, saturday_hours, sunday_hours, 
                                     verified) 
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, FALSE)"
            );

            // Format business hours
            $weekday_hours = $data['weekday_open'] . '-' . $data['weekday_close'];
            $saturday_hours = $data['saturday_open'] . '-' . $data['saturday_close'];
            $sunday_hours = $data['sunday_open'] . '-' . $data['sunday_close'];

            // Format location
            $location = $data['latitude'] . ',' . $data['longitude'];

            // Hash password
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, 'ssssssssssssss',
                $data['name'],
                $data['email'],
                $data['email'], // Using email as username
                $hashed_password,
                $data['category'],
                $data['description'],
                $data['phone'],
                $data['website'],
                $location,
                $data['street'],
                $data['city'],
                $data['state'],
                $weekday_hours,
                $saturday_hours,
                $sunday_hours
            );

            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                mysqli_commit($this->db_conn);
                return [
                    'success' => true,
                    'message' => '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="bi bi-check-circle me-2"></i>
                                    Registration successful! Please wait for verification.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>'
                ];
            } else {
                throw new Exception("Failed to register provider");
            }

        } catch (Exception $e) {
            mysqli_rollback($this->db_conn);
            return [
                'success' => false,
                'message' => '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="bi bi-exclamation-circle me-2"></i>
                                Registration failed: ' . $e->getMessage() . '
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>'
            ];
        }
    }

    public function validateData($data) {
        $errors = [];

        // Validate required fields
        $required_fields = ['name', 'email', 'password', 'confirm_password', 
                          'business_name', 'category', 'phone', 'street', 
                          'city', 'state', 'latitude', 'longitude'];

        foreach ($required_fields as $field) {
            if (empty($data[$field])) {
                $errors[] = ucfirst($field) . ' is required';
            }
        }

        // Validate email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        // Validate password match
        if ($data['password'] !== $data['confirm_password']) {
            $errors[] = 'Passwords do not match';
        }

        // Validate phone number
        if (!preg_match('/^[0-9]{10}$/', preg_replace('/[^0-9]/', '', $data['phone']))) {
            $errors[] = 'Invalid phone number format';
        }

        return empty($errors) ? true : $errors;
    }
}

// Handle registration request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $register = new RegisterProvider();
    
    // Validate data
    $validation = $register->validateData($_POST);
    
    if ($validation === true) {
        $result = $register->register($_POST);
        echo $result['message'];
        if ($result['success']) {
            // Redirect after 2 seconds
            echo "<script>
                    setTimeout(function() {
                        window.location.href = '" . $_ENV['SITE_URL'] . "/provider/login.php';
                    }, 2000);
                  </script>";
        }
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>
                <ul class="mb-0">';
        foreach ($validation as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
}
?>
