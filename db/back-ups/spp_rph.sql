-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 02:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_rph`
--
CREATE DATABASE IF NOT EXISTS `spp_rph` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `spp_rph`;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kod_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(225) NOT NULL,
  `id_pensyarah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kod_jabatan`, `nama_jabatan`, `id_pensyarah`) VALUES
('JB001', 'TEKNOLOGI MAKLUMAT', 'P001');

-- --------------------------------------------------------

--
-- Table structure for table `pensyarah`
--

CREATE TABLE `pensyarah` (
  `id_pensyarah` varchar(50) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `no_ic` varchar(50) NOT NULL,
  `kod_jabatan` varchar(10) NOT NULL,
  `kod_program` varchar(10) NOT NULL,
  `p_penyemak` varchar(50) NOT NULL,
  `id_penyemak` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_tel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pensyarah`
--

INSERT INTO `pensyarah` (`id_pensyarah`, `nama`, `no_ic`, `kod_jabatan`, `kod_program`, `p_penyemak`, `id_penyemak`, `email`, `no_tel`) VALUES
('P001', 'Ts. SURIYAH BINTI HASSAN', '0', 'JB001', 'IT001', '', 'PYKJ002', '@gmail.com', '0'),
('P002', 'MASTURA BINTI MD. HASSAN', '0', 'JB001', 'IT001', '', 'PYKP003', '@gmail.com', '0');

-- --------------------------------------------------------

--
-- Table structure for table `penyemak`
--

CREATE TABLE `penyemak` (
  `id_penyemak` varchar(50) NOT NULL,
  `id_pensyarah` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `encrypt_pass` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_roles` int(10) NOT NULL,
  `tarikh_daftar` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyemak`
--

INSERT INTO `penyemak` (`id_penyemak`, `id_pensyarah`, `username`, `password`, `encrypt_pass`, `email`, `id_roles`, `tarikh_daftar`) VALUES
('PYKA001', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'e.smp.rph@gmail.com', 1, '2023-08-09 13:48:18'),
('PYKJ002', 'P001', 'user1', 'user1', '', '@gmail.com', 3, '2023-08-09 14:11:34'),
('PYKP003', 'P002', 'user2', 'user2', '', '@gmail.com', 4, '2023-08-09 14:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `kod_jabatan` varchar(10) NOT NULL,
  `kod_program` varchar(10) NOT NULL,
  `nama_program` varchar(225) NOT NULL,
  `id_pensyarah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`kod_jabatan`, `kod_program`, `nama_program`, `id_pensyarah`) VALUES
('JB001', 'IT001', 'TEKNOLOGI SISTEM PENGURUSAN PANGKALAN DATA DAN APLIKASI WEB', 'P002');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(10) NOT NULL,
  `roles` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id_roles`, `roles`) VALUES
(1, 'admin'),
(2, 'pengurusan'),
(3, 'ketua_jabatan'),
(4, 'ketua_program'),
(5, 'pensyarah');

-- --------------------------------------------------------

--
-- Table structure for table `rph`
--

CREATE TABLE `rph` (
  `bil_rph` int(255) NOT NULL,
  `id_pensyarah` varchar(50) NOT NULL,
  `p_penyemak` varchar(50) NOT NULL,
  `link_rph` varchar(255) NOT NULL,
  `sesi` varchar(10) NOT NULL,
  `minggu` int(20) NOT NULL,
  `tarikh_hantar` date NOT NULL DEFAULT current_timestamp(),
  `masa_hantar` time NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kod_jabatan`);

--
-- Indexes for table `pensyarah`
--
ALTER TABLE `pensyarah`
  ADD PRIMARY KEY (`id_pensyarah`);

--
-- Indexes for table `penyemak`
--
ALTER TABLE `penyemak`
  ADD PRIMARY KEY (`id_penyemak`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`kod_program`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indexes for table `rph`
--
ALTER TABLE `rph`
  ADD PRIMARY KEY (`bil_rph`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
