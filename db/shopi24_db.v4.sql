-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2020 at 08:22 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.4

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
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `images` varchar(80) NOT NULL,
  `author` varchar(80) NOT NULL,
  `content` text NOT NULL,
  `category` int(11) NOT NULL,
  `sub_category` int(11) NOT NULL,
  `tags` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `counter` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `images`, `author`, `content`, `category`, `sub_category`, `tags`, `created_at`, `counter`, `is_active`) VALUES
(1, 'Place Autocomplete Address Form', 'seminar-for-childrens-to-know-about-future', 'blog_image/c5b61944c7116e50e8a655545acb8782.png', '1', '<p>asdfasdfasd</p>\n', 1, 3, '[\"11\"]', '2020-03-27 16:10:56', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `pid` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `pid`, `is_active`) VALUES
(1, 'Audio', 0, 1),
(2, 'Diet & Fitness', 0, 1),
(3, 'bangla song', 1, 1),
(4, 'english', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `name`, `is_active`) VALUES
(11, 'dfd', 1),
(12, 'dfd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `picture` varchar(80) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `picture`, `is_active`) VALUES
(1, 'samsung', 'brand_picture/698440e82dffb37384fa4a6f4d68b128.jpeg', 1),
(2, 'polo', 'brand_picture/4e60ea514ff702a3edb4e49bdb257592.jpg', 1),
(3, 'hp', 'brand_picture/95fc585502dce99a689c78e363eeb11f.jpg', 1),
(4, 'walton', 'brand_picture/4e60ea514ff702a3edb4e49bdb257592.jpg', 1),
(13, 'Mak', 'brand_picture/13da164cd08cd7f9657f9329bd43ea12.jpeg', 1),
(14, 'Samsung00', 'brand_picture/4f20e2f65b14814ccb5c25e9f34a26ca.jpg', 1),
(15, 'Samsung900', 'brand_picture/634819149.png', 1),
(16, 'Mak900', 'brand_picture/903130662.png', 1),
(17, 'Mak090', 'brand_picture/596246939.png', 1),
(18, 'Mak45678', 'brand_picture/109366143.png', 1),
(19, 'Makfghj', 'brand_picture/1161809809.png', 1);

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
  `show_home` tinyint(1) NOT NULL DEFAULT '0',
  `brand` varchar(80) DEFAULT NULL,
  `picture` varchar(80) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `pid`, `sort_order`, `is_active`, `show_home`, `brand`, `picture`, `description`) VALUES
