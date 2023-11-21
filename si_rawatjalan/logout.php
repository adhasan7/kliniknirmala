<?php
  session_start();
  session_destroy();
  setcookie("username", "", time());
  //echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b>";

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:

  header('location:/2020/si_rawatjalan');
?>
