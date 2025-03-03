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



</head>

<body>

  <section class="home animate__animated animate__fadeIn animate__fast">
    <div class="container py-3">
      <div class="row">
        <!-- Welcome Card -->
        <div class="col-12 mb-3">
          <div class="rounded rounded-3 bg-primary p-3 text-white shadow">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <h3 class="mb-1 fw-bold">Welcome Back!</h3>
                <p class="mb-0 fw-light">Find verified services near you</p>
              </div>
              <div class="text-center">
                <i class="bi bi-geo-alt fs-1"></i>
                <div class="small fw-semibold">Riverside, CA</div>
              </div>
            </div>
          </div>
        </div>

        <!-- Search Bar -->
        <div class="col-12 mb-4">
          <div class="input-group shadow-sm">
            <span class="input-group-text bg-white border-end-0">
              <i class="bi bi-search text-primary"></i>
            </span>
            <input type="search" class="form-control border-start-0 ps-0 py-2"
              placeholder="Search for verified services...">
          </div>
        </div>

        <!-- Featured Categories -->
        <div class="col-12 mb-4">
          <h6 class="fw-bold mb-3 text-dark">Browse Categories</h6>
          <div class="row g-3">
            <div class="col-3">
              <div class="home-category-card card h-100 border-0 bg-secondary shadow-sm hover-shadow" hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=health" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
                <div class="card-body p-2 text-center">
                  <i class="bi bi-hospital text-white fs-4"></i>
                  <div class="small mt-1 fw-medium text-white">Healthcare</div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="home-category-card card h-100 border-0 bg-secondary shadow-sm hover-shadow" hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=emergency" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
                <div class="card-body p-2 text-center">
                  <i class="bi bi-shield-check text-white fs-4"></i>
                  <div class="small mt-1 fw-medium text-white">Emergency</div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="home-category-card card h-100 border-0 bg-secondary shadow-sm hover-shadow" hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=education" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
                <div class="card-body p-2 text-center">
                  <i class="bi bi-mortarboard text-white fs-4"></i>
                  <div class="small mt-1 fw-medium text-white">Education</div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="home-category-card card h-100 border-0 bg-secondary shadow-sm hover-shadow" hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=legal" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
                <div class="card-body p-2 text-center">
                  <i class="bi bi-bank text-white fs-4"></i>
                  <div class="small mt-1 fw-medium text-white">Legal</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Nearby Services -->
        <div class="col-12 mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-bold mb-0 text-dark">Nearby Verified Services</h6>
            <a href="#" class="text-primary text-decoration-none small fw-semibold">View All</a>
          </div>

          <!-- Service Card -->
          <div class="card mb-3 border-0 bg-primary shadow-sm hover-shadow">
            <div class="card-body p-3">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="bg-light rounded-3 p-2">
                    <i class="bi bi-hospital text-primary fs-4"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3 text-white">
                  <h6 class="mb-1 fw-semibold">Riverside Community Hospital</h6>
                  <div class="small fw-light fw-medium">
                    <i class="bi bi-geo-alt me-1"></i>
                    2.5 km away
                  </div>
                  <div class="small mt-1">
                    <i class="bi bi-star-fill text-warning"></i>
                    <span class="ms-1 fw-medium">4.8</span>
                    <span class="fw-light">(240 reviews)</span>
                  </div>
                </div>
                <div class="flex-shrink-0 ms-2">
                  <i class="bi bi-patch-check-fill text-primary fs-4"></i>
                </div>
              </div>
            </div>
          </div>

          <!-- Service Card -->
          <div class="card mb-3 border-0 bg-primary shadow-sm hover-shadow">
            <div class="card-body p-3">
              <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                  <div class="bg-light rounded-3 p-2">
                    <i class="bi bi-shield-check text-primary fs-4"></i>
                  </div>
                </div>
                <div class="flex-grow-1 ms-3 text-white">
                  <h6 class="mb-1 fw-semibold">Fire Station #1</h6>
                  <div class="small fw-light fw-medium">
                    <i class="bi bi-geo-alt me-1"></i>
                    1.2 km away
                  </div>
                  <div class="small mt-1">
                    <i class="bi bi-star-fill text-warning"></i>
                    <span class="ms-1 fw-medium">4.9</span>
                    <span class="fw-light">(186 reviews)</span>
                  </div>
                </div>
                <div class="flex-shrink-0 ms-2">
                  <i class="bi bi-patch-check-fill text-primary fs-4"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Recent Searches -->
        <div class="col-12">
          <h6 class="fw-bold mb-3 text-dark">Recent Searches</h6>
          <div class="d-flex flex-wrap gap-2">
            <div class="bg-light rounded-pill px-3 py-2 small fw-medium shadow-sm">
              <i class="bi bi-clock-history me-1 text-primary"></i>
              Emergency Room
            </div>
            <div class="bg-light rounded-pill px-3 py-2 small fw-medium shadow-sm">
              <i class="bi bi-clock-history me-1 text-primary"></i>
              Police Station
            </div>
            <div class="bg-light rounded-pill px-3 py-2 small fw-medium shadow-sm">
              <i class="bi bi-clock-history me-1 text-primary"></i>
              High School
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- Floating Footer Navigation -->
  <div class="footer w-100 d-flex justify-content-center shadow">
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

  <!-- Logout Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog vh-100 d-flex align-items-center">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="<?= $_ENV['SITE_URL'] ?>/user/logout.php" class="btn btn-primary">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Of Logout Modal -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
  <script>
    // Request location access
    $(document).ready(function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;

            console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);

            // Update the link with coordinates


            $('.home-category-card').each(function() {
              let $link = $(this); // Change this to your actual link ID
              let baseUrl = $link.attr('hx-get');
              let newUrl = baseUrl + '&lat=' + latitude + '&long=' + longitude;
              $link.attr('hx-get', newUrl);
            });
          },
          function(error) {
            console.error('Error occurred. Error code: ' + error.code);
          }
        );
      } else {
        console.warn("Geolocation is not supported by this browser.");
      }
    });
  </script>
</body>

</html>