<?php ob_start(); 
error_reporting(0);
include ('../app/common.php');
include ('../app/classMySQL.php');
$db = new db_mysqli($server_name, $userdb, $passdb, $databasename,"");
include ('../app/function.php');

require_once('../app/class.phpmailer.php');
include("../app/class.smtp.php");

if(isset($_GET["refer"])){ $refer = anti_injection($_GET["refer"]); }
?>
<?php
session_start();
session_regenerate_id(true);
$session=session_id();
//session_name("AUTHEN");
if(isset($_POST["submit"])){
	
$refer_url = base64_decode($_POST['refer_url']);
$refurl=$_POST['refer_url'];
if($refer_url){
$go_url=$refer_url;
$useref="&refer=".$refurl;
}else{
$go_url="./index.php";
$useref="";
}		
	
		
$basereff = $_POST['refer'];
$_SESSION["session_reff"] = $basereff;

$username = anti_injection($_POST['username']); 
$admin_password = $_POST['password'];
$passwd=md5($admin_password);

$sqlus="SELECT userid FROM admin WHERE userid = '".mysqli_real_escape_string($username)."'"; 
$dtus=mysqli_query($sqlus) or die(mysqli_error());
$numus = mysqli_num_rows($dtus);
if(!$numus) {
header("location:./login.php?result=wrong_user".$useref."");
} else {
   
$db->select("userid, email, status, nama", "admin", "userid='".mysqli_real_escape_string($username)."' and pass='$passwd'");
if ($db->num_rows() >0) {

$ipne = $_SERVER['REMOTE_ADDR'];
$hostaddress = gethostbyaddr($ipne);
$browser = $_SERVER['HTTP_USER_AGENT'];  
$time=time();
$time_check=$time-1800; //We Have Set Time 5 Minutes
$clientdate    = (date ("Y-m-d H:i:s"));
$token = md5(md5(date("j, n, Y")).md5($session)); 
$sqlc = mysqli_query("SELECT userid FROM adminonline WHERE userid='".mysqli_real_escape_string($username)."'");
$numc = mysqli_num_rows($sqlc);
if(!empty($numc)){
mysqli_query("UPDATE adminonline SET time='$time', sessionslog='$token', ip='$ipne', date='$browser' where userid='".mysqli_real_escape_string($username)."'");
}else{
mysqli_query("insert into adminonline values('','$session', '$token', '".mysqli_real_escape_string($username)."', '$ipne', '$time', '$browser')");
}

$sblxx=mysqli_query("select time from adminlastlog where userid='".mysqli_real_escape_string($username)."' ORDER BY time DESC LIMIT 1");
while($rows=mysqli_fetch_row($sblxx)) {
$ida = $rows[0]+1;
}
mysqli_query("insert into adminlastlog values('','$token', '".mysqli_real_escape_string($username)."', '$ipne', '$hostaddress', '$browser', '$clientdate', '', '$ida')");

$sql4="DELETE FROM adminonline WHERE time<$time_check";
$result4=mysqli_query($sql4); // after 5 minutes, session will be deleted

  
    session_start();
	session_regenerate_id(true);
    // if they are in the database register the user id
    $_SESSION["valid_admin"] = $username;
	$_SESSION["status_admin"] = $db->result(0, "status");
	$_SESSION["nama_admin"] = $db->result(0, "nama");
	$_SESSION["admin_password"] = $passwd;
	$_SESSION["ipmin"] = $ipne;
	$_SESSION["browser"] = $browser;
	$_SESSION["min_log"] = $token;
	
	setcookie("usermin", $username, strtotime( '+1 days' ), "/", "", "", TRUE);
	setcookie("passmin", $passwd, strtotime( '+1 days' ), "/", "", "", TRUE);
	setcookie("stsmin", $db->result(0, "status"), strtotime( '+1 days' ), "/", "", "", TRUE);
	setcookie("browser", $browser, strtotime( '+1 days' ), "/", "", "", TRUE);
	setcookie("minlog", $token, strtotime( '+1 days' ), "/", "", "", TRUE);
	setcookie("ipmin", $ipne, strtotime( '+1 days' ), "/", "", "", TRUE);
	setcookie("namamin", $db->result(0, "nama"), strtotime( '+1 days' ), "/", "", "", TRUE);
	
	
	 
	
	
	
	if(isset($_SESSION["valid_admin"]) || isset($_COOKIE["usermin"])){
	
	$_SESSION["LAST_ACTIVITY"] = time();	
		

   $nama = $db->result(0, "nama");
   $email = $db->result(0, "email");
	$tgl = formatgl($clientdate);
	$waktu = date("H:i:s");
	$hostaddress = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$kodene = strtotime(date("Y-m-d H:i:s"));
$sess = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz", 64)), 0, 124);
$tokens = md5(md5(date("j, n, Y")).md5($sess));
$links = $openmail."?nid=".$kodene."&session=".$sess."&token=".$tokens;

if($logadmin == 1){

$isimail_e="<a href='http://".$domain."'><img src='".$logoinvoice."' style='display:inline;outline-style:none;text-decoration:none;' /></a><br><br><br>
<p>Someone has logged in admin area using your userid.</p>
<p>User ID: ".$username."</strong><br>
IP Address: ".$ipne."<br>
Hostnamme: ".$hostaddress."<br>
Browser : ".$browser."<br>
Date : ".$tgl."
</p>

<p><br><br><br>
Regards,<br>
<b><a href='http://".$domain."' target='_blank'>".$bisnisname."</a></b><br>
Email: ".$emailadmin."<br>Phone: ".$hpadmin."</p>";
	   
	    $mail3b = new PHPMailer;
		$mail3b->IsSMTP(); // telling the class to use SMTP
        $mail3b->Host       = $smtphost; // SMTP server
        $mail3b->SMTPAuth   = true;                  // enable SMTP authentication
        $mail3b->Host       = $smtphost; // sets the SMTP server
        $mail3b->Port       = $smtport;                    // set the SMTP port for the GMAIL server
        $mail3b->Username   = $smtpuser; // SMTP account username
        $mail3b->Password   = $smtpass;        // SMTP account password
        $mail3b->setFrom($emailadmin, $bisnisname);
        $mail3b->addAddress($email, $nama);
	    $mail3b->IsHTML(true);       
        $mail3b->Subject = ''.$nama.', Login Device Notification';
        $mail3b->msgHTML($isimail_e);
    $mail3b->send();	
	
	   }
   
   
   
   header("Location: ".$go_url."");
	}
	
	
	
  }  else {
	header("location: ./login.php?result=wrong_pass".$useref."");
}
}  

?>
<?
} else {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
       <meta name="author" content="<?php echo $db->config("domain"); ?>"/>
<meta name="description" content="<?php echo $db->config("description"); ?>" />
<meta name="keywords" content="<?php echo $db->config("keyword"); ?>" />
<meta name="robots" content="all,index,follow" />
<title>Login Admin | <?php echo $db->config("title"); ?></title>
    <link href="../images/banner/<?php echo $db->config("fcon"); ?>" rel="SHORTCUT ICON" /><!--favicon-->


        <!-- Bootstrap -->
        <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/waves.min.css" type="text/css" rel="stylesheet">
        <!--        <link rel="stylesheet" href="css/nanoscroller.css">-->
        <link href="./assets/css/style.css" type="text/css" rel="stylesheet">
        <link href="./assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>
video#bgvid { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -ms-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    background: url(bg-login-jpg.jpg) no-repeat;
    background-size: cover; 
}video#bgvid {
    transition: 1s opacity;
}@media screen and (max-device-width: 800px) {
    .account {
         background: url(./assets/bg-login-jpg.jpg) #000 no-repeat center center fixed;
    }
    #bgvid {
        display: none;
    }
}
.stopfade { opacity: .5; }

