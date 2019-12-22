-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 07:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--
CREATE DATABASE IF NOT EXISTS `game` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `game`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` mediumint(9) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_photo` longtext,
  `registration_date` date DEFAULT NULL,
  `credits` int(30) DEFAULT '10',
  `wins` int(15) NOT NULL,
  `loses` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_photo`, `registration_date`, `credits`, `wins`, `loses`) VALUES
(1, 'Dovud', 'dinomov99@gmail.com', '$2y$10$z0COOCdhf980dC/U5fMawe9EbQNmD2NeheHmxcqQHidQCZmPw.5Um', NULL, '2019-11-11', 29, 18, 35),
(8, 'Selena', 'selena2@gmail.com', '$2y$10$zQCvUfRcWjxwoTJpisN/VOPwPwHMgbpiAE4uw9iisPg6GNsOIpghe', NULL, '2019-11-22', 31, 43, 11),
(15, 'Ali', 'lilili@gmail.com', '$2y$10$hmCnFSPtia.amC/usxDSvOFaeks3FpYk6pioLsVEXM3EcYJQUp622', NULL, '2019-12-02', 10, 2, 2),
(19, 'sadsad', 'asd@sads.cc', '$2y$10$518.MGV.CP9PYxhfZifPceswy168E1DxY6cf2QrXqnTXVU/9pdNca', NULL, '2019-12-14', 4, 1, 4),
(21, 'abu', 'abu@gmail.com', '$2y$10$V4vtl6930.YJGc3CKUHp/eG/m06fJOk2CAPhaCgyNMmguk7wkBptq', NULL, '2019-12-18', 2, 9, 13),
(23, 'Munir', 'munir@gmail.com', '$2y$10$c3FBpyKr9yWqYzbIiY8PXOXqT7/73oJ/aqYb6PrQfIHe4mDlFhhTi', NULL, '2019-12-21', 10, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
