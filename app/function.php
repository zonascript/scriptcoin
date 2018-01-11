<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=./index.php\">";
exit();} 
?>

<?php


	date_default_timezone_set("Asia/Jakarta");
    $clientdate    = (date ("Y-m-d H:i:s"));
    $clientdateymd    = (date ("Y-m-d"));
	$clienttime    = (date ("H:i:s"));

	
	
//----jml Omzet kiri-----------
//----jml member kiri-----------
function omsetkiri($mid, $dtgl) {
$kiom="";

$slv="select * from upline order by level desc";
$rlv=mysql_query($slv);
$slev=mysql_fetch_array($rlv);
if($slev["level"] <= 100) {
$jmlev=$slev["level"];
} else {
$jmlev = 100;
}
//------------------- kiri -----------------
if($dtgl == "") {
$sqlki="select username from upline where upline0='$mid' and posisi='L1'";
} else {
$sqlki="select username from upline where upline0='$mid' and posisi='L1' $dtgl";
}
$rki=mysql_query($sqlki);
$kir=mysql_fetch_row($rki);
$adaki=mysql_num_rows($rki);
$user=$kir[0];
$query01b = "SELECT SUM(jml) FROM deposit WHERE username='$user'"; 
$result01b = mysql_query($query01b);
while($row4b=mysql_fetch_row($result01b)) {
		$total4b = $row4b[0];
		}		
//echo $user.'<br><br>';

if ($user){
	
for($i=0;$i<$jmlev;$i++){	
$query0 = "SELECT * FROM upline WHERE upline$i='$user'"; 
$result0 = mysql_query($query0);
while($row0 = mysql_fetch_array($result0)){
	//echo $row0['username'];
	//echo "<br />";
$rwuser=$row0['username'];
if($rwuser){
$query01 = "SELECT SUM(jml) FROM deposit WHERE username='$rwuser'"; 
$result01 = mysql_query($query01);
while($row4=mysql_fetch_row($result01)) {
		$total4 = $total4+$row4[0];
		}		
}
}	
}
}	
	//echo rupiah($total4+$total4b);
	//echo "<br />";	
                         
$kiom=$total4+$total4b;
return $kiom;

}

//----jml Omzet kanan-----------

function omsetkanan($mid, $dtgl) {
$kaom="";

$slv="select * from upline order by level desc";
$rlv=mysql_query($slv);
$slev=mysql_fetch_array($rlv);
if($slev["level"] <= 100) {
$jmlev=$slev["level"];
} else {
$jmlev = 100;
}
//------------------- kiri -----------------
if($dtgl == "") {
$sqlki="select username from upline where upline0='$mid' and posisi='L2'";
} else {
$sqlki="select username from upline where upline0='$mid' and posisi='L2' $dtgl";
}
$rki=mysql_query($sqlki);
$kir=mysql_fetch_row($rki);
$adaki=mysql_num_rows($rki);
$user=$kir[0];
$query01b = "SELECT SUM(jml) FROM deposit WHERE username='$user'"; 
$result01b = mysql_query($query01b);
while($row4b=mysql_fetch_row($result01b)) {
		$total4b = $row4b[0];
		}		
//echo $user.'<br><br>';

if ($user){
	
for($i=0;$i<$jmlev;$i++){	
$query0 = "SELECT * FROM upline WHERE upline$i='$user'"; 
$result0 = mysql_query($query0);
while($row0 = mysql_fetch_array($result0)){
	//echo $row0['username'];
	//echo "<br />";
$rwuser=$row0['username'];
if($rwuser){
$query01 = "SELECT SUM(jml) FROM deposit WHERE username='$rwuser'"; 
$result01 = mysql_query($query01);
while($row4=mysql_fetch_row($result01)) {
		$total4 = $total4+$row4[0];
		}		
}
}	
}
}	
	//echo rupiah($total4+$total4b);
	//echo "<br />";	
                         
$kaom=$total4+$total4b;
return $kaom;

}


//---- fungsi member LI----
	
//----jml member kiri-----------
function memberL1($username, $dtgl) {
$ki="";
//-----------cari level tertinggi-------------
$slv="select * from upline order by level desc";
$rlv=mysql_query($slv);
$slev=mysql_fetch_array($rlv);
if($slev["level"] <= 100) {
$jmlev=$slev["level"];
} else {
$jmlev = 100;
}
//------------------- kiri -----------------
if($dtgl == "") {
$sqlki="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='L1'";
} else {
$sqlki="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='L1' $dtgl";
}
$rki=mysql_query($sqlki);
$kir=mysql_fetch_row($rki);
$adaki=mysql_num_rows($rki);
$user=$kir[0];
$upliki=$kir["upline0"];
if ($user)
{
for($i=0;$i<$jmlev;$i++)
{
if($dtgl == "") {
$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$user'";
} else {
$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$user' $dtgl";
}
$res=mysql_query($sql2);
$jml=array();
$jml[$i]=mysql_num_rows($res);
$tot=$tot+$jml[$i];
$lv=2 + $i;
$tal=0;
$tal=$tal+$tot;
}
//if($dtgl == "") {
$totki=$tot+1;
//} else {
//	$totki = $tot;
//}
} else {
$totki=0;
}
//echo $totki;
$ki=$totki;
return $ki;
}
//----jml member kiri-----------
//----jml member kiri-----------
function memberL2($username, $dtgl) {
$kanane="";
//-----------cari level tertinggi-------------
$slv="select * from upline order by level desc";
$rlv=mysql_query($slv);
$slev=mysql_fetch_array($rlv);
if($slev["level"] <= 100) {
$jmlev=$slev["level"];
} else {
$jmlev = 100;
}
//------------------- kiri -----------------
if($dtgl == "") {
$sqlka="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='L2'";
} else {
$sqlka="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='L2' $dtgl";
}
$rka=mysql_query($sqlka);
$kan=mysql_fetch_row($rka);
$adaka=mysql_num_rows($rka);
$userka=$kan[0];
$uplika=$kan["upline0"];
if ($userka)
{
for($i=0;$i<$jmlev;$i++)
{
if($dtgl == "") {
$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$userka'";
} else {
$sql2="select a.username, b.tglaktif from upline as a inner join member as b on a.username=b.username where a.upline$i='$userka' $dtgl";
}
$res=mysql_query($sql2);
$jml=array();
$jml[$i]=mysql_num_rows($res);
$tot=$tot+$jml[$i];
$lv=2 + $i;
$tal=0;
$tal=$tal+$tot;
}
//if($dtgl == "") {
$totka=$tot+1;
//} else {
//	$totki = $tot;
//}
} else {
$totka=0;
}
//echo $totki;
$kanane=$totka;
return $kanane;
}
//--kanan-------------
function is_odd ($n) {
return ($n & 1);
}		
//--
function category_name($id) {
$sql = mysql_query("select title from categories where id='$id'") or die;
$kat = mysql_fetch_row($sql);
$cat = $kat[0];
return $cat;
}	
function menu_show($pos, $catid, $m) {
$sql = mysql_query("select id, name, link from menu where published=1 order by ordering") or die;
echo "<div id=$pos><ul id=saturday>";
while($row = mysql_fetch_row($sql)) {
if($row[2] == "?m=home" or $row[2] == "") {
$link = "./";
} else {
$link = $row[2];
}
//---url---
$ul0 = array();
$ul = explode("=", $row[2]);
$ul0[2] = $ul[2];//----m=content
$ul0[1] = $ul[1];
$ur = explode("&", $ul0[1]);
$ur0 = $ur[0];
if($catid == $ul0[2] && $m == $ur0 or $m == "" && $ur0 == "home") {
$class = "class=current";
} else {
$class = "";
}			
echo "<li><a href='$link' $class>$row[1]</a></li>";
}
echo "</ul></div>";
}			


function makeRandomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


//------------upline spillover-----------
function spillover($field, $username) {
$sql="SELECT L1, L2 FROM upline WHERE username='$username'";
$mq=mysql_query($sql);
$cek=mysql_num_rows($mq);
$ada=mysql_fetch_row($mq);
if($ada[0] == "" or $ada[1] == "") {
if($ada[0] == "") {
$posisi = "L1";
} elseif($ada[0] <> "" and $ada[1] == ""){
$posisi = "L2";

}
//echo "upline = $username<br>Posisi : $posisi<br>";
		//echo "kiri : $ada[0]<br>kanan : $ada[1]<br>";
		if($field == "random") {
			$nm="";
			$nm=$username;
			return $nm;
		}
		if($field == "pos") {
			$ps="";
	 		$ps=$posisi;
			return $ps;
		}
	} else {
		$upli=array();
		$pos=array();
		for($i=0;$i<20;$i++) {
		$sql="SELECT username, L1, L2 FROM upline WHERE upline$i='$username'";
		$mq=mysql_query($sql);
		$cek=mysql_num_rows($mq);
		while($ada=mysql_fetch_row($mq)) {
			if($ada[1] == "" or $ada[2] == "") {
			//if($ada[1] == "" or $ada[2] == "") {
				if($ada[1] == "") {
				$posisi = "L1";
				} elseif($ada[1] <> "" and $ada[2] == ""){
				$posisi = "L2";
				}
	//echo "upline$i = $ada[0]<br>Posisi : $posisi<br>";
	//echo "kiri : $ada[1]<br>kanan : $ada[2]<br>";
			$upli[]=$ada[0];	
			$pos[]=$posisi;
		}
	}
	//echo "upline$i = $ada[0]<br>Posisi : $posisi<br>";

	}
	if($field == "random") {
		$nm="";
		$nm=$upli[0];
		return $nm;
	}
	if($field == "pos") {
		$ps="";
	 	$ps=$pos[0];
		return $ps;
	}
	}
}




//---------tgl expire----------

