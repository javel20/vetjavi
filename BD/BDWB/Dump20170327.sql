-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: vet
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.9-MariaDB

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
  `PrecioAnalisis` double NOT NULL,
  `PorcentajeA` double NOT NULL,
  `Descripcion` longtext,
  PRIMARY KEY (`IdAnalisis`),
  UNIQUE KEY `Codigo_UNIQUE` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `FechaRegistro` datetime DEFAULT NULL,
  `HoraC` varchar(45) NOT NULL,
  `Peso` varchar(45) NOT NULL,
  `TemperaturaC` varchar(45) NOT NULL,
  `FrecuenciaCardiaca` varchar(45) NOT NULL,
  `FrecuenciaRespiratoria` varchar(45) NOT NULL,
  `Descripcion` longtext,
  `Ganancia` double NOT NULL,
  `PrecioTotal` double NOT NULL,
  `IdPaciente` int(11) NOT NULL,
  `IdTipoCita` int(11) DEFAULT NULL,
  `EstadoC` varchar(50) NOT NULL,
  `IdAnalisis` int(11) DEFAULT NULL,
  `IdCirugia` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdCita`),
  UNIQUE KEY `CodigoC_UNIQUE` (`CodigoC`),
  KEY `fk_Cita_Paciente1_idx` (`IdPaciente`),
  KEY `fk_Cita_TipoCita1_idx` (`IdTipoCita`),
  KEY `fk_cita_analisis1_idx` (`IdAnalisis`),
  KEY `fk_cita_cirugia1_idx` (`IdCirugia`),
  CONSTRAINT `fk_Cita_Paciente1` FOREIGN KEY (`IdPaciente`) REFERENCES `paciente` (`IdPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_TipoCita1` FOREIGN KEY (`IdTipoCita`) REFERENCES `tipocita` (`IdTipoCita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_analisis1` FOREIGN KEY (`IdAnalisis`) REFERENCES `analisis` (`IdAnalisis`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cita_cirugia1` FOREIGN KEY (`IdCirugia`) REFERENCES `cirugia` (`IdCirugia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Celular` varchar(45) DEFAULT NULL,
  `Operador` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`IdCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `PrecioTotalCompra` double NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `PrecioTotal` double NOT NULL,
  PRIMARY KEY (`IdCompra`,`IdStockPresen`),
  KEY `fk_Compra_has_Producto_Compra1_idx` (`IdCompra`),
  KEY `fk_detallecompraproducto_stockpresentacion1_idx` (`IdStockPresen`),
  CONSTRAINT `fk_Compra_has_Producto_Compra1` FOREIGN KEY (`IdCompra`) REFERENCES `compra` (`IdCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detallecompraproducto_stockpresentacion1` FOREIGN KEY (`IdStockPresen`) REFERENCES `stockpresentacion` (`IdStockPresen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Preciot` double NOT NULL,
  `gananciau` double NOT NULL,
  PRIMARY KEY (`IdVenta`,`IdStockPresen`),
  KEY `fk_Venta_has_Producto_Venta1_idx` (`IdVenta`),
  KEY `fk_detalleventaproducto_stockpresentacion1_idx` (`IdStockPresen`),
  CONSTRAINT `fk_Venta_has_Producto_Venta1` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalleventaproducto_stockpresentacion1` FOREIGN KEY (`IdStockPresen`) REFERENCES `stockpresentacion` (`IdStockPresen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `IdLocal` int(11) NOT NULL AUTO_INCREMENT,
  `NombreL` varchar(45) NOT NULL,
  `DireccionL` varchar(45) NOT NULL,
  `TelefonoL` varchar(45) NOT NULL,
  `EstadoL` varchar(45) NOT NULL,
  PRIMARY KEY (`IdLocal`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `IdPermisos` int(11) NOT NULL AUTO_INCREMENT,
  `NombreP` varchar(45) NOT NULL,
  PRIMARY KEY (`IdPermisos`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `permisotrab`
--

DROP TABLE IF EXISTS `permisotrab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisotrab` (
  `IdPermiso` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoP` varchar(45) NOT NULL,
  `FechaInicioP` varchar(45) NOT NULL,
  `FechaTerminoP` varchar(45) NOT NULL,
  `EstadoP` varchar(45) NOT NULL,
  `DescripcionP` varchar(45) DEFAULT NULL,
  `IdTrabajador` int(11) NOT NULL,
  PRIMARY KEY (`IdPermiso`),
  KEY `fk_permiso_trabajador1_idx` (`IdTrabajador`),
  CONSTRAINT `fk_permiso_trabajador1` FOREIGN KEY (`IdTrabajador`) REFERENCES `trabajador` (`IdTrabajador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreP` varchar(45) NOT NULL,
  `Descripcion` longtext,
  `IdTipoProducto` int(11) NOT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `fk_producto_tipoproducto1_idx` (`IdTipoProducto`),
  CONSTRAINT `fk_producto_tipoproducto1` FOREIGN KEY (`IdTipoProducto`) REFERENCES `tipoproducto` (`IdTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Celular` varchar(45) NOT NULL,
  `Operador` varchar(45) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `ApeMat` varchar(45) DEFAULT NULL,
  `ApePat` varchar(45) NOT NULL,
  `Empresa` varchar(45) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `salida`
--

DROP TABLE IF EXISTS `salida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salida` (
  `IdSalida` int(11) NOT NULL AUTO_INCREMENT,
  `NombreS` varchar(45) NOT NULL,
  `FechaS` varchar(45) NOT NULL,
  `PrecioS` double NOT NULL,
  `DescripcionS` varchar(45) DEFAULT NULL,
  `IdCita` int(11) NOT NULL,
  PRIMARY KEY (`IdSalida`),
  KEY `fk_Salidas_cita1_idx` (`IdCita`),
  CONSTRAINT `fk_Salidas_cita1` FOREIGN KEY (`IdCita`) REFERENCES `cita` (`IdCita`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stockpresentacion`
--

DROP TABLE IF EXISTS `stockpresentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockpresentacion` (
  `IdStockPresen` int(11) NOT NULL AUTO_INCREMENT,
  `StockMin` int(11) NOT NULL,
  `StockReal` int(11) NOT NULL,
  `Presentacion` varchar(45) NOT NULL,
  `Precio` double NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `PrecioVenta` double NOT NULL,
  PRIMARY KEY (`IdStockPresen`),
  KEY `fk_StockPresentacion_Producto1_idx` (`IdProducto`),
  CONSTRAINT `fk_StockPresentacion_Producto1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoproducto` (
  `IdTipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTipoP` varchar(45) NOT NULL,
  `Descripcion` longtext,
  PRIMARY KEY (`IdTipoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipotrab`
--

DROP TABLE IF EXISTS `tipotrab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipotrab` (
  `IdTipoTrab` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTP` varchar(45) NOT NULL,
  `DescripcionTP` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdTipoTrab`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador` (
  `IdTrabajador` int(11) NOT NULL AUTO_INCREMENT,
  `NombreT` varchar(45) NOT NULL,
  `ApePat` varchar(45) NOT NULL,
  `ApeMat` varchar(45) NOT NULL,
  `DireccionT` varchar(45) NOT NULL,
  `CelularT` varchar(45) NOT NULL,
  `OperadorT` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `IdTipoTrab` int(11) NOT NULL,
  `IdLocal` int(11) NOT NULL,
  `EstadoT` varchar(45) NOT NULL,
  PRIMARY KEY (`IdTrabajador`),
  KEY `fk_Trabajador_TipoTrab1_idx` (`IdTipoTrab`),
  KEY `fk_trabajador_local1_idx` (`IdLocal`),
  CONSTRAINT `fk_Trabajador_TipoTrab1` FOREIGN KEY (`IdTipoTrab`) REFERENCES `tipotrab` (`IdTipoTrab`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabajador_local1` FOREIGN KEY (`IdLocal`) REFERENCES `local` (`IdLocal`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

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
  `Ganancia` double NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-27 15:32:40
