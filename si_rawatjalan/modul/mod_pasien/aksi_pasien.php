<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

$tgl=explode('/',$_POST[tgl_lahir]);
$hit=count($tgl);
for($i=0;$i<$hit;$i++){
$bulan=$tgl[0];
$tgal=$tgl[1];
$thn=$tgl[2];
}
$tanggal=$thn.'-'.$bulan.'-'.$tgal;

// Hapus pasien
if ($module=='pasien' AND $act=='hapus'){
  mysql_query("DELETE FROM pasien WHERE id_pasien='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input pasien
elseif ($module=='pasien' AND $act=='input'){
  mysql_query("INSERT INTO pasien(nik_pasien,nama_pasien,tgl_lahir,alamat_pasien,desa,tlp_pasien,pekerjaan,agama,status_pernikahan,kebangsaan,keluarga_lain,tlp_lain,alamat_lain,hubungan_lain,no_rm,kode_pasien) 
  VALUES('$_POST[nik_pasien]','$_POST[nama_pasien]','$tanggal','$_POST[alamat_pasien]','$_POST[desa]','$_POST[tlp_pasien]','$_POST[pekerjaan]','$_POST[agama]','$_POST[status_pernikahan]','$_POST[kebangsaan]','$_POST[keluarga_lain]','$_POST[tlp_lain]','$_POST[alamat_lain]','$_POST[hubungan_lain]','$_POST[no_rm]','$_POST[kode_pasien]')");
  
	$pass=md5($_POST[nik_pasien]);
	mysql_query("INSERT INTO users(username,password,nama_lengkap,email,no_telp,level,blokir) 
	VALUES('$_POST[nik_pasien]','$pass','$_POST[nama_pasien]','kosong','$_POST[tlp_pasien]','pasien','N')");
  
  header('location:../../media.php?module='.$module);
}

// Update pasien
elseif ($module=='pasien' AND $act=='update'){
  mysql_query("UPDATE pasien SET nik_pasien = '$_POST[nik_pasien]', 
  nama_pasien = '$_POST[nama_pasien]', 
  tgl_lahir = '$tanggal', 
  alamat_pasien = '$_POST[alamat_pasien]',
  desa = '$_POST[desa]',
  tlp_pasien = '$_POST[tlp_pasien]',
  pekerjaan = '$_POST[pekerjaan]', 
  agama = '$_POST[agama]',
  status_pernikahan = '$_POST[status_pernikahan]',
  kebangsaan = '$_POST[kebangsaan]',
  keluarga_lain = '$_POST[keluarga_lain]',
  tlp_lain = '$_POST[tlp_lain]',
  alamat_lain = '$_POST[alamat_lain]', 
  hubungan_lain = '$_POST[hubungan_lain]',  
  no_rm = '$_POST[no_rm]',
  kode_pasien = '$_POST[kode_pasien]'  WHERE id_pasien= '$_POST[id]'");
  
  
	$pass=md5($_POST[nik_pasien]);					
    mysql_query("UPDATE users SET  username = '$_POST[nik_pasien]', 
    password = '$pass',
	nama_lengkap = '$_POST[nama_pasien]',
	no_telp = '$_POST[tlp_pasien]' WHERE username= '$_POST[nik_pasien2]'");
	
	
  header('location:../../media.php?module='.$module);
}
?>
