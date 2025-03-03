<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/provider.class.php';
require_once '../app/classes/reviews.class.php';

$user = new Provider();
$reviews = new Reviews();

$serviceReviews = $reviews->getReviewsByProvider($_SESSION['provider_id']);
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn btn-sm" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Reviews</h5>
    <button class="header-options-btn btn btn-sm" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <section class="reviews">
    <div class="container">
      <div class="row">
        <div class="col-12 rounded rounded-3 bg-secondary text-white p-3">
          <?php
          if (!empty($serviceReviews)) {
            foreach ($serviceReviews as $review) {
          ?>
              <div class="review mb-3">
                <div class="review-header d-flex justify-content-between align-items-center">
                  <h5 class="mb-0">user</h5>
                  <div class="review-rating">
                    <?php
                    $fullStars = floor($review['rating']);
                    $halfStar = ($review['rating'] - $fullStars) >= 0.5 ? 1 : 0;
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
                </div>
                <div class="review-body">
                  <p><?= htmlspecialchars($review['comment']); ?></p>
                </div>
              </div>
              <hr />
          <?php
            }
          } else {
            echo '<p>No reviews available.</p>';
          }

          ?>
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
        <button class="btn active" hx-get="<?= $_ENV['SITE_URL'] ?>/provider/reviews.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
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


  <script>
    $(document).ready(function() {
      const stars = document.querySelectorAll('.star-rating .bi-star');
      const ratingInput = document.getElementById('ratingInput');

      stars.forEach(star => {
        star.addEventListener('click', function() {
          const value = this.getAttribute('data-value');
          ratingInput.value = value;

          stars.forEach(s => {
            s.classList.remove('bi-star-fill');
            s.classList.add('bi-star');
          });

          for (let i = 0; i < value; i++) {
            stars[i].classList.remove('bi-star');
            stars[i].classList.add('bi-star-fill');
          }
        });
      });
    });
  </script>

</body>