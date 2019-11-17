-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 15 Novembre 2019 à 18:35
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
(19, 'Mike', '$2y$10$tHMmInkvth2Mw00aom8pue8kWO/lmnFkF9ZxD4jPK5Iv5LjlyM5kG', '1999-01-01', 1, 'assets/avatars/default.jpg'),
(31, 'azer', '$2y$10$wRyjJLIhs.dvCjEKNW9jOeh7hTDAZCYtgAy9P3zOKwrJ5SkIZNC4K', '1999-01-01', 1, 'assets/avatars/azer.jpg'),
(33, 'poki', '$2y$10$hdZugAheQRC25gmsJz2FzusTrXCcsMGkgT0MN/gEhnpsi135sRSli', '1999-01-01', 1, 'assets/avatars/poki.jpg'),
(34, 'Mikaa', '$2y$10$B3nmQK2VbPnp0w5tjz36A.RVQvZYJz1pYBCu.xU0NvxChO/fj9ICy', '1999-01-01', 1, 'assets/avatars/Mikaa.jpg'),
(35, 'Lena', '$2y$10$/y.eTgzhUJXn0VeLqH0PBOuRiyUWb/UWWZqoNSNZHdNEKMIj3giEW', '1999-01-01', 1, 'assets/avatars/Lena.jpg'),
(36, 'xxxx', '$2y$10$dmnp.htMpchkn0ucN0gf7OjxRZu5pdyobKtIZIUw2txcxOpZtCRwG', '1999-01-01', 1, 'assets/avatars/xxxx.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `mainActor` varchar(50) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `poster` varchar(50) NOT NULL DEFAULT 'assets/posters/default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id`, `title`, `content`, `mainActor`, `director`, `tag`, `year`, `poster`) VALUES
(155, 'Mad Max', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget massa ut metus tincidunt imperdiet. Vivamus auctor venenatis aliquam. Vestibulum eu odio risus. Aenean nec tellus vel ipsum condimentum fermentum. Phasellus eros elit, mattis eget turpis eu, molestie egestas tellus. Nunc in semper nibh. Phasellus condimentum dictum semper. Nulla hendrerit metus nec neque rutrum, non dapibus est semper. Vivamus sed porta leo, vitae cursus diam.', 'Tom Hardy, Charliz Theron', 'dfgdfgdfg', 'Romance', '2015', 'assets/posters/Mad Max.jpg'),
(158, 'Anna', 'Phasellus consectetur purus sed metus dictum, vitae porta eros sollicitudin. Integer maximus ex a mollis bibendum. Phasellus auctor lobortis tellus id ornare. Fusce maximus, orci in auctor pellentesque, sem nisl pellentesque orci, at vehicula ipsum elit id dolor. magna. Nulla ornare, lacus id gravida condimentum, magna odio fermentum eros, vitae pretium risus libero vitae tortor.', 'Mike Poli', 'Edna Cook', 'Horror', '2019', 'assets/posters/Anna.jpg'),
(160, 'Inglorious Bastards', 'Cras accumsan, risus ac posuere tempus, erat ex egestas purus, eu dignissim lorem lectus sit amet neque. Vivamus ac dignissim sapien. Sed ac eros arcu. Nulla pretium suscipit euismod. Phasellus ultricies leo nisi. Vestibulum faucibus tellus eget mauris faucibus, vel imperdiet odio viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam et massa ac mauris consequat congue. ', 'qsdqsd', 'qsdqsd', 'Action', '2013', 'assets/posters/Inglorious Bastards.jpg'),
(163, 'Joker', 'Aenean commodo metus porta sagittis sollicitudin. Pellentesque iaculis hendrerit orci, vitae fermentum velit sodales quis. Praesent a finibus sapien, ut gravida tellus. Vivamus ultricies magna vitae lacus blandit fringilla. Maecenas et ultricies dui, nec iaculis neque. Mauris purus nunc, dictum eu auctor ullamcorper, ullamcorper in ante. Proin elementum convallis finibus. In hac habitasse platea dictumst. Praesent ac ante eget nisi molestie porta id ut purus. ', 'ertert', 'retertert', 'Drama', '2019', 'assets/posters/Joker.jpg'),
(164, 'test poster', 'Aenean commodo metus porta sagittis sollicitudin. Pellentesque iaculis hendrerit orci, vitae fermentum velit sodales quis. Praesent a finibus sapien, ut gravida tellus. Vivamus ultricies magna vitae lacus blandit fringilla. Maecenas et ultricies dui, nec iaculis neque. Mauris purus nunc, dictum eu auctor ullamcorper, ullamcorper in ante. Proin elementum convallis finibus. In hac habitasse platea dictumst. Praesent ac ante eget nisi molestie porta id ut purus. ', 'fsdfsdf', 'fsdfsdf', 'Drama', '2015', 'assets/posters/test poster.jpg'),
(166, 'Gemini Man', 'Morbi eleifend nisi ac purus malesuada accumsan. Nam sit amet risus faucibus, blandit ante id, rhoncus purus. Sed tristique vehicula libero ac molestie. Mauris sagittis eros metus, at ullamcorper felis finibus sed. Curabitur tellus quam, tristique nec pellentesque vel, consectetur ac purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis magna tortor, dignissim non leo eget, commodo finibus ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'jgjghjghjghj', 'jjgghjghjghjgh', 'Animation', '2019', 'assets/posters/Gemini Man.jpg'),
(167, 'Drive', 'Aenean commodo metus porta sagittis sollicitudin. Pellentesque iaculis hendrerit orci, vitae fermentum velit sodales quis. Praesent a finibus sapien, ut gravida tellus. Vivamus ultricies magna vitae lacus blandit fringilla. Maecenas et ultricies dui, nec iaculis neque. Mauris purus nunc, dictum eu auctor ullamcorper, ullamcorper in ante. Proin elementum convallis finibus. In hac habitasse platea dictumst. Praesent ac ante eget nisi molestie porta id ut purus. ', 'Me me', 'You', 'Aventure', '2013', 'assets/posters/Drive.jpg'),
(168, 'Beauty And Beast', 'Curabitur ac iaculis justo. Fusce sagittis pulvinar velit lobortis molestie. Donec commodo eros id velit condimentum, id rutrum erat ornare. Donec rutrum commodo semper. Mauris sed lobortis lacus, sit amet convallis risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eget nisi facilisis, egestas mi vel, condimentum lorem. Integer nec pretium risus. Integer egestas sed urna non pharetra. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris nec volutpat dui. ', 'eflekgnkldfgfgsgs', 'dgf sd f sdfs', 'Drama', '2016', 'assets/posters/Beauty And Beast.jpg');

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
(17, 33, 'e0201b3fbe45aaf6131172868982cc1c', '2019-11-05 16:20:58'),
(18, 33, 'f8b14af3cf34339b83f71ca1357e492e', '2019-11-06 09:06:59'),
(21, 34, 'f862fb35cc985c5ca92e4a4bfc2913a5', '2019-11-07 10:55:36'),
(24, 34, 'a157dd86dbfbcbae56e00e743e81459c', '2019-11-07 18:33:44'),
(25, 33, '9d9e0192ac794860d3a15e28468da474', '2019-11-07 19:10:48'),
(28, 35, '1b42cb1d3d3fa95451681d7baeca8b9a', '2019-11-10 18:03:54'),
(30, 36, 'c27a798dd2c7e78ea33a65915ce37266', '2019-11-13 20:20:59'),
(31, 35, '67a8f93d565d68f08d92a284a772dcb4', '2019-11-14 09:29:45');

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
  MODIFY `account_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
