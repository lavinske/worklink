<?php

include('../../app-assets/inc/adminheader.php');
$resWD = mysqli_query($dbconnect, "SELECT * FROM withdrawcompany WHERE done='0'");

if(isset($_GET["id"])){
$id = $_GET["id"];
$getWD = "SELECT wc.*, c.pendsaldo FROM withdrawcompany wc JOIN company c ON wc.username = c.username WHERE wc.id='$id' AND wc.done = '0' LIMIT 1";
$resultWD = mysqli_query($dbconnect, $getWD);
$rowWD = mysqli_fetch_assoc($resultWD);
$usertujuan = $rowWD['username'];
$temp_pend = $rowWD['pendsaldo']-$rowWD['nominal'];
$namabank = $rowWD['namabank'];
$namarek = $rowWD['namarekening'];
$norek = $rowWD['norek'];
$beritaacara = "Berhasil Request Tarik ke Rekening ".$namabank." a/n ".$namarek." (".$norek.").";
$query2 = "INSERT INTO cnotification (username, userfrom, title, content, priority) 
              VALUES('$usertujuan', 'SYSADMIN', 'Withdraw Berhasil', '$beritaacara', '1')";
            $sql2 = mysqli_query($dbconnect, $query2);
$query1 = "UPDATE company SET pendsaldo='$temp_pend' WHERE id='$id'";
    $sql1 = mysqli_query($dbconnect, $query1);
    $query1 = "UPDATE company SET pendsaldo='$temp_pend' WHERE id='$id'";
    $sql1 = mysqli_query($dbconnect, $query1);
    $query = "UPDATE withdrawcompany SET done='1' WHERE id='$id'";
    $sql = mysqli_query($dbconnect, $query);

if ($dbconnect->query($sql1) === TRUE && $dbconnect->query($sql) === TRUE && $dbconnect->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $query . "<br>" . $dbconnect->error;
}

$dbconnect->close();
    header('location: ../wd_user');
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
          <div class="content-wrapper"><div class="row">
  <div class="col-sm-12">
    <div class="content-header">View Request Withdraw dari Company</div>
    </div>
</div>
<section id="text-inputs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Detail Request Withdraw</h4>
        </div>
        <div class="card-content ">
          <div class="card-body table-responsive">
            <table class="table table-striped table-bordered text-inputs-searching" id="frilenser">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Rekening</th>
                  <th>Bank</th>
                  <th>Nominal</th>
                  <th>Accept</th>
                </tr>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($resWD) > 0 ){ 
                while($WD = mysqli_fetch_array($resWD)) { ?>
                <tr>
                  <td><?= $WD['username']; ?></td>
                  <td><?= $WD['norek']; ?></td>
                  <td><?= $WD['namabank']; ?></td>
                  <td><?= $fmt->formatCurrency($WD['nominal'], $currency); ?></a>
                  <td><a role="button" class="btn btn-primary" href="?id=<?= $WD['id']; ?>">Accept</a></td>
                </tr>
              <?php } } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Username</th>
                  <th>Rekening</th>
                  <th>Bank</th>
                  <th>Nominal</th>
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