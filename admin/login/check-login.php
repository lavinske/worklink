<?php
require '../../config.php';

if ( isset($_POST['username']) && isset($_POST['password']) ) {
    
    $sql_check = "SELECT id, username
                  FROM admin
                  WHERE 
                       username=? 
                       AND 
                       password=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $username, $password);

    $username = $_POST['username'];
    $password = md5( $_POST['password'] );

    $check_log->execute();

    $check_log->store_result();

    if ( $check_log->num_rows == 1 ) {
        $check_log->bind_result($id, $username, $status);
        while ( $check_log->fetch() ) { 
            if($status == 100){
            $check_log->close();
            header('location:index.php?tok=8905');
            exit();
            }
            $randomNumber = rand(99,999999);  //RANDOM NUMBER TO SERVE AS A KEY
        $token = dechex(($randomNumber*$randomNumber));  //CONVERT NUMBER TO HEXADECIMAL FORM
        $key = sha1($token . $randomNumber);
            $query = "UPDATE admin SET enckey = '$token' WHERE username = '$username'";
    mysqli_query($dbconnect, $query);
    if($_POST['rememe']) { setcookie("token", $token, time()+3600*24*365*10, "/"); 
    setcookie("loggedadmin", base64_encode(base64_encode($username)), time()+3600*24*365*10, "/"); } 
    else { setcookie("token", $token, time()+3600, "/");  
    setcookie("loggedadmin", base64_encode(base64_encode($username)), time()+3600, "/"); }
        }

        $check_log->close();

        header('location:../home');
        exit();

    } else {
        header('location:index.php?tok=2389');
        exit();
    }

   
} else {
    header('location:index.php');
    exit();
}