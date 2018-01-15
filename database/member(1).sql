-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 08:02 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creocoin.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `pass` varchar(200) NOT NULL DEFAULT '',
  `nama` varchar(200) NOT NULL,
  `sponsor` varchar(100) NOT NULL DEFAULT '',
  `upline` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `alamat` varchar(100) NOT NULL DEFAULT '',
  `kota` varchar(100) NOT NULL DEFAULT '',
  `propinsi` varchar(100) NOT NULL DEFAULT '',
  `kodepos` varchar(100) NOT NULL DEFAULT '',
  `hp` varchar(25) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `bank` varchar(255) NOT NULL DEFAULT '',
  `ipaddress` varchar(50) NOT NULL DEFAULT '',
  `foto` varchar(150) NOT NULL,
  `adminrp` varchar(100) NOT NULL DEFAULT '',
  `tgl` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tglaktif` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `paket` varchar(100) NOT NULL DEFAULT '',
  `harga` varchar(10) NOT NULL DEFAULT '',
  `blokir` varchar(5) NOT NULL DEFAULT '',
  `status` char(1) NOT NULL DEFAULT '',
  `id_aktivasi` int(10) NOT NULL,
  `batas` varchar(50) NOT NULL,
  `kodeblokir` varchar(50) NOT NULL,
  `tglblokir` date NOT NULL DEFAULT '0000-00-00',
  `negara` varchar(200) NOT NULL,
  `regid` varchar(100) NOT NULL,
  `mngr` varchar(200) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `stage` varchar(255) NOT NULL,
  `quota` varchar(255) NOT NULL,
  `sto` int(1) NOT NULL,
  `bnkcek` varchar(255) NOT NULL,
  `accid` varchar(50) NOT NULL,
  `act` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `pass`, `nama`, `sponsor`, `upline`, `email`, `alamat`, `kota`, `propinsi`, `kodepos`, `hp`, `phone`, `bank`, `ipaddress`, `foto`, `adminrp`, `tgl`, `tglaktif`, `paket`, `harga`, `blokir`, `status`, `id_aktivasi`, `batas`, `kodeblokir`, `tglblokir`, `negara`, `regid`, `mngr`, `kode`, `stage`, `quota`, `sto`, `bnkcek`, `accid`, `act`) VALUES
(352, 'surya85', 'de1384c0088230360051816606d34876', 'surya', 'riseconnect', 'demo1', 'binaryqu85@gmail.com', '', '', '', '', '+1 423-423-423', '', '', '125.162.33.152', '', '', '2017-12-13 17:57:01', '2017-12-13 17:57:02', '1', '', '0', '1', 12, '0', '', '0000-00-00', '', 'F6576112', 'riseconnect', 'T2617041W732', '', '', 0, '', '8d624e44274e249aff8f741e2b9f2308', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
