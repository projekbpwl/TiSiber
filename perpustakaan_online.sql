-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 11:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idb` int(5) NOT NULL,
  `nama_buku` varchar(50) NOT NULL,
  `jenis_buku` varchar(45) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idb`, `nama_buku`, `jenis_buku`, `tahun_terbit`, `penerbit`, `link`) VALUES
(2, 'Finite Element', 'Pelajaran', '0000', 'Masasyi', 'Finite Element.pdf'),
(3, 'Engineering Fluid Mechanics', 'Pelajaran', '2007', 'qw', 'engineering-fluid-mechanics.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idu` int(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jenis` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Admin','Member') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idu`, `nama`, `username`, `password`, `email`, `alamat`, `no_telp`, `jenis`, `gambar`, `hak_akses`) VALUES
(1, 'Abdul Aziz Fakhrul S', 'test', 'test', 'admin@gmail.com', 'jalan rowosari', '081996278390', 'Laki-Laki', 'My Editor.jpg', 'Member'),
(3, 'admin', 'admin', 'admin', 'admin@gmail.com', '', '', 'Laki-Laki', 'Pertumbuhan Tanaman.jpg', 'Admin'),
(4, 'Aziz', 'aziz', '12345', 'fahrul@gmail.com', '', '', 'Laki-Laki', 'tangan-wudhu.jpg', 'Member'),
(5, 'adi', 'adi', 'adi', 'rahmad18ti@mahasiswa.pcr.ac.id', '', '', 'Laki-Laki', NULL, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idb` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
