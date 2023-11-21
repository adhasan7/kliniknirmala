<?php
switch($_GET[act]){
  default:
    echo "<h2>Laporan Data Pasien</h2>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>Kode Pasien</th><th>Nama Pasien</th><th>No Rekam Medis</th><th>Alamat Pasien</th><th>Handphone</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM pasien where nik_pasien='$_SESSION[namauser]' ORDER BY nama_pasien DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_pasien]</td>
			 <td>$r[nama_pasien]</td>
			 <td>$r[no_rm]</td>
			 <td>$r[alamat_pasien]</td>
			 <td>$r[tlp_pasien]</td>
             <td align='center'>";?>
				<form method="post" action="print_kartu.php" target='_blank'>
				<input name="id_pasien" type="hidden" value="<?php echo $r['id_pasien'];?>"/>
				<a title="Print"><input name="cari" type="image" src="././images/silk/printer.png"/></a>
				</form>
			<?php
			echo "
			 </td></tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>

<?php
    break;  
}
?>
