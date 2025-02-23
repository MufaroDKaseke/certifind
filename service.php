<body>

  <!--   <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script> -->

  <section class="service">
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-12">
          <div class="rounded rounded-3 bg-primary p-3 text-white">
            <div class="mb-3">
              <h3>Service Name</h3>
              <div class="service-rating d-flex align-items-center">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </div>
            </div>
            <ul class="service-details nav flex-column mb-3">
              <li class="nav-item">
                <a href="#" class="nav-link text-white px-0">
                  <i class="bi bi-geo-alt me-2"></i>
                  3 McNeillie, Something
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white px-0">
                  <i class="bi bi-telephone me-2"></i>
                  3 McNeillie, Something
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link text-white px-0">
                  <i class="bi bi-globe2 me-2"></i>
                  https://momo.co.zw
                </a>
              </li>
            </ul>

            <ul class="service-tab nav nav-tabs" id="serviceTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">Location</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="hours-tab" data-bs-toggle="tab" data-bs-target="#hours" type="button" role="tab" aria-controls="hours" aria-selected="false">Hours</button>
              </li>
            </ul>
            <div class="service-tab-content tab-content" id="serviceTabContent">
              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <p>
                <div class="service-map"></div>
                </p>
              </div>
              <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <p>Customer reviews will be displayed here.</p>
              </div>
              <div class="tab-pane fade" id="hours" role="tabpanel" aria-labelledby="hours-tab">
                <p>Service hours information.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    $(document).ready(function() {
      var $mapContainer = $(".service-map");

      if ($mapContainer.length) {
        var location = [28.6323397, -20.1803634]; // Example: New York City
        var map = L.map($mapContainer[0]).setView(location, 12);

        // Add OpenStreetMap tiles
        /* L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map); */

        // Add a marker
        L.marker(location).addTo(map)
          .bindPopup('Business Name')
          .openPopup();
      }
    });
  </script>

</body>