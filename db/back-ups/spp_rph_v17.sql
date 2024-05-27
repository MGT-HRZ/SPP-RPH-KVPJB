-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2023 at 04:48 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `pass_encrypt` varchar(255) NOT NULL,
  `tarikh_kemaskini` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `pass_encrypt`, `tarikh_kemaskini`) VALUES
('ADM01', 'admin', 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '2023-11-07 14:38:51');

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
('JB001', 'TEKNOLOGI MAKLUMAT', 0);

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
  `pro_image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pensyarah`
--

INSERT INTO `pensyarah` (`id_pensyarah`, `nama_pensyarah`, `username`, `password`, `pass_encrypt`, `sesi`, `kod_jabatan`, `kod_program`, `email`, `no_tel`, `id_roles`, `pro_image`) VALUES
(1, 'HASFARINA BINTI ABAS', '760830016434', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'hasfarina@moe.edu.my ', '', 2, 'Hasfarina.png\n'),
(2, 'ZARIMAH BINTI DARMO', '680201015658', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-58015145@moe-dl.edu.my ', '', 2, 'Zarimah.png'),
(3, 'HERLINA BINTI MOHD HARON', '710925015308', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'herlinaharon@gmail.com ', '', 2, 'Herlina.png'),
(4, 'NURZAIMAH BINTI AHMAD FUAD', '771016015342', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'zaimah5876@yahoo.com ', '', 2, 'Nurzaimah.png'),
(5, 'FAAIZUN BINTI BASO SULTAN BAKRI', '860517235532', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-32015068@moe-dl.edu.my ', '', 5, 'Faaizun.png'),
(6, 'NORMALIZA BINTI AHMAD', '701114015174', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'sabrina1619@yahoo.com ', '', 4, 'Normaliza.png'),
(7, 'JUHAIDA HUSNA BINTI MD. SHUKOR', '770717016634', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'juhaidamdshukor@gmail.com ', '', 4, 'Juhaida.png'),
(8, 'NORIDAH BINTI SALMO', '760922017290', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'abdulwahab596@gmail.com', '', 4, 'Noridah.png'),
(9, 'FARHAH BINTI JAFFAR', '760111016526', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'farhah.jaffar@moe.edu.my ', '', 3, 'Farhah.png'),
(10, 'AZIZUL ARIF BIN ZULKAFLEE', '970817335057', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-57519830@moe-dl.edu.my ', '', 5, 'Azizul.png\n'),
(11, 'FAEZA BINTI OMAR', '720704015194', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-94015069@moe-dl.edu.my ', '', 4, 'Faeza.png'),
(12, 'HUDA BINTI HUSSEIN', '781204016106', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'huda7477@gmail.com ', '', 5, 'HudaHussein.png'),
(13, 'JUWIESA ANAK BAYANG', '911026125846', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'juwiesabayang@yahoo.com ', '', 5, 'Juwiesa.png'),
(14, 'KARTINI BINTI HANAPI', '780226016508', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'tiniarein@gmail.com ', '', 5, 'Kartini.png'),
(15, 'KHAIRIL AZHAR BIN ROSNI', '860508236445', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'khairil.azhar@moe.edu.my ', '', 5, 'Khairil.png'),
(16, 'LILY SUHANY BT MAHMOOD', '770427037058', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-58015086@moe-dl.edu.my ', '', 5, 'Lily.png'),
(17, 'MD RAFIZ BIN RAYMOND', '910711126391', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-91015090@moe-dl.edu.my ', '', 5, 'Rafiz.png'),
(18, 'NASITA BINTI SARBINI', '640315106498', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-98015099@moe-dl.edu.my ', '', 4, 'Nasita.png'),
(19, 'NOOR FARHANA BINTI FADLI', '910728035998', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-98015101@moe-dl.edu.my ', '', 5, 'Farhana.png'),
(20, 'NOR AZLEEN BINTI ZAINAL', '710726105554', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nor.azleen@moe.edu.my ', '', 3, 'Azleen.png'),
(21, 'NORLIN BINTI MUSTAFA', '750203015628', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'norlinmustafa369@gmail.com ', '', 5, 'Norlin.png'),
(22, 'NUR FAZLEEN BINTI MUSLIM', '910709015078', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'leen_nutz91@yahoo.com ', '', 5, 'Fazleen.png'),
(23, 'NUR SHAFIKA BINTI MAT TALIB', '910414105308', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-08015115@moe-dl.edu.my', '', 5, 'Shafika.png'),
(24, 'NURUL NADIA BINTI RAMLAN', '920201016052', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-52043909@moe-dl.edu.my ', '', 5, 'Nadia.png\n'),
(25, 'NURUL NASRIAH BINTI ABDUL HALIM', '930316015446', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nurulnasriah163@gmail.com ', '', 5, 'Nasriah.png'),
(26, 'PRITIPAL KAUR AULUCK', '750815125908', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'aureet@yahoo.com ', '', 5, 'Pritipal.png'),
(27, 'ROHIZA BINTI HUSAIN', '850909075102', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'ejahusain85@gmail.com ', '', 5, 'Rohiza.png'),
(28, 'UMMI HIDAYAH BINTI ADNAN', '850520086110', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-10015135@moe-dl.edu.my ', '', 5, 'Ummi.png'),
(29, 'WAN NORHAZILAH BINTI WAN MOHD ZAIN', '710303035494', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-94015137@moe-dl.edu.my ', '', 4, 'WanNorhazilah.png'),
(30, 'ZAIMAH BINTI ARBON', '770814015916', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'zaimah.arbon@moe.edu.my ', '', 5, 'Zaimah.png'),
(31, 'ZAIREEN IZULIN BINTI ZULKEFLEE', '850201015710', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'zaireenizulin@yahoo.com ', '', 5, 'Zaireen.png'),
(32, 'ZULAIHA BINTI RAHMAT', '910329016036', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'zulaiha.rahmat@moe.edu.my ', '', 5, 'Zulaiha.png'),
(33, 'ZARIAH BINTI ZAINUDIN', '750912015428', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'zariahzainudin75@gmail.com ', '', 5, 'Zariah.png'),
(34, 'KHAIRUNNISA BINTI KAMARULZAMAN', '890410435144', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-44015083@moe-dl.edu.my ', '', 5, 'Neesa.png'),
(35, 'NORLAILEE BINTI SARIFF', '791213015438', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-38040858@moe-dl.edu.my ', '', 5, 'Lailee.png'),
(36, 'NURRULFATIN BINTI RUSLAN', '910830015248', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-48015119@moe-dl.edu.my ', '', 5, 'Fatin.png'),
(37, 'MOHD SABREE BIN ABU BAKAR', '900221016449', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'mohd.sabree@moe.edu.my ', '', 5, 'Sabree.png'),
(38, 'AZIMY BIN MOHD BUKHARI', '770123025701', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'azimybukhari@moe.edu.my', '', 5, 'Azimy.png'),
(39, 'NORASYIKIN BINTI AZIZ', '920917015434', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'norasyikin.aziz@moe.edu.my ', '', 5, 'Norasyikin.png'),
(40, 'ANIZAH BINTI MOHD DAUD', '790126015152', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'anizah.daud@moe.edu.my', '', 5, 'Anizah.png'),
(41, 'FARISSHA BINTI ALLUWI', '910303016302', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'farissha@moe.edu.my ', '', 5, 'Farissha.png'),
(42, 'LIEW CHOI LING', '860525335584', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-84015084@moe-dl.edu.my ', '', 4, 'Liew.png'),
(43, 'LIM KA BOOI', '840523025410', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'lkb_mei@yahoo.com ', '', 5, 'Lim.png'),
(44, 'MUHAMMAD ASHRAFFUDIN BIN AZIZI', '960402015327', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-27522116@moe-dl.edu.my ', '', 5, 'Ashraff.png\n'),
(45, 'NOOR HAYATIE BINTI COYATI', '850108015644', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-44019506@moe-dl.edu.my', '', 5, 'Hayatie.png'),
(46, 'NOR ATULNADHRAH BINTI NAZDI', '860910236910', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-10015102@moe-dl.edu.my ', '', 4, 'Atul.png'),
(47, 'NOR SYAHIDA ERNI BINTI MOHD DESA', '910708055406', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nor.merni@moe.edu.my', '', 5, 'Syahida.png'),
(48, 'NORHIDAYU BINTI JAIS', '841011016646', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'norhidayu.jais@moe.edu.my', '', 5, 'Norhidayu.png'),
(49, 'NUR HAZIRA BINTI ABDUL HAMID', '950901015998', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nurhazira.abdulhamid@gmail.com ', '', 5, 'Hazira.png'),
(50, 'NUR SHAZLINA BINTI SAAT', '890804115100', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'shazlina.saat@moe.edu.my', '', 5, 'Shazlina.png'),
(51, 'NURHUDA BINTI MD TAHIR', '830430016460', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nurhuda.tahir@moe.edu.my', '', 5, 'Nurhuda.png'),
(52, 'NURULHUDA BINTI MASRI', '920724015980', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nurulhuda.masri@moe.edu.my', '', 5, 'Hudamasri.png'),
(53, 'SITI AZURA BINTI MANSOR', '920607015156', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'siti.azura@moe.edu.my ', '', 5, 'Azura.png'),
(54, 'SITI MASITA BINTI ABDULLAH', '901007015570', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'siti.masita@moe.edu.my', '', 5, 'Masita.png'),
(55, 'SITI NOR HAZIRAH BINTI ZAINUDIN', '910811035892', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nor.hazirah@moe.edu.my', '', 5, 'Hazirah.png'),
(56, 'SITI NORSHAHIRA BINTI SAEMAN', '910509016746', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'siti.norshahira@moe.edu.my', '', 5, 'Shahira.png'),
(57, 'USHADEVI A/P VASU', '851126016450', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'ushadevikvpjb@gmail.com', '', 5, 'Usha.png'),
(58, 'WAN SUHAIDA BINTI WAN NORDIN', '821216035658', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-94015137@moe-dl.edu.my', '', 5, 'WanSuhaida.png'),
(59, 'ZULFAH HANIS BINTI MD SADAKAH', '920623015762', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-62015147@moe-dl.edu.my', '', 5, 'Zulfah.png'),
(60, 'JESLINDA A/P SELVARAJU', '911217015068', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'jeslinda1712@gmail.com ', '', 5, 'Jeslinda.png'),
(61, 'MASTURA BINTI MD. HASSAN', '820409045102', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-02015089@moe-dl.edu.my ', '', 4, 'Mastura.png'),
(62, 'Ts. MOHAMAD NOOR FAHMI RUZAINI BIN MD YUSOFF', '910329086093', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-93248405@moe-dl.edu.my ', '', 5, 'Fahmi.png'),
(63, 'MOHD HAFIZ BIN MUSTAFA', '830118015033', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-33015092@moe-dl.edu.my ', '', 5, 'Hafiz.png'),
(64, 'MUHAMMAD AMEEN BIN ATAN', '830610015051', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-51015095@moe-dl.edu.my ', '', 5, 'Ameen.png'),
(65, 'MUHAMMAD TAQIYUDDIN BIN DZULKRINAIN', '910525015487', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-87015096@moe-dl.edu.my', '', 5, 'Taqi.png'),
(66, 'NUR SYAFIQAH BINTI HASHIM', '910430016276', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'syafiqah.hashim@moe.edu.my', '', 5, 'Syafiqah.png'),
(67, 'NURUL SYAZA BINTI ROSLI', '930110015942', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nurul.syaza@moe.edu.my ', '', 5, 'Syaza.png'),
(68, 'NURUL SYUHADA BINTI MAZLINA', '910814115548', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'nurul.syuhada@moe.edu.my', '', 5, 'Syuhada.png'),
(69, 'SITI ZULAIKHA BINTI ADNAN', '911105146290', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-90015133@moe-dl.edu.my ', '', 5, 'Zulaikha.png'),
(70, 'Ts. SURIYAH BINTI HASSAN', '810218015358', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'g-58015134@moe-dl.edu.my  ', '', 3, 'Suriyah.png'),
(71, 'YUSSALINA BINTI MOHD YUSOP', '860310595418', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'yussalina.yusop@moe.edu.my', '', 5, 'Yussalina.png'),
(72, 'NOR\'ASIKIN BINTI ABU BAKAR', '891015095156', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'asikin.bakar@moe.edu.my', '', 5, 'Nor\'Asikin.png'),
(73, 'NAJIHA BINTI HUSSEIN', '831110015228', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'najiha.hussein@moe.edu.my', '', 5, 'Najiha.png'),
(74, 'NORAZITA MOHD NOR', '721126035568', 'password', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', 'zet_72@yahoo.com', '', 5, 'Azita.png'),
(75, '123', '123', '123', 'd9b1d7db4cd6e70935368a1efb10e377', '', '', '', '', '', 5, 'default.png'),
(76, '456', '456', '456', '54a2ec5f4421fa24bfa9bf6461e649a2', '', '', '', '', '', 3, 'default.png'),
(77, 'TIADA', '0', 'null', 'c74ff0db2bdeafffb9a70ea25da443d6', 'null', '0', '0', '0', '0', 0, 'default.png');

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
(0, 76, 77),
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
(57, 57, 77),
(58, 58, 9),
(59, 59, 7),
(60, 60, 77),
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
(72, 72, 77),
(73, 73, 61),
(74, 74, 30),
(75, 75, 76);

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
('JB001', 'IT001', 'TEKNOLOGI SISTEM PENGURUSAN PANGKALAN DATA DAN APLIKASI WEB', 0);

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
(1, 'sec_admin'),
(2, 'pengurusan'),
(3, 'ketua_jabatan'),
(4, 'ketua_program'),
(5, 'pensyarah');

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
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
  MODIFY `id_case` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pensyarah`
--
ALTER TABLE `pensyarah`
  MODIFY `id_pensyarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `rph`
--
ALTER TABLE `rph`
  MODIFY `id_rph` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
