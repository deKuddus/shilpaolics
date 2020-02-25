-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2019 at 11:59 AM
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `counter` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `images`, `author`, `content`, `category`, `created_at`, `counter`, `is_active`) VALUES
(1, 'Sed ut perspiciatis unde omnis iste natus error', 'test-blog', 'blog_image/blog-img4.jpg', 'admin', 'Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros. Lorem ipsum dolor sit amet, consecvtetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor, dapibus eget, elementum vel.\r\n\r\nAenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros.\r\n\r\nLorem ipsum dolor sit amet, verenam operibus furiam conclusoque sponte profundo. Conservus mihi esse haec aliquam inlido laetare quod eam ad per. Antiochia videns quia quod non ait est Apollonius non dum animae tertio eam ad te princeps ea docentur Hellenicus ut diem finito convocatis secessit civitatis civium takimata. Parem luctu gubernatori usque vero rex Dionysiadi me missam ne alicuius altum pervenit est amet amet Cur meae.\r\nNam elit agna,endrerit sit amet, tincidunt ac, viverra sed, nulla. Donec porta diam eu massa. Quisque diam lorem, interdum vitae,dapibus ac, scelerisque vitae, pede. Donec eget tellus non erat lacinia fermentum. Donec in velit vel ipsum auctor pulvinar. Vestibulum iaculis lacinia est. Proin dictum elementum velit. Fusce euismod consequat ante. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sed dolor. Aliquam congue fermentum nisl.\r\n\r\nAenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros.\r\n\r\nInteger rutrum ante eu lacus.Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse sollicitudin velit sed leo. Ut pharetra augue nec augue.', 1, '2019-12-14 09:03:33', 80, 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `is_active`) VALUES
(1, 'Audio', 1),
(2, 'Diet & Fitness', 1);

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

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `post_id`, `name`, `email`, `website`, `message`, `created_at`, `is_active`) VALUES
(1, 1, 'Md Abdul Kuddus', 'ma.kuddus37@gmail.com', 'test', 'Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque.', '2019-12-15 06:17:45', 1),
(2, 1, 'Md Abdul Kuddus', 'admin@admin.com', 'sdfd', 'or. Aliquam congue fermentum nisl. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. I', '2019-12-15 06:22:33', 1),
(3, 1, 'Md Abdul Kuddus', 'ma.kuddus37@gmail.com', 'sdfd', 'm congue fermentum nisl. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel, scelerisque eget, malesuada at, neque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla fa', '2019-12-15 06:33:18', 1);

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
(1, 'samsung', 'brand_picture/a81044be5db8c3bf453c4851be5717e1.jpg', 1),
(2, 'polo', 'brand_picture/4e60ea514ff702a3edb4e49bdb257592.jpg', 1),
(3, 'hp', 'brand_picture/95fc585502dce99a689c78e363eeb11f.jpg', 1),
(4, 'walton', 'brand_picture/4e60ea514ff702a3edb4e49bdb257592.jpg', 1);

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
  `brand` varchar(80) NOT NULL,
  `picture` varchar(80) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `pid`, `sort_order`, `is_active`, `show_home`, `brand`, `picture`, `description`) VALUES
(24, 'Cloth', 0, NULL, 1, 1, '0', '', ''),
(25, 'Electronics', 0, NULL, 1, 1, '0', '', ''),
(26, 'T-Shirt', 24, NULL, 1, 0, '0', '', ''),
(27, 'Mobile', 25, NULL, 1, 0, '0', '', ''),
(28, 'blender 001', 29, NULL, 1, 0, '0', '', ''),
(29, 'Blender', 25, NULL, 1, 0, '0', '', ''),
(30, 'Watch', 25, NULL, 1, 0, '0', '', ''),
(31, 'Pant', 24, NULL, 1, 0, '0', '', ''),
(32, 'Laptop1', 25, NULL, 1, 0, '0', '', ''),
(33, 'New Parent', 0, NULL, 1, 1, '0', '', ''),
(34, 'Sub Cat', 33, NULL, 1, 1, '0', '', ''),
(35, 'Sub Sub Cat', 34, NULL, 1, 1, '0', '', ''),
(36, 'seiko', 30, NULL, 1, 0, '\"samsung,hp\"', 'category_picture/9422859074837e340bfce94d839ca1ab.gif', '');

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
(1, 'Md Abdul Kuddus', 'admin', 'ma.kuddus37@gmail.com', '123456', '01834776137', 'chittagong', 'Bangladesh', 'Chittagong', 'chittagong', '4225', '2019-12-09 12:00:00', './customer_images/481c98029d0a55f888ab41a1f2fb90bd.png', 1);

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
  `best_selling` int(11) NOT NULL DEFAULT '0',
  `addtional_fields` text,
  `options` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `size` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `feature_image1`, `feature_image2`, `category_id`, `sub_category_id`, `brand_id`, `unit`, `tags`, `purchase_price`, `sale_price`, `shipping_cost`, `discount`, `discount_type`, `tax`, `tax_type`, `color`, `best_selling`, `addtional_fields`, `options`, `is_active`, `size`) VALUES
