<?php
$aksi="modul/mod_transaksi/aksi_pendaftaran2.php";
switch($_GET[act]){
  default:
    echo "<h2>Master Data Pendaftaran</h2>
			<button class=\"btn btn-quaternary\" onclick=\"window.location.href='?module=pendaftaran2&act=tambahpendaftaran2';\"><span class=\"icon-plus-alt\"></span>Tambah Data Pendaftaran</button>
<br />
<br />
          <table class=\"table table-bordered table-striped data-table\"><thead>
          <tr><th>No</th><th>No Pendaftaran</th><th>Tanggal</th><th>Nama Pasien</th><th>Alamat</th><th>Status</th><th>Antrian</th><th>Resep</th><th>Aksi</th></tr></thead>
		  <tbody>"; 
    $tampil=mysql_query("SELECT * FROM pendaftaran A, pasien B where A.id_pasien=B.id_pasien and A.status!='Selesai' and B.nik_pasien='$_SESSION[namauser]' ORDER BY A.no_pendaftaran ASC");
    $no=1;
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr class=\"gradeA\"><td>$no</td>
             <td>$r[no_pendaftaran]</td>
			 <td>$r[tgl_daftar]</td>
			 <td>$r[nama_pasien]</td>
			 <td>$r[desa]</td>
			 <td>$r[status]</td>
			 <td align='center'>";?>
				<form method="post" action="print_antrian.php" target='_blank'>
				<input name="id_pendaftaran" type="hidden" value="<?php echo $r['id_pendaftaran'];?>"/>
				<a title="Print"><input name="cari" type="image" src="././images/silk/printer.png"/></a>
				</form>
			<?php
			echo "
			 </td>
			 <td align='center'>";?>
				<form method="post" action="print_resep.php" target='_blank'>
				<input name="id_pendaftaran" type="hidden" value="<?php echo $r['id_pendaftaran'];?>"/>
				<a title="Print"><input name="cari" type="image" src="././images/silk/printer.png"/></a>
				</form>
			<?php
			echo "
			 </td>
             <td><a href=?module=pendaftaran2&act=editpendaftaran2&id=$r[id_pendaftaran]><span class=\"icon-wrench\" title=\"Ubah\"></span></a>
             </td></tr>";
      $no++;
    }
    echo "</tbody></table>"; ?>
	
	
	<?php
    break;
  
  // Form Tambah Kategori
  case "tambahpendaftaran2":
  ?>
  
 <?php 
	$tanggal=date("Y-m-d");
	$thn=date("Y");
	$bln=date("m");
	$tgl=date("d");
//jurnal baru. cari nomor paling besar yaitu nomor jurnal terakhir 
	$no_bukti=mysql_fetch_array(mysql_query("SELECT count(*), id_pendaftaran FROM pendaftaran where tgl_daftar='$tanggal' ORDER BY tgl_daftar DESC"));
	$nomor_jurnal=$no_bukti[0]+1;
	$id_transaksi="ANTRIAN-0".$nomor_jurnal."/".$tgl."-".$bln."-".$thn;
?>
 
				<?php
				$cari=$_SESSION[namauser];
				$cari="select * from pasien WHERE nik_pasien='$cari'";
				$hasil=mysql_query($cari);
				$data=mysql_fetch_row($hasil);
				?>
 
	
 <h2>Tambah Data Pendaftaran</h2>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pendaftaran2&act=input'"; ?>  method="post"/>
								
								<div class="field-group">
									<label for="email">Nomor Pendaftaran:</label>
									<div class="field">
										<input type="hidden" name="no_pendaftaran" size="20" maxlength="3" value="<?php echo"$id_transaksi"; ?>"/>
										<input type="hidden" name="tgl_daftar" size="20" value="<?php echo"$tanggal"; ?>"/>											
										<input type="hidden" name="id_pasien" size="20" value="<?php print  $data[0]; ?>" />	
										<input type="hidden" name="status" size="20" value="Daftar" />
										<input type="text" disabled="disabled" name="nama_pendaftaran" size="32" value="<?php print  $id_transaksi; ?>" />
										<input type="text" disabled="disabled" name="nama_tanggal" size="32" value="<?php print  $tanggal; ?>" />
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Nama Pasien:</label>
									<div class="field">
										<input type="text" disabled="disabled" name="kode_pasien2" size="32" value="<?php print  $data[1]; ?>"/>	
										<input type="text" disabled="disabled" name="nama_pasien2" size="32" value="<?php print  $data[2]; ?>"/>	
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Keterangan:</label>
									<div class="field">
										<input type="text" disabled="disabled" name="alamat_pasien2" size="32" value="<?php print  $data[4]; ?>"/>
										<input type="text" disabled="disabled" name="tlp_pasien2" size="32" value="<?php print  $data[6]; ?>"/>
									</div>
								</div> <!-- .field-group -->
								<div class="field-group">
									<label for="email">Gejala:</label>
									<div class="field">
										<input type="text" name="gejala" size="69" />	
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
  case "editpendaftaran2":
    $edit=mysql_query("SELECT * FROM pendaftaran A, pasien B WHERE A.id_pasien=B.id_pasien and A.id_pendaftaran='$_GET[id]'");
    $r=mysql_fetch_array($edit);
?>
 <form class="form uniformForm validateForm" <?php echo"action='$aksi?module=pendaftaran2&act=update'"; ?> method="post">
								
								<div class="field-group">
									<label for="email">Nomor Pendaftaran:</label>
									<div class="field">	
										<input type="hidden" name="id" size="20" value="<?php echo"$r[id_pendaftaran]"; ?>" />
										<input type="hidden" name="no_pendaftaran" size="20" value="<?php echo"$r[no_pendaftaran]"; ?>" />
										<input type="hidden" name="tgl_daftar" size="20" value="<?php echo"$r[tgl_daftar]"; ?>"/>											
										<input type="hidden" name="id_pasien" size="20" value="<?php echo"$r[id_pasien]"; ?>" />	
										<input type="hidden" name="status" size="20" value="Daftar" />
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
										<input type="text" name="gejala" size="69" value="<?php echo"$r[gejala]"; ?>"/>	
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
