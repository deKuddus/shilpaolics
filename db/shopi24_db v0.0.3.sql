-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 11:06 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopi24_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `description`, `picture`, `created_by`, `created_at`, `is_active`) VALUES
(10, 'Demo Name 001', '', 'brand_picture/4e60ea514ff702a3edb4e49bdb257592.jpg', 0, '2019-11-30 07:23:43', 1),
(11, 'SsadaSDAD', '', 'brand_picture/4e8ca27485a15966d8fb2d713564cc00.jpg', 0, '2019-11-30 10:56:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `pid` int(11) NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `brand` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `pid`, `description`, `picture`, `brand`, `created_by`, `created_at`, `is_active`) VALUES
(6, 'Cat 1', 0, 'desc', 'category_picture/41c6ffd09bc55594a31e0e2f4d062fcb.jpg', '["10","11"]', 0, '2019-11-30 10:38:13', 1),
(8, 'Cat 1', 6, 'desc', 'category_picture/41c6ffd09bc55594a31e0e2f4d062fcb.jpg', '["10","11"]', 0, '2019-11-30 10:38:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `detail` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `detail`) VALUES
(42, 'Demo Name 001', ''),
(43, 'Demo Name', ''),
(45, 'prod 211hggc', ''),
(46, 'ssada', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `picture`) VALUES
(109, 43, 'product_picture/f5506fe3cc92e9494c243bc0d120ca0e.jpg'),
(110, 43, 'product_picture/37c5954007abcf3131e9a7c9303d7c11.jpg'),
(111, 45, 'product_picture/dd72225af2b95a727509a9760c0bbf0e.jpg'),
(115, 42, 'product_picture/e88d443df2f6cfb6cc863a14767311e2.jpg'),
(116, 45, 'product_picture/da677f039ab23186f40c68f0c745b7a7.jpg'),
(117, 45, 'product_picture/15bb61ee6ef10495cb1ceeb1c5f7872f.jpg'),
(118, 45, 'product_picture/5574a72b3759c266c02ecd6356d5425c.jpg'),
(119, 45, 'product_picture/c0f3fa587793bc55583fd738008399ad.jpg'),
(124, 45, 'product_picture/f612a8ee700c4460ef90398e14228a19.jpg'),
(125, 45, 'product_picture/533bc21d9e2b502c2a3c6657165996c3.jpg'),
(126, 45, 'product_picture/feaf3f06e624952801639380deddfad2.jpg'),
(127, 45, 'product_picture/2cbb407dc04c10cb99735bfe9e95d189.jpg'),
(144, 42, 'product_picture/4cf00489b8ee8bfbd2951e302778b152.jpg'),
(145, 46, 'product_picture/0c86469241f710f214e391f4a6a361d5.jpg'),
(146, 46, 'product_picture/250078c8859278ef45baf82bf39b26b4.jpg'),
(147, 46, 'product_picture/38f6e9c87950a5ddff3d4165b8a3fde6.jpg'),
(148, 46, 'product_picture/265930ace26e474767df49f6a9a59dfe.jpg'),
(149, 46, 'product_picture/5e30a0d3697a1460d79f7b4936ef5b11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role_id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `address`, `email`, `password`, `role_id`, `picture`, `created_at`, `created_by`, `is_active`) VALUES
(5, 'Demo Name', '345678900900', 'Address 001', 'demo@demo.com', '12345678', 1, 'user_picture/a9abb68b15f4c5dbfb17ec885bc2bec5.jpg', '2019-11-27 08:48:16', 0, 1),
(7, 'Demo Name', '345678900900', 'kljljkljkljll', 'demo1@demo.com', '11111111', 1, 'user_picture/default.png', '2019-11-27 07:09:25', 0, 1),
(11, 'prod 211', '345678900900', 'Address 001', 'dem11o@demo.com', '11111111', 1, 'user_picture/default.png', '2019-11-27 08:53:40', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
