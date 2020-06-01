<?php include('../../app-assets/inc/companyheader.php'); 
if(isset($_GET["id"]) && isset($_GET["decline"]) && $_GET["decline"] == 1){  
  $id = $_GET["id"];
  $query = "UPDATE work SET filename='', progress='50' WHERE projectID = '$id' AND cID='$uname'";
    $sql = mysqli_query($dbconnect, $query);
    if ($dbconnect->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $query . "<br>" . $dbconnect->error;
    }

    $dbconnect->close();
    header('location: ../home');

}
?>
<!DOCTYPE html>
<html lang="en" class="loading">
 <!-- BEGIN : Head-->
  <?php include('../../app-assets/inc/head-comp.inc'); ?>
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
          <div class="content-wrapper">
            <!--Statistics cards Starts-->
<div class="row">
  <div class="col-xl-4 col-12">
    <a href="../withdraw/">
    <div class="card gradient-blackberry">
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <h3 class="font-large-1 mb-0"><?php echo $fmt->formatCurrency($csaldo, "Rp. "); ?></h3>
              <span>Saldo</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-pie-chart font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
        </div>
      </div>
    </div>
  </a>
  </div>
    <div class="col-xl-4 col-12">
    <div class="card gradient-ibiza-sunset"> <!-- bisa green-tea sama pomegranate -->
      <div class="card-content">
        <div class="card-body pt-2 pb-0">
          <div class="media">
            <div class="media-body white text-left">
              <h3 class="font-large-1 mb-0"><?php echo $fmt->formatCurrency($pendcsaldo, "Rp. "); ?></h3>
              <span>Pending Saldo</span>
            </div>
            <div class="media-right white text-right">
              <i class="icon-pie-chart font-large-1"></i>
            </div>
          </div>
        </div>
        <div id="Widget-line-chart1" class="height-75 WidgetlineChart WidgetlineChartshadow mb-2">
        </div>
      </div>
    </div>
  </div>
<!--Statistics cards Ends-->
<div class="col-xl-4 col-lg-12">
    <div class="card">
      <div class="card-content">
        <div class="card-body">
          <h3 class="font-large-1 text-center mt-3"><?= $fname." ".$lname; ?></h3>
          <span class="font-medium-1 grey d-block text-center mb-3"><?= $companyname; ?></span>
          </div>
        </div>
      </div>
    </div>

</div>
<!-- Basic Progress start -->
<section id="basic-progress">
    <div class="row">
      <div class="col-sm-12 mt-2">
            <div class="content-header">Lowongan yang sudah dilirik</div>
        </div>
    </div>
    <div class="row">
      <?php $error = 0;
      if(mysqli_num_rows($resWorkDoed) > 0 ){ 
                while($doedData = mysqli_fetch_array($resWorkDoed)) { ?>
              <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $doedData['name']; ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                      <div class="text-left"><?php custom_echo($doedData['details'],200); ?></div>
                        <div class="text-center" id="example-caption-1"><?php echo $doedData['progress'] < 100 ? ($doedData['progress'] < 75 ? ($doedData['progress'] < 50 ? "Looking for Freelancer" : "In Progress...") : "Waiting For Company Approval..") : "Finished, Please Verify Payment"; ?> <?php if($doedData['progress'] == 25) {?> [<?= $doedData['Count']?>/5]<?php };?></div>
                        <div class="progress mb-2">
                             <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="100" style="width:<?php echo $doedData['progress']; ?>%"  aria-describedby="example-caption-2"></div>
                        </div>
                        <a href="../job/?id=<?php echo $doedData['projectID']; ?>" class="btn btn-raised btn-success btn-min-width mr-1 mb-1">
                          Details
                        </a>
                        <?php if($doedData['progress'] == 75) { ?>
                        <a href="../../kerjaan/<?php echo $doedData['filename']; ?>" class="btn btn-raised btn-primary btn-min-width mr-1 mb-1">
                          Cek File
                        </a>
                        <a href="?decline=1&id=<?php echo $doedData['projectID']; ?>" class="btn btn-raised btn-primary btn-min-width mr-1 mb-1">
                          Decline
                        </a>
                        <?php }
                        if($doedData['progress'] == 50 || $doedData['progress'] == 75) { ?>
                        <a href="mailto:<?php echo $doedData['Contact']; ?>" class="btn btn-raised btn-primary btn-min-width mr-1 mb-1">
                          Contact : <?= $doedData['Contact']; ?>    
                        </a>
                      <?php } ?>
                        
       


                    </div>
                </div>
            </div>
        </div>
               <?php  }; } else $error = 1; 
                  if($error){?>
                    <div class="col-12">
                     <div class="card"> 
                      <div class="card-header">
                    <h4 class="card-title mb-4">No Job On Demand</h4>
                  </div>
                </div>
                </div>
                  <?php } ?>
    </div>
</section>
<!-- Basic Progress end -->

<!-- Basic Progress start -->
<section id="basic-progress">
    <div class="row">
      <div class="col-sm-12 mt-2">
            <div class="content-header">Lowongan yang kamu buka</div>
        </div>
    </div>
    <div class="row">
      <?php $error = 0;
      if(mysqli_num_rows($resWorkAvail) > 0 ){ 
                while($workData = mysqli_fetch_array($resWorkAvail)) { ?>
              <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?php echo $workData['name']; ?></h4>
                </div>
                <div class="card-content">
                    <div class="card-body text-center">
                      <div class="text-left"><?php custom_echo($workData['details'],200); ?></div>
                        <div class="text-center" id="example-caption-1"><?php echo $workData['jumlah'] < 10 ? "Masih mencari freelancer.." : "Quota Full"; ?> [<?php echo $workData['jumlah']?>/5]</div>
                        <div class="progress mb-2">
                             <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="100" style="width:<?php echo $workData['jumlah']/5*100; ?>%"  aria-describedby="example-caption-2"></div>
                        </div>
                        <a href="../job/?id=<?php echo $workData['projectID']; ?>" class="btn btn-raised btn-success btn-min-width mr-1 mb-1">
                          Details
                        </a>
                        
       


                    </div>
                </div>
            </div>
        </div>
                <?php  }; } else $error = 1; 
                  if($error){?>
                    <div class="col-12">
                     <div class="card"> 
                      <div class="card-header">
                    <h4 class="card-title mb-4">No Job Available</h4>
                  </div>
                </div>
                </div>
                  <?php } ?>
    </div>
</section>
<!-- Basic Progress end -->

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