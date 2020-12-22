-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: atp
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `pk_id_item` int(11) NOT NULL AUTO_INCREMENT,
  `nome_item` varchar(30) NOT NULL,
  `data_envio` date NOT NULL,
  `data_devolucao` date NOT NULL,
  `descricao` text NOT NULL,
  `data_devolucao_real` date DEFAULT NULL,
  `fk_id_usuario` int(11) DEFAULT NULL,
  `cpf_destinatario` char(11) DEFAULT NULL,
  PRIMARY KEY (`pk_id_item`),
  KEY `fk_id_usuario` (`fk_id_usuario`),
  KEY `cpf_destinatario` (`cpf_destinatario`),
  CONSTRAINT `item_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuarios`),
  CONSTRAINT `item_ibfk_2` FOREIGN KEY (`cpf_destinatario`) REFERENCES `usuario` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'sabre de luz 1','2001-04-06','2002-04-06','Feito de cristal kyber e bla bla bla','2010-04-06',1,'11111111111'),(2,'sabre de luz 2','2001-04-06','2001-04-06','Feito de cristal kyber e bla bla bla','2010-04-06',2,'11111111112'),(3,'sabre de luz 3','2001-04-06','2021-04-06','Feito de cristal kyber e bla bla bla',NULL,2,'21111111111'),(4,'sabre de luz 4','2001-04-06','1999-04-06','Feito de cristal kyber e bla bla bla',NULL,2,'21111111111'),(5,'sabre de luz 5','2001-04-06','2002-04-06','Feito de cristal kyber e bla bla bla','2010-04-06',1,'11111111111'),(6,'sabre de luz 6','2001-04-06','2001-04-07','Feito de cristal kyber e bla bla bla',NULL,1,'11111111111'),(7,'sabre de luz 7','2001-04-06','2021-04-06','Feito de cristal kyber e bla bla bla',NULL,1,'11111111112'),(8,'sabre de luz 8','2001-04-06','2021-04-06','Feito de cristal kyber e bla bla bla',NULL,1,'11111111112'),(9,'sabre de luz 9','2001-04-06','2003-04-06','Feito de cristal kyber e bla bla bla',NULL,2,'21111111111');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuarios` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `apelido` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `cpf` char(11) NOT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `estado` char(2) NOT NULL,
  `rua` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id_usuarios`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Raphael Mendes Stopa','Stopa','rmendesstopa@hotmail.com','21111111111','1111111111','2222222222','M','1990-01-10','SÃO JOSÉ DOS PINHAIS','op[a','PE','nha','bd129b81598dbe63b0cc4f4167f416df'),(2,'Anakin skywalker','Vader','lordsith@imperial.com','11111111111','6666666666','5555555555','M','2020-11-02','Curitiba','uuuuuuuuuuuu','PE','estrela','bd129b81598dbe63b0cc4f4167f416df'),(3,'Palpatine','Imperador','poderilimitado@imperial.com','11111111112','7777777777','8888888888','M','2020-11-06','SÃO JOSÉ DOS PINHAIS','op[a','AM','nha','bd129b81598dbe63b0cc4f4167f416df');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'atp'
--

--
-- Dumping routines for database 'atp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-22 19:40:18
