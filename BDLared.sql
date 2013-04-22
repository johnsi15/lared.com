CREATE DATABASE  IF NOT EXISTS `lared` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `lared`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: lared
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `totalesdia`
--

DROP TABLE IF EXISTS `totalesdia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `totalesdia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` varchar(60) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `base` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `totalesdia`
--

LOCK TABLES `totalesdia` WRITE;
/*!40000 ALTER TABLE `totalesdia` DISABLE KEYS */;
INSERT INTO `totalesdia` VALUES (28,'27500','6000','internet','2013-03-24'),(29,'10000','42250','recarga','2013-03-24'),(30,'5550','24422','minutos','2013-03-24'),(31,'1000','0','vitrina','2013-03-24'),(32,'12000','32250','recarga','2013-03-25'),(33,'7600','21226','minutos','2013-03-25'),(34,'28100','11000','internet','2013-03-25'),(35,'28700','0','internet','2013-03-26'),(36,'0','0','recarga','2013-03-26'),(37,'31900','10400','internet','2013-03-27'),(38,'0','0','minutos','2013-03-27'),(39,'7000','0','recarga','2013-03-27'),(40,'0','0','vitrina','2013-03-27'),(41,'41300','8050','internet','2013-03-28'),(42,'1800','10000','minutos','2013-03-28'),(43,'2000','3000','recarga','2013-03-28'),(44,'30300','4900','internet','2013-03-29'),(45,'9750','9200','minutos','2013-03-29'),(46,'1900','0','vitrina','2013-03-29'),(47,'40500','5850','internet','2013-03-30'),(48,'3100','3000','minutos','2013-03-30'),(49,'47800','8750','internet','2013-03-31'),(50,'0','0','minutos','2013-03-31'),(51,'24100','8000','internet','2013-04-01'),(52,'23502','8000','internet','2013-04-02'),(53,'0','0','internet','2013-04-03'),(54,'0','0','recarga','2013-04-03'),(55,'2000','8000','internet','2013-04-04'),(56,'0','0','recarga','2013-04-04'),(57,'0','0','minutos','2013-04-04'),(58,'0','0','internet','2013-04-05'),(59,'0','0','recarga','2013-04-05'),(60,'0','0','vitrina','2013-04-05'),(61,'15334','5000','internet','2013-04-08'),(62,'1300','8000','minutos','2013-04-08'),(63,'15000','10000','recarga','2013-04-08'),(64,'0','50000','vitrina','2013-04-08'),(65,'9500','5000','internet','2013-04-09'),(66,'0','0','recarga','2013-04-09'),(67,'1800','8000','minutos','2013-04-09'),(68,'1500','30000','vitrina','2013-04-09'),(69,'500','5000','internet','2013-04-10'),(70,'0','0','recarga','2013-04-10'),(71,'0','0','minutos','2013-04-10'),(72,'0','0','vitrina','2013-04-10'),(73,'0','0','internet','2013-04-12'),(74,'3000','5000','recarga','2013-04-15'),(75,'0','0','internet','2013-04-15'),(76,'0','0','vitrina','2013-04-15'),(77,'0','0','minutos','2013-04-15'),(78,'0','0','internet','2013-04-16'),(79,'0','0','recarga','2013-04-16'),(80,'0','0','minutos','2013-04-16'),(81,'0','0','vitrina','2013-04-16'),(82,'0','0','internet','2013-04-17'),(83,'0','0','recarga','2013-04-17'),(84,'0','0','minutos','2013-04-17'),(85,'0','0','vitrina','2013-04-17'),(86,'0','0','vitrina','2013-04-18'),(97,'1500','8000','internet','2013-04-22'),(98,'1000','50000','recarga','2013-04-22'),(99,'0','30000','minutos','2013-04-22'),(100,'0','60000','vitrina','2013-04-22');
/*!40000 ALTER TABLE `totalesdia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bases`
--

DROP TABLE IF EXISTS `bases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baseDia` int(11) DEFAULT NULL,
  `tipoBase` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bases`
