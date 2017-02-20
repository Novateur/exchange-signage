-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2017 at 11:28 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signage`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `phone`, `email`, `password`) VALUES
(1, 'Zennith bank', '090808907907', 'info@zenithbank.com', '1234567'),
(2, 'Diamond bank', '0504950809058', 'info@diamondbank.com', '8a4041f1188249b3ccdc3ea304d131776fc81f6b'),
(3, 'Heritage bank', '0594965904759', 'info@heritagebank.com', '2b4e3e94babc26a99403986506a4b83269dd3386');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `cur_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cur_ab` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `cur_name`, `cur_ab`, `logo`) VALUES
(4, 'US Dollars', 'USD', '151001LOGO23345.png'),
(5, 'British pound', 'GBP', '93322LOGO17669.png'),
(6, 'Euros', 'EUR', '130859LOGO640412.png'),
(7, 'hjhdjhjgs', 'MNB', '213073LOGO258026.png'),
(8, 'uiwiuwy', 'BMV', '767212LOGO690338.png'),
(9, 'iwiyeute', 'LOM', '295471LOGO551849.png');

-- --------------------------------------------------------

--
-- Table structure for table `currencies_personal`
--

CREATE TABLE `currencies_personal` (
  `id` int(11) NOT NULL,
  `currency_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies_personal`
--

INSERT INTO `currencies_personal` (`id`, `currency_id`, `bank_id`) VALUES
(7, '4', '2'),
(8, '5', '2'),
(10, '9', '2');

-- --------------------------------------------------------

--
-- Table structure for table `currencies_poll`
--

CREATE TABLE `currencies_poll` (
  `id` int(11) NOT NULL,
  `cur_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cur_ab` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies_poll`
--

INSERT INTO `currencies_poll` (`id`, `cur_name`, `cur_ab`, `logo`) VALUES
(1, 'Nigerian Naira', 'NGN', '414520LOGO700073.png'),
(2, 'gjdjhsjgdj', 'DFG', '602600LOGO778900.png'),
(3, 'yeiuiwuywu', 'BMN', '354980LOGO319610.png'),
(4, 'bnbnvjh', 'MNB', '198669LOGO62957.png');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `currency_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `buy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sell` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `currency_id`, `buy`, `sell`, `date1`, `time1`, `bank_id`) VALUES
(27, '5', '550', '580', '11/02/2017', NULL, NULL),
(28, '6', '500', '510', '09/02/2017', NULL, NULL),
(31, '4', '490', '500', '10/02/2017', NULL, NULL),
(34, '5', '3445', '788', '09/02/2017', '12:07:54 PM', NULL),
(35, '4', '678', '456', '10/02/2017', '01:53:29 PM', NULL),
(36, '5', '7687', '4455', '10/02/2017', '05:15:09 PM', NULL),
(37, '4', '676', '333', '10/02/2017', '05:15:31 PM', NULL),
(38, '5', '545', '8987', '10/02/2017', '05:15:53 PM', NULL),
(39, '6', '5665', '9876', '10/02/2017', '05:16:02 PM', NULL),
(40, '5', '765', '987', '10/02/2017', '05:16:11 PM', NULL),
(41, '4', '543', '765', '10/02/2017', '05:16:22 PM', NULL),
(42, '6', '787', '456', '13/02/2017', '08:41:21 AM', NULL),
(44, '6', '890', '670', '13/02/2017', '08:55:28 AM', NULL),
(45, '6', '990', '1000', '13/02/2017', '08:57:38 AM', NULL),
(46, '4', '890', '234', '13/02/2017', '01:55:20 PM', NULL),
(47, '5', '679', '5656', '14/02/2017', '03:44:56 PM', '2'),
(48, '4', '787', '888', '20/02/2017', '11:14:37 AM', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies_personal`
--
ALTER TABLE `currencies_personal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies_poll`
--
ALTER TABLE `currencies_poll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `currencies_personal`
--
ALTER TABLE `currencies_personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `currencies_poll`
--
ALTER TABLE `currencies_poll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