(1, 'Samsung A50 Mobile', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam libero assumenda, eos est magni quis distinctio alias facilis corporis. Laboriosam excepturi explicabo ipsam necessitatibus, alias labore dolores aperiam veniam enim.', 'product_image/265930ace26e474767df49f6a9a59dfe.jpeg', 'product_image/265930ace26e474767df49f6a9a59dff.jpeg', 27, 1, 1, 'pices', 'mobile, samsung', '30', '40', '4', '8', '%', '2', 'percent', 'black,red', 5, 'test', 'test', 1, ''),
(2, 'php notebook pro laptop', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nulla consequatur maxime sit fugit doloribus omnis, hic accusamus a magni corporis tenetur, pariatur praesentium debitis sunt atque consequuntur ad. Omnis?', 'product_image/265930ace26e474767df49f6a9a59dfg.jpg', 'product_image/265930ace26e474767df49f6a9a59d1r2.jpeg', 32, 0, 3, 'pices', 'laptop.notebook', '50', '70', '10', NULL, NULL, NULL, NULL, 'black,blue', 6, NULL, NULL, 1, ''),
(3, 'Full Sleeves T-shirt mens ', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nulla consequatur maxime sit fugit doloribus omnis, hic accusamus a magni corporis tenetur, pariatur praesentium debitis sunt atque consequuntur ad. Omnis?', 'product_image/0c86469241f710f214e391f4a6a361d5.jpg', 'product_image/265930ace26e474767df4de45a9a59dfe.jpeg', 26, 3, 2, 'pices', 'tshirt, cloths', '50', '60', '10', '6', 'taka', NULL, NULL, 'green,white', 9, NULL, NULL, 1, 'X,XL,XXL'),
(4, 'Blender', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam nulla consequatur maxime sit fugit doloribus omnis, hic accusamus a magni corporis tenetur, pariatur praesentium debitis sunt atque consequuntur ad. Omnis?', 'product_image/265930ace26e474767df49f6a9a59df1.jpeg', 'product_image/265930ace26e474767df49f6a9a59d123.jpeg', 29, 3, 4, 'pices', 'blender, electronics,mixer', '50', '40', '10', '0', NULL, NULL, NULL, 'blue,red', 1, NULL, NULL, 1, '');

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
  `is_checked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `code`, `customer_id`, `guest_details`, `product_details`, `shipping_address`, `vat`, `vat_percent`, `shipping_cost`, `payment_type`, `payment_status`, `payment_details`, `payment_at`, `grand_total`, `sales_at`, `delivery_at`, `delivery_status`, `is_checked`) VALUES
(1, '51576131868', 0, '{\"name\":\"xczxcxc\",\"email\":\"ssssssss\",\"contact\":\"ssssssss\",\"city\":\"ssssssss\",\"address\":\"ssssssss\",\"zip_code\":\"ssssssss\",\"country\":\"Angola\",\"state\":\"Cabinda\"}', '{\"product_data\":[{\"id\":\"1\",\"qty\":1,\"option\":{\"color\":\"black,red\",\"size\":\"X,XL\"},\"price\":36.8,\"name\":\"Samsung A50 Mobile\",\"shiping\":50,\"tax\":5,\"image\":\"product_image\\/265930ace26e474767df49f6a9a59dfe.jpeg\",\"cupon\":\"er78e\",\"sub_total\":36.8},{\"id\":\"3\",\"qty\":1,\"option\":{\"color\":\"green,white\",\"size\":\"X,XL\"},\"price\":54,\"name\":\"Full Sleeves T-shirt mens \",\"shiping\":50,\"tax\":5,\"image\":\"product_image\\/0c86469241f710f214e391f4a6a361d5.jpg\",\"cupon\":\"er78e\",\"sub_total\":54}]}', '{\"name\":\"xczxcxc\",\"email\":\"ssssssss\",\"contact\":\"ssssssss\",\"city\":\"ssssssss\",\"address\":\"ssssssss\",\"zip_code\":\"ssssssss\",\"country\":\"Angola\",\"state\":\"Cabinda\"}', '2', '0', '50', 'cod', 1, '', '', '90.8', '12-12-2019,06:24:28 AM', '', 2, 0),
(2, '301576143185', 1, '{\"name\":\"Md Abdul Kuddus\",\"email\":\"ma.kuddus37@gmail.com\",\"contact\":\"01834776137\",\"city\":\"chittagong\",\"address\":\"chittagong\",\"zip_code\":\"4225\",\"country\":\"-1\",\"state\":null}', '{\"product_data\":[{\"id\":\"3\",\"qty\":1,\"option\":{\"color\":\"green,white\",\"size\":\"X,XL\"},\"price\":54,\"name\":\"Full Sleeves T-shirt mens \",\"shiping\":50,\"tax\":5,\"image\":\"product_image\\/0c86469241f710f214e391f4a6a361d5.jpg\",\"cupon\":\"er78e\",\"sub_total\":54},{\"id\":\"1\",\"qty\":1,\"option\":{\"color\":\"black,red\",\"size\":\"X,XL\"},\"price\":36.8,\"name\":\"Samsung A50 Mobile\",\"shiping\":50,\"tax\":5,\"image\":\"product_image\\/265930ace26e474767df49f6a9a59dfe.jpeg\",\"cupon\":\"er78e\",\"sub_total\":36.8},{\"id\":\"2\",\"qty\":4,\"option\":{\"color\":\"black,blue\",\"size\":\"X,XL\"},\"price\":70,\"name\":\"php notebook pro laptop\",\"shiping\":50,\"tax\":5,\"image\":\"product_image\\/265930ace26e474767df49f6a9a59dfg.jpg\",\"cupon\":\"er78e\",\"sub_total\":70}]}', '{\"name\":\"Md Abdul Kuddus\",\"email\":\"ma.kuddus37@gmail.com\",\"contact\":\"01834776137\",\"city\":\"chittagong\",\"address\":\"chittagong\",\"zip_code\":\"4225\",\"country\":\"-1\",\"state\":null}', '2', '0', '50', 'cod', 1, '', '', '160.8', '12-12-2019,09:33:05 AM', '', 2, 0),
(3, '681576301577', 1, '{\"name\":\"Md Abdul Kuddus\",\"email\":\"ma.kuddus37@gmail.com\",\"contact\":\"01834776137\",\"city\":\"chittagong\",\"address\":\"chittagong\",\"zip_code\":\"4225\",\"country\":\"Barbados\",\"state\":\"Saint Peter\"}', '{\"product_data\":[{\"id\":\"3\",\"qty\":1,\"option\":{\"color\":\"green,white\",\"size\":\"X,XL\"},\"price\":54,\"name\":\"Full Sleeves T-shirt mens \",\"shiping\":50,\"tax\":5,\"image\":\"product_image\\/0c86469241f710f214e391f4a6a361d5.jpg\",\"cupon\":\"er78e\",\"sub_total\":54},{\"id\":\"1\",\"qty\":2,\"option\":{\"color\":\"black,red\",\"size\":\"X,XL\"},\"price\":36.8,\"name\":\"Samsung A50 Mobile\",\"shiping\":50,\"tax\":5,\"image\":\"product_image\\/265930ace26e474767df49f6a9a59dfe.jpeg\",\"cupon\":\"er78e\",\"sub_total\":36.8}]}', '{\"name\":\"Md Abdul Kuddus\",\"email\":\"ma.kuddus37@gmail.com\",\"contact\":\"01834776137\",\"city\":\"chittagong\",\"address\":\"chittagong\",\"zip_code\":\"4225\",\"country\":\"Barbados\",\"state\":\"Saint Peter\"}', '2', '0', '50', 'rocket', 1, '', '', '90.8', '14-12-2019,05:32:57 AM', '', 1, 0);

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
(1, 'Md Abul Kuddus', 'kuddus', 1, 'kuddus@gmail.com', '234567', '12345678', 'user_picture/default.png', '', 1),
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
(9, 1, 2, 1),
(10, 1, 1, 1);

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
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_status` (`delivery_status`),
  ADD KEY `payment_status` (`payment_status`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_status`
--
ALTER TABLE `delivery_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`payment_status`) REFERENCES `payment_status` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`delivery_status`) REFERENCES `delivery_status` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
