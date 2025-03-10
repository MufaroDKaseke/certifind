<body class="bg-primary">
  <!-- Back Button -->
  <button type="button" class="btn btn__back" hx-get="user-welcome.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
    <i class="bi bi-chevron-left"></i>
  </button>

  <section class="register-provider animate__animated animate__fadeInRight animate__fast">
    <div class="container py-4">
      <div class="row justify-content-center">
        <div class="col-11">
          <h1 class="text-center display-3 text-white fw-semibold mb-4">Sign Up</h1>

          <form id="signupForm" class="needs-validation" novalidate>
            <div class="card border-0 bg-white rounded-3 shadow">
              <div class="card-body p-4">
                <h6 class="fw-bold mb-3 text-primary">Create Your Account</h6>
                
                <div class="mb-3">
                  <label class="form-label text-dark">Full Name</label>
                  <input type="text" class="form-control border-0 bg-light" name="name" required>
                </div>

                <div class="mb-3">
                  <label class="form-label text-dark">Email Address</label>
                  <input type="email" class="form-control border-0 bg-light" name="email" required>
                </div>

                <div class="mb-3">
                  <label class="form-label text-dark">Username</label>
                  <input type="text" class="form-control border-0 bg-light" name="username" required>
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
            <div class="d-grid">
              <button type="submit" class="btn btn-secondary rounded-pill mt-2 py-2">Create Account</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      $('#signupForm').on('submit', function(e) {
        e.preventDefault();
        // Add your form submission logic here
      });
    });
  </script>
</body>