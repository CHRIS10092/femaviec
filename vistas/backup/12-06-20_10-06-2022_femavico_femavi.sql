-- MySQL dump 10.19  Distrib 10.3.35-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: femavico_femavi
-- ------------------------------------------------------
-- Server version	10.3.35-MariaDB-log

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
-- Table structure for table `alimentacion`
--

DROP TABLE IF EXISTS `alimentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimentacion` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `galpon` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `comedero` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `idempresa` varchar(6) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimentacion`
--

LOCK TABLES `alimentacion` WRITE;
/*!40000 ALTER TABLE `alimentacion` DISABLE KEYS */;
INSERT INTO `alimentacion` VALUES (11,23,'2022-04-01','Lleno','Sucio','3'),(12,26,'2002-12-12','Lleno','Limpio','3'),(13,1,'2022-11-16','Lleno','Sucio','3'),(14,4,'2022-06-02','Lleno','Limpio','3'),(16,27,'2022-05-12','Lleno','Sucio','3');
/*!40000 ALTER TABLE `alimentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datospollos`
--

DROP TABLE IF EXISTS `datospollos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datospollos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `caso` varchar(100) NOT NULL,
  `cantidad` tinyint(10) NOT NULL,
  `rango` varchar(15) NOT NULL,
  `galpon` tinyint(10) NOT NULL,
  `lote` tinyint(10) NOT NULL,
  `responsable` int(3) NOT NULL,
  `observacion` varchar(1250) NOT NULL,
  `idempresa` int(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `datospollos_responsable` (`responsable`),
  CONSTRAINT `datospollos_responsable` FOREIGN KEY (`responsable`) REFERENCES `maqv_tblempleado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datospollos`
--

LOCK TABLES `datospollos` WRITE;
/*!40000 ALTER TABLE `datospollos` DISABLE KEYS */;
INSERT INTO `datospollos` VALUES (3,'Mortalidad',20,'Pequeno',23,1,2,'Ninguna',3),(9,'Tratamiento',10,'Pequeno',26,2,2,'ninguna',3);
/*!40000 ALTER TABLE `datospollos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galpones`
--

DROP TABLE IF EXISTS `galpones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `galpones` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(2) NOT NULL,
  `medidas` varchar(10) NOT NULL,
  `n_pollos` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `rango` varchar(15) NOT NULL,
  `estado` varchar(3) NOT NULL,
  `idempresa` int(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `galpones_empresa` (`idempresa`),
  CONSTRAINT `galpones_empresa` FOREIGN KEY (`idempresa`) REFERENCES `maqv_tblempresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galpones`
--

LOCK TABLES `galpones` WRITE;
/*!40000 ALTER TABLE `galpones` DISABLE KEYS */;
INSERT INTO `galpones` VALUES (29,26,'34x120',1200,3,'Grande','Act',3),(30,23,'12x13',1234,2,'Grande','Act',3),(37,1,'10x10',17,2,'Pequeno','Act',3),(38,4,'10 X 11',100,1,'Grande','Act',3),(42,27,'202 millas',2147483647,2147483647,'Pequeno','Act',3);
/*!40000 ALTER TABLE `galpones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herramientastemperatura`
--

DROP TABLE IF EXISTS `herramientastemperatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herramientastemperatura` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `articulo` varchar(30) NOT NULL,
  `cantidad` tinyint(10) NOT NULL,
  `parametro` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `valorUni` decimal(60,2) NOT NULL,
  `valorTot` decimal(60,2) NOT NULL,
  `observacion` varchar(1250) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `idempresa` int(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `htemperatura_empresa` (`idempresa`),
  CONSTRAINT `htemperatura_empresa` FOREIGN KEY (`idempresa`) REFERENCES `maqv_tblempresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herramientastemperatura`
--

LOCK TABLES `herramientastemperatura` WRITE;
/*!40000 ALTER TABLE `herramientastemperatura` DISABLE KEYS */;
INSERT INTO `herramientastemperatura` VALUES (11,'PC',10,'Temperatura','2022-04-02',12.00,120.00,'Ninguna','Funcionando',3),(12,' Sensor DHT11',3,'Temperatura','2022-06-02',6.00,18.00,'Solo sirve para dectectar temperatura','Nofunciona',3),(13,'sensor ',6,'Humedad','2022-06-04',10.00,60.00,'sensores nuevos adquiridos','Funcionando',3);
/*!40000 ALTER TABLE `herramientastemperatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historial`
--

DROP TABLE IF EXISTS `historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `idcuidador` int(11) NOT NULL,
  `idgalpones` int(11) NOT NULL,
  `idinsumo` int(11) NOT NULL,
  `idalimentos` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galpon` (`idgalpones`),
  KEY `idcuidador` (`idcuidador`),
  KEY `idalimentos` (`idalimentos`),
  KEY `idinsumo` (`idinsumo`),
  CONSTRAINT `galpon` FOREIGN KEY (`idgalpones`) REFERENCES `galpones` (`codigo`),
  CONSTRAINT `idalimentos` FOREIGN KEY (`idalimentos`) REFERENCES `alimentacion` (`codigo`),
  CONSTRAINT `idcuidador` FOREIGN KEY (`idcuidador`) REFERENCES `maqv_tblempleado` (`id`),
  CONSTRAINT `idinsumo` FOREIGN KEY (`idinsumo`) REFERENCES `insumoproduccion` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historial`
--

LOCK TABLES `historial` WRITE;
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
INSERT INTO `historial` VALUES (1,1,3,37,5,12);
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insumoproduccion`
--

DROP TABLE IF EXISTS `insumoproduccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insumoproduccion` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `articulo` varchar(30) NOT NULL,
  `cantidad` tinyint(10) NOT NULL,
  `fecha` date NOT NULL,
  `precioUni` decimal(60,2) NOT NULL,
  `precioTot` decimal(60,2) NOT NULL,
  `idempresa` int(1) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `insumoproduccion_empresa` (`idempresa`),
  CONSTRAINT `insumoproduccion_empresa` FOREIGN KEY (`idempresa`) REFERENCES `maqv_tblempresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumoproduccion`
--

LOCK TABLES `insumoproduccion` WRITE;
/*!40000 ALTER TABLE `insumoproduccion` DISABLE KEYS */;
INSERT INTO `insumoproduccion` VALUES (5,'Detergente',20,'2020-11-11',50.00,1350.00,3,'Ingreso'),(7,'Vitaminass',40,'2022-12-02',2.00,6.00,3,'Egreso'),(9,'45eee4we4',44,'2022-06-09',223.00,968.00,3,'Ingreso');
/*!40000 ALTER TABLE `insumoproduccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intentos`
--

DROP TABLE IF EXISTS `intentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intentos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intentos`
--

LOCK TABLES `intentos` WRITE;
/*!40000 ALTER TABLE `intentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `intentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maqv_tblclaves`
--

DROP TABLE IF EXISTS `maqv_tblclaves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maqv_tblclaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `temporal` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `clave_usuario` (`idusuario`),
  CONSTRAINT `clave_usuario` FOREIGN KEY (`idusuario`) REFERENCES `maqv_tblusuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maqv_tblclaves`
--

LOCK TABLES `maqv_tblclaves` WRITE;
/*!40000 ALTER TABLE `maqv_tblclaves` DISABLE KEYS */;
INSERT INTO `maqv_tblclaves` VALUES (6,2,'XSFR341'),(7,2,'XSFR207'),(8,2,'XSFR398'),(9,2,'XSFR328'),(10,2,'XSFR489'),(11,2,'XSFR414'),(12,2,'XSFR563'),(13,2,'XSFR840'),(14,2,'XSFR857'),(15,2,'XSFR849');
/*!40000 ALTER TABLE `maqv_tblclaves` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maqv_tblempleado`
--

DROP TABLE IF EXISTS `maqv_tblempleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maqv_tblempleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(35) NOT NULL,
  `segundo_nombre` varchar(35) NOT NULL,
  `apellido_paterno` varchar(35) NOT NULL,
  `apellido_materno` varchar(35) NOT NULL,
  `fecha` date NOT NULL,
  `sexo` varchar(35) NOT NULL,
  `idEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maqv_tblempleado`
--

LOCK TABLES `maqv_tblempleado` WRITE;
/*!40000 ALTER TABLE `maqv_tblempleado` DISABLE KEYS */;
INSERT INTO `maqv_tblempleado` VALUES (1,'Roxana','Karina','Isea','Leon','1991-03-04','Femenino',3),(2,'Julian','Martin','Juarez','Cando','1998-08-08','Masculino',3),(3,'Juan','David','Yaselga','Lincango','1998-03-19','Masculino',3),(4,'Mariana','Miriam','Vayas','Cerezo','1992-06-04','Femenino',3),(5,'44334','44334','3E333','3E333','2004-06-10','Femenino',5);
/*!40000 ALTER TABLE `maqv_tblempleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maqv_tblempresa`
--

DROP TABLE IF EXISTS `maqv_tblempresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maqv_tblempresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(13) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maqv_tblempresa`
--

LOCK TABLES `maqv_tblempresa` WRITE;
/*!40000 ALTER TABLE `maqv_tblempresa` DISABLE KEYS */;
INSERT INTO `maqv_tblempresa` VALUES (3,'1725261521001','Pollo faenado','Quito'),(5,'0604815712001','Pura pechuga','Cuenca');
/*!40000 ALTER TABLE `maqv_tblempresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maqv_tblrol`
--

DROP TABLE IF EXISTS `maqv_tblrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maqv_tblrol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(31) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maqv_tblrol`
--

LOCK TABLES `maqv_tblrol` WRITE;
/*!40000 ALTER TABLE `maqv_tblrol` DISABLE KEYS */;
INSERT INTO `maqv_tblrol` VALUES (1,'admin'),(2,'asistente'),(3,'Usuario');
/*!40000 ALTER TABLE `maqv_tblrol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maqv_tblusuario`
--

DROP TABLE IF EXISTS `maqv_tblusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maqv_tblusuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `idrol` int(11) NOT NULL,
  `estado` varchar(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usu_rol` (`idrol`),
  CONSTRAINT `usu_rol` FOREIGN KEY (`idrol`) REFERENCES `maqv_tblrol` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maqv_tblusuario`
--

LOCK TABLES `maqv_tblusuario` WRITE;
/*!40000 ALTER TABLE `maqv_tblusuario` DISABLE KEYS */;
INSERT INTO `maqv_tblusuario` VALUES (2,'Alex','Roberto','alexander.roberto1999@hotmail.com','admin','Femavi.2022',1,'Act'),(4,'Mario','Lase','jorgito@gmail.com','usu2020','pass2020',2,'Act'),(5,'Xavier','Tenelema','Pablo.tenelema.m@gmail.com','femavi','Pablo.tenelema.m@gmail.com',2,'Act'),(6,'Christian','Salas','Christian.Salas@hotmail.com','Christian13','Christian.Salas@hotmail.com',2,'Act'),(7,'44334','3E333','a@gmail.com','asinche','a@gmail.com',1,'Act');
/*!40000 ALTER TABLE `maqv_tblusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametrostemperatura`
--

DROP TABLE IF EXISTS `parametrostemperatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parametrostemperatura` (
  `codigo` int(6) NOT NULL AUTO_INCREMENT,
  `galpon` int(10) NOT NULL,
  `maximotem` int(10) NOT NULL,
  `minimotem` int(10) NOT NULL,
  `maximohum` int(10) NOT NULL,
  `idempresa` int(3) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `ptemp_empresa` (`idempresa`),
  CONSTRAINT `ptemp_empresa` FOREIGN KEY (`idempresa`) REFERENCES `maqv_tblempresa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametrostemperatura`
--

LOCK TABLES `parametrostemperatura` WRITE;
/*!40000 ALTER TABLE `parametrostemperatura` DISABLE KEYS */;
INSERT INTO `parametrostemperatura` VALUES (6,23,37,30,80,3),(7,26,15,10,77,3),(8,1,26,22,75,3),(9,4,24,21,80,3);
/*!40000 ALTER TABLE `parametrostemperatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros`
--

DROP TABLE IF EXISTS `registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha` date NOT NULL,
  `idgalpon` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `humedadgalpon` int(11) NOT NULL,
  `bebedero1` int(11) NOT NULL,
  `bebedero2` int(11) NOT NULL,
  `bebedero3` int(11) NOT NULL,
  `bebedero4` int(11) NOT NULL,
  `bomba1` int(11) NOT NULL,
  `bomba2` int(11) NOT NULL,
  `bomba3` int(11) NOT NULL,
  `bomba4` int(11) NOT NULL,
  `ventilador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros`
--

LOCK TABLES `registros` WRITE;
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
INSERT INTO `registros` VALUES (1,'2022-05-25 16:31:43','0000-00-00',23,34,34,1,0,0,0,1,0,0,0,1),(4,'2022-05-25 16:31:40','2022-05-11',23,34,34,1,0,0,0,1,0,0,0,1),(5,'2022-05-25 16:31:37','2022-05-12',23,34,34,1,0,0,0,1,0,0,0,1),(6,'2022-05-12 18:26:20','2022-05-12',2,34,34,1,1,1,1,1,1,1,1,1),(7,'2022-05-13 15:28:24','2022-05-13',2,34,37,1,1,1,1,1,1,1,1,1),(8,'2022-05-19 13:15:26','2022-05-19',2,34,34,1,1,1,1,1,1,1,1,1),(9,'2022-05-24 15:36:38','2022-05-24',2,34,34,1,1,1,1,1,1,1,1,1),(10,'2022-05-24 15:38:17','2022-05-24',2,20,65,3,2,1,1,1,1,1,1,1),(11,'2022-05-24 15:38:26','2022-05-24',2,20,65,3,2,1,1,1,1,1,1,1),(12,'2022-05-24 15:39:29','2022-05-24',2,34,34,1,1,1,1,1,1,1,1,1),(13,'2022-05-24 15:42:02','2022-05-24',2,34,34,1,1,1,1,1,1,1,1,1),(14,'2022-05-24 15:42:08','2022-05-24',2,34,34,1,1,1,1,1,1,1,1,1),(15,'2022-05-24 15:58:47','2022-05-24',1,21,75,3,2,1,1,1,1,1,1,1),(16,'2022-05-24 16:00:39','2022-05-24',2,34,34,1,1,1,1,1,1,1,1,1),(17,'2022-05-24 16:00:59','2022-05-24',1,22,65,1,1,1,1,1,1,1,1,1),(18,'2022-05-24 16:02:10','2022-05-24',1,21,75,3,2,1,1,1,1,1,1,1),(19,'2022-05-24 16:02:20','2022-05-24',1,21,75,3,2,1,1,1,1,1,1,1),(20,'2022-05-24 16:13:23','2022-05-24',1,21,75,3,2,1,1,1,1,1,1,1),(21,'2022-05-24 16:13:42','2022-05-24',1,21,75,3,2,1,1,1,1,1,1,1),(22,'2022-05-24 16:14:02','2022-05-24',1,21,75,3,2,1,1,1,1,1,1,1),(23,'2022-05-24 16:15:24','2022-05-24',1,0,0,1,2,1,1,1,1,1,1,1),(24,'2022-05-24 16:21:02','2022-05-24',1,19,62,1,2,1,1,1,1,1,1,1),(25,'2022-05-24 16:21:19','2022-05-24',1,19,62,1,2,1,1,1,1,1,1,1),(26,'2022-05-24 16:25:26','2022-05-24',1,19,63,0,2,1,1,1,1,1,1,1),(27,'2022-05-24 16:52:12','2022-05-24',2,34,34,1,1,1,1,1,1,1,1,1),(28,'2022-05-24 16:52:58','2022-05-24',2,30,75,1,1,1,1,1,1,1,1,1),(29,'2022-05-24 16:59:20','2022-05-24',1,21,55,1,2,1,1,1,1,1,1,1),(30,'2022-05-24 16:59:37','2022-05-24',1,21,55,1,2,1,1,1,1,1,1,1),(31,'2022-05-24 16:59:54','2022-05-24',1,21,55,1,2,1,1,1,1,1,1,1),(32,'2022-05-24 17:00:15','2022-05-24',1,21,55,1,2,1,1,1,1,1,1,1),(33,'2022-05-24 17:00:32','2022-05-24',1,21,55,0,2,1,1,1,1,1,1,1),(34,'2022-05-24 17:00:51','2022-05-24',1,21,54,0,2,1,1,1,1,1,1,1),(35,'2022-05-24 17:01:08','2022-05-24',1,21,54,1,2,1,1,1,1,1,1,1),(36,'2022-05-24 17:01:25','2022-05-24',1,21,55,1,2,1,1,1,1,1,1,1),(37,'2022-05-24 17:01:43','2022-05-24',1,23,55,1,2,1,1,1,1,1,1,1),(38,'2022-05-24 17:02:02','2022-05-24',1,29,57,1,2,1,1,1,1,1,1,1),(39,'2022-05-24 17:02:20','2022-05-24',1,34,54,1,2,1,1,1,1,1,1,1),(40,'2022-05-24 17:02:37','2022-05-24',1,39,50,1,2,1,1,1,1,1,1,1),(41,'2022-05-24 17:02:54','2022-05-24',1,38,46,1,2,1,1,1,1,1,1,1),(42,'2022-05-24 17:03:11','2022-05-24',1,37,43,1,2,1,1,1,1,1,1,1),(43,'2022-05-24 17:03:28','2022-05-24',1,36,41,1,2,1,1,1,1,1,1,1),(44,'2022-05-24 17:03:46','2022-05-24',1,34,38,1,2,1,1,1,1,1,1,1),(45,'2022-05-24 17:04:03','2022-05-24',1,32,39,1,2,1,1,1,1,1,1,1),(46,'2022-05-24 17:04:20','2022-05-24',1,30,38,0,2,1,1,1,1,1,1,1),(47,'2022-05-24 17:04:39','2022-05-24',1,29,39,0,2,1,1,1,1,1,1,1),(48,'2022-05-24 17:04:56','2022-05-24',1,28,40,0,2,1,1,1,1,1,1,1),(49,'2022-05-24 17:05:13','2022-05-24',1,28,41,0,2,1,1,1,1,1,1,1),(50,'2022-05-24 17:05:30','2022-05-24',1,27,41,0,2,1,1,1,1,1,1,1),(51,'2022-05-24 17:05:47','2022-05-24',1,26,43,0,2,1,1,1,1,1,1,1),(52,'2022-05-24 17:06:04','2022-05-24',1,26,44,0,2,1,1,1,1,1,1,1),(53,'2022-05-24 17:06:22','2022-05-24',1,25,44,0,2,1,1,1,1,1,1,1),(54,'2022-05-24 17:06:39','2022-05-24',1,25,45,0,2,1,1,1,1,1,1,1),(55,'2022-05-24 17:06:58','2022-05-24',1,25,45,0,2,1,1,1,1,1,1,1),(56,'2022-05-24 17:07:17','2022-05-24',1,25,48,0,2,1,1,1,1,1,1,1),(57,'2022-05-24 17:07:34','2022-05-24',1,24,47,0,2,1,1,1,1,1,1,1),(58,'2022-05-24 17:07:52','2022-05-24',1,24,47,0,2,1,1,1,1,1,1,1),(59,'2022-05-24 17:08:09','2022-05-24',1,24,48,0,2,1,1,1,1,1,1,1),(60,'2022-05-24 17:08:27','2022-05-24',1,24,48,0,2,1,1,1,1,1,1,1),(61,'2022-05-24 17:08:44','2022-05-24',1,23,49,0,2,1,1,1,1,1,1,1),(62,'2022-05-24 17:09:01','2022-05-24',1,23,49,0,2,1,1,1,1,1,1,1),(63,'2022-05-24 17:09:18','2022-05-24',1,23,50,0,2,1,1,1,1,1,1,1),(64,'2022-05-24 17:09:38','2022-05-24',1,23,50,0,2,1,1,1,1,1,1,1),(65,'2022-05-24 17:09:57','2022-05-24',1,23,51,0,2,1,1,1,1,1,1,1),(66,'2022-05-24 17:10:15','2022-05-24',1,22,52,0,2,1,1,1,1,1,1,1),(67,'2022-05-24 17:10:32','2022-05-24',1,22,52,0,2,1,1,1,1,1,1,1),(68,'2022-05-24 17:36:42','2022-05-24',1,21,56,0,2,1,1,1,1,1,1,1),(69,'2022-05-24 17:37:00','2022-05-24',1,21,56,0,2,1,1,1,1,1,1,1),(70,'2022-05-24 17:37:17','2022-05-24',1,21,56,0,2,1,1,1,1,1,1,1),(71,'2022-05-24 17:37:34','2022-05-24',1,21,56,0,2,1,1,1,1,1,1,1),(72,'2022-05-24 17:37:51','2022-05-24',1,22,56,0,2,1,1,1,1,1,1,1),(73,'2022-05-24 17:38:08','2022-05-24',1,22,55,0,2,1,1,1,1,1,1,1),(74,'2022-05-24 17:38:48','2022-05-24',1,22,56,0,2,1,1,1,1,1,1,1),(75,'2022-05-24 17:39:05','2022-05-24',1,22,55,1,2,1,1,1,1,1,1,1),(76,'2022-05-24 17:39:22','2022-05-24',1,22,55,1,2,1,1,1,1,1,1,1),(77,'2022-05-24 17:39:39','2022-05-24',1,22,55,1,2,1,1,1,1,1,1,1),(78,'2022-05-24 17:39:57','2022-05-24',1,22,55,1,2,1,1,1,1,1,1,1),(79,'2022-05-24 17:40:14','2022-05-24',1,22,54,1,2,1,1,1,1,1,1,1),(80,'2022-05-24 17:40:31','2022-05-24',1,22,55,1,2,1,1,1,1,1,1,1),(81,'2022-05-24 17:40:48','2022-05-24',1,22,54,1,2,1,1,1,1,1,1,1),(82,'2022-05-24 17:41:05','2022-05-24',1,22,54,1,2,1,1,1,1,1,1,1),(83,'2022-05-24 17:41:23','2022-05-24',1,22,54,1,2,1,1,1,1,1,1,1),(84,'2022-05-24 17:41:40','2022-05-24',1,22,54,1,2,1,1,1,1,1,1,1),(85,'2022-05-24 17:41:57','2022-05-24',1,22,53,1,2,1,1,1,1,1,1,1),(86,'2022-05-24 17:42:14','2022-05-24',1,22,53,1,2,1,1,1,1,1,1,1),(87,'2022-05-24 17:42:31','2022-05-24',1,22,53,1,2,1,1,1,1,1,1,1),(88,'2022-05-24 18:05:59','2022-05-24',1,20,59,1,2,1,1,1,1,1,1,1),(89,'2022-05-24 18:06:42','2022-05-24',1,20,57,1,2,1,1,1,1,1,1,1),(90,'2022-05-24 18:07:30','2022-05-24',1,20,58,0,2,1,1,1,1,1,1,1),(91,'2022-05-24 18:07:47','2022-05-24',1,20,57,0,2,1,1,1,1,1,1,1),(92,'2022-05-24 18:08:04','2022-05-24',1,20,58,0,2,1,1,1,1,1,1,1),(93,'2022-05-24 18:08:21','2022-05-24',1,20,58,0,2,1,1,1,1,1,1,1),(94,'2022-05-24 18:09:31','2022-05-24',1,20,57,0,2,1,1,1,1,1,1,1),(95,'2022-05-24 18:11:37','2022-05-24',1,20,60,0,2,1,1,1,1,1,1,1),(96,'2022-05-24 18:11:55','2022-05-24',1,20,59,0,2,1,1,1,1,1,1,1),(97,'2022-05-24 18:12:13','2022-05-24',1,20,58,0,2,1,1,1,1,1,1,1),(98,'2022-05-24 18:12:30','2022-05-24',1,20,58,0,2,1,1,1,1,1,1,1),(99,'2022-05-25 15:46:12','2022-05-25',2,34,34,1,1,1,1,1,1,1,1,1),(100,'2022-05-25 15:46:12','2022-05-25',2,34,34,1,1,1,1,1,1,1,1,1),(101,'2022-05-25 16:34:58','2022-05-25',2,34,34,1,1,1,1,1,1,1,1,1),(102,'2022-05-25 16:37:00','2022-05-25',23,36,23,1,1,1,1,1,1,1,1,1),(103,'2022-06-03 22:09:04','2022-06-03',23,34,34,1,1,1,1,1,1,1,1,1),(104,'2022-06-03 22:15:24','2022-06-03',23,34,34,1,1,1,1,1,1,1,1,1),(105,'2022-06-03 22:16:17','2022-06-03',23,34,34,1,1,1,1,1,1,1,1,1),(106,'2022-06-03 22:31:46','2022-06-03',23,34,34,1,1,1,1,1,1,1,1,1),(107,'2022-06-03 22:32:55','2022-06-03',23,34,34,1,1,1,1,1,1,1,1,1),(108,'2022-06-03 22:35:22','2022-06-03',26,22,70,1,1,1,1,1,1,1,1,1),(109,'2022-06-03 22:39:41','2022-06-03',50,10,50,1,1,1,1,1,1,1,1,1),(110,'2022-06-03 22:43:41','2022-06-03',23,34,34,1,0,1,1,1,1,1,1,0),(111,'2022-06-04 01:14:23','2022-06-03',23,34,34,1,1,1,1,1,1,1,1,1),(112,'2022-06-04 01:15:55','2022-06-03',23,34,80,1,1,1,1,1,1,1,1,1),(113,'2022-06-04 01:18:57','2022-06-03',24,34,80,0,1,1,1,1,1,1,1,1),(114,'2022-06-04 01:28:58','2022-06-03',22,80,24,1,0,1,1,1,1,1,1,2),(115,'2022-06-04 01:32:06','2022-06-03',4,34,80,1,1,1,1,1,1,1,1,1),(116,'2022-06-04 01:37:22','2022-06-03',4,22,34,1,1,0,1,1,1,1,1,1),(117,'2022-06-04 01:40:04','2022-06-03',4,34,24,1,1,1,1,1,1,1,1,1),(118,'2022-06-04 01:41:27','2022-06-03',4,34,80,1,1,0,1,1,1,1,1,1),(119,'2022-06-04 01:42:11','2022-06-03',4,24,80,1,1,0,1,1,1,1,1,1),(120,'2022-06-04 01:49:57','2022-06-03',4,24,80,1,1,0,1,0,0,1,0,1),(121,'2022-06-04 02:14:17','2022-06-03',5,24,80,1,1,0,1,1,1,1,1,1),(122,'2022-06-04 02:17:23','2022-06-03',5,22,80,1,1,0,1,1,1,1,1,1),(123,'2022-06-04 02:29:17','2022-06-03',6,24,82,1,1,0,1,1,1,1,1,1),(124,'2022-06-08 16:04:40','2022-06-08',23,34,34,1,1,1,1,1,1,1,1,1),(125,'2022-06-09 16:51:14','2022-06-09',23,34,74,1,1,1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldistribucion`
--

DROP TABLE IF EXISTS `tbldistribucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbldistribucion` (
  `id_distri` int(11) NOT NULL AUTO_INCREMENT,
  `id_articulo` int(11) NOT NULL,
  `id_subzonas` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_distri`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldistribucion`
--

LOCK TABLES `tbldistribucion` WRITE;
/*!40000 ALTER TABLE `tbldistribucion` DISABLE KEYS */;
INSERT INTO `tbldistribucion` VALUES (1,7,23,1),(2,5,23,1),(3,5,26,12),(4,5,26,12),(5,7,26,1),(6,5,23,5),(7,5,23,2),(8,5,5,2),(9,5,23,1);
/*!40000 ALTER TABLE `tbldistribucion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-10 12:39:20
