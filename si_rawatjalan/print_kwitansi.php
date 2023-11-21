<?php 
include "config/library.php";
include "config/koneksi.php";
include "config/tanggal.php"; ?>
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
<title>Kwitansi</title>
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
$cari=$_POST["id_pendapatan"];
$cari="select * from pendapatan A, mekanik B, konsumen C WHERE A.id_mekanik=B.id_mekanik and A.id_konsumen=C.id_konsumen and A.id_pendapatan='$cari'";
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
	 <h3>KWITANSI</h3>
	 <h2>BALAI PENGOBATAN NIRMALA</h2>
     <h4><address>Jl. Yosef Sudarso No. 18 Kel. Lemah Wungkuk Kota Cirebon</address></h4>
	 <br><hr>
    </th>
  </tr>
</table>     <br>
<div id="tab1" class="tab_content">
  <table width="100%" border="0" align="center" class="table" cellpadding="0" cellspacing="0">
  <thead align="left">
    <tr>
      <th width="117">
	  Kepada Yth
	  <br>
	  Alamat
	  <br>
	  Reff No
	  <br>
	  Mekanik
	  </th>
	  <th width="10">
	  :
	  <br>
	  :
	  <br>
	  :
	  <br>
	  :
	  </th>
      <th width="240">
	  <?php print  $data[13]; ?>
	  <br>
	  <?php print  $data[16]; ?>
	  <br>
	  Cabang Arjawinangun
	  <br>
	  <?php print  $data[9]; ?>
	  </th>
      <th width="117">
	  &nbsp;
	  <br>
	  &nbsp;
	  <br>
	  &nbsp;
	  </th>
	  <th width="10">
	  &nbsp;
	  <br>
	  &nbsp;
	  <br>
	  &nbsp;
	  </th>
      <th width="60">
	  &nbsp;
	  </th>
      <th width="117">
	  No Nota
	  <br>
	  Tanggal
	  <br>
	  No Polis
	  </th>
	  <th width="10">
	  :<br>:<br>:
	  </th>
      <th width="180">
	  AWJ/<?php print  $data[1]; ?><br>
	  <?php print  $data[2]; ?><br>
	  <?php print  $data[14]; ?>
	  </th>
    </tr>
   </thead>
   <tbody> 
   <tr style="background-color:red;">
		<td>No</td>
		<td colspan="2">Kode Service</td>
		<td colspan="2">Descripsi Item</td>
		<td>QTY</td>
		<td colspan="2">Harga/Unit</td>
		<td>Jumlah</td>
	</tr>
   <?php
   $no=1;
   $cari2=$_POST["id_pendapatan"];
   $qry=mysql_query("Select * from pendapatan left join detail_pendapatan on pendapatan.id_pendapatan=detail_pendapatan.id_pendapatan left join produk on detail_pendapatan.id_produk=produk.id_produk where pendapatan.id_pendapatan='$cari2' order by detail_pendapatan.id_produk ASC");
   while($r=mysql_fetch_array($qry)){
	echo"
    <tr>
				<td>$no</td>
                <td colspan='2'>$r[kode_produk]</td>
                <td colspan='2'>$r[nama_produk]</td>
				<td>$r[qty]</td>
				<td colspan='2' align='right'>Rp. ".number_format($r[harga],0,',','.')."</td>
                <td align='right'>";
				$jml=$r[harga]*$r[qty];
				$total=$r[jumlah];
				echo"Rp. ".number_format($jml,0,',','.');
				$tot[$no]+=$jml;
				echo"</td>
    </tr>
	";
	$no++;
	}
   ?>
   <tr style="background-color:red;">
		<td colspan="8" align="center">Total Bayar</td>
		<td><?php echo "Rp. ".number_format($total,0,',','.'); ?></td>
	</tr>
   </tbody>
  </table>
</div>

<br>
<table width="380" border="0" align="center">
  <tr>
    <td width="58" height="41">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diserahkan Oleh,  </td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center">Frontdesk</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center">Konsumen</div></td>
  </tr>
  <tr>
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
  </tr>
  <tr>
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
  </tr>
  <tr>
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
  </tr>
  <tr>
    <td><div align="center">(________________________)</div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center">(________________________)</div></td>
  </tr>
</table>
<br>
<br>
<br>

</body>
</html>

<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset_all);

$nonota=$data[1];
$filename='Kwitansi-'.$nonota;
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