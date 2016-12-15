-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2016 at 02:07 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `symfony`
--

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE IF NOT EXISTS `investments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loand_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`id`, `loand_id`, `amount`, `user_id`) VALUES
(1, 1, 234, 1),
(2, 2, 134, 1),
(3, 1, 454, 1),
(4, 1, 454, 1),
(6, 1, 764, 1),
(7, 2, 6743, 1),
(8, 4, 10, 2),
(9, 2, 923, 3),
(10, 2, 923, 3),
(11, 6, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `loads`
--

CREATE TABLE IF NOT EXISTS `loads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` float NOT NULL,
  `availableForInvestments` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `loads`
--

INSERT INTO `loads` (`id`, `amount`, `availableForInvestments`) VALUES
(1, 325.768, 1668.45),
(2, 23532, 58077),
(4, 100000, 99990),
(5, 100000, 100000),
(6, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `availableForInvestments` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `availableForInvestments`) VALUES
(1, 'user', 'Varndas', 'password', 58147),
(2, 'test1', 'Testa lietotajs', 'test1', 9990),
(3, 'test2', 'Otrais lietotajs', 'test2', 8142);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
