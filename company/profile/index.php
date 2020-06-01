<?php include('../../app-assets/inc/companyheader.php'); ?>
<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <?php include('../../app-assets/inc/head.inc'); ?>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper sidebar-lg">


      <!-- main menu-->
      <?php include('../../app-assets/inc/mm-comp.inc'); ?>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      <?php include('../../app-assets/inc/header-comp.inc'); ?>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--User Profile Starts-->
<!--Basic User Details Starts-->
<section id="user-profile">
  <div class="row">
    <div class="col-12">
      <div class="card profile-with-cover">
        <div class="card-img-top img-fluid bg-cover height-300" style="background: url('../../app-assets/img/photos/14.jpg') 50%;"></div>
        <div class="media profil-cover-details row">
          <div class="col-5">
            <div class="align-self-start halfway-fab pl-3 pt-2">
              <div class="text-left">
                <h3 class="card-title white"><?php echo $fname." ".$lname;?></h3>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="align-self-center halfway-fab text-center">
              <a class="profile-image">
                <img width="100px" height="100px" src="../../profile_pic/<?= $photo == "" ? "default.jpg" : $photo;?>" class="rounded-circle img-border gradient-summer width-100"
                  alt="Card image">
              </a>
            </div>
          </div>
        </div>
        <div class="profile-section">
          <div class="row">
            <div class="col-lg-12 col-md-12 text-center">
              <span class="font-medium-2 text-uppercase"><?php echo $fname;?></span>
              <p class="grey font-small-2"><?= $companyname; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Basic User Details Ends-->

<!--About section starts-->
<section id="about">
  <div class="row">
    <div class="col-12">
      <div class="content-header">About</div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5>Company Information</h5>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="mb-3">
              <span class="text-bold-500 primary">Company Name:</span>
              <span class="d-block overflow-hidden"><?php echo $companyname; ?></span>
              <span class="text-bold-500 primary">Company Address:</span>
              <span class="d-block overflow-hidden"><?php echo $caddress; ?>
              </span>
            </div>
            <hr>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                    <a href="mailto:<?php echo $cemail; ?>" class="d-block overflow-hidden"><?php echo $cemail; ?></a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                    <span class="d-block overflow-hidden"><?php echo $cphone; ?></span>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-book font-small-3"></i> Joined:</a></span>
                    <span class="d-block overflow-hidden"><?php echo $fJoined; ?></span>
                  </li>
                </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>
<!--About section ends-->

          </div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <?php include('../../app-assets/inc/footer.inc'); ?>
        <!-- End : Footer-->

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <!-- Theme customizer Starts-->
    <?php include('../../app-assets/inc/themecustomizer.inc');?>
    <!-- Theme customizer Ends-->
    <?php include('../../app-assets/inc/user-js-bawah.inc');?>
  </body>
  <!-- END : Body-->
</html>