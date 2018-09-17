-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 10 Septembre 2018 à 14:14
-- Version du serveur :  5.5.60-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `es15o_home_bd5`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'teck@easywebmobile.fr', '$2y$10$QV/6fsI0EN1PM9lJYfxKk.Xp8NR6hQVRaobpeopgYsn.KhT73cgKW', '03Z9KGN4BcWrS0AaqVmxxzzSBcKKzFATrke0J2OJXXSFPOOulPz8Ns6GSZpY', '2018-07-08 12:08:39', '2018-07-08 12:08:39');

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `categorie_id`, `titre`, `description`, `image`, `prix`, `residence`, `genre`, `age`, `type`, `created_at`, `updated_at`, `user_id`) VALUES
(5, 4, 'Annonce event', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1532102640_annonce.jpg', '500', 'Calmeilles', '', 200, 'o', '2018-07-20 14:04:00', '2018-07-20 14:04:00', NULL),
(2, 6, 'Annonce 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090428_annonce.png', '5', 'Perpignan', '', 3, 'o', '2018-07-20 10:40:28', '2018-07-20 10:40:28', NULL),
(3, 3, 'Annonce 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090463_annonce.jpg', '50', 'Perpignan', '', 25, 'o', '2018-07-20 10:41:03', '2018-07-20 10:41:03', NULL),
(4, 1, 'Annonce informations', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '1532090702_annonce.png', '25', 'Saint-Laurent-de-la-Salanque', '', 2, 'o', '2018-07-20 10:45:02', '2018-07-20 10:45:02', NULL),
(8, 6, 'Titre annonces', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', 'image_463215.png', '99', NULL, NULL, NULL, 'r', '2018-08-02 13:41:34', '2018-08-02 13:41:34', NULL),
(11, 5, 'Mon annonce', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1533283389_annonce.jpg', '88', NULL, NULL, NULL, 'r', '2018-08-03 06:03:10', '2018-08-03 06:03:10', 2),
(12, 7, 'Annonce essai', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '1533283515_annonce.jpg', '8864', NULL, NULL, NULL, 'r', '2018-08-03 06:05:16', '2018-08-03 06:05:16', 2),
(19, 6, 'Test luc', 'Description restaurant', '1534498118_annonce.jpg', '8000', NULL, NULL, NULL, 'r', '2018-08-17 07:28:38', '2018-08-17 07:28:38', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Information', '2018-07-20 09:12:14', '2018-07-20 09:12:14'),
(2, 'Market place', '2018-07-20 09:12:18', '2018-07-20 09:12:18'),
(3, 'Service', '2018-07-20 09:12:21', '2018-07-20 09:12:21'),
(4, 'Event', '2018-07-19 21:00:00', '2018-07-19 21:00:00'),
(5, 'Real estate', '2018-07-19 21:00:00', '2018-07-19 21:00:00'),
(6, 'Restaurant', '2018-07-19 21:00:00', '2018-07-19 21:00:00'),
(7, 'Motorbike', '2018-07-19 21:00:00', '2018-07-19 21:00:00'),
(8, 'All', '2018-07-19 21:00:00', '2018-07-19 21:00:00'),
(9, 'Food', '2018-08-28 17:50:06', '2018-08-28 17:50:06');

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenu`
--

INSERT INTO `contenu` (`id`, `titre`, `content`, `categorie`, `created_at`, `updated_at`) VALUES
(1, 'Terms & conditions', '<h1 style=\"text-align: center;\">Terms &amp; conditions</h1>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa cum dolorem doloribus facilis harum incidunt ipsum maiores maxime modi molestias nisi, praesentium rerum totam veritatis? Error fugit temporibus voluptate?</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda culpa cum dolorem doloribus facilis harum incidunt ipsum maiores maxime modi molestias nisi, praesentium rerum totam veritatis? Error fugit temporibus voluptate?</p>', 'page', NULL, '2018-07-29 09:22:31');

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `annonce_id` int(11) NOT NULL,
  `membre_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `likes`
--

INSERT INTO `likes` (`id`, `annonce_id`, `membre_id`, `created_at`, `updated_at`) VALUES
(2, 2, 2, NULL, NULL),
(3, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complete` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id`, `username`, `password`, `nom`, `prenom`, `birthday`, `sex`, `pseudo`, `phone`, `email`, `salt`, `residence_id`, `remember_token`, `created_at`, `updated_at`, `role`, `complete`) VALUES
(1, 'luc', '$2y$10$0WNjc6xtemOnWzh7llMGbu3D6G8jIEglJuCCkqdNEjP25Fzhkxo5m', 'Resident', 'Test', '1990-09-17', 'Male', 'Luc', '06261234', 'luc@easywebmobile.fr', 'b2hvbWU=', NULL, NULL, '2018-07-20 06:09:54', '2018-07-20 06:09:54', 'resident', 1),
(2, 'test2', '$2y$10$fYuhjej/Brwba6yUP7ops.U/QCzhSSrsfSPT8QOe3V0Y3kD1rT9kK', 'Test', 'Prénom', NULL, 'Male', 'Ttttttyyt', '6546810004', 'test2@easywebmobile.fr', 'b2hvbWU=', NULL, NULL, '2018-07-20 06:10:10', '2018-08-24 09:54:42', 'resident', 1),
(4, 'test-r', '$2y$10$ZijBvH1UTW8LhbrP3RO.t.5CAXuedPwFPmMpB5/S.G/zkiPETZ9Jm', 'Last testr', 'testr', '2018-08-24', 'Male', 'B', '8899', 'Testr@gmail.com', 'b2hvbWU=', 3, NULL, '2018-08-23 06:25:52', '2018-08-24 05:44:55', 'resident', 1),
(5, 'test-r1', '$2y$10$f5moKuhqAel2da..SpJgYO2z2id7FqTwWFBHPRQ.A6RlDumYoottK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cmppanozbmk=', 1, NULL, '2018-08-23 06:26:00', '2018-08-23 06:26:00', 'resident', 0);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_06_29_145053_create_users_table', 1),
(2, '2018_06_29_150206_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

CREATE TABLE `partenaires` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `partenaires`
--

INSERT INTO `partenaires` (`id`, `username`, `password`, `nom`, `prenom`, `birthday`, `sex`, `pseudo`, `phone`, `email`, `salt`, `residence_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, '$2y$10$XQf0M6FjROGXHtJt0jsEK.dis8HpzVrbXBsX6HGDeGfv/RH6bz/0C', 'Partenaire', 'Testeur', NULL, NULL, NULL, NULL, 'partenaire@gmail.com', 'a3E5MHd2YXE=', NULL, NULL, '2018-07-20 05:38:32', '2018-07-20 05:38:32');

-- --------------------------------------------------------

--
-- Structure de la table `residence`
--

CREATE TABLE `residence` (
  `id` int(10) UNSIGNED NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_partenaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_resident` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actif` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `syndic_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `residence`
--

INSERT INTO `residence` (`id`, `numero`, `nom`, `nom_ref`, `prenom_ref`, `email`, `adresse`, `code_postal`, `ville`, `tel`, `nb_partenaire`, `nb_resident`, `actif`, `created_at`, `updated_at`, `syndic_id`) VALUES
(1, '1321', 'Résidence test', 'web', 'easy', 'residence@test.com', 'TEST', '66400', 'Calmeilles', '0654651321', '5', '5', 1, '2018-07-19 06:56:29', '2018-07-19 06:56:29', 1),
(2, '123456', 'Test', 'Nom', 'prenom', 'test3@easywebmobile.fr', 'Adresse test', '96000', 'Perpignan', '1321', '5', '2', 1, '2018-07-25 05:11:20', '2018-07-25 05:11:20', 1),
(3, '79800', 'Ma résidence', 'Easy', 'Easywebmobile', 'luc@easywebmobile.fr', 'adresse test', '95200', 'Paris', '65621', '2', '2', 1, '2018-08-06 11:33:30', '2018-08-06 11:52:14', 2);

-- --------------------------------------------------------

--
-- Structure de la table `residents`
--

CREATE TABLE `residents` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `residence_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `residents`
--

INSERT INTO `residents` (`id`, `username`, `password`, `nom`, `prenom`, `birthday`, `sex`, `pseudo`, `phone`, `email`, `salt`, `complete`, `remember_token`, `created_at`, `updated_at`, `residence_id`) VALUES
(1, NULL, '$2y$10$XUyC5aHHyabwadT16caWEOremfsoe4cLouSK1gQ/LpfWIoYz7gp5e', 'Ohome last', 'Ohome first', '1990-07-13', 'Male', 'Ohome pseudo', '6632258', 'test2@easywebmobile.fr', 'b2hvbWU=', 1, NULL, NULL, '2018-07-13 06:37:07', NULL),
(2, NULL, '$2y$10$2OBl0Goqc4Dxt//Kh/Lovej0H5L5uW8un/b2d/dzryrdR.FHEyLXC', 'A', 'A', '2018-07-15', 'Male', 'A', '0894315846', 'A', 'MTIz', 1, NULL, '2018-07-13 11:29:40', '2018-07-15 07:22:24', NULL),
(3, NULL, '$2y$10$qtVRb1lBQR19t8sbVKMS6Og0NpyXq0DpYCvKGgGZhLwEVkQ3dSm1O', NULL, NULL, NULL, NULL, NULL, NULL, 'b', 'dGpuajZtMjM=', 0, NULL, '2018-07-15 09:26:47', '2018-07-15 09:26:47', NULL),
(4, NULL, '$2y$10$XUyC5aHHyabwadT16caWEOremfsoe4cLouSK1gQ/LpfWIoYz7gp5e', 'p', 'noel', '2018-07-12', 'Male', 'nightley', '0638506283', 'easywebmobile', 'b2hvbWU=', 1, NULL, '2018-07-23 05:13:31', '2018-07-23 05:42:06', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `salt`) VALUES
(1, 'syndic', 'test@gmail.com', '$2y$10$FIK3UHAKUj9LSLNodWFYp.LjGq/Fw6Orl/FWtWV9AAaj5Dp4WjmM2', '7c9rUr6XAO7U8g7NMq5YrBQNwweqDtCiDfZi3vciE9jakEcrvyGdafaZxZWp', '2018-07-19 11:20:59', '2018-08-06 13:16:24', 'a3NqYXlsNTI='),
(2, 'easyweb', 'syndic@easywebmobile.fr', '$2y$10$HFFmKszIxwa8FyAr0wWd/O0SPDpsiCofrhib5MqZjVyJdFvwjKXBK', 'UucJKwJC1rsfjnjOVWhCMRV7UNAViGly0YQC9vCMBwC1rwd5BDL9PmeE7imu', '2018-07-25 04:30:52', '2018-08-06 13:18:09', 'MWgxNDdscDI=');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `residents_username_unique` (`username`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `partenaires`
--
ALTER TABLE `partenaires`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partenaires_username_unique` (`username`);

--
-- Index pour la table `residence`
--
ALTER TABLE `residence`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `residence_email_unique` (`email`);

--
-- Index pour la table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `partenaires`
--
ALTER TABLE `partenaires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `residence`
--
ALTER TABLE `residence`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
