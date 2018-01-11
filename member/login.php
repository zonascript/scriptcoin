<?php ob_start(); 

error_reporting(1);
include("../app/common.php");
include("../app/classMySQL.php");

$db = new db_mysql($server_name, $userdb, $passdb, $databasename,"");
include("../app/function.php");
include("../app/affiliate.php");



if($lang == 1){

include("../app/langid.php");

}else{

include("../app/langen.php");

}

require_once('../app/class.phpmailer.php');

include("../app/class.smtp.php");



if ($blockie == 1 && preg_match("/MSIE/",getenv("HTTP_USER_AGENT")) ||

preg_match("/Internet Explorer/",getenv("HTTP_USER_AGENT"))) {

include ('./block_ie.php');

exit;

}   

?>

<!DOCTYPE html>

<!--[if IE 8]>

<html lang="en" class="ie8"> <![endif]-->

<!--[if !IE]><!-->

<html lang="en">

<!--<![endif]-->

<head>

    <meta charset="utf-8"/>

    <meta name="author" content="<?php echo WEB_DOMAIN; ?>"/>

    <meta name="description" content="<?php echo WEB_DESC; ?>" />

    <meta name="keywords" content="<?php echo WEB_KEYWORDS; ?>" />

	<title>Login - <?php echo WEB_TITLE; ?></title>

    <link href="images/banner/<?php echo WEB_FAVCONS; ?>" rel="SHORTCUT ICON" /><!--favicon-->

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>



    <!-- ================== BEGIN BASE CSS STYLE ================== -->

    <link href="./login/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css" rel="stylesheet"/>

    <link href="./login/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

    <link href="./login/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

    <link href="./login/assets/css/animate.min.css" rel="stylesheet"/>

    <link href="./login/assets/css/style.min.css" rel="stylesheet"/>

    <link href="./login/assets/css/style-responsive.min.css" rel="stylesheet"/>

    <link href="./login/assets/css/theme/default.css" rel="stylesheet" id="theme"/>

    <!-- ================== END BASE CSS STYLE ================== -->



    <!-- ================== BEGIN BASE JS ================== -->

    <script src="./login/assets/plugins/pace/pace.min.js"></script>

    <!-- ================== END BASE JS ================== -->

	

	<!-- Start Alexa Certify Javascript -->

<script type="text/javascript">

_atrk_opts = { atrk_acct:"54O3q1CJLq20jn", domain:"creocoin.com",dynamic: true};

