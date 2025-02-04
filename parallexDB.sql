-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2024 at 11:02 AM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parallexDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_directory`
--

CREATE TABLE `admin_directory` (
  `id` int NOT NULL,
  `adminUID` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_email` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_contact` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `portal_credentials` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_avatar` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_directory`
--

INSERT INTO `admin_directory` (`id`, `adminUID`, `admin_name`, `admin_email`, `admin_contact`, `portal_credentials`, `admin_avatar`, `registration_date`) VALUES
(1, 'ADM0624IWU7', 'V Robin Kujur', 'robinkujur@aidcom.in', '9264453821', 'Admin1234#@', 'http://localhost/bookstore/modules/adminAvatar/images.jpeg', '2024-06-19 06:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `book_directory`
--

CREATE TABLE `book_directory` (
  `id` int NOT NULL,
  `book_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `original_price` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sales_price` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `available_stock` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_cover` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adminUID` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `recorded_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_directory`
--

INSERT INTO `book_directory` (`id`, `book_name`, `category`, `author_name`, `original_price`, `sales_price`, `book_description`, `available_stock`, `book_cover`, `adminUID`, `admin_name`, `recorded_date`) VALUES
(1, 'Atomic Habits', 'Challenge', 'James Clear', '350', '280', 'This book delves into the science of habits and offers practical strategies for forming good habits, breaking bad ones, and mastering the tiny behaviors that lead to remarkable results. Clear emphasizes the power of small changes and how they compound over time.', '50', 'http://localhost/bookstore/modules/bookCover/book1.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 13:09:48'),
(2, 'How to Win Friends and Influence People', 'Essentials', 'Dale Carnegie', '599', '479', 'A timeless classic that provides principles for effective communication, building strong relationships, and influencing others positively. Carnegie\'s advice is based on empathy, understanding, and sincere appreciation of others.', '10', 'http://localhost/bookstore/modules/bookCover/book3.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 14:52:01'),
(3, 'The Power of Now', 'Foundations', 'Eckhart Tolle', '850', '830', 'This spiritual guide teaches the importance of living in the present moment and how detaching from past regrets and future anxieties can lead to a more fulfilling life. Tolle explains how to achieve a state of mindfulness and inner peace.', '20', 'http://localhost/bookstore/modules/bookCover/book2.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 14:53:28'),
(4, 'Think and Grow Rich', 'Challenge', 'Napoleon Hill', '960', '940', 'A seminal work on personal development and success, this book outlines key principles for achieving financial and personal goals. Hill\'s work is based on his study of successful individuals and offers practical steps for transforming desires into reality.', '10', 'http://localhost/bookstore/modules/bookCover/book4.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 14:55:00'),
(5, 'The Subtle Art of Not Giving a F*ck', 'Essentials', 'Mark Manson', '999', '949', 'Manson\'s approach to self-help is unconventional, emphasizing that not caring about everything can lead to a more meaningful and less stressful life. He advocates for embracing life\'s challenges and prioritizing what truly matters.', '30', 'http://localhost/bookstore/modules/bookCover/book5.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 14:56:24'),
(6, 'You Are a Badass', 'Essentials', 'Jen Sincero', '1050', '1020', 'This book combines humor, personal anecdotes, and practical advice to help readers build confidence, take control of their lives, and pursue their goals with determination and positivity.', '10', 'http://localhost/bookstore/modules/bookCover/book6.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 15:00:55'),
(7, 'Grit: The Power of Passion and Perseverance', 'Foundations', 'Angela Duckworth', '960', '940', 'Duckworth explores the concept of grit, which she defines as a combination of passion and perseverance. Through research and real-life examples, she demonstrates how grit can be a key predictor of success.', '10', 'http://localhost/bookstore/modules/bookCover/book7.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 15:02:38'),
(8, 'The 7 Habits of Highly Effective People', 'Foundations', 'Stephen R. Covey', '790', '750', 'Covey\'s classic offers a principle-centered approach to solving personal and professional problems. The book lays out seven habits that can help individuals achieve independence and interdependence, leading to effective and fulfilling lives.', '20', 'http://localhost/bookstore/modules/bookCover/book8.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-06-24 15:05:40'),
(14, 'The Lean Startup', 'Foundations', 'Eric Ries', '1699', '1599', 'The Lean Startup defines a scientific methodology for running startups and launching new products. This new approach has been adopted around the world by startups and established organizations. Regardless of your role or company size, this is a must-read for entrepreneurs, marketers, developers, and business leaders.', '10', 'http://localhost/bookstore/modules/bookCover/TheleanStartup.jpg', 'ADM0624IWU7', 'V Robin Kujur', '2024-07-17 05:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `child_directory`
--

CREATE TABLE `child_directory` (
  `id` int NOT NULL,
  `parent_enrollment_no` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `child_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `child_dob` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `opted_subject` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course_fees` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_id` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_date` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `child_avatar` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `invoice_no` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gen_invoice_location` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `invoice_location` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_verification_status` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_directory`
