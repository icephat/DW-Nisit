-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 08:10 AM
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
-- Database: `dw`
--

-- --------------------------------------------------------

--
-- Table structure for table `fact1-grade`
--

CREATE TABLE `fact1-grade` (
  `studentId` varchar(10) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `gpaAvg` double NOT NULL,
  `gpaPass` double NOT NULL,
  `gpaTotalCredits` int(11) NOT NULL,
  `gpaPassCredit` int(11) NOT NULL,
  `gpaFailCredit` int(11) NOT NULL,
  `gpaxAvg` double NOT NULL,
  `gpaxPass` double NOT NULL,
  `gpaxTotalCredits` int(11) NOT NULL,
  `gpaxPassCredit` int(11) NOT NULL,
  `gpaxFailCredits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact2-grade-summary`
--

CREATE TABLE `fact2-grade-summary` (
  `studentId` varchar(10) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `gpa` double NOT NULL,
  `gpax` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fact3-grade`
--

CREATE TABLE `fact3-grade` (
  `studentId` varchar(10) NOT NULL,
  `semesterId` int(11) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `gradeAlias` varchar(2) NOT NULL,
  `gradeNumber` int(11) NOT NULL,
  `studentYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterId` int(11) NOT NULL,
  `semesterYear` int(11) NOT NULL,
  `semesterPart` int(11) NOT NULL,
  `teachType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` varchar(10) NOT NULL,
  `kuId` int(11) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `accessionNo` int(11) NOT NULL,
  `startYear` int(11) NOT NULL,
  `gender` enum('ชาย','หญิง') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectId` int(11) NOT NULL,
  `subjectGroupId` int(11) NOT NULL,
  `kuSubjectId` varchar(10) NOT NULL,
  `subjectName` int(11) NOT NULL,
  `totalCredits` int(11) NOT NULL,
  `lacCredits` int(11) NOT NULL,
  `labCredits` int(11) NOT NULL,
  `lacHrs` int(11) NOT NULL,
  `labHrs` int(11) NOT NULL,
  `planYear` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjectgroup`
--

CREATE TABLE `subjectgroup` (
  `subjectGroupId` int(11) NOT NULL,
  `groupName` varchar(80) NOT NULL,
  `groupType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fact1-grade`
--
ALTER TABLE `fact1-grade`
  ADD PRIMARY KEY (`studentId`,`semesterId`),
  ADD KEY `semesterId` (`semesterId`);

--
-- Indexes for table `fact2-grade-summary`
--
ALTER TABLE `fact2-grade-summary`
  ADD PRIMARY KEY (`studentId`,`semesterId`,`groupId`),
  ADD KEY `semesterId` (`semesterId`);

--
-- Indexes for table `fact3-grade`
--
ALTER TABLE `fact3-grade`
  ADD PRIMARY KEY (`studentId`,`semesterId`,`subjectId`),
  ADD KEY `subjectId` (`subjectId`),
  ADD KEY `semesterId` (`semesterId`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectId`),
  ADD KEY `groupId` (`subjectGroupId`);

--
-- Indexes for table `subjectgroup`
--
ALTER TABLE `subjectgroup`
  ADD PRIMARY KEY (`subjectGroupId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjectgroup`
--
ALTER TABLE `subjectgroup`
  MODIFY `subjectGroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fact1-grade`
--
ALTER TABLE `fact1-grade`
  ADD CONSTRAINT `fact1-grade_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact1-grade_ibfk_2` FOREIGN KEY (`semesterId`) REFERENCES `semester` (`semesterId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fact2-grade-summary`
--
ALTER TABLE `fact2-grade-summary`
  ADD CONSTRAINT `fact2-grade-summary_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact2-grade-summary_ibfk_2` FOREIGN KEY (`semesterId`) REFERENCES `semester` (`semesterId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fact3-grade`
--
ALTER TABLE `fact3-grade`
  ADD CONSTRAINT `fact3-grade_ibfk_1` FOREIGN KEY (`studentId`) REFERENCES `student` (`studentId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact3-grade_ibfk_2` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`subjectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fact3-grade_ibfk_3` FOREIGN KEY (`semesterId`) REFERENCES `semester` (`semesterId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`subjectGroupId`) REFERENCES `subjectgroup` (`subjectGroupId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
