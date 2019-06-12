-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2018 at 10:52 AM
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
('P4', 'VIVO V9', 'CAT1', '4 GB RAM,Front glass, aluminum body', 21849, '10', 'images/electronics/mobiles/vivo v9.jpg'),
('P3', 'NOTE 8', 'CAT1', 'Front/back glass (Gorilla Glass 5), aluminum frame,6 GB RAM', 59800, '5', 'images/electronics/mobiles/note 8.jpg'),
('P1', 'Samsung Galaxy S9', 'CAT1', 'Gorilla Glass 5, 64 GB, 4 GB RAM, Octa-core, Android 7.0 (Nougat)', 43980, '10', 'images/samsung-galaxy-s8.jpg'),
('P2', 'iPhone X', 'CAT1', '3GB RAM', 89000, '3', 'images/electronics/mobiles\\iPhone X.jpg'),
('P9', 'Acer Aspire', 'CAT1', 'Processor:Core i5,1 TB Storage,8 GB RAM,Windows 10', 46500, '10', 'images/electronics/laptop\\acer aspire.jpg'),
('P6', 'oneplus 6', 'CAT1', 'Octa-core (4x2.8 GHz Kryo 385 Gold & 4x1.7 GHz Kryo 385 Silver)', 35000, '8', 'images/electronics/mobiles/oneplus 6.jpg'),
('P7', 'HONOR 7c', 'CAT1', '3 GB RAM ,Octa-core SnapDragon 450 1.8 GHz Cortex-A53', 9999, '8', 'images/electronics/mobiles/honor 7c.jpg'),
('P8', 'Moto G6', 'CAT1', 'SnapDragon 636 Octa-core 1.8 GHz Cortex-A53,4GB RAM,128 GB Storage', 160000, '9', 'images/electronics/mobiles/moto g6.jpg'),
('P10', 'Apple-macbook-pro', 'CAT1', 'Processor:Core i7,512 GB Storage,RAM 16 GB,OS:MAC OS', 170989, '12', 'images/electronics/laptop\\apple-macbook-pro.JPG'),
('P11', 'Dell Inspiron', 'CAT1', 'Processor:Core i3, 4 GB RAM,1TB Storage,OS Windows 10', 30068, '10', 'images/electronics/laptop\\dell inspiron.png'),
('P12', 'Asus', 'CAT1', 'Processor:Core i3,4 GB RAM,1TB Storage,OS Windows 10', 26350, '11', 'images/electronics/laptop\\asus.jpg'),
('P13', 'MSI Gaming Laptop', 'CAT1', 'Processor:i7,8GB RAM,1TB ATA Storage,OS:Windows 10 and NVIDIA', 84990, '10', 'images/electronics/laptop\\gaming laptop.jpg'),
('P14', 'Lenovo IdeaPad', 'CAT1', 'Processor:i7,8GB RAM,1TB ATA Storage,OS:Windows 10', 60990, '11', 'images/electronics/laptop\\lenovo ideapad.jpg'),
('P15', 'Fifa 18', 'CAT1', 'PS4 Platform,Developer EA sports', 2500, '11', 'images/electronics/games and entertainment\\fifa 18.jpg'),
('P16', 'Xbox Controller', 'CAT1', 'Compatible with Xbox1,Xbox 1s and Windows 10', 3999, '12', 'images/electronics/games and entertainment\\xbox controller.jpg'),
('P17', 'Xbox one s', 'CAT1', '500GB Storage ,HDMI Cable,Dolby Atmos Sound', 26500, '8', 'images/electronics/games and entertainment\\xbox one s.jpeg'),
('P18', 'PS4 Controller', 'CAT1', 'Dual Shock Controller,Accelerometer,JyroScope Detector and Virtual Sound Effects', 4799, '11', 'images/electronics/games and entertainment\\ps4 controller.png'),
('P19', 'Toddlers Dress', 'CAT2', 'Made up of nylon in India', 1200, '11', 'images/clothing/kids wear\\girl 8.jpg'),
('P20', 'PS 4', 'CAT1', 'Vibrant Colors ,HDR Visuals,1TB Storage,Manufactured by soni', 31669, '10', 'images/electronics/games and entertainment\\ps4.jpg'),
('P21', 'Battlefield 4', 'CAT1', 'Developed by frosbite 3,War Game ,Played on Land ,Sea and Air', 673, '8', 'images/electronics/games and entertainment\\battlefield 4.jpg'),
('P22', 'Blender', 'CAT1', 'Stainless Steel Blades,Super fast Motor', 2420, '7', 'images/electronics/appliances\\blender.jpg'),
('P23', 'Air Conditioner', 'CAT1', 'Instant Cooling,Active Dehumidifier,Sleep Mode,2 Ton', 32990, '6', 'images/electronics/appliances\\air-conditioner.jpg'),
('P24', 'Refrigerator', 'CAT1', 'Digital Display,,Deodorizer,Power Freeze', 32390, '25', 'images/electronics/appliances\\refrigerator.jpg'),
('P25', 'MICROWAVE OVEN', 'CAT1', 'Rust Proof power coated body,60 minutes timer', 3039, '23', 'images/electronics/appliances\\microwave-oven.jpg'),
('P26', 'Washing Machine', 'CAT1', 'Elegant Display,Built in Sink For Tough Stains', 14490, '12', 'images/electronics/appliances\\washing machine.jpg'),
('P27', 'Apple ipad mini 4', 'CAT1', '8 MP Camera,7.9inch LED,iOS 9 Operating System', 33797, '21', 'images/electronics/tablets/apple ipad mini 4.jpg\\'),
('P28', 'Fusion 5 Tablet', 'CAT1', 'Multi-Touch technology,Grip Pen', 33500, '12', 'images/electronics/tablets\\fusion 5.jpg'),
('P29', 'hp pro tablet', 'CAT1', 'Screen 10.1 Inches,4GB RAM,Brand-Intel Processor', 11490, '18', 'images/electronics/tablets\\hp pro tablet.jpg'),
('P30', 'Toshiba Encore', 'CAT1', '7 inch,lightweight', 21205, '16', 'images/electronics/tablets\\toshiba encore.jpg'),
('P31', 'Samsung galaxy tab a', 'CAT1', '8MP Primary Camera,2GB RAM,Quad Core Processor', 17990, '15', 'images/electronics/tablets\\samsung galaxy tab a.jpg'),
('P32', '612 League Girls Dress', 'CAT2', 'pink,100% cotton,full length', 1695, '9', 'images/clothing/kids wear\\girl 1.jpg'),
('P33', '613 League Girls Dress', 'CAT2', 'Red and White ,Knee Length', 2000, '7', 'images/clothing/kids wear\\girl 6.jpg'),
('P34', '614 League Girls Dress', 'CAT2', 'sleevless,Knee length,black and White stripes', 1500, '12', 'images/clothing/kids wear\\girl 7.jpg'),
('P35', '615 League Girls Dress', 'CAT2', 'Red and White,Pure Cotton', 1200, '15', 'images/clothing/kids wear\\girl 3.jpg'),
('P36', '616 League Girls Dress', 'CAT2', 'Jeans Material,Navy Blue', 1400, '12', 'images/clothing/kids wear\\girl 4.jpg'),
('P37', '617 League Girls Dress', 'CAT2', 'blue', 1800, '10', 'images/clothing/kids wear\\girl 5.jpg'),
('P38', '618 League Girls Dress', 'CAT2', 'Multi Color Dress', 2500, '8', 'images/clothing/kids wear/girl 2.jpg'),
('P39', '619 League Boys Dress', 'CAT2', 'Jeans and Shirt', 2800, '12', 'images/clothing/kids wear/boy 1.jpg'),
('P40', '640 League Boys Dress', 'CAT2', 'Normal Wash', 3600, '18', 'images/clothing/kids wear/boy 2.jpg'),
('P41', '641 League Boys Dress', 'CAT2', 'Military Style ', 4000, '12', 'images/clothing/kids wear/boy 3.jpg'),
('P42', 'Pepe Jeans  Mens Skinny Fit jeans', 'CAT2', 'denim', 1700, '12', 'images/clothing/mens clothing\\jeans 1.jpg'),
('P43', 'Pepe Jeans  Mens Skinny Fit jeans', 'CAT2', 'denim', 1800, '20', 'images/clothing/mens clothing\\jeans 2.jpg'),
('P44', 'Mens Fit Formal Shirts', 'CAT2', 'Reular Fit,30% Cotton', 1100, '6', 'images/clothing/mens clothing\\jeans 3.jpg'),
('P45', 'Mens Fit Formal Shirts', 'CAT2', 'Reular Fit,30% Cotton', 1000, '8', 'images/clothing/mens clothing\\shirt 1.jpg'),
('P46', 'Formal Shirt', 'CAT2', 'Formal', 1300, '10', 'images/clothing/mens clothing\\shirt 3.jpg'),
('P47', 'Formal Shirt', 'CAT2', 'Formal', 1500, '12', 'images/clothing/mens clothing\\shirt 4.jpg'),
('P48', 'T Shirts', 'CAT2', 'Body fit,blue', 700, '12', 'images/clothing/mens clothing\\t shirt 1.jpg'),
('P49', 'T Shirts', 'CAT2', 'Black and White,Slim Fit', 900, '13', 'images/clothing/mens clothing\\t shirt 2.jpg'),
('P50', 'T Shirts', 'CAT2', 'Cotton', 1800, '16', 'images/clothing/mens clothing\\t shirt 3.jpg'),
('P51', 'Polo T Shirts', 'CAT2', 'white,U Neck', 750, '11', 'images/clothing/mens clothing\\t shirt 4.jpg'),
('P52', 'salwar suit 1', 'CAT2', 'Elegant and comfortable', 2000, '17', 'images/clothing/womens clothing\\salwar suit 1.jpg'),
('P53', 'salwar suit 1', 'CAT2', 'Party Wear', 3500, '6', 'images/clothing/womens clothing\\salwar suit 3.jpg'),
('P54', 'salwar suit 4', 'CAT2', 'Cotton material', 1350, '6', 'images/clothing/womens clothing\\salwar suit 4.jpg'),
('P55', 'salwar suit 5', 'CAT2', 'Lightweight,sky blue', 2800, '9', 'images/clothing/womens clothing\\salwar suit 5.jpg'),
('P56', 'Kurta ', 'CAT2', 'Saffron color,Sleeveless', 1250, '10', 'images/clothing/womens clothing\\kurta 2.jpg'),
('P57', 'Kurta', 'CAT2', 'Party Wear', 3000, '12', 'images/clothing/womens clothing\\kurta 3.jpg'),
('P58', 'Kurta', 'CAT2', 'Party Wear', 3500, '5', 'images/clothing/womens clothing\\kurta 4.jpg'),
('P59', 'Top', 'CAT2', 'slim fit', 400, '14', 'images/clothing/womens clothing\\top 1.jpg'),
('P60', 'Jeans', 'CAT2', 'skinny jeans,black', 1800, '15', 'images/clothing/womens clothing\\jeans 4.jpg'),
('P61', 'Jeans', 'CAT2', 'Blue denims', 1900, '15', 'images/clothing/womens clothing\\jeans 5.jpg'),
('P62', 'Tide Detergent', 'CAT3', 'Stain Remover Detergent', 450, '9', 'images/accesories and extras/home products\\tide detergent.jpg'),
('P63', 'Vacuum Cleaner', 'CAT3', 'Precise Cleaning', 4000, '12', 'images/accesories and extras/home products\\vacuum cleaner.jpg'),
('P64', 'Plates', 'CAT3', 'MultiColored Plates', 3000, '15', 'images/accesories and extras/home products\\plates.jpg'),
('P66', 'Room Freshner', 'CAT3', 'non-Harmful', 250, '17', 'images/accesories and extras/home products\\room freshner.jpg'),
('P67', 'Bag', 'CAT3', 'Soft ', 700, '10', 'images/accesories and extras/kid acessories\\bag.jpg'),
('P68', 'Tiffin Box', 'CAT3', 'Plastic Material', 280, '20', 'images/accesories and extras/kid acessories\\tiffin box.jpg'),
('P69', 'Kids Cap', 'CAT3', 'circular ,fit and comfortable', 200, '17', 'images/accesories and extras/kid acessories\\kid cap.jpg'),
('P70', 'Watch', 'CAT3', 'plastic belt,analog', 150, '15', 'images/accesories and extras/kid acessories\\watch.jpg'),
('P71', 'Sun Glasses', 'CAT3', 'MultiColored', 100, '20', 'images/accesories and extras/kid acessories\\sun glasses.jpg'),
('P72', 'Cooker', 'CAT3', 'stainless stell', 2000, '19', 'images/accesories and extras/kitchen products\\cooker.jpg'),
('P73', 'Fry Pan', 'CAT3', 'Non-Sticky', 150, '17', 'images/accesories and extras/kitchen products\\fry pan.jpg'),
('P74', 'Idli Maker', 'CAT3', 'Non-Sticky', 500, '15', 'images/accesories and extras/kitchen products\\idli maker.jpg'),
('P75', 'Oven Tray', 'CAT3', 'glass material', 550, '13', 'images/accesories and extras/kitchen products\\oven tray.jpg'),
('P76', 'Storing Utensil', 'CAT3', 'Palstic material', 300, '14', 'images/accesories and extras/kitchen products\\storing utensil.jpg'),
('P77', 'Wallet', 'CAT3', 'Leather material', 500, '10', 'images/accesories and extras/mens acessories\\wallet 2.jpg'),
('P78', 'Trimmer', 'CAT3', 'Sharp Blade,Plastic Handle', 2000, '18', 'images/accesories and extras/mens acessories\\trimmer.jpg'),
('P79', 'Tie', 'CAT3', 'Good Quality Material', 300, '18', 'images/accesories and extras/mens acessories\\tie.jpg'),
('P80', 'Cap', 'CAT3', 'Regular Use', 150, '20', 'images/accesories and extras/mens acessories\\cap.jpg'),
('P81', 'Deodrant', 'CAT3', 'Long Lasting', 400, '10', 'images/accesories and extras/mens acessories\\mens deo.jpg'),
('P82', 'Ear Pods', 'CAT3', 'Convenient for iPhone', 2000, '20', 'images/accesories and extras/mobile acessories\\ear pods.jpg'),
('P83', 'Fitbit watch', 'CAT3', 'Black Color,High Quality belt', 17000, '10', 'images/accesories and extras/mobile acessories\\fitbit watch.jpg'),
('P84', 'Mobile 3 in 1 converter', 'CAT3', 'Flexible to use', 500, '15', 'images/accesories and extras/mobile acessories\\mobile 3 in 1 converter.jpg'),
('P85', 'Power Bank', 'CAT3', 'Backup Support for your Phone', 1500, '18', 'images/accesories and extras/mobile acessories\\power bank.jpg'),
('P86', 'VR Box', 'CAT3', 'Handy for Your Phone', 2000, '14', '\r\nimages/accesories and extras/mobile acessories\\vr box.jpg\r\n\r\n\r\n\r\n'),
('P87', 'MakeupKit', 'CAT3', 'Long Lasting ,WaterProof', 4000, '13', 'images/accesories and extras/women acessories\\makeup kit.jpg'),
('P88', 'Purse', 'CAT3', 'Party Wear Purse', 1000, '20', 'images/accesories and extras/women acessories\\purse.jpg'),
('P89', 'Scarfs', 'CAT3', 'Cotton Material', 100, '12', 'images/accesories and extras/women acessories\\scarfs.jpg'),
('P90', 'Perfume', 'CAT3', 'Vibrant Fragrance,No gas Only Liquid', 2000, '12', 'images/accesories and extras/women acessories\\paris perfume.jpg'),
('P91', 'Ring', 'CAT3', 'Gold Ring', 5000, '5', 'images/accesories and extras/women acessories\\ring.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
