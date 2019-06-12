-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2018 at 10:58 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sabistore`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `id` varchar(10) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--


-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `bid` varchar(10) NOT NULL,
  `bdate` varchar(10) NOT NULL,
  `oid` varchar(10) NOT NULL,
  `amount` int(20) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bid`, `bdate`, `oid`, `amount`) VALUES
('B1', '07/06/2018', 'O1', 183613),
('B2', '07/06/2018', 'O2', 183613),
('B3', '08/06/2018', 'O3', 282128),
('B4', '08/06/2018', 'O4', 134355),
('B5', '08/06/2018', 'O5', 147773),
('B6', '09/06/2018', 'O6', 107520),
('B7', '09/06/2018', 'O7', 183613);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cartid` varchar(10) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `oqty` int(10) NOT NULL,
  PRIMARY KEY (`cartid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catid` varchar(10) NOT NULL,
  `catname` varchar(50) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cid` varchar(10) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login` varchar(10) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `cname`, `address`, `contact`, `email`, `password`, `login`, `question`, `answer`) VALUES
('C1', 'moin', 'mira', '123', 'm@gmail.com', '123', 'no', 'favourite hero', 'srk'),
('C2', 'ansari', 'mira road', '123456', 'mu@gmail.com', '12345', 'no', 'school name', 'snhs'),
('C3', 'sabiha naik', 'mira road', '123456', 's@gmail.com', '123456', 'no', 'pet name', 'sabi'),
('C4', 'kalim khan', 'mira road', '123456', 'kalim@gmail.com', '12345', 'no', 'school name', 'snhs'),
('C5', 'talib mohd', 'mira road', '123456', 't@gmail.com', '12345', 'yes', 'pet name', 'tab'),
('C6', 'James Smith', 'New York', '4334', 'j@g.com', '123', 'no', '123', '123'),
('C7', 'qwerty keypad', 'qwerty', '123456', 'q@wer.ty', 'qwerty', 'no', 'qwerty', 'qwerty'),
('C8', 'asmn ansari', 'asmn', '1234', 'asmn@g.com', '1234', 'no', '1234', '1234'),
('C9', 'Aariz Ansari', 'mira road', '4666666', 'a@g.com', '123456', 'no', 'qwerty', 'qwerty'),
('C10', 'mumtaz ansari', 'mira rd', '42561778', 'mm@g.com', '123456', 'no', 'color', 'red'),
('C11', 'sabi', 'naik', '123456', 'sabiha@gmail.com', '123', 'yes', '123', '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oid` varchar(10) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `odate` varchar(20) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `cid`, `odate`) VALUES
('O1', 'C2', '07/06/2018'),
('O2', 'C5', '07/06/2018'),
('O3', 'C7', '08/06/2018'),
('O4', 'C6', '08/06/2018'),
('O5', 'C6', '08/06/2018'),
('O6', 'C3', '09/06/2018'),
('O7', 'C11', '09/06/2018');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `odid` varchar(10) NOT NULL,
  `oid` varchar(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `oqty` int(10) NOT NULL,
  PRIMARY KEY (`odid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`odid`, `oid`, `pid`, `oqty`) VALUES
('OD1', 'O1', 'P4', 2),
('OD2', 'O1', 'P2', 1),
('OD3', 'O1', 'P1', 1),
('OD4', 'O2', 'P2', 1),
('OD5', 'O2', 'P1', 1),
('OD6', 'O2', 'P4', 2),
('OD7', 'O3', 'P4', 5),
('OD8', 'O3', 'P1', 1),
('OD9', 'O4', 'P3', 1),
('OD10', 'O4', 'P2', 1),
('OD11', 'O4', 'P1', 1),
('OD12', 'O5', 'P4', 3),
('OD13', 'O6', 'P1', 2),
('OD14', 'O6', 'P1', 1),
('OD15', 'O7', 'P1', 1),
('OD16', 'O7', 'P4', 2),
('OD17', 'O7', 'P4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pid` varchar(10) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `catid` varchar(10) NOT NULL,
  `pdesc` varchar(1000) NOT NULL,
  `pprice` int(50) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `pimage` varchar(1000) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `pname`, `catid`, `pdesc`, `pprice`, `qty`, `pimage`) VALUES
('P1', 'SAMSUNG S7 EDGE', 'C1', 'ROUND EDGES,8GB RAM,OCTACORE', 32000, '7', 'assets/img/dummyimg.png'),
('P2', 'Samsung Galaxy S8', 'C1', 'Gorilla Glass 5, 64 GB, 4 GB RAM, Octa-core, Andro', 43980, '4', 'assets/img/dummyimg.png'),
('P3', 'Samsung Galaxy S8', 'C1', 'Gorilla Glass 5, 64 GB, 4 GB RAM, Octa-core, Android 7.0 (Nougat)', 43980, '10', 'images/samsung-galaxy-s8.jpg'),
('P4', 'Samsung Galaxy S9', 'C1', 'Gorilla Glass 5, 64 GB, 4 GB RAM, Octa-core, Android 7.0 (Nougat)', 43980, '10', 'images/samsung-galaxy-s8.jpg');
