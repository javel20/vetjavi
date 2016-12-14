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
  `IdPaciente` int(11) NOT NULL,
  PRIMARY KEY (`IdAnalisis`),
  KEY `fk_Analisis_Paciente1_idx` (`IdPaciente`),
  CONSTRAINT `fk_Analisis_Paciente1` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisis`
--

LOCK TABLES `analisis` WRITE;
/*!40000 ALTER TABLE `analisis` DISABLE KEYS */;
INSERT INTO `analisis` VALUES (1,123,'Urianálisis','asdasd',1);
/*!40000 ALTER TABLE `analisis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `IdCita` int(11) NOT NULL AUTO_INCREMENT,
  `FechaReserva` varchar(45) NOT NULL,
  `FechaRegistro` datetime DEFAULT CURRENT_TIMESTAMP,
  `Peso` varchar(45) NOT NULL,
  `FrecuenciaCardiaca` varchar(45) NOT NULL,
  `FrecuenciaRespiratoria` varchar(45) NOT NULL,
  `Descripcion` longtext,
  `IdPaciente` int(11) NOT NULL,
  `IdTipoCita` int(11) NOT NULL,
  `Estado` varchar(50) NOT NULL,
  PRIMARY KEY (`IdCita`),
  KEY `fk_Cita_Paciente1_idx` (`IdPaciente`),
  KEY `fk_Cita_TipoCita1_idx` (`IdTipoCita`),
  CONSTRAINT `fk_Cita_Paciente1` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_TipoCita1` FOREIGN KEY (`IdTipoCita`) REFERENCES `tipocita` (`IdTipoCita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita`
--

LOCK TABLES `cita` WRITE;
/*!40000 ALTER TABLE `cita` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'3456784','','javier','elias','balla','sdfsf','ewfwef','3546','45654',1),(2,'867867','','alejan','el','ball','sddahrth','wfwgfweg','569768','657896',1);
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
  `IdProveedor` int(11) NOT NULL,
  `IdTrabajador` int(11) NOT NULL,
  PRIMARY KEY (`IdCompra`),
  KEY `fk_Compra_Proveedor1_idx` (`IdProveedor`),
  KEY `fk_compra_trabajador1_idx` (`IdTrabajador`),
  CONSTRAINT `fk_Compra_Proveedor1` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_trabajador1` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajador` (`IdTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (6,34567,'2016-22-12','Factura','wefdf',2,2),(7,234,'2016-10-12','Factura','ferdgf',2,2),(8,23423,'2016-13-12','Factura','xvdxv',2,2),(9,344,'2016-20-12','Factura','sdcsdf',2,2),(10,4444,'2016-17-12','Factura','sdff',2,2),(11,555,'2016-16-12','Factura','asdasd',1,2),(12,555,'2016-14-12','Factura','wfesdds',1,2),(13,6666,'2016-30-12','Factura','sfsdgf',2,2);
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
  `IdProducto` int(11) NOT NULL,
  `FechaVen` varchar(45) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`IdCompra`,`IdProducto`),
  KEY `fk_Compra_has_Producto_Producto1_idx` (`IdProducto`),
  KEY `fk_Compra_has_Producto_Compra1_idx` (`IdCompra`),
  CONSTRAINT `fk_Compra_has_Producto_Compra1` FOREIGN KEY (`IdCompra`) REFERENCES `compra` (`IdCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Compra_has_Producto_Producto1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallecompraproducto`
--

LOCK TABLES `detallecompraproducto` WRITE;
/*!40000 ALTER TABLE `detallecompraproducto` DISABLE KEYS */;
INSERT INTO `detallecompraproducto` VALUES (8,2,'0000-00-00',12),(9,2,'0000-00-00',12),(10,1,'11',12),(11,2,'33',12),(12,1,'12/14/2016',55),(13,3,'12/23/2016',33),(13,4,'12/30/2016',44),(13,5,'12/21/2016',1);
/*!40000 ALTER TABLE `detallecompraproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventaproducto`
--

DROP TABLE IF EXISTS `detalleventaproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventaproducto` (
  `IdVenta` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `StockPresen` varchar(45) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `PrecioTotal` double NOT NULL,
  PRIMARY KEY (`IdVenta`,`IdProducto`),
  KEY `fk_Venta_has_Producto_Producto1_idx` (`IdProducto`),
  KEY `fk_Venta_has_Producto_Venta1_idx` (`IdVenta`),
  CONSTRAINT `fk_Venta_has_Producto_Producto1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_has_Producto_Venta1` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalleventaproducto`
--

LOCK TABLES `detalleventaproducto` WRITE;
/*!40000 ALTER TABLE `detalleventaproducto` DISABLE KEYS */;
INSERT INTO `detalleventaproducto` VALUES (13,1,'1',11,22),(14,3,'1',30,1000),(15,3,'2',100,400),(15,5,'2',2,1000),(15,6,'2',2,500);
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
  `Descripcion` longtext,
  `IdCita` int(11) NOT NULL,
  PRIMARY KEY (`IdDiagnostico`),
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES (1,'Animals','qfdf','234546','Habilitado'),(2,'amigo del criador','tity','5467','Habilitado');
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
INSERT INTO `paciente` VALUES (1,'firulay','Pitbull','2016-15-12','Black','qweqwe',1,'Macho');
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
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
  `Precio` double NOT NULL,
  `Descripcion` longtext,
  `Estado` tinyint(1) NOT NULL,
  `IdTipoProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `fk_producto_tipoproducto1_idx` (`IdTipoProducto`),
  CONSTRAINT `fk_producto_tipoproducto1` FOREIGN KEY (`IdTipoProducto`) REFERENCES `tipoproducto` (`IdTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'qweqwe',34,'asdad',1,2),(2,'nhdnhjdcjd',23423,'wefwef',1,3),(3,'Amoxil',11,'asdas',1,2),(4,'Dexa',22,'',1,2),(5,'Pechera',111,'',1,3),(6,'Collar',33,'',1,3);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'jav','erfergf','24535','efdf@gmail.com','asd','eli','Animals',1),(2,'Alej','aksdkasd','1436547','asda@gmail.com','asd','qwe','CatStore',1);
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
  `IdProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdStockPresen`),
  KEY `fk_StockPresentacion_Producto1_idx` (`IdProducto`),
  CONSTRAINT `fk_StockPresentacion_Producto1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockpresentacion`