function formatglindex($tgaktif) {
	$tg = "";
	//$tgaktif = date("Y-m-d"); 
	$hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$bulane = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");	$expire = date("w, d m Y",strtotime($tgaktif)); 
	$time = date("H:i:s",strtotime($tgaktif));
//$showexp = date("w n d Y",time() + (7776000/3)); 
	$day = substr($expire, 0, 1);
	$tgle = substr($expire, 3,2);
	$blne = substr($expire, 6,2);
	$thne = substr($expire, 9,4);
	if($blne < 10 ) {
		$blne0 = substr($blne, 1,1) - 1;
	} else {
		$blne0 = $blne - 1;
	}
	$tg =  "$bulane[$blne0], $tgle, $thne, $time";
	return $tg;
}



function formatgl($tgaktif) {
	$tg = "";
	//$tgaktif = date("Y-m-d"); 
	$hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$bulane = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");	$expire = date("w, d m Y",strtotime($tgaktif)); 
	$time = date("H:i:s",strtotime($tgaktif));
//$showexp = date("w n d Y",time() + (7776000/3)); 
	$day = substr($expire, 0, 1);
	$tgle = substr($expire, 3,2);
	$blne = substr($expire, 6,2);
	$thne = substr($expire, 9,4);
	if($blne < 10 ) {
		$blne0 = substr($blne, 1,1) - 1;
	} else {
		$blne0 = $blne - 1;
	}
	$tg =  "$tgle-$bulane[$blne0]-$thne, $time";
	return $tg;
}

function formatglu($tgaktif) {
	$tg = "";
	//$tgaktif = date("Y-m-d"); 
	$hari=array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
	$bulane = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");
	$expire = date("w, d m Y",strtotime($tgaktif)); 
	$time = date("H:i:s",strtotime($tgaktif));
//$showexp = date("w n d Y",time() + (7776000/3)); 
	$day = substr($expire, 0, 1);
	$tgle = substr($expire, 3,2);
	$blne = substr($expire, 6,2);
	$thne = substr($expire, 9,4);
	if($blne < 10 ) {
		$blne0 = substr($blne, 1,1) - 1;
	} else {
		$blne0 = $blne - 1;
	}
	$tg =  "$bulane[$blne0] $tgle, $thne";
	return $tg;
}

function formatglx($tgaktif) {
	$tg = "";
	//$tgaktif = date("Y-m-d"); 
	$hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$bulane = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");	$expire = date("w, d m Y",strtotime($tgaktif)); 
	$time = date("H:i:s",strtotime($tgaktif));
//$showexp = date("w n d Y",time() + (7776000/3)); 
	$day = substr($expire, 0, 1);
	$tgle = substr($expire, 3,2);
	$blne = substr($expire, 6,2);
	$thne = substr($expire, 9,4);
	if($blne < 10 ) {
		$blne0 = substr($blne, 1,1) - 1;
	} else {
		$blne0 = $blne - 1;
	}
	$tg =  "$hari[$day], $tgle-$bulane[$blne0]-$thne, $time";
	return $tg;
}

function formatglxy($tgaktif) {
	$tg = "";
	//$tgaktif = date("Y-m-d"); 
	$hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$bulane = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");	$expire = date("w, d m Y",strtotime($tgaktif)); 
	$time = date("H:i:s",strtotime($tgaktif));
//$showexp = date("w n d Y",time() + (7776000/3)); 
	$day = substr($expire, 0, 1);
	$tgle = substr($expire, 3,2);
	$blne = substr($expire, 6,2);
	$thne = substr($expire, 9,4);
	if($blne < 10 ) {
		$blne0 = substr($blne, 1,1) - 1;
	} else {
		$blne0 = $blne - 1;
	}
	$tg =  "$hari[$day], $tgle-$bulane[$blne0]-$thne";
	return $tg;
}

function formatglxxy($tgaktif) {
	$tg = "";
	//$tgaktif = date("Y-m-d"); 
	$hari=array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
	$bulane = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$expire = date("w, d m Y",strtotime($tgaktif)); 
	$time = date("H:i:s",strtotime($tgaktif));
//$showexp = date("w n d Y",time() + (7776000/3)); 
	$day = substr($expire, 0, 1);
	$tgle = substr($expire, 3,2);
	$blne = substr($expire, 6,2);
	$thne = substr($expire, 9,4);
	if($blne < 10 ) {
		$blne0 = substr($blne, 1,1) - 1;
	} else {
		$blne0 = $blne - 1;
	}
	$tg =  "$tgle-$bulane[$blne0]-$thne";
	return $tg;
}

function jmlmember0($username, $dtgl) {
	$jm = 0;
	
	$sql = mysql_query("select username from member WHERE sponsor='$username' and status=0");
	if(mysql_num_rows($sql) == 0) {
		$kos = "0";
	} else {	
		$data = mysql_fetch_row($sql);
		$kos = $data[0] + 1;
	}	
	
	return $kos;
}
function jmlmember1($username, $dtgl) {
	$jm = 0;
	
	$sql = mysql_query("select username from member WHERE sponsor='$username' and status=1");
	if(mysql_num_rows($sql) == 0) {
		$kos = "0";
	} else {	
		$data = mysql_fetch_row($sql);
		$kos = $data[0] + 1;
	}	
	
	return $kos;
}

//---jml member per level--
function jmlmemberx($username, $dtgl) {
	$jm = 0;
	
	$sql = mysql_query("select username from member WHERE sponsor='$username'");
	if(mysql_num_rows($sql) == 0) {
		$kos = "0";
	} else {	
		$data = mysql_fetch_row($sql);
		$kos = $data[0] + 1;
	}	
	
	return $kos;
}	

//---jml member per level--
function jmlmember($username, $dtgl) {
	$jm = 0;
	$jm = memberl1($username, $dtgl) + memberl2($username, $dtgl);

	return $jm;
}

function warning($text) {
	echo "<div id='warning'><p align=center>$text</p></div>";
}	
function kwitansi() {
	$ko = 0;
	$sql = mysql_query("select kode from kwitansi order by kode desc");
	if(mysql_num_rows($sql) == 0) {
		$ko = 100123;
	} else {	
		$data = mysql_fetch_row($sql);
		$ko = $data[0] + 1;
	}	
	return $ko;
}

function anti_injection($string) {
$string = stripslashes($string); // Keep your usernames clean
$string = strip_tags($string); // Kill all tags like html tags, etc..
$string = preg_replace("/(insert|delete|drop|union|update|null|handler|#|\*|--|'|;|\\\\)/", '', $string);
return $string;
}	 

function anti_injectionx($string) {
$string = stripslashes($string); // Keep your usernames clean
$string = strip_tags($string); // Kill all tags like html tags, etc..
$string = preg_replace("/(show tables|drop table|alter table|#|\*|--|'|;|\\\\)/", '', $string);
return $string;
}

function hide_mail($email) {
    $mail_segments = explode("@", $email);
    $mail_segments[0] = str_repeat("*", strlen($mail_segments[0]));

    return implode("@", $mail_segments);
}

function hide_phone($phone) {
    return substr($phone, 0, -5) . "****";
}	 

function coin($amount) {
	$ymee33 = "SELECT coiname FROM configuration";
	$resultymee33 = mysql_query( $ymee33 );
	$rowymee33 = mysql_fetch_array( $resultymee33 );
	$coinameku33 = $rowymee33[0];
	$new_amount = sprintf("%.8f", $amount ) .'&nbsp;  ' . $coinameku33;
	return $new_amount;
}

function rupiah($amount) {
	$new_amount = sprintf("%.8f", $amount ) . "&nbsp;BTC";
	return $new_amount;
}


function rupiahs($amount) {
	$new_amount = sprintf("%.8f", $amount ) . "&nbsp;BTC";
	return $new_amount;
}

function rupiahx($amount) {
	$new_amount = sprintf("%.8f", $amount ) . "&nbsp;BTC";
	return $new_amount;
}

function dolar($amount) {
	$new_amount = "$". sprintf("%.4f", $amount );
	return $new_amount;
}

function idr($angka) {
	$jadi = "Rp ". number_format( $angka, 0, ',', '.' );
	return $jadi;
}

function btc($amount) {
	$new_amount = sprintf("%.8f", $amount ) ."BTC";
	return $new_amount;
}

function dolars($amount) {
	$new_amount ="USD" . sprintf( '%.4f', $amount );
	return $new_amount;
}





function total_komisi_memberx($username) {
			$t_kom9pp="";
			$s_kom9pp="SELECT * FROM komisi WHERE username ='$username' and jenis<>'komshare' and gett<>'2'";
			$d_kom9pp=mysql_query($s_kom9pp);
			$adakom9pp=mysql_num_rows($d_kom9pp);
			if($adakom9pp > 0) {
				$kom_member9pp = 0;
				while($r_kom9pp=mysql_fetch_row($d_kom9pp)) {
					$kom_member9pp = $kom_member9pp + $r_kom9pp[2];
				}
				$kom_mbr9pp = $kom_member9pp;
			} else {
				$kom_mbr9pp = 0;
			}
			return $kom_mbr9pp;
		}			
		
function total_komisi_memberx2($username) {
			$t_kom9ppsa="";
			$s_kom9ppsa="SELECT * FROM komisi_history WHERE username ='$username' and jenis<>'komshare' and gett<>'2'";
			$d_kom9ppsa=mysql_query($s_kom9ppsa);
			$adakom9ppsa=mysql_num_rows($d_kom9ppsa);
			if($adakom9ppsa > 0) {
				$kom_member9ppsa = 0;
				while($r_kom9ppsa=mysql_fetch_row($d_kom9ppsa)) {
					$kom_member9ppsa = $kom_member9ppsa + $r_kom9ppsa[2];
				}
				$kom_mbr9ppsa = $kom_member9ppsa;
			} else {
				$kom_mbr9ppsa = 0;
			}
			return $kom_mbr9ppsa;
		}					
		

