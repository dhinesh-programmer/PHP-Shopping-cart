-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2018 at 08:56 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `shp_basket_id` int(11) NOT NULL AUTO_INCREMENT,
  `shp_basket_ses` varchar(150) NOT NULL,
  `shp_basket_product_id` int(11) NOT NULL,
  `shp_basket_product_price` float(7,2) NOT NULL,
  `shp_product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`shp_basket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `basket`
--


-- --------------------------------------------------------

--
-- Table structure for table `manage_order`
--

CREATE TABLE IF NOT EXISTS `manage_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) NOT NULL,
  `user_mobile` bigint(20) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_transport_type` varchar(50) NOT NULL,
  `total_amount` float(7,2) NOT NULL,
  `delete_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `manage_order`
--


-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `shp_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `shp_product_name` varchar(250) NOT NULL,
  `shp_product_price` float(7,2) NOT NULL,
  `shp_product_image` varchar(250) NOT NULL,
  `shp_product_delete_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shp_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`shp_product_id`, `shp_product_name`, `shp_product_price`, `shp_product_image`, `shp_product_delete_status`) VALUES
(1, 'Apple', 0.30, 'shp_apple.jpg', 1),
(2, 'Beer ', 2.00, 'shp_beer.jpg', 1),
(3, 'Water', 1.00, 'shp_water.jpg', 1),
(4, 'Cheese', 3.74, 'shp_cheese.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `shp_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `shp_review_product_id` int(11) NOT NULL,
  `shp_user_name` varchar(250) NOT NULL,
  `shp_review_rating` int(50) NOT NULL,
  `shp_rating_ses` varchar(150) NOT NULL,
  `shp_review_delete_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`shp_review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reviews`
--

