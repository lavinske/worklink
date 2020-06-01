<?php

include('../../app-assets/inc/adminheader.php');
$resCompany = mysqli_query($dbconnect, "SELECT * from company");
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
    <div class="content-header">Views - Company</div>
    </div>
</div>
<section id="text-inputs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Details - Company</h4>
        </div>
        <div class="card-content ">
          <div class="card-body table-responsive">
            <table class="table table-striped table-bordered text-inputs-searching" id="frilenser">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>PIC Name</th>
                  <th>Saldo</th>
                  <th>Detail</th>
                </tr>
              </thead>
              <tbody>
                <?php if(mysqli_num_rows($resCompany) > 0 ){ 
                while($Company = mysqli_fetch_array($resCompany)) { ?>
                <tr>
                  <td><?= $Company['companyname'] ?></td>
                  <td><?= $Company['picfname'].' '.$Company['piclname']; ?></td>
                  <td><?= $fmt->formatCurrency($Company['saldo'], $currency); ?></a>
                  <td>Detail</td>
                </tr>
              <?php } } ?>
              </tbody>
              <tfoot>
                <tr>
                  <th>Company Name</th>
                  <th>PIC Name</th>
                  <th>Saldo</th>
                  <td><b>Detail</b></td>
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