function total_komisi_member_pending($username) {
			$t_kompdng="";
			$s_kompdng="SELECT * FROM komisi WHERE username ='$username' and get='2'";
			$d_kompdng=mysql_query($s_kompdng);
			$adakompdng=mysql_num_rows($d_kompdng);
			if($adakompdng > 0) {
				$kom_memberpdng = 0;
				while($r_kompdng=mysql_fetch_row($d_kompdng)) {
					$kom_memberpdng = $kom_memberpdng + $r_kompdng[2];
				}
				$kom_mbrpdng = $kom_memberpdng;
			} else {
				$kom_mbrpdng = 0;
			}
			return $kom_mbrpdng;
		}

function total_komisi_memberxx($username) {
			$t_kom9pp11="";
			$s_kom9pp11="SELECT * FROM komisi WHERE username ='$username' and jenis <> 'komshare' and gett='1'";
			$d_kom9pp11=mysql_query($s_kom9pp11);
			$adakom9pp11=mysql_num_rows($d_kom9pp11);
			if($adakom9pp11 > 0) {
				$kom_member9pp11 = 0;
				while($r_kom9pp11=mysql_fetch_row($d_kom9pp11)) {
					$kom_member9pp11 = $kom_member9pp11 + $r_kom9pp11[2];
				}
				$kom_mbr9pp11 = $kom_member9pp11;
			} else {
				$kom_mbr9pp11 = 0;
			}
			return $kom_mbr9pp11;
		}


function total_komisi_member($username) {
			$t_kom="";
			$s_kom="SELECT * FROM komisi WHERE username ='$username'";
			$d_kom=mysql_query($s_kom);
			$adakom=mysql_num_rows($d_kom);
			if($adakom > 0) {
				$kom_member = 0;
				while($r_kom=mysql_fetch_row($d_kom)) {
					$kom_member = $kom_member + $r_kom[2];
				}
				$kom_mbr = $kom_member;
			} else {
				$kom_mbr = 0;
			}
			return $kom_mbr;
		}	
	
function total_withdrawal_member($username) {
			$v_kom="";
			$g_kom="SELECT * FROM transfer WHERE userid ='$username'";
			$h_kom=mysql_query($g_kom);
			$adagkom=mysql_num_rows($h_kom);
			if($adagkom > 0) {
				$wdw_member = 0;
				while($wd_kom=mysql_fetch_row($h_kom)) {
					$wdw_member = $wdw_member + $wd_kom[4];
				}
				$wdw_mbr = $wdw_member;
			} else {
				$wdw_mbr = 0;
			}
			return $wdw_mbr;
		}	
	
function total_deposit_member($username) {
			$p_kom="";
			$pp_kom="SELECT * FROM dataewalet2 WHERE username ='$username' AND status=1 ";
			$ppp_kom=mysql_query($pp_kom);
			$adpkom=mysql_num_rows($ppp_kom);
			if($adpkom > 0) {
				$dps_member = 0;
				while($dp_kom=mysql_fetch_row($ppp_kom)) {
					$dps_member = $dps_member + $dp_kom[3];
				}
				$dps_mbr = $dps_member;
			} else {
				$dps_mbr = 0;
			}
			return $dps_mbr;
		}		
	
function total_deposit_memberx($username) {
			$p_komx="";
			$pp_komx="SELECT * FROM deposit WHERE username ='$username' AND status=1 and request <> '000'";
			$ppp_komx=mysql_query($pp_komx);
			$adpkomx=mysql_num_rows($ppp_komx);
			if($adpkomx > 0) {
				$dps_memberx = 0;
				while($dp_komx=mysql_fetch_row($ppp_komx)) {
					$dps_memberx = $dps_memberx + $dp_komx[3];
				}
				$dps_mbrx = $dps_memberx;
			} else {
				$dps_mbrx = 0;
			}
			return $dps_mbrx;
		}
		
		
function total_buy_coin() {
		$p_coinx="";
			$pp_coinx="SELECT * FROM dataewalet22";
			$ppp_coinx=mysql_query($pp_coinx);
			$adpcoinx=mysql_num_rows($ppp_coinx);
			if($adpcoinx > 0) {
				$dps_memberxcoin = 0;
				while($dp_coinx=mysql_fetch_row($ppp_coinx)) {
					$dps_memberxcoin = $dps_memberxcoin + $dp_coinx[3];
				}
				$dps_mbrxcoin = $dps_memberxcoin;
			} else {
				$dps_mbrxcoin = 0;
			}
			return $dps_mbrxcoin;
		}
		

		
function total_trans_request($kode) {
			$vpqw_komx="";
			$vppqw_komx="SELECT * FROM contribute WHERE kode_gh ='$kode'";
			$vpppqw_komx=mysql_query($vppqw_komx);
			$advpqwkomx=mysql_num_rows($vpppqw_komx);
			if($advpqwkomx > 0) {
				$dvpqws_memberx = 0;
				while($dvpqw_komx=mysql_fetch_row($vpppqw_komx)) {
					$dvpqws_memberx = $dvpqws_memberx + $dvpqw_komx[4];
				}
				$dvpqws_mbrx = $dvpqws_memberx;
			} else {
				$dvpqws_mbrx = 0;
			}
			return $dvpqws_mbrx;
		}		
		
		
function total_req_contibutes($username) {
			$vpmm_komx="";
			$vppmm_komx="SELECT * FROM contribute WHERE username ='$username' and jenis=1 and status < 2 and exp='0' and welcome <> '1'";
			$vpppmm_komx=mysql_query($vppmm_komx);
			$advpmmkomx=mysql_num_rows($vpppmm_komx);
			if($advpmmkomx > 0) {
				$dvpmms_memberx = 0;
				while($dvpmm_komx=mysql_fetch_row($vpppmm_komx)) {
					$dvpmms_memberx = $dvpmms_memberx + $dvpmm_komx[4];
				}
				$dvpmms_mbrx = $dvpmms_memberx;
			} else {
				$dvpmms_mbrx = 0;
			}
			return $dvpmms_mbrx;
		}			
	
	
function total_req_wd($username) {
			$vpmm_komx2e="";
			$vppmm_komx2e="SELECT * FROM contribute WHERE username ='$username' and jenis=1 and status < 2";
			$vpppmm_komx2e=mysql_query($vppmm_komx2e);
			$advpmmkomx2e=mysql_num_rows($vpppmm_komx2e);
			if($advpmmkomx2e > 0) {
				$dvpmms_memberx2e = 0;
				while($dvpmm_komx2e=mysql_fetch_row($vpppmm_komx2e)) {
					$dvpmms_memberx2e = $dvpmms_memberx2e + $dvpmm_komx2e[4];
				}
				$dvpmms_mbrx2e = $dvpmms_memberx2e;
			} else {
				$dvpmms_mbrx2e = 0;
			}
			return $dvpmms_mbrx2e;
		}		
											
function total_wdbonus_member($username) {
			$vll_kom="";
			$gll_kom="SELECT * FROM wd WHERE userid ='$username' and jenis='1'";
			$hll_kom=mysql_query($gll_kom);
			$adagllkom=mysql_num_rows($hll_kom);
			if($adagllkom > 0) {
				$wdwll_member = 0;
				while($wdll_kom=mysql_fetch_row($hll_kom)) {
					$wdwll_member = $wdwll_member + $wdll_kom[4];
				}
				$wdwll_mbr = $wdwll_member;
			} else {
				$wdwll_mbr = 0;
			}
			return $wdwll_mbr;
		}			
				
											
function total_wdprofit_member($username) {
			$vll_komfghj="";
			$gll_komfghj="SELECT * FROM wd WHERE userid ='$username' and jenis='2'";
			$hll_komfghj=mysql_query($gll_komfghj);
			$adagllkomfghj=mysql_num_rows($hll_komfghj);
			if($adagllkomfghj > 0) {
				$wdwll_memberfghj = 0;
				while($wdll_komfghj=mysql_fetch_row($hll_komfghj)) {
					$wdwll_memberfghj = $wdwll_memberfghj + $wdll_komfghj[4];
				}
				$wdwll_mbrfghj = $wdwll_memberfghj;
			} else {
				$wdwll_mbrfghj = 0;
			}
			return $wdwll_mbrfghj;
		}	
		
function total_komspon_member($username) {
			$v22_kom="";
			$g22_kom="SELECT * FROM komisi WHERE username ='$username' and jenis='komsponsor'";
			$h22_kom=mysql_query($g22_kom);
			$adag22kom=mysql_num_rows($h22_kom);
			if($adag22kom > 0) {
				$wdw22_member = 0;
				while($wd22_kom=mysql_fetch_row($h22_kom)) {
					$wdw22_member = $wdw22_member + $wd22_kom[2];
				}
				$wdw22_mbr = $wdw22_member;
			} else {
				$wdw22_mbr = 0;
			}
			return $wdw22_mbr;
		}					
function total_profit_member($username) {
			$v2298_kom="";
			$g2298_kom="SELECT * FROM komisi WHERE username ='$username' and jenis='komshare' and gett='0'";
			$h2298_kom=mysql_query($g2298_kom);
			$adag2298kom=mysql_num_rows($h2298_kom);
			if($adag2298kom > 0) {
				$wdw2298_member = 0;
				while($wd2298_kom=mysql_fetch_row($h2298_kom)) {
					$wdw2298_member = $wdw2298_member + $wd2298_kom[2];
				}
				$wdw2298_mbr = $wdw2298_member;
			} else {
				$wdw2298_mbr = 0;
			}
			return $wdw2298_mbr;
		}							

