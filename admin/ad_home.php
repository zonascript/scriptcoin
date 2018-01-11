<?php

if(basename($_SERVER['SCRIPT_FILENAME'])==basename(__FILE__)){echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";echo "<meta http-equiv=\"refresh\" content=\"2; url=./index.php\">";exit();};echo '';if(empty($valid_admin)){echo "<p align=center><br><br><br><br><br><br><font size=\"6\" color=\"#FF0000\">ILLEGAL ACCESS !!";echo "<meta http-equiv=\"refresh\" content=\"2; url=../index.php\">";exit();};echo '';;echo '
';$sql="SELECT visit FROM visit";$dt=mysql_query($sql);$config=mysql_fetch_array($dt);$visitor=$config['visit'];;echo '';$perintah5x="SELECT * FROM useronline2";$jumlahmember5x=mysql_query($perintah5x);$smuamember5x=mysql_num_rows($jumlahmember5x);;echo '	
';$sblxx2da=mysql_query("select time from adminlastlog WHERE userid='$valid_admin' ORDER BY time DESC LIMIT 1");while($rowsda=mysql_fetch_row($sblxx2da)){$ida=$rowsda[0]-1;}$sblxx2dc=mysql_query("select id, userid, ip, host, browser, logindate, logoutdate, time from adminlastlog WHERE userid='$valid_admin' AND time='$ida'");while($rowsdc=mysql_fetch_row($sblxx2dc)){$useridne=$rowsdc[1];$ipe=$rowsdc[2];$host=$rowsdc[3];$browser=$rowsdc[4];$logindate=$rowsdc[5];$logoutdate=$rowsdc[6];}if(!empty($logindate)){$tt=formatgl($logindate);$jame=date('H:i:s',strtotime($logindate))."&nbsp;WIB";}else{$tt="--";$jame="--";}if(empty($logoutdate)||$logoutdate=="0000-00-00 00:00:00"){$logoutdt="--";}else{$tta=date('d-m-Y',strtotime($logoutdate));$jamea=date('H:i:s',strtotime($logoutdate));$logoutdt=$tta."&nbsp;&nbsp;-&nbsp;&nbsp;".$jamea."&nbsp;WIB";}$date_a=new DateTime($logoutdate);$date_b=new DateTime($logindate);$interval=date_diff($date_a,$date_b);$tming=$interval->format('%h:%i:%s');;echo ' <h1>Home</h1>
      <div id="content_padded">
<table class="form" width="100%" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <td width="63%" valign="top"><table width="100%" height="311" border="0" cellpadding="2" cellspacing="4">
      <tr>
        <td width="25%" align="center"><a href="?go=invest"><img src="images/coins.png" alt="Invest" width="48" height="48" /><br />
          Invest</a></td>
        <td width="25%" align="center"><a href="?go=profit-data"><img src="images/coins.png" alt="Profit" width="48" height="48" /><br />
          Profit</a></td>
        <td width="25%" align="center"><a href="?go=bonus"><img src="images/coins.png" alt="Bonus" width="48" height="48" /><br />
          Bonus</a></td>
        </tr>
      <tr>
        <td align="center"><a href="?go=member"><img src="images/icon-48-user.png" alt="User Manager" width="48" height="48"><br>
          Member Manager</a></td>
        <td align="center"><a href="?go=testimonial"><img src="images/icon-48-media.png" alt="Product Manager" width="48" height="48"><br>
          Testimonial</a></td>
        <td align="center"><a href="?go=berita"><img src="images/icon-48-media.png" alt="Berita" width="48" height="48" /><br />
          Berita</a></td>
        </tr>
      <tr>
        <td align="center"><a href="?go=faq"><img src="images/icon-48-user-profile.png" alt="Card Center" width="48" height="48" /><br />
          FAQ</a></td>
        <td align="center"><a href="?go=konfirmasi"><img src="images/icon-48-menumgr.png" width="48" height="48" border="0" /><br />
          Konfirmasi</a> </td>
        <td align="center"><a href="?go=configuration"><img src="images/icon-48-config.png" alt="Configuration" width="48" height="48" /><br />
Configuration</a></td>
      </tr>
    </table>
     
    </td>
    <td width="37%" valign="top" bgcolor="#FFFFFF"><div id="modul_admin">
    <center><h3 style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#444444; padding:10px">Selamat Datang di Administrator Area</h3>
    </center>
    <table width="100%" height="228" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC" style="border-collapse:collapse">
      
      <tr>
        <td width="44%" align="right">Login Terakhir : </td>
        <td width="56%">';echo $tt;;echo '</td>
      </tr>
      <tr>
        <td align="right">Jam Login : </td>
        <td>';echo $jame;;echo '</td>
      </tr>
      <tr>
        <td align="right">Alamat IP : </td>
        <td>';echo $ipe;;echo '</td>
      </tr>
      <tr>
        <td align="right">Host : </td>
        <td>';echo $host;;echo '</td>
      </tr>
      <tr>
        <td align="right" valign="top">Browser : </td>
        <td valign="top">';echo $browser;;echo '</td>
      </tr>
      <tr>
        <td align="right">Logout : </td>
        <td>';echo $logoutdt;;echo '</td>
      </tr>
	   <tr>
        <td align="right">Timer : </td>
        <td>';echo $tming;;echo '</td>
      </tr>
    </table>
    <br />
    </div></td>
  </tr>
</table>
</div>
';?>