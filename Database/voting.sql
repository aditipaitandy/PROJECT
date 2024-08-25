-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 03:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `id` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`id`, `pswd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_db`
--

CREATE TABLE `candidate_db` (
  `slid` int(11) NOT NULL,
  `cname` text NOT NULL,
  `pid` int(10) NOT NULL,
  `st` int(10) NOT NULL,
  `const` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidate_db`
--

INSERT INTO `candidate_db` (`slid`, `cname`, `pid`, `st`, `const`) VALUES
(1, 'Candidate 1', 1, 28, 1),
(2, 'Candidate 2', 2, 28, 1),
(3, 'Candidate 3', 3, 28, 1),
(4, 'Candidate 4', 4, 28, 1),
(5, 'Candidate 5', 1, 28, 2),
(6, 'Candidate 6', 2, 28, 2),
(7, 'Candidate 7', 3, 28, 2),
(8, 'Candidate 8', 4, 28, 2),
(9, 'Candidate 9', 1, 28, 3),
(10, 'Candidate 10', 2, 28, 3),
(11, 'Candidate 11', 3, 28, 3),
(12, 'Candidate 12', 4, 28, 3),
(13, 'Candidate 13', 1, 28, 4),
(14, 'Candidate 14', 2, 28, 4),
(15, 'Candidate 15', 3, 28, 4),
(16, 'Candidate 16', 4, 28, 4),
(17, 'Candidate 17', 1, 28, 5),
(18, 'Candidate 18', 2, 28, 5),
(19, 'Candidate 19', 3, 28, 5),
(20, 'Candidate 20', 4, 28, 5),
(21, 'Candidate 21', 1, 28, 6),
(22, 'Candidate 22', 2, 28, 6),
(23, 'Candidate 23', 3, 28, 6),
(24, 'Candidate 24', 4, 28, 6),
(25, 'Candidate 25', 1, 28, 7),
(26, 'Candidate 26', 2, 28, 7),
(27, 'Candidate 27', 3, 28, 7),
(28, 'Candidate 28', 4, 28, 7),
(29, 'Candidate 29', 1, 28, 8),
(30, 'Candidate 30', 2, 28, 8),
(31, 'Candidate 31', 3, 28, 8),
(32, 'Candidate 32', 4, 28, 8),
(33, 'Candidate 33', 1, 28, 9),
(34, 'Candidate 34', 2, 28, 9),
(35, 'Candidate 35', 3, 28, 9),
(36, 'Candidate 36', 4, 28, 9),
(37, 'Candidate 37', 1, 28, 10),
(38, 'Candidate 38', 2, 28, 10),
(39, 'Candidate 39', 3, 28, 10),
(40, 'Candidate 40', 4, 28, 10),
(41, 'Candidate 41', 1, 28, 11),
(42, 'Candidate 42', 2, 28, 11),
(43, 'Candidate 43', 3, 28, 11),
(44, 'Candidate 44', 4, 28, 11),
(45, 'Candidate 45', 1, 28, 12),
(46, 'Candidate 46', 2, 28, 12),
(47, 'Candidate 47', 3, 28, 12),
(48, 'Candidate 48', 4, 28, 12),
(49, 'Candidate 49', 1, 28, 13),
(50, 'Candidate 50', 2, 28, 13),
(51, 'Candidate 51', 3, 28, 13),
(52, 'Candidate 52', 4, 28, 13),
(53, 'Candidate 53', 1, 28, 14),
(54, 'Candidate 54', 2, 28, 14),
(55, 'Candidate 55', 3, 28, 14),
(56, 'Candidate 56', 4, 28, 14),
(57, 'Candidate 57', 1, 28, 15),
(58, 'Candidate 58', 2, 28, 15),
(59, 'Candidate 59', 3, 28, 15),
(60, 'Candidate 60', 4, 28, 15),
(61, 'Candidate 61', 1, 28, 16),
(62, 'Candidate 62', 2, 28, 16),
(63, 'Candidate 63', 3, 28, 16),
(64, 'Candidate 64', 4, 28, 16),
(65, 'Candidate 65', 1, 28, 17),
(66, 'Candidate 66', 2, 28, 17),
(67, 'Candidate 67', 3, 28, 17),
(68, 'Candidate 68', 4, 28, 17),
(69, 'Candidate 69', 1, 28, 18),
(70, 'Candidate 70', 2, 28, 18),
(71, 'Candidate 71', 3, 28, 18),
(72, 'Candidate 72', 4, 28, 18),
(73, 'Candidate 73', 1, 28, 19),
(74, 'Candidate 74', 2, 28, 19),
(75, 'Candidate 75', 3, 28, 19),
(76, 'Candidate 76', 4, 28, 19),
(77, 'Candidate 77', 1, 28, 20),
(78, 'Candidate 78', 2, 28, 20),
(79, 'Candidate 79', 3, 28, 20),
(80, 'Candidate 80', 4, 28, 20),
(81, 'Candidate 81', 1, 28, 21),
(82, 'Candidate 82', 2, 28, 21),
(83, 'Candidate 83', 3, 28, 21),
(84, 'Candidate 84', 4, 28, 21),
(85, 'Candidate 85', 1, 28, 22),
(86, 'Candidate 86', 2, 28, 22),
(87, 'Candidate 87', 3, 28, 22),
(88, 'Candidate 88', 4, 28, 22),
(89, 'Candidate 89', 1, 28, 23),
(90, 'Candidate 90', 2, 28, 23),
(91, 'Candidate 91', 3, 28, 23),
(92, 'Candidate 92', 4, 28, 23),
(93, 'Candidate 93', 1, 28, 24),
(94, 'Candidate 94', 2, 28, 24),
(95, 'Candidate 95', 3, 28, 24),
(96, 'Candidate 96', 4, 28, 24),
(97, 'Candidate 97', 1, 28, 25),
(98, 'Candidate 98', 2, 28, 25),
(99, 'Candidate 99', 3, 28, 25),
(100, 'Candidate 100', 4, 28, 25),
(101, 'Candidate 101', 1, 28, 26),
(102, 'Candidate 102', 2, 28, 26),
(103, 'Candidate 103', 3, 28, 26),
(104, 'Candidate 104', 4, 28, 26),
(105, 'Candidate 105', 1, 28, 27),
(106, 'Candidate 106', 2, 28, 27),
(107, 'Candidate 107', 3, 28, 27),
(108, 'Candidate 108', 4, 28, 27),
(109, 'Candidate 109', 1, 28, 28),
(110, 'Candidate 110', 2, 28, 28),
(111, 'Candidate 111', 3, 28, 28),
(112, 'Candidate 112', 4, 28, 28),
(113, 'Candidate 113', 1, 28, 29),
(114, 'Candidate 114', 2, 28, 29),
(115, 'Candidate 115', 3, 28, 29),
(116, 'Candidate 116', 4, 28, 29),
(117, 'Candidate 117', 1, 28, 30),
(118, 'Candidate 118', 2, 28, 30),
(119, 'Candidate 119', 3, 28, 30),
(120, 'Candidate 120', 4, 28, 30),
(121, 'Candidate 121', 1, 28, 31),
(122, 'Candidate 122', 2, 28, 31),
(123, 'Candidate 123', 3, 28, 31),
(124, 'Candidate 124', 4, 28, 31),
(125, 'Candidate 125', 1, 28, 32),
(126, 'Candidate 126', 2, 28, 32),
(127, 'Candidate 127', 3, 28, 32),
(128, 'Candidate 128', 4, 28, 32),
(129, 'Candidate 129', 1, 28, 33),
(130, 'Candidate 130', 2, 28, 33),
(131, 'Candidate 131', 3, 28, 33),
(132, 'Candidate 132', 4, 28, 33),
(133, 'Candidate 133', 1, 28, 34),
(134, 'Candidate 134', 2, 28, 34),
(135, 'Candidate 135', 3, 28, 34),
(136, 'Candidate 136', 4, 28, 34),
(137, 'Candidate 137', 1, 28, 35),
(138, 'Candidate 138', 2, 28, 35),
(139, 'Candidate 139', 3, 28, 35),
(140, 'Candidate 140', 4, 28, 35),
(141, 'Candidate 141', 1, 28, 36),
(142, 'Candidate 142', 2, 28, 36),
(143, 'Candidate 143', 3, 28, 36),
(144, 'Candidate 144', 4, 28, 36),
(145, 'Candidate 145', 1, 28, 37),
(146, 'Candidate 146', 2, 28, 37),
(147, 'Candidate 147', 3, 28, 37),
(148, 'Candidate 148', 4, 28, 37),
(149, 'Candidate 149', 1, 28, 38),
(150, 'Candidate 150', 2, 28, 38),
(151, 'Candidate 151', 3, 28, 38),
(152, 'Candidate 152', 4, 28, 38),
(153, 'Candidate 153', 1, 28, 39),
(154, 'Candidate 154', 2, 28, 39),
(155, 'Candidate 155', 3, 28, 39),
(156, 'Candidate 156', 4, 28, 39),
(157, 'Candidate 157', 1, 28, 40),
(158, 'Candidate 158', 2, 28, 40),
(159, 'Candidate 159', 3, 28, 40),
(160, 'Candidate 160', 4, 28, 40),
(161, 'Candidate 161', 1, 28, 41),
(162, 'Candidate 162', 2, 28, 41),
(163, 'Candidate 163', 3, 28, 41),
(164, 'Candidate 164', 4, 28, 41),
(165, 'Candidate 165', 1, 28, 42),
(166, 'Candidate 166', 2, 28, 42),
(167, 'Candidate 167', 3, 28, 42),
(168, 'Candidate 168', 4, 28, 42);

-- --------------------------------------------------------

--
-- Table structure for table `cast_db`
--

CREATE TABLE `cast_db` (
  `no` int(100) NOT NULL,
  `pid` int(10) NOT NULL,
  `state` int(10) NOT NULL,
  `const` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cast_db`
--

INSERT INTO `cast_db` (`no`, `pid`, `state`, `const`) VALUES
(3, 1, 28, 1),
(4, 2, 28, 1),
(5, 3, 28, 1),
(6, 4, 28, 1),
(7, 1, 28, 1),
(8, 2, 28, 1),
(9, 3, 28, 1),
(10, 4, 1, 1),
(11, 3, 1, 1),
(12, 1, 1, 1),
(13, 1, 1, 1),
(14, 1, 1, 1),
(15, 1, 1, 1),
(16, 1, 1, 1),
(17, 2, 28, 11),
(18, 2, 28, 1),
(19, 2, 28, 1),
(20, 2, 28, 1),
(21, 2, 28, 4),
(22, 1, 28, 1),
(23, 1, 28, 16),
(24, 2, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `const_db`
--

CREATE TABLE `const_db` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `const_db`
--

INSERT INTO `const_db` (`cid`, `cname`, `state`) VALUES
(1, 'Cooch Behar', 28),
(2, 'Alipurduars', 28),
(3, 'Jalpaiguri', 28),
(4, 'Darjeeling', 28),
(5, 'Raiganj', 28),
(6, 'Balurghat', 28),
(7, 'Maldaha Uttar', 28),
(8, 'Maldaha Dakshin', 28),
(9, 'Jangipur', 28),
(10, 'Baharampur', 28),
(11, 'Murshidabad', 28),
(12, 'Krishnanagar', 28),
(13, 'Ranaghat', 28),
(14, 'Bangaon', 28),
(15, 'Barrackpore', 28),
(16, 'Dum Dum', 28),
(17, 'Barasat', 28),
(18, 'Basirhat', 28),
(19, 'Jaynagar', 28),
(20, 'Mathurapur', 28),
(21, 'Diamond Harbour', 28),
(22, 'Jadavpur', 28),
(23, 'Kolkata Dakshin', 28),
(24, 'Kolkata Uttar', 28),
(25, 'Howrah', 28),
(26, 'Uluberia', 28),
(27, 'Srerampur', 28),
(28, 'Hooghly', 28),
(29, 'Arambagh', 28),
(30, 'Tamluk', 28),
(31, 'Kanthi', 28),
(32, 'Ghatal', 28),
(33, 'Jhargram', 28),
(34, 'Medinipur', 28),
(35, 'Purulia', 28),
(36, 'Bankura', 28),
(37, 'Bishnupur', 28),
(38, 'Bardhaman Purba', 28),
(39, 'Bardhaman–Durgapur', 28),
(40, 'Asansol', 28),
(41, 'Bolpur', 28),
(42, 'Birbhum', 28),
(43, 'Tehri Garhwal', 27),
(44, 'Garhwal', 27),
(45, 'Almora', 27),
(46, 'Nainital–Udhamsingh Nagar', 27),
(47, 'Haridwar', 27);

-- --------------------------------------------------------

--
-- Table structure for table `party_db`
--

CREATE TABLE `party_db` (
  `pid` int(11) NOT NULL,
  `pname` text NOT NULL,
  `pimg` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_db`
--

INSERT INTO `party_db` (`pid`, `pname`, `pimg`) VALUES
(1, 'Party 1', 'party_img/Party 1.jpg'),
(2, 'Party 2', 'party_img/Party 2.jpg'),
(3, 'Party 3', 'party_img/3.jpg'),
(4, 'Party 4', 'party_img/Party 4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `state_db`
--

CREATE TABLE `state_db` (
  `sid` int(11) NOT NULL,
  `stname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_db`
--

INSERT INTO `state_db` (`sid`, `stname`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jharkhand'),
(11, 'Karnataka'),
(12, 'Kerala'),
(13, 'Madhya Pradesh'),
(14, 'Maharashtra'),
(15, 'Manipur'),
(16, 'Meghalaya'),
(17, 'Mizoram'),
(18, 'Nagaland'),
(19, 'Odisha'),
(20, 'Punjab'),
(21, 'Rajasthan'),
(22, 'Sikim'),
(23, 'Tamil Nadu'),
(24, 'Telangana'),
(25, 'Tripura'),
(26, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(28, 'Westbengal');

-- --------------------------------------------------------

--
-- Table structure for table `voter_db`
--

CREATE TABLE `voter_db` (
  `id` int(50) NOT NULL,
  `epid` varchar(10) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `img` varchar(400) NOT NULL,
  `name` text NOT NULL,
  `adhar` int(16) NOT NULL,
  `fname` text NOT NULL,
  `dob` date NOT NULL,
  `state` int(100) NOT NULL,
  `const` int(100) NOT NULL,
  `pswd` varchar(100) NOT NULL,
  `regsts` int(10) NOT NULL,
  `atmpt` int(10) NOT NULL,
  `vote` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voter_db`
--

INSERT INTO `voter_db` (`id`, `epid`, `uid`, `img`, `name`, `adhar`, `fname`, `dob`, `state`, `const`, `pswd`, `regsts`, `atmpt`, `vote`) VALUES
(3, '123', 'i3BHP', 'voter_img/123.JPG', 'Arindam Dey', 629480, 'Sarajit', '2005-12-01', 28, 1, 'Qwerty@123', 1, 1, 1),
(4, '801', 'WGqrN', 'voter_img/801.JPG', 'Aditi Paitandy', 123456, 'Aditi.s Dad', '2005-03-01', 28, 1, 'Qwerty@123', 1, 1, 0),
(5, 'BCA21812', 'UwbSX', 'voter_img/BCA21812.JPG', 'Sohini Banarjee', 9696, 'Sohini dad', '2005-12-07', 28, 16, 'qWERTY@123', 1, 2, 1),
(6, 'epicid1', '', 'voter_img/epicid1.JPG', 'UM SIR', 123456, 'UM SIR  DAD', '1989-10-17', 27, 44, '', 0, 3, 0),
(8, '804', '', 'voter_img/804.JPG', 'Akash', 11111111, 'Akash Dad', '2002-06-13', 27, 44, '', 0, 3, 0),
(9, '808', '', 'voter_img/808.JPG', 'Keya', 45454545, 'Cindrella Dad', '2005-04-21', 27, 45, '', 0, 3, 0),
(11, '1234', '', 'voter_img/1234.JPG', 'AC mam', 33333, 'AC mam Dad', '1999-11-24', 28, 4, '', 0, 3, 0),
(12, '819', '', 'voter_img/819.JPG', 'Swarnali', 6666666, 'Swarnali Dad', '2004-05-19', 28, 2, '', 0, 3, 0),
(13, '612', 'ABGUs', 'voter_img/612.JPG', 'Doyel', 444444, 'Doyel Dad', '2003-06-11', 28, 4, 'Qwerty@123', 0, 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate_db`
--
ALTER TABLE `candidate_db`
  ADD PRIMARY KEY (`slid`);

--
-- Indexes for table `cast_db`
--
ALTER TABLE `cast_db`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `const_db`
--
ALTER TABLE `const_db`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `party_db`
--
ALTER TABLE `party_db`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `state_db`
--
ALTER TABLE `state_db`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `voter_db`
--
ALTER TABLE `voter_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidate_db`
--
ALTER TABLE `candidate_db`
  MODIFY `slid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `cast_db`
--
ALTER TABLE `cast_db`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `const_db`
--
ALTER TABLE `const_db`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `party_db`
--
ALTER TABLE `party_db`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state_db`
--
ALTER TABLE `state_db`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `voter_db`
--
ALTER TABLE `voter_db`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