function total_flush_member($username) {
				$vflushcc_kom="";
			$gflushcc_kom="SELECT * FROM flushdata WHERE username ='$username'";
			$hflushcc_kom=mysql_query($gflushcc_kom);
			$adagflushcckom=mysql_num_rows($hflushcc_kom);
			if($adagflushcckom > 0) {
				$wdwflushcc_member = 0;
				while($wdflushcc_kom=mysql_fetch_row($hflushcc_kom)) {
					$wdwflushcc_member = $wdwflushcc_member + $wdflushcc_kom[3];
				}
				$wdwflushcc_mbr = $wdwflushcc_member;
			} else {
				$wdwflushcc_mbr = 0;
			}
			return $wdwflushcc_mbr;
		}

			
function total_pasangan($username) {
			$vpasscc_kom="";
			$gpasscc_kom="SELECT * FROM komisi WHERE username ='$username' and jenis='kompasangan' and get='0'";
			$hpasscc_kom=mysql_query($gpasscc_kom);
			$adagpasscckom=mysql_num_rows($hpasscc_kom);
			if($adagpasscckom > 0) {
				$wdwpasscc_member = 0;
				while($wdpasscc_kom=mysql_fetch_row($hpasscc_kom)) {
					$wdwpasscc_member = $wdwpasscc_member + $wdpasscc_kom[2];
				}
				$wdwpasscc_mbr = $wdwpasscc_member;
			} else {
				$wdwpasscc_mbr = 0;
			}
			return $wdwpasscc_mbr;
		}			
		
			
function total_pasangan_diambil($username) {
			$vpasscc_kom11="";
			$gpasscc_kom11="SELECT * FROM komisi WHERE username ='$username' and jenis='kompasangan' and get='0'";
			$hpasscc_kom11=mysql_query($gpasscc_kom11);
			$adagpasscckom11=mysql_num_rows($hpasscc_kom11);
			if($adagpasscckom11 > 0) {
				$wdwpasscc_member11 = 0;
				while($wdpasscc_kom11=mysql_fetch_row($hpasscc_kom11)) {
					$wdwpasscc_member11 = $wdwpasscc_member11 + $wdpasscc_kom11[2];
				}
				$wdwpasscc_mbr11 = $wdwpasscc_member11;
			} else {
				$wdwpasscc_mbr11 = 0;
			}
			return $wdwpasscc_mbr11;
		}			
			
	
function total_pasangan_flush($username) {
			$vpasscc_kom12="";
			$gpasscc_kom12="SELECT * FROM komisi WHERE username ='$username' and jenis='kompasangan' and (tglbayar between '$dtfrome' and '$dttoe')";
			$hpasscc_kom12=mysql_query($gpasscc_kom12);
			$adagpasscckom12=mysql_num_rows($hpasscc_kom12);
			if($adagpasscckom12 > 0) {
				$wdwpasscc_member12 = 0;
				while($wdpasscc12_kom=mysql_fetch_row($hpasscc_kom12)) {
					$wdwpasscc_member12 = $wdwpasscc_member12 + $wdpasscc_kom12[2];
				}
				$wdwpasscc_mbr12 = $wdwpasscc_member12;
			} else {
				$wdwpasscc_mbr12 = 0;
			}
			return $wdwpasscc_mbr12;
		}			
		
			

function balance_ticket($username) {
			$vpqw33_komxvbvb="";
			$vppqw33_komxvbvb="SELECT * FROM ticket WHERE username ='$username' and status='1'";
			$vpppqw33_komxvbvb=mysql_query($vppqw33_komxvbvb);
			$advpqwkomxvbvb33=mysql_num_rows($vpppqw33_komxvbvb);
			if($advpqwkomxvbvb33 > 0) {
			
			return $advpqwkomxvbvb33;
		}
			
			}
	
	function total_ticket_member($username) {
			$p_komzs="";
			$pp_komzs="SELECT * FROM ticket WHERE username ='$username' and ticket <> '9999999999' and status='1'";
			$ppp_komzs=mysql_query($pp_komzs);
			$adpkomzs=mysql_num_rows($ppp_komzs);
			if($adpkomzs > 0) {
				$dps_mbrzs = $adpkomzs;
			} else {
				$dps_mbrzs = 0;
			}
			return $dps_mbrzs;
		}			
		
	function total_ticket_member_pending($username) {
			$p_komzss="";
			$pp_komzss="SELECT * FROM ticket_order WHERE orderto ='$username' and status='0'";
			$ppp_komzss=mysql_query($pp_komzss);
			$adpkomzss=mysql_num_rows($ppp_komzss);
			if($adpkomzss > 0) {
				$dps_mbrzss = $adpkomzss;
			} else {
				$dps_mbrzss = 0;
			}
			return $dps_mbrzss;
		}		
		
		
function total_gh($username) {
			$vp_komx_gh="";
			$vpp_komx_gh="SELECT * FROM gh WHERE username ='$username'";
			$vppp_komx_gh=mysql_query($vpp_komx_gh);
			$advpkomx_gh=mysql_num_rows($vppp_komx_gh);
			if($advpkomx_gh > 0) {
				$dvps_memberx_gh = 0;
				while($dvp_komx_gh=mysql_fetch_row($vppp_komx_gh)) {
					$dvps_memberx_gh = $dvps_memberx_gh + $dvp_komx_gh[3];
				}
				$dvps_mbrx_gh = $dvps_memberx_gh;
			} else {
				$dvps_mbrx_gh = 0;
			}
			return $dvps_mbrx_gh;
		}				
		
function total_ph($username) {
			$vp_komx_ph="";
			$vpp_komx_ph="SELECT * FROM ph WHERE username ='$username'";
			$vppp_komx_ph=mysql_query($vpp_komx_ph);
			$advpkomx_ph=mysql_num_rows($vppp_komx_ph);
			if($advpkomx_ph > 0) {
				$dvps_memberx_ph = 0;
				while($dvp_komx_ph=mysql_fetch_row($vppp_komx_ph)) {
					$dvps_memberx_ph = $dvps_memberx_ph + $dvp_komx_ph[3];
				}
				$dvps_mbrx_ph = $dvps_memberx_ph;
			} else {
				$dvps_mbrx_ph = 0;
			}
			return $dvps_mbrx_ph;
		}

function total_trans_contibutes($kode) {
			$vp_komx="";
			$vpp_komx="SELECT * FROM contribute WHERE kode_ph ='$kode'";
			$vppp_komx=mysql_query($vpp_komx);
			$advpkomx=mysql_num_rows($vppp_komx);
			if($advpkomx > 0) {
				$dvps_memberx = 0;
				while($dvp_komx=mysql_fetch_row($vppp_komx)) {
					$dvps_memberx = $dvps_memberx + $dvp_komx[4];
				}
				$dvps_mbrx = $dvps_memberx;
			} else {
				$dvps_mbrx = 0;
			}
			return $dvps_mbrx;
		}

		function total_lot_member($username) {
			$vp_komxlot="";
			$vpp_komxlot="SELECT * FROM deposit WHERE username ='$username'";
			$vppp_komxlot=mysql_query($vpp_komxlot);
			$advpkomxlot=mysql_num_rows($vppp_komxlot);
			if($advpkomxlot > 0) {
				$dvps_memberxlot = 0;
				while($dvp_komxlot=mysql_fetch_row($vppp_komxlot)) {
					$dvps_memberxlot = $dvps_memberx + $dvp_komxlot[4];
				}
				$dvps_mbrxlot = $dvps_memberxlot;
			} else {
				$dvps_mbrxlot = 0;
			}
			return $dvps_mbrxlot;
		}
		
?>
<?php
$redurl = $db->config("red_url");
$ip = $_SERVER['REMOTE_ADDR'];
$sql0 = mysql_query("SELECT * FROM ipblock WHERE ip='$ip'");
$num0 = mysql_num_rows($sql0);
if($num0 > 0) {
$string = 'IP Anda : '.$ip.' DIBLOKIR!';
    echo "<script>alert(\"$string\");".
        "window.location = 'http://".$redurl."'</script>";
}


$domain = $db->config("domain"); 
$bisnisname = $db->config("bisnisname"); 
$use_ssl = $db->config("usessl");		
$fbne = $db->config("fb");
$gtranslate = $db->config("gt");
$gplus = $db->config("gplus");
$tpmed = $db->config("topmed");
$membershare = $db->config("membershare"); 
$facebooksharewidget = $db->config("fbshare"); 
$twitersharewidget = $db->config("twitshare"); 
$facebooklikewidget = $db->config("fblike"); 
$facebookrecomended = $db->config("fbrec"); 
$facebooksendwidget = $db->config("fbsend"); 
$googleplusharewidget = $db->config("gplusshare"); 
$sendmailwidget = $db->config("mailsend"); 
$instagramsharewidget = $db->config("instagr"); 
$linkedinsharewidget = $db->config("linkdin"); 
$bloggersharewidget = $db->config("blogger"); 
$pinterestsharewidget = $db->config("pinterest"); 
$tumblrsharewidget = $db->config("tumblr"); 
$stumbleuponsharewidget = $db->config("stumbleupon"); 
$printwidget = $db->config("print"); 
$baidusharewidget = $db->config("baidu"); 
$diggsharewidget = $db->config("digg"); 
$tpmedwg = $db->config("add_widget");


$querychat = "SELECT * FROM content WHERE published=1 and catid=87"; 
$resultchat = mysql_query($querychat);
$rowchat = mysql_fetch_array($resultchat);
$lchats = $rowchat['maintext'];

$ico_start = $db->config("coin_start"); 
$ico_end = $db->config("coin_end"); 
$stchat = $db->config("chats"); 
$footer = $db->config("footer"); 
$favicons = $db->config("fcon"); 
$descriptionweb = $db->config("description"); 
$keywordweb = $db->config("keyword"); 
$titleweb = $db->config("title"); 
$twiter = explode("|", $db->config("twiter"));
			$twt = 	$twiter[0];	
			$twt2 = $twiter[1];		
