-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 12:30 PM
-- Server version: 5.7.33
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 8, '2023-04-18', 20000, '2023-04-18 06:37:16', '2023-04-18 06:37:16'),
(2, 8, '2023-04-13', 20000, '2023-04-18 06:40:16', '2023-04-18 06:40:16'),
(3, 13, '2023-04-18', 30000, '2023-04-18 06:50:28', '2023-04-18 06:50:28'),
(4, 8, '2023-04-19', 20000, '2023-04-18 22:54:18', '2023-04-18 22:54:18'),
(5, 9, '2023-04-19', 8000, '2023-04-18 22:54:18', '2023-04-18 22:54:18'),
(6, 11, '2023-04-19', 35300, '2023-04-18 22:54:18', '2023-04-18 22:54:18'),
(7, 12, '2023-04-19', 15500, '2023-04-18 22:54:18', '2023-04-18 22:54:18'),
(8, 13, '2023-04-19', 30000, '2023-04-18 22:54:18', '2023-04-18 22:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `student_id`, `year_id`, `class_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 5, 1, '2023-02-21', 884, '2023-02-21 07:24:53', '2023-02-21 07:24:53'),
(2, 6, 1, 2, 1, '2023-02-21', 428, '2023-02-21 07:25:14', '2023-02-21 07:25:14'),
(3, 11, 6, 5, 1, '2023-04-18', 233, '2023-04-18 06:59:30', '2023-04-18 06:59:30'),
(4, 15, 1, 1, 1, '2018-04-11', 400, '2023-04-21 06:25:59', '2023-04-21 06:25:59'),
(5, 5, 6, 5, 3, '2023-04-21', 950, '2023-04-21 06:28:19', '2023-04-21 06:28:19'),
(6, 11, 6, 5, 3, '2023-04-21', 250, '2023-04-21 06:28:19', '2023-04-21 06:28:19'),
(7, 13, 6, 5, 3, '2023-04-21', 800, '2023-04-21 06:28:19', '2023-04-21 06:28:19'),
(8, 5, 6, 5, 2, '2023-04-21', 475, '2023-04-21 06:28:41', '2023-04-21 06:28:41'),
(9, 11, 6, 5, 2, '2023-04-21', 125, '2023-04-21 06:28:41', '2023-04-21 06:28:41'),
(10, 13, 6, 5, 2, '2023-04-21', 400, '2023-04-21 06:28:41', '2023-04-21 06:28:41'),
(11, 5, 6, 5, 1, '2023-04-21', 884, '2023-04-21 06:28:59', '2023-04-21 06:28:59'),
(12, 11, 6, 5, 1, '2023-04-21', 233, '2023-04-21 06:28:59', '2023-04-21 06:28:59'),
(13, 13, 6, 5, 1, '2023-04-21', 744, '2023-04-21 06:28:59', '2023-04-21 06:28:59'),
(14, 5, 6, 5, 3, '2023-04-21', 61750, '2023-04-21 06:35:57', '2023-04-21 06:35:57'),
(15, 11, 6, 5, 3, '2023-04-21', 16250, '2023-04-21 06:35:57', '2023-04-21 06:35:57'),
(16, 13, 6, 5, 3, '2023-04-21', 52000, '2023-04-21 06:35:57', '2023-04-21 06:35:57'),
(17, 16, 6, 6, 3, '2023-04-21', 90000, '2023-04-21 06:45:18', '2023-04-21 06:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_class_id` int(11) DEFAULT NULL,
  `student_group_id` int(11) DEFAULT NULL,
  `student_shift_id` int(11) DEFAULT NULL,
  `student_year_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `role`, `student_class_id`, `student_group_id`, `student_shift_id`, `student_year_id`, `created_at`, `updated_at`) VALUES
(1, 5, '1', 5, 1, 1, 6, '2023-01-12 23:42:05', '2023-01-16 23:41:40'),
(2, 6, '11', 2, 2, 2, 1, '2023-01-13 00:41:18', '2023-01-16 23:59:24'),
(3, 7, NULL, 3, 2, 3, 3, '2023-01-13 01:57:47', '2023-01-13 01:57:47'),
(4, 8, '4', 2, 2, 3, 2, '2023-01-13 03:30:02', '2023-01-17 00:04:11'),
(5, 9, NULL, 3, 1, 1, 2, '2023-01-13 03:38:02', '2023-01-13 05:41:04'),
(6, 10, '12', 2, 2, 2, 1, '2023-01-13 04:16:36', '2023-01-16 23:59:24'),
(7, 11, '2', 5, 1, 2, 6, '2023-01-13 04:24:47', '2023-01-16 23:41:40'),
(8, 12, '15', 1, 1, 1, 3, '2023-01-13 04:28:42', '2023-02-03 00:14:04'),
(9, 13, '3', 5, 2, 2, 6, '2023-01-13 05:21:26', '2023-01-16 23:41:40'),
(10, 10, '5', 2, 2, 2, 2, '2023-01-16 00:05:47', '2023-01-17 00:04:11'),
(11, 8, NULL, 3, 2, 3, 3, '2023-01-16 00:08:32', '2023-01-16 00:08:32'),
(12, 12, NULL, 2, 1, 1, 4, '2023-01-16 00:15:45', '2023-01-16 00:15:45'),
(13, 6, '13', 2, 2, 2, 2, '2023-01-17 00:03:41', '2023-01-17 00:04:11'),
(14, 15, '119', 1, 1, 1, 1, '2023-04-21 06:08:29', '2023-04-21 06:09:14'),
(15, 16, '30', 6, 1, 1, 6, '2023-04-21 06:38:18', '2023-04-21 06:42:34');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` int(11) NOT NULL,
  `pass_mark` int(11) NOT NULL,
  `subjective` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective`, `created_at`, `updated_at`) VALUES
(15, 1, 4, 100, 33, 100, '2023-02-02 06:33:57', '2023-02-02 06:33:57'),
(16, 1, 5, 100, 33, 100, '2023-02-02 06:33:57', '2023-02-02 06:33:57'),
(17, 1, 6, 100, 33, 100, '2023-02-02 06:33:57', '2023-02-02 06:33:57'),
(18, 1, 9, 100, 33, 100, '2023-02-02 06:33:57', '2023-02-02 06:33:57'),
(19, 1, 10, 100, 33, 100, '2023-02-02 06:33:57', '2023-02-02 06:33:57'),
(20, 2, 4, 100, 33, 100, '2023-02-02 06:34:03', '2023-02-02 06:34:03'),
(21, 2, 5, 100, 33, 100, '2023-02-02 06:34:03', '2023-02-02 06:34:03'),
(22, 2, 6, 100, 33, 100, '2023-02-02 06:34:03', '2023-02-02 06:34:03'),
(23, 3, 4, 100, 33, 100, '2023-02-02 06:34:11', '2023-02-02 06:34:11'),
(24, 3, 5, 100, 33, 100, '2023-02-02 06:34:11', '2023-02-02 06:34:11'),
(25, 3, 6, 100, 33, 100, '2023-02-02 06:34:11', '2023-02-02 06:34:11'),
(26, 4, 4, 100, 33, 100, '2023-02-02 06:34:15', '2023-02-02 06:34:15'),
(27, 4, 5, 100, 33, 100, '2023-02-02 06:34:15', '2023-02-02 06:34:15'),
(28, 4, 6, 100, 33, 100, '2023-02-02 06:34:15', '2023-02-02 06:34:15'),
(29, 5, 7, 100, 33, 100, '2023-02-02 06:34:46', '2023-02-02 06:34:46'),
(30, 5, 8, 100, 33, 100, '2023-02-02 06:34:46', '2023-02-02 06:34:46'),
(31, 5, 9, 100, 33, 100, '2023-02-02 06:34:46', '2023-02-02 06:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Teacher', '2023-01-19 00:14:10', '2023-01-19 00:14:10'),
(2, 'HOD', '2023-01-19 00:14:25', '2023-01-19 00:14:25'),
(3, 'Assistant Teacher', '2023-01-19 00:15:01', '2023-01-19 00:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2023-01-12 23:42:05', '2023-01-12 23:42:05'),
(2, 2, 1, 5, '2023-01-13 00:41:18', '2023-01-13 00:41:18'),
(3, 3, 1, 10, '2023-01-13 01:57:47', '2023-01-13 01:57:47'),
(4, 4, 1, 10, '2023-01-13 03:30:02', '2023-01-13 03:30:02'),
(5, 5, 1, 10, '2023-01-13 03:38:02', '2023-01-13 05:41:04'),
(6, 6, 1, 5, '2023-01-13 04:16:36', '2023-01-13 04:16:36'),
(7, 7, 1, 75, '2023-01-13 04:24:47', '2023-01-13 05:43:01'),
(8, 8, 1, 2, '2023-01-13 04:28:42', '2023-01-13 05:44:41'),
(9, 9, 1, 20, '2023-01-13 05:21:26', '2023-01-13 05:46:17'),
(10, 2, 1, 5, '2023-01-13 05:36:24', '2023-01-13 05:36:24'),
(11, 10, 1, 5, '2023-01-16 00:05:47', '2023-01-16 00:05:47'),
(12, 11, 1, 10, '2023-01-16 00:08:32', '2023-01-16 00:08:32'),
(13, 12, 1, 2, '2023-01-16 00:15:45', '2023-01-16 00:15:45'),
(14, 13, 1, 5, '2023-01-17 00:03:41', '2023-01-17 00:03:41'),
(15, 14, 1, NULL, '2023-04-21 06:08:29', '2023-04-21 06:08:29'),
(16, 15, 1, NULL, '2023-04-21 06:38:18', '2023-04-21 06:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `mobile`, `gender`, `address`, `image`, `id_no`, `dob`, `code`, `join_date`, `designation_id`, `salary`, `status`, `role`, `password`, `created_at`, `updated_at`) VALUES
(8, 'Bharat Prajapati', 'bharat@glasier.in', '8574563523', 'Male', 'Ahmedabad', '202301190842patrick2.jpg', '2009020001', '1995-10-24', '8695', '2009-02-11', '2', '20000', NULL, NULL, '$2y$10$FXKJIxASGZb5yoPmuIneS.WXQ8cXsDcj0Ne1wCk7IzATGiPyKuvaa', '2023-01-19 03:12:38', '2023-01-19 03:12:38'),
(9, 'chirag', 'chirag@gmail.com', '8524163201', 'Male', 'canada', '202301191030karena_354x354_mills.jpg', '2001080001', '1970-12-15', '6050', '2001-08-24', '3', '8000', NULL, NULL, '$2y$10$I08V2bwnngb1SHZaObJgIuG297GGxRYPA6jtac9j1WFA8WELifY52', '2023-01-19 03:14:51', '2023-02-01 00:16:11'),
(11, 'Rajesh', 'rajesh@gmail.com', '4582635236', 'Male', 'USA', '202302010545patrick2.jpg', '2000040001', '1970-02-09', '6928', '2000-04-06', '1', '35300', NULL, NULL, '$2y$10$ZnLOI1PgbVxur2FFB0NY9u9lxXfCmsgNQIu2g/FxL3Uz/EE.22t6G', '2023-01-19 23:31:04', '2023-02-01 00:15:56'),
(12, 'Anil Patel', 'anil@gmail.com', '5236415230', 'Male', 'India', '202301201019IMG_5509-375x500.jpg', '1995080001', '1968-02-10', '8080', '1995-08-15', '3', '15500', NULL, NULL, '$2y$10$dvhaBTjm2RvJAuSXXTyOy.PyuiV0rwpTTmh3m9aYI1qicUstNSiLa', '2023-01-20 04:49:05', '2023-01-20 04:50:01'),
(13, 'Raj Kishor', 'rajkishor@gmail.com', '8549656323', 'Male', 'Pune', '202304181053202301191030karena_354x354_mills.jpg', '2003040001', '1974-02-13', '9832', '2003-04-23', '1', '30000', NULL, NULL, '$2y$10$oW5vn5pgtrUullsQnYnGJOJOrdJ3i6rrkglAoEvdmIKnl5Lg/0oZ.', '2023-04-18 05:22:55', '2023-04-18 05:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `employeesalaries`
--

CREATE TABLE `employeesalaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_salary` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employeesalaries`
--

INSERT INTO `employeesalaries` (`id`, `emp_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_salary`, `created_at`, `updated_at`) VALUES
(1, 8, 20000, 20000, 0, '2009-02-11', '2023-01-19 03:12:38', '2023-01-19 03:12:38'),
(2, 9, 60000, 60000, 0, '2001-08-24', '2023-01-19 03:14:51', '2023-01-19 03:14:51'),
(3, 10, 1500, 1500, 0, '2009-02-25', '2023-01-19 03:27:52', '2023-01-19 03:27:52'),
(4, 11, NULL, NULL, 0, '2020-12-01', '2023-01-19 03:37:43', '2023-01-19 03:37:43'),
(5, 13, 1000, 1000, 0, '2023-01-09', '2023-01-19 05:10:55', '2023-01-19 05:10:55'),
(6, 11, 35000, 35000, 0, '2000-04-06', '2023-01-19 23:31:04', '2023-01-19 23:31:04'),
(7, 8, 20000, NULL, 20000, NULL, '2023-01-20 01:17:15', '2023-01-20 01:17:15'),
(8, 10, 1500, NULL, 2000, NULL, '2023-01-20 01:17:29', '2023-01-20 01:17:29'),
(9, 10, 2001, NULL, 2002, '1970-01-01', '2023-01-20 01:23:19', '2023-01-20 01:23:19'),
(10, 10, 2002, NULL, 2003, '1970-01-01', '2023-01-20 01:23:51', '2023-01-20 01:23:51'),
(11, 10, 2003, NULL, 2003, '2023-01-20', '2023-01-20 01:25:37', '2023-01-20 01:25:37'),
(12, 10, 2003, 2100, 97, '2023-01-20', '2023-01-20 01:30:33', '2023-01-20 01:30:33'),
(13, 9, 6000, 7000, 1000, '2023-01-20', '2023-01-20 03:56:13', '2023-01-20 03:56:13'),
(14, 11, 35000, 35150, 150, '2023-01-20', '2023-01-20 04:08:32', '2023-01-20 04:08:32'),
(15, 11, 35150, 35300, 150, '2023-02-01', '2023-01-20 04:09:01', '2023-01-20 04:09:01'),
(16, 12, 15000, 15000, 0, '1995-08-15', '2023-01-20 04:49:05', '2023-01-20 04:49:05'),
(17, 12, 15000, 15500, 500, '2023-01-01', '2023-01-20 04:50:01', '2023-01-20 04:50:01'),
(18, 9, 7000, 8000, 1000, '2023-01-24', '2023-01-24 06:56:28', '2023-01-24 06:56:28'),
(19, 13, 30000, 30000, 0, '2003-04-23', '2023-04-18 05:22:55', '2023-04-18 05:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(1, 8, '2023-01-02', 'Present', '2023-02-02 01:20:21', '2023-02-02 01:20:21'),
(2, 9, '2023-01-02', 'Present', '2023-02-02 01:20:21', '2023-02-02 01:20:21'),
(3, 11, '2023-01-02', 'Present', '2023-02-02 01:20:21', '2023-02-02 01:20:21'),
(4, 12, '2023-01-02', 'Present', '2023-02-02 01:20:21', '2023-02-02 01:20:21'),
(5, 8, '2023-02-01', 'Absent', '2023-02-02 01:20:36', '2023-02-02 01:20:36'),
(6, 9, '2023-02-01', 'Absent', '2023-02-02 01:20:36', '2023-02-02 01:20:36'),
(7, 11, '2023-02-01', 'Absent', '2023-02-02 01:20:36', '2023-02-02 01:20:36'),
(8, 12, '2023-02-01', 'Present', '2023-02-02 01:20:36', '2023-02-02 01:20:36'),
(9, 8, '2023-04-18', 'Present', '2023-04-18 06:13:40', '2023-04-18 06:13:40'),
(10, 9, '2023-04-18', 'Present', '2023-04-18 06:13:40', '2023-04-18 06:13:40'),
(11, 11, '2023-04-18', 'Present', '2023-04-18 06:13:40', '2023-04-18 06:13:40'),
(12, 12, '2023-04-18', 'Present', '2023-04-18 06:13:40', '2023-04-18 06:13:40'),
(13, 13, '2023-04-18', 'Present', '2023-04-18 06:13:40', '2023-04-18 06:13:40'),
(14, 8, '2023-04-01', 'Present', '2023-04-20 23:05:10', '2023-04-20 23:05:10'),
(15, 9, '2023-04-01', 'Present', '2023-04-20 23:05:11', '2023-04-20 23:05:11'),
(16, 11, '2023-04-01', 'Present', '2023-04-20 23:05:11', '2023-04-20 23:05:11'),
(17, 12, '2023-04-01', 'Present', '2023-04-20 23:05:11', '2023-04-20 23:05:11'),
(18, 13, '2023-04-01', 'Present', '2023-04-20 23:05:11', '2023-04-20 23:05:11'),
(19, 8, '2023-04-02', 'Present', '2023-04-20 23:05:21', '2023-04-20 23:05:21'),
(20, 9, '2023-04-02', 'Present', '2023-04-20 23:05:21', '2023-04-20 23:05:21'),
(21, 11, '2023-04-02', 'Present', '2023-04-20 23:05:21', '2023-04-20 23:05:21'),
(22, 12, '2023-04-02', 'Present', '2023-04-20 23:05:21', '2023-04-20 23:05:21'),
(23, 13, '2023-04-02', 'Present', '2023-04-20 23:05:21', '2023-04-20 23:05:21'),
(24, 8, '2023-04-03', 'Present', '2023-04-20 23:05:39', '2023-04-20 23:05:39'),
(25, 9, '2023-04-03', 'Leave', '2023-04-20 23:05:39', '2023-04-20 23:05:39'),
(26, 11, '2023-04-03', 'Present', '2023-04-20 23:05:39', '2023-04-20 23:05:39'),
(27, 12, '2023-04-03', 'Absent', '2023-04-20 23:05:39', '2023-04-20 23:05:39'),
(28, 13, '2023-04-03', 'Present', '2023-04-20 23:05:39', '2023-04-20 23:05:39'),
(29, 8, '2023-04-04', 'Leave', '2023-04-20 23:05:53', '2023-04-20 23:05:53'),
(30, 9, '2023-04-04', 'Present', '2023-04-20 23:05:53', '2023-04-20 23:05:53'),
(31, 11, '2023-04-04', 'Leave', '2023-04-20 23:05:53', '2023-04-20 23:05:53'),
(32, 12, '2023-04-04', 'Present', '2023-04-20 23:05:53', '2023-04-20 23:05:53'),
(33, 13, '2023-04-04', 'Present', '2023-04-20 23:05:53', '2023-04-20 23:05:53'),
(34, 8, '2023-04-05', 'Present', '2023-04-20 23:06:03', '2023-04-20 23:06:03'),
(35, 9, '2023-04-05', 'Present', '2023-04-20 23:06:03', '2023-04-20 23:06:03'),
(36, 11, '2023-04-05', 'Present', '2023-04-20 23:06:03', '2023-04-20 23:06:03'),
(37, 12, '2023-04-05', 'Present', '2023-04-20 23:06:03', '2023-04-20 23:06:03'),
(38, 13, '2023-04-05', 'Absent', '2023-04-20 23:06:03', '2023-04-20 23:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `leave_purpose_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 8, 1, '2023-02-13', '2023-02-17', '2023-01-27 08:14:58', '2023-01-27 08:14:58'),
(2, 12, 2, '2023-01-30', '2023-01-31', '2023-01-27 08:20:04', '2023-01-27 08:20:04'),
(3, 11, 3, '2023-01-30', '2023-01-31', '2023-01-30 22:51:10', '2023-01-30 22:51:10'),
(4, 9, 4, '2023-01-31', '2023-02-01', '2023-01-30 23:02:24', '2023-01-30 23:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leave_purposes`
--

CREATE TABLE `employee_leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leave_purposes`
--

INSERT INTO `employee_leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'marrige function leave', '2023-01-27 08:14:58', '2023-01-27 08:14:58'),
(2, 'Family Function', '2023-01-27 08:20:04', '2023-01-27 08:20:04'),
(3, 'marrige function leave', '2023-01-30 22:51:10', '2023-01-30 22:51:10'),
(4, 'sick leave', '2023-01-30 23:02:24', '2023-01-30 23:02:24'),
(5, 'testing purpose leave', '2023-01-30 23:20:26', '2023-01-30 23:20:26'),
(6, 'testing purpose leave', '2023-01-30 23:25:19', '2023-01-30 23:25:19'),
(7, 'testing purpose leave dsadsdsadsa', '2023-01-30 23:25:30', '2023-01-30 23:25:30'),
(8, 'testing purpose leave dsadsdsadsa', '2023-01-30 23:25:44', '2023-01-30 23:25:44'),
(9, 'testing purpose leave', '2023-01-30 23:25:58', '2023-01-30 23:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2nd terminal exam', '2023-01-10 23:52:50', '2023-01-11 00:22:20'),
(3, '1st terminal exam', '2023-01-11 00:20:12', '2023-01-11 00:21:37'),
(4, '3rd terminal exam', '2023-01-11 00:22:38', '2023-01-11 00:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_amounts`
--

CREATE TABLE `fee_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_amounts`
--

INSERT INTO `fee_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '500', '2023-01-18 03:51:09', '2023-01-18 03:51:09'),
(7, 2, 2, '500', '2023-01-18 03:51:09', '2023-01-18 03:51:09'),
(8, 2, 3, '500', '2023-01-18 03:51:09', '2023-01-18 03:51:09'),
(9, 2, 4, '500', '2023-01-18 03:51:09', '2023-01-18 03:51:09'),
(10, 2, 5, '500', '2023-01-18 03:51:09', '2023-01-18 03:51:09'),
(16, 1, 1, '400', '2023-04-21 06:23:59', '2023-04-21 06:23:59'),
(17, 1, 2, '450', '2023-04-21 06:23:59', '2023-04-21 06:23:59'),
(18, 1, 3, '550', '2023-04-21 06:23:59', '2023-04-21 06:23:59'),
(19, 1, 4, '750', '2023-04-21 06:23:59', '2023-04-21 06:23:59'),
(20, 1, 5, '930', '2023-04-21 06:23:59', '2023-04-21 06:23:59'),
(26, 3, 1, '30000', '2023-04-21 06:44:16', '2023-04-21 06:44:16'),
(27, 3, 2, '45000', '2023-04-21 06:44:16', '2023-04-21 06:44:16'),
(28, 3, 3, '50000', '2023-04-21 06:44:16', '2023-04-21 06:44:16'),
(29, 3, 4, '60000', '2023-04-21 06:44:16', '2023-04-21 06:44:16'),
(30, 3, 5, '65000', '2023-04-21 06:44:16', '2023-04-21 06:44:16'),
(31, 3, 6, '90000', '2023-04-21 06:44:16', '2023-04-21 06:44:16');

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'exam fee', '2023-01-12 23:36:31', '2023-01-18 05:25:43'),
(2, 'monthly fee', '2023-01-12 23:36:39', '2023-01-12 23:36:39'),
(3, 'yearly fees', '2023-01-12 23:36:47', '2023-01-12 23:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `manage_marks`
--

CREATE TABLE `manage_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `id_no` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `mark` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_marks`
--

INSERT INTO `manage_marks` (`id`, `student_id`, `id_no`, `class_id`, `year_id`, `assign_subject_id`, `exam_type_id`, `mark`, `created_at`, `updated_at`) VALUES
(10, 5, 20230005, 5, 6, 29, 3, 75, '2023-02-03 04:24:28', '2023-02-03 04:24:28'),
(11, 11, 20230011, 5, 6, 29, 3, 50, '2023-02-03 04:24:28', '2023-02-03 04:24:28'),
(12, 13, 20230013, 5, 6, 29, 3, 76, '2023-02-03 04:24:28', '2023-02-03 04:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_05_132156_create_sessions_table', 1),
(7, '2023_01_09_104030_create_student_setups_table', 2),
(8, '2023_01_09_113644_create_student_years_table', 3),
(9, '2023_01_09_124713_create_student_groups_table', 4),
(10, '2023_01_10_050004_create_student_shifts_table', 5),
(11, '2023_01_10_060139_create_fee_categories_table', 6),
(12, '2023_01_10_072100_create_fee_amounts_table', 7),
(13, '2023_01_11_050746_create_exam_types_table', 8),
(14, '2023_01_11_060125_create_student_subjects_table', 9),
(15, '2023_01_11_070615_create_assign_subjects_table', 10),
(19, '2014_10_12_000000_create_users_table', 11),
(20, '2023_01_11_115513_create_designations_table', 11),
(21, '2023_01_12_035740_create_users_table', 12),
(22, '2023_01_12_042736_create_users_table', 13),
(23, '2023_01_12_043556_create_users_table', 14),
(24, '2023_01_12_055434_create_discounts_table', 15),
(25, '2023_01_12_055539_create_studentregistrations_table', 15),
(26, '2023_01_12_055603_create_assign_students_table', 15),
(27, '2023_01_16_102757_create_roles_table', 16),
(28, '2023_01_19_051303_create_employees_table', 16),
(29, '2023_01_19_072135_create_employeesalaries_table', 17),
(30, '2023_01_24_123028_create_employee_leaves_table', 18),
(31, '2023_01_24_123050_create_leave_purposes_table', 18),
(32, '2023_01_27_105538_create_student_leaves_table', 19),
(33, '2023_01_27_105553_create_student_leave_purposes_table', 19),
(34, '2023_01_27_123616_create_employee_leave_purposes_table', 20),
(35, '2023_01_27_123630_create_employee_leaves_table', 20),
(36, '2023_01_31_072155_create_employee_attendances_table', 21),
(37, '2023_02_01_110227_create_student_attendances_table', 22),
(38, '2023_02_02_085038_create_manage_marks_table', 23),
(39, '2023_02_03_112623_create_student_grades_table', 24),
(40, '2023_02_06_051628_create_account_student_fees_table', 25),
(41, '2023_04_18_055210_create_account_employee_salaries_table', 26),
(44, '2023_04_19_063443_create_other_costs_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `other_costs`
--

CREATE TABLE `other_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `amout` double DEFAULT NULL,
  `decription` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_costs`
--

INSERT INTO `other_costs` (`id`, `date`, `amout`, `decription`, `image`, `created_at`, `updated_at`) VALUES
(1, '2023-04-19', 500, 'Paypal', '202304190718paypal2.png', '2023-04-19 01:48:51', '2023-04-19 01:48:51'),
(2, '2023-04-21', 1000, 'merican Expree', 'american-express.png', '2023-04-19 02:52:13', '2023-04-19 02:52:13'),
(4, '2023-04-13', 100, 'demo', 'logo-1.jpg', '2023-04-19 03:29:33', '2023-04-19 03:29:53'),
(5, '2023-04-29', 2530, 'text description', 'logo-5.jpg', '2023-04-19 03:34:26', '2023-04-19 03:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bharat@gmail.com', '$2y$10$/WfTHykR3p31PkunbojtNesrLOCgwDOCOrnhjpLylgW.0oIKt7.wW', '2023-01-06 01:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('moLGmn6JGDiY5wLe0bzkwVnsAnfbdxkEY4bpup3W', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWVdQWEN1NHhXY1hwcXV1RjNHZnhyUURNSlFrRjl0NEtiNzhPcU9CUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3N0dWRlbnQvcmVnaXN0cmF0aW9uL2ZlZS92aWV3Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdHVkZW50L3JlZ2lzdHJhdGlvbi9mZWUvdmlldyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1682077180),
('pva7HQu1fIZEqesj2CplXVY9Kd1tc5bjZimkWK0X', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibzd4QTRwWnNxemN4ZU82MVFDRFNPdEJNenltV2FZa3plT3R2VEg1SyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcmVwb3J0cy9tb250aGx5L3Byb2ZpdC92aWV3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1682079330),
('UvLvaqodVPehPAGVzXY0wMz18ldibeZOdiU4jhRg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGpQSWJuODV2QzFteHNiRHJ4S2hjaTJmQWgwQ1JPS1dQaDlZbXc0UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1682077180);

-- --------------------------------------------------------

--
-- Table structure for table `studentregistrations`
--

CREATE TABLE `studentregistrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade_point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_mark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_point` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `grade_name`, `grade_point`, `start_mark`, `end_mark`, `start_point`, `end_point`, `remark`, `created_at`, `updated_at`) VALUES
(1, 'A+', '5.00', '80', '100', '5.00', '4.5', 'Excellent', '2023-02-03 06:24:18', '2023-02-03 07:24:29'),
(3, 'A', '4.00', '70', '79', '4.00', '4.49', 'Very Good', '2023-02-03 07:20:18', '2023-02-03 07:24:36'),
(4, 'A-', '3.50', '60', '69', '3.50', '3.9', 'Good', '2023-02-03 07:21:07', '2023-02-03 07:21:07'),
(5, 'B', '3.00', '50', '59', '3.00', '3.99', 'Average', '2023-02-03 07:22:12', '2023-02-03 07:24:45'),
(6, 'C', '2.00', '40', '49', '2.00', '2.99', 'Dispoint', '2023-02-03 07:23:19', '2023-02-03 07:23:19'),
(7, 'D', '1.00', '33', '39', '1.00', '1.99', 'Bad', '2023-02-03 07:23:58', '2023-02-03 07:23:58'),
(8, 'F', '0.00', '0', '32', '0.00', '0.99', 'Fail', '2023-02-03 07:24:16', '2023-02-03 07:24:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2023-01-12 23:34:58', '2023-01-12 23:34:58'),
(2, 'commarce', '2023-01-12 23:35:05', '2023-01-12 23:35:14'),
(3, 'Arts', '2023-01-12 23:35:21', '2023-01-12 23:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `student_leaves`
--

CREATE TABLE `student_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_leave_id` int(11) DEFAULT NULL,
  `student_class` int(11) DEFAULT NULL,
  `student_group` int(11) DEFAULT NULL,
  `student_year` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_leaves`
--

INSERT INTO `student_leaves` (`id`, `student_id`, `student_leave_id`, `student_class`, `student_group`, `student_year`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 10, 10, 3, 2, 3, '2023-02-13', '2023-02-15', '2023-01-27 06:40:40', '2023-01-31 00:00:45'),
(4, 8, 13, 5, 1, 6, '2023-02-02', '2023-02-03', '2023-01-31 00:08:17', '2023-01-31 00:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `student_leave_purposes`
--

CREATE TABLE `student_leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_leave_purposes`
--

INSERT INTO `student_leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Family Function', '2023-01-27 06:19:02', '2023-01-27 06:19:02'),
(2, 'Family Function', '2023-01-27 06:22:53', '2023-01-27 06:22:53'),
(3, 'Family Function', '2023-01-27 06:24:12', '2023-01-27 06:24:12'),
(4, 'sick leave', '2023-01-27 06:33:32', '2023-01-27 06:33:32'),
(5, 'sick leave', '2023-01-27 06:34:29', '2023-01-27 06:34:29'),
(6, 'Brother Marrige', '2023-01-27 06:40:40', '2023-01-27 06:40:40'),
(7, 'Brother Marrige', '2023-01-31 00:00:04', '2023-01-31 00:00:04'),
(8, 'Brother Marrigedfdsfdsfdfdfdfdfd', '2023-01-31 00:00:22', '2023-01-31 00:00:22'),
(9, 'Brother Marrigedfdsfdsfdfdfdfdfd', '2023-01-31 00:00:36', '2023-01-31 00:00:36'),
(10, 'Brother Marrige', '2023-01-31 00:00:45', '2023-01-31 00:00:45'),
(11, 'sick leave', '2023-01-31 00:04:27', '2023-01-31 00:04:27'),
(12, 'fever', '2023-01-31 00:04:55', '2023-01-31 00:04:55'),
(13, 'emmergency leave', '2023-01-31 00:08:17', '2023-01-31 00:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `student_setups`
--

CREATE TABLE `student_setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_setups`
--

INSERT INTO `student_setups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Class 1', '2023-02-02 06:32:51', '2023-02-02 06:32:51'),
(2, 'Class 2', '2023-02-02 06:33:00', '2023-02-02 06:33:00'),
(3, 'Class 3', '2023-02-02 06:33:07', '2023-02-02 06:33:07'),
(4, 'Class 4', '2023-02-02 06:33:15', '2023-02-02 06:33:15'),
(5, 'Class 5', '2023-02-02 06:33:22', '2023-02-02 06:33:22'),
(6, 'class 6', '2023-04-21 06:36:38', '2023-04-21 06:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Morning', '2023-01-12 23:35:49', '2023-01-12 23:35:49'),
(2, 'Afternoon', '2023-01-12 23:35:58', '2023-01-12 23:35:58'),
(3, 'Evening', '2023-01-12 23:36:05', '2023-01-12 23:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `student_subjects`
--

CREATE TABLE `student_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subjects`
--

INSERT INTO `student_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Maths', '2023-01-11 01:09:50', '2023-01-11 01:09:50'),
(5, 'Science', '2023-01-11 01:09:56', '2023-01-11 01:09:56'),
(6, 'English', '2023-01-11 01:10:07', '2023-01-11 01:10:07'),
(7, 'Physic', '2023-01-11 05:22:57', '2023-01-11 05:22:57'),
(8, 'Arts', '2023-01-11 05:23:07', '2023-01-11 05:23:07'),
(9, 'Gujarati', '2023-01-11 05:23:21', '2023-01-11 05:23:21'),
(10, 'Hindi', '2023-01-11 05:23:30', '2023-01-11 05:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2018', '2023-01-12 23:34:19', '2023-01-12 23:34:19'),
(2, '2019', '2023-01-12 23:34:24', '2023-01-12 23:34:24'),
(3, '2020', '2023-01-12 23:34:30', '2023-01-12 23:34:30'),
(4, '2021', '2023-01-12 23:34:35', '2023-01-12 23:34:35'),
(5, '2022', '2023-01-12 23:34:39', '2023-01-12 23:34:39'),
(6, '2023', '2023-01-12 23:34:44', '2023-01-12 23:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `fathername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mothername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `mobile`, `gender`, `address`, `image`, `fathername`, `mothername`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '9638527410', 'Male', 'USA', '202304180459202301201019IMG_5509-375x500.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, NULL, '$2y$10$1cltMrUA1MsRUfn2n11VoOmaAaR0ODNQYxtiXOgnhBbqCIRtfdFr6', 'f43P4dfVZ8a5dtFYosKnITwlLxFuXprVnr7bkQ0V0pHuazD4SGpA9PeiuSJN', NULL, NULL, '2023-01-12 22:08:06', '2023-04-17 23:29:38'),
(2, 'Student', 'Bharat Prajapati', NULL, NULL, '8529637410', 'Male', 'Ahmedabad', '202301130345photo_1078846.jpg', 'Shivabhai', 'somiben', 'Hindu', '20230001', '1995-10-24', '3872', NULL, NULL, NULL, NULL, NULL, '$2y$10$bWoXkQtzjKkfYzpkI8KeCOa7CaIPxNQcaBLXE.ZEi87SL/oh45sgW', NULL, NULL, NULL, '2023-01-12 22:15:18', '2023-01-12 22:15:18'),
(3, 'Admin', 'Vijay', 'vijay@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5122', 'User', NULL, NULL, NULL, NULL, '$2y$10$CHs5UAetIABXbiO1DNDcK.len1QftWP64iSwR3NaTRa8VW6C7yizm', NULL, NULL, NULL, '2023-01-12 22:21:37', '2023-01-12 22:21:37'),
(4, 'Student', 'Shubham', NULL, NULL, '85265456362', 'Male', 'USA', '202301130451Thomas-Cameron_Student_Profile.jpg', 'shyambhai', 'savitaben', 'hindu', '20230003', '1995-01-01', '4668', NULL, NULL, NULL, NULL, NULL, '$2y$10$h6fi/WISZszPlrDBQR4r7.Mo5KhfR4JkvYsI/Mh3wdAxgdQQ5M1PC', NULL, NULL, NULL, '2023-01-12 23:21:34', '2023-01-12 23:21:34'),
(5, 'Student', 'Bharat', NULL, NULL, '8569655632', 'Male', 'india', '202301130512patrick2.jpg', 'Shivabhai', 'somiben', 'hindu', '20230005', '1995-11-24', '2726', NULL, NULL, NULL, NULL, NULL, '$2y$10$uCvJ.rqh3JTb3SKqnnVoOemngw7FJRVTe30CqD.HfP3dteF/waQxi', NULL, NULL, NULL, '2023-01-12 23:42:05', '2023-01-12 23:42:05'),
(6, 'Student', 'Shivani Patel', NULL, NULL, '8524452666', 'Female', 'India', '202301130611poppe-crop-300x213.png', 'Ravi Bhai', 'MonikaBen', 'hindu', '20180006', '1998-01-01', '1584', NULL, NULL, NULL, NULL, NULL, '$2y$10$Tujl7A3sPwoxc6dXJWV8..TX35Q0x6wnHjfiaMzxgW2oWl7Bvt/T.', NULL, NULL, NULL, '2023-01-13 00:41:18', '2023-01-13 00:41:18'),
(7, 'Student', 'Mayank', NULL, NULL, '7458965242', 'Male', 'USA', '202301130727Stan1.jpg', 'Manish', 'Monika', 'Indian', '20200007', '1990-01-01', '799', NULL, NULL, NULL, NULL, NULL, '$2y$10$XqiIWoIydKczcTXQkryquO661N0Ty6ChDQ/Q0UFZmYbOuXN9C30PO', NULL, NULL, NULL, '2023-01-13 01:57:47', '2023-01-13 01:57:47'),
(8, 'Student', 'Vishal', NULL, NULL, '7545896563', 'Male', 'Banglore', '202301130900Kevin-website.jpg', 'Vishal', 'vishwa', 'hindu', '20190008', '1997-02-12', '8679', NULL, NULL, NULL, NULL, NULL, '$2y$10$Je6nnu3iolQoqftI.4IrCOVor1fP6YnZQHo1k4DZ/WSsKYYpaJHGi', NULL, NULL, NULL, '2023-01-13 03:30:02', '2023-01-13 03:30:02'),
(9, 'Student', 'Sahil', NULL, NULL, '45112', 'Male', 'bapunagar', '202301131111karena_354x354_mills.jpg', 'mahesh', 'manisha', 'hindu', '20230009', '1994-01-02', '5109', NULL, NULL, NULL, NULL, NULL, '$2y$10$sc1vVOUEckUHbw4d.MrfROPyIb.ownCSHQNI.bDLVk.101GjyPdV6', NULL, NULL, NULL, '2023-01-13 03:38:02', '2023-01-13 05:41:04'),
(10, 'Student', 'Shivani Patel', NULL, NULL, '8524452666', 'Female', 'India', '202301160535student-profile.jpg', 'Ravi Bhai', 'MonikaBen', 'hindu', '20180010', '1998-01-01', '9254', NULL, NULL, NULL, NULL, NULL, '$2y$10$4lH.pzuYtWt6lOrih7RK9efDZ5Lvy2WDfuPlD9/NkLH/pzR08ebW2', NULL, NULL, NULL, '2023-01-13 04:16:36', '2023-01-16 00:05:47'),
(11, 'Student', 'Mayur', NULL, NULL, '8544522263', 'Male', 'Surat', '202301131113tobinsouth.jpeg', 'Mayur', 'Mayuri', 'Muslim', '20230011', '1990-12-15', '171', NULL, NULL, NULL, NULL, NULL, '$2y$10$FawasOxyKzioW1AQf8YctuvAY.aLqgK2D15JFa6zLSK4maJGGRwUa', NULL, NULL, NULL, '2023-01-13 04:24:47', '2023-01-13 05:43:01'),
(12, 'Student', 'Rajesh', NULL, NULL, '4425556695', 'Male', 'Mumbai', '2023011311147837_Profile-2.rev.1572210489.jpg', 'Rajesh', 'Ranna', 'Muslim', '20230012', '1995-03-10', '1710', NULL, NULL, NULL, NULL, NULL, '$2y$10$lYVzfwZUBn8WZFd6zNznG.YQb0cFnlw7BB20rSz0oaUXioEOvHozG', NULL, NULL, NULL, '2023-01-13 04:28:42', '2023-01-13 05:44:41'),
(13, 'Student', 'Vrajesh', NULL, NULL, '7854963523', 'Male', 'Pune', '202301131116Ambrose-Chui-Cropped-200x200.jpg', 'Vrajesh', 'Vidhi', 'Hindu', '20230013', '1990-03-10', '6961', NULL, NULL, NULL, NULL, NULL, '$2y$10$ozNoEG7zJGEbVd1c4CMGmuOsxc7PIhne6z34JpHS4f5Rn7nlyQY9.', NULL, NULL, NULL, '2023-01-13 05:21:26', '2023-01-13 05:46:17'),
(14, NULL, 'Glasier', 'glasierinc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, NULL, '$2y$10$bBrJtuE29t6Gyd2/L8NqLeDkpBHOEMtlmqk5gElVNbN52KzZXmpVq', NULL, NULL, NULL, '2023-04-17 23:20:36', '2023-04-17 23:20:36'),
(15, 'Student', 'Vishwa', NULL, NULL, '8756965320', 'Female', 'Pune', NULL, 'Rajesh Bhai', 'Kokila Ben', 'Hindu', '20180014', '1997-01-21', '7785', NULL, NULL, NULL, NULL, NULL, '$2y$10$ACtn2J7qY7/7.gdaMK6Cxu1oDdfq/.6wtrBK6udm6ScjtXuwpnLi6', NULL, NULL, NULL, '2023-04-21 06:08:29', '2023-04-21 06:08:29'),
(16, 'Student', 'Roshani Shah', NULL, NULL, '9865745563', 'Female', 'mumbai', NULL, 'Ramesh Lal', 'Konta Ben', 'Hindu', '20230016', '1996-03-25', '6009', NULL, NULL, NULL, NULL, NULL, '$2y$10$Fc25tgPJwe6vBOU7vYn0Huy6N8Kf4yKvVMuxrCQRdugCPMFhjuVJu', NULL, NULL, NULL, '2023-04-21 06:38:18', '2023-04-21 06:38:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `employeesalaries`
--
ALTER TABLE `employeesalaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leave_purposes`
--
ALTER TABLE `employee_leave_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_amounts`
--
ALTER TABLE `fee_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `manage_marks`
--
ALTER TABLE `manage_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_costs`
--
ALTER TABLE `other_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `studentregistrations`
--
ALTER TABLE `studentregistrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_leaves`
--
ALTER TABLE `student_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_leave_purposes`
--
ALTER TABLE `student_leave_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_setups`
--
ALTER TABLE `student_setups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_setups_name_unique` (`name`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_subjects`
--
ALTER TABLE `student_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_subjects_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employeesalaries`
--
ALTER TABLE `employeesalaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_leave_purposes`
--
ALTER TABLE `employee_leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_amounts`
--
ALTER TABLE `fee_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_marks`
--
ALTER TABLE `manage_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `other_costs`
--
ALTER TABLE `other_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentregistrations`
--
ALTER TABLE `studentregistrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_leaves`
--
ALTER TABLE `student_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_leave_purposes`
--
ALTER TABLE `student_leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `student_setups`
--
ALTER TABLE `student_setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_subjects`
--
ALTER TABLE `student_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
