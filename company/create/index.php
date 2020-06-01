<?php

include('../../app-assets/inc/companyheader.php');

if(isset($_POST['createjob'])){
$errors = array();

    // REGISTER USER
  // receive all input values from the form
  $title = mysqli_real_escape_string($dbconnect, $_POST['name']);
  $deadline = $_POST['deadline'];
  $amount = $_POST['amount'];
  $details = mysqli_real_escape_string($dbconnect, $_POST['details']);
  $trigger = array("\\b", "\\eb", "\\u", "\\eu", "\\i", "\\ei","\\nl");
$rtf   = array("<b>", "</b>", "<u>","</u>","<i>","</i>","<br/>");
$detailsok = str_replace($trigger, $rtf, $details);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($deadline)) { array_push($errors, "Deadline is required"); }
  if (empty($amount)) { array_push($errors, "Amount is required"); }
  if (empty($detailsok)) { array_push($errors, "Details is required"); }



  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO work (cID, name, details, amount, duration) 
              VALUES('$uname', '$title', '$detailsok', '$amount', '$deadline')";
    $sql = mysqli_query($dbconnect, $query);

if ($dbconnect->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $query . "<br>" . $dbconnect->error;
}

$dbconnect->close();
    header('location: ../home');
  }

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
      <?php include('../../app-assets/inc/mm-comp.inc'); ?>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
     <?php include('../../app-assets/inc/header-comp.inc'); ?>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!-- Basic form layout section start -->
<section id="horizontal-form-layouts">
  <div class="row">
    <div class="col-sm-12"> 
      <div class="content-header">Formulir lowongan kerja</div>
    </div>
  </div>
  

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title" id="horz-layout-icons">Buat Lowonganmu</h4>
          <p class="mb-0 text-muted">Tuliskan attribut-attribut pekerjaanmu dengan sedetail mungkin! </p>
          <p></p>
        </div>
        <div class="card-content">
          <div class="px-3">
            <form class="form form-horizontal" action="" method="POST">
              <div class="form-body">
              <!--   <div class="form-group row">
                  <label class="col-md-3 label-control" for="timesheetinput2">Kategori: </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="timesheetinput2" class="form-control">
                      <div class="form-control-position">
                        <i class="fa fa-check-square-o "></i>
                      </div>
                    </div>
                  </div>
                </div> -->

                <div class="form-group row">
                  <label class="col-md-3 label-control" for="timesheetinput2">Judul Lowongan: </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <input type="text" id="timesheetinput2" class="form-control" placeholder="Judul Pekerjaan" name="name" required>
                      <div class="form-control-position">
                        <i class="fa fa-briefcase"></i>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 label-control">Deadline Pekerjaan: </label>
                  <div class="col-md-9">
                    <div class="input-group">
                      
                      <input name="deadline" type="number" class="form-control" placeholder="Tenggat Waktu" required>
                      <div class="input-group-append">
                        <span class="input-group-text">Day</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 label-control">Price : </label>
                  <div class="col-md-9">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                      </div>
                      <input name="amount" type="number" class="form-control" placeholder="Harga yang diberikan" name="rateperhour" required>
                      <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-md-3 label-control" for="timesheetinput7">Details : </label>
                  <div class="col-md-9">
                    <div class="position-relative has-icon-left">
                      <textarea name="details" id="timesheetinput7" rows="5" class="form-control" placeholder="Jelaskan pekerjaan yang anda mau secara detil, formatting RTF ada di bawah ini.." required></textarea>
                      <div class="form-control-position">
                        <i class="ft-file"></i>
                      </div>
                       <small>RTF : use \b ended with \eb for <b>bold</b>, \u ended with \eu for <u>underline</u>, \i ended with \ei for <i>italic</i> and \nl for enter.</small>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-actions right">
                <a role="button" href="../home" class="btn btn-raised btn-warning mr-1">
                  <i class="ft-x"></i> Cancel
                </a>
                <button name="createjob" type="submit" class="btn btn-raised btn-primary">
                  <i class="fa fa-check-square-o"></i> Save
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>


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
    <script src="../../app-assets/js/data-tables/datatable-api.js" type="text/javascript"></script>
    <script>
      $('#frilenser').dataTable( {
        "ordering": false
      } );
    </script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>