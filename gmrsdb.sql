-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 07:39 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL,
  `priority` varchar(15) NOT NULL DEFAULT 'Low'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `priority`) VALUES
(6, 'Academia', 'Category to express academic-related grievances', '2017-12-17 12:35:38', '17-12-2017 06:08:52 PM', 'Low'),
(7, 'Transport', 'Category to express transport related grievances', '2017-12-17 12:37:23', '17-12-2017 06:12:15 PM', 'Low'),
(8, 'Infrastructure', 'Category to express Infrastructure problems', '2017-12-17 12:38:41', '17-12-2017 06:12:28 PM', 'Low'),
(9, 'Ragging', 'Category to express ragging related grievances', '2017-12-17 12:40:18', '17-12-2017 06:12:41 PM', 'Low'),
(10, 'Women-centric grievances', 'Category to express women-related grievances and harassment ', '2017-12-17 12:41:02', '16-01-2018 10:00:03 PM', 'Low'),
(11, 'Hostel', 'Category for hostel related-issues', '2017-12-17 12:42:01', '', 'Low'),
(12, 'Harassment', 'Category to express harassment related issues such as sexual harassment', '2017-12-17 12:45:09', '', 'Low'),
(13, 'Miscellaneous', 'Category to express miscellaneous grievances that is not appropriate for other categories', '2017-12-17 12:45:47', '', 'Low'),
(14, 'Library', 'Category to express library-related issues', '2017-12-17 12:46:36', '', 'Low'),
(15, 'Security', 'Category to express security-related grievances', '2017-12-17 12:48:08', '', 'Low'),
(17, 'SC/ ST/ OBC related issues', 'Category to express grievances related to SC/ ST/ OBC communities', '2018-01-13 03:12:23', '13-01-2018 08:45:24 AM', 'Low'),
(18, 'Minority related issues', 'Category to express grievances related to Minority communities', '2018-01-13 03:13:05', '13-01-2018 08:44:51 AM', 'Low'),
(19, 'Economically weaker-section related issues ', 'Category to express grievances related to economically weaker-sections of the society', '2018-01-13 03:14:03', '13-01-2018 08:44:16 AM', 'Low');

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
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`id`, `committeeName`, `committeeDescription`, `loginName`, `password`, `email`, `mobile`, `postingDate`, `updationDate`) VALUES
(10, 'Academic', 'Committee that addresses academia-related issue', 'academic', 'academic', 'shreyassureshrao@gmail.com', 9591782068, '2017-12-17 12:48:53', '16-01-2018 09:17:41 AM'),
(11, 'Transport', 'Committee that addresses transport related grievances', 'transport', 'transport', 'transport_committee@sirmvit.edu', 9591782068, '2017-12-17 12:51:07', '04-01-2018 11:25:58 PM'),
(12, 'Infrastructure development and maintenance', 'Committee that addresses infrastructure related grievances', 'infrastructure ', 'infrastructure ', 'infrastructure_committee@sirmvit.edu', 9591782068, '2017-12-17 12:51:58', '04-01-2018 11:26:17 PM'),
(13, 'Anti-ragging ', 'Committee that addresses ragging-related issues', 'anti-ragging', 'anti-ragging', 'anti-ragging_committee@sirmvit.edu', 9591782068, '2017-12-17 12:52:43', '04-01-2018 11:27:35 PM'),
(14, 'Women Empowerment', 'Committee that addresses Women related issues', 'women-empowerment', 'women-empowerment', 'empowerment_committee@sirmvit.edu', 9591782068, '2017-12-17 12:54:14', '04-01-2018 11:27:58 PM'),
(15, 'Hostel', 'Committee that addresses hostel related grievances such as food, accommodation issues etc.', 'hostel', 'hostel', 'hostel_committee@sirmvit.edu', 9591782068, '2017-12-17 12:55:16', '04-01-2018 11:28:11 PM'),
(16, 'Anti-harassment', 'Committee that addresses harassment related issues such as sexual harassment', 'anti-harassment', 'anti-harassment', 'anti-harassment_committee@sirmvit.edu', 9591782068, '2017-12-17 12:56:05', '04-01-2018 11:28:25 PM'),
(17, 'Library', 'Committee that addresses library related grievances', 'library', 'library', 'library_committee@sirmvit.edu', 9591782068, '2017-12-17 12:57:04', '04-01-2018 11:28:45 PM'),
(18, 'Security', 'Committee that addresses security-related issues', 'security', 'security', 'security_committee@sirmvit.edu', 9591782068, '2017-12-17 12:57:38', '04-01-2018 11:29:00 PM'),
(19, 'Miscellaneous grievances handling committee', 'Committee that addresses miscellaneous grievances that cannot be addressed by other committees', 'miscellaneous', 'miscellaneous', 'misc_committee@sirmvit.edu', 9591782068, '2017-12-17 12:59:46', '04-01-2018 11:29:18 PM');

