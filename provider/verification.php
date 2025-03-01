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
    <h5 class="mb-0 text-center">Verification</h5>
    <button class="header-options-btn btn btn-sm" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="verification">
    <div class="container">
      <div class="row">
        <!-- Add alert container -->
        <div id="alert-container" class="col-12 mb-3"></div>

        <div class="col-12 mb-3">

          <?php
          if ($verification->getStatus()) {
          ?>
            <div class="text-center p-4 border rounded bg-success text-white shadow">
              <i class="bi bi-check-circle-fill text-white display-3" id="verification-icon"></i>
              <h2 class="mt-3" id="verification-text">Account Verified</h2>
            </div>
          <?php
          } else {
          ?>
            <div class="text-center p-4 border rounded bg-danger text-white shadow">
              <i class="bi bi-x-circle-fill text-white display-3" id="verification-icon"></i>
              <h2 class="mt-3" id="verification-text">Not Verified</h2>
            </div>
          <?php
          }
          ?>
        </div>
        <div class="col-12">
          <?php
          $verificationRequests = $verification->getRequests();
          if (!empty($verificationRequests)) {
            foreach ($verificationRequests as $request) {
          ?>
              <div class="card mb-3 bg-secondary text-white shadow-sm">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <span class="fw-bold mb-0">
                      Request #<?= $request['verification_id'] ?>
                    </span>
                    <span class="badge <?= $request['status'] ? 'bg-success' : 'bg-danger' ?>">
                      <?= $request['status'] ? 'Approved' : 'Pending' ?>
                    </span>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between align-items-center mt-2">
                    <div>
                      <small class="text-white fw-light">
                        <i class="bi bi-calendar3 me-1"></i>
                        <?= date('M d, Y', strtotime($request['requested_on'])) ?>
                      </small>
                    </div>
                    <div>
                      <small class="text-white fw-light">
                        <i class="bi bi-file-earmark-text me-1"></i>
                        <?= $request['document_count'] ?> docs
                      </small>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
          } else {
            ?>
            <div class="alert alert-info">
              <i class="bi bi-info-circle me-2"></i>
              No verification requests found.
            </div>
          <?php
          }
          ?>
        </div>
        <div class="col-12">
          <?php if (!$verification->getStatus()) { ?>
            <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verificationModal">
                <i class="bi bi-plus-circle me-2"></i>Start Verification
              </button>
            </div>

            <!-- Verification Request Modal -->
            <div class="modal fade" id="verificationModal" tabindex="-1">
              <div class="modal-dialog vh-100 d-flex align-items-center justify-content-center">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Submit Verification Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <form hx-post="submit_verification.php"
                      hx-target="#alert-container"
                      hx-swap="innerHTML"
                      hx-trigger="submit"
                      hx-encoding="multipart/form-data">
                      <div class="mb-3">
                        <label class="form-label">Provider ID</label>
                        <input type="text" class="form-control" value="<?= $_SESSION['provider_id'] ?>" disabled>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Document 1</label>
                        <input type="file" class="form-control" name="document1" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Document 2</label>
                        <input type="file" class="form-control" name="document2" required>
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Document 3</label>
                        <input type="file" class="form-control" name="document3" required>
                      </div>
                      <button type="submit" class="btn btn-primary w-100"
                        onclick="document.querySelector('#verificationModal').classList.remove('show')">
                        Submit Request
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Floating Footer Navigation -->
  <div class="footer w-100 d-flex justify-content-center">
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
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/verification.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-check-circle"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/profile.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-gear"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- End Of Floating Footer Navigation -->

</body>