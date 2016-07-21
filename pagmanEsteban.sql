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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
  `alma_descripcion` varchar(40) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`alma_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_almacenista`
--

LOCK TABLES `pag_almacenista` WRITE;
/*!40000 ALTER TABLE `pag_almacenista` DISABLE KEYS */;
INSERT INTO `pag_almacenista` VALUES (1,'Alvaro',NULL),(2,'Tejada',NULL),(3,'Alvaro','2016-06-17 14:07:35'),(4,'Tejada','2016-06-17 14:07:35');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_area`
--

LOCK TABLES `pag_area` WRITE;
/*!40000 ALTER TABLE `pag_area` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_cargo`
--

LOCK TABLES `pag_cargo` WRITE;
/*!40000 ALTER TABLE `pag_cargo` DISABLE KEYS */;
INSERT INTO `pag_cargo` VALUES (1,'Desarrollador de Software','0000-00-00 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_centro`
--

LOCK TABLES `pag_centro` WRITE;
/*!40000 ALTER TABLE `pag_centro` DISABLE KEYS */;
INSERT INTO `pag_centro` VALUES (1,'CDTI','Pondaje','3275647',1,'0000-00-00 00:00:00');
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
  `ciud_nombre` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ciud_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_ciudad`
--

LOCK TABLES `pag_ciudad` WRITE;
/*!40000 ALTER TABLE `pag_ciudad` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_componente`
--

LOCK TABLES `pag_componente` WRITE;
/*!40000 ALTER TABLE `pag_componente` DISABLE KEYS */;
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
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ctrmed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_controlador`
--

LOCK TABLES `pag_controlador` WRITE;
/*!40000 ALTER TABLE `pag_controlador` DISABLE KEYS */;
INSERT INTO `pag_controlador` VALUES (1,1,'costosController','mdi-editor-attach-money','Costos','Controlador de Costos',NULL),(2,2,'equiposController','mdi-hardware-desktop-windows','Equipos','Controlador de Equipos',NULL),(3,3,'herramientasController','mdi-action-perm-data-setting','Herramientas','Controlador de Herramientas',NULL),(4,4,'insumosController','mdi-maps-local-gas-station','Insumos','Controlador de Insumos',NULL),(5,5,'localizacionController','mdi-communication-location-on','Localizacion','Controlador de Localizacion',NULL),(6,6,'medicionesController','mdi-av-timer','Mediciones','Controlador de Mediciones',NULL),(7,7,'medidoresController','mdi-image-timer','Medidor','Controlador de Medidores',NULL),(8,8,'otController','mdi-action-assignment','Ordenes de trabajo','Controlador de ot',NULL),(9,9,'permisosController','mdi-action-lock','Permisos','Controlador de Permisos',NULL),(10,10,'personasController','mdi-social-person-outline','Personas','Controlador de Personas',NULL),(11,11,'programacionController','mdi-editor-insert-invitation','Programacion','Controlador de Programacion',NULL),(12,12,'rolesController','mdi-social-group','Roles','Controlador de Roles',NULL),(13,13,'usuariosController','mdi-action-account-circle','Usuarios','Controlador de Usuarios',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_departamento`
--

LOCK TABLES `pag_departamento` WRITE;
/*!40000 ALTER TABLE `pag_departamento` DISABLE KEYS */;
INSERT INTO `pag_departamento` VALUES (1,'VALLE DEL CAUCA',0,'0000-00-00 00:00:00');
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
  KEY `est_id` (`est_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
  PRIMARY KEY (`detprog_id`),
  KEY `proequi_id` (`proequi_id`),
  KEY `ttra_id` (`ttra_id`),
  KEY `equi_id` (`equi_id`),
  KEY `comp_id` (`comp_id`),
  KEY `priotra_id` (`priotra_id`),
  KEY `tar_id` (`tar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_det_programacion`
--

LOCK TABLES `pag_det_programacion` WRITE;
/*!40000 ALTER TABLE `pag_det_programacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_det_programacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_det_rol_funcion`
--

DROP TABLE IF EXISTS `pag_det_rol_funcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_det_rol_funcion` (
  `drolfunc_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`drolfunc_id`),
  KEY `rol_id` (`rol_id`),
  KEY `func_id` (`func_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_det_rol_funcion`
--

LOCK TABLES `pag_det_rol_funcion` WRITE;
/*!40000 ALTER TABLE `pag_det_rol_funcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_det_rol_funcion` ENABLE KEYS */;
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
  KEY `comp_id` (`comp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
  `cen_id` int(11) NOT NULL,
  `equi_foto` varchar(100) NOT NULL,
  `tmed_id` int(11) NOT NULL,
  `equi_valor_tmed` int(11) NOT NULL,
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
  KEY `cen_id` (`cen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_equipo`
--

LOCK TABLES `pag_equipo` WRITE;
/*!40000 ALTER TABLE `pag_equipo` DISABLE KEYS */;
INSERT INTO `pag_equipo` VALUES ('1',1144125473,'Torno CNC',1,'',1,1,'Mazda','Mazda','Mazda','Mazda 123','Cali','2016-03-01','2016-03-02','2016-03-31',1,1,'0000-00-00 00:00:00');
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_equipo_componente`
--

LOCK TABLES `pag_equipo_componente` WRITE;
/*!40000 ALTER TABLE `pag_equipo_componente` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
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
  PRIMARY KEY (`est_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_estado`
--

LOCK TABLES `pag_estado` WRITE;
/*!40000 ALTER TABLE `pag_estado` DISABLE KEYS */;
INSERT INTO `pag_estado` VALUES (1,'Activo',1,'0000-00-00 00:00:00'),(2,'Inactivo',1,'0000-00-00 00:00:00'),(3,'Creada',2,NULL),(4,'En ejecuci├│n',2,NULL),(5,'Gestionada',2,NULL),(6,'Cerrada',2,NULL),(7,'Por atender',4,NULL),(8,'Atendida',4,NULL),(9,'Cerrada',3,NULL),(10,'Activo',3,NULL),(11,'Inactivo',3,NULL);
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
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`func_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_funcion`
--

LOCK TABLES `pag_funcion` WRITE;
/*!40000 ALTER TABLE `pag_funcion` DISABLE KEYS */;
INSERT INTO `pag_funcion` VALUES (1,1,'crear','Crear Costos','Crear Costos',NULL),(2,1,'editar','Editar Costos','Editar Costos',NULL),(3,1,'eliminar','Eliminar Costos','Eliminar Costos',NULL),(4,1,'listar','Listar Costos','Listar Costos',NULL),(5,1,'consultar','Consultar Costos','Consultar Costos',NULL),(6,2,'crear','Crear Equipos','Crear Equipos',NULL),(7,2,'editar','Editar Equipos','Editar Equipos ',NULL),(8,2,'eliminar','Eliminar Equipos','Eliminar Equipos',NULL),(9,2,'Listar','Listar Equipos','Listar Equipos',NULL),(10,2,'Consultar','Consultar Equipos','Consultar Equipos',NULL),(11,3,'crear','Crear Herramientas','Crear Herramientas',NULL),(12,3,'editar','Editar Herramientas','Editar Herramientas',NULL),(13,3,'eliminar','Eliminar Herramientas','Eliminar Herramientas',NULL),(14,3,'Listar','Listar Herramientas','Listar Herramientas',NULL),(15,3,'Consultar','Consultar Herramientas','Consultar Herramientas',NULL),(16,4,'crear','Crear Insumos','Crear Insumos',NULL),(17,4,'editar','Editar Insumos','Editar Insumos',NULL),(18,4,'eliminar','Eliminar Insumos','Eliminar Insumos',NULL),(19,4,'Listar','Listar Insumos','Listar Insumos',NULL),(20,4,'Consultar','Consultar Insumos','Consultar Insumos',NULL),(21,5,'crear','Crear Localizacion','Crear Localizacion',NULL),(22,5,'editar','Editar Localizacion','Editar Localizacion',NULL),(23,5,'eliminar','Eliminar Localizacion','Eliminar Localizacion',NULL),(24,5,'Listar','Listar Localizacion','Listar Localizacion',NULL),(25,5,'Consultar','Consultar Localizacion','Consultar Localizacion',NULL),(26,6,'crear','Crear Mediciones','Crear Mediciones',NULL),(27,6,'editar','Editar Mediciones','Editar Mediciones',NULL),(28,6,'eliminar','Eliminar Mediciones','Eliminar Mediciones',NULL),(29,6,'Listar','Listar Mediciones','Listar Mediciones',NULL),(30,6,'Consultar','Consultar Mediciones','Consultar Mediciones',NULL),(31,7,'crear','Crear Medidores','Crear Medidores',NULL),(32,7,'editar','Editar Medidores','Editar Medidores',NULL),(33,7,'eliminar','Eliminar Medidores','Eliminar Medidores',NULL),(34,7,'Listar','Listar Medidores','Listar Medidores',NULL),(35,7,'Consultar','Consultar Medidores','Consultar Medidores',NULL),(36,8,'crear','Crear ot','Crear ot',NULL),(37,8,'editar','Editar ot','Editar ot',NULL),(38,8,'eliminar','Eliminar ot','Eliminar ot',NULL),(39,8,'Listar','Listar ot','Listar ot',NULL),(40,8,'Consultar','Consultar ot','Consultar ot',NULL),(41,9,'crear','Crear Permisos','Crear Permisos',NULL),(42,9,'editar','Editar Permisos','Editar Permisos',NULL),(43,9,'eliminar','Eliminar Permisos','Eliminar Permisos',NULL),(44,9,'listar','Listar Permisos','Listar Permisos',NULL),(45,9,'Consultar','Consultar Permisos','Consultar Permisos',NULL),(46,10,'crear','Crear Personas','Crear Personas',NULL),(47,10,'editar','Editar Personas','Editar Personas',NULL),(48,10,'eliminar','Eliminar Personas','Eliminar Personas',NULL),(49,10,'Listar','Listar Personas','Listar Personas',NULL),(50,10,'Consultar','Consultar Personas','Consultar Personas',NULL),(51,11,'crear','Crear Programacion','Crear Programacion',NULL),(52,11,'editar','Editar Programacion','Editar Programacion',NULL),(53,11,'listar','Listar Programacion','Listar Programacion',NULL),(54,11,'eliminar','Eliminar Programacion','Eliminar Programacion',NULL),(55,12,'crear','Crear Rol','Crear Rol',NULL),(56,12,'editar','Editar Rol','Editar Rol',NULL),(57,12,'eliminar','ELiminar Rol','ELiminar Rol',NULL),(58,12,'listar','Listar roles','Lista los roles',NULL),(59,13,'crear','Crear Usuarios','Crear Usuarios',NULL),(60,13,'editar','Editar Usuarios','Editar Usuarios',NULL),(61,13,'listar','Listar Usuarios','Listar Usuarios',NULL),(62,13,'eliminar','Eliminar Usuarios','Eliminar Usuarios',NULL);
/*!40000 ALTER TABLE `pag_funcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_herramienta`
--

DROP TABLE IF EXISTS `pag_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_herramienta` (
  `her_id` varchar(60) NOT NULL,
  `her_nombre` varchar(45) NOT NULL,
  `her_descripcion` varchar(45) NOT NULL,
  `ther_id` int(11) NOT NULL,
  `her_fecha_ingreso` varchar(20) NOT NULL,
  `est_id` int(11) NOT NULL,
  `her_imagen` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`her_id`),
  KEY `ther_id` (`ther_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_herramienta`
--

LOCK TABLES `pag_herramienta` WRITE;
/*!40000 ALTER TABLE `pag_herramienta` DISABLE KEYS */;
INSERT INTO `pag_herramienta` VALUES ('nueva_herramienta_p','nueva herramienta prueba','herramienta de prueba',3,'14 July, 2016',0,'Koala.jpg',NULL),('pc_andres_41xn_HP','HPandres prueba','herramienta de prueba',1,'14 June, 2016',0,'portatilHP.jpg',NULL);
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_insumo`
--

LOCK TABLES `pag_insumo` WRITE;
/*!40000 ALTER TABLE `pag_insumo` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
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
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`jor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_jornada`
--

LOCK TABLES `pag_jornada` WRITE;
/*!40000 ALTER TABLE `pag_jornada` DISABLE KEYS */;
INSERT INTO `pag_jornada` VALUES (1,'Ma├▒ana',NULL),(2,'Tarde',NULL),(3,'noche',NULL);
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
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_modulo`
--

LOCK TABLES `pag_modulo` WRITE;
/*!40000 ALTER TABLE `pag_modulo` DISABLE KEYS */;
INSERT INTO `pag_modulo` VALUES (1,'Costos','mdi-editor-attach-money','principal','Modulo de Costos',NULL),(2,'Equipos','mdi-hardware-desktop-windows','principal','Modulo de Equipos',NULL),(3,'Herramientas','mdi-action-perm-data-setting','principal','Modulo de Herramientas',NULL),(4,'Insumos','mdi-maps-local-gas-station','principal','Modulo de Insumos',NULL),(5,'Localizacion','mdi-communication-location-on','principal','Modulo de Localizacion',NULL),(6,'Mediciones','mdi-av-timer','principal','Modulo de Mediciones',NULL),(7,'Medidores','mdi-image-timer','principal','Modulo de Medidores',NULL),(8,'OT','mdi-action-assignment','principal','Modulo de OT',NULL),(9,'Permisos','mdi-action-lock','configuracion','Modulo de Permisos',NULL),(10,'Personas','mdi-social-person-outline','configuracion','Modulo de Personas',NULL),(11,'Programacion','mdi-editor-insert-invitation','principal','Modulo Programacion',NULL),(12,'Roles','mdi-social-group','configuracion','Modulo asignar Roles a un usuario',NULL),(13,'Usuarios','mdi-action-account-circle','configuracion','Modulo Usuarios',NULL);
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
  `ot_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `per_id_mantenedor` int(11) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `tman_id` int(11) NOT NULL,
  `ot_num_doc` int(11) NOT NULL,
  `tdoc_id` int(11) NOT NULL,
  `ot_observacion` varchar(100) NOT NULL,
  `est_id` int(11) NOT NULL,
  `ot_fecha_ini` date DEFAULT NULL,
  `ot_ayudantes` varchar(100) DEFAULT NULL,
  `per_id_responsables` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`ot_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_orden_trabajo`
--

LOCK TABLES `pag_orden_trabajo` WRITE;
/*!40000 ALTER TABLE `pag_orden_trabajo` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_permisos`
--

LOCK TABLES `pag_permisos` WRITE;
/*!40000 ALTER TABLE `pag_permisos` DISABLE KEYS */;
INSERT INTO `pag_permisos` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,1),(5,5,1),(6,6,1),(7,7,1),(8,8,1),(9,9,1),(10,10,1),(11,11,1),(12,12,1),(13,13,1),(14,14,1),(15,15,1),(16,16,1),(17,17,1),(18,18,1),(19,19,1),(20,20,1),(21,21,1),(22,22,1),(23,23,1),(24,24,1),(25,25,1),(26,26,1),(27,27,1),(28,28,1),(29,29,1),(30,30,1),(31,31,1),(32,32,1),(33,33,1),(34,34,1),(35,35,1),(36,36,1),(37,37,1),(38,38,1),(39,39,1),(40,40,1),(41,41,1),(42,42,1),(43,43,1),(44,44,1),(45,45,1),(46,46,1),(47,47,1),(48,48,1),(49,49,1),(50,50,1),(51,51,1),(52,52,1),(53,53,1),(54,54,1),(55,55,1),(56,56,1),(57,57,1),(58,58,1),(59,59,1),(60,60,1),(61,61,1),(62,62,1);
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_persona`
--

LOCK TABLES `pag_persona` WRITE;
/*!40000 ALTER TABLE `pag_persona` DISABLE KEYS */;
INSERT INTO `pag_persona` VALUES (1144125472,'Jhonatan','Tavera','3124534','3128546345','tatan@gmail.com','Cra 45 45 567',1,300000,1,1,'persona',NULL),(1144125473,'David Fernando','Barona','4434564','3185235463','dferbac@gmail.com','Calle 8A 45 106',1,200000,1,1,'usuario del sistema',NULL),(1151956249,'Super','Administrador','3845030','3135396721','esteban@gmail.com',NULL,1,5000,1,1,NULL,NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
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
  `priotra_id` int(11) NOT NULL,
  `priotra_descripcion` varchar(20) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`priotra_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_prioridad_trabajo`
--

LOCK TABLES `pag_prioridad_trabajo` WRITE;
/*!40000 ALTER TABLE `pag_prioridad_trabajo` DISABLE KEYS */;
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
  `proequi_fecha` date NOT NULL,
  `cen_id` int(11) NOT NULL,
  `proequi_fecha_inicio` date NOT NULL,
  `tman_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`proequi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_programacion_equipo`
--

LOCK TABLES `pag_programacion_equipo` WRITE;
/*!40000 ALTER TABLE `pag_programacion_equipo` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_regional`
--

LOCK TABLES `pag_regional` WRITE;
/*!40000 ALTER TABLE `pag_regional` DISABLE KEYS */;
INSERT INTO `pag_regional` VALUES (1,'VALLE DEL CAUCA','0000-00-00 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_rol`
--

LOCK TABLES `pag_rol` WRITE;
/*!40000 ALTER TABLE `pag_rol` DISABLE KEYS */;
INSERT INTO `pag_rol` VALUES (1,'Administrador','Tiene acceso a todo el sistema','0000-00-00 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_solicitud_servicio`
--

LOCK TABLES `pag_solicitud_servicio` WRITE;
/*!40000 ALTER TABLE `pag_solicitud_servicio` DISABLE KEYS */;
INSERT INTO `pag_solicitud_servicio` VALUES (1,'2016-03-28 18:50:07',1,'1','Descripci├│n',1144125473,1,1,NULL),(2,'2016-03-30 15:34:55',1,'1','Calibrar',1144125473,2,1,NULL);
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tarea`
--

LOCK TABLES `pag_tarea` WRITE;
/*!40000 ALTER TABLE `pag_tarea` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_tarea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_de_equipo`
--

DROP TABLE IF EXISTS `pag_tipo_de_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_de_equipo` (
  `tequi_id` int(11) NOT NULL,
  `tequi_descripcion` varchar(45) NOT NULL,
  `cp_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`tequi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_de_equipo`
--

LOCK TABLES `pag_tipo_de_equipo` WRITE;
/*!40000 ALTER TABLE `pag_tipo_de_equipo` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_doc`
--

LOCK TABLES `pag_tipo_doc` WRITE;
/*!40000 ALTER TABLE `pag_tipo_doc` DISABLE KEYS */;
INSERT INTO `pag_tipo_doc` VALUES (1,'General',NULL),(2,'Orden de trabajo',NULL),(3,'Programaci├│n equipos',NULL),(4,'Solicitudes de servicio',NULL),(5,'Equipo',NULL);
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_falla`
--

LOCK TABLES `pag_tipo_falla` WRITE;
/*!40000 ALTER TABLE `pag_tipo_falla` DISABLE KEYS */;
INSERT INTO `pag_tipo_falla` VALUES (1,'Mecanica','0000-00-00 00:00:00'),(2,'Hidraulica','0000-00-00 00:00:00');
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_herramienta`
--

LOCK TABLES `pag_tipo_herramienta` WRITE;
/*!40000 ALTER TABLE `pag_tipo_herramienta` DISABLE KEYS */;
INSERT INTO `pag_tipo_herramienta` VALUES (1,'Digitales',NULL),(2,'Analogas',NULL),(3,'Pesadas',NULL),(4,'otras..',NULL);
/*!40000 ALTER TABLE `pag_tipo_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pag_tipo_mantenimiento`
--

DROP TABLE IF EXISTS `pag_tipo_mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pag_tipo_mantenimiento` (
  `ther_id` int(11) NOT NULL AUTO_INCREMENT,
  `ther_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ther_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_mantenimiento`
--

LOCK TABLES `pag_tipo_mantenimiento` WRITE;
/*!40000 ALTER TABLE `pag_tipo_mantenimiento` DISABLE KEYS */;
INSERT INTO `pag_tipo_mantenimiento` VALUES (1,'Digitales','2016-06-03 14:17:23'),(2,'Analogas','2016-06-03 14:17:23'),(3,'Pesadas','2016-06-03 14:17:23'),(4,'otras..','2016-06-03 14:17:23');
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_medidor`
--

LOCK TABLES `pag_tipo_medidor` WRITE;
/*!40000 ALTER TABLE `pag_tipo_medidor` DISABLE KEYS */;
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
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`ttra_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_tipo_trabajo`
--

LOCK TABLES `pag_tipo_trabajo` WRITE;
/*!40000 ALTER TABLE `pag_tipo_trabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `pag_tipo_trabajo` ENABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pag_usuario`
--

LOCK TABLES `pag_usuario` WRITE;
/*!40000 ALTER TABLE `pag_usuario` DISABLE KEYS */;
INSERT INTO `pag_usuario` VALUES (1144125473,'dbarona','1234','activo',1),(1151956249,'admin','0000','activo',1);
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

-- Dump completed on 2016-07-20 15:31:40
