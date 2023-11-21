<?php
switch($_GET[act]){
  default:?>
	<form class="form uniformForm validateForm" <?php echo"action='media.php?module=laporanpendaftaran'"; ?>  method="post" style="background-color:gold;"/>
		<table>
			<tr>
				<td colspan="5"><h3>Buat Laporan</h3></td>
			</tr>
			<tr>
				<td width="22%"><h4>Masukan Bulan-Tahun :</h4></td>
				<td width="10%">
				<select class="mount" name="bulan">
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
					<option value="3">Maret</option>
					<option value="4">April</option>
					<option value="5">Mei</option>
					<option value="6">Juni</option>
					<option value="7">Juli</option>
					<option value="8">Agustus</option>
					<option value="9">September</option>
					<option value="10">Oktober</option>
					<option value="11">November</option>
					<option value="12">Desember</option>
                </select>
				</td>
				<td align="center"><b>-</b></td>
				<td width="8%">
				<select class="year" name="tahun">
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
					<option value="2022">2022</option>
					<option value="2023">2023</option>
					<option value="2024">2024</option>
					<option value="2025">2025</option>
					<option value="2026">2026</option>
					<option value="2027">2027</option>
					<option value="2028">2028</option>
					<option value="2029">2029</option>
					<option value="2030">2030</option>
                </select>
				</td>
				<td><input type="submit" value="Tampilkan"></td>
			</tr>
		</table>
  </form>
  
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
  
  
<?php
$tanggal1=$th."-".$bln."-1";
$tanggal2=$th."-".$bln."-31";
    echo "<center><h2>Laporan Pendaftaran Pasien Rawat Jalan</h2> <b> (Periode : $bulan - $th) </b></center>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr>
		  <th>No</th>
		  <th>No Pendaftaran</th>
		  <th>Tanggal Daftar</th>
		  <th>Nama Pasien</th>
		  <th>Nama Dokter</th>
		  <th>Diagnosa</th>
		  <th>Status</th>
		  </tr>
		  </thead>
		  <tbody>"; 
	$no=1;
	$view=mysql_query("select * from pendaftaran A, pasien B, dokter C where A.id_pasien=B.id_pasien and A.id_dokter=C.id_dokter and A.tgl_daftar between '$tanggal1' and '$tanggal2' order by A.tgl_daftar asc");
	while($row=mysql_fetch_array($view)){
    echo "<tr class=\"gradeA\"><td>$no</td>
		  <td>$row[no_pendaftaran]</td>
          <td>$row[tgl_daftar]</td>
		  <td>$row[nama_pasien]</td>
		  <td>$row[nama_dokter]</td>
	      <td>$row[diagnosa]</td>
          <td>$row[status]</td>
		  </tr>";?>
<?php
	$no++;
	} 
?>
	
<?php
    echo "</tbody></table>";
    break;

}
?>

					<form action="print_laporanpendaftaran.php" target="_blank" method="post" name="postform3">
					<table width="80%" border="0">
					<tr>
					<td align="left"><input type="hidden" name="bulan" value="<?php echo $_POST['bulan'];?>"/></td>
					<td align="left"><input type="hidden" name="tahun" value="<?php echo $_POST['tahun'];?>"/></td>
					<td align="left"><a title="Print Laporan"><input name="cari" type="image" src="images/print.png"></a></td></tr>
					</table>
					</form>