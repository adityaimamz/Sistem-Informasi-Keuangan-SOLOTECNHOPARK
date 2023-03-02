-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2023 at 08:50 PM
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
  `Id_user` int(11) DEFAULT NULL,
  `Bulan` varchar(20) NOT NULL,
  `Tanggal` date NOT NULL,
  `Nama_pembayar` varchar(50) NOT NULL,
  `Keperluan` varchar(80) NOT NULL,
  `Alamat_instansi` varchar(50) NOT NULL,
  `No_tandaterima` varchar(30) NOT NULL,
  `Besaran_biaya` int(11) NOT NULL,
  `Id_metode` int(11) DEFAULT NULL,
  `Bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_penerimaan`
--

INSERT INTO `master_penerimaan` (`Id_penerimaan`, `Id_user`, `Bulan`, `Tanggal`, `Nama_pembayar`, `Keperluan`, `Alamat_instansi`, `No_tandaterima`, `Besaran_biaya`, `Id_metode`, `Bukti`) VALUES
(7, NULL, 'Maret', '2023-03-01', 'meee', 'Booking', 'jateng', '987', 12000, 2, '1484097384_Workflow Potrait.pdf'),
(8, NULL, 'Februari', '2023-02-22', 'Fitri', 'inventaris', 'Ub', '43', 30000, 1, '1965158232_Untitled.pdf'),
(9, NULL, 'Januari', '2023-01-17', 'Anggarann', 'Bookinga', 'Brawijaya', '124', 100000, 1, '545329704_Tugas_Kuliah_4__Pembelajaran_Mesin.pdf');

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
  `Jumlah` int(11) NOT NULL,
  `Bukti_lpj` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pengeluaran`
--

INSERT INTO `master_pengeluaran` (`Id_pengeluaran`, `Id_sumberdana`, `Id_divisi`, `Jenis_belanja`, `Tanggal`, `Bulan`, `Rincian`, `Jumlah`, `Bukti_lpj`) VALUES
(5, 2, 3, 'Barang/Jasa', '2023-01-30', 'Januari', 'Beneran', 54000, '1805332265_205150601111010_Nadha Fitri_Tugas 1A.pdf'),
(6, 2, 3, 'Barang/Jasa', '2023-01-09', 'Maret', 'ada dehhh', 10000, '586253124_IMG-20190608-WA0053.jpg'),
(7, 2, 3, 'Modal', '2021-07-07', 'Maret', 'Beneran', 60000, '670952768_1942951.pdf.pdf');

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
(2, 'manager', 'jateng', 'manager', '1d0258c2440a8d19e716292b231e3190', 'manager'),
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
(2, 'Transfer');

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
  MODIFY `Id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_penerimaan`
--
ALTER TABLE `master_penerimaan`
  MODIFY `Id_penerimaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_pengeluaran`
--
ALTER TABLE `master_pengeluaran`
  MODIFY `Id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
