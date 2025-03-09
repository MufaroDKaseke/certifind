<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
require_once '../app/classes/db.class.php';
require_once '../app/classes/user.class.php';
require_once '../app/classes/services.class.php';
require_once '../app/classes/reviews.class.php';

$user = new User();
$services = new Services();
$reviews = new Reviews();
?>

<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn" hx-get="<?= $_ENV['SITE_URL'] ?>/user/categories.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Service Provider</h5>
    <button class="header-options-btn btn" data-bs-toggle="modal" data-bs-target="#logoutModal">
      <i class="bi bi-box-arrow-right"></i>
    </button>
  </header>
  <!-- End Of Header -->

  <?php

  if (isset($_GET['providerId'])) {
    $providerDetails = $services->getServiceByProviderId($_GET['providerId']);
  ?>
    <section class="service animate__animated animate__fadeIn animate__fast">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">
            <div class="rounded rounded-3 bg-primary p-3 text-white">
              <div class="mb-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                  <h3 class="text-capitalize mb-0"><?= $providerDetails['name'] ?></h3>
                  <?php if ($providerDetails['verified']) { ?>
                    <i class="bi bi-patch-check-fill text-primary fs-4"></i>
                  <?php } ?>
                </div>
                <div class="service-rating d-flex align-items-center justify-content-between">
                  <div class="d-flex align-items-center">
                    <?php
                    $fullStars = floor($providerDetails['avg_rating']);
                    $halfStar = ($providerDetails['avg_rating'] - $fullStars) >= 0.5 ? 1 : 0;
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
                    <span class="ms-2">(<?= $providerDetails['review_count'] ?? 0 ?> reviews)</span>
                  </div>
                  <button class="btn btn-sm btn-secondary ms-auto" data-bs-toggle="modal" data-bs-target="#leaveReviewModal">
                    Rate Us
                  </button>
                </div>
              </div>
              <ul class="service-details nav flex-column mb-3">
                <li class="nav-item">
                  <a class="nav-link text-white px-0">
                    <i class="bi bi-geo-alt me-2"></i>
                    <?= $providerDetails['street'] ?>, <?= $providerDetails['city'] ?>, <?= $providerDetails['state'] ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="tel:<?= $providerDetails['phone'] ?>" class="nav-link text-white px-0">
                    <i class="bi bi-telephone me-2"></i>
                    <?= $providerDetails['phone'] ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="mailto:<?= $providerDetails['primary_email'] ?>" class="nav-link text-white px-0">
                    <i class="bi bi-envelope me-2"></i>
                    <?= $providerDetails['primary_email'] ?>
                  </a>
                </li>
                <?php if ($providerDetails['website']) { ?>
                  <li class="nav-item">
                    <a href="<?= $providerDetails['website'] ?>" target="_blank" class="nav-link text-white px-0">
                      <i class="bi bi-globe2 me-2"></i>
                      <?= $providerDetails['website'] ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>

              <ul class="service-tab nav nav-tabs" id="serviceTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="location-tab" data-bs-toggle="tab" data-bs-target="#location" type="button" role="tab" aria-controls="location" aria-selected="true">Location</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false">About</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="hours-tab" data-bs-toggle="tab" data-bs-target="#hours" type="button" role="tab" aria-controls="hours" aria-selected="false">Hours</button>
                </li>
              </ul>
              <div class="service-tab-content tab-content" id="serviceTabContent">
                <div class="tab-pane fade show active" id="location" role="tabpanel" aria-labelledby="location-tab">
                  <p>
                    <iframe
                      class="service-map"
                      width="600"
                      height="450"
                      style="border:0"
                      loading="lazy"
                      allowfullscreen
                      referrerpolicy="no-referrer-when-downgrade"
                      src="https://www.google.com/maps?q=<?= $providerDetails['location'] . trim(' ') ?>&output=embed">
                    </iframe>
                  </p>
                </div>
                <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="about-tab">
                  <p class="mt-3"><?= htmlspecialchars($providerDetails['about']) ?></p>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                  <?php

                  $serviceReviews = $reviews->getReviewsByProvider($providerDetails['provider_id']);

                  if (!empty($serviceReviews)) {
                    foreach ($serviceReviews as $review) {
                      ?>
                      <div class="review mb-3">
                      <div class="review-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0"><?= $review['reviewer_name']?></h5>
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
                      <p><?= htmlspecialchars($review['comment']) ?></p>
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
                <div class="tab-pane fade" id="hours" role="tabpanel" aria-labelledby="hours-tab">
                  <div class="hours-list">
                    <div class="d-flex justify-content-between mb-2">
                      <span>Weekdays:</span>
                      <span><?= $providerDetails['weekday_hours'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                      <span>Saturday:</span>
                      <span><?= $providerDetails['saturday_hours'] ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                      <span>Sunday:</span>
                      <span><?= $providerDetails['sunday_hours'] ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php
  }

  ?>

  <!-- Leave a Review Modal -->
  <div class="modal fade" id="leaveReviewModal" tabindex="-1" aria-labelledby="leaveReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog vh-100 d-flex align-items-center">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="leaveReviewModalLabel">Leave a Review</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="leaveReviewForm" hx-post="<?= $_ENV['SITE_URL'] ?>/app/views/submit_review.php" hx-trigger="submit" hx-target="#reviews" hx-swap="outerHTML">
            <div class="mb-3">
              <label for="rating" class="form-label">Rating</label>
              <div id="rating" class="star-rating d-flex align-items-center justify-content-around">
                <b class="mx-2 text-secondary">1</b>
                <i class="bi bi-star" data-value="1" style="font-size: 2rem;"></i>
                <i class="bi bi-star" data-value="2" style="font-size: 2rem;"></i>
                <i class="bi bi-star" data-value="3" style="font-size: 2rem;"></i>
                <i class="bi bi-star" data-value="4" style="font-size: 2rem;"></i>
                <i class="bi bi-star" data-value="5" style="font-size: 2rem;"></i>
                <b class="mx-2 text-secondary">5</b>
              </div>
              <input type="hidden" name="rating" id="ratingInput" value="0">
            </div>
            <div class="mb-3">
              <label for="comment" class="form-label">Comment</label>
              <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Leave your comment here" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End of Leave a Review Modal -->

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