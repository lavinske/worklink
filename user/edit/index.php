<?php include('../../app-assets/inc/freelancerheader.php');
  if (isset($_POST['update_dong'])) {

    $errors = array();
  $token = $_COOKIE['token'];
  $fname = mysqli_real_escape_string($dbconnect, $_POST['fname']);
  $lname = mysqli_real_escape_string($dbconnect, $_POST['lname']);
  $phone = mysqli_real_escape_string($dbconnect, $_POST['phone']);
  $about = mysqli_real_escape_string($dbconnect, $_POST['about']);
  $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
  $location = mysqli_real_escape_string($dbconnect, $_POST['location']);
  $website = mysqli_real_escape_string($dbconnect, $_POST['website']);
  $marital = $_POST['marital'] == "married" ? 1 : 0;

  $dirUpload = "../../profile_pic/";


  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($fname)) { array_push($errors, "Fname is required"); }
  if (empty($lname)) { array_push($errors, "Lname is required"); }
  if (!isset($marital)) { array_push($errors, "Marital is required"); }

  $namaFile = $_FILES['photo']['name'];
    $namaSementara = $_FILES['photo']['tmp_name'];
    $ext=substr($namaFile,strrpos($namaFile,'.')+1);
    if($ext != "jpg" && $ext != "png") array_push($errors, "not image");
