<?php ob_start(); 
error_reporting(0);

session_start();
session_regenerate_id(true);

     $protocol = 'http://';
	 $base_url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
     $bsurl=base64_encode($base_url);	


if (isset($_GET['page']) && $_GET['page'] == "logout")
	{
	$mx = $_GET["mx"];
	$valid_admin=$_COOKIE["usermin"];
    $min_log = $_COOKIE["minlog"];
	include("../app/common.php");
	 mysqli_connect($server_name,$userdb,$passdb);
    mysqli_select_db($databasename);       
    $sql="DELETE FROM adminonline WHERE userid='$valid_admin' and sessionslog='$min_log'";
    $result=mysqli_query($sql);	   
	$date = (date ("Y-m-d H:i:s"));
	$sqla="UPDATE adminlastlog SET logoutdate='$date' WHERE userid='$valid_admin' and session='$min_log'";
    $resulta=mysqli_query($sqla);
	$sqlb="DELETE FROM adminlastlog WHERE userid='$valid_admin' and time <> $mx";
    $resultb=mysqli_query($sqlb);		  	
		
		if(isset($_COOKIE["usermin"]) && isset($_COOKIE["passmin"])) { 
setcookie("usermin", '', strtotime( '-5 days' ), '/'); 
setcookie("passmin", '', strtotime( '-5 days' ), '/'); 
setcookie("stsmin", '', strtotime( '-5 days' ), '/'); 
setcookie("browser", '', strtotime( '-5 days' ), '/');
setcookie("minlog", '', strtotime( '-5 days' ), '/'); 
setcookie("ipmin", '', strtotime( '-5 days' ), '/');  
setcookie("namamin", '', strtotime( '-5 days' ), '/'); 
setcookie("minres", '', strtotime( '-5 days' ), '/');  }
		
        session_destroy();
		
		header("location:../");
	}

if(isset($_COOKIE["usermin"]) && isset($_COOKIE["passmin"])) { 
$valid_admin=$_COOKIE["usermin"];
$admin_password=$_COOKIE["passmin"];
$admin_nama=$_COOKIE["namamin"];
$ipmincheck=$_COOKIE["ipmin"];
$browsercheck=$_COOKIE["browser"];
$min_log=$_COOKIE["minlog"];
$minres=$_COOKIE["minres"];
$_SESSION["valid_admin"]=$valid_admin;
$_SESSION["admin_password"]=$admin_password;
$_SESSION["nama_admin"]=$admin_nama;
$_SESSION["ipmin"]=$ipmincheck;
$_SESSION["browser"]=$browsercheck;
$_SESSION["min_log"]=$min_log;
$_SESSION["minres"]=$minres;

} else if(isset($_SESSION["valid_admin"])){
$valid_admin=$_SESSION["valid_admin"];
$admin_password=$_SESSION["admin_password"];
$admin_nama=$_SESSION["nama_admin"];
$ipmincheck=$_SESSION["ipmin"];
$browsercheck=$_SESSION["browser"];
$min_log = $_SESSION["min_log"];
$minres = $_SESSION["minres"];


}else{ }

include("../app/common.php");
include("../app/classMySQL.php");
$db = new db_mysqli($server_name, $userdb, $passdb, $databasename,"");
include("../app/function.php");
if($lang == 1){
include("../app/langid.php");
}else{
include("../app/langen.php");
}

require '../app/mail/PHPMailerAutoload.php';

