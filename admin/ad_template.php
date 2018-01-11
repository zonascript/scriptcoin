<?php ob_start(); 
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=./index.php\">";
exit();} 
if (empty($_SESSION["valid_admin"])){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=../index.php\">";
exit();}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrator <?php echo $bisnisname ?></title>
<link href="../images/banner/<?php echo $db->config("fcon"); ?>" rel="SHORTCUT ICON" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="./css/ui.all.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/jqueryui.js"></script>
<script type="text/javascript" src="./js/adminsearchbox.js"></script>
<link rel="stylesheet" href="../css/colorbox.css" />
	<link rel="stylesheet" href="../css/build/css/intlTelInput.css">
<script type="text/javascript">
        tinymce.init({
            selector: "#mytextarea"
        });
    </script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="../js/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
		
		$('.iframe1').colorbox({
        iframe:true,
        width:'515px',
        height:'690px',
		overlayClose: false,
		closeButton: false,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
        onClosed:function(){ location.reload(true); },
    }); 
		$('.iframe2').colorbox({
        iframe:true,
        width:'515px',
        height:'690px',
		overlayClose: false,
		closeButton: false,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
        onClosed:function(){ location.reload(true); },
    }); 
	$('.iframe3').colorbox({
        iframe:true,
        width:'515px',
        height:'770px',
		overlayClose: false,
		closeButton: false,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
    }); 
	$('.iframe4').colorbox({
        iframe:true,
        width:'515px',
        height:'680px',
		overlayClose: false,
		closeButton: false,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
    }); 
	$('.iframe5').colorbox({
        iframe:true,
        width:'515px',
        height:'650px',
		overlayClose: false,
		closeButton: false,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
    }); 
	$('.iframe6').colorbox({
        iframe:true,
        width:'515px',
        height:'400px',
		overlayClose: false,
		closeButton: false,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
    }); 
	$('.iframe7').colorbox({
        iframe:true,
        width:'800px',
        height:'600px',
		overlayClose: false,
		closeButton: true,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
    }); 
	$('.iframe8').colorbox({
        iframe:true,
        width:'515px',
        height:'840px',
		overlayClose: false,
		closeButton: false,
		scrolling: true, 
		transition: 'elastic',
		opacity:0.75,
		title:'',
		speed:700,
		fastIframe:false,
		escKey:false,
		arrowKey:false,
		fadeOut:700,
		reposition:true,
		onLoad: function() {
                $("#cboxLoadingOverlay").html("<center><img src='../images/horizontal-loading.gif' alt='Loading....'/></center>")
    },
    }); 
	$(".inline").colorbox({
	inline:true, 
	width:"50%",
		speed:700,
		fadeOut:700,
		opacity:0.75,
		fastIframe:true,
		overlayClose: true,
		reposition:true,
	
	});
	$(".inline2").colorbox({
	inline:true, 
        width:'400px',
		overlayClose: true,
		fastIframe:true,
		speed:700,
		fadeOut:700,
		opacity:0.75,
		reposition:true,
	
	});
			});
		</script>
