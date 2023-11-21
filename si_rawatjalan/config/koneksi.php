<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "2020_sirawatjalan";

// Koneksi dan memilih database di server
//mysqli_connect($server,$username,$password) or die("Koneksi gagal");
//mysqli_select_db($database) or die("Database tidak bisa dibuka");
$con = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
mysqli_select_db($con,$database) or die("Database tidak bisa dibuka");

?>
