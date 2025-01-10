-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 08:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paperless_office`
--

-- --------------------------------------------------------

--
-- Table structure for table `gizi`
--

CREATE TABLE `gizi` (
  `id` int(11) NOT NULL,
  `nama_makanan` varchar(255) DEFAULT NULL,
  `kalori` varchar(50) DEFAULT NULL,
  `karbohidrat` varchar(50) DEFAULT NULL,
  `protein` varchar(50) DEFAULT NULL,
  `lemak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gizi`
--

INSERT INTO `gizi` (`id`, `nama_makanan`, `kalori`, `karbohidrat`, `protein`, `lemak`) VALUES
(2, 'Nasi Goreng', '450', '36', '6', '30'),
(3, 'Nasi Jagung	', '54', '51', '6', '0'),
(4, 'Nasi Liwet	', '217', '48', '5', '1'),
(5, 'Nasi Putih	', '234', '51', '4', '0'),
(6, 'Nasi Uduk	', '212', '42', '0', '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$iTYLr2N9LouaxPua/aXZy.NrUYyPKkh9ZIk1.e4/mJTFYK9hKm.rq'),
(2, 'ALYA', '$2y$10$RW6yjKD5agFcerQ55q2Ps.9izAubAJhzMxuINQ1cgagB/6tF8YzSO'),
(3, 'alya', '$2y$10$CulsV8VWZstwXHx6uSetme.bKbVEPFwzxWPHmTSXDzv25jgpRI07W');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gizi`
--
ALTER TABLE `gizi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gizi`
--
ALTER TABLE `gizi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