(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();

</script>

<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=54O3q1CJLq20jn" style="display:none" height="1" width="1" alt="" /></noscript>

<!-- End Alexa Certify Javascript -->  

</head>

<body class="pace-top bg-white">

<!-- begin #page-loader -->

<div id="page-loader" class="fade in"><span class="spinner"></span></div>

<!-- end #page-loader -->



<!-- begin #page-container -->

<div id="page-container" class="">

    <!-- begin login -->

    <div class="login login-with-news-feed">

        <!-- begin news-feed -->

     <!--   <div class="news-feed">

            <div class="news-image">

                <img src="./login/assets/img/login-bg/bg-15.jpg" alt="">

            </div>

            

        </div> -->

        <!-- end news-feed -->

        <!-- begin right-content -->

        <div class="right-content">

            <!-- begin login-header -->

            <div class="login-header">

                <center>

                    <img src="./Creocoin.png">

                   
                </center>

            </div>

            <!-- end login-header -->

            <!-- begin login-content -->

            <div class="login-content">

            

        

  <?php

$results = $_GET['result'];

$user = $_GET['user'];

$rem = $_GET['rem'];

if($results == "restrict") { 

echo "<div class='alert alert-danger'>You recently resend email activation code, please wait ".$rem." to be able to resend again.</div>";

}

?>              

  

                

                

                

                

      <?php

	 $results = $_GET['result'];

if($results == "cekpoint") { 

$ntm = base64_decode($_GET['tc']);

$bataslog = $db->config("log_salah");

		?> 

				<div class='alert alert-danger'>You have to enter a password more than <?php echo $bataslog;?> times. please wait <?php echo $ntm; ?> to try login again.</div>

				<?php } ?>

      



 <?php

$results = $_GET['result'];

if($results == "error") { 

echo "<div class='alert alert-danger'>Invalid session!</div>";

}

?>



				

		 <?php

	 $results = $_GET['result'];

	 if($results == "blocked") {

     echo "<div class='alert alert-danger'>your member area being blocked! contact administrator.</div>";

	 }?> 

				 

      

<?php

$results = $_GET['result'];

if($results == "wrong_user") { 

echo "<div class='alert alert-danger'>Username Not Found!</div>";

}

?>

<?php

$results = $_GET['result'];

if($results == "wrong_userx") { 

echo "<div class='alert alert-danger'>Wrong Username!</div>";

}

?>

<?php

$results = $_GET['result'];

$batase = $db->config("log_salah");

$co = $_GET['co'];

$sql="SELECT batas FROM member WHERE username = '".mysql_real_escape_string($co)."'"; 

$dt=mysql_query($sql);

$con=mysql_fetch_array($dt);

$batas = $con['batas']; 



if($results == "wrong_pass") { 

echo "<div class='alert alert-danger'>Wrong Password! Forgot password? Please reset your password.</div>";

}

?>

<?php

$results = $_GET['result'];

if($results == "inactive") { 

echo "<div class='alert alert-danger'>Your memberlist is not active! please contact administrator.</div>";

}

?>



<?php

$results = $_GET['result'];

$mle = $_GET['mle'];

if($results == "success") { 

echo "<div class='alert alert-success'>Reset the password has been sent to your email ".$mle.", please check your mailbox.</div>";

}

?>

<?php

$results = $_GET['result'];

$mlex = $_GET['p'];

$mlex2 = $_GET['u'];

if($results == "success_psw") { 

echo "<div class='alert alert-success'>Your password has been successfully updated! use this following password to login :<strong> ".$mlex."</strong>.<br>for security reason, change your password regularly in the member area.</div>";

}

?>

<?php

$results = $_GET['result'];

$mle = $_GET['mle'];

if($results == "successx") { 

echo "<div class='alert alert-success'>Your password has been reset earlier and unprocessed, we have sent password reset confirmation again, please chack your mailbox ".$mle.".</div>";

}

?>



<?php

$results = $_GET['result'];

if($results == "successreg") { 

echo "<div class='alert alert-success'>Your registration has been successful, please login your members area below.</div>";

}

?>

            

  

                <form method="POST" action="lg_process.php" accept-charset="UTF-8" class="margin-bottom-0">

                                <div class="form-group m-b-15">

                    <input class="form-control input-lg" placeholder="Username" required name="userlogin" type="text" value="<?php echo $_GET['u']; ?>">

                </div>

                <div class="form-group m-b-15">

                    <input class="form-control input-lg" placeholder="Password" required name="passlogin" type="password" value="<?php echo $_GET['p']; ?>">

                </div>

               

                <div class="login-buttons">

                    <button type="submit" class="btn btn-primary-lightblue btn-block btn-lg">Login</button>

                </div>

                 <div class="m-t-20 m-b-40 p-b-40 text-inverse">

                    Forgot Password Click Here <a href="forgotpass.php" class="text-success-dark">Here</a><br>Not a member yet? Click <a href="signup.php" class="text-success-dark">Here</a> to register.<br>

                    

                </div>

                <hr/>

                <p class="text-center">

                  Copyright &copy;  <?php echo WEB_FOOTER; ?>

                </p>

                </form>

            </div>

            <!-- end login-content -->

        </div>

        <!-- end right-container -->

    </div>

    <!-- end login -->

</div>

<!-- end page container -->



<!-- ================== BEGIN BASE JS ================== -->

<script src="./login/assets/plugins/jquery/jquery-1.9.1.min.js"></script>

<script src="./login/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>

<script src="./login/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>

<script src="./login/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--[if lt IE 9]>

<script src="/assets/crossbrowserjs/html5shiv.js"></script>

<script src="/assets/crossbrowserjs/respond.min.js"></script>

<script src="/assets/crossbrowserjs/excanvas.min.js"></script>

<![endif]-->

<script src="./login/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="./login/assets/plugins/jquery-cookie/jquery.cookie.js"></script>

<!-- ================== END BASE JS ================== -->



<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script src="./login/assets/js/apps.min.js"></script>

<!-- ================== END PAGE LEVEL JS ================== -->



<script>

  $(document).ready(function () {

    App.init()

  })

</script>

</body>

</html>

<?php ob_flush(); ?>