-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 08, 2021 at 11:14 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `2020_sirawatjalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE IF NOT EXISTS `detail_pembayaran` (
  `id_pembayaran` int(3) NOT NULL,
  `id_obat` int(3) NOT NULL,
  `qty` int(3) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id_pembayaran`, `id_obat`, `qty`, `harga`) VALUES
(3, 14, 2, 4000),
(3, 16, 5, 4000),
(2, 14, 10, 4000),
(1, 15, 4, 2000),
(1, 14, 5, 4000),
(3, 14, 2, 4000),
(3, 16, 5, 4000),
(2, 14, 10, 4000),
(1, 15, 4, 2000),
(1, 14, 5, 4000),
(11, 20, 9, 4000),
(11, 19, 9, 4000),
(6, 16, 14, 4000),
(6, 15, 14, 2000),
(7, 17, 4, 7000),
(8, 15, 6, 2000),
(8, 17, 6, 7000),
(9, 17, 6, 7000),
(9, 15, 6, 2000),
(10, 17, 9, 7000),
(10, 15, 9, 2000),
(12, 18, 9, 3000),
(13, 18, 9, 3000),
(14, 18, 9, 3000),
(14, 19, 9, 4000),
(15, 18, 9, 3000),
(14, 20, 9, 4000),
(15, 19, 9, 4000),
(16, 25, 9, 3000),
(16, 26, 9, 6000),
(17, 19, 9, 4000),
(17, 20, 9, 4000),
(18, 21, 9, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `id_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `kode_dokter` varchar(20) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat_dokter` text NOT NULL,
  `tlp_dokter` varchar(20) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `kode_dokter`, `nama_dokter`, `alamat_dokter`, `tlp_dokter`) VALUES
