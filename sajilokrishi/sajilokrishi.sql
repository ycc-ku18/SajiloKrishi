-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2018 at 01:47 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sajilokrishi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('admin', '1844156d4166d94387f1a4ad031ca5fa');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `articleId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `regEmail` varchar(255) NOT NULL,
  `articlePost` text NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleId`, `title`, `category`, `image`, `regEmail`, `articlePost`, `keyword`, `date`) VALUES
(1, 'bipul', 'Agricultural', 0x494d475f32303137313131315f3131333931392e6a7067, 'bipulthapa23@gmail.com', 'THis is an article 12345', 'bbt bipul', '2018-01-02 04:23:14'),
(2, 'BBT', 'Home Farming', 0x494d475f32303137313131315f3131353133372e6a7067, 'bipulthapa23@gmail.com', 'BBt', 'BBT', '2018-01-02 07:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pId` int(11) NOT NULL,
  `ipAddress` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`pId`, `ipAddress`, `quantity`, `unit`) VALUES
(15, '::1', 1, ''),
(5, '::1', 2, 'kg'),
(15, '::1', 1, ''),
(13, '::1', 4, ''),
(3, '::1', 2, 'kg'),
(3, '::1', 1, 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `commentarticle`
--

CREATE TABLE `commentarticle` (
  `cmntId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `regEmail` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentarticle`
--

INSERT INTO `commentarticle` (`cmntId`, `postId`, `regEmail`, `comment`, `date`) VALUES
(1, 2, 'bipulthapa23@gmail.com', 'Hello world', '2018-01-05 07:25:47'),
(2, 2, 'bipulthapa23@gmail.com', 'Hello world', '2018-01-05 07:29:45'),
(3, 2, 'bipulthapa23@gmail.com', 'adding', '2018-01-05 08:32:28'),
(4, 2, 'bipulthapa23@gmail.com', 'adding', '2018-01-05 08:33:00'),
(5, 2, 'bipulthapa23@gmail.com', 'adding', '2018-01-05 08:33:10'),
(6, 2, 'bipulthapa23@gmail.com', 'adding', '2018-01-05 08:33:15'),
(7, 2, 'bipulthapa23@gmail.com', 'adding', '2018-01-05 08:33:24'),
(8, 2, 'bipulthapa23@gmail.com', 'adding', '2018-01-05 08:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `likearticle`
--

CREATE TABLE `likearticle` (
  `likeId` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `regEmail` varchar(255) NOT NULL,
  `likeNum` int(11) NOT NULL,
  `dislikeNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(10) NOT NULL,
  `ProductName` varchar(200) NOT NULL,
  `Price` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `RegEmail` varchar(255) NOT NULL,
  `Image` blob,
  `Description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `unit` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `Qty`, `RegEmail`, `Image`, `Description`, `category`, `keyword`, `unit`) VALUES
(12, 'Cucumber', 40, 120, 'bipulthapa23@gmail.com', 0x332e6a7067, 'Bikashe kakro .. This is description part.haha', 'Vegetables', 'cucumber kakro', 'kg'),
(14, 'Garlic', 50, 25, 'shakya.nadim12@gmail.com', 0x352e6a7067, 'Garlic chitwan ko local garlic. sasto mitho ra faidakari', 'Vegetables', 'aduwa garlic', 'kg'),
(15, 'Garlic', 35, 50, 'bipulthapa23@gmail.com', 0x362e6a7067, 'This garlic is the product of organic farming. Great for health and tate of foods.', 'Vegetables', 'lasun garlic ', 'kg'),
(16, 'Adhuwa (ginger)', 65, 33, 'bipulthapa23@gmail.com', 0x352e6a7067, 'Makwanpur based produced product. Provides great taste to eater.', 'Vegetables', 'adhuwa garlic ', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `mobileNum` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `fullName`, `email`, `password`, `location`, `mobileNum`) VALUES
(1, 'Bipul Bikram Thapa', 'bipulthapa23@gmail.com', '01e987a0ca9fd38610b8f55ffaf301a4', 'Kathmandu', '9869001233'),
(2, 'Sample', 'shakya.nadim12@gmail.com', 'f7cfd52eb9a92c4b68638bc08fa5c682', 'Kathmandu', '9869000000');

-- --------------------------------------------------------

--
-- Table structure for table `replyarticle`
--

CREATE TABLE `replyarticle` (
  `replyId` int(11) NOT NULL,
  `cmntId` int(11) NOT NULL,
  `regEmail` varchar(255) NOT NULL,
  `replyText` text NOT NULL,
  `replyDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replyarticle`
--

INSERT INTO `replyarticle` (`replyId`, `cmntId`, `regEmail`, `replyText`, `replyDate`) VALUES
(1, 1, '0', '	hello																			\r\n															', '2017-08-07 18:15:00'),
(2, 1, 'bipulthapa23@gmail.com', '	hello																			\r\n															', '2018-01-05 07:54:49'),
(3, 1, 'bipulthapa23@gmail.com', '	hello																			\r\n															', '2018-01-05 08:01:03'),
(4, 1, 'bipulthapa23@gmail.com', '	hello																			\r\n															', '2018-01-05 08:01:15'),
(5, 1, 'bipulthapa23@gmail.com', '	hello																			\r\n															', '2018-01-05 08:02:09'),
(6, 1, 'bipulthapa23@gmail.com', '	hello																			\r\n															', '2018-01-05 08:02:38'),
(7, 1, 'bipulthapa23@gmail.com', '	hello																			\r\n															', '2018-01-05 08:02:54'),
(8, 1, 'bipulthapa23@gmail.com', '	hello																			\r\n															', '2018-01-05 08:03:29'),
(9, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:03:42'),
(10, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:04:10'),
(11, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:04:17'),
(12, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:06:47'),
(13, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:07:04'),
(14, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:07:14'),
(15, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:07:24'),
(16, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:09:02'),
(17, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:09:09'),
(18, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:09:30'),
(19, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:09:37'),
(20, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:09:44'),
(21, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:09:50'),
(22, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:09:58'),
(23, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:10:23'),
(24, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:10:50'),
(25, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:11:12'),
(26, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:13:34'),
(27, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:13:39'),
(28, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:13:51'),
(29, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:14:04'),
(30, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:14:20'),
(31, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:14:52'),
(32, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:15:17'),
(33, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:15:40'),
(34, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:15:45'),
(35, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:17:29'),
(36, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:17:56'),
(37, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:18:03'),
(38, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:18:10'),
(39, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:18:17'),
(40, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:18:23'),
(41, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:18:29'),
(42, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:18:38'),
(43, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:19:39'),
(44, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:19:53'),
(45, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:20:01'),
(46, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:20:10'),
(47, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 08:20:33'),
(48, 1, 'bipulthapa23@gmail.com', '																				\r\n															', '2018-01-05 09:01:50'),
(49, 1, 'bipulthapa23@gmail.com', '																				\r\n															', '2018-01-05 09:02:23'),
(50, 1, 'bipulthapa23@gmail.com', '																				\r\n															', '2018-01-05 09:02:37'),
(51, 1, 'bipulthapa23@gmail.com', '																				\r\n	nadim														', '2018-01-05 09:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `requestproducts`
--

CREATE TABLE `requestproducts` (
  `ProductName` varchar(255) NOT NULL,
  `ProductCategory` varchar(255) NOT NULL,
  `updatedDate` date NOT NULL,
  `Demand` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestproducts`
--

INSERT INTO `requestproducts` (`ProductName`, `ProductCategory`, `updatedDate`, `Demand`) VALUES
('Apple', 'Fruits', '2018-01-04', 20),
('Tomato', 'Fruits', '2018-01-03', 200);

-- --------------------------------------------------------

--
-- Table structure for table `selecteditems`
--

CREATE TABLE `selecteditems` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Image` blob NOT NULL,
  `Description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `unit` varchar(64) NOT NULL,
  `RegEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selecteditems`
--

INSERT INTO `selecteditems` (`ProductID`, `ProductName`, `Price`, `Qty`, `Image`, `Description`, `category`, `keyword`, `unit`, `RegEmail`) VALUES
(1, 'Local potato', 30, 28, 0x312e6a7067, 'Ayo ayo local alu sasto ra mitho', 'Fruits', 'local alu potato', 'kg', 'bipulthapa23@gmail.com'),
(2, 'Potato', 100, 100, 0x312e6a7067, 'Organic Potato', 'vegetables', '', '', 'bipulthapa10@gmail.com'),
(3, 'Tomato', 50, 185, 0x322e4a5047, 'Local breed tomatoes', 'vegetables', '', 'kg', 'bipulthapa23@gmail.com'),
(4, 'Cucumber', 80, 300, 0x332e6a7067, 'Bhaktapur local cucumber', 'vegetables', '', '', 'bipulthapa10@gmail.com'),
(5, 'Local Alu', 30, 30, 0x312e6a7067, 'Ayo ayo local alu sasto ra mitho', 'Fruits', 'local alu potato', 'kg', 'bipulthapa23@gmail.com'),
(6, 'Compost manure', 1000, 30, 0x66657274696c697a65722e6a7067, 'This will yield the crops effectively. Urea compost manure is used.', 'Fertilizers', 'urea compost manure', '', 'shakya.nadim12@gmail.com'),
(7, 'Axe', 500, 1, 0x342e6a7067, 'Gun metal made axe', 'tools', '', '', 'shakya.nadim12@gmail.com'),
(8, 'Axe', 500, 3, 0x342e6a7067, 'Gun metal made axe', 'tools', '', '', 'bipulthapa23@gmail.com'),
(9, 'Axe', 500, 1, 0x342e6a7067, 'Gun metal made axe', 'tools', '', '', 'bipulthapa23@gmail.com'),
(10, 'Urea compost manure', 1000, 30, 0x66657274696c697a65722e6a7067, 'This will yield the crops effectively. Urea compost manure is used.', 'Fertilizers', 'urea compost manure', '', 'shakya.nadim12@gmail.com'),
(11, 'Axe', 500, 3, 0x342e6a7067, 'Gun metal made axe', 'tools', '', '', 'bipulthapa23@gmail.com'),
(12, 'Urea compost manure', 1000, 26, 0x66657274696c697a65722e6a7067, 'This will yield the crops effectively. Urea compost manure is used.', 'Fertilizers', 'urea compost manure', '', 'bipulthapa23@gmail.com'),
(13, 'Urea compost maal', 1000, 28, 0x66657274696c697a65722e6a7067, 'This will yield the crops effectively. Urea compost manure is used.', 'Fertilizers', 'urea compost manure', '', 'shakya.nadim12@gmail.com'),
(14, 'Axe', 500, 3, 0x342e6a7067, 'Gun metal made axe', 'tools', '', '', 'bipulthapa23@gmail.com'),
(15, 'Axe', 500, 1, 0x342e6a7067, 'Gun metal made axe', 'tools', '', '', 'bipulthapa23@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trId` int(11) NOT NULL,
  `ipAddress` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(64) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trId`, `ipAddress`, `total`, `address`, `contact`, `time`, `status`) VALUES
(3, '::1', 1450, '', '0', '2018-01-04 12:02:09', 'delivered'),
(4, '::1', 800, '', '0', '2018-01-04 12:15:59', 'checking'),
(5, '::1', 1200, '112 3 Hetauda Bhaktapur', '9869001233', '2018-01-04 17:30:10', 'packing'),
(6, '::1', 2960, '', '', '2018-01-05 10:24:40', 'delivered'),
(7, '::1', 1250, '', '', '2018-01-05 10:49:03', 'delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `commentarticle`
--
ALTER TABLE `commentarticle`
  ADD PRIMARY KEY (`cmntId`);

--
-- Indexes for table `likearticle`
--
ALTER TABLE `likearticle`
  ADD PRIMARY KEY (`likeId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `replyarticle`
--
ALTER TABLE `replyarticle`
  ADD PRIMARY KEY (`replyId`);

--
-- Indexes for table `selecteditems`
--
ALTER TABLE `selecteditems`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `commentarticle`
--
ALTER TABLE `commentarticle`
  MODIFY `cmntId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `likearticle`
--
ALTER TABLE `likearticle`
  MODIFY `likeId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `replyarticle`
--
ALTER TABLE `replyarticle`
  MODIFY `replyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `selecteditems`
--
ALTER TABLE `selecteditems`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
