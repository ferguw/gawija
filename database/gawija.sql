-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2021 at 06:27 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gawija`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajuan`
--

CREATE TABLE `ajuan` (
  `idaj` int(11) NOT NULL,
  `idj` int(11) NOT NULL,
  `idt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ajuan`
--

INSERT INTO `ajuan` (`idaj`, `idj`, `idt`) VALUES
(1, 17, 1),
(2, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `idc` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `comp` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idc`, `name`, `username`, `password`, `email`, `phone`, `comp`) VALUES
(1, 'Budi', 'client@mail.com', '$2y$10$.eYnxM6WNW1SyFkloJp3TevrE7zycpbcGeWWxppKstVHthg5vlJsW', 'client@mail.com', '082154420156', 'PT.Yamaha'),
(7, 'andi', 'testclient@mail.com', '$2y$10$zivtHjiBbrHRKRp2CDUKVepZQBYcPRT7W1qUCYDKPBlI4xWGZTJdS', 'testclient@mail.com', '09876654321', 'PT. ABC'),
(8, 'testclient2', 'testclient2@mail.com', '$2y$10$kLgdwNmbu65zWbyFRyhHAe9oDPFG579uM8TpWrN2z57I36i2vwHJC', 'testclient2@mail.com', NULL, NULL),
(9, 'budi', 'budi@mail.com', '$2y$10$m0Wxo8wUftxm9jhts1mgk.bjZZiBDJRpZUpSq1Tg679Hgyi7RzD7q', 'budi@mail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `idj` int(11) NOT NULL,
  `idc` int(11) NOT NULL,
  `comp` varchar(60) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `address` varchar(128) NOT NULL,
  `city` varchar(30) NOT NULL,
  `workday` varchar(30) NOT NULL,
  `total_salary` varchar(30) NOT NULL,
  `fee_gawiae` varchar(30) NOT NULL,
  `grandtotal` varchar(30) NOT NULL,
  `pajak` varchar(30) NOT NULL,
  `status` enum('pending','accept','reject','ongoing','end') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`idj`, `idc`, `comp`, `judul`, `deskripsi`, `start`, `end`, `address`, `city`, `workday`, `total_salary`, `fee_gawiae`, `grandtotal`, `pajak`, `status`) VALUES
(17, 1, 'PT.Yamaha', 'ABCDE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-01-27', '2021-01-31', 'JL. Utara', 'Banjarmasin', '5', '2000000', '200000', '2300000', '100000', 'ongoing'),
(18, 9, '', 'Jalan Santai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2021-01-28', '2021-01-31', 'JL. Utara', 'Banjarmasin', '2', '800000', '80000', '920000', '40000', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `job_ongoing`
--

CREATE TABLE `job_ongoing` (
  `idjo` int(11) NOT NULL,
  `idj` int(11) NOT NULL,
  `idt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_ongoing`
--

INSERT INTO `job_ongoing` (`idjo`, `idj`, `idt`) VALUES
(1, 17, 1),
(2, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_req`
--

CREATE TABLE `job_req` (
  `idjr` int(11) NOT NULL,
  `idj` varchar(20) NOT NULL,
  `numtalent` varchar(20) NOT NULL,
  `salary` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_req`
--

INSERT INTO `job_req` (`idjr`, `idj`, `numtalent`, `salary`, `type`) VALUES
(1, '17', '2', '100000', 'SPG'),
(2, '17', '2', '100000', 'SPB'),
(3, '18', '2', '100000', 'SPB'),
(4, '18', '2', '100000', 'SPG');

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

CREATE TABLE `notif` (
  `idn` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `idj` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengalaman`
--

CREATE TABLE `pengalaman` (
  `idpeng` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `posisi` varchar(30) NOT NULL,
  `periode` varchar(30) NOT NULL,
  `jobdesk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `idrp` int(11) NOT NULL,
  `idj` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `desk_rp` text NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`idrp`, `idj`, `idt`, `tgl`, `desk_rp`, `photo`) VALUES
(1, 17, 1, '2021-01-27', 'aadsasd\r\n1asdasd\r\ndasdasd\r\nafradfasd\r\narfadfadf', '17-1-1103-270121.jpg'),
(2, 17, 1, '2021-01-27', 'deskrpisi', '17-1-2155-270121.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE `talent` (
  `idt` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `saldo` int(11) DEFAULT NULL,
  `no_ktp` varchar(16) DEFAULT NULL,
  `ttl` varchar(10) DEFAULT NULL,
  `alamat` varchar(120) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `whatsapp` varchar(12) DEFAULT NULL,
  `instagram` varchar(120) DEFAULT NULL,
  `tiktok` varchar(120) DEFAULT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `kmp_kom` smallint(1) DEFAULT NULL,
  `kmp_persu` enum('Kurang','Baik','Sedang','Sangat Baik') DEFAULT NULL,
  `pendidikan` varchar(8) DEFAULT NULL,
  `seragam` enum('Ya','Tidak') DEFAULT NULL,
  `malam` varchar(100) DEFAULT NULL,
  `luar_kota` varchar(100) DEFAULT NULL,
  `kontrak` varchar(100) DEFAULT NULL,
  `nama_bank` varchar(100) DEFAULT NULL,
  `no_rek` varchar(22) DEFAULT NULL,
  `an_rek` varchar(50) DEFAULT NULL,
  `closeup` varchar(100) DEFAULT NULL,
  `pas_photo` varchar(100) DEFAULT NULL,
  `full_body` varchar(100) DEFAULT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `tb` int(3) DEFAULT NULL,
  `bb` int(3) DEFAULT NULL,
  `tipe_rambut` varchar(30) DEFAULT NULL,
  `uk_baju` varchar(5) DEFAULT NULL,
  `uk_sepatu` int(2) DEFAULT NULL,
  `type` set('SPG','SPB','Team Leader') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `talent`
--

INSERT INTO `talent` (`idt`, `name`, `username`, `password`, `email`, `saldo`, `no_ktp`, `ttl`, `alamat`, `phone`, `whatsapp`, `instagram`, `tiktok`, `facebook`, `kmp_kom`, `kmp_persu`, `pendidikan`, `seragam`, `malam`, `luar_kota`, `kontrak`, `nama_bank`, `no_rek`, `an_rek`, `closeup`, `pas_photo`, `full_body`, `gender`, `tb`, `bb`, `tipe_rambut`, `uk_baju`, `uk_sepatu`, `type`) VALUES
(1, 'Dini', 'talent@mail.com', '$2y$10$wO65VVaZCGGm2LXgtAzXGOPeDJ.ITzxZ6JHmzPxh.TMFERdf7tcm2', 'talent@mail.com', 10000, '7126371287412123', '2000-12-12', 'jl.utara', '082165531231', '082165531231', 'anyageraldine', 'anyageraldine', 'anyageraldine', 3, 'Sedang', 'S1', 'Ya', 'Ya', 'Ya', 'Ya', 'bni', '712467381', 'anya', 'closeup_1.jpg', 'pas_1.jpg', 'full_1.jpg', 'Wanita', 160, 55, 'pendek', 'M', 38, 'SPG,Team Leader'),
(2, 'Anya', 'talent2@mail.com', '$2y$10$muLKVBiALQ0Kg/v0shXzR.djL70jpCPnHYCWkDIzoR2kM1W4kCEgK', 'talent2@mail.com', 12000, '7126371287412123', '2000-12-12', 'jl.utara', '082165531231', '082165531231', 'anyageraldine', 'anyageraldine', 'anyageraldine', 4, 'Sangat Baik', 'SMA', 'Tidak', 'Ya', 'Ya', 'Ya', 'BRI', '712467381', 'anya', NULL, NULL, NULL, 'Wanita', 165, 50, 'panjang', 'M', 39, 'SPG,Team Leader'),
(3, 'Dona', 'dona@mail.com', '$2y$10$UfTycUN2nLZ0qwNXa/6s5uKyXwHTBoJMGaq1kMggGhIzOXK7LVbVe', 'ferry@mail.com', 10000, '7126371287412123', '2000-12-12', 'jl.utara', '082165531231', '082165531231', 'anyageraldine', 'anyageraldine', 'anyageraldine', 3, 'Baik', 'S1', 'Ya', 'Tidak', 'Tidak', 'Ya', 'BCA', '712467381', 'anya', NULL, NULL, NULL, 'Wanita', 166, 56, 'sedang', 'M', 40, 'SPG,Team Leader');

-- --------------------------------------------------------

--
-- Table structure for table `tawaran`
--

CREATE TABLE `tawaran` (
  `idtaw` int(11) NOT NULL,
  `idj` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `status` enum('pending','accept') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tawaran`
--

INSERT INTO `tawaran` (`idtaw`, `idj`, `idt`, `status`) VALUES
(1, 17, 1, 'pending'),
(2, 17, 2, 'pending'),
(3, 17, 3, 'pending'),
(4, 17, 1, 'pending'),
(5, 17, 2, 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajuan`
--
ALTER TABLE `ajuan`
  ADD PRIMARY KEY (`idaj`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idc`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`idj`);

--
-- Indexes for table `job_ongoing`
--
ALTER TABLE `job_ongoing`
  ADD PRIMARY KEY (`idjo`);

--
-- Indexes for table `job_req`
--
ALTER TABLE `job_req`
  ADD PRIMARY KEY (`idjr`);

--
-- Indexes for table `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`idn`);

--
-- Indexes for table `pengalaman`
--
ALTER TABLE `pengalaman`
  ADD PRIMARY KEY (`idpeng`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`idrp`);

--
-- Indexes for table `talent`
--
ALTER TABLE `talent`
  ADD PRIMARY KEY (`idt`);

--
-- Indexes for table `tawaran`
--
ALTER TABLE `tawaran`
  ADD PRIMARY KEY (`idtaw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajuan`
--
ALTER TABLE `ajuan`
  MODIFY `idaj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `idj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `job_ongoing`
--
ALTER TABLE `job_ongoing`
  MODIFY `idjo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_req`
--
ALTER TABLE `job_req`
  MODIFY `idjr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notif`
--
ALTER TABLE `notif`
  MODIFY `idn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengalaman`
--
ALTER TABLE `pengalaman`
  MODIFY `idpeng` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `idrp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tawaran`
--
ALTER TABLE `tawaran`
  MODIFY `idtaw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