--

LOCK TABLES `bases` WRITE;
/*!40000 ALTER TABLE `bases` DISABLE KEYS */;
INSERT INTO `bases` VALUES (1,8000,'internet','2013-04-22'),(2,50000,'recarga','2013-04-22'),(3,30000,'minutos','2013-04-22'),(4,60000,'vitrina','2013-04-22');
/*!40000 ALTER TABLE `bases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notas`
--

DROP TABLE IF EXISTS `notas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notas`
--

LOCK TABLES `notas` WRITE;
/*!40000 ALTER TABLE `notas` DISABLE KEYS */;
INSERT INTO `notas` VALUES (3,'Welcome a la Red.Com Versión 2.0');
/*!40000 ALTER TABLE `notas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cinternet`
--

DROP TABLE IF EXISTS `cinternet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cinternet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dinero` int(11) DEFAULT NULL,
  `tipoConcepto` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipoConcep_idx` (`tipoConcepto`)
) ENGINE=InnoDB AUTO_INCREMENT=474 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cinternet`
--

LOCK TABLES `cinternet` WRITE;
/*!40000 ALTER TABLE `cinternet` DISABLE KEYS */;
INSERT INTO `cinternet` VALUES (36,'internet',1000,'internet','2013-03-24'),(37,'internet',500,'internet','2013-03-24'),(38,'internet',3200,'internet','2013-03-24'),(39,'internet',500,'internet','2013-03-24'),(40,'internet',1000,'internet','2013-03-24'),(41,'internet',300,'internet','2013-03-24'),(42,'internet',500,'internet','2013-03-24'),(43,'internet',450,'minutos','2013-03-24'),(44,'internet',2500,'internet','2013-03-24'),(45,'recarga',2000,'recarga','2013-03-24'),(46,'internet',700,'internet','2013-03-24'),(47,'copias',300,'internet','2013-03-24'),(48,'internet',500,'internet','2013-03-24'),(49,'recarga',2000,'recarga','2013-03-24'),(50,'internet',1000,'internet','2013-03-24'),(51,'internet',2000,'internet','2013-03-24'),(52,'internet',1700,'internet','2013-03-24'),(53,'internet',1000,'internet','2013-03-24'),(54,'internet',500,'internet','2013-03-24'),(55,'4',600,'minutos','2013-03-24'),(56,'6',900,'minutos','2013-03-24'),(57,'9',1800,'minutos','2013-03-24'),(58,'cdMp3',1000,'vitrina','2013-03-24'),(59,'7',1050,'minutos','2013-03-24'),(60,'internet',300,'internet','2013-03-24'),(61,'internet',500,'internet','2013-03-24'),(62,'internet',500,'internet','2013-03-24'),(63,'internet',700,'internet','2013-03-24'),(64,'internet',3000,'internet','2013-03-24'),(65,'4',600,'minutos','2013-03-24'),(66,'internet',800,'internet','2013-03-24'),(67,'internet',1000,'internet','2013-03-24'),(68,'internet',700,'internet','2013-03-24'),(69,'recarga',2000,'recarga','2013-03-24'),(70,'internet',800,'internet','2013-03-24'),(71,'internet',1000,'internet','2013-03-24'),(72,'recarga',3000,'recarga','2013-03-24'),(73,'internet',500,'internet','2013-03-24'),(74,'1',150,'minutos','2013-03-24'),(75,'internet',500,'internet','2013-03-24'),(76,'recarga',1000,'recarga','2013-03-24'),(77,'recarga',5000,'recarga','2013-03-25'),(78,'internet',500,'internet','2013-03-25'),(79,'internet',700,'internet','2013-03-25'),(80,'internet',1000,'internet','2013-03-25'),(81,'internet',500,'internet','2013-03-25'),(82,'internet',1000,'internet','2013-03-25'),(83,'internet',500,'internet','2013-03-25'),(84,'internet',500,'internet','2013-03-25'),(85,'10',2000,'minutos','2013-03-25'),(86,'internet',300,'internet','2013-03-25'),(87,'internet,impresion',800,'internet','2013-03-25'),(88,'carta laboral',1000,'internet','2013-03-25'),(89,'internet',500,'internet','2013-03-25'),(90,'impresion ByN',300,'internet','2013-03-25'),(91,'recarga',1000,'recarga','2013-03-25'),(92,'1',150,'minutos','2013-03-25'),(93,'internet',1000,'internet','2013-03-25'),(94,'recarga',3000,'recarga','2013-03-25'),(95,'copias',200,'internet','2013-03-25'),(96,'internet',500,'internet','2013-03-25'),(97,'2',400,'minutos','2013-03-25'),(98,'internet',700,'internet','2013-03-25'),(99,'recarga',3000,'recarga','2013-03-25'),(100,'internet',1000,'internet','2013-03-25'),(101,'internet',3000,'internet','2013-03-25'),(102,'internet',1000,'internet','2013-03-25'),(103,'internet',1000,'internet','2013-03-25'),(104,'internet',500,'internet','2013-03-25'),(105,'internet',1000,'internet','2013-03-25'),(106,'diseÃ±o aviso',3000,'internet','2013-03-25'),(107,'internet',300,'internet','2013-03-25'),(108,'internet',2000,'internet','2013-03-25'),(109,'internet',300,'internet','2013-03-25'),(110,'internet',1700,'internet','2013-03-25'),(111,'7',1050,'minutos','2013-03-25'),(112,'17',3400,'minutos','2013-03-25'),(113,'4',600,'minutos','2013-03-25'),(114,'internet',500,'internet','2013-03-25'),(115,'internet',1000,'internet','2013-03-25'),(116,'internet',300,'internet','2013-03-25'),(117,'internet',500,'internet','2013-03-25'),(118,'internet',1000,'internet','2013-03-25'),(119,'internet',500,'internet','2013-03-26'),(120,'internet',1000,'internet','2013-03-26'),(121,'internet',500,'internet','2013-03-26'),(122,'internet',600,'internet','2013-03-26'),(123,'internet',500,'internet','2013-03-26'),(124,'internet',3900,'internet','2013-03-26'),(125,'internet',2700,'internet','2013-03-26'),(126,'internet',300,'internet','2013-03-26'),(127,'internet',500,'internet','2013-03-26'),(128,'internet',3200,'internet','2013-03-26'),(129,'internet',3200,'internet','2013-03-26'),(130,'internet',500,'internet','2013-03-26'),(131,'internet',4400,'internet','2013-03-26'),(132,'internet',1000,'internet','2013-03-26'),(133,'internet',900,'internet','2013-03-26'),(134,'internet',500,'internet','2013-03-26'),(135,'internet',500,'internet','2013-03-26'),(136,'internet',4000,'internet','2013-03-26'),(137,'internet',2000,'internet','2013-03-27'),(138,'internet',500,'internet','2013-03-27'),(139,'recarga',1000,'recarga','2013-03-27'),(140,'internet',1000,'internet','2013-03-27'),(141,'internet',300,'internet','2013-03-27'),(142,'internet',700,'internet','2013-03-27'),(143,'internet',500,'internet','2013-03-27'),(144,'recarga',1000,'recarga','2013-03-27'),(145,'internet',2500,'internet','2013-03-27'),(146,'internet',500,'internet','2013-03-27'),(147,'internet',500,'internet','2013-03-27'),(148,'internet',1500,'internet','2013-03-27'),(149,'internet',1300,'internet','2013-03-27'),(150,'internet',1000,'internet','2013-03-27'),(151,'internet',3700,'internet','2013-03-27'),(152,'internet',700,'internet','2013-03-27'),(153,'internet',1000,'internet','2013-03-27'),(154,'internet',1300,'internet','2013-03-27'),(155,'internet',1700,'internet','2013-03-27'),(156,'internet',1300,'internet','2013-03-27'),(157,'internet',3000,'internet','2013-03-27'),(158,'internet',500,'internet','2013-03-27'),(159,'internet',1000,'internet','2013-03-27'),(160,'internet',500,'internet','2013-03-27'),(161,'internet',500,'internet','2013-03-27'),(162,'internet',500,'internet','2013-03-27'),(163,'internet',500,'internet','2013-03-27'),(164,'internet',300,'internet','2013-03-27'),(165,'internet',1000,'internet','2013-03-27'),(166,'internet',1300,'internet','2013-03-27'),(167,'internet',300,'internet','2013-03-27'),(168,'internet',500,'internet','2013-03-27'),(169,'recarga',5000,'recarga','2013-03-27'),(170,'2',300,'minutos','2013-03-28'),(171,'internet',1000,'internet','2013-03-28'),(172,'2',300,'minutos','2013-03-28'),(173,'recarga',2000,'recarga','2013-03-28'),(174,'internet',500,'internet','2013-03-28'),(175,'internet',1000,'internet','2013-03-28'),(176,'internet',500,'internet','2013-03-28'),(177,'internet',4100,'internet','2013-03-28'),(178,'carta, copias',1500,'internet','2013-03-28'),(179,'internet',1000,'internet','2013-03-28'),(180,'internet',300,'internet','2013-03-28'),(181,'internet',500,'internet','2013-03-28'),(182,'copias',100,'internet','2013-03-28'),(183,'internet',500,'internet','2013-03-28'),(184,'internet',1000,'internet','2013-03-28'),(185,'internet',2000,'internet','2013-03-28'),(186,'buscar ',500,'internet','2013-03-28'),(187,'internet',500,'internet','2013-03-28'),(188,'internet',2300,'internet','2013-03-28'),(189,'5',750,'minutos','2013-03-28'),(190,'internet',1300,'internet','2013-03-28'),(191,'internet',1000,'internet','2013-03-28'),(192,'copias',400,'internet','2013-03-28'),(193,'internet',1000,'internet','2013-03-28'),(194,'internet',500,'internet','2013-03-28'),(195,'internet',1800,'internet','2013-03-28'),(196,'internet',500,'internet','2013-03-28'),(197,'copias',1400,'internet','2013-03-28'),(198,'internet',500,'internet','2013-03-28'),(199,'internet',300,'internet','2013-03-28'),(200,'internet',2500,'internet','2013-03-28'),(201,'internet',300,'internet','2013-03-28'),(202,'internet',500,'internet','2013-03-28'),(203,'internet',500,'internet','2013-03-28'),(204,'impresion',300,'internet','2013-03-28'),(205,'internet',2300,'internet','2013-03-28'),(206,'internet',2000,'internet','2013-03-28'),(207,'internet',300,'internet','2013-03-28'),(208,'internet',300,'internet','2013-03-28'),(209,'3',450,'minutos','2013-03-28'),(210,'internet',500,'internet','2013-03-28'),(211,'internet',2500,'internet','2013-03-28'),(212,'internet',500,'internet','2013-03-28'),(213,'internet',1700,'internet','2013-03-28'),(214,'internet',300,'internet','2013-03-28'),(215,'internet',800,'internet','2013-03-28'),(216,'internet',500,'internet','2013-03-29'),(217,'1',150,'minutos','2013-03-29'),(218,'internet',500,'internet','2013-03-29'),(219,'internet',300,'internet','2013-03-29'),(220,'internet',500,'internet','2013-03-29'),(221,'internet',500,'internet','2013-03-29'),(222,'internet',500,'internet','2013-03-29'),(223,'3',450,'minutos','2013-03-29'),(224,'internet',300,'internet','2013-03-29'),(225,'internet',500,'internet','2013-03-29'),(226,'internet',500,'internet','2013-03-29'),(227,'internet',1000,'internet','2013-03-29'),(228,'internet',1000,'internet','2013-03-29'),(229,'4',600,'minutos','2013-03-29'),(230,'internet',500,'internet','2013-03-29'),(231,'internet',300,'internet','2013-03-29'),(232,'internet',300,'internet','2013-03-29'),(233,'1',150,'minutos','2013-03-29'),(234,'internet',500,'internet','2013-03-29'),(235,'internet',500,'internet','2013-03-29'),(236,'3',450,'minutos','2013-03-29'),(237,'internet',500,'internet','2013-03-29'),(238,'internet',2000,'internet','2013-03-29'),(239,'internet',300,'internet','2013-03-29'),(240,'1',150,'minutos','2013-03-29'),(241,'30',4500,'minutos','2013-03-29'),(242,'1',150,'minutos','2013-03-29'),(243,'internet',500,'internet','2013-03-29'),(244,'internet',500,'internet','2013-03-29'),(245,'carpeta marron',400,'vitrina','2013-03-29'),(246,'internet',1300,'internet','2013-03-29'),(247,'6',900,'minutos','2013-03-29'),(248,'2',300,'minutos','2013-03-29'),(249,'internet',600,'internet','2013-03-29'),(250,'1',150,'minutos','2013-03-29'),(251,'1',150,'minutos','2013-03-29'),(252,'4',600,'minutos','2013-03-29'),(253,'internet',1000,'internet','2013-03-29'),(254,'internet',500,'internet','2013-03-29'),(255,'impresion',600,'internet','2013-03-29'),(256,'2',300,'minutos','2013-03-29'),(257,'internet',300,'internet','2013-03-29'),(258,'internet',5000,'internet','2013-03-29'),(259,'quemacd',1000,'internet','2013-03-29'),(260,'dvd',1500,'vitrina','2013-03-29'),(261,'3',450,'minutos','2013-03-29'),(262,'internet',1500,'internet','2013-03-29'),(263,'internet',1700,'internet','2013-03-29'),(264,'internet',2500,'internet','2013-03-29'),(265,'2',300,'minutos','2013-03-29'),(266,'internet',300,'internet','2013-03-29'),(267,'internet',800,'internet','2013-03-29'),(268,'internet',700,'internet','2013-03-29'),(269,'internet',500,'internet','2013-03-29'),(270,'trabajo',1000,'internet','2013-03-30'),(271,'internet',1500,'internet','2013-03-30'),(272,'internet',1000,'internet','2013-03-30'),(273,'internet',300,'internet','2013-03-30'),(274,'internet',500,'internet','2013-03-30'),(275,'internet',400,'internet','2013-03-30'),(276,'tarea',800,'internet','2013-03-30'),(277,'internet',700,'internet','2013-03-30'),(278,'impresion',500,'internet','2013-03-30'),(279,'internet',300,'internet','2013-03-30'),(280,'internet',500,'internet','2013-03-30'),(281,'internet',1000,'internet','2013-03-30'),(282,'internet',600,'internet','2013-03-30'),(283,'internet',500,'internet','2013-03-30'),(284,'internet',1500,'internet','2013-03-30'),(285,'internet',800,'internet','2013-03-30'),(286,'internet',5000,'internet','2013-03-30'),(287,'2',400,'minutos','2013-03-30'),(288,'2',300,'minutos','2013-03-30'),(289,'4',600,'minutos','2013-03-30'),(290,'1',150,'minutos','2013-03-30'),(291,'internet',1000,'internet','2013-03-30'),(292,'internet',700,'internet','2013-03-30'),(293,'internet',500,'internet','2013-03-30'),(294,'4',600,'minutos','2013-03-30'),(295,'internet',2300,'internet','2013-03-30'),(296,'1',150,'minutos','2013-03-30'),(297,'internet',2300,'internet','2013-03-30'),(298,'internet',1700,'internet','2013-03-30'),(299,'internet',500,'internet','2013-03-30'),(300,'internet,impresion',1000,'internet','2013-03-30'),(301,'internet',1500,'internet','2013-03-30'),(302,'internet',500,'internet','2013-03-30'),(303,'internet',3000,'internet','2013-03-30'),(304,'internet',500,'internet','2013-03-30'),(305,'internet',500,'internet','2013-03-30'),(306,'1',150,'minutos','2013-03-30'),(307,'internet',500,'internet','2013-03-30'),(308,'internet',500,'internet','2013-03-30'),(309,'internet',1000,'internet','2013-03-30'),(310,'internet',1000,'internet','2013-03-30'),(311,'internet',1000,'internet','2013-03-30'),(312,'copias',400,'internet','2013-03-30'),(313,'internet',300,'internet','2013-03-30'),(314,'1',150,'minutos','2013-03-30'),(315,'2',300,'minutos','2013-03-30'),(316,'internet',700,'internet','2013-03-30'),(317,'internet',500,'internet','2013-03-30'),(318,'internet',700,'internet','2013-03-30'),(319,'2',300,'minutos','2013-03-30'),(320,'internet',1000,'internet','2013-03-30'),(321,'internet',300,'internet','2013-03-31'),(322,'internet',300,'internet','2013-03-31'),(323,'tarea,impresion',2200,'internet','2013-03-31'),(324,'cotizacion',2000,'internet','2013-03-31'),(325,'impresion',500,'internet','2013-03-31'),(326,'internet',500,'internet','2013-03-31'),(327,'trabajo',2000,'internet','2013-03-31'),(328,'internet',800,'internet','2013-03-31'),(329,'internet',1000,'internet','2013-03-31'),(330,'internet',500,'internet','2013-03-31'),(331,'internet',1000,'internet','2013-03-31'),(332,'trabajo,impresion',8000,'internet','2013-03-31'),(333,'internet',1300,'internet','2013-03-31'),(334,'trabajoCd',3000,'internet','2013-03-31'),(335,'internet',300,'internet','2013-03-31'),(336,'internet',500,'internet','2013-03-31'),(337,'internet',700,'internet','2013-03-31'),(338,'impresion',2100,'internet','2013-03-31'),(339,'impresion',800,'internet','2013-03-31'),(340,'internet',1000,'internet','2013-03-31'),(341,'impresion',500,'internet','2013-03-31'),(342,'internet',1000,'internet','2013-03-31'),(343,'impresion',5000,'internet','2013-03-31'),(344,'internet',500,'internet','2013-03-31'),(345,'impresion,area',2500,'internet','2013-03-31'),(346,'internet',300,'internet','2013-03-31'),(347,'internet',500,'internet','2013-03-31'),(348,'carpeta,blanca',400,'internet','2013-03-31'),(349,'internet',500,'internet','2013-03-31'),(350,'internet',3300,'internet','2013-03-31'),(351,'internet',1000,'internet','2013-03-31'),(352,'internet',300,'internet','2013-03-31'),(353,'internet',500,'internet','2013-03-31'),(354,'internet',700,'internet','2013-03-31'),(355,'internet',1000,'internet','2013-03-31'),(356,'internet',1000,'internet','2013-03-31'),(357,'internet',300,'internet','2013-04-01'),(358,'internet',500,'internet','2013-04-01'),(359,'internet',400,'internet','2013-04-01'),(360,'internet',800,'internet','2013-04-01'),(361,'internet',500,'internet','2013-04-01'),(362,'internet',500,'internet','2013-04-01'),(363,'internet',700,'internet','2013-04-01'),(364,'internet',300,'internet','2013-04-01'),(365,'internet',2000,'internet','2013-04-01'),(366,'internet',500,'internet','2013-04-01'),(367,'internet',400,'internet','2013-04-01'),(368,'internet',1000,'internet','2013-04-01'),(369,'internet',500,'internet','2013-04-01'),(370,'internet',700,'internet','2013-04-01'),(371,'internet',500,'internet','2013-04-01'),(372,'internet',500,'internet','2013-04-01'),(373,'internet',300,'internet','2013-04-01'),(374,'internet',1000,'internet','2013-04-01'),(375,'internet',1800,'internet','2013-04-01'),(376,'internet',500,'internet','2013-04-01'),(377,'internet',700,'internet','2013-04-01'),(378,'internet',500,'internet','2013-04-01'),(379,'internet',500,'internet','2013-04-01'),(380,'internet',1700,'internet','2013-04-01'),(381,'internet',1000,'internet','2013-04-01'),(382,'internet',1500,'internet','2013-04-01'),(383,'internet',4500,'internet','2013-04-01'),(384,'internet',800,'internet','2013-04-02'),(385,'internet',800,'internet','2013-04-02'),(386,'internet',1500,'internet','2013-04-02'),(387,'internet',400,'internet','2013-04-02'),(388,'internet',300,'internet','2013-04-02'),(389,'internet',2000,'internet','2013-04-02'),(390,'internet,impresion ByN',2000,'internet','2013-04-04'),(391,'internet',500,'internet','2013-04-08'),(392,'internet',500,'internet','2013-04-08'),(393,'internet',500,'internet','2013-04-08'),(394,'internet',500,'internet','2013-04-08'),(395,'internet',500,'internet','2013-04-08'),(396,'internet',500,'internet','2013-04-08'),(397,'internet',500,'internet','2013-04-08'),(398,'internet,impresion',500,'internet','2013-04-08'),(399,'internet',500,'internet','2013-04-08'),(400,'internet',500,'internet','2013-04-08'),(401,'internet',500,'internet','2013-04-08'),(402,'internet',500,'internet','2013-04-08'),(403,'internet',500,'internet','2013-04-08'),(404,'internet',500,'internet','2013-04-08'),(405,'internet',500,'internet','2013-04-08'),(406,'internet',500,'internet','2013-04-08'),(407,'internet',500,'internet','2013-04-08'),(408,'internet',500,'internet','2013-04-08'),(409,'internet',500,'internet','2013-04-08'),(410,'internet',500,'internet','2013-04-08'),(411,'internet',500,'internet','2013-04-08'),(412,'internet',500,'internet','2013-04-08'),(413,'internet',500,'internet','2013-04-08'),(414,'internet',500,'internet','2013-04-08'),(415,'internet',500,'internet','2013-04-08'),(416,'internet',500,'internet','2013-04-08'),(417,'internet',500,'internet','2013-04-08'),(418,'internet',500,'internet','2013-04-08'),(419,'internet',500,'internet','2013-04-08'),(420,'recarga',1000,'recarga','2013-04-08'),(421,'recarga',1000,'recarga','2013-04-08'),(422,'recarga',1000,'recarga','2013-04-08'),(423,'recarga',1000,'recarga','2013-04-08'),(424,'recarga',1000,'recarga','2013-04-08'),(425,'recarga',1000,'recarga','2013-04-08'),(426,'recarga',3000,'recarga','2013-04-08'),(427,'recarga',1000,'recarga','2013-04-08'),(428,'2',300,'minutos','2013-04-08'),(429,'2',300,'minutos','2013-04-08'),(430,'2',300,'minutos','2013-04-08'),(431,'1',100,'minutos','2013-04-08'),(432,'2',300,'minutos','2013-04-08'),(433,'internet',500,'internet','2013-04-08'),(434,'34',34,'internet','2013-04-08'),(435,'recarga',1000,'recarga','2013-04-08'),(436,'recarga',3000,'recarga','2013-04-08'),(437,'recarga',1000,'recarga','2013-04-08'),(438,'internet',300,'internet','2013-04-08'),(439,'prueba',500,'internet','2013-04-09'),(440,'prueba Bien ',500,'internet','2013-04-09'),(441,'john',500,'internet','2013-04-09'),(442,'john',500,'internet','2013-04-09'),(443,'john',500,'internet','2013-04-09'),(444,'john',500,'internet','2013-04-09'),(445,'john',500,'internet','2013-04-09'),(446,'john',500,'internet','2013-04-09'),(447,'john',500,'internet','2013-04-09'),(448,'john',500,'internet','2013-04-09'),(449,'john',500,'internet','2013-04-09'),(450,'john',500,'internet','2013-04-09'),(451,'john',500,'internet','2013-04-09'),(452,'john',500,'internet','2013-04-09'),(453,'john',500,'internet','2013-04-09'),(454,'john',500,'internet','2013-04-09'),(455,'prueba',500,'internet','2013-04-09'),(456,'john',500,'internet','2013-04-09'),(457,'prueba refres',300,'minutos','2013-04-09'),(458,'2',300,'minutos','2013-04-09'),(459,'2',300,'minutos','2013-04-09'),(460,'2',500,'minutos','2013-04-09'),(461,'1',100,'minutos','2013-04-09'),(462,'prueba',500,'vitrina','2013-04-09'),(463,'prueba2',500,'vitrina','2013-04-09'),(464,'prueba',500,'vitrina','2013-04-09'),(465,'2',300,'minutos','2013-04-09'),(466,'prueba',500,'internet','2013-04-09'),(467,'impresio prueba refres',300,'internet','2013-04-10'),(468,'recarga',1000,'recarga','2013-04-15'),(469,'recarga',1000,'recarga','2013-04-15'),(470,'recarga',1000,'recarga','2013-04-15'),(471,'prueba',500,'internet','2013-04-22'),(472,'prueba2',1000,'internet','2013-04-22'),(473,'recarga',1000,'recarga','2013-04-22');
/*!40000 ALTER TABLE `cinternet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precios`
--

DROP TABLE IF EXISTS `precios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `precios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precios`
--

LOCK TABLES `precios` WRITE;
/*!40000 ALTER TABLE `precios` DISABLE KEYS */;
INSERT INTO `precios` VALUES (1,'Impresion ByN','$200'),(2,'Impresion ByN mas de 10','$150'),(3,'Impresion Color','$500'),(4,'Impresion Color mas de 10','$300'),(5,'Copias ByN','$100'),(6,'Copias ByN mas de 20','$80'),(7,'Copias Color','$200'),(8,'Copias Color mas de 20','$150'),(9,'Consultas','$300'),(10,'Quema de Cd Dvd','$1000 o $2000'),(11,'prueba','$500'),(12,'prueba2','500'),(13,'prueba2','600'),(14,'prueba','$1000'),(15,'cartas','$500');
/*!40000 ALTER TABLE `precios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `clave` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'mario','1090438077'),(2,'john','1234');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cierre`
--

DROP TABLE IF EXISTS `cierre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cierre` (
  `id` date NOT NULL,
  `dinero` int(11) DEFAULT NULL,
  `dia` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cierre`
--

LOCK TABLES `cierre` WRITE;
/*!40000 ALTER TABLE `cierre` DISABLE KEYS */;
INSERT INTO `cierre` VALUES ('2013-04-01',67000,'Miercoles'),('2013-04-02',1000,'Miercoles'),('2013-04-03',500,'Jueves'),('2013-04-05',1500,'Jueves'),('2013-04-06',7000,'Miercoles'),('2013-04-07',5000,'martes'),('2013-04-08',6000,'lunes'),('2013-04-09',2000,'Miercoles'),('2013-04-10',500,'Jueves'),('2013-04-11',3000,'Miercoles'),('2013-04-12',500,'jueves'),('2013-04-13',200,'martes'),('2013-04-14',500,'sabado'),('2013-04-15',5000,'domingo'),('2013-04-16',500,'Viernes'),('2013-04-17',560,'Lunes'),('2013-04-18',5000,'Jueves'),('2013-04-19',400,'Jueves');
/*!40000 ALTER TABLE `cierre` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-04-22 18:00:39
