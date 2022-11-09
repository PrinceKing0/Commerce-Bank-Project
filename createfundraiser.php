<?php
session_start();
$userId = $_SESSION["user_id"];
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Thuy">
    
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
    <!-- Google fonts: -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

    

    

  

    <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Library & Files: -->
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="form-validation.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/orange.ico">
    <link rel="stylesheet" href="css/tiny-slider.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/glightbox.min.css">
    <link rel="stylesheet" href="css/styles.css"> 
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/assets.css">
    <link href="css/dashboard.css" rel="stylesheet">

    <title>OrangeDoorhinge &mdash; Fundraisers</title>

  </head>
  <body class="bg-light">
      
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <img class="d-block mx-auto mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
          <h2>Creation Form</h2>
          <p class="lead">Here you can create your own fundraiser page.</p>
        </div>
    
        <div class="row g-5">
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">Your cart</span>
              <span class="badge bg-primary rounded-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Product name</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$12</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Second product</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$8</span>
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Third item</h6>
                  <small class="text-muted">Brief description</small>
                </div>
                <span class="text-muted">$5</span>
              </li>
            </ul>
          </div>
          
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Information</h4>
            <form class="needs-validation" novalidate="" action="\php\create-fundraiser.php" method="post">
              <div class="row g-3">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">Fundraiser Title</label>
                  <input type="text" class="form-control" name="title" id="firstName" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                    Fundraiser Title.
                  </div>
                </div>
    
                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Fundraiser Description</label>
                  <input type="text" class="form-control" name="description" id="lastName" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                    Fundraiser Description.
                  </div>
                </div>
    
                
                <div class="col-12">
                  <label for="address" class="form-label">Fund Amount</label>
                  <input type="text" class="form-control" name="amount" id="address" placeholder="" required="">
                  <div class="invalid-feedback">
                    Please enter your amount.
                  </div>
                </div>
    
                
              <hr class="my-4">
    
              <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </form>
          </div>
        </div>
      </main>
    
    </div>
    
    
        <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
          <script src="form-validation.js"></script>
      
    
    </body>
  </html>