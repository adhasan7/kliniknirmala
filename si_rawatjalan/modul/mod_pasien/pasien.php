<?php
$aksi="modul/mod_pasien/aksi_pasien.php";
switch($_GET[act]){
  default:
    echo "<h2>Master Data Pasien</h2>
			<button class=\"btn btn-quaternary\" onclick=\"window.location.href='?module=pasien&act=tambahpasien';\"><span class=\"icon-plus-alt\"></span>Tambah Data Pasien</button>
<br />
<br />
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>Kode Pasien</th><th>Nama Pasien</th><th>No Rekam Medis</th><th>Alamat Pasien</th><th>Handphone</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM pasien ORDER BY nama_pasien DESC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[kode_pasien]</td>
			 <td>$r[nama_pasien]</td>
			 <td>$r[no_rm]</td>
			 <td>$r[alamat_pasien]</td>
			 <td>$r[tlp_pasien]</td>
             <td><a href=?module=pasien&act=editpasien&id=$r[id_pasien]><span class=\"icon-wrench\" title=\"Ubah\"></span></a>
	             <a href=$aksi?module=pasien&act=hapus&id=$r[id_pasien]><span class=\"icon-x\" title=\"Hapus\"></span></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>
	
	
	<?php
    break;
  
  // Form Tambah Kategori
  case "tambahpasien":
  ?>
 <h2>Tambah Data Pasien</h2>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pasien&act=input'"; ?>  method="post"/>
								
								<div class="field-group">
									<label for="email">Kode Pasien:</label>
									<div class="field">
										<input type="text" name="kode_pasien" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Pasien:</label>
									<div class="field">
										<input type="text" name="nama_pasien" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">NIK Pasien:</label>
									<div class="field">
										<input type="text" name="nik_pasien" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">								
									<label for="datepicker">Tanggal Lahir:</label>
									<div class="field">
										<input type="text" name="tgl_lahir" id="datepicker" />				
									</div> <!-- .field -->								
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nomor Rekam Medis:</label>
									<div class="field">
										<input type="text" name="no_rm" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Alamat Pasien:</label>
									<div class="field">
										<textarea cols="32" rows="3" name="alamat_pasien"></textarea>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Desa:</label>
									<div class="field">
										<input type="text" name="desa" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Handphone:</label>
									<div class="field">
										<input type="text" name="tlp_pasien" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Pekerjaan:</label>
									<div class="field">
										<select name="pekerjaan">
										<option value="Swasta" selected>- Pilih -</option>
										<option value="PNS">PNS</option>
										<option value="TNI">TNI</option>
										<option value="Polri">Polri</option>
										<option value="Swasta">Swasta</option>
										<option value="Wiraswasta">Wirasasta</option>
										<option value="Buruh">Buruh</option>
										<option value="Pelajar">Pelajar</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Agama:</label>
									<div class="field">
										<select name="agama">
										<option value="Islam" selected>- Pilih -</option>
										<option value="Islam">Islam</option>
										<option value="Khatolik">Khatolik</option>
										<option value="Kristen">Kristen</option>
										<option value="Budha">Budha</option>
										<option value="Hindu">Hindu</option>
										<option value="Khonghucu">Khonghucu</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Status Pernikahan:</label>
									<div class="field">
										<select name="status_pernikahan">
										<option value="Belum Kawin" selected>- Pilih -</option>
										<option value="Kawin">Kawin</option>
										<option value="Belum Kawin">Belum Kawin</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Kebangsaan:</label>
									<div class="field">
										<select name="kebangsaan">
										<option value="WNI" selected>- Pilih -</option>
										<option value="WNI">WNI</option>
										<option value="WNA">WNA</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<hr>
								<div class="field-group">
									<label for="email">Nama Keluarga Lain Yang Bisa Dihubungi:</label>
									<div class="field">
										<input type="text" name="keluarga_lain" size="32" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Hubungan Keluarga:</label>
									<div class="field">
										<select name="hubungan_lain">
										<option value="Saudara Lain" selected>- Pilih -</option>
										<option value="Orang Tua">Orang Tua</option>
										<option value="Anak">Anak</option>
										<option value="Saudara Kandung">Saudara Kandung</option>
										<option value="Saudara Lain">Saudara Lain</option>
										<option value="Kerabat">Kerabat</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Alamat Keluarga:</label>
									<div class="field">
										<textarea cols="32" rows="3" name="alamat_lain"></textarea>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Handphone Keluarga:</label>
									<div class="field">
										<input type="text" name="tlp_lain" size="32" />	
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
  case "editpasien":
    $edit=mysql_query("SELECT * FROM pasien WHERE id_pasien='$_GET[id]'");
    $r=mysql_fetch_array($edit);
?>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pasien&act=update'"; ?> method="post">
								
								<div class="field-group">
									<label for="email">Kode Pasien:</label>
									<div class="field">	
										<input type="hidden" name="id" size="20" value="<?php echo"$r[id_pasien]"; ?>" />
										<input type="hidden" name="kode_pasien" size="20" value="<?php echo"$r[kode_pasien]"; ?>" />
										<input type="hidden" name="nik_pasien2" size="20" value="<?php echo"$r[nik_pasien]"; ?>" />
                                        <input type="text" name="kode_pasien2" disabled="disabled" size="20" value="<?php echo"$r[kode_pasien]"; ?>" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Pasien:</label>
									<div class="field">
										<input type="text" name="nama_pasien" size="32" value="<?php echo"$r[nama_pasien]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">NIK Pasien:</label>
									<div class="field">
										<input type="text" name="nik_pasien" size="32" value="<?php echo"$r[nik_pasien]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">								
									<label for="datepicker">Tanggal Lahir:</label>
									<div class="field">
										<input type="text" name="tgl_lahir" id="datepicker" value="<?php echo"$r[tgl_lahir]"; ?>" />				
									</div> <!-- .field -->								
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nomor Rekam Medis:</label>
									<div class="field">
										<input type="text" name="no_rm" size="32" value="<?php echo"$r[no_rm]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Alamat Pasien:</label>
									<div class="field">
										<textarea cols="32" rows="3" name="alamat_pasien"><?php echo"$r[alamat_pasien]"; ?></textarea>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Desa:</label>
									<div class="field">
										<input type="text" name="desa" size="32" value="<?php echo"$r[desa]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Handphone:</label>
									<div class="field">
										<input type="text" name="tlp_pasien" size="32" value="<?php echo"$r[tlp_pasien]"; ?>" />	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Pekerjaan:</label>
									<div class="field">
										<select name="pekerjaan">
										<option value="<?php echo"$r[pekerjaan]"; ?>" selected><?php echo"$r[pekerjaan]"; ?></option>
										<option value="PNS">PNS</option>
										<option value="TNI">TNI</option>
										<option value="Polri">Polri</option>
										<option value="Swasta">Swasta</option>
										<option value="Wiraswasta">Wirasasta</option>
										<option value="Buruh">Buruh</option>
										<option value="Pelajar">Pelajar</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Agama:</label>
									<div class="field">
										<select name="agama">
										<option value="<?php echo"$r[agama]"; ?>" selected><?php echo"$r[agama]"; ?></option>
										<option value="Islam">Islam</option>
										<option value="Khatolik">Khatolik</option>
										<option value="Kristen">Kristen</option>
										<option value="Budha">Budha</option>
										<option value="Hindu">Hindu</option>
										<option value="Khonghucu">Khonghucu</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Status Pernikahan:</label>
									<div class="field">
										<select name="status_pernikahan">
										<option value="<?php echo"$r[status_pernikahan]"; ?>" selected><?php echo"$r[status_pernikahan]"; ?></option>
										<option value="Kawin">Kawin</option>
										<option value="Belum Kawin">Belum Kawin</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Kebangsaan:</label>
									<div class="field">
										<select name="kebangsaan">
										<option value="<?php echo"$r[kebangsaan]"; ?>" selected><?php echo"$r[kebangsaan]"; ?></option>
										<option value="WNI">WNI</option>
										<option value="WNA">WNA</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<hr>
								<div class="field-group">
									<label for="email">Nama Keluarga Lain Yang Bisa Dihubungi:</label>
									<div class="field">
										<input type="text" name="keluarga_lain" size="32" value="<?php echo"$r[keluarga_lain]"; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="url">Hubungan Keluarga:</label>
									<div class="field">
										<select name="hubungan_lain">
										<option value="<?php echo"$r[hubungan_lain]"; ?>" selected><?php echo"$r[hubungan_lain]"; ?></option>
										<option value="Orang Tua">Orang Tua</option>
										<option value="Anak">Anak</option>
										<option value="Saudara Kandung">Saudara Kandung</option>
										<option value="Saudara Lain">Saudara Lain</option>
										<option value="Kerabat">Kerabat</option>
										</select>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Alamat Keluarga:</label>
									<div class="field">
										<textarea cols="32" rows="3" name="alamat_lain"><?php echo"$r[alamat_lain]"; ?></textarea>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Handphone Keluarga:</label>
									<div class="field">
										<input type="text" name="tlp_lain" size="32" value="<?php echo"$r[tlp_lain]"; ?>"/>	
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
