-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2021 pada 15.04
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `keys`
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
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'jamas123', 1, 0, 0, NULL, 1),
(2, 1, 'jamas123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar_produk`
--

CREATE TABLE `tbl_gambar_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama`, `slug`, `created_at`, `update_at`) VALUES
(3, 'Produk paket sop', 'produk-paket-sop', '2021-11-23 02:15:47', '2021-11-23 02:15:47'),
(5, 'Produk Mentah', 'produk-mentah', '2021-11-18 08:47:42', '2021-11-18 08:47:42'),
(6, 'pindang pegagan', 'pindang-pegagan', '2021-11-23 02:03:26', '2021-11-23 02:03:26'),
(9, 'Sayur sop', 'sayur-sop', '2021-11-23 02:17:27', '2021-11-23 02:17:27'),
(12, 'Sayur sop6', 'sayur-sop6', '2021-11-23 03:03:57', '2021-11-23 03:03:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mitra`
--

CREATE TABLE `tbl_mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `ktp` text NOT NULL,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mitra`
--

INSERT INTO `tbl_mitra` (`id`, `nama`, `slug`, `email`, `alamat`, `telepon`, `ktp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Reine', '', 'PavoliaReine@gmail.com', 'Palembang', 'Palembang', '16092281023123', 'Aktif', '2021-11-23 01:48:57', '2021-11-23 07:49:03'),
(3, 'Nn. Moona', 'nn-moona', 'Moona@gmail.com', 'Palembang', '082280025622', '16000012121212', 'Aktif', '2021-11-23 01:53:08', '2021-11-23 07:54:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `penjual` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis` enum('Paket Siap Saji','Paket Siap Masak') NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `penjual`, `nama_produk`, `deskripsi`, `id_kategori`, `jenis`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sayur Sop', ' enak di makan pake nasi', 3, 'Paket Siap Saji', 200000, '2021-11-19 01:10:40', '2021-11-19 07:11:08'),
(2, 3, 'Sayur Sop', ' enak', 4, '', 20000, '2021-11-19 01:27:27', '2021-11-19 07:28:13'),
(3, 1, 'Soto', 'Enak', 3, '', 20000, '2021-11-19 10:53:18', '2021-11-19 10:53:18'),
(5, 3, 'ayam goreng', ' ayam dll', 5, '', 22000, '2021-11-21 07:21:07', '2021-11-21 13:22:11'),
(6, 3, 'ayam goreng', ' ayam goreng', 4, 'Paket Siap Saji', 130000, '2021-11-23 01:09:22', '2021-11-23 01:09:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_user` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level_user`, `email`, `nama_lengkap`, `status`, `photo`) VALUES
(1, 'admin', 'admin', 1, 'jamasjagomasak@gmail.com', 'Pavolia Reine', 1, ''),
(4, 'reine', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin@gmail.com', 'Pavolia Reine', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_gambar_produk`
--
ALTER TABLE `tbl_gambar_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`id_produk`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`nama`);

--
-- Indeks untuk tabel `tbl_mitra`
--
ALTER TABLE `tbl_mitra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`nama`,`status`) USING HASH;

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`penjual`,`nama_produk`,`id_kategori`,`jenis`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar_produk`
--
ALTER TABLE `tbl_gambar_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_mitra`
--
ALTER TABLE `tbl_mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
