-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2016 at 05:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kart_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation_table`
--
DROP SCHEMA IF EXISTS `kart_inventory`;
CREATE SCHEMA IF NOT EXISTS `kart_inventory`
  DEFAULT CHARACTER SET utf8
  COLLATE utf8_general_ci;
USE `kart_inventory`;

CREATE TABLE `allocation_table` (
  `member_id` bigint(20) NOT NULL,
  `items` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation_table`
--

INSERT INTO `allocation_table` (`member_id`, `items`) VALUES
(1, 'a:3:{i:0;s:1:"1";i:1;s:1:"4";i:2;s:1:"6";}'),
(2, 'a:1:{i:0;s:1:"1";}'),
(3, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` text NOT NULL,
  `category_code` varchar(50) NOT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="Active"; 0="Inactive";',
  `no_of_items` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_name`, `category_description`, `category_code`, `category_status`, `no_of_items`) VALUES
(1, 'Hardware Items', 'All computer related hardware items including firmwares but excluding drivers.', 'HItem', 1, 50),
(2, 'Software Items', 'All softwares including os,system softwares,application softwares,driversbut excluding firmwares', 'SItem', 1, 2000),
(3, 'office Utilities', 'like microwave,coffee maker cooler,water cooler.', 'OU', 1, 10),
(5, 'Entertainment Utilities', 'Eg: TV,playsyation,News Paper,outdoor games accessories.', 'EU', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dept_table`
--

CREATE TABLE `dept_table` (
  `dept_id` bigint(20) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `dept_description` text NOT NULL,
  `dept_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="active";0="Inactive";'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept_table`
--

INSERT INTO `dept_table` (`dept_id`, `dept_name`, `dept_description`, `dept_status`) VALUES
(1, 'R & D', 'research and development environment for php and .net coders', 1),
(2, 'Quality', 'Sigma six verification and throughout stepwise product quality assessment', 0),
(3, 'HR', 'human resource department for managing employee demands and managing employer employee relations.', 1),
(4, 'BPO', 'costumer care and helpdesk services', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item_table`
--

CREATE TABLE `item_table` (
  `item_id` bigint(20) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_model_number` varchar(50) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `item_identification_key` varchar(20) NOT NULL,
  `item_description` text NOT NULL,
  `item_cost_price` float(10,2) NOT NULL,
  `item_vendor_id` bigint(20) NOT NULL,
  `item_purchase_date` date NOT NULL,
  `item_location` varchar(100) NOT NULL,
  `item_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="Active";0="Inactive";',
  `item_quantity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_table`
--

INSERT INTO `item_table` (`item_id`, `item_name`, `item_model_number`, `category_id`, `item_identification_key`, `item_description`, `item_cost_price`, `item_vendor_id`, `item_purchase_date`, `item_location`, `item_status`, `item_quantity`) VALUES
(1, 'Keyboard', 'Logitech1', 1, 'kb1', 'Simple 101 key ketboard with usb port and num keypad.', 300.00, 1, '2008-11-26', 'Management Floor Mantec Branch', 1, 100),
(2, 'Mouse', 'Dell2', 1, 'm1', 'Dell optical mouse', 100.00, 2, '2001-09-11', 'Calling Floor Mantec Branch', 1, 200),
(3, 'Monitor', 'Logitech1', 1, 'mo1', 'Simple 101 monitor with usb port and num keypad.', 8000.00, 2, '2008-11-26', 'Management Floor Mantec Branch', 1, 100),
(4, 'printer', 'Dell2', 1, 'm1', 'hp deskjet printer laser premium', 2000.00, 1, '2001-09-11', 'Calling Floor Mantec Branch', 1, 200),
(5, 'ms office', 'microsoft1', 2, 'ms1', 'ms word\r\nms excel\r\nms powerpoint etc', 1000.00, 1, '2008-11-26', 'Management Floor Mantec Branch', 1, 50),
(6, 'sdfas', 'Dell2', 3, 'm1', 'Dell optical mouse', 100.00, 2, '2001-09-11', 'Calling Floor Mantec Branch', 1, 10),
(7, 'avira antivirus', 'Logitech1', 2, 'mo1', 'Simple 101 monitor with usb port and num keypad.', 8000.00, 2, '2008-11-26', 'Management Floor Mantec Branch', 0, 2),
(10, 'coffee machine', 'nestle', 3, 'cof69', 'coffee tea hot water supplies', 8000.00, 1, '2008-11-26', 'Management Floor Mantec Branch', 0, 60),
(11, 'adobe air', 'microsoft1', 2, 'ms1', 'hrsrxdckrv, j,dxnfd ngf??vgnfmhv yj', 1000.00, 1, '2008-11-26', 'Management Floor Mantec Branch', 1, 120),
(12, 'playstation', 'sony', 5, 'ps4', 'latest gaming hardware with powerpact performance.', 16000.00, 2, '2008-11-26', 'Management Floor Mantec Branch', 0, 140);

-- --------------------------------------------------------

--
-- Table structure for table `member_role_table`
--

CREATE TABLE `member_role_table` (
  `role_id` bigint(20) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` text NOT NULL,
  `role_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="active";0="Inactive";'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_role_table`
--

INSERT INTO `member_role_table` (`role_id`, `role_name`, `role_description`, `role_status`) VALUES
(1, 'CEO', 'Supreme Authority and operational head of all Executive works', 1),
(2, 'Technical Head', 'senior most authority for technical operations.', 1),
(3, 'Quality Manager', 'Product quality and business analysis', 1),
(4, 'Senior Developer', 'head of all coding and development related operations.', 1),
(5, 'Trainee', 'having Hardcore arseripping php project evelopment and web designing training', 1),
(6, 'HR Manager', 'human resource managing director', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_table`
--

CREATE TABLE `member_table` (
  `member_id` bigint(20) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `member_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="Active";0="Inactive";',
  `member_description` text NOT NULL,
  `member_identification_code` varchar(20) NOT NULL,
  `dept_id` bigint(20) NOT NULL,
  `display_picture_path` text NOT NULL,
  `member_address` text NOT NULL,
  `member_city` varchar(20) NOT NULL,
  `member_state` varchar(20) NOT NULL,
  `member_zip_code` int(10) NOT NULL,
  `member_country` varchar(20) NOT NULL,
  `member_phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_table`
--

INSERT INTO `member_table` (`member_id`, `full_name`, `last_name`, `email`, `role_id`, `member_status`, `member_description`, `member_identification_code`, `dept_id`, `display_picture_path`, `member_address`, `member_city`, `member_state`, `member_zip_code`, `member_country`, `member_phone`) VALUES
(1, 'kgjfgfabb', '??vgmhvfb', 'gfmfd@hghghv.jhhb', 4, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjtb', 'DDb', 4, '?ubjrhtcenfjygvbhtb .t.b8y,.hbb', 'myjtmyjtyjvfgfdgnfb', 'htmnhvtryb', 'ryjfrvrb', 3634542, ',jygmyjbmhfkycub', 1534231692),
(2, 'kgjfgf133', '??vgmhvfh13', 'gfmfd@hghghv.jhh13', 2, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjt13', 'DD3', 2, '?ubjrhtcenfjygvbhtb .t.b8y,.hb1333', 'myjtmyjtyjvfgfdgnf13', 'htmnhvtryac', 'ryjfrvrac', 3634513, ',jygmyjbmhfkycuac', 1534231693),
(3, 'kgjfgfabb', '??vgmhvfb', 'gfmfd@hghghv.jhhb', 1, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjtb', 'DDb', 2, '?ubjrhtcenfjygvbhtb .t.b8y,.hbb', 'myjtmyjtyjvfgfdgnfb', 'htmnhvtryb', 'ryjfrvrb', 3634542, ',jygmyjbmhfkycub', 1534231692),
(4, 'kgjfgf133', '??vgmhvfh13', 'gfmfd@hghghv.jhh13', 5, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjt13', 'DD3', 3, '?ubjrhtcenfjygvbhtb .t.b8y,.hb1333', 'myjtmyjtyjvfgfdgnf13', 'htmnhvtryac', 'ryjfrvrac', 3634513, ',jygmyjbmhfkycuac', 1534231693),
(5, 'kgjfgfabb', '??vgmhvfb', 'gfmfd@hghghv.jhhb', 6, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjtb', 'DDb', 1, '?ubjrhtcenfjygvbhtb .t.b8y,.hbb', 'myjtmyjtyjvfgfdgnfb', 'htmnhvtryb', 'ryjfrvrb', 3634542, ',jygmyjbmhfkycub', 1534231692),
(6, 'kgjfgf133', '??vgmhvfh13', 'gfmfd@hghghv.jhh13', 1, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjt13', 'DD3', 3, '?ubjrhtcenfjygvbhtb .t.b8y,.hb1333', 'myjtmyjtyjvfgfdgnf13', 'htmnhvtryac', 'ryjfrvrac', 3634513, ',jygmyjbmhfkycuac', 1534231693),
(7, 'kgjfgfabb', '??vgmhvfb', 'gfmfd@hghghv.jhhb', 2, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjtb', 'DDb', 3, '?ubjrhtcenfjygvbhtb .t.b8y,.hbb', 'myjtmyjtyjvfgfdgnfb', 'htmnhvtryb', 'ryjfrvrb', 3634542, ',jygmyjbmhfkycub', 1534231692),
(8, 'kgjfgf133', '??vgmhvfh13', 'gfmfd@hghghv.jhh13', 3, 1, 'jfhv ig.k.jhb.h.lhligyfjyrcjt13', 'DD3', 4, '?ubjrhtcenfjygvbhtb .t.b8y,.hb1333', 'myjtmyjtyjvfgfdgnf13', 'htmnhvtryac', 'ryjfrvrac', 3634513, ',jygmyjbmhfkycuac', 1534231693);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="Active";0="Inactive";',
  `is_admin` tinyint(1) NOT NULL DEFAULT '1',
  `dp_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `status`, `is_admin`, `dp_path`) VALUES
(1, 'Kartikeya', 'Misra', 'admin', 'kartikeya.96.misra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '146840162620160713.png');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_table`
--

CREATE TABLE `vendor_table` (
  `vendor_id` bigint(20) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_address` text NOT NULL,
  `vendor_contact` int(10) NOT NULL,
  `vendor_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1="Active";0="Inactive";'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_table`
--

INSERT INTO `vendor_table` (`vendor_id`, `vendor_name`, `vendor_address`, `vendor_contact`, `vendor_status`) VALUES
(1, 'Sagar Electronics', 'sector 62 mamura chauk,Noida', 1234567890, 1),
(2, 'computer world', 'sector 37 Noida City Center,Noida', 123456789, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dept_table`
--
ALTER TABLE `dept_table`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `item_table`
--
ALTER TABLE `item_table`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `item_vendor_id` (`item_vendor_id`);

--
-- Indexes for table `member_role_table`
--
ALTER TABLE `member_role_table`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `member_table`
--
ALTER TABLE `member_table`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `department` (`dept_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendor_table`
--
ALTER TABLE `vendor_table`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dept_table`
--
ALTER TABLE `dept_table`
  MODIFY `dept_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item_table`
--
ALTER TABLE `item_table`
  MODIFY `item_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `member_role_table`
--
ALTER TABLE `member_role_table`
  MODIFY `role_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `member_table`
--
ALTER TABLE `member_table`
  MODIFY `member_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vendor_table`
--
ALTER TABLE `vendor_table`
  MODIFY `vendor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `item_table`
--
ALTER TABLE `item_table`
  ADD CONSTRAINT `fk_item_category` FOREIGN KEY (`category_id`) REFERENCES `category_table` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_item_vendor` FOREIGN KEY (`item_vendor_id`) REFERENCES `vendor_table` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_table`
--
ALTER TABLE `member_table`
  ADD CONSTRAINT `fk_member_dept` FOREIGN KEY (`dept_id`) REFERENCES `dept_table` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member_role` FOREIGN KEY (`role_id`) REFERENCES `member_role_table` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
