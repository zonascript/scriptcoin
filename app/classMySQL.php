<?php
if (basename($_SERVER['SCRIPT_FILENAME']) == basename(__FILE__)){
echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";
echo "<meta http-equiv=\"refresh\" content=\"2; url=./index.php\">";
exit();} 
?>

<?php
	class db_layout {  
		var $classname="db_layout";  
  
		var $db_name;  
		var $db_user;  
		var $db_password;  
		var $db_host;  
		var $db_link_ptr;  
		  
		var $tables;  
		var $fields;  
		  
	}  
  
	class db_mysql extends db_layout {  
		var $classname="db_mysql";  
  
		var $db_result;  
		var $db_affected_rows;  
  
		var $saved_results=array();  
		var $results_saved=0;  
		  
		function error($where="",$error,$errno) {  
			echo "$where<br>";  
			die($error."<br>".$errno);  
		}  
				  
		function error_msg() {  
			return mysql_error();  
		}  
		  
		function PushResults() {  
			$this->saved_results[$this->results_saved]=array($this->db_result,$this->db_affected_rows);  
			$this->results_saved++;  
		}  
		  
		function PopResults() {  
			$this->results_saved--;  
			$this->db_result=$this->saved_results[$this->results_saved][0];  
			$this->db_affected_rows=$this->saved_results[$this->results_saved][1];  
		}  
		  
		function db_mysql($host, $user, $passwd, $db, $create="") {  
			$this->db_name=$db;  
			$this->db_user=$user;  
			$this->db_passwd=$passwd;  
			$this->db_host=$host;  
			  
			$this->db_link_ptr=@mysql_connect($host,$user,$passwd) or $this->error("",mysql_error(),mysql_errno());  
			$this->dbhandler=@mysql_select_db($db);  
			if (!$this->dbhandler) {  
				if ($create=="1")  {  
					@mysql_create_db($db,$this->db_link_ptr) or $this->error("imposible crear la base de datos.",mysql_error(),mysql_errno());;  
					$this->dbhandler=@mysql_select_db($db);  
				}  
			}  
		}  
  
		function reselect_db($db){  
			$this->dbhandler=@mysql_select_db($db);  
		}  
		  
		function closeDB() {  
			@mysql_close($this->db_link_ptr);  
		}  
		  
		function create_table($tblName,$tblStruct) {  
			if (is_array($tblStruct)) $theStruct=implode(",",$tblStruct); else $theStruct=$tblStruct;  
			@mysql_query("create table $tblName ($theStruct)") or $this->error("create table $tblName ($theStruct)",mysql_error(),mysql_errno());  
		}  
		  
		function drop_table($tblName) {  
			@mysql_query("drop table if exists $tblName") or $this->error("drop table $tblName",mysql_error(),mysql_errno());  
		}  
		  
		function raw_query($sql_stat) {  
			$this->db_result=@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
			$this->db_affected_rows=@mysql_num_rows($this->db_result);  
		}  
  
		function count_records($table,$filter="") {  
			$this->db_result=@mysql_query("select count(*) as num from $table".(($filter!="")?" where $filter" : ""));  
			$xx=@mysql_result($this->db_result,0,"num");  
			return $xx;  
		}  
				  
		function select($fields,$tables,$where="",$order_by="",$group_by="",$having="",$limit="") {  
			  
			$sql_stat=" select $fields from $tables ";  
			  
			if (!empty($where)) $sql_stat.="where $where ";  
			if (!empty($group_by)) $sql_stat.="group by $group_by ";  
			if (!empty($order_by)) $sql_stat.="order by $order_by ";  
			if (!empty($having)) $sql_stat.="having $having ";  
			if (!empty($limit)) $sql_stat.="limit $limit ";  
			  
			$this->db_result=@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
			$this->db_affected_rows=@mysql_num_rows($this->db_result);  
			  
			return $sql_stat;  
		}  
		  
		function list_tables() {  
			$this->db_result=@mysql_list_tables($this->db_name);  
			$this->db_affected_rows=@mysql_num_rows($this->db_result);  
			return $this->db_result;  
		}  
		
                function describe($tablename) {
                        $this->result=@mysql_query("describe $tablename");
                }

                function table_exists($tablename) {
                        $this->pushresults();
                        $description=$this->describe($tablename);
                        $this->popresults();
                        if ($description) $exists=true; else $exists=false;
                        return $exists;
                }

		function tablename($tables, $tbl) {  
			return mysql_tablename($tables,$tbl);  
		}  
  
		function insert_id() {  
			return mysql_insert_id();  
		}  
				  
		function insert($table,$fields="",$values="") {  
			$sql_stat="insert into $table ";  
			  
			if (is_array($fields)) $theFields=implode(",",$fields); else $theFields=$fields;  
			if (is_array($values)) $theValues="'".implode("','",$values)."'"; else $theValues=$values;  
			  
			$theValues=str_replace("'now()'","now()",$theValues);  
			  
			if (!empty($theFields)) $sql_stat.="($theFields) ";  
			$sql_stat.="values ($theValues)";  
			  
			@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
		}  
  
		function update($table,$newvals,$where="") {  
			if (is_array($newvals)) $theValues=implode(",",$newvals); else $theValues=$newvals;  
			  
			$sql_stat="update $table set $theValues";  
			  
			if (!empty($where)) $sql_stat.=" where $where";  
			@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
		}  
		  
		function delete($table,$where="") {  
			  
			$sql_stat="delete from $table ";  
			  
			if (!empty($where)) $sql_stat.="where $where ";  
			  
			$db_result2=@mysql_query($sql_stat) or $this->error($sql_stat,mysql_error(),mysql_errno());  
			$this->db_affected_rows=@mysql_affected_rows($this->db_result2);  
		}  
		  
		function free() {  
			@mysql_free_result($this->db_result) or $this->error("",mysql_error(),mysql_errno());  
		}  
		  
		function fetch_row() {  
			$row=mysql_fetch_row($this->db_result);  
			return $row;  
		}  
        function num_fields(){  
			return mysql_num_fields($this->db_result);  
		}  
		  
		function fetch_array() {  
			$row=mysql_fetch_array($this->db_result);  
			return $row;  
		}  
  
		function fetch_field() {  
			$row=mysql_fetch_field($this->db_result);  
			return $row;  
		}  
		function num_rows() {  
			$row=mysql_num_rows($this->db_result);  
			return $row;  
		} 
		function result($recno,$field) {  
			if($this->num_rows() > 0) {
				return mysql_result($this->db_result,$recno,$field);  
			}	
		}  
  
		
		function dataku($field, $username) {
			$this->select($field, "member", "username='$username'");
			$dt = $this->result(0,$field); 
			return $dt;
		}
		
		function datane($field, $username) {
			$this->select($field, "member", "accid='$username'");
			$dt = $this->result(0,$field); 
			return $dt;
		}
	
		function datapaket($field, $username) {
			$this->select($field, "dataewaletcoin3", "username='$username'");
			$dt = $this->result(0,$field); 
			return $dt;
		}
		
		function datawalet($field, $username) {
			$this->select($field, "ewalet", "accid='$username'");
			$dt = $this->result(0,$field); 
			return $dt;
		}
		
		function datawalete($field, $username) {
			$this->select($field, "ewalet", "username='$username'");
			$dt = $this->result(0,$field); 
			return $dt;
		}
	
		//function datareff($field, $username) {
		//	$this->select($field, "affiliate", "username='$username'");
		//	$dt = $this->result(0,$field); 
		//	return $dt;
		//}	

		function datasto($field, $username) {
			$this->select($field, "stockist", "username='$username'");
			$dt = $this->result(0,$field); 
			return $dt;
		}
		
		function subkat($kat,$sub) {
			$this->select($kat, "katagori", "sub='$sub'");
			$dt = $this->result(0,$kat); 
			return $dt;
		}	
		function data($field, $table, $cond) {
			$this->select($field, $table, $cond);
			$dt = $this->result(0, $field);
			return $dt;
			
		}	
		function iklan_lama($username) {
	//$sql=myquery("select * from iklan where userid='$username' and status=1");
	//$j = mysql_num_rows($sql);
			$this->select("no, judul", "iklan", "userid='$username' and status=0");
			$j = $this->num_rows();
			if($j > 0) {
				$ada = $j;
			} else {
				$ada = 0;
			}
			return $ada;
		}	
		function publikasi($username) {
	//$sql=myquery("select * from iklan where userid='$username' and status=1");
	//$j = mysql_num_rows($sql);
			$this->select("no, judul", "berita", "username='$username'");
			$j = $this->num_rows();
			if($j > 0) {
				$ada = $j;
			} else {
				$ada = 0;
			}
			return $ada;
		}	
		
		function katiklan($no) {
			$this->select("id, title", "categories", "id='$no'");
			$kat = $this->fetch_row();
			return $kat[1];
		}
		function config($field) {
			//$this->select($field, "configuration", "id=1");
			//$kat = $this->result(0, $field);
			$sql=mysql_query("select $field from configuration where id=1");
			if($sql === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
			$row=mysql_fetch_row($sql);
			$kat = $row[0];
			return $kat;
		}	
		function config2($field) {
			//$this->select($field, "configuration", "id=1");
			//$kat = $this->result(0, $field);
			$sql=mysql_query("select $field from admin where id=1");
			if($sql === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
			$row=mysql_fetch_row($sql);
			$kat = $row[0];
			return $kat;
		}		
		
		
		function configs($field) {
			//$this->select($field, "configuration", "id=1");
			//$kat = $this->result(0, $field);
			$sql=mysql_query("select options_value from udb_options where options_key='$field'");
			if($sql === FALSE) {
    die(mysql_error()); // TODO: better error handling
}
			$row=mysql_fetch_row($sql);
			$kat = $row[0];
			return $kat;
		}			
		
			
		function downline($level, $st, $username) {
			$jdl = 0;
			//$jdl = $this->count_records("member", "sponsor='$username' and status=$st");
			//$jdl = $this->num_rows();
			$sql=mysql_query("select * from member where $level='$username' and status=$st");
			$jdl = mysql_num_rows($sql);
			return $jdl;
		}
		
		function klik($username) {
			$cl = 0;
			$this->select("*", "click", "refid='$username'");
			$cl = $this->num_rows();
			return $cl;
		}	
		function totbonus($username, $st, $sp) {
			$tb = 0;
			$sql=mysql_query("select rp1, rp2 from member where $sp='$username' and status=$st");
			while($row = mysql_fetch_row($sql)) {
			//$this->select("username, rp1, rp2", "member", "$sp='$username' and status=$st");
				if($sp == "sponsor") {
					$tb = $tb + $row[0];
				} else {
					$tb = $tb + $row[1];
				}	
			}		
			//$acak = substr($db->dataku("rpadmin", $username);
			
			return $tb;
		}	
		//----topmenu--
		
		function topmenu() {
			$sql=$this->select("id, name, alias, link", "menu", "published=1", "ordering");
		//mysql_close();
			$n = $this->num_rows();
			echo "<ul>";
			for($i=0;$i<$n;$i++)
		 	{
				$mx = explode("=", $this->result($i, "link"));
				$ma = $mx[2];
				
				$mb = explode("&", $mx[1]);
				$catid = $mb[1];
				if($m == "contact") {
					$cl = "class=current";
				} else {
					$cl = "";
				}			
				echo "<li><a href='".$this->result($i, "link")."' $cl><span>".$this->result($i, "name")."</span>$m</a></li>";
			}
			echo "</ul>";
		}
		//----end topmenu	
		function delete_html($form_name) 
		{ 

			$form_name = str_replace("[", "", "$form_name"); 
			$form_name = str_replace("]", "", "$form_name"); 
			$not ="\"'*\abcdefghijklmnopqrstuvwxyz1234567890&#225;&#233;&#237;&#243;&#250;&#253;&#226;&#234;&#238;&#244;&#251;&#224;&#232;&#236;&#242;&#249;&#231;&#228;&#235;&#239;&#246;&#252;&#255;=~`@#$%^&*()_{}\n\t\r\ /;:.!?,+-"; 
			$form_name = eregi_replace("(</)+[$not]+(>)", "", "$form_name"); 
			$form_name = eregi_replace("(<)+[$not]+(>)", "", "$form_name"); 
			
			$form_name = str_replace("<", "", $form_name); 
			$form_name = str_replace(">", "", $form_name); 
			$form_name = htmlspecialchars($form_name); 
			
			return $form_name; 
			} 
			//---
		function crops($teks, $jh) {
				
				$ISIBERITA = $teks;
			$b_bagianberita = $jh;
			$TMPBAGIANBERITA = array();
			$TMP = explode(" ", $ISIBERITA);
			for($i=0;$i<=$b_bagianberita;$i++)
			{
				$TMPBAGIANBERITA[$i] = $TMP[$i];
			}
			$BAGIANBERITA = implode(" ", $TMPBAGIANBERITA);	
			
  			$dt=$BAGIANBERITA;
			return $dt;
		} 

		function news($ref) {
			$this->select("id_berita, judul, isi_berita, tanggal, published", "berita", "published=1", "id_berita", "", "", "1");
			$ada = $this->num_rows();
			for($i=0;$i<$ada;$i++) {
				$text = $this->result($i, "isi_berita");
				$tgcr = $this->result($i, "tanggal");
				echo "<h4><a href='?m=detailberita&nid=".$this->result($i, "id_berita")."&id=$ref'>".$this->result($i, "judul")."</a></h4>";
				echo "<div class='author'>".formatgl($tgcr)."</div>";
				echo "<br>";
				$text0 = $this->crops($this->delete_html($text), 8);
				echo "$text0...";
				echo "<br>";
				echo "<br>";
				echo "<br>";
			}
		}		
		function news_admin($ref) {
			$this->select("id, title, maintext, created", "content", "catid=21 and published=1", "created desc", "", "", "1");
			$ada = $this->num_rows();
			for($i=0;$i<$ada;$i++) {
				$text = $this->result($i, "maintext");
				$tgcr = $this->result($i, "created");
				echo "<h4><a href='?m=info_admin&nid=".$this->result($i, "id")."&id=$ref'>".$this->result($i, "title")."</a></h4>";
				echo "<div class='author'>".formatgl($tgcr)."</div>";
				echo "<br>";
				$text0 = $this->crops($this->delete_html($text), 8);
				echo "$text0...";
				echo "<br>";
				echo "<br>";
				echo "<br>";
			}
		}		
		
		function newshead($ref) {

			$this->select("id, title, maintext, created", "content", "catid=72 and published=1", "created desc", "", "", "");

			$ada = $this->num_rows();

			for($i=0;$i<$ada;$i++) {

				$text = $this->result($i, "maintext");

				$tgcr = $this->result($i, "created");

				$text0 = $this->crops($this->delete_html($text), 8);

				echo "$text";

			}
			
		}
		
		function office($ref) {
			$this->select("id, title, maintext, created", "content", "catid=71 and published=1", "created desc", "", "", "1");
			$ada = $this->num_rows();
			for($i=0;$i<$ada;$i++) {
				$text = $this->result($i, "maintext");
				$tgcr = $this->result($i, "created");
				//echo "<h4><a href='?m=news&nid=".$this->result($i, "id")."&id=$ref'>".$this->result($i, "title")."</a></h4>";
				//echo "<div class='author'>".formatgl($tgcr)."</div>";
				$text0 = $this->crops($this->delete_html($text), 8);
				echo "$text";
			}
		}	
		
		function gallery($ref) {

			$this->select("id, title, maintext, created", "content", "catid=53 and published=1", "created desc", "", "", "");

			$ada = $this->num_rows();

			for($i=0;$i<$ada;$i++) {

				$text = $this->result($i, "maintext");

				$tgcr = $this->result($i, "created");

				$text0 = $this->crops($this->delete_html($text), 8);

				echo "$text";

			}

		}	
		
		function layanan($ref) {
			$this->select("id, title, maintext, created", "content", "catid=41 and published=1", "created desc", "", "", "1");
			$ada = $this->num_rows();
			for($i=0;$i<$ada;$i++) {
				$text = $this->result($i, "maintext");
				$tgcr = $this->result($i, "created");
				//echo "<h4><a href='?m=news&nid=".$this->result($i, "id")."&id=$ref'>".$this->result($i, "title")."</a></h4>";

				//echo "<div class='author'>".formatgl($tgcr)."</div>";
				$text0 = $this->crops($this->delete_html($text), 8);
				echo "$text";
			}
		}
		function goldenways($ref) {
			$this->select("id, title, maintext, created", "content", "catid=76 and published=1", "created desc", "", "", "1");
			$ada = $this->num_rows();
			for($i=0;$i<$ada;$i++) {
				$text = $this->result($i, "maintext");
				$tgcr = $this->result($i, "created");
				//echo "<h4><a href='?m=news&nid=".$this->result($i, "id")."&id=$ref'>".$this->result($i, "title")."</a></h4>";

				//echo "<div class='author'>".formatgl($tgcr)."</div>";
				$text0 = $this->crops($this->delete_html($text), 8);
				echo "$text";
			}
		}
		
		function smsaktivasi($ref) {
			$this->select("id, title, maintext, created", "content", "catid=54 and published=1", "created desc", "", "", "1");
			$ada = $this->num_rows();
			for($i=0;$i<$ada;$i++) {
				$text = $this->result($i, "maintext");
				$tgcr = $this->result($i, "created");
				//echo "<h4><a href='?m=news&nid=".$this->result($i, "id")."&id=$ref'>".$this->result($i, "title")."</a></h4>";

				//echo "<div class='author'>".formatgl($tgcr)."</div>";
				$text0 = $this->crops($this->delete_html($text), 8);
				echo "$text";
			}
		}
		
		function dataupline($field, $username) {
			$dup = "";
			$this->select("$field", "upline", "username='$username'");
			$dup = $this->result(0, $field);
			return $dup;
		}	
		
		function tree($username) {
			$tr = "";
			$this->select("id", "tree", "username='$username'");
			$tr = $this->result(0, "id");
			return $tr;
		}	
		
		//------------CARI LEVEL-------
		function levelmbr($username, $posisine) {
		$jlv = 0;
		//-----------cari level tertinggi-------------
			$slv="select * from upline order by level desc";
			$rlv=mysql_query($slv);
			
			$slev=mysql_fetch_array($rlv);
			if($slev["level"] <= 20) {
				$jmlev=$slev["level"];
			} else {
				$jmlev = 20;
			}
	//$jmlev=$slev["level"];
			$sqlki="select a.username, b.status from upline as a inner join member as b on a.username=b.username where a.upline0='$username' and a.posisi='$posisine' and b.status=1";

			$rki=mysql_query($sqlki);
			
			$kir=mysql_fetch_array($rki);
			$adaki=mysql_num_rows($rki);
		
			$user=$kir[0];

				
			if ($adaki > 0)
			{
				//$user=$this->result(0, "a.username");
				for($i=0;$i<$jmlev;$i++)
				{
					$sql2="select a.username, b.status from upline as a inner join member as b on a.username=b.username where upline$i='$user' and b.status=1";
			
				$res=mysql_query($sql2);
				
				$jml=array();
			//$levkir=array();
				$jml[$i]=mysql_num_rows($res);
			
				$lv= 1 + $i;
			
				if ($jml[$i] > 0)
					{
						$jl=$lv;			
					} 	
				
				}
				$tb = 1;
		
			
				} else {
				$jl=0;
				$tb = 0;
			}
			$jlv = $jl + $tb;
			//echo "level = $jlv";
			return $jlv;
		}
		//-------	
		//-----------match-------------
		function match($username) {
			$mt="";	
			//	if($dtgl == "") {
			$kia=memberL1($username, "and b.status=1"); 
			$kaa=memberL2($username, "and b.status=1"); 
			//} else {
			//$kia=$this->levelmbr($username, "KIRI"); 
			//$kaa=$this->levelmbr($username, "KANAN"); 
		//	}
			if($kia > $kaa) {
				$match = $kaa;
				$ki_unmatch = $kia - $kaa;
				$ka_unmatch = $kaa - $kia;
			} else {
				$match = $kia;
				$ki_unmatch = $kaa - $kia;
				$ka_unmatch = $kia - $kaa;
			}
			$mt= $match;
			return $mt;
			
		}
		
		//--------jumlah downline 
		function jumlahdl($username, $status) {
			//$this->select("level", "upline", "", "level desc");
			$lev = mysql_query("select level from upline order by level desc");
			$lv = mysql_fetch_row($lev);
			    if($lv[0] > 20){
				$jmlev = 20;
				} else {
				$jmlev = $lv[0];
				}
			for($i=0;$i<$jmlev;$i++) {
				$sql=mysql_query("SELECT a.username, b.status FROM upline as a INNER JOIN member as b on a.username=b.username WHERE a.upline$i='$username' AND b.status='$status'");
				
				//while($dw=mysql_fetch_row($sql)) {
				//	$td = $td + 
				$ada = mysql_num_rows($sql);
				$td = $td + $ada;
			}
			$jdl = $td;
			return $jdl;
		}
		
		//---jlm yg disponsori

		function jumlahsp($username) {

			$j=0;

			$sql=mysql_query("select username from member where sponsor='$username' and status=1");

			$j=mysql_num_rows($sql);

			return $j;

		}
		
		//-----aktivasi--
		function aktivasi($username) {
			$clientdate    = (date ("Y-m-d H:i:s")); //--tgl skr
			$tgl_skr = (date("Y-m-d"));
			
			$dtfrom = "$tgl_skr 00:00:00";
			$dtto = "$tgl_skr 23:59:59";
			//---update status mbr----
		$sql=mysql_query("select username, id_aktivasi from member where status=1 order by id_aktivasi DESC");
		if(mysql_num_rows($sql) > 0) {
		$mbr = mysql_fetch_row($sql);
		$last_id = (int)$mbr[1];
		} else {
		$last_id = 0;
		}
		$new_id = (int)$last_id + 1;
		$id_aktivasi = $new_id;
			$this->update("member", "status=1, tglaktif='$clientdate',id_aktivasi='$id_aktivasi'", "username='$username'");
			$this->select("username", "komisi", "dari='$username'");
			if($this->num_rows() == 0) {
				//---input komisi sponsor----
			//	$sponsore = $this->dataku("sponsor", $username);
			//	$paketex = $this->dataku("harga", $username);
				////$mypaket = $this->dataku("adminrp", $username);
				//$k_spon = explode("|", $this->config("komisi_sponsor"));
				//$komspon = $k_spon[0];
				
			//	if($paketex == 1){
					//$komsponx = ($k_spon[0]/100)*$mypaket;
			//	}else if($paketex == 2){
				//	$komsponx = ($k_spon[1]/100)*$mypaket;
			//	}else if($paketex == 3){
			//		$komsponx = ($k_spon[2]/100)*$mypaket;
			//	}else if($paketex == 4){
			//		$komsponx = ($k_spon[3]/100)*$mypaket;
			//	}else if($paketex == 5){
				//	$komsponx = ($k_spon[4]/100)*$mypaket;
				//}else{}
					
				
				
				//$duitex = $this->dataku("rupiah", $username);
				//$komsponx = ($k_spon[1]/100)*$duitex;
				//if($sponsore && $komsponx > 0) {
				//	$this->insert("komisi", "", "'', '$sponsore', '$komsponx', '$clientdate', '0', '', 'komsponsor', '$username', '', '000'");
			//	}
			//	if($sponsore && $k_spon[1] > 0) {
					//$this->insert("komisi", "", "'', '$sponsore', '$komsponx', '$clientdate', '0', '', 'komdeposit', '$username'");
				//}
				//	$jsp=$this->jumlahsp($sponsore);
				//	$this->update("upline", "sp='$jsp'", "username='$sponsore'");
		
		      
		
		
			//----komisi pasangan---
				
				
				
				//$level = $this->dataupline("level", $username);
				
			//	if($level > 20){
			//	$levelx = 20;
			////	} else {
			//	$levelx = $level;
			//	}
			////	
				//$kompas = $this->config("kompasangan");
			//	$kompase = explode("|", $kompas);
			//	$k_pas1 = $kompase[0];
			//	$k_pas2 = $kompase[1];
			//	$k_pas3 = $kompase[2];
			//	$k_pas4 = $kompase[3];
			//	$k_pas5 = $kompase[4];
			//	$flush = $this->config("flushout");
			//	$flushe = explode("|", $flush);
			//	$flushe1 = $flushe[0];
			//	$flushe2 = $flushe[1];
			//	$flushe3 = $flushe[2];
			//	$flushe4 = $flushe[3];
			//	$flushe5 = $flushe[4];
				
				
				//if($paketex == 1){
				//	$pasange = $k_pas1;
				//	$flusnya = $flushe1;
				//}else if($paketex == 2){
				//	$pasange = $k_pas2;
				//	$flusnya = $flushe2;
			//	}else if($paketex == 3){
				//	$pasange = $k_pas3;
				//	$flusnya = $flushe3;
			//	}else if($paketex == 4){
				//	$pasange = $k_pas4;
				//	$flusnya = $flushe4;
			//	}else if($paketex == 5){
				//	$pasange = $k_pas5;
					//$flusnya = $flushe5;
				//}else{}
					
					
					
			//	for($i=0;$i<$level;$i++) {
					//$upli = $this->dataupline("upline$i", $username);
					//$matchnow=$this->match($upli);
					
				//	$match=$this->dataupline("kp", $upli);
				
					//--cek jml kompas--
					
					
					
					
				//	$uql = mysql_query("select username from komisi where jenis='kompasangan' and username='$upli'"); 
				//	$matchkit = mysql_num_rows($uql); 
					
               //  $sbl2gggg=mysql_query("select SUM(bayar) from komisi where jenis='kompasangan' and username='$upli' and (tglbayar between '$dtfrom' and '$dtto')");
	
	              //   while($row2gggg=mysql_fetch_row($sbl2gggg)) {
		           //  $total2gggg = $row2gggg[0];
		           // }

                 
                // if($matchnow == $matchkit + 1) {
                // if($total2gggg < $flusnya) {
				//	 
             
			    //$this->insert("komisi", "", "'', '$upli', '$pasange', '$clientdate', '0', '', 'kompasangan', '$username', '', '000'");
              //  $this->update("upline", "kp='$matchnow'", "username='$upli'");
              //
              //  }	
             ///   }	
              //  } //--end if match
				
				
				
			
			//---komisi level---
				$tkt = $this->config("kedalaman");
				$kolev = $this->config("komlev");
				for($i=0;$i<$level;$i++) {
					$j = $i + 1;
					$komlev = explode("|", $kolev);
					$upli = $this->dataupline("upline$i", $username);
					if($upli) {
						//$this->insert("komisi", "", "'', '$upli', '$komlev[$i]', '$clientdate', '0', '', 'Level-$j', '$username'");
					}
				}
				
				
			}		
		}	
		
		//---input komjual--
		function insertkomjual($username, $harga) {
			$clientdate    = (date ("Y-m-d H:i:s"));
			$tkt = $this->config("kedalaman");
			$level = $this->dataupline("level", $username);
			$kdlm = explode("|", $tkt);
			$kd = $kdlm[1];
			$kolev = $this->config("komjual");
				for($i=0;$i<$level;$i++) {
					if($level <= 10) { //---sd levl 10
						$j = $i + 1;
						$komlev = explode("|", $kolev);
						$upli = $this->dataupline("upline$i", $username);
						$tj = ($komlev[$i] * $harga)/100;
						if($upli) {
						//	$this->insert("komisi", "", "'', '$upli', '$tj', '$clientdate', '0', '', 'komjual$j', '$username'");
						}
					} //--end if level	
				}
			}	
		//-------total KOMISI-------
		function totalkomisi($username, $dtgl) {
			$kom="";
			$skom="SELECT * FROM komisi WHERE username ='$username' $dtgl";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[2];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}	
		
		//-------total KOMISI-------
		function totalkomisi2($username, $dtgl) {
			$kom="";
			$skom="SELECT * FROM compound WHERE username ='$username' $dtgl";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[2];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}	
		
		function bayarkomisi($username, $dtgl) {
			$kom="";
			$skom="SELECT rp FROM transfer WHERE userid='$username' AND status=1 $dtgl";
			$dkom=mysql_query($skom);
			$ada=mysql_num_rows($dkom);
			if($ada > 0) {
				$komi = 0;
				while($rkom=mysql_fetch_row($dkom)) {
					$komi = $komi + $rkom[0];
				}
				$kom = $komi;
			} else {
				$kom = 0;
			}
			return $kom;
		}	

		//----cari jml perlevel--
		function jmlmember($username, $field) {
			$jm = 0;
			$this->select("a.username, a.status, a.blokir, b.sponsor", "member as a inner join upline as b on a.username=b.username", $field);
			$jm = $this->num_rows();
			return $jm;
		}		
		//---- ICO --
		
				function myico() {
			$this->select("jumlah, sisa, status,status2", "ico", "where status=1 and status2=1");
			$token = 0;
			while($row=$this->fetch_row()) {
				if($row[1] > 0) { //---status 1 = kredit. status 0 = debet
					$ja = $row[0];
				} else {
					$ja = -($row[1]);
				}		
				$token = $token + $ja;
			}
			return $token;
		}	
		

		
		
		//----ewalet---
		function myewalet($username) {
			$te = 0;
			
			$te = $this->myewaletdone($username);
			return $te;
		}	
		function myewaletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jlhbtc, tujuan from dataewalet2 where tujuan='$username' and status='0' and jenis='btc'");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataewalet2 where username='$username' and status='0' and jenis='btc'");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function myewaletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from dataewalet2 where tujuan='$username' and status='1' and jenis='btc'");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataewalet2 where username='$username' and status='1' and jenis='btc'");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}	
		
		
		//--icowalet
		
				function icoewalet($username) {
			$te = 0;
			
			$te = $this->icoewaletdone($username);
			return $te;
		}	
		function icoewaletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from dataewalet2 where tujuan='$username' and status='0' and jenis='coin'");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataewalet2 where username='$username' and status='0' and jenis='coin'");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function icoewaletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from dataewalet2 where tujuan='$username' and status='1' and jenis='coin'");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataewalet2 where username='$username' and status='1' and jenis='coin'");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}	
		//---- cwalet--
		
		function mycwalet($username) {
			$te = 0;
			
			$te = $this->mycwaletdone($username);
			return $te;
		}	
		function mycwaletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datacwalet where tujuan='$username' and status=0");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from datacwalet where username='$username' and status=0");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function mycwaletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datacwalet where tujuan='$username' and status=1");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from datacwalet where username='$username' and status=1");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}
		
		
		
				//----ewalet---
		function mycwallet($username) {
			$te = 0;
			
			$te = $this->mycwalletdone($username);
			return $te;
		}	
		function mycwalletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datacwalet where tujuan='$username' and status=0");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from datacwalet where username='$username' and status=0");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function mycwalletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datacwalet where tujuan='$username' and status=1");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from datacwalet where username='$username' and status=1");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}
		
		
		
		
		
		
		//----ewalet---
		function mybwallet($username) {
			$te = 0;
			
			$te = $this->mybwalletdone($username);
			return $te;
		}	
		function mybwalletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from databwallet where tujuan='$username' and status=0");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from databwallet where username='$username' and status=0");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function mybwalletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from databwallet where tujuan='$username' and status=1");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from databwallet where username='$username' and status=1");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}
		
		
			//----ewalet---
		function myvwalet($username) {
			$te = 0;
			
			$te = $this->myvwaletdone($username);
			return $te;
		}	
		function myvwaletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datadwalet where tujuan='$username' and status=0");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from datadwalet where username='$username' and status=0");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function myvwaletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datadwalet where tujuan='$username' and status=1");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from datadwalet where username='$username' and status=1");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}
		
		
		
		
		
		
		//----ewalet---
		function myrwallet($username) {
			$te = 0;
			
			$te = $this->myrwalletdone($username);
			return $te;
		}	
		function myrwalletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datarwallet where tujuan='$username' and status=0");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from datarwallet where username='$username' and status=0");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function myrwalletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from datarwallet where tujuan='$username' and status=1");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--

			$sqla = mysql_query("select username, jumlah, tujuan from datarwallet where username='$username' and status=1");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}
		
		
		
		//----ewalet---
		function myeawallet($username) {
			$te = 0;
			
			$te = $this->myeawalletdone($username);
			return $te;
		}	
		function myeawalletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from dataeawallet where tujuan='$username' and status=0");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataeawallet where username='$username' and status=0");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function myeawalletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from dataeawallet where tujuan='$username' and status=1");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataeawallet where username='$username' and status=1");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}
		
		
		
		
			
		//----ewalet---
		function myswallet($username) {
			$te = 0;
			
			$te = $this->myswalletdone($username);
			return $te;
		}	
		function myswalletpending($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from dataswallet where tujuan='$username' and status=0");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataswallet where username='$username' and status=0");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted + $tek;
			return $te;
		}	
		
		function myswalletdone($username) {
			$te = 0;
			//--ngitung kredit--
			$sql = mysql_query("select username, jumlah, tujuan from dataswallet where tujuan='$username' and status=1");
			$a = mysql_num_rows($sql);
			$ted = 0;
			while($row=mysql_fetch_row($sql)) {
			//for($i=0;$i<$a;$i++) {
				$ted = $ted + $row[1];
			}
			//---ngitung debet--
			$sqla = mysql_query("select username, jumlah, tujuan from dataswallet where username='$username' and status=1");
			//$a = mysql_num_rows($sql);
			$tek = 0;
			while($rowa=mysql_fetch_row($sqla)) {
				$tek = $tek + $rowa[1];
			}	
			$te = $ted - $tek;
			return $te;
		}
		
		
		
		
		
		
		
		
		//---saldo admin--
		function saldoadmin($dtgl) {
			$this->select("jumlah, status", "transaksi", $dtgl);
			$sa = 0;
			while($row=$this->fetch_row()) {
				if($row[1] > 0) { //---status 1 = kredit. status 0 = debet
					$ja = $row[0];
				} else {
					$ja = -($row[0]);
				}		
				$sa = $sa + $ja;
			}
			return $sa;
		}	
		
		//----banner-----
		function banner() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner", "published=1", "RAND() LIMIT 5");
			while($row=$this->fetch_row()) {
				echo "<a href='./adsku.php?bid=$row[0]' target='_blank'><img src='images/banner/$row[2]' alt='$row[1]' title='$row[1]' border=0 /></a><br><br>";
			}
			//return $bn;	
		}	
		function bannerb() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner", "published=1", "RAND() LIMIT 5");
			while($row=$this->fetch_row()) {
				echo "<a href='../adsku/$row[0]' target='_blank'><img src='../images/banner/$row[2]' alt='$row[1]' title='$row[1]' border=0/></a><br><br>";
			}
			//return $bn;	
		}	
               //----banner-----
		function banner2() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_kanan", "published=1", "RAND() LIMIT 2");
			while($row=$this->fetch_row()) {
			$adafoto = $row[2];
			$dirfoto = "images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "images/banner/$row[2]";
		}
		else
		{
		$potoe = "images/image-not-available.jpg";
		}
				echo "<a href='./ads.php?bid=$row[0]' target='_blank'><img src='$potoe' alt='$row[1]' title='$row[1]' border=0 height='125'/></a>&nbsp;&nbsp;";
			}
			//return $bn;	
		}	 
		
		  //----banner-----
		function banner2b() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_kanan", "published=1", "RAND() LIMIT 2");
			while($row=$this->fetch_row()) {
			$adafoto = $row[2];
			$dirfoto = "../images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "../images/banner/$row[2]";
		}
		else
		{
		$potoe = "../images/image-not-available.jpg";
		}
				echo "<a href='../ads.php?bid=$row[0]' target='_blank'><img src='$potoe' alt='$row[1]' title='$row[1]' border=0 height='125'/></a>&nbsp;&nbsp;";
			}
			//return $bn;	
		}	 
		function bannerlogo() {
		//$bn = "";
			$this->select("id, nama, banner, url", "banner_logo", "published=1 and id=1", "ordering");
			while($row=$this->fetch_row()) {
			$adafoto = $row[2];
			$dirfoto = "images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "images/banner/$row[2]";
		}
		else
		{
		$potoe = "images/banner/your-logo-here.png";
		}
				echo "<img src='$potoe' border=0 alt='$row[1]' title='$row[1]'/>
				";
			}
			//return $bn;	
		}
	

		function logologin() {
		//$bn = "";
			$this->select("id, nama, banner, url", "banner_logo", "published=1 and id=1", "ordering");
			while($row=$this->fetch_row()) {
			$adafoto = $row[2];
			$dirfoto = "themes/img/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "themes/img/$row[2]";
		}
		else
		{
		$potoe = "theme/img/ioo.png";
		}
				echo "<img src='$potoe' border=0 alt='$row[1]' title='$row[1]'/>
				";
			}
			//return $bn;	
		}
		

	
		function bannerlogo2() {
		//$bn = "";
			$this->select("id, nama, banner, url", "banner_logo", "published=1 and id=2", "ordering");
			while($row=$this->fetch_row()) {
			$adafoto = $row[2];
			$dirfoto = "../images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "../images/banner/$row[2]";
		}
		else
		{
		$potoe = "../images/banner/your-logo-here.png";
		}
			echo "<img src='$potoe' border=0 alt='$row[1]' title='$row[1]'/>
				";
			}
			//return $bn;	
		}
		function bannerlogo3() {
		//$bn = "";
			$this->select("id, nama, banner, url", "banner_logo", "published=1 and id=1", "ordering");
			while($row=$this->fetch_row()) {
			$adafoto = $row[2];
			$dirfoto = "../images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "../images/banner/$row[2]";
		}
		else
		{
		$potoe = "../images/banner/your-logo-here.png";
		}
			echo "<img src='$potoe' border=0 alt='$row[1]' title='$row[1]'/>
				";
			}
			//return $bn;	
		}
	 //----banner rekening-----
		function bannerrek() {
			//$bn = "";
			$this->select("id, nama, banner, url, namabank, norek, pemilik", "banner_rek", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				$adafoto = $row[2];
			$dirfoto = "images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "<a href='images/banner/$row[2]' class='highslide' onclick='return hs.expand(this)'><img src='images/banner/$row[2]' width='135' title='$row[1]' class='imgFloatCenter'/></a><br><div class='highslide-caption'><center><font style='font-size:10pt;color:#444444;line-height:150%;font-family:Arial'><strong>$row[4]</strong></font><br><font style='font-size:10pt;color:#444444;line-height:150%;font-family:Arial'>No.Rek : $row[5]<br>A/n : $row[6]</font><br><br></center></div>";
		}
		else
		{
		$potoe = "<a href='images/banner/bank.png' class='highslide' onclick='return hs.expand(this)'><img src='images/banner/bank.png' width='135' title='$row[1]' class='imgFloatCenter' /></a><br><div class='highslide-caption'><center><font style='font-size:10pt;color:#444444;line-height:150%;font-family:Arial'><strong>$row[4]</strong></font><br><font style='font-size:10pt;color:#444444;line-height:150%;font-family:Arial'>No.Rek : $row[5]<br>A/n : $row[6]</font><br><br></center></div>";
		}
				
				echo "<div>$potoe</div>";
				
			}
			//return $bn;	
		}
		 //----banner rekening-----
		  //----banner rekening-----
		function bannerreka() {
			//$bn = "";
			$this->select("id, nama, banner, url, namabank, norek, pemilik", "banner_rek", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				$adafoto = $row[2];
			$dirfoto = "../images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "<a href='../images/banner/$row[2]' class='highslide' onclick='return hs.expand(this)'><img src='../images/banner/$row[2]' width='135' title='$row[1]' class='imgFloatCenter'/></a><br><div class='highslide-caption'><center><font style='font-size:12pt;color:#444444;line-height:150%;font-family:Arial'><strong>$row[4]</strong></font><br><font style='font-size:12pt;color:#444444;line-height:150%;font-family:Arial'>No.Rek : $row[5]<br>A/n : $row[6]</font><br><br></center></div>";
		}
		else
		{
		$potoe = "<a href='../images/banner/bank.png' class='highslide' onclick='return hs.expand(this)'><img src='../images/banner/bank.png' width='135' title='$row[1]' class='imgFloatCenter' /></a><br><div class='highslide-caption'><center><font style='font-size:12pt;color:#444444;line-height:150%;font-family:Arial'><strong>$row[4]</strong></font><br><font style='font-size:13pt;color:#444444;line-height:150%;font-family:Arial'>No.Rek : $row[5]<br>A/n : $row[6]</font><br><br></center></div>";
		}
				
				echo "<div>$potoe</div>";
				
			}
			//return $bn;	
		}
		
		//----banner rekening2-----
		function bannerrek2() {
			//$bn = "";
			$uw = mysql_query("select id, nama, banner, url, namabank, norek, pemilik from banner_rek where published=1 Order by ordering"); 
			$ttlex = mysql_num_rows($uw); 
			if($ttlex > 0){
			echo "<table class='table' style='width:100%;'>";
				
			while($row=mysql_fetch_array($uw)) {
			$adafoto = $row[2];
			$dirfoto = "../images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "../images/banner/$row[2]";
		}
		else
		{
		$potoe = "../images/banner/bank.png";
		}
				
				
				echo "<tr>";
				echo "<td data-title='Bank' align='center'><img src='$potoe' width='90' title='$row[1]' class='imgOpacity' border='1' style='border-color:#CCCCCC' /></td>";
				echo "<td data-title='No. Rekening' align='center'>$row[5]</td>";
				echo "<td data-title='Atas Nama' align='center'>$row[6]</td>";
				echo "</tr>";
			}
			//return $bn;	
		
				echo "</table>";
		} else {
		echo "";
		}
		}

		
		
		//----banner rekening2c-----
		function bannerrek2c() {
			//$bn = "";
			$uw = mysql_query("select id, nama, banner, url, namabank, norek, pemilik from banner_rek where published=1 Order by ordering"); 
			$ttlex = mysql_num_rows($uw); 
			if($ttlex > 0){
			echo "<table class='table'  style='width:70%;'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th width='30%'>#</th>";
				echo "<th width='70%'>Bank Account</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
			while($row=mysql_fetch_array($uw)) {
			$adafoto = $row[2];
			$dirfoto = "./images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "./images/banner/$row[2]";
		}
		else
		{
		$potoe = "./images/banner/bank.png";
		}
				
				
				echo "<tr>";
				echo "<td data-title='Bank'><img src='$potoe' width='100' title='$row[1]' class='imgOpacity' border='1' style='border-color:#CCCCCC' /></td>";
				echo "<td data-title='No. Rekening'>$row[4]<br>Nomor Rekening : $row[5]<br>Atas Nama : $row[6]</td>";
				echo "</tr>";
			}
			//return $bn;	
		
				echo "</tbody>";
				echo "</table>";
		} else {
		echo "";
		}
		}
		
		
		
		
