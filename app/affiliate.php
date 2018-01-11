<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=./index.php\">";
exit();} 
;echo '';

include("../common.php");

function konekdb() {
	global $server_name, $userdb, $passdb, $databasename;
	mysql_connect( $server_name, $userdb, $passdb ) ;
	mysql_select_db( $databasename );
}

$ip = $_SERVER['REMOTE_ADDR'];
session_start();
$session=session_id();

$resul1 = mysql_query( "SELECT * FROM member WHERE status='1' " );
$i = 0;
while( $rowe = mysql_fetch_array( $resul1 ) ) {
	$rsponsor1[$i]=$rowe['username'];
    $i++;
}

$acak1 = array_rand($rsponsor1,1) ;
$id1=$rsponsor1[$acak1];
$sqlc1 = mysql_query("SELECT usrd FROM configuration WHERE id='1'");
$numc1 = mysql_num_rows($sqlc1);
while($rowc1 = mysql_fetch_array($sqlc1)){
	$ucd1 = $rowc1['usrd'];
	if (!$ucd1){
		$usernmc1 = $id1;
	} else {
		$usernmc1 = $ucd1;
	}
}

if($_GET["id"] || $_GET["reff"]){
	konekdb();
	$id = !empty($_GET["reff"]) ? anti_injection($_GET["reff"]) : anti_injection($_GET["id"]);
	$seleksi = mysql_query( "SELECT * FROM member WHERE username='".mysql_real_escape_string($id)."'" );
	$data = mysql_fetch_array( $seleksi );

	if( mysql_num_rows( $seleksi ) != 1 ) {
		$seleksi1 = mysql_query( "SELECT * FROM member WHERE username='$usernmc1'" );
		$data1 = mysql_fetch_array( $seleksi1 );
		echo "<script type=\"text/javascript\">alert('Maaf, data Sponsor $id tidak ada didalam database kami, Sponsor akan dialihkan secara random');".
		 "window.location = './'</script>";
		session_start();
		$_SESSION["sponsor"] = $data1['username'];
		$_SESSION["nama"] = $data1['nama'];
		$_SESSION["email"] = $data1['email'];
		$_SESSION["alamat"] = $data1['alamat'];
		$_SESSION["kota"] = $data1['kota'];
		$_SESSION["hp"] = $data1['hp'];
		$_SESSION["random"] = "1";
	}
	else{
		$status="0";
		if ( $data['status'] == $status ) {
			$seleksi2 = mysql_query( "SELECT * FROM member WHERE username='$usernmc1'" );
			$data2 = mysql_fetch_array( $seleksi2 );
			echo "<script type=\"text/javascript\">alert('Maaf, data Sponsor $id  belum aktif, Sponsor akan dialihkan secara random');".
			 "window.location = './'</script>";
			session_start();
			$_SESSION["sponsor"] = $data2['username'];
			$_SESSION["nama"] = $data2['nama'];
			$_SESSION["email"] = $data2['email'];
			$_SESSION["alamat"] = $data2['alamat'];
			$_SESSION["kota"] = $data2['kota'];
			$_SESSION["hp"] = $data2['hp'];	
			$_SESSION["random"] = "1";	
		} else {
			//mysql_query("UPDATE member SET hits=hits+1 WHERE username='$data[1]'") or error( mysql_error() );
		
			echo "<meta http-equiv='refresh' content='0;URL=./index.php'>";
			mysql_query("UPDATE member SET hits=hits+1 WHERE username='$data[1]'");
		
			session_start();
			$_SESSION["sponsor"] = $data['username'];
			$_SESSION["nama"] = $data['nama'];
			$_SESSION["email"] = $data['email'];
			$_SESSION["alamat"] = $data['alamat'];
			$_SESSION["kota"] = $data['kota'];
			$_SESSION["hp"] = $data['hp'];
			$_SESSION["random"] = "0";
		
			return true;
			//exit;
		}
	}
}
else{
	if(isset($_SESSION["sponsor"])) {
		return true;
	}
	else{
		konekdb();
		//$status="aktif";
		$resul = mysql_query( "SELECT * FROM member WHERE status='1' " );
		$i = 0;
		while( $row = mysql_fetch_array( $resul ) ){
			$rsponsor[$i]=$row['username'];
			$i++;
		}
		
		$acak = array_rand($rsponsor,1) ;
		$id=$rsponsor[$acak];
		$sqlc = mysql_query("SELECT usrd FROM configuration WHERE id='1'");
		$numc = mysql_num_rows($sqlc);
		while($rowc = mysql_fetch_array($sqlc)){
			$ucd = $rowc['usrd'];
			if (!$ucd){
				$usernmc = $id;
			} else {
				$usernmc = $ucd;
			}
		}
		
		$seleksi = mysql_query( "SELECT * FROM member WHERE username='$usernmc'" );
		$data = mysql_fetch_array( $seleksi );
   
		//mysql_query("UPDATE member SET hits=hits+1 WHERE username='$data[1]'") or error( mysql_error() );
		if (!isset($_COOKIE['hits'])) {
			mysql_query("UPDATE member SET hits=hits+1 WHERE username='$data[1]'") ;
			setcookie("hits", "yes", time() + 31536000, "/", "", "0");
		}
	
		$_SESSION["sponsor"] = $data['username'];
		$_SESSION["nama"] = $data['nama'];
		$_SESSION["email"] = $data['email'];
		$_SESSION["alamat"] = $data['alamat'];
		$_SESSION["kota"] = $data['kota'];
		$_SESSION["hp"] = $data['hp'];
		$_SESSION["random"] = "1";
		return true;
	}			
}
?>