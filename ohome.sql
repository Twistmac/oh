-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           10.2.3-MariaDB-log - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Export de la structure de la base pour es15o_home_bd5
DROP DATABASE IF EXISTS `es15o_home_bd5`;
CREATE DATABASE IF NOT EXISTS `es15o_home_bd5` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `es15o_home_bd5`;

-- Export de la structure de la table es15o_home_bd5. admins
DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32;

-- Export de données de la table es15o_home_bd5.admins : ~0 rows (environ)
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'teck@easywebmobile.fr', '$2y$10$Stuq/C2s52vPfMjgm./0feHKKAXvCDamd162cd5.ohni2bTZ.mSCS', 'irxoFwXq5xy5KuIuEFaklFHxEqs0LDpBsT5ksn8yG9moqk4nKxfoecpnyhQX', '2018-07-08 15:08:39', '2018-11-21 15:42:13');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. annonces
DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `syndic_id` int(11) DEFAULT NULL,
  `id_partenaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.annonces : ~11 rows (environ)
/*!40000 ALTER TABLE `annonces` DISABLE KEYS */;
INSERT INTO `annonces` (`id`, `categorie_id`, `titre`, `description`, `image`, `prix`, `genre`, `age`, `type`, `created_at`, `updated_at`, `user_id`, `syndic_id`, `id_partenaire`) VALUES
	(2, 6, 'Annonce 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090428_annonce.png', '5', '', 3, 'o', '2018-07-20 13:40:28', '2018-07-20 13:40:28', NULL, 0, NULL),
	(3, 3, 'Annonce 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090463_annonce.jpg', '50', '', 25, 'o', '2018-07-20 13:41:03', '2018-07-20 13:41:03', NULL, 0, NULL),
	(4, 1, 'Annonce informations', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090702_annonce.png', '25', '', 2, 'o', '2018-07-20 13:45:02', '2018-07-20 13:45:02', NULL, 0, NULL),
	(5, 4, 'Annonce ohome', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1532102640_annonce.jpg', '500', '', 200, 'o', '2018-07-20 17:04:00', '2018-07-20 17:04:00', NULL, 0, NULL),
	(8, 6, 'statuts annonces', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', 'image_463215.png', '99', NULL, NULL, 'p', '2018-08-02 16:41:34', '2018-08-02 16:41:34', NULL, 54, NULL),
	(11, 5, 'Mon annonce', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1533283389_annonce.jpg', '88', NULL, NULL, 'r', '2018-08-03 09:03:10', '2018-08-03 09:03:10', 2, 54, NULL),
	(12, 7, 'Annonce essai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1533283515_annonce.jpg', '8864', NULL, NULL, 'r', '2018-08-03 09:05:16', '2018-08-03 09:05:16', 2, 54, NULL),
	(92, 1, 'Essai', '', '', '52', NULL, NULL, 'r', '2018-11-09 08:12:14', '2018-11-09 08:12:14', 2, 55, NULL),
	(106, 1, 'Jardin 60', 'Mimi', '1542030299_annonce.jpg', '60', NULL, NULL, 'r', '2018-11-12 13:44:59', '2018-11-12 13:44:59', 4, 55, NULL),
	(114, 1, 'Ô OK ob', '', '1542094898_annonce.jpg', '0', NULL, NULL, 'p', '2018-11-13 07:41:38', '2018-11-13 07:41:38', 0, 55, 3),
	(115, 1, 'test kel', 'testsetes', '1543306850_annonce.jpg', '52', '', NULL, 'o', '2018-11-27 08:20:50', '2018-11-27 08:20:50', NULL, NULL, NULL);
/*!40000 ALTER TABLE `annonces` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. annonces_syndic
DROP TABLE IF EXISTS `annonces_syndic`;
CREATE TABLE IF NOT EXISTS `annonces_syndic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `syndic_id` int(11) DEFAULT 0,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `prix` varchar(200) NOT NULL,
  `residence` varchar(200) DEFAULT NULL,
  `genre` varchar(200) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.annonces_syndic : ~4 rows (environ)
