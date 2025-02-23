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
    <button class="header-back-btn btn">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Profile</h5>
    <button class="header-options-btn btn">
      <i class="bi bi-filter-right"></i>
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
            <form>
              <div class="mb-3">
                <label for="username" class="form-label fw-semibold">Username</label>
                <input type="text" class="form-control" id="username" value="<?= $userDetails['username'] ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" id="email" value="<?= $userDetails['email'] ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label fw-semibold">Phone</label>
                <input type="text" class="form-control" id="phone" value="<?= $userDetails['phone'] ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label fw-semibold">Address</label>
                <input type="text" class="form-control" id="address" value="123 Main St, Anytown, USA" readonly>
              </div>
              <button type="button" class="btn btn-primary">Edit Profile</button>
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

</body>