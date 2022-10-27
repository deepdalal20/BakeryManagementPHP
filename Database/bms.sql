-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2022 at 05:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `crt_id` int(11) NOT NULL,
  `crt_name` varchar(50) NOT NULL,
  `crt_price` int(11) NOT NULL,
  `crt_qty` int(11) NOT NULL,
  `crt_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`c_id`, `c_name`) VALUES
(1, 'Breads and Buns'),
(2, 'Cakes'),
(3, 'Chocolates'),
(4, 'Biscuits');

-- --------------------------------------------------------

--
-- Table structure for table `tblord`
--

CREATE TABLE `tblord` (
  `ord_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ord_name` varchar(30) NOT NULL,
  `ord_price` int(11) NOT NULL,
  `ord_qty` int(11) NOT NULL,
  `ord_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblord`
--

INSERT INTO `tblord` (`ord_id`, `u_id`, `ord_name`, `ord_price`, `ord_qty`, `ord_image`) VALUES
(6, 24, 'Pav Bhaji Bread', 36, 1, 'pavbhajibread.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `o_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `o_total` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`o_id`, `u_id`, `o_total`, `date`) VALUES
(1, 0, 6240, '2022-10-18 19:22:03'),
(2, 0, 144, '2022-10-18 19:23:11'),
(3, 0, 308, '2022-10-19 10:21:56'),
(4, 0, 1108, '2022-10-19 13:40:53'),
(5, 24, 36, '2022-10-27 21:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetail`
--

CREATE TABLE `tblorderdetail` (
  `od_id` int(11) NOT NULL,
  `od_name` varchar(40) NOT NULL,
  `od_email` varchar(256) NOT NULL,
  `od_address` varchar(100) NOT NULL,
  `od_city` varchar(30) NOT NULL,
  `od_state` varchar(30) NOT NULL,
  `od_pin` varchar(10) NOT NULL,
  `od_total` int(11) NOT NULL,
  `od_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorderdetail`
--

INSERT INTO `tblorderdetail` (`od_id`, `od_name`, `od_email`, `od_address`, `od_city`, `od_state`, `od_pin`, `od_total`, `od_date`) VALUES
(1, 'Deep Dalal', 'deepdalal20@gmail.com', 'picnic park society, rander road', 'SURAT', 'Gujarat', '395009', 6240, '2022-10-18 19:08:25'),
(2, 'Deep Dalal', 'deep@gmail.com', 'picnic park society, rander road', 'SURAT', 'Gujarat', '395009', 6240, '2022-10-18 19:20:17'),
(3, 'NewD', 'deep@gmail.com', 'picnic park society', 'SURAT', 'Gujarat', '395009', 144, '2022-10-18 19:23:11'),
(4, 'Deep', 'deep@gmail.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 308, '2022-10-19 10:21:56'),
(5, 'Preet', 'preet@yahoo.com', 'Adajan', 'SURAT', 'Gujarat', '395009', 1108, '2022-10-19 13:40:53'),
(6, 'Deep', 'deep20@gmail.com', 'rander road', 'SURAT', 'Gujarat', '395009', 36, '2022-10-27 21:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `p_image` varchar(256) NOT NULL,
  `p_price` int(100) NOT NULL,
  `p_status` varchar(100) NOT NULL,
  `delete_flag` int(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`p_id`, `p_name`, `category`, `p_image`, `p_price`, `p_status`, `delete_flag`, `date`) VALUES
(1, 'Pav Bhaji Bread', 'Breads and Buns', 'pavbhajibread.jpeg', 36, 'instock', 0, '2022-09-16 00:00:00'),
(2, 'Dabeli Bread', 'Breads and Buns', 'dabeli-pav.jpg', 36, 'instock', 0, '2022-09-16 00:00:00'),
(3, 'Burger Buns', 'Breads and Buns', 'burgerbun.jpg', 40, 'instock', 0, '2022-09-16 00:00:00'),
(4, 'Cadbury Silk', 'Chocolates', 'dmsilk.jpeg', 80, 'instock', 0, '2022-10-15 14:27:44'),
(5, 'Amul Chocolate', 'Chocolates', 'amuldc.jpeg', 50, 'instock', 0, '2022-09-16 00:00:00'),
(6, 'MrBeastBar', 'Chocolates', 'mrbeast.jpeg', 100, 'instock', 0, '2022-09-16 00:00:00'),
(7, 'Royal Chocolate', 'Cakes', 'royalch.jpeg', 450, 'instock', 0, '2022-09-16 00:00:00'),
(8, '24K Gold Cake', 'Cakes', 'gold.jpeg', 300, 'instock', 0, '2022-09-23 09:47:05'),
(9, 'Red Velvet Cake', 'Cakes', 'bluename.jpg', 360, 'instock', 0, '2022-10-18 22:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `semail` varchar(256) NOT NULL,
  `spassword` varchar(256) NOT NULL,
  `scontact` bigint(10) NOT NULL,
  `sdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`sid`, `sname`, `semail`, `spassword`, `scontact`, `sdate`) VALUES
(2, 'Deep', 'deep@admin.com', 'admin@123', 9028176789, '2022-09-23 05:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `email`, `password`, `contact`, `date`) VALUES
(2, 'deep', 'deep@gmail.com', 'admin123', 123456789, '2022-09-10 19:17:28'),
(4, 'notdeep', 'notdeep@gmail.com', 'aamadmin', 1234056789, '2022-09-10 19:34:16'),
(6, 'aamdeep', 'deep@aam.com', '$2y$10$x5vnqJ12UtflhTyBNkPweOmb5SNW9dLdH/AzZ9ChKkNqp/TK6hhFy', 987654321, '2022-09-11 15:57:28'),
(9, 'admin', 'admin@gmail.com', '$2y$10$8So7TWHGYh1w3Q0Oj06JROIVA8PlRVxh3Dph9dj3fdhEGqpaZ3nii', 192867851, '2022-09-22 19:41:41'),
(10, 'admin123', 'admin23@gmail.com', '$2y$10$F4bXlewWtEa/zEQjCQkGaeBg4nRUvD1gfV/lk79Abmd7MIHVPaE6S', 1278283690, '2022-09-22 19:50:54'),
(11, 'abchs', 'deep@yahoo.com', '$2y$10$u6tk8fDoJ5UbopXNblu0fO6zlyoCc33GqHcIoetLZR2EkbzAI.jAe', 2983972312, '2022-09-23 10:09:11'),
(12, 'abra', 'kadabra@abc.com', '$2y$10$TAL9bGSF681dqaXb9oe6..GieIPYtdyUX4g91rxMdVKbJ2ejUvHg6', 9817298621, '2022-09-23 11:05:03'),
(13, 'ajbfd', 'abcb@abc.com', '$2y$10$eqmu.DXlv3GWiH3P9HckEugMU.qPom.qtS6aDvnKsCxhD3An.A5ni', 2737678611, '2022-09-23 11:06:25'),
(14, 'deepd', 'deepd@gmail.com', '$2y$10$vKcHvSYttwjUUnE1IqTHa.eYI4/59jaaG6RIXGwe2T59iMX3PTimG', 1234567890, '2022-09-23 11:31:37'),
(15, 'nf', 'nf@nf.nf', '$2y$10$M.yTKohNoOTIq0757eDKOuCAYgrNCagl4/hH99x3xWtX0dsOAWune', 1827986361, '2022-09-23 13:16:16'),
(16, 'hsfdujk', 'jdbfj@kndg.cq', '$2y$10$OOAgD/dy4HbpBJOP1/ku0.3Fc.eTjo88GCiYd3J.T1frow9.IIyma', 187627816, '2022-09-23 13:45:19'),
(17, 'oneplus', 'oneplus@gmail.com', '$2y$10$0lIW7LGAPeBYZj/Z1xZPE.vTmi35Vr6NevkHeCY.8qSPVTDQ7nv7S', 2222222222, '2022-09-23 14:44:17'),
(18, 'pratham', '20bmiit031@gmail.com', '$2y$10$JDexCYv5Nf/VmUGFha5qGuSMtVFPoRUCAiMypaKLXBAlRWYdpoho6', 7878435553, '2022-09-23 16:29:13'),
(19, 'pratham', 'pratham5553@gmail.com', '$2y$10$SOMykxD5aWQ3XraV.elxNuB4Qsh.qZYaQBJjAX7pl9nrZPgwz9R.S', 7878435553, '2022-09-23 16:43:19'),
(20, 'abcdef', 'abcdef@gmail.com', '$2y$10$oOZ2cz.6HkMMpMW99OD8Gu.oZDVsAm8JeWV7ikMVvgU8DbX/vtvAi', 982878657, '2022-09-23 21:25:08'),
(22, 'shivam Patel', 'shivamp2819@gmail.com', '$2y$10$T.qJYbS0D3fIuYKTTSK04udr/Wg0ktWymtkSmCkuIKh5p/G9rSwL2', 7990597887, '2022-09-24 10:06:09'),
(23, 'deep', 'deepdalal@gmail.com', '$2y$10$9iKKuDk1sVvv1B6OvH.pEuHETV0DdBWl55zvVpz8sZN.cgWLP/l2.', 9883738299, '2022-09-24 10:21:22'),
(24, 'Preet', 'preet@yahoo.com', '$2y$10$0NCbP0qDLg/vnhlJD0B.c.Wup4Pji5WizW.8N8sWeOQPkJP8219uW', 9876536670, '2022-09-24 10:49:08'),
(25, 'preet p', 'preet@hotmail.com', '$2y$10$DdWzl5U9Td/bnPwgfnIkpuhPNO949rhZwtCjIC1sZFA/7KfV2/Tgy', 2873898787, '2022-09-24 11:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `tblwishlist`
--

CREATE TABLE `tblwishlist` (
  `wl_id` int(11) NOT NULL,
  `wl_name` varchar(50) NOT NULL,
  `wl_price` int(11) NOT NULL,
  `wl_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`crt_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tblord`
--
ALTER TABLE `tblord`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  ADD PRIMARY KEY (`wl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `crt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblord`
--
ALTER TABLE `tblord`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  MODIFY `wl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
