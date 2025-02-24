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
    foreach ($searchResults as $provider) {
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
          </div>
          <div class="listing-verification p-3">
            <i class="bi bi-patch-check-fill fs-1"></i>
          </div>
        </div>
      </div>
<?php
    }
  } else {
    echo "<p>No services found with '" . $_GET['q'] . "'</p>";
  }
}

?>