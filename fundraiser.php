<?php
session_start();
$mysqli = require __DIR__ . "\php\database.php";
$fundId = $_POST['fundId'];
$result1 = mysqli_query($mysqli, "SELECT * FROM fundraisers WHERE id = $fundId");
$result2 = mysqli_query($mysqli, "SELECT * FROM donors WHERE fundId = $fundId ORDER BY amount DESC LIMIT 5");
$row = mysqli_fetch_array($result1);
$perGoal = ($row['amount'] / $row['goal']) * 100;
?>

<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Thuy">

    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
    <!-- Google fonts: -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400;900&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Library & Files: -->
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

  <body>

      <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
          <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#"><?php echo $row["name"]?></a>
          <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!--<input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">-->
          <div class="navbar-nav">
            
          </div>
        </header>
        
        <div class="container-fluid">
          <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
              <div class="position-sticky pt-3 sidebar-sticky">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a class="nav-link" href="login.html">
                      <span data-feather="file" class="align-text-bottom"></span>
                      Sign-In
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">
                      <span data-feather="home" class="align-text-bottom"></span>
                      Homepage
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.html">
                      <span data-feather="file" class="align-text-bottom"></span>
                      Account
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="fundraiser.html">
                      <span data-feather="shopping-cart" class="align-text-bottom"></span>
                      Fundraiser
                    </a>
                  </li>
                </ul>

              
        
      
              <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                <span>Saved reports</span>
                <a class="link-secondary" href="#" aria-label="Add a new report">
                  <span data-feather="plus-circle" class="align-text-bottom"></span>
                </a>
              </h6>
              <ul class="nav flex-column mb-2">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Current month
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Last quarter
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Social engagement
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Year-end sale
                  </a>
                </li>
              </ul>
            </div>
          </nav>
      
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2"><?php echo $row["name"]?></h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                  <form action="donate.php" id="signin" method="post">
                    <button class="btn btn-sm btn-outline-secondary">Donate</button>
                    <input type="hidden" name="fundId" value=<?php echo $fundId?>>
                  </form>
                </div>
              </div>
            </div>
            <!--<body class="vh-100">
              <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src=images/img2.jpg
                      class="img-fluid" alt="img2">
                  </div>-->
            <!--<div class="progress" style="height: 20px;">
              <div class="progress-bar" style="width: 40%; height: 20px;"></div>
          </div>-->
          <div class="col-md-9 col-lg-6 col-xl-5">
            <img src=images/img3.jpg
              class="img-fluid" alt="img2">
          </div>
          <br>
          <div class="progress mb-2">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $perGoal?>%" aria-valuenow="<?php echo $perGoal?>"aria-valuemin="0" aria-valuemax="100">
            </div>
          </div>
      
            <h2>Top 5 Donors</h2>
            <div class="table-responsive">
              <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  while($row = mysqli_fetch_array($result2)) {
                  ?>
                    <tr>
                    <td><?php echo $row['firstName']?></td>
                    <td><?php echo $row['amount']?></td>
                    </tr>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
            
          </main>
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
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Funderaisers</a></li>
      
                  </ul>
                </div> <!-- /.widget -->
              </div> <!-- /.col-lg-3 -->
      
              <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="widget">
                  <h3>Popular Funderaisers</h3>
                  <ul class="list-unstyled float-left links">
                    <li><a href="#">st here</a></li>
                    <li><a href="#">st here</a></li>
                  </ul>
                </div> 
              </div> 
      
              <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="widget">
                  <h3>Account</h3>
                  <ul class="list-unstyled float-left links">
                    <li><a href="#">Create an account</a></li>
                    <li><a href="#">Profile and Settings</a></li>
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
                <p class="copyright">&copy; Designed by OrangeDoorhinge 2022
                </p>
              </div>
            </div>
          </div> <!-- /.container -->
        </div> <!-- /.site-footer -->
        
        <script src="js/bootstrap.bundle.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
        

  </body>
</html>
