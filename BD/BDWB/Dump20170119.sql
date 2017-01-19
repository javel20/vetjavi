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
  `Tipo` varchar(45) NOT NULL,
  `Descripcion` longtext,
  `PrecioAnalisis` double NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  PRIMARY KEY (`IdAnalisis`),
  UNIQUE KEY `Codigo_UNIQUE` (`Codigo`),
  KEY `fk_Analisis_Paciente1_idx` (`IdPaciente`),
  CONSTRAINT `fk_Analisis_Paciente1` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisis`
--

LOCK TABLES `analisis` WRITE;
/*!40000 ALTER TABLE `analisis` DISABLE KEYS */;
INSERT INTO `analisis` VALUES (1,56,'Perfil Hepático','fgdfb',56,1),(2,1111,'Urianálisis','ergergerg',23,1),(3,2222,'Perfil Renal','',32,1),(4,3333,'Perfil Renal','455',34,1),(5,4444,'Perfil Hepático','34',34,1),(6,5555,'Perfil Renal','tfhrtd',45,1),(7,6666,'Perfil Completo','rthtr',56,1),(8,7777,'Perfil Renal','tjtj',78,1),(9,8888,'Perfil Renal','4ft',78,1),(10,9999,'Perfil Hepático','yukytuk',86978,1),(11,676878,'Perfil Renal','kghk',78,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cirugia`
--

LOCK TABLES `cirugia` WRITE;
/*!40000 ALTER TABLE `cirugia` DISABLE KEYS */;
INSERT INTO `cirugia` VALUES (2,'qweqw',45,4545,'fergf'),(3,'castracion',100,20,'sdfsdf');
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
  `Peso` varchar(45) NOT NULL,
  `FrecuenciaCardiaca` varchar(45) NOT NULL,
  `FrecuenciaRespiratoria` varchar(45) NOT NULL,
  `Descripcion` longtext,
  `PrecioTotal` double DEFAULT NULL,
  `IdPaciente` int(11) NOT NULL,
  `IdTipoCita` int(11) DEFAULT NULL,
  `Estado` varchar(50) NOT NULL,
  `IdCirugia` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCita`),
  UNIQUE KEY `CodigoC_UNIQUE` (`CodigoC`),
  KEY `fk_Cita_Paciente1_idx` (`IdPaciente`),
  KEY `fk_Cita_TipoCita1_idx` (`IdTipoCita`),
  KEY `fk_cita_cirujias1_idx` (`IdCirugia`),
  CONSTRAINT `fk_Cita_Paciente1` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_TipoCita1` FOREIGN KEY (`IdTipoCita`) REFERENCES `tipocita` (`IdTipoCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_cirujias1` FOREIGN KEY (`IdCirugia`) REFERENCES `cirugia` (`IdCirugia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
INSERT INTO `cita` VALUES (58,'2336554','2017-17-01','2017-01-15 15:16:24','23','23423','23','23',0,1,6,'1',NULL),(59,'4353','2017-19-01','2017-01-15 15:19:24','456','45','45','54',0,1,6,'1',NULL),(65,'1111','2017-12-01','2017-01-16 10:36:40','45','5435','54','45',0,1,NULL,'1',3),(66,'2222','2017-04-01','2017-01-16 10:37:22','45','456','65','65',0,1,NULL,'1',3),(67,'657567','2017-05-01','2017-01-16 10:45:07','65','56','56','jgj',120,1,NULL,'1',3),(68,'3422354','2017-18-01','2017-01-18 18:05:05','34','45','56','fsdf',52,1,6,'1',NULL),(69,'435','2017-19-01','2017-01-18 18:51:50','45','45','45','RETGRHT',44,1,7,'1',NULL),(70,'3454365','2017-19-01','2017-01-18 21:27:56','56','56','56','67',52,1,6,'1',NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
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
INSERT INTO `detallepermisos` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17);
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
INSERT INTO `detalleventaproducto` VALUES (1,10,2.1,1),(2,10,2.1,1),(3,2,120,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,'Amigo del Criador','junin','3425','Habilitado');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (1,'drago','pitbull','2017-12-01','black','efwfe',1,'Macho');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Amoxil','sdfj',1),(2,'Pechera','sdfsdf',2);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockpresentacion`
--

LOCK TABLES `stockpresentacion` WRITE;
/*!40000 ALTER TABLE `stockpresentacion` DISABLE KEYS */;
INSERT INTO `stockpresentacion` VALUES (1,'20','80','250mg',1.5,1),(2,'30','500','500mg',2.5,1),(3,'5','8','Small',40,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocita`
--

LOCK TABLES `tipocita` WRITE;
/*!40000 ALTER TABLE `tipocita` DISABLE KEYS */;
INSERT INTO `tipocita` VALUES (6,'Consulta',30,40,'askdasjd'),(7,'Spa',10,40,'aasdas');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
INSERT INTO `tipoproducto` VALUES (1,'Medicina',40,'asd'),(2,'Ropa',200,'asd');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipotrab`
--

LOCK TABLES `tipotrab` WRITE;
/*!40000 ALTER TABLE `tipotrab` DISABLE KEYS */;
INSERT INTO `tipotrab` VALUES (1,'Administrador');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (1,'javier','elias','balla','kudf','56456','javier@gmail.com','73896ff3ff9868ebfab8fd706705260e',1,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,'111','2017-12-01','Factura','erwef',21,'Venta Realizada',1,1),(2,'33343','2017-18-01','Factura','fdf',21,'Venta Realizada',2,1),(3,'34543653','2017-18-01','Factura','ERFER',240,'Venta Realizada',1,1);
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

-- Dump completed on 2017-01-19  9:46:50
