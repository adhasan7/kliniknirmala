<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Laporan Pendaftaran</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body style="background-color:#ffffff;"><br /><center>
<table width="70%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
  
  <?php
$bln=$_POST['bulan'];
$th=$_POST['tahun'];
switch($bln)
{
	case "1" :
	$bulan = "Januari";
	break;
	case "2" :
	$bulan = "Februari";
	break;
	case "3" :
	$bulan = "Maret";
	break;
	case "4" :
	$bulan = "April";
	break;
	case "5" :
	$bulan = "Mei";
	break;
	case "6" :
	$bulan = "Juni";
	break;
	case "7" :
	$bulan = "Juli";
	break;
	case "8" :
	$bulan = "Agustus";
	break;
	case "9" :
	$bulan = "September";
	break;
	case "10" :
	$bulan = "Oktober";
	break;
	case "11" :
	$bulan = "Nopember";
	break;
default :
	$bulan = "Desember";
	break;
} ?>
  
  
    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr align="center">
							<td valign="center" align="right"><img src="images/logo2.png" width="200" height="100"></td>
							<td><b><font size="4">LAPORAN PENDAFTARAN PASIEN RAWAT JALAN</font><br><br>
							<font size="5" color="#01284f">BALAI PENGOBATAN NIRMALA</font><br><br>
							Jl. Yosef Sudarso No. 18 Kel. Lemah Wungkuk Kota Cirebon<br />
							Telp. (0231) 322608</b></td>
						</tr>
    </table></td>
  </tr>
  <tr>
    <td>
	<font size="4" color="#01284f"><i>Periode : <?php echo $bulan."-".$th ?></i></font><br />
	<hr color="#01284f" />
	</td>
  </tr>
  <tr>
    <td align="center"><br />
<?php 
error_reporting(E_ALL & ~E_NOTICE);
include "config/koneksi.php";
$no=1;
$tanggal1=$th."-".$bln."-1";
$tanggal2=$th."-".$bln."-31";
		
//untuk menampilkan
$view=mysql_query("select * from pendaftaran A, pasien B, dokter C where A.id_pasien=B.id_pasien and A.id_dokter=C.id_dokter and A.tgl_daftar between '$tanggal1' and '$tanggal2' order by A.tgl_daftar asc");
echo "<script language='JavaScript' type='text/javascript'>
		window.print();
		</script>";
?>

	<table class="datatable">
		<tr>
			<th>No</th>
			<th>No Pendaftaran</th>
			<th>Tanggal Daftar</th>
			<th>Nama Pasien</th>
			<th>Nama Dokter</th>
			<th>Diagnosa</th>
			<th>Status</th>
		 </tr>
		<?php
		while($row=mysql_fetch_array($view)){
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['no_pendaftaran']; ?></td>
			<td><?php echo $row['tgl_daftar']; ?></td>
			<td><?php echo $row['nama_pasien']; ?></td>
			<td><?php echo $row['nama_dokter']; ?></td>
			<td><?php echo $row['gejala']; ?></td>
			<td><?php echo $row['status']; ?></td>
		</tr>
		<?php
		$no++;
		}
		?>
		</table><center>
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td width="40%">&nbsp;</td>
		<td width="30%">&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
	  <tr>
		<td>Dibuat Oleh</td>
		<td align="center"></td>
        <td align="right">Mengetahui</td>
      </tr>
	  <tr>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
	  <tr>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
	  <tr>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
	  <tr>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
	  <tr>
		<td align="center">&nbsp;</td>
		<td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
		<td align="left">Admin</td>
		<td align="center"></td>
        <td align="Right">
		Kepala
		</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table><center>


</body>
</html>