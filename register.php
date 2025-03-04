<?php
require_once './vendor/autoload.php';
require_once './app/config/config.php';
?>

<body class="bg-light">
  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn" hx-get="./" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Register Business</h5>
    <div style="width: 40px"></div>
  </header>

  <section class="register-provider animate__animated animate__fadeIn animate__fast">
    <div class="container py-3">
      <div class="row justify-content-center">
        <div class="col-12">
          <!-- Progress Indicator -->
          <div class="progress mb-4" style="height: 4px;">
            <div class="progress-bar" role="progressbar" style="width: 25%;" id="progressBar"></div>
          </div>

          <!-- Step Indicators -->
          <div class="d-flex justify-content-between mb-4">
            <div class="step active" data-step="1">
              <div class="step-circle bg-primary text-white">1</div>
              <small class="step-text">Account</small>
            </div>
            <div class="step" data-step="2">
              <div class="step-circle">2</div>
              <small class="step-text">Business</small>
            </div>
            <div class="step" data-step="3">
              <div class="step-circle">3</div>
              <small class="step-text">Contact</small>
            </div>
            <div class="step" data-step="4">
              <div class="step-circle">4</div>
              <small class="step-text">Location</small>
            </div>
          </div>

          <!-- Form Steps -->
          <form id="registrationForm" class="needs-validation" novalidate>
            <!-- Step 1: Account Details -->
            <div class="form-step active" id="step1">
              <h6 class="fw-bold mb-3">Create Your Account</h6>
              <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" required>
              </div>
            </div>

            <!-- Step 2: Business Details -->
            <div class="form-step" id="step2">
              <h6 class="fw-bold mb-3">Business Information</h6>
              <div class="mb-3">
                <label class="form-label">Business Name</label>
                <input type="text" class="form-control" name="business_name" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" name="category" required>
                  <option value="">Select category</option>
                  <?php foreach (PROVIDER_CATEGORIES as $category) { ?>
                    <option value="<?= $category['name'] ?>"><?= $category['display_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label">Business Description</label>
                <textarea class="form-control" name="description" rows="3" required></textarea>
              </div>
            </div>

            <!-- Step 3: Contact Information -->
            <div class="form-step" id="step3">
              <h6 class="fw-bold mb-3">Contact Details</h6>
              <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Website (Optional)</label>
                <input type="url" class="form-control" name="website">
              </div>
              <div class="mb-3">
                <label class="form-label">Business Hours</label>
                <div class="card border-0 shadow-sm">
                  <div class="card-body p-3">
                    <div class="mb-2">
                      <label class="form-label small">Monday - Friday</label>
                      <div class="row g-2">
                        <div class="col-6">
                          <input type="time" class="form-control" name="weekday_open" required>
                        </div>
                        <div class="col-6">
                          <input type="time" class="form-control" name="weekday_close" required>
                        </div>
                      </div>
                    </div>
                    <div class="mb-2">
                      <label class="form-label small">Saturday</label>
                      <div class="row g-2">
                        <div class="col-6">
                          <input type="time" class="form-control" name="saturday_open">
                        </div>
                        <div class="col-6">
                          <input type="time" class="form-control" name="saturday_close">
                        </div>
                      </div>
                    </div>
                    <div>
                      <label class="form-label small">Sunday</label>
                      <div class="row g-2">
                        <div class="col-6">
                          <input type="time" class="form-control" name="sunday_open">
                        </div>
                        <div class="col-6">
                          <input type="time" class="form-control" name="sunday_close">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 4: Location -->
            <div class="form-step" id="step4">
              <h6 class="fw-bold mb-3">Business Location</h6>
              <div class="mb-3">
                <label class="form-label">Street Address</label>
                <input type="text" class="form-control" name="street" required>
              </div>
              <div class="row mb-3">
                <div class="col-6">
                  <label class="form-label">City</label>
                  <input type="text" class="form-control" name="city" required>
                </div>
                <div class="col-6">
                  <label class="form-label">State</label>
                  <input type="text" class="form-control" name="state" required>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label">ZIP Code</label>
                <input type="text" class="form-control" name="zip" required>
              </div>
              <div class="mb-3">
                <div id="map" style="height: 200px;" class="rounded shadow-sm"></div>
                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">
              </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between mt-4">
              <button type="button" class="btn btn-outline-secondary px-4" id="prevBtn" style="display: none;">Back</button>
              <button type="button" class="btn btn-primary px-4 ms-auto" id="nextBtn">Next</button>
              <button type="submit" class="btn btn-success px-4" id="submitBtn" style="display: none;">Complete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <style>
    .step-circle {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: #e9ecef;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 5px;
    }

    .step.active .step-circle {
      background-color: var(--bs-primary);
      color: white;
    }

    .step-text {
      color: #6c757d;
    }

    .step.active .step-text {
      color: var(--bs-primary);
      font-weight: 500;
    }

    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
      animation: fadeIn 0.5s;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>

  <script>
    $(document).ready(function() {
      let currentStep = 1;
      const totalSteps = 4;

      function updateStep(step) {
        $('.form-step').removeClass('active');
        $(`#step${step}`).addClass('active');
        
        $('.step').removeClass('active');
        $(`.step[data-step="${step}"]`).addClass('active');
        
        $('#progressBar').css('width', `${(step/totalSteps)*100}%`);
        
        $('#prevBtn').toggle(step > 1);
        $('#nextBtn').toggle(step < totalSteps);
        $('#submitBtn').toggle(step === totalSteps);
      }

      $('#nextBtn').click(function() {
        if (currentStep < totalSteps) {
          currentStep++;
          updateStep(currentStep);
        }
      });

      $('#prevBtn').click(function() {
        if (currentStep > 1) {
          currentStep--;
          updateStep(currentStep);
        }
      });

      // Initialize map on step 4
      $('#nextBtn').on('click', function() {
        if (currentStep === 4) {
          setTimeout(() => {
            const map = L.map('map').setView([33.9806, -117.3755], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
            
            let marker;
            map.on('click', function(e) {
              if (marker) marker.remove();
              marker = L.marker(e.latlng).addTo(map);
              $('#latitude').val(e.latlng.lat);
              $('#longitude').val(e.latlng.lng);
            });
          }, 100);
        }
      });

      // Form submission
      $('#registrationForm').on('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
      });
    });
  </script>
</body>