--

LOCK TABLES `stockpresentacion` WRITE;
/*!40000 ALTER TABLE `stockpresentacion` DISABLE KEYS */;
INSERT INTO `stockpresentacion` VALUES (1,'11','22','250mg',1),(2,'22','33','400mg',2);
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
  `Nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTipoCita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocita`
--

LOCK TABLES `tipocita` WRITE;
/*!40000 ALTER TABLE `tipocita` DISABLE KEYS */;
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
  `Descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdTipoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
INSERT INTO `tipoproducto` VALUES (2,'Medicina',20,'saddf'),(3,'Ropa',30,'asfwef');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipotrab`
--

LOCK TABLES `tipotrab` WRITE;
/*!40000 ALTER TABLE `tipotrab` DISABLE KEYS */;
INSERT INTO `tipotrab` VALUES (1,'Administrador'),(2,'Medico'),(3,'Recepcion');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
INSERT INTO `trabajador` VALUES (1,'Juan','fsgew','ergregre','dgewg','34534','sdfs@gmail.com','Jasda324',1,1),(2,'Jose','dfdsf','wefw','ñfsdfm','2342','fsdf@gmail.com','Jewrwr234',2,2),(3,'Juana','gegerg','tegerg','efdfg','432534','sdf@gmail.com','Ofwe245',3,2),(5,'Javier','elias','ball','sadasd','234234','javier@gmail.com','73896ff3ff9868ebfab8fd706705260e',3,2);
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
  `IdCliente` int(11) NOT NULL,
  `IdTrabajador` int(11) NOT NULL,
  PRIMARY KEY (`IdVenta`),
  KEY `fk_Venta_Cliente_idx` (`IdCliente`),
  KEY `fk_Venta_Trabajador1_idx` (`IdTrabajador`),
  CONSTRAINT `fk_Venta_Cliente` FOREIGN KEY (`IdCliente`) REFERENCES `cliente` (`IdCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Venta_Trabajador1` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajador` (`IdTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (13,'3454','2016-05-12','Factura','regwg',1,2),(14,'4343','2016-21-12','Factura','sdasdsa',2,2),(15,'6666','2016-18-12','Factura','scsdc',2,2);
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

-- Dump completed on 2016-12-14 11:46:16
