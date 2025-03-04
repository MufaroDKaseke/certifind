<?php
require_once '../../vendor/autoload.php';
require_once '../config/config.php';
require_once '../classes/db.class.php';
require_once '../classes/user.class.php';
require_once '../classes/services.class.php';

$user = new User();
$service = new Services();


if (isset($_GET['q'])) {

  $searchResults = $service->search($_GET['q']);
  if ($searchResults && !empty($searchResults)) {
?>
    <p class="text-center text-secondary fw-semibold"><?= count($searchResults) ?> found</p>
    <?php
    foreach ($searchResults as $provider) {
    ?>
      <div class="card mb-3 border-0 bg-primary shadow-sm hover-shadow" hx-get="<?= $_ENV['SITE_URL'] ?>/user/service.php?providerId=<?= $provider['provider_id']?>" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
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
                <?= $provider['street'] ?>, <?= $provider['city'] ?>
              </div>
              <div class="small mt-1">
                <i class="bi bi-star-fill text-warning"></i>
                <span class="ms-1 fw-medium"><?= $provider['avg_rating'] ?></span>
                <span class="fw-light">(<?= $provider['review_count'] ?? 0 ?> reviews)</span>
              </div>
            </div>
            <?php if ($provider['verified']) { ?>
              <div class="flex-shrink-0 ms-2">
                <i class="bi bi-patch-check-fill text-primary fs-4"></i>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
<?php
    }
  } else {
    ?>
    <div class="text-center mt-3">
      <i class="bi bi-exclamation-circle fs-1 text-secondary"></i>
      <p class="text-secondary fw-semibold">No services found</p>
    </div>
    <?php
  }
}

?>