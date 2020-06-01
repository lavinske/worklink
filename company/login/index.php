<?php
include_once("../../config.php");
$err = 0;
$jancoked = 0;
if(isset($_COOKIE['loggedcompany']) && isset($_COOKIE['token'])){
  $sql_check = "SELECT *
                  FROM company 
                  WHERE 
                       username=? 
                       AND 
                       enckey=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $uname, $token);

    $uname = base64_decode(base64_decode($_COOKIE['loggedcompany']));
    $token = $_COOKIE['token'];

    $check_log->execute();

    $check_log->store_result();

    if ($check_log->num_rows == 1 )
      header('location:../home');
    if ($check_log->num_rows == 0 ){
      $err = 1;
      $error_txt = "Session Expired! Please Log In again!";
    }
    $check_log->close();


    

  }

if(isset($_GET['tok'])) { 
  $jassy = $_GET['tok'];
  $err = 1;
  switch($jassy){
    case 2389:
      $error_txt = "Username and/or Password are Invalid!";
      break;
    case 8905:
      $error_txt = "You are suspended! Contact ".$email;
      break;
    default:
      $err = 0;
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <?php include("../../app-assets/inc/head.inc"); ?>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Login Page Starts-->
<section id="login">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">
            <div class="card-body login-img">
              <div class="row m-0">
                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                  <img src="../../app-assets/img/gallery/login.png" alt="" class="img-fluid mt-5" width="400" height="230">
                </div>
                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                  <h1><div class="text align-middle"><?php echo $namapersh; ?></div></h1>
                  <h4 class="mb-2 card-title">Company Login</h4>
                  <p class="card-text mb-2">
                    <?php if(!$err) { ?>
                    Welcome back, partner! Please login to your account.
                  <?php } else { ?><div class="alert alert-dark" role="alert">
  <?php echo $error_txt; ?>
</div><?php } ?>
                  </p>
                  <form action="check-login.php" method="post">
                  <div class="position-relative has-icon-left">
                  <input type="text" class="form-control mb-2" name="username" placeholder="Username" required><div class="form-control-position"><i class="ft-user danger"></i></div></input>
                  </div>
                  <div class="position-relative has-icon-left">
                  <input type="password" class="form-control mb-2" name="password" placeholder="Password" required><div class="form-control-position"><i class="ft-lock danger"></i></div></input>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="remember-me">
                      <div class="custom-control custom-checkbox custom-control-inline mb-3">
                        <input type="checkbox" id="rememe" name="rememe" class="custom-control-input" />
                        <label class="custom-control-label" for="rememe">
                          Remember Me
                        </label>
                      </div>
                    </div>
                    <div class="forgot-password-option">
                      <a href="forgot-password-page.html" class="text-decoration-none text-primary">Forgot Password
                        ?</a>
                    </div>
                  </div>
                  <div class="fg-actions d-flex justify-content-between">
                    <div class="login-btn">
                      <button type="button" class="btn btn-outline-primary">
                        <a href="../register" class="text-decoration-none">Register</a>
                      </button>
                    </div>
                    <div class="recover-pass">
                      <button type="submit" class="btn btn-primary">
                        <a class="text-decoration-none text-white">Login</a>
                      </button>
                    </div>
                  </div>
                </form>
                  <hr class="m-0">
                  <div class="d-flex justify-content-between mt-3 mb-2">
                    <div class="option-login">
                      <h6 class="text-decoration-none text-primary">&copy; <?php echo $tahuncode . " " . $namapersh; if($showdev) echo " by " . $devteam; ?></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Login Page Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="../../app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="../../app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../../app-assets/vendors/js/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="../../app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="../../app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="../../app-assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../app-assets/js/dashboard1.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>