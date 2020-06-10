-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 05:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE `data_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `jk` enum('P','L') NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`id_admin`, `nama_admin`, `username`, `jk`, `foto`, `no_tlp`, `alamat`) VALUES
(5, 'Ghoniyyatul Nabilah', 'nabilah123', 'P', 'FAVPNG_users-group-computer-icons_kHhDb9NE3.png', '85780268', 'Jl. Asri Pelangi 1 no. 3 Perum. Dephan Pondok Rajeg Asri');

-- --------------------------------------------------------

--
-- Table structure for table `data_komplain`
--

CREATE TABLE `data_komplain` (
  `id_komplain` int(11) NOT NULL,
  `id_pesanan` varchar(3) NOT NULL,
  `tanggal` date NOT NULL,
  `komplain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_komplain`
--

INSERT INTO `data_komplain` (`id_komplain`, `id_pesanan`, `tanggal`, `komplain`) VALUES
(2, '124', '0000-00-00', 'good'),
(3, '116', '2020-05-23', 'baju robek'),
(4, '116', '2020-05-23', 'adad'),
(6, '67', '2020-05-23', 'nice'),
(7, '116', '2020-06-01', 'aaa'),
(8, '116', '2020-06-01', 'qqq');

-- --------------------------------------------------------

--
-- Table structure for table `data_konsumen`
--

CREATE TABLE `data_konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama_konsumen` varchar(30) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `jk` enum('P','L') DEFAULT NULL,
  `no_tlp` varchar(12) DEFAULT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_konsumen`
--

INSERT INTO `data_konsumen` (`id_konsumen`, `nama_konsumen`, `username`, `foto`, `jk`, `no_tlp`, `alamat`) VALUES
(25, 'Widia', NULL, NULL, NULL, NULL, 'Hankam'),
(26, 'Pak Takal', NULL, NULL, NULL, NULL, 'Hankam'),
(30, 'Bunda Noah', NULL, NULL, NULL, NULL, 'Hankam'),
(31, 'Wulan', NULL, NULL, NULL, NULL, 'Hankam'),
(32, 'Pak Sudiman', NULL, NULL, NULL, NULL, 'Hankam'),
(34, 'Bu Ros', NULL, NULL, NULL, NULL, 'Hankam'),
(36, 'Bu Riani', NULL, NULL, NULL, NULL, 'Hankam'),
(41, 'Bu Catur', NULL, NULL, NULL, NULL, 'Hankam'),
(47, 'Pak Haji', NULL, NULL, NULL, NULL, 'Hankam'),
(48, 'Pak Haji Agus', NULL, NULL, NULL, NULL, 'Hankam'),
(49, 'Mama Angga', NULL, NULL, NULL, NULL, 'Hankam'),
(51, 'Pak Imam', NULL, NULL, NULL, NULL, 'Hankam'),
(52, 'Pak Haji', NULL, NULL, NULL, NULL, 'Hankam'),
(55, 'Mama Mily', NULL, NULL, NULL, NULL, 'Hankam'),
(56, 'Pak Yanto', NULL, NULL, NULL, NULL, 'Hankam'),
(58, 'Alika', NULL, NULL, NULL, NULL, 'Hankam'),
(61, 'Bu Azis', NULL, NULL, NULL, NULL, 'Hankam'),
(71, 'Mama Danang', NULL, NULL, NULL, NULL, 'Hankam'),
(72, 'Pak Sudiman', NULL, NULL, NULL, NULL, 'Hankam'),
(73, 'Lia', NULL, NULL, NULL, NULL, 'Hankam'),
(74, 'Pak Udin', NULL, NULL, NULL, NULL, 'Hankam'),
(75, 'Mas Bidu', NULL, NULL, NULL, NULL, 'Hankam'),
(76, 'Bu Agus', NULL, NULL, NULL, NULL, 'Hankam'),
(79, 'Pak Haji Agus', NULL, NULL, NULL, NULL, 'Hankam'),
(82, 'Mama Wulan', NULL, NULL, NULL, NULL, 'Hankam'),
(83, 'Mama Ibra', NULL, NULL, NULL, NULL, 'Hankam'),
(84, 'Bu Veie', NULL, NULL, NULL, NULL, 'Hankam'),
(87, 'Ghoniyyatul Nabilah', 'nabilah__', 'no-image.png', 'P', '0812345678', 'Jl. Asri Pelangi 1 no. 3 Perum. Dephan Pondok Rajeg Asri'),
(88, 'nabill', 'pakuan', 'WhatsApp_Image_2019-11-16_at_12_58_36.jpeg', 'P', '085780268522', 'Cibinong'),
(89, 'nabilah pakuan', 'root', 'no-image.png', 'P', '12345678', 'depok'),
(90, 'Bunda Kiano', NULL, NULL, NULL, NULL, 'Hankam'),
(91, 'Bunda Adel', NULL, NULL, NULL, NULL, 'Hankam'),
(92, 'Bunda Anggrek', NULL, NULL, NULL, NULL, 'Hankam'),
(93, 'Bunda Nani', NULL, NULL, NULL, NULL, 'Hankam'),
(94, 'Bu Wina', NULL, NULL, NULL, NULL, 'Hankam'),
(95, 'Bu Gatot', NULL, NULL, NULL, NULL, 'Hankam'),
(96, 'Pak Agus', NULL, NULL, NULL, NULL, 'Hankam'),
(97, 'Pak Wawan', NULL, NULL, NULL, NULL, 'Hankam'),
(98, 'Pak Sarmih', NULL, NULL, NULL, NULL, 'Hankam'),
(99, 'Vanda', NULL, NULL, NULL, NULL, 'Hankam'),
(100, 'Bu Bono', NULL, NULL, NULL, NULL, 'Hankam'),
(105, 'Pade', NULL, NULL, NULL, NULL, 'Hankam'),
(106, 'Dani', NULL, NULL, NULL, NULL, 'Hankam'),
(107, 'Salsa', NULL, NULL, NULL, NULL, 'Hankam'),
(108, 'Pak Yudi', NULL, NULL, NULL, NULL, 'Hankam'),
(109, 'Bu Dwi', NULL, NULL, NULL, NULL, 'Hankam'),
(110, 'Aufar', NULL, NULL, NULL, NULL, 'Hankam'),
(111, 'Mas Abi', NULL, NULL, NULL, NULL, 'Hankam'),
(112, 'Alip', NULL, NULL, NULL, NULL, 'Hankam'),
(113, 'Faris', NULL, NULL, NULL, NULL, 'Hankam');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `kode_barang` varchar(3) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `hrg_laundry` int(5) NOT NULL,
  `hrg_dryclean` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`kode_barang`, `nama_barang`, `hrg_laundry`, `hrg_dryclean`) VALUES
