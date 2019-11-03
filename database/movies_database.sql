-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 31 Octobre 2019 à 18:11
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `movies`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `account_expiry` date NOT NULL DEFAULT '1999-01-01',
  `account_enabled` tinyint(4) NOT NULL DEFAULT '0',
  `account_pic` varchar(255) NOT NULL DEFAULT 'assets/avatars/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_password`, `account_expiry`, `account_enabled`, `account_pic`) VALUES
(6, 'qqqq', '$2y$10$9s.i0QfawqyPE5DpuW95jOvNEn/gUL8WSySSFKJ/beVSOocdBktAO', '1999-01-01', 1, 'assets/avatars/default.jpg'),
(17, 'Lionel', '$2y$10$La7M8gOzK9P6jlcqI73oDufi9LbkRAT0at3U2z102U52j.CcmkAKq', '1999-01-01', 1, 'assets/avatars/default.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `mainActor` varchar(50) NOT NULL DEFAULT 'Undefined',
  `director` varchar(50) NOT NULL DEFAULT 'Undefined',
  `tag` varchar(50) NOT NULL DEFAULT 'Undefined',
  `year` varchar(50) NOT NULL DEFAULT 'Undefined',
  `poster` varchar(255) NOT NULL DEFAULT 'assets/posters/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `content`, `mainActor`, `director`, `tag`, `year`, `poster`) VALUES
(67, '', 'sdfdsfdsf', 'dqfdf', 'dsfdsf', 'Science Fiction', '2019', 'assets/posters/default.jpg'),
(68, 'VVVVVVVVVVBBBBBBBBBBBB', '', '', '', 'Untagged', '2019', 'assets/posters/VVVVVVVVVVBBBBBBBBBBBB.jpg'),
(127, 'UUU', '', '', '', 'Untagged', '2019', 'assets/posters/UUU.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(10) UNSIGNED NOT NULL,
  `session_account_id` int(10) UNSIGNED NOT NULL,
  `session_cookie` char(32) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_account_id`, `session_cookie`, `session_start`) VALUES
(8, 17, 'd5a95398e06c8fb5a7afacecf9d977d3', '2019-10-23 14:06:47'),
(16, 17, '6a5a80fbd57b38dea48f4cc51f3e86c9', '2019-10-31 08:31:02');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `session_cookie` (`session_cookie`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
