-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2019 at 08:43 PM
-- Server version: 5.7.26-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studenth_sistemruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_peminjaman` varchar(12) NOT NULL,
  `nama_barang` text NOT NULL,
  `kd_barang` varchar(10) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tb_observasi`
--

CREATE TABLE `tb_observasi` (
  `kd_peminjaman` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_request` varchar(10) CHARACTER SET latin1 NOT NULL,
  `kd_ruangan` varchar(15) CHARACTER SET latin1 NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `waktu_pinjam` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status_peminjaman` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_observasi`
--

INSERT INTO `tb_observasi` (`kd_peminjaman`, `id_request`, `kd_ruangan`, `tanggal_pinjam`, `waktu_pinjam`, `waktu_selesai`, `status_peminjaman`) VALUES
('OBS0001', 'REQ0002', 'A1-201', '2019-07-16', '10:00:00', '12:00:00', 'Approved'),
('OBS0002', 'REQ0004', 'A1-202', '2019-07-16', '08:30:00', '10:00:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_organisasi`
--

CREATE TABLE `tb_organisasi` (
  `nama_organisasi` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_organisasi` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `divisi` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_organisasi`
--

INSERT INTO `tb_organisasi` (`nama_organisasi`, `username`, `password`, `email_organisasi`, `level`, `divisi`, `status`, `active`) VALUES
('BKAK', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bkak@atmajaya.ac.id', 'admin', '', 'Clear', 0),
('Cakrawala', 'cakrawala.univ', 'ea7faaa4dda0b9ba331036ae1caea3eb', 'cakrawala@atmajaya.ac.id', 'himpunan', 'Universitas', 'Clear', 0),
('Himpunan Mahasiswa Elektro', 'hme.ft', '43dc7e72972e46401a9c2d1db0659fc7', 'hme.ft@atmajaya.ac.id', 'himpunan', 'Fakultas', 'Block', 0),
('Himpunan Mahasiswa Mesin', 'hmm.ft', 'ec05c5e1b35c20b40010938e841200ef', 'hmm.ft@atmajaya.ac.id', 'himpunan', 'Fakultas', 'Clear', 0),
('Kabid Kemahasiswaan Fakultas', 'kamhs.univ', '44adb8b5a8f46db49b2f5867bebb254c', 'kamhs.univ@atmajaya.ac.id', 'kabid', '', '', 0),
('Panitia PMB', 'Ferdy', '827ccb0eea8a706c4c34a16891f84e7b', 'ferdian.aditya2302@gmail.com', 'himpunan', 'Warek 3', 'Clear', 1),
('Panitia SALT', 'salt', '536ee5a6a0ded3bac665adeca6bbf1b0', 'salt@atmajaya.ac.id', 'himpunan', 'Warek 3', 'Clear', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

CREATE TABLE `tb_request` (
  `id_request` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama_organisasi` varchar(50) CHARACTER SET latin1 NOT NULL,
  `kd_ruangan` varchar(15) CHARACTER SET latin1 NOT NULL,
  `keperluan` text CHARACTER SET latin1 NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `durasiWaktu` varchar(15) CHARACTER SET latin1 NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `insertedBy` varchar(50) NOT NULL,
  `action` varchar(20) CHARACTER SET latin1 NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`id_request`, `nama_organisasi`, `kd_ruangan`, `keperluan`, `tanggal_permohonan`, `tanggal_pinjam`, `durasiWaktu`, `waktu_mulai`, `waktu_selesai`, `insertedBy`, `action`, `keterangan`) VALUES
('REQ0001', 'Himpunan Mahasiswa Mesin', 'A1-202', 'Orientasi Mahasiswa Baru', '2019-07-07', '2019-07-11', '90 minutes', '09:00:00', '10:30:00', 'Himpunan Mahasiswa Mesin', 'Pending', ''),
('REQ0002', 'Cakrawala', 'A1-201', 'Rapat Himpunan', '2019-07-07', '2019-07-16', '120 minutes', '10:00:00', '12:00:00', 'BKAK', 'Approved', ''),
('REQ0003', 'Cakrawala', 'A1-204', 'Rapat Cakrawala', '2019-07-07', '2019-07-12', '60 minutes', '09:30:00', '10:30:00', 'Cakrawala', 'Pending', '-'),
('REQ0004', 'Himpunan Mahasiswa Elektro', 'A1-202', 'Orientasi Mahasiswa Baru', '2019-07-07', '2019-07-16', '90 minutes', '08:30:00', '10:00:00', 'BKAK', 'Approved', 'Himpunan lupa untuk melakukan request, sedangkan rapat yang akan diadakan sangat urgent');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `kd_ruangan` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama_ruangan` text CHARACTER SET latin1 NOT NULL,
  `keterangan` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`kd_ruangan`, `nama_ruangan`, `keterangan`) VALUES
('A1-201', 'Ruang Kelas A1-201', ''),
('A1-202', 'Ruang Kelas A1-202', ''),
('A1-204', 'Ruang Kelas A1-204', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `kd_peminjaman` (`kd_peminjaman`);

--
-- Indexes for table `tb_observasi`
--
ALTER TABLE `tb_observasi`
  ADD PRIMARY KEY (`kd_peminjaman`),
  ADD KEY `id_request` (`id_request`),
  ADD KEY `kd_ruangan` (`kd_ruangan`);

--
-- Indexes for table `tb_organisasi`
--
ALTER TABLE `tb_organisasi`
  ADD PRIMARY KEY (`nama_organisasi`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `nama_organisasi` (`nama_organisasi`),
  ADD KEY `kd_ruangan` (`kd_ruangan`);

--
-- Indexes for table `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`kd_ruangan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_observasi`
--
ALTER TABLE `tb_observasi`
  ADD CONSTRAINT `FK_IdRequest` FOREIGN KEY (`id_request`) REFERENCES `tb_request` (`id_request`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_KodeRuangan(2)` FOREIGN KEY (`kd_ruangan`) REFERENCES `tb_ruangan` (`kd_ruangan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD CONSTRAINT `FK_KodeRuangan` FOREIGN KEY (`kd_ruangan`) REFERENCES `tb_ruangan` (`kd_ruangan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_NamaOrganisasi` FOREIGN KEY (`nama_organisasi`) REFERENCES `tb_organisasi` (`nama_organisasi`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
