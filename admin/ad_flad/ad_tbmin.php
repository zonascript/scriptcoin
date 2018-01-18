<?php
if(basename($_SERVER['SCRIPT_FILENAME'])==basename(__FILE__)){echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";echo "<meta http-equiv=\"refresh\" content=\"2; url=../index.php\">";exit();};echo '';if(empty($_SESSION["valid_admin"])){echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";echo "<meta http-equiv=\"refresh\" content=\"2; url=../../index.php\">";exit();};echo '';;echo '<h2><img src="images/icon-48-user.png" width="48" height="48" align="absmiddle" /> Admin Manager</h2>
 ';$sqlxx="SELECT * from admin WHERE userid='$valid_admin'";$dtxx=mysql_query($sqlxx);$rowx=mysql_fetch_row($dtxx);if($rowx[13]>1){;echo '';if(isset($_GET['page'])&&$_GET['page']=="delete"){if(isset($_GET["userid"])){$userid=anti_injection($_GET["userid"]);}$db->delete("admin","userid='".mysql_real_escape_string($userid)."'");echo "<br><br><center><div id='notice'><img src='images/notice-info.png' width='29' height='29' align='absmiddle' />Admin berhasil dihapus. ! </div></center><br><br>";echo "<center><a href='javascript:history.go(-1)'><button class='submitkecil'>BACK</button></a></center><br><br>";;echo '
';}else if(isset($_GET['page'])&&$_GET['page']=="edit"){$nama=anti_injection($_POST['nama']);$alamat=anti_injection($_POST['alamat']);$kota=anti_injection($_POST['kota']);$phone=anti_injection($_POST['phone']);$email=anti_injection($_POST['email']);$level_admin=$_POST['level_admin'];$userid=anti_injection($_POST['userid']);$passwd=$_POST['passwd'];$password_adm=md5($passwd);if(!empty($passwd)){$db->update("admin","userid='".mysql_real_escape_string($userid)."', pass='$password_adm', nama='".mysql_real_escape_string($nama)."', status='1', alamat='".mysql_real_escape_string($alamat)."', kota='".mysql_real_escape_string($kota)."', telp='".mysql_real_escape_string($phone)."', email='".mysql_real_escape_string($email)."'","userid='".mysql_real_escape_string($userid)."'");echo "<br><br><center><div id='notice'><img src='images/notice-info.png' width='29' height='29' align='absmiddle' />Data Admin telah berhasil diupdate ! </div></center><br><br>";echo "<center><a href='javascript:history.go(-1)'><button class='submitkecil'>BACK</button></a></center><br><br>";}else {$db->update("admin","userid='".mysql_real_escape_string($userid)."', nama='".mysql_real_escape_string($nama)."', status='1', alamat='".mysql_real_escape_string($alamat)."', kota='".mysql_real_escape_string($kota)."', telp='".mysql_real_escape_string($phone)."', email='".mysql_real_escape_string($email)."'","userid='".mysql_real_escape_string($userid)."'");echo "<br><br><center><div id='notice'><img src='images/notice-info.png' width='29' height='29' align='absmiddle' />Data Admin telah berhasil diupdate ! </div></center><br><br>";echo "<center><a href='javascript:history.go(-1)'><button class='submitkecil'>BACK</button></a></center><br><br>";};echo '';}else if(isset($_GET['page'])&&$_GET['page']=="addnew"){$nama=anti_injection($_POST['nama']);$alamat=anti_injection($_POST['alamat']);$kota=anti_injection($_POST['kota']);$phone=anti_injection($_POST['phone']);$email=anti_injection($_POST['email']);$level_admin=$_POST['level_admin'];$userid=anti_injection($_POST['userid']);$passwd=$_POST['passwd'];$password_adm=md5($passwd);$db->insert("admin","","'', '".mysql_real_escape_string($userid)."', '$password_adm', '".mysql_real_escape_string($email)."', '1', '".mysql_real_escape_string($nama)."', '".mysql_real_escape_string($alamat)."', '".mysql_real_escape_string($kota)."', '".mysql_real_escape_string($phone)."', '', '', '', '', '$level_admin'");echo "<br><br><center><div id='notice'><img src='images/notice-info.png' width='29' height='29' align='absmiddle' />Admin baru telah ditambahkan ! </div></center><br><br>";echo "<center><a href='javascript:history.go(-1)'><button class='submitkecil'>BACK</button></a></center><br><br>";;echo '';}else {;echo '';if(isset($_GET["userid"])){$userid=anti_injection($_GET["userid"]);}if(isset($_GET["edit"])){$edit=$_GET["edit"];}if(!empty($edit)){$page="edit";$buttone="Edit Data Admin";}else{$page="addnew";$buttone="Tambah Admin";}$fsql="SELECT * from admin where userid='$userid'";$hasilcek=mysql_query($fsql);$row=mysql_fetch_row($hasilcek);;echo '<br />
<form method="post" name="tbmin" action="?go=tambah_admin&page=';echo "$page";;echo '">
		<table width="90%" class="kotak" border="0" align="center">
			<tr>
              <td>Nama Lengkap </td>
              <td>:</td>
              <td><input name="nama" type="text" class="form" id="nama" value="';echo $row[5];;echo '" size="30"></td>
		  </tr>
			<tr>
			  <td valign="top">Alamat</td>
			  <td valign="top">:</td>
			  <td><textarea name="alamat" cols="25" rows="3" class="form" id="alamat">';echo $row[6];;echo '</textarea></td>
		    </tr>
			<tr>
              <td valign="top">Kota</td>
              <td valign="top">:</td>
              <td><input name="kota" type="text" class="form" id="kota" value="';echo $row[7];;echo '" size="30"></td>
		  </tr>
			<tr>
			  <td valign="top">Telepon/HP</td>
			  <td valign="top">:</td>
			  <td><input name="phone" type="text" class="form" id="phone" value="';echo $row[8];;echo '" size="30">
		      </td>
		    </tr>
			<tr>
			  <td valign="top">Email</td>
			  <td valign="top">:</td>
			  <td><input name="email" type="text" class="form" id="email" value="';echo $row[3];;echo '" size="30"></td>
		  </tr>
			<tr>
			  <td valign="top">Level Admin </td>
			  <td valign="top">:</td>
			  <td><label>
			  <select name="level_admin" class="form" id="level_admin">
			  
			    
                ';if($row[13]>1){echo "<option value=1>Basic Administrator</option>";echo "<option value=2 selected>Full Administrator</option>";}else {echo "<option value=1 selected>Basic Administrator</option>";echo "<option value=2>Full Administrator</option>";};echo '              </select>
			  </label></td>
		  </tr>
			<tr>
			  <td valign="top">Username Admin </td>
			  <td valign="top">:</td>
			  <td><input name="userid" type="text" class="form" id="userid" value="';echo $row[1];;echo '" size="30"></td>
		  </tr>
			<tr>
			  <td valign="top">Password</td>
			  <td valign="top">:</td>
			  <td><input name="passwd" type="password" class="form" id="passwd" value="" size="30"></td>
		  </tr>
			<tr valign="top">
			  <td colspan="3"><div align="center">
			 
		      </div></td>
		  </tr>
		  	<tr>
			  <td valign="top"></td>
			  <td valign="top"></td>
			  <td> <input name="edit" type="hidden" class="form" id="edit" value="1">
			    <input name="submit" type="submit" class="submit" value="';echo "$buttone";;echo '"></td>
		  </tr>
		</table><br /><br />
		<hr width="98%">