<script type="text/javascript" src="./js/utils.js"></script>
<script>
  $(document).ready(function(){
     $("#shownotes").click(function () {
        $("#mynotes").toggle("slow");
        return false;
    });
    $("#savenotes").click(function () {
        $("#mynotes").toggle("slow");
        $.post("index.php", { action: "savenotes", notes: $("#mynotesbox").val() });
    });
    $("#intellisearchval").keyup(function () {
        var intellisearchlength = $("#intellisearchval").val().length;
        if (intellisearchlength>2) {
        $.post("search.php", { intellisearch: "true", value: $("#intellisearchval").val() },
          function(data){
            $("#searchresults").html(data);
            $("#searchresults").slideDown("slow");
          });
        }
    });
    $("#intellisearchcancel").click(function () {
        $("#intellisearchval").val("");
        $("#searchresults").slideUp("slow");
    });
    $(".datepick").datepicker({
        dateFormat: "dd/mm/yy",
        showOn: "button",
        buttonImage: "images/showcalendar.gif",
        buttonImageOnly: true,
        showButtonPanel: true
    });
    $(".tabbox").css("display","none");
var selectedTab;
$(".tab").click(function(){
    var elid = $(this).attr("id");
    $(".tab").removeClass("tabselected");
    $("#"+elid).addClass("tabselected");
    if (elid != selectedTab) {
        $(".tabbox").slideUp();
        $("#"+elid+"box").slideDown();
        selectedTab = elid;
    }
    $("#tab").val(elid.substr(3));
});
selectedTab = "tab0";
$("#tab0").addClass("tabselected");
$("#tab0box").css("display","");
  });
  
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
	<script type="text/javascript" src="../css/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="../css/highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = '../css/highslide/graphics/';
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
<script src="../js/gen_validatorv4.js"></script>
<script language="javascript">
var popupWindow = null;
function positionedPopup(url,winName,w,h,t,l,scroll){
settings =
'height='+h+',width='+w+',top='+t+',left='+l+',scrollbars='+scroll+',resizable'
popupWindow = window.open(url,winName,settings)
}
</script>
<link rel="stylesheet" type="text/css" href="../css/calendar-win2k-1.css" media="all" />
<script type="text/javascript" src="../js/calendar.js"></script>
<script type="text/javascript" src="../js/calendar-setup.js"></script>
<script type="text/javascript">
//<![CDATA[
enUS = {"m":{"wide":["January","February","March","April","May","June","July","August","September","October","November","December"],"abbr":["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]}}; // en_US locale reference
Calendar._DN = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]; // full day names
Calendar._SDN = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"]; // short day names
Calendar._FD = 0; // First day of the week. "0" means display Sunday first, "1" means display Monday first, etc.
Calendar._MN = ["January","February","March","April","May","June","July","August","September","October","November","December"]; // full month names
Calendar._SMN = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]; // short month names
Calendar._am = "AM"; // am/pm
Calendar._pm = "PM";

// tooltips
Calendar._TT = {};
Calendar._TT["INFO"] = "About the calendar";

Calendar._TT["ABOUT"] =
"DHTML Date/Time Selector\n" +
"(c) dynarch.com 2002-2005 / Author: Mihai Bazon\n" +
"For latest version visit: http://www.dynarch.com/projects/calendar/\n" +
"Distributed under GNU LGPL. See http://gnu.org/licenses/lgpl.html for details." +
"\n\n" +
"Date selection:\n" +
"- Use the \xab, \xbb buttons to select year\n" +
"- Use the " + String.fromCharCode(0x2039) + ", " + String.fromCharCode(0x203a) + " buttons to select month\n" +
"- Hold mouse button on any of the above buttons for faster selection.";
Calendar._TT["ABOUT_TIME"] = "\n\n" +
"Time selection:\n" +
"- Click on any of the time parts to increase it\n" +
"- or Shift-click to decrease it\n" +
"- or click and drag for faster selection.";

Calendar._TT["PREV_YEAR"] = "Prev. year (hold for menu)";
Calendar._TT["PREV_MONTH"] = "Prev. month (hold for menu)";
Calendar._TT["GO_TODAY"] = "Go Today";
Calendar._TT["NEXT_MONTH"] = "Next month (hold for menu)";
Calendar._TT["NEXT_YEAR"] = "Next year (hold for menu)";
Calendar._TT["SEL_DATE"] = "Select date";
Calendar._TT["DRAG_TO_MOVE"] = "Drag to move";
Calendar._TT["PART_TODAY"] = ' (' + "Today" + ')';

// the following is to inform that "%s" is to be the first day of week
Calendar._TT["DAY_FIRST"] = "Display %s first";

// This may be locale-dependent. It specifies the week-end days, as an array
// of comma-separated numbers. The numbers are from 0 to 6: 0 means Sunday, 1
// means Monday, etc.
Calendar._TT["WEEKEND"] = "0,6";

Calendar._TT["CLOSE"] = "Close";
Calendar._TT["TODAY"] = "Today";
Calendar._TT["TIME_PART"] = "(Shift-)Click or drag to change value";


// date formats
Calendar._TT["DEF_DATE_FORMAT"] = "%b %e, %Y";
Calendar._TT["TT_DATE_FORMAT"] = "%B %e, %Y";

Calendar._TT["WK"] = "Week";
Calendar._TT["TIME"] = "Time:";

//]]>
</script>
<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<script>
		function confirmAction(){
      var confirmed = confirm("Anda yakin akan logout sekarang?");
      return confirmed;
}
</script>	
 <SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "../images/loader.gif";

$(document).ready(function(){

$("#username").change(function() { 

var usr = $("#username").val();

if(usr.length >= 0)
{
$("#status").html('<img src="../images/loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "../dt_page/check.php",  
    data: "username="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('');
	$("#username").removeClass('object_ok'); // if necessary
	$("#username").addClass("object_error");
	}

});

});

//-->
</SCRIPT>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "../images/loader.gif";

$(document).ready(function(){

$("#sponsore").change(function() { 

var sp = $("#sponsore").val();

if(sp.length >= 0)
{
$("#spne").html('<img src="../images/loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "../dt_page/checksp.php",  
    data: "sponsore="+ sp,  
    success: function(msg){  
   
   $("#spne").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#sponsore").removeClass('object_error'); // if necessary
		$("#sponsore").addClass("object_ok");
		$(this).html('');
	}  
	else  
	{  
		$("#sponsore").removeClass('object_ok'); // if necessary
		$("#sponsore").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#sponsore").removeClass('object_ok'); // if necessary
	$("#sponsore").addClass("object_error");
	}

});

});

//-->
</SCRIPT>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "../images/loader.gif";

$(document).ready(function(){

$("#email").change(function() { 

var mails = $("#email").val();

if(mails.length >= 0)
{
$("#stsmaile").html('<img src="../images/loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "../dt_page/checkmail.php",  
    data: "email="+ mails,  
    success: function(msg){  
   
   $("#stsmaile").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#email").removeClass('object_error'); // if necessary
		$("#email").addClass("object_ok");
		$(this).html('');
	}  
	else  
	{  
		$("#email").removeClass('object_ok'); // if necessary
		$("#email").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#stsmaile").html('');
	$("#email").removeClass('object_ok'); // if necessary
	$("#email").addClass("object_error");
	}

});

});

//-->
</SCRIPT>
	<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "../images/loader.gif";

$(document).ready(function(){

$("#hp").change(function() { 

var hp = $("#hp").val();

if(hp.length >= 0)
{
$("#stshp").html('<img src="../images/loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "../dt_page/checkhp.php",  
    data: "hp="+ hp,  
    success: function(msg){  
   
   $("#stshp").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#hp").removeClass('object_error'); // if necessary
		$("#hp").addClass("object_ok");
		$(this).html(' ');
	}  
	else  
	{  
		$("#hp").removeClass('object_ok'); // if necessary
		$("#hp").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#stshp").html('');
	$("#hp").removeClass('object_ok'); // if necessary
	$("#hp").addClass("object_error");
	}

});

});

//-->
</SCRIPT>	
<link rel="stylesheet" href="../css/build/css/intlTelInput.css"> 
</head>
<body>
<?php
$sblxx00=mysql_query("select time from adminlastlog WHERE userid='$valid_admin' ORDER BY time DESC LIMIT 1");
while($row00=mysql_fetch_row($sblxx00)) {
$ida0 = $row00[0];
}

?>
  <div id="headerWrapper" align="center">
    <div id="bodyContentWrapper" align="left">
      <div id="mynotes"><textarea id="mynotesbox" rows="15" cols="80"></textarea><br /><input type="button" value="Save" id="savenotes" /></div>
      <div id="topnav">
        <div id="welcome">Selamat Datang &nbsp;&nbsp;<strong><?php echo $admin_nama; ?></strong>&nbsp;&nbsp; |&nbsp;&nbsp; <a href="./index.php?page=logout&mx=<?php echo $ida0; ?>" title="Home" onclick="return confirmAction()">Logout</a></div>
        <div id="date"><?php echo formatgl($clientdate); ?></div>
        <div class="clear"></div>
      </div><font style="text-shadow: 0 2px 3px #000000; font-size:27px; font-family:Arial, Helvetica, sans-serif; color:#DFDFDF"><strong>&nbsp;&nbsp;Administrator Area <?php echo $domain; ?></strong></font>
<div class="navigation">
        <ul id="menu">
          <li><a href="index.php" title="Home">Home</a></li>

<li><a href="#" title="Setting">Setting</a>
  <ul>
    
	<li class="expand"><a href="#">Konfigurasi</a>
        <ul>
       <li><a href="?go=configuration&sess=web">Konfigurasi Web</a></li>
              <li><a href="?go=configuration&sess=admin">Konfigurasi Admin</a></li>
            <li><a href="?go=configuration&sess=system">Konfigurasi System</a></li>
            <li><a href="?go=configpayment">Payment Gateway</a></li>
			<li><a href="?go=configico">Konfigurasi ICO</a></li>
        </ul>
    </li>
	<li class="expand"><a href="#">Header/Banner Manages</a>
        <ul>
        <li><a href="?go=bannerlogo">Banner Logo</a></li>
              <li><a href="?go=bannerrek">Banner Rekening</a></li>
        </ul>
    </li>
	<li class="expand"><a href="networkissues.php">Menu Manager</a>
        <ul>
        <li><a href="?go=menu&kat=top">Top Menu</a></li>
        </ul>
    </li>

<li class="expand"><a href="networkissues.php">News Manager</a>
        <ul>
        
			 <li><a href="?go=berita">Data Berita</a></li>
              <li><a href="?go=berita&page=addnew&edit=0">Tambah Berita</a></li>
        </ul>
    </li>
    
        <li><a href="?go=email-manager">Email</a></li>
    <li><a href="?go=faq">FAQ Manager</a></li>
    <li class="expand"><a href="#">Content</a>
        <ul>
	<li><a href="?go=content">Article Manager</a></li>
	<li><a href="?go=category&type=content">Category Manager</a></li>
        </ul>
    </li>
</ul>

    </li>	
    
	    <li><a title="Member" href="#">Member</a>
  <ul>
    <li><a href="?go=memberlist">All Member</a></li>
			  <li><a href="?go=register" >Add Member</a></li>
              <li><a href="?go=testimonial">Testimonial</a></li>
    
	</ul>
</li>
	
	
	<li><a href="#" title="Setting">Deposit</a>
  <ul>
        <li><a href="?go=invest">Deposit</a></li>
              <li><a href="?go=addepo">Add Deposit</a></li>
              <li><a href="?go=invdepo">Data Deposit</a></li>
        </ul>
    </li>
    <li><a href="#">Profit</a>
  <ul>
    <li><a href="?go=profit-data">Data Profit</a></li>
			  <li><a href="index.php?go=profit-data&page=addnew&edit=0">Add Profit User Deposit</a></li>
	
</ul>
	
</li>
	<li><a href="#">Bonus</a>
  <ul>
    <li><a href="?go=bonus">Bonus Member</a></li>
			  <li><a href="?go=addbonus">Add Bonus</a></li>
	
</ul>
	
</li>


<li><a title="Product" href="">Balance</a>
  <ul>
        <li><a href="?go=ewalet">Wallet Balance</a></li>
              <li><a href="?go=deposit">List Add Balance</a></li>
              <li><a href="?go=sellwallet">List Withdrawal</a></li>
              <li><a href="?go=transwallet">List Transfer</a></li>
        </ul>
    </li>
    
  <li><a title="Product" href="">Coins</a>
  <ul>
        <li><a href="?go=coins">Coins Balance</a></li>
        </ul>
    </li>  
     <li><a title="Product" href="">Wallet USD</a>
  <ul>
        <li><a href="?go=walletusd">Wallet USD Balance</a></li>
        </ul>
    </li>  
 <li><a title="SMS" href="#">SMS</a>
  <ul>
    <li><a href="?go=sms">Send SMS</a></li>
			  <li><a href="?go=outbox" >Outbox</a></li>
    
	</ul>
</li>
    
<li><a title="Member" href="#">Other</a>
  <ul>
    <li class="expand"><a title="Member" href="#">Admin</a>
  <ul>
    <li><a href="?go=changepass&page=ganti">Change Password</a></li>
             <li><a href="?go=tambah_admin">Admin Manager</a></li>
        
        </ul>
</li>
	
	
		</ul>
</li>

<li><a href="./index.php?page=logout&mx='<?php echo $ida0;?>" title="Home" onclick="return confirmAction()">Logout</a></li>
</ul>
      </div>
    </div>
  </div>
  <div id="content_container">
    <div id="content">
<div id="tab0box" class="tabbox">
  <div id="tab_content">
  <?php 
					if(isset($_REQUEST['go'])){$go=$_REQUEST['go'];}if(empty($go))$go='';if($go=='home'){include("ad_home.php");}else if($go=='menu'){include("./ad_flad/ad_menu.php");}else if($go=='editmenu'){include("./ad_flad/ad_menuedit.php");}else if($go=='submenu'){include("./ad_flad/ad_submenu.php");}else if($go=='editsubmenu'){include("./ad_flad/ad_editsubmenu.php");}else if($go=='index_content'){include("./ad_flad/ad_homecontent.php");}else if($go=='content'){include("./ad_flad/ad_content.php");}else if($go=='sms-template'){include("./ad_flad/ad_smsmanage.php");}else if($go=='sms-templates'){include("./ad_flad/ad_smsmanages.php");}else if($go=='addreq'){include("./ad_flad/ad_addrequest.php");}else if($go=='addcontent'){include("./ad_flad/ad_addcontent.php");}else if($go=='category'){include("./ad_flad/ad_category.php");}else if($go=='addcategory'){include("./ad_flad/ad_addcategory.php");}else if($go=='berita'){include("./ad_flad/ad_newman.php");}else if($go=='addberita'){include("./ad_flad/ad_addnewman.php");}else if($go=='beritamember'){include("./ad_flad/ad_newmember.php");}else if($go=='addberitamember'){include("./ad_flad/ad_addnewmember.php");}else if($go=='bannerlogo'){include("./ad_flad/ad_banner_logo.php");}else if($go=='addbannerlogo'){include("./ad_flad/ad_addbanner_logo.php");}else if($go=='bannerheader'){include("./ad_flad/ad_banner_header.php");}else if($go=='bannerpage'){include("./ad_flad/ad_banner_page.php");}else if($go=='addbannerheader'){include("./ad_flad/ad_addbanner_header.php");}else if($go=='addbannerpage'){include("./ad_flad/ad_addbanner_page.php");}else if($go=='bannerrek'){include("./ad_flad/ad_banner_rek.php");}else if($go=='addbannerrek'){include("./ad_flad/ad_addbanner_rek.php");}else if($go=='memberlist'){include("./ad_flad/ad_member.php");}else if($go=='memberstat'){include("./ad_flad/ad_prosesmember.php");}else if($go=='outbox'){include("./ad_flad/ad_outbox.php");}else if($go=='testimonial'){include("./ad_flad/ad_testimonial.php");}else if($go=='addtestimonial'){include("./ad_flad/ad_addtestimonial.php");}else if($go=='withdrawl'){include("./ad_flad/ad_withdrawl.php");}else if($go=='proseswithdrawl'){include("./ad_flad/ad_proseswithdrawl.php");}else if($go=='deluser'){include("./ad_flad/ad_deluser.php");}else if($go=='transaksi'){include("./ad_flad/ad_wdbonus.php");}else if($go=='updatetgl'){include("./ad_flad/ad_updatetgl.php");}else if($go=='invdepo'){include("./ad_flad/ad_invdepo.php");}else if($go=='invdepox'){include("./ad_flad/ad_invdepo2.php");}else if($go=='addepo'){include("./ad_flad/ad_addepo.php");}else if($go=='invest'){include("./ad_flad/ad_invest.php");}else if($go=='request'){include("./ad_flad/ad_request.php");}else if($go=='blokmember'){include("./ad_flad/ad_blokmem.php");}else if($go=='blokuser'){include("./ad_flad/ad_blokusr.php");}else if($go=='openblokip'){include("./ad_flad/ad_openblokirip.php");}else if($go=='openblokir'){include("./ad_flad/ad_openblokir.php");}else if($go=='downld'){include("./ad_flad/ad_downld.php");}else if($go=='prodownld'){include("./ad_flad/ad_downldpro.php");}else if($go=='downldmember'){include("./ad_flad/ad_downld2.php");}else if($go=='prodownldmember'){include("./ad_flad/ad_downld2pro.php");}else if($go=='listmail'){include("./ad_flad/ad_listmail.php");}else if($go=='listmailmember'){include("./ad_flad/ad_listmailmember.php");}else if($go=='configuration'){include("./ad_flad/ad_configuration.php");}else if($go=='deposit'){include("./ad_flad/ad_deposit.php");}else if($go=='album'){include("./ad_flad/ad_bannerhome.php");}else if($go=='addalbum'){include("./ad_flad/ad_addbannerhome.php");}else if($go=='fotogallery'){include("./ad_flad/ad_banner_bawah.php");}else if($go=='addfotogallery'){include("./ad_flad/ad_addbanner_bawah.php");}else if($go=='fcon'){include("./ad_flad/ad_fcon.php");}else if($go=='video'){include("./ad_flad/ad_video.php");}else if($go=='addvideo'){include("./ad_flad/ad_addvideo.php");}else if($go=='photoid'){include("./ad_flad/ad_photoid.php");}else if($go=='history'){include("./ad_flad/ad_history.php");}else if($go=='tambah_admin'){include("./ad_flad/ad_tbmin.php");}else if($go=='tambah_admin2'){include("./ad_flad/ad_tbmin2.php");}else if($go=='changepass'){include("./ad_flad/ad_ganti_pass.php");}else if($go=='saldo'){include("./ad_flad/ad_saldo.php");}else if($go=='addpin'){include("./ad_flad/ad_addpin.php");}else if($go=='editpin'){include("./ad_flad/ad_editpin.php");}else if($go=='datapin'){include("./ad_flad/ad_dtpin.php");}else if($go=='reqpin'){include("./ad_flad/ad_rqpin.php");}else if($go=='faq'){include("./ad_flad/ad_faq.php");}else if($go=='email-manager'){include("./ad_flad/ad_mailmanage.php");}else if($go=='email-managers'){include("./ad_flad/ad_mailmanages.php");}else if($go=='konfirmasi'){include("./ad_flad/ad_confirm.php");}else if($go=='logo-mail'){include("./ad_flad/ad_maillogo.php");}else if($go=='register'){include("./ad_flad/ad_reg.php");}else if($go=='withdrawlreward'){include("./ad_flad/withdrawlreward.php");}else if($go=='invest_history'){include("./ad_flad/ad_invest_history.php");}else if($go=='request_history'){include("./ad_flad/ad_request_history.php");}else if($go=='report'){include("./ad_flad/ad_report.php");}else if($go=='addreport'){include("./ad_flad/add_report.php");}else if($go=='manager'){include("./ad_flad/ad_manager.php");}else if($go=='payment'){include("./ad_flad/ad_pay.php");}else if($go=='add_manager'){include("./ad_flad/add_manager.php");}else if($go=='bonus'){include("./ad_flad/ad_bonus.php");}else if($go=='addbonus'){include("./ad_flad/add_bonus.php");}else if($go=='logo-invoice'){include("./ad_flad/ad_invlogo.php");}else if($go=='manual'){include("./ad_flad/ad_profit.php");}else if($go=='email-validasi'){include("./ad_flad/ad_validasi.php");}
					else if ($go=='hapuswallet')
								{ include("./ad_flad/ad_hapuswallet.php"); }	
					else if ($go=='ewalet')
								{ include("./ad_flad/ad_ewalet.php"); }	
					else if ($go=='proewalet')
								{ include("./ad_flad/ad_proewalet.php"); }	
					else if ($go=='historyewalet')
								{ include("./ad_flad/ad_historyewalet.php"); }	
					else if ($go=='saldoewalet')
								{ include("./ad_flad/ad_saldoewalet.php"); }	
					else if ($go=='proseswalet')
								{ include("./ad_flad/ad_proewalet2.php"); }		
					else if ($go=='wd')
								{ include("./ad_flad/ad_wd.php"); }			
					else if ($go=='deposit')
								{ include("./ad_flad/ad_deposit.php"); }		
					else if ($go=='dt-transaksi')
								{ include("./ad_flad/ad_transproduk.php"); }		
					else if ($go=='res_walet')
								{ include("./ad_flad/ad_passwlt.php"); } 	
					else if ($go=='addsaldo')
								{ include("./ad_flad/inputsaldo.php"); }	
					else if ($go=='configpayment')
								{ include("./ad_flad/ad_configpayment.php"); }	
					else if ($go=='configico')
								{ include("./ad_flad/ad_configico.php"); }	
					else if ($go=='iklanmember')
								{ include("./ad_flad/ad_iklan.php"); }	
					else if ($go=='addiklanmember')
								{ include("./ad_flad/ad_addiklan.php"); }	
					else if ($go=='quota')
								{ include("./ad_flad/ad_quota.php"); }	
					else if ($go=='addquota')
								{ include("./ad_flad/ad_addquota.php"); }	
					else if ($go=='product')
								{ include("./ad_flad/ad_product.php"); }			
					else if ($go=='addproduct')
								{ include("./ad_flad/ad_addproduct.php"); }	
					else if ($go=='transaksi')
								{ include("./ad_flad/ad_order.php"); } 	
					else if ($go=='ticket')
								{ include("./ad_flad/ad_ticket.php"); }	
					else if ($go=='orderproduk')
								{ include("./ad_flad/ad_order.php"); } 		
					else if ($go=='sellwallet')
								{ include("./ad_flad/ad_sellbalance.php"); } 	
					else if ($go=='transwallet')
								{ include("./ad_flad/ad_transwallet.php"); } 	
					else if ($go=='convwallet')
								{ include("./ad_flad/ad_convwallet.php"); } 
					else if ($go=='profit-data')
								{ include("./ad_flad/ad_profitdata.php"); }	
					else if ($go=='sms')
								{ include("./ad_flad/ad_sms.php"); }	
					else if ($go=='dtreward')
								{ include("./ad_flad/ad_reward.php"); }
					else if ($go=='wdreward')
								{ include("./ad_flad/ad_wdreward.php"); }
					else if ($go=='reward1')
								{ include("./ad_flad/reward1.php"); }	
					else if ($go=='coins')
								{ include("./ad_flad/ad_coins.php"); }
					else if ($go=='walletusd')
								{ include("./ad_flad/ad_wallusd.php"); }
					
					else 		{ include("./ad_home.php");  }
					?>
 </div></div>  </div><div class="clear"></div>
</div>
<div id="footer">Copyright © <?php echo $db->config("footer"); ?></div>
<div id="livezilla_tracking" style="display:none"></div><script type="text/javascript">
var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "https://primadesain.com/support/server.php?a=58f94&request=track&output=jcrpt&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);</script><noscript><img src="https://primadesain.com/support/server.php?a=58f94&amp;request=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt=""></noscript>
</body>
</html>
<?php ob_flush(); ?>