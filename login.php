<body>

  <section class="login">
    <div class="container">
      <div class="row">
        <div class="col-9">
          <form action="">
            <h3>Login</h3>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
              <button hx-get="index.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <form action=""></form>
</body>