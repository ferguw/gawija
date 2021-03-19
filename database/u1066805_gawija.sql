-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: bestcommunity.info
-- Generation Time: Mar 18, 2021 at 05:08 AM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1066805_gawija`
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
(1, 5, 4),
(2, 5, 1);

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
(9, 'kiky', 'kiky7.yxz@gmail', '$2y$10$8agJMLd0EZA80lDZ2aag5.5SBZTQRvDx1r06O4b2IBEcwkw6e.gyq', 'kiky7.yxz@gmail', NULL, NULL),
(10, 'Daffa Ram Herriza', 'daffaramherriza2412@gmail.com', '$2y$10$Ivq83LK2/nDx6f18.z2r9.tKoqTLlTb9Gk3SFktGKAw0ZcK/ZQAh.', 'daffaramherriza2412@gmail.com', NULL, NULL);

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
(1, 1, 'PT.Yamaha', 'Event Pameran Motor', 'Event ini ditunjukan kepada kamu yang memiliki karya modifikasi motor klasik dan non-klasik', '2021-01-27', '0000-00-00', 'Jl. Pramuka No. 18', 'Banjarmasin', '4', '4000000', '400000', '4600000', '200000', 'ongoing'),
(2, 1, 'PT.Yamaha', 'Event Pameran Mobil', 'Event ini ditunjukan kepada kamu yang memiliki karya modifikasi Mobil klasik dan non-klasik', '2021-01-29', '0000-00-00', 'Jl. Pramuka No. 19', 'Banjarbaru', '2', '1240000', '124000', '1426000', '62000', 'pending'),
(3, 1, 'PT.Yamaha', 'Event Pameran Kapal', 'Event ini ditunjukan kepada kamu yang memiliki karya modifikasi Kapal klasik dan non-klasik', '2021-01-28', '0000-00-00', 'Jl. Pramuka No. 20', 'Barito Kuala', '3', '2970000', '297000', '3415500', '148500', 'pending'),
(4, 1, 'PT.Yamaha', 'Home Band Festival', 'Festival para musisi jalanan', '2021-01-27', '0000-00-00', 'Jl. Transkalimantan komp. Ridho Lestari no.20', 'Barito Kuala', '2', '2320000', '232000', '2668000', '116000', 'pending'),
(5, 10, 'PT.Yamaha', 'Festival Home Band', 'Tempat berkumpulnya para musisi Banjarmasin', '2021-01-28', '0000-00-00', 'Jl. Sultan Adam', 'Banjarmasin', '3', '1200000', '120000', '1380000', '60000', 'accept');

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
(1, 1, 1);

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
(1, '1', '2', '500000', 'SPG'),
(2, '2', '3', '120000', 'SPG'),
(3, '2', '2', '130000', 'SPB'),
(4, '3', '3', '130000', 'SPB'),
(5, '3', '5', '120000', 'SPG'),
(6, '4', '3', '50000', 'SPG'),
(7, '4', '1', '10000', 'SPB'),
(8, '4', '10', '100000', 'SPG'),
(9, '5', '2', '150000', 'SPG'),
(10, '5', '1', '100000', 'SPB');

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
(1, 1, 1, '2021-01-27', 'report Pertama', '1-1-1807-270121.jpeg');

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
  `tpt_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(120) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `whatsapp` varchar(12) DEFAULT NULL,
  `instagram` varchar(120) DEFAULT NULL,
  `tiktok` varchar(120) DEFAULT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `kmp_kom` smallint(1) DEFAULT NULL,
  `kmp_persu` enum('Kurang','Baik','Sedang','Sangat Baik') DEFAULT NULL,
  `pendidikan` varchar(8) DEFAULT NULL,
  `sts_pendidikan` varchar(10) DEFAULT NULL,
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

