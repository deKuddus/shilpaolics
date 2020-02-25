-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2020 at 12:29 PM
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
(5, 'Bangladesh Railway Train Schedule, Ticket Booking 2022', 'railway-scheduleee', 'blog_image/984f885d8f854245c2dffbbeea56693d.jpeg', 'Md Abul Kuddus', '<p>Bangladesh Railway is the responsible organization which is liable for all types of train services in Bangladesh. Though the history of Railway is about more than 140 years old in our subcontinent but Bangladesh Railway established in 1971.</p>\n\n<p> </p>\n\n<p>At present, you can visit all division except Barishal by train. Bangladesh governtment takes initiative to visit Cox’s Bazar by Train.</p>\n\n<p>Bangladesh Railway runs 5 different types of train in throughout the country. These are</p>\n\n<ul>\n <li>City Services</li>\n <li>Inter-City Services</li>\n <li>Mail/Express Train</li>\n <li>International Train</li>\n <li>Commuter Train</li>\n</ul>\n\n<p> </p>\n\n<h2>Inter-City Train</h2>\n\n<p>There is a single train line from Dhaka to Narayanganj. There are several train services run in these route. All the train services are run by non-government organization of Bangladesh. These train departs from Kamlapur Railway to Narayanganj. Beside these, they have stoppages on Gandaria, Pagla , Fatuala and Chasada Stations</p>\n\n<p>&lt;input alt=\"\" src=\"https://www.ontaheen.com/wp-content/uploads/2019/01/Bangladesh-Railway-map.jpg\" style=\"height:653px; width:500px\" type=\"image\" /&gt;</p>\n\n<h2>Dhaka to Narayanganj Train Schedule</h2>\n\n<p>Almost every hour the trains run from Dhaka to Narayanganj. For your help I am going to provide you a complete schedule of Dhaka to Narayanganj Train. Check the Picture Below, Keep bookmark it for your future use</p>\n\n<p>&lt;input alt=\"\" src=\"https://www.ontaheen.com/wp-content/uploads/2019/01/Dhaka-to-Narayanganj-Train-Schedule.jpg\" style=\"height:524px; width:710px\" type=\"image\" /&gt;</p>\n\n<p>If you want to visit Narayanganj, you can also visit through the Dhaka to Joydebpur Train. I have made a separate post about Dhaka to Joydebpur Train Schedule. Check it <a href=\"https://www.ontaheen.com/dhaka-to-joydebpur-train-schedule/\">here</a>.</p>\n\n<p> </p>\n\n<h2>Intercity Trains</h2>\n\n<p>Intercity trains run accross the different city of Bangladesh. Almost all the city covers by Bangladesh Railway. There are several train available from Dhaka City. From Dhaka City the train available on the following route. <br>\nThey are</p>\n\n<h3>Intercity Train From Dhaka</h3>\n\n<ul>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-chittagong-train-ticket-price/\">Dhaka to Chittagong</a></li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-rajshahi-train-schedule/\">Dhaka to Rajshahi</a></li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-khulna-train-schedule/\">Dhaka to Khulna</a></li>\n <li><a href=\"https://www.ontaheen.com/dhaka-sylhet-train-schedule/\">Dhaka to Sylhet</a></li>\n <li>Dhaka to Kishoreganj</li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-jamalpur-train-schedule/\">Dhaka to Dewanganj</a></li>\n <li>Dhaka to Noakhali</li>\n <li>Dhaka to Nilphamari</li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-dinajpur-train-schedule/\">Dhaka to Lalmonirhat</a></li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-dinajpur-train-schedule/\">Dhaka to Dinajpur</a></li>\n <li>Dhaka to Tarakandi</li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-jamalpur-train-schedule/\">Dhaka to Jamalpur</a></li>\n <li>Dhaka to Lakshipur</li>\n <li>Dhaka to Rangpur</li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-brahmanbaria-train-schedule/\">Dhaka to Brahmanbaria</a></li>\n <li>Dhaka to Mymensingh</li>\n <li><a href=\"https://www.ontaheen.com/dhaka-comilla-train-schedule/\">Dhaka to Comilla</a></li>\n <li>Dhaka to Kushtia</li>\n <li>Dhaka to Feni</li>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-tangail-train-schedule/\">Dhaka to Tangail</a></li>\n</ul>\n\n<h2>International Trains</h2>\n\n<p>There are only two trains available in Bangladesh which runs Bangladesh to Kolkata. If anyone want to visit Dhaka to Kolkata or Khulna to Kolkata. These two trains also run in reverse road. Therefore, Kolakta to Dhaka or Khulna is also available. These trains are</p>\n\n<ul>\n <li><a href=\"https://www.ontaheen.com/maitree-express-dhaka-kalkata/\">Maitree Express</a></li>\n <li><a href=\"https://www.ontaheen.com/bandhan-express-kolkata-khulna/\">Bandhan Express</a></li>\n</ul>\n\n<p>Beside this there are many trains which runs from different districts of Bangladesh. We are here made a short list of all train with their details.</p>\n\n<h2>Train From Chittagong</h2>\n\n<p>If you are in Chittagong district , you can also visit from Chittagong by train. Here is the List of destination you can go.</p>\n\n<ul>\n <li><a href=\"https://www.ontaheen.com/dhaka-to-chittagong-train-ticket-price/\">Chittagong to Dhaka</a></li>\n <li><a href=\"https://www.ontaheen.com/chittagong-sylhet-train-schedule/\">Chittagong to Sylhet</a></li>\n <li>Chittagong to Comilla</li>\n <li>Chittagong to Mymensingh</li>\n <li>Chittagong to Brahmanbaria</li>\n <li>Chittagong to Chandpur</li>\n <li>Chittagong to Akhaura</li>\n <li>Chittagong to Bhairab Bazar</li>\n <li>Chittagong to Feni.</li>\n</ul>\n\n<h2>Bangladesh Railway Schedule pdf</h2>\n\n<p>If you are looking for the all Bangladesh Railway Schedule we are here to help you. We have created a PDF file which will help you to find all Bangladesh Railway Train Schedule.</p>\n\n<p>In this pdf, you will get all the train schedule at one place. In the following video i have added a overview of pdf and train Schedule.</p>\n\n<p>Beside this, there are numerous trains which run across the city of Bangladesh. There are many mail train, the commuter train is available. We will update the post very quickly. Keep in touch with us.</p>\n\n<h2>Bangladesh railway ticket price</h2>\n\n<p>There are many varieties of seats in Bangladesh railway trains. So the ticket price also varies on the base of seats quality. Bangladesh railway mainly maintained two types’ services. Non air conditioned and air conditioned. Shovan, Shovan Chair, First Class Seat, First Class Chair, and First Class Berth these types of seats are available in non air conditioned. On the other side AC Berth, AC Seat and Snigdha are available in air conditioned.  So Bangladesh railway ticket price also varies according to their services.</p>\n\n<h3>Dhaka to Chittagong and Chittagong to Dhaka Train Ticket Price</h3>\n\n<p>Dhaka to Chittagong and Chittagong to Dhaka has 5 train services. Here I’m trying to give you basic idea about Dhaka to Chittagong and Chittagong to Dhaka Train Ticket Price. The 5 train services which are travel in Dhaka to Chittagong and Chittagong to Dhaka, are given below</p>\n\n<p> </p>\n\n<ol>\n <li>onar Bangla Express</li>\n <li>Subarna Express</li>\n <li>Turna Express</li>\n <li>Mohanagar Provati</li>\n <li>Mohanagar Express</li>\n</ol>\n\n<p><strong>Sonar bangla express</strong> provides 4 types of train seat services. These are: Shovan chair, First Seat, Singdha, A/C Seat. Train ticket price also varies for each seat services. Dhaka to Chittagong and Chittagong to Dhaka Train Ticket Price of sonar bangla express are given below:</p>\n\n<ul>\n <li>Shavon chair- 600</li>\n <li>First Seat- 800</li>\n <li>Singdha- 1000</li>\n <li>A/C Seat-1100</li>\n</ul>\n\n<p><strong>Subarna express</strong> provide only two types of seat services. They are Shavon Chair and Singdha. Dhaka to Chittagong and Chittagong to Dhaka Train Ticket Price of Subarna express are given below:</p>\n\n<ul>\n <li>Shavon Chair- 380</li>\n <li>Singdha- 725</li>\n</ul>\n\n<p><strong>Turna Express</strong> provides three types of train seat service. Shavon Chair, Singdha, A/C Birth are available in Turna Express. Dhaka to Chittagong and Chittagong to Dhaka Train Ticket Price of Turna express are given below:</p>\n\n<ul>\n <li>Shavon Chair- 345,</li>\n <li>Singdha- 656,</li>\n <li>A/C Birth-1229</li>\n</ul>\n\n<p>Again <strong>Mohanagar Provati</strong> provides 4 seat services like sonar bangla express. Shovan chair, First Seat, Singdha, A/C Seat are also available in Mohanagar Provati. The ticket prices of each train seat services are like below:</p>\n\n<ul>\n <li>Shovan chair- 345,</li>\n <li>First Seat- 460,</li>\n <li>Singdha- 656,</li>\n <li>A/C Seat-788.</li>\n</ul>\n\n<p>On the other side <strong>Mohanagar Express</strong> provides three types of train seat services.  Shavon Chair, Singdha, A/C Birth are seat services of this train. The price lists are given below:</p>\n\n<ul>\n <li>Shavon Chair- 345,</li>\n <li>Singdha- 656,</li>\n <li>A/C Birth- 1229.</li>\n</ul>\n\n<p>This is all about Dhaka to Chittagong and Chittagong to Dhaka Train Ticket Price.</p>\n\n<h3>Dhaka to Sylhet Train Ticket Price</h3>\n\n<p>The train services which are available for Dhaka to Sylhet are given below. There are only 4 train services which make journey for Dhaka to Sylhet. They are:</p>\n\n<ol>\n <li>Parabat Express</li>\n <li>Joyantika Express  </li>\n <li>Upaban Express  </li>\n <li>Kalani Express.</li>\n</ol>\n\n<p>Here I have added Dhaka to Sylhet Train Ticket Price of each train.</p>\n\n<p><strong>Parabat</strong><strong> Express</strong> has 4 sitting service. Each service varies on price. Shavon Chair, First Seat, Singdha, A/C Seat these sitting services are available on his train. The price list is given below:     </p>\n\n<ul>\n <li>Shavon Chair-320</li>\n <li>First Seat- 425</li>\n <li>Singdha- 610    </li>\n <li>A/C Seat- 736</li>\n</ul>\n\n<p><strong>Joyantika Express</strong> has 4 types of sitting service. Shavon, Shavon Chair, First Seat, A/C Seat are available in this train service. The price list of each seat service is given below:</p>\n\n<ul>\n <li>Shavon- 265      </li>\n <li>Shavon Chair- 320           </li>\n <li>First Seat – 425</li>\n <li>A/C Seat- 736</li>\n</ul>\n\n<p><strong>Upaban Express</strong> has highest variety of seat service to travel from Dhaka to Sylhet. Shavon, Shavon Chair, First Seat, First Birth, A/C Birth, these seat services are avail in this train. The price list is below:</p>\n\n<ul>\n <li>Shavon-265</li>\n <li>Shavon Chair -320                                                                           </li>\n <li>First Seat-425</li>\n <li>First Birth- 690</li>\n <li>A/C Birth- 1149</li>\n</ul>\n\n<p><strong>Kalani Express</strong> has only three seat service. Shavon, Shavon Chair, First Seat, these seat services are avail in this. See the price list:</p>\n\n<ul>\n <li>Shavon-265</li>\n <li>Shavon Chair-320</li>\n <li>First Seat- 425</li>\n</ul>\n\n<h3>Chittagong to Sylhet Train Ticket Price</h3>\n\n<p>Two train services are available for Chittagong to Sylhet train route. Paharika Express and Uddayan Express these two trains are for this route. Now I’m going to discuss about Chittagong to Sylhet Train Ticket Price. From Chittagong to Sylhet Train, there have no a/c services.</p>\n\n<p><strong>Paharika Express</strong> has 4 types of seat services. Shavon, Shavon Chair, First Seat, Singdha, this types are avail in this train. See the price list of each compartment:</p>\n\n<ul>\n <li>Shavon- 315,</li>\n <li>Shavon Chair-375,</li>\n <li>First Seat- 500,</li>\n <li>Singdha- 719.</li>\n</ul>\n\n<p><strong>Uddayan Express</strong> also provides 4 types of sitting services. Shavon, Shavon Chair, First Birth, Singdha are services of this intercity trains. Price list is given below:</p>\n\n<ul>\n <li>Shavon- 315,</li>\n <li>Shavon Chair- 375,</li>\n <li>First Birth-795,</li>\n <li>Singdha- 719.</li>\n <li> </li>\n</ul>\n\n<h3>Dkaha to Rajshahi Train Ticket Price</h3>\n\n<p>There are three intercity train services are travel from Dkaha to Rajshahi train route. From these three trains air-conditioned seat services are avail in two intercity trains. Dkaha to Rajshahi Train Ticket Price varies with thjeir services. The name of this trains are:</p>\n\n<ol>\n <li>Silkcity express</li>\n <li>Padma Express</li>\n <li>Dhumketue Express.</li>\n</ol>\n\n<p><strong>Silkcity express</strong> has 3 varieties of sitting service. The price lists of each seat services are given below:</p>\n\n<ul>\n <li>Shavon Chair- 340</li>\n <li>Singdha- 656</li>\n <li>A/C Seat- 782</li>\n</ul>\n\n<p>Meanwhile <strong>Padma Express</strong> has air-conditioned seat service. Only three kinds of seat service are avail in this intercity train. Here is the price list:</p>\n\n<ul>\n <li>Shavon Chair- 340</li>\n <li>Singdha- 656</li>\n <li>A/C Birth- 1223.</li>\n</ul>\n\n<p><strong>Dhumketue Express</strong> has also three seat service with one air-conditioned sitting service. The price for each seat service of this train are in the list.</p>\n\n<ul>\n <li>Shavon Chair- 340</li>\n <li>Singdha- 656</li>\n <li>A/C Seat- 782</li>\n</ul>\n\n<h3>Dhaka to Dinajpur Train Ticket Price</h3>\n\n<p>From Dhaka to Dinajpur only one train service is opening in the route. It is Ekota Express. In this train there 4 types of sitting services are available. One of them is air-conditioned.  Shavon Chair, First Seat, Singdha, A/C Seat, this service is avail in this train. The list of Dhaka to Dinajpur train ticket price is given below:</p>\n\n<ul>\n <li>Shavon Chair- 465</li>\n <li>First Seat- 620</li>\n <li>Singdha- 892</li>\n <li>A/C Seat- 1070.</li>\n</ul>\n\n<h3>Dhaka to Sirajgonj Train Ticket Price</h3>\n\n<p>There is also one train service is available in Dhaka to Sirajgonj train route. Only Sirajgonj Express travels on this route. Sitting service quality is not also so well in this train. Only two types of seat services are available. They are Shavon Chair and Singdha.</p>\n\n<ul>\n <li>Shavon Chair- 240</li>\n <li>Singdha- 460.</li>\n <li> </li>\n</ul>\n\n<h3>Dhaka to Khulna Train Ticket Price</h3>\n\n<p>Dhaka to Khulna train ticket price varies with the quality of sitting service of each train. Only two trains travel on Dhaka to Khulna train route.  They are Sundarban express and Chittra Express.</p>\n\n<p>On <strong>Sundarban express</strong> three types of seat services are available, Shavon Chair, Singdha, A/C Seat. The list of this train is like that:</p>\n\n<ul>\n <li>Shavon Chair- 505</li>\n <li>Singdha- 966</li>\n <li>A/C Seat- 1156.</li>\n</ul>\n\n<p><strong>Chittra Express</strong> also has three seat services. They are Shavon Chair, Singdha, and A/C Birth. See the price list of each:</p>\n\n<ul>\n <li>Shavon Chair- 505,</li>\n <li>Singdha- 966,  </li>\n <li>A/C Birth- 1781.</li>\n</ul>\n\n<h3>Rajshahi to Khulna Train Ticket Price</h3>\n\n<p>For traveling on Rajshahi to Khulna Train route there has also two intercity train services. Kapotaskh express and Sagardari Express are both. Bangladesh railway train ticket price is distinct based on the distance and services.</p>\n\n<p><strong>Kapotaskh express</strong> has only two types of seat varieties. They are Shavon Chair, Singdha. Their price:</p>\n\n<ul>\n <li>Shavon Chair- 310           </li>\n <li>Singdha- 593.</li>\n</ul>\n\n<p><strong>Sagardari Express</strong> has same seat quality like Kapotaskh express. And the price list is also same. They are :</p>\n\n<ul>\n <li>Shavon Chair- 310           </li>\n <li>Singdha- 593.</li>\n</ul>\n', 1, 3, '[\"11\",\"12\"]', '2020-01-07 09:52:41', 6, 1);

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

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `post_id`, `name`, `email`, `website`, `message`, `created_at`, `is_active`) VALUES
(4, 5, 'Md Abdul Kuddus', 'admin@admin.com', 'sdfd', 'For traveling on Rajshahi to Khulna Train route there has also two intercity train services. Kapotaskh express and Sagardari Express are both. Bangladesh railway train ticket price is distinct based on the distance and services.', '2020-01-07 10:02:09', 1);

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
(48, 'T-shirt', 46, NULL, 1, 0, '\"polo\"', 'category_picture/1098369165.png', 'asdfa');

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
(8, 'site_logo', 'dsafad', 'logo_image/644acf47cf509827246fc6c29d8fee8f.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE `cupon` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `code` varchar(50) NOT NULL,
  `specification` text NOT NULL,
  `added_by` varchar(80) NOT NULL,
  `till` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `discount_on` int(11) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `discount_value` varchar(5) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `feature_image1` varchar(80) DEFAULT NULL,
  `feature_image2` varchar(80) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `unit` varchar(80) NOT NULL,
  `tags` text NOT NULL,
  `purchase_price` varchar(10) NOT NULL,
  `sale_price` varchar(10) NOT NULL,
  `shipping_cost` varchar(10) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `discount_type` varchar(10) DEFAULT NULL,
  `tax` varchar(10) DEFAULT NULL,
  `tax_type` varchar(10) DEFAULT NULL,
  `color` text,
  `best_selling` int(11) NOT NULL DEFAULT '0',
  `addtional_fields` text,
  `options` text,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `size` varchar(80) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `feature_image1`, `feature_image2`, `category_id`, `sub_category_id`, `brand_id`, `unit`, `tags`, `purchase_price`, `sale_price`, `shipping_cost`, `discount`, `discount_type`, `tax`, `tax_type`, `color`, `best_selling`, `addtional_fields`, `options`, `is_active`, `size`, `quantity`) VALUES
