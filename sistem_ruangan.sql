-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2019 at 02:18 AM
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
-- Table structure for table `tb_login`
--

DROP TABLE IF EXISTS `tb_login`;
CREATE TABLE IF NOT EXISTS `tb_login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`username`),
  KEY `password` (`password`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

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
('OBS0001', 'REQ0001', 'A1_201', '2019-02-15', '2019-02-17', '09:00:00', '15:00:00', 'Available'),
('OBS0003', 'REQ0004', 'A1_201', '2019-02-15', '2019-02-16', '08:00:00', '08:30:00', 'Available'),
('OBS0002', 'REQ0003', 'A1_202', '2019-02-15', '2019-02-16', '11:00:00', '14:00:00', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tb_organisasi`
--

DROP TABLE IF EXISTS `tb_organisasi`;
CREATE TABLE IF NOT EXISTS `tb_organisasi` (
  `nama_organisasi` varchar(50) NOT NULL,
  `email_organisasi` varchar(50) NOT NULL,
  PRIMARY KEY (`nama_organisasi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_organisasi`
--

INSERT INTO `tb_organisasi` (`nama_organisasi`, `email_organisasi`) VALUES
('Himpunan Mahasiswa Elektro', 'hme.ft@atmajaya.ac.id'),
('Himpunan Mahasiswa Teknik Industri', 'hmti.ft@atmajaya.ac.id');

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
  PRIMARY KEY (`id_request`),
  KEY `nama_organisasi` (`nama_organisasi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`id_request`, `nama_organisasi`, `kd_ruangan`, `keperluan`, `tanggal_permohonan`, `tanggal_pinjam`, `tanggal_selesai`, `waktu_mulai`, `waktu_selesai`) VALUES
('REQ0002', 'Himpunan Mahasiswa Teknik Industri', 'A1_201', 'Orientasi Mahasiswa Baru', '2019-02-11', '2019-02-16', '2019-02-17', '08:00:00', '14:30:00'),
('REQ0001', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Orientasi Mahasiswa Baru', '2019-02-09', '2019-02-15', '2019-02-17', '09:00:00', '15:00:00'),
('REQ0003', 'Himpunan Mahasiswa Elektro', 'A1_202', 'Orientasi Mahasiswa Baru', '2019-02-12', '2019-02-15', '2019-02-16', '11:00:00', '14:00:00'),
('REQ0004', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Orientasi Mahasiswa Baru', '2019-02-12', '2019-02-15', '2019-02-16', '08:00:00', '08:30:00'),
('REQ0005', 'Himpunan Mahasiswa Elektro', 'A1_201', 'Orientasi Mahasiswa Baru', '2019-02-12', '2019-02-15', '2019-02-15', '08:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

DROP TABLE IF EXISTS `tb_ruangan`;
CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `kd_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kd_ruangan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`kd_ruangan`, `nama_ruangan`, `keterangan`) VALUES
('A1_201', 'Ruang Kelas A1_201', ''),
('A1_202', 'Ruang Kelas A2_202', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
