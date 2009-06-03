-- MySQL dump 10.11
--
-- Host: localhost    Database: rettiwt
-- ------------------------------------------------------
-- Server version	5.0.51a-24

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
-- Table structure for table `multimidia`
--

DROP TABLE IF EXISTS `multimidia`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `multimidia` (
  `id` int(11) NOT NULL auto_increment,
  `nomenovo` varchar(255) NOT NULL,
  `nomeantigo` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `multimidia`
--

LOCK TABLES `multimidia` WRITE;
/*!40000 ALTER TABLE `multimidia` DISABLE KEYS */;
INSERT INTO `multimidia` VALUES (4,'8fd850d19c8b4a4fea1a1f3561192abf6f9bbd2b.png','olho_protesto.png',0,8094,1);
/*!40000 ALTER TABLE `multimidia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teste`
--

DROP TABLE IF EXISTS `teste`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `teste` (
  `id` int(11) NOT NULL auto_increment,
  `nome` varchar(255) NOT NULL,
  `idade` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `teste`
--

LOCK TABLES `teste` WRITE;
/*!40000 ALTER TABLE `teste` DISABLE KEYS */;
INSERT INTO `teste` VALUES (1,'Reinão',21),(2,'Matuzalém',989),(3,'Ciclano',200),(4,'Beltrano',230),(6,'gasg',23),(7,'Teste2',10),(8,'Mais um teste',20);
/*!40000 ALTER TABLE `teste` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `password` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `alias` varchar(80) NOT NULL,
  `color` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`,`alias`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','rodrigogelinho@hotmail.com','rodrigo',1),(2,'40bd001563085fc35165329ea1ff5c5ecbdbbeef','landopbranco@hotmail.com','lando',2),(3,'0ca9277f91e40054767f69afeb0426711ca0fddd','','xx',1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2009-06-03 22:27:30
