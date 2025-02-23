<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/user.class.php';
require_once '../app/classes/services.class.php';

$user = new User();
$service = new Services();

/* 
  Should pass a get parameter named category
*/
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/categories.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center text-capitalize">
      <?php
      if (isset($_GET['category'])) {
        echo $_GET['category'];
      } else {
        echo 'Unknown';
      }

      ?>
    </h5>
    <button class="header-options-btn btn">
      <i class="bi bi-filter-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="listings">
    <div class="container">
      <div class="row">
        <?php
        if (isset($_GET['category'])) {


          $nearestServicesInCategory = $service->getNearestServicesByCategory($_GET['lat'], $_GET['long'], $_GET['category']);

          if ($nearestServicesInCategory && !empty($nearestServicesInCategory)) {
            ?>
            <div class="col-12">
              <p class="text-center text-secondary fw-semibold"><?=count($nearestServicesInCategory)?> found</p>
            </div>
            <?php
            foreach ($nearestServicesInCategory as $provider) {
        ?>    
              <div class="listing col-12 mb-2">
                <div class="rounded rounded-3 bg-secondary p-3 text-white d-flex align-items-center justify-content-between">
                  <div>
                    <h3 class="listing-name mb-0"><?= $provider['name']; ?></h3>
                    <p class="listing-address mb-0 fw-light"><?= $provider['address']; ?></p>
                    <div class="listing-rating d-flex align-items-center">
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-fill text-warning"></i>
                      <i class="bi bi-star-half text-warning"></i>
                    </div>
                    <p class="listing-distance mb-0"><?=$provider['distance']?>km</p>
                  </div>
                  <div class="listing-verification p-3">
                    <i class="bi bi-patch-check-fill fs-1"></i>
                  </div>
                </div>
              </div>
        <?php
            }
          } else {
            echo '<p>No services found in this category.</p>';
          }
        }
        ?>
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
</body>