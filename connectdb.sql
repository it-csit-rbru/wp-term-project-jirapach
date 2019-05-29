-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 10:31 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `connectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brand_id` int(1) NOT NULL,
  `Name_car` varchar(50) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`Brand_id`, `Name_car`, `Description`) VALUES
(1, 'TOYOTA', 'ยี่ห้อรถโตโยต้า'),
(2, 'HONDA', 'ยี่ห้อฮอนด้า'),
(3, 'MAZDA', 'ยี่ห้อมาสด้า'),
(4, 'MISUBISHI', 'ยี่ห้อมิตซูบิชิ'),
(5, 'NISSAN', 'ยี่ห้อนิสสัน');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(50) NOT NULL,
  `car_brand_id` int(50) DEFAULT NULL,
  `regise_no` varchar(20) DEFAULT NULL,
  `engine_no` varchar(100) DEFAULT NULL,
  `rentprice` decimal(18,2) DEFAULT NULL,
  `car_status_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_brand_id`, `regise_no`, `engine_no`, `rentprice`, `car_status_id`) VALUES
(101, 2, 'ฎธ 6768 กรุงเทพมหานค', 'R18A1AP14491', '1500.00', 1),
(102, 2, 'ฌพ 1453 กรุงเทพมหานค', 'R18A19P05184', '1800.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `fname`, `lname`, `phone`, `email`, `address`) VALUES
(1, 'กฤษฎา', 'จินดานวกุล', '082-8062820', 'kitsada@gmail.com', '40/99 หมู่11 ตำบลหนองค้าง อำเภอหนองแขม 10160'),
(2, 'จิดาภา', 'คำภาศรี', '098-0045678', 'jidapa@gmail.com', '52/182 หมู่9 ตำบลคลองไก่เถื่อน อำเภอคลองหาด 27260'),
(3, 'นิภาภัค', 'คำพวง', '096-1178569', 'nipapat@gmail.com', '74/169 หมู่8 อำเภอสีชัง จังหวัดชลบุรี 10080'),
(4, 'จิรายุ', 'โสภา', '096-7871913', 'jirayu@gmail.com', '40 หมู่5 ตำบลคอกนา อำเภอบ้านนอก 28270'),
(5, 'ศรายุท', 'เจริญงาม', '092-5018781', 'srayus@gmail.com', '56 หมู่1 ตำบลบ้านแหนง อำเภอดอยเต่า 10204');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `name_st` varchar(50) DEFAULT NULL,
  `description_st` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `name_st`, `description_st`) VALUES
(1, 'avaliable', 'รถสามารถเช่าได้'),
(2, 'reserve', 'รถถูกจองเพื่อเช่า'),
(3, 'ready', 'รถพร้อมให้ลูกค้ามารับ'),
(4, 'use', 'รถกำลังถูกใช้งาน'),
(5, 'fix', 'รถกำลังซ่อม');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail`
-- (See below for the actual view)
--
CREATE TABLE `view_detail` (
`car_id` int(50)
,`regise_no` varchar(20)
,`engine_no` varchar(100)
,`rentprice` decimal(18,2)
,`Name_car` varchar(50)
,`Description` varchar(100)
,`name_st` varchar(50)
,`description_st` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `view_detail`
--
DROP TABLE IF EXISTS `view_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_detail`  AS  select `car`.`car_id` AS `car_id`,`car`.`regise_no` AS `regise_no`,`car`.`engine_no` AS `engine_no`,`car`.`rentprice` AS `rentprice`,`brand`.`Name_car` AS `Name_car`,`brand`.`Description` AS `Description`,`status`.`name_st` AS `name_st`,`status`.`description_st` AS `description_st` from ((`car` join `brand` on((`car`.`car_brand_id` = `brand`.`Brand_id`))) join `status` on((`car`.`car_status_id` = `status`.`status_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Brand_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `car_brand_id` (`car_brand_id`),
  ADD KEY `car_status_id` (`car_status_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Brand_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`car_brand_id`) REFERENCES `brand` (`Brand_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`car_status_id`) REFERENCES `status` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
