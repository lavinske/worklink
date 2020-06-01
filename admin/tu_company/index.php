<?php

include('../../app-assets/inc/adminheader.php');
$resTU = mysqli_query($dbconnect, "SELECT * FROM topupcompany WHERE done='0'");

if(isset($_GET["id"])){
$id = $_GET["id"];
$getTU = "SELECT tc.*, c.saldo, c.pendsaldo FROM topupcompany tc JOIN company c ON tc.username = c.username WHERE tc.id='$id' AND tc.done = '0' LIMIT 1";
$resultTU = mysqli_query($dbconnect, $getTU);
$rowTU = mysqli_fetch_assoc($resultTU);
$usertujuan = $rowTU['username'];
$nominal = $fmt->formatCurrency($rowTU['nominal'], $currency);;
$temp_pend = $rowTU['pendsaldo']-$rowTU['nominal'];
$namabank = $rowTU['namabank'];
$namarek = $rowTU['namarekening'];
$norek = $rowTU['norek'];
$saldo_akhir = $rowTU['saldo']+$rowTU['nominal'];
$username = $rowTU['username'];
$beritaacara = "Berhasil Request Topup ".$nominal." dari Rekening ".$namabank." a/n ".$namarek." (".$norek.").";
$query2 = "INSERT INTO cnotification (username, userfrom, title, content, priority) 
              VALUES('$usertujuan', 'SYSADMIN', 'Top Up Berhasil', '$beritaacara', '1')";
            $sql2 = mysqli_query($dbconnect, $query2);
   $beritamutasi = "Request Topup dari Rekening ".$namabank." a/n ".$namarek." (".$norek.").";
    $query3 = "INSERT INTO mutasicompany (username, berita, nominal) 
              VALUES('$usertujuan', '$beritamutasi', '$nominal')";
    $sql3 = mysqli_query($dbconnect, $query3);
    $query1 = "UPDATE company SET saldo='$saldo_akhir', pendsaldo='$temp_pend'WHERE username='$username'";
    $sql1 = mysqli_query($dbconnect, $query1);
    $query = "UPDATE topupcompany SET done='1' WHERE id='$id'";
    $sql = mysqli_query($dbconnect, $query);

if ($dbconnect->query($sql1) === TRUE && $dbconnect->query($sql) === TRUE && $dbconnect->query($sql2) === TRUE && $dbconnect->query($sql3) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $query . "<br>" . $dbconnect->error;
}

$dbconnect->close();
    header('location: ../tu_company');
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
    <div class="content-header">View Top Up Request dari Company</div>
    </div>
</div>
<section id="text-inputs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Detail Top Up Request</h4>
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
                <?php if(mysqli_num_rows($resTU) > 0 ){ 
                while($TU = mysqli_fetch_array($resTU)) { ?>
                <tr href="aaaa">
                  <td><?= $TU['username']; ?></td>
                  <td><?= $TU['norek']; ?></td>
                  <td><?= $TU['namabank']; ?></td>
                  <td><?= $fmt->formatCurrency($TU['nominal'], $currency); ?></a>
                  <td><a data-content="<img src='../../bukti_trf/<?= $TU['bukti'];?>' width='85%' height='85%'>" data-rel="popover" role="button" class="btn btn-primary" href="?id=<?= $TU['id']; ?>">Accept</a>
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
    <script>
$(document).ready(function() {
    $('[data-rel=popover]').popover({
      html: true,
      trigger: "hover"
    });
  })
</script>
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
</html>