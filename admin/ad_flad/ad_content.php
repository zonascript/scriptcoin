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
<?php
	/* 
	############################[  <about> ] #######################
		S Name   ::       Inv-X Primadesain
		Update   ::       2013 © Primadesain.Com
		Author   ::       Agus Susanto S.kom
		Website  ::		  http://primadesain.com
		Contact  ::		  <primapc57@gmail.com> // +62 85228657360
	
	Primadesain melayani pembuatan website MLM dan Investasi
	( dengan sistem binary, trinary atau matrix dan matahari )
	juga menerima pembuatan website Iklan Baris, Website Profile,
	Reseller, Hyip, dll.
	############################[ </about> ] #######################
	*/
?>
<script type="text/javascript">
<!--
function confirmation(noid) {
	var answer = confirm("Are You sure to delete this Article?")
	if (answer){
		//alert("Bye bye!")
		window.location = "?go=content&page=delete&no=" + noid;
		
	}
	
}
//-->
</script>
<h2><img src="images/icon-48-article.png" width="48" height="48" align="absmiddle"> Article Manager</h2>
<div id="menu_button2">
  <ul>
   <li><a href="?go=content&page=addnew&edit=0"><img src="images/add.png" width="12" align="absbottom" />&nbsp;&nbsp;<strong>Tambah Artikel</strong></a></li>
  </ul>
