-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2018 at 12:17 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sabistore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
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
('P5', 'oppo f7', 'CAT5', 'Helio P60 processor4GB RAM64GB internal storage', 20000, '10', 'images/electronics/mobiles/oppo f7.jpg'),
('P4', 'VIVO V9', 'CAT1', '4 GB RAM,Front glass, aluminum body', 21849, '10', 'images/electronics/mobiles/vivo v9.jpg'),
('P3', 'NOTE 8', 'CAT1', 'Front/back glass (Gorilla Glass 5), aluminum frame,6 GB RAM', 59800, '5', 'images/electronics/mobiles/note 8.jpg'),
('P1', 'Samsung Galaxy S9', 'CAT1', 'Gorilla Glass 5, 64 GB, 4 GB RAM, Octa-core, Android 7.0 (Nougat)', 43980, '10', 'images/samsung-galaxy-s8.jpg'),
('P2', 'iPhone X', 'CAT1', '3GB RAM', 89000, '3', 'images/electronics/mobiles\\iPhone X.jpg'),
('P6', 'oneplus 6', 'CAT6', 'Octa-core (4x2.8 GHz Kryo 385 Gold & 4x1.7 GHz Kryo 385 Silver)', 35000, '8', 'images/electronics/mobiles/oneplus 6.jpg'),
('P7', 'HONOR 7c', 'CAT1', '4 GB RAM ,Octa-core 1.8 GHz Cortex-A53', 9999, '8', 'images/electronics/mobiles/honor 7c.jpg'),
('P8', 'Moto G6', 'CAT1', 'Octa-core 1.8 GHz Cortex-A53', 13999, '9', 'images/electronics/mobiles/moto g6.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
