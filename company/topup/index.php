<?php include('../../app-assets/inc/companyheader.php'); 
if(isset($_POST['tu'])){
  $errors = array();
  $norek = $_POST['norek'];
  $namabank = mysqli_real_escape_string($dbconnect, $_POST['namabank']);
  $namarek = mysqli_real_escape_string($dbconnect, $_POST['namarek']);
  $cabangbank = mysqli_real_escape_string($dbconnect, $_POST['cabangbank']);
  $nominal = $_POST['nominal'];
   $dirUpload = "../../bukti_trf/";

  // pindahkan file

  if (empty($norek)) { array_push($errors, "norek is required"); }
  if (empty($namabank)) { array_push($errors, "bank is required"); }
  if (empty($namarek)) { array_push($errors, "namarek is required"); }
  if (empty($cabangbank)) { array_push($errors, "cabang is required"); }
  if (empty($nominal)) { array_push($errors, "nominal is required"); }

  $namaFile = $_FILES['buktiTRF']['name'];
    $namaSementara = $_FILES['buktiTRF']['tmp_name'];
    $ext=substr($namaFile,strrpos($namaFile,'.')+1);
    if($ext != "jpg" && $ext != "png") array_push($errors, "not image");
$frname=date("Y-m-d-H-i-s")."-";
$frname.="BKT_TRF"."-".$uname."-";
$frname.=uniqid().".".$ext;

  if (count($errors) == 0) {
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$frname);
    $temp_pending = $pendcsaldo+$nominal;
    $query = "UPDATE company SET pendsaldo='$temp_pending' WHERE username='$uname' AND enckey='$token'";
    $sql = mysqli_query($dbconnect, $query);
    $query1 = "INSERT INTO topupcompany (username, norek, namabank, cabangbank, namarekening, nominal, bukti) 
              VALUES('$uname', '$norek', '$namabank', '$cabangbank', '$namarek', '$nominal', '$frname')";
    $sql1 = mysqli_query($dbconnect, $query1);
    $beritamutasi = "Request Topup ".$fmt->formatCurrency($nominal,$currency)." dari Rekening ".$namabank." a/n ".$namarek." (".$norek.").";
    $nominal*=-1;
    $query2 = "INSERT INTO mutasicompany (username, berita, nominal) 
              VALUES('$uname', '$beritamutasi', '$nominal')";
    $sql2 = mysqli_query($dbconnect, $query2);

if ($dbconnect->query($sql) === TRUE && $dbconnect->query($sql1) === TRUE && $dbconnect->query($sql2) === TRUE) {
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
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-center font-medium-3">Topup Saldo</h4>
          
        </div>
        <div class="card-content ">
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                  <p>Masukkan Nomor Rekening</p>
                  <input type="number" class="form-control mb-3" name="norek" placeholder="Nomor Rekening" required/>
                  <p>Masukkan Nama Bank</p>
                  <input type="text" class="form-control mb-3" placeholder="Nama Bank" name="namabank" required/>
                  <p>Masukkan Cabang Bank</p>
                  <input type="text" class="form-control mb-3" name="cabangbank" placeholder="Cabang Bank" required/>
                  <p>Masukkan Nama Di Rekening</p>
                  <input type="text" class="form-control mb-3" name="namarek" placeholder="Nama di Rekening" required/>
                  <p>Masukkan Nominal Topup</p>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                  </div>
                  <input type="number" class="form-control" name="nominal" placeholder="0">
                </div>
                <p>Upload bukti Transfer</p>
                <div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
  </div>
  <div class="custom-file">
    <input accept="image/jpeg, image/png" type="file" class="custom-file-input" id="inputGroupFile01" name="buktiTRF">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>
            <p></p>
            <center><button type="submit" name="tu" class="btn btn-raised btn-success btn-min-width mr-1 mb-1">Selesaikan Topup</button></center>
            <p></p>
            </form>
            <p class="text-muted font-small-3">TopUp saldo yang sukses paling lambat akan ditransfer H+3 ke saldo di hari kerja</p>
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
    <aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block"><a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
      <div class="side-nav notification-sidebar-content">
        <div class="row">
          <div class="col-12 mt-1">
            <ul class="nav nav-tabs">
              <li class="nav-item"><a id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#activity-tab" aria-expanded="true" class="nav-link active">Activity</a></li>
              <li class="nav-item"><a id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#chat-tab" aria-expanded="false" class="nav-link">Chat</a></li>
              <li class="nav-item"><a id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#settings-tab" aria-expanded="false" class="nav-link">Settings</a></li>
            </ul>
            <div class="tab-content px-1 pt-1">
              <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1" class="tab-pane active">
                <div id="activity" class="col-12 timeline-left">
                  <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY</h6>
                  <div id="timeline" class="timeline-left timeline-wrapper">
                    <ul class="timeline">
                      <li class="timeline-line"></li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-purple bg-lighten-1"><i class="ft-shopping-cart"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="deep-purple-text medium-small">just now</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-info bg-lighten-1"><i class="fa fa-plane"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="cyan-text medium-small">Yesterday</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-success bg-lighten-1"><i class="ft-mic"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="green-text medium-small">5 Days Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-warning bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="amber-text medium-small">1 Week Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-red bg-lighten-1"><i class="ft-inbox"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-cyan bg-lighten-1"><i class="ft-mic"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="brown-text medium-small">1 Month Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-amber bg-lighten-1"><i class="ft-map-pin"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                        </div>
                      </li>
                      <li class="timeline-item">
                        <div class="timeline-badge"><span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-grey bg-lighten-1"><i class="ft-inbox"></i></span></div>
                        <div class="col s9 recent-activity-list-text"><a href="#" class="grey-text medium-small">1 Year Ago</a>
                          <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div id="chat-tab" aria-labelledby="base-tab2" class="tab-pane">
                <div id="chatapp" class="col-12">
                  <h6 class="mt-1 mb-3 text-bold-400">RECENT CHAT</h6>
                  <div class="collection border-none">
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-12.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Elizabeth Elliott</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.00 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Thank you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-6.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Mary Adams</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Hello Boo</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-11.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Caleb Richards</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.00 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Keny !</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-18.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">June Lane</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Ohh God</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-1.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Edward Fletcher</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.15 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Love you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-2.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Crystal Bates</h4><span class="medium-small float-right blue-grey-text text-lighten-3">8.00 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Can we</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-3.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Nathan Watts</h4><span class="medium-small float-right blue-grey-text text-lighten-3">9.53 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Great!</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-15.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Willard Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.20 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Do it</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-19.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Ronnie Ellis</h4><span class="medium-small float-right blue-grey-text text-lighten-3">5.30 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Got that</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-14.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Gwendolyn Wood</h4><span class="medium-small float-right blue-grey-text text-lighten-3">4.34 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Like you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-13.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Daniel Russell</h4><span class="medium-small float-right blue-grey-text text-lighten-3">12.00 AM</span>
                        </div>
                        <p class="text-muted font-small-3">Thank you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-22.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Sarah Graves</h4><span class="medium-small float-right blue-grey-text text-lighten-3">11.14 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Okay you</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-9.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Andrew Hoffman</h4><span class="medium-small float-right blue-grey-text text-lighten-3">7.30 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Can do</p>
                      </div>
                    </div>
                    <div class="media mb-1"><a><img alt="96x96" src="app-assets/img/portrait/small/avatar-s-20.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle"></a>
                      <div class="media-body">
                        <div class="clearfix">
                          <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Camila Lynch</h4><span class="medium-small float-right blue-grey-text text-lighten-3">2.00 PM</span>
                        </div>
                        <p class="text-muted font-small-3">Leave it</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="settings-tab" aria-labelledby="base-tab3" class="tab-pane">
                <div id="settings" class="col-12">
                  <h6 class="mt-1 mb-3 text-bold-400">GENERAL SETTINGS</h6>
                  <ul class="list-unstyled">
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Notifications</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="notifications1" checked="checked" type="checkbox" class="custom-control-input">
                              <label for="notifications1" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show recent activity</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="recent-activity1" checked="checked" type="checkbox" class="custom-control-input">
                              <label for="recent-activity1" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Notifications</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="notifications2" type="checkbox" class="custom-control-input">
                              <label for="notifications2" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show recent activity</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="recent-activity2" type="checkbox" class="custom-control-input">
                              <label for="recent-activity2" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show your emails</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="show-emails" type="checkbox" class="custom-control-input">
                              <label for="show-emails" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>Use checkboxes when looking for yes or no answers.</p>
                    </li>
                    <li>
                      <div class="togglebutton">
                        <div class="switch"><span class="text-bold-500">Show Task statistics</span>
                          <div class="float-right">
                            <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                              <input id="show-stats" type="checkbox" class="custom-control-input">
                              <label for="show-stats" class="custom-control-label"></label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </aside>
    <!-- END Notification Sidebar-->
    <!-- Theme customizer Starts-->
    <?php include('../../app-assets/inc/themecustomizer.inc');?>
    <!-- Theme customizer Ends-->
    <?php include('../../app-assets/inc/user-js-bawah.inc');?>
  </body>
  <!-- END : Body-->
</html>