INSERT INTO `talent` (`idt`, `name`, `username`, `password`, `email`, `saldo`, `no_ktp`, `tpt_lahir`, `tgl_lahir`, `alamat`, `phone`, `whatsapp`, `instagram`, `tiktok`, `facebook`, `kmp_kom`, `kmp_persu`, `pendidikan`, `sts_pendidikan`, `seragam`, `malam`, `luar_kota`, `kontrak`, `nama_bank`, `no_rek`, `an_rek`, `closeup`, `pas_photo`, `full_body`, `gender`, `tb`, `bb`, `tipe_rambut`, `uk_baju`, `uk_sepatu`, `type`) VALUES
(1, 'Siti Dono', 'talent@mail.com', '$2y$10$wO65VVaZCGGm2LXgtAzXGOPeDJ.ITzxZ6JHmzPxh.TMFERdf7tcm2', 'talent@mail.com', 10000, '7126371287412123', 'Banjarmasin', '2001-02-06', 'jl.utara', '082165531231', '082165531231', 'anyageraldine', 'anyageraldine', 'anyageraldine', 3, 'Kurang', 'S1', 'Aktif', 'Ya', 'Ya', 'Ya', 'Ya', 'bni', '712467381', 'anya', 'closeup-1-2243-250221.jpg', 'pasfoto-1-2243-250221.jpg', 'fullbody-1-2243-250221.png', 'Wanita', 160, 55, 'Panjang', 'M', 38, 'SPG,Team Leader'),
(2, 'Anya', 'talent2@mail.com', '$2y$10$muLKVBiALQ0Kg/v0shXzR.djL70jpCPnHYCWkDIzoR2kM1W4kCEgK', 'talent2@mail.com', 12000, '7126371287412123', '', '2000-12-12', 'jl.utara', '082165531231', '082165531231', 'anyageraldine', 'anyageraldine', 'anyageraldine', 4, 'Sangat Baik', 'SMA', NULL, 'Tidak', 'Ya', 'Ya', 'Ya', 'BRI', '712467381', 'anya', NULL, NULL, NULL, 'Wanita', 165, 50, 'panjang', 'M', 39, 'SPG,Team Leader'),
(3, 'Dona', 'dona@mail.com', '$2y$10$UfTycUN2nLZ0qwNXa/6s5uKyXwHTBoJMGaq1kMggGhIzOXK7LVbVe', 'ferry@mail.com', 10000, '7126371287412123', '', '2000-12-12', 'jl.utara', '082165531231', '082165531231', 'anyageraldine', 'anyageraldine', 'anyageraldine', 3, 'Baik', 'S1', NULL, 'Ya', 'Tidak', 'Tidak', 'Ya', 'BCA', '712467381', 'anya', NULL, NULL, NULL, 'Wanita', 166, 56, 'sedang', 'M', 40, 'SPG,Team Leader'),
(4, 'Yakup', 'yakub@gmail.com', '$2y$10$aWmdtajzStEeILvHzMkUZujxN1N2gDubhD7EHNwSGGmr7rVOmNx7G', 'yakub@gmail.com', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'Daffa Ram Herriza', 'daffaramherriza2412@gmail.com', '$2y$10$vW80ei/dTBj5lP7GN5qWyOaAe.rG/Qit8TD7VebQuGkOvRq79nEmC', 'daffaramherriza2412@gmail.com', NULL, '6304052412990003', 'Banjarmasin', '1999-12-24', 'Handil bakti', '085822601798', '085822601798', 'Daffarams_', '', '', 5, 'Sangat Baik', 'SMA', 'Aktif', 'Ya', 'Ya', 'Ya', 'Ya', 'BCA', '0510950208', 'Daffa Ram Herriza', 'closeup-5-1100-010321.jpg', 'pasfoto-5-1100-010321.jpg', 'fullbody-5-1100-010321.jpg', 'Pria', 159, 70, 'Sedang', 'M', 40, '');

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
(1, 1, 1, 'accept');

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
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `idj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_ongoing`
--
ALTER TABLE `job_ongoing`
  MODIFY `idjo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_req`
--
ALTER TABLE `job_req`
  MODIFY `idjr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `idrp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `talent`
--
ALTER TABLE `talent`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tawaran`
--
ALTER TABLE `tawaran`
  MODIFY `idtaw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
