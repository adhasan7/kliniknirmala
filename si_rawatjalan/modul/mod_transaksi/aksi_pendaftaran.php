<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];


// Hapus pendaftaran
if ($module=='pendaftaran' AND $act=='hapus'){
  mysql_query("DELETE FROM pendaftaran WHERE id_pendaftaran='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input pendaftaran
elseif ($module=='pendaftaran' AND $act=='input'){
  mysql_query("INSERT INTO pendaftaran(no_pendaftaran,tgl_daftar,id_pasien,gejala,status) 
  VALUES('$_POST[no_pendaftaran]','$_POST[tgl_daftar]','$_POST[id_pasien]','$_POST[gejala]','$_POST[status]')");
  header('location:../../media.php?module='.$module);
}

// Update pendaftaran
elseif ($module=='pendaftaran' AND $act=='update'){
  mysql_query("UPDATE pendaftaran SET gejala = '$_POST[gejala]'  WHERE id_pendaftaran= '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
?>
