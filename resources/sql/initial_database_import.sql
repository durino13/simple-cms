-- MySQL dump 10.15  Distrib 10.0.25-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: cms
-- ------------------------------------------------------
-- Server version	10.0.25-MariaDB-0ubuntu0.16.04.1

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
-- Table structure for table `c_category`
--

DROP TABLE IF EXISTS `c_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  `trash` bit(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_category`
--

LOCK TABLES `c_category` WRITE;
/*!40000 ALTER TABLE `c_category` DISABLE KEYS */;
INSERT INTO `c_category` VALUES (1,'Jobs','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','2016-07-24 13:32:09'),(2,'News','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00','2016-07-24 13:01:22');
/*!40000 ALTER TABLE `c_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `c_status`
--

DROP TABLE IF EXISTS `c_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `c_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `c_status`
--

LOCK TABLES `c_status` WRITE;
/*!40000 ALTER TABLE `c_status` DISABLE KEYS */;
INSERT INTO `c_status` VALUES (1,'Unpublished','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Published','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `c_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `d_article`
--

DROP TABLE IF EXISTS `d_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `d_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `article_text` mediumtext CHARACTER SET utf8 NOT NULL,
  `publish_date` datetime NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(11) NOT NULL,
  `status_id` int(10) unsigned NOT NULL,
  `start_publishing` datetime DEFAULT NULL,
  `finish_publishing` datetime DEFAULT NULL,
  `archive` bit(1) DEFAULT NULL,
  `trash` bit(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `fk_articles_1_idx` (`status_id`),
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_articles_status_1` FOREIGN KEY (`status_id`) REFERENCES `c_status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `d_article`
--

LOCK TABLES `d_article` WRITE;
/*!40000 ALTER TABLE `d_article` DISABLE KEYS */;
INSERT INTO `d_article` VALUES (1,'Coffee application','coffee-application','<p style=\"text-align: left;\">During one of the interviews, I\'ve been asked to programm a small application in OOP PHP. Check it out here:&nbsp;<a href=\"http://coffee.yuma.sk/\">http://coffee.yuma.sk</a>.</p>\r\n<hr />\r\n<p style=\"text-align: left;\">This is a text after the readmore button.</p>','0000-00-00 00:00:00',1,2,2,'2015-11-01 00:00:00','2025-04-03 00:00:00',NULL,NULL,'2016-06-19 22:00:00','2016-08-06 13:01:58'),(5,'Web page created','web-page-created','<p>Since the majority of my work is not visible publicly, I have decided to create this website as a presentation of my work and skills. It is build upon CSS flexbox, therefore it may be, it will not be displayed correctly in the old browsers.</p>','0000-00-00 00:00:00',1,2,2,'2015-10-07 00:00:00','2025-10-07 00:00:00','',NULL,'2016-06-20 09:05:08','2016-08-10 05:08:26'),(6,'Looking for new opportunities','looking-for-opportunities','<p>After 10 years, my current employer decided to move the production to a new country. Due to this reason, I am looking for new opportunities on the market.</p>','0000-00-00 00:00:00',1,2,2,'2015-09-07 00:00:00','2025-10-07 00:00:00','',NULL,'2016-06-20 09:06:05','2016-08-10 05:08:31'),(11,'Who am I','who-am-i','<p>My name is Juraj Maru&scaron;iak and I do a bit of everything. I do webdesign, I develop web applications and I look after them as a system administrator. While I love, what I do, there\'s one thing I would not trade my career for. My Family - my beautiful wife Lucia and a little Sofia, who I love the most.</p>','0000-00-00 00:00:00',1,3,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'2016-07-23 17:59:15','2016-07-24 11:33:06'),(12,'System administrator & web developer','sysadmin-gdm','<div class=\"timeline-work\" style=\"margin: 0px; padding: 0.8em 0em 0em; border: 0px; font-weight: bold; font-stretch: inherit; font-size: 18px; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #30a689;\">GDM Electronics NV, Liptovsk&yacute; Mikul&aacute;&scaron;</div>\r\n<div class=\"timeline-period\" style=\"margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 0.8em; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #808080;\">November 2004 - September 2015</div>\r\n<p>System administration in an international company. Maintaining diverse systems based on Windows (intersite active directory domain) &amp; Linux OS. I was also developing PHP applications for internal business &amp; I was providing a help desk for 3 sites - Belgium, Slovakia &amp; Romania.</p>','0000-00-00 00:00:00',1,1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'2016-07-24 11:13:50','2016-08-05 02:25:41'),(14,'Router configurator','sysadmin-atat','<div class=\"timeline-work\" style=\"margin: 0px; padding: 0.8em 0em 0em; border: 0px; font-weight: bold; font-stretch: inherit; font-size: 18px; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #30a689;\">AT&amp;T, Bratislava</div>\r\n<div class=\"timeline-period\" style=\"margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 0.8em; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #808080;\">August 2004 - November 2004</div>\r\n<p>I was responsible to configure router devices for North American customers.</p>','0000-00-00 00:00:00',1,1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'2016-07-24 11:16:33','2016-08-05 02:24:42'),(15,'Military academy in Liptovsky Mikulas','military-academy','<div class=\"timeline-work\" style=\"margin: 0px; padding: 0.8em 0em 0em; border: 0px; font-weight: bold; font-stretch: inherit; font-size: 18px; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #30a689;\">Telecommunication and information technology</div>\r\n<div class=\"timeline-period\" style=\"margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 0.8em; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #808080;\">1999 - 2004</div>','0000-00-00 00:00:00',1,1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'2016-07-24 11:18:58','2016-07-24 11:31:20'),(16,'Secondary school of electrical engineering in Liptovsky Hradok','spse-lh','<div class=\"timeline-work\" style=\"margin: 0px; padding: 0.8em 0em 0em; border: 0px; font-weight: bold; font-stretch: inherit; font-size: 18px; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #30a689;\">Telecommunication and information technology</div>\r\n<div class=\"timeline-period\" style=\"margin: 0px; padding: 0px; border: 0px; font-stretch: inherit; font-size: 0.8em; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #808080;\">1995 - 1999</div>','0000-00-00 00:00:00',1,1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'2016-07-24 11:20:16','2016-07-24 11:20:16'),(17,'Macon s.r.o.','macon','<div class=\"timeline-work\" style=\"margin: 0px; padding: 0.8em 0em 0em; border: 0px; font-weight: bold; font-stretch: inherit; font-size: 18px; line-height: 28.8px; font-family: Lato, sans-serif; vertical-align: baseline; color: #30a689;\">Full stack developer</div>\r\n<p><span style=\"color: #808080; font-family: Lato, sans-serif; font-size: 0.8em; line-height: 28.8px;\">October 2015 - present</span></p>\r\n<p>Starting from 1.10.2015, I started to work as a freelancer. My biggest customer is Consumer finance holding company, who is a loan leader on the local market.</p>','0000-00-00 00:00:00',1,1,2,'2016-07-25 00:00:00','0000-00-00 00:00:00',NULL,NULL,'2016-07-25 13:23:42','2016-08-18 05:01:32'),(18,'Testovacia aplikacia','test','<p>Toto je priklad testovacej aplikacie ..</p>','0000-00-00 00:00:00',1,2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,'2016-07-29 18:02:18','2016-07-29 19:36:53'),(19,'World capitals game','world-capitals','<p>I have created a small quiz game in React.js &amp; Redux. You can find it here: <a href=\"http://capitals.yuma.sk/\">http://capitals.yuma.sk/</a>. The source code is available <a href=\"https://github.com/durino13/capitals\">here</a>.</p>','0000-00-00 00:00:00',1,2,2,'2016-05-07 00:00:00','2026-05-07 00:00:00',NULL,NULL,'2016-08-05 02:35:11','2016-08-10 05:07:24');
/*!40000 ALTER TABLE `d_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `r_article_category`
--

DROP TABLE IF EXISTS `r_article_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `r_article_category` (
  `article_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  KEY `articles_categories_articles` (`article_id`),
  KEY `articles_categories_categories` (`category_id`),
  CONSTRAINT `articles_categories_articles` FOREIGN KEY (`article_id`) REFERENCES `d_article` (`id`),
  CONSTRAINT `articles_categories_categories` FOREIGN KEY (`category_id`) REFERENCES `c_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `r_article_category`
--

LOCK TABLES `r_article_category` WRITE;
/*!40000 ALTER TABLE `r_article_category` DISABLE KEYS */;
INSERT INTO `r_article_category` VALUES (1,1),(1,2);
/*!40000 ALTER TABLE `r_article_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Juraj Marusiak','durino13@gmail.com','$2y$10$lI3pTRqTDr2YnrM6sGPk8OUFYYKAipY4quuD1D1TELD8SdMk3vPC.','ffKssiN5k8mik4X8BQheURN2klgocaCxTaPBvcg7NAvcuTPklOA5JMoyk5Zi','2016-05-18 12:11:45','2016-07-29 19:36:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-18  7:04:56
