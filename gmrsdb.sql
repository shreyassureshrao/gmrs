-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 03:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gmrsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'admin', '18-10-2016 04:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryDescription` longtext NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL,
  `priority` varchar(15) NOT NULL DEFAULT 'Low'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `priority`) VALUES
(1, 'Postal services', 'Postal services', '2017-12-17 12:35:38', '17-12-2017 06:08:52 PM', 'Low'),
(2, 'Telecommunication', 'Telecommunication', '2017-12-17 12:37:23', '17-12-2017 06:12:15 PM', 'Low'),
(3, 'Labour and Employment', 'Labour and Employment', '2017-12-17 12:38:41', '17-12-2017 06:12:28 PM', 'Low'),
(4, 'Income Tax', 'Income Tax', '2017-12-17 12:40:18', '17-12-2017 06:12:41 PM', 'Low'),
(5, 'Financial Services - Banking', 'Financial Services - Banking', '2017-12-17 12:41:02', '16-01-2018 10:00:03 PM', 'Low'),
(6, 'Financial Services - Insurance', 'Financial Services - Insurance', '2017-12-17 12:42:01', '', 'Low'),
(7, 'Home Affairs', 'Home Affairs', '2017-12-17 12:45:09', '', 'Low'),
(8, 'Housing and Urban Affairs', 'Housing and Urban Affairs', '2017-12-17 12:45:47', '', 'Low'),
(9, 'Health and Family Welfare', 'Health and Family Welfare', '2017-12-17 12:46:36', '', 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `id` int(11) NOT NULL,
  `committeeName` varchar(255) NOT NULL,
  `committeeDescription` tinytext NOT NULL,
  `loginName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` bigint(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `committeeName`, `committeeDescription`, `loginName`, `password`, `email`, `mobile`, `postingDate`, `updationDate`) VALUES
(1, 'Insurance', 'Committee that addresses financial services - insurance related grievances', 'insurance', 'insurance', 'shreyassureshrao@gmail.com', 9591782068, '2017-12-17 12:48:53', '16-01-2018 09:17:41 AM'),
(2, 'Health', 'Committee that addresses health related grievances', 'health', 'health', 'shreyassureshrao@gmail.com', 9591782068, '2017-12-17 12:51:07', '04-01-2018 11:25:58 PM');

-- --------------------------------------------------------

--
-- Table structure for table `committee-category-mapping`
--

CREATE TABLE `committee-category-mapping` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `committeeId` int(11) NOT NULL,
  `redressalDuration` int(11) NOT NULL DEFAULT 7
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `committee-category-mapping`
--

INSERT INTO `committee-category-mapping` (`id`, `categoryId`, `committeeId`, `redressalDuration`) VALUES
(1, 6, 1, 15),
(2, 9, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `committee-member-mapping`
--

CREATE TABLE `committee-member-mapping` (
  `id` int(11) NOT NULL,
  `committeeId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `committee-member-mapping`
--

INSERT INTO `committee-member-mapping` (`id`, `committeeId`, `memberId`, `role`) VALUES
(1, 1, 1, 'Chairperson');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(14, 29, 'closed', 'This grievance has been closed.', '2023-03-14 09:45:05'),
(15, 32, 'closed', 'Health card issued', '2023-12-16 07:41:27'),
(16, 33, 'closed', 'welfare care issued ', '2023-12-16 08:15:00'),
(17, 34, 'closed', 'Done', '2024-04-12 13:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `configure-escalation`
--

CREATE TABLE `configure-escalation` (
  `id` int(11) NOT NULL,
  `cmoEmail` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `configure-escalation`
--

INSERT INTO `configure-escalation` (`id`, `cmoEmail`, `adminEmail`, `creationDate`, `updationDate`) VALUES
(4, 'cmo@karnataka.nic.in', '', '2023-03-14 15:39:19', '14-03-2023 03:41:52 PM');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_curriculum`
--

CREATE TABLE `feedback_curriculum` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileNumber` bigint(11) NOT NULL,
  `stakeholder_type` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `feedback` varchar(5000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `salutation` varchar(10) NOT NULL DEFAULT 'Prof.',
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `contactNo` bigint(11) NOT NULL,
  `emailId` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `salutation`, `name`, `designation`, `department`, `contactNo`, `emailId`, `url`, `postingDate`, `updationDate`) VALUES
(1, 'Mr', 'V. R. Manjunath', 'Health Officer', 'Public Health', 9591782068, 'shreyassureshrao@gmail', '', '2018-01-04 18:04:04', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subject` varchar(2000) NOT NULL,
  `description` mediumtext NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'unprocessed',
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `subject`, `description`, `file`, `status`, `regDate`, `lastUpdationDate`, `remarks`) VALUES
(1, 25, 6, 'No proper pay scale', 'Proper 6th pay scale is not yet implemented in the Institute.', '', 'under processing', '2018-01-22 05:24:25', '2018-01-01 08:37:48', ''),
(2, 25, 6, 'Leave management system not working', 'For my employee Id - 1126, leave management is showing incorrectly', '', 'closed', '2018-01-22 05:25:04', '2018-03-21 09:44:21', ''),
(8, 27, 6, 'Pay not proper', 'Not happy with partial payscale', '', 'closed', '2018-01-03 05:16:06', '2018-01-16 17:22:15', ''),
(23, 40, 6, 'Not many practical aspects are covered', 'Not many practical aspects are covered', '5th Sem Elective - Attendance and Marks.xls', 'under processing', '2018-01-16 07:01:25', '2018-01-16 07:05:53', ''),
(24, 25, 7, 'Buses not on time', 'Buses not on time', '2010 CSE Syllabus Full.pdf', 'under processing', '2018-01-23 04:38:31', '2018-01-23 04:40:40', ''),
(27, 25, 6, 'Acad 1234', 'Acad 1234', '', 'under processing', '2018-03-22 05:22:50', '2018-05-27 09:49:54', ''),
(28, 25, 6, 'payscale not proper', 'payscale not proper', '', 'under processing', '2018-05-27 09:52:41', '2018-05-27 09:54:11', ''),
(29, 42, 6, 'Insurance Claim during Covid not proper', 'I claimed insurance during covid...it was not honoured fully', '', 'closed', '2023-03-14 09:36:11', '2023-03-14 09:45:05', ''),
(30, 42, 6, 'Fraud', 'I have been subjected to Insurance Fraud', '', 'unprocessed', '2023-03-14 09:53:49', '0000-00-00 00:00:00', ''),
(31, 42, 4, 'Not processed', 'Not processed', '', 'unprocessed', '2023-12-15 15:39:55', '0000-00-00 00:00:00', ''),
(32, 42, 9, 'health card not issued', 'health card not issued', '', 'closed', '2023-12-16 07:39:36', '2023-12-16 07:41:27', ''),
(33, 42, 9, 'Family welfare card not issued', 'Family welfare card not issued', '', 'closed', '2023-12-16 08:13:17', '2023-12-16 08:15:00', ''),
(34, 42, 9, 'Monthly health check', 'Monthly health check', '', 'closed', '2024-04-12 13:33:15', '2024-04-12 13:34:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 05:43:11', '', 0),
(2, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 05:43:16', '', 0),
(3, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 05:43:28', '', 0),
(4, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 05:44:28', '', 0),
(5, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 05:45:15', '', 0),
(6, 25, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 05:45:47', '', 1),
(7, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 09:33:40', '', 1),
(8, 0, 'admin', 0x3a3a3100000000000000000000000000, '2023-03-14 09:34:38', '', 0),
(9, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 09:35:03', '', 0),
(10, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 09:35:15', '', 1),
(11, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-03-14 09:53:10', '14-03-2023 03:23:59 PM', 1),
(12, 0, 'admin', 0x3a3a3100000000000000000000000000, '2023-10-11 09:27:04', '', 0),
(13, 0, 'admin', 0x3a3a3100000000000000000000000000, '2023-12-15 15:38:32', '', 0),
(14, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-15 15:39:18', '', 1),
(15, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-16 07:18:49', '', 1),
(16, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-16 07:38:38', '', 1),
(17, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-16 07:42:11', '', 1),
(18, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-16 08:12:19', '', 1),
(19, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2023-12-16 08:15:32', '', 1),
(20, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-01 10:53:46', '', 0),
(21, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-01 10:53:54', '', 1),
(22, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-07 09:02:47', '', 0),
(23, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-02-07 09:02:56', '', 1),
(24, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-03-13 07:02:50', '', 0),
(25, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-03-13 07:02:58', '', 1),
(26, 0, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-12 13:32:30', '', 0),
(27, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-12 13:32:40', '', 1),
(28, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-12 13:34:28', '', 1),
(29, 42, 'shreyassureshrao@gmail.com', 0x3a3a3100000000000000000000000000, '2024-04-12 13:35:47', '12-04-2024 07:05:55 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `gender`, `address`, `regDate`, `updationDate`) VALUES
(42, 'Shreyas Rao', 'shreyassureshrao@gmail.com', 'chintu9', 9591782068, 'Male', 'Bangalore', '2023-03-14 09:33:22', '2023-03-14 09:33:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee-category-mapping`
--
ALTER TABLE `committee-category-mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `committee-member-mapping`
--
ALTER TABLE `committee-member-mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configure-escalation`
--
ALTER TABLE `configure-escalation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_curriculum`
--
ALTER TABLE `feedback_curriculum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `committee`
--
ALTER TABLE `committee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `committee-category-mapping`
--
ALTER TABLE `committee-category-mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `committee-member-mapping`
--
ALTER TABLE `committee-member-mapping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `configure-escalation`
--
ALTER TABLE `configure-escalation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_curriculum`
--
ALTER TABLE `feedback_curriculum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
