<?php
include("../../config.php");
if(!isset($_COOKIE['loggedcompany']) || !isset($_COOKIE['token'])){
	header('location:http://'.$_SERVER['HTTP_HOST'].$linkprefix.'/company/login');
}
 	$sql_check = "SELECT *
                  FROM company
                  WHERE 
                       username=? 
                       AND 
                       enckey=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $uname, $token);

    $uname = base64_decode(base64_decode($_COOKIE['loggedcompany']));
    $token = $_COOKIE['token'];

    $check_log->execute();

    $check_log->store_result();

    if (!$check_log->num_rows == 1 )
    	header('location:http://'.$_SERVER['HTTP_HOST'].$linkprefix.'/company/logout');
    $check_log->close();

$resNotifCount = mysqli_query($dbconnect, "SELECT * FROM fNotification INNER JOIN freelancer ON userfrom = freelancer.username WHERE fNotification.username='$uname' AND opened='0' ORDER BY timestamp DESC");
$resNotif = mysqli_query($dbconnect, "SELECT * FROM fNotification INNER JOIN freelancer ON userfrom = freelancer.username WHERE fNotification.username='$uname' AND opened='0' ORDER BY timestamp DESC LIMIT 3");
$resAbility = mysqli_query($dbconnect, "SELECT fability.AbilityID, abilityName, iconClass, tooltip FROM fability INNER JOIN abilitycategory ON fability.AbilityID = abilitycategory.AbilityID WHERE username='$uname'");
$resEducation = mysqli_query($dbconnect, "SELECT * FROM education WHERE username='$uname' ORDER BY yearStart DESC");
$resWorkAvail = mysqli_query($dbconnect, "SELECT w.projectID,w.cID, name, details, count(useriD) as jumlah FROM work w left join workqueue wq on w.projectID=wq.projectID WHERE w.cID='$uname' AND handled='' AND NOT(w.projectID IN(SELECT projectID FROM workqueue)) GROUP BY w.projectID ORDER BY w.projectID DESC LIMIT 5");
$resWorkDoed = mysqli_query($dbconnect, "SELECT w.*, 2 as Status, 0 as Count, f.email as Contact from work w JOIN freelancer f ON w.handled = f.username where w.handled not like '' AND cID = '$uname'  UNION SELECT w.*, 1 as status, count(wq.useriD), 0 as Contact from workqueue wq, work w where w.projectID=wq.projectID AND cID = '$uname' and w.handled like '' GROUP by wq.projectID");
$resData = mysqli_query($dbconnect, "SELECT * FROM company WHERE username='$uname'");
$allAbility = mysqli_query($dbconnect, "SELECT AbilityID, abilityName, tooltip, IF(abilitycategory.AbilityID in (SELECT AbilityID FROM fability WHERE fability.username='$uname'),1,0) AS tercentang FROM abilitycategory");
$rowData = mysqli_fetch_assoc($resData);
$fname = $rowData['picfname'];
$cname = $rowData['companyname'];
$lname = $rowData['piclname'];
$csaldo = $rowData['saldo'];
$cemail = $rowData['email'];
$pendcsaldo = $rowData['pendsaldo'];
$caddress = $rowData['address'];
$cwhatsapp = $rowData['whatsapp'];
$companyname = $rowData['companyname'];
$fJoined = date("F Y", strtotime($rowData['joined']));
$cphone = $rowData['whatsapp'];
$photo = $rowData['photo'];
?>