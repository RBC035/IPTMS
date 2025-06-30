-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2025 at 10:30 AM
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
-- Database: `iptms`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignedSupervisor`
--

CREATE TABLE `assignedSupervisor` (
  `id` int(11) NOT NULL,
  `requestID` int(11) NOT NULL,
  `industrialSupervisor` varchar(50) NOT NULL,
  `academicSupervisor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignedSupervisor`
--

INSERT INTO `assignedSupervisor` (`id`, `requestID`, `industrialSupervisor`, `academicSupervisor`) VALUES
(1, 3, 'JOTHSP897918', 'HEHASP786386'),
(2, 5, 'JOTHSP897918', 'academicSupervisor'),
(3, 4, 'HAMASP346984', 'academicSupervisor');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `position` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `postDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `officeName` varchar(80) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Opening'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `position`, `description`, `amount`, `postDate`, `endDate`, `officeName`, `status`) VALUES
(1, 'LIM student', 'Degree or Diploma students in one of the following fields: Library and records keeping development.', 12, '2024-06-27 19:22:31', '2024-06-28 10:20:25', 'Tanzania railway coparation (TRC)', 'Opening'),
(2, 'Civil engineer Student', 'Degree or Diploma or certificate students in one of the following fields: Civil engineer', 14, '2024-06-27 19:23:48', '2024-07-06 00:00:00', 'Tanzania railway coparation (TRC)', 'Opening'),
(3, 'ICT students', 'Degree or Diploma or certificate students in one of the following fields: Computer Science, Electronic Science, Computer Engineering, Information Technology, Information Systems and Data Science.', 8, '2024-06-27 20:32:41', '2024-06-28 20:10:45', 'Business property and registration agency (BPRA)', 'Opening'),
(4, 'HRM students', 'Description: Degree or Diploma students in one of the following fields: Social studies,Human resources Management', 9, '2024-06-27 20:35:19', '2024-07-20 00:00:00', 'Business property and registration agency (BPRA)', 'Opening');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(11) NOT NULL,
  `assignedID` int(11) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` int(11) NOT NULL,
  `studentID` varchar(45) NOT NULL,
  `postID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `statuss` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `studentID`, `postID`, `startDate`, `endDate`, `statuss`) VALUES
(3, 'JOJEST117394', 1, '2024-07-29', '2024-09-30', 'Accepted'),
(4, 'HIBIST757256', 2, '2024-07-15', '2024-09-02', 'Accepted'),
(5, 'HAJOST628832', 1, '2024-07-01', '2024-09-02', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `regNo` varchar(45) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `instituteName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regNo`, `firstName`, `lastName`, `phoneNumber`, `instituteName`) VALUES
('HAJOST628832', 'hadia', 'jonathan', '+255 786 767 554', 'Institute of Financial management (IFM)'),
('HIBIST757256', 'hija', 'bilali', '+255 786 543 323', 'Sokoine university (SOA)'),
('ISSUST024426', 'issa', 'suleiman', '+255 786 543 320', 'Institute of Financial management (IFM)'),
('JOJEST117394', 'john', 'jems', '255 789 768 436', 'university of dodoma (UDOM)'),
('KHMUST252570', 'khalid', 'mussa', '+255 623 345 123', 'Ardhi university'),
('MIMUST045817', 'mikidadi', 'mussa', '+255 621 546 789', 'Institute of Financial management (IFM)'),
('SAJUST665892', 'Salum', 'jumamnne', '+255 623 112 667', 'Institute Of Financial Management (IFM)'),
('THKHST562446', 'thulaitha', 'khamis', '+255 776 456 322', 'Institute of public administration (IPA)');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `Id` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `date` date NOT NULL,
  `comments` int(11) NOT NULL,
  `supervisorID` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `employeeID` varchar(50) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `officeName` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`employeeID`, `firstName`, `lastName`, `phoneNumber`, `officeName`) VALUES
