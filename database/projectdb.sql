-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2022 at 06:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `number` varchar(16) NOT NULL,
  `firstName` varchar(16) NOT NULL,
  `lastName` varchar(16) NOT NULL,
  `email` varchar(16) NOT NULL,
  `state` varchar(16) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` text NOT NULL,
  `type` varchar(16) NOT NULL,
  `blocked` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `blocked`, `createdAt`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 0, '2022-02-26 00:00:00'),
(8, 'hello', '7c211433f02071597741e6ff5a8ea34789abbf43', 'user', 0, '2022-02-26 19:26:50'),
(9, 'mark', 'f1b5a91d4d6ad523f2610114591c007e75d15084', 'user', 0, '2022-02-26 21:32:53'),
(10, 'matthew', 'f80d0ca101e967b50b730ddf8e8aca0de85e8df6', 'user', 0, '2022-02-26 21:32:59'),
(11, 'robert', '12e9293ec6b30c7fa8a0926af42807e929c1684f', 'user', 0, '2022-02-26 21:33:04'),
(12, 'olie', '42a02c3f5e27b1a87d8b6e055c34e9fc534e984c', 'user', 0, '2022-02-26 21:33:12'),
(13, 'frank', '86a8c2da8527a1c6978bdca6d7986fe14ae147fe', 'user', 0, '2022-02-26 21:33:17'),
(14, 'rohim', 'b6be459e0919ebb07202d11c114d857e4bf4b89b', 'user', 0, '2022-02-26 21:33:25'),
(15, 'korim', '478153ed370153e39ff185065c02d1fc5cfc536b', 'user', 0, '2022-02-26 21:33:30'),
(16, 'rahul', '8b2357213c6def665b79c46ac43e562ce5e10eef', 'user', 0, '2022-02-26 21:33:38'),
(17, 'zasir', '4c006b4e0fee53ea707c38a62467bae3721fc9b8', 'user', 0, '2022-02-26 21:34:03'),
(18, 'sajal', '5f6d0f4235a30a6fca46963029caa5d271cdf2db', 'user', 0, '2022-02-26 21:34:09'),
(19, 'yusuke', 'efb51cfa9daed06a8e6e4ff93a97daa94dcae41d', 'user', 0, '2022-02-26 21:34:17'),
(20, 'goku', '7dbd464b96cc2897507be8a475926dbe173ad452', 'user', 0, '2022-02-26 21:34:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
