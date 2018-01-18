<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=../index.php\">";
exit();} 
?>
<?php
if (empty($_SESSION["valid_admin"])){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=../../index.php\">";
exit();}
?>

<script type="text/javascript">
<!--
function confirmation2(noid) {
	var answer = confirm("Yakin mau menghapus username default?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?go=configuration&page=delete2&no=" + noid;
		
	}
	
}
//-->
</script>
<script type="text/javascript">
<!--
function confirmation2(noid) {
	var answer = confirm("Ubah Sistem Pendaftaran?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?go=configuration&page=delete3&no=" + noid;
		
	}
	
}
//-->
</script>
<h2><img src="images/icon-48-article.png" width="48" height="48" align="absmiddle"> System Configuration </h2>
<?
$db->select("id, title, description, keyword, name, email, alamat, hpsms, hpsms2, bank, bank1, bank2, bank3, biaya, biaya2, launching, komisi_sponsor, kompasangan, komlev, red_url, block_batas, log_salah, komjual, kedalaman, footer, ym, id_reg, id_reg2, flushout, add_widget, peringkat, testi, point, point_reward, kontrak, topsponsor, persen_profit, fb, twiter, fcon, gplus, gt, topmed, bnr1, bnr2, kurs, mwd, otos, usrd, otb, otn, bckp, mail_bckp, profits, mailset, smtphost, smtport, smtpuser, smtpass, min_invest, max_invest, kedalaman_paket, sess_time, mail_logo, invest_profits, periode_profits, kontrak_pro, domain, bisnisname, chats, peringkat2, mwd2, mwd3, mwd4, exptrans, defcurr, passkey, userkey, mail_batas, hp_batas, email_activation, sms_activation, admindir, onoto, usessl, jsms, lchat, blockie, lang, invimage, sysweb, reffa, api_sms, smsgtw, rekbank, paygateway, virt_member, virt_add, charge_transfer, fbshare, fblike, twitshare, fbsend, gplusshare, mailsend, instagr, fbrec, linkdin, blogger, pinterest, tumblr, stumbleupon, print, baidu, digg, membershare, fax, bbm, whatsapp, line, tracker_forex, office, hargatiket, latitude, longitude, cycle, ttcycle, min_ticket, useticket, buybalance, transbalance, convertbalance, mintrans, minbuy, maxbuy, maxtrans, minsell, feetrans, feesell, feeconv, sellbalance, maxsell, reinv, profitmanual, profitmanual2, memonline, vwd, totvist, vistoday, vistol, memonlineadd, vwdadd, totvistadd, vistodayadd, vistoladd, cancel_order, cancel_order_sto, hargatiketsto, ticketstockist, batasbank, maxinvest, startday, totdepo, totdepoadd, lockprofile, unlockpro, onelogin, regpublic, matchroi, batastransfer, minconvert, maxconvert, nilaiconvert, kursbtc, kursbtcoin, coiname, kurscoinbtc, saldocoin, kursusdcoin, dtsellcoin, dtranscoin, dtconvertcoin, transcoin, sellcoin, convertcoin, logadmin, logmember, dtsellusd, dtconvertusd, dtransusd, convertusd, sellusd, transusd, coin_start, coin_end", "configuration", "id=1");
	
	
	$invest = explode("|", $db->result(0, "invest_profits"));
	$paketminimal = explode("|", $db->result(0, "paketminimal"));
	$paketmaksimal = explode("|", $db->result(0, "paketmaksimal"));
	$bonuswelcome = explode("|", $db->result(0, "bonuswelcome"));
	$kontrakpro = explode("|", $db->result(0, "kontrak_pro"));
	$prode = explode("|", $db->result(0, "periode_profits"));
	$flushoute = explode("|", $db->result(0, "flushout"));
	$profit = explode("|", $db->result(0, "persen_profit"));
	$kontrak = explode("|", $db->result(0, "kontrak"));
	$lead = explode("|", $db->result(0, "peringkat"));;
	$ksp = explode("|", $db->result(0, "komisi_sponsor"));
	$pasang = explode("|", $db->result(0, "kompasangan"));
	$pulsane = explode("|", $db->result(0, "pulsa"));
	$tw = explode("|", $db->result(0, "twiter"));
	$mwdne = explode("|", $db->result(0, "mwd"));
		$ym = explode("|", $db->result(0, "ym"));
	$rank = explode("|", $db->result(0, "peringkat2"));
	$peringkate = explode("|", $db->result(0, "peringkat"));
	$jumlot = explode("|", $db->result(0, "jmlot"));
	$profitdowne = explode("|", $db->result(0, "profitdown"));
	 $dtsellc = explode("|", $db->result(0, "dtsellcoin"));
       $dttranc = explode("|", $db->result(0, "dtranscoin"));
	   $dtcnvr = explode("|", $db->result(0, "dtconvertcoin"));
	 $dtsellu = explode("|", $db->result(0, "dtsellusd"));
       $dttranu = explode("|", $db->result(0, "dtransusd"));
	   $dtcnvru = explode("|", $db->result(0, "dtconvertusd"));
	
?>
<div align="center">
 <div class="form_style" style="width:70%" align="center">
  <div align="center"><strong>
      <a href="?go=configuration&sess=web"><button class="submitkecil" type="button">Konfigurasi Web</button></a>&nbsp;
      <a href="?go=configuration&sess=admin"><button class="submitkecil" type="button">Konfigurasi Admin</button></a>&nbsp;
      <a href="?go=configuration&sess=system"><button class="submitkecil" type="button">Konfigurasi System</button></a>&nbsp;
      <a href="?go=configico"><button class="submitkecil" type="button">Konfigurasi ICO</button></a>&nbsp;
      <a href="?go=configpayment"><button class="submitkecil" type="button">Konfigurasi Payment</button></a></strong></div><p>&nbsp;
      
      
      </p>
