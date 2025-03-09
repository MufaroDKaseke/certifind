<?php
require_once './vendor/autoload.php';
require_once './app/config/config.php';
?>

<body class="bg-primary">

  <section class="welcome">
    <div class="container animate__animated animate__zoomIn animate__fast">
      <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-10 text-center">
          <span class="welcome-icon mb-4">
            <i class="bi bi-binoculars text-white"></i>
          </span>
          <h1 class="text-white mb-3 fw-semibold">Welcome Back</h1>

          <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
              <?php
              switch ($_GET['error']) {
                case 'Not logged in':
                  echo 'Please log in to continue';
                  break;
                case 'Password error':
                  echo 'Invalid username or password';
                  break;
                default:
                  echo 'An error occurred. Please try again';
              }
              ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php } ?>

          <div class="mb-4">
            <button hx-get="./user/login.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML"
              class="btn btn-outline-primary w-100 bg-white rounded-pill mb-2">
              <i class="bi bi-person me-2"></i>Login as User
            </button>
            <button hx-get="./user/signup.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML"
              class="btn btn-secondary w-100 rounded-pill">
              <i class="bi bi-person-plus me-2"></i>Create User Account
            </button>
          </div>

          <div class="text-center mb-3">
            <div class="text-white opacity-75">Are you a business?</div>
          </div>

          <div class="d-grid gap-2">
            <button hx-get="./provider/login.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML"
              class="btn btn-outline-light rounded-pill">
              <i class="bi bi-building me-2"></i>Login as Provider
            </button>
            <button hx-get="./register.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML"
              class="btn btn-secondary rounded-pill">
              <i class="bi bi-building-add me-2"></i>Register Business
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

</body>