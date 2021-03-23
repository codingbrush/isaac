-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2021 at 12:37 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isaac`
--
CREATE DATABASE IF NOT EXISTS `isaac` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `isaac`;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `content` text,
  `image` varchar(200) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `image`, `user_id`, `date_created`) VALUES
(12, 'The &amp;#39;Time of Jacob&amp;#39;s Trouble&amp;#39;s', '&lt;p&gt;When you use&amp;nbsp;&lt;a href=&quot;https://github.com/facebook/create-react-app&quot;&gt;create-react-app&lt;/a&gt;&amp;nbsp;to create a React App, you already have support for these changes. This is because it uses Babel.js to convert the ES6+ code to ES5 code which all browsers understand.&lt;/p&gt;', '2021_01_21_19_20_08Cybertron-CLX-Ra-Pre-Built-Desktop-Review-Evolv-X-640x360.png', 1, '2021-01-21'),
(13, 'Maxime voluptas proi', '&lt;p&gt;the mgf reading club card&lt;br /&gt;\r\nwhen its hovered on and the card flips,&lt;br /&gt;\r\nthe text available should be changed to&lt;br /&gt;\r\nlet us help to inculcate reading as a life style in vulnerable children. &lt;em&gt;&lt;strong&gt;vvvvvvv&lt;/strong&gt;&lt;/em&gt;vvvvvv&lt;/p&gt;', '2021_01_27_19_53_27EqqvD0xXEAMpll4.jpg', 1, '2021-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `report_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `title`, `content`, `report_date`, `user_id`, `date_created`) VALUES
(2, 'Dolorem odio eligends', '&lt;p&gt;&lt;em&gt;&lt;strong&gt;Lorem ipsum&lt;/strong&gt;&lt;/em&gt; dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.ssssssssssssssssssssssssss&lt;/p&gt;', '2021-01-11', 1, '2021-01-21 19:23:20');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'ADMIN'),
(2, 'EXTENSION OFFICER'),
(3, 'DISTRICT OFFICER'),
(4, 'FARMER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT '',
  `lastname` varchar(50) DEFAULT '',
  `email` varchar(150) DEFAULT '',
  `password` varchar(255) DEFAULT '',
  `avatar` varchar(100) DEFAULT NULL,
  `activated` tinyint(4) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `avatar`, `activated`, `created_at`, `modified_at`) VALUES
(1, 'isaac', 'ansah', 'isaac@mailinator.com', '$2y$10$feN0PBW0/B51GcUPIm2eEuymVQ2t0xxtdQwDhkkDtyAGcLT1fvpxe', '2021_01_26_18_50_56download.png', 1, '2021-01-11 12:15:54', '2021-01-26 18:50:56'),
(3, 'Sacha', 'Blythe', 'sacha@mailinator.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 1, '2021-01-11 12:47:24', '2021-01-26 19:41:15'),
(4, 'Eleanor', 'Kristens', 'ele@mailinator.com', '$2y$10$HPzen1JOjh9gMvsR/KjaseyavQMvwZMCCCC8gfEk31ShbycejRS5e', NULL, 1, '2021-01-22 21:23:04', '2021-01-27 20:12:28'),
(6, 'Serina', 'Marny', 'bitixuzihu@mailinator.com', '$2y$10$feN0PBW0/B51GcUPIm2eEuymVQ2t0xxtdQwDhkkDtyAGcLT1fvpxe', NULL, 1, '2021-01-27 20:22:29', '2021-01-27 20:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userfk` int(11) NOT NULL DEFAULT '0',
  `rolefk` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `userfk`, `rolefk`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 4),
(18, 6, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
