-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2020 at 02:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webstudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `create_dt` date DEFAULT NULL,
  `create_tm` varchar(50) DEFAULT NULL,
  `update_dt` date DEFAULT NULL,
  `update_tm` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `create_dt`, `create_tm`, `update_dt`, `update_tm`) VALUES
(3, 'PHP Development', 'php-development', 'Active', '0000-00-00', '15:26:00.000000', '2020-11-08', '23:26:PM'),
(10, 'Python Development', 'python-development', 'Active', '2020-09-27', '16:23:PM', '2020-11-08', '23:27:PM'),
(11, 'Frameworks', 'frameworks', 'Active', '2020-09-27', '16:34:PM', '2020-11-08', '23:29:PM');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `file_nm` varchar(255) DEFAULT NULL,
  `create_dt` date NOT NULL,
  `create_tm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `category_id`, `name`, `description`, `slug`, `status`, `file_nm`, `create_dt`, `create_tm`) VALUES
(1, 3, 'Php Development for beginner', 'This is a complete and free PHP programming course for beginners. It\'s assumed that you already have some HTML skills. But you don\'t need to be a guru, by any means. If you need a refresher on HTML, then click the link for the Web Design course on the left of this page. Everything you need to get started with this PHP course is set out in section one below. Good luck!', 'php-development-for-beginner', 'Active', 'course-pic/3.jpg', '2020-12-06', '19:01:PM');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `create_dt` date NOT NULL,
  `create_tm` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `mobileno`, `password`, `address`, `status`, `member_type`, `profile_pic`, `create_dt`, `create_tm`) VALUES
(1, 'Ram', 'ram@gmail.com', '6387489470', '54321', 'LUCKNOW ', 'Active', 'Admin', 'member-pic/ram.jpg', '2020-09-03', '11:13:52'),
(2, 'Akhilesh Gupta', 'd.akhil.gupta@gmail.com', '8115630517', '123456789', 'Lucknow India', 'Active', 'Teacher', 'member-pic/php.jpg', '2020-11-08', '20:47:00'),
(3, 'Pawan Gupta', 'pawan@gmail.com', '9876543211', '123456', 'Gorakhpur', 'Inactive', 'Teacher', 'member-pic/tokillamocking1.jpg', '2020-11-08', '21:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `web_settings`
--

CREATE TABLE `web_settings` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `header_name` varchar(255) NOT NULL,
  `footer_name` varchar(255) NOT NULL,
  `domain_name` varchar(255) NOT NULL,
  `website_logo` text NOT NULL,
  `website_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_settings`
--

INSERT INTO `web_settings` (`id`, `project_name`, `header_name`, `footer_name`, `domain_name`, `website_logo`, `website_status`) VALUES
(1, 'Webstudy', 'Webstudy', 'Webstudy', 'http://localhost/2020/webstudy/', 'sdfs', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_settings`
--
ALTER TABLE `web_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_settings`
--
ALTER TABLE `web_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
