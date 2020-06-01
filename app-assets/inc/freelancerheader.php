<?php
include("../../config.php");
if(!isset($_COOKIE['loggeduser']) || !isset($_COOKIE['token'])){
	header('location:http://'.$_SERVER['HTTP_HOST'].$linkprefix.'/user/login');
}
 	$sql_check = "SELECT *
                  FROM freelancer 
                  WHERE 
                       username=? 
                       AND 
                       enckey=? 
                  LIMIT 1";

    $check_log = $dbconnect->prepare($sql_check);
    $check_log->bind_param('ss', $uname, $token);

    $uname = base64_decode(base64_decode($_COOKIE['loggeduser']));
    $token = $_COOKIE['token'];

    $check_log->execute();

    $check_log->store_result();

    if (!$check_log->num_rows == 1 )
    	header('location:http://'.$_SERVER['HTTP_HOST'].$linkprefix.'/user/logout');
    $check_log->close();

$resNotifCount = mysqli_query($dbconnect, "SELECT * FROM fNotification INNER JOIN freelancer ON userfrom = freelancer.username WHERE fNotification.username='$uname' AND opened='0' ORDER BY timestamp DESC");
$resNotif = mysqli_query($dbconnect, "SELECT * FROM fNotification WHERE username='$uname' AND opened='0' ORDER BY timestamp DESC LIMIT 5");
$resAbility = mysqli_query($dbconnect, "SELECT fability.AbilityID, abilityName, iconClass, tooltip FROM fability INNER JOIN abilitycategory ON fability.AbilityID = abilitycategory.AbilityID WHERE username='$uname'");
$resEducation = mysqli_query($dbconnect, "SELECT * FROM education WHERE username='$uname' ORDER BY yearStart DESC");
$resWorkAvail = mysqli_query($dbconnect, "SELECT w.projectID,w.cID, name, details, count(useriD) as jumlah, IF(w.projectID in (SELECT projectID FROM workqueue WHERE userID='$uname'),1,0) AS terdaftar FROM work w LEFT JOIN workqueue wq ON w.projectID=wq.projectID WHERE handled='' GROUP BY w.projectID ORDER BY RAND() LIMIT 5");
$resWorkDoed = mysqli_query($dbconnect, "SELECT w.*, c.email FROM work w JOIN company c ON w.cID = c.username WHERE handled='$uname' OR '$uname' IN(SELECT userID FROM workqueue)");
$resData = mysqli_query($dbconnect, "SELECT * FROM freelancer WHERE username='$uname'");
$allAbility = mysqli_query($dbconnect, "SELECT AbilityID, abilityName, tooltip, IF(abilitycategory.AbilityID in (SELECT AbilityID FROM fability WHERE fability.username='$uname'),1,0) AS tercentang FROM abilitycategory");
$rowData = mysqli_fetch_assoc($resData);
$joined = $rowData['joined'];
$fJoined = date("F Y", strtotime($joined));
$fname = $rowData['fname'];
$lname = $rowData['lname'];
$usaldo = $rowData['saldo'];
$uemail = $rowData['email'];
$urole = $rowData['status'];
$pendusaldo = $rowData['pendsaldo'];
$ulocation = $rowData['location'];
$uwebsite = $rowData['website'];
$uphone = $rowData['phone'];
$gend = $rowData['gender'];
$about = $rowData['about'] == "" ? "This user doesn't want to explain him/herself." : $rowData['about'] ;
$ugender = $gend == 1 ? "Female" : "Male";
$umari = $rowData['marital'];
$ucall = $gend == 1 ? ($rowData['marital'] == 1 ? "Mrs." : "Ms.") : "Mr.";
?>