--

INSERT INTO `child_directory` (`id`, `parent_enrollment_no`, `child_name`, `child_dob`, `opted_subject`, `course_fees`, `payment_status`, `payment_id`, `transaction_date`, `child_avatar`, `invoice_no`, `gen_invoice_location`, `invoice_location`, `admin_verification_status`, `registration_date`) VALUES
(1, 'PRT/0624/0001', 'Riya', '2024-06-15', 'Foundation', '2100', 'Payment Incomplete', '79DT6R5X28QG', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar12.png', 'PRT/0624/0001', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240001.pdf', '', 'Unverified', '2024-06-14 03:12:26'),
(2, 'PRT/0624/0001', 'Shreya', '2024-06-03', 'Challenge B', '8300', 'Payment Incomplete', '79DT6R5X28QG', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar12.png', 'PRT/0624/0001', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240001.pdf', '', 'Unverified', '2024-06-14 03:12:43'),
(3, 'PRT/0624/0001', 'Shourya', '2024-06-22', 'Challenge 3', '8300', 'Payment Incomplete', '79DT6R5X28QG', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar6.png', 'PRT/0624/0001', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240001.pdf', '', 'Unverified', '2024-06-14 03:12:52'),
(4, 'PRT/0624/0002', 'Child 1', '2024-06-02', 'Foundation', '2100', 'Payment Incomplete', '895YHNF6GBTR', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar1.png', 'PRT/0624/0002', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240002.pdf', '', 'Unverified', '2024-06-14 03:16:37'),
(5, 'PRT/0624/0002', 'Child 2', '2024-06-21', 'Challenge 1', '8300', 'Payment Incomplete', '895YHNF6GBTR', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar18.png', 'PRT/0624/0002', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240002.pdf', '', 'Unverified', '2024-06-14 03:16:50'),
(6, 'PRT/0624/0002', 'Child 3', '2024-06-20', 'Challenge 1', '8300', 'Payment Incomplete', '895YHNF6GBTR', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar19.png', 'PRT/0624/0002', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240002.pdf', '', 'Unverified', '2024-06-14 03:16:56'),
(7, 'PRT/0624/0003', 'Child 1', '2024-06-01', 'Foundation', '2100', 'Payment Incomplete', '9Y0XUQBEW6A2', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar9.png', 'PRT/0624/0003', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240003.pdf', '', 'Unverified', '2024-06-14 03:24:16'),
(8, 'PRT/0624/0003', 'Child 2', '2024-06-15', 'Essentials', '2100', 'Payment Incomplete', '9Y0XUQBEW6A2', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar9.png', 'PRT/0624/0003', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240003.pdf', '', 'Unverified', '2024-06-14 03:24:29'),
(9, 'PRT/0624/0003', 'Child 3', '2024-06-27', 'Challenge B', '8300', 'Payment Incomplete', '9Y0XUQBEW6A2', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar8.png', 'PRT/0624/0003', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240003.pdf', '', 'Unverified', '2024-06-14 03:24:36'),
(10, 'PRT/0624/0003', 'Child 4', '2024-06-20', 'Challenge B', '8300', 'Payment Incomplete', '9Y0XUQBEW6A2', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar15.png', 'PRT/0624/0003', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240003.pdf', '', 'Unverified', '2024-06-14 03:24:44'),
(11, 'PRT/0624/0004', 'casjkd', '2024-06-14', 'Essentials', '2100', 'Payment Incomplete', 'EU7FJD1ZM2OW', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar12.png', 'PRT/0624/0004', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240004.pdf', '', 'Unverified', '2024-06-14 03:27:37'),
(12, 'PRT/0624/0005', 'asjkd', '2024-06-14', 'Challenge A', '8300', 'Payment Incomplete', 'O7YZB6MNX591', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar19.png', 'PRT/0624/0005', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240005.pdf', '', 'Unverified', '2024-06-14 03:29:03'),
(13, 'PRT/0624/0006', 'asdf', '2024-05-31', 'Challenge A', '8300', 'Payment Incomplete', 'CENKHULVOBZS', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar4.png', 'PRT/0624/0006', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240006.pdf', '', 'Unverified', '2024-06-14 03:31:24'),
(14, 'PRT/0624/0007', 'asdfasd', '2024-06-06', 'Challenge B', '8300', 'Payment Completed', 'I9COZJ41K03H', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar4.png', 'PRT/0624/0007', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240007.pdf', 'http://localhost/childEnroll/modules/downloaded_invoice/I9COZJ41K03H.pdf', 'Unverified', '2024-06-14 03:32:43'),
(15, 'PRT/0624/0008', 'asdf', '2024-05-29', 'Challenge 1', '8300', 'Payment Incomplete', '9GTNDZ401F7V', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar15.png', 'PRT/0624/0008', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240008.pdf', '', 'Unverified', '2024-06-14 03:35:11'),
(16, 'PRT/0624/0009', 'asd', '2024-06-07', 'Challenge B', '8300', 'Payment Incomplete', 'SBAI3RLNY1TD', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar15.png', 'PRT/0624/0009', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240009.pdf', '', 'Unverified', '2024-06-14 03:37:48'),
(17, 'PRT/0624/0010', 'asd', '2024-06-11', 'Challenge A', '8300', 'Payment Incomplete', '0VLIHCB28FN6', '14/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar19.png', 'PRT/0624/0010', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240010.pdf', '', 'Unverified', '2024-06-14 03:39:02'),
(18, 'PRT/0624/0011', 'Enter Child Name', 'To be Updated', 'Choose Program', 'To be Updated', 'Pending', 'To be Updated', 'To be Updated', 'http://localhost/childEnroll/modules/avatar/avatar15.png', '', '', '', 'Unverified', '2024-06-15 13:12:57'),
(19, 'PRT/0624/0012', 'Child 1', '2024-05-28', 'Foundation', '2100', 'Payment Completed', 'OBSWX0JHT6C2', '17/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar17.png', 'PRT/0624/0012', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240012.pdf', 'http://localhost/childEnroll/modules/downloaded_invoice/OBSWX0JHT6C2.pdf', 'Unverified', '2024-06-17 11:29:26'),
(20, 'PRT/0624/0012', 'Child 2', '2024-05-29', 'Essentials', '2100', 'Payment Completed', 'OBSWX0JHT6C2', '17/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar15.png', 'PRT/0624/0012', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240012.pdf', 'http://localhost/childEnroll/modules/downloaded_invoice/OBSWX0JHT6C2.pdf', 'Unverified', '2024-06-17 11:29:39'),
(21, 'PRT/0624/0012', 'Child 3', '2024-06-05', 'Challenge 2', '8300', 'Payment Completed', 'OBSWX0JHT6C2', '17/06/2024', 'http://localhost/childEnroll/modules/avatar/avatar7.png', 'PRT/0624/0012', 'http://localhost/childEnroll/modules/initial_invoicing/PRT06240012.pdf', 'http://localhost/childEnroll/modules/downloaded_invoice/OBSWX0JHT6C2.pdf', 'Unverified', '2024-06-17 11:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `form_assistance`
--

CREATE TABLE `form_assistance` (
  `id` int NOT NULL,
  `name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `conversation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_assistance`
--

INSERT INTO `form_assistance` (`id`, `name`, `email`, `contact`, `message`, `conversation_date`) VALUES
(1, 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9199450345', 'Hi want to know about the Classical Conversations Bookstore', '2024-06-18 21:08:00'),
(2, 'adfasdf', 'robinkujur@aidcom.in', '34234234', 'vasf as asdfadvav ', '2024-06-18 21:15:23'),
(3, 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', 'Discover a wide range of books from all genres, meticulously curated to cater to every reader\'s taste. Browse through our extensive collection and find your next great read today!', '2024-06-18 21:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `parent_directory`
--

CREATE TABLE `parent_directory` (
  `id` int NOT NULL,
  `parent_enrollment_no` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parents_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parents_email` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parents_contact` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `portal_password` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `parents_initial` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `home_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parent_avatar` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_directory`
--

INSERT INTO `parent_directory` (`id`, `parent_enrollment_no`, `parents_name`, `parents_email`, `parents_contact`, `portal_password`, `parents_initial`, `home_address`, `parent_avatar`, `registration_date`) VALUES
(1, 'PRT/0624/0001', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9199450345', 'FSwYkXC2', 'PRT06240001', 'Victoria IT Park, Bettiah', 'http://localhost/bookstore/modules/userAvatar/avata.png', '2024-06-14 03:12:26'),
(2, 'PRT/0624/0002', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '', 'PRT06240002', 'Bettiah', 'http://localhost/childEnroll/modules/avatar/avatar9.png', '2024-06-14 03:16:37'),
(3, 'PRT/0624/0003', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '', 'PRT06240003', 'Bettiah', 'http://localhost/childEnroll/modules/avatar/avatar16.png', '2024-06-14 03:24:16'),
(4, 'PRT/0624/0004', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '', 'PRT06240004', 'asdkfjasdf', 'http://localhost/childEnroll/modules/avatar/avatar7.png', '2024-06-14 03:27:37'),
(5, 'PRT/0624/0005', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', 'Admin1234#@', 'PRT06240005', 'jkasdfkasdf', 'http://localhost/childEnroll/modules/avatar/avatar2.png', '2024-06-14 03:29:03'),
(6, 'PRT/0624/0006', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '', 'PRT06240006', 'asdsdf', 'http://localhost/childEnroll/modules/avatar/avatar17.png', '2024-06-14 03:31:24'),
(7, 'PRT/0624/0007', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '', 'PRT06240007', 'kasdfl', 'http://localhost/childEnroll/modules/avatar/avatar4.png', '2024-06-14 03:32:43'),
(8, 'PRT/0624/0008', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '', 'PRT06240008', 'sdfadsf', 'http://localhost/childEnroll/modules/avatar/avatar10.png', '2024-06-14 03:35:11'),
(9, 'PRT/0624/0009', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '', 'PRT06240009', 'asdfa', 'http://localhost/childEnroll/modules/avatar/avatar13.png', '2024-06-14 03:37:48'),
(10, 'PRT/0624/0010', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', '233333333333', 'PRT06240010', 'asjkdfasdf', 'http://localhost/childEnroll/modules/avatar/avatar15.png', '2024-06-14 03:39:02'),
(11, 'PRT/0624/0011', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', 'vasdr234234', 'PRT06240011', 'Bettiah', 'http://localhost/childEnroll/modules/avatar/avatar6.png', '2024-06-15 13:12:57'),
(12, 'PRT/0624/0012', 'Vivek Robin Kujur', 'robinkujur@aidcom.in', '9264453821', NULL, 'PRT06240012', 'Bettiah', 'http://localhost/childEnroll/modules/avatar/avatar7.png', '2024-06-17 11:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `quotesForDay`
--

CREATE TABLE `quotesForDay` (
  `id` int NOT NULL,
  `quotes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creator_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quotesForDay`
--

INSERT INTO `quotesForDay` (`id`, `quotes`, `author_name`, `creator_name`, `creation_date`) VALUES
(1, 'The will of God will not take us where the grace of God cannot sustain us.', ' Billy Graham', 'Vivek Robin Kujur', '2024-05-20 06:50:03'),
(2, 'The only limit to our realization of tomorrow is our doubts of today.', 'Franklin D. Roosevelt', 'Vivek Robin Kujur', '2024-05-20 06:50:03'),
(3, 'What lies behind us and what lies before us are tiny matters compared to what lies within us.', 'Ralph Waldo Emerson', 'Vivek Robin Kujur', '2024-05-20 06:50:03'),
(7, 'Love is not about how many days, months, or years you have been together. Love is about how much you love each other every single day.', 'Unknown', 'Nazish Akhtar', '2024-05-20 11:17:45'),
(8, 'Hardships often prepare ordinary people for an extraordinary destiny.', 'C.S. Lewis', 'Nazish Akhtar', '2024-05-20 11:17:45'),
(9, 'The future belongs to those who believe in the beauty of their dreams.', 'Eleanor Roosevelt', 'Nazish Akhtar', '2024-05-20 11:17:45'),
(10, 'It always seems impossible until it’s done.', 'Nelson Mandela', 'Nazish Akhtar', '2024-05-20 11:26:52'),
(11, 'The only way to do great work is to love what you do.', 'Steve Jobs', 'Nazish Akhtar', '2024-05-20 11:26:52'),
(12, 'Perfection is not attainable, But if we chase perfection we can catch Excellence.', 'Robin Kujur', 'Nazish Akhtar', '2024-05-20 11:26:52'),
(13, 'Don\'t watch the clock; do what it does. Keep going.', 'Sam Levenson', 'Nazish Akhtar', '2024-05-20 11:30:43'),
(14, 'Believe you can and you\'re halfway there.', 'Theodore Roosevelt', 'Nazish Akhtar', '2024-05-20 11:30:43'),
(15, 'The only limit to our realization of tomorrow is our doubts of today.', 'Franklin D. Roosevelt', 'Nazish Akhtar', '2024-05-20 11:30:43'),
(16, 'The harder you work for something, the greater you’ll feel when you achieve it.', 'Unknown', 'Nazish Akhtar', '2024-05-21 07:30:17'),
(17, 'Success is not the key to happiness. Happiness is the key to success. If you love what you are doing, you will be successful.', 'Albert Schweitzer', 'Nazish Akhtar', '2024-05-21 07:30:17'),
(18, 'Little things make big days.', 'John Wooden', 'Nazish Akhtar', '2024-05-21 07:30:17'),
(19, 'It’s going to be hard, but hard does not mean impossible.', 'Unknown', 'Nazish Akhtar', '2024-05-21 07:33:31'),
(20, 'The only way to achieve the impossible is to believe it is possible.', 'Charles Kingsleigh', 'Nazish Akhtar', '2024-05-21 07:33:31'),
(21, 'Don’t be pushed around by the fears in your mind. Be led by the dreams in your heart', 'Roy T. Bennett', 'Nazish Akhtar', '2024-05-21 07:33:31'),
(22, 'The future belongs to those who believe in the beauty of their dreams.', 'Eleanor Roosevelt', 'Nazish Akhtar', '2024-05-21 07:37:21'),
(23, 'It does not matter how slowly you go as long as you do not stop.', 'Confucius', 'Nazish Akhtar', '2024-05-21 07:37:21'),
(24, 'Success is not final, failure is not fatal: It is the courage to continue that counts.', 'Winston Churchill', 'Nazish Akhtar', '2024-05-21 07:37:21'),
(25, 'If you have good thoughts they will shine out of your face like sunbeams and you will always look lovely.', 'Roald Dahl', 'Vivek Robin Kujur', '2024-05-23 13:51:47'),
(26, 'Dreams don\'t have to just be dreams. You can make it a reality; if you just keep pushing and keep trying, then eventually you\'ll reach your goal.', 'Naomi Osaka', 'Vivek Robin Kujur', '2024-05-23 13:51:47'),
(27, 'What you get by achieving your goals is not as important as what you become by achieving your goals.', 'Zig Ziglar', 'Vivek Robin Kujur', '2024-05-23 13:51:47'),
(28, 'Life is 10% what happens to us and 90% how we react to it.', 'Charles R. Swindoll', 'Vivek Robin Kujur', '2024-05-23 13:53:32'),
(29, 'The greatest glory in living lies not in never falling, but in rising every time we fall.', 'Nelson Mandela', 'Vivek Robin Kujur', '2024-05-23 13:53:32'),
(30, 'The only limit to our realization of tomorrow will be our doubts of today.', 'Franklin D. Roosevelt', 'Vivek Robin Kujur', '2024-05-23 13:53:32'),
(31, 'Believe in yourself and all that you are. Know that there is something inside you that is greater than any obstacle.', 'Christian D. Larson', 'Vivek Robin Kujur', '2024-05-23 13:56:25'),
(32, 'The only person you are destined to become is the person you decide to be.', 'Ralph Waldo Emerson', 'Vivek Robin Kujur', '2024-05-23 13:56:25'),
(33, 'To be yourself in a world that is constantly trying to make you something else is the greatest accomplishment.', 'Ralph Waldo Emerson', 'Vivek Robin Kujur', '2024-05-23 13:56:25'),
(34, 'Life isn’t about finding yourself. Life is about creating yourself', 'George Bernard Shaw', 'Vivek Robin Kujur', '2024-05-23 13:58:05'),
(35, 'I am not a product of my circumstances. I am a product of my decisions.', 'Stephen R. Covey', 'Vivek Robin Kujur', '2024-05-23 13:58:05'),
(36, 'The only limit to our realization of tomorrow will be our doubts of today.', 'Franklin D. Roosevelt', 'Vivek Robin Kujur', '2024-05-23 13:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `id` int NOT NULL,
  `parent_enrollment_no` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_name` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_price` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `purchase_status` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount_received` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount_pending` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `upi_transaction_id` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `delivery_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gernerated_invoice` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `invoice_date` varchar(120) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `book_review` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `star_rating` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_cover` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cart_addition_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_directory`
--
ALTER TABLE `admin_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_directory`
--
ALTER TABLE `book_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_directory`
--
ALTER TABLE `child_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_assistance`
--
ALTER TABLE `form_assistance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_directory`
--
ALTER TABLE `parent_directory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotesForDay`
--
ALTER TABLE `quotesForDay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_directory`
--
ALTER TABLE `admin_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_directory`
--
ALTER TABLE `book_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `child_directory`
--
ALTER TABLE `child_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `form_assistance`
--
ALTER TABLE `form_assistance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parent_directory`
--
ALTER TABLE `parent_directory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quotesForDay`
--
ALTER TABLE `quotesForDay`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
