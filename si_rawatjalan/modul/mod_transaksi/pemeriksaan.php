<?php
$aksi="modul/mod_transaksi/aksi_pemeriksaan.php";
switch($_GET[act]){
  default:
    echo "<h2>Master Data Pemeriksaan</h2>
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>No Pendaftaran</th><th>Tanggal</th><th>Nama Pasien</th><th>Gejala</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM pendaftaran A, pasien B where A.id_pasien=B.id_pasien and A.status='Daftar' ORDER BY A.no_pendaftaran ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[no_pendaftaran]</td>
			 <td>$r[tgl_daftar]</td>
			 <td>$r[nama_pasien]</td>
			 <td>$r[gejala]</td>
             <td><a href=?module=pemeriksaan&act=editpemeriksaan&id=$r[id_pendaftaran]><span class=\"icon-wrench\" title=\"Periksa\"></span></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>
	
  
  <?php
     break;
  
  // Form Edit Kategori  
  case "editpemeriksaan":
    $edit=mysql_query("SELECT * FROM pendaftaran A, pasien B WHERE A.id_pasien=B.id_pasien and A.id_pendaftaran='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
	$dokter=mysql_query("SELECT * FROM dokter WHERE kode_dokter='$_SESSION[namauser]'");
    $r2=mysql_fetch_array($dokter);
	$id_dokter=$r2['id_dokter'];
	$kodedokter=$r2['kode_dokter'];
	$namadokter=$r2['nama_dokter'];
?>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pemeriksaan&act=update&ss=editpemeriksaan&tt=$_GET[id]'"; ?> method="post">
								
								<div class="field-group">
									<label for="email">Nomor Pendaftaran:</label>
									<div class="field">	
										<input type="hidden" name="id" size="20" value="<?php echo"$r[id_pendaftaran]"; ?>" />
										<input type="hidden" name="no_pendaftaran" size="20" value="<?php echo"$r[no_pendaftaran]"; ?>" />
										<input type="hidden" name="tgl_daftar" size="20" value="<?php echo"$r[tgl_daftar]"; ?>"/>											
										<input type="hidden" name="id_pasien" size="20" value="<?php echo"$r[id_pasien]"; ?>" />	
										<input type="hidden" name="gejala" size="20" value="<?php echo"$r[gejala]"; ?>" />
										<input type="hidden" name="id_dokter" size="20" value="<?php echo"$id_dokter"; ?>" />
                                        <input type="text" disabled="disabled" name="nama_pendaftaran" size="32" value="<?php echo"$r[no_pendaftaran]"; ?>" />
										<input type="text" disabled="disabled" name="nama_tanggal" size="32" value="<?php echo"$r[tgl_daftar]"; ?>" />
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Pasien:</label>
									<div class="field">
										<input type="text" disabled="disabled" name="kode_pasien2" size="32" value="<?php echo"$r[nik_pasien]"; ?>"/>	
										<input type="text" disabled="disabled" name="nama_pasien2" size="32" value="<?php echo"$r[nama_pasien]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Keterangan:</label>
									<div class="field">
										<input type="text" disabled="disabled" name="alamat_pasien2" size="32" value="<?php echo"$r[alamat_pasien]"; ?>"/>
										<input type="text" disabled="disabled" name="tlp_pasien2" size="32" value="<?php echo"$r[tlp_pasien]"; ?>"/>
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Gejala:</label>
									<div class="field">
										<input type="text" disabled="disabled" name="gejala2" size="69" value="<?php echo"$r[gejala]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<hr>
								<div class="field-group">
									<label for="email">Nama Dokter:</label>
									<div class="field">
										<input type="text" disabled="disabled" name="kode_dokter2" size="32" value="<?php echo"$kodedokter"; ?>"/>	
										<input type="text" disabled="disabled" name="nama_dokter2" size="32" value="<?php echo"$namadokter"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Diagnosa:</label>
									<div class="field">
										<input type="text" name="diagnosa" size="69" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Resep Obat:</label>
									<div class="field">
										<input type="text" name="keterangan_obat" size="69" value="<?php echo"$r[keterangan_obat]"; ?>"/>	
										<select name="resep">
											<option value="">--PILIH RESEP OBAT--</option>
											<?php
											$cari="select * from obat order by nama_obat";
											$hasil=mysql_query($cari);
											while ($data=mysql_fetch_array($hasil)){
											echo("<option value=\"$data[nama_obat]\" size=\"250\" name=\"cari\">$data[nama_obat]</option>");
											}
											?>
										</select>
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Catatan Khusus:</label>
									<div class="field">
										<input type="text" name="keterangan_khusus" size="69" />	
									</div>
								</div> <!-- .field-group -->
								
								
								<div class="field-group">
									<label for="email">Selesai:</label>
									<div class="field">
										<select name="status">
											<option value="Daftar" selected>- Pilih -</option>
											<option value="Periksa">Ya</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								
								
								<div class="actions">						
									<input type=submit name=submit value=Simpan>
                                    <input type=button value=Batal onclick=self.history.back()>
								</div> <!-- .actions -->
								
							</form>
  
<?php
    break;  
}
?>
