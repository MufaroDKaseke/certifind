<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/provider.class.php';
require_once '../app/classes/verification.class.php';

$provider = new Provider();
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
                <h4 class="fw-bold mb-1">Riverside Hospital</h4>
                <p class="mb-2 fw-light">Healthcare Provider</p>
                <div class="d-flex justify-content-center gap-2">
                  <span class="badge bg-success">
                    <i class="bi bi-patch-check-fill me-1"></i>Verified
                  </span>
                  <span class="badge bg-light text-dark">
                    <i class="bi bi-geo-alt me-1"></i>Riverside, CA
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
                  <span class="fw-medium">Riverside Community Hospital</span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Category</small>
                  <span class="fw-medium">Healthcare Services</span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Business ID</small>
                  <span class="fw-medium">HC-2024-1234</span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Address</small>
                  <span class="fw-medium">3700 Main St, Riverside, CA 92501</span>
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
                  <span class="fw-medium">contact@riverside.hospital</span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Phone Number</small>
                  <span class="fw-medium">+1 (951) 555-0123</span>
                </div>
                <div class="list-group-item py-3">
                  <small class="text-muted d-block">Website</small>
                  <span class="fw-medium">www.riverside.hospital</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Settings -->
        <div class="col-12">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-light py-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-gear text-primary fs-4 me-2"></i>
                <h6 class="mb-0 fw-bold">Settings</h6>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action py-3">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-bell text-primary fs-5 me-3"></i>
                    <div>
                      <span class="fw-medium d-block">Notifications</span>
                      <small class="text-muted">Manage your notifications</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-shield-lock text-primary fs-5 me-3"></i>
                    <div>
                      <span class="fw-medium d-block">Security</span>
                      <small class="text-muted">Update password and security settings</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-clock-history text-primary fs-5 me-3"></i>
                    <div>
                      <span class="fw-medium d-block">Business Hours</span>
                      <small class="text-muted">Set your operating hours</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                  </div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 text-danger">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-box-arrow-right text-danger fs-5 me-3"></i>
                    <div>
                      <span class="fw-medium d-block">Logout</span>
                      <small class="text-muted">Sign out of your account</small>
                    </div>
                    <i class="bi bi-chevron-right ms-auto"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- Floating Footer Navigation -->
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

</body>