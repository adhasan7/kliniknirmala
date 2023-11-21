<?php
switch($_GET[act]){
  default:?>
	<form class="form uniformForm validateForm" <?php echo"action='media.php?module=laporanpembayaran'"; ?>  method="post" style="background-color:gold;"/>
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
    echo "<center><h2>Laporan Pembayaran Pasien Rawat Jalan</h2> <b> (Periode : $bulan - $th) </b></center>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr>
		  <th>No</th>
		  <th>No Pendaftaran</th>
		  <th>Nama Pasien</th>
		  <th>Rincian</th>
		  <th>Jml Rincian</th>
		  <th>Biaya Pendaftaran</th>
		  <th>Total</th>
		  </tr>
		  </thead>
		  <tbody>"; 
	$no=1;
	$tanggal1=$th."-".$bln."-1";
	$tanggal2=$th."-".$bln."-31";
	$view=mysql_query("SELECT * FROM pembayaran A, pendaftaran B, pasien C where A.id_pendaftaran=B.id_pendaftaran and B.id_pasien=C.id_pasien and B.tgl_daftar between '$tanggal1' and '$tanggal2' ORDER BY B.tgl_daftar ASC");
	while($row=mysql_fetch_array($view)){
	$qry=mysql_query("select * from detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$row[id_pembayaran]'");
	$qry2=mysql_query("select * from detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$row[id_pembayaran]'");
	while($h=mysql_fetch_array($qry)){
	$jumlah[$no]=$h[qty]*$h[harga];
	$total[$no]+=$jumlah[$no];
	}
    echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$row[no_pendaftaran]</td>
			 <td>$row[nama_pasien]</td> 
			<td>";
			 while($s=mysql_fetch_array($qry2)){
			 echo"$s[nama_obat] @$s[qty] x $s[harga]<br/>";
			 }
			 echo"</td>
             <td>Rp. ".number_format($total[$no],0,',','.')."</td>
			 <td>Rp. ".number_format($row[biaya_daftar],0,',','.')."</td>
			 <td>Rp. ".number_format($total[$no]+$row[biaya_daftar],0,',','.')."</td></tr>";?>
<?php
	$no++;
	} 
?>
	
<?php
    echo "</tbody></table>";
    break;

}
?>

					<form action="print_laporanpembayaran.php" target="_blank" method="post" name="postform3">
					<table width="80%" border="0">
					<tr>
					<td align="left"><input type="hidden" name="bulan" value="<?php echo $_POST['bulan'];?>"/></td>
					<td align="left"><input type="hidden" name="tahun" value="<?php echo $_POST['tahun'];?>"/></td>
					<td align="left"><a title="Print Laporan"><input name="cari" type="image" src="images/print.png"></a></td></tr>
					</table>
					</form>