<?php
session_start();
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";

$module=$_GET[module];
$act=$_GET[act];
$ss=$_GET[ss];
$tt=$_GET[tt];
$resep=$_POST[resep];

if ($_POST[keterangan_obat]==''){
$keterangan=$resep;
}else{
$keterangan=$_POST[keterangan_obat].' , '.$resep;
}


// Update pemeriksaan
if ($module=='pemeriksaan' AND $act=='update'){
  mysql_query("UPDATE pendaftaran SET id_dokter = '$_POST[id_dokter]',
  diagnosa = '$_POST[diagnosa]',
  keterangan_obat = '$keterangan',
  keterangan_khusus = '$_POST[keterangan_khusus]',
  status = '$_POST[status]'
  WHERE id_pendaftaran= '$_POST[id]'");
  
  if ($_POST[status]=='Selesai') {
  header('location:../../media.php?module='.$module);
  }else{
  header('location:../../media.php?module='.$module.'&act='.$ss.'&id='.$tt);
  }
}
?>