.boxe {
background-color: grey;
    background: rgb(204, 204, 204); /* Fallback for older browsers without RGBA-support */
    background: rgba(204, 204, 204, 0.7);
border-radius:4px;
padding: 10px;
border: 2px solid rgba(255, 255, 255, 0.7);
}
.form-group,h1,h3,button {
color: black;
}
a{
    word-wrap: break-word;
}
.account {
padding: 0;
}
.account-col h3 {
color: black;
}
</style>


    </head>
    <body class="account">
<video playsinline muted poster="./assets/bg-login-jpg.jpg" id="bgvid">
   
</video>
                    <center><img src="./assets/CreoCoin.png" style="margin-top:100px; margin-bottom:20px;"></center>
        <div class="container">
            <div class="row">
            
           
            
      <?php
$results = $_GET['result'];
if($results == "wrong_captcha") { 
echo "<div class='alert errorr' style='margin-top:15px;'>Wrong Captcha!</div>";
}
?> 
<?php
$results = $_GET['result'];
if($results == "wrong_user") { 
echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Wrong username!</div>";
}
?> 
<?php
$results = $_GET['result'];
if($results == "wrong_pass") { 
echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Wrong password!</div>";
}
?> 
<?php
$results = $_GET['result'];
if($results == "inactive") { 
echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Your membership status is not active! Please contact administrator.</div>";
}
?>
<?php
$results = $_GET['result'];
$mle = $_GET['mle'];
if($results == "success") { 
echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Password reset confirmation has been sent to your email ".$mle.", Please check your mailbox.</div>";
}
?>
<?php
$results = $_GET['result'];
$mle = $_GET['mle'];
if($results == "successx") { 
echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>Your password has been reset before, we had to send back a confirmation link, please check your mailbox ".$mle.".</div>";
}
?>
  <?php
$results = $_GET['result'];
if($results == "success_reset") { 
echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button>New password has been sent to your email ".base64_decode($_GET['m']).", Please check your mailbox.</div>";
}
?>    
            
            
                <div class="account-col text-center boxe" id="au">
                    <h3 color=black;><b>Login Administrator</b></h3>
                    
                    <form class="m-t" action="" method="post" accept-charset="utf-8" >
   
<input type="hidden" name="refer_url" id="refer_url" value="<?php echo $refer; ?>"/>
                    
                    
                         <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block ">Login</button>
                        <br><a href="forgotpass.php"><strong>Forgot password?</strong></a>
               
                <br><br>
                <p>Copyright &copy;  <?php echo $footer; ?></p>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="./assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="./assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="./assets/js/pace.min.js"></script>
<script>
$(document).ready(function() {
var myVideo = document.getElementById('bgvid');
if (typeof myVideo.loop == 'boolean') { // loop supported
  myVideo.loop = true;
} else { // loop property not supported
  myVideo.addEventListener('ended', function () {
    this.currentTime = 0;
    this.play();
  }, false);
}
//...
myVideo.play();
});
</script>
    </body>
</html>
<?php } ?>
<?php ob_flush(); ?>	