//----banner rekening2-----
		function bannerrek2a() {
			//$bn = "";
			$uw = mysql_query("select id, nama, banner, url, namabank, norek, pemilik from banner_rek where published=1 Order by ordering"); 
			$ttlex = mysql_num_rows($uw); 
			if($ttlex > 0){
			echo "<table class='table' style='width:100%;'>";
				
			while($row=mysql_fetch_array($uw)) {
			$adafoto = $row[2];
			$dirfoto = "../images/banner/$row[2]";
	if (!empty($adafoto) && (file_exists($dirfoto))){
		$potoe = "../images/banner/$row[2]";
		}
		else
		{
		$potoe = "../images/banner/bank.png";
		}
				
				
				echo "<tr>";
				echo "<td data-title='Bank' align='center'><img src='$potoe' width='100' title='$row[1]' class='imgOpacity' border='1' style='border-color:#CCCCCC' /></td>";
				echo "<td data-title='No. Rekening' align='center'>$row[5]</td>";
				echo "<td data-title='Atas Nama' align='center'>$row[6]</td>";
				echo "</tr>";
			}
			//return $bn;	
		
				echo "</table>";
		} else {
		echo "";
		}
		}

                //----banner rekening-----
        function bannerhome() {
            //$bn = "";
            $this->select("id, nama, banner, url", "bannerhome", "published=1", "ordering");
            while($row=$this->fetch_row()) {
                echo "<a href='http://$row[1]' target='_blank'><img src='images/banner/$row[2]' title='$row[1]' border=0 /></a>
                <br>
                $row[3]
                <br><br>";
            }
            //return $bn;    
        }			
		//----banner kakan-----

		function bannerkiri() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_kiri", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<a href='http://$row[3]' target='_blank'><img src='images/banner/$row[2]' title='$row[1]' width='175' border=0 /></a>
				<br><br>";
			}
			//return $bn;	
		}			
		function bannerbawah() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_bawah", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<a href='http://$row[3]' target='_blank'><img src='images/banner/$row[2]' title='$row[1]' border=0 /></a>&nbsp";
			}
			//return $bn;	
		}       
	   function banneratas() {
			//$bn = "";
			$this->select("id, nama, banner, url", "banner_atas", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<img src='../images/banner/$row[2]' title='$row[1]' border=0 /></a>";
			}
			//return $bn;	
		}
		//----banner kanan-----
		function bannerkanan() {
		//$bn = "";
			$this->select("id, nama, banner, url", "banner_kanan", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<img src='images/banner/$row[2]' />
				";
			}
			//return $bn;	
		}	
		//----banner kanan-----
		function bannerkanan2() {
		//$bn = "";
			$this->select("id, nama, banner, url", "banner_kanan", "published=1", "ordering");
			while($row=$this->fetch_row()) {
				echo "<img src='../images/banner/$row[2]' />
				";
			}
			//return $bn;	
		}	
		//--updatejer---
		function updatejaringan($username) {
			$upline = $this->dataku("upline", $username);
			$posisi = $this->dataupline("posisi", $username);
			$sql=mysql_query("select kiri, kanan from jaringan where username='$upline'");
			$data=mysql_fetch_row($sql);
			
			if($posisi == "L1") {
				$nk = $data[0] + 1;
				$pos = "kiri";
			} else {
				$nk = $data[1] + 1;
				$pos = "kanan";
			}
			$this->update("jaringan", "$pos='$nk'", "username='$upline'");		
		}
		//--updatejer---
		function updatejaringandelete($username) {
			$upline = $this->dataku("upline", $username);
			$posisi = $this->dataupline("posisi", $username);
			$sql=mysql_query("select kiri, kanan from jaringan where username='$upline'");
			$data=mysql_fetch_row($sql);
			
			if($posisi == "L1") {
				$nk = $data[0] - 1;
				$pos = "kiri";
			} else {
				$nk = $data[1] - 1;
				$pos = "kanan";
			}
			$this->update("jaringan", "$pos='$nk'", "username='$upline'");		
		}	
		function komisipaket($username, $dtgl) {
			$kom=0;
			$spk = mysql_query("select paket from upline where username='$username'");
			$row=mysql_fetch_row($spk);
			$pk = $row[0];
			$tkm = 0;
			for($i=0;$i<$pk;$i++) {
				if($i == 0) {
					$user = $username;
				} else {
					$user = "$username-0$i";
				}
						
				$skom="SELECT * FROM komisi WHERE username='$user' $dtgl";
				$dkom=mysql_query($skom);
				$ada=mysql_num_rows($dkom);
				
					$komi = 0;
					while($rkom=mysql_fetch_row($dkom)) {
						$komi = $komi + $rkom[2];
					}
					$tkm = $tkm + $komi;
				}	
					$kom = $tkm;
			
				return $kom;
		}	
			//---menunggu--
		function Menunggu($username, $posisi, $dtgl) {
			$n=0;	
			$kiri = $this->kirikanan($username, "L1", "1", $dtgl);
			$kanan = $this->kirikanan($username, "L2", "1", $dtgl);
			if($kiri >= $kanan && $posisi == "L1") {
				$mp = $kiri - $kanan;
			} else if($kiri >= $kanan && $posisi == "L2") {
				$mp = 0;
			} else if($kiri < $kanan && $posisi == "L2") {
				$mp = $kanan - $kiri;
			} else {	
			
				$mp = 0;
			}
			$n = $mp;
			return $n;
		}	
		//---netgrowth
		function NetGrowth($username, $jenis, $dtgl) {
			$n=0;	
			if($jenis == "komlev") {
				$sql=mysql_query("select * from komisi where jenis like '%komlev%' and username='$username' $dtgl");
				$n=mysql_num_rows($sql);
			} else 
			if($jenis == "fo") {
				$sqle=mysql_query("select * from komisi where jenis='kompasangan' and username='$username' $dtgl");
				$fo = $this->config("flushout");
				$afo = mysql_num_rows($sqle);
				if($afo > $fo) $n = 1;
			} else {		
				$sql=mysql_query("select * from komisi where jenis='$jenis' and username='$username' $dtgl");
				$n=mysql_num_rows($sql);
			}
			return $n;
		}			
		
		//---new mbr
		function kirikanan($username, $posisi, $status, $dtgl) {
			$n=0;
			$rep=str_replace("tglbayar", "b.tglaktif", $dtgl);
			$level = $this->dataupline("level", $username);
			//$user = $this->dataupline($posisi, $username);
			/*if($user && $this->dataku("status", $user) == $status) {
				$tm = 1;
			} else {
				$tm = 0;
			}	
			*/	
			$sqlu=mysql_query("select a.$posisi, b.tgl from upline as a inner join member as b on a.username=b.username where  a.username='$username' and b.status='$status'");
			$data=mysql_fetch_row($sqlu);
			
			//if($posisi == "kiri") {
				$user = $data[0];
			//} else {
				//$user = $data[1];
			//}		
			if($user) $t = 1;
			$sql_lev = mysql_query("select level from upline order by level desc");
			$rowlev = mysql_fetch_row($sql_lev);
			$loop = $rowlev[0] - $level;
			for($i=0;$i<$loop;$i++) {
				if($i == 0) {
					$sql=mysql_query("select a.username, b.tgl from upline as a inner join member as b on a.username=b.username where  a.upline$i='$username' and a.posisi='$posisi' and b.status='$status' $rep");
					$ada0 = mysql_num_rows($sql);
				} else {
					$o = $i-1;
					$sql=mysql_query("select a.username, b.tgl from upline as a inner join member as b on a.username=b.username where  a.upline$i='$username' and a.upline$o='$user' and b.status='$status' $rep");
				}
				$ada = mysql_num_rows($sql);
				$n0 = $n0 + $ada;
			}
				$n = $n0;
			return $n;
		}		
		
		//----ym---
	function ym($i, $n) {
		$ym = "";
		$ymn = explode("|", $this->config("ym"));
		//$y = array();
		$cn = count($ymn);
		//for($i=0;$i<$cn;$i++) {
			echo "<a href='ymsgr:sendIM?$ymn[$i]'><img src='http://opi.yahoo.com/online?u=$ymn[$i]&m=g&t=1' border='0' title='$n'></a>";
		//}
	}	
	
	function newmember() {

		//$nm = "";

		$this->select("username, nama, kota, foto, sponsor, tgl", "member", "", "tglaktif desc", "", "", "5");

		while($data=$this->fetch_row()) {
		$tgljn = formatgl($data[5]);
		$adafotos = $data[3];
			$dirfotos = "./member/images/$adafotos";
	if (!empty($adafotos) && (file_exists($dirfotos))){

			$foto ="<a href='./member/images/$adafotos' class='highslide' onclick='return hs.expand(this)'><img src='./member/images/$adafotos' title='$data[1]'/></a>";
				

				} else {

				$foto ="<a href='./images/nopic.png' class='highslide' onclick='return hs.expand(this)'><img src='./images/nopic.png' title='$data[1]' /></a>";

				}	

		echo "<li><div class='lb_img'>".$foto."</div><div class='lb_text'><h4><a href='#'>".$data[0]."</a></h4><p>".$data[1]."</p></div><div class='price'>".$data[2]."</div></li>";
		}
		//return $nm;
	}	
	
	
	
	
	
		function newtransaction() {

		//$nm = "";

		$this->select("username, jumlah, tgl, status, jenis", "contribute", "status<2", "tgl desc", "", "", "5");

		while($data=$this->fetch_row()) {
		$tgljn = formatgl($data[2]);
		if($data[4] == 0){
			$jnks = "PH: ";
		}else{
			$jnks = "GH: ";
		}
		if($data[1] > 0){
		$jmkne = rupiah($data[1]);
		}else{
			$jmkne = "---";
		}
		
		$golekinama = "SELECT * FROM member WHERE username='$data[0]'"; 
        $golekinama2 = mysql_query($golekinama);
        $rowgolekinama = mysql_fetch_array($golekinama2);
        $namausere = $rowgolekinama['nama'];
        $fotousere = $rowgolekinama['foto'];		
		
		
			$dirfotos3 = "./member/images/$fotousere";
	if (!empty($fotousere) && (file_exists($dirfotos3))){

			$foto ="<a href='./member/images/$fotousere' class='highslide' onclick='return hs.expand(this)'><img src='./member/images/$adafotos' title='$data[1]'/></a>";
				

				} else {

				$foto ="<a href='./images/nopic.png' class='highslide' onclick='return hs.expand(this)'><img src='./images/nopic.png' title='$data[1]' /></a>";

				}	

		echo "<li><div class='lb_img'>".$foto."</div><div class='lb_text'><h4><a href='#'>".$data[0]."</a></h4><p>".$namausere."</p></div><div class='price'>".$jnks."".$jmkne."</div></li>";
		}
		//return $nm;
	}	
	
	
	
	
	
	
	
     function newmemberc($status) {

		//$nm = "";

		$this->select("username, nama, kota, foto, sponsor, tgl", "member", "status=$status", "tglaktif desc", "", "", "5");

		while($data=$this->fetch_row()) {
		$tgljn = formatgl($data[5]);
		$adafotos = $data[3];
			$dirfotos = "../member/images/$adafotos";
	if (!empty($adafotos) && (file_exists($dirfotos))){

			$foto ="<div><a href='../member/images/$adafotos' class='highslide' onclick='return hs.expand(this)'><img src='../member/images/$adafotos' title='$data[1]' width='50' height='50' class='imgku2xx' style='margin-right:15px;'/></a><div class='highslide-caption'><font style='font-size:10pt;color:#444444;line-height:150%;font-family:Arial'><strong>$data[0]</strong><br>Nama : $data[1]<br>Kota : $data[2]<br>Sponsor : $data[4]<br>Tanggal Join : $tgljn</font></div></div>";
				

				} else {

				$foto ="<div><a href='../images/nopic.png' class='highslide' onclick='return hs.expand(this)'><img src='../images/nopic.png' title='$data[1]' width='50' height='50' class='imgku2xx' style='margin-right:15px;'/></a><div class='highslide-caption'><font style='font-size:10pt;color:#444444;line-height:150%;font-family:Arial'><strong>$data[0]</strong><br>Nama : $data[1]<br>Kota : $data[2]<br>Sponsor : $data[4]<br>Tanggal Join : $tgljn</font></div></div>";

				}	

		echo "<table cellpadding=\"0\" cellspacing=\"0\" width=\"50px\" height=\"50px\" border=\"0\" align=\"left\" background=\"\"><tr><td width=\"100%\" align=\"left\">$foto</td></tr></table><font style='font-size:10pt;color:#999999;line-height:110%;font-family:Arial'><strong>$data[0]</strong><br /> $data[1] <br />($data[2])<br /><br /><br /></font>";
		}
		//return $nm;
	}	
	                       
							
	function freemember($status, $from) {
		//$nm = "";
		$this->select("username, nama, hp, kota, foto", "member", "status=$status and paket=1", "tgl desc", "", "", "5");

		if($from == "home") {

			$folder = "images/";

			$folder2 = "user-area-non-public/images/";

		} else {

			$folder = "../images/";	

			$folder2 = "images/";	

		}	
		while($data=$this->fetch_row()) {

			 if(!$data[4]) {

					$foto = $folder."no_avatar.gif";

				} else {

					$foto =	$folder2.$data[4];

				}	
			echo "<center><table cellpadding=\"0\" cellspacing=\"0\" width=\"50px\" height=\"50px\" border=\"0\" align=\"left\" bgcolor=\"#F9F9F9\"><tr><td width=\"100%\" align=\"center\"><img src=\"$foto\" width=\"50px\" height=\"50px\"></td></tr></table>$data[0]<br /> $data[1] <br />($data[3])<br /><br /><br /></center>";
		}
		//return $nm;
		
	}		
}  
?>