<?php
if (isset($_GET['sess']) && $_GET['sess'] == "web") {
?>

<?
if(isset($_POST['submit'])){
$no = $_POST['no'];
		
		$twt = $_POST['twiter']."|".$_POST['twiter2'];
		$add_widget2=stripslashes($_POST['add_widget']);
		$add_widgets=mysql_real_escape_string($add_widget2);
		
		$startdays = $_POST['startday'];
$startday = date('Y-m-d', strtotime($startdays));
		
			$db->update("configuration", "title='".mysql_real_escape_string($_POST['title'])."', description='".mysql_real_escape_string($_POST['description'])."', keyword='".mysql_real_escape_string($_POST['keyword'])."', footer='".mysql_real_escape_string($_POST['footer'])."', launching='".mysql_real_escape_string($_POST['launching'])."', red_url='".mysql_real_escape_string($_POST['red_url'])."', block_batas='".mysql_real_escape_string($_POST['block_batas'])."', log_salah='".mysql_real_escape_string($_POST['log_salah'])."', usrd='".$_POST['usrd']."', otb='".$_POST['otb']."', otn='".$_POST['otn']."', bckp='".mysql_real_escape_string($_POST['bckp'])."', mail_bckp='".mysql_real_escape_string($_POST['mail_bckp'])."', mailset='".mysql_real_escape_string($_POST['mailset'])."', smtphost='".mysql_real_escape_string($_POST['smtphost'])."', smtport='".mysql_real_escape_string($_POST['smtport'])."', smtpuser='".mysql_real_escape_string($_POST['smtpuser'])."', smtpass='".mysql_real_escape_string($_POST['smtpass'])."', bnr1='".$_POST['bnr1']."', bnr2='".$_POST['br2']."', sess_time='".mysql_real_escape_string($_POST['sess_time'])."', domain='".mysql_real_escape_string($_POST['domain'])."', bisnisname='".mysql_real_escape_string($_POST['bisnisname'])."',passkey='".mysql_real_escape_string($_POST['passkey'])."',userkey='".mysql_real_escape_string($_POST['userkey'])."', testi='".mysql_real_escape_string($_POST['testi'])."', mail_batas='".mysql_real_escape_string($_POST['mail_batas'])."', hp_batas='".mysql_real_escape_string($_POST['hp_batas'])."', sms_activation='".mysql_real_escape_string($_POST['sms_activation'])."', email_activation='".mysql_real_escape_string($_POST['email_activation'])."', usessl='".mysql_real_escape_string($_POST['usessl'])."', jsms='".mysql_real_escape_string($_POST['jsms'])."', blockie='".mysql_real_escape_string($_POST['blockie'])."', lang='".mysql_real_escape_string($_POST['lang'])."', sysweb='".mysql_real_escape_string($_POST['sysweb'])."', reffa='".mysql_real_escape_string($_POST['reffa'])."', smsgtw='".mysql_real_escape_string($_POST['smsgtw'])."', api_sms='".mysql_real_escape_string($_POST['api_sms'])."', add_widget='".$add_widgets."', virt_member='".mysql_real_escape_string($_POST['virt_member'])."', virt_add='".mysql_real_escape_string($_POST['virt_add'])."', profitmanual='".mysql_real_escape_string($_POST['profitmanual'])."', profitmanual2='".mysql_real_escape_string($_POST['profitmanual2'])."', memonline='".$_POST['memonline']."', vwd='".$_POST['vwd']."', totvist='".$_POST['totvist']."', vistoday='".$_POST['vistoday']."', vistol='".$_POST['vistol']."', memonlineadd='".$_POST['memonlineadd']."', vwdadd='".$_POST['vwdadd']."', totvistadd='".$_POST['totvistadd']."', vistodayadd='".$_POST['vistodayadd']."', vistoladd='".$_POST['vistoladd']."', batasbank='".$_POST['batasbank']."', startday='".$startday."', totdepo='".$_POST['totdepo']."', totdepoadd='".$_POST['totdepoadd']."', lockprofile='".$_POST['lockprofile']."', unlockpro='".$_POST['unlockpro']."', onelogin='".mysql_real_escape_string($_POST['onelogin'])."', logadmin='".mysql_real_escape_string($_POST['logadmin'])."', logmember='".mysql_real_escape_string($_POST['logmember'])."'", "id='$no'");
	//echo $komlev;
		
mysql_query("UPDATE udb_options SET options_value='".mysql_real_escape_string($_POST['smtport'])."' WHERE id='44'") or die(mysql_error());	
mysql_query("UPDATE udb_options SET options_value='".mysql_real_escape_string($_POST['smtpuser'])."' WHERE id='46'") or die(mysql_error());	
mysql_query("UPDATE udb_options SET options_value='".mysql_real_escape_string($_POST['smtpass'])."' WHERE id='47'") or die(mysql_error());		
mysql_query("UPDATE udb_options SET options_value='".mysql_real_escape_string($_POST['smtphost'])."' WHERE id='43'") or die(mysql_error());			
mysql_query("UPDATE udb_options SET options_value='".mysql_real_escape_string($_POST['smtp_secure'])."' WHERE id='45'") or die(mysql_error());	
mysql_query("UPDATE udb_options SET options_value='smtp' WHERE id='40'") or die(mysql_error());		

			 header("location: ?go=configuration&sess=web&result=success");
	exit;
	} else {
?>

 <?php
$results = $_GET['result'];
if($results == "success") { 
echo "<div class='alert-box successs'><span>Sukses : </span>Konfigurasi Web Berhasil disimpan!</div>";
}
?>
<?php
$results = $_GET['result'];
if($results == "success_dell") { 
echo "<div class='alert-box successs'><span>Sukses : </span>Username default berhasil dihapus!</div>";
}
?>
<form id="form2" name="form2" method="POST" action="">

  <table width="90%" align="center" cellpadding="4" cellspacing="1">
    <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>WEB CONFIGURATION </strong></div></td>
    </tr>
    <tr> 
      <td width="125" align="right">Website Title : </td>
      <td colspan="5"><label> 
        <input name="title" type="text" id="title" value="<?= $db->result(0, "title"); ?>" size="60" onMouseover="ddrivetip('Meta Tag Tittle')"; onMouseout="hideddrivetip()"/>
        <input name="no" type="hidden" id="no" value="1" size="10" />
      <input name="sysweb" type="hidden" id="sysweb" value="2"/>
      <input name="sms_activation" type="hidden" id="sms_activation" value="0"/>
      <input name="email_activation" type="hidden" id="email_activation" value="1"/>
      </label></td>
    </tr>
    <tr> 
      <td align="right" valign="top">Description : </td>
      <td colspan="5" valign="top"><input name="description" type="text" id="description" value="<?= $db->result(0, "description"); ?>" size="60" onMouseover="ddrivetip('Meta Tag Description')"; onMouseout="hideddrivetip()"/></td>
    </tr>
    <tr> 
      <td align="right" valign="top">Keyword :</td>
      <td colspan="5" valign="top"><input name="keyword" type="text" id="keyword" value="<?= $db->result(0, "keyword"); ?>" size="60" onMouseover="ddrivetip('Meta Tag Keyword')"; onMouseout="hideddrivetip()"/></td>
    </tr>
    <tr> 
      <td align="right" valign="top">Footer :</td>
      <td colspan="5" valign="top"><input name="footer" type="text" value="<?= $db->result(0, "footer"); ?>" size="60" onMouseover="ddrivetip('Footer Signature')"; onMouseout="hideddrivetip()"/></td>
    </tr>
	 <tr> 
      <td align="right" valign="top">Favicon :</td>
      <td colspan="5" valign="top">
	 
       <a class='iframe7' href='page.php?go=fcon'>
	   <button class='mmm_blue' style='padding:2px 6px;font-size:11px;' type="button" onMouseover="ddrivetip('Upload Gambar Favicon')"; onMouseout="hideddrivetip()">Upload Image</button></a>
	  </td>
    </tr>
	 <tr> 
      <td align="right" valign="top">Logo Email :</td>
      <td colspan="5" valign="top">
	  
     <a class='iframe7' href='page.php?go=logo-mail'>
	   <button class='mmm_blue' style='padding:2px 6px;font-size:11px;' type="button" onMouseover="ddrivetip('Upload Gambar Logo Email')"; onMouseout="hideddrivetip()">Upload Image</button></a>
	   </td>
    </tr>
	 <tr> 
      <td align="right" valign="top">Logo Invoice :</td>
      <td colspan="5" valign="top">
	 <a class='iframe7' href='page.php?go=logo-invoice'>
	   <button class='mmm_blue' style='padding:2px 6px;font-size:11px;' type="button" onMouseover="ddrivetip('Upload Gambar Logo Invoice')"; onMouseout="hideddrivetip()">Upload Image</button></a>
	   </td>
    </tr>
    
	  <tr> 
      <td align="right">Domain Name :</td>
      <td colspan="5"><input name="domain" type="text" id="domain" value="<?= $db->result(0, "domain"); ?>" size="40" onMouseover="ddrivetip('Nama domain, gunakan full subdomain apabila web anda di subdomain')"; onMouseout="hideddrivetip()"/></td>
    </tr>
    <tr> 
      <td align="right">Business Name :</td>
      <td colspan="5"><input name="bisnisname" type="text" id="bisnisname" value="<?= $db->result(0, "bisnisname"); ?>" size="40" onMouseover="ddrivetip('Nama Website')"; onMouseout="hideddrivetip()"/></td>
    </tr>
    
     <tr> 
      <td align="right">Link Refferal :</td>
      <td colspan="5">
      <select name="reffa" id="reffa" style="width:120px;" onMouseover="ddrivetip('System Refferal, ini digunakan untuk id refferal, contoh: http://<?php echo $domain; ?>/?reff=user')"; onMouseout="hideddrivetip()"  >
       <?
			$reffa = $db->result(0, "reffa");
			if($reffa == "aff") {
			?>
	   <option  value='aff' selected="selected">aff</option>
       <option  value='reff' >reff</option>
       <option  value='id'>id</option>
		<?
	} else if($reffa == "reff") {
	?>
       <option  value='aff'>aff</option>
	   <option  value='reff' selected="selected">reff</option>
       <option  value='id' >id</option>
       <?
	} else  {
	?>
       <option  value='aff' >aff</option>
	   <option  value='reff' >reff</option>
       <option  value='id' selected="selected">id</option>
		<?
	}
	?>
		</select>
      
      </td>
    </tr>
   <?
			$usessl = $db->result(0, "usessl");
			if($usessl == 1) {
			?>
	<tr> 
      <td align="right">Use SSL :</td>
      <td colspan="5"> <input type="radio" name="usessl" value="1" id="RadioGroupa1ds_0" checked="checked" onMouseover="ddrivetip('Aktifkan SSL, Sebelum aktifkan ini pastikan server/hosting anda sudah menggunakan SSL/https')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="usessl" value="0" id="RadioGroupa1ds_1" onMouseover="ddrivetip('Non SSL')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Use SSL :</td>
      <td colspan="5"> <input type="radio" name="usessl" value="1" id="RadioGroupa2ds_0" onMouseover="ddrivetip('Aktifkan SSL, Sebelum aktifkan ini pastikan server/hosting anda sudah menggunakan SSL/https')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="usessl" value="0" id="RadioGroupa2ds_1" checked="checked" onMouseover="ddrivetip('Non SSL')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	}
	?>
	<?
			$blockie = $db->result(0, "blockie");
			if($blockie == 1) {
			?>
	<tr> 
      <td align="right">Block IE :</td>
      <td colspan="5"> <input type="radio" name="blockie" value="1" id="RadioGroupa1ds_0" checked="checked" onMouseover="ddrivetip('Blokir Penggunaan Browser Internet Explorer')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="blockie" value="0" id="RadioGroupa1ds_1" onMouseover="ddrivetip('Jangan Blokir Penggunaan Browser Internet Explorer')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Block IE :</td>
      <td colspan="5"> <input type="radio" name="blockie" value="1" id="RadioGroupa2ds_0" onMouseover="ddrivetip('Blokir Penggunaan Browser Internet Explorer')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="blockie" value="0" id="RadioGroupa2ds_1" checked="checked" onMouseover="ddrivetip('Jangan Blokir Penggunaan Browser Internet Explorer')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	}
	?>
    <tr>
      <td align="right">Language  :      </td>
      <td width="210">
	  <select name="lang" id="lang" style="width:120px; "onMouseover="ddrivetip('Bahasa Default')"; onMouseout="hideddrivetip()">
       <?
			$lang = $db->result(0, "lang");
			if($lang == 1) {
			?>
	   <option  value='1' selected="selected">Indonesia</option>
       <option  value='2' >English</option>
		<?
	} else {
	?>
	<option  value='1'>Indonesia</option>
       <option  value='2' selected="selected">English</option>
		<?
	}
	?>
		</select>
      </td>
      
      <td align="right">&nbsp;</td>
      <td><div align="left"></div></td>
      <td width="1" align="right">&nbsp;</td>
      <td width="5">&nbsp;</td>
    </tr>
   <tr>
      <td align="right">Maximum Login Wrong  :      </td>
      <td width="210"><input name="log_salah" type="text" id="log_salah" value="<?= $db->result(0, "log_salah"); ?>" size="5" onMouseover="ddrivetip('Sistem akan otomatis memblokir member yang bersangkutan jika salah password hingga maksimal login.')"; onMouseout="hideddrivetip()"/>
      </td>
      
      <td align="right">&nbsp;</td>
      <td><div align="left"></div></td>
      <td width="1" align="right">&nbsp;</td>
      <td width="5">&nbsp;</td>
    </tr>
	 <?
			$onelogin = $db->result(0, "onelogin");
			if($onelogin == 1) {
			?>
	<tr> 
      <td align="right">Private Login :</td>
      <td colspan="5"> <input type="radio" name="onelogin" value="1" id="RadioGroupa1ds_0" checked="checked" onMouseover="ddrivetip('Login hanya di satu tempat, tidak dapat multiple login dengan user yang sama.')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="onelogin" value="0" id="RadioGroupa1ds_1" onMouseover="ddrivetip('Dapat multiple login dengan user yang sama.')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Private Login :</td>
      <td colspan="5"> <input type="radio" name="onelogin" value="1" id="RadioGroupa2ds_0" onMouseover="ddrivetip('Login hanya di satu tempat, tidak dapat multiple login dengan user yang sama.')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="onelogin" value="0" id="RadioGroupa2ds_1" checked="checked" onMouseover="ddrivetip('Dapat multiple login dengan user yang sama.')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	}
	?>
	<tr>
      <td align="right">Redirect URL  :      </td>
      <td><input name="red_url" type="text" id="red_url" value="<?= $db->result(0, "red_url"); ?>" size="40"  onMouseover="ddrivetip('Sistem akan otomatis mengarahkan akses ke alamat ini apabila IP Address user terblokir. (isi tanpa http://)')"; onMouseout="hideddrivetip()"/>
      </td>
      
      <td align="right">&nbsp;</td>
      <td><div align="left"></div></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
 
	<tr> 
      <td align="right">Session Login :</td>
      <td colspan="5">
       <input name="sess_time" type="text" id="sess_time" value="<?= $db->result(0, "sess_time"); ?>" size="10" onMouseover="ddrivetip('Sistem akan otomatis logout dalam waktu ini (detik) jika tidak ada aktivitas.')";
 onMouseout="hideddrivetip()"/></td>
    </tr>
	<tr>
      <td align="right">Maks. Testimonial:</td>
      <td colspan="5"><input name="testi" type="text" id="testi" value="<?= $db->result(0, "testi"); ?>" size="3" onMouseover="ddrivetip('Batas maksimal member membuat testimonial')"; onMouseout="hideddrivetip()"/>
      </td></tr>
     
       <tr> 
         <td align="right">Restrictions on Registration Email :</td>
         <td colspan="5">
          <input name="mail_batas" type="text" id="mail_batas" value="<?= $db->result(0, "mail_batas"); ?>" size="10" onMouseover="ddrivetip('Batas maksimal email pendaftaran, sistem akan menolak email yang telah mendaftar sebanyak ini. Isi angka 0 untuk matikan pembatasan.')"; onMouseout="hideddrivetip()"/></td>
       </tr>
	<tr> 
      <td align="right">Restrictions on HP Registration :</td>
      <td colspan="5">
       <input name="hp_batas" type="text" id="hp_batas" value="<?= $db->result(0, "hp_batas"); ?>" size="10" onMouseover="ddrivetip('Batas maksimal HP pendaftaran, sistem akan menolak HP yang telah mendaftar sebanyak ini. Isi angka 0 untuk matikan pembatasan.')"; onMouseout="hideddrivetip()"/></td>
    </tr>
    <tr> 
      <td align="right">Payment Gateway Restrictions :</td>
      <td colspan="5">
       <input name="batasbank" type="text" id="batasbank" value="<?= $db->result(0, "batasbank"); ?>" size="10" onMouseover="ddrivetip('Batas maksimal Payment Gateway pendaftaran, sistem akan menolak Payment Gateway yang telah mendaftar sebanyak ini. Isi angka 0 untuk matikan pembatasan.')"; onMouseout="hideddrivetip()"/></td>
    </tr>
	<?
			$lockprofile = $db->result(0, "lockprofile");
			if($lockprofile == 1) {
			?>
	<tr> 
      <td align="right">Lock Profile :</td>
      <td colspan="5"> <input type="radio" name="lockprofile" value="1" id="RadioGroupa1dsd_0" checked="checked" onMouseover="ddrivetip('member tidak dapat merubah data Payment Gateway, email, hp')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="lockprofile" value="0" id="RadioGroupa1dsd_1" onMouseover="ddrivetip('member dapat merubah data rekening Payment Gateway, email, hp')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Lock Profile :</td>
      <td colspan="5"> <input type="radio" name="lockprofile" value="1" id="RadioGroupa2dsd_0" onMouseover="ddrivetip('member tidak dapat merubah data rekening bank, email, hp')"; onMouseout="hideddrivetip()"/>
          Yes
          <input type="radio" name="lockprofile" value="0" id="RadioGroupa2dsd_1" checked="checked" onMouseover="ddrivetip('member dapat merubah data rekening bank, email, hp')"; onMouseout="hideddrivetip()"/>
        No</td>
    </tr>
	<?
	}
	?> 
	<tr> 
      <td align="right">Verifikasi Unlock Profile :</td>
      <td colspan="5">
      <select name="unlockpro" id="unlockpro" style="width:120px;" onMouseover="ddrivetip('System akan mengirimkan verifikasi kode untuk unlock field profile')"; onMouseout="hideddrivetip()"  >
       <?
			$unlockpro = $db->result(0, "unlockpro");
			if($unlockpro == 0) {
			?>
	   <option  value='0' selected="selected">Email</option>
       <option  value='1' >No HP</option>
		
       <?
	} else  {
	?>
      <option  value='0'>Email</option>
       <option  value='1' selected="selected">No HP</option>
		<?
	}
	?>
		</select>
      
      </td>
    </tr>
	<?
			$logadmin = $db->result(0, "logadmin");
			if($logadmin == 1) {
			?>
	<tr> 
      <td align="right">Email Login (Admin) :</td>
      <td colspan="5"> <input type="radio" name="logadmin" value="1" id="RadioGroupa1dsd_0e" checked="checked"/>
          Yes
          <input type="radio" name="logadmin" value="0" id="RadioGroupa1dsd_1e"/>
        No</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Email Login (Admin) :</td>
      <td colspan="5"> <input type="radio" name="logadmin" value="1" id="RadioGroupa2dsd_0e"/>
          Yes
          <input type="radio" name="logadmin" value="0" id="RadioGroupa2dsd_1e" checked="checked"/>
        No</td>
    </tr>
	<?
	}
	?> 
    <?
			$logmember = $db->result(0, "logmember");
			if($logmember == 1) {
			?>
	<tr> 
      <td align="right">Email Login (Member) :</td>
      <td colspan="5"> <input type="radio" name="logmember" value="1" id="RadioGroupa1dsd_0de" checked="checked"/>
          Yes
          <input type="radio" name="logmember" value="0" id="RadioGroupa1dsd_1de"/>
        No</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Email Login (Member) :</td>
      <td colspan="5"> <input type="radio" name="logmember" value="1" id="RadioGroupa2dsd_0de"/>
          Yes
          <input type="radio" name="logmember" value="0" id="RadioGroupa2dsd_1de" checked="checked"/>
        No</td>
    </tr>
	<?
	}
	?> 
    <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center">VIRTUAL STATISTIC</div></td>
    </tr>
    
     <tr>
      <td align="right">Started Day :</td>
      <td colspan="5"> <input name="startday" type="text" id="startday" value="<?= $db->result(0, "startday"); ?>" size="10" onMouseover="ddrivetip('Start Day')"; onMouseout="hideddrivetip()"/>&nbsp;<img src="../images/calendar_select_none.png" alt="Kalender" id="startday_trig" title="Date selector" align="absmiddle" width="24px"/>
					<script type="text/javascript">
            Calendar.setup({
                inputField : "startday",
                ifFormat : "%e-%m-%Y",
                button : "startday_trig",
                align : "Bl",
                singleClick : true
            });
           

            $("startday_trig").observe("click", showCalendar);

            function showCalendar(event){
                var element = event.element(event);
                var offset = $(element).viewportOffset();
                var scrollOffset = $(element).cumulativeScrollOffset();
                var dimensionsButton = $(element).getDimensions();
                var index = $("widget-chooser").getStyle("zIndex");

                $$("div.calendar").each(function(item){
                    if ($(item).visible()) {
                        var dimensionsCalendar = $(item).getDimensions();

                        $(item).setStyle({
                            "zIndex" : index + 1,
                            "left" : offset[0] + scrollOffset[0] - dimensionsCalendar.width + dimensionsButton.width + "px",
                            "top" : offset[1] + scrollOffset[1] + dimensionsButton.height + "px"
                        });
                    };
                });
            };
        </script>  </td>
    </tr>
     <tr>
      <td align="right">Virtual Member :</td>
      <td colspan="5"><input name="virt_member" type="text" id="virt_member" value="<?= $db->result(0, "virt_member"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah member aktif di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily:      <input name="virt_add" type="text" id="virt_add" value="<?= $db->result(0, "virt_add"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah member aktif di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik member.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
       <tr>
      <td align="right">Virtual Deposit:</td>
      <td colspan="5"><input name="totdepo" type="text" id="totdepo" value="<?= $db->result(0, "totdepo"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Deposit di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily: <input name="totdepoadd" type="text" id="totdepoadd" value="<?= $db->result(0, "totdepoadd"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Deposit di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik Deposit.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
       <tr>
      <td align="right">Virtual Profit :</td>
      <td colspan="5"><input name="profitmanual" type="text" id="profitmanual" value="<?= $db->result(0, "profitmanual"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah profit di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily:      <input name="profitmanual2" type="text" id="profitmanual2" value="<?= $db->result(0, "profitmanual2"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah profit di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik profit.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
      
    <tr>
      <td align="right">Virtual Member Online:</td>
      <td colspan="5"><input name="memonline" type="text" id="memonline" value="<?= $db->result(0, "memonline"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah member online di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily:      <input name="memonlineadd" type="text" id="memonlineadd" value="<?= $db->result(0, "memonlineadd"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Member Online di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik Member Online.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
       
    <tr>
      <td align="right">Virtual Total Withdrawal:</td>
      <td colspan="5"><input name="vwd" type="text" id="vwd" value="<?= $db->result(0, "vwd"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Total Withdrawal di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily:      <input name="vwdadd" type="text" id="vwdadd" value="<?= $db->result(0, "vwdadd"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Total Withdrawal di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik Total Withdrawal.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
      
     <tr>
      <td align="right">Virtual Total Visitor :</td>
      <td colspan="5"><input name="totvist" type="text" id="totvist" value="<?= $db->result(0, "totvist"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Total Visitor di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily:      <input name="totvistadd" type="text" id="totvistadd" value="<?= $db->result(0, "totvistadd"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Total Visitor di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik Total Visitor.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
       
    
    <tr>
      <td align="right">Virtual Visitor Today:</td>
      <td colspan="5"><input name="vistoday" type="text" id="vistoday" value="<?= $db->result(0, "vistoday"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Visitor Today di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily:      <input name="vistodayadd" type="text" id="vistodayadd" value="<?= $db->result(0, "vistodayadd"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Visitor Today di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik Visitor Today.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
       
      
      
       <tr>
      <td align="right">Virtual Visitor Online:</td>
      <td colspan="5"><input name="vistol" type="text" id="vistol" value="<?= $db->result(0, "vistol"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Visitor Online di statistik')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      Daily:      <input name="vistoladd" type="text" id="vistoladd" value="<?= $db->result(0, "vistoladd"); ?>" size="10" onMouseover="ddrivetip('Menambah jumlah Visitor Online di statistik setiap hari. Setiap hari akan ditambahkan jumlah ini pada statistik Visitor Online.')"; onMouseout="hideddrivetip()"/>
      </td></tr>
       <tr>
      
    
    
	 <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center">SPONSOR DEFAULT</div></td>
    </tr>
	
   <tr>   <td align="right">Username Default :</td>



      <td colspan="3">
	  <?
		$mydef = $db->result(0, "usrd");
		if(!empty($mydef)) {
		?>
		<input name="usrd" type="hidden" id="usrd" value="<?= $db->result(0, "usrd"); ?>" size="20" />
		<select name="" id="" style="width:120px; " disabled="disabled">
                                          <option  value='' selected="selected"><?= $db->result(0, "usrd"); ?></option>
										  </select>
		&nbsp;&nbsp;&nbsp;<a href="?go=configuration&page=delete&id=<?= $db->result(0, "id"); ?>" ><button class="submit" type="button">Delete / Replace</button></a>
	  <? } else { ?>
	   <select name="usrd" onchange="value" class="form" onMouseover="ddrivetip('Sponsor default jika anda setting username tertentu, maka setiap pengunjung yang datang tanpa link refferal akan diarahkan ke halaman refferal member tersebut.')"; onMouseout="hideddrivetip()">
          <option value="">-- Random --</option>
          <?
					$tanggal=date("Y-m-d");
					$sql=mysql_query("select username from member where status=1 order by username");
					while($sto=mysql_fetch_row($sql)) {
						if(isset($usrd) == $sto[0]) {
							$pilih = "selected";
						} else {	
							$pilih = "";
						}	
					?>
          <option value="<?= $sto[0]; ?>" <?= $pilih; ?>> 
          <?= $sto[0]; ?>
          <?
					}
					?>
        </select>
		<?
					}
					?>	  </td>
    </tr> 
   <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>SETTING BACKUP </strong></div></td>
    </tr>
		
    <?
	  $otne = $db->result(0, "otb");
	  if($otne == 1) {
		?>
	<tr> 
      <td align="right">automatic backup :</td>
      <td colspan="5"> <input type="radio" name="otb" value="1" id="RadioGroup121_0" checked="checked" onMouseover="ddrivetip('Aktifkan Backup otomatis')"; onMouseout="hideddrivetip()"/>
          Active
          <input type="radio" name="otb" value="0" id="RadioGroup121_1"onMouseover="ddrivetip('Nonaktifkan Backup otomatis')"; onMouseout="hideddrivetip()"  />
        Non-active</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">automatic backup :</td>
      <td colspan="5"> <input type="radio" name="otb" value="1" id="RadioGroup122_0" onMouseover="ddrivetip('Aktifkan Backup otomatis')"; onMouseout="hideddrivetip()" />
         Active
          <input type="radio" name="otb" value="0" id="RadioGroup122_1" checked="checked" onMouseover="ddrivetip('Nonaktifkan Backup otomatis')"; onMouseout="hideddrivetip()" />
        Non-active</td>
    </tr>
	<?
	}
	?>
	<?
	  $otn = $db->result(0, "otn");
	  if($otn == 1) {
		?>
	<tr> 
      <td align="right">Backup Period :</td>
      <td colspan="5"><input name="bckp" type="text" id="bckp" value="<?= $db->result(0, "bckp"); ?>" size="5" />&nbsp;&nbsp;<input type="radio" name="otn" value="1" id="RadioGroup131_0" checked="checked"/>
          Hour 
            <input type="radio" name="otn" value="0" id="RadioGroup131_1" />
        Days</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Periode Backup :</td>
      <td colspan="5"><input name="bckp" type="text" id="bckp" value="<?= $db->result(0, "bckp"); ?>" size="5" onMouseover="ddrivetip('Sistem akan otomatis melakukan backup database dalam waktu ini.')"; onMouseout="hideddrivetip()"/>&nbsp;&nbsp;<input type="radio" name="otn" value="1" id="RadioGroup132_0" />
        Hour
        <input type="radio" name="otn" value="0" id="RadioGroup132_1" checked="checked" />
        Days</td>
    </tr>
	<?
	}
	?>
	
    
	 <tr>
      <td align="right">Send to email  : </td>
      <td colspan="5"><div align="left">
        <input name="mail_bckp" type="text" id="mail_bckp" value="<?= $db->result(0, "mail_bckp"); ?>" size="40" onMouseover="ddrivetip('Sistem akan otomatis mengirimkan backup database ke alamat email ini')"; onMouseout="hideddrivetip()"/>
      </div></td>
    </tr>
	<tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>SETTING SMTP </strong></div></td>
    </tr>
		

    <tr> 
      <td align="right">Encryption :</td>
      <td colspan="5"> 
      <input name="mailset" type="hidden" id="mailset" value="1" />
      <select id="smtp_secure" name="smtp_secure" class="span2" onMouseover="ddrivetip('SMTP Connection security')"; onMouseout="hideddrivetip()">';

					<option value="none" selected="selected">None</option>
					<option value="ssl">SSL</option>
					<option value="tls">TLS</option>				</select></td>
    </tr>
      <td align="right">Port :</td>
      <td colspan="5"> <input name="smtport" type="text" id="smtport" value="<?= $db->result(0, "smtport"); ?>" size="5" onMouseover="ddrivetip('SMTP Port Server hosting anda')"; onMouseout="hideddrivetip()"/></td>
    </tr>
	   <td align="right">SMTP Host 
	     
	     : </td>
	   <td><div align="left">
           <input name="smtphost" type="text" id="smtphost" value="<?= $db->result(0, "smtphost"); ?>" size="35" onMouseover="ddrivetip('SMTP Host server hosting anda')"; onMouseout="hideddrivetip()"/>
	   </div></td>
      <td width="119" align="right"><div align="left">
          
      </div></td>
      <td width="98">&nbsp;</td>
      <td align="right"></td>
      <td></td>
    </tr>
	 <tr>
	   <td align="right">SMTP User 
	     
	     : </td>
	   <td><div align="left">
           <input name="smtpuser" type="text" id="smtpuser" value="<?= $db->result(0, "smtpuser"); ?>" size="35" onMouseover="ddrivetip('SMTP User / alamat email anda')"; onMouseout="hideddrivetip()"/>
	   </div></td>
      <td width="119" align="right"><div align="left">
      </div></td>
      <td width="98">&nbsp;</td>
      <td align="right"></td>
      <td></td>
    </tr>
	 <tr>
	   <td align="right">SMTP Password 
	     
	     : </td>
	   <td><div align="left">
           <input name="smtpass" type="password" id="smtpass" value="<?= $db->result(0, "smtpass"); ?>" size="35" onMouseover="ddrivetip('SMTP Password / Password email anda')"; onMouseout="hideddrivetip()"/>
	   </div></td>
      <td width="119" align="right"><div align="left">
      </div></td>
      <td width="98">&nbsp;</td>
      <td align="right"></td>

      <td></td>
    </tr>
	 <tr>
	   <td align="right">Test Send Email
	     
	     : </td>
	   <td><div align="left">
          <a href="#" onClick="window.open('page.php?go=testmail','popup','width=280,height=100,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=0'); return false"><button class='mmm_blue' style='padding:2px 6px;font-size:11px;' type="button">Test Email</button></a>
	   </div></td>
      <td width="119" align="right"><div align="left">
      </div></td>
      <td width="98">&nbsp;</td>
      <td align="right"></td>
      <td></td>
    </tr>
	 <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center" style="padding:5px;"><strong><i class="fa fa-gears"></i>&nbsp;&nbsp;SMS SETTING</strong></div></td>
    </tr>
	 <tr> 
      <td align="right">SMS Gateway :</td>
      <td colspan="5">
       <select name="smsgtw" class="form" onMouseover="ddrivetip('SMS Gateway default yang digunakan pada website ini adalah eksternal, yaitu menggunakan jasa sms gateway raja-sms.com atau zenziva.net, Untuk dapat menggunakan layanan sms gateway silahkan registrasi di website raja-sms.com atau zenziva.net. Anda bisa memilih produk sms regular atau sms masking.')"; onMouseout="hideddrivetip()">
         <? $smsgtw = $db->result(0, "smsgtw"); if($smsgtw == 1) { ?>
          <option value="">-- Option --</option>
          <option value="1" selected="selected">Raja-SMS (raja-sms.com)</option>
          <option value="2">Zenziva (zenziva.net)</option>
       <? } else if($smsgtw == 2) { ?>
          <option value="">-- Pilih --</option>
          <option value="1">Raja-SMS (raja-sms.com)</option>
          <option value="2" selected="selected">Zenziva (zenziva.net)</option>
       <? } else { ?>
          <option value="" selected="selected">-- Pilih --</option>
          <option value="1">Raja-SMS (raja-sms.com)</option>
          <option value="2">Zenziva (zenziva.net)</option>
       <? } ?>
       
        </select>
      </td>
    </tr>
	 
	 
	 
	 <?
	  $jsms = $db->result(0, "jsms");
	  if($jsms == 1) {
		?>
	<tr> 
      <td align="right">Type :</td>
      <td colspan="5"> <input type="radio" name="jsms" value="1" id="RadioGroup22m1_0" checked="checked" onMouseover="ddrivetip('SMS Reguler : Pengirim SMS Long Number (nomor HP).')"; onMouseout="hideddrivetip()"/>
          SMS Regular
          <input type="radio" name="jsms" value="2" id="RadioGroup22m1_1" onMouseover="ddrivetip('SMS Masking : Pengirim SMS adalah nama usaha.')"; onMouseout="hideddrivetip()"/>
        SMS Masking</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Type :</td>
      <td colspan="5"> <input type="radio" name="jsms" value="1" id="RadioGroup22m2_0" onMouseover="ddrivetip('SMS Reguler : Pengirim SMS Long Number (nomor HP).')"; onMouseout="hideddrivetip()"/>
         SMS Regular
          <input type="radio" name="jsms" value="2" id="RadioGroup22m2_1" checked="checked" onMouseover="ddrivetip('SMS Masking : Pengirim SMS adalah nama usaha.')"; onMouseout="hideddrivetip()"/>
        SMS Masking</td>
    </tr>
	<?
	}
	?>
	<tr class="row2">
	   <td align="right">Userkey / username
	     
	     : </td>
	   <td><div align="left">
           <input name="userkey" type="text" id="userkey" value="<?= $db->result(0, "userkey"); ?>" size="25" onMouseover="ddrivetip('Userkey zenziva.net / Username raja-sms.com.')"; onMouseout="hideddrivetip()"/>
	   </div></td>
      <td width="99" align="right"></td>
      <td width="143"></td>
      <td align="right"></td>
      <td></td>
    </tr>
    <tr>
      <td align="right">Passkey / Password  :      </td>
      <td><input name="passkey" type="password" id="passkey" value="<?= $db->result(0, "passkey"); ?>" size="25" onMouseover="ddrivetip('Passkey zenziva.net / Password raja-sms.com.')"; onMouseout="hideddrivetip()"/>
      </td>
      
      <td align="right">&nbsp;</td>
      <td><div align="left"></div></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
     <tr>
      <td align="right">API :      </td>
      <td><input name="api_sms" type="text" id="api_sms" value="<?= $db->result(0, "api_sms"); ?>" size="25" onMouseover="ddrivetip('Kode API raja-sms.com.')"; onMouseout="hideddrivetip()"/>
      </td>
      
      <td align="right">&nbsp;</td>
      <td><div align="left"></div></td>
      <td align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr class="row2">
	   <td align="right">Test Send SMS
	     
	     : </td>
	   <td><div align="left">
          <a href="#" onClick="window.open('page.php?go=testsms','popup','width=280,height=100,scrollbars=yes,resizable=yes,toolbar=no,directories=no,location=no,menubar=no,status=no,left=50,top=0'); return false"><button type="button" class='mmm_blue' style='padding:2px 6px;font-size:11px;'>Test SMS</button></a>
	   </div></td>
      <td width="99" align="right"><div align="left">
      </div></td>
      <td width="143">&nbsp;</td>
      <td align="right"></td>
      <td></td>
    </tr>
	<tr> 
      <td colspan="6" bgcolor="#DDDDE1">&nbsp;</td>
    </tr>
	<tr> 
      <td colspan="6" >&nbsp;</td>
    </tr>
	<tr> 
      <td colspan="6" > <input type="submit"  name="submit" value="SAVE" class="button">
        
        <input type="submit" name="cancel" id="cancel" value="CANCEL" onClick="javascript:history.go(-1)" class="button">
       </td>
    </tr>
	<tr> 
      <td colspan="6" >&nbsp;</td>
    </tr>
  </table>
  </form>
  
  
<p>&nbsp;</p>

<script type="text/javascript">
var tooltipObj = new DHTMLgoodies_formTooltip();
tooltipObj.setTooltipPosition('below');
tooltipObj.setPageBgColor('#FFFFFF');
tooltipObj.setTooltipCornerSize(15);
tooltipObj.initFormFieldTooltip();
</script> 
<?php } ?>

<?php
}
else if (isset($_GET['sess']) && $_GET['sess'] == "admin") {
?>
 <?
if(isset($_POST['submit'])){
$no = $_POST['no'];
		
		$ym = $_POST['ym1']."|".$_POST['ym2']."|".$_POST['ym3']."|".$_POST['ym4'];
		$twt = $_POST['twiter']."|".$_POST['twiter2'];
		
		
			$db->update("configuration", "name='".mysql_real_escape_string($_POST['name'])."', email='".mysql_real_escape_string($_POST['email'])."', alamat='".mysql_real_escape_string($_POST['alamat'])."', hpsms='".mysql_real_escape_string($_POST['telepon'])."', hpsms2='".mysql_real_escape_string($_POST['telepon2'])."', ym='$ym', chats='".mysql_real_escape_string($_POST['chats'])."', fbshare='".mysql_real_escape_string($_POST['fbshare'])."', fblike='".mysql_real_escape_string($_POST['fblike'])."', twitshare='".mysql_real_escape_string($_POST['twitshare'])."', fbsend='".mysql_real_escape_string($_POST['fbsend'])."', gplusshare='".mysql_real_escape_string($_POST['gplusshare'])."', mailsend='".mysql_real_escape_string($_POST['mailsend'])."', instagr='".mysql_real_escape_string($_POST['instagr'])."', fbrec='".mysql_real_escape_string($_POST['fbrec'])."', linkdin='".mysql_real_escape_string($_POST['linkdin'])."', blogger='".mysql_real_escape_string($_POST['blogger'])."', pinterest='".mysql_real_escape_string($_POST['pinterest'])."', tumblr='".mysql_real_escape_string($_POST['tumblr'])."', stumbleupon='".mysql_real_escape_string($_POST['stumbleupon'])."', print='".mysql_real_escape_string($_POST['print'])."', baidu='".mysql_real_escape_string($_POST['baidu'])."', digg='".mysql_real_escape_string($_POST['digg'])."', membershare='".mysql_real_escape_string($_POST['membershare'])."', topmed='".$_POST['tm']."', fax='".mysql_real_escape_string($_POST['fax'])."', bbm='".mysql_real_escape_string($_POST['bbm'])."', whatsapp='".mysql_real_escape_string($_POST['whatsapp'])."', line='".mysql_real_escape_string($_POST['line'])."', fb='".$_POST['fb']."', twiter='$twt', topmed='".$_POST['tm']."', gt='".$_POST['gt']."', tracker_forex='".$_POST['tracker_forex']."', longitude='".$_POST['longitude']."', lchat='".mysql_real_escape_string($_POST['lchat'])."'", "id='$no'");
	//echo $komlev;
		
			
			 header("location: ?go=configuration&sess=admin&result=success");
	exit;
} else {
?>

<?php
$results = $_GET['result'];
if($results == "success") { 
echo "<div class='alert-box successs'><span>Sukses : </span>Konfigurasi Admin berhasi disimpan!</div>";
}
?>
<form id="form2" name="form2" method="POST" action="">
  <table width="90%" border="0" align="center" cellpadding="4" cellspacing="1">
    <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>ADMINISTRATOR</strong></div></td>
    </tr>
	
	<?
			$chats = $db->result(0, "chats");
		if($chats == 1) {
			?>
	<tr> 
      <td align="right">Livechat :</td>
      <td colspan="5"> <input type="radio" name="chats" value="1" id="RadioGroup4t6_0" checked="checked"/>
          Enable
          <input type="radio" name="chats" value="0" id="RadioGroup4t6_1" />
        Disable</td>
    </tr>
	 
	<?
	} else {
	?>
	<tr> 
      <td align="right">Livechat  :</td>
      <td colspan="5"> <input type="radio" name="chats" value="1" id="RadioGroup4t7_0" />
          Enable
          <input type="radio" name="chats" value="0" id="RadioGroup4t7_1" checked="checked" />
        Disable</td>
    </tr>
	<?
}
	?>
	 <tr> 
      <td align="right" ></td>
      <td colspan="5"><textarea name="lchat" cols="40" id="lchat"><?= $db->result(0, "lchat"); ?></textarea></td>
    </tr>
    <tr> 
      <td align="right">Name :</td>
      <td colspan="5"><input name="name" type="text" id="name" value="<?= $db->result(0, "name"); ?>" size="40" /></td>
    </tr>
    <tr> 
      <td align="right">E-mail :</td>
      <td colspan="5"><input name="email" type="text" id="email" value="<?= $db->result(0, "email"); ?>" size="40" onMouseover="ddrivetip('Email ini harus satu domain dengan email SMTP yang anda setting di konfigurasi web.')"; onMouseout="hideddrivetip()"/></td>
    </tr>
    <tr> 
      <td align="right" >Complete address :</td>
      <td colspan="5"><input name="alamat" type="text" id="email3" value="<?= $db->result(0, "alamat"); ?>" size="40" /></td>
    </tr>
  
    <tr> 
      <td align="right">HP :</td>
      <td colspan="5"><input name="telepon" type="text" id="telepon" value="<?= $db->result(0, "hpsms"); ?>" size="40" /></td>
    </tr>
	 <tr> 
      <td align="right">Phone :</td>
      <td colspan="5"><input name="telepon2" type="text" id="telepon2" value="<?= $db->result(0, "hpsms2"); ?>" size="40" /></td>
    </tr>
    
   <tr> 
      <td align="right">Fax :</td>
      <td colspan="5"><input name="fax" type="text" id="fax" value="<?= $db->result(0, "fax"); ?>" size="40" /></td>
    </tr>
    <tr> 
      <td align="right">BBM :</td>
      <td colspan="5"><input name="bbm" type="text" id="bbm" value="<?= $db->result(0, "bbm"); ?>" size="40" /></td>
    </tr>
    <tr> 
      <td align="right">WhatsApp :</td>
      <td colspan="5"><input name="whatsapp" type="text" id="whatsapp" value="<?= $db->result(0, "whatsapp"); ?>" size="40" /></td>
    </tr>
    <tr> 
      <td align="right">Line :</td>
      <td colspan="5"><input name="line" type="text" id="line" value="<?= $db->result(0, "line"); ?>" size="40" /></td>
    </tr>
     <tr> 
      <td align="right">FB :</td>
      <td colspan="5"><input name="fb" type="text" id="fb" value="<?= $db->result(0, "fb"); ?>" size="40" onMouseover="ddrivetip('Facebook FanPage Username (tanpa http://)')"; onMouseout="hideddrivetip()"/> 
     </td>
    </tr>
	
	<tr> 
      <td align="right">Twiter :</td>
      <td colspan="5"><input name="twiter" type="text" id="twiter" value="<?= $tw[0]; ?>" size="40" onMouseover="ddrivetip('Twitter')"; onMouseout="hideddrivetip()"/>
    </tr>
	
	
	<?
			$gtne = $db->result(0, "gt");
			if($gtne == 1) {
			?>
	<tr> 
      <td align="right">Google Translate :</td>
      <td colspan="5"> <input type="radio" name="gt" value="1" id="RadioGroupa1_0" checked="checked" onMouseover="ddrivetip('Tampilkan Widget Google Translate')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="gt" value="0" id="RadioGroupa1_1"  onMouseover="ddrivetip('Sembunyikan Widget Google Translate')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Google Translate :</td>
      <td colspan="5"> <input type="radio" name="gt" value="1" id="RadioGroupa2_0"  onMouseover="ddrivetip('Tampilkan Widget Google Translate')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="gt" value="0" id="RadioGroupa2_1" checked="checked"  onMouseover="ddrivetip('Sembunyikan Widget Google Translate')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
   <?
			$tracker_forex = $db->result(0, "tracker_forex");
			if($tracker_forex == 1) {
			?>
	<tr> 
      <td align="right">Forex Ticker :</td>
      <td colspan="5"> <input type="radio" name="tracker_forex" value="1" id="tracker_forex_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Widget Forex Ticker')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="tracker_forex" value="0" id="tracker_forex_1" onMouseover="ddrivetip('Sembunyikan Widget Forex Ticker')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Forex Ticker :</td>
      <td colspan="5"> <input type="radio" name="tracker_forex" value="1" id="tracker_forex_0" onMouseover="ddrivetip('Tampilkan Widget Forex Ticker')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="tracker_forex" value="0" id="tracker_forex_1" checked="checked" onMouseover="ddrivetip('Sembunykan Widget Forex Ticker')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
	   
    
	
	   
	   <?
			$tpmed = $db->result(0, "topmed");
			if($tpmed == 1) {
			?>
	<tr> 
      <td align="right">Share This :</td>
      <td colspan="5"> <input type="radio" name="tm" value="1" id="RadioGroup3_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Widget Sharethis')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="tm" value="0" id="RadioGroup3_1" onMouseover="ddrivetip('Sembunykan Widget Sharethis')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Share This :</td>
      <td colspan="5"> <input type="radio" name="tm" value="1" id="RadioGroup4_0" onMouseover="ddrivetip('Tampilkan Widget Sharethis')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="tm" value="0" id="RadioGroup4_1" checked="checked" onMouseover="ddrivetip('Sembunykan Widget Sharethis')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
	<?
			$membershare = $db->result(0, "membershare");
			if($membershare == 1) {
			?>
	<tr> 
      <td align="right">Share This (member area) :</td>
      <td colspan="5"> <input type="radio" name="membershare" value="1" id="membershare_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Widget Sharethis di area member')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="membershare" value="0" id="membershare_1" onMouseover="ddrivetip('Sembunykan Widget Sharethis di area member')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Share This (member area) :</td>
      <td colspan="5"> <input type="radio" name="membershare" value="1" id="membershare_0" onMouseover="ddrivetip('Tampilkan Widget Sharethis di area member')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="membershare" value="0" id="membershare_1" checked="checked" onMouseover="ddrivetip('Sembunykan Widget Sharethis di area member')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>

<?
			$fbshare = $db->result(0, "fbshare");
			if($fbshare == 1) {
			?>
	<tr> 
      <td align="right">Facebok Share :</td>
      <td colspan="5"> <input type="radio" name="fbshare" value="1" id="RadioGroup3fb_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Facebook Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fbshare" value="0" id="RadioGroup3fb_1" onMouseover="ddrivetip('Sembunykan Facebook Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Facebok Share :</td>
      <td colspan="5"> <input type="radio" name="fbshare" value="1" id="RadioGroup4fb_0" onMouseover="ddrivetip('Tampilkan Facebook Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fbshare" value="0" id="RadioGroup4fb_1" checked="checked" onMouseover="ddrivetip('Sembunykan Facebook Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
<?
			$fblike = $db->result(0, "fblike");
			if($fblike == 1) {
			?>
	<tr> 
      <td align="right">Facebok Like :</td>
      <td colspan="5"> <input type="radio" name="fblike" value="1" id="RadioGroup3fbl_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Facebook Like')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fblike" value="0" id="RadioGroup3fbl_1" onMouseover="ddrivetip('Sembunykan Facebook Like')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Facebok Like :</td>
      <td colspan="5"> <input type="radio" name="fblike" value="1" id="RadioGroup4fbl_0" onMouseover="ddrivetip('Tampilkan Facebook Like')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fblike" value="0" id="RadioGroup4fbl_1" checked="checked" onMouseover="ddrivetip('Sembunykan Facebook Like')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>

<?
			$twitshare = $db->result(0, "twitshare");
			if($twitshare == 1) {
			?>
	<tr> 
      <td align="right">Twitter Share :</td>
      <td colspan="5"> <input type="radio" name="twitshare" value="1" id="RadioGroup3tw_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Twitter Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="twitshare" value="0" id="RadioGroup3tw_1" onMouseover="ddrivetip('Sembunykan Twitter Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Twitter Share :</td>
      <td colspan="5"> <input type="radio" name="twitshare" value="1" id="RadioGroup4tw_0" onMouseover="ddrivetip('Tampilkan Twitter Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="twitshare" value="0" id="RadioGroup4tw_1" checked="checked" onMouseover="ddrivetip('Sembunykan Twitter Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
<?
			$gplusshare = $db->result(0, "gplusshare");
			if($gplusshare == 1) {
			?>
	<tr> 
      <td align="right">Google Plus Share :</td>
      <td colspan="5"> <input type="radio" name="gplusshare" value="1" id="RadioGroup3gp_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Google Plus Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="gplusshare" value="0" id="RadioGroup3gp_1" onMouseover="ddrivetip('Sembunykan Google Plus Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Google Plus Share :</td>
      <td colspan="5"> <input type="radio" name="gplusshare" value="1" id="RadioGroup4gp_0" onMouseover="ddrivetip('Tampilkan Google Plus Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="gplusshare" value="0" id="RadioGroup4gp_1" checked="checked" onMouseover="ddrivetip('Sembunykan Google Plus Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>

<?
			$fbsend = $db->result(0, "fbsend");
			if($fbsend == 1) {
			?>
	<tr> 
      <td align="right">Facebook Send :</td>
      <td colspan="5"> <input type="radio" name="fbsend" value="1" id="RadioGroup3fbsd_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Facebook Send')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fbsend" value="0" id="RadioGroup3fbsd_1" onMouseover="ddrivetip('Sembunykan Facebook Send')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Facebook Send :</td>
      <td colspan="5"> <input type="radio" name="fbsend" value="1" id="RadioGroup4fbsd_0" onMouseover="ddrivetip('Tampilkan Facebook Send')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fbsend" value="0" id="RadioGroup4fbsd_1" checked="checked" onMouseover="ddrivetip('Sembunykan Facebook Send')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
<?
			$fbrec = $db->result(0, "fbrec");
			if($fbrec == 1) {
			?>
	<tr> 
      <td align="right">Facebook Recomended :</td>
      <td colspan="5"> <input type="radio" name="fbrec" value="1" id="RadioGroup3fbrec_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Facebook Recomended')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fbrec" value="0" id="RadioGroup3fbrec_1" onMouseover="ddrivetip('Sembunykan Facebook Recomended')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Facebook Recomended :</td>
      <td colspan="5"> <input type="radio" name="fbrec" value="1" id="RadioGroup4fbrec_0" onMouseover="ddrivetip('Tampilkan Facebook Recomended')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="fbrec" value="0" id="RadioGroup4fbrec_1" checked="checked" onMouseover="ddrivetip('Sembunykan Facebook Recomended')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
<?
			$mailsend = $db->result(0, "mailsend");
			if($mailsend == 1) {
			?>
	<tr> 
      <td align="right">Email Send :</td>
      <td colspan="5"> <input type="radio" name="mailsend" value="1" id="RadioGroup3mlsd_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Email Send')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="mailsend" value="0" id="RadioGroup3mlsd_1" onMouseover="ddrivetip('Sembunykan Email Send')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Email Send :</td>
      <td colspan="5"> <input type="radio" name="mailsend" value="1" id="RadioGroup4mlsd_0" onMouseover="ddrivetip('Tampilkan Email Send')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="mailsend" value="0" id="RadioGroup4mlsd_1" checked="checked" onMouseover="ddrivetip('Sembunykan Email Send')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>

<?
			$instagr = $db->result(0, "instagr");
			if($instagr == 1) {
			?>
	<tr> 
      <td align="right"> Instagram Share :</td>
      <td colspan="5"> <input type="radio" name="instagr" value="1" id="RadioGroup3instagr_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Instagram Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="instagr" value="0" id="RadioGroup3instagr_1" onMouseover="ddrivetip('Sembunykan Instagram Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> Instagram Share :</td>
      <td colspan="5"> <input type="radio" name="instagr" value="1" id="RadioGroup4instagr_0" onMouseover="ddrivetip('Tampilkan Instagram Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="instagr" value="0" id="RadioGroup4instagr_1" checked="checked" onMouseover="ddrivetip('Sembunykan Instagram Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>

<?
			$linkdin = $db->result(0, "linkdin");
			if($linkdin == 1) {
			?>
	<tr> 
      <td align="right"> LinkedIn Share :</td>
      <td colspan="5"> <input type="radio" name="linkdin" value="1" id="RadioGroup3linkdin_0" checked="checked"  onMouseover="ddrivetip('Tampilkan LinkedIn Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="linkdin" value="0" id="RadioGroup3linkdin_1" onMouseover="ddrivetip('Sembunykan LinkedIn Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> LinkedIn Share :</td>
      <td colspan="5"> <input type="radio" name="linkdin" value="1" id="RadioGroup4linkdin_0" onMouseover="ddrivetip('Tampilkan LinkedIn Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="linkdin" value="0" id="RadioGroup4linkdin_1" checked="checked" onMouseover="ddrivetip('Sembunykan LinkedIn Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
    
    <?
			$blogger = $db->result(0, "blogger");
			if($blogger == 1) {
			?>
	<tr> 
      <td align="right"> Blogger Share :</td>
      <td colspan="5"> <input type="radio" name="blogger" value="1" id="blogger_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Blogger Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="blogger" value="0" id="blogger_1" onMouseover="ddrivetip('Sembunykan Blogger Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> Blogger Share :</td>
      <td colspan="5"> <input type="radio" name="blogger" value="1" id="blogger_0" onMouseover="ddrivetip('Tampilkan Blogger Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="blogger" value="0" id="blogger_1" checked="checked" onMouseover="ddrivetip('Sembunykan Blogger Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
    
     <?
			$tumblr = $db->result(0, "tumblr");
			if($tumblr == 1) {
			?>
	<tr> 
      <td align="right"> Tumblr Share :</td>
      <td colspan="5"> <input type="radio" name="tumblr" value="1" id="tumblr_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Tumblr Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="tumblr" value="0" id="tumblr_1" onMouseover="ddrivetip('Sembunykan Tumblr Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> Tumblr Share :</td>
      <td colspan="5"> <input type="radio" name="tumblr" value="1" id="tumblr_0" onMouseover="ddrivetip('Tampilkan Tumblr Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="tumblr" value="0" id="tumblr_1" checked="checked" onMouseover="ddrivetip('Sembunykan Tumblr Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
    
         <?
			$pinterest = $db->result(0, "pinterest");
			if($pinterest == 1) {
			?>
	<tr> 
      <td align="right"> Pinterest Share :</td>
      <td colspan="5"> <input type="radio" name="pinterest" value="1" id="pinterest_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Pinterest Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="pinterest" value="0" id="pinterest_1" onMouseover="ddrivetip('Sembunykan Pinterest Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> Pinterest Share :</td>
      <td colspan="5"> <input type="radio" name="pinterest" value="1" id="pinterest_0" onMouseover="ddrivetip('Tampilkan Pinterest Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="pinterest" value="0" id="pinterest_1" checked="checked" onMouseover="ddrivetip('Sembunykan Pinterest Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
    
     <?
			$print = $db->result(0, "print");
			if($print == 1) {
			?>
	<tr> 
      <td align="right"> Print Button :</td>
      <td colspan="5"> <input type="radio" name="print" value="1" id="print_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Print Button')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="print" value="0" id="print_1" onMouseover="ddrivetip('Sembunykan Print Button')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> Print Button :</td>
      <td colspan="5"> <input type="radio" name="print" value="1" id="print_0" onMouseover="ddrivetip('Tampilkan Print Button')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="print" value="0" id="print_1" checked="checked" onMouseover="ddrivetip('Sembunykan Print Button')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
    <?
			$stumbleupon = $db->result(0, "stumbleupon");
			if($stumbleupon == 1) {
			?>
	<tr> 
      <td align="right"> StumbleUpon Share :</td>
      <td colspan="5"> <input type="radio" name="stumbleupon" value="1" id="stumbleupon_0" checked="checked"  onMouseover="ddrivetip('Tampilkan StumbleUpon Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="stumbleupon" value="0" id="stumbleupon_1" onMouseover="ddrivetip('Sembunykan StumbleUpon Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> StumbleUpon Share :</td>
      <td colspan="5"> <input type="radio" name="stumbleupon" value="1" id="stumbleupon_0" onMouseover="ddrivetip('Tampilkan StumbleUpon Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="stumbleupon" value="0" id="stumbleupon_1" checked="checked" onMouseover="ddrivetip('Sembunykan StumbleUpon Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
      <?
			$baidu = $db->result(0, "baidu");
			if($baidu == 1) {
			?>
	<tr> 
      <td align="right"> Baidu Share :</td>
      <td colspan="5"> <input type="radio" name="baidu" value="1" id="baidu_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Baidu Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="baidu" value="0" id="baidu_1" onMouseover="ddrivetip('Sembunykan Baidu Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> Baidu Share :</td>
      <td colspan="5"> <input type="radio" name="baidu" value="1" id="baidu_0" onMouseover="ddrivetip('Tampilkan Baidu Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="baidu" value="0" id="baidu_1" checked="checked" onMouseover="ddrivetip('Sembunykan Baidu Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
    
    <?
			$digg = $db->result(0, "digg");
			if($digg == 1) {
			?>
	<tr> 
      <td align="right"> Digg Share :</td>
      <td colspan="5"> <input type="radio" name="digg" value="1" id="digg_0" checked="checked"  onMouseover="ddrivetip('Tampilkan Digg Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="digg" value="0" id="baidu_1" onMouseover="ddrivetip('Sembunykan Digg Share')"; onMouseout="hideddrivetip()" />
        Hide</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right"> Digg Share :</td>
      <td colspan="5"> <input type="radio" name="digg" value="1" id="digg_0" onMouseover="ddrivetip('Tampilkan Digg Share')"; onMouseout="hideddrivetip()"/>
          Show
          <input type="radio" name="digg" value="0" id="digg_1" checked="checked" onMouseover="ddrivetip('Sembunykan Digg Share')"; onMouseout="hideddrivetip()"/>
        Hide</td>
    </tr>
	<?
	}
	?>
 <tr> 
      <td colspan="6" bgcolor="#DDDDE1">&nbsp;</td>
    </tr>
	<tr> 
      <td colspan="6" >
        <input name="no" type="hidden" id="no" value="1" size="10" />&nbsp;</td>
    </tr>
   <tr> 
      <td colspan="6" bgcolor=""> <input type="submit"  name="submit" value="SAVE" class="button">
        
        <input type="submit" name="cancel" id="cancel" value="CANCEL" onClick="javascript:history.go(-1)" class="button">
       </td>
    </tr>
    <tr> 
      <td colspan="6" >&nbsp;</td>
    </tr>
	
  </table>
 </form>
<p>&nbsp;</p>

<script type="text/javascript">
var tooltipObj = new DHTMLgoodies_formTooltip();
tooltipObj.setTooltipPosition('below');
tooltipObj.setPageBgColor('#FFFFFF');
tooltipObj.setTooltipCornerSize(15);
tooltipObj.initFormFieldTooltip();
</script> 
<?php } ?>
<?php
}
else if (isset($_GET['sess']) && $_GET['sess'] == "system") {

?>
<?
if(isset($_POST['submit'])){
$no = $_POST['no'];
		
			$komlev = $_POST['komlev0']."|".$_POST['komlev1']."|".$_POST['komlev2']."|".$_POST['komlev3']."|".$_POST['komlev4']."|".$_POST['komlev5']."|".$_POST['komlev6']."|".$_POST['komlev7']."|".$_POST['komlev8']."|".$_POST['komlev9']."|".$_POST['komlev10']."|".$_POST['komlev11']."|".$_POST['komlev12']."|".$_POST['komlev13']."|".$_POST['komlev14']."|".$_POST['komlev15']."|".$_POST['komlev16']."|".$_POST['komlev17']."|".$_POST['komlev18']."|".$_POST['komlev19']."|".$_POST['komlev20'];
			
			$komsponsor = $_POST['k_sponsor1']."|".$_POST['k_sponsor2']."|".$_POST['k_sponsor3']."|".$_POST['k_sponsor4']."|".$_POST['k_sponsor5']."|".$_POST['k_sponsor6']."|".$_POST['k_sponsor7']."|".$_POST['k_sponsor8']."|".$_POST['k_sponsor9']."|".$_POST['k_sponsor10']."|".$_POST['k_sponsor11'];
			
			$kompasangan = $_POST['k_pass1']."|".$_POST['k_pass2']."|".$_POST['k_pass3']."|".$_POST['k_pass4']."|".$_POST['k_pass5']."|".$_POST['k_pass6']."|".$_POST['k_pass7']."|".$_POST['k_pass8']."|".$_POST['k_pass9']."|".$_POST['k_pass10']."|".$_POST['k_pass11'];
			$sponcass = $_POST['spcass1']."|".$_POST['spcass2']."|".$_POST['spcass3']."|".$_POST['spcass4']."|".$_POST['spcass5']."|".$_POST['spcass6']."|".$_POST['spcass7']."|".$_POST['spcass8']."|".$_POST['spcass9']."|".$_POST['spcass10']."|".$_POST['spcass11'];
			$passcass = $_POST['passcass1']."|".$_POST['passcass2']."|".$_POST['passcass3']."|".$_POST['passcass4']."|".$_POST['passcass5']."|".$_POST['passcass6']."|".$_POST['passcass7']."|".$_POST['passcass8']."|".$_POST['passcass9']."|".$_POST['passcass10']."|".$_POST['passcass11'];
			$cass = $_POST['cass1']."|".$_POST['cass2']."|".$_POST['cass3']."|".$_POST['cass4']."|".$_POST['cass5']."|".$_POST['cass6']."|".$_POST['cass7']."|".$_POST['cass8']."|".$_POST['cass9']."|".$_POST['cass10']."|".$_POST['cass11'];
			
			$biaya = $_POST['biaya1']."|".$_POST['biaya2']."|".$_POST['biaya3']."|".$_POST['biaya4']."|".$_POST['biaya5']."|".$_POST['biaya6']."|".$_POST['biaya7']."|".$_POST['biaya8']."|".$_POST['biaya9']."|".$_POST['biaya10']."|".$_POST['biaya11']."|".$_POST['biaya12']."|".$_POST['biaya13']."|".$_POST['biaya14']."|".$_POST['biaya15']."|".$_POST['biaya16']."|".$_POST['biaya17']."|".$_POST['biaya18']."|".$_POST['biaya19']."|".$_POST['biaya20'];
			
			$biaya2 = $_POST['biayax1']."|".$_POST['biayax2']."|".$_POST['biayax3']."|".$_POST['biayax4']."|".$_POST['biayax5']."|".$_POST['biayax6']."|".$_POST['biayax7']."|".$_POST['biayax8']."|".$_POST['biayax9']."|".$_POST['biayax10']."|".$_POST['biayax11'];
			
		
			$cycles = $_POST['cycle1']."|".$_POST['cycle2']."|".$_POST['cycle3']."|".$_POST['cycle4']."|".$_POST['cycle5']."|".$_POST['cycle6']."|".$_POST['cycle7']."|".$_POST['cycle8']."|".$_POST['cycle9']."|".$_POST['cycle10']."|".$_POST['cycle11'];
			
			$mwdne = $_POST['mwd1']."|".$_POST['mwd2']."|".$_POST['mwd3']."|".$_POST['mwd4']."|".$_POST['mwd5']."|".$_POST['mwd6']."|".$_POST['mwd7']."|".$_POST['mwd8']."|".$_POST['mwd9']."|".$_POST['mwd10'];
			$mwdnex = $_POST['mwdx1']."|".$_POST['mwdx2']."|".$_POST['mwdx3']."|".$_POST['mwdx4']."|".$_POST['mwdx5']."|".$_POST['mwdx6']."|".$_POST['mwdx7']."|".$_POST['mwdx8']."|".$_POST['mwdx9']."|".$_POST['mwdx10'];
			
			$ttcycles = $_POST['ttcycle1']."|".$_POST['ttcycle2']."|".$_POST['ttcycle3']."|".$_POST['ttcycle4']."|".$_POST['ttcycle5']."|".$_POST['ttcycle6']."|".$_POST['ttcycle7']."|".$_POST['ttcycle8']."|".$_POST['ttcycle9']."|".$_POST['ttcycle10']."|".$_POST['ttcycle11'];
			
			$peringkat = $_POST['peringkat1']."|".$_POST['peringkat2']."|".$_POST['peringkat3']."|".$_POST['peringkat4']."|".$_POST['peringkat5']."|".$_POST['peringkat6']."|".$_POST['peringkat7']."|".$_POST['peringkat8']."|".$_POST['peringkat9']."|".$_POST['peringkat10']."|".$_POST['peringkat11']."|".$_POST['peringkat12']."|".$_POST['peringkat13']."|".$_POST['peringkat14']."|".$_POST['peringkat15']."|".$_POST['peringkat16']."|".$_POST['peringkat17']."|".$_POST['peringkat18']."|".$_POST['peringkat19']."|".$_POST['peringkat20'];
			
			
		$peringkat2 = $_POST['jumlah1']."|".$_POST['rank1']."|".$_POST['reward1']."|".$_POST['gaji1']."|".$_POST['jumlah2']."|".$_POST['rank2']."|".$_POST['reward2']."|".$_POST['gaji2']."|".$_POST['jumlah3']."|".$_POST['rank3']."|".$_POST['reward3']."|".$_POST['gaji3']."|".$_POST['jumlah4']."|".$_POST['rank4']."|".$_POST['reward4']."|".$_POST['gaji4']."|".$_POST['jumlah5']."|".$_POST['rank5']."|".$_POST['reward5']."|".$_POST['gaji5']."|".$_POST['jumlah6']."|".$_POST['rank6']."|".$_POST['reward6']."|".$_POST['gaji6']."|".$_POST['jumlah7']."|".$_POST['rank7']."|".$_POST['reward7']."|".$_POST['gaji7']."|".$_POST['jumlah8']."|".$_POST['rank8']."|".$_POST['reward8']."|".$_POST['gaji8']."|".$_POST['jumlah9']."|".$_POST['rank9']."|".$_POST['reward9']."|".$_POST['gaji9']."|".$_POST['jumlah10']."|".$_POST['rank10']."|".$_POST['reward10']."|".$_POST['gaji10'];	
			
			
			$forex = $_POST['forex_kontrak']."|".$_POST['forex_kontrak2']."|".$_POST['forex_kontrak3']."|".$_POST['forex_kontrak4']."|".$_POST['forex_kontrak5']."|".$_POST['forex_kontrak6'];
			
			$forex_profit = $_POST['forex_profit1']."|".$_POST['forex_profit2']."|".$_POST['forex_profit3']."|".$_POST['forex_profit4']."|".$_POST['forex_profit5']."|".$_POST['forex_profit6']."|".$_POST['forex_profit7']."|".$_POST['forex_profit8']."|".$_POST['forex_profit9']."|".$_POST['forex_profit10']."|".$_POST['forex_profit11']."|".$_POST['forex_profit12'];
			$invest = $_POST['invest1']."|".$_POST['invest2']."|".$_POST['invest3']."|".$_POST['invest4']."|".$_POST['invest5']."|".$_POST['invest6']."|".$_POST['invest7']."|".$_POST['invest8']."|".$_POST['invest9']."|".$_POST['invest10']."|".$_POST['invest11']."|".$_POST['invest12']."|".$_POST['invest13']."|".$_POST['invest14']."|".$_POST['invest14']."|".$_POST['invest15']."|".$_POST['invest16']."|".$_POST['invest17']."|".$_POST['invest18']."|".$_POST['invest19']."|".$_POST['invest20'];
			
			$priode_invest = $_POST['prinvest1']."|".$_POST['prinvest2']."|".$_POST['prinvest3']."|".$_POST['prinvest4']."|".$_POST['prinvest5']."|".$_POST['prinvest6']."|".$_POST['prinvest7']."|".$_POST['prinvest8']."|".$_POST['prinvest9']."|".$_POST['prinvest10']."|".$_POST['prinvest11']."|".$_POST['prinvest12']."|".$_POST['prinvest13']."|".$_POST['prinvest14']."|".$_POST['prinvest14']."|".$_POST['prinvest15']."|".$_POST['prinvest16']."|".$_POST['prinvest17']."|".$_POST['prinvest18']."|".$_POST['prinvest19']."|".$_POST['prinvest20'];
			
			$kontrak_investasi = $_POST['k_inv1']."|".$_POST['k_inv2']."|".$_POST['k_inv3']."|".$_POST['k_inv4']."|".$_POST['k_inv5']."|".$_POST['k_inv6']."|".$_POST['k_inv7']."|".$_POST['k_inv8']."|".$_POST['k_inv9']."|".$_POST['k_inv10']."|".$_POST['k_inv11']."|".$_POST['k_inv12']."|".$_POST['k_inv13']."|".$_POST['k_inv14']."|".$_POST['k_inv14']."|".$_POST['k_inv15']."|".$_POST['k_inv16']."|".$_POST['k_inv17']."|".$_POST['k_inv18']."|".$_POST['k_inv19']."|".$_POST['k_inv20'];
			$masa_kontrak = $_POST['kontrak_persen']."|".$_POST['kontrak_hari'];
			$kdlman = $_POST['level']."|".$_POST['jual'];
			$flushout = $_POST['fs1']."|".$_POST['fs2']."|".$_POST['fs3']."|".$_POST['fs4']."|".$_POST['fs5']."|".$_POST['fs6']."|".$_POST['fs7'];
			$jmlote = $_POST['jmlt1']."|".$_POST['jmlt2']."|".$_POST['jmlt3']."|".$_POST['jmlt4']."|".$_POST['jmlt5']."|".$_POST['jmlt6'];
			$profitdwn = $_POST['prodw1']."|".$_POST['prodw2']."|".$_POST['prodw3']."|".$_POST['prodw4']."|".$_POST['prodw5']."|".$_POST['prodw6'];
			
			 $dtconvrt = $_POST['minconvcoin']."|".$_POST['maxconvcoin']."|".$_POST['feecnvcoin'];
        $dtscne = $_POST['minselco']."|".$_POST['maxselco']."|".$_POST['feeselco'];
       $dttrne = $_POST['mintrnco']."|".$_POST['maxtrnco']."|".$_POST['feetrnco'];
	   
	      $dtconvrtu = $_POST['minconvusd']."|".$_POST['maxconvusd']."|".$_POST['feecnvusd'];
        $dtscneu = $_POST['minselusd']."|".$_POST['maxselusd']."|".$_POST['feeselusd'];
       $dttrneu = $_POST['mintrnusd']."|".$_POST['maxtrnusd']."|".$_POST['feetrnusd'];

			
			
		$db->update("configuration", "kurs='".$_POST['kurs']."', komisi_sponsor='".$_POST['komisi_sponsor']."', kompasangan='".$_POST['kompasangan']."', komlev='$komlev', kedalaman='$kdlman', point='".$_POST['point']."', komjual='$komjual', id_reg='".$_POST['id_reg']."', id_reg2='".$_POST['id_reg2']."', flushout='".$flushout."', biaya='$biaya',peringkat='$peringkat', biaya2='".$biaya2."', point_reward='$point_reward', kontrak='$forex', topsponsor='".$_POST['topsponsor']."', persen_profit='".$forex_profit."', mwd='".$mwdne."', mwd2='".$mwdnex."', mwd3='".$_POST['mwd3']."', mwd4='".$_POST['mwd4']."', otos='".$_POST['otos']."', kedalaman_paket='".mysql_real_escape_string($_POST['kdlm_paket'])."', exptrans='".mysql_real_escape_string($_POST['exptrans'])."', invest_profits='$invest', periode_profits='".$priode_invest."', kontrak_pro='".$kontrak_investasi."', peringkat2='$peringkat2', defcurr='".$_POST['defcurr']."', onoto='".mysql_real_escape_string($_POST['onoto'])."', max_invest='".$_POST['max_invest']."', charge_transfer='".$_POST['charge_transfer']."', hargatiket='".$_POST['hargatiket']."', cycle='$cycles', ttcycle='$ttcycles', min_ticket='".$_POST['min_ticket']."', useticket='".mysql_real_escape_string($_POST['useticket'])."', buybalance='".$_POST['buybalance']."', transbalance='".$_POST['transbalance']."', convertbalance='".$_POST['convertbalance']."', mintrans='".$_POST['mintrans']."', minbuy='".$_POST['minbuy']."', maxbuy='".$_POST['maxbuy']."', maxtrans='".$_POST['maxtrans']."', minsell='".$_POST['minsell']."', feetrans='".$_POST['feetrans']."', feesell='".$_POST['feesell']."', feeconv='".$_POST['feeconv']."', sellbalance='".$_POST['sellbalance']."', maxsell='".$_POST['maxsell']."', reinv='".$_POST['reinv']."', hargatiketsto='".$_POST['hargatiketsto']."', cancel_order='".$_POST['cancel_order']."', cancel_order_sto='".$_POST['cancel_order_sto']."', ticketstockist='".mysql_real_escape_string($_POST['ticketstockist'])."', maxinvest='".$_POST['maxinvest']."', regpublic='".$_POST['regpublic']."', matchroi='".$_POST['matchroi']."', batastransfer='".$_POST['batastransfer']."', minconvert='".$_POST['minconvert']."', maxconvert='".$_POST['maxconvert']."', nilaiconvert='".$_POST['nilaiconvert']."', kursbtc='".$_POST['kursbtc']."', kursbtcoin='".$_POST['kursbtcoin']."', coiname='".$_POST['coiname']."', kurscoinbtc='".$_POST['kurscoinbtc']."', saldocoin='".$_POST['saldocoin']."', kursusdcoin='".$_POST['kursusdcoin']."', dtsellcoin='".$dtscne."', dtconvertcoin='".$dtconvrt."', dtranscoin='".$dttrne."', convertcoin='".$_POST['convertcoin']."', sellcoin='".$_POST['sellcoin']."', transcoin='".$_POST['transcoin']."', dtsellusd='".$dtscneu."', dtconvertusd='".$dtconvrtu."', dtransusd='".$dttrneu."', convertusd='".$_POST['convertusd']."', sellusd='".$_POST['sellusd']."', coin_start='".$_POST['coin_start']."', coin_end='".$_POST['coin_end']."',transusd='".$_POST['transusd']."'", "id='$no'");




			 header("location: ?go=configuration&sess=system&result=success");
	exit;
	} else {
?>
<?php
$results = $_GET['result'];
if($results == "success") { 
echo "<div class='alert-box successs'><span>Sukses : </span>Konfigurasi System Berhasil disimpan!</div>";
}
?>
<?php
$results = $_GET['result'];
if($results == "success_dell") { 
echo "<div class='alert-box successs'><span>Sukses : </span>Paket Pendaftaran berhasil diubah!</div>";
}
?>

<form id="form" name="form" method="POST" action="">
  <table width="95%" border="0" align="center" cellpadding="4" cellspacing="1">
    

<tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>COIN</strong></div></td>
    </tr>
	
    <tr>
      <td width="185" align="right">Name Coin: </td> 
      <td colspan="5"><div align="left">
        <input name="coiname" type="text" id="coiname" value="<?= $db->result(0, "coiname"); ?>" size="10"/>
    </div></td>
    </tr>
    <tr>
      <td width="185" align="right">Kurs <?php echo $namecoins;?> (BTC): </td> 
      <td colspan="5"><div align="left">
        <input name="kurscoinbtc" type="text" id="kurscoinbtc" value="<?= $db->result(0, "kurscoinbtc"); ?>" size="10"/>&nbsp;BTC</div></td>
    </tr>
    <tr>
      <td width="185" align="right">Kurs <?php echo $namecoins;?> (USD): </td> 
      <td colspan="5"><div align="left">
        <input name="kursusdcoin" type="text" id="kursusdcoin" value="<?= $db->result(0, "kursusdcoin"); ?>" size="10"/>&nbsp;USD</div></td>
    </tr>
    <tr>
      <td width="185" align="right">Balance <?php echo $namecoins;?> : </td> 
      <td colspan="5"><div align="left">
        <input name="saldocoin" type="text" id="saldocoin" value="<?= $db->result(0, "saldocoin"); ?>" size="10"/>&nbsp;Coins</div></td>
    </tr>
	
	
	 <tr>
      <td width="185" align="right">Start BUY ICO : </td> 
      <td colspan="5"><div align="left">
          
         <input name="coin_start" type="text" id="coin_start" value="<?php echo $coin_start; ?>"  required="required">&nbsp;<img src="../images/calendar_select_none.png" alt="Kalender" id="coin_start_trig" title="Date selector" align="absmiddle" width="24px"/>
					<script type="text/javascript">
            Calendar.setup({
                inputField : "coin_start",
                ifFormat : "%Y-%m-%d",
                button : "coin_start_trig",
                align : "Bl",
                singleClick : true
            });
           

            $("coin_start_trig").observe("click", showCalendar);

            function showCalendar(event){
                var element = event.element(event);
                var offset = $(element).viewportOffset();
                var scrollOffset = $(element).cumulativeScrollOffset();
                var dimensionsButton = $(element).getDimensions();
                var index = $("widget-chooser").getStyle("zIndex");

                $$("div.calendar").each(function(item){
                    if ($(item).visible()) {
                        var dimensionsCalendar = $(item).getDimensions();

                        $(item).setStyle({
                            "zIndex" : index + 1,
                            "left" : offset[0] + scrollOffset[0] - dimensionsCalendar.width + dimensionsButton.width + "px",
                            "top" : offset[1] + scrollOffset[1] + dimensionsButton.height + "px"
                        });
                    };
                });
            };
        </script> 

        
    </tr>
    
    
     <tr>
      <td width="185" align="right">End Buy ICO: </td> 
      <td colspan="5"><div align="left">
        <input name="coin_end" type="text" id="coin_end" value="<?php echo $coin_end; ?>"  required="required">&nbsp;<img src="../images/calendar_select_none.png" alt="Kalender" id="coin_end_trig" title="Date selector" align="absmiddle" width="24px"/>
					<script type="text/javascript">
            Calendar.setup({
                inputField : "coin_end",
                ifFormat : "%Y-%m-%d",
                button : "coin_end_trig",
                align : "Bl",
                singleClick : true
            });
           

            $("coin_end_trig").observe("click", showCalendar);

            function showCalendar(event){
                var element = event.element(event);
                var offset = $(element).viewportOffset();
                var scrollOffset = $(element).cumulativeScrollOffset();
                var dimensionsButton = $(element).getDimensions();
                var index = $("widget-chooser").getStyle("zIndex");

                $$("div.calendar").each(function(item){
                    if ($(item).visible()) {
                        var dimensionsCalendar = $(item).getDimensions();

                        $(item).setStyle({
                            "zIndex" : index + 1,
                            "left" : offset[0] + scrollOffset[0] - dimensionsCalendar.width + dimensionsButton.width + "px",
                            "top" : offset[1] + scrollOffset[1] + dimensionsButton.height + "px"
                        });
                    };
                });
            };
        </script> </td>
    </tr>
<tr> 


	 <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>REGISTRATION PACKAGE</strong></div></td>
    </tr>
	
    <tr>
      <td width="185" align="right">Kurs IDR to Dolar: </td> 
      <td colspan="5"><div align="left">
      <input name="defcurr" type="hidden" id="defcurr" value="1" size="10"/>
      <input name="kedalaman_paket" type="hidden" id="kedalaman_paket" value="5" size="10"/>
        <input name="kurs" type="text" id="kurs" value="<?= $db->result(0, "kurs"); ?>" size="10"/>
      &nbsp;&nbsp;&nbsp;<a href="#null" onClick="newWindow('page.php?go=currency','','600','400','resizable,scrollbars,status')"><button class='mmm_blue' style='padding:2px 6px;font-size:11px;' type="button">show currency</button></a></div></td>
    </tr>
    <tr>
      <td width="185" align="right">Kurs BTC to Dolar: </td> 
      <td colspan="5"><div align="left">
        <input name="kursbtc" type="text" id="kursbtc" value="<?= $db->result(0, "kursbtc"); ?>" size="10"/>
      &nbsp;&nbsp;&nbsp;<a href="#null" onClick="newWindow('page.php?go=currency','','600','400','resizable,scrollbars,status')"><button class='mmm_blue' style='padding:2px 6px;font-size:11px;' type="button">show currency</button></a></div></td>
    </tr>
<tr> 
      
      <td align="right">Number of Package Options : </td>
      <td colspan="6">
      <select name="kedalaman_paket" id="kedalaman_paket" onchange="location =  this.options[this.selectedIndex].value" style="width:50px">
        <?
		  if(isset($_GET["ds"])){ $ds = $_GET["ds"]; }
		$lvs = 5;
		$kdlms = $db->result(0, "kedalaman_paket");
		$kds = $kdlms;
		for($is=1;$is<=$lvs;$is++) {
			if($kds == $ds or empty($ds)) {
				$kds = $kds;
			} else {
				$kds = $ds;
			}
			if($ds == $is or $kds == $is) {
				$sel = "selected='selected'";
			} else {
				$sel = "";
			}		
			echo "<option value='?go=configuration&sess=system&ds=$is' $sel>$is</option>";
		}
		?>
        </select></td>
    </tr>
	
   <?
	
		  if(isset($_GET["ds"])){ $ds = $_GET["ds"]; }
   $klevs = $db->result(0, "biaya");
   $klevso = $db->result(0, "biaya2");
    $klevse = $db->result(0, "peringkat");
    $klevsi = $db->result(0, "periode_profits");
    $cycle = $db->result(0, "cycle");
    $ttcycle = $db->result(0, "ttcycle");
    $fst = $db->result(0, "flushout");
	if($kds == $ds or empty($ds)) {
		$kds = $kds;
	} else {
		$kds = $ds;
	}
 //  if($pg == "komlev");
   	for($is=0;$is<$kds;$is++) {
		$biaya = explode("|", $klevs); 
		$biayax = explode("|", $klevso); 
		$peringkat = explode("|", $klevse); 
		$periode = explode("|", $klevsi); 
		$cyclex = explode("|", $cycle); 
		$ttcyclex = explode("|", $ttcycle); 
		$fse = explode("|", $fst); 
		$xs = $is+1;
		
		
?>
  <?php
  if($periode[$is] == "hour"){
		   $pdd = "Perjam";
		   $pddx = "Jam";
	  }else if($periode[$is] == "day"){
		   $pdd = "/Day";
		   $pddx = "Day";
	   }else if($periode[$is] == "week"){
		   $pdd = "/Week";
		   $pddx = "Week";
	   }else{
		   $pdd = "/Month";
		   $pddx = "Month";
	   }
	   ?>
	<tr>
      <td align="right">Package : <input name="<?= "peringkat$xs"; ?>" type="text" value="<?= $peringkat[$is]; ?>" size="10" /></td>
      <td width="523" colspan="5"><div align="left">
         &nbsp;&nbsp;&nbsp;&nbsp;Investment : 
             <input name="<?= "biaya$xs"; ?>" type="text" value="<?= $biaya[$is]; ?>" size="10" />&nbsp;<?php echo $namecoins;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      
         Kontrak : <input name="<?= "k_inv$xs"; ?>" type="text" value="<?= $kontrakpro[$is]; ?>" size="8" tooltipText="Masa Aktif Program Investasi (dalam hari) (Isi angka saja)"/>&nbsp;<?= $pddx; ?>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Profit : <input name="<?= "forex_profit$xs"; ?>" type="text" value="<?= $profit[$is]; ?>" size="5"/> 
         % 
         
         
          <input name="<?= "prinvest$xs"; ?>" type="hidden" value="day" size="2"/>&nbsp;
      
        </div></td>
    </tr>
    <?
	}
//	}
?>
<tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>BONUS </strong></div></td>
    </tr>

 <tr>
      <td width="185" align="right">Bonus Sponsor : </td> 
      <td colspan="5"><div align="left"><input name="komisi_sponsor" type="text" value="<?= $db->result(0, "komisi_sponsor"); ?>" size="2"/> %
      </div></td>
    </tr>


 

       <tr class="tbl_header"> 
      <td colspan="6" align="center" bgcolor="#DDDDE1"><strong>BONUS POINT / LEVEL</strong></td>
    </tr>
      <tr> 
      <td align="right">Depth up to  </td>
      <td colspan="5"> Level : 
        <select name="kedalaman" id="kedalaman" onchange="location =  this.options[this.selectedIndex].value" style="width:50px">
        <?
		  if(isset($_GET["d"])){ $d = $_GET["d"]; }
		$lv = 20;
		$kdlm = explode("|", $db->result(0, "kedalaman"));
		$kd = $kdlm[0];
		for($i=1;$i<=$lv;$i++) {
			if($kd == $d or empty($d)) {
				$kd = $kd;
			} else {
				$kd = $d;
			}
			if($d == $i or $kd == $i) {
				$sel = "selected=selected";
			} else {
				$sel = "";
			}		
			echo "<option value='?go=configuration&sess=system&d=$i' $sel>$i</option>";
		}
		?>
        </select></td>
    </tr>
	 
	
   <?
	
		  if(isset($_GET["d"])){ $d = $_GET["d"]; }
   $klev = $db->result(0, "komlev");
	if($kd == $d or empty($d)) {
		$kd = $kd;
	} else {
		$kd = $d;
	}
 //  if($pg == "komlev");
   	for($i=0;$i<$kd;$i++) {
		$komlev = explode("|", $klev); 
		$x = $i+1;
?>
    <tr> 

      <td align="right"> Level 
        <?= $x; ?>
        :</td>
      <td colspan="5"><input name="<?= "komlev$i"; ?>" type="text" value="<?= $komlev[$i]; ?>" size="3" /> %
        <input name="level" type="hidden" value="<?= $kd; ?>" size="3" /> 
	   <input name="jual" type="hidden" value="<?= $kde; ?>" size="10" />
	   <input name="no" type="hidden" value="1" size="10" />	  </td>
    </tr>
    <?
	}
//	}
?>
  <tr>
      <td colspan="6" bgcolor=""></td>
    </tr>
		
    <tr class="tbl_header"> 
      <td colspan="6" bgcolor="#DDDDE1"><div align="center"><strong>SETTING </strong></div></td>
    </tr>
     <tr>
      <td width="185" align="right">Transfer Limit: </td> 
      <td colspan="5"><div align="left">
        <input name="batastransfer" type="text" id="batastransfer" value="<?= $db->result(0, "batastransfer"); ?>" size="2"/> Hour
      </div></td>
    </tr>
       <?
	  $regpublic = $db->result(0, "regpublic");
	  if($regpublic == 1) {
		?>
	<tr> 
      <td align="right">Register :</td>
      <td colspan="5"> <input type="radio" name="regpublic" value="1" id="RadioGroup111_0za" checked="checked" onMouseover="ddrivetip('Register New Member From Home.')"; onMouseout="hideddrivetip()"/>
          Active
          <input type="radio" name="regpublic" value="0" id="RadioGroup111_1za" onMouseover="ddrivetip('Register New Member From Home.')"; onMouseout="hideddrivetip()"/>
        Non-active</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Register :</td>
      <td colspan="5"> <input type="radio" name="regpublic" value="1" id="RadioGroup112_0za" onMouseover="ddrivetip('Register New Member From Home.')"; onMouseout="hideddrivetip()"/>
         Active
          <input type="radio" name="regpublic" value="0" id="RadioGroup112_1za" checked="checked" onMouseover="ddrivetip('Register New Member From Home.')"; onMouseout="hideddrivetip()"/>
        Non-active</td>
    </tr>
	<?
	}
	?>
    	<?
	  $exptrans = $db->result(0, "exptrans");
	  if($exptrans == 1) {
		?>
	<tr> 
      <td align="right">Register Member Area :</td>
      <td colspan="5"> <input type="radio" name="exptrans" value="1" id="RadioGroup111_0z" checked="checked" onMouseover="ddrivetip('Register New Member From Member Area.')"; onMouseout="hideddrivetip()"/>
          Active
          <input type="radio" name="exptrans" value="0" id="RadioGroup111_1z" onMouseover="ddrivetip('Register New Member From Member Area.')"; onMouseout="hideddrivetip()"/>
        Non-active</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Register Member Area :</td>
      <td colspan="5"> <input type="radio" name="exptrans" value="1" id="RadioGroup112_0z" onMouseover="ddrivetip('Register New Member From Member Area.')"; onMouseout="hideddrivetip()"/>
         Active
          <input type="radio" name="exptrans" value="0" id="RadioGroup112_1z" checked="checked" onMouseover="ddrivetip('Register New Member From Member Area.')"; onMouseout="hideddrivetip()"/>
        Non-active</td>
    </tr>
	<?
	}
	?>
     <tr>
      <td width="185" align="right">Max Register Per Day: </td> 
      <td colspan="5"><div align="left">
        <input name="max_invest" type="text" id="max_invest" value="<?= $db->result(0, "max_invest"); ?>" size="5" onMouseover="ddrivetip('Maksimal Member mendaftarkan member baru dalam sehari.')"; onMouseout="hideddrivetip()"/>
      </div></td>
    </tr>
	<?
	  $ljke = $db->result(0, "otos");
	  if($ljke == 1) {
		?>
	<tr> 
      <td align="right">Auto Profit :</td>
      <td colspan="5"> <input type="radio" name="otos" value="1" id="RadioGroup111_0" checked="checked" onMouseover="ddrivetip('Otomatisasi input profit, jika nonaktif anda harus input manual.')"; onMouseout="hideddrivetip()"/>
          Active
          <input type="radio" name="otos" value="0" id="RadioGroup111_1" onMouseover="ddrivetip('Otomatisasi input profit, jika nonaktif anda harus input manual.')"; onMouseout="hideddrivetip()"/>
        Non-active</td>
    </tr>
	<?
	} else {
	?>
	<tr> 
      <td align="right">Auto Profit :</td>
      <td colspan="5"> <input type="radio" name="otos" value="1" id="RadioGroup112_0" onMouseover="ddrivetip('Otomatisasi input profit, jika nonaktif anda harus input manual.')"; onMouseout="hideddrivetip()"/>
         Active
          <input type="radio" name="otos" value="0" id="RadioGroup112_1" checked="checked" onMouseover="ddrivetip('Otomatisasi input profit, jika nonaktif anda harus input manual.')"; onMouseout="hideddrivetip()"/>
        Non-active</td>
    </tr>
	<?
	}
	?>
     
  <tr>
      <td width="185" align="right">Maximum Active Investment: </td> 
      <td colspan="5"><div align="left">
        <input name="maxinvest" type="text" id="maxinvest" value="<?= $db->result(0, "maxinvest"); ?>" size="3"/>
      </div></td>
    </tr>
   
   
     <tr class="tbl_header"> 
      <td colspan="6" align="center" bgcolor="#DDDDE1"><strong>SETTING WALLET USD</strong></td>
    </tr>
    
    <tr>
      <td width="185" align="right">Buy balance: </td> 
      <td colspan="5"><div align="left">
       
       
       
       
       
       
        <select name="convertusd" id="convertcoin" style="width:120px;" onMouseover="ddrivetip('Konversi Wallet USD')"; onMouseout="hideddrivetip()"  >
       <?
			$convertusd = $db->result(0, "convertusd");
			if($convertusd == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		<?
	} else{
	?>
     
	   <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
      
		<?
	}
	?>
		</select>
        &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="minconvusd" type="text" value="<?= $dtcnvru[0]; ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxconvusd" type="text" value="<?= $dtcnvru[1]; ?>" size="10"/> 
         &nbsp;/day&nbsp;&nbsp;&nbsp;
         Fee : <input name="feecnvusd" type="text" value="<?= $dtcnvru[2]; ?>" size="1"/> %
        </div></td>
    </tr>
    <tr>
      <td width="185" align="right">Sell Coins: </td> 
      <td colspan="5"><div align="left">
      
      
       
       
      
       
      
      
        <select name="sellusd" id="sellcoin" style="width:120px;" onMouseover="ddrivetip('penjualan balance USD')"; onMouseout="hideddrivetip()"  >
       <?
			$sellusd = $db->result(0, "sellusd");
			if($sellusd == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		
       <?
	} else  {
	?>
      <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
		<?
	}
	?>
		</select>
         &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="minselusd" type="text" value="<?= $dtsellu[0]; ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxselusd" type="text" value="<?= $dtsellu[1]; ?>" size="10"/> 
        &nbsp;/day&nbsp;&nbsp;&nbsp;&nbsp;
         Fee : <input name="feeselusd" type="text" value="<?= $dtsellu[2]; ?>" size="1"/> %
       
        </div></td>
    </tr>
    
        <tr>
      <td width="185" align="right">Transfer USD: </td> 
     
     
      <td colspan="5"><div align="left">
      
      
      
      
     
      
      
        <select name="transusd" id="transusd" style="width:120px;" onMouseover="ddrivetip('transfer balance USD antar member')"; onMouseout="hideddrivetip()"  >
       <?
			$transusd = $db->result(0, "transusd");
			if($transusd == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		
       <?
	} else  {
	?>
      <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
		<?
	}
	?>
		</select>
       &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="mintrnusd" type="text" value="<?= $dttranu[0]; ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxtrnusd" type="text" value="<?= $dttranu[1]; ?>" size="10"/> 
         &nbsp;/day&nbsp;&nbsp;&nbsp;&nbsp;
        Fee : <input name="feetrnusd" type="text" value="<?= $dttranu[2]; ?>" size="1"/> %
        </div></td>
    </tr>
    
    <tr>
      <td colspan="6" bgcolor=""></td>
    </tr>
    
   
   
   
   
   
   
   
   
     <tr class="tbl_header"> 
      <td colspan="6" align="center" bgcolor="#DDDDE1"><strong>SETTING <?php echo $namecoins;?></strong></td>
    </tr>
    
    <tr>
      <td width="185" align="right">Buy <?php echo $namecoins;?>: </td> 
      <td colspan="5"><div align="left">
       
       
       
       
       
       
        <select name="convertcoin" id="convertcoin" style="width:120px;" onMouseover="ddrivetip('Konversi Coin Balance')"; onMouseout="hideddrivetip()"  >
       <?
			$convertcoin = $db->result(0, "convertcoin");
			if($convertcoin == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		<?
	} else{
	?>
     
	   <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
      
		<?
	}
	?>
		</select>
        &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="minconvcoin" type="text" value="<?= $dtcnvr[0]; ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxconvcoin" type="text" value="<?= $dtcnvr[1]; ?>" size="10"/> 
         &nbsp;/day&nbsp;&nbsp;&nbsp;
         Fee : <input name="feecnvcoin" type="text" value="<?= $dtcnvr[2]; ?>" size="1"/> %
        </div></td>
    </tr>
    <tr>
      <td width="185" align="right">Sell <?php echo $namecoins;?>: </td> 
      <td colspan="5"><div align="left">
      
      
       
       
      
       
      
      
        <select name="sellcoin" id="sellcoin" style="width:120px;" onMouseover="ddrivetip('penjualan balance coins')"; onMouseout="hideddrivetip()"  >
       <?
			$sellcoin = $db->result(0, "sellcoin");
			if($sellcoin == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		
       <?
	} else  {
	?>
      <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
		<?
	}
	?>
		</select>
         &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="minselco" type="text" value="<?= $dtsellc[0]; ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxselco" type="text" value="<?= $dtsellc[1]; ?>" size="10"/> 
        &nbsp;/day&nbsp;&nbsp;&nbsp;&nbsp;
         Fee : <input name="feeselco" type="text" value="<?= $dtsellc[2]; ?>" size="1"/> %
       
        </div></td>
    </tr>
    
        <tr>
      <td width="185" align="right">Transfer <?php echo $namecoins;?>: </td> 
     
     
      <td colspan="5"><div align="left">
      
      
      
      
     
      
      
        <select name="transcoin" id="transcoin" style="width:120px;" onMouseover="ddrivetip('transfer balance coin antar member')"; onMouseout="hideddrivetip()"  >
       <?
			$transcoin = $db->result(0, "transcoin");
			if($transcoin == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		
       <?
	} else  {
	?>
      <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
		<?
	}
	?>
		</select>
       &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="mintrnco" type="text" value="<?= $dttranc[0]; ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxtrnco" type="text" value="<?= $dttranc[1]; ?>" size="10"/> 
         &nbsp;/day&nbsp;&nbsp;&nbsp;&nbsp;
        Fee : <input name="feetrnco" type="text" value="<?= $dttranc[2]; ?>" size="1"/> %
        </div></td>
    </tr>
    
    <tr>
      <td colspan="6" bgcolor=""></td>
    </tr>

	  <tr class="tbl_header"> 
      <td colspan="6" align="center" bgcolor="#DDDDE1"><strong>SETTING WALLET</strong></td>
    </tr>
    
    <tr>
      <td width="185" align="right">Buy balance : </td> 
      <td colspan="5"><div align="left">
        <select name="buybalance" id="buybalance" style="width:120px;" onMouseover="ddrivetip('pembelian balance ewallet')"; onMouseout="hideddrivetip()"  >
       <?
			$buybalance = $db->result(0, "buybalance");
			if($buybalance == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		<?
	} else{
	?>
     
	   <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
      
		<?
	}
	?>
		</select>
        &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="minbuy" type="text" value="<?= $db->result(0, "minbuy"); ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxbuy" type="text" value="<?= $db->result(0, "maxbuy"); ?>" size="10"/> 
        </div></td>
    </tr>
    <tr>
      <td width="185" align="right">Withdrawal: </td> 
      <td colspan="5"><div align="left">
        <select name="sellbalance" id="sellbalance" style="width:120px;" onMouseover="ddrivetip('penjualan balance ewallet (withdrawal)')"; onMouseout="hideddrivetip()"  >
       <?
			$sellbalance = $db->result(0, "sellbalance");
			if($sellbalance == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		
       <?
	} else  {
	?>
      <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
		<?
	}
	?>
		</select>
         &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="minsell" type="text" value="<?= $db->result(0, "minsell"); ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxsell" type="text" value="<?= $db->result(0, "maxsell"); ?>" size="10"/> 
        &nbsp;/day&nbsp;&nbsp;&nbsp;&nbsp;
         Fee : <input name="feesell" type="text" value="<?= $db->result(0, "feesell"); ?>" size="1"/> %
       
        </div></td>
    </tr>
    
        <tr>
      <td width="185" align="right">Transfer balance: </td> 
      <td colspan="5"><div align="left">
        <select name="transbalance" id="transbalance" style="width:120px;" onMouseover="ddrivetip('transfer balance ewallet antar member')"; onMouseout="hideddrivetip()"  >
       <?
			$transbalance = $db->result(0, "transbalance");
			if($transbalance == 1) {
			?>
	   <option  value='0' >No</option>
       <option  value='1' selected="selected">Yes</option>
		
       <?
	} else  {
	?>
      <option  value='0' selected="selected">No</option>
       <option  value='1' >Yes</option>
		<?
	}
	?>
		</select>
       &nbsp;&nbsp;&nbsp;&nbsp;
        Minimal : <input name="mintrans" type="text" value="<?= $db->result(0, "mintrans"); ?>" size="10"/> 
        &nbsp;&nbsp;&nbsp;&nbsp;
        Maximum : <input name="maxtrans" type="text" value="<?= $db->result(0, "maxtrans"); ?>" size="10"/> 
         &nbsp;/day&nbsp;&nbsp;&nbsp;&nbsp;
        Fee : <input name="feetrans" type="text" value="<?= $db->result(0, "feetrans"); ?>" size="1"/> %
        </div></td>
    </tr>
    
    <tr>
      <td colspan="6" bgcolor=""></td>
    </tr>
	 <tr> 
      <td colspan="6" bgcolor="#DDDDE1">&nbsp;</td>
    </tr>
	<tr> 
      <td colspan="6" >&nbsp;</td>
    </tr>
   <tr> 
      <td colspan="6" bgcolor=""> 
	  <input name="kdlm_paket" type="hidden" value="<?= $kds; ?>" size="10" /> 
	   <input name="no" type="hidden" id="no" value="1" size="10" />
	  <input type="submit"  name="submit" value="SAVE" class="button">
        
        <input type="submit" name="cancel" id="cancel" value="CANCEL" onClick="javascript:history.go(-1)" class="button">       </td>
    </tr>
    <tr> 
      <td colspan="6" >&nbsp;</td>
    </tr>
  </table>
 
</form>
<p>&nbsp;</p>

<?php } ?>

<?	 
} else if (isset($_GET['page']) && $_GET['page'] == "delete") {
if(isset($_GET["id"])){ $id = $_GET["id"]; }
		$db->update("configuration", "usrd=''", "id='$id'");
		
		header("location: ?go=configuration&sess=web&result=success_dell");
		
} else if (isset($_GET['page']) && $_GET['page'] == "set_assistance") {
if(isset($_GET["id"])){ $id = $_GET["id"]; }
		$db->update("configuration", "pilpkt='2'", "id='$id'");
		
		header("location: ?go=configuration&sess=system");		
		
} else if (isset($_GET['page']) && $_GET['page'] == "paket") {
if(isset($_GET["id"])){ $id = $_GET["id"]; }
if(isset($_GET["do"])){ $do = $_GET["do"]; }
		$db->update("configuration", "depo ='$do'", "id='$id'");
		
		header("location: ?go=configuration&sess=system&result=success_dell");		

?>	

  </div></div>
<?php
}
?>	