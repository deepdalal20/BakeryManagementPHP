-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 23, 2022 at 08:26 AM
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
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `p_id` int(10) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `p_image` varchar(255) NOT NULL,
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
(4, 'Cadbury Silk', 'Chocolates', 'dmsilk.jpeg', 80, 'instock', 0, '2022-09-16 00:00:00'),
(5, 'Amul Chocolate', 'Chocolates', 'amuldc.jpeg', 50, 'instock', 0, '2022-09-16 00:00:00'),
(6, 'MrBeastBar', 'Chocolates', 'mrbeast.jpeg', 100, 'instock', 0, '2022-09-16 00:00:00'),
(7, 'Royal Chocolate', 'Cakes', 'royalch.jpeg', 450, 'instock', 0, '2022-09-16 00:00:00'),
(8, ' 24K Gold Cake', 'Cakes ', 'gold.jpeg', 3000, 'instock', 0, '2022-09-16 00:00:00'),
(9, 'Blue coated cake', 'Cakes ', 'bluename.jpg', 360, 'instock', 0, '2022-09-23 08:16:19');

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
(7, 'deep', 'deep@gmail.com', '$2y$10$jkm6x4fJY4wh7VFrBT7YmOyQscKoirFcvdWPW32NJgWVHQKf28Izy', 1234512345, '2022-09-11 15:58:15'),
(8, 'deep', 'deep@gmail.com', '$2y$10$p7tIlFiHrjloiL8L.xhH0e7xErtuv4WmhwT.y9rHLhM0sQAyQihxW', 1234512345, '2022-09-11 16:05:07'),
(9, 'admin', 'admin@gmail.com', '$2y$10$8So7TWHGYh1w3Q0Oj06JROIVA8PlRVxh3Dph9dj3fdhEGqpaZ3nii', 192867851, '2022-09-22 19:41:41'),
(10, 'admin123', 'admin23@gmail.com', '$2y$10$F4bXlewWtEa/zEQjCQkGaeBg4nRUvD1gfV/lk79Abmd7MIHVPaE6S', 1278283690, '2022-09-22 19:50:54'),
(11, 'abchs', 'deep@yahoo.com', '$2y$10$u6tk8fDoJ5UbopXNblu0fO6zlyoCc33GqHcIoetLZR2EkbzAI.jAe', 2983972312, '2022-09-23 10:09:11'),
(12, 'abra', 'kadabra@abc.com', '$2y$10$TAL9bGSF681dqaXb9oe6..GieIPYtdyUX4g91rxMdVKbJ2ejUvHg6', 9817298621, '2022-09-23 11:05:03'),
(13, 'ajbfd', 'abcb@abc.com', '$2y$10$eqmu.DXlv3GWiH3P9HckEugMU.qPom.qtS6aDvnKsCxhD3An.A5ni', 2737678611, '2022-09-23 11:06:25'),
(14, 'deepd', 'deepd@gmail.com', '$2y$10$vKcHvSYttwjUUnE1IqTHa.eYI4/59jaaG6RIXGwe2T59iMX3PTimG', 1234567890, '2022-09-23 11:31:37');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
