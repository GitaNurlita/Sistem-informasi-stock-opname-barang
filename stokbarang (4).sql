-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2022 at 02:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stokbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(25) NOT NULL,
  `qty` int(25) NOT NULL,
  `penerima` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `keterangan`, `qty`, `penerima`) VALUES
(2, 16, '2022-07-03 01:14:32', 'Bimoli', 5, 'Pembeli'),
(3, 17, '2022-07-03 05:04:00', 'Daia Bunga', 15, 'Pembeli'),
(4, 18, '2022-07-03 05:47:28', 'Indomie', 5, 'Pembeli'),
(5, 18, '2022-07-04 12:01:46', 'sedap', 9, 'Pembeli'),
(6, 24, '2022-07-05 01:32:30', 'ABCD', 4, 'Pembeli'),
(7, 24, '2022-07-05 01:58:15', 'ABCD', 1, 'Bagian Gudang  Tata'),
(8, 24, '2022-07-05 01:58:32', 'ABCD', 3, 'Bagian Gudang Budi'),
(10, 26, '2022-07-05 14:07:56', 'sedap', 5, 'Bagian Gudang Budi'),
(11, 28, '2022-07-05 14:08:53', 'sedap', 5, 'Pembeli'),
(12, 28, '2022-07-05 14:09:50', 'sedap', 94, 'Pembeli'),
(13, 33, '2022-07-15 05:29:59', 'box', 5, 'Pembeli'),
(14, 33, '2022-07-15 06:01:11', 'box', 2, 'Bagian Gudang Budi'),
(15, 35, '2022-07-15 13:05:40', 'box', 100, 'Pembeli'),
(16, 35, '2022-07-15 13:06:14', 'box', 50, 'Pembeli'),
(17, 37, '2022-07-17 08:40:30', 'tabung', 5, 'Pembeli'),
(18, 46, '2022-07-21 04:21:05', 'Galon', 19, 'Pembeli'),
(21, 49, '2022-07-23 14:03:49', 'Jerigen', 1, 'Pembeli'),
(22, 49, '2022-07-24 06:52:54', 'Jerigen', 603, 'Pembeli'),
(23, 53, '2022-07-24 08:02:08', 'karung', 40, 'Pembeli'),
(24, 53, '2022-08-11 07:07:45', 'karung', 5, 'Pembeli'),
(26, 59, '2022-08-11 07:10:14', 'Tabung', 1, 'Bagian Gudang Budi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`, `level`) VALUES
(1, 'admin@gmail.com', '12345678', 'Admin'),
(3, 'KGbudiA@gmail.com', '987654321', 'Kepala Gudang'),
(23, 'tes@gmail.tes', 'testes', ''),
(24, 'tes@gmail.tes', 'testes', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `penerima` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`, `penerima`) VALUES
(12, 16, '2022-07-03 01:14:02', 'Bimoli', 10, 'Bagian Gudang Budi'),
(13, 17, '2022-07-03 05:03:44', 'Daia Bunga', 20, 'Bagian Gudang  Tata'),
(14, 18, '2022-07-04 11:54:01', 'ABCD', 1, 'Pembeli'),
(15, 21, '2022-07-04 12:56:44', 'kapal Api', 6, 'Bagian Gudang Budi'),
(16, 22, '2022-07-04 13:00:15', 'Daia', 1, 'Bagian Gudang Budi'),
(17, 23, '2022-07-04 13:23:52', 'Ultramilk', 3, 'Bagian Gudang Budi'),
(18, 24, '2022-07-05 01:27:55', 'ABCD', 5, 'Bagian Gudang Budi'),
(19, 26, '2022-07-05 02:16:19', 'sedap', 5, 'Bagian Gudang Budi'),
(20, 27, '2022-07-05 10:35:26', 'ABCD', 5, 'Bagian Gudang Budi'),
(21, 26, '2022-07-05 14:07:17', 'sedap', 5, 'Bagian Gudang Budi'),
(22, 28, '2022-07-06 03:57:52', 'sedap', 9, 'Bagian Gudang  Tata'),
(23, 22, '2022-07-11 13:00:58', 'sedap', 5, 'Bagian Gudang Budi'),
(24, 0, '2022-07-12 14:57:57', 'ABCD', 5, 'Bagian Gudang Budi'),
(25, 0, '2022-07-12 14:57:57', 'ABCD', 5, 'Bagian Gudang Budi'),
(26, 0, '2022-07-12 14:58:20', 'su', 10, 'Bagian Gudang Budi'),
(27, 0, '2022-07-12 14:58:20', 'su', 10, 'Bagian Gudang Budi'),
(28, 33, '2022-07-15 05:29:31', 'dus', 5, 'Bagian Gudang Budi'),
(29, 33, '2022-07-16 12:38:48', 'box', 5, 'Bagian Gudang Budi'),
(30, 37, '2022-07-17 08:40:10', 'tabung', 10, 'Bagian Gudang Budi'),
(31, 46, '2022-07-21 04:20:24', 'Galon', 10, 'Bagian Gudang Budi'),
(32, 47, '2022-07-21 08:44:32', 'Tabung', 100, 'Bagian Gudang Budi'),
(33, 48, '2022-07-23 08:56:37', 'cek', 10, 'cek'),
(34, 47, '2022-07-23 08:57:11', 'ABCD', 10, 'cek'),
(35, 47, '2022-07-23 12:39:59', 'tes', 2, 'tes'),
(36, 47, '2022-07-23 14:02:04', 'Tabung', 11, 'Pembeli'),
(37, 47, '2022-07-24 06:49:39', 'Tabung', 10, 'Bagian Gudang Budi'),
(38, 47, '2022-07-24 06:49:40', 'Tabung', 10, 'Bagian Gudang Budi'),
(39, 47, '2022-07-24 06:49:40', 'Tabung', 10, 'Bagian Gudang Budi'),
(40, 47, '2022-07-24 06:49:40', 'Tabung', 10, 'Bagian Gudang Budi'),
(41, 47, '2022-07-24 06:49:40', 'Tabung', 10, 'Bagian Gudang Budi'),
(42, 47, '2022-07-24 06:49:40', 'Tabung', 10, 'Bagian Gudang Budi'),
(43, 47, '2022-07-24 06:49:41', 'Tabung', 10, 'Bagian Gudang Budi'),
(44, 49, '2022-07-24 06:50:43', 'Jerigen', 19, 'Bagian Gudang Budi'),
(45, 49, '2022-07-24 06:54:46', 'Jerigen', 5, 'Bagian Gudang Budi'),
(46, 50, '2022-07-24 06:55:20', 'tes', 2, 'tesssssssssssssssssssssss'),
(47, 51, '2022-07-24 07:17:49', 'kaleng', 10, 'Bagian Gudang Budi'),
(49, 54, '2022-07-24 07:26:04', 'karung', 5, 'Bagian Gudang Budi'),
(50, 54, '2022-07-24 07:38:41', 'karung', 10, 'Bagian Gudang Budi'),
(51, 54, '2022-07-24 07:47:19', 'karung', 10, 'Bagian Gudang Budi'),
(52, 55, '2022-07-24 07:49:20', 'Kardus', 100, 'Bagian Gudang Budi'),
(58, 56, '2022-07-24 07:59:41', 'Jerigen', 100, 'Bagian Gudang Budi'),
(59, 53, '2022-07-24 08:00:09', 'karung', 10, 'Bagian Gudang Budi'),
(60, 57, '2022-07-24 08:38:55', 'Jerigen', 10, 'Bagian Gudang Budi'),
(61, 57, '2022-07-26 04:32:49', 'Jerigen', 10, 'Bagian Gudang Budi'),
(62, 53, '2022-07-26 05:25:41', 'karung', 3, 'Bagian Gudang Budi'),
(63, 59, '2022-08-11 07:09:22', 'Tabung', 10, 'Bagian Gudang Budi');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `idpo` int(150) NOT NULL,
  `idbarang` int(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(50) NOT NULL,
  `qty` int(25) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `penerima` varchar(150) NOT NULL,
  `Supplier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`idpo`, `idbarang`, `tanggal`, `keterangan`, `qty`, `kode_transaksi`, `Status`, `penerima`, `Supplier`) VALUES
(5, 32, '2022-07-15 05:27:45', 'dus', 50, 'PO-20220715808', 1, 'tes2', ''),
(6, 33, '2022-07-16 13:50:05', 'box', 100, 'PO-20220716985', 1, 'tes lgi', ''),
(7, 34, '2022-07-16 13:54:50', 'box', 100, 'PO-20220716437', 1, 'Bagian Gudang  Tata', ''),
(10, 36, '2022-07-16 14:13:54', 'TES', 8, 'PO-20220716749', 1, 'NYOBA', ''),
(12, 35, '2022-07-16 14:20:10', 'box', 5, 'PO-20220716113', 1, 'tes', ''),
(13, 33, '2022-07-16 14:24:11', 'box', 5, 'PO-20220716360', 0, '-', ''),
(15, 37, '2022-07-17 05:21:28', 'tabung', 5, 'PO-20220717641', 1, 'Bagian Gudang Budi', ''),
(16, 38, '2022-07-17 05:40:55', 'Botol', 50, 'PO-20220717896', 1, 'Bagian Gudang Budi', ''),
(18, 49, '2022-07-21 04:32:32', 'Jerigen', 100, 'PO-20220721943', 1, 'Bagian Gudang Budi', 'PT.ABCD'),
(19, 53, '2022-07-21 04:39:22', 'karung', 10, 'PO-20220721981', 1, 'Bagian Gudang Budi', 'PT.Biru'),
(22, 47, '2022-07-21 05:05:58', 'Tabung', 10, 'PO-20220721838', 1, 'Bagian Gudang Budi', 'Pt.Gas abadi'),
(23, 49, '2022-07-21 08:45:57', 'Jerigen', 100, 'PO-20220721703', 0, '-', 'PT.MINYAK'),
(24, 47, '2022-07-21 08:49:48', 'Tabung', 10, 'PO-20220721304', 0, '-', 'PT.Minyak abadi'),
(27, 53, '2022-07-24 08:04:16', 'karung', 10, 'PO-20220724487', 1, 'Bagian Gudang Budi', 'Pt.Tani'),
(34, 59, '2022-08-11 07:08:32', 'Tabung', 7, 'PO-20220811335', 1, 'Bagian Gudang Budi', 'Pt.Gas abadi');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `image` varchar(99) DEFAULT NULL,
  `namabarang` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `image`, `namabarang`, `keterangan`, `stock`) VALUES
