<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus dokter
if ($module=='dokter' AND $act=='hapus'){
  mysql_query("DELETE FROM dokter WHERE id_dokter='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input dokter
elseif ($module=='dokter' AND $act=='input'){
  mysql_query("INSERT INTO dokter(kode_dokter,nama_dokter,alamat_dokter,tlp_dokter) VALUES('$_POST[kode_dokter]','$_POST[nama_dokter]','$_POST[alamat_dokter]','$_POST[tlp_dokter]')");
  
	$pass=md5($_POST[kode_dokter]);
	mysql_query("INSERT INTO users(username,password,nama_lengkap,email,no_telp,level,blokir) 
	VALUES('$_POST[kode_dokter]','$pass','$_POST[nama_dokter]','kosong','$_POST[tlp_dokter]','dokter','N')");
	
  header('location:../../media.php?module='.$module);
}

// Update dokter
elseif ($module=='dokter' AND $act=='update'){
  mysql_query("UPDATE dokter SET kode_dokter = '$_POST[kode_dokter]', nama_dokter = '$_POST[nama_dokter]', alamat_dokter = '$_POST[alamat_dokter]', tlp_dokter = '$_POST[tlp_dokter]' WHERE id_dokter= '$_POST[id]'");
  
    $pass=md5($_POST[kode_dokter]);					
    mysql_query("UPDATE users SET  username = '$_POST[kode_dokter]', 
    password = '$pass',
	nama_lengkap = '$_POST[nama_dokter]',
	no_telp = '$_POST[tlp_dokter]' WHERE username= '$_POST[kode_dokter2]'");
  
  header('location:../../media.php?module='.$module);
}
?>
