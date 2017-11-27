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
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(25) NOT NULL,
  `company` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `password`, `email`, `designation`, `address`, `contact`, `company`) VALUES
(1, 'Krishna Rao', '', 'krishna@gmail.com', 'Manage', 'VRR NEST', '745216878', 'Rao Industries'),
(2, 'Nick Jones', 'banner@gmail.com', 'banner@gmail.com', 'HR Executive', 'Bangalore', '9013243253', 'Soft-tech Solutions'),
(3, 'Keith Indus', 'krishnarao@gmail.com', 'krishnarao@gmail.com', 'adas', 'dfsdf', '342342342', '1'),
(5, 'Sruchi G', 'sruchig@yahoo.com', 'sruchig@yahoo.com', 'Manager', 'Las Vegas, California, USA', '2312897', 'Microsoft'),
(6, 'Prithu Raj', 'prithu@gmail.com', 'prithu@gmail.com', 'COO', 'Bangalore', '2132139', 'Infosys');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `company_id` int(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_key` varchar(255) NOT NULL,
  `company_website` varchar(255) NOT NULL,
  `company_desc` text NOT NULL,
  `company_contact` int(25) NOT NULL,
  `company_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_info`
--

INSERT INTO `company_info` (`company_id`, `company_name`, `company_key`, `company_website`, `company_desc`, `company_contact`, `company_logo`) VALUES
(1, 'Microsoft', 'Microsoft', 'www.microsoft.com', 'Microsoft Corporation is an American multinational technology company with headquarters in Redmond, Washington. It develops, manufactures, licenses, supports and sells computer software, consumer electronics, personal computers, and services.', 1800102110, 'micro.png'),
(2, 'Infosys', 'Infosys', 'www.infosys.com', 'Infosys Limited is an Indian multinational corporation that provides business consulting, information technology and outsourcing services. It has its headquarters in Bengaluru, India.', 810230212, 'infy.png'),
(3, 'Cisco Systems', 'Cisco', 'www.cisco.com', 'Cisco Systems, Inc. is an American multinational technology conglomerate headquartered in San Jose, California, in the center of Silicon Valley, that develops, manufactures and sells networking hardware.', 218930123, 'cisco.png'),
(4, 'Flipkart', 'Flipkart', 'www.flipcart', 'Flipkart is an electronic commerce company headquartered in Bengaluru, India. It was founded in October 2007 by Sachin Bansal and Binny Bansal.', 879654436, 'flip.png'),
(5, 'Adobe Systems', 'Adobe', 'www.adobe.com', 'Adobe Systems Incorporated is an American multinational computer software company. The company is headquartered in San Jose, California, United States.', 245768212, 'adobe.png');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `admin_id` int(100) NOT NULL,
  `domainName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'Adobe Photoshop'),
(2, 'Andriod'),
(3, 'Analytics'),
(4, 'Android'),
(5, 'API\'s'),
(6, 'Auto Cad'),
(7, 'Assembly Language'),
(8, 'Big Data'),
(9, 'Bio - Informatics'),
(10, 'Bootstrap'),
(11, 'C'),
(12, 'C++'),
(13, 'C#'),
(14, 'CMS'),
(15, 'CSS'),
(16, 'Corel Draw'),
(17, 'Data Analytics'),
(18, 'Design'),
(19, 'Documentation'),
(20, 'Data Science'),
(21, 'Database Management'),
(22, 'Excel'),
(23, 'Forton'),
(24, 'Graphic Design'),
(25, 'HTML'),
(26, 'HTML5'),
(27, 'Hadoop'),
(28, 'iOS'),
(29, 'iOT'),
(30, 'Modelling'),
(31, 'MatLab'),
(32, 'Maya'),
(33, 'Microsoft Office'),
(34, 'MySQL'),
(35, 'MS-SQL'),
(36, 'Network Security'),
(37, 'Node Js'),
(38, 'Laravel'),
(39, 'Open Source Software'),
(40, 'Operating Systems'),
(41, 'Oracle'),
(42, 'Perl'),
(43, 'PHP'),
(44, 'Python'),
(45, 'Project Management'),
(46, 'Ruby'),
(47, 'R'),
(48, 'Server'),
(49, 'SQL'),
(50, 'Systems Administration'),
(51, 'Java'),
(52, '.NET '),
(53, 'J2EE'),
(54, 'Software Testing'),
(55, 'Linux'),
(56, 'UNIX'),
(57, 'UI/UX'),
(58, 'Technical Writing'),
(59, 'Web Development'),
(60, 'XML');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name` (`company_name`),
  ADD UNIQUE KEY `company_key` (`company_key`),
  ADD UNIQUE KEY `company_website` (`company_website`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`admin_id`,`domainName`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `company_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domains`
--
ALTER TABLE `domains`
  ADD CONSTRAINT `domains_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
