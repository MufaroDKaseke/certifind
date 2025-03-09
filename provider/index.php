<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/provider.class.php';
require_once '../app/classes/services.class.php';

$user = new Provider();
$services = new Services();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../assets/css/custom.css">
  <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

  <section class="home-provider">
    <div class="container">
      <div class="row">
        <!-- Provider Status Card -->
        <div class="col-12 my-3">
          <div class="rounded rounded-3 bg-primary p-3 text-white shadow">
            <div class="d-flex justify-content-between align-items-start">
              <div>
                <span class="bg-white text-primary px-2 py-1 rounded-pill small fw-semibold mb-2 d-inline-block">
                  <i class="bi bi-shield-check me-1"></i>Service Provider
                </span>
                <h3 class="mb-1 fw-bold"><?= $_SESSION['name'] ?></h3>
                <p class="mb-2 fw-light"><?= $_SESSION['category'] ?></p>
                <div class="small">
                  <i class="bi bi-geo-alt me-1"></i>
                  <span class="fw-medium"><?= $_SESSION['street'] ?>, <?= $_SESSION['city'] ?></span>
                </div>
              </div>
              <div class="text-end">
                <?php if ($_SESSION['verified']) { ?>
                  <div class="bg-success text-white rounded-pill px-3 py-1 small fw-semibold">
                    <i class="bi bi-check-circle me-1"></i>Verified
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Stats -->
        <?php 
        $providerStats = $services->getServiceByProviderId($_SESSION['provider_id']);
        ?>
        <div class="col-12 mb-4">
          <div class="row g-2">
            <div class="col-4">
              <div class="card border-0 bg-secondary text-white shadow-sm">
                <div class="card-body p-3 text-center">
                  <i class="bi bi-star-fill text-warning mb-2 fs-4"></i>
                  <div class="fw-bold h3 mb-0"><?= $providerStats['avg_rating'] ?? '0.0' ?></div>
                  <div class="small fw-light">Rating</div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card border-0 bg-secondary text-white shadow-sm">
                <div class="card-body p-3 text-center">
                  <i class="bi bi-chat-text-fill text-warning mb-2 fs-4"></i>
                  <div class="fw-bold h3 mb-0"><?= $providerStats['review_count'] ?? '0' ?></div>
                  <div class="small fw-light">Reviews</div>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card border-0 bg-secondary text-white shadow-sm">
                <div class="card-body p-3 text-center">
                  <i class="bi bi-graph-up-arrow text-warning mb-2 fs-4"></i>
                  <div class="fw-bold h3 mb-0">-</div>
                  <div class="small fw-light">Views</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Actions -->
        <div class="col-12 mb-4">
          <h6 class="fw-bold mb-3">Quick Actions</h6>
          <div class="row g-2">
            <div class="col-6">
              <div class="card border-0 bg-light shadow-sm h-100">
                <div class="card-body p-3">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-pencil-square text-primary fs-4 me-2"></i>
                    <div>
                      <h6 class="mb-0 fw-semibold">Update Profile</h6>
                      <small class="text-muted">Edit business details</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="card border-0 bg-light shadow-sm h-100">
                <div class="card-body p-3">
                  <div class="d-flex align-items-center">
                    <i class="bi bi-chat-square-text text-primary fs-4 me-2"></i>
                    <div>
                      <h6 class="mb-0 fw-semibold">Reviews</h6>
                      <small class="text-muted">View & respond</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Business Hours & Contact -->
        <div class="col-12">
          <h6 class="fw-bold mb-3">Business Information</h6>

          <!-- Hours Card -->
          <div class="card mb-3 border-0 shadow-sm">
            <div class="card-header bg-secondary text-white py-2">
              <div class="d-flex align-items-center">
                <i class="bi bi-clock fs-5 me-2"></i>
                <h6 class="mb-0">Business Hours</h6>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <div class="list-group-item d-flex justify-content-between py-2">
                  <span class="fw-medium">Monday - Friday</span>
                  <span class="text-muted"><?= $_SESSION['weekday_hours'] ?></span>
                </div>
                <div class="list-group-item d-flex justify-content-between py-2">
                  <span class="fw-medium">Saturday</span>
                  <span class="text-muted"><?= $_SESSION['saturday_hours'] ?></span>
                </div>
                <div class="list-group-item d-flex justify-content-between py-2">
                  <span class="fw-medium">Sunday</span>
                  <span class="text-muted"><?= $_SESSION['sunday_hours'] ?></span>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Info -->
          <div class="card border-0 shadow-sm">
            <div class="card-header bg-secondary text-white py-2">
              <div class="d-flex align-items-center">
                <i class="bi bi-info-circle fs-5 me-2"></i>
                <h6 class="mb-0">Contact Information</h6>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="list-group list-group-flush">
                <div class="list-group-item d-flex align-items-center py-2">
                  <i class="bi bi-telephone text-primary me-3"></i>
                  <div>
                    <div class="fw-medium">Phone Number</div>
                    <div class="text-muted small"><?= $_SESSION['phone'] ?></div>
                  </div>
                </div>
                <div class="list-group-item d-flex align-items-center py-2">
                  <i class="bi bi-envelope text-primary me-3"></i>
                  <div>
                    <div class="fw-medium">Email Address</div>
                    <div class="text-muted small"><?= $_SESSION['primary_email'] ?></div>
                  </div>
                </div>
                <div class="list-group-item d-flex align-items-center py-2">
                  <i class="bi bi-geo-alt text-primary me-3"></i>
                  <div>
                    <div class="fw-medium">Location</div>
                    <div class="text-muted small"><?= $_SESSION['street'] ?>, <?= $_SESSION['city'] ?>, <?= $_SESSION['state'] ?></div>
                  </div>
                </div>
                <?php if ($_SESSION['website']) { ?>
                  <div class="list-group-item d-flex align-items-center py-2">
                    <i class="bi bi-globe text-primary me-3"></i>
                    <div>
                      <div class="fw-medium">Website</div>
                      <div class="text-muted small"><?= $_SESSION['website'] ?></div>
                    </div>
                  </div>
                <?php } ?>
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
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
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
        <button class="btn" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/profile.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
          <i class="bi bi-gear"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- End Of Floating Footer Navigation -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
  <script>
    // Request location access
    $(document).ready(function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function() {
            console.log("Location access granted.");
          },
          function(error) {
            console.warn("Error: " + error.message);
          }
        );
      } else {
        console.warn("Geolocation is not supported by this browser.");
      }
    });
  </script>
</body>

</html>