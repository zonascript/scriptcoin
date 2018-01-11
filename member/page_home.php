<?php ob_start(); 
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)){
echo "<p style='font-family:Arial, Helvetica, sans-serif; margin-top:100px; font-size:20px; line-height:180%; letter-spacing:2px;' align='center'><img src='https://primadesain.com/images/block.png' width='90' height='90' /></br></br>Accessing files directly is prohibited.</p><p style='font-family:Arial, Helvetica, sans-serif; margin-top:20px; font-size:12px; line-height:180%; letter-spacing:2px;' align='center'>&copy; 2009 - ".date("Y")." <a href='http://www.primadesain.com'>www.primadesain.com</a></p>";
echo "<meta http-equiv=\"refresh\" content=\"5; url=./index.php\">";
exit();} 
?>
<?php
$sblxx2da=mysql_query("select time from memberlog WHERE userid='$user_session' order by time DESC LIMIT 1");
while($rowsda=mysql_fetch_row($sblxx2da)) {
$idax = $rowsda[0];
$ida = $rowsda[0] - 1;
}
$sblxx2dc=mysql_query("select id, userid, ip, host, browser, logindate, logoutdate, time from memberlog WHERE userid='$user_session' AND time='$ida'");
while($rowsdc=mysql_fetch_row($sblxx2dc)) {
$useridne = $rowsdc[1];
$ipe = $rowsdc[2];
$host = $rowsdc[3];
$browser = $rowsdc[4];
$logindate = $rowsdc[5];
$logoutdate = $rowsdc[6];
}
if(!empty($logindate)){
$logindt = formatgl($logindate);
}else{
$logindt = "---";
}
if(!empty($browser)){
$browsere = $browser;
}else{
$browsere = "---";
}
if(!empty($ipe)){
$ipex = $ipe;
}else{
$ipex = "---";
}
if(!empty($host)){
$hoste = $host;
}else{
$hoste = "---";
}
if(empty($logoutdate) || $logoutdate == "0000-00-00 00:00:00"){
$logoutdt = "---";
}else{
$logoutdt = formatgl($logoutdt);
}
$date_a = new DateTime($logoutdate);
$date_b = new DateTime($logindate);

$interval = date_diff($date_a,$date_b);

$tmingx = $interval->format('%h:%i:%s');
if($tmingx == "0:0:0"){
$tming = "---";
}else{
$tming = $tmingx;
}
?>
<?php
$cekassx = mysql_query("select * from deposit where username='".$user_session."'");
$ada_assx = mysql_num_rows($cekassx); //---flush out hari ini
if(isset($_REQUEST['go'])){$go = $_REQUEST['go'];}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
   <title>Member Area | <?php echo WEB_NAME ?></title>
<meta name="copyright" content="Copyright (c) <?php echo date("Y"); ?> | <?php echo WEB_DOMAIN ?>" />
<meta name="author" content="www.primadesain.com"/>
<meta name="description" content="<?php echo WEB_DESC ?>" />
<meta name="keywords" content="<?php echo WEB_KEYWORDS ?>" />
   <link href="../images/banner/<?php echo $db->config("fcon"); ?>" rel="SHORTCUT ICON" /><!--favicon-->

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <link href="./creocoin/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css?t=1" rel="stylesheet" />
    <link href="./creocoin/assets/plugins/bootstrap/css/bootstrap.min.css?t=1" rel="stylesheet" />
    <link href="./creocoin/assets/plugins/font-awesome/css/font-awesome.min.css?t=1" rel="stylesheet" />
    <link href="./creocoin/assets/css/animate.min.css?t=1" rel="stylesheet" />
    <link href="./creocoin/assets/css/style.css?t=1" rel="stylesheet" />
    <link href="./creocoin/assets/css/custom.css" rel="stylesheet" />
    <link href="./creocoin/assets/css/style-responsive.min.css?t=1" rel="stylesheet" />
    <link href="./creocoin/assets/css/theme/blue.css?t=1" rel="stylesheet" id="theme" />
    <link href="./creocoin/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css?t=1" rel="stylesheet" />
    <link href="./creocoin/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css?t=1" rel="stylesheet" />
    <script src="./creocoin/assets/plugins/pace/pace.min.js"></script>
    
    <link rel="stylesheet" href="./ico/css/flipclock.css"> 
	<link rel="stylesheet" href="./creocoin/assets/build/css/intlTelInput.css"> 
   
        <link rel="stylesheet" href="./creocoin/assets/css/sweetalert.css">
        <script type="text/javascript" src="./creocoin/assets/highslide/highslide-with-gallery.js"></script>
