-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 Apr 2017 pada 15.07
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_basicleaner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `password_admin` varchar(40) NOT NULL,
  `level_admin` enum('admin','manajer') NOT NULL,
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password_admin`, `level_admin`, `blokir`) VALUES
(1, 'aris', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'N'),
(11, 'bambang', '827ccb0eea8a706c4c34a16891f84e7b', 'manajer', 'N'),
(12, 'dimas', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi_shoes`
--

CREATE TABLE `detail_transaksi_shoes` (
  `id_detail_transaksi_shoes` int(10) NOT NULL,
  `id_transaksi_shoes` varchar(20) NOT NULL,
  `id_kategori_layanan` varchar(20) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah_sepatu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi_shoes`
--

INSERT INTO `detail_transaksi_shoes` (`id_detail_transaksi_shoes`, `id_transaksi_shoes`, `id_kategori_layanan`, `nama_barang`, `harga`, `jumlah_sepatu`) VALUES
(8, 'TRK871', '1', 'sadasdsad', 25000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_layanan`
--

CREATE TABLE `kategori_layanan` (
  `id_kategori_layanan` int(10) NOT NULL,
  `jenis_layanan` varchar(20) NOT NULL,
  `nama_layanan` varchar(30) NOT NULL,
  `harga_layanan` int(10) NOT NULL,
  `deskripsi_layanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_layanan`
--

INSERT INTO `kategori_layanan` (`id_kategori_layanan`, `jenis_layanan`, `nama_layanan`, `harga_layanan`, `deskripsi_layanan`) VALUES
(1, 'Cleaning', 'Fast Cleaning', 25000, 'Midsole & Upper Cleaning'),
(3, 'Cleaning', 'Deep Cleaning', 45000, 'All shoe parts cleaning'),
(4, 'Repaint', 'Standart materials', 125000, 'asdasdadada'),
(5, 'Repaint', 'Special Material', 175000, 'adsadasdasd'),
(6, 'Reglue', 'Light Damage', 45000, 'ersfsdfsd'),
(7, 'Reglue', 'heavy Damaged', 75000, 'dasdasdasd'),
(8, 'Cleaning', 'Classic Cleaning', 25000, 'Outsole, midsole, & upper cleaning');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` varchar(20) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `alamat_member` text NOT NULL,
  `notelp_member` int(12) NOT NULL,
  `email_member` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat_member`, `notelp_member`, `email_member`) VALUES
('MBSC519', 'asdas', 'asdas', 9978987, 'dsadsa'),
('MBSC553', 'Dimas Prasetyo', 'Perum Griya Kencana Permai Block C4 No 13 Argrejo Sedayu Bantul', 2147483647, 'dimasprasetyo485@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_shoes`
--

CREATE TABLE `transaksi_shoes` (
  `id_transaksi_shoes` varchar(20) NOT NULL DEFAULT '',
  `id_member` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `status_member` enum('member','non-member') NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `status_pengambilan` enum('S','B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_shoes`
--

INSERT INTO `transaksi_shoes` (`id_transaksi_shoes`, `id_member`, `nama_lengkap`, `alamat`, `no_telp`, `email`, `status_member`, `tgl_transaksi`, `status_pengambilan`) VALUES
('TRK871', '-', 'dasdasdas', 'dadasdasd', '98797897', 'dasdas@gmail.com', 'non-member', '2017-04-03', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_transaksi_shoes`
--
ALTER TABLE `detail_transaksi_shoes`
  ADD PRIMARY KEY (`id_detail_transaksi_shoes`);

--
-- Indexes for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  ADD PRIMARY KEY (`id_kategori_layanan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `transaksi_shoes`
--
ALTER TABLE `transaksi_shoes`
  ADD PRIMARY KEY (`id_transaksi_shoes`),
  ADD KEY `id_member` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `detail_transaksi_shoes`
--
ALTER TABLE `detail_transaksi_shoes`
  MODIFY `id_detail_transaksi_shoes` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `kategori_layanan`
--
ALTER TABLE `kategori_layanan`
  MODIFY `id_kategori_layanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
