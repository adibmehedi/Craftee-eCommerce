-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2016 at 10:20 AM
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
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
`id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `placementTime` datetime NOT NULL,
  `address` varchar(500) NOT NULL,
  `isCustom` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `userId`, `placementTime`, `address`, `isCustom`, `status`) VALUES
(23, 2, '2016-12-26 00:00:00', '', 0, 1),
(24, 2, '2016-12-26 00:00:00', '', 0, 1),
(25, 2, '2016-12-27 00:00:00', '', 0, 0),
(26, 10, '2016-12-27 00:00:00', 'Toronto, Japan', 0, 0),
(27, 9, '2016-12-27 00:00:00', 'H-3, R-123, Dhaka', 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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
(20, 8, 500, 3, 27);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `description`, `categoryId`, `price`, `unitAvailable`) VALUES
(1, 'Ribon', '3 cm long colorful ribbon', 0, 200, 500),
(8, 'Badge', 'Captain America bardge', 0, 500, 200),
(9, 'Parrot', 'Colorful Parrot Set', 0, 1000, 50),
(10, 'Bag', 'Handmade colorful bag', 0, 750, 50);

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
(2, 'Mehedi', 'adib@mail.com', '123', 0, '09876', '', 0, '', 1),
(3, 'Admin', 'bing@mail.com', '123', 0, '09876', '', 0, '', 1),
(4, 'James', 'james@mail.com', '123', 0, '123456', '', 0, '', 1),
(5, 'Admin', 'admin@mail.com', '123', 1, '', '', 1, '', 1),
(8, 'User', 'user@mail.com', '123', 0, '091828289', '', 0, '', 1),
(9, 'User1', 'user1@mail.com', '123', 0, '434343545', 'H-3, R-123, Dhaka', 0, '', 1),
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
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_orderedproduct`
--
ALTER TABLE `tbl_orderedproduct`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
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