('ABKHSP135662', 'abeda', 'khalid', '255 769 786 543', 'university of dodoma (UDOM)'),
('ANBASP864233', 'angela', 'bangis', '+255 786 887 521', 'muhimbili university (MOHI)'),
('ANBESP425403', 'andrew', 'beshui', '+255 766 767 004', 'Tanzania railway coparation (TRC)'),
('ANMBSP531361', 'anditya', 'Mbela', '+255 786 767 990', 'Tanzania revenue authority (TRA)'),
('ANSASP466552', 'Anna', 'sambule', '+255 786 776 660', 'Institute of Financial management (IFM)'),
('ENSUSP775001', 'enditya', 'suleiman', '+255 786 543 323', 'Institute of Financial management (IFM)'),
('HAMASP057732', 'haji', 'makame', '+255 778 786 465', 'Zanzibar university (ZU)'),
('HAMASP346984', 'haji', 'machano', '+255 678 567 123', 'Tanzania railway coparation (TRC)'),
('HASUSP263406', 'hashim', 'suleiman', '+255 786 543 323', 'Tanzania revenue authority (TRA)'),
('HASUSP784751', 'hashim', 'suleiman', '+255 786 543 323', 'Business property and registration agency (BPRA)'),
('HEHASP786386', 'herry', 'hasd', '255 786 778 432', 'University Of Dodoma (UDOM)'),
('JESWSP350727', 'jems', 'swath', '+255 786 543 883', 'Institute Of Financial Management (IFM)'),
('JOLUSP772512', 'jonathan', 'lumbingwa', '+255 786 523 776', 'Tanzania revenue authority (TRA)'),
('JOTHSP897918', 'jodan', 'thimth', '+255 621 435 678', 'Tanzania railway coparation (TRC)'),
('KAMOSP671573', 'kassim', 'mohd', '+255 779 980 551', 'Zanzibar utilities regulatory authority (ZURA)'),
('KHMUSP943111', 'khalid', 'mussa', '+255 786 778 445', 'tanzania communications regulatory authority (TCRA)'),
('MAVUSP552620', 'maua', 'vuai', '+255 777 879 765', 'Institute of public administration (IPA)');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `taskID` int(11) NOT NULL,
  `reportID` int(11) NOT NULL,
  `addedDate` date NOT NULL,
  `task` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`username`, `password`, `role`) VALUES