/*!40000 ALTER TABLE `annonces_syndic` DISABLE KEYS */;
INSERT INTO `annonces_syndic` (`id`, `syndic_id`, `categorie_id`, `titre`, `description`, `image`, `prix`, `residence`, `genre`, `age`, `created_at`, `updated_at`) VALUES
	(10, 46, 1, 'Vide-grenier à Perpignan', 'Holiday', '1540458407_annonce.jpg', '50', NULL, '', 1, '2018-10-25 09:06:47', '2018-10-25 09:06:47'),
	(11, 46, 5, 'Reach\'art et Seb en concert à Bages', 'holla holla', '1540458485_annonce.jpg', '5023', NULL, '', 3, '2018-10-25 09:08:05', '2018-10-25 09:08:05'),
	(12, 46, 3, 'service àà', 'tes test', '1540458527_annonce.jpg', '132', NULL, '', 2, '2018-10-25 09:08:47', '2018-10-25 09:08:47'),
	(14, 46, 6, 'resto', 'chique', '1540458728_annonce.jpg', '56', NULL, '', 3, '2018-10-25 09:12:08', '2018-10-25 09:12:08');
/*!40000 ALTER TABLE `annonces_syndic` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. appartement
DROP TABLE IF EXISTS `appartement`;
CREATE TABLE IF NOT EXISTS `appartement` (
  `id_appartement` int(11) NOT NULL AUTO_INCREMENT,
  `num_appartement` varchar(200) DEFAULT NULL,
  `id_residence` int(11) DEFAULT NULL,
  `id_immeuble` int(11) NOT NULL,
  `id_resident` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_appartement`),
  UNIQUE KEY `numero_module` (`num_appartement`),
  KEY `FK_appartement_immeuble` (`id_immeuble`),
  CONSTRAINT `FK_appartement_immeuble` FOREIGN KEY (`id_immeuble`) REFERENCES `immeuble` (`id_immeuble`)
) ENGINE=InnoDB AUTO_INCREMENT=349 DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.appartement : ~7 rows (environ)
/*!40000 ALTER TABLE `appartement` DISABLE KEYS */;
INSERT INTO `appartement` (`id_appartement`, `num_appartement`, `id_residence`, `id_immeuble`, `id_resident`, `created_at`, `updated_at`) VALUES
	(342, '123', 57, 165, 83, '2018-11-26 13:28:48', '2018-11-26 13:32:39'),
	(343, '125', 57, 165, 84, '2018-11-26 13:28:48', '2018-11-26 13:32:39'),
	(344, NULL, 58, 166, NULL, '2018-11-26 14:52:59', '2018-11-26 14:52:59'),
	(345, NULL, 58, 166, NULL, '2018-11-26 14:52:59', '2018-11-26 14:52:59'),
	(346, '562', 58, 166, NULL, '2018-11-26 14:52:59', '2018-11-26 14:53:08'),
	(347, NULL, 58, 166, NULL, '2018-11-26 14:52:59', '2018-11-26 14:52:59'),
	(348, NULL, 58, 166, NULL, '2018-11-26 14:52:59', '2018-11-26 14:52:59');
/*!40000 ALTER TABLE `appartement` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_indonnesie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.categories : ~9 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `name_indonnesie`, `created_at`, `updated_at`) VALUES
	(1, 'Information', NULL, '2018-07-20 12:12:14', '2018-07-20 12:12:14'),
	(2, 'Market place', NULL, '2018-07-20 12:12:18', '2018-07-20 12:12:18'),
	(3, 'Service', NULL, '2018-07-20 12:12:21', '2018-07-20 12:12:21'),
	(4, 'Event', NULL, '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(5, 'Real estate', NULL, '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(6, 'Restaurant', NULL, '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(7, 'Motorbike', NULL, '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(8, 'All', NULL, '2018-07-20 00:00:00', '2018-07-20 00:00:00'),
	(9, 'Food', NULL, '2018-08-28 20:50:06', '2018-08-28 20:50:06'),
	(12, 'people', 'orang-orang', '2018-11-27 08:38:10', '2018-11-27 08:38:10');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. coms_annonce
DROP TABLE IF EXISTS `coms_annonce`;
CREATE TABLE IF NOT EXISTS `coms_annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_annonce` int(11) DEFAULT NULL,
  `id_membre` int(11) DEFAULT NULL,
  `commentaire` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.coms_annonce : ~6 rows (environ)
/*!40000 ALTER TABLE `coms_annonce` DISABLE KEYS */;
INSERT INTO `coms_annonce` (`id`, `id_annonce`, `id_membre`, `commentaire`, `created_at`, `updated_at`) VALUES
	(1, 3, 2, 'I like', '2018-10-16 10:29:34', '2018-10-16 10:29:35'),
	(2, 3, 52, 'it\'s beautifull', '2018-10-16 10:35:02', '2018-10-16 10:35:04'),
	(3, 12, 2, 'Ils vert good', '2018-10-25 13:38:48', '2018-10-25 13:38:48'),
	(4, 12, 2, 'Ils vert good', '2018-10-25 13:38:53', '2018-10-25 13:38:53'),
	(5, 14, 2, 'Test', '2018-10-25 13:39:48', '2018-10-25 13:39:48'),
	(6, 14, 2, 'Ils good', '2018-10-25 13:53:48', '2018-10-25 13:53:48');
