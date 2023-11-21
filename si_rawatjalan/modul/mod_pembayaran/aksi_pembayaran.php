<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];

// Hapus pembayaran
if ($module=='pembayaran' AND $act=='hapus1'){
  mysql_query("DELETE FROM detail_pembayaran WHERE id_obat='$_GET[id_obat]' and id_pembayaran='$_GET[id_pembayaran]'");
  header('location:../../media.php?module='.$module.'&act=tambahpembayaran');
}
elseif ($module=='pembayaran' AND $act=='hapus2'){
  mysql_query("DELETE FROM detail_pembayaran WHERE id_pembayaran='$_GET[id_pembayaran]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='pembayaran' AND $act=='hapus'){
  mysql_query("DELETE FROM pembayaran WHERE id_pembayaran='$_GET[id]'");
  mysql_query("DELETE FROM detail_pembayaran WHERE id_pembayaran='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='pembayaran' AND $act=='hapus33'){
  mysql_query("DELETE FROM detail_pembayaran WHERE id_obat='$_GET[id_obat]' AND id_pembayaran='$_GET[id_pembayaran]'");
  header('location:../../media.php?module='.$module.'&act=editpembayaran&id='.$_GET[id_pembayaran]);
}
// Input pembayaran
elseif ($module=='pembayaran' AND $act=='input1'){
  mysql_query("INSERT INTO detail_pembayaran(id_pembayaran,id_obat,qty,harga) VALUES('$_POST[id_pembayaran]','$_POST[id_obat]','$_POST[qty]','$_POST[harga]')");
  header('location:../../media.php?module='.$module.'&act=tambahpembayaran');
}
elseif ($module=='pembayaran' AND $act=='input22'){
  mysql_query("INSERT INTO detail_pembayaran(id_pembayaran,id_obat,qty,harga) VALUES('$_POST[id_pembayaran]','$_POST[id_obat]','$_POST[qty]','$_POST[harga]')");
  header('location:../../media.php?module='.$module.'&act=editpembayaran&id='.$_POST[id_pembayaran]);
}
elseif ($module=='pembayaran' AND $act=='input'){

  mysql_query("INSERT INTO pembayaran(id_pembayaran,id_pendaftaran,jumlah,biaya_daftar) 
  VALUES('$_POST[id_pembayaran]','$_POST[id_pendaftaran]','$_POST[jmlh]','$_POST[biaya_daftar]')");
  
  mysql_query("UPDATE pendaftaran SET status = '$_POST[status]' WHERE id_pendaftaran= '$_POST[id_pendaftaran]'");
  
  header('location:../../media.php?module='.$module);
}

// Update Barang
elseif ($module=='pembayaran' AND $act=='update22'){
  mysql_query("UPDATE pembayaran SET biaya_daftar= '$_POST[biaya_daftar]', jumlah= '$_POST[jmlh]'  WHERE id_pembayaran= '$_POST[id_pembayaran]'");
  mysql_query("UPDATE pendaftaran SET status = '$_POST[status]' WHERE id_pendaftaran= '$_POST[id_pendaftaran]'");
  
  header('location:../../media.php?module='.$module);
}
?>
