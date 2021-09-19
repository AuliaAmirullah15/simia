-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2021 at 07:09 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simia`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_jadwal_kegiatan`
--

CREATE TABLE IF NOT EXISTS `adm_jadwal_kegiatan` (
`id_jadwal` int(200) NOT NULL,
  `nama_kegiatan` varchar(150) NOT NULL,
  `waktu` datetime NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `status` enum('on','batal','valid') NOT NULL,
  `kategori` enum('umum','rahasia') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm_jadwal_kegiatan`
--

INSERT INTO `adm_jadwal_kegiatan` (`id_jadwal`, `nama_kegiatan`, `waktu`, `tempat`, `status`, `kategori`) VALUES
(1, 'Rapat Koordinasi', '2020-03-12 07:30:18', 'Gedung A', 'on', 'umum'),
(2, 'sdfsdf', '0000-00-00 00:00:00', 'sdfsd', 'on', 'umum'),
(3, 'sedfgsdf', '0000-00-00 00:00:00', 'sdjhfsdf', 'on', 'umum'),
(5, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(6, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(7, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(8, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(9, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(10, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(11, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(12, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(13, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(14, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(15, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(16, 'sdfsdfdf', '2020-10-10 10:10:00', 'sdfsdfsd', 'on', 'rahasia'),
(17, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(18, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(19, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(20, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(21, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(22, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(23, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(24, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(25, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(26, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(27, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(28, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(29, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(30, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(31, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(32, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(33, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(34, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(35, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(36, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(37, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(38, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(39, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(40, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(41, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(42, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(43, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(44, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(45, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(46, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(47, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(48, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(49, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(50, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(51, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(52, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(53, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(54, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum'),
(55, 'sdfsdfsd', '2020-02-20 20:20:00', 'asjihfjkas', 'on', 'umum');

-- --------------------------------------------------------

--
-- Table structure for table `adm_notulensi`
--

CREATE TABLE IF NOT EXISTS `adm_notulensi` (
`id_notulensi` int(200) NOT NULL,
  `id_jadwal` int(200) NOT NULL,
  `nama_notulen` varchar(100) NOT NULL,
  `notulensi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm_notulensi`
--

INSERT INTO `adm_notulensi` (`id_notulensi`, `id_jadwal`, `nama_notulen`, `notulensi`) VALUES
(1, 1, 'Ahmad', 'djkashfjds dsjfhkdjsk kajsdhfjsdkhf dsfjhsdjfbasd fsdajfghasjhzf');

-- --------------------------------------------------------

--
-- Table structure for table `adm_peserta_undangan`
--

CREATE TABLE IF NOT EXISTS `adm_peserta_undangan` (
`id_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm_peserta_undangan`
--

INSERT INTO `adm_peserta_undangan` (`id_peserta`, `nama_peserta`) VALUES
(2, 'sdfsdfsdgdfd'),
(3, 'sdfgsd'),
(4, 'sdfgsdsedrfefte');

-- --------------------------------------------------------

--
-- Table structure for table `inv_inventaris`
--

CREATE TABLE IF NOT EXISTS `inv_inventaris` (
`id_inventaris` int(100) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `id_sumber_dana` int(2) NOT NULL,
  `tahun_pendanaan` int(4) NOT NULL,
  `lokasi` int(100) NOT NULL,
  `kondisi` enum('baik','rusak','sangat_baik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_komentar_laporan`
--

CREATE TABLE IF NOT EXISTS `inv_komentar_laporan` (
`id_komentar` int(255) NOT NULL,
  `id_laporan` int(200) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `id_user` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_laporan`
--

CREATE TABLE IF NOT EXISTS `inv_laporan` (
`id_laporan` int(225) NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pekerjaan` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) NOT NULL,
  `nim_nip` int(30) DEFAULT NULL,
  `status` enum('mahasiswa','dosen','umum','pegawai') NOT NULL,
  `jenis_laporan` enum('akademik','aset','penelitian') NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `tingkat_kerahasiaan` enum('umum','rahasia') NOT NULL,
  `status_proses` enum('belum','sudah') NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `bukti` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_notifikasi`
--

CREATE TABLE IF NOT EXISTS `inv_notifikasi` (
`id_notifikasi` int(200) NOT NULL,
  `id_komentar` int(200) NOT NULL,
  `status` enum('belum','sudah') NOT NULL,
  `id_user` int(200) NOT NULL,
  `id_laporan` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_ruangan`
--

CREATE TABLE IF NOT EXISTS `inv_ruangan` (
`id_ruangan` int(200) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_sumber_dana`
--

CREATE TABLE IF NOT EXISTS `inv_sumber_dana` (
`id_sumber_dana` int(20) NOT NULL,
  `sumber_dana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_tindakan`
--

CREATE TABLE IF NOT EXISTS `inv_tindakan` (
`id_tindakan` int(225) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `tindakan` text NOT NULL,
  `tanggal_tindakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `inv_tindakan`
--
DELIMITER //
CREATE TRIGGER `tanggal_tindakan` BEFORE INSERT ON `inv_tindakan`
 FOR EACH ROW BEGIN
    SET NEW.tanggal_tindakan = NOW();
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_histori_status_aset`
--

CREATE TABLE IF NOT EXISTS `log_histori_status_aset` (
`id_log` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `aksi` text NOT NULL,
  `status` enum('rusak','baik','sangat_baik') NOT NULL,
  `id_inventaris` int(200) NOT NULL,
  `tindakan` text,
  `id_user` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('wd1','wd2','wd3','notulen','dekan','akademik','aset','penelitian','master_admin') NOT NULL,
  `sub_bagian` enum('akademik','aset','penelitian','super') NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `level`, `sub_bagian`, `created_date`) VALUES
(1, 'Perlengkapan', 'perlengkapan_fasilkomti', 'e5bb625b2ccb0737f34849429a9b9f33', 'aset', 'aset', '2020-02-17 13:14:38'),
(3, 'Wakil Dekan 1', 'wakil_dekan1', '6f2cdc841a15b5cc0f091c5925d75a15', 'wd1', 'akademik', '2020-03-02 17:43:36'),
(4, 'Wakil Dekan 2', 'wakil_dekan2', 'fb42e2191842419f2a91d75a6c29a127', 'wd2', 'aset', '2020-03-02 17:45:51'),
(5, 'Wakil Dekan 3', 'wakil_dekan3', 'ba7ca9ae3e5b21c7957e966cee2d5050', 'wd3', 'penelitian', '2020-03-02 17:45:51'),
(6, 'Akademik, Kemahasiswaan dan Kealumnian', 'akademik', '0b5652714faf87700d60a912f753cc55', 'akademik', 'akademik', '2020-03-02 17:47:23'),
(7, 'Pengelolaan Aset, Keuangan dan SDM', 'aset', 'e334c76eb6e1c966df0dc9a81fde8e7c', 'aset', 'aset', '2020-03-02 17:48:11'),
(8, 'Penelitian, Pengabdian Masyarakat dan Kerjasama', 'penelitian', 'af3008ff662d5838e79a08bf3a72ce24', 'penelitian', 'penelitian', '2020-03-02 17:51:12'),
(9, 'Dekan', 'dekan', '3da2f457ad7c0edf1c94e1ea87b0818d', 'dekan', 'super', '2020-03-02 17:52:00'),
(10, 'Master Admin', 'master_admin', '9e8d251e410a8e3539da58e206a8361b', 'master_admin', 'super', '2020-03-02 17:52:39');

--
-- Triggers `user`
--
DELIMITER //
CREATE TRIGGER `add_current_time` BEFORE INSERT ON `user`
 FOR EACH ROW BEGIN
    SET NEW.created_date = NOW();
END
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_jadwal_kegiatan`
--
ALTER TABLE `adm_jadwal_kegiatan`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `adm_notulensi`
--
ALTER TABLE `adm_notulensi`
 ADD PRIMARY KEY (`id_notulensi`), ADD UNIQUE KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `adm_peserta_undangan`
--
ALTER TABLE `adm_peserta_undangan`
 ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `inv_inventaris`
--
ALTER TABLE `inv_inventaris`
 ADD PRIMARY KEY (`id_inventaris`), ADD KEY `id_sumber_dana` (`id_sumber_dana`) USING BTREE;

--
-- Indexes for table `inv_komentar_laporan`
--
ALTER TABLE `inv_komentar_laporan`
 ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `inv_laporan`
--
ALTER TABLE `inv_laporan`
 ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `inv_notifikasi`
--
ALTER TABLE `inv_notifikasi`
 ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `inv_ruangan`
--
ALTER TABLE `inv_ruangan`
 ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `inv_sumber_dana`
--
ALTER TABLE `inv_sumber_dana`
 ADD PRIMARY KEY (`id_sumber_dana`);

--
-- Indexes for table `inv_tindakan`
--
ALTER TABLE `inv_tindakan`
 ADD PRIMARY KEY (`id_tindakan`), ADD UNIQUE KEY `id_barang` (`id_barang`) USING BTREE;

--
-- Indexes for table `log_histori_status_aset`
--
ALTER TABLE `log_histori_status_aset`
 ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_jadwal_kegiatan`
--
ALTER TABLE `adm_jadwal_kegiatan`
MODIFY `id_jadwal` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `adm_notulensi`
--
ALTER TABLE `adm_notulensi`
MODIFY `id_notulensi` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `adm_peserta_undangan`
--
ALTER TABLE `adm_peserta_undangan`
MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `inv_inventaris`
--
ALTER TABLE `inv_inventaris`
MODIFY `id_inventaris` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inv_komentar_laporan`
--
ALTER TABLE `inv_komentar_laporan`
MODIFY `id_komentar` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inv_laporan`
--
ALTER TABLE `inv_laporan`
MODIFY `id_laporan` int(225) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inv_notifikasi`
--
ALTER TABLE `inv_notifikasi`
MODIFY `id_notifikasi` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inv_ruangan`
--
ALTER TABLE `inv_ruangan`
MODIFY `id_ruangan` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inv_sumber_dana`
--
ALTER TABLE `inv_sumber_dana`
MODIFY `id_sumber_dana` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inv_tindakan`
--
ALTER TABLE `inv_tindakan`
MODIFY `id_tindakan` int(225) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_histori_status_aset`
--
ALTER TABLE `log_histori_status_aset`
MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adm_notulensi`
--
ALTER TABLE `adm_notulensi`
ADD CONSTRAINT `adm_notulensi_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `adm_jadwal_kegiatan` (`id_jadwal`);

--
-- Constraints for table `inv_inventaris`
--
ALTER TABLE `inv_inventaris`
ADD CONSTRAINT `inventaris_sumber_dana` FOREIGN KEY (`id_sumber_dana`) REFERENCES `inv_sumber_dana` (`id_sumber_dana`) ON DELETE NO ACTION;

--
-- Constraints for table `inv_tindakan`
--
ALTER TABLE `inv_tindakan`
ADD CONSTRAINT `inventaris_tindakan` FOREIGN KEY (`id_barang`) REFERENCES `inv_inventaris` (`id_inventaris`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
