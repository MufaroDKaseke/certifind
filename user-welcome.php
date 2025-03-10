<body class="welcome">
    <a href="#" class="btn__back" hx-get="./home.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 text-center">
                <div class="welcome-icon mb-4">
                    <i class="bi bi-person-fill text-white"></i>
                </div>
                <h2 class="text-white mb-4">Welcome User</h2>
                <p class="text-white opacity-75 mb-4">Find and connect with verified service providers in your area</p>
                
                <div class="d-grid gap-3">
                    <button hx-get="./user/login.php" 
                            hx-trigger="click" 
                            hx-target="body" 
                            hx-swap="outerHTML" 
                            class="btn btn-light rounded-pill py-3">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Login to Account
                    </button>
                    
                    <button hx-get="./user/signup.php" 
                            hx-trigger="click" 
                            hx-target="body" 
                            hx-swap="outerHTML" 
                            class="btn btn-outline-light rounded-pill py-3">
                        <i class="bi bi-person-plus-fill me-2"></i>
                        Create New Account
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
