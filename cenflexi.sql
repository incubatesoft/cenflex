-- phpMyAdmin SQL Dump
-- version 2.11.9.4
-- http://www.phpmyadmin.net
--
-- Host: 10.6.186.4
-- Generation Time: Jun 01, 2011 at 12:17 AM
-- Server version: 5.0.91
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cenflexi`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `session_start` int(10) unsigned NOT NULL default '0',
  `last_activity` int(10) unsigned NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(50) NOT NULL,
  `session_data` text,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` VALUES('52afa93962a68c2e4e420cf859006a41', 0, 1306908329, '122.169.222.82', 'Mozilla/5.0 (X11; Linux x86_64; rv:2.0) Gecko/2010', 'a:1:{s:6:"u_name";s:5:"admin";}');
INSERT INTO `ci_sessions` VALUES('90a21c6a801b8775a601f255a0318461', 0, 1306908452, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', 'a:1:{s:6:"u_name";s:7:"factory";}');
INSERT INTO `ci_sessions` VALUES('3ee50b274da738b8500fcad03fbc036c', 0, 1306908454, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', NULL);
INSERT INTO `ci_sessions` VALUES('bd550284abf7f8a336800a875c51e243', 0, 1306908454, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', NULL);
INSERT INTO `ci_sessions` VALUES('ac71f8f286112bdfb5bfd55347d3a8f0', 0, 1306908455, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', NULL);
INSERT INTO `ci_sessions` VALUES('d0a3d3a1396ff686d648cd1b2c794cdf', 0, 1306908459, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', NULL);
INSERT INTO `ci_sessions` VALUES('d9e39c4a325751da557df8a48adcc5ca', 0, 1306908775, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;', 'a:1:{s:6:"u_name";s:10:"marketing1";}');
INSERT INTO `ci_sessions` VALUES('e5c40b5ba11e8fbb7221374e991df900', 0, 1306906913, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1;', 'a:1:{s:6:"u_name";s:7:"factory";}');
INSERT INTO `ci_sessions` VALUES('0b0c92044f42d7b245928092022c84b2', 0, 1306908426, '122.169.210.248', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1;', NULL);
INSERT INTO `ci_sessions` VALUES('efa346ee553a175daca661d81f6e23e7', 0, 1306907506, '122.169.222.82', 'Mozilla/5.0 (X11; Linux x86_64; rv:2.0) Gecko/2010', 'a:1:{s:6:"u_name";s:5:"admin";}');
INSERT INTO `ci_sessions` VALUES('af8f853dd05a5cb259c76b4657bd7577', 0, 1306908378, '122.169.210.248', 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) Ap', 'a:1:{s:6:"u_name";s:7:"factory";}');

-- --------------------------------------------------------

--
-- Table structure for table `item_densities`
--

CREATE TABLE `item_densities` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `itemname` varchar(45) default NULL,
  `variety` varchar(45) default NULL,
  `density` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `item_densities`
--

INSERT INTO `item_densities` VALUES(1, 'Sheets', 'Premium', '14');
INSERT INTO `item_densities` VALUES(2, 'Sheets', 'Premium', '16');
INSERT INTO `item_densities` VALUES(3, 'Sheets', 'Premium', '23');
INSERT INTO `item_densities` VALUES(4, 'Sheets', 'Premium', '18');
INSERT INTO `item_densities` VALUES(5, 'Sheets', 'Premium', '28');
INSERT INTO `item_densities` VALUES(6, 'Sheets', 'Premium', '32');
INSERT INTO `item_densities` VALUES(7, 'Sheets', 'Premium', '40');
INSERT INTO `item_densities` VALUES(8, 'Sheets', 'Premium', '50');
INSERT INTO `item_densities` VALUES(9, 'Sheets', 'Elegant', '16');
INSERT INTO `item_densities` VALUES(10, 'Sheets', 'Elegant', '18');
INSERT INTO `item_densities` VALUES(11, 'Sheets', 'Elegant', '23');
INSERT INTO `item_densities` VALUES(12, 'Sheets', 'Elegant', '28');
INSERT INTO `item_densities` VALUES(13, 'Sheets', 'Elegant', '32');
INSERT INTO `item_densities` VALUES(14, 'Sheets', 'Elegant', '40');
INSERT INTO `item_densities` VALUES(15, 'Sheets', 'Elegant', '50');
INSERT INTO `item_densities` VALUES(16, 'Cushions', 'Premium', '14');
INSERT INTO `item_densities` VALUES(17, 'Cushions', 'Premium', '16');
INSERT INTO `item_densities` VALUES(18, 'Cushions', 'Premium', '18');
INSERT INTO `item_densities` VALUES(19, 'Cushions', 'Premium', '23');
INSERT INTO `item_densities` VALUES(20, 'Cushions', 'Premium', '28');
INSERT INTO `item_densities` VALUES(21, 'Cushions', 'Premium', '32');
INSERT INTO `item_densities` VALUES(22, 'Cushions', 'Premium', '40');
INSERT INTO `item_densities` VALUES(23, 'Cushions', 'Premium', '50');
INSERT INTO `item_densities` VALUES(24, 'Sheets', 'super softy', '18');
INSERT INTO `item_densities` VALUES(25, 'Sheets', 'super softy', '23');
INSERT INTO `item_densities` VALUES(26, 'Sheets', 'super softy', '32');
INSERT INTO `item_densities` VALUES(27, 'Cushions', 'Elegant', '16');
INSERT INTO `item_densities` VALUES(28, 'Cushions', 'Elegant', '23');
INSERT INTO `item_densities` VALUES(29, 'Cushions', 'Elegant', '28');
INSERT INTO `item_densities` VALUES(30, 'Cushions', 'Elegant', '32');
INSERT INTO `item_densities` VALUES(31, 'Cushions', 'Elegant', '40');
INSERT INTO `item_densities` VALUES(32, 'Cushions', 'Elegant', '50');
INSERT INTO `item_densities` VALUES(33, 'Rolls', 'Premium', '18');
INSERT INTO `item_densities` VALUES(34, 'Rolls', 'Premium', '23');
INSERT INTO `item_densities` VALUES(35, 'Rolls', 'Premium', '14');
INSERT INTO `item_densities` VALUES(36, 'Rolls', 'Elegant', '16');
INSERT INTO `item_densities` VALUES(37, 'Rolls', 'Elegant', '23');
INSERT INTO `item_densities` VALUES(38, 'Rolls', 'Softy', '18');
INSERT INTO `item_densities` VALUES(39, 'Sheets', 'B Grade', 'B 1 A');
INSERT INTO `item_densities` VALUES(40, 'Sheets', 'B Grade', 'B 1 B');
INSERT INTO `item_densities` VALUES(41, 'Sheets', 'B Grade', 'B 2');
INSERT INTO `item_densities` VALUES(42, 'Cushions', 'C Grade', 'C 2');
INSERT INTO `item_densities` VALUES(43, 'Cushions', 'C Grade', 'C 1');
INSERT INTO `item_densities` VALUES(44, 'Cushions', 'C Grade', 'C 1');
INSERT INTO `item_densities` VALUES(45, 'Cushions', 'C Grade', 'C 3');
INSERT INTO `item_densities` VALUES(46, 'Sheets', 'Skin', 'Bottom Skin');
INSERT INTO `item_densities` VALUES(47, 'Sheets', 'Skin', 'Side Skin');
INSERT INTO `item_densities` VALUES(48, 'Rolls', 'Skin', 'Bottom Roll');
INSERT INTO `item_densities` VALUES(49, 'Rolls', 'Skin', 'Top Roll');
INSERT INTO `item_densities` VALUES(50, 'Cushions', 'B Grade', 'B Cushions');
INSERT INTO `item_densities` VALUES(51, 'Sheets', 'B Grade', 'BH1B');
INSERT INTO `item_densities` VALUES(52, 'Sheets', 'B Grade', 'BCUSHIONS');
INSERT INTO `item_densities` VALUES(53, 'Sheets', 'B Grade', 'BH3');
INSERT INTO `item_densities` VALUES(54, 'Sheets', 'B Grade', 'B Rebond');
INSERT INTO `item_densities` VALUES(55, 'Sheets', 'C Grade', 'C1');
INSERT INTO `item_densities` VALUES(56, 'Sheets', 'C Grade', 'CH1');
INSERT INTO `item_densities` VALUES(57, 'Sheets', 'FR', '28');
INSERT INTO `item_densities` VALUES(60, 'Sheets', 'Premium WP', '23');
INSERT INTO `item_densities` VALUES(61, 'Sheets', 'Rebond Foam', '80');
INSERT INTO `item_densities` VALUES(62, 'Sheets', 'Premium WP', '28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminmaster`
--

CREATE TABLE `tbl_adminmaster` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `name` varchar(100) default NULL,
  `mobile` varchar(15) default NULL,
  `city` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_adminmaster`
--

INSERT INTO `tbl_adminmaster` VALUES(1, 'admin', 'admin', 'Admin', '98777112', 'Hyderabad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

CREATE TABLE `tbl_branches` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `branchcode` varchar(45) default NULL,
  `name` varchar(150) default NULL,
  `phone` varchar(25) default NULL,
  `mobile` varchar(15) default NULL,
  `street1` varchar(150) default NULL,
  `street2` varchar(150) default NULL,
  `city` varchar(150) default NULL,
  `state` varchar(150) default NULL,
  `pincode` varchar(15) default NULL,
  `tinnumber` varchar(45) default NULL,
  `branchname` text,
  `ecc` varchar(45) default NULL,
  `cst` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_branches`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_bundlelist`
--

CREATE TABLE `tbl_bundlelist` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `donum` varchar(45) default NULL,
  `bundlenumber` varchar(45) default NULL,
  `nopieces` varchar(45) default NULL,
  `bundledate` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `orderid` varchar(45) default NULL,
  `bundleweight` varchar(45) default NULL,
  `meters` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_bundlelist`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuttinginstruction`
--

CREATE TABLE `tbl_cuttinginstruction` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `donum` varchar(45) default NULL,
  `orderdate` varchar(15) default NULL,
  `bundlestatus` varchar(45) default NULL,
  `numbundles` varchar(45) default NULL,
  `orderstatus` varchar(80) default NULL,
  `bundling` varchar(45) default NULL,
  `remainingbundles` varchar(45) default NULL,
  `date` varchar(45) default NULL,
  `orderid` varchar(45) default NULL,
  `orderedmtrs` varchar(45) default NULL,
  `remainingmtrs` varchar(45) default NULL,
  `totalmtrs` varchar(45) default NULL,
  `mtrsleft` varchar(45) default NULL,
  `cancelstatus` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_cuttinginstruction`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_distributors`
--

CREATE TABLE `tbl_distributors` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `dcode` varchar(45) default NULL,
  `name` varchar(150) default NULL,
  `phone` varchar(25) default NULL,
  `mobile` varchar(15) default NULL,
  `street1` varchar(150) default NULL,
  `street2` varchar(150) default NULL,
  `city` varchar(150) default NULL,
  `state` varchar(150) default NULL,
  `pincode` varchar(15) default NULL,
  `tinnumber` varchar(45) default NULL,
  `dname` text,
  `ecc` varchar(45) default NULL,
  `cst` varchar(45) default NULL,
  `customertype` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=225 ;

--
-- Dumping data for table `tbl_distributors`
--

INSERT INTO `tbl_distributors` VALUES(1, NULL, NULL, '001', 'Naveen', '999', '9999', 'Gowliguda', '', 'Hyderabad', 'AP', '500024', '00', 'Varun Sai Foams', '000', '00', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(2, NULL, NULL, '002', 'Asif', '999', '9999', 'Asifnagar', '', 'Hyderabad', 'AP', '500024', '00', 'Foam Planet', '000', '00', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(223, NULL, NULL, '353', 'D.Sreenivas', '2321999,2557199', '9848234657', 'D.No.', 'Industrial', 'Auto', 'Andhra', '522001', 'APGST', 'Softel Coir Products (Guntur)', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(4, NULL, NULL, '004', 'Ramesh', '999', '9999', 'Governapet', '', 'Vijayawada', 'AP', '500024', '00', 'Sri Ganesh Ent', '000', '00', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(5, NULL, NULL, '005', 'Ramesh', '999', '9999', 'Governapet', '', 'Vijayawada', 'AP', '500024', '00', 'Sri Ganesh', '000', '00', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(6, NULL, NULL, '006', 'ravi', '999', '9999', 'Santoshnagar', '', 'Hyderabad', 'AP', '500024', '00', 'Ratandeep', '000', '00', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(7, NULL, NULL, '007', 'Srinivas', '999', '9999', 'Tirumalgery', '', 'Hyderabad', 'AP', '500024', '00', 'Priya Ent', '000', '00', 'Distributor');
INSERT INTO `tbl_distributors` VALUES(8, NULL, NULL, '102', 'Jagan', '0848522952', '0848522952', 'Sy.No.174 & 176', 'I.D.A Bollarm,', 'Jinnaram Mandal, Medak.', 'Andhra Pradesh', '500052', '', 'Centuary Fibre Plates Pvt.Ltd', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(9, NULL, NULL, '115', 's', '99', '99', 'Guntur', '', 'Guntur', 'Andhra Pradesh', '500258', '', 'A S Furniture', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(10, NULL, NULL, '116', 's', '99', '99', 'Karimnagar', '', 'Karimnagar', 'Andhra Pradesh', '500258', '', 'Sri Laxmi Industries', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(11, NULL, NULL, '117', 's', '99', '99', 'Kadapa', '', 'Kadapa', 'Andhra Pradesh', '500258', '', 'Prabhu Rexine', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(12, NULL, NULL, '118', 's', '99', '99', 'Jeedimental', '', 'Hyderabad', 'Andhra Pradesh', '500258', '', 'Young Wood', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(13, NULL, NULL, '1', 'Rajesh', '040-23356456', '9989453267', 'Plot No 12', 'Panjax Complex', 'Hyderabad.', 'A.P.', '500223', '1234', 'PR Enterprises', '675', '1234', 'Distributor');
INSERT INTO `tbl_distributors` VALUES(14, NULL, NULL, '12', 'Pramoad Mittal', '040-278765442', '9705637865', 'Laxmi Villas', 'Raj bhavan Road.', 'Pune.', 'M.P.', '500256', '4556', 'AGARWAL Fabrics', '454', '436', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(15, NULL, NULL, '102', '', '', '9372126913', 'F 14/2, MIDC', 'Hingna Road,', 'Nagpur', 'Maharashtra', '', '27530245503V', 'Aerocom Cushions Pvt.Ltd', '', '27530245503C. Dt.01.04.06', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(16, NULL, NULL, '103', 'Surender Agarwal', '', '', '15-9-220/4,Gowliguda Chaman', '', 'Hyderabad-12', 'Andhra Pradesh', '', '28700141880', 'Agarwal Foam Agencies', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(17, NULL, NULL, '104', 'Hari Agarwal', '24730406', '9849029351', 'Door No: 48-7-14,', 'Srinagar, Behind Rama Taldkies,', 'Vigitable Market Road,', 'Andhra Pradesh', '', '28796495676', 'Agarwal Foam & Furnishing', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(18, NULL, NULL, '105', 'Rajesh Agarwal', '2501101', '', 'D.No. 48-28-75, Srinagar', 'Locality, Near Raama Talkies', 'Juction', 'Andhra Pradesh', '', '28750867705', 'Agrawal Home Comforts', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(19, NULL, NULL, '106', '', '', '', 'PB.No. 3622,', 'PO Baliapatnam', 'Kannur 670 010', 'Kerala', '', '32120258602', 'Agreenco Fibre Foam Pvt. Ltd', '', '32120258602 C', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(20, NULL, NULL, '107', '', '8912563803', '9441139198', '28-12-17/1, Surya Bagh,', 'Visakapatnam.', 'Visakapatnam.', 'Andhra Pradesh', '', 'VZM 02-2-1498-1', 'A.K Eenterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(21, NULL, NULL, '108', 'Ravi', '8662576725', '', 'Challapalli Bunglow,', 'Elur Road,', 'Vijayawada-2', 'Andhra Pradesh', '', '28350115063', 'Alankar Tubular Manufacturing Co.', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(22, NULL, NULL, '110', 'Yedukundalu', '', '', '271-A, Netaji Road,', '', 'Tirupathi', 'Andhra Pradesh', '517501', '28220221832', 'Anjana Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(23, NULL, NULL, '111', '', '', '', 'P-10, Transport Depot Road,', '', 'Kolkata', 'West Bengal', '700088', '19631117051', 'Anupam Coirs Pvt.Ltd.', '', '19631117245', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(24, NULL, NULL, '112', '', '', '9840867582', 'Shop No: 1,Karnani Archives,', 'Old No: 154, Pycrofts Road,', 'Royapettah, Chennai.', 'Tamil Nadu', '', '33960780947', 'APCO Enterprises', '', '656482 DT 06.06.97', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(25, NULL, NULL, '113', '', '', '9840867582', 'Karnani Archives,', '154, Pycrofts Road,', 'Royapettah,', 'Tamil Nadu', '', '33780781240, ', 'APCO FURNISHING FABRICS', '', '0699300, DTD.20.9.2010.', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(26, NULL, NULL, '114', '', '', '9905168999', 'Bhimavaram,', '', 'W G Dist.', 'Andhra Pradesh', '', '28104990550', 'Arjun Steel Furniture', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(27, NULL, NULL, '115', '', '', '', 'E-15, RIICO Industrial Area', 'Bagru Extn', 'Bagru', 'Rajasthan', '', '8722105396', 'Arvind Coir Foam Pvt.Ltd', '', '1421/05450', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(28, NULL, NULL, '116', '', '', '', 'E-95 - 96 & G76 to 78, Riico Industrial Area,', 'Bagru Extn. Bugru', '', 'Rajasthan', '303007', '08332100712', 'Arvind International Ltd.', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(29, NULL, NULL, '117', 'Moulana', '', '9866115987', '6-21-106, 5/2, Aurendelpet,', '', 'Guntur', 'Andhra Pradesh', '', 'GRN/NRP/02/0/1857', 'AS Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(30, NULL, NULL, '118', 'Ashok', '245514', '9440753758', '#15/64, Raju Road,', 'Opp:Medinova Hospital,', 'Kamala Nagar,', 'Andhra Pradesh', '515001', '28864972418', 'Ashok Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(31, NULL, NULL, '119', '', '', '9829052224', 'Factory E -266, RHCO Ind.Area,', 'Bagru Extn (Jaipur)', '', 'Rajasthan', '', '8914050772', 'Ashtavinayak Enterprises Pvt.Ltd', '', '8914050772', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(32, NULL, NULL, '120', 'Satesh', '', '9989047754', 'No 119 Industrial Estate,', 'Medchal', '', 'Andhra Pradesh', '501401', '28400289241', 'ASPY Bedding Products', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(33, NULL, NULL, '121', 'Sandeep Agarwal', '', '9425551011', '86,A-Market', 'Sector - 1', 'Bhilai', 'Chhattisgarh', '', '22913201015', 'Bajrang Enterprises', '', 'DRG/11/2651 DT18.05.93', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(34, NULL, NULL, '122', '', '', '', 'Bak Bunglow Road,', 'Patna-1', '', 'Bihar', '', '10140408131', 'Bajrang Furnishing', '', '10140408131', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(35, NULL, NULL, '123', '', '', '', 'Lalgudi Malakpet,', 'Shameerpet', '', 'Andhra Pradesh', '', '28104841752', 'Balaji Foams', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(36, NULL, NULL, '124', 'Ramesh', '24605395', '9440894704', '15-4-451, Osman Shahi,', '', 'Hyderabad.', 'Andhra Pradesh', '', '28110581156', 'Balaji Plastek', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(37, NULL, NULL, '125', 'Ravi', '', '9866354354', 'D.No 5-35/10/1,', 'Prashant Nagar', 'Kukatpally', 'Andhra Pradesh', '', '28234778924', 'Bans Furniture', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(38, NULL, NULL, '126', 'Harpal Bhatia', '', '', 'Mandi Bazaar', '', 'Warangal ', 'Andhra Pradesh', '500012', '28900132537', 'Bhatia Stores', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(39, NULL, NULL, '127', '', '2427741', '9866001313', '397, Beside Krishna Ice Factory', 'Shahupur,', 'Kolaphur.', 'Maharashtra', '', '27470538185V', 'Bhavana Traders', '', '27470538185C', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(40, NULL, NULL, '128', 'Hanumanth Rao', '2470882', '9440524428', 'Balaji Nagar,', 'Krishnalanka,', 'Vijayawada.', 'Andhra Pradesh', '', 'GRN:VJ2-08-0-1141', 'Bhavani Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(41, NULL, NULL, '129', '', '', '', 'Plot No: 7,', 'Gun Rock Enclave,', 'Secunderabad.', 'Andhra Pradesh', '', '28700268473', 'Bio Genex', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(42, NULL, NULL, '131', '', '', '', 'Survey No 174 & 176', 'I.D.A. Bollaram', 'Jinnaram Mandal, Medak', 'Andhra Pradesh', '', '28940265070, ', 'Centuary Fibre Plates Pvt Ltd.', '', ' BGT/03/01/3352/2004-2005', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(43, NULL, NULL, '134', '', '', '', 'S.F.No:30/6 & 9,  Chikkamarandanahalli.', 'Marandanahalli Post', 'Dharmapuri Dist.', 'Tamil Nadu', '636806', 'TIN:33023291630', 'Coir Flex Mattress India Pvt.Ltd.', '', '946400 dt:20.09.10', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(44, NULL, NULL, '135', 'Ramesh', '', '989106237', '8-3-318/C/3/8,', 'Opp: Allahabad Bank,', 'Yousufguda, Hyderabad', 'Andhra Pradesh', '', '28897608683', 'Comfort Corner', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(45, NULL, NULL, '136', '', '', '', '26-20-26, Swamy Street,', 'Gandhi Nagar,', 'Vijayawada.', 'Andhra Pradesh', '', '28890122902', 'Comfort Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(46, NULL, NULL, '137', '', '', '', '#6/9, Kaverappa Compound', '7th A Cross, N.S.Palya,', 'B.T.M Layout 2nd Stage', 'Karnataka', '', '29380838853', 'COVERITE', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(47, NULL, NULL, '138', '', '', '9447041647', 'United Plaze', 'Janatha', 'Palarivattom', 'Kerala', '', '', 'Crescent Sales Corporation', '', '32151212785', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(48, NULL, NULL, '139', '', '', '', 'Shop No: 4, Avanti Colony,', 'Kharkana,', 'Secunderabad.', 'Andhra Pradesh', '', 'GRN.BGT/09/1/5246/02-03', 'Crystal Enterprises', '', '', 'Dealers');
INSERT INTO `tbl_distributors` VALUES(49, NULL, NULL, '141', '', '', '', 'G-67, SIDCO Industrial Estate,', 'Kakkalur, Tiruvallur,', '', 'Tamil Nadu', '', 'TIN:33891721934', 'Devaki Enterprises', '', '801246 Dt.7/4/06', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(50, NULL, NULL, '142', 'Mallikarjun', '', '9246417006', 'Mudunuruvari Street', 'Gandhi Nagar Vijayawada', '', 'Andhra Pradesh', '', 'VJZ/03/01/1299', 'Dhanush Ent.', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(51, NULL, NULL, '143', 'Pankaj', '', '9393012129', '6-11 Kismathpur', '', 'Hyderabad', 'Andhra Pradesh', '', '28522699105', 'Divyam Enterprises', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(52, NULL, NULL, '144', '', '', '', 'Hyder Nagar, Beside Ambedkar', 'Statue, Main Road,', 'Hyderabad', 'Andhra Pradesh', '', '', 'Doors & Windows', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(53, NULL, NULL, '145', '', '', '', 'GATE NO: 229,', 'RANJA VILLAGE', 'BHOR TALUKA PUNE', 'Maharashtra', '', '27930005693 V DT:1.4.06', 'EKBOTES LOGS & LUMBERS PVT LTD', '', '27930005693 C DT1.4.06', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(54, NULL, NULL, '146', '', '', '984645164', '30/382D, Iringadanjpalli Road,', 'Kovoor, Kozghikode, Kerala', '', 'Kerala', '', 'TIN: 32110951588', 'Elegant Business Corporation', '', '32110951588C', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(55, NULL, NULL, '147', '', '', '', 'Microwave Products India Pvt.Ltd,', '3rd Floor, DMC Center,', '49 Entrenchment Road,', 'Andhra Pradesh', '', 'TIN:28452650769', 'EMERSON & CUMING', '', '28452650769', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(56, NULL, NULL, '148', '', '', '', '312,BANERJEE MARKET,', 'GALGALA, JABALPUR', 'District: JABALPUR', 'Madhya Pradesh', '', '23455904884', 'Fair Marketing', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(57, NULL, NULL, '149', '', '', '', '69 Rastrapathi Road,', 'Opp Head Post Office', 'Secunderabad', 'Andhra Pradesh', '500003', '28700214735', 'Featherlite', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(58, NULL, NULL, '150', '', '', '', 'Unit II, 2nd Floor, No 2,3 & 4', 'New Timber Yard Layout', 'Mysore Road', 'Karnataka', '', '29130326394', 'Featherlite Products', '', '90550845', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(59, NULL, NULL, '151', '', '', '9433010324', '# 167/ 4, Lenin Sarani,', '', 'Kolkata', 'West Bengal', '', 'WBST:19540817132', 'Flora Foam Fabrics Pvt.Ltd', '', '19540817229', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(60, NULL, NULL, '152', 'Ramesh Banu', '8702448022', '9948433863', 'Kakatiya Colony,', 'Near Alankar,', 'Hanmakonda.', 'Andhra Pradesh', '', '28032736919', 'Foam Impex', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(61, NULL, NULL, '153', '', '', '7799227786', 'D.No:19-4-272/A/20,', 'Street: Mir Alam Tank,', 'Badurpura, Hyderabad.', 'Andhra Pradesh', '', '28622269618', 'Foam Plannet', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(62, NULL, NULL, '154', '', '', '', 'Plot No: 232/3,', 'Peenya Industrial Area,', 'Bangalore', 'Karnataka', '', '', 'Foam Products Polyurethane Unit II', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(63, NULL, NULL, '155', '', '2240143314', '', 'Gut No:560, Wada-Vikramgadh Road,', 'Village Alonde, Wada,', 'Thane, Maharashtra.', 'Maharashtra', '401603', '27790648783', 'Foam Techniques Mfg (I) Pvt.Ltd.', '', '27790648783', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(64, NULL, NULL, '156', '', '', '', '63/2, Shivarai Nagar, Next to VIP Hostel,', 'Kondva, Budruk, Pune.', '', 'Maharashtra', '', '27870015523Vdt.1.4.2006', 'FURNITECH SEATING SYSTEM(P) LTD', '', '27870015523Cdt.01.04.06', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(65, NULL, NULL, '157', '', '', '', 'Budha Raja,', '', 'Sambalpur,', 'Orissa', '', '21221704701', 'Furniture Point', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(66, NULL, NULL, '158', '', '', '', 'C/o Dr.Madugula Nagaphani Sharma Garu', 'Avadhana Saraswathi Peetham', 'Hitex Road Sharada Kala Vedika,', 'Andhra Pradesh', '', '', 'Gandharva Music Systems', '', '', 'Dealers');
INSERT INTO `tbl_distributors` VALUES(67, NULL, NULL, '159', '', '', '', '40-321-5A,', 'Abdullah Khan Estate', 'Kurnool', 'Andhra Pradesh', '', '28210112384', 'Gopireddi Foams Furniture', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(68, NULL, NULL, '160', 'Girish', '', '9346843777', 'Railway Goods Shed,', 'Opp:Enadu Press,', 'Moosapet, Hyderabad.', 'Andhra Pradesh', '', '28390107528', 'GVINK', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(69, NULL, NULL, '161', 'Riyaz', '8842360786', '9440594736', '13-1-20/1,', 'Near Honda Show Room', 'Main Road,Kakinada', 'Andhra Pradesh', '', 'KDA 03/0//1844', 'Habeeb Rexine House', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(70, NULL, NULL, '162', '', '', '', 'Andhra Bank Road', 'Rajiv Chowk', 'Karimnagar', 'Andhra Pradesh', '', 'KRM/01/0/1322', 'Hafsa Handloom', '', '', 'Dealers');
INSERT INTO `tbl_distributors` VALUES(71, NULL, NULL, '163', 'Mallikarjun', '', '9440691380', 'Chinna Bazaar,', '', 'Nellore', 'Andhra Pradesh', '', 'TOT No: 10-1-3742', 'Hanuman Rexine House', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(72, NULL, NULL, '164', '', '', '', 'Putlibowli,', '', 'Hyderabad', 'Andhra Pradesh', '', '', 'Hazi Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(73, NULL, NULL, '166', '', '', '', 'Door No 13-11, Sy.No.843/A,', 'IDA Medchal, RR Dist (Near Medchal Checkpost Kaman)', '', 'Andhra Pradesh', '', '28500498596', 'Heritage Fibre Comforts Pvt Ltd.,', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(74, NULL, NULL, '167', '', '', '', 'Off.10, Clive Row, 4 Floor,', 'Room No. 6,', 'Kolkata', 'West Bengal', '700 001', 'TIN:19260979019', 'Himrag Coir Products P Ltd', '', '1926097913', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(75, NULL, NULL, '168', 'Bhanu Reddy', '8916673133', '9866308776', 'D.No: 7-19, Wadapalem,', 'Rishikonda,', 'Vizag', 'Andhra Pradesh', '500 045', '28805420560', 'Hindustan Wood Works', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(76, NULL, NULL, '169', 'Samsuddin', '23041395', '9391046378', 'Miyapur,', 'Opp TO Janapriya Apartments', 'Hyderabad', 'Andhra Pradesh', '500 050', 'HYR/11/3/3678/2', 'HOME NEEDS FURNITURE', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(77, NULL, NULL, '171', 'Rajan', '', '9246433077', 'R.R Street, A.C Centre,', '', 'Nellore', 'Andhra Pradesh', '', 'GRN/NRE/06-0-1319', 'House Beauty Furniture', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(78, NULL, NULL, '172', '', '', '', '3, Sheetal Estate,', 'Nr.Sanand Railway Crossing,', 'Sarkej, Ahmedabad.', 'Gujarat', '', 'TIN:24074502836', 'Image Plus', '', '24574502836', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(79, NULL, NULL, '173', '', '', '', 'D.No.T-9/18/1, Road No.8,', 'Nacharam IDA,', 'Hyderabad.', 'Andhra Pradesh', '', 'TIN: 28870997390', 'Jalaram Industries', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(80, NULL, NULL, '174', 'Sahid', '', '9849077079', 'Mandi Bazar,', '', 'Warangal', 'Andhra Pradesh', '', '21012303009', 'Jantha Leathers', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(81, NULL, NULL, '175', '', '', '', 'D.No:1/28/1/14D,', 'IDA Nacharam,', 'Hyderabad.', 'Andhra Pradesh', '', '28783859863', 'Jasleen Enterprises', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(82, NULL, NULL, '176', '', '', '', '174/2, Vanagaram Road,', 'Athipet,', 'Chennai.', 'Tamil Nadu', '600 058', '33781001236', 'Kailash Trade Links Pvt.Ltd.', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(83, NULL, NULL, '177', '', '', '', 'H.No.3-4-526/38,', 'Adjecent Lane to Reddy Womens College,', 'Barkatpura Road, YMCA,', 'Andhra Pradesh', '', '28970192125', 'Kamadhenu Mattresses & Furnitures P.Ltd.', '', '', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(84, NULL, NULL, '178', 'Narayana', '8662576522', '9441902332', 'Hanumanpet Traders', '', 'Vijayawada', 'Andhra Pradesh', '', 'VJ2-06-01567-08', 'Kameshwari Traders', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(85, NULL, NULL, '179', '', '', '', 'Opp to AAI MATAJI, Plot NO.9 Main Road', 'Subhas Chand B Houch Nager,', 'New Hafizpet, Hyderabad', 'Andhra Pradesh', '', '', 'Khetaram Dewram', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(86, NULL, NULL, '180', '', '', '9827060969', '554, MG Road,', 'Gorakund,', 'Indore', 'Madhya Pradesh', '', '23320603372', 'Koolwal Foams', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(87, NULL, NULL, '181', '', '', '', 'Bus Stand Road,', 'Sayeedia Complex,', 'Rayachoti, Kadapa Dist.', 'Andhra Pradesh', '', '28320148238', 'Kumar Enterprises', '', '', 'Dealers');
INSERT INTO `tbl_distributors` VALUES(88, NULL, NULL, '182', '', '', '', '(Delhi Hub (MAT))', 'Near Alipur City Forest,', 'Aliput Garhi, Khasra No:894/115', 'Delhi', '110036', '', 'Kurlon Limited', '', ' 042/07830005884/10-82', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(89, NULL, NULL, '183', '', '', '', '7-17-3/1, NH-5,', 'Opp: Anakapalli Bus Stop,', 'Old Gajuwaka Jn, Vizaz', 'Andhra Pradesh', '500 068', 'GRN VST/04/0/1287', 'Kusumanjali Rexine Sadanam', '', '', 'Dealers');
INSERT INTO `tbl_distributors` VALUES(90, NULL, NULL, '184', '', '', '9246417067', 'Dubaguntavari ST,', 'Governorpet,', 'Vijayawada.', 'Andhra Pradesh', '', '28760164875', 'Lakshmi Enterprises (Vijayawada)', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(91, NULL, NULL, '185', 'Raghu', '8662576522', '9440159852', '14-9-19, Hanuman Pet', '', 'Vijayawada', 'Andhra Pradesh', '', '28088630120', 'Lakshmi Marketing', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(92, NULL, NULL, '186', '', '2341348', '9849188321', '18/387,', 'Chinna Bazar, Near Nanda Fancy,', 'Nellore', 'Andhra Pradesh', '', '3406', 'Lakshmi Srinivasa Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(93, NULL, NULL, '188', '', '', '9246417067', '1-9-20B/4,', 'Ramanagar,', 'Hyderabad.', 'Andhra Pradesh', '', '28770142403', 'Laxmi Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(94, NULL, NULL, '189', '', '', '', '5-8-4 Nampally Stations Road,', '', 'Hyderabad', 'Andhra Pradesh', '500 001', '28390171451', 'Lepakshi Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(95, NULL, NULL, '190', '', '', '', 'H.No: 3-5-314', 'Rajiv Chowk,', 'Karimnagar.', 'Andhra Pradesh', '', '28549665321', 'Life Style Furnitures- Karimnagar', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(96, NULL, NULL, '191', '', '', '9989076667', 'GVK Plaza,', '', 'Visakapatnam.', 'Andhra Pradesh', '', '', 'Life Style Furnitures(Vizag)', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(97, NULL, NULL, '192', 'Raja', '', '9866599000', '# 27-1-130,131,132.', 'Near Apsara Theater,', 'Aluru Road,', 'Andhra Pradesh', '', '28266839591', 'Life Style Furniture- Vijayawada', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(98, NULL, NULL, '193', '', '', '', '20D, T.G. Nagar,', 'Veerakeralam,', 'Coimbatore.', 'Tamil Nadu', '', 'TIN:33796200867', 'Lotus Lamination Ltd.', '', '641687 Dt.17.01.95', 'Industrial Customer');
INSERT INTO `tbl_distributors` VALUES(99, NULL, NULL, '194', '', '', '', '4-4-6/1,Mahankali Street,', 'Beside Mahankali Police Station,', 'Secunderabad', 'Andhra Pradesh', '500003', '28675252722', 'Luxury Foam', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(100, NULL, NULL, '195', '', '', '9993161620', 'Shop No 13, Gurudwara Complex', 'New Sabzi Mandi Road', 'Bhopal', 'Madhya Pradesh', '', 'TIN:23093705122', 'Maa Saree Centre', '', '05023669/0/BPL', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(101, NULL, NULL, '196', '', '', '9885551042', 'M.G.Road Kothagudem', '', '', 'Andhra Pradesh', '507 501', '28900103049', 'Madina Enterpries', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(102, NULL, NULL, '197', '', '', '', 'Near Railway Bradge', '', 'Kamareddy.', 'Andhra Pradesh', '', 'NZD/05/0/1310', 'Mahadevi Furniture (Kamareddy)', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(103, NULL, NULL, '198', 'Murali', '4064617265', '9393300111', 'BHEL,', '', 'Hyderabad', 'Andhra Pradesh', '', '28066709456', 'Maha Devi Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(104, NULL, NULL, '199', 'Srinivas', '8842375712', '9908301116', '12-2-30, Dantuvai Street,', 'Chandana Bros Back Side,', 'Kakinada.', 'Andhra Pradesh', '', 'KDA/03/02/3202', 'Mahalakshmi Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(105, NULL, NULL, '210', 'Bhasker', '4023396784', '9396404346', '101 IDA Mallapur,', 'Near Manikchand Chowk,', 'Hyderabad', 'Andhra Pradesh', '', '28361411888', 'MGRM Medicare Ltd.', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(106, NULL, NULL, '214', 'Moulana', '', '9848170031', 'Satya Suri Road', 'Opp: Near Malleswari Rice Mill', 'Mandapeta, E.G', 'Andhra Pradesh', '', '28247546754', 'Mother Enterprises', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(107, NULL, NULL, '215', 'Moulana', '', '9848170031', 'Sri Sai Nilayam, Ground Floor,', 'Door No: 4-7-091, Lalitha Lane,', 'Anyam Gardan, Yanam.', 'Puducherry', '', '34750013485', 'Mother Marketing', '', '34750013485', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(108, NULL, NULL, '216', '', '', '9979300252', '4, Meghani Nagar,', 'Kotharaia Raod,', 'Rajkot', 'Gujarat', '', 'TIN:24091001851,CST:24591001851', 'Chaitanya Enterprises', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(109, NULL, NULL, '217', '', '', '9825773395', 'Godown No 3 Sheetal Estsate', 'Near Sarkej-Sanand Rly', 'Crossing, Sarkej,', 'Gujarat', '', 'TIN:24074501977, CST:24574501977', ' Image', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(110, NULL, NULL, '218', '', '', '', 'Plot No: 11, IDA,', 'Moulali,', 'Secunderabad.', 'Andhra Pradesh', '', '2878859863', 'Jasleen Enterprises', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(111, NULL, NULL, '219', 'Sudharshan Nagpal', '', '9346123567', '4-1-423, 2 NTR Residence', 'Abids, Koti Road', 'Hyderabad', 'Andhra Pradesh', '', '28080210423', 'Nagpal Foam Palace', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(112, NULL, NULL, '220', '', '', '7799227786', '12-2-869/1, B & C', 'Asifnagar,', 'Hyderabad', 'Andhra Pradesh', '', 'GRNCHN/08/0/1524/07-08', 'Naseem Sons', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(113, NULL, NULL, '221', '', '', '9246539661', 'Moosapet', '', 'Hyderabad', 'Andhra Pradesh', '', 'PJT/13/0/1502', 'Navasajawat Furnitures', '', '', 'Dealer');
INSERT INTO `tbl_distributors` VALUES(114, NULL, NULL, '222', '', '', '', 'Maruthi Nagar,', '', 'Vijayawada.', 'Andhra Pradesh', '', '28690294437', 'Naveen Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(115, NULL, NULL, '223', '', '', '', '27-1-37, Near Apsara Theatre,', 'Elur Road,', 'Vijayawada.', 'Andhra Pradesh', '', '28670141695', 'Neelima Furniture House', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(116, NULL, NULL, '224', '', '', '', 'Branch Office: Opp: Old Bus Stand,', 'Shop No: 32, Gayathri Complex,', 'Vijayawada.', 'Andhra Pradesh', '', '28530134942', 'New Srinivasa Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(117, NULL, NULL, '225', '', '', '', '3, Sheetal Estate,', 'Nr.Sanand Railway Crossing,', 'Sarkhej,', 'Gujarat', '', '24070402692', 'Nisarg Marketing', '', '24570402692', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(118, NULL, NULL, '226', 'Mohan Rao', '', '9885287303', 'Gudimalkapur,', 'Mehadipatnam,', 'Hyderabad.', 'Andhra Pradesh', '', '28522367947', 'Nishka Products Pvt.Ltd.', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(119, NULL, NULL, '229', 'Venu Prasad', '', '9391399779', '24-1-124,', 'Opp: Maszid,', 'Rokallapalam,', 'Andhra Pradesh', '520011', '28050245441', 'Peruri Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(120, NULL, NULL, '230', '', '', '', 'Plot No : 153, Sy No. 172/A,', 'IDA, Bollaram, Jinnaram Mandal, Medak.', '', 'Andhra Pradesh', '', '28880168266', 'Phalguna Enterprises (P) Ltd.', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(121, NULL, NULL, '231', '', '', '', '19/700 & 701, RKM St', '', 'Kadapa', 'Andhra Pradesh', '', '28970143916', 'Prabhu Rexine Centre', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(122, NULL, NULL, '232', '', '', '', 'Ramnagar,', '', 'Hyderabad.', 'Andhra Pradesh', '', '', 'PRABU', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(123, NULL, NULL, '233', '', '', '9394546117', 'Abids', '', 'Hyderabad', 'Andhra Pradesh', '', '', 'Pradeep & Co.', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(124, NULL, NULL, '234', '', '', '', 'Tallamada', 'Sattupalli', 'Khamman', 'Andhra Pradesh', '', '28169278724', 'Praja Coir Products', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(125, NULL, NULL, '235', '', '', '', 'D.No. MIG 1/90,Huda Colony,', 'Old Gajuwaka,', 'Visakhapatnam.', 'Andhra Pradesh', '', '28634732771', 'Praja Comfort Products', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(126, NULL, NULL, '236', '', '', '', 'Teluguganga Colony,', 'Cuddapah Road,', 'Allagadda.', 'Andhra Pradesh', '', '28634732771', 'Praja Comfort Products(Allagadda)', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(127, NULL, NULL, '237', '', '', '', 'No:10, Grace Corner,', 'Lalbagh Fort Road,', 'Bangalore - 560004', 'Karnataka', '', '29630077120', 'Prakash Foam & Accessories', '', '92354919', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(128, NULL, NULL, '238', '', '', '', 'Market Road', 'Mancherial', '', 'Andhra Pradesh', '', '28401106854', 'Prashanth&Co.', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(129, NULL, NULL, '240', '', '', '9849910099', 'Off Survey of Inida,', 'Uppal', 'Hyderabad', 'Andhra Pradesh', '', '28646813453', 'Priya Distributors', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(130, NULL, NULL, '241', 'Natvar Sing', '4027990010', '9391013065', 'Trimulgherry', '', 'Secunderabad.', 'Andhra Pradesh', '', 'BGT/09/O/1141', 'Priya Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(131, NULL, NULL, '242', '', '', '', 'Plot No: 86, RTC Colony,', 'Trimulgherry,', 'Secunderabad', 'Andhra Pradesh', '', 'GNRSARA/07/0/B85', 'Raja Shekar Furnitures', '', '', 'Dealer');
INSERT INTO `tbl_distributors` VALUES(132, NULL, NULL, '243', '', '', '', 'C-828, Indl. Area, Phase II', 'Bhiwadi ', 'Alwar', 'Rajasthan', '', 'TIN: 08970850903', 'Rajindra Mattresses Pvt. Ltd.', '', '0206/00908 DT30.03.96', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(133, NULL, NULL, '244', 'Papa Rao', '', '9030859778', 'C/o. B.Balaram, PL.No.63 & 64,', 'Sai Priya Colony, Muthangi Village', 'Opp: Church, Patancheru Mandal,', '', '', '', 'Ram Foam Industries', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(134, NULL, NULL, '245', '', '', '9849204098', 'Opp: Centuary AP Godown', 'Hyderabad', 'Hyderabad', 'Andhra Pradesh', '', '', 'Ram Gopal Varma', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(135, NULL, NULL, '246', 'Ratna Rao', '', '9246505136', 'D.No.9-6-113/1, New No.9-6-250,', 'Durga Bhavani Nagar Colony,', 'Opp: New Santoshnagar Colony,', 'Andhra Pradesh', '', '28027317809', 'Ratnadeep Agencies', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(136, NULL, NULL, '247', '', '', '', 'Boregaon Indl.', 'Growth Centre', 'Borgaon 480106', 'Madhya Pradesh', '', '23416800798', 'Raymond Limited', '', '23416800798', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(137, NULL, NULL, '248', 'Imtiaz', '8924223011', '9849072002', 'Masjid St.,', 'Near Vegetable Market,', 'Anakapalli.', 'Andhra Pradesh', '', '28033197960', 'Razvi Foam House', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(138, NULL, NULL, '249', '', '', '', 'A-2, Mysore Lamps Ancilliary Complex,', 'Tamaka Indl. Area,', 'Kolar,', 'Karnataka', '', '29880072278', 'Restolex Coir Products(P) Ltd.-KOLAR', '', '1151101', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(139, NULL, NULL, '250', '', '', '', 'Furnishin No. A 101 & A 102,', 'KSSIDC, Industrial Estate,', 'Doddaballapur', 'Karnataka', '', '29880072278', 'Restolex Coir Products Pvt.Ltd (Bangalore)', '', '1151101', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(140, NULL, NULL, '251', '', '', '', 'Flat No 004 Gangotri Apartments', 'D No 3-6-388 Street No 3 Himayatnagar', 'Hyderabad', 'Andhra Pradesh', '500029', '', 'Rexoflex Pvt Ltd', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(141, NULL, NULL, '254', 'Babar Jahn', '402310083', '9440585715', 'Chinna Bazaar,', '', 'Nellore', 'Andhra Pradesh', '', '28350134463', 'Royal Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(142, NULL, NULL, '255', '', '', '', '74-75, Bethora Industrial Estates', 'Bethora Ponda,', '', 'Goa', '403409', '3027020510,', 'ROZ - BAL Industries', '', ' TD- CST- 1483dt7/3/2000', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(143, NULL, NULL, '256', '', '', '', 'D.No. 4-7-1121/3,', 'Putibowli', 'Hyderabad', 'Andhra Pradesh', '', '28030147310', 'Ruby Foams & Frabrics', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(144, NULL, NULL, '257', '', '', '9394003639', '4-7-1121/3, Ranga Mahal Road', 'Putlibowli', 'Hyderabad', 'Andhra Pradesh', '', '28934900571', 'Fasi', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(145, NULL, NULL, '258', '', '', '', 'S.No.273, Bhatewara Nagar,', 'Opp:Orrietel Hotel,', 'Hinjewadigaon, Tal:Mulshi,', 'Maharashtra', '', '27660611073c', 'Saddles India', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(146, NULL, NULL, '259', '', '', '', '#5,10th A Main Road,', 'Hangasandra, Bommanahalli,', 'Bangalore-560068.', 'Karnataka', '', '29690765399', 'Saddles India(Bangalore)', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(147, NULL, NULL, '260', '', '', '9878477618', '27-10-7/2, Atta Rathaiah Street,', 'Governerpet,', 'Vijayawada', 'Andhra Pradesh', '', '28366915765', 'Sahil Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(148, NULL, NULL, '261', 'Mohan Rao', '', '9248047229', 'AVM Towers, KPHB Colony,', 'Near Siva Parvathi Theatre,', 'Hyderabad.', 'Andhra Pradesh', '', '28244310737', 'Sai Baba Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(149, NULL, NULL, '262', 'Venkatesh', '', '', 'Plot No: 7 & 8', 'Balanagar Road,', 'Bowenpally', 'Andhra Pradesh', '', '28500608020', 'Sai Baba Traders', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(150, NULL, NULL, '263', 'Babji', '8832471713', '9866074455', 'Near Bharath Bommalu,', '', 'Rajhamundry', 'Andhra Pradesh', '', '', 'Sai Krishna Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(151, NULL, NULL, '264', 'Durga Prasad', '', '', '3-70', 'Santhapuri Colony,', 'New Nagol,', 'Andhra Pradesh', '', '28631419542', 'Sai Praveen Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(152, NULL, NULL, '265', 'Jagan Mohan', '', '9985502403', 'Old Alwal, Near Reliance Bazar,', '', 'Hyderabad.', 'Andhra Pradesh', '', '', 'Sai Soujanya Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(153, NULL, NULL, '266', 'Narsimha Raju', '8862475807', '9866684888', 'D.No:21-8-1/3, Behind Nagadevi Talkies', 'Road,', 'Rajamundry', 'Andhra Pradesh', '', 'KDA/08/0/1720', 'Sai Sri Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(154, NULL, NULL, '267', '', '', '', 'Opp: Golden Press', 'Gowliguda,', 'Hyderabad', 'Andhra Pradesh', '', '28230267745', 'Sai Swaroop Foam Agencies', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(155, NULL, NULL, '268', '', '', '9849947828', 'Ram Mandir Road', 'Chowrasta', 'Godavrikhani', 'Andhra Pradesh', '', '', 'Samee Rexine Works', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(156, NULL, NULL, '269', 'Roshan', '8816224985', '9848441115', 'Town Railway Roa,', '', 'Bhimavaram', 'Andhra Pradesh', '', ' ELR. 07/2/3101', 'Sana Seat Cover Works', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(157, NULL, NULL, '270', 'Lal', '', '924611678', 'Near Venketeswara Swamy Temple,', 'Seethanagaram,', 'Vijayawada.', 'Andhra Pradesh', '', 'GNT/08/0/1335', 'Sandya Sofa Liners', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(158, NULL, NULL, '271', 'Raju', '', '9989047754', '18/A, Industrial Estate,', 'Medchal,', 'Hyderabad.', 'Andhra Pradesh', '', '28770114079', 'SAPY Bedding Products', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(159, NULL, NULL, '272', '', '', '', 'Station Road,', 'Powerpet,', 'Eluru.', 'Andhra Pradesh', '', '', 'Sarvodya Agencies', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(160, NULL, NULL, '273', '', '', '', 'D-57/58, MIDC Ranjangaon,', 'Tal.Shirur,', 'Pune', 'Maharashtra', '', '27240380735V', 'Sellowrap Mfg. Pvt. Ltd.', '', '27240380735C', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(161, NULL, NULL, '274', '', '', '', 'Street No 1, Plot No.183', 'I.D.A. Mallapur,', 'R.R.Dist', 'Andhra Pradesh', '', '28120101426', 'Serene Coir & Foam Products', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(162, NULL, NULL, '275', '', '', '', 'Plot No 16,17&18', 'IDA Phase II', 'Cherlapally,Hyderabad', 'Arunachal Pradesh', '500051', '28520140536', 'Servomax India Limited', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(163, NULL, NULL, '277', '', '', '', 'Plot No.9, Jigani Link Road,', 'Bommasandra Indl. Area,', 'Bangalore-562158', 'Karnataka', '562158', '29240327158', 'Shobha Developers Ltd. Div.Interiors', '', ' 0045948-3,dt: 31.07.1999', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(164, NULL, NULL, '278', '', '86666661439', '', '21-1-134, Eluru Road,', '', 'Vijayawada', 'Andhra Pradesh', '', '28480211024', 'Shree Balaji Steel & Wooden Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(165, NULL, NULL, '279', 'Satesh', '8702426033', '9849275224', '3-16-325, 1st Floor,', 'Mulugu X Road,', 'Warangal', 'Andhra Pradesh', '', '28570280279', 'Shree Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(166, NULL, NULL, '280', '', '', '', '5/1566,Nilamani Apartment,', 'Near Ambaba School,', 'Limbda Sheri, Haripura,', 'Gujarat', '', '24720400143', 'Shreeji Rexine House', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(167, NULL, NULL, '282', '', '', '', 'Plot No 7 & 8,', 'Sy.No 42', 'Ali Nagar', 'Andhra Pradesh', '', '28210252161', 'Shree Malani Industries P Ltd', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(168, NULL, NULL, '284', '', '', '', '#3/3, 1st Cross, Venkamma Ramaiah Layout', 'MSR Road, Mathikere,', 'Banglore-560 054', 'Karnataka', '', '29360865442', 'Shree Sai Enterprises', '', '29360865442', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(169, NULL, NULL, '285', '', '', '', '48/D-2, Sector-D,', 'Sanwar Road Industrial Area,', 'Indore.', 'Madhya Pradesh', '452015', '23091201164', 'Shreya Furnicraft (P) Ltd.', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(170, NULL, NULL, '286', '', '', '', 'Main Road, Rajakhariar,', '', '', 'Chhattisgarh', '', '21671805168', 'Shri Balajee Sales', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(171, NULL, NULL, '288', 'Shekar', '8942221206', '9440121710', 'Womens College Road,', 'Near Murali Theater,', 'Srikakulam.', 'Andhra Pradesh', '', '28390200648', 'Siva Srinivas Sofa Emporium', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(172, NULL, NULL, '289', 'Venkatesh', '', '9000576699', 'Plot No: 48, IDA,', '', 'Medchal.', 'Andhra Pradesh', '', '', 'Sleepo Bedding Products', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(173, NULL, NULL, '290', 'Srinivas', '', '9848234657', 'IDA Phase-III, Plot No: 177,', 'Autonagar,', 'Guntur', 'Andhra Pradesh', '522001', 'GNT/08/0/1302', 'Softel Coir Products', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(174, NULL, NULL, '291', '', '', '', '# 14 Nandi Riches Garden,', 'Opp. Sundara Anjaneya Temple,', 'Kelkere N.R.I Layout,', 'Karnataka', '', '95810802581', 'Soft Tek Comfort Products,', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(175, NULL, NULL, '292', 'Sourabh', '', '9390036114', '2-5-26, Ram Gopalpet,', 'PG Colony,', 'Secunderabad.', 'Andhra Pradesh', '', '', 'Sourach', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(176, NULL, NULL, '293', 'Rama Rao', '4023065011', '', 'Opp to KPHB,', '', 'HYDERABAD.', 'Andhra Pradesh', '', '', 'Sowmya Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(177, NULL, NULL, '294', 'Kishore', '', '', '29-15-10,Kandakam Road,', '', 'Rajahmundry', 'Andhra Pradesh', '', '28130213396', 'Sree Foam Agencies', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(178, NULL, NULL, '295', '', '', '', 'Governerpet,', '', 'Vijayawada', 'Andhra Pradesh', '', ' VJ2/08/0/1291', 'Sree Venkateswara Traders', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(179, NULL, NULL, '296', '', '', '', 'Devi Theatre Road,', '', 'Kavali ', 'Andhra Pradesh', '524201', ' NRE 05/0/1459', 'Sri Balaji Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(180, NULL, NULL, '298', 'Rama Krishna', '8125814683', '', 'Hanuman,', 'Satyanarayanapuram', 'Vijayawada', 'Andhra Pradesh', '', '28374093970', 'Sri Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(181, NULL, NULL, '299', 'Srinivas', '', '9440117415', '27-10-38,', 'Opp Governorpet,', 'Vijayawada.', 'Andhra Pradesh', '', '28720137878', 'Sri Ganesh Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(182, NULL, NULL, '300', '', '', '', 'Stadium Road,', '', 'Rajamundry.', 'Andhra Pradesh', '', '28070117950', 'Sri Hari Home', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(183, NULL, NULL, '301', '', '', '', '76-8-14, Crambay Road', 'Bhavanipuram', 'Vijayawada - 12', 'Andhra Pradesh', '', '28350115063', 'Sri Lakshmi Ganesha Ent.', '', '', 'Dealer');
INSERT INTO `tbl_distributors` VALUES(184, NULL, NULL, '302', 'Madhu', '', '9849245518', 'SAI NAGAR', '', 'KARIMNAGAR', 'Andhra Pradesh', '', '28094040597', 'SRI LAXMI AGENCIES', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(185, NULL, NULL, '304', 'Srinivas', '8666626626', '9749376626', 'D.No: 27-14-55,', 'Opp Tagore Library Road,', 'Rajagopalachari St, Goveranorpet,', 'Andhra Pradesh', '', '28443795822', 'Srinivasa Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(186, NULL, NULL, '305', 'Srinivas', '', '9440871630', 'D.No: 2-10-1/2, Bondada Veedhi,', '', 'Vizianagaram', 'Andhra Pradesh', '', 'BNM08/1/2266', 'Srinivasa Rexine Centre', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(187, NULL, NULL, '308', '', '', '9390336464', 'U5, Mittal Chamber,', 'Pan Bazar, MG Road,', 'Secuderabad-500003', 'Andhra Pradesh', '', '28577444990', 'Sri Pavan Traders', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(188, NULL, NULL, '309', '', '', '', '3-70, Samathapuri Colony,', 'New Nagole, ', 'Hyderabad', 'Andhra Pradesh', '', '28631419542', 'Sri Praveen Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(189, NULL, NULL, '310', 'Narsimha', '', '9866684888', '21-8-1/3,', 'Koriammapeta,', 'Rajahmundry', 'Andhra Pradesh', '', '28512629136', 'Sri Rama Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(190, NULL, NULL, '311', 'Narsimha Naik', '', '9849579955', 'Sri Colony, Neredmet X Road,', '', 'Secunderabad - ', 'Andhra Pradesh', '500 056', '', 'Sri Saibaba Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(191, NULL, NULL, '312', 'Jayakumar', '', '9703509338', '211/B', 'TILAK ROAD,', 'TIRUPATHI ', 'Andhra Pradesh', '', '28380324485', 'Sri Sai Furnishings', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(192, NULL, NULL, '313', 'Babji', '8832471713', '9866074455', 'D.No:34-4-3,', 'Bharathabommalu,', 'Mangalavarapupeta,', 'Andhra Pradesh', '', '28628810716', 'Sri Sai Krishna Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(193, NULL, NULL, '315', 'Prakesh', '', '9848737047', '27-18-60, Congress Office Road,', 'Governerpet,', 'Vijayawada.', 'Andhra Pradesh', '', 'VJ2-03-011302', 'Sri Sai Prakash Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(194, NULL, NULL, '316', '', '', '', 'B-26/5, Near Post Office,', 'Opp:Metalica Steel Factory', 'Industrial Estates,', 'Andhra Pradesh', '', '28462767104', 'Sri Sai Veerabhadra  Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(195, NULL, NULL, '317', '', '', '', '74F,Enrichindustrial Area,', 'IDA Bollarum,', 'Medak District.', 'Andhra Pradesh', '', '28110127196', 'Sri Venkateswara Coir Product(Furnishing Division)', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(196, NULL, NULL, '318', '', '', '', 'Flot No.204, Anarchand Sharmacomplex,', 'Opp. Sangeet Thertre, SD Road,', 'Secunderabad.', 'Andhra Pradesh', '500003', '28110127196', 'Sri Venkateswara Coir Products Pvt. Ltd.', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(197, NULL, NULL, '319', '', '', '', '142 AA, Bollarum Village,', '', 'Medak District.', 'Andhra Pradesh', '', '28110127196', 'Sri Venkateswara Coir Products(Spring Mattresses )', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(198, NULL, NULL, '320', '', '', '', 'Opposite to SBI', 'Main Road,', 'Narsipatnam', 'Andhra Pradesh', '', '', 'Sri Vinayaka Home Needs', '', '', 'Dealer');
INSERT INTO `tbl_distributors` VALUES(199, NULL, NULL, '321', '', '', '', 'Shop No:8-15-142, Sai Sadan,', 'LB Nagar, ', 'Hyderabad', 'Andhra Pradesh', '', '28295711286', 'Srushti Furniture Impex', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(200, NULL, NULL, '322', '', '', '', '68/A, Bommasandra Indl.Area,', '1st. Phase', 'Bangalore', 'Karnataka', '', '29380786279', 'Stanley Life Styles Ltd.', '', '264167', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(201, NULL, NULL, '323', '', '', '', '19 T T Nagar,', 'Near Kataria Comlex,', 'Opposite Sonalika Tractor''s,', 'Madhya Pradesh', '', '23345404473', 'STATUS', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(202, NULL, NULL, '326', '', '', '', 'Survey No-236 / 237.', 'Village HinjeWadi.', 'Opp-Tata Auto Comp Systems-Ltd.,', 'Maharashtra', '', '27890293417v1/4/06 ', 'Stokvis Prostick Tapes Pvt. Ltd.,', '', '27890293417C 1/4/06', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(203, NULL, NULL, '327', '', '', '', 'Plot No: B 889, IDA Kukatpally,', 'Gandinagar,Balanagar,', 'Hyderabad- 37', 'Andhra Pradesh', '', '28752379353', 'Taha Industries', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(204, NULL, NULL, '328', 'Mallikarjun', '', '9908711222', '48-7-37, Srinagar,', 'Rama Takies Junction,', 'Old Vegitable Market,', 'Andhra Pradesh', '530016', '28387322744', 'Tajasree Agencies', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(205, NULL, NULL, '331', '', '', '9246156975', '11-3-913/22&23,', 'Beside Badi Maszid', 'Mallapally, Hyderabad.', 'Andhra Pradesh', '', 'ABS/04/1/2581/04-05', 'Tawakkal Furnitures', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(206, NULL, NULL, '332', '', '', '', '39-8-42, Kotha Madhava Rao Street', 'Labbipet,', 'Vijayawada.', 'Andhra Pradesh', '', 'VJ2/07/0/1402', 'Thrishul Agencies', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(207, NULL, NULL, '333', '', '', '', 'S.NO:44, Plot No: 23/25,', 'Renuka Industrial Estate,', 'Village: Narhe, Pune', 'Maharashtra', '', '27540006829v', 'TIMOORTY AUTODECO COMP.Pvt Ltd.,', '', '27540006829c dt: 1-4-2006', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(208, NULL, NULL, '335', '', '', '', 'Sanathnagar', '', 'Hyderabad', 'Andhra Pradesh', '', '', 'U FOAM', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(209, NULL, NULL, '336', '', '', '', 'Plot No.143,144,145,158,159&160', 'IDA, Phase III, Pashmylaram', 'Patancheru', 'Andhra Pradesh', '502319', '28700199991', 'U Foam Pvt.Ltd.', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(210, NULL, NULL, '337', '', '', '', '23-50/1 Ashok Nager,', 'Opp Adhrabank ATM,', 'RC Puram', 'Andhra Pradesh', '', '', 'UO FURNITURES', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(211, NULL, NULL, '338', '', '', '', 'No.50/1,', 'Near Venkateswara Hollow Bricks Industries', 'Chikka Begurgate(Kudlugate) Madiwalapost', 'Karnataka', '', '29590318478', 'Vaishnavi Enterprises', '', '15798987dt.21.12.2004', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(212, NULL, NULL, '339', '', '', '', 'Door No:6-1-768, Sali Street,', 'SH Peta, Nellore', '', 'Andhra Pradesh', '', '28206205892', 'Varalakshmi Agencies', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(213, NULL, NULL, '340', '', '', '', 'D.No: 14-9/1-3,', 'Valavari Street, Hanumanpet,', 'Vijayawada.', 'Andhra Pradesh', '', 'VJ2/06/0/1513', 'Varalakshmi Enterprises', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(214, NULL, NULL, '341', 'Naveen', '4024605918', '9912315353', '4-8-663, Opp: Ram Mandir,', 'Gowliguda, ', 'Hyderabad', 'Andhra Pradesh', '', '28234520710', 'Varun  Sai Foam Agencies', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(215, NULL, NULL, '342', '', '', '', 'Puttaparthi, Ananthapur Dist', '', '', 'Andhra Pradesh', '', '', 'Vasavi Nivas', '', '', 'Industrial');
INSERT INTO `tbl_distributors` VALUES(216, NULL, NULL, '343', '', '6594788', '', '64-9-1, 1st. Floor,', 'Beside Eenadu, Patamata,', 'Vijayawada.', 'Andhra Pradesh', '', '28915131949', 'Venkataramana Imported Furniture', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(217, NULL, NULL, '344', '', '', '', '18-5-23, 3rd Lane, Cross Road', 'Kedareswarapet', 'Vijayawada - 3', 'Andhra Pradesh', '', '98090111612', 'Vijaya Krishna Enterprises', '', '', 'Wholesaler');
INSERT INTO `tbl_distributors` VALUES(218, NULL, NULL, '345', '', '', '', 'CTM Road,', 'Madanpally', '', 'Andhra Pradesh', '', '28460185837', 'Vijayalakshmi Furniture Palace', '', '', 'Dealer');
INSERT INTO `tbl_distributors` VALUES(219, NULL, NULL, '349', '', '', '9391008508', '# 2-21,', 'Near Bus Stop', 'Chandanagar', 'Andhra Pradesh', '', '28773574166', 'Visree Traders', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(220, NULL, NULL, '350', '', '8916673131', '', '48-14-62, Srinager', 'Ramatalkies Road', 'Vizag', 'Andhra Pradesh', '500 016', '28030172821', 'Wood Land', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(221, NULL, NULL, '351', '', '', '9848028577', '7-1-27/A, Ameerpet,', 'Beside ING ATM,', 'Greenlands,', 'Andhra Pradesh', '', '28124985667', 'Woodplay Corporation', '', '', 'Dealer');
INSERT INTO `tbl_distributors` VALUES(222, NULL, NULL, '352', '', '66813553', '', 'D-154, Phase III, Jeedimetla,', 'Near Jeedmetla Bus Depot,', 'Hyderabad.', 'Andhra Pradesh', '', '28150161177', 'Young Wood', '', '', 'Stockist');
INSERT INTO `tbl_distributors` VALUES(224, NULL, NULL, '354', 'Govind Gaur', '080-41245831', '9986145052', 'No. 756/2B, Kundumaranapalli, Kelmangalam Road', 'Denikanikatta Taluk, Krishnagiri Dist', 'Hosur', 'Tamil Nadu', '635113', '33043361556', 'Foam Products Polyurethane', '', '673835/2-9-96', 'Industrial Customer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factoryusers`
--

CREATE TABLE `tbl_factoryusers` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `mobile` varchar(15) default NULL,
  `street1` varchar(45) default NULL,
  `street2` varchar(45) default NULL,
  `city` varchar(45) default NULL,
  `state` varchar(45) default NULL,
  `pincode` varchar(45) default NULL,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `user` varchar(5) default NULL,
  `orders` varchar(5) default NULL,
  `orderho` varchar(5) default NULL,
  `cutting` varchar(5) default NULL,
  `loading` varchar(5) default NULL,
  `package` varchar(5) default NULL,
  `ucreation` varchar(5) default NULL,
  `vcreation` varchar(5) default NULL,
  `ocreation` varchar(5) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_factoryusers`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_factory_master`
--

CREATE TABLE `tbl_factory_master` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `factorycode` varchar(45) default NULL,
  `contactname` varchar(45) default NULL,
  `mobile` varchar(45) default NULL,
  `factoryphone` varchar(45) default NULL,
  `street1` varchar(45) default NULL,
  `street2` varchar(45) default NULL,
  `city` varchar(45) default NULL,
  `state` varchar(45) default NULL,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `tinnumber` varchar(45) default NULL,
  `pincode` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_factory_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemmaster`
--

CREATE TABLE `tbl_itemmaster` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `itemcode` varchar(45) default NULL,
  `itemname` varchar(150) default NULL,
  `unit` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_itemmaster`
--

INSERT INTO `tbl_itemmaster` VALUES(1, '12', 'Sheets', '20');
INSERT INTO `tbl_itemmaster` VALUES(2, 'C1001', 'Cushions', 'Num');
INSERT INTO `tbl_itemmaster` VALUES(3, 'Rolls', 'Rolls', 'Mts');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_varieties`
--

CREATE TABLE `tbl_item_varieties` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `itemname` varchar(45) default NULL,
  `variety` varchar(45) default NULL,
  `density` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tbl_item_varieties`
--

INSERT INTO `tbl_item_varieties` VALUES(11, 'Sheets', 'Premium', '16');
INSERT INTO `tbl_item_varieties` VALUES(12, 'Sheets', 'Elegant', '16');
INSERT INTO `tbl_item_varieties` VALUES(13, 'Cushions', 'Premium', '16');
INSERT INTO `tbl_item_varieties` VALUES(16, 'Cushions', 'Elegant', '23');
INSERT INTO `tbl_item_varieties` VALUES(18, 'Rolls', 'Premium', NULL);
INSERT INTO `tbl_item_varieties` VALUES(19, 'Sheets', 'super softy', NULL);
INSERT INTO `tbl_item_varieties` VALUES(20, 'Sheets', 'FR', NULL);
INSERT INTO `tbl_item_varieties` VALUES(21, 'Rolls', 'Elegant', NULL);
INSERT INTO `tbl_item_varieties` VALUES(23, 'Sheets', 'B Grade', NULL);
INSERT INTO `tbl_item_varieties` VALUES(24, 'Sheets', 'C Grade', NULL);
INSERT INTO `tbl_item_varieties` VALUES(25, 'Sheets', 'Skin', NULL);
INSERT INTO `tbl_item_varieties` VALUES(26, 'Cushions', 'B Grade', NULL);
INSERT INTO `tbl_item_varieties` VALUES(27, 'Cushions', 'C Grade', NULL);
INSERT INTO `tbl_item_varieties` VALUES(28, 'Cushions', 'Skin', NULL);
INSERT INTO `tbl_item_varieties` VALUES(29, 'Rolls', 'B Grade', NULL);
INSERT INTO `tbl_item_varieties` VALUES(30, 'Rolls', 'C Grade', NULL);
INSERT INTO `tbl_item_varieties` VALUES(31, 'Rolls', 'Skin', NULL);
INSERT INTO `tbl_item_varieties` VALUES(41, 'Rolls', 'Softy', NULL);
INSERT INTO `tbl_item_varieties` VALUES(40, 'Sheets', 'Rebond Foam', NULL);
INSERT INTO `tbl_item_varieties` VALUES(42, 'Sheets', 'Premium WP', NULL);
INSERT INTO `tbl_item_varieties` VALUES(43, 'Sheets', 'Elegant WP', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loadingadvice`
--

CREATE TABLE `tbl_loadingadvice` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `donum` varchar(45) default NULL,
  `dateofloading` varchar(45) default NULL,
  `bundlenum` varchar(45) default NULL,
  `partyname` varchar(45) default NULL,
  `remarks` varchar(45) default NULL,
  `quantity` varchar(45) default NULL,
  `status` varchar(5) default NULL,
  `vehiclenumber` varchar(45) default NULL,
  `transporter` varchar(45) default NULL,
  `orderid` varchar(45) default NULL,
  `density` varchar(45) default NULL,
  `variety` varchar(45) default NULL,
  `itemname` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_loadingadvice`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `type` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` VALUES(1, 'admin', 'Malani123', 'Admin');
INSERT INTO `tbl_login` VALUES(35, 'factory', 'factory@fm123', 'Factory');
INSERT INTO `tbl_login` VALUES(34, 'marketing3', 'marketing3@m123', 'Admin');
INSERT INTO `tbl_login` VALUES(33, 'marketing2', 'marketing2@m123', 'Admin');
INSERT INTO `tbl_login` VALUES(21, 'punedepot', 'pune@d123', 'Branch');
INSERT INTO `tbl_login` VALUES(32, 'marketing1', 'marketing1@m123', 'Admin');
INSERT INTO `tbl_login` VALUES(31, 'avinash', 'avinash@d123', 'Admin');
INSERT INTO `tbl_login` VALUES(25, 'nagpurdepot', 'nagpur@d123', 'Branch');
INSERT INTO `tbl_login` VALUES(30, 'uttam', 'uttam@m123', 'Admin');
INSERT INTO `tbl_login` VALUES(36, 'nagpur', 'nagpur', 'Branch');
INSERT INTO `tbl_login` VALUES(29, 'siddharth', 'siddharth@m123', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `donum` varchar(45) default NULL,
  `itemname` varchar(150) default NULL,
  `quantity` varchar(45) default NULL,
  `numbundles` double default NULL,
  `width` varchar(10) default NULL,
  `height` varchar(10) default NULL,
  `density` varchar(10) default NULL,
  `thickness` varchar(10) default NULL,
  `variety` varchar(45) default NULL,
  `specificcolor` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `bundlestatus` varchar(45) default NULL,
  `remainingbundles` varchar(45) default NULL,
  `priority` varchar(45) default NULL,
  `packagetype` varchar(45) default NULL,
  `remarks` varchar(45) default NULL,
  `colorspecific` varchar(45) default NULL,
  `widthtype` varchar(45) default NULL,
  `heighttype` varchar(45) default NULL,
  `remainingmtrs` varchar(45) default NULL,
  `cancelledbundles` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` VALUES(1, '1', 'Rolls', NULL, NULL, '58', '3600', '23', '6', 'Premium', NULL, 'Sent to Factory', NULL, NULL, NULL, 'Standard', '', '', 'Inch', 'Mtrs', '3600', '0');
INSERT INTO `tbl_orders` VALUES(2, '2', 'Rolls', NULL, NULL, '58', '1800', '18', '10', 'Premium', NULL, 'New', NULL, NULL, NULL, 'Standard', 'Rs.219/-++', 'Grey', 'Inch', 'Mtrs', '1800', '0');
INSERT INTO `tbl_orders` VALUES(3, '2', 'Rolls', NULL, NULL, '58', '480', '18', '6', 'Premium', NULL, 'New', NULL, NULL, NULL, 'Standard', 'Rs.219/-++', 'Grey', 'Inch', 'Mtrs', '480', '0');
INSERT INTO `tbl_orders` VALUES(4, '3', 'Sheets', '1', 1, '72', '72', '23', '500', 'Premium', NULL, 'New', NULL, '1', NULL, 'Standard', 'Blocks', '', 'Inch', 'Inch', '1', '0');
INSERT INTO `tbl_orders` VALUES(5, '4', 'Rolls', NULL, NULL, '57', '450', '18', '8', 'Premium', NULL, 'New', NULL, NULL, NULL, 'Standard', '290', 'ff', 'Inch', 'Mtrs', '450', '0');
INSERT INTO `tbl_orders` VALUES(6, '5', 'Sheets', '18', 1, '72', '72', '16', '34', 'Elegant', NULL, 'New', NULL, '1', NULL, 'Standard', '', '', 'Inch', 'Inch', '18', '0');
INSERT INTO `tbl_orders` VALUES(7, '5', 'Cushions', '50', 1, '22', '21', '14', '45', 'Premium', NULL, 'New', NULL, '1', NULL, 'Standard', '', '', 'mm', 'mm', '50', '0');
INSERT INTO `tbl_orders` VALUES(8, '5', 'Cushions', '1', 2, '22', '21', '14', '50', 'Premium', NULL, 'New', NULL, '2', NULL, 'Standard', '', '', 'Inch', 'Inch', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_factory`
--

CREATE TABLE `tbl_orders_factory` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `donum` varchar(45) default NULL,
  `date` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `orderfrom` varchar(45) default NULL,
  `bundlestatus` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_orders_factory`
--

INSERT INTO `tbl_orders_factory` VALUES(1, '1', '31-05-2011', 'New', 'Foam Products Polyurethane Unit II', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_master`
--

CREATE TABLE `tbl_order_master` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `donum` bigint(20) default NULL,
  `orderdate` varchar(45) default NULL,
  `orderfrom` varchar(100) default NULL,
  `usertype` varchar(45) default NULL,
  `priority` varchar(45) default NULL,
  `packagetype` varchar(45) default NULL,
  `status` varchar(45) default NULL,
  `active` varchar(45) default NULL,
  `bundlestatus` varchar(45) default NULL,
  `remainingbundles` varchar(45) default NULL,
  `orderby` varchar(45) default NULL,
  `orderto` varchar(100) default NULL,
  `dispatcheddate` varchar(45) default NULL,
  `remarks` text,
  `authorisedname` varchar(100) default NULL,
  `authoriseddesignation` varchar(45) default NULL,
  `ordertype` varchar(45) default NULL,
  `podate` varchar(45) default NULL,
  `ponum` varchar(45) default NULL,
  `finisheddate` varchar(45) default NULL,
  `billingprice` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_order_master`
--

INSERT INTO `tbl_order_master` VALUES(1, 1, '16/05/2011', NULL, 'Industrial Customer', '23/05/2011', '', 'Sent to Factory', 'Yes', NULL, NULL, 'Foam Products Polyurethane Unit II', '', NULL, 'dd', 'K SAMSON', 'ASST  MANAGER', 'D.O', '14/05/2011', '114', NULL, 'INDUSTRIAL CUSTOMER');
INSERT INTO `tbl_order_master` VALUES(2, 2, '16/05/2011', NULL, 'Industrial Customer', 'Immediate (Within 3 days)', '', 'New', 'No', NULL, NULL, 'COVERITE', '', NULL, '', 'K. SAMSON SUDHAKAR', 'ASST MANAGER', 'Verbal', '17/05/11', '', NULL, '');
INSERT INTO `tbl_order_master` VALUES(3, 3, '31/05/2011', NULL, 'Wholesaler', 'Immediate (Within 3 days)', '', 'New', 'Yes', NULL, NULL, 'Foam Planet', '', NULL, 'ads', 'asd', 'asd', 'Verbal', '01/06/2011', '', NULL, 'sss');
INSERT INTO `tbl_order_master` VALUES(4, 4, '31/05/2011', NULL, 'Industrial Customer', 'Immediate (Within 3 days)', '', 'New', 'Yes', NULL, NULL, 'Aerocom Cushions Pvt.Ltd', '', NULL, 'ad', 'ad', 'ad', 'Verbal', '', '', NULL, '');
INSERT INTO `tbl_order_master` VALUES(5, 5, '31/05/2011', NULL, 'Distributor', 'Immediate (Within 3 days)', '', 'New', 'Yes', NULL, NULL, 'Priya Ent', '', NULL, 'asd', 'ads', 'asd', 'Verbal', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packaginglist`
--

CREATE TABLE `tbl_packaginglist` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `donum` varchar(45) NOT NULL,
  `bundlenum` varchar(45) default NULL,
  `quantity` varchar(45) default NULL,
  `lengthinmm` varchar(45) default NULL,
  `widthinmm` varchar(45) default NULL,
  `thicknessinmm` varchar(45) default NULL,
  `eachpieceweight` varchar(45) default NULL,
  `totalweight` varchar(45) default NULL,
  `date` varchar(45) default NULL,
  `pdfpath` varchar(100) default NULL,
  `status` varchar(5) default NULL,
  `orderid` varchar(45) default NULL,
  `variety` varchar(45) default NULL,
  `density` varchar(45) default NULL,
  `qtype` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_packaginglist`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicles`
--

CREATE TABLE `tbl_vehicles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `vehiclenum` varchar(45) default NULL,
  `drivername` varchar(100) default NULL,
  `mobilenumber` varchar(45) default NULL,
  `transportname` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_vehicles`
--

INSERT INTO `tbl_vehicles` VALUES(2, 'AP36 1234', 'Srikanth', '9999', 'XX Transports');
INSERT INTO `tbl_vehicles` VALUES(3, '1234', 'ravi varma', '9775651', 'sddsa');
INSERT INTO `tbl_vehicles` VALUES(6, 'AP 23 X 3223', 'VENKATARAMULU', '9958585222', 'VENKATARAMULU');
INSERT INTO `tbl_vehicles` VALUES(7, 'ap23x3223', 'suresh', '99999', 'venakaramulu');
