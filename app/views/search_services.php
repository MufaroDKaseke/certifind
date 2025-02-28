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
      <div class="listing col-12 mb-2" hx-get="<?= $_ENV['SITE_URL'] ?>/user/service.php?providerId=<?= $provider['provider_id'] ?>" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
        <div class="rounded rounded-3 bg-secondary p-3 text-white d-flex align-items-center justify-content-between">
          <div>
            <h3 class="listing-name mb-0"><?= $provider['name']; ?></h3>
            <p class="listing-address mb-0 fw-light"><?= $provider['address']; ?></p>
            <div class="listing-rating d-flex align-items-center">
              <?php
              $fullStars = floor($provider['avg_rating']);
              $halfStar = ($provider['avg_rating'] - $fullStars) >= 0.5 ? 1 : 0;
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
            <span class="badge bg-primary text-uppercase small"><?= $provider['category'] ?></span>
          </div>
          <div class="listing-verification p-3">
            <i class="bi bi-patch-check-fill fs-1"></i>
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