(53, '83b4d18b08fe1a9f03ac8cb127d959aa.jpg', 'Terigu segitiga biru', 'Karung', 50),
(57, '91f48e29e338de781874e07255b5141e.jpg', 'Minyak Goreng Bimoli', 'Jerigen', 120),
(58, '4c6e6d0692ae3eadab9f449ea7c556aa.jpg', 'Galon Aqua', 'Galon', 100),
(59, '5805f067b24bc7817ba8d35bad7ca2da.jpg', 'Galon vit', 'Galon', -107),
(60, '60c3d2f04c90c9240cb485e4bf7e60f7.jpg', 'Gas hijau', 'Tabung', 100),
(61, '6870bd48fe78a879a74ec30decf2ecf1.jpg', 'Gas Pink', 'Tabung', 100),
(62, 'c01979b6ded820b3e3a1a8fbd545e2cc.jpg', 'Kopi ABC Sachet', 'Kardus', 100),
(63, '41a74577d89f39fd1819b137987ea9ac.jpg', 'Fanta 1,5 L', 'Botol', 100),
(64, 'a115fd152ea7d5cce3c2505b170bda15.jpg', 'Beras Sania', 'karung', 100),
(65, '45207ac2ddfc44e6a63903d1e79e6cb5.jpg', 'Susu Frisian flag', 'kaleng', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`idpo`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `idpo` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
