<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus obat
if ($module=='obat' AND $act=='hapus'){
  mysql_query("DELETE FROM obat WHERE id_obat='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input obat
elseif ($module=='obat' AND $act=='input'){
  mysql_query("INSERT INTO obat(kode_obat,nama_obat,jenis_obat,harga,bentuk_obat) VALUES('$_POST[kode_obat]','$_POST[nama_obat]','$_POST[jenis_obat]','$_POST[harga]','$_POST[bentuk_obat]')");
  header('location:../../media.php?module='.$module);
}

// Update obat
elseif ($module=='obat' AND $act=='update'){
  mysql_query("UPDATE obat SET kode_obat = '$_POST[kode_obat]', nama_obat = '$_POST[nama_obat]', jenis_obat = '$_POST[jenis_obat]', harga = '$_POST[harga]', bentuk_obat = '$_POST[bentuk_obat]' WHERE id_obat= '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
