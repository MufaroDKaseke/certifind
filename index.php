<?php
require_once './vendor/autoload.php';
require_once './app/config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certifind - Welcome</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./assets/css/custom.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

  <style>
    .carousel-welcome {
      height: 100vh;
    }

    .carousel-item>.container-fluid {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .welcome-icon {
      width: 0px;
      height: 0px;
      font-size: 3rem;
      margin-bottom: 2.5rem;
      padding: 2.5rem;
      border-radius: 50%;
      background: rgb(255 255 255 / 10%);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
    }

    .carousel-indicators {
      bottom: 2rem;
    }
  </style>
</head>

<body class="welcome">
  <div id="welcomeCarousel" class="carousel slide carousel-welcome" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#welcomeCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#welcomeCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#welcomeCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
      <!-- Welcome Slide -->
      <div class="carousel-item active">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col text-center">
              <div class="welcome-icon">
                <i class="bi bi-binoculars text-white fs-1"></i>
              </div>
              <h1 class="text-white my-3 fw-bold">Welcome to Certifind</h1>
              <p class="text-white opacity-75 mb-4">Find and connect with certified professionals for your needs</p>
              <div class="mt-4">
                <i class="bi bi-arrow-right-circle text-white opacity-75 fs-3" data-bs-target="#welcomeCarousel" data-bs-slide="next"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Features Slide -->
      <div class="carousel-item">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col text-center">
              <h2 class="text-white mb-3 fw-bold">Find Trusted Professionals</h2>
              <p class="text-white opacity-75 mb-4">Our platform verifies all service providers</p>

              <div class="row mt-5 text-white">
                <div class="col-4 text-center">
                  <i class="bi bi-shield-check fs-2 mb-2"></i>
                  <p>Verified</p>
                </div>
                <div class="col-4 text-center">
                  <i class="bi bi-geo-alt fs-2 mb-2"></i>
                  <p>Local</p>
                </div>
                <div class="col-4 text-center">
                  <i class="bi bi-star fs-2 mb-2"></i>
                  <p>Rated</p>
                </div>
              </div>
              <div class="mt-4">
                <i class="bi bi-arrow-right-circle text-white opacity-75 fs-3" data-bs-target="#welcomeCarousel" data-bs-slide="next"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Get Started Slide -->
      <div class="carousel-item">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col text-center">
              <div class="welcome-icon">
                <i class="bi bi-rocket-takeoff text-white fs-1"></i>
              </div>
              <h2 class="text-white my-3 fw-bold">Ready to Begin?</h2>
              <p class="text-white opacity-75 mb-4">Join our community today</p>
              <button hx-get="./home.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="btn btn-light rounded-pill px-4 py-2 fw-bold">Get Started<i class="bi bi-arrow-right ms-2"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/htmx.org@2.0.4"></script>
</body>

</html>