</div>
<?php
if (isset($_GET['page']) && $_GET['page'] == "addnew") {
if(isset($_GET["edit"])){ $edit = $_GET["edit"]; }
if(isset($_GET["no"])){ $no = $_GET["no"]; }
		if($edit > 0) {
			$db->select("id, title, maintext, created_by_alias, published, created, catid, introtext", "content", "id='$no'");
			$title = $db->result(0, "title"); 
			$author = $db->result(0, "created_by_alias"); 
			$crdate = $db->result(0, "created"); 
			$publish = $db->result(0, "published"); 
			$catid = $db->result(0, "catid"); 
			$introtext = $db->result(0, "introtext"); 
			$maintext = $db->result(0, "maintext"); 
			$judul = "Edit an Article";
			$edit = "1";
		} else {
			$author = $valid_admin; 
			$crdate = $clientdate; 
			if(empty($title)){ $title = ""; }
			if(empty($maintext)){ $maintext = ""; }
			if(empty($introtext)){ $introtext = ""; }
			$edit = "0";
			$judul = "Create New Article";
		}		
?>

<form action="?go=content&page=submit" method="post" name="konten">
  <table width="98%" border="0" align="center" cellpadding="5" cellspacing="0">
    
	<tr>
      <td colspan="4"><div style="width:640px; margin-left:100px"><?php
$results = $_GET['result'];
if($results == "success") { 
echo "<div class='alert-box successs' width='70%'><span>sukses : </span>Data telah berhasil diupdate !</div>";
}
?></div></td>
    </tr>
    <tr>
      <td width="10%" align="right">Title :</td>
      <td><label>
        <input name="title" type="text" id="title" value="<?php echo $title; ?>" size="50">
      </label></td>
      <td align="right">Created Date :</td>
      <td><input name="crdate" type="text" id="crdate" value="<?php echo $crdate; ?>" size="20"></td>
    </tr>
    <tr>
      <td width="10%" align="right">Intro :</td>
      <td  colspan="3"><label>
        <textarea name="introtext" cols="50" id="introtext"><?php echo $introtext; ?></textarea>
      </label></td>
     
    </tr>
    <tr>
      <td align="right">Category :</td>
      <td width="52%"><select name="cat" id="cat">
        <option value="0">- Select Category -</option>
        <?php
	 	$db->select("id, title", "categories", "section='content'");
		$j=$db->num_rows();
for($i=0;$i<$j;$i++) {	
		if($catid == $db->result($i, "id")) {
			$sel = " selected='selected'";
		} else {
			$sel = "";
		}	
		echo "<option value='".$db->result($i, "id")."' $sel>".$db->result($i, "title")."</option>";
	}	
	 
	 ?>
            </select></td>
      <td width="16%" align="right">Author :</td>
      <td width="22%"><input name="author" type="text" id="author" value="<?php echo $author; ?>" size="20" /></td>
    </tr>
    <tr>
      <td align="right">Published :</td>
      <td colspan="3"><p>
        <label>
          <input name="publish" type="radio" id="publish_0" value="1" checked>
          Yes</label> 
        <label>
          <input type="radio" name="publish" value="0" id="publish_1">
          No</label>
        <input name="no" type="hidden" id="no" value="<?php echo $no; ?>" size="20">
        <input name="edit" type="hidden" id="edit" value="<?php echo $edit; ?>" size="20">
        <br>
      </p></td>
    </tr>
    <tr>
      <td align="right" valign="top">Main Text :</td>
      <td colspan="3">
     <textarea class="ckeditor" name="maintext" id="maintext"><?php echo $maintext; ?></textarea>     </td>
    </tr>
    <tr>
      <td align="right">&nbsp;</td>
      <td colspan="3"><label>
        <input type="submit"  value="SAVE" class="submit">
        
      </label><label><input type="button" name="cancel" id="cancel" value="CANCEL" onClick="javascript:history.go(-1)" class="submit">
      </label></td>
    </tr><tr>
      <td>&nbsp;</td>
      <td></td>
    </tr>
  </table>
</form>
  <script language="JavaScript" type="text/javascript">
 var frmvalidator = new Validator("konten");
 frmvalidator.addValidation("title","req","Title artikel harus diisi, silahkan ulangi lagi!");
 
  frmvalidator.addValidation("cat","dontselect=0","Pilih katagori artikel!");


</script>  
<?php	
}
else if (isset($_GET['page']) && $_GET['page'] == "submit") {
        $postedValue =  stripslashes( $_POST['maintext'] ) ;
		$variable = mysql_real_escape_string($postedValue);
		
		$title = $_POST['title'];
		$crdate = $_POST['crdate'];
		$cat = $_POST['cat'];
		$author = $_POST['author'];
		$introtext = $_POST['introtext'];
		$publish = $_POST['publish'];
		$no = $_POST['no'];
		$edit = $_POST['edit'];
		
		if($edit > 0) {
			
			$db->update("content", "title='$title', created='$crdate', catid='$cat', created_by_alias='$author', maintext='$variable', published='$publish', introtext='$introtext'", "id='$no'");
			header("location: ?go=content&page=addnew&edit=1&no=$no&result=success");
	            exit;
			
	} else {
			$db->insert("content", "title, maintext, catid, created, published, created_by_alias, introtext", "'$title', '$variable', $cat, '$crdate', $publish, '$author', '$introtext'");
	}		
			header("location: ?go=content&result=saved");
	            exit;
?>
<?php
}
else if (isset($_GET['page']) && $_GET['page'] == "publish") {
if(isset($_GET["no"])){ $no = $_GET["no"]; }
if(isset($_GET["pub"])){ $pub = $_GET["pub"]; }
		$db->update("content", "published='$pub'", "id='$no'");
		header("location: ?go=content");
	            exit;
?>
<?php
}
else if (isset($_GET['page']) && $_GET['page'] == "delete") {
if(isset($_GET["no"])){ $no = $_GET["no"]; }
		$db->delete("content", "id=$no");
		header("location: ?go=content&result=dell");
	            exit;?>
<?php
}
else if (isset($_GET['page']) && $_GET['page'] == "frontpage") {
if(isset($_GET["no"])){ $no = $_GET["no"]; }
if(isset($_GET["pub"])){ $pub = $_GET["pub"]; }
		$db->update("content", "frontpage='$pub'", "id='$no'");
		header("location: ?go=content");
	            exit;
?>
<?php
} else {
?>
<?php
$results = $_GET['result'];
if($results == "saved") { 
echo "<div class='alert-box successs'><span>sukses: </span>Artikel Berhasil Disimpan!</div>";
}
?>
<?php
$results = $_GET['result'];
if($results == "dell") { 
echo "<div class='alert-box successs'><span>sukses: </span>Artikel Berhasil Dihapus!</div>";
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr class="tbl_header">
    <td width="3%" align="center">#</td>
    <td width="3%" align="center">ID</td>
    <td width="41%" align="center">Title</td>
    <td width="9%" align="center">Published</td>
    <td width="10%" align="center">Frontpage</td>
    <td width="9%" align="center">Author</td>
    <td width="6%" align="center">Date</td>
    <td width="9%" align="center">Category</td>
    <td width="7%" align="center">Hapus</td>
  </tr>
<?php
$db->select("id, title, created_by_alias, published, created, catid, frontpage", "content", "", "created DESC");

$j=$db->num_rows();
for($i=0;$i<$j;$i++) {
	$nom = $i + 1;
	$lid = $i - 1;
	if(is_odd($i) == 0) {
		$class = "tblrow_ganjil";
	} else {
		$class = "tblrow_genap";
	} 	
	if($db->result($i, "published") > 0) {
		$img = "<a href='?go=content&page=publish&pub=0&no=".$db->result($i, "id")."'><img src='images/tick.png' border=0 title='Click to Unpublish'></a>";
	} else {
		$img = "<a href='?go=content&page=publish&pub=1&no=".$db->result($i, "id")."'><img src='images/publish_x.png' border=0 title='Click to Publish'></a>";
	} 	
	//---frontpage
	if($db->result($i, "frontpage") > 0) {
		$frontpage = "<a href='?go=content&page=frontpage&pub=0&no=".$db->result($i, "id")."'><img src='images/tick.png' border=0 title='Click to Unpublish'></a>";
	} else {
		$frontpage = "<a href='?go=content&page=frontpage&pub=1&no=".$db->result($i, "id")."'><img src='images/publish_x.png' border=0 title='Click to Publish'></a>";
	} 
?>
 
  <tr class="<?php echo $class; ?>">
    <td width="3%"><?php echo $nom; ?> </td>
    <td width="3%"><?php echo $db->result($i, "id"); ?></td>
    <td><a href="?go=content&page=addnew&edit=1&no=<?php echo $db->result($i, "id"); ?>"><?php echo $db->result($i, "title"); ?></a></td>
    <td align="center"><?php echo $img; ?></td>
    <td align="center"><?php echo $frontpage; ?></td>
    <td><?php echo $db->result($i, "created_by_alias"); ?></td>
    <td><?php echo $db->result($i, "created"); ?></td>
    <td><?php echo category_name($db->result($i, "catid")); ?></td>
    <td align="center"><a href="#" onClick='confirmation(<?php echo $db->result($i, "id"); ?>)' style='cursor:hand'><img src='images/icon-32-delete_resize.png' border=0 title='Click to Hapus'></a></td>
  </tr>
<?php
}
?>	  
</table>
<p>&nbsp;</p>
<?php
}
?>