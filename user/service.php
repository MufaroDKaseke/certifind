<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/user.class.php';
require_once '../app/classes/services.class.php';

$user = new User();
$services = new Services();
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/categories.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Service Provider</h5>
    <button class="header-options-btn btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <?php

  if (isset($_GET['providerId'])) {
    $providerDetails = $services->getServiceByProviderId($_GET['providerId']);
  ?>
    <section class="service">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <div class="rounded rounded-3 bg-primary p-3 text-white">
              <div class="mb-3">
                <h3 class="text-capitalize"><?= $providerDetails['name'] ?></h3>
                <div class="service-rating d-flex align-items-center">
                  <?php
                  $fullStars = floor($providerDetails['avg_rating']);
                  $halfStar = ($providerDetails['avg_rating'] - $fullStars) >= 0.5 ? 1 : 0;
                  $emptyStars = 5 - $fullStars - $halfStar;

                  for ($i = 0; $i < $fullStars; $i++) {
                    echo '<i class="bi bi-star-fill text-warning"></i>';
                  }
                  if ($halfStar) {
                    echo '<i class="bi bi-star-half text-warning"></i>';
                  }
                  for ($i = 0; $i < $emptyStars; $i++) {
                    echo '<i class="bi bi-star text-warning"></i>';
                  }
                  ?>
                </div>
              </div>
              <ul class="service-details nav flex-column mb-3">
                <li class="nav-item">
                  <a href="" class="nav-link text-white px-0">
                    <i class="bi bi-geo-alt me-2"></i>
                    <?= $providerDetails['address'] ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tel:<?= $providerDetails['phone'] ?>" class="nav-link text-white px-0">
                    <i class="bi bi-telephone me-2"></i>
                    <?= $providerDetails['phone'] ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= $providerDetails['website'] ?>" class="nav-link text-white px-0">
                    <i class="bi bi-globe2 me-2"></i>
                    <?= $providerDetails['website'] ?>
                  </a>
                </li>
              </ul>

              <ul class="service-tab nav nav-tabs" id="serviceTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">Location</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="hours-tab" data-bs-toggle="tab" data-bs-target="#hours" type="button" role="tab" aria-controls="hours" aria-selected="false">Hours</button>
                </li>
              </ul>
              <div class="service-tab-content tab-content" id="serviceTabContent">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                  <p>
                    <iframe
                      class="service-map"
                      width="600"
                      height="450"
                      style="border:0"
                      loading="lazy"
                      allowfullscreen
                      referrerpolicy="no-referrer-when-downgrade"
                      src="https://www.google.com/maps?q=<?= $providerDetails['location'] . trim(' ') ?>&output=embed">
                    </iframe>

                  </p>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <p>Customer reviews will be displayed here.</p>
                </div>
                <div class="tab-pane fade" id="hours" role="tabpanel" aria-labelledby="hours-tab">
                  <p>Service hours information.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  }

  ?>


  <script>
    $(document).ready(function() {
      var $mapContainer = $(".service-map");

      if ($mapContainer.length) {
        var location = [28.6323397, -20.1803634]; // Example: New York City
        var map = L.map($mapContainer[0]).setView(location, 12);

        // Add OpenStreetMap tiles
        /* L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map); */

        // Add a marker
        L.marker(location).addTo(map)
          .bindPopup('Business Name')
          .openPopup();
      }
    });
  </script>

</body>