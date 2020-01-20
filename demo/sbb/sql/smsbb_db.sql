-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2019 at 11:17 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smsbb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(128) NOT NULL,
  `department` int(11) NOT NULL,
  `username` varchar(36) NOT NULL,
  `addon_mainslide` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title`, `description`, `image_name`, `department`, `username`, `addon_mainslide`, `active`, `created_at`) VALUES
(4, 'Picture 1', '#asdasdas', 'Picture1.jpg', 2, 'admin2', 1, 1, '2019-01-16 21:39:39'),
(5, 'Picture 2', '#asdafssds', 'Picture2.jpg', 2, 'admin2', 1, 0, '2019-01-18 17:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middleinitial` varchar(3) DEFAULT NULL,
  `lastname` varchar(30) NOT NULL,
  `position` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `profile_pic` varchar(128) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_id` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `firstname`, `middleinitial`, `lastname`, `position`, `course`, `contact_no`, `profile_pic`, `date_registered`, `student_id`) VALUES
(3, 'admin2', 'admin2@gmail.com', '$2y$10$ELAnLYId9cEL83Q/RNQoV.SVDTSbhJShHBLc1ZQUonx0hfBpe8Xv6', 'Nick Jay', 'S.', 'Baguio', 'admin', '3', '09126675199', 'HTB1cbpkbWSWBuNjSsrbq6y0mVXaL.jpg', '2018-10-01 12:46:09', NULL),
(4, 'luther2999', '', '$2y$10$M6AmnTI0qp5siKpEv1J82emvl2PVK1VM.pdXFDC0WpQ4ik3f1gmE6', 'King James', 'R', 'Luther', 'president', '2', '091578954', 'avatar.png', '2019-01-19 04:13:03', 'A3423131'),
(6, 'isabel07', '', '$2y$10$1.H59JuxCSuElPYELTbNpeWTuJBnKsVrvx7dGLf2t1z.eBZBIhrAC', 'Isabel', 'R', 'Flores', 'president', '2', '08994568745', '9343566230_1326983186_400x4004.jpg', '2019-01-26 13:19:36', 'AT232412');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `userid` int(9) NOT NULL,
  `headline` varchar(30) NOT NULL,
  `message` varchar(250) NOT NULL,
  `department` varchar(50) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `userid`, `headline`, `message`, `department`, `date_posted`, `visible`) VALUES
(45, 2, 'Welcome to JHCerilles College', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure d', '1', '2018-10-20 17:26:53', 1),
(46, 2, 'Online Bulletin Updates', '2 Features Updated!', '1', '2018-10-20 17:30:29', 1),
(47, 2, 'Online Bulletin Updates', '5 Features Added!', '1', '2018-10-20 17:33:17', 0),
(48, 2, 'Online Bulletin Updates', 'More features has been added.', '1', '2018-10-20 17:35:32', 0),
(49, 2, 'Online Bulletin Updates', '1 Feature Added!', '1', '2018-10-21 15:19:21', 1),
(50, 2, 'Online Bulletin Updates', '2 Updates Added!', '5', '2018-10-21 19:17:29', 1),
(51, 3, 'Online Bulletin Updates', 'test', '1', '2018-11-18 15:50:04', 1),
(52, 3, 'Earth News', 'adadada', '2', '2018-11-18 15:51:22', 0),
(53, 3, 'Headline Test 1', 'Message Test 1', '1', '2019-01-18 17:45:12', 1),
(54, 3, 'Headline Test 2', 'Message Test 2', '1', '2019-01-18 17:45:43', 1),
(59, 3, 'Headline Test 4', 'Message Test 4', '2', '2019-01-18 18:13:02', 1),
(60, 3, 'Headline Test 5', 'Message Test 5', '1', '2019-01-18 19:18:25', 1),
(61, 3, 'Headline Test 6', 'Message Test 6', '5', '2019-01-18 19:18:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('7phbnajg7okqgiffusocgrbe1ekk4oav', '127.0.0.1', 1548487374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383438373337343b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('ha9tbepneijgr6s0hcmsif14vm13ho1v', '127.0.0.1', 1548492553, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439323535333b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('uqifc3567qetr2g206qis7p3slh844c4', '127.0.0.1', 1548492960, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439323936303b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('kcta8cq4uve72mmbroervv9l5onk07gv', '127.0.0.1', 1548493280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439333238303b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('f5j3tuuj122r6k4evot5dnsjrljsk1kj', '127.0.0.1', 1548493610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439333631303b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('vq694hrldvrkvuifk3vkpemgogbqkg8j', '127.0.0.1', 1548493943, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439333934333b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('5tg43bbhffh0kt9aoo688avaf49k9056', '127.0.0.1', 1548494262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439343236323b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('aqvtkamk2jteas6di8sk0tq85rblbubm', '127.0.0.1', 1548494612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439343631323b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('t1459gui4u8gfdpnjdjf90sjcmsh418t', '127.0.0.1', 1548494956, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439343935363b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('al9i34ps2m58t15ibb5lh03aaak9d712', '127.0.0.1', 1548495388, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439353338383b757365726e616d657c733a363a226a617964616e223b726f6c657c733a373a2273747564656e74223b6c6f676765645f696e7c623a313b),
('ae2fsfpl3je5mfc7d05av609peba0eg9', '127.0.0.1', 1548496090, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439363039303b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('qrgemmn7tb7fea1s3ibk4tlkpd6c311e', '127.0.0.1', 1548496433, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439363433333b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('knolnu92uqh1iet45fmi4m1m1tildjt7', '127.0.0.1', 1548496935, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439363933353b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('2p3o7pbqvgj0je69tkf54a75qtaht0l7', '127.0.0.1', 1548497322, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439373332323b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('dd2c1s5ceqb8polt9gmammsr4mtmb5fh', '127.0.0.1', 1548497452, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383439373332323b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('rq0h4nd6upcpun7p5d5rms5clh5d1qlc', '127.0.0.1', 1548508105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383530383130353b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('9727pln147ps1tnlv5fhveab6nq5l8qg', '127.0.0.1', 1548508438, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383530383433383b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('l598b08o7crp7km35lror935ujvg2gr8', '127.0.0.1', 1548508778, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383530383737383b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('l063htcv7nedr7c48213pp2glufp83k7', '127.0.0.1', 1548509101, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383530393130313b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('kn72jgambtc656v5tm5eqv6q88c5bs0b', '127.0.0.1', 1548510578, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531303537383b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('v0ntj2aln64k13i4hh7nk5hjn5m4klim', '127.0.0.1', 1548511023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531313032333b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('u3ut9udsq5fdsah2rctrn861s4037d2s', '127.0.0.1', 1548511401, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531313430313b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('mkbqa5a48logtfh39h9b9ptv9cp8sjb3', '127.0.0.1', 1548512050, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531323035303b),
('2lvqeus30dl4hem7m7no66kpe793qrni', '127.0.0.1', 1548512605, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531323630353b),
('13h9h277fo1vgagvbvka16m6ockb3o2a', '127.0.0.1', 1548512945, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531323934353b),
('t5a9atujuob24aqbue1o8npfb4mdnr2f', '127.0.0.1', 1548513234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383531323934353b7573657269647c733a313a2233223b757365726e616d657c733a363a2261646d696e32223b726f6c657c733a353a2261646d696e223b706f736974696f6e7c733a353a2261646d696e223b6c6f676765645f696e7c623a313b),
('gqqoe8i5v91ludgcq56ubcostbcceiqh', '127.0.0.1', 1548534445, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383533343434333b),
('ccrus6lb60pv8icv9qfatfv3mabi1rnk', '127.0.0.1', 1548534470, 0x5f5f63695f6c6173745f726567656e65726174657c693a313534383533343436333b);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` tinyint(3) NOT NULL,
  `department` int(9) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `department`, `name`) VALUES
