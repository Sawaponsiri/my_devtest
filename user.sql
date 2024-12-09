-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 04:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `prefix` varchar(10) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `prefix`, `first_name`, `last_name`, `dob`, `profile_image`, `updated_at`) VALUES
(1, 'นาย', 'สวพล', 'ศิริโสภณ', '2000-07-18', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:14:27'),
(2, 'นางสาว', 'ยะลา', 'ธรรมมะ', '1998-04-19', 'uploads/92d.jpg', '2024-12-09 14:23:19'),
(3, 'นาย', 'สมชาย', 'ธรรมดา', '1999-12-05', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:45:49'),
(4, 'นาง', 'สมจิต', 'นามะ', '1989-09-12', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:46:35'),
(5, 'นางสาว', 'ประเสริฐ', 'จิตดี', '2007-01-12', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:47:21'),
(6, 'นาย', 'สมบูรณ์', 'ยิ่งเหมาะ', '2008-04-09', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:47:50'),
(7, 'นาย', 'สมศักดิ์', 'ยายดี', '2011-08-09', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:48:16'),
(8, 'นาย', 'ณรงค์', 'เกียรติยศ', '2000-08-08', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:48:46'),
(9, 'นาย', 'ประสิทธิ์ ', 'ศรีณะ', '1999-12-11', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:49:08'),
(10, 'นางสาว', 'สมพร', 'ยิ้มดี', '1980-05-25', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:49:54'),
(11, 'นาย', 'วิทยา', 'สิริมี', '1970-01-08', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:50:27'),
(12, 'นาย', 'สมบัติ', 'เงินทอง', '1988-02-02', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:50:52'),
(13, 'นาย', 'อุดม', 'สุขดี', '2008-02-16', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:51:20'),
(14, 'นาย', 'เจริญ', 'บารมี', '2003-04-05', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:51:54'),
(15, 'นาย', 'สำราญ', 'บารมี', '2002-12-28', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:52:30'),
(16, 'นาย', 'วิชัย', 'เปี่ยมมี', '2000-11-22', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:52:58'),
(17, 'นาย', 'สวัสดิ์', 'ปีใหม่', '1989-04-18', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:53:26'),
(18, 'นาย', 'ปราณี', 'ศรีสวัสดิ', '1988-09-05', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:53:49'),
(19, 'นาย', 'สมพงษ์', 'สมดี', '2009-01-09', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:54:31'),
(20, 'นางสาว', 'กาญจนา', 'ยิ่งดีงาม', '2000-08-09', 'uploads/Popeye_the_Sailor.png', '2024-12-09 14:54:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
