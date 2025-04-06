<?php
require_once '../vendor/autoload.php';
require_once '../app/config/config.php';
?>

<body class="bg-primary">

  <!-- Back Button -->
  <button type="button" class="btn btn__back" hx-get="index.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
    <i class="bi bi-chevron-left"></i>
  </button>

  <section class="register-provider animate__animated animate__fadeInRight animate__fast">
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-11">
          <h1 class="text-center display-3 text-white fw-semibold mb-4">Register</h1>
          
          <!-- Response Messages -->
          <div id="response-div"></div>

          <!-- Progress Indicator -->
          <div class="progress mb-4" style="height: 4px;">
            <div class="progress-bar bg-white" role="progressbar" style="width: 25%;" id="progressBar"></div>
          </div>

          <!-- Step Indicators -->
          <div class="d-flex justify-content-between mb-4">
            <div class="step active" data-step="1">
              <div class="step-circle">1</div>
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
          <form id="registrationForm" class="needs-validation" 
                hx-post="<?= $_ENV['SITE_URL']?>/app/views/register_provider.php"
                hx-trigger="submit"
                hx-target="#response-div"
                hx-swap="innerHTML"
                novalidate>
            <!-- Step 1: Account Details -->
            <div class="form-step active" id="step1">
              <div class="card border-0 bg-white rounded-3 shadow">
                <div class="card-body p-4">
                  <h6 class="fw-bold mb-3 text-primary">Create Your Account</h6>
                  <div class="mb-3">
                    <label class="form-label text-dark">Business Name</label>
                    <input type="text" class="form-control border-0 bg-light" name="business_name" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label text-dark">Email Address</label>
                    <input type="email" class="form-control border-0 bg-light" name="email" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label text-dark">Password</label>
                    <input type="password" class="form-control border-0 bg-light" name="password" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label text-dark">Confirm Password</label>
                    <input type="password" class="form-control border-0 bg-light" name="confirm_password" required>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 2: Business Details -->
            <div class="form-step" id="step2">
              <div class="card border-0 bg-white rounded-3 shadow">
                <div class="card-body p-4">
                  <h6 class="fw-bold mb-3 text-primary">Business Information</h6>
                  <div class="mb-3">
                    <label class="form-label text-dark">Business Name</label>
                    <input type="text" class="form-control border-0 bg-light" name="business_name" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label text-dark">Category</label>
                    <select class="form-select border-0 bg-light" name="category" required>
                      <option value="">Select category</option>
                      <?php foreach (PROVIDER_CATEGORIES as $category) { ?>
                        <option value="<?= $category['name'] ?>"><?= $category['display_name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label text-dark">Business Description</label>
                    <textarea class="form-control border-0 bg-light" name="about" rows="3" required></textarea>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 3: Contact Information -->
            <div class="form-step" id="step3">
              <div class="card border-0 bg-white rounded-3 shadow">
                <div class="card-body p-4">
                  <h6 class="fw-bold mb-3 text-primary">Contact Details</h6>
                  <div class="mb-3">
                    <label class="form-label text-dark">Phone Number</label>
                    <input type="tel" class="form-control border-0 bg-light" name="phone" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label text-dark">Website (Optional)</label>
                    <input type="url" class="form-control border-0 bg-light" name="website">
                  </div>
                  <div class="mb-3">
                    <label class="form-label text-dark">Business Hours</label>
                    <div class="card border-0 shadow-sm">
                      <div class="card-body p-3">
                        <div class="mb-2">
                          <label class="form-label small text-dark">Monday - Friday</label>
                          <div class="row g-2">
                            <div class="col-6">
                              <input type="time" class="form-control border-0 bg-light" name="weekday_open" required>
                            </div>
                            <div class="col-6">
                              <input type="time" class="form-control border-0 bg-light" name="weekday_close" required>
                            </div>
                          </div>
                        </div>
                        <div class="mb-2">
                          <label class="form-label small text-dark">Saturday</label>
                          <div class="row g-2">
                            <div class="col-6">
                              <input type="time" class="form-control border-0 bg-light" name="saturday_open">
                            </div>
                            <div class="col-6">
                              <input type="time" class="form-control border-0 bg-light" name="saturday_close">
                            </div>
                          </div>
                        </div>
                        <div>
                          <label class="form-label small text-dark">Sunday</label>
                          <div class="row g-2">
                            <div class="col-6">
                              <input type="time" class="form-control border-0 bg-light" name="sunday_open">
                            </div>
                            <div class="col-6">
                              <input type="time" class="form-control border-0 bg-light" name="sunday_close">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Step 4: Location -->
            <div class="form-step" id="step4">
              <div class="card border-0 bg-white rounded-3 shadow">
                <div class="card-body p-4">
                  <h6 class="fw-bold mb-3 text-primary">Business Location</h6>
                  <div class="mb-3">
                    <label class="form-label text-dark">Street Address</label>
                    <input type="text" class="form-control border-0 bg-light" name="street" required>
                  </div>
                  <div class="row mb-3">
                    <div class="col-6">
                      <label class="form-label text-dark">City</label>
                      <input type="text" class="form-control border-0 bg-light" name="city" required>
                    </div>
                    <div class="col-6">
                      <label class="form-label text-dark">State</label>
                      <input type="text" class="form-control border-0 bg-light" name="state" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div id="map" style="height: 200px;" class="rounded shadow-sm"></div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                  </div>
                </div>
              </div>
            </div>

            <!-- Navigation Buttons -->
            <div class="d-flex justify-content-between mt-4">
              <button type="button" class="btn btn-outline-light px-4" id="prevBtn" style="display: none;">Back</button>
              <button type="button" class="btn btn-secondary px-4 ms-auto" id="nextBtn">Next</button>
              <button type="submit" class="btn btn-secondary px-4" id="submitBtn" style="display: none;">Complete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <style>
    .btn__back {
      position: fixed;
      top: 1rem;
      left: 1rem;
      color: white;
      z-index: 1000;
    }

    .btn__back:hover {
      color: rgba(255,255,255,0.8);
    }

    .step-circle {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      background-color: rgba(255,255,255,0.2);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 5px;
      color: white;
    }

    .step.active .step-circle {
      background-color: white;
      color: var(--bs-primary);
    }

    .step-text {
      color: rgba(255,255,255,0.7);
    }

    .step.active .step-text {
      color: white;
      font-weight: 500;
    }

    .form-step {
      display: none;
    }

    .form-step.active {
      display: block;
      animation: fadeIn 0.5s;
    }

    .form-control:focus {
      background-color: #fff;
      box-shadow: none;
      border-color: var(--bs-primary);
    }

    .form-control::placeholder {
      color: #adb5bd;
    }

    .form-select:focus {
      box-shadow: none;
      border-color: var(--bs-primary);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
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

      // Form submission - remove the old handler and add new one
      $('#registrationForm').on('htmx:afterRequest', function(e) {
        if (e.detail.successful) {
          // If response contains redirect script, form was successful
          if (e.detail.xhr.response.includes('window.location.href')) {
            // Disable form controls
            $('#registrationForm :input').prop('disabled', true);
            $('#nextBtn, #prevBtn, #submitBtn').hide();
          }
        }
      });
    });
  </script>
</body>