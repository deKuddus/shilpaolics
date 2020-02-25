-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2019 at 10:27 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  `show_home` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `pid`, `sort_order`, `is_active`, `show_home`) VALUES
(24, 'Cloth', 0, NULL, 1, 1),
(25, 'Electronics', 0, NULL, 1, 1),
(26, 'T-Shirt', 24, NULL, 1, 0),
(27, 'Mobile', 25, NULL, 1, 0),
(28, 'blender 001', 29, NULL, 1, 0),
(29, 'Blender', 25, NULL, 1, 0),
(30, 'Watch', 25, NULL, 1, 0),
(31, 'Pant', 24, NULL, 1, 0),
(32, 'Laptop1', 25, NULL, 1, 0),
(33, 'New Parent', 0, NULL, 1, 1),
(34, 'Sub Cat', 33, NULL, 1, 1),
(35, 'Sub Sub Cat', 34, NULL, 1, 1),
(36, 'Male', 31, NULL, 1, 0),
(37, 'Sub cat 001', 33, NULL, 1, 1),
(38, 'Book', 0, NULL, 1, 0),
(39, 'class 1', 24, NULL, 1, 1),
(40, 'Class 2', 38, NULL, 1, 0),
(41, 'denim', 36, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(80) NOT NULL,
  `state` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `joining_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `feature_image1` varchar(80) NOT NULL,
  `feature_image2` varchar(80) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `unit` varchar(80) NOT NULL,
  `tags` text NOT NULL,
  `purchase_price` varchar(10) NOT NULL,
  `sale_price` varchar(10) NOT NULL,
  `shipping_cost` varchar(10) NOT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `discount_type` varchar(10) DEFAULT NULL,
  `tax` varchar(10) DEFAULT NULL,
  `tax_type` varchar(10) DEFAULT NULL,
  `color` text,
  `addtional_fields` text,
  `options` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `feature_image1`, `feature_image2`, `category_id`, `sub_category_id`, `brand_id`, `unit`, `tags`, `purchase_price`, `sale_price`, `shipping_cost`, `discount`, `discount_type`, `tax`, `tax_type`, `color`, `addtional_fields`, `options`, `is_active`) VALUES
(1, 'Samsung A50 Mobile', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam libero assumenda, eos est magni quis distinctio alias facilis corporis. Laboriosam excepturi explicabo ipsam necessitatibus, alias labore dolores aperiam veniam enim.', 'product_image/265930ace26e474767df49f6a9a59dfe.jpeg', 'product_image/265930ace26e474767df49f6a9a59dff.jpeg', 27, 2, 2, 'pices', 'mobile, samsung', '30', '40', '4', '8', '%', '2', 'percent', 'black,red', 'test', 'test', 1),
(2, 'php notebook pro laptop', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nulla consequatur maxime sit fugit doloribus omnis, hic accusamus a magni corporis tenetur, pariatur praesentium debitis sunt atque consequuntur ad. Omnis?', 'product_image/265930ace26e474767df49f6a9a59dfg.jpg', 'product_image/265930ace26e474767df49f6a9a59d1r2.jpeg', 32, 3, 3, 'pices', 'laptop.notebook', '50', '70', '10', NULL, NULL, NULL, NULL, 'black,blue', NULL, NULL, 1),
(3, 'Full Sleeves T-shirt mens ', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nulla consequatur maxime sit fugit doloribus omnis, hic accusamus a magni corporis tenetur, pariatur praesentium debitis sunt atque consequuntur ad. Omnis?', 'product_image/0c86469241f710f214e391f4a6a361d5.jpg', 'product_image/265930ace26e474767df4de45a9a59dfe.jpeg', 26, 3, 2, 'pices', 'tshirt, cloths', '50', '40', '10', '0', NULL, NULL, NULL, 'green,white', NULL, NULL, 1),
(4, 'Blender', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nulla consequatur maxime sit fugit doloribus omnis, hic accusamus a magni corporis tenetur, pariatur praesentium debitis sunt atque consequuntur ad. Omnis?', 'product_image/265930ace26e474767df49f6a9a59df1.jpeg', 'product_image/265930ace26e474767df49f6a9a59d123.jpeg', 29, 3, 2, 'pices', 'blender, electronics,mixer', '50', '40', '10', '0', NULL, NULL, NULL, 'blue,red', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`) VALUES
(1, 1, 'product_image/265930ace26e474767df49f6a9a59dfe.jpeg', '2019-12-02 08:44:30'),
(2, 2, 'product_image/265930ace26e474767df49f6a9a59dfg.jpg', '2019-12-02 08:44:10'),
(3, 3, 'product_image/0c86469241f710f214e391f4a6a361d5.jpg', '2019-12-02 08:44:56'),
(4, 4, 'product_image/265930ace26e474767df49f6a9a59df1.jpeg', '2019-12-02 08:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` text,
  `image` varchar(80) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `offer` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `image`, `url`, `is_active`, `offer`) VALUES
(1, 'first slide title', 'first description', 'slider/slide-1.jpg', 'null', 1, ''),
(2, 'second slide title', 'second description', 'slider/slide-2.jpg', 'null', 1, ''),
(3, 'third banner title', 'third banner description', 'slider/slide-3.jpg', 'null', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `is_active`) VALUES
(1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
