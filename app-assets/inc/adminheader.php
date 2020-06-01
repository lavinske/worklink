<?php
include("../../config.php");
if(!isset($_COOKIE['loggedadmin']) || !isset($_COOKIE['token'])){
	header('location:http://'.$_SERVER['HTTP_HOST'].$linkprefix.'/admin/login');
}
 	$sql_check = "SELECT *
                  FROM admin
                  WHERE 
                       username=? 
                       AND 
                       enckey=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $uname, $token);

    $uname = base64_decode(base64_decode($_COOKIE['loggedadmin']));
    $token = $_COOKIE['token'];

    $check_log->execute();

    $check_log->store_result();

    if (!$check_log->num_rows == 1 )
    	header('location:http://'.$_SERVER['HTTP_HOST'].$linkprefix.'/admin/logout');
    $check_log->close();

$resNotifCount = mysqli_query($dbconnect, "SELECT * FROM fNotification INNER JOIN freelancer ON userfrom = freelancer.username WHERE fNotification.username='$uname' AND opened='0' ORDER BY timestamp DESC");
$resNotif = mysqli_query($dbconnect, "SELECT * FROM fNotification INNER JOIN freelancer ON userfrom = freelancer.username WHERE fNotification.username='$uname' AND opened='0' ORDER BY timestamp DESC LIMIT 3");
$resData = mysqli_query($dbconnect, "SELECT * FROM admin WHERE username='$uname'");
$allAbility = mysqli_query($dbconnect, "SELECT AbilityID, abilityName, tooltip, IF(abilitycategory.AbilityID in (SELECT AbilityID FROM fability WHERE fability.username='$uname'),1,0) AS tercentang FROM abilitycategory");
$adminSaldoU = mysqli_query($dbconnect, "SELECT SUM(saldo) AS SaldoU FROM freelancer");
$fetchSaldoU = mysqli_fetch_assoc($adminSaldoU);
$adminSaldoC = mysqli_query($dbconnect, "SELECT SUM(saldo) AS SaldoC FROM company");
$fetchSaldoC = mysqli_fetch_assoc($adminSaldoC);
$rowData = mysqli_fetch_assoc($resData);
$fname = $rowData['fname'];
$lname = $rowData['lname'];
$aemail = $rowData['email'];
$usaldo = $fetchSaldoU['SaldoU'];
$csaldo = $fetchSaldoC['SaldoC'];
?>