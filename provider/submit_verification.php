<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/verification.class.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verification = new Verification($_SESSION['provider_id']);
    
    if ($verification->submitRequest($_FILES)) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                Verification request submitted successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
        
        // Trigger refresh of verification requests list
        echo '<script>
                htmx.trigger("#verification-requests", "refresh");
              </script>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-2"></i>
                Error submitting verification request. Please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              </div>';
    }
    exit;
}

header('Location: verification.php');
exit;
