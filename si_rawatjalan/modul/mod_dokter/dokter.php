<?php
$aksi="modul/mod_dokter/aksi_dokter.php";
switch($_GET[act]){
  default:
    echo "<h2>Master Data Dokter</h2>
			<button class=\"btn btn-quaternary\" onclick=\"window.location.href='?module=dokter&act=tambahdokter';\"><span class=\"icon-plus-alt\"></span>Tambah Data Dokter</button>
<br />
<br />
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>Kode Dokter</th><th>Nama Dokter</th><th>Alamat Dokter</th><th>Handphone</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM dokter ORDER BY nama_dokter DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_dokter]</td>
			 <td>$r[nama_dokter]</td>
			 <td>$r[alamat_dokter]</td>
			 <td>$r[tlp_dokter]</td>
             <td><a href=?module=dokter&act=editdokter&id=$r[id_dokter]><span class=\"icon-wrench\" title=\"Ubah\"></span></a>
	             <a href=$aksi?module=dokter&act=hapus&id=$r[id_dokter]><span class=\"icon-x\" title=\"Hapus\"></span></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>

	
	<?php
    break;
  
  // Form Tambah Kategori
  case "tambahdokter":
  ?>
 <h2>Tambah Data Dokter</h2>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=dokter&act=input'"; ?>  method="post"/>
								
								<div class="field-group">
									<label for="email">Kode Dokter:</label>
									<div class="field">
										<input type="text" name="kode_dokter" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Dokter:</label>
									<div class="field">
										<input type="text" name="nama_dokter" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Alamat Dokter:</label>
									<div class="field">
										<textarea cols="32" rows="3" name="alamat_dokter"></textarea>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Handphone:</label>
									<div class="field">
										<input type="text" name="tlp_dokter" size="32" />	
									</div>
								</div> <!-- .field-group -->
							
								<div class="actions">						
									<input type=submit name=submit value=Simpan>
                                    <input type=button value=Batal onclick=self.history.back()>
								</div> <!-- .actions -->
								
							</form>
  
  
  <?
     break;
  
  // Form Edit Kategori  
  case "editdokter":
    $edit=mysql_query("SELECT * FROM dokter WHERE id_dokter='$_GET[id]'");
    $r=mysql_fetch_array($edit);
?>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=dokter&act=update'"; ?> method="post">
								
								<div class="field-group">
									<label for="email">Kode Dokter:</label>
									<div class="field">	
										<input type="hidden" name="id" size="20" value="<?php echo"$r[id_dokter]"; ?>" />
										<input type="hidden" name="kode_dokter2" size="20" value="<?php echo"$r[kode_dokter]"; ?>" />
                                        <input  type="text" name="kode_dokter" size="20" value="<?php echo"$r[kode_dokter]"; ?>" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Dokter:</label>
									<div class="field">
										<input type="text" name="nama_dokter" size="32" value="<?php echo"$r[nama_dokter]"; ?>"/>		
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Alamat Dokter:</label>
									<div class="field">
										<textarea cols="32" rows="3" name="alamat_dokter"><?php echo"$r[alamat_dokter]"; ?></textarea>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Handphone:</label>
									<div class="field">
										<input type="text" name="tlp_dokter" size="32" value="<?php echo"$r[tlp_dokter]"; ?>"/>		
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
