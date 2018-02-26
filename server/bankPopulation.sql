-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 02:14 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cc`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(100) NOT NULL,
  `universal_code` int(11) NOT NULL,
  `key` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `bank_name`, `universal_code`, `key`) VALUES
(1, 'ABSA BANK', 632, 'ABS'),
(2, 'BANK OF ATHENS', 410, 'BOA'),
(3, 'ABSA BANK', 632005, 'ABS'),
(4, 'BANK OF ATHENS', 410506, 'BOA'),
(5, 'BIDVEST BANK', 462005, 'BID'),
(6, 'CAPITEC BANK', 470010, 'CAP'),
(7, 'FIRST NATIONAL BANK', 250655, 'FNB'),
(8, 'INVESTEC', 580105, 'INV'),
(9, 'NEDBANK', 198765, 'NED'),
(10, 'SA POST BANK (POST OFFICE)', 460005, 'SAP'),
(11, 'STANDARD BANK', 51001, 'STA');
