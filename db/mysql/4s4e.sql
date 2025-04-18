-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 11:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4s4e`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_news`
--

CREATE TABLE `game_news` (
  `id` int(11) NOT NULL,
  `game` varchar(32) NOT NULL,
  `datum` datetime NOT NULL,
  `news_name` varchar(128) NOT NULL,
  `news` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_news`
--

INSERT INTO `game_news` (`id`, `game`, `datum`, `news_name`, `news`) VALUES
(1, '4s4e', '2023-09-24 08:38:15', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `premium2`
--

CREATE TABLE `premium2` (
  `id` int(11) NOT NULL,
  `server` varchar(60) NOT NULL,
  `type` varchar(32) NOT NULL,
  `price` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `event_type` tinyint(4) NOT NULL,
  `event_rate` double NOT NULL DEFAULT 0,
  `highlight` tinyint(4) NOT NULL DEFAULT 0,
  `number` int(11) DEFAULT NULL,
  `keyword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `premium2`
--

INSERT INTO `premium2` (`id`, `server`, `type`, `price`, `coins`, `currency`, `event_date`, `event_type`, `event_rate`, `highlight`, `number`, `keyword`) VALUES
(1, '4s4e_hu', 'paypal', 2000, 90, 'HUF', NULL, 0, 1.3, 1, NULL, ''),
(2, '4s4e_hu', 'paypal', 4000, 210, 'HUF', '2023-11-01 23:59:59', 0, 1.3, 1, NULL, ''),
(3, '4s4e_hu', 'paypal', 9000, 635, 'HUF', '2023-11-01 23:59:59', 0, 1.5, 1, NULL, ''),
(4, '4s4e_hu', 'paypal', 19000, 1550, 'HUF', '2023-11-01 23:59:59', 0, 1.5, 1, NULL, ''),
(5, '4s4e_hu', 'paypal', 38000, 3600, 'HUF', '2023-11-01 23:59:59', 0, 1.7, 1, NULL, ''),
(6, '4s4e_hu', 'paypal', 94000, 10220, 'HUF', '2023-11-01 23:59:59', 0, 1.9, 1, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `rank_char_info`
--

CREATE TABLE `rank_char_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_server` varchar(32) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rank_char_info`
--

INSERT INTO `rank_char_info` (`id`, `user_id`, `game_server`, `text`) VALUES
(1, 3, '4s4e_hu', 'AAA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_news`
--
ALTER TABLE `game_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `premium2`
--
ALTER TABLE `premium2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rank_char_info`
--
ALTER TABLE `rank_char_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_news`
--
ALTER TABLE `game_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `premium2`
--
ALTER TABLE `premium2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rank_char_info`
--
ALTER TABLE `rank_char_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
