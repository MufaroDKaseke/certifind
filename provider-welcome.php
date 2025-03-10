<body class="welcome">
    <a href="#" class="btn__back" hx-get="./home.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
        <i class="bi bi-arrow-left"></i>
    </a>

    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 text-center">
                <div class="welcome-icon mb-4">
                    <i class="bi bi-building-fill text-white"></i>
                </div>
                <h2 class="text-white mb-4">Welcome Provider</h2>
                <p class="text-white opacity-75 mb-4">Showcase your services and connect with potential clients</p>
                
                <div class="d-grid gap-3">
                    <button hx-get="./provider/login.php" 
                            hx-trigger="click" 
                            hx-target="body" 
                            hx-swap="outerHTML" 
                            class="btn btn-light rounded-pill py-3">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        Login to Dashboard
                    </button>
                    
                    <button hx-get="./provider/signup.php" 
                            hx-trigger="click" 
                            hx-target="body" 
                            hx-swap="outerHTML" 
                            class="btn btn-outline-light rounded-pill py-3">
                        <i class="bi bi-building-add me-2"></i>
                        Register Business
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
