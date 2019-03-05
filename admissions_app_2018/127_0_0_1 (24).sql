-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 01:29 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admissions2018`
--
CREATE DATABASE IF NOT EXISTS `admissions2018` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `admissions2018`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cancelseats`
--

CREATE TABLE `cancelseats` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ac_owner_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ifs_code` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `branch_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fee_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cucet_roll_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cucet_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `aadhar_no` varchar(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ward_of_def` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kashmiri_mig` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `qualif_degree` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualif_maj_subjects` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualif_result_declared` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualif_marks_obtained` decimal(12,2) DEFAULT NULL,
  `qualif_total_marks` decimal(12,2) DEFAULT NULL,
  `valid_gate_gpat` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ggp_exam` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ggp_roll_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ggp_year_passing` int(11) DEFAULT NULL,
  `ggp_marksobtained_rank` int(11) DEFAULT NULL,
  `hostel_acco` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `centres`
--

CREATE TABLE `centres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `coc_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coc_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cocs`
--

CREATE TABLE `cocs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre_id` int(11) DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cucets`
--

CREATE TABLE `cucets` (
  `id` int(11) NOT NULL,
  `ApplicationID` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `Category` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MobileNo` bigint(20) NOT NULL,
  `EmailID` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UniversityName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CourseCode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cucet_result`
--

CREATE TABLE `cucet_result` (
  `id` int(11) NOT NULL,
  `ApplicationID` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Rollno` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vTestpaperCode` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iCourseCode` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SubjectName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EmailId` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MobileNo` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gender` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Category` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FName` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Part_A` decimal(12,2) DEFAULT NULL,
  `Part_B` decimal(12,2) DEFAULT NULL,
  `TOTAL_MARKS` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deans`
--

CREATE TABLE `deans` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `response_code` int(11) DEFAULT NULL,
  `payment_date_created` datetime DEFAULT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `payment_amount` int(11) DEFAULT NULL,
  `payment_transaction_id` bigint(20) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats`
--

CREATE TABLE `lockseats` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180621`
--

CREATE TABLE `lockseats_20180621` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180622`
--

CREATE TABLE `lockseats_20180622` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180625`
--

CREATE TABLE `lockseats_20180625` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180628`
--

CREATE TABLE `lockseats_20180628` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180711`
--

CREATE TABLE `lockseats_20180711` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180715`
--

CREATE TABLE `lockseats_20180715` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180716`
--

CREATE TABLE `lockseats_20180716` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180718_special`
--

CREATE TABLE `lockseats_20180718_special` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180718_supernumerary`
--

CREATE TABLE `lockseats_20180718_supernumerary` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockseats_20180724`
--

CREATE TABLE `lockseats_20180724` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rank_id` int(11) DEFAULT NULL,
  `eligible_for_open` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Eligible = 1, Not Eligible = 0;',
  `category_pref` int(11) DEFAULT NULL,
  `pwd` int(11) DEFAULT NULL,
  `wardofdef_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `no_of_seats`
--

CREATE TABLE `no_of_seats` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `no_of_seats_revised_20180704`
--

CREATE TABLE `no_of_seats_revised_20180704` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `no_of_seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `marks_A` decimal(11,2) DEFAULT NULL,
  `marks_B` decimal(11,2) DEFAULT NULL,
  `marks_total` decimal(11,2) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `testpaper_id` int(11) DEFAULT NULL,
  `selected` int(11) DEFAULT NULL,
  `second_round` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences_new`
--

CREATE TABLE `preferences_new` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `marks_A` decimal(11,2) DEFAULT NULL,
  `marks_B` decimal(11,2) DEFAULT NULL,
  `marks_total` decimal(11,2) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `testpaper_id` int(11) DEFAULT NULL,
  `selected` int(11) DEFAULT NULL,
  `ApplicationID` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `testpaper_code` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cucet_part_B` decimal(11,2) DEFAULT NULL,
  `cucet_total_marks` decimal(11,2) DEFAULT NULL,
  `checked` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences_temp`
--

CREATE TABLE `preferences_temp` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `marks_A` decimal(11,2) DEFAULT NULL,
  `marks_B` decimal(11,2) DEFAULT NULL,
  `marks_total` decimal(11,2) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `testpaper_id` int(11) DEFAULT NULL,
  `selected` int(11) DEFAULT NULL,
  `second_round` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preferences_temp1`
--

CREATE TABLE `preferences_temp1` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `marks_A` decimal(11,2) DEFAULT NULL,
  `marks_B` decimal(11,2) DEFAULT NULL,
  `marks_total` decimal(11,2) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `testpaper_id` int(11) DEFAULT NULL,
  `selected` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centre_id` int(11) DEFAULT NULL,
  `eligibility` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `candidate_category` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `marks_total` decimal(11,2) DEFAULT NULL,
  `marks_A` decimal(11,2) DEFAULT NULL,
  `marks_B` decimal(11,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `offered_seat` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rankings_20180707`
--

CREATE TABLE `rankings_20180707` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `candidate_category` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `marks_total` decimal(11,2) DEFAULT NULL,
  `marks_A` decimal(11,2) DEFAULT NULL,
  `marks_B` decimal(11,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `offered_seat` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rankings_20180718`
--

CREATE TABLE `rankings_20180718` (
  `id` int(11) NOT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `candidate_category` int(11) DEFAULT NULL,
  `final_category_id` int(11) DEFAULT NULL,
  `marks_total` decimal(11,2) DEFAULT NULL,
  `marks_A` decimal(11,2) DEFAULT NULL,
  `marks_B` decimal(11,2) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `years` int(11) DEFAULT NULL,
  `months` int(11) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `offered_seat` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seatallocations`
--

CREATE TABLE `seatallocations` (
  `id` int(11) NOT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `centre_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `seat_no` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `fee_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `verified_fee` int(11) DEFAULT NULL,
  `cancelled_fee_id_C1` int(11) DEFAULT NULL,
  `cancelled_fee_id_C2R1` int(11) DEFAULT NULL,
  `cancelled_fee_id_C2R2` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3A` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R2` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R2A` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R3` int(11) DEFAULT NULL,
  `cancelled_fee_C3R3A` int(11) DEFAULT NULL,
  `cancelled_fee_C3R3B` int(11) DEFAULT NULL,
  `cancelled_fee_C3R3C` int(11) DEFAULT NULL,
  `cancelled_fee_C4R1` int(11) DEFAULT NULL,
  `cancelled_fee_C4R2` int(11) DEFAULT NULL,
  `cancelled_fee_C4R3` int(11) DEFAULT NULL,
  `cancelled_fee_C4R4` int(11) DEFAULT NULL,
  `cancelled_fee_C4R5` int(11) DEFAULT NULL,
  `cancelled_fee_C5R1` int(11) DEFAULT NULL,
  `cancelled_fee_C5R2` int(11) DEFAULT NULL,
  `forced_cancelled` int(11) DEFAULT NULL,
  `cancelled_fee_C5R3` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats_backup_18062018`
--

CREATE TABLE `seats_backup_18062018` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `seat_no` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `fee_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `verified_fee` int(11) DEFAULT NULL,
  `cancelled_fee_id_C1` int(11) DEFAULT NULL,
  `cancelled_fee_id_C2R1` int(11) DEFAULT NULL,
  `cancelled_fee_id_C2R2` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3A` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R2` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R2A` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R3` int(11) DEFAULT NULL,
  `forced_cancelled` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats_backup_20180703`
--

CREATE TABLE `seats_backup_20180703` (
  `id` int(11) NOT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `seat_no` int(11) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `fee_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `verified_fee` int(11) DEFAULT NULL,
  `cancelled_fee_id_C1` int(11) DEFAULT NULL,
  `cancelled_fee_id_C2R1` int(11) DEFAULT NULL,
  `cancelled_fee_id_C2R2` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3A` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R2` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R2A` int(11) DEFAULT NULL,
  `cancelled_fee_id_C3R3` int(11) DEFAULT NULL,
  `forced_cancelled` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `expires` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testpapers`
--

CREATE TABLE `testpapers` (
  `id` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testpapers_programmes`
--

CREATE TABLE `testpapers_programmes` (
  `id` int(11) NOT NULL,
  `testpaper_id` int(11) DEFAULT NULL,
  `programme_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploadfiles`
--

CREATE TABLE `uploadfiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  `user_id` int(10) UNSIGNED NOT NULL
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
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username_dup` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_backup_before_patch`
--

CREATE TABLE `users_backup_before_patch` (
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
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelseats`
--
ALTER TABLE `cancelseats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cand_user_idx` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_user_idx` (`user_id`);

--
-- Indexes for table `centres`
--
ALTER TABLE `centres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `centre_school_idx` (`school_id`),
  ADD KEY `centre_userid_idx` (`user_id`);

--
-- Indexes for table `cocs`
--
ALTER TABLE `cocs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cucets`
--
ALTER TABLE `cucets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `MobileNo_index` (`MobileNo`),
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `cucet_result`
--
ALTER TABLE `cucet_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deans`
--
ALTER TABLE `deans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lockseats`
--
ALTER TABLE `lockseats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180621`
--
ALTER TABLE `lockseats_20180621`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180622`
--
ALTER TABLE `lockseats_20180622`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180625`
--
ALTER TABLE `lockseats_20180625`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180628`
--
ALTER TABLE `lockseats_20180628`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180711`
--
ALTER TABLE `lockseats_20180711`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180715`
--
ALTER TABLE `lockseats_20180715`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180716`
--
ALTER TABLE `lockseats_20180716`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180718_special`
--
ALTER TABLE `lockseats_20180718_special`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180718_supernumerary`
--
ALTER TABLE `lockseats_20180718_supernumerary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `lockseats_20180724`
--
ALTER TABLE `lockseats_20180724`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eligible_idx` (`eligible_for_open`);

--
-- Indexes for table `no_of_seats`
--
ALTER TABLE `no_of_seats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `no_of_seats_revised_20180704`
--
ALTER TABLE `no_of_seats_revised_20180704`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pref_unique` (`candidate_id`,`programme_id`),
  ADD KEY `preference_candidate_idx` (`candidate_id`),
  ADD KEY `preference_programme_idx` (`programme_id`),
  ADD KEY `pref_user_idx` (`user_id`);

--
-- Indexes for table `preferences_new`
--
ALTER TABLE `preferences_new`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidate_id` (`candidate_id`,`programme_id`),
  ADD KEY `preference_candidate_idx` (`candidate_id`),
  ADD KEY `preference_programme_idx` (`programme_id`),
  ADD KEY `pref_user_idx` (`user_id`),
  ADD KEY `ApplicationID` (`ApplicationID`),
  ADD KEY `testpaper_code` (`testpaper_code`);

--
-- Indexes for table `preferences_temp`
--
ALTER TABLE `preferences_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pref_unique` (`candidate_id`,`programme_id`),
  ADD KEY `preference_candidate_idx` (`candidate_id`),
  ADD KEY `preference_programme_idx` (`programme_id`),
  ADD KEY `pref_user_idx` (`user_id`);

--
-- Indexes for table `preferences_temp1`
--
ALTER TABLE `preferences_temp1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pref_unique` (`candidate_id`,`programme_id`),
  ADD KEY `preference_candidate_idx` (`candidate_id`),
  ADD KEY `preference_programme_idx` (`programme_id`),
  ADD KEY `pref_user_idx` (`user_id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_centre_idx` (`centre_id`),
  ADD KEY `programme_user_idx` (`user_id`);

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings_20180707`
--
ALTER TABLE `rankings_20180707`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rankings_20180718`
--
ALTER TABLE `rankings_20180718`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `schools_user_idx` (`user_id`);

--
-- Indexes for table `seatallocations`
--
ALTER TABLE `seatallocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `allo_candidate_idx` (`candidate_id`),
  ADD KEY `allo_seats_idx` (`seat_id`),
  ADD KEY `allo_users_idx` (`user_id`),
  ADD KEY `allo_cocs_idx` (`centre_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_seats_idx` (`programme_id`),
  ADD KEY `seats_category_idx` (`category_id`),
  ADD KEY `seats_candidate_idx` (`candidate_id`),
  ADD KEY `seats_users_idx` (`user_id`);

--
-- Indexes for table `seats_backup_18062018`
--
ALTER TABLE `seats_backup_18062018`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_seats_idx` (`programme_id`),
  ADD KEY `seats_category_idx` (`category_id`),
  ADD KEY `seats_candidate_idx` (`candidate_id`),
  ADD KEY `seats_users_idx` (`user_id`);

--
-- Indexes for table `seats_backup_20180703`
--
ALTER TABLE `seats_backup_20180703`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programme_seats_idx` (`programme_id`),
  ADD KEY `seats_category_idx` (`category_id`),
  ADD KEY `seats_candidate_idx` (`candidate_id`),
  ADD KEY `seats_users_idx` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testpapers`
--
ALTER TABLE `testpapers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paper_code` (`code`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `testpapers_programmes`
--
ALTER TABLE `testpapers_programmes`
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
  ADD UNIQUE KEY `username_unique` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users_backup_before_patch`
--
ALTER TABLE `users_backup_before_patch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_unique` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cancelseats`
--
ALTER TABLE `cancelseats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `centres`
--
ALTER TABLE `centres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cocs`
--
ALTER TABLE `cocs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cucets`
--
ALTER TABLE `cucets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cucet_result`
--
ALTER TABLE `cucet_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deans`
--
ALTER TABLE `deans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats`
--
ALTER TABLE `lockseats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180621`
--
ALTER TABLE `lockseats_20180621`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180622`
--
ALTER TABLE `lockseats_20180622`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180625`
--
ALTER TABLE `lockseats_20180625`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180628`
--
ALTER TABLE `lockseats_20180628`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180711`
--
ALTER TABLE `lockseats_20180711`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180715`
--
ALTER TABLE `lockseats_20180715`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180716`
--
ALTER TABLE `lockseats_20180716`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180718_special`
--
ALTER TABLE `lockseats_20180718_special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180718_supernumerary`
--
ALTER TABLE `lockseats_20180718_supernumerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockseats_20180724`
--
ALTER TABLE `lockseats_20180724`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences_temp`
--
ALTER TABLE `preferences_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preferences_temp1`
--
ALTER TABLE `preferences_temp1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rankings_20180707`
--
ALTER TABLE `rankings_20180707`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rankings_20180718`
--
ALTER TABLE `rankings_20180718`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seatallocations`
--
ALTER TABLE `seatallocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats_backup_18062018`
--
ALTER TABLE `seats_backup_18062018`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats_backup_20180703`
--
ALTER TABLE `seats_backup_20180703`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testpapers`
--
ALTER TABLE `testpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testpapers_programmes`
--
ALTER TABLE `testpapers_programmes`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_backup_before_patch`
--
ALTER TABLE `users_backup_before_patch`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `centres`
--
ALTER TABLE `centres`
  ADD CONSTRAINT `centre_school` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preference_candidate` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `preference_programme` FOREIGN KEY (`programme_id`) REFERENCES `programmes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `programme_centre` FOREIGN KEY (`centre_id`) REFERENCES `centres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
