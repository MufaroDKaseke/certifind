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
    <button class="header-options-btn btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="listings animate__animated animate__fadeIn animate__fast">
    <div class="container">
      <div class="row">
        <?php
        if (isset($_GET['category'])) {


          $nearestServicesInCategory = $service->getNearestServicesByCategory($_GET['lat'], $_GET['long'], $_GET['category']);

          if ($nearestServicesInCategory && !empty($nearestServicesInCategory)) {
        ?>
            <div class="col-12">
              <p class="text-center text-secondary fw-semibold"><?= count($nearestServicesInCategory) ?> services in <span class="text-capitalize"><?= $_GET['category'] ?></span></p>
            </div>
            <div class="col-12">

              <?php
            foreach ($nearestServicesInCategory as $provider) {
              ?>
              <div class="card mx-2 mb-3 border-0 bg-primary shadow-sm hover-shadow" hx-get="<?= $_ENV['SITE_URL'] ?>/user/service.php?providerId=<?= $provider['provider_id']?>" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
                <div class="card-body p-3">
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="bg-light rounded-3 p-2">
                        <i class="<?= PROVIDER_CATEGORIES[array_search($provider['category'], array_column(PROVIDER_CATEGORIES, 'name'))]['icon'] ?? 'bi bi-house'; ?> text-primary fs-4"></i>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3 text-white">
                      <h6 class="mb-1 fw-semibold"><?= strlen($provider['name']) > 30 ? substr($provider['name'], 0, 30) . '...' : $provider['name'] ?></h6>
                      <div class="small fw-light fw-medium">
                        <i class="bi bi-geo-alt me-1"></i>
                        <?= $provider['distance'] ?> km away
                      </div>
                      <div class="small mt-1">
                        <i class="bi bi-star-fill text-warning"></i>
                        <span class="ms-1 fw-medium"><?= $provider['avg_rating'] ?></span>
                        <span class="fw-light">(<?= $provider['review_count'] ?> reviews)</span>
                      </div>
                    </div>
                    <div class="flex-shrink-0 ms-2">
                      <i class="bi bi-patch-check-fill text-primary fs-4"></i>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          } else {
            ?>
            <div class="text-center mt-3">
              <i class="bi bi-info-circle fs-1 text-secondary"></i>
              <p class="text-secondary fw-semibold">No services available in this category yet</p>
            </div>
            <?php
          }
        }
        ?>
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
</body>