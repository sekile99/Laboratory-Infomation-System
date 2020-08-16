-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2020 at 11:29 AM
-- Server version: 10.3.22-MariaDB-1ubuntu1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_mng_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_departments`
--

CREATE TABLE `lab_departments` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_documents`
--

CREATE TABLE `lab_documents` (
  `docId` int(11) NOT NULL,
  `uploaderId` int(100) NOT NULL,
  `title` varchar(255) NOT NULL COMMENT 'Document Name',
  `module` varchar(255) NOT NULL COMMENT 'Document Type',
  `program` varchar(255) NOT NULL COMMENT 'Subject',
  `docUrl` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `semester` tinyint(4) NOT NULL DEFAULT 1,
  `ac_year` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'date uploaded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_documents`
--

INSERT INTO `lab_documents` (`docId`, `uploaderId`, `title`, `module`, `program`, `docUrl`, `venue`, `class`, `semester`, `ac_year`, `date`) VALUES
(10, 1, 'Assignment Dc Network', 'Fundamentals Of Dc Networks', 'Computer Engineering', 'assets/uploads/documents/Sekile Project5f0d485699497.docx', 'T3', 'Coe2', 2, '2019/2020', '2020-07-18 11:00:00'),
(11, 1, 'Notes Web Development', 'Website Development', 'Computer Engineering', 'assets/uploads/documents/Taarifa kwa Wananchi wa Mkoa wa DSM5f0d48ec8daa2.pdf', 'Tt10', 'Coe1', 1, '2019/2020', '2020-07-01 18:00:00'),
(12, 10, 'Computer Programming Assignment', 'Programming', 'Computer Engineering', 'assets/uploads/documents/Sekile Project5f0e8dad8c300.docx', 'D3', 'Coe1 & Coe2', 2, '2019/2020', '2020-07-17 10:00:00'),
(13, 2, 'Laboratory Instruments Guide', 'All', 'All', 'assets/uploads/documents/Sekile Project5f0e8e93144c7.docx', 'Labs', 'All', 2, '2019/2020', '2020-07-31 13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lab_elearning_submissions`
--

CREATE TABLE `lab_elearning_submissions` (
  `subId` int(11) NOT NULL,
  `studentId` int(13) NOT NULL,
  `materialId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `objectives` varchar(255) NOT NULL,
  `results` varchar(255) NOT NULL,
  `submission` varchar(255) NOT NULL,
  `docUrl` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_elearning_submissions`
--

INSERT INTO `lab_elearning_submissions` (`subId`, `studentId`, `materialId`, `title`, `objectives`, `results`, `submission`, `docUrl`, `date`) VALUES
(2, 3, 12, 'Programming Assignment', 'Write The Code For The Given Problem', 'Code Works Well Withough Errors', 'David Sekile', 'assets/uploads/documents/Sekile Project5f0e900c5a7b7.docx', '2020-07-15 08:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `lab_experiments`
--

CREATE TABLE `lab_experiments` (
  `experimentId` int(11) NOT NULL,
  `experimentName` varchar(255) NOT NULL COMMENT 'name of the experiment',
  `labName` varchar(255) NOT NULL COMMENT 'laboratory name',
  `tools` text NOT NULL COMMENT 'Tools involved in the experiment',
  `items` text NOT NULL COMMENT 'chemicals & items needed for the expriment',
  `hazards` text NOT NULL COMMENT 'experiment hazards',
  `ppe` text NOT NULL COMMENT 'personal protective equipments',
  `createdBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_experiments`
--

INSERT INTO `lab_experiments` (`experimentId`, `experimentName`, `labName`, `tools`, `items`, `hazards`, `ppe`, `createdBy`) VALUES
(1, 'Food Test', 'Biology', 'Bunsen Burner\r\nConical Flask', 'Benzene\r\nAcids', 'Fire\r\nToxic Fumes', 'Eye Goggles \r\nLab Coat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lab_inventory`
--

CREATE TABLE `lab_inventory` (
  `inventoryId` int(11) NOT NULL,
  `inventoryName` varchar(255) NOT NULL COMMENT 'Apparatus Name',
  `inventoryType` varchar(255) NOT NULL COMMENT 'Apparatus Type Glass, Tube, Instrument etc',
  `barcode` varchar(255) NOT NULL COMMENT 'Barcode Number for the Invetory',
  `inventorySize` varchar(255) NOT NULL COMMENT 'volume, size or mass',
  `inventoryStatus` varchar(100) NOT NULL COMMENT 'free, in use, Broken, fixed',
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_inventory`
--

INSERT INTO `lab_inventory` (`inventoryId`, `inventoryName`, `inventoryType`, `barcode`, `inventorySize`, `inventoryStatus`, `count`) VALUES
(1, 'Garth Gordon', 'Glass', 'BDSD565DS', '50 Ml', 'Available', 10),
(2, 'Conical Flask', 'Glass', 'IOSD56DSS', '3m', 'Inuse', 50),
(4, 'Callipers', 'Measuring Instrument', 'DSDSFKLDS', 'Medium', 'Available', 64);

-- --------------------------------------------------------

--
-- Table structure for table `lab_last_login`
--

CREATE TABLE `lab_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` int(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_last_login`
--

INSERT INTO `lab_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-22 10:40:29'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '127.0.0.1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-29 19:22:49'),
(3, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 17:11:51'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Lab Technitian\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 18:26:46'),
(5, 2, '{\"role\":\"2\",\"roleText\":\"Manager\",\"name\":\"Hamza\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 18:31:17'),
(6, 3, '{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Lucas\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 18:31:34'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Lab Technitian\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 18:31:52'),
(8, 3, '{\"role\":\"3\",\"roleText\":\"Student\",\"name\":\"Lucas\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 18:55:31'),
(9, 2, '{\"role\":\"2\",\"roleText\":\"Lecturer\",\"name\":\"Hamza\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 18:59:34'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 19:00:03'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-30 22:16:03'),
(12, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-31 08:19:47'),
(13, 3, '{\"role\":\"3\",\"roleText\":\"Student\",\"name\":\"Lucas\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-31 11:04:43'),
(14, 2, '{\"role\":\"2\",\"roleText\":\"Lecturer\",\"name\":\"Hamza\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-31 11:06:13'),
(15, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-31 11:22:56'),
(16, 9, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"Kidegesho\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-05-31 11:30:05'),
(17, 3, '{\"role\":\"3\",\"roleText\":\"Student\",\"name\":\"Lucas\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-06-04 13:52:01'),
(18, 2, '{\"role\":\"2\",\"roleText\":\"Lecturer\",\"name\":\"Hamza\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-06-04 13:52:45'),
(19, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.61', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'Linux', '2020-06-04 13:54:46'),
(20, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 08:53:55'),
(21, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 20:10:53'),
(22, 3, '{\"role\":\"3\",\"roleText\":\"Student\",\"name\":\"Lucas\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 20:17:18'),
(23, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Hamza\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 20:26:17'),
(24, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 20:39:39'),
(25, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Keeper\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 20:42:02'),
(26, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 21:23:54'),
(27, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '::1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-18 21:28:04'),
(28, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-19 07:08:25'),
(29, 3, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-19 07:48:01'),
(30, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-19 07:51:04'),
(31, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-19 09:12:26'),
(32, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.97', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.97 Safari/537.36', 'Linux', '2020-06-19 11:54:29'),
(33, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-24 17:34:04'),
(34, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-24 22:08:19'),
(35, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-25 08:57:33'),
(36, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-25 19:16:18'),
(37, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-25 21:20:20'),
(38, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-26 01:13:55'),
(39, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-28 10:00:44'),
(40, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-28 19:24:18'),
(41, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-28 22:33:29'),
(42, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-06-29 10:06:19'),
(43, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-05 14:11:04'),
(44, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-05 18:39:53'),
(45, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-06 10:24:07'),
(46, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-07 20:29:42'),
(47, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-07 20:30:17'),
(48, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-08 06:21:43'),
(49, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-08 06:23:05'),
(50, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Keeper\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-08 06:27:21'),
(51, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Keeper\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-08 06:30:13'),
(52, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-08 06:30:42'),
(53, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-08 10:49:57'),
(54, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-08 11:24:44'),
(55, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-12 23:24:10'),
(56, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-13 03:51:54'),
(57, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Keeper\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-13 03:52:28'),
(58, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-13 03:52:51'),
(59, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-13 06:11:27'),
(60, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-13 06:41:08'),
(61, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-13 06:49:08'),
(62, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-14 06:08:52'),
(63, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-14 07:46:11'),
(64, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-14 09:25:31'),
(65, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-14 09:51:54'),
(66, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 07:45:19'),
(67, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 07:51:43'),
(68, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 07:58:40'),
(69, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 07:59:02'),
(70, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Keeper\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:02:21'),
(71, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:06:59'),
(72, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:12:05'),
(73, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:23:06'),
(74, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Store Man\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:36:12'),
(75, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:37:31'),
(76, 10, '{\"role\":\"3\",\"roleText\":\"teacher\",\"name\":\"Hamza\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:37:45'),
(77, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:50:06'),
(78, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Store Man\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:51:08'),
(79, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-15 08:51:26'),
(80, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-17 10:11:11'),
(81, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-17 10:48:30'),
(82, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-17 10:53:28'),
(83, 2, '{\"role\":\"2\",\"roleText\":\"manager\",\"name\":\"Store Man\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-17 11:34:59'),
(84, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 83.0.4103.116', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36', 'Linux', '2020-07-20 11:03:25'),
(85, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-02 18:47:03'),
(86, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Mobile Safari/537.36', 'Android', '2020-08-02 21:57:13'),
(87, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-03 07:45:28'),
(88, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-03 11:34:26'),
(89, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-03 17:04:08'),
(90, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-05 22:16:09'),
(91, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-06 09:27:39'),
(92, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-07 08:10:56'),
(93, 3, '{\"role\":\"4\",\"roleText\":\"student\",\"name\":\"Lucas\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-07 09:13:32'),
(94, 1, '{\"role\":\"1\",\"roleText\":\"admin\",\"name\":\"David Sekile\"}', '127.0.0.1', 'Chrome 84.0.4147.105', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.105 Safari/537.36', 'Linux', '2020-08-07 09:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `lab_links`
--

CREATE TABLE `lab_links` (
  `linkId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab_links`
--

INSERT INTO `lab_links` (`linkId`, `title`, `url`, `addedBy`, `date`) VALUES
(1, 'The Maths Book', 'Http://sprott.physics.wisc.edu/pickover/math-book.html', 1, '2020-08-07 09:01:57'),
(2, 'Some Funny', 'Https://www.newywaxose.biz', 1, '2020-08-07 09:02:13'),
(3, 'Another Link', 'Https://www.jafyqyrebuti.us', 1, '2020-08-07 09:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `lab_roles`
--

CREATE TABLE `lab_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_roles`
--

INSERT INTO `lab_roles` (`roleId`, `role`) VALUES
(1, 'admin'),
(2, 'manager'),
(3, 'teacher'),
(4, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `lab_users`
--

CREATE TABLE `lab_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `departement` int(11) NOT NULL,
  `specialization` varchar(32) NOT NULL,
  `classname` varchar(32) NOT NULL,
  `year` varchar(10) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_users`
--

INSERT INTO `lab_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `departement`, `specialization`, `classname`, `year`, `stream`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@lms.com', '$2y$10$0AKJ9za7JrwTRAKu8O1TsO/VI4YU3iIp5Kxhs6CbuE17eYnDLMODO', 'David Sekile', '0623458919', 1, 0, '', '', '', '', 0, 1, '2015-07-01 18:56:49', 1, '2020-05-30 18:32:10'),
(2, 'store@lms.com', '$2y$10$bZtXQfSexeeR9hOfwNDrxuIPFbTVtwyS4td3Wgn8bbIDqayV5zgjC', 'Store Man', '0623458919', 2, 0, '', '', '', '', 0, 1, '2016-12-09 17:49:56', 2, '2020-07-15 08:05:50'),
(3, 'student@lms.com', '$2y$10$dg1Xmqv5/OPUPUUQqw/c2efnx35gRlxSr5SZ7pX7sCyBqlI7Z8f0.', 'Lucas', '0623458919', 4, 0, '', '', '', '', 0, 1, '2016-12-09 17:50:22', 1, '2020-05-30 18:30:55'),
(9, 'kide@lms.com', '$2y$10$Mj17FHARcFGIJ79.SgZqqekXsvnzcFJPiaZCvl8gWytgaA9aZrPo.', 'Abdulladhim Kidegesho', '0765644206', 1, 0, '', '', '', '', 1, 1, '2020-05-31 11:24:41', 1, '2020-06-18 20:41:08'),
(10, 'teacher@lms.com', '$2y$10$0gXpajNnHUTvjmcDJgVw/.MwQR8swbLxdmYGdA5Jefwfh9w36qzDm', 'Hamza Hamza', '0623458919', 3, 0, '', '', '', '', 0, 1, '2020-06-18 20:40:59', 1, '2020-07-17 10:21:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to` (`to`),
  ADD KEY `from` (`from`);

--
-- Indexes for table `lab_departments`
--
ALTER TABLE `lab_departments`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `lab_documents`
--
ALTER TABLE `lab_documents`
  ADD PRIMARY KEY (`docId`),
  ADD KEY `uploaderId` (`uploaderId`);

--
-- Indexes for table `lab_elearning_submissions`
--
ALTER TABLE `lab_elearning_submissions`
  ADD PRIMARY KEY (`subId`),
  ADD KEY `studentId` (`studentId`),
  ADD KEY `materialId` (`materialId`);

--
-- Indexes for table `lab_experiments`
--
ALTER TABLE `lab_experiments`
  ADD PRIMARY KEY (`experimentId`),
  ADD KEY `exCreateatedBy` (`createdBy`);

--
-- Indexes for table `lab_inventory`
--
ALTER TABLE `lab_inventory`
  ADD PRIMARY KEY (`inventoryId`);

--
-- Indexes for table `lab_last_login`
--
ALTER TABLE `lab_last_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `lab_links`
--
ALTER TABLE `lab_links`
  ADD PRIMARY KEY (`linkId`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `lab_roles`
--
ALTER TABLE `lab_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `lab_users`
--
ALTER TABLE `lab_users`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `roleId` (`roleId`),
  ADD KEY `departement` (`departement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_departments`
--
ALTER TABLE `lab_departments`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_documents`
--
ALTER TABLE `lab_documents`
  MODIFY `docId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `lab_elearning_submissions`
--
ALTER TABLE `lab_elearning_submissions`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_experiments`
--
ALTER TABLE `lab_experiments`
  MODIFY `experimentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_inventory`
--
ALTER TABLE `lab_inventory`
  MODIFY `inventoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lab_last_login`
--
ALTER TABLE `lab_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `lab_links`
--
ALTER TABLE `lab_links`
  MODIFY `linkId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lab_roles`
--
ALTER TABLE `lab_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lab_users`
--
ALTER TABLE `lab_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lab_documents`
--
ALTER TABLE `lab_documents`
  ADD CONSTRAINT `uploaderID` FOREIGN KEY (`uploaderId`) REFERENCES `lab_users` (`userId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lab_elearning_submissions`
--
ALTER TABLE `lab_elearning_submissions`
  ADD CONSTRAINT `materialId` FOREIGN KEY (`materialId`) REFERENCES `lab_documents` (`docId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `studentId` FOREIGN KEY (`studentId`) REFERENCES `lab_users` (`userId`) ON UPDATE CASCADE;

--
-- Constraints for table `lab_experiments`
--
ALTER TABLE `lab_experiments`
  ADD CONSTRAINT `exCreateatedBy` FOREIGN KEY (`createdBy`) REFERENCES `lab_users` (`userId`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lab_last_login`
--
ALTER TABLE `lab_last_login`
  ADD CONSTRAINT `userID` FOREIGN KEY (`userId`) REFERENCES `lab_users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lab_links`
--
ALTER TABLE `lab_links`
  ADD CONSTRAINT `linkadder` FOREIGN KEY (`addedBy`) REFERENCES `lab_users` (`userId`) ON UPDATE CASCADE;

--
-- Constraints for table `lab_users`
--
ALTER TABLE `lab_users`
  ADD CONSTRAINT `roleID` FOREIGN KEY (`roleId`) REFERENCES `lab_roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
