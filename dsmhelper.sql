-- MySQL dump 10.13  Distrib 5.6.35, for osx10.10 (x86_64)
--
-- Host: localhost    Database: dsmhelper
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES UTF8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `homework`
--

DROP TABLE IF EXISTS `homework`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `homework` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `timetable` int(1) unsigned NOT NULL,
  `description` text NOT NULL,
  `until` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `homework`
--

LOCK TABLES `homework` WRITE;
/*!40000 ALTER TABLE `homework` DISABLE KEYS */;
INSERT INTO `homework` VALUES (1,9,'30 Day Challenge Presentation','2017-04-17'),(2,21,'로그인, 회원가입 만들기','2017-04-04');
/*!40000 ALTER TABLE `homework` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `period`
--

DROP TABLE IF EXISTS `period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `period` (
  `id` int(1) unsigned NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `period`
--

LOCK TABLES `period` WRITE;
/*!40000 ALTER TABLE `period` DISABLE KEYS */;
INSERT INTO `period` VALUES (1,'08:40:00','09:30:00'),(2,'09:40:00','10:30:00'),(3,'10:40:00','11:30:00'),(4,'11:40:00','12:30:00'),(5,'13:30:00','14:20:00'),(6,'14:30:00','15:20:00'),(7,'15:30:00','16:20:00'),(8,'16:40:00','17:30:00'),(9,'18:40:00','19:30:00'),(10,'19:40:00','20:30:00'),(11,'21:00:00','23:00:00'),(20,'07:35:00','08:20:00'),(21,'12:30:00','13:30:00'),(22,'17:30:00','18:40:00');
/*!40000 ALTER TABLE `period` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (0,'네트워크'),(1,'영어'),(2,'문학'),(3,'미적분I'),(4,'미술'),(5,'정보보안'),(6,'진로와 직업'),(7,'창체'),(8,'체육'),(9,'한국사'),(10,'해킹'),(11,'아침식사'),(12,'점심식사'),(13,'저녁식사'),(14,'쉬는시간'),(15,'야간자습'),(16,'동아리'),(17,'멘토링'),(18,'방과후');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetable` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `subject` int(1) NOT NULL,
  `date` int(1) unsigned NOT NULL,
  `period` int(1) unsigned NOT NULL,
  `isBlock` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
INSERT INTO `timetable` VALUES (1,11,2,20,0),(2,7,2,1,0),(3,3,2,2,0),(4,3,2,3,1),(5,9,2,4,0),(6,12,2,21,0),(7,6,2,5,0),(8,2,2,6,0),(9,1,2,7,0),(10,18,2,8,0),(11,13,2,22,0),(12,18,2,9,1),(13,18,2,10,1),(14,15,2,11,0),(15,11,3,20,0),(16,0,3,1,0),(17,0,3,2,1),(18,0,3,3,1),(19,8,3,4,0),(20,12,3,21,0),(21,10,3,5,0),(22,10,3,6,1),(23,10,3,7,1),(24,18,3,8,0),(25,13,3,22,0),(26,18,3,9,1),(27,18,3,10,1),(28,15,3,11,0),(29,11,4,20,0),(30,0,4,1,0),(31,0,4,2,1),(32,0,4,3,1),(33,6,4,4,0),(34,12,4,21,0),(35,5,4,5,0),(36,5,4,6,1),(37,5,4,7,1),(38,18,4,8,0),(39,13,4,22,0),(40,18,4,9,1),(41,18,4,10,1),(42,15,4,11,0),(43,11,5,20,0),(44,2,5,1,0),(45,9,5,2,0),(46,1,5,3,0),(47,1,5,4,1),(48,12,5,21,0),(49,7,5,5,0),(50,7,5,6,1),(51,7,5,7,1),(52,17,5,8,0),(53,13,5,22,0),(54,17,5,9,1),(55,17,5,10,1),(56,15,5,11,0),(57,11,6,20,0),(58,8,6,1,0),(59,4,6,2,0),(60,4,6,3,1),(61,4,6,4,1),(62,12,6,21,0),(63,9,6,5,0),(64,2,6,6,0),(65,16,6,7,0),(66,16,6,8,1),(67,13,6,22,0),(68,16,6,9,1),(69,16,6,10,1),(70,15,6,11,0);
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-10 17:05:28
