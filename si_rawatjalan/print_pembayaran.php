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
<title>INVOICE PEMBAYARAN</title>
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
$cari=$_POST["id_pembayaran"];
$cari="select * from pembayaran A, pendaftaran B, pasien C WHERE A.id_pendaftaran=B.id_pendaftaran and B.id_pasien=C.id_pasien and A.id_pembayaran='$cari'";
$hasil=mysql_query($cari);
$data=mysql_fetch_row($hasil);
echo "<script language='JavaScript' type='text/javascript'>
		window.print();
		</script>";
?>
<body>
<table align="center"  width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th width="250" align="center" valign="middle"><img src="images/logo2.png" width="250" height="130"></th>
    <th width="645" align="center" valign="middle" >
	 <h3>NOTA PEMBAYARAN</h3>
	 <h2>BALAI PENGOBATAN NIRMALA</h2>
     <h4><address>Jl. Yosef Sudarso No. 18 Kel. Lemah Wungkuk Kota Cirebon</address></h4>
	 <br><hr>
    </th>
  </tr>
</table>      
<div id="tab1" class="tab_content">
	<br>
  <table width="100%" border="0" align="center" class="table" cellpadding="0" cellspacing="0">
  <thead align="left">
    <tr>
      <th width="210">
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
      <th width="260">
	  <?php print  $data[15]; ?> - <?php print  $data[16]; ?>
	  <br>
	  <?php print  $data[20]; ?>
	  <br>
	  <?php print  $data[18]; ?> - <?php print  $data[19]; ?>
	  </th>
      <th width="210">&nbsp;
	  <br>&nbsp; <br>
	  &nbsp;
	  </th>
	  <th width="10">&nbsp;
	  <br>&nbsp;
	  <br>&nbsp;
	  </th>
      <th width="160">&nbsp;
	  <br>&nbsp;
	  <br>&nbsp;</th>
    </tr>
   </thead>
   <tbody> 
   <tr style="background-color:red;">
		<td>No</td>
		<td>Kode</td>
		<td>Nama </td>
		<td>QTY</td>
		<td>Harga</td>
		<td>Jumlah</td>
	</tr>
   <?php
   $no=1;
   $cari2=$_POST["id_pembayaran"];
   $qry=mysql_query("Select * from pembayaran left join detail_pembayaran on pembayaran.id_pembayaran=detail_pembayaran.id_pembayaran left join obat on detail_pembayaran.id_obat=obat.id_obat where pembayaran.id_pembayaran='$cari2' order by detail_pembayaran.id_obat ASC");
   while($r=mysql_fetch_array($qry)){
	echo"
    <tr>
				<td>$no</td>
                <td>$r[kode_obat]</td>
                <td>$r[nama_obat]</td>
				<td>$r[qty]</td>
                <td>Rp. ".number_format($r[harga],0,',','.')."</td>
				<td>Rp. ".number_format($r[harga]*$r[qty],0,',','.')."</td>
    </tr>
	";
	$no++;
	}
   ?>
   <tr>
		<td colspan=5>BIAYA OBAT</td>
		<td>Rp. <?php print number_format($data[2],0,',','.') ; ?></td>
	</tr>
	<tr>
		<td colspan=5>BIAYA PENDAFTARAN</td>
		<td>Rp. <?php print number_format($data[3],0,',','.') ; ?></td>
	</tr>
   <tr style="background-color:red;">
		<td colspan=5>TOTAL</td>
		<td>Rp. <?php print number_format($data[2]+$data[3],0,',','.') ; ?></td>
	</tr>
   </tbody>
  </table>
</div>

<br>
<table width="100%" border="0" align="center">
  <tr>
    <td width="117"><div align="center">Pasien</div></td>
    <td width="5">&nbsp;</td>
	<td width="5">&nbsp;</td>
	<td width="5">&nbsp;</td>
    <td width="117"><div align="center"></div></td>
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
		$html2pdf = new HTML2PDF('L', 'A4', 'en');
		$html2pdf->pdf->SetDisplayMode('fullpage');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>