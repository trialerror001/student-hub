-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 28, 2019 at 01:52 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_ruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE IF NOT EXISTS `tb_barang` (
  `kd_peminjaman` varchar(12) NOT NULL,
  `nama_barang` text NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kd_barang`),
  KEY `kd_peminjaman` (`kd_peminjaman`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tb_observasi`
--

DROP TABLE IF EXISTS `tb_observasi`;
CREATE TABLE IF NOT EXISTS `tb_observasi` (
  `kd_peminjaman` varchar(12) NOT NULL,
  `id_request` varchar(10) CHARACTER SET utf8 NOT NULL,
  `kd_ruangan` varchar(15) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu_pinjam` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status_peminjaman` text NOT NULL,
  PRIMARY KEY (`kd_peminjaman`),
  KEY `id_request` (`id_request`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_observasi`
--

INSERT INTO `tb_observasi` (`kd_peminjaman`, `id_request`, `kd_ruangan`, `tanggal_pinjam`, `tanggal_selesai`, `waktu_pinjam`, `waktu_selesai`, `status_peminjaman`) VALUES
('OBS0004', 'REQ0009', 'A1_201', '2019-03-06', '2019-03-07', '08:00:00', '08:00:00', 'Reserved'),
('OBS0001', 'REQ0001', 'A1_201', '2019-02-15', '2019-02-17', '09:00:00', '15:00:00', 'Done'),
('OBS0002', 'REQ0006', 'A1_202', '2019-02-26', '2019-02-26', '08:00:00', '10:00:00', 'Done'),
('OBS0003', 'REQ0007', 'A1_202', '2019-02-27', '2019-02-27', '08:00:00', '10:00:00', 'Done'),
('OBS0005', 'REQ0010', 'A1_202', '2019-02-26', '2019-02-26', '10:30:00', '11:30:00', 'Done'),
('OBS0006', 'REQ0011', 'A1_202', '2019-02-26', '2019-02-26', '12:00:00', '13:30:00', 'Done'),
('OBS0007', 'REQ0012', 'A1_202', '2019-02-26', '2019-02-26', '13:30:00', '14:30:00', 'Done'),
('OBS0008', 'REQ0014', 'A1_201', '2019-02-26', '2019-02-26', '08:00:00', '09:30:00', 'Done'),
('OBS0009', 'REQ0015', 'A1_201', '2019-03-01', '2019-03-01', '08:00:00', '10:00:00', 'Reserved'),
('OBS0010', 'REQ0017', 'A1_201', '2019-03-06', '2019-03-06', '08:00:00', '10:00:00', 'Reserved'),
('OBS0011', 'REQ0020', 'A1_203', '2019-03-03', '2019-03-03', '08:00:00', '09:30:00', 'Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_organisasi`
--

DROP TABLE IF EXISTS `tb_organisasi`;
CREATE TABLE IF NOT EXISTS `tb_organisasi` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `email_organisasi` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_organisasi`
--

INSERT INTO `tb_organisasi` (`username`, `password`, `nama_organisasi`, `email_organisasi`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin'),
('hme.ft', '43dc7e72972e46401a9c2d1db0659fc7', 'Himpunan Mahasiswa Elektro', 'hme.ft@atmajaya.ac.id', 'himpunan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

DROP TABLE IF EXISTS `tb_registrasi`;
CREATE TABLE IF NOT EXISTS `tb_registrasi` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `email_organisasi` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `nama_organisasi` (`nama_organisasi`),
  KEY `email_organisasi` (`email_organisasi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

DROP TABLE IF EXISTS `tb_request`;
CREATE TABLE IF NOT EXISTS `tb_request` (
  `id_request` varchar(10) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `kd_ruangan` varchar(15) NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `action` varchar(20) NOT NULL,
  PRIMARY KEY (`id_request`),
  KEY `nama_organisasi` (`nama_organisasi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`id_request`, `nama_organisasi`, `kd_ruangan`, `keperluan`, `tanggal_permohonan`, `tanggal_pinjam`, `tanggal_selesai`, `waktu_mulai`, `waktu_selesai`, `action`) VALUES
('REQ0010', 'Himpunan Mahasiswa Elektro', 'A1_202', 'Seminar Himpunan', '2019-02-26', '2019-02-26', '2019-02-26', '10:30:00', '11:30:00', 'Approved'),
('REQ0001', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Orientasi Mahasiswa Baru', '2019-02-09', '2019-02-15', '2019-02-17', '09:00:00', '15:00:00', 'Approved'),
('REQ0009', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Meeting Rutin Himpunan', '2019-02-26', '2019-03-06', '2019-03-07', '08:00:00', '08:00:00', 'Approved'),
('REQ0008', 'Himpunan Mahasiswa Teknik Industri', 'A1_201', 'Rapat Himpunan', '2019-02-25', '2019-02-16', '2019-02-16', '09:30:00', '11:00:00', 'Denied'),
('REQ0006', 'Himpunan Mahasiswa Teknik Industri', 'A1_202', 'Kuliah Penggaanti', '2019-02-25', '2019-02-26', '2019-02-26', '08:00:00', '10:00:00', 'Approved'),
('REQ0007', 'Himpunan Mahasiswa Teknik Industri', 'A1_202', 'Seminar Himpunan', '2019-02-25', '2019-02-27', '2019-02-27', '08:00:00', '10:00:00', 'Approved'),
('REQ0011', 'Himpunan Mahasiswa Elektro', 'A1_202', 'Orientasi Mahasiswa Baru', '2019-02-26', '2019-02-26', '2019-02-26', '12:00:00', '13:30:00', 'Approved'),
('REQ0012', 'Himpunan Mahasiswa Elektro', 'A1_202', 'Rapat Himpunan', '2019-02-26', '2019-02-26', '2019-02-26', '13:30:00', '14:30:00', 'Approved'),
('REQ0013', 'Himpunan Mahasiswa Elektro', 'A1_202', 'Seminar Himpunan', '2019-02-26', '2019-02-26', '2019-02-26', '11:00:00', '12:30:00', 'Denied'),
('REQ0014', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Seminar Himpunan', '2019-02-26', '2019-02-26', '2019-02-26', '08:00:00', '09:30:00', 'Approved'),
('REQ0015', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Rapat Himpunan', '2019-02-26', '2019-03-01', '2019-03-01', '08:00:00', '10:00:00', 'Approved'),
('REQ0016', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Kuliah', '2019-02-26', '2019-03-02', '2019-03-02', '08:00:00', '11:30:00', 'Denied'),
('REQ0017', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Rapat Himpunan', '2019-02-27', '2019-03-06', '2019-03-06', '08:00:00', '10:00:00', 'Approved'),
('REQ0018', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Orientasi Mahasiswa Baru', '2019-02-27', '2019-03-01', '2019-03-01', '08:00:00', '08:00:00', 'Denied'),
('REQ0019', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Rapat Himpunan', '2019-02-27', '2019-03-06', '2019-03-06', '09:00:00', '10:00:00', ''),
('REQ0020', 'Himpunan Mahasiswa Elektro', 'A1_203', 'Meeting Rutin Himpunan', '2019-02-28', '2019-03-03', '2019-03-03', '08:00:00', '09:30:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

DROP TABLE IF EXISTS `tb_ruangan`;
CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id`, `kd_ruangan`, `nama_ruangan`, `keterangan`) VALUES
(1, 'A1_201', 'Ruang Kelas A1_201', ''),
(2, 'A1_202', 'Ruang Kelas A2_202', ''),
(3, 'A1_203', 'Ruang Kelas A1_203', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