$nama_bisnis = $db->config("name");		
$alamat_bisnis = $db->config("alamat");
$hp_bisnis = $db->config("hpsms");
$hp_bisnis2 = $db->config("hpsms2");
$email_bisnis = $db->config("email");
$kurse = $db->config("kurs");
 $bank = $db->config("bank");
 $bank1 = $db->config("bank1");
 $bank2 = $db->config("bank2");
 $bank3 = $db->config("bank3");
		$emailadmin = $db->config("email");
		$namaeadmin = $db->config("name");
		$hpadmin = $db->config("hpsms");   
$kurse = $db->config("kurs");  
$hpadmin2 = $db->config("hpsms2");   
$bankadmin = $db->config("bank");  
$bankadmin1 = $db->config("bank1");  
$bankadmin2 = $db->config("bank2");  
$bankadmin3 = $db->config("bank3");   
$email_activations = $db->config("email_activation");       
$sms_activations = $db->config("sms_activation");   
$pengelola = $db->config("name");  
$alamatadmin = $db->config("alamat");  
$smtphost = $db->config("smtphost");  
$smtport = $db->config("smtport");  
$smtpuser = $db->config("smtpuser");  
$smtpass  = $db->config("smtpass");  
$mailset  = $db->config("mailset");  
$mail_batase  = $db->config("mail_batas ");  
$hp_batase  = $db->config("hp_batas "); 
$ipne = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$footer_copyright = $db->config("footer");
$link_konfirmasi = "http://".$domain."/page.php?do=konfirmasi";
$fromail = $bisnisname." <".$emailadmin.">";
$contactpage="http://".$domain."/page.php?do=contact";
	$logourl="http://".$domain."/";
	$openblokir="http://".$domain."/openblock.php";
	$login="http://".$domain."/login.php";
	$changepass="http://".$domain."/resetpass.php";
	$openmail="http://".$domain."/viewmail.php";
	$validations="http://".$domain."/confirm.php";
	$links="http://".$domain."/";
	$logourl="http://".$domain."/";
$mailogos = $db->config("mail_logo");  
$logomail = "http://".$domain."/images/banner/".$mailogos;	
$invlogos = $db->config("invimage");  
$logoinvoice = "http://".$domain."/images/banner/".$invlogos;	

$sess_time = $db->config("sess_time ");
$menite = round($sess_time/60, 2);
$blockie = $db->config("blockie");  
   
$bataswdnya1 = $db->config("mwd"); 
$bataswdnya2 = $db->config("mwd2"); 
$potongantransfer = $db->config("charge_transfer"); 
$bataswdnya3 = $db->config("mwd3"); 
$bataswdnya4 = $db->config("mwd4"); 
$exptransfer = $db->config("exptrans");    
$curr_7787 = $db->config("defcurr");
$autoproccess = $db->config("onoto");  
$lang  = $db->config("lang");    
$reffa = $db->config("reffa");  
$paygateways = $db->config("paygateway");
$rekbanke = $db->config("rekbank");	 
$mybbm = $db->config("bbm");    
$mywhatsapp = $db->config("whatsapp"); 
$myline = $db->config("line");   
$myfax = $db->config("fax");   	
$virtualmember = $db->config("virt_member");   
$virtualmemberadd = $db->config("virt_add");   
$tickerforex = $db->config("tracker_forex");   
$officepict  = $db->config("office");  
$komisi_sponsore  = $db->config("komisi_sponsor");  
$komisi_pasangane  = $db->config("kompasangan");  
$flushoute  = $db->config("flushout");  
$latitude = $db->config("latitude");  
$longitude = $db->config("longitude");  
$hargatiket = $db->config("hargatiket"); 
$minorderticket = $db->config("min_ticket");  
$hargatiketsto = $db->config("hargatiketsto");

//-rupiah------------
$virtprofit = $db->config("profitmanual");  
$virtprofite = $db->config("profitmanual2");  


$buybalance_st = $db->config("buybalance"); 
$sellbalance_st = $db->config("sellbalance");  
$transbalance_st = $db->config("transbalance");  
$convertbalance_st = $db->config("convertbalance");  
$minbuybalance = $db->config("minbuy");  
$maxbuybalance = $db->config("maxbuy");   
$minsellbalance = $db->config("minsell");  
$mintransbalance = $db->config("mintrans");  
$maxsellbalance = $db->config("maxsell");  
$maxtransbalance = $db->config("maxtrans");  
$feesellbalance = $db->config("feesell");  
$feetransbalance = $db->config("feetrans");  
$feeconvbalance = $db->config("feeconv");  
$minconvertbalance = $db->config("minconvert");
$maxconvertbalance = $db->config("maxconvert");
$nilaiconvertbalance =  $db->config("nilaiconvert");

$maksinvest = $db->config("maxinvest");  
$lockprofile = $db->config("lockprofile");  

//$wdbonustatus = $db->config("wdbonus");
//$wdprofitstatus = $db->config("wdprofit");
//$minwdbonuse = $db->config("minwdbonus");
//$maxwdbonuse = $db->config("maxwdbonus");
//$feewdbonuse = $db->config("feewdbonus");
//$minwdprofite = $db->config("minwdprofit");
//$maxwdprofite = $db->config("maxwdprofit");
//$feewdprofite = $db->config("feewdprofit");

$unlockpro = $db->config("unlockpro");
$privatelogin =  $db->config("onelogin");
$regpublic = $db->config("regpublic");
$komatchroi = $db->config("matchroi");
$batastransfere =$db->config("batastransfer");

$kursbtc =$db->config("kursbtc");

$namecoins = $db->config("coiname");
$kursbtcoin = $db->config("kursbtcoin");
$kurscoinbtc =$db->config("kurscoinbtc");

$saldocoin = $db->config("saldocoin");

$kursusdcoin = $db->config("kursusdcoin");

$transfercoin = $db->config("transcoin");
$convertcoin = $db->config("convertcoin");
$sellingcoin = $db->config("sellcoin");

$dttrx = explode("|", $db->result( 0,"dtranscoin"));
$minimaltransfercoin = $dttrx[0];
$maksimaltransfercoin = $dttrx[1];
$feetransfercoin = $dttrx[2];

$db->select("dtsellcoin","configuration","id=1");
$dtsll = explode("|", $db->result( 0,"dtsellcoin"));
$minimalsellingcoin =$dtsll[0];
$maksimalsellingcoin =$dtsll[1];
$feesellingcoin = $dtsll[2];

$db->select("dtconvertcoin","configuration","id=1");
$dtcnvv = explode("|", $db->result( 0,"dtconvertcoin"));
$minimalconvertcoin = $dtcnvv[0];
$maksimalconvertcoin = $dtcnvv[1];
$feeconvertcoin = $dtcnvv[2];

define( 'WEB_DOMAIN', $domain );
define( 'WEB_NAME', $bisnisname );
define( 'WEB_DESC', $descriptionweb );
define( 'WEB_KEYWORDS', $keywordweb );
define( 'WEB_TITLE', $titleweb );
define( 'WEB_FAVCONS', $favicons );
define( 'WEB_FOOTER', $footer );
define( 'SSL_ON', $use_ssl );


define("EMAIL_VALIDATION", $email_activations);
define("SMS_VALIDATION", $sms_activations);
define("SMTP_HOST", $smtphost);
define("SMTP_PORT", $smtport);
define("SMTP_USER", $smtpuser);
define("SMTP_PASS", $smtpass);
define("SMTP_ON", $mailset);
define("MAX_EMAIL_REG", $mail_batase);
define("MAX_MOBILE_REG", $hp_batase);
define("IE_BLOCKED", $blockie);
define("REDIR_URL", $redirecturl);
define("NOTIF_DANGER","label label-sm label-icon label-danger");
define("NOTIF_DANGER_ICON","fa fa-exclamation");
define("NOTIF_SUCCESS","label label-sm label-icon label-success");
define("NOTIF_SUCCESS_ICON","fa fa-check");
define("NOTIF_INFO","label label-sm label-icon label-info");
define("NOTIF_INFO_ICON","fa fa-info");
define("NOTIF_WARNING","label label-sm label-icon label-warning");
define("NOTIF_WARNING_ICON","fa fa-warning");
define("GOOGLE_PLUS", $gplus);
define("ADD_THIS", $tpmed);
define("TWITTER_ACC", $twt);
define("TWITTER_WDG", $twt2);
define("BATAS_LOGIN", $loginsalah);
define("REFF_CODE", $reffa);
define("HARGA_TICKET", $hargaticket);
define("MIN_WD_BONUS", $bataswdnya1);
define("MAX_WD_BONUS", $bataswdnya2);



$fbne = $db->config("fb");
define('FB_ACCOUNT',  $fbne);	
$namaeadmin = $nama_bisnis;  
$pengelola = $nama_bisnis;  
define('ADMIN_NAME', $nama_bisnis);	
$alamatadmin = $alamat_bisnis;  
define('BUSSINESS_ADDRESS', $alamat_bisnis);	
$hpadmin = $hp_bisnis;    
define('BUSSINESS_MOBILE', $hp_bisnis);	
$hpadmin2 = $hp_bisnis2;  
define('BUSSINESS_MOBILE_2', $hp_bisnis2);	
$emailadmin = $email_bisnis;
define('BUSSINESS_EMAIL', $email_bisnis);	
define('KURSE', $kurse);	
$bankadmin = $bank;  
define('BANK_1', $bank);	
$bankadmin1 = $bank1; 
define('BANK_2', $bank1);	
$bankadmin2 = $bank2; 
define('BANK_3', $bank2);	 
$bankadmin3 = $bank3;
define('BANK_4', $bank3);	 
	   

