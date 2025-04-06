<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/user.class.php';

$user = new User();
$userDetails = $user->getUserDetails();
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Profile</h5>
    <button class="header-options-btn btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="profile animate__animated animate__fadeIn animate__fast">
    <div class="container">
      <div class="row">
        <!-- Profile Header -->
        <div class="col-12 mb-4">
          <div class="card border-0 bg-secondary text-white shadow">
            <div class="card-body p-4">
              <div class="text-center mb-3">
                <div class="mb-3">
                  <i class="bi bi-person-circle display-1"></i>
                </div>
                <h4 class="fw-bold mb-1"><?= $userDetails['name'] ?></h4>
                <p class="mb-2 opacity-75">Member since <?= date('M Y', strtotime($userDetails['registered_on'])) ?></p>
              </div>
            </div>
          </div>
        </div>

        <!-- Profile Details -->
        <div class="col-12 mb-4">
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-light py-3">
              <div class="d-flex align-items-center">
                <i class="bi bi-person text-secondary fs-4 me-2"></i>
                <h6 class="mb-0 fw-bold">Account Details</h6>
                <button class="btn btn-sm btn-secondary ms-auto" id="editProfileBtn">
                  <i class="bi bi-pencil"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <form hx-post="<?= $_ENV['SITE_URL'] ?>/user/view/update_profile.php" hx-target="#saveChangesBtn" hx-swap="outerHTML">
                <div class="list-group list-group-flush">
                  <div class="list-group-item py-3">
                    <small class="text-muted d-block">Full Name</small>
                    <input type="text" class="form-control border-0 fw-medium p-0" name="name" value="<?= $userDetails['name'] ?>" readonly>
                  </div>
                  <div class="list-group-item py-3">
                    <small class="text-muted d-block">Email</small>
                    <input type="email" class="form-control border-0 fw-medium p-0" name="email" value="<?= $userDetails['email'] ?>" readonly>
                  </div>
                  <div class="list-group-item py-3">
                    <small class="text-muted d-block">Phone</small>
                    <input type="tel" class="form-control border-0 fw-medium p-0" name="phone" value="<?= $userDetails['phone'] ?>" readonly>
                  </div>
                  <div class="list-group-item py-3">
                    <small class="text-muted d-block">Username</small>
                    <input type="text" class="form-control border-0 fw-medium p-0" name="username" value="<?= $userDetails['username'] ?>" readonly>
                  </div>
                </div>
                <button id="saveChangesBtn" type="submit" class="btn btn-secondary w-100 rounded-0" style="display: none;">Save Changes</button>
              </form>
            </div>
          </div>
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
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/categories.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-compass"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/user/profile.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
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

  <script>
    $(document).ready(function() {
      $('#saveChangesBtn').hide();

      $('#editProfileBtn').click(function() {
        $('#saveChangesBtn').show();
        $('#editProfileBtn').hide();
        $('#username, #email, #phone, #address').prop('readonly', false);
      });

      $('#username, #email, #phone, #address').on('input', function() {
        $('#editProfileBtn').hide();
        $('#saveChangesBtn').show();
      });
    });
  </script>

</body>