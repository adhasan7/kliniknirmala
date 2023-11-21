<?php
$aksi="modul/mod_obat/aksi_obat.php";
switch($_GET[act]){
  default:
    echo "<h2>Master Data Obat</h2>
			<button class=\"btn btn-quaternary\" onclick=\"window.location.href='?module=obat&act=tambahobat';\"><span class=\"icon-plus-alt\"></span>Tambah Obat</button>
<br />
<br />
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>Kode</th><th>Descriptions</th><th>Jenis</th><th>Bentuk</th><th>Harga</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM obat ORDER BY nama_obat asc");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_obat]</td>
             <td>$r[nama_obat]</td>
			 <td>$r[jenis_obat]</td>
			 <td>$r[bentuk_obat]</td>
             <td>Rp. ".number_format($r[harga],0,',','.')."</td>
             <td><a href=?module=obat&act=editobat&id=$r[id_obat]><span class=\"icon-wrench\" title=\"Ubah\"></span></a>
	             <a href=$aksi?module=obat&act=hapus&id=$r[id_obat]><span class=\"icon-x\" title=\"Hapus\"></span></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>
	
	
	<?php
    break;
  
  // Form Tambah Kategori
  case "tambahobat":
  ?>
 <h2>Tambah Data Obat</h2>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=obat&act=input'"; ?>  method="post"/>
								
								<div class="field-group">
									<label for="required">Kode Obat:</label>
									<div class="field">
										<input type="text" name="kode_obat" size="20" />	
									</div>
								</div> <!-- .field-group -->
								
								<div class="field-group">
									<label for="email">Nama Obat:</label>
									<div class="field">
										<input type="text" name="nama_obat" size="32" />	
									</div>
								</div> <!-- .field-group -->
								
								<div class="field-group">
									<label for="email">Jenis Obat:</label>
									<div class="field">
										<select name="jenis_obat">
											<option value="Generik" selected>- Pilih -</option>
											<option value="Generik">Generik</option>
											<option value="Non Generik">Non Generik</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								
								
								<div class="field-group">
									<label for="email">Bentuk Obat:</label>
									<div class="field">
										<select name="bentuk_obat">
											<option value="Kaplet" selected>- Pilih -</option>
											<option value="Kaplet">Kaplet / Tablet</option>
											<option value="Sirup">Sirup</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								
								<div class="field-group">
									<label for="email">Harga:</label>
									<div class="field">
										<input type="text" name="harga" size="32" />	
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
  case "editobat":
    $edit=mysql_query("SELECT * FROM obat WHERE id_obat='$_GET[id]'");
    $r=mysql_fetch_array($edit);
?>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=obat&act=update'"; ?> method="post">
								
								<div class="field-group">
									<label for="required">Kode Obat:</label>
									<div class="field">
										<input type="hidden" name="id" size="20" value="<?php echo"$r[id_obat]"; ?>" />
										<input type="text" name="kode_obat" size="20" value="<?php echo"$r[kode_obat]"; ?>" />	
									</div>
								</div> <!-- .field-group -->
								
								<div class="field-group">
									<label for="email">Nama Obat:</label>
									<div class="field">
										<input type="text" name="nama_obat" size="32" value="<?php echo"$r[nama_obat]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								
								<div class="field-group">
									<label for="email">Jenis Obat:</label>
									<div class="field">
										<select name="jenis_obat">
											<option value="<?php echo"$r[jenis_obat]"; ?>" selected><?php echo"$r[jenis_obat]"; ?></option>
											<option value="Generik">Generik</option>
											<option value="Non Generik">Non Generik</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								
								
								<div class="field-group">
									<label for="email">Bentuk Obat:</label>
									<div class="field">
										<select name="bentuk_obat">
											<option value="<?php echo"$r[bentuk_obat]"; ?>" selected><?php echo"$r[bentuk_obat]"; ?></option>
											<option value="Kaplet">Kaplet / Tablet</option>
											<option value="Sirup">Sirup</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								
								<div class="field-group">
									<label for="email">Harga:</label>
									<div class="field">
										<input type="text" name="harga" size="32" value="<?php echo"$r[harga]"; ?>"/>	
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