<script type="text/javascript" src="./creocoin/assets/highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="./creocoin/assets/highslide/highslide.css" />

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
  <style type="text/css" media="screen">
       .flip-clock-divider .flip-clock-label {
    
    color: #ffffff;
}
.fa{margin-top:10px;}
.text-center {
    text-align: center !important;
}
   </style>

    <style>

.flip-clock-wrapper {
    text-align: center;
    position: relative;
    width: 100%;
    margin: 3em 0px!important;
    padding-left: 20px!important;
}
}
/*====response menu====*/
.navbar-nav {
    margin: 0;
}
@media (min-width: 768px){
  .navbar-nav {
    margin:7.5px -15px;
}
}
@media (max-width: 767px)
{
  .navbar {
    background-color: rgba(59,59,59,0.9);
}
}
/*de chong clock*/
.flip-clock-wrapper ul li a div div.inn{padding: 0;}
@media (max-width: 425px)
{.flip-clock-wrapper ul li {
    line-height: 55px;
}
}
@media screen and (max-width: 700px){
.flip-clock-wrapper {
 
    padding-left: 13px!important;
}
}
/* .flip-clock-wrapper {
    
   width: 120%; 

} */
    </style>

<script src="./ico/js/flipclock.min.js"></script>     
   <script type="text/javascript">

		jQuery(document).ready(function($) {
        
            var clock;
        
        $(document).ready(function() {
            var clock;
              
            clock = $('.clock').FlipClock({
                clockFace: 'DailyCounter',
                autoStart: false,
                callbacks: {
                    stop: function() {
                        $('.message').html('The clock has stopped!')
                    }
                }
            });
                    
            clock.setTime(864000);
            clock.setCountdown(true);
            clock.start();

        });           
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>


    <script type="text/javascript">
	hs.graphicsDir = './creocoin/assets/highslide/graphics/';
	hs.wrapperClassName = 'wide-border';
    </script>
<SCRIPT LANGUAGE="JavaScript">
var win = null;
function newWindow(mypage,myname,w,h,features) {
  var winl = (screen.width-w)/2;
  var wint = (screen.height-h)/2;
  if (winl < 0) winl = 0;
  if (wint < 0) wint = 0;
  var settings = 'height=' + h + ',';
  settings += 'width=' + w + ',';
  settings += 'top=' + wint + ',';
  settings += 'left=' + winl + ',';
  settings += features;
  win = window.open(mypage,myname,settings);
  win.window.focus();
}
</script>
<div id="dhtmltooltip"></div>

<script type="text/javascript">

/***********************************************
* Cool DHTML tooltip script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var offsetxpoint=-60 //Customize x offset of tooltip
var offsetypoint=20 //Customize y offset of tooltip
var ie=document.all
var ns6=document.getElementById && !document.all
var enabletip=false
if (ie||ns6)
var tipobj=document.all? document.all["dhtmltooltip"] : document.getElementById? document.getElementById("dhtmltooltip") : ""

function ietruebody(){
return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
}

function ddrivetip(thetext, thecolor, thewidth){
if (ns6||ie){
if (typeof thewidth!="undefined") tipobj.style.width=thewidth+"px"
if (typeof thecolor!="undefined" && thecolor!="") tipobj.style.backgroundColor=thecolor
tipobj.innerHTML=thetext
enabletip=true
return false
}
}

function positiontip(e){
if (enabletip){
var curX=(ns6)?e.pageX : event.clientX+ietruebody().scrollLeft;
var curY=(ns6)?e.pageY : event.clientY+ietruebody().scrollTop;
//Find out how close the mouse is to the corner of the window
var rightedge=ie&&!window.opera? ietruebody().clientWidth-event.clientX-offsetxpoint : window.innerWidth-e.clientX-offsetxpoint-20
var bottomedge=ie&&!window.opera? ietruebody().clientHeight-event.clientY-offsetypoint : window.innerHeight-e.clientY-offsetypoint-20

var leftedge=(offsetxpoint<0)? offsetxpoint*(-1) : -1000

//if the horizontal distance isn't enough to accomodate the width of the context menu
if (rightedge<tipobj.offsetWidth)
//move the horizontal position of the menu to the left by it's width
tipobj.style.left=ie? ietruebody().scrollLeft+event.clientX-tipobj.offsetWidth+"px" : window.pageXOffset+e.clientX-tipobj.offsetWidth+"px"
else if (curX<leftedge)
tipobj.style.left="5px"
else
//position the horizontal position of the menu where the mouse is positioned
tipobj.style.left=curX+offsetxpoint+"px"

//same concept with the vertical position
if (bottomedge<tipobj.offsetHeight)
tipobj.style.top=ie? ietruebody().scrollTop+event.clientY-tipobj.offsetHeight-offsetypoint+"px" : window.pageYOffset+e.clientY-tipobj.offsetHeight-offsetypoint+"px"
else
tipobj.style.top=curY+offsetypoint+"px"
tipobj.style.visibility="visible"
}
}

function hideddrivetip(){
if (ns6||ie){
enabletip=false
tipobj.style.visibility="hidden"
tipobj.style.left="-1000px"
tipobj.style.backgroundColor=''
tipobj.style.width=''
}
}

document.onmousemove=positiontip

</script>
</head>
<body>
 <script>
		function confirmActionx1(){
      var confirmed = swal({
  title: "Are you sure want to logout?",
  text: "",
  type: "info",
  showCancelButton: true,
  confirmButtonColor: "#AEDEF4",
  confirmButtonText: "OK, Logout",
  cancelButtonText: "No, Not Now!",
  closeOnConfirm: false,
  closeOnCancel: true
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "./index.php?do=logout&last_session=<?php echo $idax; ?>";
  } else {
	swal("Tidak", "Your imaginary file is safe :)", "error");
  }
});
     
}
</script>

<script>
		function confirmActionxstop(){
      var confirmed = swal({
  title: "Are you sure want to logout?",
  text: "",
  type: "info",
  showCancelButton: false,
  confirmButtonColor: "#AEDEF4",
  confirmButtonText: "OK",
  cancelButtonText: "No, Not Now!",
  closeOnConfirm: false,
  closeOnCancel: true
},
function(isConfirm){
  if (isConfirm) {
    window.location.href = "./login.php";
  } else {
	swal("Tidak", "Your imaginary file is safe :)", "error");
  }
});
     
}
</script>  
<div id="page-container" class="page-container page-sidebar-fixed page-header-fixed">
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand text-center" style="font-size:18px;">
                  <strong><?php echo WEB_NAME; ?></strong>
                </a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="f-s-14">
                      <div class="today-icon">
                        <img src="./creocoin/img/circle.png" alt="Circle" width="30"> 
                      </div>
                      <span class="text-today">ID: <?php echo $user_session; ?></span>
                    </a>
                  </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
			 <li class="dropdown"><a href="#" class="f-s-14">1 <?php echo $namecoins;?> = <?php echo btc($kurscoinbtc);?></a></li>
                <li class="dropdown"><a href="#" class="f-s-14">1 <?php echo $namecoins;?> = <?php echo dolar($kursusdcoin);?></a></li>
                <li class="dropdown"><a href="#" class="f-s-14">1 BTC = <?php echo dolar($kursbtc);?></a></li>
            </ul>
        </div>
    </div>
    <!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-profile">
               
              <?php $fotokupro = $db->dataku("foto", $user_session);
			        $dirfotopro = "images/".$fotokupro."";
			
				   if (!empty($fotokupro) && (file_exists($dirfotopro))){
				   $fotoprofilku = "<img alt='' class='center-block' src='".$dirfotopro."' width='100' height='100' style='border: #888 2px solid;'/>";
				   }else {
				   $fotoprofilku = "<img alt='' class='center-block' src='./images/avatar.png' width='100' height='100' style='border: #888 2px solid;'/>";
				   } ?>
                    <?php echo $fotoprofilku; ?> 
               
                
               <h4 class="text-white p-t-10">
                      <p class="text-center">
                   
                    <font style="font-size:16px; font-weight:normal;">( <?php echo $db->dataku("nama", $user_session); ?> )</font>
                    </p>
                </h4>
               
            </li>

          <?php if(!$go || $go=='') {?>
            <li class="active navbar-menu-bg"><a href="index.php"><img src="./creocoin/img/house-xxl.png" alt="Home" width="20"> <span>Home</span></a></li>
            <?php } else { ?>
            <li class="navbar-menu-bg"><a href="index.php"><img src="./creocoin/img/house-xxl.png" alt="Home" width="20"> <span>Home</span></a></li>
            <?php } ?>
            
			 <?php if($go=='ico') {?>
            <li class="active navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/ico.png" alt="ICO" width="20"><b class="caret pull-right"></b><span>ICO</span></a>    
            <ul class="sub-menu">
							<li><a href="?go=ico">ICO</a></li>
                          
							<li><a href="?go=buyico">Buy ICO</a></li>
                          
						</ul>
					</li>
            <?php } else { ?>
            <li class="navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/ico.png" alt="Wallet" width="20"><b class="caret pull-right"></b><span>ICO</span></a>    <ul class="sub-menu">
							<li><a href="?go=ico">ICO</a></li>
                          
							<li><a href="?go=buyico">Buy ICO</a></li>
                            
                            
						</ul>
					</li>
            <?php } ?>
			
			 <?php if($go=='wallet') {?>
            <li class="active navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/wallet.png" alt="Wallet" width="20"><b class="caret pull-right"></b><span>Wallet</span></a>    
            <ul class="sub-menu">
							<li><a href="?go=wallet">Deposits & Withdrawls</a></li>
							<li><a href="?go=wallet&page=history">History</a></li>
						</ul>
					</li>
            <?php } else { ?>
            <li class="navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/wallet.png" alt="Wallet" width="20"><b class="caret pull-right"></b><span>Wallet</span></a>    <ul class="sub-menu">
							<li><a href="?go=wallet">Deposits & Withdrawls</a></li>
							<li><a href="?go=wallet&page=history">History</a></li>
                            
						</ul>
					</li>
            <?php } ?>
					 <?php if($go=='lending') {?>
            <li class="active navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/transaction.png" alt="Lending" width="20"><b class="caret pull-right"></b><span>Lending</span></a>    
            <ul class="sub-menu">
							<li><a href="?go=lending">Lending</a></li>
							<li><a href="?go=lending&page=history">History</a></li>
						</ul>
					</li>
            <?php } else { ?>
            <li class="navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/transaction.png" alt="Lending" width="20"><b class="caret pull-right"></b><span>Lending</span></a>    <ul class="sub-menu">
							<li><a href="?go=lending">Lending</a></li>
							<li><a href="?go=lending&page=history">History</a></li>
                            
						</ul>
					</li>
            <?php } ?>
			
			
			<?php if($go=='exchange') {?>
           <li class="active navbar-menu-bg"><a href="index.php?go=exchange"><img src="./creocoin/img/ico.png" alt="Settings" width="20"> <span>Exchange</span></a></li>
            <?php } else { ?>
            <li class="navbar-menu-bg"><a href="index.php?go=exchange"><img src="./creocoin/img/ico.png" alt="Settings" width="20"> <span>Exchange</span></a></li>
            <?php } ?>
            
			            
             <?php if($go=='profile') {?>
           <li class="active navbar-menu-bg"><a href="index.php?go=profile"><img src="./creocoin/img/settings.png" alt="Settings" width="20"> <span>Settings</span></a></li>
            <?php } else { ?>
            <li class="navbar-menu-bg"><a href="index.php?go=profile"><img src="./creocoin/img/settings.png" alt="Settings" width="20"> <span>Settings</span></a></li>
            <?php } ?>
            
			
            <?php if($go=='secure') {?>
           <li class="active navbar-menu-bg"><a href="index.php?go=secure"><img src="./creocoin/img/security.png" alt="Security" width="20"> <span>Security</span></a></li>
            <?php } else { ?>
           <li class="navbar-menu-bg"><a href="index.php?go=secure"><img src="./creocoin/img/security.png" alt="Security" width="20"> <span>Security</span></a></li>
            <?php } ?>
               
           
             <?php if($go=='bonus') {?>
           <li class="active navbar-menu-bg"><a href="index.php?go=bonus"><img src="./creocoin/img/ico.png" alt="Bonus" width="20"> <span>Bonus</span></a></li>
            <?php } else { ?>
           <li class="navbar-menu-bg"><a href="index.php?go=bonus"><img src="./creocoin/img/ico.png" alt="Bonus" width="20"> <span>Bonus</span></a></li>
            <?php } ?>         
             
            <?php if($go=='datasp' || $go=='generation') {?>
            <li class="active navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/team.png" alt="Network" width="20"><b class="caret pull-right"></b><span>Network</span></a>    <ul class="sub-menu">
							<li><a href="index.php?go=datasp">Refferals</a></li>
							<li><a href="index.php?go=generation">Generation</a></li>
						</ul>
					</li>
            <?php } else { ?>
            <li class="navbar-menu-bg has-sub"><a href="javascript:;"><img src="./creocoin/img/team.png" alt="Network" width="20"><b class="caret pull-right"></b><span>Network</span></a>    <ul class="sub-menu">
							<li><a href="index.php?go=datasp">Refferals</a></li>
							<li><a href="index.php?go=generation">Generation</a></li>
						</ul>
					</li>
            <?php } ?>  
            
           
            
            
             <li class="navbar-menu-bg"><a href="#" onClick="return confirmActionx1()"><img src="./creocoin/img/logout.png" alt="logout" width="20"> <span>Logout</span></a></li>
           
              
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
        <div id="content" class="content">
       
       
  
       
       
          <?php
				   if($db->dataku("status", $user_session) == 1 && $db->dataku("blokir", $user_session) == 0) {
					if (empty($go)) $go = '';
					// PROSES OPEN ACCOUNT **************************************
					if 		($go=='')
								{ include("./mb_flad/mb_home.php"); }
					else if 	($go=='home')
								{ include("./mb_flad/mb_home.php"); }
					else if ($go=='profile')
								{ include("./mb_flad/mb_profile.php"); }
					else if ($go=='ico')
								{ include("./mb_flad/mb_ico.php"); }	
					else if ($go=='buyico')
								{ include("./mb_flad/mb_buyico.php"); }	
					else if ($go=='exchange')
								{ include("./mb_flad/mb_exchange.php"); }		
					else if ($go=='lending')
								{ include("./mb_flad/mb_lending.php"); }								
					else if ($go=='secure')
								{ include("./mb_flad/mb_secure.php"); }								
					else if ($go=='wallets')
								{ include("./mb_flad/mb_wallet.php"); }								
					else if ($go=='confirmbtc')
								{ include("./mb_flad/mb_confirmbtc.php"); }								
		
					else if ($go=='ftprofile')
								{ include("./mb_flad/mb_fotopro.php"); }
					else if ($go=='register_history')
								{ include("./mb_flad/mb_datareg.php"); }
					else if ($go=='bonus')
								{ include("./mb_flad/mb_bonus.php"); }
					else if ($go=='gantipass')
								{ include("./mb_flad/mb_passwd.php"); }
					else if ($go=='imgupload')
								{ include("./mb_flad/mb_fotoid.php"); }	
					else if ($go=='confirm')
								{ include("./mb_flad/mb_confirm.php"); }
					else if ($go=='genealogi')
								{ include("./mb_flad/mb_genealogy.php"); }	
					else if ($go=='tree')
								{ include("./mb_flad/mb_tree.php"); }	
					else if ($go=='inbox')
								{ include("./mb_flad/mb_inbox.php"); }	
					else if ($go=='sponsoring')
								{ include("./mb_flad/mb_sponsoring.php"); }	
					else if ($go=='file_upload')
								{ include("./mb_flad/mb_fileup.php"); }	
					else if ($go=='notif')
								{ include("./mb_flad/mb_notif.php"); }	
					else if ($go=='profits')
								{ include("./mb_flad/mb_profits.php"); }	
					else if ($go=='withdrawal')
								{ include("./mb_flad/mb_withdrawal.php"); }		
					else if ($go=='testimonial')

								{ include("./mb_flad/mb_testi.php"); }
					else if ($go=='user-download')
								{ include("./mb_flad/mb_down.php"); }
					else if ($go=='news')
								{ include("./mb_flad/mb_news.php"); }	
					else if ($go=='tree')
								{ include("./mb_flad/tree.php"); }	
					else if ($go=='datasp')
								{ include("./mb_flad/mb_datasp.php"); }
					else if ($go=='deposit')
								{ include("./mb_flad/mb_givehelp.php"); }
					else if ($go=='sponsor')
								{ include("./mb_flad/upline.php"); }	
					else if ($go=='requestpin')
								{ include("./mb_flad/mb_editpin.php"); }
					else if ($go=='activatepin')
								{ include("./mb_flad/mb_actpin.php"); }		
					else if ($go=='register')
								{ include("./mb_flad/mb_reg.php"); }		
					else if ($go=='content')
								{ include("./content.php"); }
					else if ($go=='login')
								{ include("./login.php"); }
					else if ($go=='contact')
								{ include("./contact.php"); }	
					else if ($go=='generation')
								{ include("./mb_flad/mb_generation.php"); }
					else if ($go=='ewalet')
								{ include("./mb_flad/mb_walet.php"); }
					else if ($go=='download')
								{ include("./mb_flad/mb_download.php"); }
					else if ($go=='outbox')
								{ include("./mb_flad/mb_outbox.php"); }
					else if ($go=='notif')
								{ include("./mb_flad/mb_notif.php"); }
					else if ($go=='wallet')
								{ include("./mb_flad/mb_wallets.php"); }
					else if ($go=='btcpin')
								{ include("./mb_flad/mb_btcpin.php"); }
					else if ($go=='lostpin')
								{ include("./mb_flad/mb_lostpin.php"); }
					else if ($go=='withdrawal')
								{ include("./mb_flad/mb_withdrawal.php"); }		
					else if ($go=='withdrawalpro')
								{ include("./mb_flad/mb_withdrawalpro.php"); }			
								
					else 		{ include("./mb_flad/redr.php");  }
					} else {
					if 		(empty($go))
								{ include("./mb_flad/mb_home.php"); }
					else if ($go=='home')
								{ include("./mb_flad/mb_home.php"); }			
								
					else 		{ include("./mb_flad/redr.php");  }
					
					} ?>
     
        
        
        
        
        
        
        
        
    </div>
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
</div>
<script src="./creocoin/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
<script src="./creocoin/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
<script src="./creocoin/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
<script src="./creocoin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="/assets/crossbrowserjs/html5shiv.js"></script>
<script src="/assets/crossbrowserjs/respond.min.js"></script>
<script src="/assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="./creocoin/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="./creocoin/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
<script src="./creocoin/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="./creocoin/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<script src="./creocoin/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="./creocoin/assets/plugins/highchart/highcharts.js"></script>
<script src="./creocoin/assets/plugins/highchart/modules/exporting.js"></script>
<script src="./creocoin/assets/js/apps.min.js"></script>
        <script src="./creocoin/assets/js/sweet-alert/sweetalert.min.js"></script>
		
		        <script src="./ico/js/creocoin.js"></script>
<script>$(document).ready(function(){App.init();});</script>
<script>
$(document).ready(function(){
  $('button[type=submit]').prop('disabled', false);
  $('#ico-form').submit(function(){
    $(this).children('button[type=submit]').prop('disabled', true);
  });

    setTimeout(function () {
    $.get('/recent-transactions', function (res) {
      if (res.success) {
        $('#recent-transactions').replaceWith(res.html)
      }
    })
  }, 0);
  })
</script>
    <script>
      $(document).ready(function () {
        $('#data-table').dataTable({
          'order': [[3, 'asc']]
        })
      })
    </script>
<script src="assets/js/hextracoin.js"></script>
<script src="./creocoin/assets/js/hextracoin.js"></script>
<?php if($stchat == 1) { echo $lchats; }?>
</body>
</html>
<?php ob_flush(); ?>