define('IE_BLOCKED', $blockie);	 

  
  
define('GOOGLE_PLUS', $gplus);	  
define('ADD_THIS', $tpmed);	


define('TWITTER_ACC', $twt);	 
define('TWITTER_WDG', $twt2);	

define('BATAS_LOGIN', $loginsalah);	


define('REFF_CODE', $reffa);	 



$useticket = $db->config("useticket");  
define('USE_TICKET', $useticket);

$ticketstockist = $db->config("ticketstockist");


$batas_paket = $db->config("kedalaman_paket");   
$db->select("biaya", "configuration", "id=1");
	$by = explode("|", $db->result(0, "biaya"));
	$biaya1 = $by[0];
	$biaya2 = $by[1];
	$biaya3 = $by[2];
	$biaya4 = $by[3];
	$biaya5 = $by[4];
	$biaya6 = $by[5];
	$biaya7 = $by[6];
	$biaya8 = $by[7];
	$biaya9 = $by[8];
	$biaya10 = $by[9];
	$biaya11 = $by[10];
	
$db->select("biaya2", "configuration", "id=1");
	$byx = explode("|", $db->result(0, "biaya2"));
	$biayax1 = $byx[0];
	$biayax2 = $byx[1];
	$biayax3 = $byx[2];
	$biayax4 = $byx[3];
	$biayax5 = $byx[4];	
	$biayax6 = $byx[5];
	$biayax7 = $byx[6];
	$biayax8 = $byx[7];
	$biayax9 = $byx[8];
	$biayax10 = $byx[9];	
	$biayax11 = $byx[10];	
	
$lead = explode("|", $db->config("peringkat"));
	$jenis1 = $lead[0];
	$jenis2 = $lead[1];
	$jenis3 = $lead[2];
	$jenis4 = $lead[3];
	$jenis5 = $lead[4];
	$jenis6 = $lead[5];
	$jenis7 = $lead[6];
	$jenis8 = $lead[7];
	$jenis9 = $lead[8];
	$jenis10 = $lead[9];
	$jenis11 = $lead[10];

	
$inv_kont = explode("|", $db->config("kontrak_pro"));
	$inv_kontrak1 = $inv_kont[0];
	$inv_kontrak2 = $inv_kont[1];
	$inv_kontrak3 = $inv_kont[2];
	$inv_kontrak4 = $inv_kont[3];
	$inv_kontrak5 = $inv_kont[4];	
	$inv_kontrak6 = $inv_kont[5];
	$inv_kontrak7 = $inv_kont[6];
	$inv_kontrak8 = $inv_kont[7];
	$inv_kontrak9 = $inv_kont[8];
	$inv_kontrak10 = $inv_kont[9];	
	$inv_kontrak11 = $inv_kont[10];

	
	
$cyclei = explode("|", $db->config("cycle"));
	$cycleinv1 = $cyclei[0];
	$cycleinv2 = $cyclei[1];
	$cycleinv3 = $cyclei[2];
	$cycleinv4 = $cyclei[3];
	$cycleinv5 = $cyclei[4];	
	$cycleinv6 = $cyclei[5];
	$cycleinv7 = $cyclei[6];
	$cycleinv8 = $cyclei[7];
	$cycleinv9 = $cyclei[8];
	$cycleinv10 = $cyclei[9];	
	
$ttcyclei = explode("|", $db->config("ttcycle"));
	$ttcycleinv1 = $ttcyclei[0];
	$ttcycleinv2 = $ttcyclei[1];
	$ttcycleinv3 = $ttcyclei[2];
	$ttcycleinv4 = $ttcyclei[3];
	$ttcycleinv5 = $ttcyclei[4];	
	$ttcycleinv6 = $ttcyclei[5];
	$ttcycleinv7 = $ttcyclei[6];
	$ttcycleinv8 = $ttcyclei[7];
	$ttcycleinv9 = $ttcyclei[8];
	$ttcycleinv10 = $ttcyclei[9];			

$invest_pf = explode("|", $db->config("persen_profit"));
$invest_profits1 = $invest_pf[0];
$invest_profits2 = $invest_pf[1];	
$invest_profits3 = $invest_pf[2];		
$invest_profits4 = $invest_pf[3];	
$invest_profits5 = $invest_pf[4];
$invest_profits6 = $invest_pf[5];	
$invest_profits7 = $invest_pf[6];		
$invest_profits8 = $invest_pf[7];	
$invest_profits9 = $invest_pf[8];		
$invest_profits10 = $invest_pf[9];
$invest_profits11 = $invest_pf[10];



$priod_pf = explode("|", $db->config("periode_profits"));
$invest_priod1 = $priod_pf[0];
$invest_priod2 = $priod_pf[1];	
$invest_priod3 = $priod_pf[2];		
$invest_priod4 = $priod_pf[3];	
$invest_priod5 = $priod_pf[4];
$invest_priod6 = $priod_pf[5];	
$invest_priod7 = $priod_pf[6];		
$invest_priod8 = $priod_pf[7];	
$invest_priod9 = $priod_pf[8];		
$invest_priod10 = $priod_pf[9];	
$invest_priod11 = $priod_pf[10];


$db->select("flushout", "configuration", "id=1");
$fluss = explode("|", $db->result( 0, "flushout" ) );
$flushnya1 = $fluss[0];
$flushnya2 = $fluss[1];
$flushnya3 = $fluss[2];
$flushnya4 = $fluss[3];
$flushnya5 = $fluss[4];
$flushnya6 = $fluss[5];
$flushnya7 = $fluss[6];
$flushnya8 = $fluss[7];
$flushnya9 = $fluss[8];
$flushnya10 = $fluss[9];
$flushnya11 = $fluss[10];


$mwdnn = explode("|", $db->config("mwd"));
$mnimalwd1 = $mwdnn[0];
$mnimalwd2 = $mwdnn[1];
$mnimalwd3 = $mwdnn[2];
$mnimalwd4 = $mwdnn[3];
$mnimalwd5 = $mwdnn[4];
$mnimalwd6 = $mwdnn[5];
$mnimalwd7 = $mwdnn[6];
$mnimalwd8 = $mwdnn[7];
$mnimalwd9 = $mwdnn[8];
$mnimalwd10 = $mwdnn[9];
$mnimalwd11 = $mwdnn[10];

$mwdxx =explode("|", $db->config("mwd2"));
$mxmalwd1 = $mwdxx[0];
$mxmalwd2 = $mwdxx[1];
$mxmalwd3 = $mwdxx[2];
$mxmalwd4 = $mwdxx[3];
$mxmalwd5 = $mwdxx[4];
$mxmalwd6 = $mwdxx[5];
$mxmalwd7 = $mwdxx[6];
$mxmalwd8 = $mwdxx[7];
$mxmalwd9 = $mwdxx[8];
$mxmalwd10 = $mwdxx[9];
$mxmalwd11 = $mwdxx[10];



$ym = explode("|", $db->config("ym"));
							$ym1 = $ym[0];
							$ym2 = $ym[1];
							$ym3 = $ym[2];
							$ym4 = $ym[3];
					

$mailauto1 = "SELECT * FROM mailtmp WHERE id = '1'"; 
$mlauto1 = mysql_query($mailauto1);
$m_auto1 = mysql_fetch_array($mlauto1);
$mail_daftar_admin_status = $m_auto1['published'];
$mail_daftar_admin_subject = $m_auto1['subject'];
$mail_daftar_admin_isi = $m_auto1['isimail'];

$mailauto2 = "SELECT * FROM mailtmp WHERE id = '2'"; 
$mlauto2 = mysql_query($mailauto2);
$m_auto2 = mysql_fetch_array($mlauto2);
$mail_daftar_user_status = $m_auto2['published'];
$mail_daftar_user_subject = $m_auto2['subject'];
$mail_daftar_user_isi = $m_auto2['isimail'];

$mailauto3 = "SELECT * FROM mailtmp WHERE id = '3'"; 
$mlauto3 = mysql_query($mailauto3);
$m_auto3 = mysql_fetch_array($mlauto3);
$mail_daftar_reff_status = $m_auto3['published'];
$mail_daftar_reff_subject = $m_auto3['subject'];
$mail_daftar_reff_isi = $m_auto3['isimail'];

$mailauto4 = "SELECT * FROM mailtmp WHERE id = '4'"; 
$mlauto4 = mysql_query($mailauto4);
$m_auto4 = mysql_fetch_array($mlauto4);
$mail_contact_user_subject = $m_auto4['subject'];
$mail_contact_user_isi = $m_auto4['isimail'];

$mailauto5 = "SELECT * FROM mailtmp WHERE id = '5'"; 
$mlauto5 = mysql_query($mailauto5);
$m_auto5 = mysql_fetch_array($mlauto5);
$mail_contact_admin_subject = $m_auto5['subject'];
$mail_contact_admin_isi = $m_auto5['isimail'];

$mailauto6 = "SELECT * FROM mailtmp WHERE id = '6'"; 
$mlauto6 = mysql_query($mailauto6);
$m_auto6 = mysql_fetch_array($mlauto6);
$mail_reset_password_isi = $m_auto6['isimail'];
$mail_reset_password_subject = $m_auto6['subject'];

$mailauto7 = "SELECT * FROM mailtmp WHERE id = '7'"; 
$mlauto7 = mysql_query($mailauto7);
$m_auto7 = mysql_fetch_array($mlauto7);
$mail_konfirmasi_reset_password_isi = $m_auto7['isimail'];
$mail_konfirmasi_reset_password_subject = $m_auto7['subject'];

$mailauto8 = "SELECT * FROM mailtmp WHERE id = '8'"; 
$mlauto8 = mysql_query($mailauto8);
$m_auto8 = mysql_fetch_array($mlauto8);
$mail_buka_blokir_isi = $m_auto8['isimail'];
$mail_buka_blokir_subject = $m_auto8['subject'];

