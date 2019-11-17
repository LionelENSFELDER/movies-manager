-- MySQL dump 10.13  Distrib 5.7.11, for Win32 (AMD64)
--
-- Host: localhost    Database: movies
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `account_id` int(255) NOT NULL AUTO_INCREMENT,
  `account_name` varchar(255) NOT NULL,
  `account_password` varchar(255) NOT NULL,
  `account_expiry` date NOT NULL DEFAULT '1999-01-01',
  `account_enabled` tinyint(4) NOT NULL DEFAULT '0',
  `account_pic` varchar(255) NOT NULL DEFAULT 'assets/avatars/default.jpg',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (6,'qqqq','$2y$10$9s.i0QfawqyPE5DpuW95jOvNEn/gUL8WSySSFKJ/beVSOocdBktAO','1999-01-01',1,'assets/avatars/default.jpg'),(19,'Mike','$2y$10$tHMmInkvth2Mw00aom8pue8kWO/lmnFkF9ZxD4jPK5Iv5LjlyM5kG','1999-01-01',1,'assets/avatars/default.jpg'),(31,'azer','$2y$10$wRyjJLIhs.dvCjEKNW9jOeh7hTDAZCYtgAy9P3zOKwrJ5SkIZNC4K','1999-01-01',1,'assets/avatars/azer.jpg'),(33,'poki','$2y$10$hdZugAheQRC25gmsJz2FzusTrXCcsMGkgT0MN/gEhnpsi135sRSli','1999-01-01',1,'assets/avatars/poki.jpg'),(34,'Mikaa','$2y$10$B3nmQK2VbPnp0w5tjz36A.RVQvZYJz1pYBCu.xU0NvxChO/fj9ICy','1999-01-01',1,'assets/avatars/Mikaa.jpg'),(35,'Lena','$2y$10$/y.eTgzhUJXn0VeLqH0PBOuRiyUWb/UWWZqoNSNZHdNEKMIj3giEW','1999-01-01',1,'assets/avatars/Lena.jpg'),(36,'xxxx','$2y$10$dmnp.htMpchkn0ucN0gf7OjxRZu5pdyobKtIZIUw2txcxOpZtCRwG','1999-01-01',1,'assets/avatars/xxxx.jpg');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `mainActor` varchar(50) DEFAULT NULL,
  `director` varchar(50) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `poster` varchar(50) NOT NULL DEFAULT 'assets/posters/default.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (155,'Mad Max','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget massa ut metus tincidunt imperdiet. Vivamus auctor venenatis aliquam. Vestibulum eu odio risus. Aenean nec tellus vel ipsum condimentum fermentum. Phasellus eros elit, mattis eget turpis eu, molestie egestas tellus. Nunc in semper nibh. Phasellus condimentum dictum semper. Nulla hendrerit metus nec neque rutrum, non dapibus est semper. Vivamus sed porta leo, vitae cursus diam.','Tom Hardy, Charliz Theron','dfgdfgdfg','Romance','2015','assets/posters/Mad Max.jpg'),(158,'Anna','Phasellus consectetur purus sed metus dictum, vitae porta eros sollicitudin. Integer maximus ex a mollis bibendum. Phasellus auctor lobortis tellus id ornare. Fusce maximus, orci in auctor pellentesque, sem nisl pellentesque orci, at vehicula ipsum elit id dolor. magna. Nulla ornare, lacus id gravida condimentum, magna odio fermentum eros, vitae pretium risus libero vitae tortor.','Mike Poli','Edna Cook','Horror','2019','assets/posters/Anna.jpg'),(160,'Inglorious Bastards','Cras accumsan, risus ac posuere tempus, erat ex egestas purus, eu dignissim lorem lectus sit amet neque. Vivamus ac dignissim sapien. Sed ac eros arcu. Nulla pretium suscipit euismod. Phasellus ultricies leo nisi. Vestibulum faucibus tellus eget mauris faucibus, vel imperdiet odio viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Etiam et massa ac mauris consequat congue. ','qsdqsd','qsdqsd','Action','2013','assets/posters/Inglorious Bastards.jpg'),(163,'Joker','Aenean commodo metus porta sagittis sollicitudin. Pellentesque iaculis hendrerit orci, vitae fermentum velit sodales quis. Praesent a finibus sapien, ut gravida tellus. Vivamus ultricies magna vitae lacus blandit fringilla. Maecenas et ultricies dui, nec iaculis neque. Mauris purus nunc, dictum eu auctor ullamcorper, ullamcorper in ante. Proin elementum convallis finibus. In hac habitasse platea dictumst. Praesent ac ante eget nisi molestie porta id ut purus. ','ertert','retertert','Drama','2019','assets/posters/Joker.jpg'),(164,'test poster','Aenean commodo metus porta sagittis sollicitudin. Pellentesque iaculis hendrerit orci, vitae fermentum velit sodales quis. Praesent a finibus sapien, ut gravida tellus. Vivamus ultricies magna vitae lacus blandit fringilla. Maecenas et ultricies dui, nec iaculis neque. Mauris purus nunc, dictum eu auctor ullamcorper, ullamcorper in ante. Proin elementum convallis finibus. In hac habitasse platea dictumst. Praesent ac ante eget nisi molestie porta id ut purus. ','fsdfsdf','fsdfsdf','Drama','2015','assets/posters/test poster.jpg'),(166,'Gemini Man','Morbi eleifend nisi ac purus malesuada accumsan. Nam sit amet risus faucibus, blandit ante id, rhoncus purus. Sed tristique vehicula libero ac molestie. Mauris sagittis eros metus, at ullamcorper felis finibus sed. Curabitur tellus quam, tristique nec pellentesque vel, consectetur ac purus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis magna tortor, dignissim non leo eget, commodo finibus ipsum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.','jgjghjghjghj','jjgghjghjghjgh','Animation','2019','assets/posters/Gemini Man.jpg'),(167,'Drive','Aenean commodo metus porta sagittis sollicitudin. Pellentesque iaculis hendrerit orci, vitae fermentum velit sodales quis. Praesent a finibus sapien, ut gravida tellus. Vivamus ultricies magna vitae lacus blandit fringilla. Maecenas et ultricies dui, nec iaculis neque. Mauris purus nunc, dictum eu auctor ullamcorper, ullamcorper in ante. Proin elementum convallis finibus. In hac habitasse platea dictumst. Praesent ac ante eget nisi molestie porta id ut purus. ','Me me','You','Aventure','2013','assets/posters/Drive.jpg'),(168,'Beauty And Beast','Curabitur ac iaculis justo. Fusce sagittis pulvinar velit lobortis molestie. Donec commodo eros id velit condimentum, id rutrum erat ornare. Donec rutrum commodo semper. Mauris sed lobortis lacus, sit amet convallis risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eget nisi facilisis, egestas mi vel, condimentum lorem. Integer nec pretium risus. Integer egestas sed urna non pharetra. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris nec volutpat dui. ','eflekgnkldfgfgsgs','dgf sd f sdfs','Drama','2016','assets/posters/Beauty And Beast.jpg');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `session_account_id` int(10) unsigned NOT NULL,
  `session_cookie` char(32) NOT NULL,
  `session_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `session_cookie` (`session_cookie`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (17,33,'e0201b3fbe45aaf6131172868982cc1c','2019-11-05 16:20:58'),(18,33,'f8b14af3cf34339b83f71ca1357e492e','2019-11-06 09:06:59'),(21,34,'f862fb35cc985c5ca92e4a4bfc2913a5','2019-11-07 10:55:36'),(24,34,'a157dd86dbfbcbae56e00e743e81459c','2019-11-07 18:33:44'),(25,33,'9d9e0192ac794860d3a15e28468da474','2019-11-07 19:10:48'),(28,35,'1b42cb1d3d3fa95451681d7baeca8b9a','2019-11-10 18:03:54'),(30,36,'c27a798dd2c7e78ea33a65915ce37266','2019-11-13 20:20:59'),(31,35,'67a8f93d565d68f08d92a284a772dcb4','2019-11-14 09:29:45');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-15 20:04:20
