-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2022 at 06:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
-- Table structure for table `TblCsv`
--

CREATE TABLE `TblCsv` (
  `id` int(11) NOT NULL,
  `storeurl` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TblCsv`
--

INSERT INTO `TblCsv` (`id`, `storeurl`, `email`, `telephone`) VALUES
(2, 'http://link2.store1.com', '132132sss@smail.com', '+916254667823'),
(3, 'dsfg.dsfsdfa.dfgdf', 'sdfgdsfgdfsg', 'dfsgdfg'),
(4, 'sdfgtry dsfgdfsg dfg', 'dfgdfgdfg', 'dfgdfgfdg'),
(5, 'dfgdfsggfgdfsdfsggg', 'sdfgdsfgdfsgdfsg', 'sfgdfgdfsg'),
(85, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(86, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(87, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(88, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(89, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(90, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(92, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(93, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(94, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(95, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(96, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(97, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(98, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(99, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(100, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(101, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(102, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(103, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(104, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(105, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(106, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(107, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(108, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(109, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(110, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(111, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(112, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(113, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(114, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(115, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(116, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(117, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(118, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(119, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(120, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(121, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(122, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(123, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(124, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(125, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(126, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(127, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r'),
(128, '123314r23543 dfgsgdfs', 'dsfg 234523rf', '234235r');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uid` varchar(13) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mnumber` text NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `hobbies` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uid`, `fname`, `lname`, `email`, `mnumber`, `dob`, `gender`, `hobbies`, `city`, `state`, `zip`, `description`) VALUES
(258, '61f4ec0520e27', 'Dharmesh', 'Dharmesh', 'dharmesh@g', '6354370407', '2001-01-23', 'male', 'Sports,Programming,Web Surfing,Travelling,Gaming', 'Bavla', 'Gujarat', '382220', 'My name is Dharmesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `TblCsv`
--
ALTER TABLE `TblCsv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `TblCsv`
--
ALTER TABLE `TblCsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
