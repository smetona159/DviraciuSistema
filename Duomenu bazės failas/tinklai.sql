-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019 m. Spa 18 d. 14:54
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tinklai`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `aktyvus_sveciai`
--

CREATE TABLE `aktyvus_sveciai` (
  `ip` varchar(255) NOT NULL,
  `trukme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `aktyvus_sveciai`
--

INSERT INTO `aktyvus_sveciai` (`ip`, `trukme`) VALUES
('::1', 1571403245);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `aktyvus_vartotojai`
--

CREATE TABLE `aktyvus_vartotojai` (
  `ip` varchar(255) NOT NULL,
  `trukme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `balnas`
--

CREATE TABLE `balnas` (
  `balno_id` int(11) NOT NULL,
  `balno_reiksme` varchar(255) DEFAULT NULL,
  `balno_kiekis` int(11) DEFAULT NULL,
  `balno_kaina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `balnas`
--

INSERT INTO `balnas` (`balno_id`, `balno_reiksme`, `balno_kiekis`, `balno_kaina`) VALUES
(1, 'PRO Condor CrMo AF', 90, 44),
(2, 'VELO Comfort ProX VL-8080', 95, 29),
(3, 'VELO ProX VL-8088', 100, 20),
(4, 'VELO ProX VL-6221 D2 Zone', 99, 19),
(5, '0', 0, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `padangos`
--

CREATE TABLE `padangos` (
  `padangu_id` int(11) NOT NULL,
  `padangu_reiksme` varchar(255) DEFAULT NULL,
  `padangu_kiekis` int(11) DEFAULT NULL,
  `padangu_kaina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `padangos`
--

INSERT INTO `padangos` (`padangu_id`, `padangu_reiksme`, `padangu_kiekis`, `padangu_kaina`) VALUES
(1, 'Continental King Protection', 0, 63.5),
(2, 'Maxxis Maxx Grip', 3, 59),
(3, 'Continental Race Sport', 1, 45),
(4, 'Continental 4000 S II', 3, 39);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `pedalai`
--

CREATE TABLE `pedalai` (
  `pedalu_id` int(11) NOT NULL,
  `pedalu_reiksme` varchar(255) DEFAULT NULL,
  `pedalu_kiekis` int(11) DEFAULT NULL,
  `pedalu_kaina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `pedalai`
--

INSERT INTO `pedalai` (`pedalu_id`, `pedalu_reiksme`, `pedalu_kiekis`, `pedalu_kaina`) VALUES
(1, 'Shimano Saint PD-M828', 0, 156),
(2, 'Shimano PD-MT50', 5, 56),
(3, 'Shimano PD-R540', 9, 54),
(4, 'Shimano SPD PD-M520', 5, 30),
(5, '0', 0, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `ratu_komplektas`
--

CREATE TABLE `ratu_komplektas` (
  `rato_id` int(11) NOT NULL,
  `rato_reiksme` varchar(255) DEFAULT NULL,
  `rato_kiekis` int(11) DEFAULT NULL,
  `rato_kaina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `ratu_komplektas`
--

INSERT INTO `ratu_komplektas` (`rato_id`, `rato_reiksme`, `rato_kiekis`, `rato_kaina`) VALUES
(1, 'Shimano WH-R', 2, 100),
(2, 'Shimano MT15', 3, 95),
(3, 'Shimano R501', 3, 65),
(4, 'Shimano TR', 1, 110),
(5, '0', 0, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `remas`
--

CREATE TABLE `remas` (
  `remo_id` int(11) NOT NULL,
  `remo_reiksme` varchar(255) DEFAULT NULL,
  `remo_kiekis` int(11) DEFAULT NULL,
  `remo_kaina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `remas`
--

INSERT INTO `remas` (`remo_id`, `remo_reiksme`, `remo_kiekis`, `remo_kaina`) VALUES
(1, 'PRO Black Sport', 97, 100),
(2, 'PRO Red Sport', 4, 150),
(3, 'PRO Retro Green', 0, 100),
(4, 'PRO Classic', 3, 120),
(5, '0', 0, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `stabdziai`
--

CREATE TABLE `stabdziai` (
  `stabdziu_id` int(11) NOT NULL,
  `stabdziu_reiksme` varchar(255) DEFAULT NULL,
  `stabdziu_kiekis` int(11) DEFAULT NULL,
  `stabdziu_kaina` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `stabdziai`
--

INSERT INTO `stabdziai` (`stabdziu_id`, `stabdziu_reiksme`, `stabdziu_kiekis`, `stabdziu_kaina`) VALUES
(1, 'Avid BB7_MTN', 0, 50.98),
(2, 'Avid BB7_Road', 2, 56),
(3, 'Shimano Deore', 3, 50),
(4, 'Shimano Deore x1', 3, 70),
(5, '0', 0, 0);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzblokuoti_vartotojai`
--

CREATE TABLE `uzblokuoti_vartotojai` (
  `prisijungimas` varchar(255) NOT NULL,
  `trukme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzsakymas`
--

CREATE TABLE `uzsakymas` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(255) DEFAULT NULL,
  `kiekis` int(11) DEFAULT NULL,
  `uzsakymo_suma` double DEFAULT NULL,
  `uzsakymo_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_stabdziaistabdziu_id` int(11) DEFAULT NULL,
  `fk_uzsakymo_buklebukles_id` int(11) DEFAULT NULL,
  `fk_remasremo_id` int(11) DEFAULT NULL,
  `fk_vartotojasprisijungimas` varchar(255) DEFAULT NULL,
  `fk_padangospadangu_id` int(11) DEFAULT NULL,
  `fk_balnasbalno_id` int(11) DEFAULT NULL,
  `fk_ratu_komplektasrato_id` int(11) DEFAULT NULL,
  `fk_pedalaipedalu_id` int(11) DEFAULT NULL,
  `fk_vartotojasprisijungimas1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `uzsakymas`
--

INSERT INTO `uzsakymas` (`id`, `pavadinimas`, `kiekis`, `uzsakymo_suma`, `uzsakymo_data`, `fk_stabdziaistabdziu_id`, `fk_uzsakymo_buklebukles_id`, `fk_remasremo_id`, `fk_vartotojasprisijungimas`, `fk_padangospadangu_id`, `fk_balnasbalno_id`, `fk_ratu_komplektasrato_id`, `fk_pedalaipedalu_id`, `fk_vartotojasprisijungimas1`) VALUES
(43, 'Sudarytas', NULL, 110, '2019-04-29 14:34:56', NULL, 2, NULL, NULL, NULL, NULL, 4, NULL, NULL),
(45, 'Sudarytas', NULL, 29, '2018-12-17 23:51:31', NULL, 1, NULL, 'Administratorius', NULL, 2, NULL, NULL, NULL),
(46, 'Sudarytas', NULL, 100, '2018-12-17 23:52:31', NULL, 1, 1, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(47, 'Sudarytas', NULL, 100, '2018-12-17 23:52:33', NULL, 1, 1, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(48, 'Sudarytas', NULL, 100, '2018-12-17 23:52:35', NULL, 1, 1, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(49, 'Sudarytas', NULL, 100, '2018-12-17 23:52:37', NULL, 1, 1, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(50, 'Sudarytas', NULL, 44, '2018-12-18 12:03:12', NULL, 3, NULL, 'Administratorius', NULL, 1, NULL, NULL, NULL),
(51, 'Sudarytas', NULL, 50.98, '2018-12-18 00:40:23', 1, 1, NULL, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(52, 'Sudarytas', NULL, 110, '2018-12-18 00:55:05', NULL, 1, NULL, 'Administratorius', NULL, NULL, 4, NULL, NULL),
(53, 'Sudarytas', NULL, 65, '2018-12-18 00:55:24', NULL, 1, NULL, 'Administratorius', NULL, NULL, 3, NULL, NULL),
(54, 'Sudarytas', NULL, 70, '2018-12-18 00:57:22', 4, 1, NULL, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(55, 'Sudarytas', NULL, 65, '2018-12-18 12:04:35', NULL, 3, NULL, 'Administratorius', NULL, NULL, 3, NULL, NULL),
(56, 'Sudarytas', NULL, 44, '2018-12-18 01:03:26', NULL, 1, NULL, 'Administratorius', NULL, 1, NULL, NULL, NULL),
(57, 'Sudarytas', NULL, 63.5, '2018-12-18 01:08:10', NULL, 1, NULL, 'Administratorius', 1, NULL, NULL, NULL, NULL),
(58, 'Sudarytas', NULL, 30, '2018-12-18 01:14:15', NULL, 2, NULL, 'Administratorius', NULL, NULL, NULL, 4, NULL),
(59, 'Sudarytas', NULL, 44, '2018-12-18 01:42:34', NULL, 1, NULL, 'Vartotojas', NULL, 1, NULL, NULL, NULL),
(60, 'Sudarytas', NULL, 514.48, '2018-12-18 02:16:09', 1, 1, 1, 'Administratorius', 1, 1, 1, 1, NULL),
(61, 'Sudarytas', NULL, 100, '2018-12-18 12:05:45', NULL, 3, 3, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(62, 'Sudarytas', NULL, 100, '2018-12-18 14:19:36', 2, 1, NULL, 'Valdytojas', NULL, 1, NULL, NULL, NULL),
(63, 'Sudarytas', NULL, 44, '2018-12-18 14:19:31', NULL, 2, NULL, 'Valdytojas', NULL, 1, NULL, NULL, NULL),
(80, 'Sudarytas', NULL, 50.98, '2018-12-18 13:14:56', 1, 1, NULL, 'Administratorius', NULL, NULL, NULL, NULL, NULL),
(82, 'Sudarytas', NULL, 44, '2018-12-18 13:26:01', NULL, 1, NULL, 'Administratorius', NULL, 1, NULL, NULL, NULL),
(84, 'Sudarytas', NULL, 29, '2018-12-18 13:37:35', NULL, 1, NULL, 'Administratorius', NULL, 2, NULL, NULL, NULL),
(85, 'Sudarytas', NULL, 44, '2018-12-18 13:37:43', NULL, 1, NULL, 'Administratorius', NULL, 1, NULL, NULL, NULL),
(86, 'Sudarytas', NULL, 63.5, '2018-12-18 13:37:51', NULL, 1, NULL, 'Administratorius', 1, NULL, NULL, NULL, NULL),
(87, 'Sudarytas', NULL, 129, '2018-12-18 13:46:12', NULL, 1, 1, 'testas', NULL, 2, NULL, NULL, NULL),
(88, 'Sudarytas', NULL, 484.98, '2018-12-18 13:46:47', 1, 2, 1, 'testas', 2, 4, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `uzsakymo_bukle`
--

CREATE TABLE `uzsakymo_bukle` (
  `bukles_id` int(11) NOT NULL,
  `bukles_reiksme` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_lithuanian_ci;

--
-- Sukurta duomenų kopija lentelei `uzsakymo_bukle`
--

INSERT INTO `uzsakymo_bukle` (`bukles_id`, `bukles_reiksme`) VALUES
(1, 'Sudarytas'),
(2, 'Patvirtintas'),
(3, 'Atšauktas');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `vartotojas`
--

CREATE TABLE `vartotojas` (
  `prisijungimas` varchar(255) NOT NULL,
  `slaptazodis` varchar(255) DEFAULT NULL,
  `id` varchar(255) DEFAULT NULL,
  `lygis` int(11) DEFAULT NULL,
  `epastas` varchar(255) DEFAULT NULL,
  `trukme` int(11) DEFAULT NULL,
  `lytis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `vartotojas`
--

INSERT INTO `vartotojas` (`prisijungimas`, `slaptazodis`, `id`, `lygis`, `epastas`, `trukme`, `lytis`) VALUES
('Administratorius', 'fe01ce2a7fbac8fafaed7c982a04e229', 'a3c6551ac03e1c5e1db5cc4fea10858a', 9, 'demo@ktu.lt', 1545143907, '1'),
('kristupas', 'fe01ce2a7fbac8fafaed7c982a04e229', '8d25e1f9491d917950038c08a3afbb9b', 9, 'test@test.com', 1556731565, '0'),
('testas', 'fe01ce2a7fbac8fafaed7c982a04e229', '35ea07edd1ea3b53e4def2e58c216db4', 1, 'test@ktu.edu', 1545133590, '0'),
('Valdytojas', 'fe01ce2a7fbac8fafaed7c982a04e229', 'e9ede3813eabe34b3829e93a8fad4c49', 5, 'demo@ktu.lt', 1569264061, '1'),
('Vartotojas', 'fe01ce2a7fbac8fafaed7c982a04e229', '3d6559b7ba13cae7943687b05cc0d284', 1, 'demo@ktu.lt', 1565085951, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktyvus_sveciai`
--
ALTER TABLE `aktyvus_sveciai`
  ADD PRIMARY KEY (`ip`);

--
-- Indexes for table `aktyvus_vartotojai`
--
ALTER TABLE `aktyvus_vartotojai`
  ADD PRIMARY KEY (`ip`);

--
-- Indexes for table `balnas`
--
ALTER TABLE `balnas`
  ADD PRIMARY KEY (`balno_id`);

--
-- Indexes for table `padangos`
--
ALTER TABLE `padangos`
  ADD PRIMARY KEY (`padangu_id`);

--
-- Indexes for table `pedalai`
--
ALTER TABLE `pedalai`
  ADD PRIMARY KEY (`pedalu_id`);

--
-- Indexes for table `ratu_komplektas`
--
ALTER TABLE `ratu_komplektas`
  ADD PRIMARY KEY (`rato_id`);

--
-- Indexes for table `remas`
--
ALTER TABLE `remas`
  ADD PRIMARY KEY (`remo_id`);

--
-- Indexes for table `stabdziai`
--
ALTER TABLE `stabdziai`
  ADD PRIMARY KEY (`stabdziu_id`);

--
-- Indexes for table `uzblokuoti_vartotojai`
--
ALTER TABLE `uzblokuoti_vartotojai`
  ADD PRIMARY KEY (`prisijungimas`);

--
-- Indexes for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turi_stabdzius` (`fk_stabdziaistabdziu_id`),
  ADD KEY `uzsakymo_statusas` (`fk_uzsakymo_buklebukles_id`),
  ADD KEY `turi_rema` (`fk_remasremo_id`),
  ADD KEY `renkasi` (`fk_vartotojasprisijungimas`),
  ADD KEY `turi_padangas` (`fk_padangospadangu_id`),
  ADD KEY `turi_balna` (`fk_balnasbalno_id`),
  ADD KEY `turi_rata` (`fk_ratu_komplektasrato_id`),
  ADD KEY `turi_pedalus` (`fk_pedalaipedalu_id`),
  ADD KEY `sudarineja` (`fk_vartotojasprisijungimas1`);

--
-- Indexes for table `uzsakymo_bukle`
--
ALTER TABLE `uzsakymo_bukle`
  ADD PRIMARY KEY (`bukles_id`);

--
-- Indexes for table `vartotojas`
--
ALTER TABLE `vartotojas`
  ADD PRIMARY KEY (`prisijungimas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `balnas`
--
ALTER TABLE `balnas`
  MODIFY `balno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `padangos`
--
ALTER TABLE `padangos`
  MODIFY `padangu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pedalai`
--
ALTER TABLE `pedalai`
  MODIFY `pedalu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ratu_komplektas`
--
ALTER TABLE `ratu_komplektas`
  MODIFY `rato_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `remas`
--
ALTER TABLE `remas`
  MODIFY `remo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stabdziai`
--
ALTER TABLE `stabdziai`
  MODIFY `stabdziu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uzsakymas`
--
ALTER TABLE `uzsakymas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `uzsakymo_bukle`
--
ALTER TABLE `uzsakymo_bukle`
  MODIFY `bukles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Apribojimai eksportuotom lentelėm
--

--
-- Apribojimai lentelei `uzsakymas`
--
ALTER TABLE `uzsakymas`
  ADD CONSTRAINT `renkasi` FOREIGN KEY (`fk_vartotojasprisijungimas`) REFERENCES `vartotojas` (`prisijungimas`),
  ADD CONSTRAINT `sudarineja` FOREIGN KEY (`fk_vartotojasprisijungimas1`) REFERENCES `vartotojas` (`prisijungimas`),
  ADD CONSTRAINT `turi_balna` FOREIGN KEY (`fk_balnasbalno_id`) REFERENCES `balnas` (`balno_id`),
  ADD CONSTRAINT `turi_padangas` FOREIGN KEY (`fk_padangospadangu_id`) REFERENCES `padangos` (`padangu_id`),
  ADD CONSTRAINT `turi_pedalus` FOREIGN KEY (`fk_pedalaipedalu_id`) REFERENCES `pedalai` (`pedalu_id`),
  ADD CONSTRAINT `turi_rata` FOREIGN KEY (`fk_ratu_komplektasrato_id`) REFERENCES `ratu_komplektas` (`rato_id`),
  ADD CONSTRAINT `turi_rema` FOREIGN KEY (`fk_remasremo_id`) REFERENCES `remas` (`remo_id`),
  ADD CONSTRAINT `turi_stabdzius` FOREIGN KEY (`fk_stabdziaistabdziu_id`) REFERENCES `stabdziai` (`stabdziu_id`),
  ADD CONSTRAINT `uzsakymo_statusas` FOREIGN KEY (`fk_uzsakymo_buklebukles_id`) REFERENCES `uzsakymo_bukle` (`bukles_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
