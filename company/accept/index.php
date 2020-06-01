<?php

include('../../app-assets/inc/companyheader.php');

if(isset($_GET["id"]) && isset($_GET["job"]) && isset($_GET["accept"]) && $_GET["accept"] == 1){

  $id = $_GET["id"];
  $job = $_GET["job"];

  $check_query = "SELECT * FROM work WHERE username='$uname' AND projectID = '$job' LIMIT 1";
  $result = mysqli_query($dbconnect, $check_query);
  $benar = mysqli_fetch_assoc($result);

  if($benar) header('location: ../home');

  $getDtl = "SELECT w.*, f.id AS userid, f.fname, f.lname, f.username AS username FROM work w JOIN workqueue wq ON w.projectid = wq.projectid JOIN freelancer f ON wq.userID = f.username JOIN company c ON w.cID = c.username WHERE w.projectid = '$job' AND f.id = '$id' ";
  $resultDtl = mysqli_query($dbconnect, $getDtl);
  $row = mysqli_fetch_assoc($resultDtl);

  $usernamepekerja = $row["username"];
  $judulpekerjaan = $row["name"];

  $query = "DELETE FROM workqueue WHERE projectID = '$job'";
    $sql = mysqli_query($dbconnect, $query);
    $query1 = "UPDATE work SET handled='$usernamepekerja', progress='50' WHERE projectID='$job'";
    $sql1 = mysqli_query($dbconnect, $query1);
    $query2 = "INSERT INTO fnotification (username, userfrom, title, content, priority) 
              VALUES('$usernamepekerja', '$uname', '$judulpekerjaan', 'Selamat, lamaran anda diterima.', 2)";
    $sql2 = mysqli_query($dbconnect, $query2);
    if ($dbconnect->query($sql) === TRUE && $dbconnect->query($sql1) === TRUE && $dbconnect->query($sql2) === TRUE) {
    echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $query . "<br>" . $dbconnect->error;
    }

    $dbconnect->close();
    header('location: ../home');

}else if(isset($_GET["id"]) && isset($_GET["job"])){
  $id = $_GET["id"];
  $job = $_GET["job"];

$getDtl = "SELECT w.*, f.id AS userid, f.fname, f.lname, f.username AS username FROM work w JOIN workqueue wq ON w.projectid = wq.projectid JOIN freelancer f ON wq.userID = f.username JOIN company c ON w.cID = c.username WHERE w.projectid = '$job' AND f.id = '$id' ";
$resultDtl = mysqli_query($dbconnect, $getDtl);
$row = mysqli_fetch_assoc($resultDtl);

if(!isset($row)) header('location: ../home');




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
    <div class="content-header">Accept Job - <?= $row["name"]; ?></div>
    </div>
</div>
<!-- Bubble Editor start -->
<section class="quill-editor">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Job Details</h4>
				</div>
				<div class="card-content">
					<div class="card-body">
						<div class="row">
							<div class="mx-auto col-md-8">
								<div id="bubble-wrapper">
									<div id="bubble-container">
										<div>
                      <h5> Job Given to : </h5>
                      <p> <?= $row['fname'].' '.$row['lname'].' - '.$row["username"]; ?></p>
                      <h5> Price : </h5>
                      <p> <?= $fmt->formatCurrency($row['amount'], "Rp. "); ?></p>
                      <h5> Duration: </h5>
                      <p> <?= $row["duration"]; ?> days</p>
											<p>
                        <?php custom_echo($row["details"],150); ?>           
                      </p>
                      <br>
										</div>
									</div>
								</div>
							</div>
						</div>
            <hr>
            <div class="float-right mb-2">
          <a href="?id=<?= $row["userid"];?>&job=<?= $row["projectID"];?>&accept=1" class="btn btn-primary btn-lg">
                          Terima
                        </a>
          <a href="../job/?id=<?php echo $row['projectID']; ?>" class="btn btn-danger btn-lg">
                          Back
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
    <!-- Theme customizer Starts-->
    <?php include('../../app-assets/inc/themecustomizer.inc');?>
    <!-- Theme customizer Ends-->
    <?php include('../../app-assets/inc/user-js-bawah.inc');?>
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="../../app-assets/js/quill.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>