</form>
 ';if(isset($_GET["edit"])==1){;echo ' <script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("tbmin");
  
 frmvalidator.addValidation("nama","req","Nama harus diisi");
    frmvalidator.addValidation("nama","maxlen=50",	"Maksimal Nama hanya 50 karakter");
	
	frmvalidator.addValidation("email","maxlen=70","Alamat email Maksimal 70 karakter");
    frmvalidator.addValidation("email","req","Alamat email harus diisi");
    frmvalidator.addValidation("email","email");
   
    frmvalidator.addValidation("userid","req","User ID harus diisi");
    frmvalidator.addValidation("userid","maxlen=30","Maksimal User ID hanya 30 karakter");
	
//]]></script>
';}else {;echo '<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("tbmin");
  
 frmvalidator.addValidation("nama","req","Nama harus diisi");
    frmvalidator.addValidation("nama","maxlen=50",	"Maksimal Nama hanya 50 karakter");
	
	frmvalidator.addValidation("email","maxlen=70","Alamat email Maksimal 70 karakter");
    frmvalidator.addValidation("email","req","Alamat email harus diisi");
    frmvalidator.addValidation("email","email");
   
    frmvalidator.addValidation("userid","req","User ID harus diisi");
    frmvalidator.addValidation("userid","maxlen=30","Maksimal User ID hanya 30 karakter");
	
	frmvalidator.addValidation("passwd","req","Password harus diisi");
    frmvalidator.addValidation("passwd","maxlen=30","Maksimal Password hanya 30 karakter");
	
//]]></script>
';};echo '<p>
   ';$fsql="SELECT * from admin";$hasilcek=mysql_query($fsql);$no=1;echo "<table width=90% border=0 align=center class=kotak cellpadding='10'>";while($faq=mysql_fetch_row($hasilcek)){echo "<tr><td width=75% bgcolor=#DDDDDD style='padding:10px'>$no. <b>$faq[1]</b> - $faq[5]</td><td width=25% bgcolor=#DDDDDD>&nbsp; <a href='?go=tambah_admin&userid=$faq[1]&edit=1'><button class='submitkecil' >Edit Admin</button></a> &nbsp;&nbsp; <a href='?go=tambah_admin&userid=$faq[1]&page=delete'><button class='submitkecil'>Hapus Admin</button></a></td></tr>";$no++;}echo "</table>";;echo '</p><br />
<p align="center" class="style1">PERHATIAN!! Hapus Admin tanpa konfirmasi, apabila klik Hapus, maka admin tersebut langsung terhapus dari sistem.  </p>
';};echo '';}else {echo "<br><br><center><img src='../images/block_user_pic.png' width='75' height='75' border='0' /><br><br><font style='font-size:13pt;font-family:Verdana;color:#FF0000;line-height:160%'><b>Mohon Maaf,</b></font><br><font style='font-size:10pt;font-family:Verdana;line-height:160%'>Halaman ini khusus untuk Admin Full Administrator,<br>Anda tidak di ijinkan mengakses halaman ini!<br><br></center>";}?>