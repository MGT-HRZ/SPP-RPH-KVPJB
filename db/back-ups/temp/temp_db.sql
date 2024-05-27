-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 03:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

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
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id_case` int(11) NOT NULL,
  `id_pensyarah` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tarikh_kes` date NOT NULL DEFAULT current_timestamp(),
  `uptime_post` timestamp NOT NULL DEFAULT current_timestamp(),
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id_case`, `id_pensyarah`, `kategori`, `tarikh_kes`, `uptime_post`, `post`) VALUES
(1, 62, 'Late Submission', '2024-01-29', '2024-01-28 16:17:36', 4),
(2, 62, 'Late Submission', '2024-01-29', '2024-01-29 03:14:34', 4),
(3, 75, 'Late Submission', '2024-02-22', '2024-02-22 14:44:34', 3),
(4, 75, 'Late Submission', '2024-02-22', '2024-02-22 14:44:51', 2),
(5, 75, 'Late Submission', '2024-02-22', '2024-02-22 14:45:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_noic` varchar(50) NOT NULL,
  `user_feedback` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kod_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(225) NOT NULL,
  `ketua_jabatan` int(11) NOT NULL COMMENT 'id pensyarah'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kod_jabatan`, `nama_jabatan`, `ketua_jabatan`) VALUES
('JB001', 'INFORMATION TECHNOLOGY', 70),
('JB002', 'BUSINESS', 9),
('JB003', 'GENERAL EDUCATION', 20),
('JB004', 'MANAGEMENTS', 1),
('JB005', 'OTHERS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pensyarah`
--