$mailauto9 = "SELECT * FROM mailtmp WHERE id = '9'"; 
$mlauto9 = mysql_query($mailauto9);
$m_auto9 = mysql_fetch_array($mlauto9);
$mail_login_member_status = $m_auto9['published'];
$mail_login_member_isi = $m_auto9['isimail'];
$mail_login_member_subject = $m_auto9['subject'];


$mailauto10 = "SELECT * FROM mailtmp WHERE id = '10'"; 
$mlauto10 = mysql_query($mailauto10);
$m_auto10 = mysql_fetch_array($mlauto10);
$mail_blokir_member_isi = $m_auto10['isimail'];
$mail_blokir_member_subject = $m_auto10['subject'];


$mailauto11 = "SELECT * FROM mailtmp WHERE id = '11'"; 
$mlauto11 = mysql_query($mailauto11);
$m_auto11 = mysql_fetch_array($mlauto11);
$mail_belanja_admin_isi = $m_auto11['isimail'];
$mail_belanja_admin_subject = $m_auto11['subject'];


$mailauto12 = "SELECT * FROM mailtmp WHERE id = '12'"; 
$mlauto12 = mysql_query($mailauto12);
$m_auto12 = mysql_fetch_array($mlauto12);
$mail_belanja_pelanggan_isi = $m_auto12['isimail'];
$mail_belanja_pelanggan_subject = $m_auto12['subject'];


$mailauto13 = "SELECT * FROM mailtmp WHERE id = '13'"; 
$mlauto13 = mysql_query($mailauto13);
$m_auto13 = mysql_fetch_array($mlauto13);
$mail_update_profil_status = $m_auto13['published'];
$mail_update_profil_isi = $m_auto13['isimail'];
$mail_update_profil_subject = $m_auto13['subject'];


$mailauto14 = "SELECT * FROM mailtmp WHERE id = '14'"; 
$mlauto14 = mysql_query($mailauto14);
$m_auto14 = mysql_fetch_array($mlauto14);
$mail_upload_data_isi = $m_auto14['isimail'];
$mail_upload_data_subject = $m_auto14['subject'];


$mailauto15 = "SELECT * FROM mailtmp WHERE id = '15'"; 
$mlauto15 = mysql_query($mailauto15);
$m_auto15 = mysql_fetch_array($mlauto15);
$mail_konfirmasi_status = $m_auto15['published'];
$mail_konfirmasi_jenis = $m_auto15['protokol'];
$mail_konfirmasi_isi = $m_auto15['isimail'];
$mail_konfirmasi_isi_teks = $m_auto15['teks'];
$mail_konfirmasi_subject = $m_auto15['subject'];

$mailauto16 = "SELECT * FROM mailtmp WHERE id = '16'"; 
$mlauto16 = mysql_query($mailauto16);
$m_auto16 = mysql_fetch_array($mlauto16);
$mail_ubah_pin_status = $m_auto16['published'];
$mail_ubah_pin_isi = $m_auto16['isimail'];
$mail_ubah_pin_subject = $m_auto16['subject'];

$mailauto17 = "SELECT * FROM mailtmp WHERE id = '17'"; 
$mlauto17 = mysql_query($mailauto17);
$m_auto17 = mysql_fetch_array($mlauto17);
$mail_deposit_admin_status = $m_auto17['published'];
$mail_deposit_admin_isi = $m_auto17['isimail'];
$mail_deposit_admin_subject = $m_auto17['subject'];


$mailauto18 = "SELECT * FROM mailtmp WHERE id = '18'"; 
$mlauto18 = mysql_query($mailauto18);
$m_auto18 = mysql_fetch_array($mlauto18);
$mail_deposit_member_status = $m_auto18['published'];
$mail_deposit_member_isi = $m_auto18['isimail'];
$mail_deposit_member_subject = $m_auto18['subject'];

$mailauto19 = "SELECT * FROM mailtmp WHERE id = '19'"; 
$mlauto19 = mysql_query($mailauto19);
$m_auto19 = mysql_fetch_array($mlauto19);
$mail_blokirpin_member_status = $m_auto19['published'];
$mail_blokirpin_member_isi = $m_auto19['isimail'];
$mail_blokirpin_member_subject = $m_auto19['subject'];


$mailauto23 = "SELECT * FROM mailtmp WHERE id = '23'"; 
$mlauto23 = mysql_query($mailauto23);
$m_auto23 = mysql_fetch_array($mlauto23);
$mail_withdrawal_member_status = $m_auto23['published'];
$mail_withdrawal_member_isi = $m_auto23['isimail'];
$mail_withdrawal_member_subject = $m_auto23['subject'];


$mailauto24 = "SELECT * FROM mailtmp WHERE id = '24'"; 
$mlauto24 = mysql_query($mailauto24);
$m_auto24 = mysql_fetch_array($mlauto24);
$mail_withdrawal_admin_status = $m_auto24['published'];
$mail_withdrawal_admin_isi = $m_auto24['isimail'];
$mail_withdrawal_admin_subject = $m_auto24['subject'];


$mailauto25 = "SELECT * FROM mailtmp WHERE id = '25'"; 
$mlauto25 = mysql_query($mailauto25);
$m_auto25 = mysql_fetch_array($mlauto25);
$mail_konfirmasi_tujuan_status = $m_auto25['published'];
$mail_konfirmasi_tujuan_isi = $m_auto25['isimail'];
$mail_konfirmasi_tujuan_subject = $m_auto25['subject'];


$mailauto26 = "SELECT * FROM mailtmp WHERE id = '26'"; 
$mlauto26 = mysql_query($mailauto26);
$m_auto26 = mysql_fetch_array($mlauto26);
$mail_konfirmasi_member_status = $m_auto26['published'];
$mail_konfirmasi_member_isi = $m_auto26['isimail'];
$mail_konfirmasi_member_subject = $m_auto26['subject'];

$mailauto34 = "SELECT * FROM mailtmp WHERE id = '34'"; 
$mlauto34 = mysql_query($mailauto34);
$m_auto34 = mysql_fetch_array($mlauto34);
$mail_login_admin_status = $m_auto34['published'];
$mail_login_admin_isi = $m_auto34['isimail'];
$mail_login_admin_subject = $m_auto34['subject'];

$mailauto35 = "SELECT * FROM mailtmp WHERE id = '35'"; 
$mlauto35 = mysql_query($mailauto35);
$m_auto35 = mysql_fetch_array($mlauto35);
$mail_reset_admin_status = $m_auto35['published'];
$mail_reset_admin_isi = $m_auto35['isimail'];
$mail_reset_admin_subject = $m_auto35['subject'];

$mailauto36 = "SELECT * FROM mailtmp WHERE id = '36'"; 
$mlauto36 = mysql_query($mailauto36);
$m_auto36 = mysql_fetch_array($mlauto36);
$mail_aktivasi_deposit_status = $m_auto36['published'];
$mail_aktivasi_deposit_isi = $m_auto36['isimail'];
$mail_aktivasi_deposit_subject = $m_auto36['subject'];

$mailauto41 = "SELECT * FROM mailtmp WHERE id = '41'"; 
$mlauto41 = mysql_query($mailauto41);
$m_auto41 = mysql_fetch_array($mlauto41);
$mail_add_payment_contribute_status = $m_auto41['published'];
$mail_add_payment_contribute_isi = $m_auto41['isimail'];
$mail_add_payment_contribute_subject = $m_auto41['subject'];

$mailauto42 = "SELECT * FROM mailtmp WHERE id = '42'"; 
$mlauto42 = mysql_query($mailauto42);
$m_auto42 = mysql_fetch_array($mlauto42);
$mail_stop_investment_status = $m_auto42['published'];
$mail_stop_investment_isi = $m_auto42['isimail'];
$mail_stop_investment_subject = $m_auto42['subject'];

$mailauto43 = "SELECT * FROM mailtmp WHERE id = '43'"; 
$mlauto43 = mysql_query($mailauto43);
$m_auto43 = mysql_fetch_array($mlauto43);
$mail_addpin_status = $m_auto43['published'];
$mail_addpin_isi = $m_auto43['isimail'];
$mail_addpin_subject = $m_auto43['subject'];

$mailauto44 = "SELECT * FROM mailtmp WHERE id = '44'"; 
$mlauto44 = mysql_query($mailauto44);
$m_auto44 = mysql_fetch_array($mlauto44);
$mail_editbank_status = $m_auto44['published'];
$mail_editbank_isi = $m_auto44['isimail'];
$mail_editbank_subject = $m_auto44['subject'];

$mailauto47 = "SELECT * FROM mailtmp WHERE id = '47'"; 
$mlauto47 = mysql_query($mailauto47);
$m_auto47 = mysql_fetch_array($mlauto47);
$mail_ticket_status = $m_auto47['published'];
$mail_ticket_isi = $m_auto47['isimail'];
$mail_ticket_subject = $m_auto47['subject'];

$mailauto48 = "SELECT * FROM mailtmp WHERE id = '48'"; 
$mlauto48 = mysql_query($mailauto48);
$m_auto48 = mysql_fetch_array($mlauto48);
$mail_transticket_status = $m_auto48['published'];
$mail_transticket_isi = $m_auto48['isimail'];
$mail_transticket_subject = $m_auto48['subject'];

$mailauto49 = "SELECT * FROM mailtmp WHERE id = '49'"; 
$mlauto49 = mysql_query($mailauto49);
$m_auto49 = mysql_fetch_array($mlauto49);
$mail_kirimticket_status = $m_auto49['published'];
$mail_kirimticket_isi = $m_auto49['isimail'];
$mail_kirimticket_subject = $m_auto49['subject'];