-- --------------------------------------------------------

--
-- Table structure for table `committee-category-mapping`
--

CREATE TABLE `committee-category-mapping` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `committeeId` int(11) NOT NULL,
  `redressalDuration` int(11) NOT NULL DEFAULT '7'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee-category-mapping`
--

INSERT INTO `committee-category-mapping` (`id`, `categoryId`, `committeeId`, `redressalDuration`) VALUES
(1, 6, 10, 15),
(2, 10, 14, 4),
(3, 12, 16, 2),
(4, 7, 11, 6),
(5, 11, 15, 8),
(6, 15, 18, 5),
(7, 14, 17, 5),
(8, 9, 13, 10);

-- --------------------------------------------------------

--
-- Table structure for table `committee-member-mapping`
--

CREATE TABLE `committee-member-mapping` (
  `id` int(11) NOT NULL,
  `committeeId` int(11) NOT NULL,
  `memberId` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee-member-mapping`
--

INSERT INTO `committee-member-mapping` (`id`, `committeeId`, `memberId`, `role`) VALUES
(1, 10, 1, 'Chairperson'),
(2, 14, 2, 'Chairperson'),
(3, 10, 4, 'Convenor'),
(4, 10, 5, 'Chairperson'),
(5, 10, 8, 'Convenor'),
(6, 10, 9, 'Member'),
(7, 14, 11, 'Chairperson'),
(8, 14, 12, 'Convenor'),
(13, 14, 15, 'Member'),
(14, 16, 15, 'Member'),
(15, 11, 16, 'Chairperson'),
(16, 11, 17, 'Convenor'),
(17, 12, 18, 'Chairperson'),
(18, 14, 19, 'Member'),
(19, 10, 19, 'Member'),
(20, 10, 20, 'Member'),
(21, 10, 21, 'Member'),
(22, 17, 21, 'Chairperson'),
(23, 17, 22, 'Convenor'),
(24, 12, 14, 'Member'),
(25, 13, 5, 'Chairperson'),
(26, 13, 8, 'Convenor'),
(27, 13, 26, 'Member'),
(28, 13, 25, 'Member'),
(29, 13, 27, 'Member'),
(30, 13, 28, 'Member'),
(31, 13, 20, 'Member'),
(32, 13, 30, 'Member'),
(33, 13, 31, 'Member'),
(34, 13, 14, 'Member'),
(35, 10, 33, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 1, 'under processing', 'Still under processing. Please wait.', '2017-12-22 05:29:26'),
(2, 4, 'closed', 'The issue has been sorted out properly.', '2018-01-01 06:09:41'),
(3, 5, 'under processing', 'Your status is being processed. ', '2018-01-01 06:53:17'),
(4, 8, 'closed', 'Issue is closed', '2018-01-03 05:16:51'),
(5, 2, 'closed', 'The grievance has been closed.', '2018-01-03 08:57:56'),
(6, 9, 'under processing', 'under processing..', '2018-01-04 09:35:41'),
(7, 7, 'under processing', 'The grievance under process.', '2018-01-04 17:31:49'),
(8, 23, 'under processing', 'We will look into this in this semester.', '2018-01-16 07:05:53'),
(9, 22, 'rejected', 'This is not an issue that can be processed.', '2018-01-16 16:48:34'),
(10, 24, 'under processing', 'We will work on this.', '2018-01-23 04:40:40'),
(11, 25, 'under processing', 'This grievance is under processing still. ', '2018-03-21 08:38:53'),
(12, 27, 'under processing', 'It requires more processing.', '2018-05-27 09:49:54'),
(13, 28, 'under processing', 'It requires more time.', '2018-05-27 09:54:11');

-- --------------------------------------------------------

--
-- Table structure for table `configure-escalation`
--

