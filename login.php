<body>

  <!-- Back Button -->
  <button type="button" class="btn btn__back" hx-get="index.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML">
    <i class="bi bi-chevron-left"></i>
  </button>

  <section class="login bg-primary animate__animated animate__fadeIn animate__fast">
    <div class="container">
      <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-10">
          <form action="">
            <h1 class="text-center text-white fw-semibold mb-4">Login</h1>
            <div class="form-group mb-3">
              <label for="username" class="form-label fw-semibold text-white">Username</label>
              <div class="input-group">
                <div class="input-group-text bg-primary text-white">
                  <i class="bi bi-person"></i>
                </div>
                <input type="text" name="username" id="username" placeholder="Username" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="form-label fw-semibold text-white">Password</label>
              <div class="input-group">
                <div class="input-group-text bg-primary text-white">
                  <i class="bi bi-shield-lock"></i>
                </div>
                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
              </div>
            </div>
            <hr class="mx-auto w-75 my-3">
            <div class="form-group">
              <button class="btn btn-secondary rounded-pill w-100">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <form action=""></form>
</body>