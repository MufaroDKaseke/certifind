<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Categories</h5>
    <button class="header-options-btn btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="categories animate__animated animate__fadeIn animate__fast">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-3">
          <a hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=education" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="categories-single rounded rounded-3 p-3 text-white" style="background-image: linear-gradient(rgb(0 0 0 / 30%), rgb(0 0 0 / 30%)), url('https://www.bathecho.co.uk/uploads/2021/12/emergency-service-vehicles-partnership-cred.jpg')">
            <h3 class="mb-0">Education</h3>
          </a>
        </div>
        <div class="col-12 mb-3">
          <a hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=health" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="categories-single rounded rounded-3 p-3 text-white" style="background-image: linear-gradient(rgb(0 0 0 / 30%), rgb(0 0 0 / 30%)), url('https://media-assets.stryker.com/is/image/stryker/ProCare-service-techs-800x533?$max_width_1440$')">
            <h3 class="mb-0">Health</h3>
          </a>
        </div>
        <div class="col-12 mb-3">
          <a hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=fire" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="categories-single rounded rounded-3 p-3 text-white" style="background-image: linear-gradient(rgb(0 0 0 / 30%), rgb(0 0 0 / 30%)), url('https://media-assets.stryker.com/is/image/stryker/ProCare-service-techs-800x533?$max_width_1440$')">
            <h3 class="mb-0">Fire Departments</h3>
          </a>
        </div>
        <div class="col-12 mb-3">
          <a hx-get="<?= $_ENV['SITE_URL'] ?>/user/category.php?category=police" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="categories-single rounded rounded-3 p-3 text-white" style="background-image: linear-gradient(rgb(0 0 0 / 30%), rgb(0 0 0 / 30%)), url('https://media-assets.stryker.com/is/image/stryker/ProCare-service-techs-800x533?$max_width_1440$')">
            <h3 class="mb-0">Police Departments</h3>
          </a>
        </div>
      </div>
    </div>
  </section>


  <!-- Floating Footer Navigation -->
  <div class="footer w-100 d-flex justify-content-center shadow">
    <div class="row justify-content-between m-0 p-2 rounded rounded-3 bg-secondary">
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-house"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/search.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-search"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/user/categories.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
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

  <script>
    $(document).ready(function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;

            console.log('Latitude: ' + latitude + ', Longitude: ' + longitude);

            // Update the link with coordinates


            $('.categories-single').each(function() {
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
        console.error('Geolocation is not supported by this browser.');
      }
    });
  </script>
</body>