<?php
switch($_GET[act]){
  default:
    echo "<h2>Laporan Data Dokter</h2>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr>
			<th>No</th>
			<th>Kode Dokter</th>
			<th>Nama Dokter</th>
			<th>Alamat</th>
			<th>Telepon</th>
		</tr>
		</thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM dokter ORDER BY nama_dokter ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_dokter]</td>
			 <td>$r[nama_dokter]</td>
			 <td>$r[alamat_dokter]</td>
			 <td>$r[tlp_dokter]</td>
		</tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>
	
	<a href="print_dokter.php" target="_blank" title="Print"><img src="images/print.png" border="0"/></a>

<?php
    break;  
}
?>
