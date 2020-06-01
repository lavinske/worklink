<?php
include('../../app-assets/inc/adminheader.php');
if(isset($_GET["id"])){
}else{
// header('location: ../home');
}
?>
<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <?php include('../../app-assets/inc/head.inc'); ?>
  <!-- END : Head-->
  <!-- BEGIN : Body-->
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <!-- main menu-->
      <?php include('../../app-assets/inc/mm-adm.inc'); ?>
      <!-- / main menu-->
      <!-- Navbar (Header) Starts-->
      <?php include('../../app-assets/inc/header-adm.inc'); ?>
      <!-- Navbar (Header) Ends-->
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-sm-12">
                <div class="content-header">Settings - 
                  <?php echo $namapersh; ?>
                </div>
              </div>
            </div>
            <!-- Bubble Editor start -->
            <section class="quill-editor">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Main Function
                      </h4>
                      <div class="card-content">
                        <div class="card-body">
                          <form method="post" action="">
                          <div class="input-group input-group-md">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="sitename">Site Name</label>
                              </div>
                              <input id="sitename" name="sitename" type="text" class="form-control" value="<?php echo $namapersh; ?>">
                            </div>
                            <div class="input-group input-group-md">
                              <div class="input-group-prepend">
                               <label class="input-group-text" for="currency">Currency</label>
                              </div>
                              <input id="currency" name="currency" type="text" class="form-control" value="<?php echo $currency; ?>" required>
                            </div>
                            <div class="input-group input-group-md">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="linkprefix">Link Prefix (subfolder)</label>
                              </div>
                              <input id="linkprefix" name="linkprefix" type="text" class="form-control" value="<?php echo $linkprefix; ?>" required>
                            </div>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <label class="input-group-text" for="inputGroupSelect01">Options</label>
                            </div>
                            <select name="showdev" class="custom-select" id="inputGroupSelect01" disabled  required>
                              <option selected value="hide" disabled>Hide Developer</option>
                              <option value="show" disabled>Show Developer</option>
                            </select>
                          </div>

                            <hr>
                          </form>
                          <div class="align-self-center mr-3 float-right mb-2">
                            <button type="submit" class="btn btn-success btn-lg">
                              Update
                            </button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Financial Function
                      </h4>
                      <div class="card-content">
                        <div class="card-body">
                          <form method="post" action="">
                            <div class="input-group input-group-md">
                              <div class="input-group-prepend">
                                <label class="input-group-text" for="rekening">Nomor Rekening</label>
                              </div>
                              <input id="rekening" name="rekening" type="text" class="form-control" value="<?php echo $norek; ?>" required="">
                            </div>

                          </div>
                          </form>
                          <hr>
                          <div class="align-self-center mr-3 float-right mb-2">
                            <button type="submit" class="btn btn-success btn-lg">
                              Update
                            </button>
                          
                          </div>
                        </div>
  

                  </div>
                </div>
                </section>
              <!-- Bubble Editor end -->
              <!-- Snow Editor end -->
              </div>
          </div>
          <!-- END : End Main Content-->
          <!-- BEGIN : Footer-->
          <?php include('../../app-assets/inc/footer.inc'); ?>
          <!-- End : Footer-->
        </div>
      </div>
      <!-- ////////////////////////////////////////////////////////////////////////////-->
      <!-- START Notification Sidebar-->
      <!-- END Notification Sidebar-->
      <!-- Theme customizer Starts-->
      <?php include('../../app-assets/inc/themecustomizer.inc');?>
      <!-- Theme customizer Ends-->
      <?php include('../../app-assets/inc/user-js-bawah.inc');?>
      <!-- BEGIN PAGE LEVEL JS-->
      <script src="../../app-assets/js/data-tables/datatable-api.js" type="text/javascript">
      </script>
      <!-- END PAGE LEVEL JS-->
      </body>
    <!-- END : Body-->
    </html>