CREATE TABLE `configure-escalation` (
  `id` int(11) NOT NULL,
  `principalEmail` varchar(255) NOT NULL,
  `managementEmail` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configure-escalation`
--

INSERT INTO `configure-escalation` (`id`, `principalEmail`, `managementEmail`, `adminEmail`, `creationDate`, `updationDate`) VALUES
(3, 'principal.smvit@gmail.com', 'secretary.smvit@gmail.com', 'shreyassureshrao@gmail.com', '2017-12-16 09:50:32', '04-01-2018 09:32:25 PM');

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_curriculum`
--

INSERT INTO `feedback_curriculum` (`name`, `email`, `mobileNumber`, `stakeholder_type`, `subject`, `feedback`, `date`, `id`) VALUES
('Aheibam Jessica Devi', 'jesyaheibam13@gmail.com', 8745637829, 'Student', 'Updation of VTU syllabus', 'Being in the final year,I feel that many requisite courses such as Business Intelligence,Semantic Web,Internet Of Things(IOT) and Business Data Analytics are mandatory technologies/skill set which the industry expects from freshers.\r\nHence ,I request the VTU to kindly update the existing syllabus and include the above mentioned courses as part of B.E curriculum.', '2017-08-01 14:25:37', 3),
('Raghavendra G Bhat', 'raghubhat504@gmail.com', 9591782068, 'Student', 'Request to prescribe easily available and affordable textbooks', 'I find that most of the prescribed textbooks by VTU for BE course is costly and not easily available in standard book stores.I kindly request VTU to include more E-books and textbooks which are available  and affordable.', '2017-06-20 14:26:23', 4),
('Shariq Ahmed', 'shariqahmed49@gmail.com', 9591782068, 'Student', 'Remove theory subjects from 8th semester syllabus', 'I feel that 3.5 months that is provided for project work is insufficient considering that we have 4 theory subjects to study in the final year. Moreover, i am not able to apply for internships at reputed companies because of the theory subjects attendance requirements. It would help if the number of theory subjects in the 8th semester is reduced to none or 2 at the maximum.', '2018-02-04 14:27:09', 5),
('Shreyas Suresh Rao', 'shreyasrao_cs@sirmvit.edu', 9591782068, 'Faculty\r\n', 'Revision of lab syllabus', 'It is observed that many students mug-up their lab experiments and write their lab exams. This practice is prevalent because VTU syllabus prescribes around 14-15 pre-fixed lab programs, which won\'t be altered during the exams. In order to bring about a change in this practice, VTU can keep 50% as pre-fixed lab experiments and rest 50% as modifiable during the exams, which tests the actual comprehension and competency of the student.', '2017-10-11 14:27:58', 6);

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
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `salutation`, `name`, `designation`, `department`, `contactNo`, `emailId`, `url`, `postingDate`, `updationDate`) VALUES
(5, 'Dr', 'V. R. Manjunath', 'Principal', 'Not Applicable', 8028467248, '', '', '2018-01-04 18:04:04', ''),
(8, 'Prof', 'Dilip K. Sen', 'Professor', 'Computer Science and Engineering', 9844072234, 'dilipksen@sirmvit.edu', '', '2018-01-04 18:08:03', ''),
(9, 'Dr', 'G. M. Krishnaiah', 'Professor', 'Basic Science and Humanities', 9008385222, '', '', '2018-01-04 18:08:51', ''),
(11, 'Dr', 'Mrinalini Menon', 'Professor', 'Biotechnology', 9448365986, '', '', '2018-01-04 18:12:31', ''),
(12, 'Ms', 'Rashmi Amardeep', 'Assistant Professor', 'Computer Science and Engineering', 9568493859, 'rashmi_is@sirmvit.edu', '', '2018-01-04 18:12:58', ''),
(13, 'Dr', 'Savitha Choudhary', 'Associate Professor', 'Computer Science and Engineering', 8957684954, 'savitha_cs@sirmvit.edu', '', '2018-01-04 18:14:05', ''),
(14, 'Mr', 'Elaiyaraja ', 'Assistant Professor', 'Computer Science and Engineering', 9986714314, 'elaiyaraja_cs@sirmvit.edu', '', '2018-01-04 18:16:41', ''),
(15, 'Dr', 'Sandhya Suswaram', 'Associate Professor', 'Management Studies', 9986408023, '', '', '2018-01-13 03:18:25', ''),
(16, 'Mr', 'C. Babu Raju', 'Assistant Manager', 'Not Applicable', 9591782068, 'babu_sirmvit.edu', '', '2018-01-13 03:20:42', ''),
(17, 'Mr', 'Chethan', 'Assistant Professor', 'Mechanical Engineering', 9591782068, 'chethan@sirmvit.edu', '', '2018-01-13 03:21:36', ''),
(18, 'Dr', 'Shivanna', 'Professor', 'Civil Engineering', 9591782068, 'shivanna@sirmvit.edu', '', '2018-01-13 03:22:23', ''),
(19, 'Dr', 'S. K. Uma', 'Professor', 'Basic Science and Humanities', 9901834067, 'uma_mca@sirmvit.edu', '', '2018-01-13 03:32:52', ''),
(20, 'Dr', 'P. Vijaya Karthik', 'Professor', 'Information Science and Engineering', 7259893093, 'vijaykarthik_is@sirmvit.edu', '', '2018-01-13 03:40:11', ''),
(21, 'Dr', 'Joel Gnanaprakash', 'Professor', 'Management Studies', 9591782068, 'joel_mba@sirmvit.edu', '', '2018-01-13 03:41:04', ''),
(22, 'Mr', 'Ravish P. Y.', 'Librarian', 'Not Applicable', 9620222216, '', '', '2018-01-13 03:42:14', ''),
(23, 'Dr', 'Manjula', 'Professor', 'Master of Computer Applications', 9886056005, '', '', '2018-03-22 14:44:41', ''),
(24, 'Dr', 'Krishnan', 'Professor', 'Mechanical Engineering', 9945085842, '', '', '2018-03-22 14:49:33', ''),
(25, 'Dr', 'Shanmukharadya', 'Professor', 'Mechanical Engineering', 8105743459, '', '', '2018-03-23 04:02:39', ''),
(26, 'Dr', 'Kavitha E', 'Professor', 'Telecommunication Engineering', 7259589702, '', '', '2018-03-23 04:11:53', ''),
(27, 'Dr', 'H.G.Nagendra', 'Professor', 'Biotechnology', 9916303565, '', '', '2018-03-23 04:12:38', ''),
(28, 'Dr', 'Sundar Guru', 'Professor', 'Electronics and Communication Engineering', 9008430150, '', '', '2018-03-23 04:13:05', ''),
(29, 'Mr', 'M. S. Suresh', 'Associate Professor', 'Electrical and Electronics Engineering', 9886294955, '', '', '2018-03-23 04:14:15', ''),
(30, 'Dr', 'V. Shantha', 'Professor', 'Mechanical Engineering', 7760011874, '', '', '2018-03-23 04:16:37', ''),
(31, 'Dr', 'Hariharan', 'Professor', 'Basic Science and Humanities', 9964212062, '', '', '2018-03-23 04:21:32', ''),
(32, 'Dr', 'Bhanuprakash', 'Professor', 'Computer Science and Engineering', 9886348838, '', '', '2018-03-23 05:08:42', ''),
(34, 'Mr', 'Narayana Shetty', 'Manager', 'Not Applicable', 0, '', '', '2018-03-23 05:10:29', ''),
(35, 'Mr', 'L. K. Muralidhar', 'Other', 'Not Applicable', 0, '', '', '2018-03-23 05:10:51', '');