$sql0 = mysqli_query("SELECT * FROM ipblock WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
$num0 = mysqli_num_rows($sql0);
if($num0 > 0) {
	$string = 'Your IP Address '.$_SERVER['REMOTE_ADDR'].' has been BLOCKED!\nPlease contact our administrator! '.WEB_NAME.'\nEmail: '.BUSSINESS_EMAIL.'';
        echo "<script>alert(\"$string\");".
        "window.location = '".$redirurl."'</script>";
exit();
}

$query113z = "SELECT * FROM ckpoint WHERE username = '".$valid_admin."'"; 
$result113z = mysqli_query($query113z);
$numus9999 = mysqli_num_rows($result113z);
$row113z = mysqli_fetch_array($result113z);
$times0000 = $row113z['time'];


$time0000=time();
if($numus9999) {

if($times0000 <= $time0000){
	
	 $db->delete("ckpoint", "username = '".$valid_admin."'");
	 
 session_start();
	setcookie("usermin", '', strtotime( '-5 days' ), '/'); 
        setcookie("passmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("stsmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("browser", '', strtotime( '-5 days' ), '/');
        setcookie("minlog", '', strtotime( '-5 days' ), '/'); 
        setcookie("ipmin", '', strtotime( '-5 days' ), '/');  
        setcookie("namamin", '', strtotime( '-5 days' ), '/');
        session_destroy();
    $string = 'Our system detects illegal logins \n\nPlease login again';
    echo "<script>alert(\"$string\");".
     "window.location = './login.php?refer=".$bsurl."'</script>";

}else { 

header("location: ./checkpoint.php?refer=".$bsurl."");	
}

}else{




if(isset($_COOKIE["usermin"]) || isset($_SESSION["valid_admin"])){
$_SESSION["LAST_ACTIVITY"] = time();



if (isset($_SESSION["LAST_ACTIVITY"])) {
    if (time() - $_SESSION["LAST_ACTIVITY"] > $sess_time) {
        session_start();
		setcookie("usermin", '', strtotime( '-5 days' ), '/'); 
        setcookie("passmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("stsmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("browser", '', strtotime( '-5 days' ), '/');
        setcookie("minlog", '', strtotime( '-5 days' ), '/'); 
        setcookie("ipmin", '', strtotime( '-5 days' ), '/');  
        setcookie("namamin", '', strtotime( '-5 days' ), '/');
        session_destroy();
		$string = 'Your login session has ended because there is no activity during '.$menite.' minutes \n\nPlease login again';
        echo "<script>alert(\"$string\");".
        "window.location = './login.php?refer=".$bsurl."'</script>";
    } else if (time() - $_SESSION["LAST_ACTIVITY"] > 60) {
        $_SESSION["LAST_ACTIVITY"] = time();
		mysqli_query("UPDATE adminonline SET time='".time()."' where userid='$valid_admin' and sessionslog='$min_log'");
    }
}

$sqlq = mysqli_query("SELECT * FROM admin WHERE userid='$valid_admin'");
$numq = mysqli_num_rows($sqlq);
while($rowq = mysqli_fetch_array($sqlq)){
$pas = $rowq['pass'];
}
if($pas != $admin_password)
{
    session_start();
	setcookie("usermin", '', strtotime( '-5 days' ), '/'); 
        setcookie("passmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("stsmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("browser", '', strtotime( '-5 days' ), '/');
        setcookie("minlog", '', strtotime( '-5 days' ), '/'); 
        setcookie("ipmin", '', strtotime( '-5 days' ), '/');  
        setcookie("namamin", '', strtotime( '-5 days' ), '/');
        session_destroy();
    $string = 'Our system detects your password has changed \n\nPlease login again';
    echo "<script>alert(\"$string\");".
     "window.location = './login.php?refer=".$bsurl."'</script>";
}


$sqlp = mysqli_query("SELECT * FROM adminonline WHERE userid='$valid_admin'");
$nump = mysqli_num_rows($sqlp);
if(!$nump){
	 session_start();
	setcookie("usermin", '', strtotime( '-5 days' ), '/'); 
        setcookie("passmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("stsmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("browser", '', strtotime( '-5 days' ), '/');
        setcookie("minlog", '', strtotime( '-5 days' ), '/'); 
        setcookie("ipmin", '', strtotime( '-5 days' ), '/');  
        setcookie("namamin", '', strtotime( '-5 days' ), '/');
        session_destroy();
	header("location: login.php?refer=".$bsurl."");	
exit;
}else{

while($rowp = mysqli_fetch_array($sqlp)){
$ip = $rowp['ip'];
$ssn = $rowp['sessionslog'];
$bws = $rowp['date'];
$hostaddress = gethostbyaddr($ip);
}
if($privatelogin == 1 && $ip != $ipmincheck || $ssn != $min_log)
{
    session_start();
	setcookie("usermin", '', strtotime( '-5 days' ), '/'); 
        setcookie("passmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("stsmin", '', strtotime( '-5 days' ), '/'); 
        setcookie("browser", '', strtotime( '-5 days' ), '/');
        setcookie("minlog", '', strtotime( '-5 days' ), '/'); 
        setcookie("ipmin", '', strtotime( '-5 days' ), '/');  
        setcookie("namamin", '', strtotime( '-5 days' ), '/');
        session_destroy();
    $string = 'There are other administrators who are currently logged in using your userid \n\nUserid : '.$valid_admin.' \nIP Address : '.$ip.' \nHostname : '.$hostaddress.'  \nBrowser : '.$bws.' \n\nIf you are logged in using the browser, please use one of the browsers only.\n\n\nPlease login again here';
    echo "<script>alert(\"$string\");".
    "window.location = './login.php?refer=".$bsurl."'</script>";
}
}
include("./ad_template.php");


} else {
	//echo "<p align=center>Anda tidak berhak mengakses halaman ini.<br>
	//Silakan Anda <a class=linktext href='login.php'>LOGIN</a> terlebih dahulu.</p>";
	header("location: ./login.php?refer=".$bsurl."");	
}
}
?>
<?php ob_flush(); ?>