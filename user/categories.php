<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Categories</h5>
    <button class="header-options-btn btn">
      <i class="bi bi-filter-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="categories">
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
  <div class="footer w-100">
    <div class="row justify-content-between m-0 p-2 rounded rounded-3 bg-secondary">
      <div class="col-3 text-center">
        <button class="btn">
          <i class="bi bi-house"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn active">
          <i class="bi bi-search"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn">
          <i class="bi bi-briefcase"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn">
          <i class="bi bi-gear"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- End Of Floating Footer Navigation -->

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