/*!40000 ALTER TABLE `coms_annonce` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. contenu
DROP TABLE IF EXISTS `contenu`;
CREATE TABLE IF NOT EXISTS `contenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Export de données de la table es15o_home_bd5.contenu : ~0 rows (environ)
/*!40000 ALTER TABLE `contenu` DISABLE KEYS */;
INSERT INTO `contenu` (`id`, `titre`, `content`, `categorie`, `created_at`, `updated_at`) VALUES
	(1, 'Terms & conditions', '<h1 style="text-align: center;">Terms &amp; conditions</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa cum dolorem tes facilis harum incidunt ipsum maiores maxime modi molestias nisi, praesentium rerum totam veritatis? Error fugit temporibus voluptate?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa cum dolorem doloribus facilis harum incidunt ipsum maiores maxime modi molestias nisi, praesentium rerum totam veritatis? Error fugit temporibus voluptate?</p>', 'page', NULL, '2018-11-15 18:46:43');
/*!40000 ALTER TABLE `contenu` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. immeuble
DROP TABLE IF EXISTS `immeuble`;
CREATE TABLE IF NOT EXISTS `immeuble` (
  `id_immeuble` int(11) NOT NULL AUTO_INCREMENT,
  `nom_immeuble` varchar(200) DEFAULT NULL,
  `nbr_appart` int(11) DEFAULT NULL,
  `id_residence` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_immeuble`),
  KEY `FK_immeuble_residence` (`id_residence`),
  CONSTRAINT `FK_immeuble_residence` FOREIGN KEY (`id_residence`) REFERENCES `residence` (`id_residence`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.immeuble : ~6 rows (environ)
/*!40000 ALTER TABLE `immeuble` DISABLE KEYS */;
INSERT INTO `immeuble` (`id_immeuble`, `nom_immeuble`, `nbr_appart`, `id_residence`, `created_at`, `updated_at`, `id_module`) VALUES
	(165, 'Chatex immeuble 1', 2, 57, '2018-11-26 13:28:26', '2018-11-26 14:28:32', 8),
	(166, 'Miami teck', 5, 58, '2018-11-26 14:05:51', '2018-11-26 14:52:59', 10),
	(167, NULL, NULL, 58, '2018-11-26 14:05:51', '2018-11-26 14:05:51', NULL),
	(168, NULL, NULL, 58, '2018-11-26 14:05:51', '2018-11-26 14:05:51', NULL),
	(169, NULL, NULL, 58, '2018-11-26 14:05:51', '2018-11-26 14:05:51', NULL),
	(170, NULL, NULL, 58, '2018-11-26 14:05:51', '2018-11-26 14:05:51', NULL);
