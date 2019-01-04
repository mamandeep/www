-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 03, 2019 at 10:40 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exmstureg`
--
CREATE DATABASE IF NOT EXISTS `exmstureg` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `exmstureg`;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `year`, `created_at`, `modified_at`, `user_id`) VALUES
(1, 'Batch01', 2018, '2018-07-02 09:43:30', '2018-07-02 09:43:30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `maximum_marks` int(11) NOT NULL,
  `countable` varchar(10) NOT NULL DEFAULT 'No',
  `interdisciplinary` varchar(10) NOT NULL DEFAULT 'No',
  `type` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `programme_id`, `name`, `course_code`, `credits`, `maximum_marks`, `countable`, `interdisciplinary`, `type`, `created_at`, `modified_at`, `user_id`) VALUES
(2, 2, 'Material Sciences', 'PHY.503', 3, 100, 'No', 'No', 'Seminar', '2018-04-30 07:29:31', '2018-04-30 07:29:31', NULL),
(3, 3, 'Computer Applications', 'CST.501', 4, 100, 'Yes', 'No', 'Theory', '2018-05-03 16:22:42', '2018-05-03 16:22:42', NULL),
(4, 3, 'Data Structures', 'CST.502', 2, 100, 'Yes', 'No', 'Theory', '2018-05-03 16:23:33', '2018-05-03 16:23:33', NULL),
(5, 3, 'Programming Basics', 'CST.621', 4, 100, 'Yes', 'No', 'Theory', '2018-05-03 16:24:39', '2018-05-03 16:24:39', NULL),
(9, 2, 'New Course 2', 'MAT.507', 3, 100, 'Yes', 'No', 'Lab', '2018-12-05 06:10:07', '2018-12-05 06:10:07', NULL),
(10, 1, 'Course 1', 'PLT.307', 4, 100, 'No', 'Yes', 'Theory', '2018-12-07 05:16:08', '2018-12-07 05:16:08', NULL),
(12, 1, 'Course 3', 'PLT.509', 6, 100, 'Yes', 'No', 'Seminar', '2018-12-07 08:03:11', '2018-12-07 08:03:11', NULL),
(14, 6, 'Course 1', 'PUR.788', 6, 100, 'Yes', 'No', 'Theory', '2018-12-07 12:27:44', '2018-12-07 12:27:44', NULL),
(15, 6, 'Course 2', 'NHU.788', 4, 100, 'Yes', 'No', 'Lab', '2018-12-07 12:27:44', '2018-12-07 12:27:44', NULL),
(16, 6, 'Course 3', 'TYU.456', 4, 100, 'Yes', 'Yes', 'Seminar', '2018-12-07 12:27:45', '2018-12-07 12:27:45', NULL),
(17, 6, 'Course 4', 'UIO.467', 4, 100, 'Yes', 'No', 'Theory', '2018-12-07 12:27:45', '2018-12-07 12:27:45', NULL),
(39, 6, 'Course 6', 'UIU.777', 8, 100, 'No', 'No', 'Lab', '2018-12-13 12:14:12', '2018-12-13 12:14:12', NULL),
(40, 6, 'Course 7', 'UIU.898', 8, 100, 'Yes', 'No', 'Theory', '2018-12-13 12:15:39', '2018-12-13 12:15:39', NULL),
(41, 6, 'Course 8', 'YUY.787', 4, 100, 'Yes', 'No', 'Theory', '2018-12-14 05:11:22', '2018-12-14 05:11:22', NULL),
(42, 2, 'Course 1', 'FOO.111', 6, 100, 'Yes', 'No', 'Seminar', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(43, 2, 'Course 2', 'FOO.222', 4, 100, 'No', 'No', 'Lab', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(44, 2, 'Course 3', 'FOO.333', 4, 100, 'Yes', 'No', 'Theory', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(45, 2, 'Course 4', 'FOO.444', 4, 100, 'Yes', 'No', 'Theory', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(46, 3, 'Course 1', 'MBA.111', 4, 100, 'Yes', 'No', 'Theory', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(47, 3, 'Course 2', 'MBA.222', 4, 100, 'Yes', 'No', 'Theory', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(48, 3, 'Course 3', 'MBA.444', 8, 100, 'No', 'No', 'Lab', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(49, 3, 'Course 4', 'MBA.555', 10, 100, 'Yes', 'No', 'Theory', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(50, 3, 'Course 5', 'MBA.221', 10, 100, 'Yes', 'No', 'Theory', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(51, 31, 'Course LLM 1', 'LLM.200', 4, 100, 'Yes', 'No', 'Theory', '2018-12-19 10:47:38', '2018-12-19 10:47:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses_offered`
--

CREATE TABLE `courses_offered` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL DEFAULT '0',
  `course_id` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT '0',
  `course_coordinator` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_offered`
--

INSERT INTO `courses_offered` (`id`, `programme_id`, `course_id`, `semester`, `course_coordinator`, `created_at`, `modified_at`, `user_id`) VALUES
(1, 1, 10, 2, 'Dr. Amandeep Singh', '2018-04-30 07:19:04', '2018-05-02 13:42:16', 0),
(3, 4, NULL, 2, 'Dr. Amandeep Singh', '2018-05-03 16:26:13', '2018-05-03 16:26:13', 0),
(4, 4, NULL, 2, 'Er. Satwinder Singh', '2018-05-03 16:26:59', '2018-05-03 16:26:59', 0),
(5, 5, NULL, 2, 'Dr. Ramanpreet Kaur', '2018-05-08 15:08:23', '2018-05-08 15:08:23', 0),
(6, 1, 12, 2, 'Dr. Amandeep Singh', '2018-04-30 07:19:04', '2018-05-02 13:42:16', 0),
(7, 6, 14, 2, 'Dr. ABC', '2018-12-11 10:59:28', '2018-12-11 10:59:28', 0),
(8, 6, 15, 2, 'Dr. ABC', '2018-12-11 10:59:28', '2018-12-11 10:59:28', 0),
(9, 6, 16, 1, 'Dr. ABC', '2018-12-11 10:59:28', '2018-12-11 10:59:28', 0),
(10, 6, 17, 2, 'Dr. ABC', '2018-12-11 10:59:28', '2018-12-11 10:59:28', 0),
(13, 0, 37, 0, NULL, '2018-12-13 12:10:33', '2018-12-13 12:10:33', NULL),
(14, 6, 39, 1, 'Dr. ABC', '2018-12-13 12:14:12', '2018-12-13 12:14:12', NULL),
(15, 6, 40, 2, 'Dr. ABC', '2018-12-13 12:15:39', '2018-12-13 12:15:39', NULL),
(16, 6, 41, 2, 'Dr. ABC', '2018-12-14 05:11:22', '2018-12-14 05:11:22', NULL),
(17, 2, 42, 4, 'Unknown', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(18, 2, 43, 4, 'Unknown', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(19, 2, 44, 4, 'Unknown', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(20, 2, 45, 4, 'Unknown', '2018-12-14 06:03:07', '2018-12-14 06:03:07', NULL),
(21, 3, 46, 4, 'Unknown', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(22, 3, 47, 4, 'Unknown', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(23, 3, 48, 4, 'Unknown', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(24, 3, 49, 4, 'Unknown', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(25, 3, 50, 4, 'Unknown', '2018-12-14 06:22:38', '2018-12-14 06:22:38', NULL),
(26, 31, 51, 3, 'Unknown', '2018-12-19 10:47:38', '2018-12-19 10:47:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses_programmes`
--

CREATE TABLE `courses_programmes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses_students`
--

CREATE TABLE `courses_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `selected` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses_students`
--

