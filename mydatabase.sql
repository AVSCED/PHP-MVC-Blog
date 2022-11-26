-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Nov 15, 2022 at 12:17 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `blog_title` varchar(100) NOT NULL,
  `blog_content` varchar(500) NOT NULL,
  `user_id` int NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_title`, `blog_content`, `user_id`, `date`) VALUES
(66, 'ferg1111', 'regregregvdvewvwevew', 2, '2022-11-15'),
(69, 'grgreg', 'regregregergerewfefewfewfwe', 1, '2022-11-15'),
(70, '5443 re re4324242', 'greg rg re gre g', 1, '2022-11-15'),
(71, '43gggfgfdd', 'ewewfwefw', 1, '2022-11-15'),
(73, 'vdsvdsv323266666666', 'sdvdsvsdvsdvdsvsdv', 2, '2022-11-15'),
(74, '54fgreger', 'gregregregreger', 2, '2022-11-15'),
(77, 'f ewf ewf e', 'wfew few fe ewf wfe ', 13, '2022-11-15'),
(78, 'secfef ewfwe edited by admin', 'f ewfe fwef wefewfe weefw fewfewf wefwefweffewfewf ew  fwe few', 13, '2022-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `approved` int NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `approved`, `type`) VALUES
(1, 'admin', 'admin@admin.com', '123', 1, 'admin'),
(2, 'abc', 'abc@abc.com', '123', 1, 'user'),
(3, 'aa', 'aa@aa', '123', 1, 'user'),
(4, 'asd', 'asd@asd', '123', 0, 'user'),
(5, 'qwer', 'qw@qw', '123', 0, 'user'),
(10, 'qwe', 'qwe@qwe', '123', 1, 'user'),
(13, 'new', 'new@new', '12', 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
