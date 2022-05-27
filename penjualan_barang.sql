-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Nov 2016 pada 13.07
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(1, 'real', 'good', 'Raizo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` char(10) NOT NULL,
  `id_jenis` char(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga` int(15) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_jenis`, `nama_barang`, `harga`, `stok`) VALUES
('b001', 'j001', 'Cincin', 15000, 82),
('b002', 'j001', 'Kalung', 20000, 25),
('b003', 'j002', 'Wortel', 2500, 90),
('b004', 'j002', 'Kersen', 3000, 220),
('b005', 'j003', 'Baskom', 6000, 200),
('b006', 'j004', 'Softek', 3500, 50),
('b007', 'j005', 'Konidin', 500, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id_detail` int(10) NOT NULL,
  `id_penjualan` char(10) NOT NULL,
  `id_barang` char(10) NOT NULL,
  `jumlah` int(15) NOT NULL,
  `total` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `id_penjualan`, `id_barang`, `jumlah`, `total`) VALUES
(115, 'J0001', 'b005', 20, 120000),
(117, 'J0002', 'b006', 50, 175000),
(118, 'J0003', 'b003', 10, 25000),
(119, 'J0004', 'b001', 8, 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` char(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
('j001', 'Aksesoris'),
('j002', 'Buah'),
('j003', 'Parabot'),
('j004', 'Pembersih'),
('j005', 'Obat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` char(10) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jk` char(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `ktp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `alamat`, `jk`, `hp`, `ktp`) VALUES
('P0001', 'Ajat S', '', '', '', '', ''),
('P0002', 'Koko N', 'kokom12@gmail.com', 'jauh', 'on', '02293000310', '1110988811'),
('P0003', '', '', '', '', '', ''),
('P0004', 'ajat', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` char(10) NOT NULL,
  `id_pelanggan` char(10) NOT NULL,
  `id_barang` char(10) NOT NULL,
  `tgl` date NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_pelanggan`, `id_barang`, `tgl`, `total`) VALUES
('J0001', 'P0001', 'b005', '2016-11-09', 120000),
('J0002', 'P0002', 'b006', '2016-11-09', 175000),
('J0003', 'P0003', 'b003', '2016-11-16', 25000),
('J0004', 'P0003', 'b001', '2016-11-16', 120000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
