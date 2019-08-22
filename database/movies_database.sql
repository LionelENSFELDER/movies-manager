-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 21 Août 2019 à 14:45
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
  `account_enabled` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `account_password`, `account_expiry`, `account_enabled`) VALUES
(6, 'aaaa', '$2y$10$uTNtY0JAFzzNm7SmkOPsVOZp/KJxB.W4JR0/Wdgh9E9pdkJS3n65e', '1999-01-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `mainActor` varchar(50) NOT NULL DEFAULT 'Undefined',
  `director` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL DEFAULT '',
  `year` varchar(50) NOT NULL DEFAULT '',
  `image` varchar(255) NOT NULL DEFAULT 'movies_poster/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `content`, `mainActor`, `director`, `tag`, `year`, `image`) VALUES
(1, 'Ex Machina', 'À 26 ans, Caleb est un des plus brillants codeurs que compte BlueBook, le plus important moteur de recherche Internet au monde. À ce titre, il remporte un séjour d\'une semaine dans la résidence du grand patron à la montagne. Quand il arrive dans la demeure isolée, il découvre qu\'il va devoir participer à une expérience troublante : interagir avec le représentant d\'une nouvelle intelligence artificielle apparaissant sous les traits d\'une très jolie femme robot prénommée Ava.', 'Alicia Vikander', ' Alex Garland', 'SCI-FI', '2015', 'movies_poster/ex machina.jpg'),
(2, 'Her', 'In a near future, a lonely writer develops an unlikely relationship with an operating system designed to meet his every need. ', 'sdsdds', 'aaa', 'SCI-FI', '2000', 'movies_poster/her.jpg'),
(3, 'Glass', 'Peu de temps après les événements relatés dans Split, David Dunn, l\'homme incassable, poursuit sa traque de La Bête, surnom donné à Kevin Crumb depuis qu\'on le sait capable d\'endosser 23 personnalités différentes. De son côté, le mystérieux homme souffrant du syndrome des os de verre Elijah Price suscite à nouveau l\'intérêt des forces de l\'ordre en affirmant détenir des informations capitales sur les deux hommes.', 'sdsdd', 'aaa', 'aaa', '2000', 'movies_poster/glass.jpg'),
(4, 'Avatar', 'Malgré sa paralysie, Jake Sully, un ancien marine immobilisé dans un fauteuil roulant, est resté un combattant au plus profond de son être. Il est recruté pour se rendre à des années-lumière de la Terre, sur Pandora, où de puissants groupes industriels exploitent un minerai rarissime destiné à résoudre la crise énergétique sur Terre.', 'sdsdsd', 'aaa', 'aaa', '2000', 'movies_poster/avatar.jpg'),
(5, 'The Voices', 'Jerry vit à Milton, petite ville américaine bien tranquille où il travaille dans une usine de baignoires. Célibataire, il n\'est pas solitaire pour autant dans la mesure où il s\'entend très bien avec son chat, M. Moustache, et son chien, Bosco. Jerry voit régulièrement sa psy, aussi charmante que compréhensive, à qui il révèle un jour qu\'il apprécie de plus en plus Fiona. Bref, tout se passe bien dans sa vie plutôt ordinaire, du moins tant qu\'il n\'oublie pas de prendre ses médicaments.', 'sdsdsd', 'aaa', 'aaa', '2000', 'movies_poster/the voices.jpg'),
(12, 'aaa', 'aaa', 'aaa', 'aaa', 'SCI-FI', '2019', 'movies_poster/default.jpg'),
(13, 'Spider Man', 'rdstgdrgdgdfgdfg', 'Spider', 'Spider Cochon', 'DRAMA', '2020', 'movies_poster/default.jpg'),
(14, 'bbbbb', 'content', 'actor', 'director', 'DRAMA', '2050', 'movies_poster/default.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(10) UNSIGNED NOT NULL,
  `session_account_id` int(10) UNSIGNED NOT NULL,
  `session_cookie` char(32) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  MODIFY `account_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
