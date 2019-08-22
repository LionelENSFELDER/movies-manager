CREATE TABLE IF NOT EXISTS `movies` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `content` varchar(50) COLLATE utf8_general_ci NOT NULL,
  `mainActor` varchar(50) COLLATE utf8_general_ci DEFAULT '',
  `director` varchar(50) COLLATE utf8_general_ci DEFAULT '',
  `tag` varchar(50) COLLATE utf8_general_ci DEFAULT '',
  `date` varchar(50) COLLATE utf8_general_ci DEFAULT '',
  `image` varchar(255) COLLATE utf8_general_ci DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;