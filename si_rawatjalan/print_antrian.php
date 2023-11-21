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
<title>NO ANTRIAN</title>
<style type="text/css">
body,td,th {
	font-size: 10px;
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
$cari=$_POST["id_pendaftaran"];
$cari="select * from pendaftaran A, pasien B WHERE A.id_pasien=B.id_pasien and A.id_pendaftaran='$cari'";
$hasil=mysql_query($cari);
$data=mysql_fetch_row($hasil);
echo "<script language='JavaScript' type='text/javascript'>
		window.print();
		</script>";
?>
<body>
<table align="center"  width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="100" align="center" valign="middle"><img src="images/logo2.png" width="100" height="30"></th>
    <th width="245" align="center" valign="middle" >
	 NO ANTRIAN<br>
	 BALAI PENGOBATAN NIRMALA<br>
     <address>Jl. Yosef Sudarso No. 18 Kel. Lemah Wungkuk Kota Cirebon</address>
	 <br><hr>
    </th>
  </tr>
</table>      
  <br>
  <table width="100%" border="0" align="center" class="table" cellpadding="0" cellspacing="0">
    <tr>
      <th width="100">
	  Pasien
	  <br>
	  Telp
	  <br>
	  Alamat
	  </th>
	  <th width="10">
	  :
	  <br>
	  :
	  <br>
	  :
	  </th>
      <th width="235">
	  <?php print  $data[11]; ?> - <?php print  $data[12]; ?>
	  <br>
	  <?php print  $data[16]; ?>
	  <br>
	  <?php print  $data[14]; ?> - <?php print  $data[15]; ?>
	  </th>
	</tr>
	<tr>
      <th>
	  Nomor Antrian
	  <br>
	  Gejala
	  <br>
	  &nbsp;
	  </th>
	  <th>
	  :
	  <br>
	  :
	  <br>
	  &nbsp;
	  </th>
      <th>
	  <?php print  $data[1]; ?>
	  <br>
	  <?php print  $data[5]; ?>
	  <br>
	  &nbsp;
	  </th>
    </tr>
</table>
</body>
</html>

<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset_all);
$nopol=$data[1];
$filename='ANTRIAN-'.$nopol;
$filename.= ".pdf";
$content = ob_get_clean();
require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');
try
	{
		$html2pdf = new HTML2PDF('L', 'A7', 'en');
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>