('01', 'Jas Setelan', 19000, 20000),
('02', 'Jas', 11000, 12000),
('03', 'Safari', 10000, 11000),
('04', 'Safari Setelan', 16000, 17000),
('05', 'Kemeja', 9000, 10000),
('06', 'Celana Jeans', 10000, 11000),
('07', 'Celana Panjang', 9000, 10000),
('08', 'Celana Pendek', 7000, 8000),
('09', 'Jas Wanita', 10000, 11000),
('10', 'Blouse', 9000, 10000),
('11', 'Rok Bawah Biasa', 8000, 9000),
('12', 'Rok Bawah Panjang', 10000, 11000),
('13', 'Rok Plisket Bawah', 11000, 12000),
('14', 'Rok dan Bluse', 16000, 17000),
('15', 'Gaun Biasa', 10000, 11000),
('16', 'Gaun Panjang', 12000, 13000),
('17', 'Gaun Plisket', 14000, 15000),
('18', 'Kebaya Pendek', 9000, 10000),
('19', 'Kebaya Panjang', 10000, 11000),
('20', 'Selendang', 7000, 8000),
('21', 'Kain Panjang', 10000, 11000),
('22', 'Pakaian Pengantin', 14000, 16000),
('23', 'Gaun Pengantin', 40000, 45000),
('24', 'Mantel', 12000, 13000),
('25', 'Piyama', 10000, 11000),
('26', 'Baju Panas', 9000, 10000),
('27', 'Rompi', 7000, 8000),
('28', 'Dasi', 6000, 7000),
('29', 'Baju Kerja 1 Stel', 16000, 17000),
('30', 'Baju Muslim 1 Set', 16000, 17000),
('31', 'Baju Kaos', 9000, 11000),
('32', 'Pakaian Dalam', 7000, 8000),
('33', 'Jacket', 10000, 15000),
('34', 'Jacket Kulit', 15000, 18000),
('35', 'Jubah', 12000, 14000),
('36', 'Mukena/Rukuh', 16000, 17000),
('37', 'Baju Olah Raga', 16000, 17000),
('38', 'Jilbab', 5000, 7000),
('39', 'Sarung Mobil', 25000, 0),
('40', 'Selimut Tebal', 14000, 16000),
('41', 'Selimut Tipis', 12000, 14000),
('42', 'T. Meja Panjang', 10000, 12000),
('43', 'T. Meja Pendek', 8000, 10000),
('44', 'Sprei Panjang', 10000, 12000),
('45', 'Sprei Pendek', 9000, 11000),
('46', 'Sarung Bantal', 3500, 4000),
('47', 'Sarung Bantal Besar', 4000, 6500),
('48', 'Gordyn Tebal/M2', 3500, 4000),
('49', 'Gordyn Tipis/M2', 2500, 3000),
('50', 'Karpet Tebal/M2', 8000, 10000),
('51', 'Karpet Tipis/M2', 6000, 7000),
('52', 'Boneka Kecil', 10000, 12000),
('53', 'Kain Jok Mobil', 20000, 25000),
('54', 'Bed Cover Besar', 18000, 20000),
('55', 'Bed Cover Kecil', 16000, 18000),
('56', 'Sarung Songket', 10000, 12000),
('57', 'Tas Kain', 10000, 12000),
('58', 'Korset', 6000, 8000),
('59', 'Sepatu / Sandal', 10000, 12000),
('60', 'Handuk Besar', 10000, 12000),
('61', 'Handuk Kecil', 8000, 10000),
('62', 'Kaos Kaki', 3000, 4000),
('63', 'Topi', 6000, 8000),
('64', 'Sarung Kusi', 5000, 7000),
('65', 'Bulu Domba', 10000, 12000),
('66', 'Sajadah', 8000, 10000),
('67', 'Tikar', 14000, 16000),
('68', 'Klambu', 15000, 17000),
('69', 'Kereta Baby', 20000, 0),
('70', 'Kasur Besar', 35000, 40000),
('71', 'Kasur Kecil', 30000, 35000),
('72', 'Koper', 20000, 25000),
('73', 'Bed Baby', 15000, 17000),
('74', 'Bantal', 10000, 12000),
('75', 'Boneka Jumbo', 20000, 25000),
('76', 'Kesed', 7000, 8000),
('77', 'Sapu Tangan', 2000, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `no_seri` varchar(5) NOT NULL,
  `nama_konsumen` varchar(30) NOT NULL,
  `no_telepon` varchar(12) DEFAULT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `jml_barang` int(2) NOT NULL,
  `cuci` enum('laundry','dry') NOT NULL,
  `antar` enum('ya','tidak') NOT NULL,
  `status_pesanan` varchar(1) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_selesai` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `no_seri`, `nama_konsumen`, `no_telepon`, `jenis_barang`, `jml_barang`, `cuci`, `antar`, `status_pesanan`, `tgl_masuk`, `tgl_selesai`) VALUES
(63, '0405', 'Widia', '', '07', 1, 'laundry', 'tidak', '7', '2020-02-12', NULL),
(64, '0406', 'Pak Takal', '', '07', 1, 'laundry', 'tidak', '7', '2020-02-12', NULL),
(65, '0407', 'Bunda Noah', '', '03', 1, 'dry', 'tidak', '7', '2020-02-12', NULL),
(66, '0407', 'Bunda Noah', '', '05', 1, 'dry', 'tidak', '7', '2020-02-12', NULL),
(67, '0407', 'Bunda Noah', '', '31', 1, 'dry', 'tidak', '7', '2020-02-12', NULL),
(68, '0407', 'Bunda Noah', '', '33', 1, 'dry', 'tidak', '7', '2020-02-12', NULL),
(69, '0408', 'Wulan', '', '16', 1, 'dry', 'tidak', '7', '2020-02-12', NULL),
(70, '0409', 'Pak Sudiman', '', '29', 1, 'laundry', 'tidak', '7', '2020-02-15', NULL),
(71, '0410', 'Bu Ros', '', '16', 1, 'laundry', 'tidak', '7', '2020-02-12', NULL),
(72, '0410', 'Bu Ros', '', '40', 1, 'laundry', 'tidak', '7', '2020-02-12', NULL),
(73, '0411', 'Bu Riani', '', '44', 1, 'laundry', 'tidak', '7', '2020-02-15', NULL),
(74, '0411', 'Bu Riani', '', '46', 4, 'laundry', 'tidak', '7', '2020-02-15', NULL),
(75, '0412', 'Bu Catur', '', '05', 1, 'laundry', 'tidak', '7', '2020-02-15', NULL),
(76, '0412', 'Bu Catur', '', '12', 1, 'dry', 'tidak', '7', '2020-02-15', NULL),
(77, '0412', 'Bu Catur', '', '19', 1, 'dry', 'tidak', '7', '2020-02-15', NULL),
(78, '0412', 'Bu Catur', '', '45', 2, 'laundry', 'tidak', '7', '2020-02-15', NULL),
(79, '0412', 'Bu Catur', '', '46', 4, 'laundry', 'tidak', '7', '2020-02-15', NULL),
(80, '0413', 'Pak Takal', '', '02', 4, 'dry', 'tidak', '7', '2020-02-15', NULL),
(81, '0414', 'Pak Takal', '', '05', 1, 'laundry', 'tidak', '7', '2020-02-17', NULL),
(82, '0414', 'Pak Takal', '', '07', 1, 'laundry', 'tidak', '7', '2020-02-17', NULL),
(83, '0415', 'Pak Haji', '', '33', 1, 'laundry', 'tidak', '7', '2020-02-17', NULL),
(84, '0415', 'Pak Haji', '', '44', 1, 'laundry', 'tidak', '7', '2020-02-17', NULL),
(85, '0415', 'Pak Haji', '', '46', 1, 'laundry', 'tidak', '7', '2020-02-17', NULL),
(86, '0419', 'Pak Haji Agus', '', '07', 1, 'dry', 'tidak', '7', '2020-02-21', NULL),
(87, '0420', 'Mama Angga', '', '34', 1, 'dry', 'ya', '7', '2020-02-21', NULL),
(88, '0420', 'Mama Angga', '', '66', 1, 'dry', 'ya', '7', '2020-02-21', NULL),
(89, '0421', 'Pak Imam', '', '02', 1, 'dry', 'tidak', '7', '2020-02-22', NULL),
(90, '0423', 'Pak Haji', '', '05', 1, 'laundry', 'ya', '7', '2020-02-26', NULL),
(91, '0424', 'Pak Takal', '', '05', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(92, '0424', 'Pak Takal', '', '07', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(93, '0426', 'Mama Mily', '', '52', 2, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(94, '0427', 'Pak Yanto', '', '05', 2, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(95, '0428', 'Alika', '', '34', 1, 'dry', 'tidak', '7', '2020-02-26', NULL),
(96, '0428', 'Alika', '', '54', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(97, '0429', 'Bu Azis', '', '45', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(98, '0429', 'Bu Azis', '', '46', 6, 'laundry', 'tidak', '7', '2020-02-26', '2020-05-11'),
(99, '0429', 'Bu Azis', '', '55', 1, 'laundry', 'tidak', '7', '2020-02-26', '2020-05-11'),
(100, '0430', 'Mama Angga', '', '54', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(101, '0432', 'Pak Takal', '', '29', 3, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(102, '0433', 'Pak Takal', '', '07', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(103, '0434', 'Bu Catur', '', '05', 2, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(104, '0434', 'Bu Catur', '', '06', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(105, '0434', 'Bu Catur', '', '40', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(106, '0434', 'Bu Catur', '', '41', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(107, '0434', 'Bu Catur', '', '45', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(108, '0434', 'Bu Catur', '', '46', 5, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(109, '0435', 'Mama Danang', '', '29', 1, 'laundry', 'tidak', '7', '2020-02-26', NULL),
(110, '0437', 'Pak Sudiman', '', '29', 1, 'laundry', 'ya', '7', '2020-02-28', '2020-05-11'),
(111, '0438', 'Lia', '', '33', 1, 'laundry', 'tidak', '7', '2020-02-28', '2011-05-20'),
(112, '0440', 'Pak Udin', '', '29', 1, 'laundry', 'ya', '7', '2020-02-28', '2020-05-11'),
(113, '0441', 'Mas Bidu', '', '69', 1, 'laundry', 'tidak', '7', '2020-02-28', NULL),
(114, '0442', 'Bu Agus', '', '48', 3, 'laundry', 'ya', '7', '2020-02-22', '2020-05-11'),
(115, '0443', 'Alika', '', '50', 4, 'laundry', 'ya', '7', '2020-02-28', '2020-05-11'),
(116, '0444', 'Bunda Noah', '', '33', 2, 'dry', 'tidak', '7', '2020-03-04', NULL),
(117, '0445', 'Pak Haji Agus', '', '05', 1, 'dry', 'tidak', '7', '2020-03-04', NULL),
(118, '0445', 'Pak Haji Agus', '', '06', 1, 'dry', 'tidak', '7', '2020-03-04', NULL),
(119, '0446', 'Pak Takal', '', '29', 1, 'dry', 'tidak', '7', '2020-03-04', NULL),
(120, '0447', 'Mama Wulan', '', '29', 1, 'laundry', 'tidak', '7', '2020-03-04', NULL),
(121, '0448', 'Mama Ibra', '', '54', 2, 'laundry', 'ya', '7', '2020-03-04', NULL),
(122, '0425', 'Bu Veie', '', '16', 1, 'dry', 'ya', '7', '2020-02-26', '2020-05-11'),
(129, '7751', 'Pak Udin', '', '29', 1, 'laundry', 'tidak', '7', '2020-03-24', NULL),
(130, '7754', 'Bunda Kiano', '', '54', 1, 'laundry', 'tidak', '7', '2020-03-24', NULL),
(131, '7755', 'Bunda Adel', '', '29', 1, 'laundry', 'tidak', '7', '2020-03-24', NULL),
(132, '7756', 'Bunda Anggrek', '', '29', 1, 'laundry', 'ya', '7', '2020-03-24', NULL),
(133, '7757', 'Bu Azis', '', '45', 2, 'laundry', 'tidak', '7', '2020-03-24', NULL),
(134, '7757', 'Bu Azis', '', '46', 10, 'laundry', 'tidak', '7', '2020-03-24', NULL),
(135, '7758', 'Pak RT', '', '48', 2, 'laundry', 'ya', '7', '2020-03-24', NULL),
(136, '7759', 'Alika', '', '54', 1, 'laundry', 'tidak', '7', '2020-04-24', NULL),
(137, '7760', 'Mama Angga', '', '54', 2, 'laundry', 'ya', '7', '2020-03-24', NULL),
(138, '7761', 'Lia', '', '60', 1, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(139, '7762', 'Bu Nani', '', '48', 1, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(140, '7762', 'Bu Nani', '', '49', 1, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(141, '7763', 'Bu Wina', '', '41', 2, 'laundry', 'tidak', '7', '2020-03-18', NULL),
(142, '7764', 'Bu Gatot', '', '54', 1, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(143, '7765', 'Pak Takal', '', '29', 1, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(144, '7766', 'Bu Catur', '', '48', 6, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(145, '7766', 'Bu Catur', '', '49', 4, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(146, '7765', 'Pak Takal', '', '05', 1, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(147, '7765', 'Pak Takal', '', '07', 2, 'laundry', 'tidak', '7', '2020-03-28', NULL),
(148, '7767', 'Bunda Kiano', '', '54', 1, 'laundry', 'tidak', '7', '2020-04-01', NULL),
(149, '7769', 'Pak Takal', '', '02', 1, 'laundry', 'tidak', '7', '2020-04-01', NULL),
(150, '7770', 'Pak Agus', '', '54', 1, 'laundry', 'ya', '7', '2020-04-04', NULL),
(151, '7771', 'Mama Ibra', '', '51', 1, 'laundry', 'ya', '7', '2020-04-04', NULL),
(152, '7771', 'Mama Ibra', '', '54', 1, 'laundry', 'ya', '7', '2020-04-04', NULL),
(153, '7772', 'Pak Wawan', '', '54', 3, 'laundry', 'tidak', '7', '2020-04-04', NULL),
(154, '7773', 'Mama Ibra', '', '54', 1, 'laundry', 'tidak', '7', '2020-04-04', NULL),
(155, '7774', 'Pak Takal', '', '05', 1, 'laundry', 'tidak', '7', '2020-04-04', NULL),
(156, '7774', 'Pak Takal', '', '07', 1, 'laundry', 'tidak', '7', '2020-04-04', NULL),
(157, '7776', 'Lia', '', '52', 1, 'laundry', 'tidak', '7', '2020-04-08', NULL),
(158, '7776', 'Lia', '', '57', 1, 'laundry', 'tidak', '7', '2020-04-08', NULL),
(159, '7777', 'Bunda Kiano', '', '54', 1, 'laundry', 'tidak', '7', '2020-04-08', NULL),
(160, '7778', 'Bu Ros', '', '40', 1, 'laundry', 'tidak', '7', '2020-04-08', NULL),
(161, '7779', 'Bu Catur', '', '45', 1, 'laundry', 'tidak', '7', '2020-04-08', NULL),
(162, '7779', 'Bu Catur', '', '46', 3, 'laundry', 'tidak', '7', '2020-04-08', NULL),
(163, '7780', 'Pa Sarmih', '', '54', 1, 'laundry', 'tidak', '7', '2020-04-08', NULL),
(164, '7781', 'Vanda', '', '57', 3, 'laundry', 'ya', '7', '2020-04-08', NULL),
(165, '7782', 'Bu Bono', '', '49', 1, 'laundry', 'tidak', '7', '2020-04-09', NULL),
(166, '7782', 'Bu Bono', '', '52', 2, 'laundry', 'tidak', '7', '2020-04-09', NULL),
(167, '7783', 'Pak Takal', '', '05', 2, 'laundry', 'tidak', '7', '2020-04-09', NULL),
(168, '7783', 'Pak Takal', '', '07', 2, 'laundry', 'tidak', '7', '2020-04-09', NULL),
(169, '7784', 'Mama Ibra', '', '54', 2, 'laundry', 'ya', '7', '2020-04-29', NULL),
(170, '7785', 'Pak Haji', '', '66', 1, 'laundry', 'tidak', '7', '2020-04-29', NULL),
(171, '7786', 'Bu Bono', '', '50', 3, 'laundry', 'tidak', '7', '2020-04-29', NULL),
(172, '7788', 'Pak Sudiman', '', '29', 1, 'laundry', 'tidak', '7', '2020-05-02', NULL),
(173, '7789', 'Pade', '', '66', 1, 'laundry', 'tidak', '7', '2020-05-02', NULL),
(174, '7790', 'Bu Catur', '', '54', 1, 'laundry', 'tidak', '7', '2020-05-05', NULL),
(175, '7791', 'Salsa', '', '48', 2, 'laundry', 'tidak', '7', '2020-05-05', NULL),
(176, '7792', 'Dani', '', '50', 1, 'laundry', 'tidak', '7', '2020-05-05', NULL),
(177, '7793', 'Pak Yudi', '', '55', 1, 'laundry', 'tidak', '7', '2020-05-05', NULL),
(178, '7794', 'Mama Danang', '', '29', 1, 'laundry', 'tidak', '7', '2020-05-05', NULL),
(179, '7795', 'Bu Azis', '', '54', 2, 'laundry', 'tidak', '7', '2020-05-05', NULL),
(180, '5575', 'Bunda Noah', '', '05', 1, 'dry', 'tidak', '7', '2020-01-04', NULL),
(181, '5575', 'Bunda Noah', '', '15', 1, 'dry', 'tidak', '7', '2020-01-04', NULL),
(182, '5575', 'Bunda Noah', '', '19', 1, 'dry', 'tidak', '7', '2020-01-04', NULL),
(183, '5576', 'Bu Wina', '', '69', 1, 'laundry', 'tidak', '7', '2020-01-04', NULL),
(184, '5578', 'Bu Dwi', '', '29', 1, 'laundry', 'tidak', '7', '2020-01-04', NULL),
(185, '5579', 'Pak Haji', '', '33', 1, 'laundry', 'tidak', '7', '2020-01-04', NULL),
(186, '5579', 'Pak Haji', '', '66', 1, 'laundry', 'tidak', '7', '2020-01-04', NULL),
(187, '5581', 'Aufar', '', '41', 2, 'laundry', 'tidak', '7', '2020-01-08', NULL),
(188, '5581', 'Aufar', '', '67', 1, 'laundry', 'tidak', '7', '2020-01-08', NULL),
(189, '5582', 'Pak Takal', '', '07', 1, 'laundry', 'tidak', '7', '2020-01-08', NULL),
(190, '5583', 'Bu Bono', '', '34', 1, 'dry', 'tidak', '7', '2020-01-08', NULL),
(191, '5584', 'Pak Sudiman', '', '29', 1, 'laundry', 'tidak', '7', '2020-01-09', NULL),
(192, '5585', 'Bunda Kiano', '', '50', 1, 'laundry', 'tidak', '7', '2020-01-09', NULL),
(193, '5585', 'Bunda Kiano', '', '54', 1, 'laundry', 'tidak', '7', '2020-01-09', NULL),
(194, '5587', 'Mas Abi', '', '54', 1, 'laundry', 'tidak', '7', '2020-01-09', NULL),
(195, '5588', 'Bu Catur', '', '54', 1, 'laundry', 'tidak', '7', '2020-01-09', NULL),
(196, '5589', 'Pak Haji', '', '05', 1, 'dry', 'tidak', '7', '2020-01-09', NULL),
(197, '5590', 'Alip', '', '54', 1, 'laundry', 'ya', '7', '2020-01-09', NULL),
(198, '5592', 'Bunda Adel', '', '29', 1, 'laundry', 'tidak', '7', '2020-01-15', NULL),
(199, '5593', 'Faris', '', '02', 1, 'dry', 'tidak', '7', '2020-01-15', NULL),
(200, '5594', 'Bu Catur', '', '44', 1, 'laundry', 'tidak', '7', '2020-01-15', NULL),
(201, '5594', 'Bu Catur', '', '46', 3, 'laundry', 'tidak', '7', '2020-01-15', NULL),
(202, '5594', 'Bu Catur', '', '55', 1, 'laundry', 'tidak', '7', '2020-01-15', NULL),
(203, '5595', 'Pak Takal', '', '05', 1, 'laundry', 'tidak', '7', '2020-01-15', NULL),
(204, '5595', 'Pak Takal', '', '07', 2, 'laundry', 'tidak', '7', '2020-01-15', NULL),
(205, '5597', 'Bu Azis', '', '05', 2, 'laundry', 'tidak', '7', '2020-01-17', NULL),
(206, '5597', 'Bu Azis', '', '19', 1, 'dry', 'tidak', '7', '2020-01-17', NULL),
(207, '5598', 'Pak Sudiman', '', '29', 1, 'laundry', 'tidak', '1', '2020-01-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` varchar(1) NOT NULL,
  `nama_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('1', 'antrian'),
('2', 'dicuci'),
('3', 'dikeringkan'),
('4', 'disetrika'),
('5', 'bisa diambil'),
('6', 'antar'),
('7', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(1) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `create_on` date NOT NULL,
  `hak_akses` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `no_tlp`, `create_on`, `hak_akses`) VALUES
(5, 'Ghoniyyatul Nabilah', 'nabilah123', '$2y$10$2UdniAjXxGT1tzgxlpWkyeg7Iph905cdrn.Ms3mnlp6hseIKvGda.', '85780268', '2020-05-07', '1'),
(12, 'nabill', 'pakuan', '$2y$10$pNWHtGyQHhbCYHsbXBhjX.jnUR19vVkUsZL0/a/nrnMi9huyQjGHy', '085780268522', '2020-05-29', '2'),
(20, 'nabilah pakuan', 'root', '$2y$10$g13zcSKw7inUs76bUULtK.hUKJN8zUCKbJjwR4VzCDnlZE7Ar6u92', '12345678', '2020-05-29', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `data_komplain`
--
ALTER TABLE `data_komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indexes for table `data_konsumen`
--
ALTER TABLE `data_konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_admin`
--
ALTER TABLE `data_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_komplain`
--
ALTER TABLE `data_komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_konsumen`
--
ALTER TABLE `data_konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