/*!40000 ALTER TABLE `immeuble` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. likes
DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `annonce_id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.likes : ~2 rows (environ)
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` (`id`, `annonce_id`, `membre_id`, `created_at`, `updated_at`) VALUES
	(2, 2, 2, NULL, NULL),
	(3, 3, 2, NULL, NULL);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. likes_syndics
DROP TABLE IF EXISTS `likes_syndics`;
CREATE TABLE IF NOT EXISTS `likes_syndics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `annonce_id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.likes_syndics : ~2 rows (environ)
/*!40000 ALTER TABLE `likes_syndics` DISABLE KEYS */;
INSERT INTO `likes_syndics` (`id`, `annonce_id`, `membre_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2018-10-15 17:41:10', '2018-10-15 17:41:14'),
	(2, 1, 60, '2018-10-15 17:42:21', '2018-10-15 17:42:23');
/*!40000 ALTER TABLE `likes_syndics` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. membres
DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `syndic_id` int(11) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete` int(1) NOT NULL DEFAULT 0,
  `etat` int(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `residents_username_unique` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.membres : ~2 rows (environ)
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` (`id`, `username`, `password`, `nom`, `prenom`, `birthday`, `sex`, `pseudo`, `phone`, `email`, `salt`, `residence_id`, `syndic_id`, `remember_token`, `created_at`, `updated_at`, `role`, `complete`, `etat`) VALUES
	(83, 'res_54571651', '$2y$10$v/WwmCDbn1/h6qAb0mrKLeeT/aSk/Q0xqM5jnHoZmi6AHYgAn2bBW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'YUIxb3hm', 57, 54, NULL, '2018-11-26 13:32:39', '2018-11-26 13:32:39', 'resident', 0, 1),
	(84, 'res_545716584', '$2y$10$S5FGVOZNJtbESsHTBDx0KeuDx1kkt.YedB8g9J9gAqPZW2qkIG/WW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cEE2MnNJ', 57, 54, NULL, '2018-11-26 13:32:39', '2018-11-26 13:32:39', 'resident', 0, 1);
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. messagerie
DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `conv_name` varchar(200) NOT NULL,
  `messagerie` text DEFAULT NULL,
  `id_syndic` int(11) NOT NULL,
  `resident_id` int(10) unsigned NOT NULL,
  `CREATED_AT` datetime DEFAULT NULL,
  `UPDATED_AT` datetime DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.messagerie : ~3 rows (environ)
/*!40000 ALTER TABLE `messagerie` DISABLE KEYS */;
INSERT INTO `messagerie` (`id_message`, `conv_name`, `messagerie`, `id_syndic`, `resident_id`, `CREATED_AT`, `UPDATED_AT`) VALUES
	(1, '2_44', 'missing !!!', 46, 2, '2018-10-23 11:35:48', '2018-10-23 11:35:48'),
	(2, '2_44', 'HAHAHAHAHAH !!', 46, 2, '2018-10-23 11:38:27', '2018-10-23 11:38:27'),
	(3, '2_44', 'message bien envoyer', 46, 2, '2018-10-23 12:00:47', '2018-10-23 12:00:47');
/*!40000 ALTER TABLE `messagerie` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.migrations : ~2 rows (environ)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2018_06_29_145053_create_users_table', 1),
	(2, '2018_06_29_150206_create_admins_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. module
DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `numero_module` varchar(100) DEFAULT '0',
  `imei` varchar(100) DEFAULT '0',
  `numero_tel` varchar(100) DEFAULT '0',
  `pin` varchar(100) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_module`),
  UNIQUE KEY `numero_module` (`numero_module`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Export de données de la table es15o_home_bd5.module : ~4 rows (environ)
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` (`id_module`, `numero_module`, `imei`, `numero_tel`, `pin`, `created_at`, `updated_at`) VALUES
	(1, '12500', '1251234100600', '62005552', '0000', '2018-10-11 14:57:22', '2018-10-11 14:57:23'),
	(8, '520000', '125000000012', '0647145388', '66360', '2018-10-11 12:46:18', '2018-10-11 12:46:18'),
	(9, '362552', '56330014855', '23233333', '34130', '2018-10-11 12:47:12', '2018-10-11 12:47:12'),
	(10, '5255252', '5252525252', '9099999988', '0', '2018-11-15 21:25:15', '2018-11-15 21:25:15');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. partenaires
DROP TABLE IF EXISTS `partenaires`;
CREATE TABLE IF NOT EXISTS `partenaires` (
  `id_partenaire` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `numero_pm` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `complete` int(11) DEFAULT 0,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `etat` int(11) DEFAULT 0,
  PRIMARY KEY (`id_partenaire`),
  UNIQUE KEY `partenaires_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.partenaires : ~5 rows (environ)
/*!40000 ALTER TABLE `partenaires` DISABLE KEYS */;
INSERT INTO `partenaires` (`id_partenaire`, `username`, `password`, `nom`, `prenom`, `pseudo`, `phone`, `email`, `salt`, `residence_id`, `remember_token`, `created_at`, `updated_at`, `numero_pm`, `categorie_id`, `type`, `complete`, `role`, `etat`) VALUES
	(1, 'partenaire steph', '$2y$10$fYuhjej/Brwba6yUP7ops.U/QCzhSSrsfSPT8QOe3V0Y3kD1rT9kK', 'Partenaire', 'Testeur', NULL, NULL, 'partenaire@gmail.com', 'a3E5MHd2YXE=', 54, NULL, '2018-07-20 08:38:32', '2018-11-05 13:56:36', '', 1, 'p', 1, '0', 0),
	(3, 'partenaire', '$2y$10$iqIxKcKR6UwdBI/7YSep6OZAoaZsyzHxJD1VMQEC6T14xIPyu4APO', 'Twist', 'Stephane', NULL, '261332450050', 'part1@yahoo.fr', 'a3B3ZDBta2M=', 54, NULL, '2018-10-10 12:31:25', '2018-11-27 15:24:53', NULL, 1, 'p', 0, '0', 1),
	(4, 'part3@yahoo.fr', '$2y$10$n1sAdDdbDEXozXXqBZKnr.3pKrRmZ5s7MKdFhKmTYMF0GFpbVD4Bq', NULL, NULL, NULL, NULL, 'part3@yahoo.fr', 'dG91cDgxc3c=', 55, NULL, '2018-10-10 13:03:29', '2018-11-27 15:15:22', '', 1, 'p', 0, '0', 1),
	(5, 'part4@yahoo.fr', '$2y$10$t1WacXstlLcvz8aOMQ5H8Oiz8NSDIbUbMqQdaftDf19k.cbAsmXXm', NULL, NULL, NULL, NULL, 'partpart@yahoo.fr', 'ZDF5eXRudTg=', 55, NULL, '2018-10-10 13:26:46', '2018-10-10 13:26:46', NULL, 1, 'm', 0, '0', 0),
	(6, NULL, '$2y$10$RLnPZwtUpJR3rwMZ45PX2.1oA.gubQKmoJwyhkxPDmon0/2dU83zm', NULL, NULL, NULL, NULL, 'd.camus@imagine-canet.fr', 'NlhreUVs', 54, NULL, '2018-11-27 14:15:24', '2018-11-27 15:21:59', '898956', 7, 'm', 0, '0', 0);
/*!40000 ALTER TABLE `partenaires` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. residence
DROP TABLE IF EXISTS `residence`;
CREATE TABLE IF NOT EXISTS `residence` (
  `id_residence` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ref` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_ref` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_partenaire` int(11) DEFAULT NULL,
  `nb_immeuble` int(11) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `syndic_id` int(11) NOT NULL,
  `nb_motorbike` int(11) NOT NULL,
  PRIMARY KEY (`id_residence`),
  UNIQUE KEY `numero` (`numero`),
  UNIQUE KEY `residence_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.residence : ~1 rows (environ)
/*!40000 ALTER TABLE `residence` DISABLE KEYS */;
INSERT INTO `residence` (`id_residence`, `numero`, `nom`, `nom_ref`, `prenom_ref`, `email`, `adresse`, `code_postal`, `ville`, `tel`, `nb_partenaire`, `nb_immeuble`, `actif`, `created_at`, `updated_at`, `syndic_id`, `nb_motorbike`) VALUES
	(57, '56000', 'Square Vert Parc', 'Square', 'Square', 'stephane@easywebmobile', '418, avenue de l\'Europe', '34170', 'Castelnau Le Lez', '0467142714', 4, 1, 1, '2018-11-26 13:28:26', '2018-11-26 13:28:26', 54, 5),
	(58, '42001', 'Duo Canticel', 'Gazzoline\'s', 'Gas', 'tourisme@lebarcares.fr', 'Place de la République', '66420', 'LeBarcarès', '0468861656', 5, 5, 1, '2018-11-26 14:05:51', '2018-11-26 14:08:08', 55, 5);
/*!40000 ALTER TABLE `residence` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. residents
DROP TABLE IF EXISTS `residents`;
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
  `complete` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `residence_id` int(11) DEFAULT NULL,
  `syndic_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_residents_users` (`syndic_id`),
  CONSTRAINT `FK_residents_users` FOREIGN KEY (`syndic_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.residents : ~0 rows (environ)
/*!40000 ALTER TABLE `residents` DISABLE KEYS */;
/*!40000 ALTER TABLE `residents` ENABLE KEYS */;

-- Export de la structure de la table es15o_home_bd5. users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table es15o_home_bd5.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `salt`) VALUES
	(54, NULL, 'stephane@easywebmobile', '$2y$10$L3dDBAmLlOT6ZDuNXu6O7OWiUq81AB98FtJdIcvpSWrafTVjPH2c6', NULL, '2018-11-26 13:28:26', '2018-11-26 13:28:26', 'bjl6MTMw'),
	(55, NULL, 'tourisme@lebarcares.fr', '$2y$10$5TYQwn22vOg6xOXUCQqb1O968Y3oQkQP3SauSCKj0Ffto08lXzcKm', NULL, '2018-11-26 14:05:50', '2018-11-26 14:05:50', 'c1MzcEFv');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
