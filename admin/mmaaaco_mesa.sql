-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 05, 2019 at 08:59 PM
-- Server version: 10.0.38-MariaDB-cll-lve
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
-- Database: `mmaaaco_mesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `fa19_admin`
--

CREATE TABLE `fa19_admin` (
  `id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fa19_admin`
--

INSERT INTO `fa19_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$hxq1qZuHxuyTJHsv7kJg4.3KV/6.4O2ittpta86nWdjND5lLvCWE2');

-- --------------------------------------------------------

--
-- Table structure for table `fa19_cartitems`
--

CREATE TABLE `fa19_cartitems` (
  `productid` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `sessionid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fa19_categories`
--

CREATE TABLE `fa19_categories` (
  `catid` int(5) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fa19_products`
--

CREATE TABLE `fa19_products` (
  `prodid` int(5) NOT NULL,
  `prodname` varchar(255) NOT NULL,
  `proddesc` text NOT NULL,
  `prodprice` decimal(9,2) NOT NULL,
  `link` varchar(255) NOT NULL,
  `featured` enum('yes','no') NOT NULL,
  `catid` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fa19_admin`
--
ALTER TABLE `fa19_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fa19_categories`
--
ALTER TABLE `fa19_categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `fa19_products`
--
ALTER TABLE `fa19_products`
  ADD PRIMARY KEY (`prodid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fa19_admin`
--
ALTER TABLE `fa19_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fa19_categories`
--
ALTER TABLE `fa19_categories`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fa19_products`
--
ALTER TABLE `fa19_products`
  MODIFY `prodid` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
