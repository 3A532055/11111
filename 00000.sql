-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(2,	1,	2,	'efweff',	'2019-01-12 05:49:18',	'2019-01-12 05:49:18'),
(3,	4,	1,	'fvdscvfewsv',	'2019-01-12 05:54:01',	'2019-01-12 05:54:01'),
(4,	4,	1,	'vdsvdv',	'2019-01-12 05:54:04',	'2019-01-12 05:54:04'),
(5,	4,	2,	'dasdasda',	'2019-01-12 05:54:26',	'2019-01-12 05:54:26');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_01_12_083148_craete_posts_table',	1),
(4,	'2019_01_12_083208_craete_posts_types_table',	1),
(5,	'2019_01_12_125910_create_comments_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `posts` (`id`, `title`, `type`, `content`, `user_id`, `created_at`, `updated_at`) VALUES
(7,	'涼麵不好吃',	16,	'那一家的涼麵醋放好多，我還點了大份\r\n幸好還可以用水沖淡一下，要不然我都吃不下了',	1,	'2019-01-12 06:27:09',	'2019-01-12 06:27:09');

DROP TABLE IF EXISTS `post_types`;
CREATE TABLE `post_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `post_types` (`id`, `name`) VALUES
(6,	'校園自助餐'),
(7,	'高佳自助餐'),
(8,	'八方雲集'),
(9,	'廟口米糕'),
(10,	'龍門炒飯'),
(11,	'傑克與魔豆'),
(12,	'熊愛洋食堂'),
(13,	'家香味'),
(14,	'古早味'),
(15,	'就醬炒'),
(16,	'勤美麵食館');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'管理者',	'admin@mail.com',	'$2y$10$p9rzK7qd11zaxkHkGL8pRuFe76ktcXyiLd4hvCuUPlPrhD75XZcpO',	NULL,	1,	'l5OQPmPC4wB0RYjNzf4Wdl6Hsv7ab8Ivn1Lu2VlCq5XlwgfURbXNsvjL8wz1',	'2019-01-12 05:31:00',	'2019-01-12 05:31:00'),
(2,	'00',	'00@gmail.com',	'$2y$10$eq9708dRJyz/x04pqsArKe6pmj1CHQ/79X1TxyPAuZj7deO3rEuHW',	'uploads/avatar/1547302484.jpg',	0,	'C9SecE5J4mNxJmT37y4zagePDIDGDMKZ1LP2SUNwAVXAevOiNV6557YcwB8d',	'2019-01-12 05:31:27',	'2019-01-12 06:14:44');

-- 2019-01-12 14:29:34
