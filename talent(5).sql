-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table talent.app_data
CREATE TABLE IF NOT EXISTS `app_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_key` varchar(255) NOT NULL,
  `meta_value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table talent.app_data: ~0 rows (approximately)
/*!40000 ALTER TABLE `app_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_data` ENABLE KEYS */;

-- Dumping structure for table talent.candidate_skills
CREATE TABLE IF NOT EXISTS `candidate_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) DEFAULT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.candidate_skills: 4 rows
/*!40000 ALTER TABLE `candidate_skills` DISABLE KEYS */;
INSERT INTO `candidate_skills` (`id`, `candidate_id`, `skill_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 1, NULL, NULL, NULL),
	(2, 4, 2, NULL, NULL, NULL),
	(3, 4, 3, NULL, NULL, NULL),
	(4, 4, 4, NULL, NULL, NULL);
/*!40000 ALTER TABLE `candidate_skills` ENABLE KEYS */;

-- Dumping structure for table talent.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table talent.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table talent.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table talent.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table talent.community
CREATE TABLE IF NOT EXISTS `community` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table talent.community: 0 rows
/*!40000 ALTER TABLE `community` DISABLE KEYS */;
/*!40000 ALTER TABLE `community` ENABLE KEYS */;

-- Dumping structure for table talent.contact
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table talent.contact: ~0 rows (approximately)
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;

-- Dumping structure for table talent.experience
CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `role` varchar(191) DEFAULT NULL,
  `production` varchar(191) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.experience: 10 rows
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` (`id`, `candidate_id`, `type`, `name`, `role`, `production`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'films', 'ww', 'aw', 'dw', NULL, '2020-11-20 09:40:36', '2020-11-20 09:40:36'),
	(2, 4, 'films', 'ddwa', 'awdaw', 'ddwad', NULL, '2020-11-20 09:40:36', '2020-11-20 09:40:36'),
	(3, 4, 'theater', 'th', 'rr', 'll', NULL, NULL, NULL),
	(4, 4, 'theater', 'awwdw', 'dww', 'awwwdd', NULL, NULL, NULL),
	(5, 4, 'television', 'tbt', 'rere', 'wad', NULL, NULL, NULL),
	(43, 4, 'films', 'ww', 'aw', 'dw', NULL, NULL, NULL),
	(44, 4, 'films', 'ddwa', 'awdaw', 'ddwad', NULL, NULL, NULL),
	(12, 4, 'commercials', 'ww', 'aa', 'dd', NULL, NULL, NULL),
	(31, 4, 'training', 'awd', 'dwa', 'wwww', NULL, NULL, NULL),
	(45, 4, 'films', 'test', 'test', 'test', NULL, NULL, NULL);
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;

-- Dumping structure for table talent.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table talent.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.migrations: ~7 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_09_21_092156_create_post_jobs_table', 2),
	(5, '2020_10_05_103236_create_permission_tables', 2),
	(6, '2019_05_03_000001_create_customer_columns', 3),
	(7, '2019_05_03_000002_create_subscriptions_table', 3),
	(8, '2019_05_03_000003_create_subscription_items_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table talent.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.model_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table talent.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.model_has_roles: ~8 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(3, 'App\\Models\\User', 2),
	(2, 'App\\Models\\User', 4),
	(3, 'App\\Models\\User', 6),
	(3, 'App\\Models\\User', 7),
	(3, 'App\\Models\\User', 8),
	(3, 'App\\Models\\User', 10),
	(2, 'App\\Models\\User', 12);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table talent.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table talent.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table talent.picklist
CREATE TABLE IF NOT EXISTS `picklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.picklist: ~2 rows (approximately)
/*!40000 ALTER TABLE `picklist` DISABLE KEYS */;
INSERT INTO `picklist` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'test', 'test desc', 2, '2020-11-04 16:15:16', '2020-11-04 16:15:16', NULL),
	(3, 'new title', 'new description', 2, '2020-11-04 11:51:32', '2020-11-04 11:51:32', NULL);
/*!40000 ALTER TABLE `picklist` ENABLE KEYS */;

-- Dumping structure for table talent.picklist_user
CREATE TABLE IF NOT EXISTS `picklist_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picklist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.picklist_user: ~2 rows (approximately)
/*!40000 ALTER TABLE `picklist_user` DISABLE KEYS */;
INSERT INTO `picklist_user` (`id`, `picklist_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 3, 4, '2020-11-04 11:51:33', '2020-11-04 11:51:33', NULL),
	(2, 1, 4, '2020-11-04 11:54:14', '2020-11-04 11:54:14', NULL);
/*!40000 ALTER TABLE `picklist_user` ENABLE KEYS */;

-- Dumping structure for table talent.plans
CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pkg_type` varchar(50) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `sales_comm` float DEFAULT NULL,
  `stripe_plan` varchar(191) DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `unique_url` int(11) NOT NULL,
  `contact_info` int(11) NOT NULL,
  `pictures` int(11) NOT NULL,
  `resume` int(11) NOT NULL,
  `social_links` int(11) NOT NULL,
  `email_me` int(11) NOT NULL,
  `short_message` int(11) NOT NULL,
  `community_access` int(11) NOT NULL,
  `apply_now` int(11) NOT NULL,
  `agent_contact` int(11) NOT NULL,
  `training_invitation` int(11) NOT NULL,
  `inductry_invitation` int(11) NOT NULL,
  `description` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.plans: 3 rows
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` (`id`, `pkg_type`, `user_type`, `name`, `slug`, `sales_comm`, `stripe_plan`, `cost`, `unique_url`, `contact_info`, `pictures`, `resume`, `social_links`, `email_me`, `short_message`, `community_access`, `apply_now`, `agent_contact`, `training_invitation`, `inductry_invitation`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(15, NULL, NULL, 'Standard', 'standard', NULL, 'plan_IK07m8QnHeV4Z7', 39.99, 1, 1, 5, 1, 1, 1, 1, 1, 0, 1, 1, 0, '<p>standard description</p>', '2020-11-03 09:47:29', '2020-11-03 09:47:29', NULL),
	(14, NULL, NULL, 'Basic', 'basic', NULL, 'plan_IK04jeiIW0OXeB', 19.99, 1, 1, 2, 1, 0, 0, 0, 1, 0, 0, 0, 0, '<p>basic description</p>', '2020-11-03 09:45:07', '2020-11-03 09:45:07', NULL),
	(16, NULL, NULL, 'Professional', 'professional', NULL, 'plan_IK08EvV3G3NSNG', 59.99, 1, 1, 15, 1, 1, 1, 1, 1, 1, 1, 1, 1, '<p>professional description</p>', '2020-11-03 09:48:38', '2020-11-03 09:48:38', NULL);
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;

-- Dumping structure for table talent.post_jobs
CREATE TABLE IF NOT EXISTS `post_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.post_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `post_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_jobs` ENABLE KEYS */;

-- Dumping structure for table talent.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(191) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `legal_first_name` varchar(255) DEFAULT NULL,
  `legal_last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `height` varchar(50) DEFAULT NULL,
  `feet` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.profile: ~2 rows (approximately)
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `profile_img`, `user_id`, `legal_first_name`, `legal_last_name`, `email`, `height`, `feet`, `weight`, `eyes`, `hairs`, `neck`, `waist`, `sleves`, `chest`, `shoes`, `address_1`, `address_2`, `zip`, `country`, `state`, `city`, `telephone`, `mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 4, 'Cynthia', 'Jackson', 'cynthia@gmail.com', '5\'7\'\'', 9, NULL, 'brown', 'brown', '15', '17', '15', '22', '9', 'test address', NULL, '078690', 'New Jearsey', NULL, NULL, NULL, NULL, '2020-11-04 15:27:16', '2020-11-04 15:27:16', '2020-11-16 17:25:57'),
	(2, '-2020-11-18-5fb4e64516cf4.jpg', 4, 'Jawad', 'Ahmed', 'jawadahmed1024@gmail.com', '4', 1, 40, 'brown', 'black', '2', '2', '2', '22', '8', 'test address 542,52, test adderess, test adderess', 'test adderess', '46000', 'Pakistan', 'Punjab', 'rwp', '6092922121', '6092922121', '2020-11-16 13:17:02', '2020-11-18 09:15:49', NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

-- Dumping structure for table talent.referal
CREATE TABLE IF NOT EXISTS `referal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `refer_code` varchar(191) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `refer_code` (`refer_code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.referal: 1 rows
/*!40000 ALTER TABLE `referal` DISABLE KEYS */;
INSERT INTO `referal` (`id`, `user_id`, `refer_code`, `points`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, 'WRXQpmzk3BbSJUnltJFZ', 1, '2020-11-18 14:15:45', '2020-11-19 12:21:41', NULL);
/*!40000 ALTER TABLE `referal` ENABLE KEYS */;

-- Dumping structure for table talent.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'web', NULL, NULL),
	(2, 'candidate', 'web', NULL, NULL),
	(3, 'agent', 'web', NULL, NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table talent.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.role_has_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table talent.search_history
CREATE TABLE IF NOT EXISTS `search_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `query_string` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table talent.search_history: ~0 rows (approximately)
/*!40000 ALTER TABLE `search_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `search_history` ENABLE KEYS */;

-- Dumping structure for table talent.skills
CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.skills: ~7 rows (approximately)
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` (`id`, `title`, `slug`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Basketball', 'basketball', NULL, '2020-11-05 10:39:24', '2020-11-05 10:39:24', NULL),
	(2, 'Baseball', 'baseball', NULL, '2020-11-05 10:40:08', '2020-11-05 10:40:08', NULL),
	(3, 'Golf', 'golf', NULL, '2020-11-05 10:40:18', '2020-11-05 10:40:18', NULL),
	(4, 'Rollerblading', 'rollerblading', NULL, '2020-11-05 10:41:07', '2020-11-05 10:41:07', NULL),
	(5, 'Juggling', 'juggling', NULL, '2020-11-05 10:41:25', '2020-11-05 10:41:25', NULL),
	(6, 'Scuba (PADI certified)', 'scuba', NULL, '2020-11-05 10:41:46', '2020-11-05 10:41:46', NULL),
	(7, 'Valid Driver\'s License and US Passport', 'valid_driver\'s_license_and_us_passport', NULL, '2020-11-05 10:43:40', '2020-11-05 10:43:40', NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;

-- Dumping structure for table talent.subscribers
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `stripe_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table talent.subscribers: ~0 rows (approximately)
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;

-- Dumping structure for table talent.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.subscriptions: 2 rows
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
	(1, 4, 'basic', 'sub_IK4rqSIyJNZ50Q', 'active', 'plan_IK04jeiIW0OXeB', 1, NULL, NULL, '2020-11-03 14:41:54', '2020-11-03 14:41:54'),
	(5, 12, 'basic', 'sub_IQ2DiHRY4CVj5M', 'active', 'plan_IK04jeiIW0OXeB', 1, NULL, NULL, '2020-11-19 12:21:41', '2020-11-19 12:21:41');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;

-- Dumping structure for table talent.subscription_items
CREATE TABLE IF NOT EXISTS `subscription_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  KEY `subscription_items_stripe_id_index` (`stripe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.subscription_items: 2 rows
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_plan`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 1, 'si_IK4rv0rtnTn2ez', 'plan_IK04jeiIW0OXeB', 1, '2020-11-03 14:41:54', '2020-11-03 14:41:54'),
	(5, 5, 'si_IQ2DR3bnB70hj8', 'plan_IK04jeiIW0OXeB', 1, '2020-11-19 12:21:41', '2020-11-19 12:21:41');
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;

-- Dumping structure for table talent.topics
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_category_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `meta_title` varchar(191) DEFAULT NULL,
  `slug` varchar(191) DEFAULT NULL,
  `content` text,
  `views` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.topics: ~6 rows (approximately)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `topic_category_id`, `user_id`, `title`, `image`, `meta_title`, `slug`, `content`, `views`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 1, 'Topic', 'uploads/blog/20201117_114945am_Pearl_Copy_e1561717636412.jpg', NULL, '2323232323', '<p>Lorem excepteur cupidatat eiusmod dolore labore. Lorem aliqua exercitation sunt aliqua proident consequat tempor reprehenderit esse. Dolore reprehenderit Lorem elit deserunt labore. Reprehenderit elit nisi consectetur sint. Eiusmod reprehenderit ea reprehenderit ut aliquip adipisicing.</p>\r\n\r\n<p>Eiusmod fugiat mollit culpa culpa. In commodo commodo ullamco elit. Do qui ut tempor laborum. Eiusmod consectetur quis aliqua ea aute. Deserunt non laboris magna anim dolore.</p>\r\n\r\n<p>Sunt consequat ipsum occaecat nostrud tempor consequat sunt. Consectetur commodo aliquip Lorem nostrud ut enim minim reprehenderit. Elit fugiat pariatur eiusmod deserunt mollit aliqua. Officia et qui cupidatat commodo velit.</p>\r\n\r\n<p>Minim cillum eiusmod commodo quis pariatur ad consectetur exercitation officia. Ea est sit incididunt fugiat. Sit laborum veniam ad et ullamco labore et. Officia aliquip eiusmod fugiat do cupidatat nostrud id dolore. Elit cillum labore dolore ea enim culpa ullamco.</p>\r\n\r\n<p>Id laboris magna reprehenderit mollit ad aliquip nisi sit sit. Labore eu elit consectetur enim proident nostrud commodo excepteur sunt. Officia culpa magna laborum excepteur sit. Eiusmod pariatur reprehenderit cillum proident ipsum eiusmod duis qui.</p>', 1, '2020-11-17 06:49:45', '2020-11-19 10:49:35', NULL),
	(2, 1, 1, 'Manifest 2020 Virtual Convention', 'uploads/blog/20201117_114945am_Pearl_Copy_e1561717636412.jpg', NULL, '11231231231432423dfdf-g453434gfg', '<p>Lorem excepteur cupidatat eiusmod dolore labore. Lorem aliqua exercitation sunt aliqua proident consequat tempor reprehenderit esse. Dolore reprehenderit Lorem elit deserunt labore. Reprehenderit elit nisi consectetur sint. Eiusmod reprehenderit ea reprehenderit ut aliquip adipisicing.</p>\r\n\r\n<p>Eiusmod fugiat mollit culpa culpa. In commodo commodo ullamco elit. Do qui ut tempor laborum. Eiusmod consectetur quis aliqua ea aute. Deserunt non laboris magna anim dolore.</p>\r\n\r\n<p>Sunt consequat ipsum occaecat nostrud tempor consequat sunt. Consectetur commodo aliquip Lorem nostrud ut enim minim reprehenderit. Elit fugiat pariatur eiusmod deserunt mollit aliqua. Officia et qui cupidatat commodo velit.</p>\r\n\r\n<p>Minim cillum eiusmod commodo quis pariatur ad consectetur exercitation officia. Ea est sit incididunt fugiat. Sit laborum veniam ad et ullamco labore et. Officia aliquip eiusmod fugiat do cupidatat nostrud id dolore. Elit cillum labore dolore ea enim culpa ullamco.</p>\r\n\r\n<p>Id laboris magna reprehenderit mollit ad aliquip nisi sit sit. Labore eu elit consectetur enim proident nostrud commodo excepteur sunt. Officia culpa magna laborum excepteur sit. Eiusmod pariatur reprehenderit cillum proident ipsum eiusmod duis qui.</p>', 102, '2020-11-17 06:51:31', '2020-11-19 14:39:41', NULL),
	(3, 2, 2, 'Clients', 'uploads/blog/20201118_110258am_10_16_20_2_740x.jpg', NULL, 'residential-propertiess', '<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sunt ipsam ipsum ratione veniam, natus officia, officiis dolor totam quidem laborum debitis aut iste consectetur. Nobis numquam minus consequatur, sunt quae.<br></p>', 1, '2020-11-18 02:16:30', '2020-11-19 10:49:35', NULL),
	(4, 2, 2, 'Client', NULL, NULL, 'residential-propertiess232', '<p>asdasdsad</p>', NULL, '2020-11-18 02:54:51', '2020-11-18 02:54:51', NULL),
	(5, 2, 2, 'Manifest 2020 Virtual Convention', 'download (1).jpeg', NULL, 'residential-propertiess', '<p>sadasdsadsad</p>', NULL, '2020-11-18 02:55:10', '2020-11-18 02:55:10', NULL),
	(6, 2, 2, 'Manifest 2020 Virtual Convention', 'a8256db61f95d9cb2645489c251e6daf_tn.jpeg', NULL, 'residential-propertiess', '<p>sadsadsadasdasdsadasdasd</p>', NULL, '2020-11-18 02:56:45', '2020-11-18 02:56:45', NULL);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;

-- Dumping structure for table talent.topic_categories
CREATE TABLE IF NOT EXISTS `topic_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `allow_agent` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.topic_categories: ~7 rows (approximately)
/*!40000 ALTER TABLE `topic_categories` DISABLE KEYS */;
INSERT INTO `topic_categories` (`id`, `title`, `slug`, `parent_id`, `allow_agent`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'General', 'general', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
	(2, 'Jobs & Castings', 'jobs-and-castings', NULL, 1, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
	(3, 'Q & A', 'q-and-a', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
	(4, 'Career Development', 'career Development', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
	(5, 'Events', 'events', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
	(6, 'Congratulations', 'congratulations', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL),
	(7, 'Industry News', 'industry-news', NULL, NULL, '2020-11-17 09:51:09', '2020-11-17 09:51:09', NULL);
/*!40000 ALTER TABLE `topic_categories` ENABLE KEYS */;

-- Dumping structure for table talent.topic_comments
CREATE TABLE IF NOT EXISTS `topic_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table talent.topic_comments: ~4 rows (approximately)
/*!40000 ALTER TABLE `topic_comments` DISABLE KEYS */;
INSERT INTO `topic_comments` (`id`, `parent_id`, `user_id`, `topic_id`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, NULL, 2, 2, 'Hello', '2020-11-18 09:07:25', '2020-11-18 09:07:25', NULL),
	(2, NULL, 2, 2, 'Hello', '2020-11-18 09:14:36', '2020-11-18 09:14:36', NULL),
	(3, 1, 2, 2, 'child1', '2020-11-19 15:29:37', '2020-11-19 15:29:37', NULL),
	(5, 2, 4, 2, 'child2', '2020-11-19 10:39:07', '2020-11-19 10:39:07', NULL);
/*!40000 ALTER TABLE `topic_comments` ENABLE KEYS */;

-- Dumping structure for table talent.topic_likes
CREATE TABLE IF NOT EXISTS `topic_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table talent.topic_likes: ~1 rows (approximately)
/*!40000 ALTER TABLE `topic_likes` DISABLE KEYS */;
INSERT INTO `topic_likes` (`id`, `topic_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(14, 2, 2, '2020-11-18 08:35:08', '2020-11-18 08:35:08', NULL);
/*!40000 ALTER TABLE `topic_likes` ENABLE KEYS */;

-- Dumping structure for table talent.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `profile_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `email_verification_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_adress_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h_adress_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `referrer_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table talent.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `profile_img`, `f_name`, `l_name`, `gender`, `dob`, `phone`, `email`, `email_verified_at`, `email_verification_code`, `password`, `country`, `city`, `state`, `h_adress_1`, `h_adress_2`, `zipcode`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `referrer_id`) VALUES
	(1, NULL, 'super', 'admin', 'male', '2222-12-06', '123', 'admin@talent.com', '2020-09-16 18:12:08', NULL, '$2y$10$YrgReU37ymwLGQqXGz5xAeVaWZhth950e5Mj4BBoL/2rg85ro5f2K', 'asd', 'asd', 'AK', 'asd', 'asd', '231', NULL, '2020-09-16 13:33:20', '2020-09-16 18:12:08', NULL, NULL, NULL, NULL, NULL),
	(2, NULL, 'AWAIS', 'AWAISS', 'male', '2020-09-06', '123', 'agent@talent.com', '2020-09-16 18:03:01', NULL, '$2y$10$YrgReU37ymwLGQqXGz5xAeVaWZhth950e5Mj4BBoL/2rg85ro5f2K', 'asd', 'asd', 'AK', 'asd', 'asd', '123', NULL, '2020-09-16 18:02:09', '2020-09-16 18:03:01', NULL, NULL, NULL, NULL, NULL),
	(4, NULL, 'aliiii', 'khan', 'male', '1996-03-06', '6092922121', 'user@talent.com', NULL, NULL, '$2y$10$YrgReU37ymwLGQqXGz5xAeVaWZhth950e5Mj4BBoL/2rg85ro5f2K', 'United States', 'NJ', 'AK', 'bdhbw akbwjd', 'test adderess', '07097', NULL, '2020-11-02 09:08:19', '2020-11-20 13:11:25', 'cus_IK4reNt4t7NIuH', 'visa', '4242', NULL, NULL),
	(12, NULL, 'test', 'test', 'male', '2020-11-09', '6092922121', 'test@flt.com', NULL, NULL, '$2y$10$e6T/MoD./ThMqX6K6yjIPObOtDJ3aQVXlImWVRpK9inistLPR5mfm', 'Pakistan', 'NJ', 'AK', 'bdhbw akbwjd', 'test adderess', '07097', NULL, '2020-11-19 11:44:07', '2020-11-19 11:56:21', 'cus_IQ1npl1SkgwXNV', 'visa', '4242', NULL, '4');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
