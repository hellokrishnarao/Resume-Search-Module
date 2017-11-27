-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2017 at 01:03 PM
-- Server version: 5.7.20-ndb-7.5.8
-- PHP Version: 7.0.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applicant`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `determineAge` (IN `birthDate` DATE, OUT `age` INT)  BEGIN
    SELECT FLOOR(DATEDIFF(NOW(), DATE(birthdate))/365) INTO age;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `app_id` int(100) NOT NULL,
  `feedback_info` varchar(200) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `fb` varchar(50) DEFAULT NULL,
  `github` varchar(50) DEFAULT NULL,
  `linkedin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `dob`, `address`, `mobile`, `gender`, `profile`, `fb`, `github`, `linkedin`) VALUES
(31, 'Krishna Rao', 'krishnarao@gmail.com', '79e3ced705bab880ee8bf96b75d29c75471c6b4593ae7ec963c33e56487ec1ca', '2017-11-15', 'VRR Nest, Bangalore 100', '647586798', 'male', '', '', '', ''),
(32, 'Sid M', 'sidm@gmail.com', '8f10807bb7fff0b7e4d0d3e6f503a9197e73dfeae74728b812bba0c193bf6aa6', '2017-11-02', 'sidm@gmail.com', '342423', 'female', '20170422_092339.jpg', 'sidm@gmail.com', 'sidm@gmail.com', 'sidm@gmail.com'),
(33, 'Sruchi G', 'sruchig@gmail.com', 'e515fd053188c2946cee7c16d7be78a296882fcb88106008d237f7140fbf7ed5', '1997-02-12', '#21, Embassy Residential Site, Marathalli, Bangalore -92', '8923012213', 'female', '20170422_092340.jpg', 'www.facebook/hellosruchi', 'www.github.com/sruchi', 'www.linkedin.com/sruchi');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `appid` int(100) NOT NULL,
  `education` varchar(500) NOT NULL,
  `work_experience` varchar(500) DEFAULT NULL,
  `extra_skills` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`appid`, `education`, `work_experience`, `extra_skills`, `description`) VALUES
(31, '12th Pass 90% secured, 9.8 cgpa in class 10 B.E (BTech) Computer Science and Engineering from PES University (2015-19)', '2 years experience in infosys', 'Piano, Ping pong, tennis, basket ball, cricket, prank calls', 'To be an ethically strong person and professionally superior'),
(32, '12th Pass 90% secured, 9.8 cgpa in class 10 B.E (BTech) Computer Science and Engineering from PES University (2015-19)', 'Worked for Microsoft and Flipcart as an Software Engineer', 'Play Piano, Singing, Wall Art and Public Speaking', 'To be an ethically strong person and professionally superior'),
(33, '10th - CBSE 9.1 cgpa12th - CBSE 92% PCMC (Computer Science)BE/BTech -  8.5 CGPA Aggregate Computer Science PESIT - BSC, Bangalore', 'None', 'I sing, play volley Ball. Read Fiction, novels', 'Want to be a Security Engineer and Networks Analyst. Have interests in research fields of Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `app_id` int(100) NOT NULL,
  `skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`app_id`, `skill`) VALUES
(31, 'Assembly Language'),
(31, 'Auto Cad'),
(31, 'Big Data'),
(31, 'Bio - Informatics'),
(31, 'C'),
(31, 'CSS'),
(31, 'Data Science'),
(31, 'Design'),
(31, 'Documentation'),
(31, 'HTML'),
(31, 'HTML5'),
(31, 'Laravel'),
(31, 'MySQL'),
(31, 'Open Source Software'),
(31, 'Web Development'),
(31, 'XML'),
(32, 'Big Data'),
(32, 'Bootstrap'),
(32, 'C'),
(32, 'C#'),
(32, 'C++'),
(32, 'CMS'),
(32, 'CSS'),
(32, 'Design'),
(32, 'Graphic Design'),
(32, 'Hadoop'),
(32, 'HTML'),
(32, 'Java'),
(32, 'Linux'),
(32, 'Maya'),
(32, 'Microsoft Office'),
(32, 'Modelling'),
(32, 'MySQL'),
(32, 'Open Source Software'),
(32, 'Oracle'),
(32, 'PHP'),
(32, 'Server'),
(33, 'Database Management'),
(33, 'MS-SQL'),
(33, 'MySQL'),
(33, 'Network Security'),
(33, 'Open Source Software'),
(33, 'Operating Systems'),
(33, 'Oracle'),
(33, 'Server'),
(33, 'SQL'),
(33, 'Systems Administration'),
(33, 'UNIX');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`app_id`,`feedback_info`,`rating`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u1` (`email`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`app_id`,`skill`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `resume_ibfk_1` FOREIGN KEY (`appid`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