(32, 'Samsung A50 ', 'test description', 'product_picture/1bd33bbed051d45e08124530d309f74a.jpeg', 'product_picture/140012d3f18bf42e7cf29dd3a8254663.jpeg', 45, 47, 1, '2', '[\"4\",\"5\"]', '23', '25', '2', '2', '1', '3', '1', '[\"2\",\"3\",\"6\"]', 0, NULL, NULL, 1, NULL, 44),
(33, 'Polo T-shirt', 'test shirt', 'product_picture/b1d616f3cf949f54167eabbb66199850.jpg', 'product_picture/2fabf783ff9fbff4dfc80ecee3bb9cb0.jpg', 46, 48, 2, '2', '[\"3\",\"7\"]', '3', '4', '4', '3', '2', '1', '1', '[\"2\",\"6\"]', 0, NULL, NULL, 1, '[\"2\",\"5\"]', 34);

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
  `is_checked` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `code`, `customer_id`, `guest_details`, `product_details`, `shipping_address`, `vat`, `vat_percent`, `shipping_cost`, `payment_type`, `payment_status`, `payment_details`, `payment_at`, `grand_total`, `sales_at`, `delivery_at`, `delivery_status`, `is_checked`) VALUES
(6, '41577211244', 1, '{\"name\":\"Md Abdul Kuddus\",\"email\":\"ma.kuddus37@gmail.com\",\"contact\":\"01834776137\",\"city\":\"chittagong\",\"address\":\"chittagong\",\"zip_code\":\"4225\",\"country\":\"Anguilla\",\"state\":\"Anguilla\"}', '{\"product_data\":[{\"id\":\"15\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"3\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":496,\"name\":\"HP Notebook pro\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/0e3183d1c864ebe56301af4533f3d6df.jpeg\",\"cupon\":\"er78e\",\"sub_total\":496},{\"id\":\"16\",\"qty\":3,\"option\":{\"color\":\"[\\\"2\\\",\\\"4\\\"]\",\"size\":\"X,XL\"},\"price\":55,\"name\":\"Gents Pant\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/d1d5910226995fab66d1ab624acaba8f.jpg\",\"cupon\":\"er78e\",\"sub_total\":55},{\"id\":\"17\",\"qty\":4,\"option\":{\"color\":\"[\\\"2\\\",\\\"3\\\"]\",\"size\":\"X,XL\"},\"price\":435.12,\"name\":\"Blender\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/7e00507ca3b45b048a82eb22d06016c6.jpg\",\"cupon\":\"er78e\",\"sub_total\":435.12}]}', '{\"name\":\"Md Abdul Kuddus\",\"email\":\"ma.kuddus37@gmail.com\",\"contact\":\"01834776137\",\"city\":\"chittagong\",\"address\":\"chittagong\",\"zip_code\":\"4225\",\"country\":\"Anguilla\",\"state\":\"Anguilla\"}', '11', '0', '50', 'cod', 1, '', '', '986.12', '12-24-2019,06:14:04 PM', '', 3, 'kuddus'),
(7, '341577213099', 0, '{\"name\":\"Sayma Munmun\",\"email\":\"sayma.moon13@gmail.com\",\"contact\":\"01833207313\",\"city\":\"chittagong\",\"address\":\"fotehabad, hathazari\",\"zip_code\":\"4000\",\"country\":\"Bangladesh\",\"state\":\"Chittagong\"}', '{\"product_data\":[{\"id\":\"14\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":4383.36,\"name\":\"Samsung A50 \",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/105c557781c819855433127d8bd2c380.jpeg\",\"cupon\":\"er78e\",\"sub_total\":4383.36},{\"id\":\"15\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"3\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":496,\"name\":\"HP Notebook pro\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/0e3183d1c864ebe56301af4533f3d6df.jpeg\",\"cupon\":\"er78e\",\"sub_total\":496},{\"id\":\"16\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"4\\\"]\",\"size\":\"X,XL\"},\"price\":55,\"name\":\"Gents Pant\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/d1d5910226995fab66d1ab624acaba8f.jpg\",\"cupon\":\"er78e\",\"sub_total\":55},{\"id\":\"17\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"3\\\"]\",\"size\":\"X,XL\"},\"price\":435.12,\"name\":\"Blender\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/7e00507ca3b45b048a82eb22d06016c6.jpg\",\"cupon\":\"er78e\",\"sub_total\":435.12}]}', '{\"name\":\"Sayma Munmun\",\"email\":\"sayma.moon13@gmail.com\",\"contact\":\"01833207313\",\"city\":\"chittagong\",\"address\":\"fotehabad, hathazari\",\"zip_code\":\"4000\",\"country\":\"Bangladesh\",\"state\":\"Chittagong\"}', '15', '0', '50', 'cod', 1, '', '', '5369.48', '12-24-2019,06:44:59 PM', '', 3, 'kuddus'),
(8, '691577796597', 0, '{\"name\":\"Test Full Name\",\"email\":\"test@gamil.com\",\"contact\":\"45678904567\",\"city\":\"city\",\"address\":\"address\",\"zip_code\":\"zip code\",\"country\":\"Barbados\",\"state\":\"Saint Philip\"}', '{\"product_data\":[{\"id\":\"33\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":3.88,\"name\":\"Polo T-shirt\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/b1d616f3cf949f54167eabbb66199850.jpg\",\"cupon\":\"er78e\",\"sub_total\":null},{\"id\":\"32\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"3\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":23,\"name\":\"Samsung A50 \",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/1bd33bbed051d45e08124530d309f74a.jpeg\",\"cupon\":\"er78e\",\"sub_total\":null}]}', '{\"name\":\"test name\",\"email\":\"test@gamil.com\",\"contact\":\"34567890\",\"city\":\"city\",\"address\":\"address\",\"zip_code\":\"zip code\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\"}', '4', '0', '50', 'cod', 1, '', '', '0', '12-31-2019,12:49:57 PM', '', 1, NULL),
(9, '751577796624', 0, '{\"name\":\"Test Full Name\",\"email\":\"test@gamil.com\",\"contact\":\"45678904567\",\"city\":\"city\",\"address\":\"address\",\"zip_code\":\"zip code\",\"country\":\"Barbados\",\"state\":\"Saint Philip\"}', '{\"product_data\":[{\"id\":\"33\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":3.88,\"name\":\"Polo T-shirt\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/b1d616f3cf949f54167eabbb66199850.jpg\",\"cupon\":\"er78e\",\"sub_total\":null},{\"id\":\"32\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"3\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":23,\"name\":\"Samsung A50 \",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/1bd33bbed051d45e08124530d309f74a.jpeg\",\"cupon\":\"er78e\",\"sub_total\":null}]}', '{\"name\":\"test name\",\"email\":\"test@gamil.com\",\"contact\":\"34567890\",\"city\":\"city\",\"address\":\"address\",\"zip_code\":\"zip code\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\"}', '4', '0', '50', 'cod', 1, '', '', '0', '12-31-2019,12:50:24 PM', '', 1, NULL),
(10, '261577796745', 0, '{\"name\":\"Test Full Name\",\"email\":\"test@gamil.com\",\"contact\":\"45678904567\",\"city\":\"city\",\"address\":\"address\",\"zip_code\":\"zip code\",\"country\":\"Barbados\",\"state\":\"Saint Philip\"}', '{\"product_data\":[{\"id\":\"33\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":3.88,\"name\":\"Polo T-shirt\",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/b1d616f3cf949f54167eabbb66199850.jpg\",\"cupon\":\"er78e\",\"sub_total\":3.88},{\"id\":\"32\",\"qty\":1,\"option\":{\"color\":\"[\\\"2\\\",\\\"3\\\",\\\"6\\\"]\",\"size\":\"X,XL\"},\"price\":23,\"name\":\"Samsung A50 \",\"shiping\":50,\"tax\":5,\"image\":\"product_picture\\/1bd33bbed051d45e08124530d309f74a.jpeg\",\"cupon\":\"er78e\",\"sub_total\":23}]}', '{\"name\":\"test name\",\"email\":\"test@gamil.com\",\"contact\":\"34567890\",\"city\":\"city\",\"address\":\"address\",\"zip_code\":\"zip code\",\"country\":\"Bangladesh\",\"state\":\"Dhaka\"}', '4', '0', '50', 'cod', 1, '', '', '26.88', '12-31-2019,12:52:25 PM', '', 1, NULL);

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
(2, 'asdf', 'asdf', 'slider_image/08bb231e6469bc042a7cbf5450c1b9d5.jpg', 'asdf', 1, ''),
(3, 'adsffa', 'dfasdfsaf', 'slider_image/6b80782355900c133421d440b634af38.jpg', 'dafadsf', 1, '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
