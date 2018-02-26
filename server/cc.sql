-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 03:36 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellDonator` varchar(13) NOT NULL COMMENT 'cell number of donator',
  `cellReciever` varchar(13) NOT NULL COMMENT 'cell number of reciever',
  `amount` decimal(65,0) NOT NULL,
  `status` varchar(25) NOT NULL COMMENT 'claimed or unclaimed',
  `donDate` date NOT NULL,
  `conformationDate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `donation`
--


-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_number` varchar(13) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `support`
--


-- --------------------------------------------------------

--
-- Table structure for table `transactionhistory`
--

CREATE TABLE IF NOT EXISTS `transactionhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cellDonator` varchar(13) NOT NULL,
  `cellReciever` varchar(13) NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `donationDate` date NOT NULL,
  `claimeDate` date NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'complete or incomplete',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transactionhistory`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `p_number` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ref_code` int(11) NOT NULL,
  `vCode` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `universal_code` int(11) NOT NULL,
  `account_holder` varchar(100) NOT NULL,
  `account_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `p_number`, `password`, `ref_code`, `vCode`, `status`, `bank_name`, `universal_code`, `account_holder`, `account_number`) VALUES
(1, 'kk', 'll', '11', '22', 12, '23', 1, 'fnb', 345, 'kk', 123),
(19, 'w', 'w', '33', '33', 0, '167467', 0, '', 0, '', 0),
(20, 'w', 'w', 'w', 'w', 0, '827793', 0, '', 0, '', 0);
