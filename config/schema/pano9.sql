-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: panaderiakiss
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `contactos`
--

CREATE USER  'panokiss'@'localhost' IDENTIFIED BY 'pankiss#12345/pan';
GRANT ALL PRIVILEGES ON  panaderiakiss.* TO 'panokiss'@'localhost';

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `IdContac` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `AP` varchar(30) NOT NULL,
  `AM` varchar(30) DEFAULT NULL,
  `Tel` varchar(20) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `IdProv` int(11) NOT NULL,
  PRIMARY KEY (`IdContac`),
  KEY `IdProv` (`IdProv`),
  CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`IdProv`) REFERENCES `provedores` (`IdProv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` VALUES (5,'Jose Luis','Carmona','Flores','24122206097','joscar@gmail.com',5);
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cortes`
--

DROP TABLE IF EXISTS `cortes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cortes` (
  `IdCorte` int(11) NOT NULL AUTO_INCREMENT,
  `Cantidad` decimal(5,2) NOT NULL,
  `Fecha` date NOT NULL,
  `IdReporte` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IdCorte`),
  KEY `IdReporte` (`IdReporte`),
  CONSTRAINT `cortes_ibfk_1` FOREIGN KEY (`IdReporte`) REFERENCES `reportes` (`IdReporte`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cortes`
--

LOCK TABLES `cortes` WRITE;
/*!40000 ALTER TABLE `cortes` DISABLE KEYS */;
/*!40000 ALTER TABLE `cortes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_vent`
--

DROP TABLE IF EXISTS `prod_vent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_vent` (
  `IdProducto` int(11) NOT NULL,
  `IdVenta` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IdProducto`,`IdVenta`),
  KEY `IdVenta` (`IdVenta`),
  CONSTRAINT `prod_vent_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `prod_vent_ibfk_2` FOREIGN KEY (`IdVenta`) REFERENCES `ventas` (`IdVenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_vent`
--

LOCK TABLES `prod_vent` WRITE;
/*!40000 ALTER TABLE `prod_vent` DISABLE KEYS */;
/*!40000 ALTER TABLE `prod_vent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) NOT NULL,
  `Costo` decimal(10,2) NOT NULL,
  `CantDis` int(11) NOT NULL COMMENT 'Cantidad en stock',
  `Imagen` varchar(100) DEFAULT NULL COMMENT 'Nombre de la imagen relacionada con el Producto',
  `Descrip` text NOT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (4,'Concha de Chocolate',6.50,500,'1772036230_ConchaChocolate.png','Pan dulce de Concha con corteza sabor Chocolate'),(5,'Oreja de Chocolate',7.00,460,'1772036439_YoLeDigoGarra.png','Pan dulce de Masa Hojaldre, con un acabado de cuburte de chocolate que lo hace parecer mas a una garra'),(6,'Bolillo',3.20,1000,'1772472686_Bolillo.png','Pan salado económico');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provedores`
--

DROP TABLE IF EXISTS `provedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provedores` (
  `IdProv` int(11) NOT NULL AUTO_INCREMENT,
  `Descrip` text NOT NULL,
  `Calle` varchar(40) NOT NULL,
  `Num` varchar(10) NOT NULL,
  `Negocio` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Estado` tinyint(1) NOT NULL COMMENT 'Estado activo o inactivo del proovedor',
  PRIMARY KEY (`IdProv`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provedores`
--

LOCK TABLES `provedores` WRITE;
/*!40000 ALTER TABLE `provedores` DISABLE KEYS */;
INSERT INTO `provedores` VALUES (5,'Es un negocio','Emiliano Zapata','67','Pan y pasteles','COCOS',1);
/*!40000 ALTER TABLE `provedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rep_vent`
--

DROP TABLE IF EXISTS `rep_vent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rep_vent` (
  `IdReporte` int(11) NOT NULL,
  `IdVenta` int(11) NOT NULL,
  PRIMARY KEY (`IdReporte`,`IdVenta`),
  KEY `IdVenta` (`IdVenta`),
  CONSTRAINT `rep_vent_ibfk_1` FOREIGN KEY (`IdReporte`) REFERENCES `reportes` (`IdReporte`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rep_vent_ibfk_2` FOREIGN KEY (`IdVenta`) REFERENCES `ventas` (`IdVenta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rep_vent`
--

LOCK TABLES `rep_vent` WRITE;
/*!40000 ALTER TABLE `rep_vent` DISABLE KEYS */;
/*!40000 ALTER TABLE `rep_vent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportes`
--

DROP TABLE IF EXISTS `reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reportes` (
  `IdReporte` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `IngresoTotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IdReporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportes`
--

LOCK TABLES `reportes` WRITE;
/*!40000 ALTER TABLE `reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `AP` varchar(30) NOT NULL,
  `AM` varchar(30) NOT NULL,
  `FechaN` date NOT NULL,
  `ROL` enum('VENDEDOR','ADMINISTRADOR') NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contrasenia` varchar(100) NOT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (3,'Rodrigo','Pineda','Torres','2004-03-04','ADMINISTRADOR','rodrigami06@gmail.com','$2y$10$StdchZmwdym98my61z380uaNQ2C62ijEFZLBwQ6jhE/DyWCDKOgSC'),(4,'Maria','Rodriguez','Cauteta','2006-06-15','VENDEDOR','mariroca4@hotmail.com','$2y$10$x4oYpBhXxezKxXA5GbtIgOH9L2cY/uagZFWiXpekrAaXHAQ7w0CUK'),(5,'Hector','Rodriguez','Canteno','2000-04-19','VENDEDOR','hecbon67@outlook.com','$2y$10$s5Z0Z751TIgwJz84/AAYu.DmRA19DGG7cknONpieNaKdpmcpjxlrS'),(6,'Rodrigo','Garcia','Mijares','2000-02-19','VENDEDOR','rodri_garcia@gmail.com','$2y$10$DPre75GrehByKaUrtxD4dui67X74h3y2gUZRKv5MRhhwSdzo13gby'),(7,'Maria','Bautista','Bautista','2001-05-10','ADMINISTRADOR','delacruzbautistamariaalejandra@gmail.com','$2y$10$yrVdsxTEgiB1i7CnECCDgOwZdpFSU/QmUX9FJBkETCqum8r7bsW.G'),(8,'Kevin','Romero','Carmona','2003-07-12','ADMINISTRADOR','pandeprueba@gmail.com','$2y$10$r2XjbgnE/Xm1LLXJdW4xpup7nnFYflc./ODMVKA6IKmzH.AiC6om2'),(9,'Maxima','Sánchez','Pineda','2000-04-10','ADMINISTRADOR','maxisan@gmail.com','$2y$10$NopFX.A8RC2dGAJBsE.0YOsuv0zYJTQ9GfMy2eKKsbtkhWX/D1pu.'),(10,'Omar','Chaparro','Flores','2004-05-05','VENDEDOR','kunfupanda@pandeprueba.com','$2y$10$Qe.GJPRn23p/GrOsd8oiQuSOziP8mhrzQTpnu.x1yshc/IEypSSNC');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `Cantidad` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Fecha` date NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdProv` int(11) NOT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `IdUsuario` (`IdUsuario`),
  KEY `IdProv` (`IdProv`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`IdProv`) REFERENCES `provedores` (`IdProv`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-07  2:45:34
