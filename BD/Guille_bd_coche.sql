CREATE DATABASE  IF NOT EXISTS `guillermo_db2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `guillermo_db2`;
-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: guillermo_db2
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB

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
-- Table structure for table `coches`
--

DROP TABLE IF EXISTS `coches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `tipo_motor` varchar(45) NOT NULL,
  `num_puertas` int(11) NOT NULL,
  `COMPRADORES_id` int(11) NOT NULL,
  `VENDEDORES_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_COCHES_COMPRADORES_idx` (`COMPRADORES_id`),
  KEY `fk_COCHES_VENDEDORES1_idx` (`VENDEDORES_id`),
  CONSTRAINT `fk_COCHES_COMPRADORES` FOREIGN KEY (`COMPRADORES_id`) REFERENCES `mydb`.`compradores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_COCHES_VENDEDORES1` FOREIGN KEY (`VENDEDORES_id`) REFERENCES `mydb`.`vendedores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coches`
--

LOCK TABLES `coches` WRITE;
/*!40000 ALTER TABLE `coches` DISABLE KEYS */;
/*!40000 ALTER TABLE `coches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compradores`
--

DROP TABLE IF EXISTS `compradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compradores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compradores`
--

LOCK TABLES `compradores` WRITE;
/*!40000 ALTER TABLE `compradores` DISABLE KEYS */;
INSERT INTO `compradores` VALUES (1,'Guillermo','Cubero','guillermoqbero@gmail.com','Barcelona','Igualada','C/Mariano Cuiner'),(2,'Guillermo','Cubero','guillermoqbero@gmail.com','Barcelona','Igualada','C/Mariano Cuiner'),(3,'Kevin','Mamaqui','Kevin@nose.com','Barcelona','Barcelona','02145'),(4,'dfg','sdfg','lauraperezgil1994@gmail.com','dfgh','Barcelona','gdhf'),(5,'dfg','sdfg','lauraperezgil1994@gmail.com','dfgh','Barcelona','gdhf'),(6,'dfg','sdfg','lauraperezgil1994@gmail.com','dfgh','Barcelona','gdhf'),(7,'dfg','sdfg','lauraperezgil1994@gmail.com','dfgh','Barcelona','gdhf'),(8,'dfg','sdfg','lauraperezgil1994@gmail.com','dfgh','Barcelona','gdhf'),(9,'sdf','asdf','el_chillywilly@hotmail.com','dfgh','Barcelona','08700');
/*!40000 ALTER TABLE `compradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendedores`
--

DROP TABLE IF EXISTS `vendedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `calle` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendedores`
--

LOCK TABLES `vendedores` WRITE;
/*!40000 ALTER TABLE `vendedores` DISABLE KEYS */;
INSERT INTO `vendedores` VALUES (1,'Guillermo','Cubero','guillermoqbero@gmail.com','Barcelona','Igualada','C/Mariano Cuiner');
/*!40000 ALTER TABLE `vendedores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-31 10:43:05
