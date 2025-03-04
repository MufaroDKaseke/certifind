<?php
require_once './vendor/autoload.php';
require_once './app/config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certifind</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./vendor/twbs/bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./assets/css/custom.css">
  <link rel="stylesheet" href="./assets/css/style.css">

  
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

</head>

<body class="bg-primary">

  <section class="welcome">
    <div class="container animate__animated animate__zoomIn animate__fast">
      <div class="row vh-100 align-items-center justify-content-center">
        <div class="col-10 text-center">
          <span class="welcome-icon mb-5">
            <i class="bi bi-binoculars text-white"></i>
          </span>
          <h1 class="text-white mb-4 fw-semibold">Welcome Back</h1>
          <button hx-get="./user/login.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="btn btn-outline-primary w-100 bg-white rounded-pill mb-2">Login</button>
          <button hx-get="./user/signup.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="btn btn-secondary w-100 rounded-pill">Signup</button>
          <hr class="mx-auto w-75 mb-3">
          <button hx-get="./register.php" hx-trigger="click" hx-target="body" hx-swap="outerHTML" class="btn btn-outline-light w-100 rounded-pill text-capitalize text-white">I am a business</button>
        </div>
      </div>
    </div>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/htmx.org@2.0.4" integrity="sha384-HGfztofotfshcF7+8n44JQL2oJmowVChPTg48S+jvZoztPfvwD79OC/LTtG6dMp+" crossorigin="anonymous"></script>
</body>

</html>