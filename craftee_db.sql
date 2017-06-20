-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2017 at 03:41 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `craftee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customorder`
--

CREATE TABLE IF NOT EXISTS `tbl_customorder` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `design` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customorder`
--

INSERT INTO `tbl_customorder` (`id`, `name`, `phone`, `design`) VALUES
(4, 'Adib', '0187872', '[["2",222,91],["2",296,117],["5",195,138],["4",245,99],["2",311,191]]'),
(7, 'Demo1', '01677', '[["3",340,173],["5",313,165]]'),
(8, 'Random User', '016775577', '[["3",215,111],["5",270,127],["2",326,131]]'),
(9, 'JAmes ', '9999', '[["3",241,112],["3",320,127],["3",406,292],["3",501,188],["5",189,42],["5",448,70]]');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
`id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `placementTime` datetime NOT NULL,
  `address` varchar(500) NOT NULL,
  `isCustom` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `userId`, `placementTime`, `address`, `isCustom`, `status`) VALUES
(23, 2, '2016-12-26 00:00:00', '', '0', 1),
(24, 2, '2016-12-26 00:00:00', '', '0', 1),
(25, 2, '2016-12-27 00:00:00', '', '0', 1),
(26, 10, '2016-12-27 00:00:00', 'Toronto, Japan', '0', 1),
(27, 9, '2016-12-27 00:00:00', 'H-3, R-123, Dhaka', '0', 1),
(28, 9, '2016-12-28 00:00:00', 'Dhaka, Bangladesh', '0', 0),
(29, 10, '2016-12-29 00:00:00', 'Toronto, Japan', '0', 0),
(30, 9, '2016-12-29 00:00:00', 'Dhaka, Bangladesh', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderedproduct`
--

CREATE TABLE IF NOT EXISTS `tbl_orderedproduct` (
`id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` double NOT NULL,
  `unit` int(11) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderedproduct`
--

INSERT INTO `tbl_orderedproduct` (`id`, `productId`, `price`, `unit`, `orderId`) VALUES
(8, 8, 500, 2, 21),
(9, 1, 200, 1, 21),
(10, 9, 1000, 1, 21),
(11, 8, 500, 4, 22),
(12, 9, 1000, 2, 22),
(13, 1, 200, 2, 23),
(14, 8, 500, 1, 23),
(15, 8, 500, 3, 24),
(16, 9, 1000, 1, 24),
(17, 1, 200, 3, 25),
(18, 8, 500, 2, 25),
(19, 10, 750, 4, 26),
(20, 8, 500, 3, 27),
(21, 8, 500, 3, 28),
(22, 1, 200, 1, 28),
(23, 9, 1000, 1, 28),
(24, 9, 1000, 2, 29),
(25, 8, 500, 1, 29),
(26, 1, 200, 1, 29),
(27, 10, 750, 3, 29),
(28, 9, 1000, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `price` double NOT NULL,
  `unitAvailable` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `description`, `categoryId`, `price`, `unitAvailable`) VALUES
(1, 'Ribon', '3 cm long colorful ribbon', 0, 200, 500),
(8, 'Badge', 'Captain America bardge', 0, 500, 200),
(9, 'Parrot', 'Colorful Parrot Set', 0, 1000, 50),
(10, 'Bag', 'Handmade colorful bag', 0, 750, 50),
(11, 'Doll-Toy', 'Handmade Cloth Toy', 0, 200, 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productcat`
--

CREATE TABLE IF NOT EXISTS `tbl_productcat` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userCatId` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `verificationCode` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `userCatId`, `contact`, `address`, `isVerified`, `verificationCode`, `isActive`) VALUES
(2, 'Mehedi', 'adib@mail.com', '123', 0, '09876', 'Dhaka, Bangladesh', 0, '', 1),
(3, 'Admi', 'bing@mail.co', '12', 0, '0987', 'm', 0, '', 1),
(4, 'James', 'james@mail.com', '123', 0, '123456', '', 0, '', 1),
(5, 'Admin', 'admin@mail.com', '123', 1, '', '', 1, '', 1),
(8, 'User', 'user@mail.com', '123', 0, '091828289', '', 0, '', 1),
(9, 'User123', 'user1@mail.com', '123', 0, '434343545', 'Dhaka, Bangladesh', 0, '', 1),
(10, 'User2', 'user2@mail.com', '123', 0, '0988778', 'Toronto, Japan', 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usercat`
--

CREATE TABLE IF NOT EXISTS `tbl_usercat` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customorder`
--
ALTER TABLE `tbl_customorder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orderedproduct`
--
ALTER TABLE `tbl_orderedproduct`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_productcat`
--
ALTER TABLE `tbl_productcat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customorder`
--
ALTER TABLE `tbl_customorder`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_orderedproduct`
--
ALTER TABLE `tbl_orderedproduct`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_productcat`
--
ALTER TABLE `tbl_productcat`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
