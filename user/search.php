<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/user.class.php';
require_once '../app/classes/services.class.php';

$user = new User();
$service = new Services();
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Search</h5>
    <button class="header-options-btn btn">
      <i class="bi bi-filter-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="search">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form hx-get="<?= $_ENV['SITE_URL'] ?>/app/views/search_services.php" hx-trigger="submit" hx-target=".search-results" hx-swap="innerHTML">
            <div class="input-group rounded-pill border border-2 border-primary">
              <input type="search" name="q" id="q" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8') : ''; ?>"
                class="form-control form-control-lg rounded-pill border border-end-0" placeholder="Search business...">
              <button type="submit" class="btn btn-lg btn-primary rounded-pill px-3">
                <i class="bi bi-search"></i>
              </button>
            </div>
          </form>
        </div>
        <div class="col-12 search-results">

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
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/user/search.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-search"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/categories.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-compass"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/profile.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-person-circle"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- End Of Floating Footer Navigation -->

</body>