INSERT INTO `courses_students` (`id`, `student_id`, `course_id`, `selected`) VALUES
(1, 1, 2, NULL),
(2, 1, 3, NULL),
(3, 1, 10, NULL),
(4, 1, 12, NULL),
(5, 2, 5, NULL),
(6, 2, 10, NULL),
(7, 2, 12, NULL),
(9, 131, 15, NULL),
(10, 131, 16, NULL),
(12, 132, 16, NULL),
(13, 133, 14, NULL),
(14, 133, 16, NULL),
(15, 134, 14, NULL),
(16, 134, 15, NULL),
(17, 134, 16, NULL),
(18, 135, 14, NULL),
(19, 135, 15, NULL),
(20, 135, 16, NULL),
(21, 136, 14, NULL),
(22, 136, 16, NULL),
(23, 137, 14, NULL),
(24, 137, 16, NULL),
(25, 138, 14, NULL),
(26, 138, 16, NULL),
(27, 139, 14, NULL),
(28, 139, 16, NULL),
(29, 140, 14, NULL),
(30, 140, 16, NULL),
(31, 140, 17, 1),
(32, 141, 14, NULL),
(33, 141, 16, NULL),
(34, 141, 17, 1),
(35, 142, 14, NULL),
(36, 142, 16, NULL),
(37, 143, 14, NULL),
(38, 143, 16, NULL),
(39, 144, 14, NULL),
(40, 144, 16, NULL),
(41, 144, 17, 1),
(42, 145, 14, NULL),
(43, 145, 16, NULL),
(44, 145, 17, 1),
(45, 131, 14, 1),
(60, 140, 39, 1),
(61, 141, 39, 1),
(62, 142, 39, 1),
(63, 143, 39, 1),
(64, 144, 39, 1),
(65, 145, 39, 1),
(66, 133, 41, 1),
(67, 134, 41, 1),
(68, 136, 41, 1),
(69, 138, 41, 1),
(70, 140, 41, 1),
(71, 141, 41, 1),
(72, 142, 41, 1),
(73, 144, 41, 1),
(74, 145, 41, 1),
(75, 149, 42, 1),
(76, 150, 42, 1),
(77, 151, 42, 1),
(78, 152, 42, 1),
(79, 149, 43, 1),
(80, 150, 43, 1),
(81, 151, 43, 1),
(82, 152, 43, 1),
(83, 149, 44, 1),
(84, 150, 44, 1),
(85, 151, 44, 1),
(86, 152, 44, 1),
(87, 149, 45, 1),
(88, 150, 45, 1),
(89, 151, 45, 1),
(90, 152, 45, 1),
(91, 3, 51, 1),
(92, 4, 51, 1),
(93, 5, 51, 1),
(94, 6, 51, 1),
(95, 7, 51, 1),
(96, 8, 51, 1),
(97, 9, 51, 1),
(98, 10, 51, 1),
(99, 11, 51, 1),
(100, 14, 51, 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `school_id`, `created_at`, `modified_at`, `user_id`) VALUES
(1, 'DEPARTMENT OF ANIMAL SCIENCES', 1, '2018-07-02 09:41:33', '2018-07-02 09:41:33', 4),
(2, 'DEPARTMENT OF APPLIED AGRICULTURE', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(3, 'DEPARTMENT OF BIOCHEMISTRY AND MICROBIAL SCIENCES', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(4, 'DEPARTMENT OF CHEMICAL SCIENCES', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(5, 'DEPARTMENT OF COMPUTATIONAL SCIENCES', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(6, 'DEPARTMENT OF MATHEMATICS AND STATISTICS', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(7, 'DEPARTMENT OF PHARMACEUTICAL SCIENCES AND NATURAL PRODUCTS', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(8, 'DEPARTMENT OF PHYSICAL SCIENCES', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(9, 'DEPARTMENT OF PLANT SCIENCES', 1, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(10, 'DEPARTMENT OF EDUCATION', 2, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(11, 'DEPARTMENT OF COMPUTER SCIENCE AND TECHNOLOGY', 3, '2018-12-04 11:24:07', '2018-12-04 11:24:07', 0),
(12, 'DEPARTMENT OF ENVIRONMENTAL SCIENCE AND TECHNOLOGY', 4, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(13, 'DEPARTMENT OF GEOGRAPHY AND GEOLOGY', 4, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(14, 'DEPARTMENT OF SOUTH AND CENTRAL ASIAN STUDIES (INCLUDING HISTORICAL STUDIES)', 5, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(15, 'DEPARTMENT OF HUMAN GENETICS AND MOLECULAR MEDICINE', 6, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(16, 'DEPARTMENT OF LANGUAGES AND COMPARATIVE LITERATURE', 7, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(17, 'DEPARTMENT OF LAW', 8, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(18, 'DEPARTMENT OF ECONOMIC STUDIES', 9, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(19, 'DEPARTMENT OF SOCIOLOGY', 9, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(20, 'DEPARTMENT OF MASS COMMUNICATION & MEDIA \r\nSTUDIES', 10, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0),
(21, 'DEPARTMENT OF FINANCIAL ADMINISTRATION', 11, '2018-12-04 11:29:06', '2018-12-04 11:29:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `board` varchar(100) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `grade` varchar(100) DEFAULT NULL,
  `marks_obtained` varchar(100) DEFAULT NULL,
  `max_marks` varchar(100) DEFAULT NULL,
  `percentage` varchar(100) DEFAULT NULL,
  `qualification` varchar(200) DEFAULT NULL,
  `roll_no` varchar(100) DEFAULT NULL,
  `subjects` varchar(500) DEFAULT NULL,
  `system` varchar(100) DEFAULT NULL,
  `year_of_passing` varchar(100) DEFAULT NULL,
  `mode_of_study` varchar(100) DEFAULT NULL,
  `date_of_registration` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `board`, `course`, `grade`, `marks_obtained`, `max_marks`, `percentage`, `qualification`, `roll_no`, `subjects`, `system`, `year_of_passing`, `mode_of_study`, `date_of_registration`, `created_at`, `modified_at`, `user_id`, `student_id`) VALUES
(1, 'jkllk', 'Matric', 'first', NULL, NULL, '', 'Matric', NULL, 'all', NULL, '', 'Regular', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0),
(2, '', '', '', NULL, NULL, '', 'Higher Secondary', NULL, '', NULL, '', '', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0),
(3, '', '', '', NULL, NULL, '', 'Diploma', NULL, '', NULL, '', '', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0),
(4, '', '', '', NULL, NULL, '', 'Graduation', NULL, '', NULL, '', '', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0),
(5, '', '', '', NULL, NULL, '', 'Post Graduation', NULL, '', NULL, '', '', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0),
(6, '', '', '', NULL, NULL, '', 'M.Phil.', NULL, '', NULL, '', '', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0),
(7, '', '', '', NULL, NULL, '', 'Any Other Exam', NULL, '', NULL, '', '', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0),
(8, '', '', '', NULL, NULL, '', 'Any Other Exam', NULL, '', NULL, '', '', NULL, '2018-07-02 09:32:50', '2018-07-02 09:32:50', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `examination_marks`
--

CREATE TABLE `examination_marks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_offered_id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `internal_assessment` double NOT NULL DEFAULT '0',
  `end_semester_examination` double NOT NULL DEFAULT '0',
  `total` varchar(5) NOT NULL DEFAULT '0',
  `grade_point` varchar(255) DEFAULT 'F',
  `letter_grade` varchar(255) DEFAULT 'F',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination_marks`
--

INSERT INTO `examination_marks` (`id`, `student_id`, `course_offered_id`, `programme_id`, `internal_assessment`, `end_semester_examination`, `total`, `grade_point`, `letter_grade`, `created_at`, `modified_at`, `user_id`) VALUES
(29, 130, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:19:34', '2018-12-12 06:19:34', 0),
(30, 132, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:19:34', '2018-12-12 06:19:34', 0),
(31, 133, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:19:34', '2018-12-12 06:19:34', 0),
(32, 135, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:19:34', '2018-12-12 06:19:34', 0),
(33, 136, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:19:34', '2018-12-12 06:19:34', 0),
(34, 131, 15, 6, 20, 50, 'S', NULL, NULL, '2018-12-12 06:19:58', '2018-12-12 06:19:58', 0),
(35, 134, 15, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:19:58', '2018-12-12 06:19:58', 0),
(36, 135, 15, 6, 20, 50, 'US', NULL, NULL, '2018-12-12 06:19:58', '2018-12-12 06:19:58', 0),
(37, 131, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(38, 132, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(39, 133, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(40, 134, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(41, 135, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(42, 136, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(43, 137, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(44, 138, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(45, 139, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(46, 140, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(47, 141, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(48, 142, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(49, 143, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(50, 144, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(51, 145, 16, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:20:59', '2018-12-12 06:20:59', 0),
(52, 140, 17, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:21:27', '2018-12-12 06:21:27', 0),
(53, 141, 17, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:21:27', '2018-12-12 06:21:27', 0),
(54, 144, 17, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:21:27', '2018-12-12 06:21:27', 0),
(55, 145, 17, 6, 20, 50, '70', '7', 'B+', '2018-12-12 06:21:27', '2018-12-12 06:21:27', 0),
(56, 131, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 07:17:34', '2018-12-12 07:17:34', 0),
(57, 134, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(58, 137, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(59, 138, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(60, 139, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(61, 140, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(62, 141, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(63, 142, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(64, 143, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(65, 144, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(66, 145, 14, 6, 20, 50, '70', '7', 'B+', '2018-12-12 12:36:04', '2018-12-12 12:36:04', 0),
(67, 135, 22, 6, 15, 56, '71', '7.1', 'A', '2018-12-13 06:49:11', '2018-12-13 06:49:11', 0),
(68, 136, 22, 6, 17, 46, '63', '6.3', 'B+', '2018-12-13 06:49:11', '2018-12-13 06:49:11', 0),
(69, 142, 22, 6, 18, 67, '85', '8.5', 'A+', '2018-12-13 06:49:11', '2018-12-13 06:49:11', 0),
(70, 143, 22, 6, 20, 45, '65', '6.5', 'B+', '2018-12-13 06:49:11', '2018-12-13 06:49:11', 0),
(71, 140, 39, 6, 12, 67, '79', '7.9', 'A', '2018-12-13 12:18:39', '2018-12-13 12:18:39', 0),
(72, 141, 39, 6, 12, 45, '57', '5.7', 'B', '2018-12-13 12:18:39', '2018-12-13 12:18:39', 0),
(73, 142, 39, 6, 15, 65, '80', '8', 'A', '2018-12-13 12:18:39', '2018-12-13 12:18:39', 0),
(74, 143, 39, 6, 14, 56, '70', '7', 'B+', '2018-12-13 12:18:39', '2018-12-13 12:18:39', 0),
(75, 144, 39, 6, 13, 56, '69', '6.9', 'B+', '2018-12-13 12:18:39', '2018-12-13 12:18:39', 0),
(76, 145, 39, 6, 11, 34, '45', '4.5', 'C', '2018-12-13 12:18:39', '2018-12-13 12:18:39', 0),
(77, 133, 41, 6, 14, 65, '79', '7.9', 'A', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(78, 134, 41, 6, 15, 45, '60', '6', 'B', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(79, 136, 41, 6, 18, 56, '74', '7.4', 'A', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(80, 138, 41, 6, 18, 34, '52', '5.2', 'B', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(81, 140, 41, 6, 16, 45, '61', '6.1', 'B+', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(82, 141, 41, 6, 11, 29, '40', '4', 'P', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(83, 142, 41, 6, 12, 58, '70', '7', 'B+', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(84, 144, 41, 6, 19, 67, '86', '8.6', 'A+', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(85, 145, 41, 6, 20, 71, '91', '9.1', 'O', '2018-12-14 05:13:02', '2018-12-14 05:13:02', 0),
(86, 149, 42, 2, 11, 45, 'S', NULL, NULL, '2018-12-14 08:29:42', '2018-12-14 08:29:42', 0),
(87, 150, 42, 2, 12, 46, '58.00', '5.8', 'B', '2018-12-14 08:29:42', '2018-12-14 08:29:42', 0),
(88, 151, 42, 2, 12, 47, '59.00', '5.9', 'B', '2018-12-14 08:29:42', '2018-12-14 08:29:42', 0),
(89, 152, 42, 2, 13, 48, 'US', NULL, NULL, '2018-12-14 08:29:42', '2018-12-14 08:29:42', 0),
(90, 149, 43, 2, 5, 51, '56', '5.6', 'B', '2018-12-14 08:30:08', '2018-12-14 08:30:08', 0),
(91, 150, 43, 2, 6, 51, '57', '5.7', 'B', '2018-12-14 08:30:08', '2018-12-14 08:30:08', 0),
(92, 151, 43, 2, 7, 52, '59', '5.9', 'B', '2018-12-14 08:30:08', '2018-12-14 08:30:08', 0),
(93, 152, 43, 2, 8, 53, '61', '6.1', 'B+', '2018-12-14 08:30:08', '2018-12-14 08:30:08', 0),
(94, 149, 44, 2, 15, 61, '76', '7.6', 'A', '2018-12-14 08:30:45', '2018-12-14 08:30:45', 0),
(95, 150, 44, 2, 16, 62, '78', '7.8', 'A', '2018-12-14 08:30:45', '2018-12-14 08:30:45', 0),
(96, 151, 44, 2, 17, 63, '80', '8', 'A', '2018-12-14 08:30:45', '2018-12-14 08:30:45', 0),
(97, 152, 44, 2, 18, 64, '82', '8.2', 'A+', '2018-12-14 08:30:45', '2018-12-14 08:30:45', 0),
(98, 149, 45, 2, 21, 34, '55', '5.5', 'B', '2018-12-14 08:31:24', '2018-12-14 08:31:24', 0),
(99, 150, 45, 2, 22, 35, '57', '5.7', 'B', '2018-12-14 08:31:24', '2018-12-14 08:31:24', 0),
(100, 151, 45, 2, 23, 36, '59', '5.9', 'B', '2018-12-14 08:31:24', '2018-12-14 08:31:24', 0),
(101, 152, 45, 2, 24, 37, '61', '6.1', 'B+', '2018-12-14 08:31:24', '2018-12-14 08:31:24', 0),
(102, 3, 51, 31, 13, 67, '80', '8', 'A', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(103, 4, 51, 31, 18, 56, '74', '7.4', 'A', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(104, 5, 51, 31, 12, 58, '70', '7', 'B+', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(105, 6, 51, 31, 19, 59, '78', '7.8', 'A', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(106, 7, 51, 31, 20, 53, '73', '7.3', 'A', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(107, 8, 51, 31, 21, 59, '80', '8', 'A', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(108, 9, 51, 31, 22, 38, '60', '6', 'B', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(109, 10, 51, 31, 25, 45, '70', '7', 'B+', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(110, 11, 51, 31, 10, 75, '85', '8.5', 'A+', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0),
(111, 14, 51, 31, 25, 75, '100', '10', 'O', '2018-12-19 10:49:55', '2018-12-19 10:49:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `examination_results`
--

CREATE TABLE `examination_results` (
  `id` int(11) NOT NULL,
  `program_offered_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `SGPA` double NOT NULL,
  `CGPA` double NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examination_results`
--

INSERT INTO `examination_results` (`id`, `program_offered_id`, `student_id`, `semester`, `SGPA`, `CGPA`, `created_at`, `modified_at`, `user_id`) VALUES
(1, 0, 4, 0, 3.4, 2.4, '2018-05-08 15:06:02', '2018-05-08 15:06:02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marksgplg`
--

CREATE TABLE `marksgplg` (
  `id` int(11) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `gp` decimal(11,2) DEFAULT NULL,
  `lg` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `class` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `marksgplg`
--

INSERT INTO `marksgplg` (`id`, `marks`, `gp`, `lg`, `class`) VALUES
(1, 0, '0.00', 'F', 'Fail'),
(2, 1, '0.00', 'F', 'Fail'),
(3, 2, '0.00', 'F', 'Fail'),
(4, 3, '0.00', 'F', 'Fail'),
(5, 4, '0.00', 'F', 'Fail'),
(6, 5, '0.00', 'F', 'Fail'),
(7, 6, '0.00', 'F', 'Fail'),
(8, 7, '0.00', 'F', 'Fail'),
(9, 8, '0.00', 'F', 'Fail'),
(10, 9, '0.00', 'F', 'Fail'),
(11, 10, '0.00', 'F', 'Fail'),
(12, 11, '0.00', 'F', 'Fail'),
(13, 12, '0.00', 'F', 'Fail'),
(14, 13, '0.00', 'F', 'Fail'),
(15, 14, '0.00', 'F', 'Fail'),
(16, 15, '0.00', 'F', 'Fail'),
(17, 16, '0.00', 'F', 'Fail'),
(18, 17, '0.00', 'F', 'Fail'),
(19, 18, '0.00', 'F', 'Fail'),
(20, 19, '0.00', 'F', 'Fail'),
(21, 20, '0.00', 'F', 'Fail'),
(22, 21, '0.00', 'F', 'Fail'),
(23, 22, '0.00', 'F', 'Fail'),
(24, 23, '0.00', 'F', 'Fail'),
(25, 24, '0.00', 'F', 'Fail'),
(26, 25, '0.00', 'F', 'Fail'),
(27, 26, '0.00', 'F', 'Fail'),
(28, 27, '0.00', 'F', 'Fail'),
(29, 28, '0.00', 'F', 'Fail'),
(30, 29, '0.00', 'F', 'Fail'),
(31, 30, '0.00', 'F', 'Fail'),
(32, 31, '0.00', 'F', 'Fail'),
(33, 32, '0.00', 'F', 'Fail'),
(34, 33, '0.00', 'F', 'Fail'),
(35, 34, '0.00', 'F', 'Fail'),
(36, 35, '0.00', 'F', 'Fail'),
(37, 36, '0.00', 'F', 'Fail'),
(38, 37, '0.00', 'F', 'Fail'),
(39, 38, '0.00', 'F', 'Fail'),
(40, 39, '0.00', 'F', 'Fail'),
(41, 40, '4.00', 'P', 'Pass with Letter Grade \'P\' (Pass)'),
(42, 41, '4.10', 'P', 'Pass with Letter Grade \'P\' (Pass)'),
(43, 42, '4.20', 'P', 'Pass with Letter Grade \'P\' (Pass)'),
(44, 43, '4.30', 'P', 'Pass with Letter Grade \'P\' (Pass)'),
(45, 44, '4.40', 'P', 'Pass with Letter Grade \'P\' (Pass)'),
(46, 45, '4.50', 'C', 'Pass with Letter Grade \'C\' (Average)'),
(47, 46, '4.60', 'C', 'Pass with Letter Grade \'C\' (Average)'),
(48, 47, '4.70', 'C', 'Pass with Letter Grade \'C\' (Average)'),
(49, 48, '4.80', 'C', 'Pass with Letter Grade \'C\' (Average)'),
(50, 49, '4.90', 'C', 'Pass with Letter Grade \'C\' (Average)'),
(51, 50, '5.00', 'C', 'Pass with Letter Grade \'C\' (Average)'),
(52, 51, '5.10', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(53, 52, '5.20', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(54, 53, '5.30', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(55, 54, '5.40', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(56, 55, '5.50', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(57, 56, '5.60', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(58, 57, '5.70', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(59, 58, '5.80', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(60, 59, '5.90', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(61, 60, '6.00', 'B', 'Pass with Letter Grade \'B\' (Above Average)'),
(62, 61, '6.10', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(63, 62, '6.20', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(64, 63, '6.30', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(65, 64, '6.40', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(66, 65, '6.50', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(67, 66, '6.60', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(68, 67, '6.70', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(69, 68, '6.80', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(70, 69, '6.90', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(71, 70, '7.00', 'B+', 'Pass with Letter Grade \'B+\' (Good)'),
(72, 71, '7.10', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(73, 72, '7.20', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(74, 73, '7.30', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(75, 74, '7.40', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(76, 75, '7.50', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(77, 76, '7.60', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(78, 77, '7.70', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(79, 78, '7.80', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(80, 79, '7.90', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(81, 80, '8.00', 'A', 'Pass with Letter Grade \'A\' (Very Good)'),
(82, 81, '8.10', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(83, 82, '8.20', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(84, 83, '8.30', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(85, 84, '8.40', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(86, 85, '8.50', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(87, 86, '8.60', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(88, 87, '8.70', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(89, 88, '8.80', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(90, 89, '8.90', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(91, 90, '9.00', 'A+', 'Pass with Letter Grade \'A+\' (Excellent)'),
(92, 91, '9.10', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(93, 92, '9.20', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(94, 93, '9.30', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(95, 94, '9.40', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(96, 95, '9.50', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(97, 96, '9.60', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(98, 97, '9.70', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(99, 98, '9.80', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(100, 99, '9.90', 'O', 'Pass with Letter Grade \'O\' (Outstanding)'),
(101, 100, '10.00', 'O', 'Pass with Letter Grade \'O\' (Outstanding)');

-- --------------------------------------------------------

--
-- Table structure for table `pings`
--

CREATE TABLE `pings` (
  `id` int(11) NOT NULL,
  `response` text,
  `created_at` datetime NOT NULL,
  `remote_addr` varchar(20) DEFAULT NULL,
  `remote_host` varchar(50) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pings`
--

INSERT INTO `pings` (`id`, `response`, `created_at`, `remote_addr`, `remote_host`, `student_id`, `user_id`) VALUES
(22, '', '2008-05-22 23:04:09', NULL, NULL, NULL, NULL),
(19, 'new ping,http://sharanbrar.com/?p=14,Sharandeep Brar,http://cybertron.in/ping.php\n...', '2008-05-22 22:51:27', NULL, NULL, NULL, NULL),
(21, '1,http://sharanbrar.com', '2008-05-22 23:02:00', NULL, NULL, NULL, NULL),
(23, '', '2008-05-22 23:04:11', NULL, NULL, NULL, NULL),
(24, 'aaaaaaaaaaaa,http://sharanbrar.com/?p=15,Sharandeep Brar,http://cybertron.in/ping.php\n...', '2008-05-22 23:04:11', NULL, NULL, NULL, NULL),
(25, '', '2008-09-08 16:59:53', NULL, NULL, NULL, NULL),
(26, '', '2008-09-24 11:03:13', NULL, NULL, NULL, NULL),
(27, '', '2008-12-12 04:33:26', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `degree` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `name`, `degree`, `department_id`, `created`, `modified`, `user_id`, `session_id`) VALUES
(1, 'M. Sc. Life Sciences \n(Specialization in \nAnimal Sciences)', 'M.A.', 1, '2018-07-02 09:41:56', '2018-07-02 09:41:56', 4, 1),
(2, 'M.Sc. Food Science and Technology', '', 2, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(3, 'MBA (Agribusiness)', '', 2, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(4, 'M.Sc. Life Sciences (Specialization in \r\nMicrobial Sciences)', '', 3, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(5, 'M.Sc. Life Sciences (Specialization in \r\nBiochemistry)', '', 3, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(6, 'M.Sc. Chemistry', '', 4, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(7, 'M.Sc. Chemistry (Specialization in \r\nApplied Chemistry) ', '', 4, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(8, 'M.Sc. Chemistry (Computational Chemistry)', '', 5, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(9, 'M.Sc. Physics (Computational Physics)', '', 5, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(10, 'M.Sc. Life Sciences (Specialization in \r\nBioinformatics)', '', 5, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(11, 'M.Sc. Mathematics', '', 6, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(12, 'M.Sc. Statistics', '', 6, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(13, 'M. Pharm. Pharmaceutical Sciences (Medicinal Chemistry)', '', 7, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(14, 'M. Pharm. Pharmaceutical Sciences (Pharmacognosy and Phytochemistry)', '', 7, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(15, 'M.Sc. Chemical Sciences (Medicinal \r\nChemistry) ', '', 7, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(16, 'M.Sc. Physics', '', 8, '2018-12-04 11:52:46', '2018-12-04 11:52:46', 0, 1),
(17, 'M.Ed.', '', 10, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(18, 'M.A. Education', '', 10, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(19, 'M.Tech. Computer Science & Technology', '', 11, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(20, 'M.Tech. Computer Science & Technology  (Cyber Security)', '', 11, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(21, 'M.Sc. Environmental Science and Technology', '', 12, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(22, 'M.Sc. Geology', '', 13, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(23, 'M.A./M.Sc. Geography', '', 13, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(24, 'M.A. Political Science', '', 14, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(25, 'M.A. History', '', 14, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(26, 'M.Sc. Life Sciences (Specialization in \r\nHuman Genetics)', '', 15, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(27, 'M.Sc. Life Sciences  (Specialization in Molecular Medicine)', '', 15, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(28, 'M.A. English', '', 16, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(29, 'M.A. Hindi', '', 16, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(30, 'M.A. Punjabi', '', 16, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(31, 'LL.M.', '', 17, '2018-12-04 12:01:50', '2018-12-04 12:01:50', 0, 1),
(32, 'M.A. Economics', '', 18, '2018-12-04 12:03:45', '2018-12-04 12:03:45', 0, 1),
(33, 'M.A. Sociology', '', 19, '2018-12-04 12:03:45', '2018-12-04 12:03:45', 0, 1),
(34, 'M.A. Journalism & Mass Communication ', '', 20, '2018-12-04 12:03:45', '2018-12-04 12:03:45', 0, 1),
(35, 'M.Com.', '', 21, '2018-12-04 12:03:45', '2018-12-04 12:03:45', 0, 1),
(36, 'M. Sc. Life Sciences (Specialization in Plant Sciences)', '', 9, '2018-12-04 12:07:27', '2018-12-04 12:07:27', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `programmes_offered`
--

CREATE TABLE `programmes_offered` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `created_at`, `modified_at`, `user_id`) VALUES
(1, 'SCHOOL OF BASIC AND \nAPPLIED \nSCIENCES', '2018-07-02 09:41:15', '2018-07-02 09:41:15', 4),
(2, 'SCHOOL OF EDUCATION', '2018-12-21 11:12:52', '2018-12-21 11:12:52', 4),
(3, 'SCHOOL OF ENGINEERING AND TECHNOLOGY', '2018-12-21 11:12:52', '2018-12-21 11:12:52', 4),
(4, 'SCHOOL OF ENVIRONMENT AND EARTH SCIENCES', '2018-12-21 11:13:45', '2018-12-21 11:13:45', 4),
(5, 'SCHOOL OF GLOBAL RELATIONS', '2018-12-21 11:13:45', '2018-12-21 11:13:45', 4),
(6, 'SCHOOL OF HEALTH SCIENCES', '2018-12-21 11:14:41', '2018-12-21 11:14:41', 4),
(7, 'SCHOOL OF LANGUAGES, LITERATURE AND CULTURE', '2018-12-21 11:14:41', '2018-12-21 11:14:41', 4),
(8, 'SCHOOL OF LEGAL STUDIES AND GOVERNANCE', '2018-12-21 11:15:26', '2018-12-21 11:15:26', 4),
(9, 'SCHOOL OF SOCIAL SCIENCES', '2018-12-21 11:15:26', '2018-12-21 11:15:26', 4),
(10, 'SCHOOL OF INFORMATION & COMMUNICATIVE SCIENCES', '2018-12-21 11:16:09', '2018-12-21 11:16:09', 4),
(11, 'SCHOOL OF MANAGEMENT', '2018-12-21 11:16:09', '2018-12-21 11:16:09', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created`, `modified`) VALUES
(1, '2014-15', '2018-12-03 10:52:45', '2018-12-03 10:52:45'),
(2, '2015-16', '2018-12-03 10:52:45', '2018-12-03 10:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_offereds`
--

CREATE TABLE `student_course_offereds` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_offered_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course_offereds`
--

INSERT INTO `student_course_offereds` (`id`, `student_id`, `course_offered_id`, `created`) VALUES
(1, 1, 1, '2018-05-02 06:06:27'),
(2, 2, 3, '2018-05-03 16:33:10'),
(3, 2, 4, '2018-05-03 16:33:34'),
(4, 3, 3, '2018-05-04 05:49:21'),
(5, 3, 4, '2018-05-04 05:49:31'),
(8, 4, 1, '2018-05-08 15:04:19'),
(9, 5, 5, '2018-05-08 15:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aadhaar_no` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nationality` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `religion` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_category` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `minority` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `supernumerary` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parents_income` int(11) DEFAULT NULL,
  `economically_backward` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `economically_backward_detail` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci,
  `present_address` text COLLATE utf8_unicode_ci,
  `state` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_village` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pin_code` int(11) DEFAULT NULL,
  `email1` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email2` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hosteler` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_scholar` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emer_contact_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emer_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emer_relation` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fellowship` text COLLATE utf8_unicode_ci,
  `gap_in_studies` text COLLATE utf8_unicode_ci,
  `migration_character` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `corrections` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `max_progress` int(11) DEFAULT '0',
  `ugc_net_subject` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ugc_net_mnth_yr` int(11) DEFAULT NULL,
  `ugc_net_rollno` int(11) DEFAULT NULL,
  `ugc_net_jrf` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ugc_net_net` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ugc_net_exam_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ugc_net_any_other_details` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `admission_date` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `batch_id` int(11) DEFAULT NULL,
  `date_of_completion` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `selected` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `gender`, `blood_group`, `father_name`, `mother_name`, `guardian_name`, `aadhaar_no`, `dob`, `nationality`, `religion`, `category`, `sub_category`, `minority`, `supernumerary`, `parents_income`, `economically_backward`, `economically_backward_detail`, `permanent_address`, `present_address`, `state`, `district`, `city_village`, `pin_code`, `email1`, `email2`, `hosteler`, `day_scholar`, `mobile_no`, `emer_contact_no`, `emer_name`, `emer_relation`, `fellowship`, `gap_in_studies`, `migration_character`, `created_at`, `modified_at`, `user_id`, `corrections`, `max_progress`, `ugc_net_subject`, `ugc_net_mnth_yr`, `ugc_net_rollno`, `ugc_net_jrf`, `ugc_net_net`, `ugc_net_exam_type`, `ugc_net_any_other_details`, `programme_id`, `admission_date`, `batch_id`, `date_of_completion`, `registration_no`, `phone`, `address`, `photo`, `selected`) VALUES
(1, 'Satwinder singh', 'Male', 'B−', 'Fgggg', 'Hhgffgh', 'Fghffhhh', '123456677812', '30/01/2018', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Fggfgfh', 'Vhvggvvv', 'Karnataka', 'Dgfgg', 'Dffgg', 143001, 'Sdfg@dfgg.com', 'Dffff@ghjh.cbn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-03-28 15:14:33', '2018-07-02 09:45:39', 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '11/07/2017', 1, '14/08/2019', '18msmsss01', NULL, NULL, NULL, NULL),
(2, 'Test', 'Male', 'A+', 'Test', 'Test', 'Test', '283748932734', '08/02/1985', 'Indian', 'Hinduism', 'SC', 'jkl', 'Muslim', 'PWD', 45645, 'Yes', 'Yellow', 'hjwer ewjhr ewiurh ', 'sjfh kwejhrf kewjhr ', 'Punjab', 'Bathinda', 'Bathinda', 151001, 'test@test.com', 'sdajfkhd@asdjkfh.com', 'Yes', 'No', '9463069882', '5644654546', 'kjjl', 'hbjkhkj', '', '', 'Yes', '2018-07-02 09:30:15', '2018-07-02 09:47:03', 1, NULL, 4, 'test', 2001, 123, 'Yes', 'Yes', 'UGC', '', 1, '01/07/2018', 1, '20/08/2019', '18msnsnn02', NULL, NULL, NULL, NULL),
(3, 'Satish Singh', NULL, NULL, 'Krishna Kumar Singh', 'Mithlesh Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw01', NULL, NULL, NULL, NULL),
(4, 'Pratibha Verma', NULL, NULL, 'Kuldip Kumar Verma', 'Kiran Verma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw02', NULL, NULL, NULL, NULL),
(5, 'Nitin Shukla', NULL, NULL, 'Siddh Kumar Shukla', 'Archana Shukla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw03', NULL, NULL, NULL, NULL),
(6, 'Gurveer Kaur', NULL, NULL, 'Sarbjeet Singh', 'Manbir Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw04', NULL, NULL, NULL, NULL),
(7, 'Vriti Upadhyaya', NULL, NULL, 'Ajay Upadhyaya', 'Nutan Upadhyaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw05', NULL, NULL, NULL, NULL),
(8, 'Anjali', NULL, NULL, 'Sunil Dhawan', 'Vipan Dhawan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw06', NULL, NULL, NULL, NULL),
(9, 'Vikrant Menanwal', NULL, NULL, 'Surendra Singh', 'Rekha Rani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw09', NULL, NULL, NULL, NULL),
(10, 'Shehnila', NULL, NULL, 'Mohd Shamshad', 'Shehnaz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw10', NULL, NULL, NULL, NULL),
(11, 'Sukhjeevan Singh', NULL, NULL, 'Balwinder Singh', 'Baljit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw12', NULL, NULL, NULL, NULL),
(12, 'Mohd Jameel', NULL, NULL, 'Mohd Sharief', 'Salma Bi.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw13', NULL, NULL, NULL, NULL),
(13, 'Akashdeep Garg', NULL, NULL, 'Sukhdarshan Lal Garg', 'Geeta Rani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw14', NULL, NULL, NULL, NULL),
(14, 'Rambha Kumari', NULL, NULL, 'Gopal Krishna Jha', 'Rama Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 31, NULL, NULL, NULL, '16llmlaw16', NULL, NULL, NULL, NULL),
(15, 'Keshav', NULL, NULL, 'Kundalikrao', 'Satyabhama', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos02', NULL, NULL, NULL, NULL),
(16, 'Aman Singh', NULL, NULL, 'Kamleshwar Singh', 'Anita Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos03', NULL, NULL, NULL, NULL),
(17, 'Govind Jee Jha', NULL, NULL, 'Ram Lala Jha', 'Veena Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos04', NULL, NULL, NULL, NULL),
(18, 'Jagdeep Kaur', NULL, NULL, 'Harbans Singh', 'Jaspal Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos05', NULL, NULL, NULL, NULL),
(19, 'Manpreet Kaur', NULL, NULL, 'Baljit Singh', 'Paramjit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos06', NULL, NULL, NULL, NULL),
(20, 'Sudheer Babu', NULL, NULL, 'Ashu Ram Meghwal', 'Rukmani Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos07', NULL, NULL, NULL, NULL),
(21, 'Mohd Irshad', NULL, NULL, 'Abdul Majid', 'Ghulam Fatima', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos08', NULL, NULL, NULL, NULL),
(22, 'Md Rahat Hasan Khan', NULL, NULL, 'Md Mobin Hasan Khan', 'Saleha Khatoon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos09', NULL, NULL, NULL, NULL),
(23, 'Ghafoor Ahmed', NULL, NULL, 'Wazir Mohd', 'Sakina Bi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos11', NULL, NULL, NULL, NULL),
(24, 'Amritpal Singh Sachdeva', NULL, NULL, 'Avtar Singh Sachdeva', 'Gursharan Kaur Sachdeva', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos12', NULL, NULL, NULL, NULL),
(25, 'Utsav Anand', NULL, NULL, 'Rajinder Anand', 'Vanita Anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos14', NULL, NULL, NULL, NULL),
(26, 'Sanoop M.K.', NULL, NULL, 'Khadher. M.A', 'Nafeesa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, NULL, NULL, NULL, '16maecos16', NULL, NULL, NULL, NULL),
(27, 'Qamber Ali', NULL, NULL, 'Mohd Jaffer', 'Zanab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc01', NULL, NULL, NULL, NULL),
(28, 'Samita Devi', NULL, NULL, 'Narsingh Dass', 'Sudesh Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc02', NULL, NULL, NULL, NULL),
(29, 'Pooja Devi', NULL, NULL, 'Deep Chand', 'Trishla Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:16', '2018-12-04 11:09:16', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc03', NULL, NULL, NULL, NULL),
(30, 'Wasim Akram', NULL, NULL, 'Lal Hussian', 'Monshaid Begum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc04', NULL, NULL, NULL, NULL),
(31, 'Mohd Mushtaq', NULL, NULL, 'Mohd Rashid', 'Ramim Akhter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc05', NULL, NULL, NULL, NULL),
(32, 'Mohd Zabeer', NULL, NULL, 'Nazir Hussain', 'Jameel Begum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc06', NULL, NULL, NULL, NULL),
(33, 'Muhammed Rasiq. K.T', NULL, NULL, 'Abdulgafoor. K.T', 'Rasiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc07', NULL, NULL, NULL, NULL),
(34, 'Mohd Sarfraz', NULL, NULL, 'Saif Din', 'Hanifa Begum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc08', NULL, NULL, NULL, NULL),
(35, 'Kehar Singh', NULL, NULL, 'Mohn Lal', 'Guddo Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc10', NULL, NULL, NULL, NULL),
(36, 'Mohd Salman Khan', NULL, NULL, 'Ghayas Ahmed Khan', 'Noshad Begum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, NULL, NULL, NULL, '16maeduc11', NULL, NULL, NULL, NULL),
(37, 'Vinoy. K.V', NULL, NULL, 'Vavachan. K.G.', 'Valsamma Vavachan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs01', NULL, NULL, NULL, NULL),
(38, 'Rupal', NULL, NULL, 'Uday Mishra', 'Vineeta Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs02', NULL, NULL, NULL, NULL),
(39, 'Padma Kalyani Mohapatra', NULL, NULL, 'Kailash Chandra Mohapatra', 'Anupama Mohapatra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs03', NULL, NULL, NULL, NULL),
(40, 'Divya P Poulose', NULL, NULL, 'P.A.Kunjappan Poulose', 'Sheela Poulose', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs04', NULL, NULL, NULL, NULL),
(41, 'Harpreet Singh', NULL, NULL, 'Gurjeet Singh', 'Rajinder Pal Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs05', NULL, NULL, NULL, NULL),
(42, 'Fameel. P.K', NULL, NULL, 'Abdul Jaleel. P.K', 'Saifunnisa. K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs07', NULL, NULL, NULL, NULL),
(43, 'Susmita Mohanta', NULL, NULL, 'Siva Mohanta', 'Sunita Mohanta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs09', NULL, NULL, NULL, NULL),
(44, 'Rakhi Krishna S', NULL, NULL, 'Radhakrishna Pillai V', 'Sheeja Kumari T', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs11', NULL, NULL, NULL, NULL),
(45, 'Aiswarya John', NULL, NULL, 'John', 'Shiny', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs12', NULL, NULL, NULL, NULL),
(46, 'Manjit Kaur', NULL, NULL, 'Amarjit Singh', 'Raj Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 28, NULL, NULL, NULL, '16maengs13', NULL, NULL, NULL, NULL),
(47, 'Mitali Sharma', NULL, NULL, 'Rakesh Kumar Sharma', 'Vandana Tripathi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, NULL, NULL, NULL, '16mahind01', NULL, NULL, NULL, NULL),
(48, 'Mahesh Kumar Bugaliya', NULL, NULL, 'Bhanwar Lal Bugaliya', 'Malku Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, NULL, NULL, NULL, '16mahind02', NULL, NULL, NULL, NULL),
(49, 'Harwinder Kaur ', NULL, NULL, 'Sukhdev Singh', 'Jasvir Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 29, NULL, NULL, NULL, '16mahind03', NULL, NULL, NULL, NULL),
(50, 'Shekhar Chauhan', NULL, NULL, 'Yashpal Singh', 'Sanjay Rani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist01', NULL, NULL, NULL, NULL),
(51, 'Beant Kaur', NULL, NULL, 'Gurjant Singh', 'Manjit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist02', NULL, NULL, NULL, NULL),
(52, 'Subamanoj K', NULL, NULL, 'P.Karthikeyan', 'Selvi. R', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist03', NULL, NULL, NULL, NULL),
(53, 'Nazam Ud Din', NULL, NULL, 'Mohd Ashraf', 'Parveen Akhter', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist04', NULL, NULL, NULL, NULL),
(54, 'Dharam Kumar', NULL, NULL, 'Topram', 'Prem Bai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist05', NULL, NULL, NULL, NULL),
(55, 'Sandesh Kumar', NULL, NULL, 'Kaku Ram', 'Veeno Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist06', NULL, NULL, NULL, NULL),
(56, 'Deb Kumar Barman', NULL, NULL, 'Munindra Barman', 'Biju Barman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist09', NULL, NULL, NULL, NULL),
(57, 'Sumandeep Kaur', NULL, NULL, 'Rajwinder Singh', 'Gurmeet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 25, NULL, NULL, NULL, '16mahist10', NULL, NULL, NULL, NULL),
(58, 'Khushdeep Singh', NULL, NULL, 'Shamsher Singh', 'Rajpreet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, '16maplsc02', NULL, NULL, NULL, NULL),
(59, 'Gurmit Singh', NULL, NULL, 'Jagsir Singh', 'Jaspreet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, '16maplsc03', NULL, NULL, NULL, NULL),
(60, 'Neerudi Gopal', NULL, NULL, 'Neerudi Pochaiah', 'Neerudi Anushamma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, '16maplsc04', NULL, NULL, NULL, NULL),
(61, 'Hafiz Mohammad Ikram ul Haq', NULL, NULL, 'Mohammad Aslam', 'Subza Begum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, '16maplsc05', NULL, NULL, NULL, NULL),
(62, 'Jitendra Kumar', NULL, NULL, 'Bhopal Singh Olla', 'Savitri Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, '16maplsc07', NULL, NULL, NULL, NULL),
(63, 'Husanpreet Singh', NULL, NULL, 'Tej Singh', 'Chhinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 24, NULL, NULL, NULL, '16maplsc08', NULL, NULL, NULL, NULL),
(64, 'Jaspal Kaur', NULL, NULL, 'Shivraj Singh', 'Sukhjeet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj01', NULL, NULL, NULL, NULL),
(65, 'Veerpal Kaur', NULL, NULL, 'Gurjant Singh', 'Paramjit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj03', NULL, NULL, NULL, NULL),
(66, 'Rajvir Kaur', NULL, NULL, 'Surjit Singh', 'Amarjit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj04', NULL, NULL, NULL, NULL),
(67, 'Manpreet Singh', NULL, NULL, 'Jagdev Singh', 'Jasveer Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj05', NULL, NULL, NULL, NULL),
(68, 'Lovepreet Singh', NULL, NULL, 'Om Parkash', 'Surjeet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj06', NULL, NULL, NULL, NULL),
(69, 'Kulvir Kaur', NULL, NULL, 'Jeet Singh', 'Jaswinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj07', NULL, NULL, NULL, NULL),
(70, 'Maninder Singh', NULL, NULL, 'Ram Singh', 'Jaspal Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj09', NULL, NULL, NULL, NULL),
(71, 'Kuldip Singh', NULL, NULL, 'Jagmohan Singh', 'Charanjit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj10', NULL, NULL, NULL, NULL),
(72, 'Kuldeep Singh', NULL, NULL, 'Rajpal Singh', 'Karmjeet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj11', NULL, NULL, NULL, NULL),
(73, 'Sukhdeep Kaur', NULL, NULL, 'Iqbal Singh', 'Amanpreet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj13', NULL, NULL, NULL, NULL),
(74, 'Randeep Kaur', NULL, NULL, 'Gurchet Singh', 'Karmjit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 30, NULL, NULL, NULL, '16mapunj14', NULL, NULL, NULL, NULL),
(75, 'Shah Din', NULL, NULL, 'Abdul Gani', 'Zeenat Begum ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, '16masolg01', NULL, NULL, NULL, NULL),
(76, 'Gugulothu Santhosh', NULL, NULL, 'Somla', 'Bharathi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, NULL, NULL, NULL, '16masolg02', NULL, NULL, NULL, NULL),
(77, 'Ravindra Singh', NULL, NULL, 'Gopal Singh', 'Santosh Kanwar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog01', NULL, NULL, NULL, NULL),
(78, 'Harminder Singh', NULL, NULL, 'Rashem Singh', 'Jaswinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog03', NULL, NULL, NULL, NULL),
(79, 'Akash Dattusalia', NULL, NULL, 'Mahendra Singh', 'Manoj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog04', NULL, NULL, NULL, NULL),
(80, 'Jyoti Meena', NULL, NULL, 'Harisingh Meena', 'Harimaya Meena', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog05', NULL, NULL, NULL, NULL),
(81, 'Mandeep Kaur', NULL, NULL, 'Santa Singh', 'Harjinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog07', NULL, NULL, NULL, NULL),
(82, 'Shiva', NULL, NULL, 'Shakti Singh', 'Shashi Kala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog09', NULL, NULL, NULL, NULL),
(83, 'Rahul Mazumder', NULL, NULL, 'Dulal Krishna Mazumder', 'Laxmi Mazumder', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog10', NULL, NULL, NULL, NULL),
(84, 'Mukhtar Ahmed', NULL, NULL, 'Hakim Din', 'Sakeena Bi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog12', NULL, NULL, NULL, NULL),
(85, 'Navjotpreet Kaur', NULL, NULL, 'Gurdev Singh', 'Gurpreet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog13', NULL, NULL, NULL, NULL),
(86, 'Vishabh Salgotra', NULL, NULL, 'Kuldeep Raj', 'Darshna Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16msgeog14', NULL, NULL, NULL, NULL),
(87, 'Arshdeep Kaur', NULL, NULL, 'Karamjeet Singh', 'Rani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog15', NULL, NULL, NULL, NULL),
(88, 'Ishtiaq Ahmed', NULL, NULL, 'Mohd Iqbal', 'Rafia Begum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16msgeog16', NULL, NULL, NULL, NULL),
(89, 'Sarfraz Ahmed', NULL, NULL, 'Choudhary Chandi', 'Zanib Bi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mageog17', NULL, NULL, NULL, NULL),
(90, 'Shabir Ahmad Dar', NULL, NULL, 'Gh Hassan Dar', 'Hafeeza Banoo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu01', NULL, NULL, NULL, NULL),
(91, 'Varinder Singh', NULL, NULL, 'Karamjit Singh', 'Charanjit Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu02', NULL, NULL, NULL, NULL),
(92, 'Divya Kumari', NULL, NULL, 'Raj Kumar Singh', 'Meera Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu03', NULL, NULL, NULL, NULL),
(93, 'Ishfaq Majid', NULL, NULL, 'Ab Majid Pandit', 'Nigeena', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu04', NULL, NULL, NULL, NULL),
(94, 'Deepika Katiyar', NULL, NULL, 'Ravindra Kumar', 'Pushpa Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu06', NULL, NULL, NULL, NULL),
(95, 'Suranjan Kumar', NULL, NULL, 'Suresh Paswan', 'Poonam Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu09', NULL, NULL, NULL, NULL),
(96, 'Pankaj Vashisth', NULL, NULL, 'Satya Narayan Vashisth', 'Kamlesh Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu11', NULL, NULL, NULL, NULL),
(97, 'Waseem Hassan Sheikh', NULL, NULL, 'Gh Hassan Sheikh', 'Azi Begum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, NULL, NULL, NULL, '16mededu12', NULL, NULL, NULL, NULL),
(98, 'Sachin Sharma', NULL, NULL, 'Satish Kumar', 'Reeta Rani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm01', NULL, NULL, NULL, NULL),
(99, 'Ram Sharma', NULL, NULL, 'Lakhmi Das', 'Soorta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm02', NULL, NULL, NULL, NULL),
(100, 'Ashima Sharma', NULL, NULL, 'Shashi Kant', 'Shashi Bala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm03', NULL, NULL, NULL, NULL),
(101, 'Hardeep Singh', NULL, NULL, 'Santokh Singh', 'Kuldeep Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm05', NULL, NULL, NULL, NULL),
(102, 'Vishakha Pandey', NULL, NULL, 'L.M Pandey', 'Lata Pandey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm06', NULL, NULL, NULL, NULL),
(103, 'Sahil Arora', NULL, NULL, 'Madan Gopal Arora', 'Shashi Bala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm07', NULL, NULL, NULL, NULL),
(104, 'Manu Bala', NULL, NULL, 'Kapoor Singh', 'Suman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm09', NULL, NULL, NULL, NULL),
(105, 'Diksha Choudhary', NULL, NULL, 'Vinod Kumar', 'Anjana Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm11', NULL, NULL, NULL, NULL),
(106, 'Haris. E', NULL, NULL, 'Abu. E', 'Fathima. P.P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm12', NULL, NULL, NULL, NULL),
(107, 'Azhar Juman P', NULL, NULL, 'Abdu Pari', 'Sakkeena VP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm13', NULL, NULL, NULL, NULL),
(108, 'Arvind Kumar', NULL, NULL, 'Ashwani Kumar', 'Kanta Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm14', NULL, NULL, NULL, NULL),
(109, 'Amandeep Thakur', NULL, NULL, 'Suresh Chand', 'Subhadra Thakur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm15', NULL, NULL, NULL, NULL),
(110, 'Sonia Verma', NULL, NULL, 'Rakesh Kumar', 'Sangeeta Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mpharm16', NULL, NULL, NULL, NULL),
(111, 'Souvik Mukherjee', NULL, NULL, 'Kanailal Mukherjee', 'Purnima Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mphyto01', NULL, NULL, NULL, NULL),
(112, 'Saptarshi Samajdar', NULL, NULL, 'Archan Samajdar', 'Mousumi Samajdar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mphyto02', NULL, NULL, NULL, NULL),
(113, 'Aditi', NULL, NULL, 'Man Mohan Saxena', 'Preeti Saxena', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mphyto03', NULL, NULL, NULL, NULL),
(114, 'Neha Pathak', NULL, NULL, 'Munna Pathak', 'Mithalesh Pathak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mphyto04', NULL, NULL, NULL, NULL),
(115, 'Partha Pratim Das', NULL, NULL, 'Bimal Kr Das', 'Chinmoyee Das', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mphyto05', NULL, NULL, NULL, NULL),
(116, 'Poornima Sajeevan', NULL, NULL, 'Sajeevan M K', 'Anitha Sajeevan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mphyto06', NULL, NULL, NULL, NULL),
(117, 'KM Priyanka Dixit', NULL, NULL, 'Pramod Kumar Dixit', 'Babli Dixit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mphyto07', NULL, NULL, NULL, NULL),
(118, 'Pratibha Agarwala', NULL, NULL, 'Prakash Chandra Agarwala', 'Swapna Agarwala', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs01', NULL, NULL, NULL, NULL),
(119, 'Kanika Garg', NULL, NULL, 'Satya Prakash Garg', 'Neelam Garg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs02', NULL, NULL, NULL, NULL),
(120, 'Anupama Sharma', NULL, NULL, 'Dilip Kumar Sharma', 'Poonam Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs03', NULL, NULL, NULL, NULL),
(121, 'Desoshree Ghosh', NULL, NULL, 'Makhan Ghosh', 'Bhabani Ghosh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs04', NULL, NULL, NULL, NULL);
INSERT INTO `students` (`id`, `name`, `gender`, `blood_group`, `father_name`, `mother_name`, `guardian_name`, `aadhaar_no`, `dob`, `nationality`, `religion`, `category`, `sub_category`, `minority`, `supernumerary`, `parents_income`, `economically_backward`, `economically_backward_detail`, `permanent_address`, `present_address`, `state`, `district`, `city_village`, `pin_code`, `email1`, `email2`, `hosteler`, `day_scholar`, `mobile_no`, `emer_contact_no`, `emer_name`, `emer_relation`, `fellowship`, `gap_in_studies`, `migration_character`, `created_at`, `modified_at`, `user_id`, `corrections`, `max_progress`, `ugc_net_subject`, `ugc_net_mnth_yr`, `ugc_net_rollno`, `ugc_net_jrf`, `ugc_net_net`, `ugc_net_exam_type`, `ugc_net_any_other_details`, `programme_id`, `admission_date`, `batch_id`, `date_of_completion`, `registration_no`, `phone`, `address`, `photo`, `selected`) VALUES
(122, 'Geetika Saini', NULL, NULL, 'Gurdial Singh Saini', 'Surender Kaur Saini', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs05', NULL, NULL, NULL, NULL),
(123, 'Farookh Khan', NULL, NULL, 'Balwan Singh', 'Jamila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs08', NULL, NULL, NULL, NULL),
(124, 'Pooja Kumari', NULL, NULL, 'Beer Singh', 'Sushila Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs09', NULL, NULL, NULL, NULL),
(125, 'Shabana Parveen', NULL, NULL, 'Anwar Alam', 'Ruqaiya Sultana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs11', NULL, NULL, NULL, NULL),
(126, 'Ajit Kumar Dhanka', NULL, NULL, 'Kailash Chand Dhanka', 'Saroj Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs12', NULL, NULL, NULL, NULL),
(127, 'Anita', NULL, NULL, 'Gulshan Singh', 'Pawana Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs13', NULL, NULL, NULL, NULL),
(128, 'Avantika Bhardwaj', NULL, NULL, 'Satish Bhardwaj', 'Raksha Bhardwaj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs14', NULL, NULL, NULL, NULL),
(129, 'Uttam Kumar Mishra', NULL, NULL, 'Rabindra Nath Mishra', 'Sabita Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscchs17', NULL, NULL, NULL, NULL),
(130, 'Rathindranath Biswas', NULL, NULL, 'Rakshakar Biswas', 'Basumati Biswas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm01', NULL, NULL, NULL, NULL),
(131, 'Jitender Singh', NULL, NULL, 'Phool Singh', 'Roshni Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm02', NULL, NULL, NULL, NULL),
(132, 'Sambit Shashanka Sekhar Rout', NULL, NULL, 'Bijay Kumar Rout', 'Annapurna Rout', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm03', NULL, NULL, NULL, NULL),
(133, 'Bhupender Kumar', NULL, NULL, 'Bhim Sain', 'Kalawanti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm04', NULL, NULL, NULL, NULL),
(134, 'Vishal Sharma', NULL, NULL, 'Gian Chand', 'Gita Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm05', NULL, NULL, NULL, NULL),
(135, 'Sandeep Kaur', NULL, NULL, 'Amarjeet Singh', 'Kiranpal Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm06', NULL, NULL, NULL, NULL),
(136, 'Swayamprakash Biswal', NULL, NULL, 'Somanath Biswal', 'Pratima Biswal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm07', NULL, NULL, NULL, NULL),
(137, 'Rakesh Ghosh', NULL, NULL, 'Naresh Ghosh', 'Saraswati Ghosh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm08', NULL, NULL, NULL, NULL),
(138, 'Rohtash Kumar', NULL, NULL, 'Chhotu Ram', 'Meera Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm09', NULL, NULL, NULL, NULL),
(139, 'Nikhil Das Mehar', NULL, NULL, 'Gopal Das', 'Rekha Bai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm10', NULL, NULL, NULL, NULL),
(140, 'Imtiaz Ahmed', NULL, NULL, 'Shabir Ahmed', 'Nasim Akhtar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm11', NULL, NULL, NULL, NULL),
(141, 'Sonali Gohit', NULL, NULL, 'Dayal Singh', 'Jyoti Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm12', NULL, NULL, NULL, NULL),
(142, 'Harshita Gupta', NULL, NULL, 'Ram Chander', 'Beena Gupta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm13', NULL, NULL, NULL, NULL),
(143, 'Mange Ram', NULL, NULL, 'Omprakash', 'Bimla Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm14', NULL, NULL, NULL, NULL),
(144, 'Manoj Kumar Sharma', NULL, NULL, 'Deep Chand', 'Kiran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm15', NULL, NULL, NULL, NULL),
(145, 'Ram Singh Jat', NULL, NULL, 'Hanuman Jat', 'Muli Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, '16mscchm16', NULL, NULL, NULL, NULL),
(146, 'Vishal Kumar', NULL, NULL, 'Shashi Bhushan Prasad', 'Kiran Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, '16mscscc01', NULL, NULL, NULL, NULL),
(147, 'Vikas Yadav', NULL, NULL, 'Satyavir Yadav', 'Santosh Yadav', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, '16mscscc02', NULL, NULL, NULL, NULL),
(148, 'Sushanta Kumar Mohanta', NULL, NULL, 'Digeswar Mohanta', 'Bharati Mohanta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, '16mscscc04', NULL, NULL, NULL, NULL),
(149, 'Sandeep Kaur', NULL, NULL, 'Jagraj Singh', 'Kulvir Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '16msfood06', NULL, NULL, NULL, NULL),
(150, 'Santosh Uddhav Phule', NULL, NULL, 'Uddhav Rajaram Phule', 'Sharda', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '16msfood08', NULL, NULL, NULL, NULL),
(151, 'Jaipreet Singh', NULL, NULL, 'Balraj Singh', 'Simarjeet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '16msfood09', NULL, NULL, NULL, NULL),
(152, 'Mohammad Ubaid', NULL, NULL, 'Mohammad Zubair', 'Noor Bi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, '16msfood12', NULL, NULL, NULL, NULL),
(153, 'Ujjwala Rout', NULL, NULL, 'Kahnu Charan Rout', 'Lovabati Rout', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs01', NULL, NULL, NULL, NULL),
(154, 'Adarsharanjan Pati', NULL, NULL, 'Rajendra Narayan Pati', 'Puspanjali Pati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs02', NULL, NULL, NULL, NULL),
(155, 'Nandan Boral', NULL, NULL, 'Lekhnath Boral', 'Kamala Boral', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs03', NULL, NULL, NULL, NULL),
(156, 'Mahmud Hassan', NULL, NULL, 'Abu Taleb', 'Mahmuda Khatun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs05', NULL, NULL, NULL, NULL),
(157, 'Mohd Yusuf', NULL, NULL, 'Shakeel Ahmad', 'Angum Ara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs06', NULL, NULL, NULL, NULL),
(158, 'Subhransu Swain', NULL, NULL, 'Manidhar Swain', 'Sukanti Swain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs07', NULL, NULL, NULL, NULL),
(159, 'Somesh Kumar Panigrahi', NULL, NULL, 'Satrughna Panigrahi', 'Chandramani Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs08', NULL, NULL, NULL, NULL),
(160, 'Binaya Sankar Bej', NULL, NULL, 'Ajay Kumar Bej', 'Jayanti Bej', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs09', NULL, NULL, NULL, NULL),
(161, 'Bikashit Gogoi', NULL, NULL, 'Sadananda Gogoi', 'Hiramoni Gogoi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs10', NULL, NULL, NULL, NULL),
(162, 'Santanu Kumar Mohanta', NULL, NULL, 'Jogendra Nath Mohanta', 'Meera Mohanta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs11', NULL, NULL, NULL, NULL),
(163, 'Johnson Haobijam', NULL, NULL, 'Haobijam Bhagyachandra', 'Haobijam Mema Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs12', NULL, NULL, NULL, NULL),
(164, 'Yousuf Ali', NULL, NULL, 'Ghulam Mehdi', 'Marzia Banoo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs13', NULL, NULL, NULL, NULL),
(165, 'Shabeer Hussain', NULL, NULL, 'Mohd Ishaq', 'Kulsoom Banoo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs15', NULL, NULL, NULL, NULL),
(166, 'Bikash Jyoti Gogoi', NULL, NULL, 'Dalbir Gogoi', 'Late Dipika Chetia Gogoi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 22, NULL, NULL, NULL, '16mscegs16', NULL, NULL, NULL, NULL),
(167, 'Nischal Sharma', NULL, NULL, 'Raj Kumar', 'Susham Lata', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest01', NULL, NULL, NULL, NULL),
(168, 'Sunayana Peechat', NULL, NULL, 'John Joseph', 'Brigit John', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest02', NULL, NULL, NULL, NULL),
(169, 'Prashant Singh', NULL, NULL, 'Narender Singh', 'Sarvesh Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest03', NULL, NULL, NULL, NULL),
(170, 'Mariyam Joseph', NULL, NULL, 'Joseph Cherian', 'Anie Joseph ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest07', NULL, NULL, NULL, NULL),
(171, 'Ravindra Prasad Sharma', NULL, NULL, 'Prem Chand Sharma', 'Rajeshwari Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest08', NULL, NULL, NULL, NULL),
(172, 'Picky Pang A Sangma', NULL, NULL, 'Kritwell Ch Marak', 'Leobina A Sangma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest10', NULL, NULL, NULL, NULL),
(173, 'Peyyala Ashoka Chakravarthy', NULL, NULL, 'Peyyala S Prasada Rao', 'Peyyala Jyothi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest11', NULL, NULL, NULL, NULL),
(174, 'Mamini Kumari Parida', NULL, NULL, 'Dillip Kumar Parida', 'Urmila Kumari Nahak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest12', NULL, NULL, NULL, NULL),
(175, 'Anu Radha', NULL, NULL, 'Gouri Ram', 'Kamlesh Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest13', NULL, NULL, NULL, NULL),
(176, 'Avimanu Sharma', NULL, NULL, 'Kali Dass', 'Kunti Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest14', NULL, NULL, NULL, NULL),
(177, 'Stanzin Chenlak', NULL, NULL, 'Paldan Chewang', 'Tsering Dolma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mscest15', NULL, NULL, NULL, NULL),
(178, 'Sukriti Mishra', NULL, NULL, 'Shiv Mangal Mishra', 'Sunita Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas01', NULL, NULL, NULL, NULL),
(179, 'Uttam Sharma', NULL, NULL, 'Raj Kumar Sharma', 'Manju Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas02', NULL, NULL, NULL, NULL),
(180, 'Nishibala N Behera', NULL, NULL, 'N Behera', 'Sabita Behera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas03', NULL, NULL, NULL, NULL),
(181, 'Nisha Sharma', NULL, NULL, 'Ashwani Kumar Sharma', 'Anu Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas04', NULL, NULL, NULL, NULL),
(182, 'Sneha Santra', NULL, NULL, 'Somnath Santra', 'Hena Santra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas06', NULL, NULL, NULL, NULL),
(183, 'Kanika Singh', NULL, NULL, 'Har Govind Singh', 'Thakur Asha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas07', NULL, NULL, NULL, NULL),
(184, 'Kapil Kumar', NULL, NULL, 'Dharam Raj', 'Savitri', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas08', NULL, NULL, NULL, NULL),
(185, 'Sunil Kumar Birua', NULL, NULL, 'Matha Birua', 'Tulasi Birua', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas09', NULL, NULL, NULL, NULL),
(186, 'Aishwarya Pruseth', NULL, NULL, 'Raj Kishor Pruseth', 'Namita Pruseth', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas10', NULL, NULL, NULL, NULL),
(187, 'Ankita Mukherjee', NULL, NULL, 'Ashes Kumar Mukherjee', 'Jayasri Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas11', NULL, NULL, NULL, NULL),
(188, 'Sureshgopi D', NULL, NULL, 'Dhandapani S', 'Kalpana D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas12', NULL, NULL, NULL, NULL),
(189, 'Bindubalaya Dash', NULL, NULL, 'Trilochan Dash', 'Suprava Dash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas13', NULL, NULL, NULL, NULL),
(190, 'Pooja Bharti', NULL, NULL, 'Manjeet Kumar', 'Anita Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas14', NULL, NULL, NULL, NULL),
(191, 'Arifa. P.P', NULL, NULL, 'Muhammad', 'Rabiya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsas15', NULL, NULL, NULL, NULL),
(192, 'Aditi Banerjee', NULL, NULL, 'Subodh Banerjee', 'Rashmi Banerjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc01', NULL, NULL, NULL, NULL),
(193, 'Rohit Raj', NULL, NULL, 'Rajdeo Pandey', 'Anita Pandey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc02', NULL, NULL, NULL, NULL),
(194, 'Anjna Kumari', NULL, NULL, 'Jagveer Singh', 'Raj Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc04', NULL, NULL, NULL, NULL),
(195, 'Priyanka Kumari', NULL, NULL, 'Lal Bihari Singh', 'Poonam Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc05', NULL, NULL, NULL, NULL),
(196, 'Gunjan', NULL, NULL, 'Ritesh Kumar', 'Anju', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc06', NULL, NULL, NULL, NULL),
(197, 'Arjun Kumar Mehara', NULL, NULL, 'Balkrishna Mehara', 'Sushila Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc07', NULL, NULL, NULL, NULL),
(198, 'Chayan Mukherjee', NULL, NULL, 'Chandra Nath Mukherjee', 'Champa Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc08', NULL, NULL, NULL, NULL),
(199, 'Rebati Malik', NULL, NULL, 'Damodar Malik', 'Kausalya Malik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc09', NULL, NULL, NULL, NULL),
(200, 'Arti Negi', NULL, NULL, 'Late. Devender Negi', 'Asha Negi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc10', NULL, NULL, NULL, NULL),
(201, 'Priyanka Padhi', NULL, NULL, 'Manoj Kumar Padhi', 'Geetarani Padhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc11', NULL, NULL, NULL, NULL),
(202, 'Debasis Sahoo', NULL, NULL, 'Naresh Kumar Sahoo', 'Suvadra Sahoo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc12', NULL, NULL, NULL, NULL),
(203, 'Swagata Das', NULL, NULL, 'Jagadish Das', 'Kalpana Das', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc13', NULL, NULL, NULL, NULL),
(204, 'Swastika Dash', NULL, NULL, 'Subhashish Dash', 'Anupama Dash', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc14', NULL, NULL, NULL, NULL),
(205, 'Prareeta Mahapatra', NULL, NULL, 'Pravash Chandra Mahapatra', 'Reena Rani Mahapatra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc15', NULL, NULL, NULL, NULL),
(206, 'Nitin Dogra', NULL, NULL, 'Bikramjit Singh', 'Sushila Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbc16', NULL, NULL, NULL, NULL),
(207, 'Swati Saha', NULL, NULL, 'Subrata Saha', 'Nita Saha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf01', NULL, NULL, NULL, NULL),
(208, 'Pooja Archana Sahani', NULL, NULL, 'Ajaya Kumar Sahani', 'Lalita Sahoo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf02', NULL, NULL, NULL, NULL),
(209, 'Mriganki Singh', NULL, NULL, 'Sanjeev Singh', 'Anita ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf06', NULL, NULL, NULL, NULL),
(210, 'Teena Bansal', NULL, NULL, 'Sunil Bansal', 'Veena Bansal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf07', NULL, NULL, NULL, NULL),
(211, 'Aashi Agrawal', NULL, NULL, 'Sanjay Kumar Agrawal', 'Uma Agrawal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf09', NULL, NULL, NULL, NULL),
(212, 'Megha Ujinwal', NULL, NULL, 'Ashok Kumar', 'Kiran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf11', NULL, NULL, NULL, NULL),
(213, 'Shubani Kumari', NULL, NULL, 'Joginder Nath', 'Sunita Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf12', NULL, NULL, NULL, NULL),
(214, 'Rohan Ranjan Waliya', NULL, NULL, 'Ramesh Ranjan Pandit', 'Shanti Ranjan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf13', NULL, NULL, NULL, NULL),
(215, 'Preety Kumari', NULL, NULL, 'Satyapal Singh', 'Neeraj Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf15', NULL, NULL, NULL, NULL),
(216, 'Usha', NULL, NULL, 'Ram Parsad', 'Om Kala Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsbf16', NULL, NULL, NULL, NULL),
(217, 'Debparna Nandy', NULL, NULL, 'Chinmoy Nandy', 'Anita Nandy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg01', NULL, NULL, NULL, NULL),
(218, 'Neha Gupta', NULL, NULL, 'Jagdish Prasad Garg', 'Suman Garg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg02', NULL, NULL, NULL, NULL),
(219, 'Swati Gupta', NULL, NULL, 'Jai Prakash Gupta', 'Sheela Gupta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg03', NULL, NULL, NULL, NULL),
(220, 'Kamaljyoti Chakravorty', NULL, NULL, 'Birendra Kumar Chakravorty', 'Rina Chakravorty ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg04', NULL, NULL, NULL, NULL),
(221, 'Ritesh Khanna', NULL, NULL, 'Mukesh Khanna', 'Nirmala Khanna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg05', NULL, NULL, NULL, NULL),
(222, 'Deepti Chaudhary', NULL, NULL, 'Balendra Singh', 'Pushpa Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg06', NULL, NULL, NULL, NULL),
(223, 'Kamlesh Bham', NULL, NULL, 'Jeet Singh', 'Savitra Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg07', NULL, NULL, NULL, NULL),
(224, 'Manas Ranjan Sahu', NULL, NULL, 'Sudarsan Sahu', 'Rajeswari Sahu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg08', NULL, NULL, NULL, NULL),
(225, 'Sukhvir Kaur', NULL, NULL, 'Surinder Pal', 'Satwinder Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg10', NULL, NULL, NULL, NULL),
(226, 'Harkanwal Jit Singh', NULL, NULL, 'Tara Singh', 'Jaswinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg11', NULL, NULL, NULL, NULL),
(227, 'Md Momin Ali', NULL, NULL, 'Md Roja Ali', 'Rozidon Khatun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg13', NULL, NULL, NULL, NULL),
(228, 'Dharmendra Kumar', NULL, NULL, 'Rambali Das', 'Asha Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg14', NULL, NULL, NULL, NULL),
(229, 'Saksham Gautam', NULL, NULL, 'Shyam Kumar Gautam', 'Santosh Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslshg15', NULL, NULL, NULL, NULL),
(230, 'Riya Bansal', NULL, NULL, 'Pawan Kumar Bansal', 'Neeru Bansal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms02', NULL, NULL, NULL, NULL),
(231, 'Ritu Kumari', NULL, NULL, 'Loknath Dubey', 'Pramila Dubey', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms04', NULL, NULL, NULL, NULL),
(232, 'Pallavi Samal', NULL, NULL, 'Pabitra Kumar Samal', 'Namita Samal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms05', NULL, NULL, NULL, NULL),
(233, 'Manikonda Vamshi Krishna', NULL, NULL, 'M Krishna', 'M Srilatha', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms06', NULL, NULL, NULL, NULL),
(234, 'Ekta Kashyap', NULL, NULL, 'Anil Kumar Kashyap', 'Yashoda Kashyap', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms07', NULL, NULL, NULL, NULL),
(235, 'Sushant Sagar', NULL, NULL, 'Rajeev Kumar Jaiswal', 'Sudha Jaiswal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms08', NULL, NULL, NULL, NULL),
(236, 'Gourav Chambiyal', NULL, NULL, 'Kartar Singh', 'Prem Lata', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms11', NULL, NULL, NULL, NULL),
(237, 'Jahnavi Kumari Singh', NULL, NULL, 'Veeresh Pratap Singh', 'Neelkamal Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms12', NULL, NULL, NULL, NULL),
(238, 'Dimple Garg', NULL, NULL, 'Naresh Kumar', 'Usha Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms13', NULL, NULL, NULL, NULL),
(239, 'Sarita', NULL, NULL, 'Jagdish Prasad', 'Hansa Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsms14', NULL, NULL, NULL, NULL),
(240, 'Tashvinder Singh', NULL, NULL, 'Sukhpal Singh', 'Parvinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm01', NULL, NULL, NULL, NULL),
(241, 'Amit B Tewari', NULL, NULL, 'Satish Chandra Tewari', 'Anjana Tewari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm02', NULL, NULL, NULL, NULL),
(242, 'Garima Singh', NULL, NULL, 'Fateh Bahadur Singh', 'Ramawati Singh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm03', NULL, NULL, NULL, NULL);
INSERT INTO `students` (`id`, `name`, `gender`, `blood_group`, `father_name`, `mother_name`, `guardian_name`, `aadhaar_no`, `dob`, `nationality`, `religion`, `category`, `sub_category`, `minority`, `supernumerary`, `parents_income`, `economically_backward`, `economically_backward_detail`, `permanent_address`, `present_address`, `state`, `district`, `city_village`, `pin_code`, `email1`, `email2`, `hosteler`, `day_scholar`, `mobile_no`, `emer_contact_no`, `emer_name`, `emer_relation`, `fellowship`, `gap_in_studies`, `migration_character`, `created_at`, `modified_at`, `user_id`, `corrections`, `max_progress`, `ugc_net_subject`, `ugc_net_mnth_yr`, `ugc_net_rollno`, `ugc_net_jrf`, `ugc_net_net`, `ugc_net_exam_type`, `ugc_net_any_other_details`, `programme_id`, `admission_date`, `batch_id`, `date_of_completion`, `registration_no`, `phone`, `address`, `photo`, `selected`) VALUES
(243, 'Anchal Thakur', NULL, NULL, 'Puran Chand Thakur', 'Najo Devi Thakur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm04', NULL, NULL, NULL, NULL),
(244, 'Ankita Sharma', NULL, NULL, 'Laxmi Narayan Sharma', 'Santosh Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm05', NULL, NULL, NULL, NULL),
(245, 'Divya Sharma', NULL, NULL, 'Arun Sharma', 'Renu Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm06', NULL, NULL, NULL, NULL),
(246, 'Bharti Sharma', NULL, NULL, 'Jayanti Prasad Sharma', 'Raj Bala Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm07', NULL, NULL, NULL, NULL),
(247, 'Uradanda Praveen', NULL, NULL, 'U R Rao', 'U Ramanamma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm09', NULL, NULL, NULL, NULL),
(248, 'Ameetha G', NULL, NULL, 'C. Asokakumar', 'Geetha ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm10', NULL, NULL, NULL, NULL),
(249, 'Pritam Kumar', NULL, NULL, 'Dilip Kumar Bhuia', 'Shobha Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm11', NULL, NULL, NULL, NULL),
(250, 'Sapna Goyal', NULL, NULL, 'Laxman Goyal', 'Sunita Goyal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm12', NULL, NULL, NULL, NULL),
(251, 'Shouvik Paul', NULL, NULL, 'Shyamal Kanti Paul', 'Saswati Paul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsmm13', NULL, NULL, NULL, NULL),
(252, 'Vandana', NULL, NULL, 'Bacha Mishra', 'Vimla Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps01', NULL, NULL, NULL, NULL),
(253, 'Reetu', NULL, NULL, 'Manjeet Singh', 'Sushila Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps02', NULL, NULL, NULL, NULL),
(254, 'Archana Samal', NULL, NULL, 'Narendra Kumar Samal', 'Swarnalata Samal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps03', NULL, NULL, NULL, NULL),
(255, 'Diksha Bisht', NULL, NULL, 'Bishan Singh Bisht', 'Pratima Bisht', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps05', NULL, NULL, NULL, NULL),
(256, 'Sayanya Acharya', NULL, NULL, 'Amal Acharya', 'Sriparna Acharya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps06', NULL, NULL, NULL, NULL),
(257, 'Alokesh Ghosh', NULL, NULL, 'Krishna Ghosh', 'Hemlata Kalita Ghosh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps07', NULL, NULL, NULL, NULL),
(258, 'Ajay Prakash Uniyal', NULL, NULL, 'Ram Sharan Uniyal', 'Vinita Uniyal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps08', NULL, NULL, NULL, NULL),
(259, 'Agrah Subash Pradhan', NULL, NULL, 'Subash Pradhan', 'Susama Swain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps09', NULL, NULL, NULL, NULL),
(260, 'Upasana Suman', NULL, NULL, 'Bijay Kumar Sharma', 'Manju Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps10', NULL, NULL, NULL, NULL),
(261, 'Shweta Selpair', NULL, NULL, 'Suresh Kumar', 'Sunita', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps13', NULL, NULL, NULL, NULL),
(262, 'Rajneesh Kumar', NULL, NULL, 'Karam Chand', 'Jogindra Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mslsps15', NULL, NULL, NULL, NULL),
(263, 'Deepali Goyal', NULL, NULL, 'Sunil Kumar Goyal', 'Veena Goyal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath01', NULL, NULL, NULL, NULL),
(264, 'Vijeta Jakhar', NULL, NULL, 'Subha Chand Jakhar', 'Jyotsna Jakhar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath02', NULL, NULL, NULL, NULL),
(265, 'Sujeeta Kumari', NULL, NULL, 'Dilbag Singh', 'Sunita Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath03', NULL, NULL, NULL, NULL),
(266, 'Poulami Paul', NULL, NULL, 'Pradip Kumar Paul', 'Swapna Paul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath04', NULL, NULL, NULL, NULL),
(267, 'Arpita Devi', NULL, NULL, 'Dipu Nath Sharma', 'Dulumoni Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath06', NULL, NULL, NULL, NULL),
(268, 'Minakshi Yadav', NULL, NULL, 'Sarjeet Singh', 'Kamlesh Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath07', NULL, NULL, NULL, NULL),
(269, 'Minakshi Moond', NULL, NULL, 'Shivpal Singh', 'Sumitra Devi ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath08', NULL, NULL, NULL, NULL),
(270, 'Harish Yadav', NULL, NULL, 'Narshi Yadav', 'Hansa Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath09', NULL, NULL, NULL, NULL),
(271, 'Rajesh Kumar', NULL, NULL, 'Devi Lal', 'Sushila', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath10', NULL, NULL, NULL, NULL),
(272, 'Noor Hassan', NULL, NULL, 'Mohd Ibrahim', 'Rakhmat Bi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath11', NULL, NULL, NULL, NULL),
(273, 'Pramod Kumar Nehara', NULL, NULL, 'Gordhan Singh', 'Kamla Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath12', NULL, NULL, NULL, NULL),
(274, 'Garima Garg', NULL, NULL, 'Vijay Kumar Garg', 'Kiran Garg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, NULL, NULL, NULL, '16msmath14', NULL, NULL, NULL, NULL),
(275, 'Sambit Panda', NULL, NULL, 'Jagabandhu Panda', 'Damayanti Padhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy01', NULL, NULL, NULL, NULL),
(276, 'Debalina Chakraborty', NULL, NULL, 'Jayanta Chakraborty', 'Keya Chakraborty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy02', NULL, NULL, NULL, NULL),
(277, 'Deepak Kumar Mishra', NULL, NULL, 'Ajai Kumar Mishra', 'Neelam Mishra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy05', NULL, NULL, NULL, NULL),
(278, 'Ashirbad Padhan', NULL, NULL, 'Dharmadayal Padhan', 'Padmasini Padhan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy06', NULL, NULL, NULL, NULL),
(279, 'Ritu Kumari Pilania', NULL, NULL, 'Dinesh Kumar', 'Santosh Devi ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy07', NULL, NULL, NULL, NULL),
(280, 'Sharshad. K', NULL, NULL, 'Abdul Azeez. K', 'Soudabi. K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy08', NULL, NULL, NULL, NULL),
(281, 'Ajay Kumar', NULL, NULL, 'Pritam Dass', 'Santosh Kumari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy09', NULL, NULL, NULL, NULL),
(282, 'Anamika Kumari', NULL, NULL, 'Pawan Kumar', 'Vibha Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy10', NULL, NULL, NULL, NULL),
(283, 'Rachana Sain', NULL, NULL, 'Raja Ram Sain', 'Kaushalya Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy11', NULL, NULL, NULL, NULL),
(284, 'Rohit Singh Dagar', NULL, NULL, 'Sitaram Dagar', 'Kamla Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy13', NULL, NULL, NULL, NULL),
(285, 'Asha Sheoran', NULL, NULL, 'Sumer Singh', 'Urmila Sheoran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, NULL, NULL, NULL, '16mscphy14', NULL, NULL, NULL, NULL),
(286, 'Mywish Anand', NULL, NULL, 'Shiv Anand', 'Madhu Anand', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, '16msphcp01', NULL, NULL, NULL, NULL),
(287, 'Sawan Kumar Das', NULL, NULL, 'Subodh Kumar Das', 'Kalpana Das', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, '16msphcp02', NULL, NULL, NULL, NULL),
(288, 'Mukesh Jakhar', NULL, NULL, 'Ganesha Ram Jakhar', 'Kamla Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, '16msphcp03', NULL, NULL, NULL, NULL),
(289, 'Moumita Mukherjee', NULL, NULL, 'Dipak Mukherjee', 'Jhunu Mukherjee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, NULL, NULL, NULL, '16msphcp04', NULL, NULL, NULL, NULL),
(290, 'Rishabh Garg', NULL, NULL, 'Ravi Garg', 'Sudesh Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, '16msstat01', NULL, NULL, NULL, NULL),
(291, 'Pratibha Pareek', NULL, NULL, 'Mahesh Kumar Pareek', 'Suchitra Pareek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, '16msstat02', NULL, NULL, NULL, NULL),
(292, 'Purushottam Kumar Nirala', NULL, NULL, 'Raj Kishor Sharma', 'Shanti Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, '16msstat03', NULL, NULL, NULL, NULL),
(293, 'Niharika Bhootna', NULL, NULL, 'Jagdish Bhootna', 'Krishna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, '16msstat04', NULL, NULL, NULL, NULL),
(294, 'Shivani', NULL, NULL, 'Somvir', 'Babita', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, '16msstat05', NULL, NULL, NULL, NULL),
(295, 'Rajendra Singh Rawat', NULL, NULL, 'Kheem Singh Rawat', 'Champa Devi ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt01', NULL, NULL, NULL, NULL),
(296, 'Simran Sidhu', NULL, NULL, 'Ranjit Singh Sidhu', 'Simarjit Kaur Sidhu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt02', NULL, NULL, NULL, NULL),
(297, 'Harshvardhan Deo Solanki', NULL, NULL, 'Surendra Deo Solanki', 'Nalini Solanki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt03', NULL, NULL, NULL, NULL),
(298, 'Mir Mohammad Yousuf', NULL, NULL, 'Mohummad Amin Mir', 'Shameema', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt04', NULL, NULL, NULL, NULL),
(299, 'Gousia Habib', NULL, NULL, 'Habib Ullah Rather', 'Mehbooba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt05', NULL, NULL, NULL, NULL),
(300, 'Astha', NULL, NULL, 'Mahendra Singh', 'Raj Bala Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt06', NULL, NULL, NULL, NULL),
(301, 'Moha Gupta', NULL, NULL, 'Manoj Gupta', 'Anju Gupta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt07', NULL, NULL, NULL, NULL),
(302, 'Daljinder Kaur', NULL, NULL, 'Balveer Singh', 'Jasveer Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt08', NULL, NULL, NULL, NULL),
(303, 'Udit Narayan', NULL, NULL, 'Indra Dev Prasad', 'Kusum Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt09', NULL, NULL, NULL, NULL),
(304, 'Akashdeep Kaur', NULL, NULL, 'Baldev Singh', 'Joginder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt10', NULL, NULL, NULL, NULL),
(305, 'Rajesh Kumar', NULL, NULL, 'Alakhdeo Prasad', 'Kiran Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt11', NULL, NULL, NULL, NULL),
(306, 'Abhishek Kumar', NULL, NULL, 'Kameshwer Prasad', 'Sangeeta Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt13', NULL, NULL, NULL, NULL),
(307, 'Karasala Surya Prakash', NULL, NULL, 'Karasala Premanandam', 'Karasala Gnana Sundari', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt14', NULL, NULL, NULL, NULL),
(308, 'Masrat Rasool', NULL, NULL, 'Gulam Rasool Dar', 'Manzoora', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt15', NULL, NULL, NULL, NULL),
(309, 'Aroof Aimen', NULL, NULL, 'Bashir Ahmad Bhat', 'Zamrooda Akhtar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt16', NULL, NULL, NULL, NULL),
(310, 'Sheikh Irfan Akbar', NULL, NULL, 'Mohd Akbar Sheikh', 'Haleema Bano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt17', NULL, NULL, NULL, NULL),
(311, 'Rayeesa Mehmood', NULL, NULL, 'Gh Mohd Lone', 'Shafiqa Bano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcsnt20', NULL, NULL, NULL, NULL),
(312, 'Harpreet Singh', NULL, NULL, 'Karan Singh', 'Rvinder Kour', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc02', NULL, NULL, NULL, NULL),
(313, 'Jyotiraditya Tripathi', NULL, NULL, 'Gangotri Prasad Tripathi', 'Rudra Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc03', NULL, NULL, NULL, NULL),
(314, 'Harsh Srivastava', NULL, NULL, 'Ram Awadh Lal Srivastava', 'Sudha Srivastava', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc04', NULL, NULL, NULL, NULL),
(315, 'Bhawana Gautam', NULL, NULL, 'Govind Narain Sharma', 'Suman Sharma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc05', NULL, NULL, NULL, NULL),
(316, 'Kamaljeet Kumar', NULL, NULL, 'Pali Ram Sharma', 'Manjeet Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc06', NULL, NULL, NULL, NULL),
(317, 'Toshaljeet Kaur', NULL, NULL, 'Baljit Singh', 'Surinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc07', NULL, NULL, NULL, NULL),
(318, 'Priya Raj', NULL, NULL, 'Arun Raj', 'Manju Raj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc08', NULL, NULL, NULL, NULL),
(319, 'Nayeema Ji', NULL, NULL, 'Gh Nabi Kumar', 'Rafiqa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc09', NULL, NULL, NULL, NULL),
(320, 'Priya Verma', NULL, NULL, 'Satyendra Verma', 'Versha Verma', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc10', NULL, NULL, NULL, NULL),
(321, 'Ubaid Ullah Nagoo', NULL, NULL, 'Mohammad Yousuf', 'Hanifa Yousuf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mtcysc11', NULL, NULL, NULL, NULL),
(322, 'Sabeel Mohammed K', NULL, NULL, 'Abdul Samad K', 'Lahia NV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mbagri01', NULL, NULL, NULL, NULL),
(323, 'Kamaksh Panwar', NULL, NULL, 'Rajesh Panwar', 'Vineeta Panwar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mbagri02', NULL, NULL, NULL, NULL),
(324, 'Priyanka Kumari', NULL, NULL, 'Gajendra Singh', 'Renu Devi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mbagri03', NULL, NULL, NULL, NULL),
(325, 'Binali', NULL, NULL, 'Diwan Chand', 'Deepa Rani', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mbagri04', NULL, NULL, NULL, NULL),
(326, 'Kuldeep Singh', NULL, NULL, 'Jagsir Singh', 'Jaswinder Kaur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mbagri05', NULL, NULL, NULL, NULL),
(327, 'Abinash Kumar Mohanta', NULL, NULL, 'Chakradhara Mohanta', 'Janaki Mohanta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-12-04 11:09:17', '2018-12-04 11:09:17', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16mbagri06', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uploadexcels`
--

CREATE TABLE `uploadexcels` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) NOT NULL DEFAULT '0',
  `data` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploadfiles`
--

CREATE TABLE `uploadfiles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_size` int(11) DEFAULT NULL,
  `photo_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature_size` int(11) DEFAULT NULL,
  `signature_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `otp_timestamp` datetime DEFAULT NULL,
  `otp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp_response` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp_gap` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile`, `role`, `created`, `modified`, `status`, `otp_timestamp`, `otp`, `otp_response`, `otp_gap`, `name`) VALUES
(1, NULL, '$2y$10$me2ZXXm/EQJlv9bWXcmd5.EWOy.eAq1QBzwm.jAX441X3FVgjm.be', 'test@test.com', '9463069882', 'student', '2018-03-28 09:34:16', '2018-07-02 09:28:16', 1, '2018-07-02 14:57:39', 'GRP8GWFH', '', 1, 'Test'),
(2, NULL, '$2y$10$rujslblbEDk18i990ARF4etBW46e0oB9yuYVsOXRQ3bF216mFgWXq', 'abc@yahoo.com', '9781380780', 'student', '2018-03-28 15:08:42', '2018-04-05 06:39:38', 1, '2018-04-05 12:09:36', 'W4JH83F7', '\n173745154-2018_04_05', NULL, 'Abc'),
(4, NULL, '$2y$10$me2ZXXm/EQJlv9bWXcmd5.EWOy.eAq1QBzwm.jAX441X3FVgjm.be', 'sa@cup.edu.in', '9463069882', 'examination', '2018-04-14 09:25:03', '2018-04-14 09:25:03', 1, NULL, NULL, NULL, NULL, 'Test Account (Admin)'),
(5, NULL, '$2y$10$fQtwZtnoU8U2KvT04uvqf.yIih2HMrE4cMWS/BPye6iqY3DR5XyNO', 'satwinder.singh@cup.edu.in', '9300064064', 'student', '2018-07-18 07:39:36', '2018-07-18 07:39:36', 1, NULL, NULL, NULL, NULL, 'satwinder Singh'),
(6, NULL, '$2y$10$dRTdE1Q2YBYBO8O2SRpA1eqKkKG13guHTokPr21f55Hq5GXjIU6vC', 'satwindercse@gmail.com', '9300064064', 'student', '2018-07-18 07:41:53', '2018-07-18 07:47:51', 1, '2018-07-18 13:17:51', '3J9WKD6W', '', 1, 'satwinder Singh'),
(7, NULL, '$2y$10$7bcJA8OEBI847uzE9uYD/O48IQP.pJvLZahKe9kkPzI6wrGKv9yzO', 'amandeep.cup@gmail.com', '9501022809', 'student', '2018-07-18 07:43:51', '2018-07-18 07:43:51', 1, NULL, NULL, NULL, NULL, 'Amandeep Singh'),
(8, NULL, '$2y$10$Dgc.yejwojRyhxefTKhGkeu8MdMXC0SHJzaFBdOM8E9y.YsbEp11e', 'amanbrar82@gmail.com', '9501022809', 'student', '2018-07-18 07:45:32', '2018-07-18 07:45:32', 1, NULL, NULL, NULL, NULL, 'Amandeep Singh'),
(9, NULL, '$2y$10$YANZ.Pnjc1dk8dHxOEqGH.yY0QD5rkc1NyvsRUq4pwCxFsyGAqAf2', 'amandeepsingh@cup.edu.in', '9501022809', 'student', '2018-07-18 07:46:22', '2018-07-18 07:46:22', 1, NULL, NULL, NULL, NULL, 'Amandeep Singh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_offered`
--
ALTER TABLE `courses_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_programmes`
--
ALTER TABLE `courses_programmes`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `courses_students`
--
ALTER TABLE `courses_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination_marks`
--
ALTER TABLE `examination_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examination_results`
--
ALTER TABLE `examination_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marksgplg`
--
ALTER TABLE `marksgplg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pings`
--
ALTER TABLE `pings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes_offered`
--
ALTER TABLE `programmes_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course_offereds`
--
ALTER TABLE `student_course_offereds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadexcels`
--
ALTER TABLE `uploadexcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadfiles`
--
ALTER TABLE `uploadfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `courses_offered`
--
ALTER TABLE `courses_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `courses_programmes`
--
ALTER TABLE `courses_programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courses_students`
--
ALTER TABLE `courses_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `examination_marks`
--
ALTER TABLE `examination_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `examination_results`
--
ALTER TABLE `examination_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marksgplg`
--
ALTER TABLE `marksgplg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `pings`
--
ALTER TABLE `pings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `programmes_offered`
--
ALTER TABLE `programmes_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_course_offereds`
--
ALTER TABLE `student_course_offereds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;
--
-- AUTO_INCREMENT for table `uploadexcels`
--
ALTER TABLE `uploadexcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `uploadfiles`
--
ALTER TABLE `uploadfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
