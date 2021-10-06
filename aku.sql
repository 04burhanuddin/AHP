-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2021 at 04:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aku`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` varchar(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kemasan` varchar(30) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama`, `kemasan`, `asal`, `jenis`, `kategori`) VALUES
('881', 'A1', '2kg', 'lokal', 'unggul', 'tanaman'),
('882', 'A2', '1kg', 'lokal', 'unggul', 'tanaman'),
('883', 'A3', '1kg', 'lokal', 'unggul', 'tanaman');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_alternatif`
--

CREATE TABLE `hasil_alternatif` (
  `kriteria` varchar(30) NOT NULL,
  `alternatif1` varchar(30) NOT NULL,
  `bobot` float NOT NULL,
  `alternatif2` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_alternatif`
--

INSERT INTO `hasil_alternatif` (`kriteria`, `alternatif1`, `bobot`, `alternatif2`) VALUES
('1', '881', 1, '882'),
('1', '881', 1, '883'),
('1', '882', 9, '883'),
('2', '881', 1, '882'),
('2', '881', 1, '883'),
('2', '882', 9, '883'),
('3', '881', 1, '882'),
('3', '881', 1, '883'),
('3', '882', 9, '883'),
('4', '881', 1, '882'),
('4', '881', 1, '883'),
('4', '882', 9, '883'),
('5', '881', 1, '882'),
('5', '881', 1, '883'),
('5', '882', 9, '883');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_kriteria`
--

CREATE TABLE `hasil_kriteria` (
  `kriteria1` text NOT NULL,
  `bobot` text NOT NULL,
  `kriteria2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_kriteria`
--

INSERT INTO `hasil_kriteria` (`kriteria1`, `bobot`, `kriteria2`) VALUES
('1', '5', '2'),
('1', '2', '3'),
('1', '3', '4'),
('1', '9', '5'),
('2', '2', '3'),
('2', '4', '4'),
('2', '2', '5'),
('3', '2', '4'),
('3', '4', '5'),
('4', '2', '5');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`) VALUES
(1, 'Kadar Air'),
(2, 'PH Tanah'),
(3, 'Kelembapan'),
(4, 'Suhu'),
(5, 'Cahaya');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `role` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `com_pas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_lengkap`, `role`, `username`, `password`, `com_pas`) VALUES
(1, 'Admin', 'Admin', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055', '1234'),
(2, 'assri', 'kelompoktani', 'as', '81dc9bdb52d04dc20036dbd8313ed055', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `prioritas_alternatif`
--

CREATE TABLE `prioritas_alternatif` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(30) NOT NULL,
  `alternatif` varchar(15) NOT NULL,
  `prioritas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prioritas_alternatif`
--

INSERT INTO `prioritas_alternatif` (`id`, `kriteria`, `alternatif`, `prioritas`) VALUES
(42, '1', '881', 0.2993),
(43, '1', '882', 0.5417),
(44, '1', '883', 0.1589),
(45, '2', '881', 0.2993),
(46, '2', '882', 0.5417),
(47, '2', '883', 0.1589),
(48, '3', '881', 0.2993),
(49, '3', '882', 0.5417),
(50, '3', '883', 0.1589),
(51, '4', '881', 0.2993),
(52, '4', '882', 0.5417),
(53, '4', '883', 0.1589),
(54, '5', '881', 0.2993),
(55, '5', '882', 0.5417),
(56, '5', '883', 0.1589);

-- --------------------------------------------------------

--
-- Table structure for table `prioritas_kriteria`
--

CREATE TABLE `prioritas_kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(15) NOT NULL,
  `prioritas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prioritas_kriteria`
--

INSERT INTO `prioritas_kriteria` (`id`, `kriteria`, `prioritas`) VALUES
(1, '1', 0.4579),
(2, '2', 0.2142),
(3, '3', 0.1778),
(4, '4', 0.0966),
(5, '5', 0.0535);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prioritas_alternatif`
--
ALTER TABLE `prioritas_alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prioritas_kriteria`
--
ALTER TABLE `prioritas_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prioritas_alternatif`
--
ALTER TABLE `prioritas_alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `prioritas_kriteria`
--
ALTER TABLE `prioritas_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
