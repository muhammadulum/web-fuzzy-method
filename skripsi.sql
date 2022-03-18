-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 10:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'dasd', '9f611dc09145f11fdfcd0c155d27811a'),
(3, 'dajsdja', 'e543df3b1c3a58230002195568f7006a'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `buku_tamu`
--

CREATE TABLE `buku_tamu` (
  `id_pengunjung` int(11) NOT NULL,
  `nama_pengunjung` varchar(25) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `komentar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_pengunjung`, `nama_pengunjung`, `alamat`, `komentar`) VALUES
(1, 'admin', 'alamat admin', 'komentar admin'),
(2, 'admin2', 'alamat admin', 'komentar admin');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `code_fasilitas` varchar(50) NOT NULL DEFAULT '',
  `nama_fasilitas` varchar(50) NOT NULL DEFAULT '',
  `status_fasilitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`code_fasilitas`, `nama_fasilitas`, `status_fasilitas`) VALUES
('KD001', 'Kursi', 'baik'),
('KD002', 'mushola', 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy`
--

CREATE TABLE `fuzzy` (
  `id_fuzzy` int(11) NOT NULL,
  `id_wisata` int(3) NOT NULL,
  `nama_objek` varchar(50) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `jarak` varchar(20) NOT NULL,
  `fasilitas` varchar(20) NOT NULL,
  `bobot` varchar(20) NOT NULL,
  `muTR` varchar(20) NOT NULL,
  `muR` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuzzy`
--

INSERT INTO `fuzzy` (`id_fuzzy`, `id_wisata`, `nama_objek`, `harga`, `jarak`, `fasilitas`, `bobot`, `muTR`, `muR`, `keterangan`) VALUES
(1, 3, 'kampung korea', '10000', '1', '3', 'NAN', '0', '0', 'Objek Direkomendasi'),
(2, 1, 'Tangkuban Perahu', '1000', '2', '1', 'NAN', '0', '0', 'Objek Direkomendasi');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wis` int(11) NOT NULL,
  `nama_objek` varchar(50) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `ket_tempat` mediumtext NOT NULL,
  `gambar` text NOT NULL,
  `jum_fasilitas` int(3) NOT NULL,
  `code_fasilitas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wis`, `nama_objek`, `harga`, `ket_tempat`, `gambar`, `jum_fasilitas`, `code_fasilitas`) VALUES
(1, 'Tangkuban Perahu', '1000', 'tangkuban perahu adalah salah satu destinasi di bandung', '947-2238.jpg', 1, 'Kursi'),
(2, 'gedung sate', '10000', 'adalah tempat wisata dibandung', '928-theforest.png', 2, 'Kursi,mushola'),
(3, 'kampung korea', '10000', 'adalah tempat wisata dibandung', '731-theforest.png', 3, 'mushola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`code_fasilitas`) USING BTREE;

--
-- Indexes for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD PRIMARY KEY (`id_fuzzy`),
  ADD KEY `id_wisata` (`id_wisata`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buku_tamu`
--
ALTER TABLE `buku_tamu`
  MODIFY `id_pengunjung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fuzzy`
--
ALTER TABLE `fuzzy`
  MODIFY `id_fuzzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD CONSTRAINT `fuzzy_ibfk_1` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
