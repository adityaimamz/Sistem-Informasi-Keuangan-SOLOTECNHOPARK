-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 08:16 AM
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
-- Table structure for table `master_barang`
--

CREATE TABLE `master_barang` (
  `Id_barang` int(11) NOT NULL,
  `Kode_barang` varchar(30) NOT NULL,
  `Nama_barang` varchar(100) NOT NULL,
  `Lokasi` varchar(255) NOT NULL,
  `Tanggal` date NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_belanja`
--

CREATE TABLE `master_belanja` (
  `Id_jenisbelanja` int(11) NOT NULL,
  `Jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_belanja`
--

INSERT INTO `master_belanja` (`Id_jenisbelanja`, `Jenis`) VALUES
(2, 'Barang/Jasa'),
(3, 'Modal');

-- --------------------------------------------------------

--
-- Table structure for table `master_divisi`
--

CREATE TABLE `master_divisi` (
  `Id_divisi` int(11) NOT NULL,
  `Nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_divisi`
--

INSERT INTO `master_divisi` (`Id_divisi`, `Nama_divisi`) VALUES
(2, 'Logistik'),
(3, 'Anggaran'),
(4, 'Akuntansi'),
(5, 'Pengelolaan Aset'),
(6, 'Diklat'),
(7, 'Produksi dan Pemasaran'),
(8, 'Riset dan Inkubator'),
(9, 'Sentra Fasilitas Hak Kekayaan Intelektual'),
(10, 'Pemberdayaan Kawasan'),
(11, 'Kerjasama dan Hukum'),
(12, 'Administrasi dan Kepegawaian');

-- --------------------------------------------------------

--
-- Table structure for table `master_penerimaan`
--

CREATE TABLE `master_penerimaan` (
  `Id_penerimaan` int(11) NOT NULL,
  `Kode_penerimaan` varchar(30) NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL,
  `Nama_pembayar` varchar(50) NOT NULL,
  `Keperluan` varchar(80) NOT NULL,
  `Alamat_instansi` varchar(50) NOT NULL,
  `No_tandaterima` varchar(30) DEFAULT NULL,
  `Besaran_biaya` int(11) NOT NULL,
  `Id_metode` int(11) DEFAULT NULL,
  `Bukti` varchar(255) DEFAULT NULL,
  `Status` enum('voice','invoice') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_penerimaan`
--

INSERT INTO `master_penerimaan` (`Id_penerimaan`, `Kode_penerimaan`, `Bulan`, `Tanggal`, `Nama_pembayar`, `Keperluan`, `Alamat_instansi`, `No_tandaterima`, `Besaran_biaya`, `Id_metode`, `Bukti`, `Status`) VALUES
(15, 'PNR20230307031234', 'Maret', '2023-03-07', 'MASTERX', 'inventaris', 'UB', 'km22', 23000, 2, '1055060580_IMG_20230303_144514.jpg', 'invoice'),
(16, 'PNR20230307031326', 'Maret', '2023-03-08', 'dahlan', 'inventaris', 'ub', 'km33', 34000, 1, '1055060580_IMG_20230303_144514.jpg', 'invoice'),
(17, 'PNR20230307031820', 'Februari', '2023-02-14', 'miss univ', 'beli meja', 'uns', 'km45', 50000, 1, '65549479_cover cd mpsb.pdf', 'invoice'),
(18, 'PNR20230307033224', 'Maret', '2023-03-09', 'yuni', 'beli laptop', 'uns', '', 56000, 0, '1055060580_IMG_20230303_144514.jpg', 'voice'),
(27, 'PNR20230308025305', 'Maret', '2023-03-08', 'msib', 'gaji', 'univ', 'km87', 90000, 1, '1690745364_UI Design.pdf', 'invoice'),
(28, 'PNR20230308034512', 'Februari', '2023-02-26', 'yunus', 'kunjungan industri', 'its', 'km88', 480000, 2, '1055060580_IMG_20230303_144514.jpg', 'invoice'),
(29, 'PNR20230308042456', 'Maret', '2023-03-07', 'Fitri', 'inventaris', 'blitar', '', 437000, 0, '', 'voice'),
(31, 'PNR20230308043409', 'Februari', '2023-02-28', 'meee', 'Bookinga', 'Brawijaya', '', 670000, 0, '1559289524_p4.pdf', 'voice');

-- --------------------------------------------------------

--
-- Table structure for table `master_pengeluaran`
--

CREATE TABLE `master_pengeluaran` (
  `Id_pengeluaran` int(11) NOT NULL,
  `Kode_pengeluaran` varchar(30) NOT NULL,
  `Id_sumberdana` int(11) NOT NULL,
  `Id_divisi` int(11) NOT NULL,
  `Id_jenis` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Rincian` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Bukti_lpj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pengeluaran`
--

INSERT INTO `master_pengeluaran` (`Id_pengeluaran`, `Kode_pengeluaran`, `Id_sumberdana`, `Id_divisi`, `Id_jenis`, `Tanggal`, `Bulan`, `Rincian`, `Jumlah`, `Bukti_lpj`) VALUES
(17, 'PGR20230308055043', 1, 12, 2, '2023-03-08', 'Maret', 'inventaris', 410000, '1901692912_cover cd - mpsb fix.pdf');

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
(1, 'Msib', 'solo', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'Wahyu', 'jateng', 'manager', '1d0258c2440a8d19e716292b231e3190', 'Manager');

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
(2, 'Transfer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_barang`
--
ALTER TABLE `master_barang`
  ADD PRIMARY KEY (`Id_barang`);

--
-- Indexes for table `master_belanja`
--
ALTER TABLE `master_belanja`
  ADD PRIMARY KEY (`Id_jenisbelanja`);

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
-- AUTO_INCREMENT for table `master_barang`
--
ALTER TABLE `master_barang`
  MODIFY `Id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_belanja`
--
ALTER TABLE `master_belanja`
  MODIFY `Id_jenisbelanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_divisi`
--
ALTER TABLE `master_divisi`
  MODIFY `Id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `master_penerimaan`
--
ALTER TABLE `master_penerimaan`
  MODIFY `Id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `master_pengeluaran`
--
ALTER TABLE `master_pengeluaran`
  MODIFY `Id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `master_sumberdana`
--
ALTER TABLE `master_sumberdana`
  MODIFY `Id_sumberdana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `metode_bayar`
--
ALTER TABLE `metode_bayar`
  MODIFY `Id_metode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