-- --------------------------------------------------------

--
-- Table structure for table `otp_expiry`
--

CREATE TABLE `otp_expiry` (
  `otp` varchar(10) NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp_expiry`
--

INSERT INTO `otp_expiry` (`otp`, `is_expired`, `create_at`, `id`) VALUES
('913991', 1, '2017-12-22 06:23:43', 1),
('800462', 1, '2017-12-22 09:16:16', 2),
('482654', 1, '2017-12-27 07:32:27', 3),
('593880', 1, '2017-12-27 07:59:20', 4),
('642239', 0, '2018-01-01 07:07:54', 5),
('330014', 1, '2018-01-01 07:10:23', 6),
('311921', 0, '2018-01-01 07:13:13', 7),
('198343', 1, '2018-01-01 07:51:52', 8),
('390674', 1, '2018-01-01 07:53:51', 9),
('407206', 1, '2018-01-02 09:41:27', 10),
('619799', 1, '2018-01-02 10:16:11', 11),
('258392', 1, '2018-01-03 06:15:32', 12),
('800753', 1, '2018-01-03 06:36:50', 13),
('203915', 1, '2018-01-04 05:17:48', 14),
('480087', 1, '2018-01-04 06:26:20', 15),
('494016', 1, '2018-01-04 06:27:58', 16),
('919722', 0, '2018-01-04 06:28:02', 17),
('414407', 1, '2018-01-04 10:27:29', 18),
('698050', 0, '2018-01-04 10:30:23', 19),
('990153', 1, '2018-01-04 10:30:43', 20),
('658192', 1, '2018-01-05 02:20:26', 21),
('261823', 1, '2018-01-05 02:22:14', 22),
('225223', 1, '2018-01-05 02:25:10', 23),
('558651', 1, '2018-01-05 04:59:45', 24),
('232857', 1, '2018-01-05 05:02:07', 25),
('747252', 0, '2018-01-08 10:59:30', 26),
('984866', 1, '2018-01-10 08:47:07', 27),
('765088', 1, '2018-01-10 08:50:43', 28),
('458976', 1, '2018-01-10 09:14:22', 29),
('634429', 1, '2018-01-10 09:32:31', 30),
('774649', 1, '2018-01-10 13:46:49', 31),
('236870', 1, '2018-01-10 15:52:59', 32),
('520605', 1, '2018-01-10 16:04:27', 33),
('197767', 1, '2018-01-15 17:57:56', 34),
('704713', 1, '2018-01-16 04:46:22', 35),
('335902', 1, '2018-01-16 04:48:24', 36),
('362851', 1, '2018-01-16 05:21:04', 37),
('999409', 1, '2018-01-16 05:42:14', 38),
('650560', 1, '2018-01-16 05:45:04', 39),
('934150', 1, '2018-01-16 05:48:46', 40),
('703938', 1, '2018-01-16 06:49:20', 41),
('528408', 1, '2018-01-16 06:50:57', 42),
('511396', 1, '2018-01-16 07:39:38', 43),
('686076', 1, '2018-01-16 07:58:11', 44),
('908915', 1, '2018-01-16 17:31:22', 45),
('511736', 1, '2018-01-16 18:42:23', 46),
('481416', 1, '2018-01-16 18:57:29', 47),
('111023', 1, '2018-01-17 10:14:35', 48),
('337478', 1, '2018-01-17 10:15:51', 49),
('421766', 1, '2018-01-23 05:37:21', 50),
('919814', 1, '2018-01-23 05:38:02', 51),
('857786', 1, '2018-02-21 14:04:51', 52),
('237398', 1, '2018-02-21 14:06:05', 53),
('318847', 1, '2018-02-26 06:14:58', 54),
('828589', 1, '2018-03-13 02:21:27', 55),
('771464', 1, '2018-03-21 09:37:05', 56),
('452017', 1, '2018-03-21 10:04:14', 57),
('318542', 1, '2018-03-22 05:41:14', 58),
('662353', 1, '2018-03-22 05:45:27', 59),
('482821', 1, '2018-03-22 06:22:24', 60),
('401401', 1, '2018-03-22 09:51:25', 61),
('730189', 1, '2018-05-27 11:48:35', 62),
('782973', 1, '2018-05-27 11:51:10', 63),
('685185', 1, '2018-05-27 11:52:16', 64),
('655994', 1, '2020-06-26 07:33:46', 65);

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
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(28, 25, 6, 'payscale not proper', 'payscale not proper', '', 'under processing', '2018-05-27 09:52:41', '2018-05-27 09:54:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL,
  `usertype` varchar(25) NOT NULL DEFAULT 'Student',
  `usn` varchar(50) NOT NULL,
  `department` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `regDate`, `updationDate`, `status`, `usertype`, `usn`, `department`) VALUES
(25, 'Shreyas', 'shreyassureshrao@gmail.com', NULL, 9591782068, '2017-12-15 04:13:01', '0000-00-00 00:00:00', 1, 'Faculty', '1MV00CS043', 'Computer Science and Engineering'),
(26, 'Monica', 'monika_cs@sirmvit.edu', NULL, 9591782068, '2018-01-01 06:51:07', '0000-00-00 00:00:00', 1, 'Faculty', '01234', 'Computer Science and Engineering'),
(27, 'Ajina Jaya', 'ajina_cs@sirmvit.edu', NULL, 9591782068, '2018-01-03 05:14:36', '0000-00-00 00:00:00', 1, 'Faculty', '19274', 'Computer Science and Engineering'),
(40, 'lakshmi', 'lakshmi.smvit@gmail.com', NULL, 9591782068, '2018-01-15 16:50:38', '0000-00-00 00:00:00', 1, 'Student', '1mv00cs043', 'Computer Science and Engineering'),
(41, 'Sapna', 'sapna@gmail.com', NULL, 9591782068, '2018-01-16 17:54:31', '0000-00-00 00:00:00', 1, 'Alumni', '', 'Not Applicable');

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
-- Indexes for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `configure-escalation`
--
ALTER TABLE `configure-escalation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `otp_expiry`
--
ALTER TABLE `otp_expiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
