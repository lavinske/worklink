<?php

include('../../app-assets/inc/companyheader.php');

if(isset($_GET["id"])){
$id = $_GET["id"];
$getJobQ = "SELECT * FROM work WHERE projectid = '$id' AND cID = '$uname'";
$result = mysqli_query($dbconnect, $getJobQ);
$row = mysqli_fetch_assoc($result);
if(!isset($row)) header('location: ../home');
$resGetF = mysqli_query($dbconnect, "SELECT f.id AS userid, f.username, f.email, f.fname, f.lname, f.phone, f.website, f.location, f.about, wq.time FROM workqueue wq JOIN freelancer f ON wq.userID = f.username WHERE wq.projectid = '$id' ORDER BY wq.time ASC");
}else{
  header('location: ../home');
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
          <div class="content-wrapper"><div class="row">
  <div class="col-sm-12">
    <div class="content-header">View Job - <?= $row["name"]; ?></div>
    </div>
</div>
<!-- Bubble Editor start -->
<section class="quill-editor">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Job Details</h4>
				<div class="card-content">
					<div class="card-body">
						<h5> Job Prepared By : </h5>
            <p> <?= $cname; ?> - <?= $row['cID']; ?></p>
            <h5> Price : </h5>
            <p> <?= $fmt->formatCurrency($row['amount'], "Rp. "); ?> </p>
						<div class="row">
							<div class="mx-auto col-md-8">
								<div id="bubble-wrapper">
									<div id="bubble-container">
										<div>
											<h1 class="ql-align-center"><?= $row["name"]; ?></h1>
											<p><br></p>
											<p>
                        <?= $row["details"]; ?>           
                      </p>
                      <br>
										</div>
									</div>
								</div>
							</div>
						</div>
            <h5> Duration: </h5>
            <p> <?= $row["duration"]; ?> days</p>
            <?php if($row["progress"] < 50) { ?>
            <hr>
            <!-- Individual column searching (text inputs) table -->
<section id="text-inputs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Freelancer Who Have Applied</h4>
        </div>
        <div class="card-content ">
          <div class="card-body table-responsive">
            <table class="table table-striped table-bordered text-inputs-searching" id="frilenser">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Location</th>
                  <th>Profile</th>
                  <th>Accept</th>
                </tr>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($resGetF) > 0 ){ 
                while($GetF = mysqli_fetch_array($resGetF)) { ?>
                <tr>
                  <td class="select-ketik"><?= $GetF['fname'].' '.$GetF['lname']; ?> </td>
                  <td class="select-ketik"><?php echo $GetF['location'] == "" ? "-" : $GetF['location']; ?></td>
                  <td><a href="../freelancer/?id=<?= $GetF['userid'] ?>"><?= $GetF['fname'];?>'s Profile</a>
                  <td><a role="button" class="btn btn-primary" href="../accept/?id=<?= $GetF['userid'] ?>&job=<?= $id; ?>">Accept</a>
                  </td>
                </tr>
              <?php } } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Location</th> 
                  <td><b>Profile</b></td>
                  <td><b>Accept</b></td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Individual column searching (text inputs) table -->
<?php } ?>
<hr>
          <div class="align-self-center mr-3 float-right mb-2">
          <a href="../update/?id=<?php echo $row['projectID']; ?>" class="btn btn-success btn-lg">
                          Update
                        </a>
                      </div>
					</div>
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