-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2019 at 10:01 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tb_observasi`
--

DROP TABLE IF EXISTS `tb_observasi`;
CREATE TABLE IF NOT EXISTS `tb_observasi` (
  `kd_peminjaman` varchar(10) CHARACTER SET latin1 NOT NULL,
  `id_request` varchar(10) CHARACTER SET latin1 NOT NULL,
  `kd_ruangan` varchar(15) CHARACTER SET latin1 NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `waktu_pinjam` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `status_peminjaman` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`kd_peminjaman`),
  KEY `id_request` (`id_request`),
  KEY `kd_ruangan` (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `tb_organisasi`
--

DROP TABLE IF EXISTS `tb_organisasi`;
CREATE TABLE IF NOT EXISTS `tb_organisasi` (
  `nama_organisasi` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_organisasi` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `pic` varchar(20) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`nama_organisasi`),
  KEY `password` (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_organisasi`
--

INSERT INTO `tb_organisasi` (`nama_organisasi`, `username`, `password`, `email_organisasi`, `level`, `pic`, `fakultas`, `status`, `active`, `keterangan`) VALUES
('Aikido Club', 'aac', 'a9ced3dad556814ed46042de696e1849', 'aac@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Asian Medical Student Association FK', 'amsafk', '35d25207a1499e1e1c2d60677953b527', 'amsafk@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FK', 'Clear', 1, '-'),
('Association Internationale des Etudiants en Sciences Economiques', 'aiesec', '95cb798e46b1c6599363012ba14dc49a', 'aiesec@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Atma Jaya Bisnis Law Society FH', 'ablsfh', '159339393b60e2271c86e52160c19898', 'ablsfh@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('Atma Jaya Debating Club', 'adc', '225e8a3fe20e95f6cd9b9e10bfe5eb69', 'adc@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Atma Jaya Moot Court FH', 'mootcourtfh', 'bf214ba82d9ff5a8559c1c9bfb76cd76', 'mootcourtfh@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('Badan Eksekutif Mahasiswa  Fakultas Pendidikan dan Bahasa', 'bemfpb', 'f55393de8cf1928260e16ba6ab672b7f', 'bemfpb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FPB', 'Clear', 1, '-'),
('Badan Perwakilan Mahasiswa FEB', 'bpmfeb', '2071c41b7b4a9060777bba4786992c72', 'bpmfeb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FEB', 'Clear', 1, '-'),
('Badan Perwakilan Mahasiswa FH', 'bpmfh', '64f092fb95efec8f889acb1a347125f3', 'bpmfh@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('Badan Perwakilan Mahasiswa FIABIKOM', 'bpmfiabikom', 'efc0f78c2f5a4dcae728c02b880ec6d9', 'bpmfiabikom@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FIABIKOM', 'Clear', 1, '-'),
('Badan Perwakilan Mahasiswa FK', 'bpmfk', '49943335b149c0229a8b5c759d183785', 'bpmfk@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FK', 'Clear', 1, '-'),
('Badan Perwakilan Mahasiswa FPB', 'bpmfpb', '485e6bf5f1b4e5b6bec1c2170762a7b1', 'bpmfpb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FPB', 'Clear', 1, '-'),
('Badan Perwakilan Mahasiswa FT', 'bpmft', '1c9d13a58780433f4f93a9d5bfb297d5', 'bpmft@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Badan Perwakilan Mahasiswa FTB', 'bpmftb', '980c4e113b870e10225d257627e8ff40', 'bpmftb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FTB', 'Clear', 1, '-'),
('Basball Softball Atma Jaya', 'baseballsoftball', '883c163002b7d914f9bc46c362a3f1af', 'baseballsoftball@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Bela Negara', 'menwa.belneg', 'cbcbc2837fe63469ba32235907c5f474', 'menwa.belneg@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('BKAK', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bkak@atmajaya.ac.id', 'admin', '-', '-', 'Clear', 1, '-'),
('Bola Basket', 'ukmbasketatmajaya', '6321c1925f93444ea27c926fce64dc65', 'ukmbasketatmajaya@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Bola Voli', 'ukmvoliuaj', '47440f8d45e5073f33af09568b0a6ddc', 'ukmvoliuaj@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Dewan Kepengurusan Mahasiswa Fakultas Hukum', 'dkmfh', '545fec6b6b487944eac1d080e9e0a512', 'dkmfh@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('Forum Diskusi Ilmiah Mahasiswa', 'fodim', 'e22934de51dc7f86ea97790c17d339c4', 'fodim@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Fotografi Studio 51', 'studio51', '778073cc38fc6d81902d687f016178b4', 'studio51@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Gerakan Anak Asuh FH', 'gasuh.fh', '719d48a5b8ccece3595567079d67f89d', 'gasuh.fh@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('Global Association Student of Atma Jaya', 'gasa', 'a8e451a562123a04d1036ddd99def4d0', 'gasa@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Himpunan Mahasiswa Bimbingan Konseling', 'hmpsbkfpb', 'fa0cb769a8866035378d2caba0ef8916', 'hmpsbkfpb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FPB', 'Clear', 1, '-'),
('Himpunan Mahasiswa Ekonomi Akuntansi', 'hima.fe', 'c295cbe39d731a2c4ced29d648777c23', 'hima.fe@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FEB', 'Clear', 1, '-'),
('Himpunan Mahasiswa Ekonomi Manajemen', 'himem', '5e066d17aaac668337857350e8159f9b', 'himem@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FEB', 'Clear', 1, '-'),
('Himpunan Mahasiswa Ekonomi Pembangunan', 'himep', '199ac353e0e76d75c69f88144536997a', 'himep@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FEB', 'Clear', 1, '-'),
('Himpunan Mahasiswa Farmasi FKIK', 'himafar', 'e6c6b6cb5b0b46ccf17d63554cc242b0', 'himafar@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FK', 'Clear', 1, '-'),
('Himpunan Mahasiswa Hospitality FIABIKOM', 'humility', 'dd22bd02f97702c352b22ab9499f1697', 'humility@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FIABIKOM', 'Clear', 1, '-'),
('Himpunan Mahasiswa Ilmu Administrasi Bisnis', 'himabi', '861de11fda5c0f4f0c05fe997335ec11', 'himabi@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FIABIKOM', 'Clear', 1, '-'),
('Himpunan Mahasiswa Ilmu Komunikasi', 'himakom', 'c40e0ec5392c8cefca0718fc5312f94b', 'himakom@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FIABIKOM', 'Clear', 1, '-'),
('Himpunan Mahasiswa Pencinta Alam FEB Edelweiss', 'hmpa.edelweissfeb', '3c83391af66f2b74d96e274ad65816e7', 'hmpa.edelweissfeb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FEB', 'Clear', 1, '-'),
('Himpunan Mahasiswa Pendidikan Bahasa Inggris FPB', 'hmpspbi', 'b9ee86069ce9738894a2ec0bf5b07b30', 'hmpspbi@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FPB', 'Clear', 1, '-'),
('Himpunan Mahasiswa Pendidikan Guru SD FPB', 'hmpspgsd', '8e2a39e5ed1e8eccd5ae7e1e76588db7', 'hmpspgsd@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FPB', 'Clear', 1, '-'),
('Himpunan Mahasiswa Psikologi', 'himapsi', '3eee4829f2f2689ba3c0d9287b7652b6', 'himapsi@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FP', 'Clear', 1, '-'),
('Himpunan Mahasiswa Teknik Elektro', 'hmeft', '8fe8c913b731fc7755587140affbf8d6', 'hmeft@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Himpunan Mahasiswa Teknik Industri', 'hmti', 'ea6cb0070cf462c3900eada4836256be', 'hmti@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Himpunan Mahasiswa Teknik Mesin', 'hmmft', '40729bb083b4b51ef6fb2d8bb699c3b7', 'hmmft@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('I Club FTB', 'iclubftb', 'b100154b3c756be8ba208c72d4baca59', 'iclubftb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FTB', 'Clear', 1, '-'),
('Jurnalistik FH', 'viaductpress', 'b427f4ba333d03ca9ca103f176ebcd34', 'viaductpress@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('K3J', 'k3j', '3fc1b655fdeefb762cdfcb8a8f3d4403', 'k3j@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Kabid Kemahasiswaan Fakultas', 'kamhs.univ', '44adb8b5a8f46db49b2f5867bebb254c', 'kamhs.univ@atmajaya.ac.id', 'kabid', '-', '-', 'Clear', 1, '-'),
('Karawitan Jawi', 'karawitanjawi', '21b81664c0e63f9b51ac6fbc6e06651a', 'karawitanjawi@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Kempo', 'kempouaj', '567de3a666519d46ea7e78e757b1f801', 'kempouaj@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Komunitas Mahasiswa Pencinta Alam Fakultas Psikologi Pelangi', 'kmpapelangi', '0ddda78303e4e5a7c5c977f32a680249', 'kmpapelangi@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FP', 'Clear', 1, '-'),
('Komunitas Mahasiswa Psikologi', 'kompsi', 'f09e141c99ab8472500070de90aa4dd9', 'kompsi@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FP', 'Clear', 1, '-'),
('Korps Suka Rela', 'korps.sukarela.pmi', '2eff25c4a0a70f73c7efeb6ec5864034', 'korps.sukarela.pmi@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Latihan Keterampilan Manajemen Mahasiwa', 'lkmm', '7c4323edcc085ef03e7a1504b8df8b64', 'lkmm@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Make People Learn FP', 'maple.fp', '5b59092566fab979ab7365766ab7d853', 'maple.fp@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FP', 'Clear', 1, '-'),
('Medical Search and Rescue FK', 'medisarfk', 'd9a6f8d2bc3b7f6d7893b38e065e0cb5', 'medisarfk@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FK', 'Clear', 1, '-'),
('Microbes FTb', 'microbes', 'b09e9b1b9522627ddd87c851884ca674', 'microbes@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FTB', 'Clear', 1, '-'),
('Oase', 'oase', 'df830ead88ca03e166957bb5c6ea0c9e', 'oase@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Paduan Suara Gita Swara Jaya', 'gitaswarajaya', 'dc5ac80de5d20c3eaf6f80b662d362d9', 'gitaswarajaya@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Pastoran Atma Jaya', 'ukkpastoran', '28e7a8d6fd5d44fa69ee792719613601', 'ukkpastoran@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Pat Djiu Wushu', 'pdwuaj', '6f62ae7bb36d062699cac56ddab93f6d', 'pdwuaj@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Pencinta Alam Fakultas Teknik Cakrawala', 'paft.cakrawala', '0b800b6b320f7ac19b69e1d837817830', 'paft.cakrawala@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Pencinta Alam Fakultas teknobiologi Everest', 'everest', 'de0480c5cfd34a78b10286c77faa8631', 'everest@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FTB', 'Clear', 1, '-'),
('Pencinta Alam FH Mahupala', 'mahupala.fh', 'fd154e5fe3b1d9bf41006aac510284cc', 'mahupala.fh@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('Perhimpunan Pencinta Alam FIABIKOM \"Arga Ganeca\"', 'ppa.argaganeca', '524ac64bac0f57c34850e4675720161f', 'ppa.argaganeca@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FIABIKOM', 'Clear', 1, '-'),
('PPAL Wanachala', 'ppalwanachala', '76f30c9830cc9f90a99c423902ffdf81', 'ppalwanachala@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Renang & Selam', 'swimndiveuaj', 'be3a5c72f8e0e37de3fafc9080f438d5', 'swimndiveuaj@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Science Club FTB', 'scienceclubftb', 'aec69ba67ed8e1f3b1df0f942975938c', 'scienceclubftb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FTB', 'Clear', 1, '-'),
('Senat mahasiswa Fakultas Hukum', 'smfh', '2c09566b7e1ac82b300f0c0a00a6026d', 'smfh@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FH', 'Clear', 1, '-'),
('Senat Mahasiswa Fakultas teknobiologi', 'smftb', '5fdfa66c7f3d38dedd842f18d648589b', 'smftb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FTB', 'Clear', 1, '-'),
('Senat Mahasiswa FEB', 'smfeb', '5fe27132a05e25bb827454fe6e31e52c', 'smfeb@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FEB', 'Clear', 1, '-'),
('Senat Mahasiswa FIABIKOM', 'semafiabikom', '31aabd015449c14e7a0916479514cec4', 'semafiabikom@atmajaya.ac.iD', 'himpunan', 'Fakultas', 'FIABIKOM', 'Clear', 1, '-'),
('Senat Mahasiswa FK', 'smfk', 'e2ea8a0d09d4d7b974210c3eee0b9a11', 'smfk@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FK', 'Clear', 1, '-'),
('Senat Mahasiswa FT', 'smftuaj', '9fad1073bab64865824ae2b6e31e72e8', 'smftuaj@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Seni Tari Mahasiswa FP', 'stamp', '96b8c78de832e9d7afc9731fe6268a47', 'stamp@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FP', 'Clear', 1, '-'),
('Sepak Bola', 'sepakbolauaj', '9e257cffee8afea423783f36ccfb48ec', 'sepakbolauaj@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Tae Kwon Do', 'taekwondo', '7da12974bef3554447c2bb2610ee0c3e', 'taekwondo@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Tarung Drajat', 'tarungdrajat', '6b713a2ab696ab38c9cf9d39f9e78a3a', 'tarungdrajat@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Tenis Lapangan', 'tenislapangan', '6c1179b4d84edeafbd3b89fdd2b0c209', 'tenislapangan@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Tenis Meja', 'ukmtmuaj', 'b5c48c4f6a894b0dd4102038831bdae9', 'ukmtmuaj@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Tim Peduli Aids', 'tpa', 'cd2408b273207043656ab23fd3c6c02a', 'tpa@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Tim Pendamping Anak FP', 'pena.fp', 'd0a3badaa8f2e1f28d572a26ace2a1b4', 'pena.fp@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FP', 'Clear', 1, '-'),
('UKM Bulu Tangkis', 'bulutangkis', '4c0c287d317b5b19eb4363125ff982d0', 'bulutangkis@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Unit Citra Muda Jaya', 'unitcitramudajaya', 'caaefc1a3fa195ef87f5ca2471b1d7ff', 'unitcitramudajaya@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Unit Penelitian Mahasiswa', 'upm', '287aefcf7af1a0d89bc7c914a00804b1', 'upm@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-'),
('Workshop Elektro FT', 'wseft', '007aef03020498c660ede54f3deec6f2', 'wseft@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Workshop Industri FT', 'wsift', '4bfb3149b76a8c7acd3311d77afa47a6', 'wsift@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Workshop Mesin FT', 'workshopmesinft', 'bb588a9de57b465ecb8373aba733c5f7', 'workshopmesinft@atmajaya.ac.id', 'himpunan', 'Fakultas', 'FT', 'Clear', 1, '-'),
('Young Catholic Students', 'ycs', '0b6beb9fc639004e8e43b3f245f27c0b', 'ycs@atmajaya.ac.id', 'himpunan', 'Universitas', 'Universitas', 'Clear', 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

DROP TABLE IF EXISTS `tb_request`;
CREATE TABLE IF NOT EXISTS `tb_request` (
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
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_request`),
  KEY `nama_organisasi` (`nama_organisasi`),
  KEY `kd_ruangan` (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

DROP TABLE IF EXISTS `tb_ruangan`;
CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `kd_ruangan` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nama_ruangan` text CHARACTER SET latin1 NOT NULL,
  `keterangan` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`kd_ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`kd_ruangan`, `nama_ruangan`, `keterangan`) VALUES
('A1-201', 'Ruang Kelas A1-201', ''),
('A1-202', 'Ruang Kelas A1-202', ''),
('A1-204', 'Ruang Kelas A1-204', '');

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
