-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2023 at 12:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `serial_no` varchar(10) NOT NULL,
  `suspect_name` text NOT NULL,
  `victim_name` text NOT NULL,
  `incident` varchar(10000) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `file` binary(255) NOT NULL,
  `status` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`serial_no`, `suspect_name`, `victim_name`, `incident`, `location`, `date`, `type`, `file`, `status`, `id`) VALUES
('DV/2023/1', 'Chifuniro', 'Moly', 'anagulitsirana katundu mopanda chilolezo', 'Chikanda, Zomba, Malawi', '2023-06-09', 'Domestic violation', 0x000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, 'Open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `duty`
--

CREATE TABLE `duty` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(4) NOT NULL,
  `service_no` varchar(20) NOT NULL,
  `date_to_report` date NOT NULL,
  `date_assigned` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duty`
--

INSERT INTO `duty` (`id`, `serial_no`, `service_no`, `date_to_report`, `date_assigned`) VALUES
(1, '35aa', 'qwerty123', '2023-06-15', '2023-06-01'),
(2, '35aa', 'qwerty12345', '2023-06-05', '2023-06-04'),
(3, '35aa', 'qwerty1234', '2023-06-27', '2023-06-06'),
(4, 'ced2', 'qwerty123', '2023-06-30', '2023-06-06'),
(5, 'e68e', 'qwerty12345', '2023-06-29', '2023-06-07'),
(6, '35aa', 'qwerty123', '2023-06-29', '2023-06-07'),
(7, 'd43d', 'qwerty123', '2023-06-30', '2023-06-07'),
(8, 'e68e', '1234', '2023-06-09', '2023-06-07'),
(9, 'aaec', '1234', '2023-06-21', '2023-06-07'),
(10, 'f069', '1234', '2023-06-23', '2023-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `guidelines`
--

CREATE TABLE `guidelines` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guidelines`
--

INSERT INTO `guidelines` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'When you want to report an incident', 'Make sure you have the following things:\r\n1. working phone number which will be verified\r\n\r\n2. provide suspects and victims detais\r\n\r\n3. provide a varide location for an incident', '2023-06-09 05:54:12'),
(2, 'If you have issues', '1. Check the FAQ and the responses\r\n\r\n2. you can leave your comment in FAQ section', '2023-06-09 05:54:20'),
(3, 'How to navigate through our website', '1. click on the link that will take you to the page needed\r\n2. check if everything is oky.', '2023-06-09 06:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `date`, `details`, `image`) VALUES
(2, 'Floods', '2023-05-31', 'There washeavy rains in chikwawa that led to the flodding you are seeing in the picture bellow', 'upload/IMG_114454.png');

-- --------------------------------------------------------

--
-- Table structure for table `login_officer_incharge`
--

CREATE TABLE `login_officer_incharge` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_officer_incharge`
--

INSERT INTO `login_officer_incharge` (`id`, `name`, `user_name`, `password`) VALUES
(3, 'Molece Nkhoma', 'mn', '1234'),
(9, 'Lordwell Manondo', 'crms', '81dc9bdb52d04dc20036dbd8313ed055'),
(12, 'Yamikani Chabuka', 'crms1', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(4) NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL,
  `file` binary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `details`, `date`, `file`) VALUES
(1, 'some houses were washed away by running water', '2023-05-25', 0x75706c6f6164732f494d472d32303233303431362d5741303031382e6a70670000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
(2, 'asdfghjkl;zxcvbnm,sdfghj\r\nsdfghjk\r\nasdfghjkl\r\nasdfghjk', '2023-05-10', 0x75706c6f6164732f494d472d32303233303431362d5741303031382e706e670000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000),
(3, 'PPERJNNBF EDIGJGJ', '2023-05-10', 0x75706c6f6164732f494d472d32303233303431332d5741303034392e6a70670000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `name` varchar(25) NOT NULL,
  `phone` int(10) NOT NULL,
  `location` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `service_no` int(20) NOT NULL,
  `date_of_entry` date NOT NULL,
  `officer_rank` varchar(20) NOT NULL,
  `station` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `first_name`, `last_name`, `service_no`, `date_of_entry`, `officer_rank`, `station`, `password`) VALUES
(1, 'Joshua ', 'Mashaka', 123, '2023-06-01', 'Sub-Inspector', 'Mpunga', '$2y$10$sWpk1Q8rhSF3f.YwaSarBex3UB4A2OdVSwfnpDmL7xU9nnzTuQH3C'),
(2, 'Lordwell', 'Manondo', 1234, '2023-06-01', 'Assistant Sub-Inspec', 'Mpondabwino', '$2y$10$y1CTtqcrTJRJth.BrYlkaew85c4pADoddg4zjLCdgz9AJj8zjzOSq'),
(3, 'William', 'Chikaoneka', 12345, '2023-06-02', 'Corporal', 'Mpunga', '$2y$10$8J.ooN82/33twSi92mn.IeEzYCfSJxBgrQH4Qyy37.8Z9L9KkWkkW');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES
('bed-com-26-18@unima.ac.mw', '768e78024aa8fdb9b8fe87be86f647457e5499ea71', '2023-05-19 17:36:14'),
('bed-com-26-18@unima.ac.mw', '768e78024aa8fdb9b8fe87be86f64745ea587c1cbf', '2023-05-19 17:38:13'),
('bed-com-26-18@unima.ac.mw', '768e78024aa8fdb9b8fe87be86f64745b6b9f42b6f', '2023-05-19 17:49:23'),
('bed-com-26-18@unima.ac.mw', '768e78024aa8fdb9b8fe87be86f647452d2ff4f979', '2023-05-19 17:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `reportform`
--

CREATE TABLE `reportform` (
  `id` int(11) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reportform`
--

INSERT INTO `reportform` (`id`, `phone`, `location`, `description`) VALUES
(1, '0999578228', 'chanco', 'this was it'),
(2, '0999578228', 'chanco', 'this was it'),
(3, '0999578228', 'university of malawi', 'chifuniro bumped into molly'),
(4, '0999578228', 'university of malawi', 'chifuniro bumped into molly'),
(5, '0884407587', 'Mulunguzi Dam, Zomba Malawi, Zomba, Malawi', 'vandalisation of waterboard pipes'),
(6, '0998699955', 'Chikanda, Zomba, Malawi', 'qwertyuiopasdfhjkl;zxcvbnm,qwertyuio'),
(7, '0998269199', 'Chinkhoma, Kasungu, Malawi', 'was there'),
(8, '0998269199', 'Chinkhoma, Kasungu, Malawi', 'was there'),
(9, '0998269199', 'Chinkhoma, Kasungu, Malawi', 'was there'),
(10, '0998269199', 'Chinkhoma, Kasungu, Malawi', 'was there'),
(11, '0998269199', 'Chinkhoma, Kasungu, Malawi', 'was there'),
(12, '0998269199', 'Chinkhoma, Kasungu, Malawi', 'was there'),
(13, '0988888888', 'Lilongwe, Malawi', '23456'),
(14, '0997530644', 'Likoma Island, Likoma, Malawi', 'one went missing'),
(15, '2345678', 'Lilongwe, Malawi', 'case closed'),
(16, '+265999578228', 'University of Malawi, Zomba, Malawi', 'chifuniro masula was fighting with william'),
(17, '+265997530644', 'Chanco, Chile', 'qwertyui\r\nqwerty\r\nqwrty\r\nqwert');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `duty`
--
ALTER TABLE `duty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serial_no` (`serial_no`),
  ADD KEY `service_no` (`service_no`);

--
-- Indexes for table `guidelines`
--
ALTER TABLE `guidelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_officer_incharge`
--
ALTER TABLE `login_officer_incharge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`phone`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportform`
--
ALTER TABLE `reportform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `duty`
--
ALTER TABLE `duty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `guidelines`
--
ALTER TABLE `guidelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_officer_incharge`
--
ALTER TABLE `login_officer_incharge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reportform`
--
ALTER TABLE `reportform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
