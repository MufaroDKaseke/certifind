<?php
require_once './vendor/autoload.php';
require_once './app/config/config.php';
?>

<body class="welcome">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 text-center">
                <div class="welcome-icon mb-4">
                    <i class="bi bi-people-fill text-white"></i>
                </div>
                <h2 class="text-white mb-4">Choose Account Type</h2>
                
                <div class="d-grid gap-3">
                    <button hx-get="./user-welcome.php" 
                            hx-trigger="click" 
                            hx-target="body" 
                            hx-swap="outerHTML" 
                            class="btn btn-light rounded-pill py-3">
                        <i class="bi bi-person-fill me-2"></i>
                        Continue as User
                    </button>
                    
                    <button hx-get="./provider-welcome.php" 
                            hx-trigger="click" 
                            hx-target="body" 
                            hx-swap="outerHTML" 
                            class="btn btn-outline-light rounded-pill py-3">
                        <i class="bi bi-building-fill me-2"></i>
                        Continue as Provider
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>