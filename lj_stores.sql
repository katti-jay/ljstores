-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2017 at 02:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lj_stores`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `serial` int(11) NOT NULL,
  `name` varchar(110) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`serial`, `name`, `password`, `date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`) VALUES
(1, 'Men'),
(2, 'Ladies');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `product_serial` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `datetime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `email`, `customer`, `product_serial`, `message`, `datetime`) VALUES
(1, 'm.wandas@yahoo.com', 'Me', 3, 'isnt she pretty', '2017-05-25'),
(2, 'me@me.com', 'Loreta', 3, 'Yess', '2017-05-25'),
(3, 'm.jysdh@hj.com', 'sdfsdf', 1, 'dsfdf', '2017-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `msg_status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `msg_status`, `date`) VALUES
(2, 'fd', 'D@hs.com', 'home ', 'DSg', 1, '2015-11-05 00:00:00'),
(3, 'fd', 'D@hs.com', 'home ', 'DSg', 1, '2015-11-05 00:00:00'),
(5, 'spurgowdyq', 'm.wandam@yahoo.com', 'gfhjk', 'truyuyup[p', 1, '2017-06-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `country`, `currency`, `date`) VALUES
(1, 'USA', 'Dollars', '0000-00-00'),
(2, 'Africa', 'Canadian Dollars', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `newcat`
--

CREATE TABLE IF NOT EXISTS `newcat` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `subcategory` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `newcat`
--

INSERT INTO `newcat` (`serial`, `category`, `subcategory`, `name`, `description`, `quantity`, `price`, `picture`, `date`) VALUES
(1, 'Electrical Gadgets', 'Computer Appliances', 'View Sonic LCD', '19" View Sonic Black LCD, with 10 months warranty', 67, 250, 'lcd.jpg', '2015-04-08 00:00:00'),
(2, 'Electrical Gadgets', 'Computer Appliances', 'IBM CDROM Drive', 'IBM CDROM Drive', 78, 80, 'cdrom-drive.jpg', '2015-04-24 00:00:00'),
(3, 'Electrical Gadgets', 'Computer Appliances', 'Laptop Charger', 'Dell Laptop Charger with 6 months warranty', 98, 50, 'charger.jpg', '2015-04-14 00:00:00'),
(4, 'Electrical Gadgets', 'Computer Appliances', 'Seagate Hard Drive', '80 GB Seagate Hard Drive in 10 months warranty', 97, 40, 'hard-drive.jpg', '2015-04-30 00:00:00'),
(5, 'Electrical Gadgets', 'Computer Appliances', 'Atech Mouse', 'Black colored laser mouse. No warranty', 0, 5, 'mouse.jpg', '2015-04-09 00:00:00'),
(6, 'Electrical Gadgets', 'Computer Appliances', 'Flashdisk', ' Flash-disk', 65, 299, 'flash-disk.jpg', '2015-04-23 00:00:00'),
(7, 'Gents', 'Adult', 'Polo T-Shirt', 'Polo top (blue)', 78, 79, 'fashion1.jpg', '2015-04-15 00:00:00'),
(8, 'Ladies', 'Adult', 'Corporate Wear', 'Corporate suit', 135, 99.5, 'fashion2.jpg', '2015-04-23 00:00:00'),
(9, 'Ladies', 'Adult', 'Cotton Jacket', 'Spiky yet soft cotton Jacket', 987, 56, 'fashion4.jpg', '2015-04-26 00:00:00'),
(12, 'Ladies', 'Adult', 'Prada Pencil Dress B', 'Pencil Down', 0, 76, 'fashion5.jpg', '2015-04-20 00:00:00'),
(15, 'Gents', 'Adult', 'Lacorste', 'Stripped lacorste', 40, 73, 'fashion8.jpg', '2015-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `compname` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `fname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `lname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `othername` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `region` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `city` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `othermsg` text COLLATE latin1_general_ci NOT NULL,
  `total` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderid`, `compname`, `title`, `fname`, `lname`, `othername`, `email`, `address`, `phone`, `region`, `city`, `othermsg`, `total`, `date`) VALUES
(1, 'spurcorp', 'C.E.O', 'Matthew', 'Wandam', 'vhtff', 'wandam@yahoo.com', 'box se 148 Suame- ksi', '233547194251', 'Greater Accra', 'kumasi', 'gghhh', 22025, '2015-09-12 15:10:44'),
(2, 'spurcorp', 'C.E.O', 'Matthew', 'Wandam', 'kwabena', 'wandam@yahoo.com', 'box se 148 Suame- ksi', '233547194251', 'Ashanti', 'kumasi', 'dgrffdffg', 45, '2015-09-16 15:26:22'),
(3, 'mnwtfcts', 'C.E.O', 'Matthew', 'Opareh', 'kwabena', 'wandam@yahoo.com', 'box se 148 Suame- ksi', '233547194251', 'Greater Accra', 'kumasi', 'dtghtr', 18018, '2015-09-17 11:09:39'),
(4, 'greencoin', 'manager', 'Matthew', 'Wandam', 'Kwabena', 'spurgowdy@gmail.com', '123 streets Apiadu', 'kjjcd55', '--Region --', 'fdooklrd', 'cjkkjnkj', 845, '2015-09-25 16:05:02'),
(5, 'dcsxzc', 'dcxfz', 'zcsxv', 'vcxvz', 'xcvz', 'm.wandam@yahoo.com', 'cxvx', '41234585', 'Upper West', 'sdfg', 'dzsxfdxc', 8823, '2015-11-03 13:12:41'),
(6, 'dcsxzc', 'dcxfz', 'zcsxv', 'vcxvz', 'xcvz', 'm.wandam@yahoo.com', 'cxvx', '41234585', 'Upper West', 'sdfg', 'dzsxfdxc', 8823, '2015-11-03 14:04:28'),
(7, 'dcsxzc', 'dcxfz', 'zcsxv', 'vcxvz', 'xcvz', 'm.wandam@yahoo.com', 'cxvx', '41234585', 'Northen', 'sdfg', '						Notes about your order, Special Notes for Delivery\r\n							', 8823, '2015-11-03 14:37:30'),
(8, 'dcsxzc', 'dcxfz', 'zcsxv', 'vcxvz', 'xcvz', 'm.wandam@yahoo.com', 'cxvx', '41234585', 'Greater Accra', 'sdfg', '						Notes about your order, Special Notes for Delivery\r\n				jhbkjmb			', 8823, '2015-11-03 14:39:12'),
(9, 'dcsxzc', 'dcxfz', 'zcsxv', 'vcxvz', 'xcvz', 'm.wandam@yahoo.com', 'cxvx', '41234585', 'Northen', 'sdfg', 'hhjhhgfdgsfsdfgf', 8823, '2015-11-03 15:17:04'),
(10, 'Pugh INT', 'C.E.O', 'Kofi ', 'Nti', 'Amoah', 'm.wandam@yahoo.com', '123 Adoato', '123545', 'Greater Accra', 'kumasi', '	Bring it to the Address Specified in the form\r\n							', 9859, '2015-12-16 13:11:40'),
(11, 'Pugh INT', 'C.E.O', 'Matthew', 'Wandam', 'Amoah', 'm.wandam@yahoo.com', '123 Adoato', '123545', 'Greater Accra', 'kumasi', 'deliver to the stated', 25083, '2015-12-19 05:15:31'),
(12, 'Pugh INT', 'C.E.O', 'Matthew', 'Wandam', 'Amoah', 'm.wandam@yahoo.com', '123 Adoato', '123545', 'Northen', 'kumasi', 'sfgdfcghngfv', 25083, '2015-12-19 05:22:34'),
(13, 'Pugh INT', 'C.E.O', 'Matthew', 'Wandam', 'Amoah', 'm.wandam@yahoo.com', '123 Adoato', '123545', 'Northen', 'kumasi', 'sfgdfcghngfv', 25083, '2015-12-19 05:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `user_id_fk` int(11) NOT NULL,
  `category` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `negotiable` varchar(11) COLLATE latin1_general_ci NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`serial`, `user_id_fk`, `category`, `name`, `description`, `negotiable`, `price`, `picture`, `product_status`, `date`) VALUES
(1, 4, '6', 'spurgowdy_346', '', 'No', 2302, '006-cars-640.jpg', 1, '2017-06-08 15:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `recomended`
--

CREATE TABLE IF NOT EXISTS `recomended` (
  `serial` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `subcategory` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`serial`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `recomended`
--

INSERT INTO `recomended` (`serial`, `category`, `subcategory`, `name`, `description`, `quantity`, `price`, `picture`, `date`) VALUES
(1, 'Electrical Gadgets', 'Computer Appliances', 'View Sonic LCD', '19" View Sonic Black LCD, with 10 months warranty', 67, 250, 'lcd.jpg', '2015-04-08 00:00:00'),
(2, 'Electrical Gadgets', 'Computer Appliances', 'IBM CDROM Drive', 'IBM CDROM Drive', 78, 80, 'cdrom-drive.jpg', '2015-04-24 00:00:00'),
(3, 'Electrical Gadgets', 'Computer Appliances', 'Laptop Charger', 'Dell Laptop Charger with 6 months warranty', 98, 50, 'charger.jpg', '2015-04-14 00:00:00'),
(4, 'Electrical Gadgets', 'Computer Appliances', 'Seagate Hard Drive', '80 GB Seagate Hard Drive in 10 months warranty', 97, 40, 'hard-drive.jpg', '2015-04-30 00:00:00'),
(5, 'Electrical Gadgets', 'Computer Appliances', 'Atech Mouse', 'Black colored laser mouse. No warranty', 0, 5, 'mouse.jpg', '2015-04-09 00:00:00'),
(6, 'Electrical Gadgets', 'Computer Appliances', 'Flashdisk', ' Flash-disk', 65, 299, 'flash-disk.jpg', '2015-04-23 00:00:00'),
(7, 'Gents', 'Adult', 'Polo T-Shirt', 'Polo top (blue)', 78, 79, 'fashion1.jpg', '2015-04-15 00:00:00'),
(8, 'Ladies', 'Adult', 'Corporate Wear', 'Corporate suit', 135, 99.5, 'fashion2.jpg', '2015-04-23 00:00:00'),
(9, 'Ladies', 'Adult', 'Cotton Jacket', 'Spiky yet soft cotton Jacket', 987, 56, 'fashion4.jpg', '2015-04-26 00:00:00'),
(12, 'Ladies', 'Adult', 'Prada Pencil Dress B', 'Pencil Down', 0, 76, 'fashion5.jpg', '2015-04-20 00:00:00'),
(15, 'Gents', 'Adult', 'Lacorste', 'Stripped lacorste', 40, 73, 'fashion8.jpg', '2015-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id_fk` int(11) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_id`, `cat_id_fk`, `sub_cat_name`) VALUES
(1, 1, 'Ankara shirts'),
(2, 1, 'Ankara  Accessories'),
(3, 1, 'Ankara trousers'),
(4, 1, 'Ankara Shoes'),
(5, 2, 'Ankara shirts'),
(6, 2, 'Ankara skirts'),
(7, 2, 'Ankara trousers'),
(8, 2, 'Ankara  Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `country` varchar(150) NOT NULL,
  `region` varchar(150) NOT NULL,
  `profile_pic` varchar(150) NOT NULL,
  `user_status` int(11) NOT NULL,
  `signup` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`fname`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `mobile`, `password`, `country`, `region`, `profile_pic`, `user_status`, `signup`) VALUES
(4, 'Matthew', 'Wandam', 'essian', 'm.wandam@yahoo.com', '0547194251', '827ccb0eea8a706c4c34a16891f84e7b', 'Austria', 'Salzburg', 'black_n_color_cubes-wallpaper-10685967.jpg', 1, '2017-06-07 22:30:36');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