$frname=date("Y-m-d-H-i-s")."-";
$frname.="P_PIC"."-".$uname."-";
$frname.=uniqid().".".$ext;

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$frname);
    $query = "UPDATE freelancer SET fname='$fname', lname='$lname', phone='$phone', about='$about', website='$website', location='$location', marital='$marital', photo='$frname' WHERE username='$uname' AND enckey='$token'";
    $sql = mysqli_query($dbconnect, $query);

    if ($dbconnect->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $query . "<br>" . $dbconnect->error;
    }

    $dbconnect->close();
        header('location: ../profile');
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
      <?php include('../../app-assets/inc/mm-user.inc'); ?>
      <!-- / main menu-->
      <!-- Navbar (Header) Starts-->
      <?php include('../../app-assets/inc/header-user.inc'); ?>
      <!-- Navbar (Header) Ends-->
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">
            <!--About section starts-->
            <section id="about">
              <div class="row">
                <div class="col-12">
                  <div class="content-header">Edit Profile
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h5>Personal Information
                      </h5>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-12 col-md-6 col-lg-6">
                            <ul class="no-list-style">
                              <li class="mb-2">
                                <form method="post" action="" name="update_dong" enctype="multipart/form-data">
                                <span class="text-bold-500 primary">
                                  <a>First Name:
                                  </a>
                                </span>
                                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname; ?>" required>
                                <small class="text-muted">eg. 
                                  <i>John
                                  </i>
                                </small>
                              </li>
                            </ul>
                          </div>
                          <div class="col-12 col-md-6 col-lg-6">
                            <ul class="no-list-style">
                              <li class="mb-2">
                                <span class="text-bold-500 primary">
                                  <a>Last Name:
                                  </a>
                                </span>
                                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname; ?>" required>
                                <small class="text-muted">eg. 
                                  <i>Suriname Doe
                                  </i>
                                </small>
                              </li>
                            </ul>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-12 col-md-12 col-lg-12">
                            <span class="text-bold-500 primary">About Me:
                            </span>
                            <textarea name="about" maxlength="1024" class="form-control" id="aboutMe" rows="3" placeholder="Please describe yourself." style="height: 88px;"><?php if($about != "This user doesn't want to explain him/herself.") echo $about; ?></textarea>
                            <small class="text-muted">max 1024 characters.
                              </i>
                            </small>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                          <ul class="no-list-style">
                            <li class="mb-2">
                              <span class="text-bold-500 primary">
                                <a>
                                  <i class="ft-mail font-small-3">
                                  </i> Email:
                                </a>
                              </span>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $uemail; ?>" required>
                              <small class="text-muted">eg. 
                                <i>info@tempe.co
                                </i>
                              </small>
                            </li>
                            <li class="mb-2">
                              <span class="text-bold-500 primary">
                                <a>
                                  <i class="ft-globe font-small-3">
                                  </i> Location:
                                </a>
                              </span>
                              <input type="text" class="form-control" id="place" name="location" value="<?php echo $ulocation; ?>" required>
                              <small class="text-muted">eg. 
                                <i>Sentul, Kab. Bogor, Jawa Barat
                                </i>
                              </small>
                            </li>
                          </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                          <ul class="no-list-style">
                            <li class="mb-2">
                              <span class="text-bold-500 primary">
                                <a>
                                  <i class="ft-user font-small-3">
                                  </i> Marital:
                                </a>
                              </span>
                              <select class="form-control" id="marital" name="marital" required>
                                <option value="69" disabled 
                                        <?php if(!isset($umari)) echo "selected"; ?>>Select Option
                                </option>
                              <option value="male" 
                                      <?php if($umari==0 ) echo "selected"; ?>>Single
                            </option>
                          <option value="female" 
                                  <?php if($umari==1 ) echo "selected"; ?>>Married
                          </option>
                        </select>
                      <br/>
                      </li>
                    <li class="mb-2">
                      <span class="text-bold-500 primary">
                        <a>
                          <i class="ft-monitor font-small-3">
                          </i> Website:
                        </a>
                      </span>
                      <input type="link" id="website" name="website" class="form-control" placeholder="Enter website" value="<?php echo !isset($uwebsite) == 1 ? " " : $uwebsite; ?>" required>
                      <small class="text-muted">eg. 
                        <i>bankcentral.asia
                        </i>
                      </small>
                    </li>
                    </ul>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <ul class="no-list-style">
                    <li class="mb-2">
                      <span class="text-bold-500 primary">
                        <a>
                          <i class="ft-smartphone font-small-3">
                          </i> Phone Number:
                        </a>
                      </span>
                      <input type="phone" id="phone" name="phone" class="form-control" placeholder="Name" value="<?php echo !isset($uphone) == 1 ? " " : $uphone; ?>" required>
                      <small class="text-muted">eg. 
                        <i>+62-85220002725 [use country code]
                        </i>
                      </small>
                    </li>
                    <li class="mb-2">
                      <span class="text-bold-500 primary">
                        <a>
                          <i class="fal fa-file-user small-3">
                          </i> Photo:
                        </a>
                      </span>
                       <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Profile Picture</span>
                      </div>
                      <div class="custom-file">
                        <input accept="image/jpeg, image/png" type="file" name="photo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose
                          file</label>
                      </div>
                    </div>
                      <small class="text-muted">please upload jpg only [max 500kb]
                      </small>
                    </li>
                  </ul>
                </div>
              </div>
              <hr>
              <div class="mt-2 overflow-hidden">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary">
                      <a>
                        <i class="fad fa-pencil-paintbrush small-3">
                        </i> Skills:
                      </a>
                    </span>
                    <br/>
                    <?php if(mysqli_num_rows($allAbility) > 0 ){ 
while($allAbilities = mysqli_fetch_array($allAbility)) { ?>
                    <input title="<?= $allAbilities['tooltip']; ?>" type='checkbox' name='skills[]' value='<?= $allAbilities[' AbilityID '];?>' 
                           <?php echo $allAbilities['tercentang']==1 ? "checked" : ""; ?>>
                    <?= $allAbilities['abilityName']; ?>
                  </input>
                <br/>
                <?php }; }; ?>
                </li>
              </ul>
              <hr>
                        <div class="row">
                          <div class="mt-2 overflow-hidden">
                <ul class="no-list-style">
                  <li class="mb-2">
              <button type="submit" name="update_dong" class="btn btn-raised btn-success mr-1 mb-1 btn-block">Update</button>
            </li>
          </ul>
            </div>
                  </div>
          </div>
        </div>
      </div>
    </form>
    </div>
    </div>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <a href="">
          <h5>Education Information</h5>
        </a>
      </div>
      <div class="card-content">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <ul class="no-list-style">
                <?php $nombor = 0;
