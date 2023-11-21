<?php
switch($_GET[act]){
  default:
    echo "<h2>Laporan Data Obat</h2>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>Kode Obat</th><th>Nama Obat</th><th>Jenis Obat</th><th>Harga</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM obat ORDER BY nama_obat ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_obat]</td>
			 <td>$r[nama_obat]</td>
			 <td>$r[jenis_obat]</td>
			 <td>Rp. ".number_format($r[harga],0,',','.')."</td>
		</tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>
	
	<a href="print_obat.php" target="_blank" title="Print"><img src="images/print.png" border="0"/></a>

<?php
    break;  
}
?>