(45, 'Electronics', 0, NULL, 1, 1, '\"samsung,hp,walton\"', 'category_picture/309893881.png', 'test category'),
(46, 'Cloths', 0, NULL, 1, 0, '\"polo\"', 'category_picture/848171263.png', 'sdafasdf'),
(47, 'Mobile', 45, NULL, 1, 0, '\"samsung,walton\"', 'category_picture/1378356692.png', 'dsafas'),
(48, 'T-shirt', 46, NULL, 1, 0, '\"polo\"', 'category_picture/1098369165.png', 'asdfa'),
(49, 'Laptop', 45, NULL, 1, 0, '\"samsung\"', 'category_picture/1ae07e67af1c6c02f5b191f3c402a191.jpg', 'test'),
(50, 'Watch', 45, NULL, 1, 0, '\"Mak\"', 'category_picture/7da4c772cc9657c7b5fae1a0a34b380e.jpg', 'test'),
(51, 'Kitchen', 51, NULL, 1, 0, '\"walton,Mak\"', 'category_picture/e7ce844e81dd9e24d8a2b6d5c2f065f8.jpg', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `is_active`) VALUES
(1, 'red', '2019-12-22 10:48:57', 1),
(2, 'black', '2019-12-22 10:48:57', 1),
(3, 'white', '2019-12-22 10:48:57', 1),
(4, 'brown', '2019-12-22 10:48:57', 1),
(5, 'pink', '2019-12-22 10:48:57', 1),
(6, 'blue', '2019-12-22 10:48:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `config_key` varchar(30) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `value` text,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `config_key`, `title`, `value`, `status`) VALUES
(6, 'site_logo', 'asdfasdf', 'logo_image/5521b451d038904de13db32d8b7eb400.png', 1),
(7, 'site_logo', 'sdsd', 'logo_image/a9547b881ee64173ac4a98e74de9ece7.jpg', 0),
(8, 'site_logo', 'dsafad', 'logo_image/644acf47cf509827246fc6c29d8fee8f.jpg', 0),
(9, 'hot_prouduct', 'Hot Product Show', '1', 1),
(10, 'best_selling', 'Best Seller Product Show', '1', 1),
(11, 'new_arrival_show', 'Show New Arrival', '1', 1),
(12, 'shipping_charge', 'Product Shipping Charge', '100', 1),
(13, 'free_shipping_limit', 'Free Shipping Above', '5000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE `cupon` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `code` varchar(50) NOT NULL,
  `specification` text NOT NULL,
  `added_by` varchar(80) DEFAULT NULL,
  `till` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `discount_on` int(11) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `discount_value` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cupon`
--

INSERT INTO `cupon` (`id`, `title`, `code`, `specification`, `added_by`, `till`, `discount_on`, `discount_type`, `discount_value`, `status`) VALUES
(1, 'PAHELA BOISHAKH', 'o7ro4rogoh', 'TEST SPECIFICATION', NULL, '2020-03-21 17:08:18', 2, 1, '500', 1);

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
  `images` varchar(100) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `username`, `email`, `password`, `contact`, `address`, `country`, `state`, `city`, `zip_code`, `joining_date`, `images`, `is_active`) VALUES
(1, 'Md Abdul Kuddus', 'admin', 'ma.kuddus37@gmail.com', '123456', '01834776137', 'chittagong', 'Bangladesh', 'Chittagong', 'chittagong', '4225', '2019-12-09 12:00:00', './customer_images/481c98029d0a55f888ab41a1f2fb90bd.png', 1),
(2, 'Ananda Mohan', 'ananda', 'ananda@gmail.com', '123456789', '01780410319', 'chittagong', 'Bangladesh', 'Rangamati', 'chittagong', '4225', '2020-01-30 19:37:02', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status`
--

CREATE TABLE `delivery_status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_status`
--

INSERT INTO `delivery_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'on-delivery'),
(3, 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `discount_on`
--

CREATE TABLE `discount_on` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discount_on`
--

INSERT INTO `discount_on` (`id`, `name`, `is_active`) VALUES
(1, 'all_products', 1),
(2, 'product', 1),
(3, 'category', 1),
(4, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'success');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `privacy` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `privacy`, `status`) VALUES
(1, '&lt;h3&gt;Introduction&lt;/h3&gt;\r\n\r\n&lt;p&gt;The domain name www.rokomari.com (referred to as &amp;quot;Website&amp;quot;) is owned by Onnorokom Web Services Limited a company incorporated under the Companies Act, 1994(Act XVIII of 1994).&lt;/p&gt;\r\n\r\n&lt;p&gt;By accessing this Site, you confirm your understanding of the Terms of Use. If you do not agree to these Terms, you shall not use this website. The Site reserves the right to change, modify, add, or remove portions of these Terms at any time. Changes will be effective when posted on the Site with no other notice provided. Please check these Terms of Use regularly for updates. Your continued use of the Site following the posting of changes to these Terms of Use constitutes your acceptance of those changes.&lt;/p&gt;\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `purchase_price` varchar(10) NOT NULL,
  `sale_price` varchar(10) NOT NULL,
  `shipping_cost` varchar(10) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `discount_type` varchar(10) DEFAULT NULL,
  `tax` varchar(10) DEFAULT NULL,
  `tax_type` varchar(10) DEFAULT NULL,
  `description` text NOT NULL,
  `feature_image1` varchar(80) DEFAULT NULL,
  `feature_image2` varchar(80) DEFAULT NULL,
  `unit` varchar(80) NOT NULL,
  `tags` text NOT NULL,
  `color` text,
  `size` varchar(80) DEFAULT NULL,
  `best_selling` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `special_price` int(11) DEFAULT NULL,
  `start_from` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  `addtional_fields` text,
  `options` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `brand_id`, `category_id`, `sub_category_id`, `purchase_price`, `sale_price`, `shipping_cost`, `discount`, `discount_type`, `tax`, `tax_type`, `description`, `feature_image1`, `feature_image2`, `unit`, `tags`, `color`, `size`, `best_selling`, `quantity`, `type`, `special_price`, `start_from`, `end_at`, `addtional_fields`, `options`, `is_active`) VALUES
(66, 'This is first product', 1, 45, 47, '200', '2000', '10', '10', '1', '10', '1', 'afsf', 'product_picture/f4b80f35d2729bb9fc11e1926141bf62.jpeg', 'product_picture/c0c4cbe6e5d49c4653c8b18739096b58.jpg', '1', '[\"2\"]', '[\"3\"]', '[\"3\"]', 0, 0, '1', 200, '2020-03-26', '2020-03-28', NULL, NULL, 1);

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
-- Table structure for table `product_optional_image`
--

CREATE TABLE `product_optional_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_optional_image`
--

INSERT INTO `product_optional_image` (`id`, `product_id`, `picture`, `is_active`) VALUES
(6, 53, 'product_picture/ab0c7fa49af06abaa9bd3105487230b8.jpeg', 1),
(7, 53, 'product_picture/ab0c7fa49af06abaa9bd3105487230b8.jpeg', 1),
(8, 53, 'product_picture/ab0c7fa49af06abaa9bd3105487230b8.jpeg', 1),
(9, 53, 'product_picture/ab0c7fa49af06abaa9bd3105487230b8.jpeg', 1),
(10, 53, 'product_picture/ab0c7fa49af06abaa9bd3105487230b8.jpeg', 1),
(11, 54, 'product_picture/6879dabbc1d5d0fb2172a2d7ebfe1e8e.jpeg', 1),
(12, 54, 'product_picture/6879dabbc1d5d0fb2172a2d7ebfe1e8e.jpeg', 1),
(13, 54, 'product_picture/6879dabbc1d5d0fb2172a2d7ebfe1e8e.jpeg', 1),
(14, 54, 'product_picture/6879dabbc1d5d0fb2172a2d7ebfe1e8e.jpeg', 1),
(15, 54, 'product_picture/6879dabbc1d5d0fb2172a2d7ebfe1e8e.jpeg', 1),
(16, 55, 'product_picture/0bd0d94932eb2ac877b3f99faadeb35a.jpeg', 1),
(17, 55, 'product_picture/0bd0d94932eb2ac877b3f99faadeb35a.jpeg', 1),
(18, 55, 'product_picture/0bd0d94932eb2ac877b3f99faadeb35a.jpeg', 1),
(19, 55, 'product_picture/0bd0d94932eb2ac877b3f99faadeb35a.jpeg', 1),
(20, 55, 'product_picture/0bd0d94932eb2ac877b3f99faadeb35a.jpeg', 1),
(21, 56, 'product_picture/1cd0222e8ce5b6f5cdcc2a945368ab1d.jpeg', 1),
(22, 56, 'product_picture/4b83f70d5b09a9d1f11ea2c0115fde78.jpg', 1),
(23, 56, 'product_picture/4b83f70d5b09a9d1f11ea2c0115fde78.jpg', 1),
(24, 56, 'product_picture/4b83f70d5b09a9d1f11ea2c0115fde78.jpg', 1),
(25, 56, 'product_picture/4b83f70d5b09a9d1f11ea2c0115fde78.jpg', 1),
(26, 57, 'product_picture/6f73c591adb9b9b23a598af80f39bec6.jpeg', 1),
(27, 57, 'product_picture/6f73c591adb9b9b23a598af80f39bec6.jpeg', 1),
(28, 57, 'product_picture/6f73c591adb9b9b23a598af80f39bec6.jpeg', 1),
(29, 57, 'product_picture/6f73c591adb9b9b23a598af80f39bec6.jpeg', 1),
(30, 57, 'product_picture/6f73c591adb9b9b23a598af80f39bec6.jpeg', 1),
(31, 62, 'product_picture/d572694aa6f1b6744dec02602b0dbe03.jpeg', 1),
(32, 62, 'product_picture/d572694aa6f1b6744dec02602b0dbe03.jpeg', 1),
(33, 62, 'product_picture/d572694aa6f1b6744dec02602b0dbe03.jpeg', 1),
(34, 62, 'product_picture/d572694aa6f1b6744dec02602b0dbe03.jpeg', 1),
(35, 62, 'product_picture/d572694aa6f1b6744dec02602b0dbe03.jpeg', 1),
(36, 66, 'product_picture/3f057b3d4cf86c0a1ea035c6fdb3965f.jpg', 1),
(37, 66, 'product_picture/730a3cd4ef8de70d5dacfe1809f87bc3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(1, 'hot'),
(2, 'new'),
(3, 'regular');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `code` varchar(80) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `guest_details` text,
  `product_details` text NOT NULL,
  `shipping_address` text NOT NULL,
  `vat` varchar(5) NOT NULL,
  `vat_percent` varchar(5) NOT NULL,
  `shipping_cost` varchar(10) NOT NULL,
  `payment_type` varchar(80) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '1',
  `payment_details` text,
  `payment_at` varchar(30) DEFAULT NULL,
  `grand_total` varchar(10) NOT NULL,
  `sales_at` varchar(30) NOT NULL,
  `delivery_at` varchar(30) DEFAULT NULL,
  `delivery_status` int(11) NOT NULL DEFAULT '1',
  `is_checked` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `code`, `customer_id`, `guest_details`, `product_details`, `shipping_address`, `vat`, `vat_percent`, `shipping_cost`, `payment_type`, `payment_status`, `payment_details`, `payment_at`, `grand_total`, `sales_at`, `delivery_at`, `delivery_status`, `is_checked`) VALUES
(1, '811585228470', 0, '{\"name\":\"Md Abdul Kuddus\",\"email\":\"kuddus@gmail.com\",\"contact\":\"012345678955\",\"city\":\"chittagong\",\"address\":\"foys lake\",\"zip_code\":\"4225\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\"}', '{\"product_data\":[{\"id\":\"66\",\"qty\":1,\"option\":{\"color\":\"[\\\"3\\\"]\",\"size\":\"X,XL\"},\"price\":1990,\"name\":\"This is first product\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/f4b80f35d2729bb9fc11e1926141bf62.jpeg\",\"cupon\":\"er78e\",\"sub_total\":1990}]}', '{\"name\":\"Md Abdul Kuddus\",\"email\":\"kuddus@gmail.com\",\"contact\":\"012345678955\",\"city\":\"chittagong\",\"address\":\"foys lake\",\"zip_code\":\"4225\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\"}', '10', '0', '50', 'rocket', 1, '', '', '1990', '03-26-2020,01:14:30 PM', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `is_active`) VALUES
(1, 'x', '2019-12-22 10:51:10', 1),
(2, 'xl', '2019-12-22 10:51:10', 1),
(3, 'xxl', '2019-12-22 10:51:10', 1),
(4, 's', '2019-12-22 10:51:10', 1),
(5, 'm', '2019-12-22 10:51:10', 1);

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
(2, 'this is frist title', 'this is first descirption', 'slider_image/08bb231e6469bc042a7cbf5450c1b9d5.jpg', 'asdf', 1, ''),
(3, 'this is second title', 'this is second descirption', 'slider_image/6b80782355900c133421d440b634af38.jpg', 'dafadsf', 1, ''),
(4, 'this is third title', 'this is third description', 'slider_image/6b80782355900c133421d440b634af90.jpg', 'test', 1, ''),
(5, 'this is fourth title', 'this fourth description', 'slider_image/6b80782355900c133421d440b634af458.jpg', 'test', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `type` varchar(80) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rate` varchar(5) NOT NULL,
  `total` varchar(5) NOT NULL,
  `remarks` text NOT NULL,
  `created_by` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `type`, `category_id`, `product_id`, `quantity`, `rate`, `total`, `remarks`, `created_by`, `created_at`) VALUES
(25, '1', 25, 21, 33, '33', '1089', 'fasf', '1', '2019-12-30 12:54:42'),
(26, '1', 46, 33, 34, '34', '1156', 'test remarks', '1', '2019-12-31 12:45:42'),
(27, '1', 45, 32, 44, '44', '1936', 'adfasd', '1', '2019-12-31 12:46:09');

-- --------------------------------------------------------

--
-- Table structure for table `stock_type`
--

CREATE TABLE `stock_type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_type`
--

INSERT INTO `stock_type` (`id`, `name`, `is_active`) VALUES
(1, 'stock in', 1),
(2, 'stock out', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `is_active`) VALUES
(1, 'kitchen', '2019-12-22 09:52:39', 1),
(2, 'table', '2019-12-22 09:52:39', 1),
(3, 'mens wear', '2019-12-22 09:52:39', 1),
(4, 'electronics', '2019-12-22 09:52:39', 1),
(5, 'mobile', '2019-12-22 09:52:39', 1),
(6, 'computer', '2019-12-22 09:52:39', 1),
(7, 'shirt', '2019-12-22 09:52:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditons`
--

CREATE TABLE `terms_conditons` (
  `id` int(11) NOT NULL,
  `terms` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_conditons`
--

INSERT INTO `terms_conditons` (`id`, `terms`, `status`) VALUES
(3, '&lt;h3&gt;Introduction&lt;/h3&gt;\r\n\r\n&lt;p&gt;The domain name www.rokomari.com (referred to as &amp;quot;Website&amp;quot;) is owned by Onnorokom Web Services Limited a company incorporated under the Companies Act, 1994(Act XVIII of 1994).&lt;/p&gt;\r\n\r\n&lt;p&gt;By accessing this Site, you confirm your understanding of the Terms of Use. If you do not agree to these Terms, you shall not use this website. The Site reserves the right to change, modify, add, or remove portions of these Terms at any time. Changes will be effective when posted on the Site with no other notice provided. Please check these Terms of Use regularly for updates. Your continued use of the Site following the posting of changes to these Terms of Use constitutes your acceptance of those changes.&lt;/p&gt;\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `symbol` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `symbol`, `created_at`) VALUES
(1, '$', '2019-12-23 06:30:20'),
(2, '%', '2019-12-23 06:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `is_active`) VALUES
(1, 'kg', '2019-12-22 09:49:10', 1),
(2, 'pices', '2019-12-22 09:49:10', 1),
(3, 'gram', '2019-12-22 09:49:10', 1),
(4, 'box', '2019-12-22 09:49:10', 1),
(5, 'liter ', '2019-12-22 09:49:10', 1),
(6, 'ml', '2019-12-22 09:49:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `picture` varchar(80) NOT NULL,
  `address` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role_id`, `email`, `phone`, `password`, `picture`, `address`, `is_active`) VALUES
(1, 'Md Abul Kuddus', 'kuddus', 1, 'kuddus@gmail.com', '12345678', '12345678', 'user_picture/default.png', '', 1),
(2, 'Asifuzzaman', '', 2, 'admin@admin.com', '12345674444', '12345678', 'user_picture/c95f85fbf5bde0b7da19aab3ca2d2db6.png', 'test address', 1);

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
(11, 1, 47, 1),
(12, 1, 46, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_status`
--
ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_on`
--
ALTER TABLE `discount_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
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
-- Indexes for table `product_optional_image`
--
ALTER TABLE `product_optional_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_status` (`delivery_status`),
  ADD KEY `payment_status` (`payment_status`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_type`
--
ALTER TABLE `stock_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditons`
--
ALTER TABLE `terms_conditons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `delivery_status`
--
ALTER TABLE `delivery_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `discount_on`
--
ALTER TABLE `discount_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_optional_image`
--
ALTER TABLE `product_optional_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `stock_type`
--
ALTER TABLE `stock_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `terms_conditons`
--
ALTER TABLE `terms_conditons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`category`) REFERENCES `blog_category` (`id`);

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`payment_status`) REFERENCES `payment_status` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`delivery_status`) REFERENCES `delivery_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
