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

  <section class="profile">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-3">
          <div class="profile-details rounded rounded-3 p-3 bg-light">
            <div class="profile-name text-center">
              <i class="bi bi-person-circle"></i>
              <h3 class="mb-3 text-center fw-semibold"><?= $userDetails['name'] ?></h3>
            </div>
            <form hx-post="<?= $_ENV['SITE_URL'] ?>/user/view/update_profile.php" hx-target="#saveChangesBtn" hx-swap="outerHTML">
              <div class="mb-3">
              <label for="username" class="form-label fw-semibold">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $userDetails['username'] ?>" readonly>
              </div>
              <div class="mb-3">
              <label for="email" class="form-label fw-semibold">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= $userDetails['email'] ?>" readonly>
              </div>
              <div class="mb-3">
              <label for="phone" class="form-label fw-semibold">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?= $userDetails['phone'] ?>" readonly>
              </div>
              <div class="mb-3">
              <label for="address" class="form-label fw-semibold">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="123 Main St, Anytown, USA" readonly>
              </div>
              <button id="saveChangesBtn" type="submit" class="btn btn-secondary">Save Changes</button>
              <button id="editProfileBtn" type="button" class="btn btn-primary">Edit Profile</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Floating Footer Navigation -->
  <div class="footer w-100">
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

      // Your code here
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