('ABKHSP135662', '$2y$10$i8v8kQljs.OUEUMuYGdyf.jl6Ly4i7Ph.V3FfzZIvrLCGVIrg8aJS', 'Academic Cordinator'),
('Admin', '$2y$10$H6VkCLjzvi5FWHIqt812UuvUQ8/7Dmg413N40sHeYzjLuMgGrEPDq', 'Admin'),
('ANBASP864233', '$2y$10$goULEdxKBwsMCi8.AG.OdOoJaVp/dMt75wLzDRiIJD1T4VBM2hKz2', 'Industrial Supervisor'),
('ANBESP425403', '$2y$10$ALPIm3yb5wF4MZux3/xGmuPKjp9j3QYkUDrxaoqO7k1/r0s6BrnT6', 'Industrial Cordinator'),
('ANMBSP531361', '$2y$10$j8HQoWQpomJzAterW/IYKOLX9ucvctluyBtiTz/IYPlej7.XrCKkW', 'Industrial Cordinator'),
('ANSASP466552', '$2y$10$rjQWPH446Klz3rV23m3IJeGQKIkZWhPbBdNRZYrZC.1SpjpAev6Zy', 'Academic Cordinator'),
('ENSUSP775001', '$2y$10$qOfcMbEJq9BRh5t1NgmVu.WDVImQ18vG6qM0BdjeI7BLu92SRFM2G', 'Academic Supervisor'),
('HAJOST628832', '$2y$10$ttNnH/U8tzTr6DoCljo69.7cN3JN9uGRVlcw4zYw27mlaPeMwrsg2', 'Student'),
('HAMASP057732', '$2y$10$RWPv2ZP3ZLkDgBPjqivRBOYCY.lw1UMzn8nXlB5yhSbebnupOHivW', 'Academic Supervisor'),
('HAMASP346984', '$2y$10$I8vrs/9IlRgFqIYQBDJUQu4LMahu.gG.pOLzL1C/q5LUSnhUQqlHW', 'Industrial Supervisor'),
('HASUSP263406', '$2y$10$Aj6cK1W8ez18UW47bwrameUOfvgAegUzqUfEv9IRQ4/QJGJLhrNeO', 'Industrial Supervisor'),
('HASUSP784751', '$2y$10$s1YZG0tfA2ylmeKIUKuuuO.y33Q..OJpJKLsrm54.bXT7i3feoP1W', 'Industrial Cordinator'),
('HEHASP786386', '$2y$10$vClpRZ8mo6im9T8jrehbMuUS8h369qrpQRO1EaJVh16jgtCIFyqwO', 'Academic Supervisor'),
('HIBIST757256', '$2y$10$fpGrNP8/nqv3gDBaeWinhu.S9Sn1ckEq5jUFW8Vagb1UP3H4yE.ge', 'Student'),
('ISSUST024426', '$2y$10$zyLepj8nJxckPyuxheh1nuNd7BTilpM9ZROFnqQW.CdS.BI1N5r3O', 'Student'),
('JESWSP350727', '$2y$10$/wDapPD7hejmRDO4x8VDLO2yZ/zSaQy5vnUw9cZSjbTfEuLlPZM9q', 'Supervisor'),
('JOJEST117394', '$2y$10$OvtfmTqvA8VU5837Mf/NDuokX0KYqPq9ZNgSZGovAjLVywaAd7SC.', 'Student'),
('JOLUSP772512', '$2y$10$.yufN.pEvvWhFlsncg/9SOjGRjkxzA/D.E4ivJ/G1fEdsyO64h08u', 'Supervisor'),
('JOTHSP897918', '$2y$10$MWSkWkFPSK7eINJT84hMzOrlsCnfi12V1HsLgRJZlgox6dWq5G.wW', 'Industrial Supervisor'),
('KAMOSP671573', '$2y$10$X6hJDS8MF9CKvq9qDVnjyO8HgmqcM.TDB6ClZw2BIxcBln8TqKWPi', 'Supervisor'),
('KHMUSP943111', '$2y$10$DjSiD4gb4oeuZkfsSF0O3O0zIFmJR5SClv.3Rf72SFa80IyHxU8tK', 'Supervisor'),
('KHMUST252570', '$2y$10$QsgfSg8mbgZgDwfZt0.mjeNwg/eUo4r6.GxJy0QoRfznkbVQBZZaq', 'Student'),
('MAVUSP552620', '$2y$10$gjBi1SL2BusG4LJVb.XFaeHu6U4mXx1R4N8kaj0Lps7tsxsmAygUO', 'Academic Cordinator'),
('MIMUST045817', '$2y$10$Zhy7MekBfoOQaawdpMC.ouCqu.6b056u6W0uzVvO9WGRQq4Du1zo.', 'Student'),
('SAJUST665892', '$2y$10$QNdby/Kx0K7v3txbrkVotuvimRsf2PpTrUGYjEUVnBunBueWUOezm', 'Student'),
('THKHST562446', '$2y$10$5ijC1ip6ok289XFh0g54I.PVy9jrRBek.ukUraUUOSd4hTVZO.me6', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignedSupervisor`
--
ALTER TABLE `assignedSupervisor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`regNo`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `reportID` (`reportID`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignedSupervisor`
--
ALTER TABLE `assignedSupervisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `taskID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`regNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`postID`) REFERENCES `post` (`postID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`reportID`) REFERENCES `report` (`reportID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
