<body>

  <!-- Header -->
  <header class="header d-flex align-items-center justify-content-between">
    <button class="header-back-btn btn">
      <i class="bi bi-chevron-left"></i>
    </button>
    <h5 class="mb-0 text-center">Catgeories</h5>
    <button class="header-options-btn btn">
      <i class="bi bi-filter-right"></i>
    </button>
  </header>
  <!-- End Of Header -->


  <section class="verification-request">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="">
            <div class="form-group mb-3">
              <label for="businessName">Business Name</label>
              <input type="text" class="form-control" id="businessName" name="businessName" placeholder="Enter your business name" required>
            </div>
            <div class="form-group mb-3">
              <label for="businessEmail">Business Email</label>
              <input type="email" class="form-control" id="businessEmail" name="businessEmail" placeholder="Enter your business email" required>
            </div>
            <div class="form-group mb-3">
              <label for="document1">Document 1</label>
              <input type="file" class="form-control-file" id="document1" name="document1" required>
            </div>
            <div class="form-group mb-3">
              <label for="document2">Document 2</label>
              <input type="file" class="form-control-file" id="document2" name="document2" required>
            </div>
            <hr class="my-3 border-primary">
            <div class="form-group mb-3">
              <label for="extraInfo">Extra Information</label>
              <textarea class="form-control" id="extraInfo" name="extraInfo" rows="3" placeholder="Enter any extra information"></textarea>
            </div>
            <button type="submit" class="btn w-100 btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Floating Footer Navigation -->
  <div class="footer w-100">
    <div class="row justify-content-between m-0 p-2 rounded rounded-3 bg-secondary">
      <div class="col-3 text-center">
        <button class="btn active">
          <i class="bi bi-house"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn">
          <i class="bi bi-search"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn">
          <i class="bi bi-briefcase"></i>
        </button>
      </div>
      <div class="col-3 text-center">
        <button class="btn">
          <i class="bi bi-gear"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- End Of Floating Footer Navigation -->
</body>