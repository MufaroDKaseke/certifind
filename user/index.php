<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/user.class.php';
require_once '../app/classes/services.class.php';

$user = new User();
$services = new Services();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../assets/css/style.css">


  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>

<body>

  <section class="home">
    <div class="container py-3">
      <div class="row">

        <div class="col-12 mb-2">
          <div class="rounded rounded-3 bg-primary p-3 text-white">
            <h3>Welcome Back, !<?=$_SESSION['name'];?></h3>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div id="homeCarousel" class="carousel slide rounded rounded-3" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner rounded rounded-3">
              <div class="carousel-item active">
                <img src="../assets/images/image1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../assets/images/image1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="../assets/images/image1.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mb-2">
          <div class="rounded rounded-3 bg-secondary p-3 text-white d-flex align-items-center justify-content-between">
            <div>
              <h3 class="mb-0">Some Business</h3>
              <p class="mb-0 fw-light">3 McNeillie Drive, Riverside</p>
            </div>
            <div class="p-3">
              <i class="bi bi-patch-check-fill fs-1"></i>
            </div>
          </div>
        </div>
        <div class="listing col-12 mb-2">
          <div class="rounded rounded-3 bg-secondary p-3 text-white d-flex align-items-center justify-content-between">
            <div>
              <h3 class="listing-name mb-0">Some listing</h3>
              <p class="listing-address mb-0 fw-light">3 McNeillie Drive, Riverside</p>
              <div class="listing-rating d-flex align-items-center">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </div>
            </div>
            <div class="listing-verification p-3">
              <i class="bi bi-patch-check-fill fs-1"></i>
            </div>
          </div>
        </div>
        <div class="col-12">
          <form action="">
            <div class="input-group rounded-pill border border-2 border-primary">
              <input type="search" name="q" id="q" class="form-control form-control-lg rounded-pill border border-end-0" placeholder="Search business...">
              <button type="submit" class="btn btn-lg btn-primary rounded-pill px-3">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Floating Footer Navigation -->
  <div class="footer w-100">
    <div class="row justify-content-between m-0 p-2 rounded rounded-3 bg-secondary">
      <div class="col-3 text-center">
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/user/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-house"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/search.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-search"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/categories.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-compass"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/profile.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-person-circle"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- End Of Floating Footer Navigation -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
  <script>
    // Request location access
    $(document).ready(function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function() {
            console.log("Location access granted.");
          },
          function(error) {
            console.warn("Error: " + error.message);
          }
        );
      } else {
        console.warn("Geolocation is not supported by this browser.");
      }
    });
  </script>
</body>

</html>