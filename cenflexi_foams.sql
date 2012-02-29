-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2011 at 11:03 AM
-- Server version: 5.1.55
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cenflexi_foams`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `session_start` int(10) unsigned NOT NULL DEFAULT '0',
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `session_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `session_start`, `last_activity`, `ip_address`, `user_agent`, `session_data`) VALUES
('2437580278b420c37d5179387cf60d71', 0, 1301203456, '115.184.111.29', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWeb', 'a:1:{s:6:"u_name";s:5:"admin";}'),
('2c3fbe58b8fc8d435f1d1cf5cace9bff', 0, 1301203715, '115.184.46.175', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) Ap', NULL),
('f805f1064a47ad59e1144f587eacb261', 0, 1301203457, '115.184.111.29', 'Mozilla/5.0 (X11; U; Linux x86_64; en-US) AppleWeb', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_densities`
--

CREATE TABLE IF NOT EXISTS `item_densities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemname` varchar(45) DEFAULT NULL,
  `variety` varchar(45) DEFAULT NULL,
  `density` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `item_densities`
--

INSERT INTO `item_densities` (`id`, `itemname`, `variety`, `density`) VALUES
(1, 'Sheets', 'Premium', '14'),
(2, 'Sheets', 'Premium', '16'),
(3, 'Sheets', 'Premium', '23'),
(4, 'Sheets', 'Premium', '18'),
(5, 'Sheets', 'Premium', '28'),
(6, 'Sheets', 'Premium', '32'),
(7, 'Sheets', 'Premium', '40'),
(8, 'Sheets', 'Premium', '50'),
(9, 'Sheets', 'Elegant', '16'),
(10, 'Sheets', 'Elegant', '18'),
(11, 'Sheets', 'Elegant', '23'),
(12, 'Sheets', 'Elegant', '28'),
(13, 'Sheets', 'Elegant', '32'),
(14, 'Sheets', 'Elegant', '40'),
(15, 'Sheets', 'Elegant', '50'),
(16, 'Cushions', 'Premium', '14'),
(17, 'Cushions', 'Premium', '16'),
(18, 'Cushions', 'Premium', '18'),
(19, 'Cushions', 'Premium', '23'),
(20, 'Cushions', 'Premium', '28'),
(21, 'Cushions', 'Premium', '32'),
(22, 'Cushions', 'Premium', '40'),
(23, 'Cushions', 'Premium', '50'),
(24, 'Sheets', 'super softy', '18'),
(25, 'Sheets', 'super softy', '23'),
(26, 'Sheets', 'super softy', '32'),
(27, 'Cushions', 'Elegant', '16'),
(28, 'Cushions', 'Elegant', '23'),
(29, 'Cushions', 'Elegant', '28'),
(30, 'Cushions', 'Elegant', '32'),
(31, 'Cushions', 'Elegant', '40'),
(32, 'Cushions', 'Elegant', '50'),
(33, 'Rolls', 'Premium', '18'),
(34, 'Rolls', 'Premium', '23'),
(35, 'Rolls', 'Premium', '14'),
(36, 'Rolls', 'Elegant', '16'),
(37, 'Rolls', 'Elegant', '23'),
(38, 'Rolls', 'Softy', '18'),
(39, 'Sheets', 'B Grade', 'B 1 A'),
(40, 'Sheets', 'B Grade', 'B 1 B'),
(41, 'Sheets', 'B Grade', 'B 2'),
(42, 'Cushions', 'C Grade', 'C 2'),
(43, 'Cushions', 'C Grade', 'C 1'),
(44, 'Cushions', 'C Grade', 'C 1'),
(45, 'Cushions', 'C Grade', 'C 3'),
(46, 'Sheets', 'Skin', 'Bottom Skin'),
(47, 'Sheets', 'Skin', 'Side Skin'),
(48, 'Rolls', 'Skin', 'Bottom Roll'),
(49, 'Rolls', 'Skin', 'Top Roll'),
(50, 'Cushions', 'B Grade', 'B Cushions'),
(51, 'Sheets', 'B Grade', 'BH1B'),
(52, 'Sheets', 'B Grade', 'BCUSHIONS'),
(53, 'Sheets', 'B Grade', 'BH3'),
(54, 'Sheets', 'B Grade', 'B Rebond'),
(55, 'Sheets', 'C Grade', 'C1'),
(56, 'Sheets', 'C Grade', 'CH1'),
(57, 'Sheets', 'FR', '28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminmaster`
--

CREATE TABLE IF NOT EXISTS `tbl_adminmaster` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_adminmaster`
--

INSERT INTO `tbl_adminmaster` (`id`, `username`, `password`, `name`, `mobile`, `city`) VALUES
(1, 'admin', 'admin', 'Admin', '98777112', 'Hyderabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

CREATE TABLE IF NOT EXISTS `tbl_branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `branchcode` varchar(45) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `street1` varchar(150) DEFAULT NULL,
  `street2` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `pincode` varchar(15) DEFAULT NULL,
  `tinnumber` varchar(45) DEFAULT NULL,
  `branchname` text,
  `ecc` varchar(45) DEFAULT NULL,
  `cst` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_branches`
--

INSERT INTO `tbl_branches` (`id`, `username`, `password`, `branchcode`, `name`, `phone`, `mobile`, `street1`, `street2`, `city`, `state`, `pincode`, `tinnumber`, `branchname`, `ecc`, `cst`) VALUES
(3, 'NagpurDepot', 'nagpur', '102', 'Satayanaryana', '9999', '998999', 'adfa', 'adsf', 'Pune', 'Maharastra', '500022', '22222', 'NagpurDepot', '222', '2222'),
(4, 'bangalore', 'bangalore', '105', 'ad', '22', '22', 'asd', 'asdf', 'bangalore', 'karnataka', '5222', '22', 'Bangalore', '222', '22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bundlelist`
--

CREATE TABLE IF NOT EXISTS `tbl_bundlelist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donum` varchar(45) DEFAULT NULL,
  `bundlenumber` varchar(45) DEFAULT NULL,
  `nopieces` varchar(45) DEFAULT NULL,
  `bundledate` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `orderid` varchar(45) DEFAULT NULL,
  `bundleweight` varchar(45) DEFAULT NULL,
  `meters` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_bundlelist`
--

INSERT INTO `tbl_bundlelist` (`id`, `donum`, `bundlenumber`, `nopieces`, `bundledate`, `status`, `orderid`, `bundleweight`, `meters`) VALUES
(1, '2', '1', '8', '24/03/2011', 'Dispatched', '10', NULL, NULL),
(2, '1', 'R1', NULL, '24/03/2011', 'Dispatched', '8', NULL, '25'),
(3, '1', 'R2', NULL, '24/03/2011', 'Dispatched', '8', NULL, '25'),
(4, '1', 'b1', NULL, '25/03/2011', 'Dispatched', '9', NULL, '25.5'),
(5, '1', 'b2', NULL, '25/03/2011', 'Dispatched', '9', NULL, '35.5'),
(6, '4', '4', '16', '25/03/2011', 'Dispatched', '16', NULL, NULL),
(7, '4', '5', '32', '25/03/2011', 'Dispatched', '15', NULL, NULL),
(8, '4', '7', '32', '25/03/2011', 'Dispatched', '15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuttinginstruction`
--

CREATE TABLE IF NOT EXISTS `tbl_cuttinginstruction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donum` varchar(45) DEFAULT NULL,
  `orderdate` varchar(15) DEFAULT NULL,
  `bundlestatus` varchar(45) DEFAULT NULL,
  `numbundles` varchar(45) DEFAULT NULL,
  `orderstatus` varchar(80) DEFAULT NULL,
  `bundling` varchar(45) DEFAULT NULL,
  `remainingbundles` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `orderid` varchar(45) DEFAULT NULL,
  `orderedmtrs` varchar(45) DEFAULT NULL,
  `remainingmtrs` varchar(45) DEFAULT NULL,
  `totalmtrs` varchar(45) DEFAULT NULL,
  `mtrsleft` varchar(45) DEFAULT NULL,
  `cancelstatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_cuttinginstruction`
--

INSERT INTO `tbl_cuttinginstruction` (`id`, `donum`, `orderdate`, `bundlestatus`, `numbundles`, `orderstatus`, `bundling`, `remainingbundles`, `date`, `orderid`, `orderedmtrs`, `remainingmtrs`, `totalmtrs`, `mtrsleft`, `cancelstatus`) VALUES
(1, '2', NULL, 'Full', '1', 'In Process', NULL, '0', '24/03/2011', '10', NULL, NULL, NULL, NULL, NULL),
(2, '2', NULL, 'Full', '3', 'In Process', NULL, '0', '24/03/2011', '11', NULL, NULL, NULL, NULL, NULL),
(3, '2', NULL, 'Full', '2', 'In Process', NULL, '0', '24/03/2011', '12', NULL, NULL, NULL, NULL, NULL),
(4, '2', NULL, 'Full', NULL, 'In Process', NULL, NULL, '24/03/2011', '13', NULL, '500', '500', '500', NULL),
(5, '1', NULL, 'Full', '5', 'In Process', NULL, '0', '24/03/2011', '1', NULL, NULL, NULL, NULL, NULL),
(6, '1', NULL, 'Full', '6', 'In Process', NULL, '0', '24/03/2011', '2', NULL, NULL, NULL, NULL, NULL),
(7, '1', NULL, 'Full', '2', 'In Process', NULL, '0', '24/03/2011', '3', NULL, NULL, NULL, NULL, NULL),
(8, '1', NULL, 'Full', '2', 'In Process', NULL, '0', '24/03/2011', '4', NULL, NULL, NULL, NULL, NULL),
(9, '1', NULL, 'Full', '5', 'In Process', NULL, '0', '24/03/2011', '5', NULL, NULL, NULL, NULL, NULL),
(10, '1', NULL, 'Full', '5', 'In Process', NULL, '0', '24/03/2011', '6', NULL, NULL, NULL, NULL, NULL),
(11, '1', NULL, 'Full', '2', 'In Process', NULL, '0', '24/03/2011', '7', NULL, NULL, NULL, NULL, NULL),
(12, '1', NULL, 'Full', NULL, 'In Process', NULL, NULL, '24/03/2011', '8', '25', '500', '525', '550', NULL),
(13, '1', NULL, 'Full', NULL, 'In Process', NULL, NULL, '24/03/2011', '9', '2', '4', '6', '6', NULL),
(14, '4', NULL, 'Full', '2', 'Bundled', NULL, '0', '25/03/2011', '15', NULL, NULL, NULL, NULL, NULL),
(15, '4', NULL, 'Full', '1', 'In Process', NULL, '0', '25/03/2011', '16', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributors`
--

CREATE TABLE IF NOT EXISTS `tbl_distributors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `dcode` varchar(45) DEFAULT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `street1` varchar(150) DEFAULT NULL,
  `street2` varchar(150) DEFAULT NULL,
  `city` varchar(150) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `pincode` varchar(15) DEFAULT NULL,
  `tinnumber` varchar(45) DEFAULT NULL,
  `dname` text,
  `ecc` varchar(45) DEFAULT NULL,
  `cst` varchar(45) DEFAULT NULL,
  `customertype` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_distributors`
--

INSERT INTO `tbl_distributors` (`id`, `username`, `password`, `dcode`, `name`, `phone`, `mobile`, `street1`, `street2`, `city`, `state`, `pincode`, `tinnumber`, `dname`, `ecc`, `cst`, `customertype`) VALUES
(1, NULL, NULL, '001', 'Naveen', '999', '9999', 'Gowliguda', '', 'Hyderabad', 'AP', '500024', '00', 'Varun Sai Foams', '000', '00', 'Wholesaler'),
(2, NULL, NULL, '002', 'Asif', '999', '9999', 'Asifnagar', '', 'Hyderabad', 'AP', '500024', '00', 'Foam Planet', '000', '00', 'Wholesaler'),
(3, NULL, NULL, '003', 'rajesh', '999', '9999', 'Kavadiguda', '', 'Hyderabad', 'AP', '500024', '00', 'Sourabh', '000', '00', 'Dealers'),
(4, NULL, NULL, '004', 'Ramesh', '999', '9999', 'Governapet', '', 'Vijayawada', 'AP', '500024', '00', 'Sri Ganesh Ent', '000', '00', 'Stockist'),
(5, NULL, NULL, '005', 'Ramesh', '999', '9999', 'Governapet', '', 'Vijayawada', 'AP', '500024', '00', 'Sri Ganesh', '000', '00', 'Stockist'),
(6, NULL, NULL, '006', 'ravi', '999', '9999', 'Santoshnagar', '', 'Hyderabad', 'AP', '500024', '00', 'Ratandeep', '000', '00', 'Industrial Customer'),
(7, NULL, NULL, '007', 'Srinivas', '999', '9999', 'Tirumalgery', '', 'Hyderabad', 'AP', '500024', '00', 'Priya Ent', '000', '00', 'Distributor'),
(8, NULL, NULL, '102', 'Jagan', '0848522952', '0848522952', 'Sy.No.174 & 176', 'I.D.A Bollarm,', 'Jinnaram Mandal, Medak.', 'Andhra Pradesh', '500052', '', 'Centuary Fibre Plates Pvt.Ltd', '', '', 'Industrial Customer'),
(9, NULL, NULL, '115', 's', '99', '99', 'Guntur', '', 'Guntur', 'Andhra Pradesh', '500258', '', 'A S Furniture', '', '', 'Stockist'),
(10, NULL, NULL, '116', 's', '99', '99', 'Karimnagar', '', 'Karimnagar', 'Andhra Pradesh', '500258', '', 'Sri Laxmi Industries', '', '', 'Stockist'),
(11, NULL, NULL, '117', 's', '99', '99', 'Kadapa', '', 'Kadapa', 'Andhra Pradesh', '500258', '', 'Prabhu Rexine', '', '', 'Stockist'),
(12, NULL, NULL, '118', 's', '99', '99', 'Jeedimental', '', 'Hyderabad', 'Andhra Pradesh', '500258', '', 'Young Wood', '', '', 'Stockist');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factoryusers`
--

CREATE TABLE IF NOT EXISTS `tbl_factoryusers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `street1` varchar(45) DEFAULT NULL,
  `street2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `user` varchar(5) DEFAULT NULL,
  `orders` varchar(5) DEFAULT NULL,
  `orderho` varchar(5) DEFAULT NULL,
  `cutting` varchar(5) DEFAULT NULL,
  `loading` varchar(5) DEFAULT NULL,
  `package` varchar(5) DEFAULT NULL,
  `ucreation` varchar(5) DEFAULT NULL,
  `vcreation` varchar(5) DEFAULT NULL,
  `ocreation` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_factoryusers`
--

INSERT INTO `tbl_factoryusers` (`id`, `name`, `mobile`, `street1`, `street2`, `city`, `state`, `pincode`, `username`, `password`, `user`, `orders`, `orderho`, `cutting`, `loading`, `package`, `ucreation`, `vcreation`, `ocreation`) VALUES
(1, 'sandy', '9887876', 'shgjhg', 'jhg', 'ghjkhg', 'ap', '8776', 'sandy', 'sandy', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No'),
(2, 'babul', '98867876', 'jhgjk', 'hjkhjk', 'kjhjk', 'ap', '75675', 'babul', 'babul', 'Yes', 'Yes', 'Yes', 'Yes', 'No', 'No', 'Yes', 'Yes', 'No'),
(3, 'subith', '9887876', 'shgjhg', 'jhg', 'ghjkhg', 'ap', '8776', 'subith', 'subith', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(4, 'aditya', '99674553', 'ghf', 'hgfhg', 'hyd', 'ap', '56575', 'aditya', 'aditya', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'No'),
(6, 'Bhavani Shankar', '9848066295', 'Sy.No. 306 310-313', '', 'Shankarpet', 'AP', '502245', 'factory', 'factory', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factory_master`
--

CREATE TABLE IF NOT EXISTS `tbl_factory_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `factorycode` varchar(45) DEFAULT NULL,
  `contactname` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `factoryphone` varchar(45) DEFAULT NULL,
  `street1` varchar(45) DEFAULT NULL,
  `street2` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `tinnumber` varchar(45) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_factory_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemmaster`
--

CREATE TABLE IF NOT EXISTS `tbl_itemmaster` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemcode` varchar(45) DEFAULT NULL,
  `itemname` varchar(150) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_itemmaster`
--

INSERT INTO `tbl_itemmaster` (`id`, `itemcode`, `itemname`, `unit`) VALUES
(1, '12', 'Sheets', '20'),
(2, 'C1001', 'Cushions', 'Num'),
(3, 'Rolls', 'Rolls', 'Mts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_varieties`
--

CREATE TABLE IF NOT EXISTS `tbl_item_varieties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemname` varchar(45) DEFAULT NULL,
  `variety` varchar(45) DEFAULT NULL,
  `density` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `tbl_item_varieties`
--

INSERT INTO `tbl_item_varieties` (`id`, `itemname`, `variety`, `density`) VALUES
(11, 'Sheets', 'Premium', '16'),
(12, 'Sheets', 'Elegant', '16'),
(13, 'Cushions', 'Premium', '16'),
(16, 'Cushions', 'Elegant', '23'),
(18, 'Rolls', 'Premium', NULL),
(19, 'Sheets', 'super softy', NULL),
(20, 'Sheets', 'FR', NULL),
(21, 'Rolls', 'Elegant', NULL),
(23, 'Sheets', 'B Grade', NULL),
(24, 'Sheets', 'C Grade', NULL),
(25, 'Sheets', 'Skin', NULL),
(26, 'Cushions', 'B Grade', NULL),
(27, 'Cushions', 'C Grade', NULL),
(28, 'Cushions', 'Skin', NULL),
(29, 'Rolls', 'B Grade', NULL),
(30, 'Rolls', 'C Grade', NULL),
(31, 'Rolls', 'Skin', NULL),
(41, 'Rolls', 'Softy', NULL),
(40, 'Sheets', 'Rebond Foam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loadingadvice`
--

CREATE TABLE IF NOT EXISTS `tbl_loadingadvice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donum` varchar(45) DEFAULT NULL,
  `dateofloading` varchar(45) DEFAULT NULL,
  `bundlenum` varchar(45) DEFAULT NULL,
  `partyname` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `vehiclenumber` varchar(45) DEFAULT NULL,
  `transporter` varchar(45) DEFAULT NULL,
  `orderid` varchar(45) DEFAULT NULL,
  `density` varchar(45) DEFAULT NULL,
  `variety` varchar(45) DEFAULT NULL,
  `itemname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_loadingadvice`
--

INSERT INTO `tbl_loadingadvice` (`id`, `donum`, `dateofloading`, `bundlenum`, `partyname`, `remarks`, `quantity`, `status`, `vehiclenumber`, `transporter`, `orderid`, `density`, `variety`, `itemname`) VALUES
(1, '1', '24/03/2011', 'R1', 'bangalore', 'asdf', '25', 'Old', 'AP36 1234', 'ASDFASDF', '8', '23', 'Premium', 'Rolls'),
(2, '1', '24/03/2011', 'R2', 'bangalore', 'asdf', '25', 'Old', 'AP36 1234', 'ASDFASDF', '8', '23', 'Premium', 'Rolls'),
(3, '2', '24/03/2011', '1', 'Varun Sai Foams', 'fasdf', '8', 'Old', 'AP36 1234', 'ASDF', '10', '16', 'Elegant', 'Sheets'),
(4, '1', '25/03/2011', 'b1', 'bangalore', 'asdf', '25.5', 'Old', 'AP36 1234', 'asd', '9', 'Bottom Rol', 'Skin', 'Rolls'),
(5, '1', '25/03/2011', 'b2', 'bangalore', 'asdf', '35.5', 'Old', 'AP36 1234', 'asd', '9', 'Bottom Rol', 'Skin', 'Rolls'),
(6, '4', '25/03/2011', '4', 'NagpurDepot', 'fgsfg', '16', 'New', '1234', 'sdfgsd', '16', '23', 'Elegant', 'Sheets'),
(7, '4', '25/03/2011', '5', 'NagpurDepot', 'fgsfg', '32', 'New', '1234', 'sdfgsd', '15', '23', 'Elegant', 'Sheets'),
(8, '4', '25/03/2011', '7', 'NagpurDepot', 'fgsfg', '32', 'New', '1234', 'sdfgsd', '15', '23', 'Elegant', 'Sheets');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'subith', 'subith', 'Factory'),
(5, 'ranjith', 'ranjith', 'Branch'),
(6, 'somesh', 'somesh', 'Distributor'),
(7, 'sms', 'sms', 'Branch'),
(14, 'ravi', 'ravi', 'Factory'),
(16, 'NAVEEN', 'naveen', 'Distributor'),
(17, 'pune', 'pune', 'Factory'),
(18, 'pune1', 'pune', 'Factory'),
(19, 'nagpur', 'nagpur', 'Factory'),
(20, 'nagpur1', 'nagpur', 'Branch'),
(21, 'punedepot', 'pune', 'Branch'),
(23, 'nagpur depot', 'nagpur', 'Branch'),
(24, 'BangaloreDepot', 'deshmukh', 'Branch'),
(25, 'NagpurDepot', 'nagpur', 'Branch'),
(26, 'bangalore', 'bangalore', 'Branch');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE IF NOT EXISTS `tbl_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donum` varchar(45) DEFAULT NULL,
  `itemname` varchar(150) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `numbundles` double DEFAULT NULL,
  `width` varchar(10) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `density` varchar(10) DEFAULT NULL,
  `thickness` varchar(10) DEFAULT NULL,
  `variety` varchar(45) DEFAULT NULL,
  `specificcolor` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `bundlestatus` varchar(45) DEFAULT NULL,
  `remainingbundles` varchar(45) DEFAULT NULL,
  `priority` varchar(45) DEFAULT NULL,
  `packagetype` varchar(45) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `colorspecific` varchar(45) DEFAULT NULL,
  `widthtype` varchar(45) DEFAULT NULL,
  `heighttype` varchar(45) DEFAULT NULL,
  `remainingmtrs` varchar(45) DEFAULT NULL,
  `cancelledbundles` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `donum`, `itemname`, `quantity`, `numbundles`, `width`, `height`, `density`, `thickness`, `variety`, `specificcolor`, `status`, `bundlestatus`, `remainingbundles`, `priority`, `packagetype`, `remarks`, `colorspecific`, `widthtype`, `heighttype`, `remainingmtrs`, `cancelledbundles`) VALUES
(1, '1', 'Sheets', '55', 5, '36', '72', '16', '72', 'Premium', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', 'yellow', 'Inch', 'Inch', '55', '0'),
(2, '1', 'Sheets', '48', 6, '48', '72', '32', '95', 'Elegant', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', 'yellow', 'Inch', 'Inch', '48', '0'),
(3, '1', 'Sheets', '48', 2, '72', '78', '23', '25', 'super softy', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', 'black', 'Inch', 'Inch', '48', '0'),
(4, '1', 'Sheets', 'NA', 2, 'NA', 'NA', 'B 2', 'NA', 'B Grade', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', 'NA', 'Inch', 'Inch', 'NA', '0'),
(5, '1', 'Cushions', '250', 5, '22', '21', '28', '95', 'Elegant', NULL, 'In Process', 'Full', '0', NULL, '', '', '', 'Inch', 'Inch', '250', '0'),
(6, '1', 'Cushions', '250', 5, '18', '21', '32', '75', 'Premium', NULL, 'In Process', 'Full', '0', NULL, '', '', '', 'Inch', 'Inch', '250', '0'),
(7, '1', 'Cushions', 'NA', 2, 'NA', 'NA', 'C 2', 'NA', 'C Grade', NULL, 'In Process', 'Full', '0', NULL, '', '', 'NA', 'Inch', 'Inch', 'NA', '0'),
(8, '1', 'Rolls', NULL, NULL, '54', '550', '23', '5.5', 'Premium', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', '', 'Inch', 'Mtrs', '550', '0'),
(9, '1', 'Rolls', NULL, NULL, 'NA', '6', 'Bottom Rol', 'NA', 'Skin', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', 'NA', 'Inch', 'Mtrs', '6', '0'),
(10, '2', 'Sheets', '12', 2, '60', '72', '16', '95', 'Elegant', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', '', 'Inch', 'Inch', '4', '0'),
(11, '2', 'Sheets', '18', 3, '72', '78', '23', '100', 'Elegant', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', '', 'Inch', 'Inch', '18', '0'),
(12, '2', 'Cushions', '100', 2, '22', '21', '32', '95', 'Premium', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', '', 'Inch', 'Inch', '100', '0'),
(13, '2', 'Rolls', NULL, NULL, '80', '500', '23', '10', 'Elegant', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', '', 'Inch', 'Mtrs', '500', '0'),
(14, '3', 'Sheets', '120', 2, '1524', '1905', '28', '10', 'FR', NULL, 'Sent to Factory', NULL, '2', NULL, 'Standard', '', '', 'Inch', 'Inch', '120', '0'),
(15, '4', 'Sheets', '64', 2, '36', '72', '23', '25', 'Elegant', NULL, 'In Process', 'Full', '0', NULL, 'Without Polythene with Stamping', '', '', 'Inch', 'Inch', '0', '0'),
(16, '4', 'Sheets', '32', 2, '36', '72', '23', '50', 'Elegant', NULL, 'In Process', 'Full', '0', NULL, 'Standard', '', '', 'Inch', 'Inch', '16', '0'),
(17, '5', 'Sheets', '48', 2, '1524', '1905', '28', '25.5', 'FR', NULL, 'New', NULL, '2', NULL, 'Standard', '', '', 'Inch', 'Inch', '48', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_factory`
--

CREATE TABLE IF NOT EXISTS `tbl_orders_factory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donum` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `orderfrom` varchar(45) DEFAULT NULL,
  `bundlestatus` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_orders_factory`
--

INSERT INTO `tbl_orders_factory` (`id`, `donum`, `date`, `status`, `orderfrom`, `bundlestatus`) VALUES
(1, '1', '24-03-2011', 'In Process', 'bangalore', 'Full'),
(2, '2', '24-03-2011', 'In Process', 'Varun Sai Foams', 'Full'),
(3, '3', '25-03-2011', 'New', 'NagpurDepot', NULL),
(4, '4', '25-03-2011', 'In Process', 'NagpurDepot', 'Full');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_master`
--

CREATE TABLE IF NOT EXISTS `tbl_order_master` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donum` bigint(20) DEFAULT NULL,
  `orderdate` varchar(45) DEFAULT NULL,
  `orderfrom` varchar(100) DEFAULT NULL,
  `usertype` varchar(45) DEFAULT NULL,
  `priority` varchar(45) DEFAULT NULL,
  `packagetype` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL,
  `bundlestatus` varchar(45) DEFAULT NULL,
  `remainingbundles` varchar(45) DEFAULT NULL,
  `orderby` varchar(45) DEFAULT NULL,
  `orderto` varchar(100) DEFAULT NULL,
  `dispatcheddate` varchar(45) DEFAULT NULL,
  `remarks` text,
  `authorisedname` varchar(100) DEFAULT NULL,
  `authoriseddesignation` varchar(45) DEFAULT NULL,
  `ordertype` varchar(45) DEFAULT NULL,
  `podate` varchar(45) DEFAULT NULL,
  `ponum` varchar(45) DEFAULT NULL,
  `finisheddate` varchar(45) DEFAULT NULL,
  `billingprice` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_order_master`
--

INSERT INTO `tbl_order_master` (`id`, `donum`, `orderdate`, `orderfrom`, `usertype`, `priority`, `packagetype`, `status`, `active`, `bundlestatus`, `remainingbundles`, `orderby`, `orderto`, `dispatcheddate`, `remarks`, `authorisedname`, `authoriseddesignation`, `ordertype`, `podate`, `ponum`, `finisheddate`, `billingprice`) VALUES
(1, 1, '24/03/2011', NULL, 'Branch', 'Immediate (Within 3 days)', '', 'In Process', 'Yes', 'Full', '0', 'bangalore', 'Bangalore', NULL, 'asdf', 'asdf', 'asdf', 'Verbal', '24/03/2011', '105', NULL, NULL),
(2, 2, '24/03/2011', NULL, 'Wholesaler', 'Immediate (Within 3 days)', '', 'In Process', 'Yes', 'Full', '0', 'Varun Sai Foams', '', NULL, 'fasdf', 'asdf', 'ads', 'Verbal', '24/03/2011', '11', NULL, 'asdf'),
(3, 3, '25/03/2011', NULL, 'Branch', 'Normal (Within 7 days)', '', 'Sent to Factory', 'Yes', NULL, NULL, 'NagpurDepot', 'NagpurDepot', NULL, 'asdf', 'asdf', 'asdf', 'Verbal', '25/03/2011', '105', NULL, NULL),
(4, 4, '25/03/2011', NULL, 'Branch', 'Normal (Within 7 days)', '', 'In Process', 'Yes', 'Full', '0', 'NagpurDepot', 'NagpurDepot', NULL, 'fgsfg', 'sfg', 'sdfg', 'Fax', '25/03/2011', 'asdf', NULL, NULL),
(5, 5, '25/03/2011', NULL, 'Branch', 'Immediate (Within 3 days)', '', 'New', 'Yes', NULL, NULL, 'NagpurDepot', 'NagpurDepot', NULL, 'asd', 'asd', 'asd', 'Fax', '25/03/2011', 'asd', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packaginglist`
--

CREATE TABLE IF NOT EXISTS `tbl_packaginglist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `donum` varchar(45) NOT NULL,
  `bundlenum` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `lengthinmm` varchar(45) DEFAULT NULL,
  `widthinmm` varchar(45) DEFAULT NULL,
  `thicknessinmm` varchar(45) DEFAULT NULL,
  `eachpieceweight` varchar(45) DEFAULT NULL,
  `totalweight` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `pdfpath` varchar(100) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  `orderid` varchar(45) DEFAULT NULL,
  `variety` varchar(45) DEFAULT NULL,
  `density` varchar(45) DEFAULT NULL,
  `qtype` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_packaginglist`
--

INSERT INTO `tbl_packaginglist` (`id`, `donum`, `bundlenum`, `quantity`, `lengthinmm`, `widthinmm`, `thicknessinmm`, `eachpieceweight`, `totalweight`, `date`, `pdfpath`, `status`, `orderid`, `variety`, `density`, `qtype`) VALUES
(1, '1', 'R1', '1 Roll', '25', '1.372', '0.006', '4.733', '4.733', '24-03-2011', 'pdf/Packaging__1300972290.pdf', 'Old', '8', 'Premium', '23', 'Roll'),
(2, '1', 'R2', '1 Roll', '25', '1.372', '0.006', '4.733', '4.733', '24-03-2011', 'pdf/Packaging__1300972290.pdf', 'Old', '8', 'Premium', '23', 'Roll'),
(3, '2', '1', '8 Nos', '1.829', '1.524', '0.095', '4.237', '33.89', '24-03-2011', 'pdf/Packaging__1300972299.pdf', 'Old', '10', 'Elegant', '16', 'Nos'),
(4, '1', 'b1', '1 Roll', '25.5', '-', '-', '0', '25.5', '25-03-2011', 'pdf/Packaging__1301044334.pdf', 'Old', '9', 'Skin', 'Bottom Rol', 'Roll'),
(5, '1', 'b2', '1 Roll', '35.5', '-', '-', '0', '35.5', '25-03-2011', 'pdf/Packaging__1301044334.pdf', 'Old', '9', 'Skin', 'Bottom Rol', 'Roll'),
(6, '4', '4', '16 Nos', '1.829', '0.914', '0.05', '1.922', '30.76', '25-03-2011', 'pdf/Packaging__1301044795.pdf', 'New', '16', 'Elegant', '23', 'Nos'),
(7, '4', '5', '32 Nos', '1.829', '0.914', '0.025', '0.961', '30.76', '25-03-2011', 'pdf/Packaging__1301044795.pdf', 'New', '15', 'Elegant', '23', 'Nos'),
(8, '4', '7', '32 Nos', '1.829', '0.914', '0.025', '0.961', '30.76', '25-03-2011', 'pdf/Packaging__1301044795.pdf', 'New', '15', 'Elegant', '23', 'Nos');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE IF NOT EXISTS `tbl_vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehiclenum` varchar(45) DEFAULT NULL,
  `drivername` varchar(100) DEFAULT NULL,
  `mobilenumber` varchar(45) DEFAULT NULL,
  `transportname` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` (`id`, `vehiclenum`, `drivername`, `mobilenumber`, `transportname`) VALUES
(2, 'AP36 1234', 'Srikanth', '9999', 'XX Transports'),
(3, '1234', 'ravi varma', '9775651', 'sddsa'),
(6, 'AP 23 X 3223', 'VENKATARAMULU', '9958585222', 'VENKATARAMULU');
