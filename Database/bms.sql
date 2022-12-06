-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2022 at 07:54 AM
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
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
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
(9, 'Biscuits');

-- --------------------------------------------------------

--
-- Table structure for table `tblord`
--

CREATE TABLE `tblord` (
  `ord_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `ord_name` varchar(30) NOT NULL,
  `ord_price` int(11) NOT NULL,
  `ord_qty` int(11) NOT NULL,
  `ord_image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblord`
--

INSERT INTO `tblord` (`ord_id`, `p_id`, `u_id`, `ord_name`, `ord_price`, `ord_qty`, `ord_image`) VALUES
(39, 0, 24, 'Dabeli Bread', 36, 1, 'dabeli-pav.jpg'),
(40, 0, 24, 'Burger Buns', 40, 1, 'burgerbun.jpg'),
(46, 0, 24, 'Pav Bhaji Bread', 36, 1, 'pavbhajibread.jpeg'),
(49, 0, 24, 'Pav Bhaji Bread', 36, 1, 'pavbhajibread.jpeg'),
(50, 0, 26, 'Pav Bhaji Bread', 36, 1, 'pavbhajibread.jpeg'),
(51, 0, 24, 'Dabeli Bread', 36, 1, 'dabeli-pav.jpg'),
(52, 0, 24, 'Pav Bhaji Bread', 36, 6, 'pavbhajibread.jpeg'),
(53, 0, 24, '24K Gold Cake', 300, 1, 'gold.jpeg'),
(54, 0, 26, 'Royal Chocolate', 450, 2, 'royalch.jpeg'),
(55, 0, 26, 'Amul Chocolate', 50, 1, 'amuldc.jpeg'),
(60, 0, 26, 'Dabeli Bread', 36, 5, 'dabeli-pav.jpg'),
(61, 0, 26, '24K Gold Cake', 300, 3, 'gold.jpeg'),
(65, 0, 26, 'Toast Biscuits', 50, 10, 'bakery2.jpg'),
(66, 0, 26, 'Dabeli Bread', 36, 3, 'dabeli-pav.jpg'),
(67, 0, 26, 'Dabeli Bread', 36, 4, 'dabeli-pav.jpg'),
(68, 1, 26, 'Pav Bhaji Bread', 36, 3, 'pavbhajibread.jpeg'),
(69, 15, 26, 'Toast Biscuits', 50, 10, 'bakery2.jpg'),
(70, 1, 26, 'Pav Bhaji Bread', 36, 3, 'pavbhajibread.jpeg'),
(71, 1, 26, 'Pav Bhaji Bread', 36, 3, 'pavbhajibread.jpeg'),
(72, 2, 26, 'Dabeli Bread', 36, 3, 'dabeli-pav.jpg'),
(73, 5, 26, 'Amul Chocolate', 50, 5, 'amuldc.jpeg'),
(74, 1, 24, 'Pav Bhaji Bread', 36, 1, 'pavbhajibread.jpeg'),
(76, 15, 26, 'Toast Biscuits', 50, 25, 'bakery2.jpg'),
(77, 2, 26, 'Dabeli Bread', 36, 3, 'dabeli-pav.jpg'),
(78, 15, 26, 'Toast Biscuits', 50, 10, 'bakery2.jpg'),
(79, 5, 26, 'Amul Chocolate', 50, 10, 'amuldc.jpeg'),
(80, 2, 26, 'Dabeli Bread', 36, 1, 'dabeli-pav.jpg'),
(81, 2, 26, 'Dabeli Bread', 36, 10, 'dabeli-pav.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetail`
--

CREATE TABLE `tblorderdetail` (
  `od_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `od_name` varchar(40) NOT NULL,
  `od_email` varchar(256) NOT NULL,
  `od_address` varchar(100) NOT NULL,
  `od_city` varchar(30) NOT NULL,
  `od_state` varchar(30) NOT NULL,
  `od_pin` varchar(10) NOT NULL,
  `od_total` int(11) NOT NULL,
  `od_pay` varchar(256) NOT NULL,
  `od_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorderdetail`
--

INSERT INTO `tblorderdetail` (`od_id`, `u_id`, `od_name`, `od_email`, `od_address`, `od_city`, `od_state`, `od_pin`, `od_total`, `od_pay`, `od_date`) VALUES
(4, 0, 'Deep', 'deep@gmail.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 308, '', '2022-10-19 10:21:56'),
(5, 0, 'Preet', 'preet@yahoo.com', 'Adajan', 'SURAT', 'Gujarat', '395009', 1108, '', '2022-10-19 13:40:53'),
(6, 0, 'Deep', 'deep20@gmail.com', 'rander road', 'SURAT', 'Gujarat', '395009', 36, '', '2022-10-27 21:23:39'),
(7, 0, 'Deep', 'deep@gm.com', 'rander road', 'SURAT', 'Gujarat', '395009', 666, '', '2022-10-30 13:13:00'),
(17, 0, 'Deep Dalal', 'deep@admin.com', ' rander road', 'SURAT', 'Gujarat', '395009', 36, '', '2022-11-12 11:37:29'),
(19, 0, 'Deep', 'deep@gmail.com', 'rander road', 'SURAT', 'Gujarat', '395009', 36, '', '2022-11-30 18:35:39'),
(20, 0, 'Deep', 'deep@cust.com', 'rander road', 'SURAT', 'Gujarat', '395009', 36, '', '2022-12-01 21:43:56'),
(21, 0, '', '', '', '', '', '', 216, '', '2022-12-02 16:56:53'),
(22, 0, 'Deep Check', 'deep@pay.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 300, 'order_Kn1gykT3oqMVTF', '2022-12-02 17:03:02'),
(23, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 900, 'order_Kn2UNfCqU7trQM', '2022-12-02 17:49:36'),
(24, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 50, 'order_Kn2WvW0NRGrepe', '2022-12-02 17:52:26'),
(25, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 1080, 'pay_KnMajXSkRtxtFK', '2022-12-03 13:29:23'),
(26, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 500, 'pay_KnUUIZkVJmcW05', '2022-12-03 21:12:49'),
(27, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 108, 'pay_KnUaCeSkdOhDag', '2022-12-03 21:18:25'),
(28, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 144, 'pay_KnUbXERn4tjeqk', '2022-12-03 21:19:40'),
(29, 0, 'Deep', 'deep@cust.com', 'rander road', 'SURAT', 'Gujarat', '395009', 608, 'pay_KnUz38qQfwtw77', '2022-12-03 21:41:57'),
(30, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 108, 'pay_KnV5HIZIpkEU90', '2022-12-03 21:47:51'),
(31, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 216, 'pay_KnV7avEmscJ0BU', '2022-12-03 21:50:02'),
(32, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 250, 'pay_KnkHGsqdgvS3cU', '2022-12-04 12:39:36'),
(34, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 1250, 'pay_Kns0BnIA2KqYxJ', '2022-12-04 20:12:58'),
(35, 0, 'Deep', 'deep@cust.com', 'Rander road', 'SURAT', 'Gujarat', '395009', 108, 'pay_Knsduab5rp7TfW', '2022-12-04 20:50:36'),
(36, 26, 'Deep', 'deep@cust.com', 'Rander', 'SURAT', 'Gujarat', '395009', 1000, 'pay_KoFnFyfxKN2PCw', '2022-12-05 19:29:23'),
(37, 26, 'Deep', 'deepdalal20@gmail.com', 'picnic park society, rander road', 'SURAT', 'Gujarat', '395009', 36, 'pay_KoWIc7uG6m80P7', '2022-12-06 11:38:10'),
(38, 26, 'Deep Dalal', 'deepdalal20@gmail.com', 'picnic park society, rander road', 'SURAT', 'Gujarat', '395009', 360, 'pay_KoWMwNWFqhXna6', '2022-12-06 11:42:15');

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
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`p_id`, `p_name`, `category`, `p_image`, `p_price`, `p_status`, `date`) VALUES
(1, 'Pav Bhaji Bread', 'Breads and Buns', 'pavbhajibread.jpeg', 36, 'instock', '2022-12-03 16:21:05'),
(2, 'Dabeli Bread', 'Breads and Buns', 'dabeli-pav.jpg', 36, 'instock', '2022-09-16 00:00:00'),
(3, 'Burger Buns', 'Breads and Buns', 'burgerbun.jpg', 40, 'instock', '2022-09-16 00:00:00'),
(4, 'Cadbury Silk', 'Chocolates', 'dmsilk.jpeg', 80, 'instock', '2022-10-15 14:27:44'),
(5, 'Amul Chocolate', 'Chocolates', 'amuldc.jpeg', 50, 'instock', '2022-09-16 00:00:00'),
(6, 'MrBeastBar', 'Chocolates', 'mrbeast.jpeg', 100, 'instock', '2022-09-16 00:00:00'),
(7, 'Royal Chocolate', 'Cakes', 'royalch.jpeg', 450, 'instock', '2022-09-16 00:00:00'),
(8, '24K Gold Cake', 'Cakes', 'gold.jpeg', 300, 'instock', '2022-09-23 09:47:05'),
(9, 'Red Velvet Cake', 'Cakes', 'rvcake.jpeg', 360, 'instock', '2022-11-26 17:32:05'),
(15, 'Toast Biscuits', 'Biscuits', 'bakery2.jpg', 50, 'instock', '2022-12-03 16:21:40'),
(16, 'Kitkat', 'Chocolates', 'kitkat.jpeg', 40, 'instock', '2022-12-06 11:45:35');

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
-- Table structure for table `tblstock`
--

CREATE TABLE `tblstock` (
  `st_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `avl_stock` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstock`
--

INSERT INTO `tblstock` (`st_id`, `p_id`, `avl_stock`, `date`) VALUES
(1, 1, 1, '2022-11-26 17:59:04'),
(2, 2, 0, '2022-12-06 11:41:38'),
(3, 3, 30, '2022-12-03 16:22:04'),
(4, 4, 10, '2022-11-08 16:14:56'),
(5, 5, 55, '2022-12-03 16:22:09'),
(6, 6, 2, '2022-11-26 17:07:42'),
(7, 9, 3, '2022-11-08 13:56:34'),
(8, 8, 5, '2022-12-03 16:21:59'),
(9, 7, 3, '2022-11-08 13:34:13'),
(10, 15, 0, '2022-12-04 20:19:12');

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
  `otp` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `name`, `email`, `password`, `contact`, `otp`, `date`) VALUES
(9, 'admin', 'admin@gmail.com', '$2y$10$8So7TWHGYh1w3Q0Oj06JROIVA8PlRVxh3Dph9dj3fdhEGqpaZ3nii', 192867851, 0, '2022-09-22 19:41:41'),
(10, 'admin123', 'admin23@gmail.com', '$2y$10$F4bXlewWtEa/zEQjCQkGaeBg4nRUvD1gfV/lk79Abmd7MIHVPaE6S', 1278283690, 0, '2022-09-22 19:50:54'),
(11, 'abchs', 'deep@yahoo.com', '$2y$10$u6tk8fDoJ5UbopXNblu0fO6zlyoCc33GqHcIoetLZR2EkbzAI.jAe', 2983972312, 0, '2022-09-23 10:09:11'),
(12, 'abra', 'kadabra@abc.com', '$2y$10$TAL9bGSF681dqaXb9oe6..GieIPYtdyUX4g91rxMdVKbJ2ejUvHg6', 9817298621, 0, '2022-09-23 11:05:03'),
(13, 'ajbfd', 'abcb@abc.com', '$2y$10$eqmu.DXlv3GWiH3P9HckEugMU.qPom.qtS6aDvnKsCxhD3An.A5ni', 2737678611, 0, '2022-09-23 11:06:25'),
(14, 'deepd', 'deepd@gmail.com', '$2y$10$vKcHvSYttwjUUnE1IqTHa.eYI4/59jaaG6RIXGwe2T59iMX3PTimG', 1234567890, 0, '2022-09-23 11:31:37'),
(15, 'nf', 'nf@nf.nf', '$2y$10$M.yTKohNoOTIq0757eDKOuCAYgrNCagl4/hH99x3xWtX0dsOAWune', 1827986361, 0, '2022-09-23 13:16:16'),
(16, 'hsfdujk', 'jdbfj@kndg.cq', '$2y$10$OOAgD/dy4HbpBJOP1/ku0.3Fc.eTjo88GCiYd3J.T1frow9.IIyma', 187627816, 0, '2022-09-23 13:45:19'),
(17, 'oneplus', 'oneplus@gmail.com', '$2y$10$0lIW7LGAPeBYZj/Z1xZPE.vTmi35Vr6NevkHeCY.8qSPVTDQ7nv7S', 2222222222, 0, '2022-09-23 14:44:17'),
(18, 'pratham', '20bmiit031@gmail.com', '$2y$10$JDexCYv5Nf/VmUGFha5qGuSMtVFPoRUCAiMypaKLXBAlRWYdpoho6', 7878435553, 0, '2022-09-23 16:29:13'),
(19, 'pratham', 'pratham5553@gmail.com', '$2y$10$SOMykxD5aWQ3XraV.elxNuB4Qsh.qZYaQBJjAX7pl9nrZPgwz9R.S', 7878435553, 0, '2022-09-23 16:43:19'),
(20, 'abcdef', 'abcdef@gmail.com', '$2y$10$oOZ2cz.6HkMMpMW99OD8Gu.oZDVsAm8JeWV7ikMVvgU8DbX/vtvAi', 982878657, 0, '2022-09-23 21:25:08'),
(22, 'shivam Patel', 'shivamp2819@gmail.com', '$2y$10$T.qJYbS0D3fIuYKTTSK04udr/Wg0ktWymtkSmCkuIKh5p/G9rSwL2', 7990597887, 0, '2022-09-24 10:06:09'),
(23, 'deep', 'deepdalal@gmail.com', '$2y$10$9iKKuDk1sVvv1B6OvH.pEuHETV0DdBWl55zvVpz8sZN.cgWLP/l2.', 9883738299, 0, '2022-09-24 10:21:22'),
(24, 'Preet', 'preet@yahoo.com', '$2y$10$Wn9Qfc9y.JnhC00KIFL3d.v2gLm95hCTvCPccIzkUEBtOl7lf8U0W', 9876536670, 0, '2022-09-24 10:49:08'),
(25, 'preet p', 'preet@hotmail.com', '$2y$10$DdWzl5U9Td/bnPwgfnIkpuhPNO949rhZwtCjIC1sZFA/7KfV2/Tgy', 2873898787, 0, '2022-09-24 11:04:07'),
(26, 'Deep', 'deep@cust.com', '$2y$10$fpvbLPgBHoxDgEDLkHL.UuDwJyATIKVPGsVbvUCyP/G19r.eX27h6', 9089089765, 0, '2022-12-01 21:40:40'),
(42, 'Deep', 'deepdalal20@gmail.com', '$2y$10$vy1oAle8EKDed3gYkxTSueJf/l7OWEb4Vqfe0jdBdMz.NplSe162y', 9033921032, 508369, '2022-12-06 12:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblwishlist`
--

CREATE TABLE `tblwishlist` (
  `wl_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
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
-- Indexes for table `tblstock`
--
ALTER TABLE `tblstock`
  ADD PRIMARY KEY (`st_id`);

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
  MODIFY `crt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblord`
--
ALTER TABLE `tblord`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstock`
--
ALTER TABLE `tblstock`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tblwishlist`
--
ALTER TABLE `tblwishlist`
  MODIFY `wl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
