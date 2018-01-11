<?php
if (basename($_SERVER["SCRIPT_FILENAME"]) == basename(__FILE__)){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=./index.php\">";
exit();} 
$server_name="localhost";
	$userdb="root";
	$passdb="";
	$databasename="creocoin.com";
    $admindir="";
    $sysweb="2";
	
	$mysqli = new mysqli($server_name, $userdb, $passdb,$databasename);						
if ($mysqli->connect_error) {
   //('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
   die('<center><br><h2>server bussy, please wait...</h2></center>');
}

	date_default_timezone_set("America/New York");
	?>