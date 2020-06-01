<?php

require_once("../../config.php");

if(isset($_COOKIE['loggedcompany']) || isset($_COOKIE['token'])){
  header('location:http://'.$_SERVER['HTTP_HOST'].$linkprefix.'/company/logout');
}

if(isset($_POST['register'])){

  $errors = array();

    // REGISTER USER
  // receive all input values from the form
  $username = mysqli_real_escape_string($dbconnect, $_POST['username']);
  $picfname = mysqli_real_escape_string($dbconnect, $_POST['picfname']);
  $piclname = mysqli_real_escape_string($dbconnect, $_POST['piclname']);
  $address = mysqli_real_escape_string($dbconnect, $_POST['address']);
  $companyname = mysqli_real_escape_string($dbconnect, $_POST['companyname']);
  $email = mysqli_real_escape_string($dbconnect, $_POST['email']);
  $password = mysqli_real_escape_string($dbconnect, $_POST['password']);
  $password2 = mysqli_real_escape_string($dbconnect, $_POST['password2']);
  $joined = date("Y-m-d");

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($picfname)) { array_push($errors, "Fname is required"); }
  if (empty($piclname)) { array_push($errors, "Lname is required"); }
  if (empty($companyname)) { array_push($errors, "Companyname is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $password2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM company WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($dbconnect, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }


    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }



  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password);//encrypt the password before saving in the database

    $query = "INSERT INTO company (username, password, email, companyname, picfname, piclname, address, joined) 
              VALUES('$username', '$password', '$email', '$companyname', '$picfname', '$piclname', '$address', '$joined')";
    $sql = mysqli_query($dbconnect, $query);

if ($dbconnect->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $query . "<br>" . $dbconnect->error;
}

$dbconnect->close();
    header('location: ../login');
  }

}

?>

<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
   <?php include('../../app-assets/inc/head.inc'); ?>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="1-column" class=" 1-column  blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper"><!--Registration Page Starts-->
<section id="regestration">
  <div class="container-fluid">
    <div class="row full-height-vh m-0">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="card">
          <div class="card-content">
            <div class="card-body register-img">
              <div class="row m-0">
                <div class="col-md-6 d-none d-lg-block py-2 text-center">
                  <img src="../../app-assets/img/gallery/register.png" alt="" class="img-fluid mt-3 pl-3" width="400"
                    height="230">
                </div>
                <div class="col-lg-6 col-md-12 px-4 pt-3 bg-white">
                  <h4 class="card-title mb-2">Create Account</h4>
                  <p class="card-text mb-3">
                    Fill the below form to create a new account.
                  </p>
                  <form class="form" action="" method="post">
                  <div class="input-group">
                    <input type="text" name="picfname" placeholder="PIC First Name" required class="form-control">
                    <input type="text" name="piclname" placeholder="PIC Last Name" required class="form-control">
                  </div>
                  <input type="username" minlength="3" class="form-control mr-3 mb-3" name="username" placeholder="Username" required/>
                  <input type="email" class="form-control mr-3 mb-3" name="email" placeholder="Email" required/>
                  <input type="name" minlength="5" class="form-control mr-3 mb-3" name="companyname" placeholder="Company Name" required/>
                  <div class="input-group">
                    <input type="password" minlength="6"  name="password" placeholder="Enter Password" required class="form-control">
                    <input type="password" minlength="6"  name="password2" placeholder="Confirm Password" required class="form-control">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Addresss</span>
                    </div>
                    <textarea name="address" class="form-control" placeholder="Enter your address here.."></textarea>
                  </div>
                    <hr>
                  <div class="fg-actions d-flex justify-content-between">
                    <div class="login-btn">
                      <button type="button" class="btn btn-outline-primary mr-3 mb-3">
                        <a href="../login" class="text-decoration-none">
                          Back To Login
                        </a>
                      </button>
                    </div>
                    <div class="recover-pass">
                      <button type="submit" name="register" class="btn btn-primary mr-3 mb-3">
                        <a class="text-decoration-none text-white">
                          Register
                        </a>
                      </button>
                     </form>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Registration Page Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <?php include('../../app-assets/inc/user-js-bawah.inc');?>
  </body>
  <!-- END : Body-->
</html>