CREATE TABLE `pensyarah` (
  `id_pensyarah` int(11) NOT NULL,
  `nama_pensyarah` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'noic',
  `password` varchar(100) NOT NULL,
  `pass_encrypt` varchar(255) NOT NULL,
  `sesi` varchar(5) NOT NULL,
  `kod_jabatan` varchar(10) NOT NULL,
  `kod_program` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_tel` varchar(100) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `pro_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pensyarah`
--

INSERT INTO `pensyarah` (`id_pensyarah`, `nama_pensyarah`, `username`, `password`, `pass_encrypt`, `sesi`, `kod_jabatan`, `kod_program`, `email`, `no_tel`, `id_roles`, `pro_image`) VALUES
(1, 'HASFARINA BINTI ABAS', '760830016434', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB004', 'KP010', 'hasfarina@moe.edu.my ', '', 2, 'Hasfarina.png'),
(2, 'HJH ZARIMAH BINTI DARMO', '680201015658', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB004', 'KP010', 'g-58015145@moe-dl.edu.my ', '', 2, 'Zarimah.png'),
(3, 'HERLINA BINTI MOHD HARON', '710925015308', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB004', 'KP010', 'herlinaharon@gmail.com ', '', 2, 'Herlina.png'),
(4, 'NURZAIMAH BINTI AHMAD FUAD', '771016015342', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB004', 'KP010', 'zaimah5876@yahoo.com ', '', 2, 'Nurzaimah.png'),
(5, 'FAAIZUN BINTI BASO SULTAN BAKRI', '860517235532', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'g-32015068@moe-dl.edu.my ', '', 5, 'Faaizun.png'),
(6, 'NORMALIZA BINTI AHMAD', '701114015174', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP005', 'sabrina1619@yahoo.com ', '', 4, 'Normaliza.png'),
(7, 'JUHAIDA HUSNA BINTI MD. SHUKOR', '770717016634', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP007', 'juhaidamdshukor@gmail.com ', '', 4, 'Juhaida.png'),
(8, 'NORIDAH BINTI SALMO', '760922017290', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB005', 'KP011', 'abdulwahab596@gmail.com', '', 4, 'Noridah.png'),
(9, 'FARHAH BINTI JAFFAR', '760111016526', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'farhah.jaffar@moe.edu.my ', '', 3, 'Farhah.png'),
(10, 'AZIZUL ARIF BIN ZULKAFLEE', '970817335057', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP007', 'g-57519830@moe-dl.edu.my ', '', 5, 'Azizul.png'),
(11, 'FAEZA BINTI OMAR', '720704015194', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP008', 'g-94015069@moe-dl.edu.my ', '', 4, 'Faeza.png'),
(12, 'HUDA BINTI HUSSEIN', '781204016106', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP005', 'huda7477@gmail.com ', '', 5, 'HudaHussein.png'),
(13, 'JUWIESA ANAK BAYANG', '911026125846', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP008', 'juwiesabayang@yahoo.com ', '', 5, 'Juwiesa.png'),
(14, 'KARTINI BINTI HANAPI', '780226016508', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP005', 'tiniarein@gmail.com ', '', 5, 'Kartini.png'),
(15, 'KHAIRIL AZHAR BIN ROSNI', '860508236445', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP005', 'khairil.azhar@moe.edu.my ', '', 5, 'Khairil.png'),
(16, 'LILY SUHANY BT MAHMOOD', '770427037058', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB005', 'KP011', 'g-58015086@moe-dl.edu.my ', '', 5, 'Lily.png'),
(17, 'MD RAFIZ BIN RAYMOND', '910711126391', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP008', 'g-91015090@moe-dl.edu.my ', '', 5, 'Rafiz.png'),
(18, 'HJH NASITA BINTI SARBINI', '640315106498', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP006', 'g-98015099@moe-dl.edu.my ', '', 4, 'Nasita.png'),
(19, 'NOOR FARHANA BINTI FADLI', '910728035998', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP008', 'g-98015101@moe-dl.edu.my ', '', 5, 'Farhana.png'),
(20, 'NOR AZLEEN BINTI ZAINAL', '710726105554', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', '', 'nor.azleen@moe.edu.my ', '', 3, 'Azleen.png'),
(21, 'NORLIN BINTI MUSTAFA', '750203015628', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP005', 'norlinmustafa369@gmail.com ', '', 5, 'Norlin.png'),
(22, 'NUR FAZLEEN BINTI MUSLIM', '910709015078', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP009', 'leen_nutz91@yahoo.com ', '', 5, 'Fazleen.png'),
(23, 'NUR SHAFIKA BINTI MAT TALIB', '910414105308', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'g-08015115@moe-dl.edu.my', '', 5, 'Shafika.png'),
(24, 'NURUL NADIA BINTI RAMLAN', '920201016052', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB005', 'KP011', 'g-52043909@moe-dl.edu.my ', '', 5, 'Nadia.png'),
(25, 'NURUL NASRIAH BINTI ABDUL HALIM', '930316015446', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP005', 'nurulnasriah163@gmail.com ', '', 5, 'Nasriah.png'),
(26, 'PRITIPAL KAUR AULUCK', '750815125908', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP005', 'aureet@yahoo.com ', '', 5, 'Pritipal.png'),
(27, 'ROHIZA BINTI HUSAIN', '850909075102', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB005', 'KP011', 'ejahusain85@gmail.com ', '', 5, 'Rohiza.png'),
(28, 'UMMI HIDAYAH BINTI ADNAN', '850520086110', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP008', 'g-10015135@moe-dl.edu.my ', '', 5, 'Ummi.png'),
(29, 'WAN NORHAZILAH BINTI WAN MOHD ZAIN', '710303035494', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP008', 'g-94015137@moe-dl.edu.my ', '', 5, 'WanNorhazilah.png'),
(30, 'ZAIMAH BINTI ARBON', '770814015916', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP009', 'zaimah.arbon@moe.edu.my ', '', 4, 'Zaimah.png'),
(31, 'ZAIREEN IZULIN BINTI ZULKEFLEE', '850201015710', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP007', 'zaireenizulin@yahoo.com ', '', 5, 'Zaireen.png'),
(32, 'ZULAIHA BINTI RAHMAT', '910329016036', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP008', 'zulaiha.rahmat@moe.edu.my ', '', 5, 'Zulaiha.png'),
(33, 'ZARIAH BINTI ZAINUDIN', '750912015428', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP007', 'zariahzainudin75@gmail.com ', '', 5, 'Zariah.png'),
(34, 'KHAIRUNNISA BINTI KAMARULZAMAN', '890410435144', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB005', 'KP011', 'g-44015083@moe-dl.edu.my ', '', 5, 'Neesa.png'),
(35, 'NORLAILEE BINTI SARIFF', '791213015438', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB005', 'KP011', 'g-38040858@moe-dl.edu.my ', '', 5, 'Lailee.png'),
(36, 'NURRULFATIN BINTI RUSLAN', '910830015248', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB005', 'KP011', 'g-48015119@moe-dl.edu.my ', '', 5, 'Fatin.png'),
(37, 'MOHD SABREE BIN ABU BAKAR', '900221016449', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', '', 'mohd.sabree@moe.edu.my ', '', 5, 'Sabree.png'),
(38, 'AZIMY BIN MOHD BUKHARI', '770123025701', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', '', 'azimybukhari@moe.edu.my', '', 5, 'Azimy.png'),
(39, 'NORASYIKIN BINTI AZIZ', '920917015434', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP009', 'norasyikin.aziz@moe.edu.my ', '', 5, 'Norasyikin.png'),
(40, 'ANIZAH BINTI MOHD DAUD', '790126015152', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'anizah.daud@moe.edu.my', '', 5, 'Anizah.png'),
(41, 'FARISSHA BINTI ALLUWI', '910303016302', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP003', 'farissha@moe.edu.my ', '', 5, 'Farissha.png'),
(42, 'LIEW CHOI LING', '860525335584', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'g-84015084@moe-dl.edu.my ', '', 4, 'Liew.png'),
(43, 'LIM KA BOOI', '840523025410', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'lkb_mei@yahoo.com ', '', 5, 'Lim.png'),
(44, 'MUHAMMAD ASHRAFFUDIN BIN AZIZI', '960402015327', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'g-27522116@moe-dl.edu.my ', '', 5, 'Ashraff.png'),
(45, 'NOOR HAYATIE BINTI COYATI', '850108015644', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'g-44019506@moe-dl.edu.my', '', 5, 'Hayatie.png'),
(46, 'NOR ATULNADHRAH BINTI NAZDI', '860910236910', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'g-10015102@moe-dl.edu.my ', '', 4, 'Atul.png'),
(47, 'NOR SYAHIDA ERNI BINTI MOHD DESA', '910708055406', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP003', 'nor.merni@moe.edu.my', '', 5, 'Syahida.png'),
(48, 'NORHIDAYU BINTI JAIS', '841011016646', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP003', 'norhidayu.jais@moe.edu.my', '', 5, 'Norhidayu.png'),
(49, 'NUR HAZIRA BINTI ABDUL HAMID', '950901015998', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'nurhazira.abdulhamid@gmail.com ', '', 5, 'Hazira.png'),
(50, 'NUR SHAZLINA BINTI SAAT', '890804115100', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'shazlina.saat@moe.edu.my', '', 5, 'Shazlina.png'),
(51, 'NURHUDA BINTI MD TAHIR', '830430016460', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP003', 'nurhuda.tahir@moe.edu.my', '', 4, 'Nurhuda.png'),
(52, 'NURULHUDA BINTI MASRI', '920724015980', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'nurulhuda.masri@moe.edu.my', '', 5, 'Hudamasri.png'),
(53, 'SITI AZURA BINTI MANSOR', '920607015156', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'siti.azura@moe.edu.my ', '', 5, 'Azura.png'),
(54, 'SITI MASITA BINTI ABDULLAH', '901007015570', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'siti.masita@moe.edu.my', '', 5, 'Masita.png'),
(55, 'SITI NOR HAZIRAH BINTI ZAINUDIN', '910811035892', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'nor.hazirah@moe.edu.my', '', 5, 'Hazirah.png'),
(56, 'SITI NORSHAHIRA BINTI SAEMAN', '910509016746', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP003', 'siti.norshahira@moe.edu.my', '', 5, 'Shahira.png'),
(57, 'USHADEVI A/P VASU', '851126016450', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP004', 'ushadevikvpjb@gmail.com', '', 5, 'Usha.png'),
(58, 'WAN SUHAIDA BINTI WAN NORDIN', '821216035658', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB002', 'KP002', 'g-94015137@moe-dl.edu.my', '', 5, 'WanSuhaida.png'),
(59, 'ZULFAH HANIS BINTI MD SADAKAH', '920623015762', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP007', 'g-62015147@moe-dl.edu.my', '', 5, 'Zulfah.png'),
(60, 'JESLINDA A/P SELVARAJU', '911217015068', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'jeslinda1712@gmail.com ', '', 5, 'Jeslinda.png'),
(61, 'MASTURA BINTI MD. HASSAN', '820409045102', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'g-02015089@moe-dl.edu.my ', '', 4, 'Mastura.png'),
(62, 'Ts. MOHAMAD NOOR FAHMI RUZAINI BIN MD YUSOFF', '910329086093', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'g-93248405@moe-dl.edu.my ', '', 5, 'Fahmi.png'),
(63, 'MOHD HAFIZ BIN MUSTAFA', '830118015033', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'g-33015092@moe-dl.edu.my ', '', 5, 'Hafiz.png'),
(64, 'MUHAMMAD AMEEN BIN ATAN', '830610015051', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'g-51015095@moe-dl.edu.my ', '', 5, 'Ameen.png'),
(65, 'MUHAMMAD TAQIYUDDIN BIN DZULKRINAIN', '910525015487', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'g-87015096@moe-dl.edu.my', '', 5, 'Taqi.png'),
(66, 'NUR SYAFIQAH BINTI HASHIM', '910430016276', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'syafiqah.hashim@moe.edu.my', '', 5, 'Syafiqah.png'),
(67, 'NURUL SYAZA BINTI ROSLI', '930110015942', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'nurul.syaza@moe.edu.my ', '', 5, 'Syaza.png'),
(68, 'NURUL SYUHADA BINTI MAZLINA', '910814115548', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'nurul.syuhada@moe.edu.my', '', 5, 'Syuhada.png'),
(69, 'SITI ZULAIKHA BINTI ADNAN', '911105146290', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'g-90015133@moe-dl.edu.my ', '', 5, 'Zulaikha.png'),
(70, 'Ts. SURIYAH BINTI HASSAN', '810218015358', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'g-58015134@moe-dl.edu.my  ', '', 3, 'Suriyah.png'),
(71, 'YUSSALINA BINTI MOHD YUSOP', '860310595418', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'yussalina.yusop@moe.edu.my', '', 5, 'Yussalina.png'),
(72, 'NOR\'ASIKIN BINTI ABU BAKAR', '891015095156', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'asikin.bakar@moe.edu.my', '', 5, 'Nor\'Asikin.png'),
(73, 'NAJIHA BINTI HUSSEIN', '831110015228', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB001', 'KP001', 'najiha.hussein@moe.edu.my', '', 5, 'Najiha.png'),
(74, 'NORAZITA MOHD NOR', '721126035568', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', 'JB003', 'KP009', 'zet_72@yahoo.com', '', 5, 'Azita.png'),
(75, 'DEMO', '123', '123', 'd9b1d7db4cd6e70935368a1efb10e377', '', '', '', '', '', 5, 'default.png'),
(76, 'SPP-RPH ADMIN', 'admin', 'meimlu@123', '61a488e40626782456eed76667eeacf3', '', '', '', 'meimluonline@gmail.com', '', 1, 'default.png'),
(77, 'NOT AVAILABLE', '0', 'null', 'c74ff0db2bdeafffb9a70ea25da443d6', 'null', '0', '0', '0', '0', 0, 'default.png'),
(78, 'SPP-RPH SEC-ADMIN', 'admin2', 'admin@123', 'b86a2be1ce700c9c87800e81688e6e07', '', '', '', '', '', 1, 'default.png'),
(79, 'IMAN NULHAKIM', '040304012555', 'password', '696d29e0940a4957748fe3fc9efd22a3', 'SVM', 'JB001', 'KP001', 'baeng@gmail.com', '68127368137', 5, 'default.png'),
(80, 'EIRFAN', '24242323424', 'password', '696d29e0940a4957748fe3fc9efd22a3', 'SVM', 'JB002', 'KP002', 'eirfan@gmail.com', '829379284', 5, 'e-RPH Traker Logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `penyemak`
--

CREATE TABLE `penyemak` (
  `id_penyemak` int(11) NOT NULL,
  `pensyarah` int(11) NOT NULL COMMENT 'id pensyarah',
  `penyemak` int(11) NOT NULL COMMENT 'id pensyarah'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyemak`
--

INSERT INTO `penyemak` (`id_penyemak`, `pensyarah`, `penyemak`) VALUES
(1, 1, 77),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 42),
(6, 6, 2),
(7, 7, 20),
(8, 8, 2),
(9, 9, 2),
(10, 10, 7),
(11, 11, 4),
(12, 12, 6),
(13, 13, 11),
(14, 14, 6),
(15, 15, 6),
(16, 16, 8),
(17, 17, 11),
(18, 18, 2),
(19, 19, 11),
(20, 20, 2),
(21, 21, 6),
(22, 22, 30),
(23, 23, 46),
(24, 24, 4),
(25, 25, 6),
(26, 26, 6),
(27, 27, 8),
(28, 28, 11),
(29, 29, 11),
(30, 30, 4),
(31, 31, 7),
(32, 32, 11),
(33, 33, 7),
(34, 34, 3),
(35, 35, 3),
(36, 36, 3),
(37, 37, 20),
(38, 38, 20),
(39, 39, 30),
(40, 40, 42),
(41, 41, 51),
(42, 42, 9),
(43, 43, 42),
(44, 44, 42),
(45, 45, 46),
(46, 46, 9),
(47, 47, 51),
(48, 48, 51),
(49, 49, 46),
(50, 50, 9),
(51, 51, 9),
(52, 52, 46),
(53, 53, 46),
(54, 54, 46),
(55, 55, 9),
(56, 56, 51),
(57, 57, 46),
(58, 58, 9),
(59, 59, 7),
(60, 60, 70),
(61, 61, 70),
(62, 62, 61),
(63, 63, 70),
(64, 64, 70),
(65, 65, 61),
(66, 66, 61),
(67, 67, 70),
(68, 68, 61),
(69, 69, 70),
(70, 70, 2),
(71, 71, 61),
(72, 72, 70),
(73, 73, 61),
(74, 74, 30),
(75, 75, 76),
(76, 76, 77),
(77, 79, 70);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `kod_jabatan` varchar(10) NOT NULL,
  `kod_program` varchar(10) NOT NULL,
  `nama_program` varchar(225) NOT NULL,
  `id_pensyarah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`kod_jabatan`, `kod_program`, `nama_program`, `id_pensyarah`) VALUES
('JB001', 'KP001', 'DATABASE MANAGEMENT SYSTEM TECHNOLOGY AND WEB APPLICATIONS', 61),
('JB002', 'KP002', 'BUSINESS MANAGEMENT', 42),
('JB002', 'KP003', 'ACCOUNTING', 51),
('JB002', 'KP004', 'ADMINISTRATIVE SECRETARIAT', 46),
('JB003', 'KP005', 'LANGUAGE UNIT', 6),
('JB003', 'KP006', 'TECHNICAL FIELD', 18),
('JB003', 'KP007', 'HUMANITY UNIT', 7),
('JB003', 'KP008', 'MATHEMATICS AND SCIENCE UNIT', 11),
('JB003', 'KP009', 'COMMON CORE UNIT', 30),
('JB004', 'KP010', 'THE MANAGEMENT', 2),
('JB005', 'KP011', 'OTHERS', 2);

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
(1, 'ADMIN'),
(2, 'MANAGEMENT'),
(3, 'HEAD DEPARTMENT'),
(4, 'HEAD PROGRAM'),
(5, 'LECTURER');

-- --------------------------------------------------------

--
-- Table structure for table `rph`
--

CREATE TABLE `rph` (
  `id_rph` int(11) NOT NULL,
  `id_pensyarah` int(11) NOT NULL,
  `id_penyemak` int(11) NOT NULL,
  `link_rph` varchar(255) NOT NULL,
  `sesi` varchar(10) NOT NULL,
  `tahun` int(20) NOT NULL,
  `minggu` varchar(20) NOT NULL,
  `tarikh_hantar` date NOT NULL DEFAULT current_timestamp(),
  `masa_hantar` time NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rph`
