-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Структура на таблица `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `ctime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `messages`
--

INSERT INTO `messages` (`id`, `username`, `msg`, `ctime`) VALUES
(281, 'Veroni2000', ';D', '17:25:29'),
(282, 'Veroni2000', ';D', '17:28:05'),
(283, 'Veroni2000', ';D', '17:29:28'),
(284, 'Veroni2000', 'dsf', '17:48:21'),
(285, 'Veroni2000', 'sfzdsf', '17:48:33'),
(286, 'Veroni2000', 'sfzdsf', '17:48:40'),
(287, 'Veroni2000', ';D', '17:50:05'),
(288, 'Veroni2000', ';D', '17:50:40'),
(289, 'Iva13', 'sfsdf', '17:50:47'),
(290, 'Iva13', 'gotina Iva', '17:50:57'),
(291, 'Veroni2000', ':)', '17:51:03'),
(292, 'Iva13', 'gotina Iva', '17:51:12'),
(293, 'Iva13', ';)', '17:51:48'),
(294, 'Iva13', ':)', '17:51:51'),
(295, 'Iva13', ';)', '17:52:01'),
(296, 'Veroni2000', ';D', '17:52:11'),
(297, 'Iva13', 'sfsf', '17:52:17'),
(298, 'Iva13', 'яка', '17:56:45'),
(299, 'Iva13', 'оаьяояо', '17:57:04'),
(300, 'Veroni2000', 'ffff', '18:29:46'),
(301, 'Veroni2000', 'ffff', '18:29:58'),
(302, 'Veroni2000', 'ffff', '18:30:33'),
(303, 'Veroni2000', 'fffdfd', '18:30:39'),
(304, 'Veroni2000', 'fffdfd', '18:48:02');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'Veroni2000', '123456789'),
(2, 'Iva13', 'ivaeyaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_id` (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
