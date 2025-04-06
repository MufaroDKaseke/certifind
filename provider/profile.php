<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/provider.class.php';
require_once '../app/classes/verification.class.php';

$provider = new Provider();
$providerDetails = $provider->getUserDetails();
$verification = new Verification($_SESSION['provider_id']);
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn btn-sm" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Profile</h5>
    <button class="header-options-btn btn btn-sm" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="provider-profile">
    <div class="container">
      <div class="row">
        <!-- Profile Image & Basic Info -->
        <div class="col-12 mb-4">
          <div class="card border-0 bg-primary text-white shadow">
            <div class="card-body p-4">
              <div class="text-center mb-3">
                <div class="mb-3">
                  <i class="bi bi-building display-1"></i>
                </div>
                <h4 class="fw-bold mb-1"><?= $providerDetails['name'] ?></h4>
                <p class="mb-2 fw-light"><?= $providerDetails['category'] ?></p>
                <div class="d-flex justify-content-center gap-2">
                  <span class="badge bg-<?= $providerDetails['verified'] ? 'success' : 'warning' ?>">
                    <i class="bi bi-<?= $providerDetails['verified'] ? 'patch-check-fill' : 'clock' ?> me-1"></i>
                    <?= $providerDetails['verified'] ? 'Verified' : 'Pending Verification' ?>
                  </span>
                  <span class="badge bg-light text-dark">
                    <i class="bi bi-geo-alt me-1"></i><?= $providerDetails['city'] ?>, <?= $providerDetails['state'] ?>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Business Details -->
        <div class="col-12 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-light py-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-briefcase text-primary fs-4 me-2"></i>
                <h6 class="mb-0 fw-bold">Business Details</h6>
                <button class="btn btn-sm btn-primary ms-auto">
                  <i class="bi bi-pencil"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Business Name</small>
                  <span class="fw-medium"><?= $providerDetails['name'] ?></span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Category</small>
                  <span class="fw-medium"><?= $providerDetails['category'] ?></span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">About</small>
                  <span class="fw-medium"><?= $providerDetails['about'] ?></span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Address</small>
                  <span class="fw-medium"><?= $providerDetails['street'] ?>, <?= $providerDetails['city'] ?>, <?= $providerDetails['state'] ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Contact Information -->
        <div class="col-12 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-light py-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-person-lines-fill text-primary fs-4 me-2"></i>
                <h6 class="mb-0 fw-bold">Contact Information</h6>
                <button class="btn btn-sm btn-primary ms-auto">
                  <i class="bi bi-pencil"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Email Address</small>
                  <span class="fw-medium"><?= $providerDetails['email'] ?></span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Phone Number</small>
                  <span class="fw-medium"><?= $providerDetails['phone'] ?></span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Website</small>
                  <span class="fw-medium"><?= $providerDetails['website'] ?: 'Not provided' ?></span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Business Hours</small>
                  <div class="fw-medium">
                    <div>Mon-Fri: <?= $providerDetails['weekday_hours'] ?></div>
                    <div>Saturday: <?= $providerDetails['saturday_hours'] ?></div>
                    <div>Sunday: <?= $providerDetails['sunday_hours'] ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Remove Settings section -->
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Navigation -->
  <div class="footer w-100 d-flex justify-content-center shadow">
    <div class="row justify-content-between m-0 p-2 rounded rounded-3 bg-primary">
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-house"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/reviews.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-star"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/verification.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-check-circle"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/profile.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-gear"></i>
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
          <a href="<?= $_ENV['SITE_URL'] ?>/provider/logout.php" class="btn btn-primary">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Of Logout Modal -->

</body>