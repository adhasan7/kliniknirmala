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
<title>KARTU PASIEN</title>
<style type="text/css">
body,td,th {
	font-size: 8px;
}
.table{
border:thin;
}
.table td,th{
border-bottom: solid;
padding-top:5px;
padding-bottom:5px;
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
$cari="select * from pasien WHERE id_pasien='$cari'";
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
	 KARTU BEROBAT PASIEN<br>
	 BALAI PENGOBATAN NIRMALA<br>
     <address>Jl. Yosef Sudarso No. 18 Kel. Lemah Wungkuk Kota Cirebon</address>
    </th>
  </tr>
</table>  
<br>    
  <table width="100%" border="0" align="center" class="table" cellpadding="0" cellspacing="0">
    <tr>
      <th width="150">
	  Nama Pasien
	  </th>
	  <th width="10">
	  :
	  </th>
      <th width="200">
	  <?php print  $data[1]; ?> - <?php print  $data[2]; ?>
	  </th>
	</tr>
	 <tr>
      <th width="150">
	  Tanggal Lahir
	  </th>
	  <th width="10">
	  :
	  </th>
      <th width="200">
	  <?php print  $data[3]; ?>
	  </th>
	</tr>
	 <tr>
      <th width="150">
	  Alamat
	  </th>
	  <th width="10">
	  :
	  </th>
      <th width="200">
	  <?php print  $data[4]; ?> - <?php print  $data[5]; ?>
	  </th>
	</tr>
	<tr>
      <th width="150">
	  Telepon
	  </th>
	  <th width="10">
	  :
	  </th>
      <th width="200">
	  <?php print  $data[6]; ?>
	  </th>
	</tr>
	<tr>
      <th width="150">
	  Nomor Rekam Medis
	  </th>
	  <th width="10">
	  :
	  </th>
      <th width="200">
	  <?php print  $data[15]; ?>
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