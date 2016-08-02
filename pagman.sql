-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: pagman
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `pag_almacen`
--

DROP TABLE IF EXISTS `pag_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_almacen` (
  `alm_id` int(11) NOT NULL AUTO_INCREMENT,
  `alm_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`alm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_almacen`
--

LOCK TABLES `pag_almacen` WRITE;
/*!40000 ALTER TABLE `pag_almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_almacenista`
--

DROP TABLE IF EXISTS `pag_almacenista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_almacenista` (
  `alma_id` int(11) NOT NULL AUTO_INCREMENT,
  `alma_nombre` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`alma_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_almacenista`
--

LOCK TABLES `pag_almacenista` WRITE;
/*!40000 ALTER TABLE `pag_almacenista` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_almacenista` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_area`
--

DROP TABLE IF EXISTS `pag_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_area` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_area`
--

LOCK TABLES `pag_area` WRITE;
/*!40000 ALTER TABLE `pag_area` DISABLE KEYS */;
INSERT INTO `pag_area` VALUES (1,'Mecatronica',NULL),(2,'Refrigeración',NULL);
/*!40000 ALTER TABLE `pag_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_campos_personalizados`
--

DROP TABLE IF EXISTS `pag_campos_personalizados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_campos_personalizados` (
  `cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_campos_personalizados`
--

LOCK TABLES `pag_campos_personalizados` WRITE;
/*!40000 ALTER TABLE `pag_campos_personalizados` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_campos_personalizados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_cargo`
--

DROP TABLE IF EXISTS `pag_cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_cargo` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_cargo`
--

LOCK TABLES `pag_cargo` WRITE;
/*!40000 ALTER TABLE `pag_cargo` DISABLE KEYS */;
INSERT INTO `pag_cargo` VALUES (1,'Instructor',NULL);
/*!40000 ALTER TABLE `pag_cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_centro`
--

DROP TABLE IF EXISTS `pag_centro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_centro` (
  `cen_id` int(11) NOT NULL AUTO_INCREMENT,
  `cen_nombre` varchar(100) NOT NULL,
  `cen_dir` varchar(45) NOT NULL,
  `cen_telefono` varchar(45) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_centro`
--

LOCK TABLES `pag_centro` WRITE;
/*!40000 ALTER TABLE `pag_centro` DISABLE KEYS */;
INSERT INTO `pag_centro` VALUES (1,'CDTI','Pondaje','3275647',3,NULL),(2,'CEAI','Cali','2345',4,NULL),(4,'ASTIN','sdesdhgb','5678',5,NULL);
/*!40000 ALTER TABLE `pag_centro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_ciudad`
--

DROP TABLE IF EXISTS `pag_ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_ciudad` (
  `ciud_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciud_nombre` varchar(45) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ciud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_ciudad`
--

LOCK TABLES `pag_ciudad` WRITE;
/*!40000 ALTER TABLE `pag_ciudad` DISABLE KEYS */;
INSERT INTO `pag_ciudad` VALUES (1,'Cali',3,NULL);
/*!40000 ALTER TABLE `pag_ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_componente`
--

DROP TABLE IF EXISTS `pag_componente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_componente` (
  `comp_id` varchar(45) NOT NULL,
  `comp_descripcion` varchar(100) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_componente`
--

LOCK TABLES `pag_componente` WRITE;
/*!40000 ALTER TABLE `pag_componente` DISABLE KEYS */;
INSERT INTO `pag_componente` VALUES ('1','Polea',NULL),('2','Piñón',NULL);
/*!40000 ALTER TABLE `pag_componente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_control_medidas`
--

DROP TABLE IF EXISTS `pag_control_medidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_control_medidas` (
  `ctrmed_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctrmed_fecha` date NOT NULL,
  `ctrmed_medida_actual` varchar(100) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `per_id` bigint(20) NOT NULL,
  `tmed_id` int NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ctrmed_id`),
  KEY `tmed_id` (`tmed_id`),
  KEY `equi_id` (`equi_id`),
  CONSTRAINT `pag_control_medidas_ibfk_1` FOREIGN KEY (`tmed_id`) REFERENCES `pag_tipo_medidor` (`tmed_id`),
  CONSTRAINT `pag_control_medidas_ibfk_2` FOREIGN KEY (`equi_id`) REFERENCES `pag_equipo` (`equi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_control_medidas`
--

LOCK TABLES `pag_control_medidas` WRITE;
/*!40000 ALTER TABLE `pag_control_medidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_control_medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_controlador`
--

DROP TABLE IF EXISTS `pag_controlador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_controlador` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_id` int(11) NOT NULL,
  `cont_nombre` varchar(40) NOT NULL,
  `cont_icono` varchar(40) NOT NULL,
  `cont_display` varchar(40) NOT NULL,
  `cont_descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_controlador`
--

LOCK TABLES `pag_controlador` WRITE;
/*!40000 ALTER TABLE `pag_controlador` DISABLE KEYS */;
INSERT INTO `pag_controlador` VALUES (1,1,'costosController','mdi-editor-attach-money','Costos','Controlador de Costos'),(2,2,'equiposController','mdi-hardware-desktop-windows','Equipos','Controlador de Equipos'),(3,3,'herramientasController','mdi-action-wallet-travel','Herramientas','Controlador de Herramientas'),(4,4,'insumosController','mdi-maps-local-gas-station','Insumos','Controlador de Insumos'),(5,5,'localizacionController','mdi-communication-location-on','Localizacion','Controlador de Localizacion'),(6,6,'medicionesController','mdi-av-timer','Mediciones','Controlador de Mediciones'),(7,7,'medidoresController','mdi-image-timer','Medidor','Controlador de Medidores'),(8,8,'otController','mdi-action-assignment','Ordenes','Controlador de ot'),(9,8,'solicitudesController','mdi-communication-quick-contacts-mail','Solicitudes','Controlador de solicitudes'),(10,9,'permisosController','mdi-action-lock','Permisos','Controlador de Permisos'),(11,10,'personasController','mdi-social-person-outline','Personas','Controlador de Personas'),(12,11,'prestamoController','mdi-action-shopping-cart','Prestamo','Controlador de Prestamos'),(13,12,'programacionController','mdi-editor-insert-invitation','Programacion','Controlador de Programacion'),(14,13,'rolesController','mdi-social-group','Roles','Controlador de Roles'),(15,14,'usuariosController','mdi-action-account-circle','Usuarios','Controlador de Usuarios');
/*!40000 ALTER TABLE `pag_controlador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_departamento`
--

DROP TABLE IF EXISTS `pag_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_departamento` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_nombre` varchar(45) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_departamento`
--

LOCK TABLES `pag_departamento` WRITE;
/*!40000 ALTER TABLE `pag_departamento` DISABLE KEYS */;
INSERT INTO `pag_departamento` VALUES (1,'VALLE DEL CAUCA',0,NULL),(2,'Buenaventura',3,NULL),(3,'Atlantico',4,NULL);
/*!40000 ALTER TABLE `pag_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_det_prestamo_herramienta`
--

DROP TABLE IF EXISTS `pag_det_prestamo_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_det_prestamo_herramienta` (
  `detph_id` int(11) NOT NULL AUTO_INCREMENT,
  `pher_id` int(11) NOT NULL,
  `her_id` int(11) NOT NULL,
  `detph_cant_solicita` int(11) NOT NULL,
  `detph_cant_entrega` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `detph_observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`detph_id`),
  KEY `pher_id` (`pher_id`),
  KEY `her_id` (`her_id`),
  KEY `est_id` (`est_id`),
  CONSTRAINT `pag_det_prestamo_herramienta_ibfk_1` FOREIGN KEY (`pher_id`) REFERENCES `pag_prestamo_herramienta` (`pher_id`),
  CONSTRAINT `pag_det_prestamo_herramienta_ibfk_3` FOREIGN KEY (`est_id`) REFERENCES `pag_estado` (`est_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_det_prestamo_herramienta`
--

LOCK TABLES `pag_det_prestamo_herramienta` WRITE;
/*!40000 ALTER TABLE `pag_det_prestamo_herramienta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_det_prestamo_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_det_programacion`
--

DROP TABLE IF EXISTS `pag_det_programacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_det_programacion` (
  `detprog_id` int(11) NOT NULL AUTO_INCREMENT,
  `proequi_id` int(11) NOT NULL,
  `ttra_id` int(11) NOT NULL,
  `detprog_duracion_horas` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `priotra_id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL,
  `tmed_id` int(11) DEFAULT NULL,
  `frecuencia` int(11) DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`detprog_id`),
  KEY `proequi_id` (`proequi_id`),
  KEY `ttra_id` (`ttra_id`),
  KEY `equi_id` (`equi_id`),
  KEY `comp_id` (`comp_id`),
  KEY `priotra_id` (`priotra_id`),
  KEY `tar_id` (`tar_id`),
  CONSTRAINT `pag_det_programacion_ibfk_1` FOREIGN KEY (`proequi_id`) REFERENCES `pag_programacion_equipo` (`proequi_id`),
  CONSTRAINT `pag_det_programacion_ibfk_2` FOREIGN KEY (`ttra_id`) REFERENCES `pag_tipo_trabajo` (`ttra_id`),
  CONSTRAINT `pag_det_programacion_ibfk_3` FOREIGN KEY (`equi_id`) REFERENCES `pag_equipo` (`equi_id`),
  CONSTRAINT `pag_det_programacion_ibfk_4` FOREIGN KEY (`comp_id`) REFERENCES `pag_componente` (`comp_id`),
  CONSTRAINT `pag_det_programacion_ibfk_5` FOREIGN KEY (`priotra_id`) REFERENCES `pag_prioridad_trabajo` (`priotra_id`),
  CONSTRAINT `pag_det_programacion_ibfk_6` FOREIGN KEY (`tar_id`) REFERENCES `pag_tarea` (`tar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_det_programacion`
--

LOCK TABLES `pag_det_programacion` WRITE;
/*!40000 ALTER TABLE `pag_det_programacion` DISABLE KEYS */;
INSERT INTO `pag_det_programacion` VALUES (1,1,2,34,'1','2',1,2,1,10,1),(2,2,1,100,'1','1',1,1,1,200,1),(3,3,1,8,'1','1',1,1,1,10,2),(4,4,1,10,'1','1',1,1,1,200,1);
/*!40000 ALTER TABLE `pag_det_programacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_detalle_ot`
--

DROP TABLE IF EXISTS `pag_detalle_ot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_detalle_ot` (
  `dot_id` int(11) NOT NULL AUTO_INCREMENT,
  `ot_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `ttra_id` int(11) NOT NULL,
  `ot_tiempo_trabajo` int(11) NOT NULL,
  `ot_valor_trabajo` int(11) NOT NULL,
  `ot_observacion` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dot_id`),
  KEY `ot_id` (`ot_id`),
  KEY `comp_id` (`comp_id`),
  CONSTRAINT `pag_detalle_ot_ibfk_1` FOREIGN KEY (`ot_id`) REFERENCES `pag_orden_trabajo` (`ot_id`),
  CONSTRAINT `pag_detalle_ot_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `pag_componente` (`comp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_detalle_ot`
--

LOCK TABLES `pag_detalle_ot` WRITE;
/*!40000 ALTER TABLE `pag_detalle_ot` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_detalle_ot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_equipo`
--

DROP TABLE IF EXISTS `pag_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_equipo` (
  `equi_id` varchar(45) NOT NULL,
  `per_id` bigint(20) NOT NULL,
  `equi_nombre` varchar(100) NOT NULL,
  `est_id` int(11) NOT NULL,
  `cen_id` int(11) NOT NULL,
  `equi_foto` varchar(100) DEFAULT NULL,
  `tmed_id` int(11) DEFAULT NULL,
  `equi_valor_tmed` int(11) DEFAULT NULL,
  `equi_fabricante` varchar(45) NOT NULL,
  `equi_marca` varchar(45) NOT NULL,
  `equi_modelo` varchar(45) NOT NULL,
  `equi_serie` varchar(45) NOT NULL,
  `equi_ubicacion` varchar(45) NOT NULL,
  `equi_fecha_compra` date NOT NULL,
  `equi_fecha_instalacion` date NOT NULL,
  `equi_vence_garantia` date NOT NULL,
  `area_id` int(11) NOT NULL,
  `tequi_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equi_id`),
  KEY `per_id` (`per_id`),
  KEY `cen_id` (`cen_id`),
  CONSTRAINT `pag_equipo_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `pag_persona` (`per_id`),
  CONSTRAINT `pag_equipo_ibfk_2` FOREIGN KEY (`cen_id`) REFERENCES `pag_centro` (`cen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_equipo`
--

LOCK TABLES `pag_equipo` WRITE;
/*!40000 ALTER TABLE `pag_equipo` DISABLE KEYS */;
INSERT INTO `pag_equipo` VALUES ('0123',1143830254,'Torno',1,2,'',NULL,NULL,'Asus','wert','2016','12245','Cali','2016-04-27','2016-04-27','2016-10-25',1,1,NULL),('1',1144125473,'Torno CNC',0,1,'',1,1,'Mazda','Mazda','Mazda','Mazda 123','Cali','2016-03-01','2016-03-02','2016-03-31',1,1,'0000-00-00 00:00:00'),('EP_003',1144125472,'Equipo de computo MAC',1,1,'/srv/www/htdocs/localhost/pagman/web/media/img/Equipos/equipo-EP_003',NULL,NULL,'HP','HP','HP','3456','Salomia','2016-02-02','2016-03-02','2018-02-02',1,2,NULL),('PC_002',1144125473,'Portatil Linux',1,1,'/srv/www/htdocs/localhost/pagman/web/media/img/Equipos/equipo-PC_002',NULL,NULL,'Lenovo','Lenovo','Lenovo','7431','Sena','2016-04-08','2016-04-08','2016-04-15',2,1,NULL),('TC001',1144125473,'Torno Convencional',1,1,'',NULL,NULL,'Tornos Technologies IbÃ©rica, S.A','Valor','2016','123456','CDTI','2014-04-12','2014-05-12','2020-04-12',1,1,NULL);
/*!40000 ALTER TABLE `pag_equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_equipo_componente`
--

DROP TABLE IF EXISTS `pag_equipo_componente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_equipo_componente` (
  `equicomp_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` varchar(45) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equicomp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_equipo_componente`
--

LOCK TABLES `pag_equipo_componente` WRITE;
/*!40000 ALTER TABLE `pag_equipo_componente` DISABLE KEYS */;
INSERT INTO `pag_equipo_componente` VALUES (1,'1','1',NULL),(2,'2','1',NULL);
/*!40000 ALTER TABLE `pag_equipo_componente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_equipo_cp`
--

DROP TABLE IF EXISTS `pag_equipo_cp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_equipo_cp` (
  `equicp_id` int(11) NOT NULL AUTO_INCREMENT,
  `equi_id` varchar(45) NOT NULL,
  `cp_id` int(11) NOT NULL,
  `equicp_valor` varchar(100) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`equicp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_equipo_cp`
--

LOCK TABLES `pag_equipo_cp` WRITE;
/*!40000 ALTER TABLE `pag_equipo_cp` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_equipo_cp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_equipo_planos`
--

DROP TABLE IF EXISTS `pag_equipo_planos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_equipo_planos` (
  `equipla_id` int(11) NOT NULL AUTO_INCREMENT,
  `equi_id` varchar(45) NOT NULL,
  `equipla_descripcion` varchar(100) NOT NULL,
  `equipla_ruta` varchar(100) NOT NULL,
  PRIMARY KEY (`equipla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_equipo_planos`
--

LOCK TABLES `pag_equipo_planos` WRITE;
/*!40000 ALTER TABLE `pag_equipo_planos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_equipo_planos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_estado`
--

DROP TABLE IF EXISTS `pag_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_estado` (
  `est_id` int(11) NOT NULL AUTO_INCREMENT,
  `est_descripcion` varchar(45) NOT NULL,
  `tdoc_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`est_id`),
  KEY `tdoc_id` (`tdoc_id`),
  CONSTRAINT `pag_estado_ibfk_1` FOREIGN KEY (`tdoc_id`) REFERENCES `pag_tipo_doc` (`tdoc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_estado`
--

LOCK TABLES `pag_estado` WRITE;
/*!40000 ALTER TABLE `pag_estado` DISABLE KEYS */;
INSERT INTO `pag_estado` VALUES (1,'Activo',1,NULL),(2,'Inactivo',1,NULL),(3,'Creada',2,NULL),
(4,'En ejecución',2,NULL),(5,'Gestionada',2,NULL),(6,'Cerrada',2,NULL),(7,'Por atender',4,NULL),
(8,'Atendida',4,NULL);
/*!40000 ALTER TABLE `pag_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_funcion`
--

DROP TABLE IF EXISTS `pag_funcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_funcion` (
  `func_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_id` int(11) NOT NULL,
  `func_nombre` varchar(40) NOT NULL,
  `func_display` varchar(40) NOT NULL,
  `func_descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`func_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_funcion`
--

LOCK TABLES `pag_funcion` WRITE;
/*!40000 ALTER TABLE `pag_funcion` DISABLE KEYS */;
INSERT INTO `pag_funcion` VALUES (1,1,'crear','Crear Costos','Crear Costos'),(2,1,'editar','Editar Costos','Editar Costos'),(3,1,'eliminar','Eliminar Costos','Eliminar Costos'),(4,1,'listar','Listar Costos','Listar Costos'),(5,2,'crear','Crear Equipos','Crear Equipos'),(6,2,'editar','Editar Equipos','Editar Equipos '),(7,2,'eliminar','Eliminar Equipos','Eliminar Equipos'),(8,2,'Listar','Listar Equipos','Listar Equipos'),(9,3,'crear','Crear Herramientas','Crear Herramientas'),(10,3,'editar','Editar Herramientas','Editar Herramientas'),(11,3,'eliminar','Eliminar Herramientas','Eliminar Herramientas'),(12,3,'Listar','Listar Herramientas','Listar Herramientas'),(13,4,'crear','Crear Insumos','Crear Insumos'),(14,4,'editar','Editar Insumos','Editar Insumos'),(15,4,'eliminar','Eliminar Insumos','Eliminar Insumos'),(16,4,'Listar','Listar Insumos','Listar Insumos'),(17,5,'crear','Crear Localizacion','Crear Localizacion'),(18,5,'editar','Editar Localizacion','Editar Localizacion'),(19,5,'eliminar','Eliminar Localizacion','Eliminar Localizacion'),(20,5,'Listar','Listar Localizacion','Listar Localizacion'),(21,6,'crear','Crear Mediciones','Crear Mediciones'),(22,6,'editar','Editar Mediciones','Editar Mediciones'),(23,6,'eliminar','Eliminar Mediciones','Eliminar Mediciones'),(24,6,'Listar','Listar Mediciones','Listar Mediciones'),(25,7,'crear','Crear Medidores','Crear Medidores'),(26,7,'editar','Editar Medidores','Editar Medidores'),(27,7,'eliminar','Eliminar Medidores','Eliminar Medidores'),(28,7,'Listar','Listar Medidores','Listar Medidores'),(29,8,'crear','Crear ot','Crear ot'),(30,8,'editar','Editar ot','Editar ot'),(31,8,'eliminar','Eliminar ot','Eliminar ot'),(32,8,'listar','Listar ot','Listar ot'),(33,9,'crear','Crear solicitud','Crear solicitud de servicio'),(34,9,'editar','Editar solicitud','Editar solicitud'),(35,9,'eliminar','Eliminar solicitud','Eliminar solicitud'),(36,9,'listar','Listar solicitud','Listar solicitud'),(37,10,'crear','Asignar','Asignar Permisos'),(38,11,'crear','Crear Personas','Crear Personas'),(39,11,'editar','Editar Personas','Editar Personas'),(40,11,'eliminar','Eliminar Personas','Eliminar Personas'),(41,11,'Listar','Listar Personas','Listar Personas'),(42,12,'crear','Crear Prestamos','Crear Prestamo'),(43,12,'eliminar','Eliminar Prestamo','Eliminar Prestamo'),(44,12,'Listar','Listar Prestamos','Listar Prestamos'),(45,13,'crear','Crear Programacion','Crear Programacion'),(46,13,'editar','Editar Programacion','Editar Programacion'),(47,13,'listar','Listar Programacion','Listar Programacion'),(48,13,'eliminar','Eliminar Programacion','Eliminar Programacion'),(49,14,'crear','Crear Rol','Crear Rol'),(50,14,'editar','Editar Rol','Editar Rol'),(51,14,'listar','Listar roles','Lista los roles'),(52,14,'eliminar','ELiminar Rol','ELiminar Rol'),(53,15,'crear','Crear Usuario','Crear Usuario'),(54,15,'editar','Editar Usuario','Editar Usuario'),(55,15,'listar','Listar Usuarios','Listar Usuarios'),(56,15,'eliminar','Eliminar Usuario','Eliminar Usuario');
/*!40000 ALTER TABLE `pag_funcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_herramienta`
--

DROP TABLE IF EXISTS `pag_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_herramienta` (
  `her_id` varchar(40) NOT NULL,
  `ther_id` int(11) NOT NULL,
  `her_nombre` varchar(45) NOT NULL,
  `her_descripcion` varchar(45) NOT NULL,
  `her_fecha_ingreso` varchar(200) NOT NULL,
  `est_id` int(11) DEFAULT NULL,
  `her_imagen` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`her_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_herramienta`
--

LOCK TABLES `pag_herramienta` WRITE;
/*!40000 ALTER TABLE `pag_herramienta` DISABLE KEYS */;
INSERT INTO `pag_herramienta` VALUES ('01',2,'Martillo','Martillo 01',now(),NULL,NULL,NULL);
/*!40000 ALTER TABLE `pag_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_insumo`
--

DROP TABLE IF EXISTS `pag_insumo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_insumo` (
  `ins_id` int(11) NOT NULL AUTO_INCREMENT,
  `ins_nombre` varchar(45) NOT NULL,
  `ins_descripcion` varchar(45) NOT NULL,
  `ins_valor` int(11) NOT NULL,
  `umed_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ins_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_insumo`
--

LOCK TABLES `pag_insumo` WRITE;
/*!40000 ALTER TABLE `pag_insumo` DISABLE KEYS */;
INSERT INTO `pag_insumo` VALUES (1,'Aceite','Aceite 3 en 1',23000,1,NULL),(2,'Gasolina','Gasolina x Litro',21001,1,NULL);
/*!40000 ALTER TABLE `pag_insumo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_inventario`
--

DROP TABLE IF EXISTS `pag_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_inventario` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_fecha` date NOT NULL,
  `inv_movimiento` varchar(45) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `inv_cant` int(11) NOT NULL,
  `inv_saldo` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_inventario`
--

LOCK TABLES `pag_inventario` WRITE;
/*!40000 ALTER TABLE `pag_inventario` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_jornada`
--

DROP TABLE IF EXISTS `pag_jornada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_jornada` (
  `jor_id` int(11) NOT NULL AUTO_INCREMENT,
  `jor_descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`jor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_jornada`
--

LOCK TABLES `pag_jornada` WRITE;
/*!40000 ALTER TABLE `pag_jornada` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_jornada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_modulo`
--

DROP TABLE IF EXISTS `pag_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_modulo` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_nombre` varchar(20) NOT NULL,
  `mod_icono` varchar(40) NOT NULL,
  `mod_sitio_menu` varchar(20) NOT NULL,
  `mod_descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_modulo`
--

LOCK TABLES `pag_modulo` WRITE;
/*!40000 ALTER TABLE `pag_modulo` DISABLE KEYS */;
INSERT INTO `pag_modulo` VALUES (1,'Costos','mdi-editor-attach-money','principal','Modulo de Costos'),(2,'Equipos','mdi-hardware-desktop-windows','principal','Modulo de Equipos'),(3,'Herramientas','mdi-action-wallet-travel','principal','Modulo de Herramientas'),(4,'Insumos','mdi-maps-local-gas-station','principal','Modulo de Insumos'),(5,'Localizacion','mdi-communication-location-on','principal','Modulo de Localizacion'),(6,'Mediciones','mdi-av-timer','principal','Modulo de Mediciones'),(7,'Medidores','mdi-image-timer','principal','Modulo de Medidores'),(8,'OT','mdi-action-assignment','principal','Modulo de OT'),(9,'Permisos','mdi-action-lock','configuracion','Modulo de Permisos'),(10,'Personas','mdi-social-person-outline','configuracion','Modulo de Personas'),(11,'Prestamo','mdi-action-shopping-cart','principal','Modulo de prestamos'),(12,'Programacion','mdi-editor-insert-invitation','principal','Modulo Programacion'),(13,'Roles','mdi-social-group','configuracion','Modulo asignar Roles a un usuario'),(14,'Usuarios','mdi-action-account-circle','configuracion','Modulo Usuarios');
/*!40000 ALTER TABLE `pag_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_orden_trabajo`
--

DROP TABLE IF EXISTS `pag_orden_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_orden_trabajo` (
  `ot_id` int(11) NOT NULL AUTO_INCREMENT,
  `ot_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `ot_prioridad` varchar(30) NOT NULL,
  `ot_desc_falla` varchar(400) NOT NULL,
  `ot_desc_trabajo` varchar(400) NOT NULL,
  `est_id` int(11) NOT NULL,
  `ot_fecha_inicio` varchar(40) DEFAULT NULL,
  `ot_fecha_fin` varchar(40) DEFAULT NULL,
  `ot_ayudantes` varchar(100) DEFAULT NULL,
  `ins_id` int(11) NOT NULL,
  `per_id` bigint(20) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ot_id`),
  KEY `est_id` (`est_id`),
  KEY `tfa_id` (`tfa_id`),
  KEY `equi_id` (`equi_id`),
  KEY `per_id` (`per_id`),
  CONSTRAINT `pag_orden_trabajo_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `pag_estado` (`est_id`),
  CONSTRAINT `pag_orden_trabajo_ibfk_2` FOREIGN KEY (`tfa_id`) REFERENCES `pag_tipo_falla` (`tfa_id`),
  CONSTRAINT `pag_orden_trabajo_ibfk_3` FOREIGN KEY (`equi_id`) REFERENCES `pag_equipo` (`equi_id`),
  CONSTRAINT `pag_orden_trabajo_ibfk_4` FOREIGN KEY (`per_id`) REFERENCES `pag_persona` (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_orden_trabajo`
--

LOCK TABLES `pag_orden_trabajo` WRITE;
/*!40000 ALTER TABLE `pag_orden_trabajo` DISABLE KEYS */;
INSERT INTO `pag_orden_trabajo` VALUES (1,'2016-04-27 15:03:26',3,'1',2,'Alta',' Necesita lubricación en las poleas y piñones',' Desarmar la maquina para afinar los filtros',3,'8 April, 2016','15 April, 2016','Alex Romero, Nicolas Gaviria, Javier Perezs',0,1144125473,'2016-04-15 21:20:31'),(2,'2016-04-27 15:03:42',4,'EP_003',2,'Media','Falla de mantenimiento','Reparar piñones',3,'8 April, 2016','15 April, 2016','Esteban, Ceron, Cortes',0,1144125473,NULL),(3,'2016-04-07 22:34:53',1,'EP_003',1,'Media',' Hay cortos en la maquina y sonidos.',' Revisar el cableado de la maquina.',3,'7 April, 2016','21 April, 2016','Yan Carlo, Anibal, David.',0,1144125473,'2016-04-07 22:34:53'),(4,'2016-04-27 15:04:03',4,'EP_003',2,'Media',' sfhdgfvclk,.',' Cambiar aceite, calibrar vÃ¡lvulas',3,'14 April, 2016','16 April, 2016','Ninson Ibarra, Yuliana Ocoro, Gloria TrÃ³chez, Edinson Martinez',0,1144125473,NULL),(5,'2016-04-21 21:33:56',1,'EP_003',2,'Media','Calibrar llantas','Cambiar aceite',3,'21 April, 2016','23 April, 2016','Gloria, Edinson',0,1144125472,NULL),(6,'2016-04-29 18:19:12',1,'1',1,'Media','Sonido','Cambiar aceite',3,'28 April, 2016','29 April, 2016','Gloria, Edinson',0,1144125472,NULL),(7,'2016-04-29 18:19:38',1,'1',1,'Media','Sonido','Cambiar aceite',3,'28 April, 2016','29 April, 2016','Gloria, Edinson',0,1144125472,NULL),(8,'2016-04-29 18:20:07',1,'1',1,'Media','Sonido','Cambiar aceite',3,'28 April, 2016','29 April, 2016','Gloria, Edinson',0,1144125472,NULL),(9,'2016-05-06 17:46:34',1,'TC001',2,'Media','Sonido','Cambiar aceite',2,'28 April, 2016','29 April, 2016','Gloria, Edinson',0,1144125473,'2016-05-06 17:46:34'),(10,'2016-05-06 17:46:18',2,'0123',2,'Media',' Sonido',' Cambiar aceite',2,'26 April, 2016','30 April, 2016','Gloria, Edinson',0,1143830254,'2016-05-06 17:46:18'),(11,'2016-05-06 17:41:59',2,'0123',2,'<br />\r\n<b>Notice</b>:  Undefi','  Sonido raro','  Cambiar aceite, montar llantas',2,'6 May, 2016','7 May, 2016','Gloria, Edinson',0,1144125473,'2016-05-06 17:41:59'),(12,'2016-05-06 17:58:49',2,'0123',2,'<br />\r\n<b>Notice</b>:  Undefi','awertfh','rtrtgjh',2,'6 May, 2016','7 May, 2016','Gloria, Edinson',0,234567,NULL),(13,'2016-05-06 18:10:31',1,'PC_002',2,'<br />\r\n<b>Notice</b>:  Undefi',' srtghg',' sfgh',2,'6 May, 2016','6 May, 2016','Gloria, Edinson',0,1144125445,'2016-05-06 18:10:31'),(14,'2016-05-06 18:14:18',1,'1',1,'<br />\r\n<b>Notice</b>:  Undefi',' lkfÃ±',' erfc',2,'6 May, 2016','6 May, 2016','Gloria, Edinson',0,1144125473,NULL),(15,'2016-05-06 19:21:10',1,'1',1,'<br />\r\n<b>Notice</b>:  Undefi','cvbn','dfgh',2,'6 May, 2016','8 May, 2016','ertyhj',0,234567,NULL),(16,'2016-05-06 18:23:38',2,'0123',2,'<br />\r\n<b>Notice</b>:  Undefi','jjjjjj','sfdsfv',3,'7 May, 2016','13 May, 2016','Ninson Ibarra, Yuliana Ocoro, Gloria TrÃ³chez',0,1144125473,NULL),(17,'2016-05-11 02:17:17',1,'EP_003',1,'2','   jjjjjj','   sfdsfv',3,'18 May, 2016','18 May, 2016','Ninson Ibarra, Yuliana Ocoro, Gloria TrÃ³chez',0,1144125473,NULL),(18,'2016-06-14 02:17:50',2,'0123',1,'1','   Mundo','   Hola',5,'6 May, 2016','6 May, 2016','Gloria, Edinson',0,234567,'2016-06-14 02:17:50'),(19,'2016-06-10 01:50:00',1,'1',2,'3','     srtyuj Gloria','  Mundo   Hola',6,'6 May, 2016','6 May, 2016','Gloria, Edinson, Javier',0,234567,'2016-06-10 01:50:00'),(20,'2016-06-14 02:17:47',1,'EP_003',2,'3','Revisar frenos','Cambiar aceite y tensionar frenos',3,'13 June, 2016','18 June, 2016','Edinson Martinez',0,1144125473,'2016-06-14 02:17:47'),(21,'2016-06-14 02:17:43',2,'0123',1,'3','asdfghnm','asdfgh',3,'13 June, 2016','17 June, 2016','Gloria, Edinson',0,1143830254,'2016-06-14 02:17:43'),(22,'2016-06-14 02:17:40',1,'EP_003',2,'3','ertykunbv','ygkjhnbvc',3,'13 June, 2016','18 June, 2016','Ninson Ibarra, Yuliana Ocoro, Gloria TrÃ³chez',9998,1143830254,'2016-06-14 02:17:40'),(23,'2016-06-14 02:22:11',1,'TC001',1,'1',' asdfgh. Fin',' ,gfvc . Fin',3,'13 June, 2016','18 June, 2016','Gloria, Edinson, Valentina',9998,1143830254,NULL),(24,'2016-06-14 02:23:17',1,'EP_003',1,'2',' yujfhgxv. Hola',' ipouityuh. Mundo',3,'13 June, 2016','14 June, 2016','Ninson Ibarra, Gloria TrÃ³chez',9998,1143830254,'2016-06-14 02:23:17'),(25,'2016-06-17 14:02:29',1,'EP_003',2,'1','  kjhgnbvc','  pki`p',6,'13 June, 2016','13 June, 2016','Gloria, Edinson',9998,1144125445,NULL),(26,'2016-06-17 14:33:30',1,'EP_003',2,'1','Sonido raro','Calibrar llantas, cambiar aceite',3,'17 June, 2016','23 June, 2016','Gloria',9998,1144125473,NULL),(27,'2016-06-17 14:37:02',1,'EP_003',2,'2','rethgdfvc','Cambiar aceite, ajustar freno',3,'17 June, 2016','22 June, 2016','Gloria',9998,1144125473,NULL),(28,'2016-07-21 15:55:27',1,'PC_002',2,'3',' asfdgfh',' thgbv',3,'17 June, 2016','20 June, 2016','Gloria, Edinson',9998,1143830254,NULL);
/*!40000 ALTER TABLE `pag_orden_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_permisos`
--

DROP TABLE IF EXISTS `pag_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_permisos` (
  `perm_id` int(11) NOT NULL AUTO_INCREMENT,
  `func_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`perm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_permisos`
--

LOCK TABLES `pag_permisos` WRITE;
/*!40000 ALTER TABLE `pag_permisos` DISABLE KEYS */;
INSERT INTO `pag_permisos` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(15,15,1),(16,16,1),(17,17,1),(18,18,1),(19,19,1),(20,20,1),(21,21,1),(22,22,1),(23,23,1),(24,24,1),(25,25,1),(26,26,1),(27,27,1),(28,28,1),(29,29,1),(30,30,1),(31,31,1),(32,32,1),(33,33,1),(34,34,1),(35,35,1),(36,36,1),(37,37,1),(38,38,1),(39,39,1),(40,40,1),(41,41,1),(42,42,1),(43,43,1),(44,44,1),(45,45,1),(46,46,1),(47,47,1),(48,48,1),(49,49,1),(50,50,1),(51,51,1),(52,52,1),(53,53,1),(54,54,1),(55,55,1),(56,56,1);
/*!40000 ALTER TABLE `pag_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_persona`
--

DROP TABLE IF EXISTS `pag_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_persona` (
  `per_id` bigint(20) NOT NULL,
  `per_nombre` varchar(45) NOT NULL,
  `per_apellido` varchar(45) NOT NULL,
  `per_telefono` varchar(45) NOT NULL,
  `per_movil` varchar(45) NOT NULL,
  `per_email` varchar(45) NOT NULL,
  `per_direccion` varchar(45) DEFAULT NULL,
  `dept_id` int(11) NOT NULL,
  `per_valor_hora` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `cen_id` int(11) NOT NULL,
  `per_tipo` varchar(50) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_persona`
--

LOCK TABLES `pag_persona` WRITE;
/*!40000 ALTER TABLE `pag_persona` DISABLE KEYS */;
INSERT INTO `pag_persona` VALUES (1143830254,'Alejandro','Yepes','3243452','3183452354','alejandro@gmail.com','Terron Colorado',1,28000,1,1,'usuario del sistema',NULL),(1144125445,'Jhonatan','Tavera','3213423','3154352342','jtavera@gmail.com','Sena',1,23000,1,1,'usuario del sistema',NULL),(1144125472,'Jhonatan','Tavera','3124534','3128546345','tatan@gmail.com','Cra 45 45 567',1,300000,1,1,'usuario del sistema',NULL),(1144125473,'David Fernando','Barona','4434564','3185235463','dferbac@gmail.com','Calle 8A 45 106',1,200000,1,1,'usuario del sistema',NULL),(1151956249,'Super','Administrador','3845030','3135396721','esteban@gmail.com',NULL,1,5000,1,1,'usuario del sistema',NULL);
/*!40000 ALTER TABLE `pag_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_prestamo_herramienta`
--

DROP TABLE IF EXISTS `pag_prestamo_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_prestamo_herramienta` (
  `pher_id` int(11) NOT NULL AUTO_INCREMENT,
  `pher_fecha` date NOT NULL,
  `per_id_solicita` int(11) NOT NULL,
  `pher_fecha_devolucion` date NOT NULL,
  `pher_observaciones` varchar(100) NOT NULL,
  `alm_id` int(11) NOT NULL,
  `jor_id` int(11) NOT NULL,
  `per_id_entrega` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_prestamo_herramienta`
--

LOCK TABLES `pag_prestamo_herramienta` WRITE;
/*!40000 ALTER TABLE `pag_prestamo_herramienta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_prestamo_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_prioridad_trabajo`
--

DROP TABLE IF EXISTS `pag_prioridad_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_prioridad_trabajo` (
  `priotra_id` int(11) NOT NULL AUTO_INCREMENT,
  `priotra_descripcion` varchar(20) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`priotra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_prioridad_trabajo`
--

LOCK TABLES `pag_prioridad_trabajo` WRITE;
/*!40000 ALTER TABLE `pag_prioridad_trabajo` DISABLE KEYS */;
INSERT INTO `pag_prioridad_trabajo` VALUES (1,'Alta',NULL),(2,'Baja',NULL),(3,'Media',NULL);
/*!40000 ALTER TABLE `pag_prioridad_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_programacion_equipo`
--

DROP TABLE IF EXISTS `pag_programacion_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_programacion_equipo` (
  `proequi_id` int(11) NOT NULL AUTO_INCREMENT,
  `proequi_fecha` varchar(25) NOT NULL,
  `cen_id` int(11) NOT NULL,
  `proequi_fecha_inicio` varchar(25) NOT NULL,
  `tman_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`proequi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_programacion_equipo`
--

LOCK TABLES `pag_programacion_equipo` WRITE;
/*!40000 ALTER TABLE `pag_programacion_equipo` DISABLE KEYS */;
INSERT INTO `pag_programacion_equipo` VALUES (1,'5 April, 2016',1,'29 April, 2016',1,NULL);
/*!40000 ALTER TABLE `pag_programacion_equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_regional`
--

DROP TABLE IF EXISTS `pag_regional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_regional` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_nombre` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_regional`
--

LOCK TABLES `pag_regional` WRITE;
/*!40000 ALTER TABLE `pag_regional` DISABLE KEYS */;
INSERT INTO `pag_regional` VALUES (1,'Zona pacifico2',NULL),(2,'Zona Caribe',NULL),(3,'Zona Sur',NULL);
/*!40000 ALTER TABLE `pag_regional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_rol`
--

DROP TABLE IF EXISTS `pag_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_rol` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(20) NOT NULL,
  `rol_descripcion` varchar(100) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_rol`
--

LOCK TABLES `pag_rol` WRITE;
/*!40000 ALTER TABLE `pag_rol` DISABLE KEYS */;
INSERT INTO `pag_rol` VALUES (1,'Administrador','Tiene acceso a todo el sistema',NULL);
/*!40000 ALTER TABLE `pag_rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_solicitud_servicio`
--

DROP TABLE IF EXISTS `pag_solicitud_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_solicitud_servicio` (
  `sserv_id` int(11) NOT NULL AUTO_INCREMENT,
  `sserv_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `sserv_descripcion` varchar(100) NOT NULL,
  `per_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sserv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_solicitud_servicio`
--

LOCK TABLES `pag_solicitud_servicio` WRITE;
/*!40000 ALTER TABLE `pag_solicitud_servicio` DISABLE KEYS */;
INSERT INTO `pag_solicitud_servicio` VALUES (55,'2016-07-19 18:25:19',1,'1','Hola mundo',1143830254,7,1,NULL),(56,'2016-07-19 18:25:52',1,'EP_003','Hola mundo 2',234567,7,1,NULL),(57,'2016-07-19 18:26:18',2,'0123','Hola mundo 3',1144125473,7,2,NULL),(58,'2016-07-19 18:26:48',1,'PC_002','Hola mundo 4',1151956249,7,2,NULL),(59,'2016-07-19 18:27:16',1,'TC001','Hola mundo 6',1144125445,7,1,NULL),(60,'2016-07-19 18:27:42',2,'0123','Hola mundo 9',234567,7,1,NULL),(61,'2016-07-19 18:29:12',1,'1','Hola mundo 7',0,7,2,NULL),(62,'2016-07-19 18:29:17',1,'1','Hola mundo 7',0,7,2,NULL),(63,'2016-07-19 18:29:59',1,'EP_003','Hola mundo 8',1144125445,7,2,NULL);
/*!40000 ALTER TABLE `pag_solicitud_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tarea`
--

DROP TABLE IF EXISTS `pag_tarea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tarea` (
  `tar_id` int(11) NOT NULL AUTO_INCREMENT,
  `tar_nombre` varchar(200) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tarea`
--

LOCK TABLES `pag_tarea` WRITE;
/*!40000 ALTER TABLE `pag_tarea` DISABLE KEYS */;
INSERT INTO `pag_tarea` VALUES (1,'Cambiar piezas',NULL),(2,'Lubricación',NULL);
/*!40000 ALTER TABLE `pag_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_de_equipo`
--

DROP TABLE IF EXISTS `pag_tipo_de_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_de_equipo` (
  `tequi_id` int(11) NOT NULL AUTO_INCREMENT,
  `tequi_descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`tequi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_de_equipo`
--

LOCK TABLES `pag_tipo_de_equipo` WRITE;
/*!40000 ALTER TABLE `pag_tipo_de_equipo` DISABLE KEYS */;
INSERT INTO `pag_tipo_de_equipo` VALUES (1,'Electromecanico',NULL),(2,'Hidraulico',NULL),(3,'Refrigeración',NULL);
/*!40000 ALTER TABLE `pag_tipo_de_equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_doc`
--

DROP TABLE IF EXISTS `pag_tipo_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_doc` (
  `tdoc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tdoc_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tdoc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_doc`
--

LOCK TABLES `pag_tipo_doc` WRITE;
/*!40000 ALTER TABLE `pag_tipo_doc` DISABLE KEYS */;
INSERT INTO `pag_tipo_doc` VALUES (1,'General',NULL),(2,'Orden de trabajo',NULL),(3,'Programación equipos',NULL),(4,'Solicitudes de servicio',NULL);
/*!40000 ALTER TABLE `pag_tipo_doc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_falla`
--

DROP TABLE IF EXISTS `pag_tipo_falla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_falla` (
  `tfa_id` int(11) NOT NULL AUTO_INCREMENT,
  `tfa_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tfa_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_falla`
--

LOCK TABLES `pag_tipo_falla` WRITE;
/*!40000 ALTER TABLE `pag_tipo_falla` DISABLE KEYS */;
INSERT INTO `pag_tipo_falla` VALUES (1,'Mecanica',NULL),(2,'Hidraulica',NULL);
/*!40000 ALTER TABLE `pag_tipo_falla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_herramienta`
--

DROP TABLE IF EXISTS `pag_tipo_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_herramienta` (
  `ther_id` int(11) NOT NULL AUTO_INCREMENT,
  `ther_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ther_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_herramienta`
--

LOCK TABLES `pag_tipo_herramienta` WRITE;
/*!40000 ALTER TABLE `pag_tipo_herramienta` DISABLE KEYS */;
INSERT INTO `pag_tipo_herramienta` VALUES (1,'Mecanica',NULL),(2,'Electrica',NULL);
/*!40000 ALTER TABLE `pag_tipo_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_mantenimiento`
--

DROP TABLE IF EXISTS `pag_tipo_mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_mantenimiento` (
  `tman_id` int(11) NOT NULL AUTO_INCREMENT,
  `tman_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_mantenimiento`
--

LOCK TABLES `pag_tipo_mantenimiento` WRITE;
/*!40000 ALTER TABLE `pag_tipo_mantenimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_tipo_mantenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_medidor`
--

DROP TABLE IF EXISTS `pag_tipo_medidor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_medidor` (
  `tmed_id` int(11) NOT NULL AUTO_INCREMENT,
  `tmed_nombre` varchar(45) NOT NULL,
  `tmed_descripcion` varchar(45) NOT NULL,
  `tmed_acronimo` varchar(45) NOT NULL,
  `tmed_estado` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tmed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_medidor`
--

LOCK TABLES `pag_tipo_medidor` WRITE;
/*!40000 ALTER TABLE `pag_tipo_medidor` DISABLE KEYS */;
INSERT INTO `pag_tipo_medidor` VALUES (1,'Kilometros','Kilometros por hora','Km','',NULL);
/*!40000 ALTER TABLE `pag_tipo_medidor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_trabajo`
--

DROP TABLE IF EXISTS `pag_tipo_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_trabajo` (
  `ttra_id` int(11) NOT NULL AUTO_INCREMENT,
  `ttra_descripcion` varchar(100) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ttra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_trabajo`
--

LOCK TABLES `pag_tipo_trabajo` WRITE;
/*!40000 ALTER TABLE `pag_tipo_trabajo` DISABLE KEYS */;
INSERT INTO `pag_tipo_trabajo` VALUES (1,'Hidraulico',NULL),(2,'Limpieza',NULL);
/*!40000 ALTER TABLE `pag_tipo_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_unidad_medida`
--

DROP TABLE IF EXISTS `pag_unidad_medida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_unidad_medida` (
  `umed_id` int(11) NOT NULL AUTO_INCREMENT,
  `umed_descripcion` varchar(20) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`umed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_unidad_medida`
--

LOCK TABLES `pag_unidad_medida` WRITE;
/*!40000 ALTER TABLE `pag_unidad_medida` DISABLE KEYS */;
INSERT INTO `pag_unidad_medida` VALUES (1,'Litro',NULL),(2,'Centrimetros cúbicos',NULL),(3,'Gramos',NULL),(4,'Libra',NULL);
/*!40000 ALTER TABLE `pag_unidad_medida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_usuario`
--

DROP TABLE IF EXISTS `pag_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_usuario` (
  `per_id` bigint(20) NOT NULL,
  `usu_usuario` varchar(45) NOT NULL,
  `usu_clave` varchar(45) NOT NULL,
  `usu_estado` varchar(45) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`per_id`),
  UNIQUE KEY `usu_usuario_UNIQUE` (`usu_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_usuario`
--

LOCK TABLES `pag_usuario` WRITE;
/*!40000 ALTER TABLE `pag_usuario` DISABLE KEYS */;
INSERT INTO `pag_usuario` VALUES (1143830254,'ayepes','123456','activo',1),(1144125445,'jtavera','123456','activo',1),(1144125473,'dbarona','1234','activo',1),(1151956249,'admin','0000','activo',1);
/*!40000 ALTER TABLE `pag_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-26 16:14:07
