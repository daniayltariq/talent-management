-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2020 at 07:36 PM
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
-- Table structure for table `app_data`
--

CREATE TABLE `app_data` (
  `id` int NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_skills`
--

CREATE TABLE `candidate_skills` (
  `id` int NOT NULL,
  `candidate_id` int DEFAULT NULL,
  `skill_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_skills`
--

INSERT INTO `candidate_skills` (`id`, `candidate_id`, `skill_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 1, NULL, NULL, NULL),
(2, 4, 2, NULL, NULL, NULL),
(3, 4, 3, NULL, NULL, NULL),
(4, 4, 4, NULL, NULL, NULL);

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int NOT NULL,
  `candidate_id` int DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `role` varchar(191) DEFAULT NULL,
  `production` varchar(191) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `candidate_id`, `type`, `name`, `role`, `production`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'films', 'ww', 'aw', 'dw', NULL, '2020-11-16 15:30:10', '2020-11-16 15:30:10'),
(2, 4, 'films', 'ddwa', 'awdaw', 'ddwad', NULL, '2020-11-16 15:30:10', '2020-11-16 15:30:10'),
(3, 4, 'theater', 'th', 'rr', 'll', NULL, NULL, NULL),
(4, 4, 'theater', 'awwdw', 'dww', 'awwwdd', NULL, NULL, NULL),
(5, 4, 'television', 'tbt', 'rere', 'wad', NULL, NULL, NULL),
(12, 4, 'commercials', 'ww', 'aa', 'dd', NULL, NULL, NULL),
(31, 4, 'training', 'awd', 'dwa', 'wwww', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_21_092156_create_post_jobs_table', 2),
(5, '2020_10_05_103236_create_permission_tables', 2),
(6, '2019_05_03_000001_create_customer_columns', 3),
(7, '2019_05_03_000002_create_subscriptions_table', 3),
(8, '2019_05_03_000003_create_subscription_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picklist`
--

CREATE TABLE `picklist` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picklist`
--

INSERT INTO `picklist` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'test desc', 2, '2020-11-04 11:15:16', '2020-11-04 11:15:16', NULL),
(3, 'new title', 'new description', 2, '2020-11-04 06:51:32', '2020-11-04 06:51:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `picklist_user`
--

CREATE TABLE `picklist_user` (
  `id` int NOT NULL,
  `picklist_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picklist_user`
--

INSERT INTO `picklist_user` (`id`, `picklist_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 4, '2020-11-04 11:51:33', '2020-11-04 11:51:33', NULL),
(2, 1, 4, '2020-11-04 11:54:14', '2020-11-04 11:54:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int UNSIGNED NOT NULL,
  `pkg_type` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `sales_comm` float DEFAULT NULL,
  `stripe_plan` varchar(191) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `unique_url` int NOT NULL,
  `contact_info` int NOT NULL,
  `pictures` int NOT NULL,
  `resume` int NOT NULL,
  `social_links` int NOT NULL,
  `email_me` int NOT NULL,
  `short_message` int NOT NULL,
  `community_access` int NOT NULL,
  `apply_now` int NOT NULL,
  `agent_contact` int NOT NULL,
  `training_invitation` int NOT NULL,
  `inductry_invitation` int NOT NULL,
  `description` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `pkg_type`, `user_type`, `name`, `slug`, `sales_comm`, `stripe_plan`, `cost`, `unique_url`, `contact_info`, `pictures`, `resume`, `social_links`, `email_me`, `short_message`, `community_access`, `apply_now`, `agent_contact`, `training_invitation`, `inductry_invitation`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, NULL, NULL, 'Standard', 'standard', NULL, 'plan_IK07m8QnHeV4Z7', 39.99, 1, 1, 5, 1, 1, 1, 1, 1, 0, 1, 1, 0, '<p>standard description</p>', '2020-11-03 09:47:29', '2020-11-03 09:47:29', NULL),
(14, NULL, NULL, 'Basic', 'basic', NULL, 'plan_IK04jeiIW0OXeB', 19.99, 1, 1, 2, 1, 0, 0, 0, 1, 0, 0, 0, 0, '<p>basic description</p>', '2020-11-03 09:45:07', '2020-11-03 09:45:07', NULL),
(16, NULL, NULL, 'Professional', 'professional', NULL, 'plan_IK08EvV3G3NSNG', 59.99, 1, 1, 15, 1, 1, 1, 1, 1, 1, 1, 1, 1, '<p>professional description</p>', '2020-11-03 09:48:38', '2020-11-03 09:48:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_jobs`
--

CREATE TABLE `post_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `legal_first_name` varchar(255) DEFAULT NULL,
  `legal_last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `feet` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `eyes` varchar(255) DEFAULT NULL,
  `hairs` varchar(255) DEFAULT NULL,
  `neck` varchar(255) DEFAULT NULL,
  `waist` varchar(255) DEFAULT NULL,
  `sleves` varchar(255) DEFAULT NULL,
  `chest` varchar(255) DEFAULT NULL,
  `shoes` varchar(255) DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `legal_first_name`, `legal_last_name`, `email`, `height`, `feet`, `weight`, `eyes`, `hairs`, `neck`, `waist`, `sleves`, `chest`, `shoes`, `address_1`, `address_2`, `zip`, `country`, `state`, `city`, `telephone`, `mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 'Cynthia', 'Jackson', 'cynthia@gmail.com', '5\'7\'\'', 9, NULL, 'brown', 'brown', '15', '17', '15', '22', '9', 'test address', NULL, '078690', 'New Jearsey', NULL, NULL, NULL, NULL, '2020-11-04 10:27:16', '2020-11-04 10:27:16', '2020-11-16 12:25:57'),
(2, 4, 'Jawad', 'Ahmed', 'jawadahmed1024@gmail.com', '4', 1, 40, 'brown', 'black', '2', '2', '2', '22', '8', 'test address 542,52, test adderess, test adderess', 'test adderess', '46000', 'Pakistan', 'Punjab', 'rwp', '6092922121', '6092922121', '2020-11-16 08:17:02', '2020-11-16 08:38:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', NULL, NULL),
(2, 'candidate', 'web', NULL, NULL),
(3, 'agent', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE `search_history` (
  `id` int NOT NULL,
  `query_string` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `slug`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Basketball', 'basketball', NULL, '2020-11-05 05:39:24', '2020-11-05 05:39:24', NULL),
(2, 'Baseball', 'baseball', NULL, '2020-11-05 05:40:08', '2020-11-05 05:40:08', NULL),
(3, 'Golf', 'golf', NULL, '2020-11-05 05:40:18', '2020-11-05 05:40:18', NULL),
(4, 'Rollerblading', 'rollerblading', NULL, '2020-11-05 05:41:07', '2020-11-05 05:41:07', NULL),
(5, 'Juggling', 'juggling', NULL, '2020-11-05 05:41:25', '2020-11-05 05:41:25', NULL),
(6, 'Scuba (PADI certified)', 'scuba', NULL, '2020-11-05 05:41:46', '2020-11-05 05:41:46', NULL),
(7, 'Valid Driver\'s License and US Passport', 'valid_driver\'s_license_and_us_passport', NULL, '2020-11-05 05:43:40', '2020-11-05 05:43:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `stripe_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 4, 'basic', 'sub_IK4rqSIyJNZ50Q', 'active', 'plan_IK04jeiIW0OXeB', 1, NULL, NULL, '2020-11-03 09:41:54', '2020-11-03 09:41:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint UNSIGNED NOT NULL,
  `subscription_id` bigint UNSIGNED NOT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_items`
--

INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_plan`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'si_IK4rv0rtnTn2ez', 'plan_IK04jeiIW0OXeB', 1, '2020-11-03 09:41:54', '2020-11-03 09:41:54');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `f_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verification_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_adress_1` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_adress_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `gender`, `dob`, `phone`, `email`, `email_verified_at`, `email_verification_code`, `password`, `country`, `city`, `state`, `h_adress_1`, `h_adress_2`, `zipcode`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES
(1, 'super', 'admin', 'male', '2222-12-06', '123', 'admin@talent.com', '2020-09-16 13:12:08', NULL, '$2y$10$YrgReU37ymwLGQqXGz5xAeVaWZhth950e5Mj4BBoL/2rg85ro5f2K', 'asd', 'asd', 'AK', 'asd', 'asd', '231', 'qFpmhARNRcv37zcgMkw3NvgTjj0bGgqbUJMi8ny1O8KulNPbnEvM9KzXYapI', '2020-09-16 08:33:20', '2020-09-16 13:12:08', NULL, NULL, NULL, NULL),
(2, 'AWAIS', 'AWAISS', 'male', '2020-09-06', '123', 'agent@talent.com', '2020-09-16 13:03:01', NULL, '$2y$10$YrgReU37ymwLGQqXGz5xAeVaWZhth950e5Mj4BBoL/2rg85ro5f2K', 'asd', 'asd', 'AK', 'asd', 'asd', '123', NULL, '2020-09-16 13:02:09', '2020-09-16 13:03:01', NULL, NULL, NULL, NULL),
(4, 'ali', 'khan', 'male', '1996-03-06', '6092922121', 'user@talent.com', NULL, NULL, '$2y$10$YrgReU37ymwLGQqXGz5xAeVaWZhth950e5Mj4BBoL/2rg85ro5f2K', 'United States', 'NJ', 'AK', 'bdhbw akbwjd', 'test adderess', '07097', NULL, '2020-11-02 04:08:19', '2020-11-03 09:41:51', 'cus_IK4reNt4t7NIuH', 'visa', '4242', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_data`
--
ALTER TABLE `app_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picklist`
--
ALTER TABLE `picklist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picklist_user`
--
ALTER TABLE `picklist_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_jobs`
--
ALTER TABLE `post_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `search_history`
--
ALTER TABLE `search_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_data`
--
ALTER TABLE `app_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate_skills`
--
ALTER TABLE `candidate_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `picklist`
--
ALTER TABLE `picklist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `picklist_user`
--
ALTER TABLE `picklist_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `post_jobs`
--
ALTER TABLE `post_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `search_history`
--
ALTER TABLE `search_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
