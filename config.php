<?php

$fmt = new NumberFormatter( 'id_ID', NumberFormatter::CURRENCY );

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'worklink');

/**
 * $dbconnect : koneksi kedatabase
 */
$dbconnect = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

/**
 * Check Error yang terjadi saat koneksi
 * jika terdapat error maka die() // stop dan tampilkan error
 */
if ($dbconnect->connect_error) {
	die('Database Not Connect. Error : ' . $dbconnect->connect_error);
}

$webQ = mysqli_query($dbconnect, "SELECT * FROM settings");
$webData = mysqli_fetch_assoc($webQ);

/* SERIAL CODE WORKLINK BY SCAR */
$serial_code = "224CD1263820";
/* THIS CODE IS UNIQUE */

$namapersh = $webData['siteName'];
$currency = $webData['satuan'];
$tahuncode = "2019";
$linkprefix = $webData['linkprefix'];
$showdev = $webData['showdev'];
$devteam = "SCAR";
$email = "mambramo@asu.com";
$norek = $webData['norek'];

function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
}
