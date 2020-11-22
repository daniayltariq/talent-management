-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2020 at 11:43 AM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.3.24-3+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talent`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `cat_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int NOT NULL,
  `topic_category_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `content` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `views` int DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `topic_category_id`, `user_id`, `title`, `image`, `meta_title`, `slug`, `content`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'Topic', 'uploads/blog/20201117_114945am_Pearl_Copy_e1561717636412.jpg', NULL, '2323232323', '<p>Lorem excepteur cupidatat eiusmod dolore labore. Lorem aliqua exercitation sunt aliqua proident consequat tempor reprehenderit esse. Dolore reprehenderit Lorem elit deserunt labore. Reprehenderit elit nisi consectetur sint. Eiusmod reprehenderit ea reprehenderit ut aliquip adipisicing.</p>\r\n\r\n<p>Eiusmod fugiat mollit culpa culpa. In commodo commodo ullamco elit. Do qui ut tempor laborum. Eiusmod consectetur quis aliqua ea aute. Deserunt non laboris magna anim dolore.</p>\r\n\r\n<p>Sunt consequat ipsum occaecat nostrud tempor consequat sunt. Consectetur commodo aliquip Lorem nostrud ut enim minim reprehenderit. Elit fugiat pariatur eiusmod deserunt mollit aliqua. Officia et qui cupidatat commodo velit.</p>\r\n\r\n<p>Minim cillum eiusmod commodo quis pariatur ad consectetur exercitation officia. Ea est sit incididunt fugiat. Sit laborum veniam ad et ullamco labore et. Officia aliquip eiusmod fugiat do cupidatat nostrud id dolore. Elit cillum labore dolore ea enim culpa ullamco.</p>\r\n\r\n<p>Id laboris magna reprehenderit mollit ad aliquip nisi sit sit. Labore eu elit consectetur enim proident nostrud commodo excepteur sunt. Officia culpa magna laborum excepteur sit. Eiusmod pariatur reprehenderit cillum proident ipsum eiusmod duis qui.</p>', NULL, '2020-11-17 06:49:45', '2020-11-17 06:49:45', NULL),
(2, 1, 1, 'Manifest 2020 Virtual Convention', 'uploads/blog/20201117_114945am_Pearl_Copy_e1561717636412.jpg', NULL, '11231231231432423dfdf-g453434gfg', '<p>Lorem excepteur cupidatat eiusmod dolore labore. Lorem aliqua exercitation sunt aliqua proident consequat tempor reprehenderit esse. Dolore reprehenderit Lorem elit deserunt labore. Reprehenderit elit nisi consectetur sint. Eiusmod reprehenderit ea reprehenderit ut aliquip adipisicing.</p>\r\n\r\n<p>Eiusmod fugiat mollit culpa culpa. In commodo commodo ullamco elit. Do qui ut tempor laborum. Eiusmod consectetur quis aliqua ea aute. Deserunt non laboris magna anim dolore.</p>\r\n\r\n<p>Sunt consequat ipsum occaecat nostrud tempor consequat sunt. Consectetur commodo aliquip Lorem nostrud ut enim minim reprehenderit. Elit fugiat pariatur eiusmod deserunt mollit aliqua. Officia et qui cupidatat commodo velit.</p>\r\n\r\n<p>Minim cillum eiusmod commodo quis pariatur ad consectetur exercitation officia. Ea est sit incididunt fugiat. Sit laborum veniam ad et ullamco labore et. Officia aliquip eiusmod fugiat do cupidatat nostrud id dolore. Elit cillum labore dolore ea enim culpa ullamco.</p>\r\n\r\n<p>Id laboris magna reprehenderit mollit ad aliquip nisi sit sit. Labore eu elit consectetur enim proident nostrud commodo excepteur sunt. Officia culpa magna laborum excepteur sit. Eiusmod pariatur reprehenderit cillum proident ipsum eiusmod duis qui.</p>', 23, '2020-11-17 06:51:31', '2020-11-18 09:33:48', NULL),
(3, 2, 2, 'Clients', 'uploads/blog/20201118_110258am_10_16_20_2_740x.jpg', NULL, 'residential-propertiess', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt ipsam ipsum ratione veniam, natus officia, officiis dolor totam quidem laborum debitis aut iste consectetur. Nobis numquam minus consequatur, sunt quae.<br></p>', NULL, '2020-11-18 02:16:30', '2020-11-18 06:02:58', NULL),
(4, 2, 2, 'Client', NULL, NULL, 'residential-propertiess232', '<p>asdasdsad</p>', NULL, '2020-11-18 02:54:51', '2020-11-18 02:54:51', NULL),
(5, 2, 2, 'Manifest 2020 Virtual Convention', 'download (1).jpeg', NULL, 'residential-propertiess', '<p>sadasdsadsad</p>', NULL, '2020-11-18 02:55:10', '2020-11-18 02:55:10', NULL),
(6, 2, 2, 'Manifest 2020 Virtual Convention', 'a8256db61f95d9cb2645489c251e6daf_tn.jpeg', NULL, 'residential-propertiess', '<p>sadsadsadasdasdsadasdasd</p>', NULL, '2020-11-18 02:56:45', '2020-11-18 02:56:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_categories`
--

CREATE TABLE `topic_categories` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int DEFAULT NULL,
  `allow_agent` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_categories`
--

INSERT INTO `topic_categories` (`id`, `title`, `slug`, `parent_id`, `allow_agent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'General', 'general', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
(2, 'Jobs & Castings', 'jobs-and-castings', NULL, 1, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
(3, 'Q & A', 'q-and-a', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
(4, 'Career Development', 'career Development', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
(5, 'Events', 'events', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
(6, 'Congratulations', 'congratulations', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
(7, 'Industry News', 'industry-news', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_comments`
--

CREATE TABLE `topic_comments` (
  `id` int NOT NULL,
  `parent_id` int DEFAULT NULL,
  `user_id` int NOT NULL,
  `topic_id` int NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_comments`
--

INSERT INTO `topic_comments` (`id`, `parent_id`, `user_id`, `topic_id`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 2, 2, 'Hello', '2020-11-18 09:07:25', '2020-11-18 09:07:25', NULL),
(2, NULL, 2, 2, 'Hello', '2020-11-18 09:14:36', '2020-11-18 09:14:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic_likes`
--

CREATE TABLE `topic_likes` (
  `id` int NOT NULL,
  `topic_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `topic_likes`
--

INSERT INTO `topic_likes` (`id`, `topic_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 2, 2, '2020-11-18 08:35:08', '2020-11-18 08:35:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_categories`
--
ALTER TABLE `topic_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_comments`
--
ALTER TABLE `topic_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic_likes`
--
ALTER TABLE `topic_likes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topic_categories`
--
ALTER TABLE `topic_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `topic_comments`
--
ALTER TABLE `topic_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic_likes`
--
ALTER TABLE `topic_likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
