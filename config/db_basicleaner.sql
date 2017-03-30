-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2016 pada 18.57
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_basicleaner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(10) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `password_admin` varchar(40) NOT NULL,
  `level_admin` enum('admin','manajer') NOT NULL,
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `password_admin`, `level_admin`, `blokir`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'N'),
(11, 'manajer', '202cb962ac59075b964b07152d234b70', 'manajer', 'N'),
(12, 'dimas', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cleaning`
--

CREATE TABLE IF NOT EXISTS `cleaning` (
  `id_cleaning` varchar(20) NOT NULL,
  `nama_cleaning` varchar(30) NOT NULL,
  `harga_cleaning` varchar(30) NOT NULL,
  `deskripsi_cleaning` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cleaning`
--

INSERT INTO `cleaning` (`id_cleaning`, `nama_cleaning`, `harga_cleaning`, `deskripsi_cleaning`) VALUES
('CLN00', 'sdasd', '2000', 'sadsd'),
('CLN01', 'Testing ma broh', '200000', 'asdsad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` varchar(20) NOT NULL,
  `nama_member` varchar(30) NOT NULL,
  `alamat_member` text NOT NULL,
  `notelp_member` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reglue`
--

CREATE TABLE IF NOT EXISTS `reglue` (
  `id_reglue` varchar(20) NOT NULL,
  `harga_reglue` varchar(20) NOT NULL,
  `estimasi_reglue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reglue`
--

INSERT INTO `reglue` (`id_reglue`, `harga_reglue`, `estimasi_reglue`) VALUES
('RGLU00', '29000', 'sadasd yo man\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `repaint`
--

CREATE TABLE IF NOT EXISTS `repaint` (
  `id_repaint` varchar(20) NOT NULL,
  `stok_warna_repaint` varchar(20) NOT NULL,
  `harga_repaint` varchar(10) NOT NULL,
  `estimasi_repaint` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `repaint`
--

INSERT INTO `repaint` (`id_repaint`, `stok_warna_repaint`, `harga_repaint`, `estimasi_repaint`) VALUES
('RPNT00', 'maroon', '20000', 'sdasd'),
('RPNT01', 'biru miss', '20000', 'sdasdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_shoes`
--

CREATE TABLE IF NOT EXISTS `transaksi_shoes` (
  `id_transaksi_shoes` varchar(20) NOT NULL,
  `nama_pemesan` varchar(50) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `id_cleaning` int(10) NOT NULL,
  `id_repaint` int(10) NOT NULL,
  `id_reglue` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cleaning`
--
ALTER TABLE `cleaning`
 ADD PRIMARY KEY (`id_cleaning`);

--
-- Indexes for table `reglue`
--
ALTER TABLE `reglue`
 ADD PRIMARY KEY (`id_reglue`);

--
-- Indexes for table `repaint`
--
ALTER TABLE `repaint`
 ADD PRIMARY KEY (`id_repaint`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
