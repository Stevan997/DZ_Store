-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 10:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `akcija`
--

CREATE TABLE `akcija` (
  `ID` int(11) NOT NULL,
  `JSP` int(11) NOT NULL,
  `Nova_cena` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glavne_fotografije`
--

CREATE TABLE `glavne_fotografije` (
  `ID` int(11) NOT NULL,
  `Redosled` int(11) NOT NULL,
  `Slika` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aktivna` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `JSP` int(11) NOT NULL,
  `Naziv` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Grupa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Vrsta` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slika` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Label` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Karakteristike` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cena` decimal(12,2) NOT NULL,
  `Stanje` int(10) NOT NULL,
  `Mog_nab` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`JSP`, `Naziv`, `Grupa`, `Vrsta`, `Slika`, `Label`, `Karakteristike`, `Cena`, `Stanje`, `Mog_nab`) VALUES
(222, 'Dva', 'Dva', 'Dva', 'Dva.jpg', 'Dva', 'DvaDvaDvaDvaDvaDvaDvaDva', '22.00', 22222, 0),
(111111, 'Jedan', 'Jedan', 'Jedan', 'Jedan.jpg', 'Jedan', 'JedanJedanJedanJedanJedanJedanJedanJedan', '11111.00', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `račun`
--

CREATE TABLE `račun` (
  `ID` int(11) NOT NULL,
  `ID_korisnika` smallint(6) NOT NULL,
  `Datum` datetime NOT NULL,
  `Iznos` decimal(12,2) NOT NULL,
  `Nac_plac` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stavke_racuna`
--

CREATE TABLE `stavke_racuna` (
  `ID` int(11) NOT NULL,
  `JSP` int(11) NOT NULL,
  `kolicina` smallint(6) NOT NULL,
  `Cena` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Ime` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Prezime` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Adresa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Grad` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pos_br` int(5) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `Br_tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Dat_rod` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Administrator` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `Ime`, `Prezime`, `Adresa`, `Grad`, `Pos_br`, `email`, `email_verified_at`, `Br_tel`, `Dat_rod`, `Administrator`) VALUES
(1, 'Steva', '$2y$10$EvhwnNwYaZXiI5nZC5oGpOtGKAi/B37.Jc.as0zn583ClnFm968am', NULL, '2019-11-18 14:17:11', '2019-11-18 20:55:58', 'steva', 'steva', 'Mije Jovanovica 11', 'Bogatic', 11111, 'steva97osecanski@gmail.com', NULL, '111111', '1111111', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akcija`
--
ALTER TABLE `akcija`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `JSP` (`JSP`);

--
-- Indexes for table `glavne_fotografije`
--
ALTER TABLE `glavne_fotografije`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`JSP`);

--
-- Indexes for table `račun`
--
ALTER TABLE `račun`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stavke_racuna`
--
ALTER TABLE `stavke_racuna`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glavne_fotografije`
--
ALTER TABLE `glavne_fotografije`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `račun`
--
ALTER TABLE `račun`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
