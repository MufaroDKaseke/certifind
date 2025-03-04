<?php
require_once '../../vendor/autoload.php';
require_once '../config/config.php';
require_once '../classes/db.class.php';
require_once '../classes/user.class.php';
require_once '../classes/services.class.php';

$user = new User();
$services = new Services();


if (isset($_GET['lat']) && isset($_GET['long'])) {
  $nearestServices = $services->getNearestServices($_GET['lat'], $_GET['long'], $_GET['limit']);

  if ($nearestServices && !empty($nearestServices)) {
    foreach ($nearestServices as $service) {
?>
      <div class="card mb-3 border-0 bg-primary shadow-sm hover-shadow" hx-get="<?= $_ENV['SITE_URL'] ?>/user/service.php?providerId=<?= $service['provider_id']?>" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
        <div class="card-body p-3">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <div class="bg-light rounded-3 p-2">
                <i class="<?= PROVIDER_CATEGORIES[array_search($service['category'], array_column(PROVIDER_CATEGORIES, 'name'))]['icon'] ?? 'bi bi-house'; ?> text-primary fs-4"></i>
              </div>
            </div>
            <div class="flex-grow-1 ms-3 text-white">
              <h6 class="mb-1 fw-semibold"><?= strlen($service['name']) > 30 ? substr($service['name'], 0, 30) . '...' : $service['name'] ?></h6>
              <div class="small fw-light fw-medium">
                <i class="bi bi-geo-alt me-1"></i>
                <?= $service['distance'] ?> km away
              </div>
              <div class="small mt-1">
                <i class="bi bi-star-fill text-warning"></i>
                <span class="ms-1 fw-medium"><?= $service['avg_rating'] ?></span>
                <span class="fw-light">(186 reviews)</span>
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
  }
}


?>