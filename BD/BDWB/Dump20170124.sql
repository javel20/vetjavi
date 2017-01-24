-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: vet
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
-- Table structure for table `analisis`
--

DROP TABLE IF EXISTS `analisis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analisis` (
  `IdAnalisis` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` int(11) NOT NULL,
  `NombreA` varchar(45) NOT NULL,
  `FechaA` varchar(45) NOT NULL,
  `PrecioAnalisis` double NOT NULL,
  `PorcentajeA` varchar(45) NOT NULL,
  `Descripcion` longtext,
  PRIMARY KEY (`IdAnalisis`),
  UNIQUE KEY `Codigo_UNIQUE` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisis`
--

LOCK TABLES `analisis` WRITE;
/*!40000 ALTER TABLE `analisis` DISABLE KEYS */;
INSERT INTO `analisis` VALUES (3,1111,'asd','2017-01-13',34,'34','wfef');
/*!40000 ALTER TABLE `analisis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cirugia`
--

DROP TABLE IF EXISTS `cirugia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cirugia` (
  `IdCirugia` int(11) NOT NULL AUTO_INCREMENT,
  `NombreC` varchar(45) NOT NULL,
  `PrecioC` double NOT NULL,
  `PorcentajeC` double NOT NULL,
  `DescripcionC` longtext,
  PRIMARY KEY (`IdCirugia`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cirugia`
--

LOCK TABLES `cirugia` WRITE;
/*!40000 ALTER TABLE `cirugia` DISABLE KEYS */;
INSERT INTO `cirugia` VALUES (13,'castracion',40,10,'asdfsdfsdf'),(14,'Tumor',56,23,'sdsadf'),(15,'Cola',43,43,'df');
/*!40000 ALTER TABLE `cirugia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoC` varchar(45) NOT NULL,
  `FechaReserva` varchar(45) NOT NULL,
  `FechaRegistro` datetime DEFAULT CURRENT_TIMESTAMP,
  `HoraC` varchar(45) NOT NULL,
  `Peso` varchar(45) NOT NULL,
  `FrecuenciaCardiaca` varchar(45) NOT NULL,
  `FrecuenciaRespiratoria` varchar(45) NOT NULL,
  `Descripcion` longtext,
  `PrecioTotal` double DEFAULT NULL,
  `IdPaciente` int(11) NOT NULL,
  `IdTipoCita` int(11) DEFAULT NULL,
  `Estado` varchar(50) NOT NULL,
  `IdCirugia` int(11) DEFAULT NULL,
  `IdAnalisis` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCita`),
  UNIQUE KEY `CodigoC_UNIQUE` (`CodigoC`),
  KEY `fk_Cita_Paciente1_idx` (`IdPaciente`),
  KEY `fk_Cita_TipoCita1_idx` (`IdTipoCita`),
  KEY `fk_cita_cirujias1_idx` (`IdCirugia`),
  KEY `fk_cita_analisis1_idx` (`IdAnalisis`),
  CONSTRAINT `fk_Cita_Paciente1` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_TipoCita1` FOREIGN KEY (`IdTipoCita`) REFERENCES `tipocita` (`IdTipoCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_analisis1` FOREIGN KEY (`IdAnalisis`) REFERENCES `analisis` (`IdAnalisis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_cirujias1` FOREIGN KEY (`IdCirugia`) REFERENCES `cirugia` (`IdCirugia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES (83,'1111','2017-01-12','2017-01-20 21:35:16','9:00 AM','34','45','45','wsefsdf',44,1,NULL,'1',13,NULL),(84,'2222','2017-18-01','2017-01-20 21:35:33','9:20 AM','43','54','45','wefwef',52,1,6,'1',NULL,NULL),(85,'4444','2017-01-25','2017-01-20 22:09:35','11:00 AM','34','43','43','3tregerg',61.489999999999995,2,NULL,'1',15,NULL),(86,'5555','2017-01-25','2017-01-21 01:20:59','9:00 AM','243','434','32','dsfsdfdf',45.56,1,NULL,'1',NULL,NULL),(87,'788888','2017-01-12','2017-01-21 01:27:57','9:00 AM','76','87','98','',45.56,2,NULL,'1',NULL,NULL),(89,'3333','2017-01-21','2017-01-21 01:59:51','9:00 AM','32','34','43','fgdfgd',52,1,NULL,'1',14,NULL),(90,'435435','2017-01-26','2017-01-21 02:00:58','9:00 AM','32','2342323','35','23',45.56,1,NULL,'1',NULL,3),(91,'567567','2017-01-19','2017-01-21 02:01:35','9:00 AM','24','43','53','sdfsdf',44,2,7,'1',NULL,NULL),(92,'35453454','2017-01-11','2017-01-21 02:21:47','9:00 AM','32','54','5','ewfergerg',45.56,2,NULL,'1',NULL,3),(93,'12121212','2017-01-18','2017-01-21 03:15:31','9:00 AM','43','456','43','65',45.56,1,NULL,'1',NULL,3),(94,'','2017-01-12','2017-01-22 12:17:21','9:00 AM','45','65','67','34',44,4,7,'1',NULL,NULL),(95,'4354544554','2017-01-18','2017-01-22 12:18:40','9:00 AM','23','43','45','eqrgwrg',44,2,7,'1',NULL,NULL);
/*!40000 ALTER TABLE `cita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `IdCliente` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(45) DEFAULT NULL,
  `RUC` varchar(45) DEFAULT NULL,
  `Nombre` varchar(45) NOT NULL,
  `ApePat` varchar(45) NOT NULL,
  `ApeMat` varchar(45) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Celular` varchar(45) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'345345','','dany','asoidj','adfoij','werwer','egerg','45345','345345',1),(2,'4564','','rtyrty','rtyrty','rtyrtyrt','rtyr','yrtyrty','546456','456456',1),(3,'456456','','reg','regdfgf','gfgfhf','yhty','ytut','657567','657567',1),(4,'476576','','tyjygj','jyukyukyu','kukyuk','tyjutyu','ytyuk','657','65757',1),(5,'4546','','qweqweqwe','qweqweqwe','wqeqwe','ewwer','ewrwer','4534','4353',1),(6,'345344','','efwe','fdfsdf','sdfsdfd','retre','retert','43534','43534',1),(7,'456654','','df','gfdgdfg','dfgfg','trrty','try','43','445',1),(8,'35345','','gtrrtg','retert','rtert','egg','rtgrth','4323','4232',1),(9,'5466756','','trty','jtyjtgert','rewrwe','ytyj','tyutyuy','45656','567',1),(10,'675675','','ty','ytjytjy','jtyjtyj','fhft','hthjtj','4543','45456',1),(11,'45658768','','gtrt','rthrthrth','rthrthrt','hjkhk','hgjkghjk','4345756','657657',1),(12,'546456','','dfsdf','dfsdfsdf','dgdfg','rgeg','dfgdfg','657567','657567',1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `IdCompra` int(11) NOT NULL AUTO_INCREMENT,
  `CodC` int(11) NOT NULL,
  `Fecha` varchar(45) NOT NULL,
  `TipoC` varchar(45) NOT NULL,
  `Descripcion` longtext NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `IdProveedor` int(11) NOT NULL,
  `IdTrabajador` int(11) NOT NULL,
  PRIMARY KEY (`IdCompra`),
  UNIQUE KEY `CodC_UNIQUE` (`CodC`),
  KEY `fk_Compra_Proveedor1_idx` (`IdProveedor`),
  KEY `fk_compra_trabajador1_idx` (`IdTrabajador`),
  CONSTRAINT `fk_Compra_Proveedor1` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_trabajador1` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajador` (`IdTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,34535,'2017-12-01','Factura','rfggf','Compra Realizada',6,1),(2,4325,'2017-18-01','Factura','greg','Compra Realizada',1,1),(3,235345,'2017-11-01','Factura','rthrth','Compra Realizada',3,1),(4,345345,'2017-17-01','Factura','erg','Compra Realizada',3,1),(6,4235546,'2017-17-01','Factura','sdfvdsfv','Compra Realizada',2,1),(7,234245345,'2017-20-01','Factura','fdvdfg','Compra Realizada',3,1),(8,34545,'2017-24-01','Factura','gerg','Compra Realizada',3,1),(9,235435,'2017-18-01','Factura','gdb','Compra Realizada',3,1),(10,567567,'2017-25-01','Factura','sv','Compra Realizada',3,1),(11,212123,'2017-24-01','Factura','dsfcdf','Compra Realizada',4,1),(12,345345435,'2017-12-01','Factura','ergerg','Compra Realizada',5,1);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallecompraproducto`
--

DROP TABLE IF EXISTS `detallecompraproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallecompraproducto` (
  `IdCompra` int(11) NOT NULL,
  `FechaVen` varchar(45) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioUnitario` double NOT NULL,
  `IdStockPresen` int(11) NOT NULL,
  PRIMARY KEY (`IdCompra`,`IdStockPresen`),
  KEY `fk_Compra_has_Producto_Compra1_idx` (`IdCompra`),
  KEY `fk_detallecompraproducto_stockpresentacion1_idx` (`IdStockPresen`),
  CONSTRAINT `fk_Compra_has_Producto_Compra1` FOREIGN KEY (`IdCompra`) REFERENCES `compra` (`IdCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallecompraproducto_stockpresentacion1` FOREIGN KEY (`IdStockPresen`) REFERENCES `stockpresentacion` (`IdStockPresen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecompraproducto`
--

LOCK TABLES `detallecompraproducto` WRITE;
/*!40000 ALTER TABLE `detallecompraproducto` DISABLE KEYS */;
INSERT INTO `detallecompraproducto` VALUES (1,'01/19/2017',1,1.5,1),(2,'01/26/2017',1,1.5,1),(3,'01/24/2017',1,1.5,1),(4,'01/26/2017',2,1.5,1),(6,'01/20/2017',5,1.5,1),(7,'01/25/2017',5,1.5,1),(8,'01/23/2017',5,1.5,1),(9,'01/19/2017',5,1.5,1),(10,'01/18/2017',5,1.5,1),(11,'01/18/2017',5,1.5,1),(12,'01/25/2017',5,1.5,1);
/*!40000 ALTER TABLE `detallecompraproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallepermisos`
--

DROP TABLE IF EXISTS `detallepermisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallepermisos` (
  `IdTrabajador` int(11) NOT NULL,
  `IdPermisos` int(11) NOT NULL,
  PRIMARY KEY (`IdTrabajador`,`IdPermisos`),
  KEY `fk_trabajador_has_permisos_permisos1_idx` (`IdPermisos`),
  KEY `fk_trabajador_has_permisos_trabajador1_idx` (`IdTrabajador`),
  CONSTRAINT `fk_trabajador_has_permisos_permisos1` FOREIGN KEY (`IdPermisos`) REFERENCES `permisos` (`IdPermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajador_has_permisos_trabajador1` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajador` (`IdTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallepermisos`
--

LOCK TABLES `detallepermisos` WRITE;
/*!40000 ALTER TABLE `detallepermisos` DISABLE KEYS */;
INSERT INTO `detallepermisos` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(2,4),(2,5),(3,4),(3,5),(4,2),(4,3),(5,3),(5,14),(6,3),(6,5),(7,6),(7,15),(8,4),(8,11),(9,3),(9,6),(9,15),(10,3),(10,4),(10,5),(11,3),(11,5),(12,5);
/*!40000 ALTER TABLE `detallepermisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventaproducto`
--

DROP TABLE IF EXISTS `detalleventaproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventaproducto` (
  `IdVenta` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioTotal` double NOT NULL,
  `IdStockPresen` int(11) NOT NULL,
  PRIMARY KEY (`IdVenta`,`IdStockPresen`),
  KEY `fk_Venta_has_Producto_Venta1_idx` (`IdVenta`),
  KEY `fk_detalleventaproducto_stockpresentacion1_idx` (`IdStockPresen`),
  CONSTRAINT `fk_Venta_has_Producto_Venta1` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleventaproducto_stockpresentacion1` FOREIGN KEY (`IdStockPresen`) REFERENCES `stockpresentacion` (`IdStockPresen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventaproducto`
--

LOCK TABLES `detalleventaproducto` WRITE;
/*!40000 ALTER TABLE `detalleventaproducto` DISABLE KEYS */;
INSERT INTO `detalleventaproducto` VALUES (1,10,2.1,1),(2,10,2.1,1),(3,2,120,3),(4,10,2.1,1),(5,1,120,3),(6,10,2.1,1),(7,10,2.1,1),(8,10,2.1,1),(9,10,2.1,1),(10,10,2.1,1),(11,10,2.1,1),(12,10,2.1,1),(13,10,2.1,1);
/*!40000 ALTER TABLE `detalleventaproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnostico`
--

DROP TABLE IF EXISTS `diagnostico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnostico` (
  `IdDiagnostico` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoD` int(11) NOT NULL,
  `Descripcion` longtext,
  `IdCita` int(11) NOT NULL,
  PRIMARY KEY (`IdDiagnostico`),
  UNIQUE KEY `CodigoD_UNIQUE` (`CodigoD`),
  KEY `fk_Diagnostico_Cita1_idx` (`IdCita`),
  CONSTRAINT `fk_Diagnostico_Cita1` FOREIGN KEY (`IdCita`) REFERENCES `cita` (`IdCita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnostico`
--

LOCK TABLES `diagnostico` WRITE;
/*!40000 ALTER TABLE `diagnostico` DISABLE KEYS */;
/*!40000 ALTER TABLE `diagnostico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `IdLocal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`IdLocal`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,'Amigo del Criador','junin','3425','Habilitado'),(2,'grer','gewfwef','4343','Habilitado'),(3,'ergerg','gergreg','435345','Habilitado'),(4,'ergergerg','rtgrth','4335','Habilitado'),(5,'ergergreg','ergreg','456546','Habilitado'),(6,'egreg','ergreg','453645','Habilitado'),(7,'rthrthrth','erergreg','54646','Habilitado'),(8,'ergrwg','rtrth','34546','Habilitado'),(9,'rthrth','rgrtg','4546','Habilitado'),(10,'trhgrthrth','ergerg','43353','Habilitado'),(11,'ferwfer','gfre','3454','Habilitado');
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `IdPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Raza` varchar(45) NOT NULL,
  `FechaNac` varchar(45) NOT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Descripcion` longtext,
  `IdCliente` int(11) NOT NULL,
  `Sexo` varchar(45) NOT NULL,
  PRIMARY KEY (`IdPaciente`),
  KEY `fk_Paciente_Cliente1_idx` (`IdCliente`),
  CONSTRAINT `fk_Paciente_Cliente1` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'drago','pitbull','2017-12-01','black','efwfe',1,'Macho'),(2,'egergrg','egre','2017-10-01','gfr','ergf',4,'Macho'),(3,'edgehg','reggr','2017-18-01','ergre','34rereg',5,'Hembra'),(4,'wergerg','rgreg','2017-10-01','gerger','errreh',4,'Hembra'),(5,'wergergreg','gregr','2017-20-01','grergre','Gregergerg',5,'Hembra'),(6,'ergergreg','ergerg','2017-26-01','reger','Gregreg',3,'Hembra'),(7,'rgerg','sdfcsdv','2017-17-01','rgreg','regreg',10,'Hembra'),(8,'ergerg','rgerg','2017-17-01','ergerg','ergregreg',10,'Macho'),(9,'wgwegweg','regeg','2017-17-01','rgreg','regreg',12,'Macho'),(10,'rgerg','rgreg','2017-11-01','rgreg','grregeg',5,'Macho'),(11,'htgrthtr','hthrth','2017-03-01','rtht','trhrth',10,'Hembra');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `IdPermisos` int(11) NOT NULL AUTO_INCREMENT,
  `NombreP` varchar(45) NOT NULL,
  PRIMARY KEY (`IdPermisos`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'analisis'),(2,'cita'),(3,'cliente'),(4,'compra'),(5,'diagnostico'),(6,'local'),(7,'paciente'),(8,'producto'),(9,'proveedor'),(10,'reportes'),(11,'stockpresen'),(12,'tipocita'),(13,'tipoproducto'),(14,'tipotrab'),(15,'trabajador'),(16,'venta'),(17,'Cirugia');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` longtext,
  `IdTipoProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `fk_producto_tipoproducto1_idx` (`IdTipoProducto`),
  CONSTRAINT `fk_producto_tipoproducto1` FOREIGN KEY (`IdTipoProducto`) REFERENCES `tipoproducto` (`IdTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Amoxil','sdfj',1),(2,'Pechera','sdfsdf',2),(3,'wdfefwef','efwef',2),(4,'ergerg','eggr',1),(5,'regerreg','regerg',2),(6,'gregerg','regerg',1),(7,'gfegrege','rgregreg',1),(8,'regregreg','ergregeg',2),(9,'ghttrh','trhtrhrt',1),(10,'ergerg','rhrthtrh',1),(11,'Regreg','rhreh',2),(12,'regreg','345',2),(13,'wgwegweg','efwwef',2);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Numero` varchar(45) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `ApeMat` varchar(45) DEFAULT NULL,
  `ApePat` varchar(45) NOT NULL,
  `Empresa` varchar(45) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'weff','reg','3453','sdf@gmail.com','reg','sdf','sdv',1),(2,'wefsdf','fdgdfg','345','fdgv@gmail.com','gdfg','fgdg','wef',1),(3,'trhrth','gerreg','345','sdf@gmail.com','weer','regwe','wefr',1),(4,'refeg','reg','3435','dfgdf@gmail.com','greg','regre','wergreg',1),(5,'fdvfdvd','rthrth','4545','sdf@gmail.com','trhrth','rthjt','dcfsdf',1),(6,'tnythtr','hth','1243','sdf@gmial.com','ewfwef','htrh','reg',1),(7,'dfbfdb','fgbgfb','243546456','sadsf@gmail.com','bfgbgfb','bfgbfg','sdcs',1),(8,'hgmhjmjh','mjhm','43656','sdcd@gmail.com','mhjmhjmjh','mhjmhjmhj','wfwf',1),(9,'dsfsdf','dasd','345','g@gmail.com','asdas','sdfasd','sdfsd',1),(10,'sdcds','csdcsdc','4534','skdfjsd@gmail.com','csdcsd','dcsdcsd','sdfsdfcv',1),(11,'sdfvas','ergreg','6757','sdfsdf@gmail.com','yuiyuiyu','fhjgjytj','thht',1);
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stockpresentacion`
--

DROP TABLE IF EXISTS `stockpresentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockpresentacion` (
  `IdStockPresen` int(11) NOT NULL AUTO_INCREMENT,
  `StockMin` varchar(45) NOT NULL,
  `StockReal` varchar(45) NOT NULL,
  `Presentacion` varchar(45) NOT NULL,
  `Precio` double NOT NULL,
  `IdProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdStockPresen`),
  KEY `fk_StockPresentacion_Producto1_idx` (`IdProducto`),
  CONSTRAINT `fk_StockPresentacion_Producto1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockpresentacion`
--

LOCK TABLES `stockpresentacion` WRITE;
/*!40000 ALTER TABLE `stockpresentacion` DISABLE KEYS */;
INSERT INTO `stockpresentacion` VALUES (1,'20','30','250mg',1.5,1),(2,'30','500','500mg',2.5,1),(3,'5','7','Small',40,2),(4,'34','45','gtrrth',45,3),(5,'45','56','56',56,7),(6,'45','54','65',65,9),(7,'24','23','23',456,7),(8,'45','67','67',87,5),(9,'67','8','98',23,5),(10,'65','67','67',32,2),(11,'43','45','45',54,9);
/*!40000 ALTER TABLE `stockpresentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocita`
--

DROP TABLE IF EXISTS `tipocita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipocita` (
  `IdTipoCita` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTC` varchar(45) NOT NULL,
  `PorcentajeTC` double NOT NULL,
  `PrecioTC` double NOT NULL,
  `DescripcionTC` longtext,
  PRIMARY KEY (`IdTipoCita`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocita`
--

LOCK TABLES `tipocita` WRITE;
/*!40000 ALTER TABLE `tipocita` DISABLE KEYS */;
INSERT INTO `tipocita` VALUES (6,'Consulta',30,40,'askdasjd'),(7,'Spa',10,40,'aasdas'),(8,'fgrg',65,54,'rwht'),(9,'rthtrh',53,45,'htrh'),(10,'erer',54,433,'45'),(11,'eg',57,5,'57'),(12,'dgrth',64,34,'23'),(13,'dfgdfg',123,35,'53'),(14,'ergerg',23,65,'ergrth'),(15,'trhrthtrh',54,5,'46'),(16,'rbhrth',5,32,'54');
/*!40000 ALTER TABLE `tipocita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoproducto` (
  `IdTipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipoP` varchar(45) NOT NULL,
  `Porcentaje` double NOT NULL,
  `Descripcion` longtext,
  PRIMARY KEY (`IdTipoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
INSERT INTO `tipoproducto` VALUES (1,'Medicina',40,'asd'),(2,'Ropa',200,'asd'),(3,'wefwef',43,'ergergerg'),(4,'ergerhg',3435,'45'),(5,'rtgtrhg',45,'45'),(6,'ergreg',46,'rthrth'),(7,'rthrth',4554,''),(8,'ergerg',342,''),(9,'regregre',45,'fdgdfg'),(10,'ergrth',4546,'yj{{'),(11,'rwegerg',4664,'fdgdfg');
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipotrab`
--

DROP TABLE IF EXISTS `tipotrab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipotrab` (
  `IdTipoTrab` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTipoTrab`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipotrab`
--

LOCK TABLES `tipotrab` WRITE;
/*!40000 ALTER TABLE `tipotrab` DISABLE KEYS */;
INSERT INTO `tipotrab` VALUES (1,'Administrador'),(2,'wegweg'),(3,'erhgreg'),(4,'Gthtrh'),(5,'rgthyt'),(6,'wefwff'),(7,'sdsdf'),(8,'ewewe'),(9,'ewferwg'),(10,'rgehgerhg'),(11,'htrhtrh');
/*!40000 ALTER TABLE `tipotrab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador` (
  `IdTrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `ApePat` varchar(45) NOT NULL,
  `ApeMat` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `IdTipoTrab` int(11) NOT NULL,
  `IdLocal` int(11) NOT NULL,
  PRIMARY KEY (`IdTrabajador`),
  KEY `fk_Trabajador_TipoTrab1_idx` (`IdTipoTrab`),
  KEY `fk_trabajador_local1_idx` (`IdLocal`),
  CONSTRAINT `fk_Trabajador_TipoTrab1` FOREIGN KEY (`IdTipoTrab`) REFERENCES `tipotrab` (`IdTipoTrab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajador_local1` FOREIGN KEY (`IdLocal`) REFERENCES `local` (`IdLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (1,'javier','elias','balla','kudf','56456','javier@gmail.com','73896ff3ff9868ebfab8fd706705260e',1,1),(2,'wefeg','reg','rgg','rgr','4354','fgdfg@gmail.com','ab02fceb9689114b1cd1844e456c0695',3,4),(3,'qrewrwe','retert','retertret','ergeg','35','5dfgd@gmail.com','001d1db354b2db4f472542cf5a0206ad',3,4),(4,'rthrth','trhrth','trhrth','reteg','4646','fgfdg@gmail.com','fc0e462d9c75371913e7efe296f00c3d',4,4),(5,'yhtyh','tyjytjytj','ytjtyjytj','gerg','465','fdfdb@gmail.com','1b556ac91b7f97a10514d7ec02cae15a',9,4),(6,'rhthrht','trhrth','rhthrth','reerter','5444','wef@gmail.com','d32d1e3361be51958bbe09fb79acf307',9,5),(7,'rtth','rthrth','rthtrhrth','trhrth','456','trtrh@gmail.com','5c6b186b991b4a946dd10edf2a654a15',4,4),(8,'Administrador','regerg','htyh','regreg','545','wg@gskdj.com','71b6c3d7d87516cfdbe2b8bcdbc03ccc',4,5),(9,'rhgrth','trhtr','htrhrth','hthrt','5454','fdgbdf@gmail.com','9e4864d02e3d64ac830942ec902bdf11',11,5),(10,'tyhtyh','yhtyhtyhjt','yjytjtyj','efsdf','432546','tgfg@gmail.com','7ac50d0a3e5cc9328110662783cba894',10,5),(11,'trhgrthrt','wfwefwegf','ythtyh','rtgrrtgh','2334','asfoif@gmail.coim','d332bdd337babed08612470ea4aeff34',4,4),(12,'thrthrth','rthtrh','rthtrhtrh','trhrthtrh','4354','asd@gmail.com','beefd93bbd01280479f8efd60c0511ef',6,10);
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `CodV` varchar(45) NOT NULL,
  `Fecha` varchar(45) NOT NULL,
  `TipoV` varchar(45) NOT NULL,
  `Descripcion` longtext NOT NULL,
  `PrecioTotalVenta` double NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdTrabajador` int(11) NOT NULL,
  PRIMARY KEY (`IdVenta`),
  UNIQUE KEY `CodV_UNIQUE` (`CodV`),
  KEY `fk_Venta_Cliente_idx` (`IdCliente`),
  KEY `fk_Venta_Trabajador1_idx` (`IdTrabajador`),
  CONSTRAINT `fk_Venta_Cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Trabajador1` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajador` (`IdTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,'111','2017-12-01','Factura','erwef',21,'Venta Realizada',1,1),(2,'33343','2017-18-01','Factura','fdf',21,'Venta Realizada',2,1),(3,'34543653','2017-18-01','Factura','ERFER',240,'Venta Realizada',1,1),(4,'4365345','2017-10-01','Factura','rtgrtg',21,'Venta Realizada',4,1),(5,'546456546','2017-27-01','Factura','ewfwfe',120,'Venta Realizada',1,1),(6,'435345','2017-27-01','Factura','regerg',21,'Venta Realizada',4,1),(7,'23534','2017-25-01','Factura','fdgg',21,'Venta Realizada',1,1),(8,'5456','2017-26-01','Factura','gfhfdhfh',21,'Venta Realizada',4,1),(9,'43546456','2017-26-01','Factura','rtherht',21,'Venta Realizada',4,1),(10,'34345345','2017-20-01','Factura','sdfsdf',21,'Venta Realizada',5,1),(11,'54656','2017-18-01','Factura','sdfsfe',21,'Venta Realizada',2,1),(12,'4565','2017-01-26','Factura','trhytj',21,'Venta Realizada',1,1),(13,'345345','2017-01-19','Factura','regreg',21,'Venta Realizada',4,1);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-24 13:33:57
