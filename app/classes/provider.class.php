<?php

// Start Session
session_start(['cookie_lifetime' => 21600]);

class Provider extends Database {

  public function __construct() {
    if (isset($_POST['action']) && $_POST['action'] === 'login') {
      $this->login($_POST['email'], $_POST['password']);
    } else {
      if (!isset($_SESSION['user_status']) || !$_SESSION['user_status']) {
        $this->errorLogin('Not logged in');
      }
    }

    parent::__construct();
  }

  // Login
  public function login($username, $password) {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, 'SELECT * FROM providers WHERE username = ? OR email = ?');
    mysqli_stmt_bind_param($stmt, 'ss', $username, $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $provider = mysqli_fetch_assoc($result);

    if ($provider && $password === $provider['password']) {
      $_SESSION['user_status'] = true;
      $_SESSION['user_type'] = 'provider';
      $_SESSION['provider_id'] = $provider['provider_id'];
      $_SESSION['username'] = $provider['username'];
      $_SESSION['email'] = $provider['email'];
      $_SESSION['name'] = $provider['name'];
      $_SESSION['category'] = $provider['category'];
      $_SESSION['location'] = $provider['location'];
      $_SESSION['phone'] = $provider['phone'];
      $_SESSION['primary_email'] = $provider['primary_email'];
      $_SESSION['website'] = $provider['website'];
      $_SESSION['verified'] = $provider['verified'];
      $_SESSION['about'] = $provider['about'];
      $_SESSION['street'] = $provider['street'];
      $_SESSION['city'] = $provider['city'];
      $_SESSION['state'] = $provider['state'];
      $_SESSION['weekday_hours'] = $provider['weekday_hours'];
      $_SESSION['saturday_hours'] = $provider['saturday_hours'];
      $_SESSION['sunday_hours'] = $provider['sunday_hours'];

      // Redirect or perform other actions after successful login
    } else {
      // Handle login error
      $this->errorLogin('Password error');
    }
  }

  // Handle login error
  function errorLogin($code = 'Unknown') {
    header('Location: ' . $_ENV['SITE_URL'] . '?error=' . $code);
    exit;
  }

  // Logout
  function logout() {
    $_SESSION = array();
    session_unset();
    session_destroy();

    header('Location: ' . $_ENV['SITE_URL']);
    exit;
  }

  // Get user details
  public function getUserDetails() {
    $this->connect();

    $stmt = mysqli_prepare($this->db_conn, 'SELECT * FROM providers WHERE provider_id = ?');
    mysqli_stmt_bind_param($stmt, 's', $_SESSION['provider_id']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      return $user;
    } else {
      return false;
    }
  }
}