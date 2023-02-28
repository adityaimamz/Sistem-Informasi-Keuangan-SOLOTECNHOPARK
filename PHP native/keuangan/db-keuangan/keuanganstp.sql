-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2023 at 05:26 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuanganstp`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran`
--

CREATE TABLE `detail_pengeluaran` (
  `Id_detail` int(11) NOT NULL,
  `Id_pengeluaran` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Rincian` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_divisi`
--

CREATE TABLE `master_divisi` (
  `Id_divisi` int(11) NOT NULL,
  `Nama_divisi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_divisi`
--

INSERT INTO `master_divisi` (`Id_divisi`, `Nama_divisi`) VALUES
(2, 'Logistik'),
(3, 'Anggaran');

-- --------------------------------------------------------

--
-- Table structure for table `master_penerimaan`
--

CREATE TABLE `master_penerimaan` (
  `Id_penerimaan` int(11) NOT NULL,
  `Id_user` int(11) DEFAULT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL,
  `Nama_pembayar` varchar(50) NOT NULL,
  `Keperluan` varchar(80) NOT NULL,
  `Alamat_instansi` varchar(50) NOT NULL,
  `No_tandaterima` int(11) NOT NULL,
  `Besaran_biaya` int(11) NOT NULL,
  `Id_metode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_penerimaan`
--

INSERT INTO `master_penerimaan` (`Id_penerimaan`, `Id_user`, `Bulan`, `Tanggal`, `Nama_pembayar`, `Keperluan`, `Alamat_instansi`, `No_tandaterima`, `Besaran_biaya`, `Id_metode`) VALUES
(3, NULL, 'Agustus', '2023-03-02', 'nada', 'inventaris', 'Brawijaya', 453, 50000, 2),
(6, NULL, 'April', '2023-02-28', 'Fitri', 'Booking', 'Ub', 768, 60000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_pengeluaran`
--

CREATE TABLE `master_pengeluaran` (
  `Id_pengeluaran` int(11) NOT NULL,
  `Id_sumberdana` int(11) NOT NULL,
  `Id_divisi` int(11) NOT NULL,
  `Jenis_belanja` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Rincian` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pengeluaran`
--

INSERT INTO `master_pengeluaran` (`Id_pengeluaran`, `Id_sumberdana`, `Id_divisi`, `Jenis_belanja`, `Tanggal`, `Bulan`, `Rincian`, `Jumlah`) VALUES
(2, 1, 3, 'Modal', '2023-03-09', 'Maret', 'ada deh', 0),
(3, 1, 2, 'Modal', '2023-03-07', 'Januari', 'oke', 50000),
(4, 2, 3, 'Barang/Jasa', '2023-03-08', 'Juli', 'Beneran', 34000);

-- --------------------------------------------------------

--
-- Table structure for table `master_sumberdana`
--

CREATE TABLE `master_sumberdana` (
  `Id_sumberdana` int(11) NOT NULL,
  `Jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_sumberdana`
--

INSERT INTO `master_sumberdana` (`Id_sumberdana`, `Jenis`) VALUES
(1, 'APBD'),
(2, 'BLUD');

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `Id_user` int(11) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`Id_user`, `Nama`, `Alamat`, `Username`, `Password`, `Level`) VALUES
(1, 'admin', 'solo', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'manager', 'solo', 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager'),
(4, 'Fitri', 'blitar', 'fitri', '534a0b7aa872ad1340d0071cbfa38697', 'pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `metode_bayar`
--

CREATE TABLE `metode_bayar` (
  `Id_metode` int(11) NOT NULL,
  `Jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode_bayar`
--

INSERT INTO `metode_bayar` (`Id_metode`, `Jenis`) VALUES
(1, 'Cash'),
(2, 'Transfer'),
(3, 'Cashless');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  ADD PRIMARY KEY (`Id_detail`);

--
-- Indexes for table `master_divisi`
--
ALTER TABLE `master_divisi`
  ADD PRIMARY KEY (`Id_divisi`);

--
-- Indexes for table `master_penerimaan`
--
ALTER TABLE `master_penerimaan`
  ADD PRIMARY KEY (`Id_penerimaan`);

--
-- Indexes for table `master_pengeluaran`
--
ALTER TABLE `master_pengeluaran`
  ADD PRIMARY KEY (`Id_pengeluaran`);

--
-- Indexes for table `master_sumberdana`
--
ALTER TABLE `master_sumberdana`
  ADD PRIMARY KEY (`Id_sumberdana`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`Id_user`);

--
-- Indexes for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  ADD PRIMARY KEY (`Id_metode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pengeluaran`
--
ALTER TABLE `detail_pengeluaran`
  MODIFY `Id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_divisi`
--
ALTER TABLE `master_divisi`
  MODIFY `Id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_penerimaan`
--
ALTER TABLE `master_penerimaan`
  MODIFY `Id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master_pengeluaran`
--
ALTER TABLE `master_pengeluaran`
  MODIFY `Id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_sumberdana`
--
ALTER TABLE `master_sumberdana`
  MODIFY `Id_sumberdana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `Id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
