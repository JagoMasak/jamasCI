-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 05:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jagomasak`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'jamas123', 1, 0, 0, NULL, 1),
(2, 1, 'jamas123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `no_hp`, `email`, `password`) VALUES
(1, 'Iqbal Fahrul Rahman', '081234567812', 'qblfahrul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `jenis_produk`) VALUES
(1, 'Paket Siap Saji'),
(2, 'Paket Siap Masak');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mitra`
--

CREATE TABLE `tbl_mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(100) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mitra`
--

INSERT INTO `tbl_mitra` (`id_mitra`, `nama_mitra`, `nama_toko`, `alamat_toko`, `nohp`, `email`) VALUES
(1, 'Bu Desi', 'Toko Bu Desi', 'Jl. Mawar', '081234583192', 'desi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_mitra` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_mitra`, `id_jenis`, `nama_produk`, `deskripsi`, `gambar`, `harga`) VALUES
(1, 1, 1, 'Paket Siap Saji Soto', 'Langsung siap saji', 'img-paket-sayur-sop.jpg', 39000),
(2, 1, 2, 'Paket Siap Masak Soto', 'Bahan-bahan\r\n\r\n6 siung bawang putih\r\n5 butir bawang merah\r\n1 sdt merica bubuk Secukupnya garam\r\n1 bungkus kaldu bubuk\r\n1 buah wortel\r\n1 buah kentang\r\n1/2 bagian kol\r\n1 bungkus makroni\r\n2 batang daun bawang\r\n2 batang seledri\r\n1 sdm minyak(untuk menumis)\r\n1200 ml air\r\n\r\nLangkah-langkah\r\n1. Siapkan bahannya\r\n2. Potong2 sesuai selera & cuci bersih\r\n3. Iris tipis2 bawang merah & bawang putih,Tumis hingga harum\r\n4. Didihkan air,masukkan tumisan bawang merah & bawang putih,merica,kaldu bubuk,garam,sayuran & makroni.masak hingga matang\r\n5. Siap di hidangkan.', 'img-siap-sayur-soto.jpg', 8000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tbl_mitra`
--
ALTER TABLE `tbl_mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mitra`
--
ALTER TABLE `tbl_mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
