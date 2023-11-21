<?php 
include "config/library.php";
include "config/koneksi.php";
include "config/tanggal.php"; 
error_reporting(E_ALL & ~E_NOTICE);
?>
<?php
$idPMB =$_GET[idPMB];
$idPMB = ltrim($idPMB);

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

?>
<?php
session_start();
ob_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>REKAM MEDIS</title>
<style type="text/css">
body,td,th {
	font-size: 14px;
}
.table{
border:thin;
}
.table td,th{
border-bottom: solid;
padding-top:10px;
padding-bottom:10px;
}
.table th{
background-color:#CCCCCC;
border-top: solid;
}
.table td{
padding-left:10px;
}
</style>
</head>
<?php
$cari=$_POST["id_pasien"];
$cari="select * from pasien where id_pasien='$cari'";
$hasil=mysql_query($cari);
$data=mysql_fetch_row($hasil);


echo "<script language='JavaScript' type='text/javascript'>
		window.print();
		</script>";
?>
<body>
<table align="center"  width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="200" align="center" valign="middle"><img src="images/logo2.png" width="150" height="50"></th>
    <th width="445" align="center" valign="middle" >
	 REKAM MEDIS<br>
	 BALAI PENGOBATAN NIRMALA<br>
     <address>Jl. Yosef Sudarso No. 18 Kel. Lemah Wungkuk Kota Cirebon</address>
	 <br><hr>
    </th>
  </tr>
</table>      

	<br>
  <table width="100%" border="0" align="center" class="table" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan=2>
	  Pasien
	  <br>
	  Telp
	  <br>
	  Alamat
	  </th>
      <th colspan=4>:
	  <?php print  $data[1]; ?> - <?php print  $data[2]; ?>
	  <br>:
	  <?php print  $data[6]; ?>
	  <br>:
	  <?php print  $data[4]; ?> - <?php print  $data[5]; ?>
	  </th>
    </tr>
   <tbody> 
   <tr style="background-color:red;">
		  <th width="45">No</th>
		  <th width="210">Refrensi</th>
		  <th width="100">Tanggal</th>
		  <th width="100">Diagnosa</th>
		  <th width="100">Keterangan</th>
		  <th width="90">Dokter</th>
	</tr>
   <?php
   $no=1;
   $cari2=$_POST["id_pasien"];
   $qry=mysql_query("select * from pendaftaran A, dokter B where A.id_dokter=B.id_dokter and A.id_pasien='$cari2' order by A.no_pendaftaran asc");
   while($r=mysql_fetch_array($qry)){
	echo"
    <tr>
		<td>$no</td>
		  <td>$r[no_pendaftaran]</td>
          <td>$r[tgl_daftar]</td>
		  <td>$r[diagnosa]</td>
		  <td>$r[keterangan_khusus]</td>
		  <td>$r[nama_dokter]</td>
    </tr>
	";
	$no++;
	}
   ?>
   </tbody>
  </table>

<br>
<table width="100%" border="0" align="center">
  <tr>
    <td width="235"><div align="center">Pasien</div></td>
    <td width="5">&nbsp;</td>
	<td width="5">&nbsp;</td>
	<td width="5">&nbsp;</td>
    <td width="200"><div align="center"></div></td>
    <td width="5">&nbsp;</td>
	<td width="5">&nbsp;</td>
	<td width="5">&nbsp;</td>
    <td width="180"><div align="center">Admin</div></td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
  </tr>
  <tr>
    <td><div align="center">(________________________)</div></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center">(________________________)</div></td>
  </tr>
 </table>
</body>
</html>

<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset_all);
$nopol=$data[3];
$filename='PKB-'.$nopol;
$filename.= ".pdf";
$content = ob_get_clean();
require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
try
	{
		$html2pdf = new HTML2PDF('P', 'A4', 'en');
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>