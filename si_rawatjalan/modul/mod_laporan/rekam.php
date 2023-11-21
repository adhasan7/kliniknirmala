<?php
switch($_GET[act]){
  default:?>
	<form class="form uniformForm validateForm" <?php echo"action='media.php?module=rekam'"; ?>  method="post" style="background-color:gold;"/>
		<table>
			<tr>
				<td colspan="5"><h3>Cari Pasien</h3></td>
			</tr>
			<tr>
				<td width="10%">
				<select name="id_pasien">
					<option value="">--PILIH--</option>
					<?php
					$cari="select * from pasien order by nama_pasien";
					$hasil=mysql_query($cari);
					while ($data=mysql_fetch_array($hasil)){
					echo("<option value=\"$data[id_pasien]\" size=\"250\" name=\"cari\">$data[nama_pasien] | $data[nik_pasien]</option>");
					}
					?>
				</select>
				</td>
				<td><input type="submit" value="Tampilkan"></td>
			</tr>
		</table>
  </form>
  
<?php
$idpasien=$_POST['id_pasien'];
$edit=mysql_query("SELECT * FROM pasien WHERE id_pasien='$_POST[id_pasien]'");
$r=mysql_fetch_array($edit);
$namapasien=$r['nama_pasien'];
$nikpasien=$r['nik_pasien'];
    echo "<center><h2>Rekam Medis Pasien</h2> <b> (Atas Nama : $nikpasien - $namapasien) </b> </center>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr>
		  <th>No</th>
		  <th>Refrensi</th>
		  <th>Tanggal</th>
		  <th>Diagnosa</th>
		  <th>Keterangan</th>
		  <th>Dokter</th>
		  </tr>
		  </thead>
		  <tbody>"; 
	$no=1;
	$view=mysql_query("select * from pendaftaran A, dokter B where A.id_dokter=B.id_dokter and A.id_pasien='$idpasien' order by A.no_pendaftaran asc");
	while($row=mysql_fetch_array($view)){
    echo "<tr class=\"gradeA\"><td>$no</td>
		  <td>$row[no_pendaftaran]</td>
          <td>$row[tgl_daftar]</td>
		  <td>$row[diagnosa]</td>
		  <td>$row[keterangan_khusus]</td>
		  <td>$row[nama_dokter]</td>";
	$no++;
	} 
?>
	
<?php
    echo "</tbody></table>";
    break;

}
?>

					<form action="print_rekam.php" target="_blank" method="post" name="postform3">
					<table width="80%" border="0">
					<tr>
					<td align="left"><input type="hidden" name="id_pasien" value="<?php echo $_POST['id_pasien'];?>"/></td>
					<td align="left"><a title="Print Laporan"><input name="cari" type="image" src="images/print.png"></a></td></tr>
					</table>
					</form>