<?php
session_start();
$mysqli = require __DIR__ . "\php\database.php";
$userId = $_SESSION["user_id"];
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
    <link rel="stylesheet" href="css/mobile.css" />
    <link rel="stylesheet" href="css/settings.css" />
    <link rel="stylesheet" href="css/navbar2.css" />

    <title>OrangeDoorhinge &mdash; Settings</title>
  </head>

  <body>
    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <div class="row g-0 align-items-center">
              <div class="col-8 text-center">
                <ul
                  class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto"
                >
                  <li class="active"><a href="index.php">Home</a></li>
                  <li><a href="fundraiser.html">Fundraisers</a></li>
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

    <section class="py-5 my-5">
      <div class="container">
        <h1 class="mb-5">Account Settings</h1>
        <div class="bg-white shadow rounded-lg d-block d-sm-flex">
          <div class="profile-tab-nav border-right">
            <div class="p-4">
              <h4 class="text-center">General</h4>
            </div>
            <div
              class="nav flex-column nav-pills"
              id="v-pills-tab"
              role="tablist"
              aria-orientation="vertical"
            >
              <a
                class="nav-link active"
                id="account-tab"
                data-toggle="pill"
                href="#account"
                role="tab"
                aria-controls="account"
                aria-selected="true"
              >
                <i class="fa fa-home text-center mr-1"></i>
                Personal Information
              </a>
              <a
                class="nav-link"
                id="password-tab"
                data-toggle="pill"
                href="#password"
                role="tab"
                aria-controls="password"
                aria-selected="false"
              >
                <i class="fa fa-key text-center mr-1"></i>
                Change Password
              </a>
              <a
                class="nav-link"
                id="fundraiser-tab"
                data-toggle="pill"
                href="#fundraisers"
                role="tab"
                aria-controls="fundraiser"
                aria-selected="false"
              >
                <i class="fa fa-tv text-center mr-1"></i>
                Fundraisers
              </a>
            </div>
          </div>
          <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
            <div
              class="tab-pane fade show active"
              id="account"
              role="tabpanel"
              aria-labelledby="account-tab"
            >
            <form action="php\update-stuff.php" method="post">
              <h3 class="mb-4">Account Information</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>First Name</label>
                    <input name="newFName" type="text" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Last Name</label>
                    <input name="newLName" type="text" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input name="newMail" type="email" class="form-control" />
                    <input type="hidden" name="userId" value=<?php echo $userId?>>
                  </div>
                </div>
              </div>
              <div>
                <button class="btn btn-primary">Update</button>
                <a href="index.php">
                  <button class="btn btn-light">Cancel</button>
                </a>
              </div>
              </form>
            </div>
            <div
            class="tab-pane fade"
            id="password"
            role="tabpanel"
            aria-labelledby="password-tab"
            >
              <form action="php\update-pass.php" method="post">
                <h3 class="mb-4">Password Settings</h3>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Old password</label>
                      <input name="oldPass" type="password" class="form-control" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>New password</label>
                      <input name="newPass1" type="password" class="form-control" />
                      <input type="hidden" name="userId" value=<?php echo $userId?>>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Confirm new password</label>
                      <input name="newPass2" type="password" class="form-control" />
                    </div>
                  </div>
                </div>
                <div>
                  <button class="btn btn-primary">Update</button>
                  <a href="index.php">
                    <button class="btn btn-light">Cancel</button>
                  </a>
                </div>
              </form>
            </div>
            <div
              class="tab-pane fade"
              id="fundraisers"
              role="tabpanel"
              aria-labelledby="fundraiser-tab"
            >
              <h3 class="mb-4">Fundraisers</h3>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <table>
                      <thead>
                        <tr>
                          <td>Name</td>
                          <td>Goal</td>
                          <td>Current Amount</td>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $results = mysqli_query($mysqli, "SELECT * FROM fundraisers WHERE userId = $userId");
                          while($row = mysqli_fetch_array($results)) {
                        ?>
                          <tr>
                            <td>
                              <form action="fundraiser.php" id="signin" method="post">
                                <button class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" <a href="#"
                                  class="trigger-btn" data-toggle="modal"><?php echo $row['name']?>
                                </button>
                                <input type="hidden" name="fundId" value=<?php echo $row['id']?>>
                              </form>
                            </td>
                            <td><?php echo $row['goal']?></td>
                            <td><?php echo $row['amount']?></td>
                          </tr>

                          <?php
                            }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div>
            </div>
          </div>
        </div>
      </div>
      
    </section>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/bootstrapcdn.min.js"></script>
    <script src="js/navbar.js"></script>
  </body>
</html>
