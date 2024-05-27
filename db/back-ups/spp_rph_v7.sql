-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 09:18 AM
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
('ADM01', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-11-07 14:38:51');

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
  `id_roles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pensyarah`
--

INSERT INTO `pensyarah` (`id_pensyarah`, `nama_pensyarah`, `username`, `password`, `pass_encrypt`, `sesi`, `kod_jabatan`, `kod_program`, `email`, `no_tel`, `id_roles`) VALUES
(1, 'HASFARINA BINTI ABAS', '760830016434', '', '', '', '', '', 'hasfarina@moe.edu.my ', '', 0),
(2, 'ZARIMAH BINTI DARMO', '680201015658', '', '', '', '', '', 'g-58015145@moe-dl.edu.my ', '', 0),
(3, 'HERLINA BINTI MOHD HARON', '710925015308', '', '', '', '', '', 'herlinaharon@gmail.com ', '', 0),
(4, 'NURZAIMAH BINTI AHMAD FUAD', '771016015342', '', '', '', '', '', 'zaimah5876@yahoo.com ', '', 0),
(5, 'FAAIZUN BINTI BASO SULTAN BAKRI', '860517235532', '', '', '', '', '', 'g-32015068@moe-dl.edu.my ', '', 0),
(6, 'NORMALIZA BINTI AHMAD', '701114015174', '', '', '', '', '', 'sabrina1619@yahoo.com ', '', 0),
(7, 'JUHAIDA HUSNA BINTI MD. SHUKOR', '770717016634', '', '', '', '', '', 'juhaidamdshukor@gmail.com ', '', 0),
(8, 'NORIDAH BINTI SALMO', '760922017290', '', '', '', '', '', 'abdulwahab596@gmail.com', '', 0),
(9, 'FARHAH BINTI JAFFAR', '760111016526', '', '', '', '', '', 'farhah.jaffar@moe.edu.my ', '', 0),
(10, 'AZIZUL ARIF BIN ZULKAFLEE', '970817335057', '', '', '', '', '', 'g-57519830@moe-dl.edu.my ', '', 0),
(11, 'FAEZA BINTI OMAR', '720704015194', '', '', '', '', '', 'g-94015069@moe-dl.edu.my ', '', 0),
(12, 'HUDA BINTI HUSSEIN', '781204016106', '', '', '', '', '', 'huda7477@gmail.com ', '', 0),
(13, 'JUWIESA ANAK BAYANG', '911026125846', '', '', '', '', '', 'juwiesabayang@yahoo.com ', '', 0),
(14, 'KARTINI BINTI HANAPI', '780226016508', '', '', '', '', '', 'tiniarein@gmail.com ', '', 0),
(15, 'KHAIRIL AZHAR BIN ROSNI', '860508236445', '', '', '', '', '', 'khairil.azhar@moe.edu.my ', '', 0),
(16, 'LILY SUHANY BT MAHMOOD', '770427037058', '', '', '', '', '', 'g-58015086@moe-dl.edu.my ', '', 0),
(17, 'MD RAFIZ BIN RAYMOND', '910711126391', '', '', '', '', '', 'g-91015090@moe-dl.edu.my ', '', 0),
(18, 'NASITA BINTI SARBINI', '640315106498', '', '', '', '', '', 'g-98015099@moe-dl.edu.my ', '', 0),
(19, 'NOOR FARHANA BINTI FADLI', '910728035998', '', '', '', '', '', 'g-98015101@moe-dl.edu.my ', '', 0),
(20, 'NOR AZLEEN BINTI ZAINAL', '710726105554', '', '', '', '', '', 'nor.azleen@moe.edu.my ', '', 0),
(21, 'NORLIN BINTI MUSTAFA', '750203015628', '', '', '', '', '', 'norlinmustafa369@gmail.com ', '', 0),
(22, 'NUR FAZLEEN BINTI MUSLIM', '910709015078', '', '', '', '', '', 'leen_nutz91@yahoo.com ', '', 0),
(23, 'NUR SHAFIKA BINTI MAT TALIB', '910414105308', '', '', '', '', '', 'g-08015115@moe-dl.edu.my', '', 0),
(24, 'NURUL NADIA BINTI RAMLAN', '920201016052', '', '', '', '', '', 'g-52043909@moe-dl.edu.my ', '', 0),
(25, 'NURUL NASRIAH BINTI ABDUL HALIM', '930316015446', '', '', '', '', '', 'nurulnasriah163@gmail.com ', '', 0),
(26, 'PRITIPAL KAUR AULUCK', '750815125908', '', '', '', '', '', 'aureet@yahoo.com ', '', 0),
(27, 'ROHIZA BINTI HUSAIN', '850909075102', '', '', '', '', '', 'ejahusain85@gmail.com ', '', 0),
(28, 'UMMI HIDAYAH BINTI ADNAN', '850520086110', '', '', '', '', '', 'g-10015135@moe-dl.edu.my ', '', 0),
(29, 'WAN NORHAZILAH BINTI WAN MOHD ZAIN', '710303035494', '', '', '', '', '', 'g-94015137@moe-dl.edu.my ', '', 0),
(30, 'ZAIMAH BINTI ARBON', '770814015916', '', '', '', '', '', 'zaimah.arbon@moe.edu.my ', '', 0),
(31, 'ZAIREEN IZULIN BINTI ZULKEFLEE', '850201015710', '', '', '', '', '', 'zaireenizulin@yahoo.com ', '', 0),
(32, 'ZULAIHA BINTI RAHMAT', '910329016036', '', '', '', '', '', 'zulaiha.rahmat@moe.edu.my ', '', 0),
(33, 'ZARIAH BINTI ZAINUDIN', '750912015428', '', '', '', '', '', 'zariahzainudin75@gmail.com ', '', 0),
(34, 'KHAIRUNNISA BINTI KAMARULZAMAN', '890410435144', '', '', '', '', '', 'g-44015083@moe-dl.edu.my ', '', 0),
(35, 'NORLAILEE BINTI SARIFF', '791213015438', '', '', '', '', '', 'g-38040858@moe-dl.edu.my ', '', 0),
(36, 'NURRULFATIN BINTI RUSLAN', '910830015248', '', '', '', '', '', 'g-48015119@moe-dl.edu.my ', '', 0),
(37, 'MOHD SABREE BIN ABU BAKAR', '900221016449', '', '', '', '', '', 'mohd.sabree@moe.edu.my ', '', 0),
(38, 'AZIMY BIN MOHD BUKHARI', '770123025701', '', '', '', '', '', 'azimybukhari@moe.edu.my', '', 0),
(39, 'NORASYIKIN BINTI AZIZ', '920917015434', '', '', '', '', '', 'norasyikin.aziz@moe.edu.my ', '', 0),
(40, 'ANIZAH BINTI MOHD DAUD', '790126015152', '', '', '', '', '', 'anizah.daud@moe.edu.my', '', 0),
(41, 'FARISSHA BINTI ALLUWI', '910303016302', '', '', '', '', '', 'farissha@moe.edu.my ', '', 0),
(42, 'LIEW CHOI LING', '860525335584', '', '', '', '', '', 'g-84015084@moe-dl.edu.my ', '', 0),
(43, 'LIM KA BOOI', '840523025410', '', '', '', '', '', 'lkb_mei@yahoo.com ', '', 0),
(44, 'MUHAMMAD ASHRAFFUDIN BIN AZIZI', '960402015327', '', '', '', '', '', 'g-27522116@moe-dl.edu.my ', '', 0),
(45, 'NOOR HAYATIE BINTI COYATI', '850108015644', '', '', '', '', '', 'g-44019506@moe-dl.edu.my', '', 0),
(46, 'NOR ATULNADHRAH BINTI NAZDI', '860910236910', '', '', '', '', '', 'g-10015102@moe-dl.edu.my ', '', 0),
(47, 'NOR SYAHIDA ERNI BINTI MOHD DESA', '910708055406', '', '', '', '', '', 'nor.merni@moe.edu.my', '', 0),
(48, 'NORHIDAYU BINTI JAIS', '841011016646', '', '', '', '', '', 'norhidayu.jais@moe.edu.my', '', 0),
(49, 'NUR HAZIRA BINTI ABDUL HAMID', '950901015998', '', '', '', '', '', 'nurhazira.abdulhamid@gmail.com ', '', 0),
(50, 'NUR SHAZLINA BINTI SAAT', '890804115100', '', '', '', '', '', 'shazlina.saat@moe.edu.my', '', 0),
(51, 'NURHUDA BINTI MD TAHIR', '830430016460', '', '', '', '', '', 'nurhuda.tahir@moe.edu.my', '', 0),
(52, 'NURULHUDA BINTI MASRI', '920724015980', '', '', '', '', '', 'nurulhuda.masri@moe.edu.my', '', 0),
(53, 'SITI AZURA BINTI MANSOR', '920607015156', '', '', '', '', '', 'siti.azura@moe.edu.my ', '', 0),
(54, 'SITI MASITA BINTI ABDULLAH', '901007015570', '', '', '', '', '', 'siti.masita@moe.edu.my', '', 0),
(55, 'SITI NOR HAZIRAH BINTI ZAINUDIN', '910811035892', '', '', '', '', '', 'nor.hazirah@moe.edu.my', '', 0),
(56, 'SITI NORSHAHIRA BINTI SAEMAN', '910509016746', '', '', '', '', '', 'siti.norshahira@moe.edu.my', '', 0),
(57, 'USHADEVI A/P VASU', '851126016450', '', '', '', '', '', 'ushadevikvpjb@gmail.com', '', 0),
(58, 'WAN SUHAIDA BINTI WAN NORDIN', '821216035658', '', '', '', '', '', 'g-94015137@moe-dl.edu.my', '', 0),
(59, 'ZULFAH HANIS BINTI MD SADAKAH', '920623015762', '', '', '', '', '', 'g-62015147@moe-dl.edu.my', '', 0),
(60, 'JESLINDA A/P SELVARAJU', '911217015068', '', '', '', '', '', 'jeslinda1712@gmail.com ', '', 0),
(61, 'MASTURA BINTI MD. HASSAN', '820409045102', '', '', '', '', '', 'g-02015089@moe-dl.edu.my ', '', 0),
(62, 'MOHAMAD NOOR FAHMI RUZAINI BIN MD YUSOFF', '910329086093', '', '', '', '', '', 'g-93248405@moe-dl.edu.my ', '', 0),
(63, 'MOHD HAFIZ BIN MUSTAFA', '830118015033', '', '', '', '', '', 'g-33015092@moe-dl.edu.my ', '', 0),
(64, 'MUHAMMAD AMEEN BIN ATAN', '830610015051', '', '', '', '', '', 'g-51015095@moe-dl.edu.my ', '', 0),
(65, 'MUHAMMAD TAQIYUDDIN BIN DZULKRINAIN', '910525015487', '', '', '', '', '', 'g-87015096@moe-dl.edu.my', '', 0),
(66, 'NUR SYAFIQAH BINTI HASHIM', '910430016276', '', '', '', '', '', 'syafiqah.hashim@moe.edu.my', '', 0),
(67, 'NURUL SYAZA BINTI ROSLI', '930110015942', '', '', '', '', '', 'nurul.syaza@moe.edu.my ', '', 0),
(68, 'NURUL SYUHADA BINTI MAZLINA', '910814115548', '', '', '', '', '', 'nurul.syuhada@moe.edu.my', '', 0),
(69, 'SITI ZULAIKHA BINTI ADNAN', '911105146290', '', '', '', '', '', 'g-90015133@moe-dl.edu.my ', '', 0),
(70, 'SURIYAH BINTI HASSAN', '810218015358', '', '', '', '', '', 'g-58015134@moe-dl.edu.my  ', '', 0),
(71, 'YUSSALINA BINTI MOHD YUSOP', '860310595418', '', '', '', '', '', 'yussalina.yusop@moe.edu.my', '', 0),
(72, 'NOR\'ASIKIN BINTI ABU BAKAR', '891015095156', '', '', '', '', '', 'asikin.bakar@moe.edu.my', '', 0),
(73, 'NAJIHA BINTI HUSSEIN', '831110015228', '', '', '', '', '', 'najiha.hussein@moe.edu.my', '', 0),
(74, 'NORAZITA MOHD NOR', '721126035568', '', '', '', '', '', 'zet_72@yahoo.com', '', 0),
(75, 'test 1', 'test1', 'test1', '418d89a45edadb8ce4da17e07f72536c', '', '', '', '', '', 0),
(76, 'test 2', 'test2', 'test2', '4ff9018a647ae315a7e6601a818b4940', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `penyemak`
--

CREATE TABLE `penyemak` (
  `id_penyemak` int(11) NOT NULL,
  `pensyarah` int(11) NOT NULL COMMENT 'id pensyarah',
  `penyemak` int(11) NOT NULL COMMENT 'id pensyarah'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_rph` int(11) NOT NULL,
  `id_pensyarah` int(11) NOT NULL,
  `id_penyemak` int(11) NOT NULL,
  `link_rph` varchar(255) NOT NULL,
  `sesi` varchar(10) NOT NULL,
  `tarikh_rph` date NOT NULL,
  `minggu` int(20) NOT NULL,
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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pensyarah`
--
ALTER TABLE `pensyarah`
  MODIFY `id_pensyarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `rph`
--
ALTER TABLE `rph`
  MODIFY `id_rph` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
