<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Print Data Pasien</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body style="background-color:#ffffff;"><br /><center>
<table width="70%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
						<tr align="center">
							<td valign="center" align="right"><img src="images/logo2.png" width="200" height="100"></td>
							<td><b><font size="4">DATA PASIEN</font><br><br>
							<font size="5" color="#01284f">BALAI PENGOBATAN NIRMALA</font><br><br>
							Jl. Yosef Sudarso No. 18 Kel. Lemah Wungkuk Kota Cirebon<br />
							Telp. (0231) 322608</b></td>
						</tr>
    </table></td>
  </tr>
  <tr>
    <td>
	<hr color="#01284f" />
	</td>
  </tr>
  <tr>
    <td align="center"><br />
<?php 


error_reporting(E_ALL & ~E_NOTICE);
include "config/koneksi.php";
$no=1;
		
//untuk menampilkan
$view=mysql_query("Select * from pasien order by nama_pasien");
echo "<script language='JavaScript' type='text/javascript'>
		window.print();
		</script>";
?>

		<table class="datatable">
		<tr>
			<th>No</th>
			<th>NIK Pasien</th>
			<th>Nama Pasien</th>
			<th>Alamat</th>
			<th>Desa</th>
			<th>Telepon</th>
			<th>No Rekam Medis</th>
		</tr>
		<?php
		while($row=mysql_fetch_array($view)){
		?>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $row['nik_pasien'];?></td>
			<td><?php echo $row['nama_pasien'];?></td>
			<td><?php echo $row['alamat_pasien'];?></td>
			<td><?php echo $row['desa'];?></td>
			<td><?php echo $row['tlp_pasien'];?></td>
			<td><?php echo $row['no_rm'];?></td>
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