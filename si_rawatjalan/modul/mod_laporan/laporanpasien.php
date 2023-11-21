<?php
switch($_GET[act]){
  default:
    echo "<h2>Laporan Data Pasien</h2>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr>
			<th>No</th>
			<th>NIK Pasien</th>
			<th>Nama Pasien</th>
			<th>Alamat</th>
			<th>Desa</th>
			<th>Telepon</th>
			<th>No Rekam Medis</th>
		</tr>
		</thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM pasien ORDER BY nama_pasien ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[nik_pasien]</td>
			 <td>$r[nama_pasien]</td>
			 <td>$r[alamat_pasien]</td>
			 <td>$r[desa]</td>
			 <td>$r[tlp_pasien]</td>
			 <td>$r[no_rm]</td>
		</tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>
	
	<a href="print_pasien.php" target="_blank" title="Print"><img src="images/print.png" border="0"/></a>

<?php
    break;  
}
?>