--

INSERT INTO `rph` (`id_rph`, `id_pensyarah`, `id_penyemak`, `link_rph`, `sesi`, `tahun`, `minggu`, `tarikh_hantar`, `masa_hantar`, `status`, `comment`) VALUES
(1, 75, 76, 'TIADA', 'sesi', 2024, 'SVM WEEK 1', '2024-01-28', '00:00:00', 'TIDAK HANTAR', 'test saya'),
(2, 62, 70, 'ksdjhksh', 'sesi', 2024, 'SVM WEEK 1', '2024-01-28', '00:00:00', 'HANTAR', 'hello'),
(3, 75, 76, 'TIADA', 'Session 1', 2024, 'DIPLOMA WEEK 10', '2024-01-29', '00:25:25', 'TIDAK HANTAR', ''),
(4, 75, 76, 'https://getbootstrap.com/', 'Session 1', 2024, 'DIPLOMA WEEK 10', '2024-01-29', '00:25:29', 'HANTAR', ''),
(5, 75, 76, 'https://getbootstrap.com/', 'Session 2', 2023, 'DIPLOMA WEEK 3', '2024-01-29', '00:29:30', 'HANTAR', ''),
(6, 75, 76, 'https://lsdoisd.com', 'Session 2', 2012, 'SVM WEEK 15', '2024-01-29', '00:31:34', 'HANTAR', 'testing 123'),
(7, 72, 70, 'TIADA', 'Session 1', 2024, 'SVM WEEK 1', '2024-01-29', '08:34:19', 'TIDAK HANTAR', 'No Submittion'),
(8, 76, 77, 'http://localhost:3000/penyemak/php/dashboard.php?NOTSEND-SUCCESS', 'Session 1', 2007, 'SVM WEEK 30', '2024-01-29', '08:54:47', 'HANTAR', 'Submitted'),
(9, 76, 77, 'localhost:3000/penyemak/php/dashboard.php?ADD-SUCCESS', 'Session 1', 2007, 'SVM WEEK 5', '2024-01-29', '09:11:47', 'HANTAR', ''),
(10, 62, 61, 'TIADA', 'Session 1', 2024, 'DIPLOMA WEEK 1', '2024-01-29', '09:13:39', 'TIDAK HANTAR', 'yup to late'),
(11, 75, 76, 'localhost:3000/pensyarah/php/dashboard.php', 'Session 2', 2022, 'SVM WEEK 18', '2024-01-29', '09:16:31', 'HANTAR', 'hello'),
(12, 75, 76, 'TIADA', 'Session 1', 2024, 'SVM WEEK 8', '2024-02-06', '09:30:30', 'TIDAK HANTAR', 'Test'),
(13, 45, 46, 'TIADA', 'Session 1', 2024, 'SVM WEEK 1', '2024-02-07', '10:09:54', 'TIDAK HANTAR', 'test'),
(14, 49, 46, 'TIADA', 'Session 1', 2024, 'DIPLOMA WEEK 1', '2024-02-06', '10:10:32', 'TIDAK HANTAR', 'test'),
(15, 75, 76, 'TIADA', 'Session 1', 2023, 'SVM WEEK 1', '2024-02-06', '23:07:50', 'TIDAK HANTAR', 'just a test'),
(16, 75, 76, 'TIADA', '', 0, '', '2024-02-09', '11:41:15', 'TIDAK HANTAR', ''),
(17, 75, 76, 'TIADA', '', 0, '', '2024-02-09', '11:50:48', 'TIDAK HANTAR', ''),
(18, 75, 76, 'TIADA', '', 0, '', '2024-02-09', '12:02:56', 'TIDAK HANTAR', ''),
(19, 75, 76, 'TIADA', '', 0, '', '2024-02-09', '12:02:56', 'TIDAK HANTAR', ''),
(20, 75, 76, 'TIADA', '', 0, '', '2024-02-09', '12:02:56', 'TIDAK HANTAR', ''),
(21, 75, 76, 'TIADA', '', 0, '', '2024-02-09', '12:02:56', 'TIDAK HANTAR', ''),
(22, 75, 76, 'TIADA', '', 0, '', '2024-02-09', '12:05:22', 'TIDAK HANTAR', ''),
(23, 75, 76, 'https://www.youtube.com/', 'Session 1', 2024, 'SVM WEEK 10', '2024-02-09', '12:12:02', 'HANTAR', ''),
(24, 75, 76, 'https://www.youtube.com/', 'Session 1', 2023, 'SVM WEEK 15', '2024-02-09', '12:14:35', 'HANTAR', ''),
(25, 75, 76, 'https://www.youtube.com/', 'Session 1', 2023, 'SVM WEEK 16', '2024-02-09', '12:15:41', 'HANTAR', ''),
(26, 75, 76, 'https://spp-rph.meimlu.site', 'Session 2', 2020, 'SVM WEEK 18', '2024-02-09', '12:18:45', 'HANTAR', ''),
(27, 75, 76, 'TIADA', '', 0, '', '2024-02-13', '23:52:08', 'TIDAK HANTAR', ''),
(28, 70, 2, 'TIADA', 'Session 1', 2024, 'DIPLOMA WEEK 13', '2024-02-21', '00:54:54', 'TIDAK HANTAR', 'late send'),
(29, 70, 2, 'https://www.youtube.com/', 'Session 1', 2024, 'DIPLOMA WEEK 13', '2024-02-21', '00:54:54', 'HANTAR', 'late send'),
(30, 75, 76, 'https://fontawesome.com/docs/web/style/size', 'Session 1', 2024, 'SVM WEEK 1', '2024-02-23', '00:44:04', 'HANTAR', ''),
(31, 76, 77, 'TIADA', '', 0, '', '2024-02-09', '12:05:22', 'TIDAK HANTAR', 'test'),
(32, 76, 77, 'TIADA', '', 0, '', '2024-02-05', '12:05:22', 'TIDAK HANTAR', 'late subsa shdkak ahdjaks djkas'),
(33, 61, 70, 'TIADA', 'Session 2', 2024, 'DIPLOMA WEEK 13', '2024-02-28', '23:37:07', 'TIDAK HANTAR', 'have an issue\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id_case`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`);

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
  ADD PRIMARY KEY (`id_penyemak`),
  ADD UNIQUE KEY `pensyarah` (`pensyarah`);

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
  ADD PRIMARY KEY (`id_rph`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id_case` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pensyarah`
--
ALTER TABLE `pensyarah`
  MODIFY `id_pensyarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `penyemak`
--
ALTER TABLE `penyemak`
  MODIFY `id_penyemak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `rph`
--
ALTER TABLE `rph`
  MODIFY `id_rph` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
