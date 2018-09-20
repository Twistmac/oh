-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.17-log - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour es15o_home_bd5
CREATE DATABASE IF NOT EXISTS `es15o_home_bd5` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `es15o_home_bd5`;

-- Export de la structure de la table es15o_home_bd5. admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.admins : ~1 rows (environ)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'teck@easywebmobile.fr', '$2y$10$QV/6fsI0EN1PM9lJYfxKk.Xp8NR6hQVRaobpeopgYsn.KhT73cgKW', '03Z9KGN4BcWrS0AaqVmxxzzSBcKKzFATrke0J2OJXXSFPOOulPz8Ns6GSZpY', '2018-07-08 15:08:39', '2018-07-08 15:08:39');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. annonces
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.annonces : ~9 rows (environ)
DELETE FROM `annonces`;
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` (`id`, `categorie_id`, `titre`, `description`, `image`, `prix`, `residence`, `genre`, `age`, `type`, `created_at`, `updated_at`, `user_id`) VALUES
	(2, 6, 'Annonce 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090428_annonce.png', '5', 'Perpignan', '', 3, 'o', '2018-07-20 13:40:28', '2018-07-20 13:40:28', NULL),
	(3, 3, 'Annonce 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090463_annonce.jpg', '50', 'Perpignan', '', 25, 'o', '2018-07-20 13:41:03', '2018-07-20 13:41:03', NULL),
	(4, 1, 'Annonce informations', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090702_annonce.png', '25', 'Saint-Laurent-de-la-Salanque', '', 2, 'o', '2018-07-20 13:45:02', '2018-07-20 13:45:02', NULL),
	(5, 4, 'Annonce event', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1532102640_annonce.jpg', '500', 'Calmeilles', '', 200, 'o', '2018-07-20 17:04:00', '2018-07-20 17:04:00', NULL),
	(8, 6, 'Titre annonces', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', 'image_463215.png', '99', NULL, NULL, NULL, 'r', '2018-08-02 16:41:34', '2018-08-02 16:41:34', NULL),
	(11, 5, 'Mon annonce', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1533283389_annonce.jpg', '88', NULL, NULL, NULL, 'r', '2018-08-03 09:03:10', '2018-08-03 09:03:10', 2),
	(12, 7, 'Annonce essai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1533283515_annonce.jpg', '8864', NULL, NULL, NULL, 'r', '2018-08-03 09:05:16', '2018-08-03 09:05:16', 2),
	(19, 6, 'Test luc', 'Description restaurant', '1534498118_annonce.jpg', '8000', NULL, NULL, NULL, 'r', '2018-08-17 10:28:38', '2018-08-17 10:28:38', 1),
	(26, 1, 'test', 'test', '1537274759_annonce.JPG', '652', 'dlksj', '', 96, 's', '2018-09-18 12:45:59', '2018-09-18 12:45:59', NULL);
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.categories : ~10 rows (environ)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Information', '2018-07-20 12:12:14', '2018-07-20 12:12:14'),
	(2, 'Market place', '2018-07-20 12:12:18', '2018-07-20 12:12:18'),
	(3, 'Service', '2018-07-20 12:12:21', '2018-07-20 12:12:21'),
	(4, 'Event', '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(5, 'Real estate', '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(6, 'Restaurant', '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(7, 'Motorbike', '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(8, 'All', '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(9, 'Food', '2018-08-28 20:50:06', '2018-08-28 20:50:06'),
	(10, 'sakafo', '2018-09-18 11:26:42', '2018-09-18 11:26:42');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. contenu
CREATE TABLE IF NOT EXISTS `contenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Export de données de la table es15o_home_bd5.contenu : ~1 rows (environ)
DELETE FROM `contenu`;
/*!40000 ALTER TABLE `contenu` DISABLE KEYS */;
INSERT INTO `contenu` (`id`, `titre`, `content`, `categorie`, `created_at`, `updated_at`) VALUES
	(1, 'Terms & conditions', '<h1 style="text-align: center;">Terms &amp; conditions</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa cum dolorem doloribus facilis harum incidunt ipsum maiores maxime modi molestias nisi, praesentium rerum totam veritatis? Error fugit temporibus voluptate?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa cum dolorem doloribus facilis harum incidunt ipsum maiores maxime modi molestias nisi, praesentium rerum totam veritatis? Error fugit temporibus voluptate?</p>', 'page', NULL, '2018-07-29 09:22:31');
