<?php
$aksi="modul/mod_pembayaran/aksi_pembayaran.php";
switch($_GET[act]){
  default:
    echo "<h2>Master Data Pembayaran</h2>
			<button class=\"btn btn-quaternary\" onclick=\"window.location.href='?module=pembayaran&act=tambahpembayaran';\"><span class=\"icon-plus-alt\"></span>Tambah Pembayaran</button>
<br />
<br />
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>No Antrian</th><th>Nama Pasien</th><th>Rincian Transaksi</th><th>Jml Transaksi</th><th>By. Pendaftaran</th><th>Total</th><th>Print</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM pembayaran A, pendaftaran B, pasien C where A.id_pendaftaran=B.id_pendaftaran and B.id_pasien=C.id_pasien and B.status='Selesai' ORDER BY B.tgl_daftar ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	$qry=mysql_query("select * from detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$r[id_pembayaran]'");
	$qry2=mysql_query("select * from detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$r[id_pembayaran]'");
	while($h=mysql_fetch_array($qry)){
	$jumlah[$no]=$h[qty]*$h[harga];
	$total[$no]+=$jumlah[$no];
	}
	$tanggal=my_ke_tgl2($r[tanggal]);
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[no_pendaftaran]</td>
			 <td>$r[nama_pasien]</td>
             <td>";
			 while($s=mysql_fetch_array($qry2)){
			 echo"$s[nama_obat] @$s[qty] x $s[harga]<br/>";
			 }
			 echo"</td>
             <td>Rp. ".number_format($total[$no],0,',','.')."</td>
			 <td>Rp. ".number_format($r[biaya_daftar],0,',','.')."</td>
			 <td>Rp. ".number_format($total[$no]+$r[biaya_daftar],0,',','.')."</td>
			 <td align='center'>";?>
				<form method="post" action="print_pembayaran.php" target='_blank'>
				<input name="id_pembayaran" type="hidden" value="<?php echo $r['id_pembayaran'];?>"/>
				<a title="Print"><input name="cari" type="image" src="././images/silk/printer.png"/></a>
				</form>
			<?php
			echo "
			 </td>
             <td align='center'>  
			 <a href=?module=pembayaran&act=editpembayaran&id=$r[id_pembayaran]><span class=\"icon-wrench\" title=\"Ubah\"></span></a>
			 <a href=$aksi?module=pembayaran&act=hapus&id=$r[id_pembayaran]><span class=\"icon-x\" title=\"Hapus\"></span></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>";
    break;
  
  case "tambahpembayaran":
  ?>
  
  
   <?php
 		$id_pembayaran=1;
		$result = mysql_query("select max(id_pembayaran) from pembayaran");
		if (mysql_num_rows($result) != 0)
		{
			$row = mysql_fetch_array($result);
			$id_pembayaran = $row['max(id_pembayaran)']+1;
		}
 ?>
  
  
	<?php
	$tampil=mysql_query("SELECT * FROM detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$id_pembayaran' ORDER BY A.id_pembayaran DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
	$jml=$r[qty]*$r[harga];
	$ttl+=$jml;
    $no++;
    }
	?>
 <h2>Tambah Transaksi Pembayaran</h2> 
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pembayaran&act=input'"; ?>  method="post"/>
 <table border="0">
 <tr>
	<td>
 		<div class="field-group">
		<label for="url">Nomor Pendaftaran:</label>
		<div class="field">
		<input type="hidden" name="id_pembayaran" value="<?php echo"$id_pembayaran"; ?>" size="20"/>
		<input type="hidden" name="status" value="Selesai" size="20"/>
		<select name="id_pendaftaran">
        <option value="0" selected>- Pilih -</option>
        <?php
		$tampil=mysql_query("SELECT * FROM pendaftaran A, pasien B where A.id_pasien=B.id_pasien and A.status='Periksa' ORDER BY no_pendaftaran");
		while($r=mysql_fetch_array($tampil)){
		echo "<option value=$r[id_pendaftaran]>$r[no_pendaftaran] | $r[nama_pasien]</option>";
		}
		?>
		</select>	
		</div>
		</div> <!-- .field-group -->
	</td>
	<td>
 		<div class="field-group">
		<label for="required">Biaya Pendaftaran:</label>
		<div class="field">
		<input type="text" name="biaya_daftar" size="20" maxlength="10" id="required"/>	
		</div>
		</div> <!-- .field-group -->
	</td>
	<td>
 		<div class="field-group">
		<label for="required">Jumlah Transaksi:</label>
		<div class="field">
		<input type="text" disabled="disabled" size="20" maxlength="10" value="Rp. <?php echo number_format($ttl,0,',','.'); ?>"/>	
		<input type="hidden" name="jmlh" size="20" maxlength="10" value="<?php echo $ttl; ?>"/>	
		<input type=submit name=submit value=Simpan>
		</div>
		</div> <!-- .field-group -->
	</td>
</tr>
</table>
</form>
<hr>


  
  <form name="cari" action="?module=pembayaran&act=tambahpembayaran" method="post" class="main">
		<div class="field-group">
				<select name="id_obat">
					<option value="">--PILIH DAFTAR OBAT--</option>
					<?php
					$cari="select * from obat order by nama_obat";
					$hasil=mysql_query($cari);
					while ($data=mysql_fetch_array($hasil)){
					echo("<option value=\"$data[id_obat]\" size=\"250\" name=\"cari\">$data[nama_obat] | $data[kode_obat]</option>");
					}
					?>
				</select>
				<input name="cari" type="submit" value="Cari"  />
		</div>
	</form>
		
		

 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pembayaran&act=input1'"; ?>  method="post"/>

 
				<?php
				$cari=$_POST["id_obat"];
				$cari="select * from obat WHERE id_obat='$cari'";
				$hasil=mysql_query($cari);
				$data=mysql_fetch_row($hasil);
				?>
 
								<div class="field-group">
									<label for="url">Qty:</label>
									<div class="field">
										<input type="hidden" name="id_pembayaran" size="20" maxlength="3" value="<?php echo"$id_pembayaran"; ?>"/>	
										<input type="hidden" name="id_obat" size="20" value="<?php print  $data[0]; ?>" />	
										<input type="text" disabled="disabled" name="kode_obat" size="20" value="<?php print  $data[1]; ?>" />
										<input type="text" disabled="disabled" name="nama_obat" size="20" value="<?php print  $data[2]; ?>" />
										<input type="hidden" name="harga" size="32" value="<?php print  $data[4]; ?>" />	
										<input type="text" disabled="disabled" name="harga2" size="20" value="Rp. <?php print  number_format($data[4],0,'.','.'); ?>" />
										<input type="text" name="qty" size="8" maxlength="3"/>	
										<input type=submit name=submit value=Tambah>										
									</div>
								</div> <!-- .field-group -->
								
							</form>
                            <hr noshade="noshade" />


 <?php
		  echo"
		  <table class=\"table table-bordered \"><thead>
          <tr><th>No</th><th>Kode Obat</th><th>Nama Obat</th><th>Qty</th><th>Harga</th><th>Jumlah</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
				$tampil=mysql_query("SELECT * FROM detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$id_pembayaran' ORDER BY A.id_pembayaran DESC");
				$no=1;
				while ($r=mysql_fetch_array($tampil)){
				$jumlah=$r[qty]*$r[harga];
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_obat]</td>
             <td>$r[nama_obat]</td>
             <td>$r[qty]</td>
             <td>Rp. ".number_format($r[harga],0,',','.')."</td>
             <td>Rp. ".number_format($jumlah,0,',','.')."</td>
             <td><a href=$aksi?module=pembayaran&act=hapus1&id_pembayaran=$r[id_pembayaran]&id_obat=$r[id_obat]><span class=\"icon-x\" title=\"Hapus\"></span></a>
             </td></tr>";
			 $tot+=$jumlah;
      $no++;
    }
    echo "<tr><td colspan=5>Total</td><td colspan=2>Rp. ".number_format($tot,0,',','.')."</td></tr></tbody></table>";?>
    					




						

   <?php 
     break;
  
  // Form Edit Kategori  
  case "editpembayaran":
    $edit = mysql_query("SELECT * FROM pembayaran A, pendaftaran B, pasien C WHERE A.id_pendaftaran=B.id_pendaftaran and B.id_pasien=C.id_pasien and A.id_pembayaran='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
?>



<?php
	$tampil=mysql_query("SELECT * FROM detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$r[id_pembayaran]' ORDER BY A.id_pembayaran DESC");
    $no=1;
    while ($w=mysql_fetch_array($tampil)){
	$jml=$w[qty]*$w[harga];
	$ttl+=$jml;
    $no++;
    }
	?>
												

 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pembayaran&act=update22'"; ?>  method="post"/>
 <table border="0">
 <tr>
	<td>
 		<div class="field-group">
		<label for="required">Nomor Pendaftaran:</label>
		<div class="field">
		<input type="hidden" name="no_pendaftaran" size="20" value="<?php echo"$r[no_pendaftaran]"; ?>"/>	
		<input type="hidden" name="status" value="Selesai" size="20"/>
		<input type="text" disabled="disabled" name="no_pendaftaran2" size="20" value="<?php echo"$r[no_pendaftaran]"; ?>"/>	
		<input type="hidden" name="id_pembayaran" value="<?php echo $r[id_pembayaran]; ?>" size="20"/>	
		<input type="hidden" name="id_pendaftaran" value="<?php echo $r[id_pendaftaran]; ?>" size="20"/>	
		</div>
		</div> <!-- .field-group -->
	</td>
	<td>
 		<div class="field-group">
		<label for="required">Biaya Pendaftaran:</label>
		<div class="field">
		<input type="text" name="biaya_daftar" size="20" maxlength="10" id="required" value="<?php echo"$r[biaya_daftar]"; ?>"/>	
		</div>
		</div> <!-- .field-group -->
	</td>
	<td>
 		<div class="field-group">
		<label for="required">Jumlah Transaksi:</label>
		<div class="field">
		<input type="text" disabled="disabled" size="20" maxlength="10" value="Rp. <?php echo number_format($ttl,0,',','.'); ?>"/>	
		<input type="hidden" name="jmlh" size="20" maxlength="10" value="<?php echo $ttl; ?>"/>	
		<input type=submit name=submit value=Simpan>
		</div>
		</div> <!-- .field-group -->
	</td>
</tr>
</table>
</form>
<hr>


	<form name="cari" action="?module=pembayaran&act=editpembayaran&id=<?php echo $r[id_pembayaran]?>" method="post" class="main">
		<div class="field-group">
				<select name="id_obat">
					<option value="">--PILIH DAFTAR OBAT--</option>
					<?php
					$cari="select * from obat order by nama_obat";
					$hasil=mysql_query($cari);
					while ($data=mysql_fetch_array($hasil)){
					echo("<option value=\"$data[id_obat]\" size=\"250\" name=\"cari\">$data[nama_obat] | $data[kode_obat]</option>");
					}
					?>
				</select>
				<input name="cari" type="submit" value="Cari"  />
		</div>
	</form>
	
	
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pembayaran&act=input22'"; ?> method="post">
 
		<?php
			$cari=$_POST["id_obat"];
			$cari="select * from obat WHERE id_obat='$cari'";
			$hasil=mysql_query($cari);
			$data=mysql_fetch_row($hasil);
		?>
								
								<div class="field-group">
									<label for="url">Qty:</label>
									<div class="field">
										<input type="hidden" name="id_pembayaran" size="20" maxlength="3" value="<?php echo $r[id_pembayaran]; ?>"/>	
										<input type="hidden" name="id_obat" size="20" value="<?php print  $data[0]; ?>" />	
										<input type="text" disabled="disabled" name="kode_obat2" size="20" value="<?php print  $data[1]; ?>" />	
										<input type="text" disabled="disabled" name="nama_obat2" size="20" value="<?php print  $data[2]; ?>" />	
										<input type="hidden" name="harga" size="20" value="<?php print  $data[4]; ?>" />	
										<input type="text" disabled="disabled" name="harga2" size="20" value="Rp. <?php print  number_format($data[4],0,'.','.'); ?>" />
										<input type="text" name="qty" size="8" maxlength="3"/>			
										<input type=submit name=submit value=Tambah>
									</div>
								</div> <!-- .field-group -->
							</form>
                            <hr noshade="noshade" />
							
	
	

 <?
		  echo"
		  <table class=\"table table-bordered \"><thead>
          <tr><th>No</th><th>Kode Obat</th><th>Nama Obat</th><th>Qty</th><th>Harga</th><th>Jumlah</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
				$tampil=mysql_query("SELECT * FROM detail_pembayaran A, obat B where A.id_obat=B.id_obat AND A.id_pembayaran='$r[id_pembayaran]' ORDER BY A.id_pembayaran DESC");
				$no=1;
				while ($r=mysql_fetch_array($tampil)){
				$jumlah=$r[qty]*$r[harga];
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_obat]</td>
             <td>$r[nama_obat]</td>
             <td>$r[qty]</td>
             <td>Rp. ".number_format($r[harga],0,',','.')."</td>
             <td>Rp. ".number_format($jumlah,0,',','.')."</td>
             <td><a href=$aksi?module=pembayaran&act=hapus33&id_pembayaran=$r[id_pembayaran]&id_obat=$r[id_obat]><span class=\"icon-x\" title=\"Hapus\"></span></a>
             </td></tr>";
			 $tot+=$jumlah;
      $no++;
    }
    echo "<tr><td colspan=5>Total</td><td colspan=2>Rp. ".number_format($tot,0,',','.')."</td></tr></tbody></table>";?>
    							
  
<?php
    break;  
}
?>
