<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Thuy" />

    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Google fonts: -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&family=Ubuntu:wght@300;400;500;700&display=swap"
      rel="stylesheet"
    />

    <!-- Library & Files: -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" href="images/orange.ico" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/mobile.css" />
    <link rel="stylesheet" href="css/form.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/tinyslider.css" />
    <link rel="stylesheet" href="css/glightbox.min.css" />

    <title>OrangeDoorhinge &mdash; Home</title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <div class="row g-0 align-items-center">
              <div class="col-2">
                <a href="index.php" class="logo m-0 float-start text-white"
                  >OrangeDoorhinge</a
                >
              </div>
              <div class="col-8 text-center">
                <ul
                  class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto"
                >
                  <li class="active"><a href="index.php">Home</a></li>
                  <li><a href="login.html">Account</a></li>
                  <li><a href="funderaiser.html">Fundraisers</a></li>
                  <?php if (isset($_SESSION["user_id"])): ?>
                  	<li><a href="php\logout.php">Logout</a></li>
                  <?php endif; ?>
                </ul>
              </div>
              <div class="col-2 text-end">
                <a
                  href="#"
                  class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light"
                >
                  <span></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <div
      class="background overlay"
      style="background-image: url('images/img1.jpg')"
    >
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-6 text-left">
            <span class="subheading-white text-white mb-3" data-aos="fade-up"
              >Fundraisers</span
            >
            <h1 class="heading text-white mb-2" data-aos="fade-up">
              Give a helping hand to those who need it!
            </h1>
            <p data-aos="fade-up" class="mb-5 text-white lead text-white-50">
              "There is no exercise better for the heart than reaching down and
              lifting people up."
            </p>
            <p data-aos="fade-up" data-aos-delay="100">
              <a
                href="#"
                class="btn btn-primary me-4 d-inline-flex align-items-center"
              >
                <span class="icon-attach_money me-2"></span
                ><span>Donate Now</span></a
              >
              <a
                href="#"
                class="text-white glightbox d-inline-flex align-items-center"
                ><span class=""></span><span>Create a fundraiser</span></a
              >
            </p>
          </div>

          <!-- <div class="col-lg-5">
					<form action="#" class="bg-white p-5 rounded donation-form" data-aos="fade-up">
						<h3>Quick Donation Form</h3>
						<div class="form-field mb-3">
							<label for="amount-1" class="amount js-amount" data-value="1.00">
								<input type="radio" id="amount-1" name="radio-amount" checked="true">
								<span>$1</span>
							</label>

							<label for="amount-2" class="amount js-amount" data-value="5.00">
								<input type="radio" id="amount-2" name="radio-amount">
								<span>$5</span>
							</label>
							<label for="amount-3" class="amount js-amount" data-value="25.00">
								<input type="radio" id="amount-3" name="radio-amount" >
								<span>$25</span>
							</label>
							<label for="amount-4" class="amount js-amount" data-value="100.00">
								<input type="radio" id="amount-4" name="radio-amount">
								<span>$100</span>
							</label>

						</div>
						<div class="field-icon">
							<span>$</span>
							<input type="text" placeholder="0.00" class="form-control px-4" name="donate-value" value="1.00">
						</div>
						<div class="form-field mb-3">
							<input type="text" placeholder="Name" class="form-control px-4">
							<input type="address" placeholder="Billing Address" class="form-control px-4">
						</div>

						<input type="submit" value="Donate now" class="btn btn-secondary w-100">
					</form>
				</div> -->
        </div>
      </div>
    </div>

    <div class="section cause-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div
            class="col-lg-6 text-center"
            data-aos="fade-up"
            data-aos-delay="100"
          >
            <span class="subheading mb-3">Fundraisers</span>
            <h2 class="heading">Featured Fundraisers</h2>
            <p>Fundraisers created by users will be displayed here.</p>

            <div
              id="features-slider-nav"
              class="mt-5 d-flex justify-content-center"
            >
              <button
                class="btn btn-primary prev d-flex align-items-center me-2"
                data-controls="prev"
              >
                <span class="icon-chevron-left"></span>
                <span class="ms-3">Prev</span>
              </button>
              <button
                class="btn btn-primary next d-flex align-items-center"
                data-controls="next"
              >
                <span class="me-3">Next</span>
                <span class="icon-chevron-right"></span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="container mb-5">
        <div
          class="features-slider-wrap position-relative"
          data-aos="fade-up"
          data-aos-delay="200"
        >
          <div class="features-slider" id="features-slider">
            <div class="item">
              <div class="causes-item bg-white">
                <a href="#"
                  ><img
                    src="images/donate4.jpg"
                    alt="Image"
                    class="img-fluid mb-4 rounded"
                /></a>
                <div class="px-4 pb-5 pt-3">
                  <h3><a href="#">Education</a></h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Soluta labore eligendi tempora laudantium voluptate, amet ad
                    libero facilis nihil officiis.
                  </p>

                  <div class="progress mb-2">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 25%"
                      aria-valuenow="25"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      25%
                    </div>
                  </div>

                  <div class="d-flex mb-4 justify-content-between amount">
                    <div>$2,500</div>
                    <div>$10,000</div>
                  </div>
                  <div>
                    <a href="#" class="btn btn-primary">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="causes-item bg-white">
                <a href="signin-form.html"
                  ><img
                    src="images/donate1.jpg"
                    alt="Image"
                    class="img-fluid mb-4 rounded"
                /></a>
                <div class="px-4 pb-5 pt-3">
                  <h3><a href="#">Natural Disaster</a></h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Soluta labore eligendi tempora laudantium voluptate, amet ad
                    libero facilis nihil officiis.
                  </p>

                  <div class="progress mb-2">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 60%"
                      aria-valuenow="60"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      60%
                    </div>
                  </div>

                  <div class="d-flex mb-4 justify-content-between amount">
                    <div>$6000</div>
                    <div>$10,000</div>
                  </div>
                  <div>
                    <a href="#" class="btn btn-primary">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="causes-item bg-white">
                <a href="#"
                  ><img
                    src="images/donate2.jpg"
                    alt="Image"
                    class="img-fluid mb-4 rounded"
                /></a>
                <div class="px-4 pb-5 pt-3">
                  <h3><a href="#">Wild Life</a></h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Soluta labore eligendi tempora laudantium voluptate, amet ad
                    libero facilis nihil officiis.
                  </p>

                  <div class="progress mb-2">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 82%"
                      aria-valuenow="82"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      82%
                    </div>
                  </div>

                  <div class="d-flex mb-4 justify-content-between amount">
                    <div>$20,500</div>
                    <div>$25,000</div>
                  </div>
                  <div>
                    <a href="#" class="btn btn-primary">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="causes-item bg-white">
                <a href="#"
                  ><img
                    src="images/donate3.jpg"
                    alt="Image"
                    class="img-fluid mb-4 rounded"
                /></a>
                <div class="px-4 pb-5 pt-3">
                  <h3><a href="#">Food</a></h3>
                  <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Soluta labore eligendi tempora laudantium voluptate, amet ad
                    libero facilis nihil officiis.
                  </p>

                  <div class="progress mb-2">
                    <div
                      class="progress-bar"
                      role="progressbar"
                      style="width: 5%"
                      aria-valuenow="5"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    >
                      5%
                    </div>
                  </div>

                  <div class="d-flex mb-4 justify-content-between amount">
                    <div>$50</div>
                    <div>$1,000</div>
                  </div>
                  <div>
                    <a href="#" class="btn btn-primary">Donate Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="widget">
              <h3>Navigation</h3>
              <ul class="list-unstyled float-left links">
                <li><a href="#">Home</a></li>
                <li><a href="funderaiser.html">Fundraisers</a></li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-3 -->

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="widget">
              <h3>Popular Fundraisers</h3>
              <ul class="list-unstyled float-left links">
                <li><a href="#">blank</a></li>
                <li><a href="#">blank</a></li>
              </ul>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="widget">
              <h3>Account</h3>
              <ul class="list-unstyled float-left links">
                <li><a href="login.html">Login</a></li>
                <li><a href="signin-form.html" target="_blank">Create an account</a></li>
              </ul>
            </div>
          </div>

          <div class="col-6 col-sm-6 col-md-6 col-lg-3">
            <div class="widget">
              <h3>Contact</h3>
              <address>123 Bla Bla Rd. Kansas City, MO</address>
              <ul class="list-unstyled links mb-4">
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li><a href="mailto:info@mydomain.com">info@domain.com</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 text-center">
            <p class="copyright">&copy; Designed by OrangeDoorhinge 2022</p>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tinyslider.js"></script>
    <script src="js/glightbox.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
