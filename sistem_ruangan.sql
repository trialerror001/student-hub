-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2019 at 08:47 AM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

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
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tb_observasi`
--

DROP TABLE IF EXISTS `tb_observasi`;
CREATE TABLE IF NOT EXISTS `tb_observasi` (
  `kd_peminjaman` varchar(10) CHARACTER SET utf8 NOT NULL,
  `id_request` varchar(10) CHARACTER SET utf8 NOT NULL,
  `kd_ruangan` varchar(15) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `waktu_pinjam` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status_peminjaman` text NOT NULL,
  PRIMARY KEY (`kd_peminjaman`),
  KEY `id_request` (`id_request`),
  KEY `kd_ruangan` (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_observasi`
--

INSERT INTO `tb_observasi` (`kd_peminjaman`, `id_request`, `kd_ruangan`, `tanggal_pinjam`, `waktu_pinjam`, `waktu_selesai`, `status_peminjaman`) VALUES
('OBS0001', 'REQ0001', 'A1-201', '2019-07-08', '08:00:00', '08:30:00', 'Approved'),
('OBS0002', 'REQ0002', 'A1-201', '2019-07-11', '09:00:00', '09:30:00', 'Approved'),
('OBS0003', 'REQ0006', 'A1-201', '2019-07-08', '09:00:00', '10:30:00', 'Approved'),
('OBS0004', 'REQ0007', 'A1-201', '2019-07-09', '08:00:00', '09:00:00', 'Approved'),
('OBS0005', 'REQ0004', 'A1-201', '2019-07-10', '08:00:00', '08:30:00', 'Approved'),
('OBS0006', 'REQ0008', 'A1-201', '2019-07-08', '10:30:00', '12:30:00', 'Approved'),
('OBS0007', 'REQ0009', 'A1-202', '2019-07-02', '09:00:00', '10:00:00', 'Approved'),
('OBS0008', 'REQ0011', 'A1-204', '2019-07-08', '12:00:00', '01:00:00', 'Approved'),
('OBS0009', 'REQ0012', 'A1-201', '2019-07-02', '09:30:00', '11:00:00', 'Approved');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_organisasi`
--

INSERT INTO `tb_organisasi` (`username`, `password`, `nama_organisasi`, `email_organisasi`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin'),
('hme.ft', '43dc7e72972e46401a9c2d1db0659fc7', 'Himpunan Mahasiswa Elektro', 'hme.ft@atmajaya.ac.id', 'himpunan'),
('hmm.ft', '40729bb083b4b51ef6fb2d8bb699c3b7', 'Himpunan Mahasiswa Teknik Mesin', 'hmm.ft@atmajaya.ac.id', 'himpunan'),
('kamhs.univ', '44adb8b5a8f46db49b2f5867bebb254c', 'Kabid Kemahasiswaan Univ', 'kamhs.univ@atmajaya.ac.id', 'kabid');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

DROP TABLE IF EXISTS `tb_request`;
CREATE TABLE IF NOT EXISTS `tb_request` (
  `id_request` varchar(10) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `kd_ruangan` varchar(15) CHARACTER SET utf32 NOT NULL,
  `keperluan` text NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `durasiWaktu` varchar(15) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `action` varchar(20) NOT NULL,
  PRIMARY KEY (`id_request`),
  KEY `nama_organisasi` (`nama_organisasi`),
  KEY `kd_ruangan` (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`id_request`, `nama_organisasi`, `kd_ruangan`, `keperluan`, `tanggal_permohonan`, `tanggal_pinjam`, `durasiWaktu`, `waktu_mulai`, `waktu_selesai`, `action`) VALUES
('REQ0001', 'Himpunan Mahasiswa Elektro', 'A1-201', 'Rapat Angkatan 2017', '2019-07-01', '2019-07-08', '30 minutes', '08:00:00', '08:30:00', 'Approved'),
('REQ0002', 'Himpunan Mahasiswa Elektro', 'A1-201', 'Orientasi Mahasiswa Baru', '2019-07-01', '2019-07-11', '30 minutes', '09:00:00', '09:30:00', 'Approved'),
('REQ0004', 'Himpunan Mahasiswa Elektro', 'A1-201', 'Rapat Mendadak Part 2', '2019-07-02', '2019-07-10', '30 minutes', '08:00:00', '08:30:00', 'Approved'),
('REQ0005', 'Himpunan Mahasiswa Elektro', 'A1-201', 'Rapat Mendadak Part 3', '2019-07-02', '2019-07-08', '120 minutes', '12:00:00', '02:00:00', 'Declined'),
('REQ0006', 'Himpunan Mahasiswa Elektro', 'A1-201', 'Rapat Himpunan Mesin', '2019-07-02', '2019-07-08', '90 minutes', '09:00:00', '10:30:00', 'Approved'),
('REQ0007', 'Himpunan Mahasiswa Teknik Mesin', 'A1-201', 'Rapat Himpunan Mesin Angkatan 2017', '2019-07-02', '2019-07-09', '60 minutes', '08:00:00', '09:00:00', 'Approved'),
('REQ0008', 'Himpunan Mahasiswa Elektro', 'A1-201', 'Rapat Himpunan Mesin Angkatan 2018', '2019-07-02', '2019-07-08', '120 minutes', '10:30:00', '12:30:00', 'Approved'),
('REQ0009', 'Himpunan Mahasiswa Teknik Mesin', 'A1-202', 'Rapat Himpunan Mesin', '2019-07-02', '2019-07-02', '60 minutes', '09:00:00', '10:00:00', 'Approved'),
('REQ0010', 'Himpunan Mahasiswa Elektro', 'A1-201', 'Rapat Mendadak Part 2', '2019-07-02', '2019-07-08', '30 minutes', '08:00:00', '08:30:00', 'Approved'),
('REQ0011', 'Himpunan Mahasiswa Teknik Mesin', 'A1-204', 'Orientasi MaBa', '2019-07-02', '2019-07-08', '60 minutes', '12:00:00', '01:00:00', 'Approved'),
('REQ0012', 'Himpunan Mahasiswa Teknik Mesin', 'A1-201', 'Rapat Mendadak', '2019-07-02', '2019-07-02', '90 minutes', '09:30:00', '11:00:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

DROP TABLE IF EXISTS `tb_ruangan`;
CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `kd_ruangan` varchar(15) NOT NULL,
  `nama_ruangan` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`kd_ruangan`, `nama_ruangan`, `keterangan`) VALUES
('A1-201', 'Ruang Kelas A1-201', 'Diganti menjadi ruang UKM Mahasiswa'),
('A1-202', 'Ruang Kelas A2_202', ''),
('A1-204', 'Ruang Kelas A1 2014', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_observasi`
--
ALTER TABLE `tb_observasi`
  ADD CONSTRAINT `FK-KodeRuangan` FOREIGN KEY (`kd_ruangan`) REFERENCES `tb_ruangan` (`kd_ruangan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD CONSTRAINT `FK_KodeRuangan` FOREIGN KEY (`kd_ruangan`) REFERENCES `tb_ruangan` (`kd_ruangan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