(1, 5, 'BSCS'),
(2, 4, 'BEED'),
(3, 3, 'BSCRIM');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'All'),
(2, 'Agriculture'),
(3, 'Criminology'),
(4, 'Education'),
(5, 'Information & Technology');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(512) NOT NULL,
  `department` int(11) NOT NULL,
  `postedby` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_time_start` time NOT NULL,
  `event_time_end` time NOT NULL,
  `location` varchar(64) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `department`, `postedby`, `event_date`, `event_time_start`, `event_time_end`, `location`, `date_created`) VALUES
(2, 'Title Test 1', 'Description Test 1', 1, 3, '2019-01-18', '03:00:00', '05:00:00', 'Malangas', '2019-01-17 22:50:05'),
(3, 'TITLE TEST 2', 'Description Test 2', 1, 3, '2019-01-18', '05:02:00', '19:34:00', 'Malangas', '2019-01-17 23:08:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_student_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(8) NOT NULL,
  `header` varchar(256) NOT NULL,
  `body` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `header`, `body`, `date_created`) VALUES
(2, 'VISION', 'JHCSC as the leader institutional in the development of competent and skilled professionals that promotes quality life of the people in Zamboanga del Sur and in the Region. \r\n', '2019-01-22 14:40:43'),
(3, 'MISSION', 'Pursuant to her vision, the College commits to:\r\n- Provides higher professional, technical, and updated instructions in various disciplines;\r\n\r\n- Undertake research, extension services, production program, advanced studies, and progressive leadership in teacher education, agriculture, fisheries, forestry, engineering, arts, social sciences, industrial technology, health, and other fields relevant to the changing needs of the community; and\r\n\r\n- Inculcate socio-cultural, political, moral and spiritual values.\r\n', '2019-01-22 14:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `sms_history`
--

CREATE TABLE `sms_history` (
  `id` int(11) NOT NULL,
  `reciever` varchar(12) NOT NULL,
  `text` varchar(500) NOT NULL,
  `operator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_history`
--

INSERT INTO `sms_history` (`id`, `reciever`, `text`, `operator`) VALUES
(1, '09126675199', '', 'admin2'),
(2, '09126675199', 'Gwapo si Nick Jay! haha', 'admin2'),
(3, '09126675199', 'test', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(191) NOT NULL,
  `username` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `middleinitial` varchar(191) DEFAULT NULL,
  `lastname` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contact_no` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `username`, `email`, `password`, `firstname`, `middleinitial`, `lastname`, `course`, `position`, `contact_no`, `remember_token`, `profile_pic`, `created_at`, `updated_at`) VALUES