(2, 'DR1', 'dr. Muljani Aung', 'Cirebon', '089776655442'),
(3, 'DR2', 'dr. Meyfi Yunani', 'jln gejayan cirebon', '089912389012'),
(4, 'DR3', 'dr. M Suhendar', 'Jln pilang Cirebon', '086661234512'),
(5, 'DR4', 'dr. Agnes Agung', 'jln kejaksan cirebon', '081565651113');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `id_obat` int(10) NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(30) NOT NULL,
  `jenis_obat` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `bentuk_obat` varchar(30) NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_obat`, `nama_obat`, `jenis_obat`, `harga`, `bentuk_obat`) VALUES
(16, 'AB003', 'Diabet', 'Probiotik', 4000, 'Kaplet'),
(15, 'OB012', 'Oskadon', 'Probiotik', 2000, 'Kaplet'),
(17, 'OB011', 'Okere AN', 'Generik', 7000, 'Kaplet'),
(18, 'OB01', 'Ace Inhibitor', 'Generik', 3000, 'Kaplet'),
(19, 'OB02', 'ARB', 'Generik', 4000, 'Kaplet'),
(20, 'OB03', 'Beta blockers', 'Generik', 4000, 'Kaplet'),
(21, 'OB04', 'Anti kolinergik', 'Generik', 3000, 'Kaplet'),
(22, 'OB05', 'Anti histamin', 'Generik', 2500, 'Kaplet'),
(23, 'OB06', 'Salfonilurea', 'Generik', 3000, 'Kaplet'),
(24, 'OB07', 'Tiazolidinedin', 'Generik', 4000, 'Kaplet'),
(25, 'OB08', 'Sangobion', 'Generik', 3000, 'Kaplet'),
(26, 'OB09', 'Sakatonik liver', 'Generik', 6000, 'Kaplet'),
(27, 'OB010', 'Glimepiride', 'Generik', 4000, 'Kaplet');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nik_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_pasien` text NOT NULL,
  `desa` varchar(150) NOT NULL,
  `tlp_pasien` varchar(20) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `status_pernikahan` varchar(30) NOT NULL,
  `kebangsaan` varchar(30) NOT NULL,
  `keluarga_lain` varchar(50) NOT NULL,
  `tlp_lain` varchar(20) NOT NULL,
  `alamat_lain` text NOT NULL,
  `hubungan_lain` varchar(30) NOT NULL,
  `no_rm` varchar(30) NOT NULL,
  `kode_pasien` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nik_pasien`, `nama_pasien`, `tgl_lahir`, `alamat_pasien`, `desa`, `tlp_pasien`, `pekerjaan`, `agama`, `status_pernikahan`, `kebangsaan`, `keluarga_lain`, `tlp_lain`, `alamat_lain`, `hubungan_lain`, `no_rm`, `kode_pasien`) VALUES
(2, '3273728312', 'Wawan Kusnawan', '1971-01-17', 'Cirebon', 'Harjamukti', '089777721211', 'Swasta', 'Islam', 'Belum Kawin', 'WNI', 'Tati Nurhayati', '089998777777', 'Cirebon', 'Orang Tua', '232432132', 'PS001'),
(3, '12345', 'Jaya Kusuma', '1972-02-16', 'Cirebon', 'Harjamukti', '0897887666', 'Swasta', 'Islam', 'Belum Kawin', 'WNI', 'OKi', '08978888887', 'Cirebon', 'Orang Tua', '3432432432', 'PS002'),
(9, '323232110', 'Nani Tedi', '0000-00-00', 'Tegal', 'Melati 3', '088585858502', 'PNS', 'Islam', 'Kawin', 'WNI', 'Deni Tukijan', '088484848402', 'Tegal', 'Saudara Kandung', '202020200', 'PS003'),
(10, '323232111', 'Anto Parman', '1975-05-17', 'Kuningan', 'Anggrek 04', '088585858503', 'Swasta', 'Kristen', 'Kawin', 'WNI', 'Randi Putra', '088484848403', 'Kuningan', 'Saudara Lain', '2020202021', 'PS004'),
(11, '323232112', 'Bagus Joko', '1975-05-17', 'Cirebon', 'Padi 05', '088585858504', 'Wiraswasta', 'Islam', 'Kawin', 'WNI', 'Hermanto', '088484848404', 'Cirebon', 'Saudara Kandung', '2020202', 'P005'),
(12, '323232113', 'Andi Irman', '1976-06-18', 'Cirebon', 'sinkong 6', '088585858505', 'PNS', 'Kristen', 'Kawin', 'WNI', 'Jeni Rahma', '088484848405', 'Cirebon', 'Saudara Kandung', '2020202003', 'PS006'),
(13, '323232114', 'Shandi Riyanto', '1980-07-19', 'Majalengka', 'Pisang 7', '08858585858506', 'Swasta', 'Khatolik', 'Kawin', 'WNI', 'Nadia Anike', '08848484848406', 'Majalengka', 'Kerabat', '202020204', 'PS007'),
(14, '323232115', 'Rendi Chandra', '1981-08-20', 'Indramayu', 'Mangga 8', '08858585858507', 'PNS', 'Islam', 'Kawin', 'WNI', 'Ruben Diego', '088484848407', 'Indramayu', 'Saudara Kandung', '202020205', 'PS008'),
(15, '323232116', 'Rudi Eko', '1982-09-21', 'Brebes', 'Apel 9', '088585858508', 'Wiraswasta', 'Kristen', 'Kawin', 'WNI', 'Indah Sidiq', '088484848408', 'Brebes', 'Saudara Kandung', '202020206', 'PS009'),
(16, '323232117', 'Mafruah', '1983-10-22', 'Majalengka', 'Jambu 10', '08858585858509', 'Swasta', 'Islam', 'Kawin', 'WNI', 'Tina Safira', '08848484848409', 'Majalengka', 'Saudara Kandung', '202020207', 'PS10'),
(17, '3900030003', 'Fauziah Rausin', '1988-11-01', 'Cirebon', 'Jln pilang dalam 2', '08777777777', 'Swasta', 'Islam', 'Kawin', 'WNI', 'Rachel Rausin', '08999999991', 'Cirebon', 'Saudara Kandung', '26666666', 'P020');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(3) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `biaya_daftar` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftaran`, `jumlah`, `biaya_daftar`) VALUES
(1, 1, 28000, 50000),
(2, 2, 40000, 20000),
(3, 2, 28000, 10000),
(11, 12, 72000, 50000),
(12, 6, 27000, 15000),
(6, 0, 84000, 50000),
(7, 8, 28000, 50000),
(8, 0, 54000, 50000),
(9, 9, 54000, 50000),
(10, 11, 81000, 50000),
(13, 14, 27000, 15000),
(14, 15, 99000, 15000),
(15, 16, 63000, 15000),
(16, 17, 81000, 15000),
(17, 19, 72000, 15000),
(18, 18, 27000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_pendaftaran` int(3) NOT NULL AUTO_INCREMENT,
  `no_pendaftaran` varchar(40) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `gejala` text NOT NULL,
  `diagnosa` text NOT NULL,
  `keterangan_obat` text NOT NULL,
  `keterangan_khusus` text NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pendaftaran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `no_pendaftaran`, `tgl_daftar`, `id_pasien`, `id_dokter`, `gejala`, `diagnosa`, `keterangan_obat`, `keterangan_khusus`, `status`) VALUES
(1, 'ANTRIAN-01/28-10-2020', '2020-10-28', 2, 2, 'Batuk, Pilek dan Sakit Tenggorokan', 'Covid-19', 'Oskadon 2x1, Diapet 3x1', 'Jangan Makan Nasi', 'Selesai'),
(2, 'ANTRIAN-01/29-10-2020', '2020-10-29', 2, 2, 'Batuk dan Flu', 'Covid-19', 'Vaksin', 'Isolasi Mandiri', 'Selesai'),
(4, 'ANTRIAN-01/30-10-2020', '2020-10-30', 3, 2, 'Batuk dan Flu', '', 'Diabet , Promagh Hijau , Oskadon , ', 'Semangat', 'Selesai'),
(5, 'ANTRIAN-01/27-11-2020', '2020-11-27', 3, 2, 'sakit gigi', 'Vertigo', 'Oskadon 2x3 , Okere 2x3  , ', 'Diminum sebelum sudah makan obatnya.', 'Selesai'),
(6, 'ANTRIAN-01/29-11-2020', '2020-11-29', 2, 2, 'pilek', 'tipes', 'Ace Inhibitor 2x3 , ', 'jauhi minuman alkohol', 'Selesai'),
(7, 'ANTRIAN-01/30-11-2020', '2020-11-30', 3, 2, 'pusing', 'tipes', 'Histigo 2x3,  , Okere2x3 , ', 'Diminum sebelum sudah makan obatnya.', 'Selesai'),
(8, 'ANTRIAN-01/04-12-2020', '2020-12-04', 3, 2, 'meriang', 'Vertigo', 'Dextamin 3x1 , Ibufrofen/Proris 150 mg 2x1 , ', 'Jangan makan yang panas dan dingin', 'Selesai'),
(9, 'ANTRIAN-01/07-12-2020', '2020-12-07', 4, 2, 'pilek', '', 'Oskadon 2x3, , Okere 2x3 , ', 'Jangan makan yang panas dan dingin', 'Selesai'),
(10, 'ANTRIAN-01/08-12-2020', '2020-12-08', 5, 0, 'Pusing', '', '', '', 'Daftar'),
(11, 'ANTRIAN-01/09-12-2020', '2020-12-09', 6, 6, 'pusing', 'Vertigo', 'Okere 2x3,  , Oskadon 2x3 , ', 'jauhi minuman alkohol', 'Selesai'),
(12, 'ANTRIAN-01/21-12-2020', '2020-12-21', 7, 2, 'pusing kepala', 'Vertigo', 'ARB 2x3 , Beta blockers 2x3 , ', 'Diminum sebelum sudah makan obatnya.', 'Selesai'),
(13, 'ANTRIAN-01/24-12-2020', '2020-12-24', 8, 2, 'maag', '', 'Ace Inhibitor 2x3 , Beta blockers 2x3 , ', 'Jangan makan yang panas dan dingin', 'Periksa'),
(14, 'ANTRIAN-02/24-12-2020', '2020-12-24', 7, 2, 'pilek', 'Vertigo', 'Ace Inhibitor 2x3 , ', 'Diminum sebelum sudah makan obatnya.', 'Selesai'),
(15, 'ANTRIAN-01/01-01-2021', '2021-01-01', 2, 2, 'Mual dan Muntah', 'Hipotensi', 'Ace Inhibitor 2x3, , ARB 2x3, , Beta blockers 2x3 , ', 'Minum obat tepat waktu ', 'Selesai'),
(16, 'ANTRIAN-02/01-01-2021', '2021-01-01', 12, 2, 'pusing', 'Vertigo', 'Ace Inhibitor 2x3, , ARB 2x3 , ', 'Minum obat tepat waktu ', 'Selesai'),
(17, 'ANTRIAN-01/04-01-2021', '2021-01-04', 16, 2, 'Sesak Nafas', 'Anemia', 'Sangobion 2x3, , Sakatonik liver 2x3 , ', 'Makan Sebelum Makan', 'Selesai'),
(18, 'ANTRIAN-02/04-01-2021', '2021-01-04', 10, 2, 'pusing', 'Pusing', 'Ace Inhibitor 2x3 , ', 'Makan Sebelum Makan', 'Selesai'),
(19, 'ANTRIAN-01/06-01-2021', '2021-01-06', 17, 2, 'maag', 'Sakit Lambung', 'ARB 2x3, , Beta blockers 2 x3 , ', 'Diminum sesudah makan ', 'Selesai'),
(20, 'ANTRIAN-01/07-01-2021', '2021-01-07', 11, 0, 'meriang', '', '', '', 'Daftar');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('agus', 'fdf169558242ee051cca1479770ebac3', 'Agus & Hasan', 'admin@administration.com', '0######', 'admin', 'N'),
('DR1', 'a2aca0a5092b91bfffb5e31a7f3596a4', 'dr. Muljani Aung', 'kosong', '089776655442', 'dokter', 'N'),
('12345', '827ccb0eea8a706c4c34a16891f84e7b', 'Jaya Kusuma', 'kosong', '0897887666', 'pasien', 'N'),
('DR2', 'a2689d1667e854572ac7df233dd48f8f', 'dr. Meyfi Yunani', 'kosong', '089912389012', 'dokter', 'N'),
('DR3', '1efe41bbe1d967bccefc0bc71499b28b', 'dr. M Suhendar', 'kosong', '086661234512', 'dokter', 'N'),
('DR4', '2d4891f0b93eccf0d0c76e685c8af609', 'dr. Agnes Agung', 'kosong', '081565651113', 'dokter', 'N'),
('DR5', 'f67963e17342b4da4bec632abeb73530', 'dr. Siska Agustin', 'kosong', '086512345112', 'dokter', 'N'),
('654', 'ab233b682ec355648e7891e66c54191b', 'Rina AGustin', 'kosong', '087777', 'pasien', 'N'),
('1120', 'c6036a69be21cb660499b75718a3ef24', 'Fauziah Rousin', 'kosong', '081546405120', 'pasien', 'N'),
('2020555', 'bb1ecced12e2fb1a6c12250991993c5f', 'Bora Agustinus', 'kosong', '089991234556', 'pasien', 'N'),
('34567', '992a6d18b2a148cf20d9014c3524aa11', 'hamka hamzah', 'kosong', '081546405120', 'pasien', 'N'),
('323232110', '613ae1745dd7633d4f7efa59596d7560', 'Nani Tedi', 'kosong', '088585858502', 'pasien', 'N'),
('323232111', 'f3db5b192a23cc57a49e42ecaaf0af4a', 'Anto Parman', 'kosong', '088585858503', 'pasien', 'N'),
('323232112', 'a857cf517dde2e46b40fcb27c76b4451', 'Bagus Joko', 'kosong', '088585858504', 'pasien', 'N'),
('323232113', '753da0b23eda23947bd7a719ae32af87', 'Andi Irman', 'kosong', '088585858505', 'pasien', 'N'),
('323232114', 'ad8eebd4d766736924a500a8f8a82135', 'Shandi Riyanto', 'kosong', '08858585858506', 'pasien', 'N'),
('323232115', '87b5f720a86043e2107bdf3744d9a487', 'Rendi Chandra', 'kosong', '08858585858507', 'pasien', 'N'),
('323232116', 'ff7715b5f7528b71d490e5ae4247ab3d', 'Rudi Eko', 'kosong', '088585858508', 'pasien', 'N'),
('323232117', '1c3519f33f43132aaf1c9c62c7353ef8', 'Mafruah', 'kosong', '08858585858509', 'pasien', 'N'),
('3900030003000', '95275ed60b0cbad839830f87a5c70aff', 'Fauziah Rausin', 'kosong', '08777777777', 'pasien', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