if(mysqli_num_rows($resEducation) > 0 ){ 
while($educationData = mysqli_fetch_array($resEducation)) { 
?>
                <li class="mb-2">
                  <span class="primary text-bold-500">
                    <a>
                      <i class="ft-home font-small-3">
                      </i> 
                      <?= $educationData['institution']; ?>
                    </a>
                  </span>
                  <span class="grey line-height-0 d-block mb-2 font-small-2">
                    <?= $educationData['department']; ?>
                  </span>
                  <span class="grey line-height-0 d-block mb-2 font-small-2">
                    <?= $educationData['yearStart']; ?> - 
                    <?php echo $educationData['yearGrad'] == 0 ? "now" : $educationData['yearGrad']; ?>
                  </span>
                  <span class="line-height-2 d-block overflow-hidden">
                    <?= $educationData['description']; ?>
                  </span>
                </li>
                <?php $nombor++; if($nombor%2==0){ ?>
              </ul>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
              <ul class="no-list-style">
                <?php } } } else echo "No Education Info.";  ?>
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
<!-- START Notification Sidebar-->
<aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block">
  <a class="notification-sidebar-close">
    <i class="ft-x font-medium-3">
    </i>
  </a>
  <div class="side-nav notification-sidebar-content">
    <div class="row">
      <div class="col-12 mt-1">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#activity-tab" aria-expanded="true" class="nav-link active">Activity
            </a>
          </li>
          <li class="nav-item">
            <a id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#chat-tab" aria-expanded="false" class="nav-link">Chat
            </a>
          </li>
          <li class="nav-item">
            <a id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#settings-tab" aria-expanded="false" class="nav-link">Settings
            </a>
          </li>
        </ul>
        <div class="tab-content px-1 pt-1">
          <div id="activity-tab" role="tabpanel" aria-expanded="true" aria-labelledby="base-tab1" class="tab-pane active">
            <div id="activity" class="col-12 timeline-left">
              <h6 class="mt-1 mb-3 text-bold-400">RECENT ACTIVITY
              </h6>
              <div id="timeline" class="timeline-left timeline-wrapper">
                <ul class="timeline">
                  <li class="timeline-line">
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-purple bg-lighten-1">
                        <i class="ft-shopping-cart">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">just now
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-info bg-lighten-1">
                        <i class="fa fa-plane">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="cyan-text medium-small">Yesterday
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-success bg-lighten-1">
                        <i class="ft-mic">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="green-text medium-small">5 Days Ago
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-warning bg-lighten-1">
                        <i class="ft-map-pin">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="amber-text medium-small">1 Week Ago
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-red bg-lighten-1">
                        <i class="ft-inbox">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-orange-text medium-small">2 Week Ago
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-cyan bg-lighten-1">
                        <i class="ft-mic">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="brown-text medium-small">1 Month Ago
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-amber bg-lighten-1">
                        <i class="ft-map-pin">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="deep-purple-text medium-small">3 Month Ago
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.
                      </p>
                    </div>
                  </li>
                  <li class="timeline-item">
                    <div class="timeline-badge">
                      <span data-toggle="tooltip" data-placement="right" title="Portfolio project work" class="bg-grey bg-lighten-1">
                        <i class="ft-inbox">
                        </i>
                      </span>
                    </div>
                    <div class="col s9 recent-activity-list-text">
                      <a href="#" class="grey-text medium-small">1 Year Ago
                      </a>
                      <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div id="chat-tab" aria-labelledby="base-tab2" class="tab-pane">
            <div id="chatapp" class="col-12">
              <h6 class="mt-1 mb-3 text-bold-400">RECENT CHAT
              </h6>
              <div class="collection border-none">
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-12.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Elizabeth Elliott
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">5.00 AM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Thank you
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-6.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Mary Adams
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Hello Boo
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-11.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Caleb Richards
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">9.00 PM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Keny !
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-18.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">June Lane
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">4.14 AM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Ohh God
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-1.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Edward Fletcher
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">5.15 PM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Love you
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-2.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Crystal Bates
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">8.00 AM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Can we
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-3.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Nathan Watts
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">9.53 PM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Great!
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-15.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Willard Wood
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">4.20 AM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Do it
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-19.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Ronnie Ellis
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">5.30 PM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Got that
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-14.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Gwendolyn Wood
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">4.34 AM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Like you
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-13.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Daniel Russell
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">12.00 AM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Thank you
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-22.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Sarah Graves
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">11.14 PM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Okay you
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-9.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Andrew Hoffman
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">7.30 PM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Can do
                    </p>
                  </div>
                </div>
                <div class="media mb-1">
                  <a>
                    <img alt="96x96" src="app-assets/img/portrait/small/avatar-s-20.png" class="media-object d-flex mr-3 bg-primary height-50 rounded-circle">
                  </a>
                  <div class="media-body">
                    <div class="clearfix">
                      <h4 class="font-medium-1 primary mt-1 mb-0 mr-auto float-left">Camila Lynch
                      </h4>
                      <span class="medium-small float-right blue-grey-text text-lighten-3">2.00 PM
                      </span>
                    </div>
                    <p class="text-muted font-small-3">Leave it
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="settings-tab" aria-labelledby="base-tab3" class="tab-pane">
            <div id="settings" class="col-12">
              <h6 class="mt-1 mb-3 text-bold-400">GENERAL SETTINGS
              </h6>
              <ul class="list-unstyled">
                <li>
                  <div class="togglebutton">
                    <div class="switch">
                      <span class="text-bold-500">Notifications
                      </span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="notifications1" checked="checked" type="checkbox" class="custom-control-input">
                          <label for="notifications1" class="custom-control-label">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>Use checkboxes when looking for yes or no answers.
                  </p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch">
                      <span class="text-bold-500">Show recent activity
                      </span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="recent-activity1" checked="checked" type="checkbox" class="custom-control-input">
                          <label for="recent-activity1" class="custom-control-label">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>The for attribute is necessary to bind our custom checkbox with the input.
                  </p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch">
                      <span class="text-bold-500">Notifications
                      </span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="notifications2" type="checkbox" class="custom-control-input">
                          <label for="notifications2" class="custom-control-label">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>Use checkboxes when looking for yes or no answers.
                  </p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch">
                      <span class="text-bold-500">Show recent activity
                      </span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="recent-activity2" type="checkbox" class="custom-control-input">
                          <label for="recent-activity2" class="custom-control-label">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>The for attribute is necessary to bind our custom checkbox with the input.
                  </p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch">
                      <span class="text-bold-500">Show your emails
                      </span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="show-emails" type="checkbox" class="custom-control-input">
                          <label for="show-emails" class="custom-control-label">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>Use checkboxes when looking for yes or no answers.
                  </p>
                </li>
                <li>
                  <div class="togglebutton">
                    <div class="switch">
                      <span class="text-bold-500">Show Task statistics
                      </span>
                      <div class="float-right">
                        <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                          <input id="show-stats" type="checkbox" class="custom-control-input">
                          <label for="show-stats" class="custom-control-label">
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p>The for attribute is necessary to bind our custom checkbox with the input.
                  </p>
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
<!-- END Notification Sidebar-->
<!-- Theme customizer Starts-->
<?php include('../../app-assets/inc/themecustomizer.inc');?>
<!-- Theme customizer Ends-->
<?php include('../../app-assets/inc/user-js-bawah.inc');?>
</body>
<!-- END : Body-->
</html>