$mailauto50 = "SELECT * FROM mailtmp WHERE id = '50'"; 
$mlauto50 = mysql_query($mailauto50);
$m_auto50 = mysql_fetch_array($mlauto50);
$mail_manager_status = $m_auto50['published'];
$mail_manager_isi = $m_auto50['isimail'];
$mail_manager_subject = $m_auto50['subject'];

$mailauto51 = "SELECT * FROM mailtmp WHERE id = '51'"; 
$mlauto51 = mysql_query($mailauto51);
$m_auto51 = mysql_fetch_array($mlauto51);
$mail_autoproses_status = $m_auto51['published'];
$mail_autoproses_isi = $m_auto51['isimail'];
$mail_autoproses_subject = $m_auto51['subject'];

$mailauto52 = "SELECT * FROM mailtmp WHERE id = '52'"; 
$mlauto52 = mysql_query($mailauto52);
$m_auto52 = mysql_fetch_array($mlauto52);
$mail_autoph_status = $m_auto52['published'];
$mail_autoph_isi = $m_auto52['isimail'];
$mail_autoph_subject = $m_auto52['subject'];

$mailauto53 = "SELECT * FROM mailtmp WHERE id = '53'"; 
$mlauto53 = mysql_query($mailauto53);
$m_auto53 = mysql_fetch_array($mlauto53);
$mail_update_password_wallet_status = $m_auto53['published'];
$mail_update_password_wallet = $m_auto53['isimail'];
$mail_update_password_wallet_subject = $m_auto53['subject'];


$mailauto54 = "SELECT * FROM mailtmp WHERE id = '54'"; 
$mlauto54 = mysql_query($mailauto54);
$m_auto54 = mysql_fetch_array($mlauto54);
$mail_add_wallet_status = $m_auto54['published'];
$mail_add_wallet = $m_auto54['isimail'];
$mail_add_wallet_subject = $m_auto54['subject'];


$mailauto55 = "SELECT * FROM mailtmp WHERE id = '55'"; 
$mlauto55 = mysql_query($mailauto55);
$m_auto55 = mysql_fetch_array($mlauto55);
$mail_add_produk_status = $m_auto55['published'];
$mail_add_produk = $m_auto55['isimail'];
$mail_add_produk_subject = $m_auto55['subject'];

$smsauto1 = "SELECT * FROM sms_template WHERE id = '1'"; 
$smse1 = mysql_query($smsauto1);
$smse_auto1 = mysql_fetch_array($smse1);
$sms_register_status = $smse_auto1['published'];
$sms_register_isi = $smse_auto1['isi'];



$smsauto8 = "SELECT * FROM sms_template WHERE id = '8'"; 
$smse8 = mysql_query($smsauto8);
$smse_auto8 = mysql_fetch_array($smse8);
$sms_editpro_status = $smse_auto8['published'];
$sms_editpro_isi = $smse_auto8['isi'];

$smsauto9 = "SELECT * FROM sms_template WHERE id = '9'"; 
$smse9 = mysql_query($smsauto9);
$smse_auto9 = mysql_fetch_array($smse9);
$sms_ubahpass_status = $smse_auto9['published'];
$sms_ubahpass_isi = $smse_auto9['isi'];

$smsauto10 = "SELECT * FROM sms_template WHERE id = '10'"; 
$smse10 = mysql_query($smsauto10);
$smse_auto10 = mysql_fetch_array($smse10);
$sms_profileedit_status = $smse_auto10['published'];
$sms_profileedit_isi = $smse_auto10['isi'];

$smsauto11 = "SELECT * FROM sms_template WHERE id = '11'"; 
$smse11 = mysql_query($smsauto11);
$smse_auto11 = mysql_fetch_array($smse11);
$sms_pinedit_status = $smse_auto11['published'];
$sms_pinedit_isi = $smse_auto11['isi'];



$smsauto14 = "SELECT * FROM sms_template WHERE id = '14'"; 
$smse14 = mysql_query($smsauto14);
$smse_auto14 = mysql_fetch_array($smse14);
$sms_passwalet_status = $smse_auto14['published'];
$sms_passwalet_isi = $smse_auto14['isi'];



$sessnum1 = substr(str_shuffle(str_repeat("12490345678907685914785421307825981654821709562841575806", 64)), 12, 7);
$sessnum2 = substr(str_shuffle(str_repeat("85736486127682810798056748210728653087510738642185234719", 36)), 6, 4);
$kodetrans = $sessnum1+$sessnum2;
$seskod = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZGHIJKL", 64)), 8, 2);
$nota = $seskod."-".$kodetrans;



function ym($username) {
		
		$ymee = "SELECT * FROM member WHERE username ='$username'"; 
        $resultymee = mysql_query($ymee) or die(mysql_error());
$rowymee = mysql_fetch_array($result) or die(mysql_error());
$ymku = $rowymee['bitcoin'];
		echo "<a href='ymsgr:sendIM?$ymku'><img src='http://opi.yahoo.com/online?u=$ymku&m=g&t=1' border='0' title=''></a>";
		//}
	}	




$invest_fr = explode("|", $db->config("kontrak"));
$batas_invest = $invest_fr[0];

$on_backup = $db->config("otb"); 
$periode_backup = $db->config("otn"); 
$tiap_periode = $db->config("bckp"); 
$mail_backup = $db->config("mail_bckp"); 

$daybckp = "SELECT * FROM autoback"; 
$r_bckp = mysql_query($daybckp);
$r_bck = mysql_fetch_array($r_bckp);
$day_backup = $r_bck['day'];	


$auto_profits = $db->config("otos"); 
$jalur_profits = $db->config("profits"); 


$sqlss2="SELECT peringkat2 FROM configuration"; 
$dtss2=mysql_query($sqlss2);
$configss2=mysql_fetch_array($dtss2);
$batasr = explode("|", $configss2['peringkat2']);
$rewardr = explode("|", $configss2['peringkat2']);

$batasrw1 = $batasr[0]; 
$batasrw2 = $batasr[2]; 
$batasrw3 = $batasr[4]; 
$batasrw4 = $batasr[6]; 
$batasrw5 = $batasr[8];
$batasrw6 = $batasr[10];

$reward1 = $rewardr[1]; 
$reward2 = $rewardr[3]; 
$reward3 = $rewardr[5]; 
$reward4 = $rewardr[7]; 
$reward5 = $rewardr[9]; 
$reward6 = $rewardr[11]; 





function dateDiff ($d1, $d2) {

    // Return the number of days between the two dates:    
    return round(abs(strtotime($d1) - strtotime($d2))/86400);

} // end function dateDiff



$getpasskey = "SELECT * FROM configuration"; 
$resultpasskey = mysql_query($getpasskey)or die(mysql_error());
$rowpasskey = mysql_fetch_array($resultpasskey)or die(mysql_error());
$passkey = $rowpasskey['passkey'];
$userkey = $rowpasskey['userkey'];
$apikey = $rowpasskey['api_sms'];
$smsgtw = $rowpasskey['smsgtw'];
$jsms = $rowpasskey['jsms'];


function sendsms($telepon, $isipesan){
$getpasskey = "SELECT * FROM configuration"; 
$resultpasskey = mysql_query($getpasskey)or die(mysql_error());
$rowpasskey = mysql_fetch_array($resultpasskey)or die(mysql_error());
$passkey = $rowpasskey['passkey'];
$userkey = $rowpasskey['userkey'];
$apikey = $rowpasskey['api_sms'];
$smsgtw = $rowpasskey['smsgtw'];
$jsms = $rowpasskey['jsms'];
if($userkey && $passkey){
if($jsms == 1){
$url = "https://reguler.zenziva.net/apps/smsapi.php";
}else{
$url = "https://alpha.zenziva.net/apps/smsapi.php";
}
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $url);
		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($isipesan));
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
		curl_setopt($curlHandle, CURLOPT_POST, 1);
		$results = curl_exec($curlHandle);
		curl_close($curlHandle);
	}
	}
	
	
class smsmasking {
	protected $to;
	protected $text;
	public $username;
	public $password;
	public $idreport;
	public $apikey;

	public function setTo($to) {
		$this->to = $to;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function smssend() {
		if (!$this->to) {
			trigger_error('Error: Phone to required!');
			exit();			
		}

		if (!$this->text)  {
			trigger_error('Error: Text Message required!');
			exit();					
		}
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smsmasking.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey."&number=".$this->to."&message=".urlencode($this->text);
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;
	}
	public function smssaldo() {	
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smssaldo.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}	
	public function smsreport() {	
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smsmaskingreport.php?id=".$this->idreport."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}
}

class smsreguler {
	protected $to;
	protected $text;
	public $username;
	public $password;
	public $idreport;
	public $apikey;

	public function setTo($to) {
		$this->to = $to;
	}

	public function setText($text) {
		$this->text = $text;
	}

	public function smssend() {
		if (!$this->to) {
			trigger_error('Error: Phone to required!');
			exit();			
		}

		if (!$this->text)  {
			trigger_error('Error: Text Message required!');
			exit();					
		}
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smsreguler.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey."&number=".$this->to."&message=".urlencode($this->text);

		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;
	}
	public function smssaldo() {	
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smssaldo.php?username=".urlencode($this->username)."&password=".urlencode($this->password)."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}	
	public function smsreport() {	
		$curlHandle = curl_init();
		$url="http://162.211.84.203/sms/smsregulerreport.php?id=".$this->idreport."&key=".$this->apikey;
		curl_setopt($curlHandle, CURLOPT_URL,$url);
		curl_setopt($curlHandle, CURLOPT_HEADER, 0);
		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curlHandle, CURLOPT_TIMEOUT,120);
		$hasil = curl_exec($curlHandle);
		curl_close($curlHandle);	
		return $hasil;		
	}			
}

?>