/*!40000 ALTER TABLE `contenu` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. immeuble
CREATE TABLE IF NOT EXISTS `immeuble` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `residence_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.immeuble : ~0 rows (environ)
DELETE FROM `immeuble`;
/*!40000 ALTER TABLE `immeuble` DISABLE KEYS */;
/*!40000 ALTER TABLE `immeuble` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. likes
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `annonce_id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.likes : ~2 rows (environ)
DELETE FROM `likes`;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`id`, `annonce_id`, `membre_id`, `created_at`, `updated_at`) VALUES
	(2, 2, 2, NULL, NULL),
	(3, 3, 2, NULL, NULL);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. membres
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `syndic_id` int(11) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete` int(1) NOT NULL DEFAULT '0',
  `etat` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `residents_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.membres : ~8 rows (environ)
DELETE FROM `membres`;
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` (`id`, `username`, `password`, `nom`, `prenom`, `birthday`, `sex`, `pseudo`, `phone`, `email`, `salt`, `residence_id`, `syndic_id`, `remember_token`, `created_at`, `updated_at`, `role`, `complete`, `etat`) VALUES
	(1, 'luc', '$2y$10$0WNjc6xtemOnWzh7llMGbu3D6G8jIEglJuCCkqdNEjP25Fzhkxo5m', 'Resident', 'Test', '1990-09-17', 'Male', 'Luc', '06261234', 'luc@easywebmobile.fr', 'b2hvbWU=', NULL, 0, NULL, '2018-07-20 09:09:54', '2018-09-19 19:14:42', 'resident', 1, 1),
	(2, 'test2', '$2y$10$fYuhjej/Brwba6yUP7ops.U/QCzhSSrsfSPT8QOe3V0Y3kD1rT9kK', 'Test', 'Prénom', NULL, 'Male', 'Ttttttyyt', '6546810004', 'test2@easywebmobile.fr', 'b2hvbWU=', NULL, 0, NULL, '2018-07-20 09:10:10', '2018-09-19 19:55:35', 'resident', 1, 1),
	(4, 'test-r', '$2y$10$ZijBvH1UTW8LhbrP3RO.t.5CAXuedPwFPmMpB5/S.G/zkiPETZ9Jm', 'Last testr', 'testr', '2018-08-24', 'Male', 'B', '8899', 'Testr@gmail.com', 'b2hvbWU=', 3, 0, NULL, '2018-08-23 09:25:52', '2018-09-19 19:15:00', 'resident', 1, 0),
	(5, 'test-r1', '$2y$10$f5moKuhqAel2da..SpJgYO2z2id7FqTwWFBHPRQ.A6RlDumYoottK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cmppanozbmk=', 1, 0, NULL, '2018-08-23 09:26:00', '2018-09-19 17:35:36', 'resident', 0, 0),
	(18, 'stephane', '$2y$10$vEf5ZsAzo35ZatDJ.EGIFO9GjO7kIThaNCjy55GvVaH3foq9AWKwO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cTJtcThudnc=', 3, 0, NULL, '2018-09-19 11:50:40', '2018-09-19 11:50:40', 'partenaire', 0, 0),
	(20, 'twistmac@hotmail.fr', '$2y$10$HtDbyPborY2LsHHpeJyjveLCK.qXH1XeH5z2ZIdlUlsg3nkuqn5oG', NULL, NULL, NULL, NULL, NULL, NULL, 'twistmac@hotmail.fr', 'YzI1Mnpwc2k=', 1, 4, NULL, '2018-09-19 12:58:27', '2018-09-19 19:07:18', 'resident', 0, 0),
	(21, 'teck@easywebmobile.fr', '$2y$10$wOSY7gq2L.pRZ4nVLg5wneZrhNXPLEVJUcHh5WCfQtCELozXR6mbW', NULL, NULL, NULL, NULL, NULL, NULL, 'teck@easywebmobile.fr', 'OG9qbnVocWI=', 1, 4, NULL, '2018-09-19 12:58:59', '2018-09-19 17:20:16', 'resident', 0, 0),
	(22, 'manda_salam@hotmail.fr', '$2y$10$szE0AKWHmK6CNHZ56MU3NeKSi0y5inZ9vxqncy1A6dY.oVUVCw/O6', NULL, NULL, NULL, NULL, NULL, NULL, 'manda_salam@hotmail.fr', 'bXdqbGg5Mzc=', 6, 4, NULL, '2018-09-19 13:00:37', '2018-09-19 19:08:15', 'resident', 0, 0);
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.migrations : ~2 rows (environ)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2018_06_29_145053_create_users_table', 1),
	(2, '2018_06_29_150206_create_admins_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. partenaires
CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `partenaires_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.partenaires : ~1 rows (environ)
DELETE FROM `partenaires`;
/*!40000 ALTER TABLE `partenaires` DISABLE KEYS */;
INSERT INTO `partenaires` (`id`, `username`, `password`, `nom`, `prenom`, `birthday`, `sex`, `pseudo`, `phone`, `email`, `salt`, `residence_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, NULL, '$2y$10$XQf0M6FjROGXHtJt0jsEK.dis8HpzVrbXBsX6HGDeGfv/RH6bz/0C', 'Partenaire', 'Testeur', NULL, NULL, NULL, NULL, 'partenaire@gmail.com', 'a3E5MHd2YXE=', NULL, NULL, '2018-07-20 08:38:32', '2018-07-20 08:38:32');
/*!40000 ALTER TABLE `partenaires` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. residence
CREATE TABLE IF NOT EXISTS `residence` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_resident` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actif` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `syndic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `residence_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.residence : ~5 rows (environ)
DELETE FROM `residence`;
/*!40000 ALTER TABLE `residence` DISABLE KEYS */;
INSERT INTO `residence` (`id`, `numero`, `nom`, `nom_ref`, `prenom_ref`, `email`, `adresse`, `code_postal`, `ville`, `tel`, `nb_partenaire`, `nb_resident`, `actif`, `created_at`, `updated_at`, `syndic_id`) VALUES
	(1, '1321', 'Résidence test', 'web', 'easy', 'residence@test.com', 'TEST', '66400', 'Calmeilles', '0654651321', '5', '5', 1, '2018-07-19 09:56:29', '2018-07-19 09:56:29', 4),
	(2, '123456', 'Test', 'Nom', 'prenom', 'test3@easywebmobile.fr', 'Adresse test', '96000', 'Perpignan', '1321', '5', '2', 1, '2018-07-25 08:11:20', '2018-07-25 08:11:20', 1),
	(3, '79800', 'Ma résidence', 'Easy', 'Easywebmobile', 'luc@easywebmobile.fr', 'adresse test', '95200', 'Paris', '65621', '2', '2', 1, '2018-08-06 14:33:30', '2018-08-06 14:52:14', 2),
	(6, '520000', 'rest', 'Maitre', 'maitre prénom', 'twistmacg@mail.com', 'ig 64 50', '101', 'Antananarivoo', '585525222', '2', '5', 1, '2018-09-18 14:17:56', '2018-09-18 14:17:56', 4),
	(7, '2000', 'Twist residencev ed', 'tolotra', NULL, NULL, '52 bis', 'tana', 'tana', NULL, '5', '1', 1, '2018-09-19 13:15:32', '2018-09-19 13:15:32', 4);
/*!40000 ALTER TABLE `residence` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. residents
CREATE TABLE IF NOT EXISTS `residents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `syndic_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_residents_users` (`syndic_id`),
  CONSTRAINT `FK_residents_users` FOREIGN KEY (`syndic_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.residents : ~0 rows (environ)
DELETE FROM `residents`;
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
/*!40000 ALTER TABLE `residents` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.users : ~1 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `salt`) VALUES
	(4, NULL, 'twistmac@hotmail.fr', '$2y$10$TdQcr/CUtRd7P/Yz2KJan./oCjYZ/ELrvymYPmmslEutOp7igRvYa', 'eYPsfba7YgAdRB204HuQSpZMHUMtf0eNz5Q8U0OFEmap4YOBL6gfzrbZYvcf', '2018-09-19 07:33:30', '2018-09-19 07:56:55', 'YzM4MTZmdjY=');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
