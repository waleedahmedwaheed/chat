-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 23, 2018 at 10:58 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`fid`, `sender_id`, `receiver_id`, `status`) VALUES
(1, 8, 3, 0),
(2, 8, 1, 1),
(3, 8, 2, 0),
(4, 9, 1, 1),
(5, 9, 2, 0),
(6, 11, 10, 1),
(7, 10, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `text`, `time`) VALUES
(1, 'hello', '2018-12-04 04:18:37'),
(2, 'abc', '2018-12-04 04:18:37'),
(3, 'rida', '2018-12-04 04:18:37'),
(4, 'how are you.. ', '2018-12-04 04:18:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`) VALUES
(1, 'maria@gmail.com'),
(2, 'parri@gmail.com'),
(3, 'rida@test.comm'),
(4, 'waleed@test.comm'),
(5, 'rida@wal.com'),
(8, 'waleed@test.comms'),
(9, 'test@test.com'),
(10, 'user1@user1.com'),
(11, 'user2@user2.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_message`
--

DROP TABLE IF EXISTS `user_message`;
CREATE TABLE IF NOT EXISTS `user_message` (
  `um_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`um_id`),
  KEY `user_id` (`to_user_id`),
  KEY `from_user_id` (`from_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_message`
--

INSERT INTO `user_message` (`um_id`, `to_user_id`, `from_user_id`, `message`) VALUES
(3, 3, 1, 'yes'),
(4, 3, 1, 'build'),
(5, 3, 1, 'asdsadsa'),
(6, 4, 1, 'asdsadsa'),
(7, 5, 4, 'Hi'),
(8, 5, 4, 'hello'),
(9, 4, 5, 'hi rida'),
(10, 5, 4, 'ab'),
(11, 5, 4, 'ab'),
(12, 4, 5, 'hg'),
(13, 4, 5, 'gg'),
(14, 5, 4, 'hy'),
(15, 5, 4, 'test'),
(16, 4, 5, 'yes'),
(17, 5, 4, 'ok'),
(18, 4, 5, 'asdsad'),
(19, 5, 4, 'okkkk'),
(20, 4, 5, 'asdasdsd'),
(21, 8, 1, 'HELLO'),
(22, 11, 10, 'hi'),
(23, 10, 11, 'how are you ?'),
(24, 11, 10, 'fine and you ?'),
(25, 10, 11, 'fine too'),
(26, 11, 10, 'whatsup'),
(27, 10, 11, 'nothing much');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_message`
--
ALTER TABLE `user_message`
  ADD CONSTRAINT `from_user_id` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `to_user_id` FOREIGN KEY (`to_user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
