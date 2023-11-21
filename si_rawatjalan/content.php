<?php
include "config/koneksi.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combo_admin.php";
include "config/fungsi_combobox.php";
include "config/class_paging.php";
include "config/tanggal.php";
include "config/radio.php";

// Bagian Home
if ($_GET[module]=='home'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  echo "<h2>Selamat Datang $_SESSION[namalengkap]</h2><br />
          <img src='images/logo2.png' border=0 align=left hspace=8 width=200/><p><br><br><br><br>
		  Selamat datang di Sistem Informasi Manajemen Rawat Jalan Pasien Berbasis Web pada Balai Pengobatan Nirmala. Pilih menu disamping untuk mengolah data Master, Transaksi dan Laporan.</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>";
//}
}

// Bagian User
elseif ($_GET[module]=='user'){
if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){
  include "modul/mod_users/users.php";
}
}

// Bagian Obat
elseif ($_GET[module]=='obat'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_obat/obat.php";
//}
}
// Bagian Dokter
elseif ($_GET[module]=='dokter'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_dokter/dokter.php";
//}
}
// Bagian Pasien
elseif ($_GET[module]=='pasien'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_pasien/pasien.php";
//}
}
// Bagian Pendaftaran
elseif ($_GET[module]=='pendaftaran'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_transaksi/pendaftaran.php";
//}
}
// Bagian Pendaftaran Pasien
elseif ($_GET[module]=='pendaftaran2'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_transaksi/pendaftaran2.php";
//}
}
// Bagian Pemeriksaan
elseif ($_GET[module]=='pemeriksaan'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_transaksi/pemeriksaan.php";
//}
}
// Bagian Pembayaran
elseif ($_GET[module]=='pembayaran'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_pembayaran/pembayaran.php";
//}
}
// Bagian Laporan Obat
elseif ($_GET[module]=='laporanobat'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/laporanobat.php";
//}
}
// Bagian Laporan Dokter
elseif ($_GET[module]=='laporandokter'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/laporandokter.php";
//}
}
// Bagian Laporan Pasien
elseif ($_GET[module]=='laporanpasien'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/laporanpasien.php";
//}
}
// Bagian Kartu Berobat
elseif ($_GET[module]=='kartu'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/kartu.php";
//}
}
// Bagian Kartu Berobat Pasien
elseif ($_GET[module]=='kartu2'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/kartu2.php";
//}
}
// Bagian Rekam Medis
elseif ($_GET[module]=='rekam'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/rekam.php";
//}
}
// Bagian Laporan Pendafataran
elseif ($_GET[module]=='laporanpendaftaran'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/laporanpendaftaran.php";
//}
}
// Bagian Laporan Pembayaran
elseif ($_GET[module]=='laporanpembayaran'){
/*if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){*/
  include "modul/mod_laporan/laporanpembayaran.php";
//}
}
// Apabila modul tidak ditemukan
else{
if ($_SESSION['leveluser']=='1' OR $_SESSION['leveluser']=='3' OR $_SESSION['leveluser']=='4' OR $_SESSION['leveluser']=='5' OR $_SESSION['leveluser']=='6'){
echo"<script>window.location = '404.html'</script> ";
}
}?>