(2, '0055456', 'admin', '', '$2y$10$0vLVuh1h5YVbs0UOxTCgf.RlefZfwHoOf17jASpD9lH2tOz.U7cvK', 'Nick Jay', 'S', 'Baguio', '3', 'president', '09126675199', NULL, '', '2018-10-01 04:05:12', '2019-01-19 03:34:32'),
(7, '24252552', 'jaydan', NULL, '$2y$10$tZlyYFJIFx1T9qWTsGW77eydewLztCNb46xrwDMIdhXXxM.BXBn4W', 'Jaydan', 'S', 'Kaya', '1', '', '09126675199', NULL, 'WhatsApp_Image_2018-10-06_at_11_46_13_AM2.jpeg', '2018-10-22 10:59:43', '2019-01-26 09:38:37'),
(9, 'AD034532', 'johndoe2019', NULL, '$2y$10$UgFgHvYj/guK.7x7TR9Hset96nBF1oM4O3gSpKMsyqNFJ7L5eQ2oq', 'John', 'L', 'Doe', '1', '', '0966542154', NULL, '', '2019-01-18 14:01:06', NULL),
(10, '1232114213', 'janetan2019', NULL, '$2y$10$.ycKFYkUDk30WUBcpRiupePls2sQP.IrcmnYkhRK0BdE.totkVn06', 'Jane', 'R', 'Tan', '1', '', '0982374223', NULL, '', '2019-01-18 14:05:58', NULL),
(12, 'A1-204-2019', 'floody2019', NULL, '$2y$10$U.GtEuaSASDHz1ifUQAH2.ysnGCI4k67mRnH1Vy8jkX4QV5Zcckqu', 'Jane', 'O', 'Baha', '2', 'president', '0945687512', NULL, '', '2019-01-19 03:41:47', NULL),
(13, '242525526', 'jane2019', NULL, '$2y$10$dlNSlet1jsUeJOIY6OswxOdCwROovNZp9SxR232fDDkoBSobcqh26', 'Jane', 'N', 'Balaod', '1', 'student', '0912654785', NULL, '4672295474_1663395390_400x400.jpg', '2019-01-19 03:54:10', '2019-01-26 13:57:13'),
(14, 'JH-ADS-2019', 'hisam', NULL, '$2y$10$IR52ejzXPf9WTqIGAOx63O7pglL/muuqfBI81zAJOsWhFBHnmdWny', 'Hisam', 'L', 'Sultan', '1', 'student', '091569548', NULL, 'WhatsApp_Image_2018-10-06_at_11_46_13_AM3.jpeg', '2019-01-24 23:43:35', '2019-01-26 10:10:26'),
(16, 'JH-STE-2019', 'maryqueen', NULL, '$2y$10$9KbUnKVhasaPD7jd1p642O2dSYO7k9eYh4s9s.76tjCFd2nApdTp6', 'Mary Queen', 'K', 'Balote', '1', 'student', '092566478', NULL, NULL, '2019-01-24 23:53:11', NULL),
(20, 'JH-2000', 'jeson', NULL, '$2y$10$lSYv9HCKDU0W35f2OK86wesvQiya2zysrvx1IESWrznVdRwliNwma', 'Jeson', 'A', 'Ebio', '1', 'student', '0915478985', NULL, 'WhatsApp_Image_2018-10-06_at_11_46_13_AM1.jpeg', '2019-01-25 00:00:17', NULL),
(21, 'JH-234-232', 'johnmark', NULL, '$2y$10$.2SueWB//QDyEUJ/bGUOCOZeA5eM3D4vD.2SkEz6nYvpnCN6VMOLO', 'John Mark', 'U', 'Dacio', '1', 'student', '09154788541', NULL, 'avatar.png', '2019-01-25 00:03:00', NULL),
(22, 'SDTE3423', 'mhariz2019', NULL, '$2y$10$9VDwqupSXVQ7aMDCcGNReOI/SdQQiFs6EDfPf7AN5qyz12gI0X9EO', 'Mhariz', 'C', 'Bancoro', '1', 'student', '09451235418', NULL, '9008253167_269236674_400x4002.jpg', '2019-01-26 14:04:09', '2019-01-26 14:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_history`
--
ALTER TABLE `sms_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_history`
--
ALTER TABLE `sms_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
