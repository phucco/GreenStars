-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2017 at 06:30 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenstars`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'Tiện ích', 'tien-ich'),
(2, 'Đi lại', 'di-lai'),
(3, 'Giáo dục', 'giao-duc'),
(4, 'Y tế', 'y-te'),
(5, 'Thực phẩm khô', 'thuc-pham-kho'),
(6, 'Hải sản', 'hai-san'),
(7, 'Thịt các loại', 'thit'),
(8, 'Đồ ăn sẵn', 'do-an-san'),
(9, 'Đồ ăn vặt, hoa quả, thực phẩm khác', 'thuc-pham-khac'),
(10, 'Đồ uống', 'do-uong'),
(11, 'Hàng tiêu dùng', 'hang-tieu-dung'),
(12, 'Mỹ phẩm và làm đẹp', 'my-pham-lam-dep'),
(13, 'Thời trang', 'thoi-trang'),
(14, 'Nội thất', 'noi-that'),
(15, 'Khác', 'khac');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `room` varchar(5) NOT NULL,
  `building` varchar(2) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `fb_name` varchar(100) DEFAULT NULL,
  `fb_link` varchar(100) DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `category_id`, `name`, `room`, `building`, `phone`, `fb_name`, `fb_link`, `note`) VALUES
(1, 1, 'Nguyen Van A', '0101', 'A1', '0123456789', 'Nguyen Van A', 'https://facebook.com/profile.php', 'This is a sample entry.'),
(2, 2, 'Doan Thi C', '1002', 'A2', '0123456798', 'C Thi Doan', 'https://fb.com/profile.php', 'This is another sample entry.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
