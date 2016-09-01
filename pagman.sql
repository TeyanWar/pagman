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
-- Base de datos: `pagman`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_almacen`
--

CREATE TABLE `pag_almacen` (
  `alm_id` int(11) NOT NULL,
  `alm_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_almacenista`
--

CREATE TABLE `pag_almacenista` (
  `alma_id` int(11) NOT NULL,
  `alma_nombre` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pag_almacenista`
--

INSERT INTO `pag_almacenista` (`alma_id`, `alma_nombre`, `estado`) VALUES
(1, 'Alvaro', NULL),
(2, 'Tejada', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_area`
--

CREATE TABLE `pag_area` (
  `area_id` int(11) NOT NULL,
  `area_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_area`
--

INSERT INTO `pag_area` (`area_id`, `area_descripcion`, `estado`) VALUES
(1, 'Mecatrónica', NULL),
(2, 'Refrigeración', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_campos_personalizados`
--

CREATE TABLE `pag_campos_personalizados` (
  `cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_cargo`
--

CREATE TABLE `pag_cargo` (
  `car_id` int(11) NOT NULL,
  `car_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_cargo`
--

INSERT INTO `pag_cargo` (`car_id`, `car_descripcion`, `estado`) VALUES
(1, 'Instructor', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_centro`
--

CREATE TABLE `pag_centro` (
  `cen_id` int(11) NOT NULL,
  `cen_codigo` varchar(10) NOT NULL,
  `cen_nombre` varchar(45) NOT NULL,
  `cen_dir` varchar(45) NOT NULL,
  `cen_telefono` varchar(45) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_centro`
--

INSERT INTO `pag_centro` (`cen_id`, `cen_codigo`, `cen_nombre`, `cen_dir`, `cen_telefono`, `reg_id`, `estado`) VALUES
(1, '9229', 'CDTI', 'Pondaje', '3275647', 3, NULL),
(2, '4893', 'CEAI', 'Salomia', '2345', 4, NULL),
(3, '7846', 'ASTIN', 'Salomia', '5678', 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_ciudad`
--

CREATE TABLE `pag_ciudad` (
  `ciud_id` int(11) NOT NULL,
  `ciud_nombre` varchar(45) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pag_ciudad`
--

INSERT INTO `pag_ciudad` (`ciud_id`, `ciud_nombre`, `dept_id`, `estado`) VALUES
(1, 'Cali', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_componente`
--

CREATE TABLE `pag_componente` (
  `comp_id` varchar(45) NOT NULL,
  `comp_descripcion` varchar(100) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_componente`
--

INSERT INTO `pag_componente` (`comp_id`, `comp_descripcion`, `estado`) VALUES
('1', 'Polea', NULL),
('2', 'Pi&ntilde;&oacute;n', NULL),
('9999', 'INDEFINIDO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_controlador`
--

CREATE TABLE `pag_controlador` (
  `cont_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `cont_nombre` varchar(40) NOT NULL,
  `cont_icono` varchar(40) NOT NULL,
  `cont_display` varchar(40) NOT NULL,
  `cont_descripcion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_controlador`
--

INSERT INTO `pag_controlador` (`cont_id`, `mod_id`, `cont_nombre`, `cont_icono`, `cont_display`, `cont_descripcion`) VALUES
(36, 24, 'programacionController', 'mdi-editor-insert-invitation', 'Programacion', 'Controlador de Programacion'),
(35, 23, 'solicitudesController', 'mdi-communication-quick-contacts-mail', 'Solicitudes', 'Controlador de solicitudes'),
(34, 23, 'otController', 'mdi-action-assignment', 'Ordenes', 'Controlador de ot'),
(33, 22, 'centroController', 'mdi-image-center-focus-strong', 'Centros', 'Controlador de Centros'),
(32, 22, 'ciudadController', 'mdi-image-assistant-photo', 'Ciudades', 'Controlador de Ciudades'),
(31, 22, 'departamentoController', 'mdi-image-filter-hdr', 'Departamentos', 'Controlador de Departamentos'),
(30, 22, 'regionalController', 'mdi-communication-location-on', 'Regionales', 'Controlador de Regionales'),
(29, 21, 'costosController', 'mdi-editor-attach-money', 'Costos', 'Controlador de Costos'),
(28, 20, 'rolesController', 'mdi-social-group', 'Roles', 'Controlador de Roles'),
(27, 19, 'insumosController', 'mdi-maps-local-gas-station', 'Insumos', 'Controlador de Insumos'),
(26, 18, 'tipoEquipoController', 'mdi-hardware-phonelink', 'Tipos de equipo', 'Controlador de Tipos de equipos'),
(25, 18, 'equiposController', 'mdi-hardware-desktop-windows', 'Equipos', 'Controlador de Equipos'),
(24, 17, 'permisosController', 'mdi-action-lock', 'Permisos', 'Controlador de Permisos'),
(23, 16, 'medidoresController', 'mdi-image-timer', 'Medidor', 'Controlador de Medidores'),
(22, 15, 'personasController', 'mdi-action-perm-identity', 'Personas', 'Controlador de personas'),
(21, 15, 'usuariosController', 'mdi-action-account-circle', 'Usuarios', 'Controlador de Usuarios'),
(37, 24, 'ordenController', 'mdi-action-description', 'Ordenes Prog', 'Controlador de ordenprog'),
(38, 25, 'prestamoController', 'mdi-action-shopping-cart', 'Prestamo', 'Controlador de Prestamos'),
(39, 26, 'medicionesController', 'mdi-av-timer', 'Mediciones', 'Controlador de Mediciones'),
(40, 27, 'herramientasController', 'mdi-action-wallet-travel', 'Herramientas', 'Controlador de Herramientas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_control_medidas`
--

CREATE TABLE `pag_control_medidas` (
  `ctrmed_id` int(11) NOT NULL,
  `ctrmed_fecha` varchar(15) NOT NULL,
  `ctrmed_medida_actual` varchar(100) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `per_id` bigint(20) NOT NULL,
  `tmed_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_departamento`
--

CREATE TABLE `pag_departamento` (
  `dept_id` int(11) NOT NULL,
  `dept_nombre` varchar(45) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_departamento`
--

INSERT INTO `pag_departamento` (`dept_id`, `dept_nombre`, `reg_id`, `estado`) VALUES
(1, 'VALLE DEL CAUCA', 0, NULL),
(2, 'Buenaventura', 3, NULL),
(3, 'Atlantico', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_det_equipo_medidor`
--

CREATE TABLE `pag_det_equipo_medidor` (
  `dequimed_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `tmed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_det_herramienta_ot`
--

CREATE TABLE `pag_det_herramienta_ot` (
  `dherot_id` int(11) NOT NULL,
  `ot_id` int(11) NOT NULL,
  `her_id` varchar(40) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_det_insumo_ot`
--

CREATE TABLE `pag_det_insumo_ot` (
  `dinsot_id` int(11) NOT NULL,
  `ot_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_det_prestamo_herramienta`
--

CREATE TABLE `pag_det_prestamo_herramienta` (
  `detph_id` int(11) NOT NULL,
  `pher_id` int(11) NOT NULL,
  `her_id` varchar(40) NOT NULL,
  `detph_cant_solicita` int(11) NOT NULL,
  `detph_cant_entrega` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `detph_observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_det_programacion`
--

CREATE TABLE `pag_det_programacion` (
  `detprog_id` int(11) NOT NULL,
  `proequi_id` int(11) NOT NULL,
  `ttra_id` int(11) NOT NULL,
  `detprog_duracion_horas` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `priotra_id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL,
  `tmed_id` int(11) DEFAULT NULL,
  `frecuencia` int(11) DEFAULT NULL,
  `est_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_det_programacion`
--

INSERT INTO `pag_det_programacion` (`detprog_id`, `proequi_id`, `ttra_id`, `detprog_duracion_horas`, `equi_id`, `comp_id`, `priotra_id`, `tar_id`, `tmed_id`, `frecuencia`, `est_id`) VALUES
(1, 1, 1, 9, '1', '1', 1, 1, 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_equipo`
--

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
  `equi_fecha_compra` varchar(15) NOT NULL,
  `equi_fecha_instalacion` varchar(15) NOT NULL,
  `equi_vence_garantia` varchar(15) NOT NULL,
  `area_id` int(11) NOT NULL,
  `tequi_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_equipo`
--

INSERT INTO `pag_equipo` (`equi_id`, `per_id`, `equi_nombre`, `est_id`, `cen_id`, `equi_foto`, `tmed_id`, `equi_valor_tmed`, `equi_fabricante`, `equi_marca`, `equi_modelo`, `equi_serie`, `equi_ubicacion`, `equi_fecha_compra`, `equi_fecha_instalacion`, `equi_vence_garantia`, `area_id`, `tequi_id`, `estado`) VALUES
('0123', 1143830254, 'Fresadora', 1, 2, '', NULL, NULL, 'Asus', 'wert', '2016', '12245', 'Cali', '2016-04-27', '2016-04-27', '2016-10-25', 1, 1, NULL),
('1', 1144125473, 'Torno CNC', 0, 1, '', 1, 1, 'Mazda', 'Mazda', 'Mazda', 'Mazda 123', 'Cali', '2016-03-01', '2016-03-02', '2016-03-31', 1, 1, NULL),
('EP_003', 1144125472, 'Equipo de computo MAC', 1, 1, '/srv/www/htdocs/localhost/pagman/web/media/img/Equipos/equipo-EP_003', NULL, NULL, 'HP', 'HP', 'HP', '3456', 'Salomia', '2016-02-02', '2016-03-02', '2018-02-02', 1, 2, NULL),
('PC_002', 1144125473, 'Portatil Linux', 1, 1, '/srv/www/htdocs/localhost/pagman/web/media/img/Equipos/equipo-PC_002', NULL, NULL, 'Lenovo', 'Lenovo', 'Lenovo', '7431', 'Sena', '2016-04-08', '2016-04-08', '2016-04-15', 2, 1, NULL),
('TC001', 1144125473, 'Torno Convencional', 1, 1, '', NULL, NULL, 'Tornos Technologies IbÃ©rica, S.A', 'Valor', '2016', '123456', 'CDTI', '2014-04-12', '2014-05-12', '2020-04-12', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_equipo_componente`
--

CREATE TABLE `pag_equipo_componente` (
  `equicomp_id` int(11) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pag_equipo_componente`
--

INSERT INTO `pag_equipo_componente` (`equicomp_id`, `comp_id`, `equi_id`, `estado`) VALUES
(1, '1', '1', NULL),
(2, '2', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_equipo_cp`
--

CREATE TABLE `pag_equipo_cp` (
  `equicp_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `cp_id` int(11) NOT NULL,
  `equicp_valor` varchar(100) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_equipo_planos`
--

CREATE TABLE `pag_equipo_planos` (
  `equipla_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `equipla_descripcion` varchar(100) NOT NULL,
  `equipla_ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_estado`
--

CREATE TABLE `pag_estado` (
  `est_id` int(11) NOT NULL,
  `est_descripcion` varchar(45) NOT NULL,
  `tdoc_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_estado`
--

INSERT INTO `pag_estado` (`est_id`, `est_descripcion`, `tdoc_id`, `estado`) VALUES
(1, 'Activo', 1, NULL),
(2, 'Inactivo', 1, NULL),
(3, 'Creada', 2, NULL),
(4, 'En ejecución', 2, NULL),
(5, 'Gestionada', 2, NULL),
(6, 'Cerrada', 2, NULL),
(7, 'Por atender', 4, NULL),
(8, 'Atendida', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_funcion`
--

CREATE TABLE `pag_funcion` (
  `func_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `func_nombre` varchar(40) NOT NULL,
  `func_display` varchar(40) NOT NULL,
  `func_descripcion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_funcion`
--

INSERT INTO `pag_funcion` (`func_id`, `cont_id`, `func_nombre`, `func_display`, `func_descripcion`) VALUES
(129, 36, 'crear', 'Crear Programacion', 'Crear Programacion'),
(128, 35, 'listar', 'Listar solicitud', 'Listar solicitud'),
(127, 35, 'eliminar', 'Eliminar solicitud', 'Eliminar solicitud'),
(126, 35, 'editar', 'Editar solicitud', 'Editar solicitud'),
(125, 35, 'crear', 'Crear solicitud', 'Crear solicitud de servicio'),
(124, 34, 'listar', 'Listar ot', 'Listar ot'),
(123, 34, 'eliminar', 'Eliminar ot', 'Eliminar ot'),
(122, 34, 'editar', 'Editar ot', 'Editar ot'),
(121, 34, 'crear', 'Crear ot', 'Crear ot'),
(120, 33, 'listar', 'Listar Centros', 'Listar Centros'),
(119, 33, 'eliminar', 'Eliminar Centro', 'Eliminar Centro'),
(118, 33, 'editar', 'Editar Centro', 'Editar Centro'),
(117, 33, 'crear', 'Crear Centro', 'Crear Centro'),
(116, 32, 'listar', 'Listar Ciudades', 'Listar Ciudades'),
(115, 32, 'eliminar', 'Eliminar Ciudad', 'Eliminar Ciudad'),
(114, 32, 'editar', 'Editar Ciudad', 'Editar Ciudad'),
(113, 32, 'crear', 'Crear Ciudad', 'Crear Ciudad'),
(112, 31, 'listar', 'Listar Departamentos', 'Listar '),
(111, 31, 'eliminar', 'Eliminar Departamento', 'Eliminar Departamento'),
(110, 31, 'editar', 'Editar Departamento', 'Editar Departamento'),
(109, 31, 'crear', 'Crear Departamento', 'Crear Departamento'),
(108, 30, 'listar', 'Listar Regionales', 'Listar Regionales'),
(107, 30, 'eliminar', 'Eliminar Regional', 'Eliminar Regional'),
(106, 30, 'editar', 'Editar Regional', 'Editar Regional'),
(105, 30, 'crear', 'Crear Regional', 'Crear Regional'),
(104, 29, 'listar', 'Listar Costos', 'Listar Costos'),
(103, 29, 'eliminar', 'Eliminar Costos', 'Eliminar Costos'),
(102, 29, 'editar', 'Editar Costos', 'Editar Costos'),
(101, 29, 'crear', 'Crear Costos', 'Crear Costos'),
(100, 28, 'eliminar', 'ELiminar Rol', 'ELiminar Rol'),
(99, 28, 'listar', 'Listar roles', 'Lista los roles'),
(98, 28, 'editar', 'Editar Rol', 'Editar Rol'),
(97, 28, 'crear', 'Crear Rol', 'Crear Rol'),
(96, 27, 'Listar', 'Listar Insumos', 'Listar Insumos'),
(95, 27, 'eliminar', 'Eliminar Insumos', 'Eliminar Insumos'),
(94, 27, 'editar', 'Editar Insumos', 'Editar Insumos'),
(93, 27, 'crear', 'Crear Insumos', 'Crear Insumos'),
(92, 26, 'listar', 'Listar Tipos de equipos', 'Listar Tipos de equipos'),
(91, 26, 'eliminar', 'Eliminar Tipo equipo', 'Eliminar Tipo equipo'),
(90, 26, 'editar', 'Editar Tipo equipo', 'Editar Tipo equipo'),
(89, 26, 'crear', 'Crear Tipo equipo', 'Crear Tipo equipo'),
(88, 25, 'Listar', 'Listar Equipos', 'Listar Equipos'),
(87, 25, 'eliminar', 'Eliminar Equipos', 'Eliminar Equipos'),
(86, 25, 'editar', 'Editar Equipos', 'Editar Equipos '),
(85, 25, 'crear', 'Crear Equipos', 'Crear Equipos'),
(84, 24, 'crear', 'Asignar', 'Asignar Permisos'),
(83, 23, 'Listar', 'Listar Medidores', 'Listar Medidores'),
(82, 23, 'eliminar', 'Eliminar Medidores', 'Eliminar Medidores'),
(81, 23, 'editar', 'Editar Medidores', 'Editar Medidores'),
(80, 23, 'crear', 'Crear Medidores', 'Crear Medidores'),
(79, 22, 'crear', 'Importar Archivo Plano', 'Importar Plano'),
(78, 21, 'eliminar', 'Eliminar Usuario', 'Eliminar Usuario'),
(77, 21, 'listar', 'Listar Usuarios', 'Listar Usuarios'),
(76, 21, 'editar', 'Editar Usuario', 'Editar Usuario'),
(75, 21, 'crear', 'Crear Usuario', 'Crear Usuario'),
(130, 36, 'editar', 'Editar Programacion', 'Editar Programacion'),
(131, 36, 'listar', 'Listar Programacion', 'Listar Programacion'),
(132, 36, 'eliminar', 'Eliminar Programacion', 'Eliminar Programacion'),
(133, 37, 'crear', 'Crear orden', 'Crear orden programada'),
(134, 38, 'crear', 'Crear Prestamos', 'Crear Prestamo'),
(135, 38, 'eliminar', 'Eliminar Prestamo', 'Eliminar Prestamo'),
(136, 38, 'Listar', 'Listar Prestamos', 'Listar Prestamos'),
(137, 39, 'crear', 'Crear Mediciones', 'Crear Mediciones'),
(138, 39, 'editar', 'Editar Mediciones', 'Editar Mediciones'),
(139, 39, 'eliminar', 'Eliminar Mediciones', 'Eliminar Mediciones'),
(140, 39, 'Listar', 'Listar Mediciones', 'Listar Mediciones'),
(141, 40, 'crear', 'Crear Herramientas', 'Crear Herramientas'),
(142, 40, 'editar', 'Editar Herramientas', 'Editar Herramientas'),
(143, 40, 'eliminar', 'Eliminar Herramientas', 'Eliminar Herramientas'),
(144, 40, 'Listar', 'Listar Herramientas', 'Listar Herramientas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_herramienta`
--

CREATE TABLE `pag_herramienta` (
  `her_id` varchar(40) NOT NULL,
  `ther_id` int(11) NOT NULL,
  `her_nombre` varchar(45) NOT NULL,
  `her_descripcion` varchar(45) NOT NULL,
  `her_fecha_ingreso` varchar(15) NOT NULL,
  `est_id` int(11) DEFAULT NULL,
  `her_imagen` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_herramienta`
--

INSERT INTO `pag_herramienta` (`her_id`, `ther_id`, `her_nombre`, `her_descripcion`, `her_fecha_ingreso`, `est_id`, `her_imagen`, `estado`) VALUES
('01', 2, 'Martillo', 'Martillo 01', '2016-08-16 21:0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_insumo`
--

CREATE TABLE `pag_insumo` (
  `ins_id` int(11) NOT NULL,
  `ins_nombre` varchar(45) NOT NULL,
  `ins_descripcion` varchar(45) NOT NULL,
  `ins_valor` int(11) NOT NULL,
  `umed_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_insumo`
--

INSERT INTO `pag_insumo` (`ins_id`, `ins_nombre`, `ins_descripcion`, `ins_valor`, `umed_id`, `estado`) VALUES
(1, 'Aceite', 'Aceite 3 en 1', 23000, 1, NULL),
(2, 'Gasolina', 'Gasolina x Litro', 21001, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_inventario`
--

CREATE TABLE `pag_inventario` (
  `inv_id` int(11) NOT NULL,
  `inv_fecha` varchar(15) NOT NULL,
  `inv_movimiento` varchar(45) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `inv_cant` int(11) NOT NULL,
  `inv_saldo` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_jornada`
--

CREATE TABLE `pag_jornada` (
  `jor_id` int(11) NOT NULL,
  `jor_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_jornada`
--

INSERT INTO `pag_jornada` (`jor_id`, `jor_descripcion`, `estado`) VALUES
(1, 'Ma&ntilde;ana', NULL),
(2, 'Tarde', NULL),
(3, 'Noche', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_modulo`
--

CREATE TABLE `pag_modulo` (
  `mod_id` int(11) NOT NULL,
  `mod_nombre` varchar(20) NOT NULL,
  `mod_icono` varchar(40) NOT NULL,
  `mod_sitio_menu` varchar(20) NOT NULL,
  `mod_descripcion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_modulo`
--

INSERT INTO `pag_modulo` (`mod_id`, `mod_nombre`, `mod_icono`, `mod_sitio_menu`, `mod_descripcion`) VALUES
(25, 'Prestamo', 'mdi-action-shopping-cart', 'principal', 'Modulo de prestamos'),
(24, 'Programacion', 'mdi-editor-insert-invitation', 'principal', 'Modulo Programacion'),
(23, 'Ot', 'mdi-action-assignment', 'principal', 'Modulo de OT'),
(22, 'Localizacion', 'mdi-maps-my-location', 'configuracion', 'Modulo de Localizacion'),
(21, 'Costos', 'mdi-editor-attach-money', 'principal', 'Modulo de Costos'),
(20, 'Roles', 'mdi-social-group', 'configuracion', 'Modulo asignar Roles a un usuario'),
(19, 'Insumos', 'mdi-maps-local-gas-station', 'principal', 'Modulo de Insumos'),
(18, 'Equipos', 'mdi-hardware-desktop-windows', 'principal', 'Modulo de Equipos'),
(17, 'Permisos', 'mdi-action-lock', 'configuracion', 'Modulo de Permisos'),
(16, 'Medidores', 'mdi-image-timer', 'principal', 'Modulo de Medidores'),
(15, 'Usuarios', 'mdi-action-account-circle', 'configuracion', 'Modulo Usuarios'),
(26, 'Mediciones', 'mdi-av-timer', 'principal', 'Modulo de Mediciones'),
(27, 'Herramientas', 'mdi-action-wallet-travel', 'principal', 'Modulo de Herramientas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_orden_trabajo`
--

CREATE TABLE `pag_orden_trabajo` (
  `ot_id` int(11) NOT NULL,
  `ot_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ot_prioridad` varchar(30) NOT NULL,
  `ot_desc_falla` varchar(400) NOT NULL,
  `ot_fecha_inicio` varchar(15) DEFAULT NULL,
  `ot_fecha_fin` varchar(15) DEFAULT NULL,
  `ot_ayudantes` varchar(100) DEFAULT NULL,
  `ot_desc_trabajo` varchar(400) DEFAULT NULL,
  `ot_observacion` varchar(100) DEFAULT NULL,
  `est_id` int(11) NOT NULL,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `per_id` bigint(20) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_permisos`
--

CREATE TABLE `pag_permisos` (
  `perm_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_permisos`
--

INSERT INTO `pag_permisos` (`perm_id`, `func_id`, `rol_id`) VALUES
(142, 144, 1),
(141, 143, 1),
(140, 142, 1),
(139, 141, 1),
(138, 140, 1),
(137, 139, 1),
(136, 138, 1),
(135, 137, 1),
(134, 75, 1),
(133, 76, 1),
(132, 77, 1),
(131, 78, 1),
(130, 79, 1),
(129, 80, 1),
(128, 81, 1),
(127, 82, 1),
(126, 83, 1),
(125, 84, 1),
(124, 85, 1),
(123, 86, 1),
(122, 87, 1),
(121, 88, 1),
(120, 89, 1),
(119, 90, 1),
(118, 91, 1),
(117, 92, 1),
(116, 93, 1),
(115, 94, 1),
(114, 95, 1),
(113, 96, 1),
(112, 97, 1),
(111, 98, 1),
(110, 99, 1),
(109, 100, 1),
(108, 101, 1),
(107, 102, 1),
(106, 103, 1),
(105, 104, 1),
(104, 105, 1),
(103, 106, 1),
(102, 107, 1),
(101, 108, 1),
(100, 109, 1),
(99, 110, 1),
(98, 111, 1),
(97, 112, 1),
(96, 113, 1),
(95, 114, 1),
(94, 115, 1),
(93, 116, 1),
(92, 117, 1),
(91, 118, 1),
(90, 119, 1),
(89, 120, 1),
(88, 121, 1),
(87, 122, 1),
(86, 123, 1),
(85, 124, 1),
(84, 125, 1),
(83, 126, 1),
(82, 127, 1),
(81, 128, 1),
(80, 133, 1),
(79, 132, 1),
(78, 131, 1),
(77, 130, 1),
(76, 129, 1),
(75, 136, 1),
(74, 135, 1),
(73, 134, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_persona`
--

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
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_persona`
--

INSERT INTO `pag_persona` (`per_id`, `per_nombre`, `per_apellido`, `per_telefono`, `per_movil`, `per_email`, `per_direccion`, `dept_id`, `per_valor_hora`, `car_id`, `cen_id`, `per_tipo`, `estado`) VALUES
(1143830254, 'Alejandro', 'Yepes', '3243452', '3183452354', 'alejandro@gmail.com', 'Terron Colorado', 1, 28000, 1, 1, 'usuario del sistema', NULL),
(1144125445, 'Jhonatan', 'Tavera', '3213423', '3154352342', 'jtavera@gmail.com', 'Sena', 1, 23000, 1, 1, 'usuario del sistema', NULL),
(1144125472, 'Anibal', 'Silva', '3124534', '3128546345', 'silvin@gmail.com', 'Cra 45 45 567', 1, 300000, 1, 1, 'usuario del sistema', NULL),
(1144125473, 'David Fernando', 'Barona', '4434564', '3185235463', 'dferbac@gmail.com', 'Calle 8A 45 106', 1, 200000, 1, 1, 'usuario del sistema', NULL),
(1151956249, 'Super', 'Administrador', '3845030', '3135396721', 'esteban@gmail.com', NULL, 1, 5000, 1, 1, 'usuario del sistema', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_prestamo_herramienta`
--

CREATE TABLE `pag_prestamo_herramienta` (
  `pher_id` int(11) NOT NULL,
  `pher_fecha` varchar(15) NOT NULL,
  `per_id_solicita` int(11) NOT NULL,
  `pher_fecha_devolucion` varchar(15) NOT NULL,
  `pher_observaciones` varchar(100) NOT NULL,
  `alm_id` int(11) NOT NULL,
  `jor_id` int(11) NOT NULL,
  `per_id_entrega` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_prioridad_trabajo`
--

CREATE TABLE `pag_prioridad_trabajo` (
  `priotra_id` int(11) NOT NULL,
  `priotra_descripcion` varchar(20) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_prioridad_trabajo`
--

INSERT INTO `pag_prioridad_trabajo` (`priotra_id`, `priotra_descripcion`, `estado`) VALUES
(1, 'Alta', NULL),
(2, 'Baja', NULL),
(3, 'Media', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_programacion_equipo`
--

CREATE TABLE `pag_programacion_equipo` (
  `proequi_id` int(11) NOT NULL,
  `proequi_fecha` varchar(15) NOT NULL,
  `cen_id` int(11) NOT NULL,
  `proequi_fecha_inicio` varchar(15) NOT NULL,
  `tman_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_programacion_equipo`
--

INSERT INTO `pag_programacion_equipo` (`proequi_id`, `proequi_fecha`, `cen_id`, `proequi_fecha_inicio`, `tman_id`, `estado`) VALUES
(1, '1472755002', 1, '1472853600', 1, '2016-09-01 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_regional`
--

CREATE TABLE `pag_regional` (
  `reg_id` int(11) NOT NULL,
  `reg_codigo` varchar(10) NOT NULL,
  `reg_nombre` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_regional`
--

INSERT INTO `pag_regional` (`reg_id`, `reg_codigo`, `reg_nombre`, `estado`) VALUES
(1, '76', 'Valle del Cauca', NULL),
(2, '93', 'Zona Caribe', NULL),
(3, '56', 'Zona Sur', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_rol`
--

CREATE TABLE `pag_rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(20) NOT NULL,
  `rol_descripcion` varchar(100) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_rol`
--

INSERT INTO `pag_rol` (`rol_id`, `rol_nombre`, `rol_descripcion`, `estado`) VALUES
(1, 'Administrador', 'Tiene acceso a todo el sistema', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_solicitud_servicio`
--

CREATE TABLE `pag_solicitud_servicio` (
  `sserv_id` int(11) NOT NULL,
  `sserv_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `sserv_descripcion` varchar(100) DEFAULT NULL,
  `sserv_observacion` varchar(100) DEFAULT NULL,
  `per_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_solicitud_servicio`
--

INSERT INTO `pag_solicitud_servicio` (`sserv_id`, `sserv_fecha`, `cen_id`, `equi_id`, `sserv_descripcion`, `sserv_observacion`, `per_id`, `est_id`, `tfa_id`, `estado`) VALUES
(55, '2016-07-19 18:25:19', 1, '1', 'Hola mundo', '', 1143830254, 7, 1, NULL),
(56, '2016-07-19 18:25:52', 1, 'EP_003', 'Hola mundo 2', '', 234567, 7, 1, NULL),
(57, '2016-07-19 18:26:18', 2, '0123', 'Hola mundo 3', '', 1144125473, 7, 2, NULL),
(58, '2016-07-19 18:26:48', 1, 'PC_002', 'Hola mundo 4', '', 1151956249, 7, 2, NULL),
(59, '2016-07-19 18:27:16', 1, 'TC001', 'Hola mundo 6', '', 1144125445, 7, 1, NULL),
(60, '2016-07-19 18:27:42', 2, '0123', 'Hola mundo 9', '', 234567, 7, 1, NULL),
(61, '2016-07-19 18:29:12', 1, '1', 'Hola mundo 7', '', 0, 7, 2, NULL),
(62, '2016-07-19 18:29:17', 1, '1', 'Hola mundo 7', '', 0, 7, 2, NULL),
(63, '2016-07-19 18:29:59', 1, 'EP_003', 'Hola mundo 8', '', 1144125445, 7, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tarea`
--

CREATE TABLE `pag_tarea` (
  `tar_id` int(11) NOT NULL,
  `tar_nombre` varchar(200) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pag_tarea`
--

INSERT INTO `pag_tarea` (`tar_id`, `tar_nombre`, `estado`) VALUES
(1, 'Cambiar piezas', NULL),
(2, 'Lubricación', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_doc`
--

CREATE TABLE `pag_tipo_doc` (
  `tdoc_id` int(11) NOT NULL,
  `tdoc_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_doc`
--

INSERT INTO `pag_tipo_doc` (`tdoc_id`, `tdoc_descripcion`, `estado`) VALUES
(1, 'General', NULL),
(2, 'Orden de trabajo', NULL),
(3, 'Programación equipos', NULL),
(4, 'Solicitudes de servicio', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_equipo`
--

CREATE TABLE `pag_tipo_equipo` (
  `tequi_id` int(11) NOT NULL,
  `tequi_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_equipo`
--

INSERT INTO `pag_tipo_equipo` (`tequi_id`, `tequi_descripcion`, `estado`) VALUES
(1, 'Electromecanico', NULL),
(2, 'Hidraulico', NULL),
(3, 'Refrigeración', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_falla`
--

CREATE TABLE `pag_tipo_falla` (
  `tfa_id` int(11) NOT NULL,
  `tfa_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_falla`
--

INSERT INTO `pag_tipo_falla` (`tfa_id`, `tfa_descripcion`, `estado`) VALUES
(1, 'Mecanica', NULL),
(2, 'Hidraulica', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_herramienta`
--

CREATE TABLE `pag_tipo_herramienta` (
  `ther_id` int(11) NOT NULL,
  `ther_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_herramienta`
--

INSERT INTO `pag_tipo_herramienta` (`ther_id`, `ther_descripcion`, `estado`) VALUES
(1, 'Digital', NULL),
(2, 'Análoga', NULL),
(3, 'Pesada', NULL),
(4, 'Otra...', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_mantenimiento`
--

CREATE TABLE `pag_tipo_mantenimiento` (
  `tman_id` int(11) NOT NULL,
  `tman_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_mantenimiento`
--

INSERT INTO `pag_tipo_mantenimiento` (`tman_id`, `tman_descripcion`, `estado`) VALUES
(1, 'preventivo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_medidor`
--

CREATE TABLE `pag_tipo_medidor` (
  `tmed_id` int(11) NOT NULL,
  `tmed_nombre` varchar(45) NOT NULL,
  `tmed_descripcion` varchar(45) NOT NULL,
  `tmed_acronimo` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_medidor`
--

INSERT INTO `pag_tipo_medidor` (`tmed_id`, `tmed_nombre`, `tmed_descripcion`, `tmed_acronimo`, `estado`) VALUES
(1, 'Kilometros', 'Kilometros por hora', 'Km', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_trabajo`
--

CREATE TABLE `pag_tipo_trabajo` (
  `ttra_id` int(11) NOT NULL,
  `ttra_descripcion` varchar(100) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_trabajo`
--

INSERT INTO `pag_tipo_trabajo` (`ttra_id`, `ttra_descripcion`, `estado`) VALUES
(1, 'Hidraulico', NULL),
(2, 'Limpieza', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_unidad_medida`
--

CREATE TABLE `pag_unidad_medida` (
  `umed_id` int(11) NOT NULL,
  `umed_descripcion` varchar(20) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_unidad_medida`
--

INSERT INTO `pag_unidad_medida` (`umed_id`, `umed_descripcion`, `estado`) VALUES
(1, 'Litro', NULL),
(2, 'Centímetros cúbicos', NULL),
(3, 'Gramos', NULL),
(4, 'Libra', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_usuario`
--

CREATE TABLE `pag_usuario` (
  `per_id` bigint(20) NOT NULL,
  `usu_usuario` varchar(45) NOT NULL,
  `usu_clave` varchar(45) NOT NULL,
  `usu_estado` varchar(45) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_usuario`
--

INSERT INTO `pag_usuario` (`per_id`, `usu_usuario`, `usu_clave`, `usu_estado`, `rol_id`) VALUES
(1143830254, 'ayepes', '123456', 'activo', 1),
(1144125445, 'jtavera', '123456', 'activo', 1),
(1144125473, 'dbarona', '1234', 'activo', 1),
(1151956249, 'admin', '0000', 'activo', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pag_almacen`
--
ALTER TABLE `pag_almacen`
  ADD PRIMARY KEY (`alm_id`);

--
-- Indices de la tabla `pag_almacenista`
--
ALTER TABLE `pag_almacenista`
  ADD PRIMARY KEY (`alma_id`);

--
-- Indices de la tabla `pag_area`
--
ALTER TABLE `pag_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indices de la tabla `pag_campos_personalizados`
--
ALTER TABLE `pag_campos_personalizados`
  ADD PRIMARY KEY (`cp_id`);

--
-- Indices de la tabla `pag_cargo`
--
ALTER TABLE `pag_cargo`
  ADD PRIMARY KEY (`car_id`);

--
-- Indices de la tabla `pag_centro`
--
ALTER TABLE `pag_centro`
  ADD PRIMARY KEY (`cen_id`);

--
-- Indices de la tabla `pag_ciudad`
--
ALTER TABLE `pag_ciudad`
  ADD PRIMARY KEY (`ciud_id`);

--
-- Indices de la tabla `pag_componente`
--
ALTER TABLE `pag_componente`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indices de la tabla `pag_controlador`
--
ALTER TABLE `pag_controlador`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indices de la tabla `pag_control_medidas`
--
ALTER TABLE `pag_control_medidas`
  ADD PRIMARY KEY (`ctrmed_id`),
  ADD KEY `tmed_id` (`tmed_id`),
  ADD KEY `equi_id` (`equi_id`);

--
-- Indices de la tabla `pag_departamento`
--
ALTER TABLE `pag_departamento`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indices de la tabla `pag_det_equipo_medidor`
--
ALTER TABLE `pag_det_equipo_medidor`
  ADD PRIMARY KEY (`dequimed_id`),
  ADD KEY `equi_id` (`equi_id`),
  ADD KEY `tmed_id` (`tmed_id`);

--
-- Indices de la tabla `pag_det_herramienta_ot`
--
ALTER TABLE `pag_det_herramienta_ot`
  ADD PRIMARY KEY (`dherot_id`),
  ADD KEY `ot_id` (`ot_id`),
  ADD KEY `her_id` (`her_id`);

--
-- Indices de la tabla `pag_det_insumo_ot`
--
ALTER TABLE `pag_det_insumo_ot`
  ADD PRIMARY KEY (`dinsot_id`),
  ADD KEY `ot_id` (`ot_id`),
  ADD KEY `ins_id` (`ins_id`);

--
-- Indices de la tabla `pag_det_prestamo_herramienta`
--
ALTER TABLE `pag_det_prestamo_herramienta`
  ADD PRIMARY KEY (`detph_id`),
  ADD KEY `pher_id` (`pher_id`),
  ADD KEY `her_id` (`her_id`),
  ADD KEY `est_id` (`est_id`);

--
-- Indices de la tabla `pag_det_programacion`
--
ALTER TABLE `pag_det_programacion`
  ADD PRIMARY KEY (`detprog_id`),
  ADD KEY `proequi_id` (`proequi_id`),
  ADD KEY `ttra_id` (`ttra_id`),
  ADD KEY `equi_id` (`equi_id`),
  ADD KEY `comp_id` (`comp_id`),
  ADD KEY `priotra_id` (`priotra_id`),
  ADD KEY `tar_id` (`tar_id`);

--
-- Indices de la tabla `pag_equipo`
--
ALTER TABLE `pag_equipo`
  ADD PRIMARY KEY (`equi_id`),
  ADD KEY `per_id` (`per_id`),
  ADD KEY `cen_id` (`cen_id`);

--
-- Indices de la tabla `pag_equipo_componente`
--
ALTER TABLE `pag_equipo_componente`
  ADD PRIMARY KEY (`equicomp_id`);

--
-- Indices de la tabla `pag_equipo_cp`
--
ALTER TABLE `pag_equipo_cp`
  ADD PRIMARY KEY (`equicp_id`);

--
-- Indices de la tabla `pag_equipo_planos`
--
ALTER TABLE `pag_equipo_planos`
  ADD PRIMARY KEY (`equipla_id`);

--
-- Indices de la tabla `pag_estado`
--
ALTER TABLE `pag_estado`
  ADD PRIMARY KEY (`est_id`),
  ADD KEY `tdoc_id` (`tdoc_id`);

--
-- Indices de la tabla `pag_funcion`
--
ALTER TABLE `pag_funcion`
  ADD PRIMARY KEY (`func_id`);

--
-- Indices de la tabla `pag_herramienta`
--
ALTER TABLE `pag_herramienta`
  ADD PRIMARY KEY (`her_id`);

--
-- Indices de la tabla `pag_insumo`
--
ALTER TABLE `pag_insumo`
  ADD PRIMARY KEY (`ins_id`);

--
-- Indices de la tabla `pag_inventario`
--
ALTER TABLE `pag_inventario`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indices de la tabla `pag_jornada`
--
ALTER TABLE `pag_jornada`
  ADD PRIMARY KEY (`jor_id`);

--
-- Indices de la tabla `pag_modulo`
--
ALTER TABLE `pag_modulo`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indices de la tabla `pag_orden_trabajo`
--
ALTER TABLE `pag_orden_trabajo`
  ADD PRIMARY KEY (`ot_id`),
  ADD KEY `est_id` (`est_id`),
  ADD KEY `cen_id` (`cen_id`),
  ADD KEY `equi_id` (`equi_id`),
  ADD KEY `comp_id` (`comp_id`),
  ADD KEY `tfa_id` (`tfa_id`),
  ADD KEY `per_id` (`per_id`);

--
-- Indices de la tabla `pag_permisos`
--
ALTER TABLE `pag_permisos`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indices de la tabla `pag_persona`
--
ALTER TABLE `pag_persona`
  ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `pag_prestamo_herramienta`
--
ALTER TABLE `pag_prestamo_herramienta`
  ADD PRIMARY KEY (`pher_id`);

--
-- Indices de la tabla `pag_prioridad_trabajo`
--
ALTER TABLE `pag_prioridad_trabajo`
  ADD PRIMARY KEY (`priotra_id`);

--
-- Indices de la tabla `pag_programacion_equipo`
--
ALTER TABLE `pag_programacion_equipo`
  ADD PRIMARY KEY (`proequi_id`);

--
-- Indices de la tabla `pag_regional`
--
ALTER TABLE `pag_regional`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indices de la tabla `pag_rol`
--
ALTER TABLE `pag_rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `pag_solicitud_servicio`
--
ALTER TABLE `pag_solicitud_servicio`
  ADD PRIMARY KEY (`sserv_id`);

--
-- Indices de la tabla `pag_tarea`
--
ALTER TABLE `pag_tarea`
  ADD PRIMARY KEY (`tar_id`);

--
-- Indices de la tabla `pag_tipo_doc`
--
ALTER TABLE `pag_tipo_doc`
  ADD PRIMARY KEY (`tdoc_id`);

--
-- Indices de la tabla `pag_tipo_equipo`
--
ALTER TABLE `pag_tipo_equipo`
  ADD PRIMARY KEY (`tequi_id`);

--
-- Indices de la tabla `pag_tipo_falla`
--
ALTER TABLE `pag_tipo_falla`
  ADD PRIMARY KEY (`tfa_id`);

--
-- Indices de la tabla `pag_tipo_herramienta`
--
ALTER TABLE `pag_tipo_herramienta`
  ADD PRIMARY KEY (`ther_id`);

--
-- Indices de la tabla `pag_tipo_mantenimiento`
--
ALTER TABLE `pag_tipo_mantenimiento`
  ADD PRIMARY KEY (`tman_id`);

--
-- Indices de la tabla `pag_tipo_medidor`
--
ALTER TABLE `pag_tipo_medidor`
  ADD PRIMARY KEY (`tmed_id`);

--
-- Indices de la tabla `pag_tipo_trabajo`
--
ALTER TABLE `pag_tipo_trabajo`
  ADD PRIMARY KEY (`ttra_id`);

--
-- Indices de la tabla `pag_unidad_medida`
--
ALTER TABLE `pag_unidad_medida`
  ADD PRIMARY KEY (`umed_id`);

--
-- Indices de la tabla `pag_usuario`
--
ALTER TABLE `pag_usuario`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `usu_usuario_UNIQUE` (`usu_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pag_almacen`
--
ALTER TABLE `pag_almacen`
  MODIFY `alm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_almacenista`
--
ALTER TABLE `pag_almacenista`
  MODIFY `alma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_area`
--
ALTER TABLE `pag_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_cargo`
--
ALTER TABLE `pag_cargo`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_centro`
--
ALTER TABLE `pag_centro`
  MODIFY `cen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_ciudad`
--
ALTER TABLE `pag_ciudad`
  MODIFY `ciud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_controlador`
--
ALTER TABLE `pag_controlador`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `pag_control_medidas`
--
ALTER TABLE `pag_control_medidas`
  MODIFY `ctrmed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_departamento`
--
ALTER TABLE `pag_departamento`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_det_equipo_medidor`
--
ALTER TABLE `pag_det_equipo_medidor`
  MODIFY `dequimed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_det_herramienta_ot`
--
ALTER TABLE `pag_det_herramienta_ot`
  MODIFY `dherot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_det_insumo_ot`
--
ALTER TABLE `pag_det_insumo_ot`
  MODIFY `dinsot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pag_det_prestamo_herramienta`
--
ALTER TABLE `pag_det_prestamo_herramienta`
  MODIFY `detph_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_det_programacion`
--
ALTER TABLE `pag_det_programacion`
  MODIFY `detprog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pag_equipo_componente`
--
ALTER TABLE `pag_equipo_componente`
  MODIFY `equicomp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_equipo_cp`
--
ALTER TABLE `pag_equipo_cp`
  MODIFY `equicp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_equipo_planos`
--
ALTER TABLE `pag_equipo_planos`
  MODIFY `equipla_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_estado`
--
ALTER TABLE `pag_estado`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `pag_funcion`
--
ALTER TABLE `pag_funcion`
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT de la tabla `pag_insumo`
--
ALTER TABLE `pag_insumo`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_inventario`
--
ALTER TABLE `pag_inventario`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_jornada`
--
ALTER TABLE `pag_jornada`
  MODIFY `jor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_modulo`
--
ALTER TABLE `pag_modulo`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `pag_orden_trabajo`
--
ALTER TABLE `pag_orden_trabajo`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `pag_permisos`
--
ALTER TABLE `pag_permisos`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
--
-- AUTO_INCREMENT de la tabla `pag_prestamo_herramienta`
--
ALTER TABLE `pag_prestamo_herramienta`
  MODIFY `pher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_prioridad_trabajo`
--
ALTER TABLE `pag_prioridad_trabajo`
  MODIFY `priotra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_programacion_equipo`
--
ALTER TABLE `pag_programacion_equipo`
  MODIFY `proequi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_regional`
--
ALTER TABLE `pag_regional`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_rol`
--
ALTER TABLE `pag_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_solicitud_servicio`
--
ALTER TABLE `pag_solicitud_servicio`
  MODIFY `sserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT de la tabla `pag_tarea`
--
ALTER TABLE `pag_tarea`
  MODIFY `tar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_doc`
--
ALTER TABLE `pag_tipo_doc`
  MODIFY `tdoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_equipo`
--
ALTER TABLE `pag_tipo_equipo`
  MODIFY `tequi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_falla`
--
ALTER TABLE `pag_tipo_falla`
  MODIFY `tfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_herramienta`
--
ALTER TABLE `pag_tipo_herramienta`
  MODIFY `ther_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_mantenimiento`
--
ALTER TABLE `pag_tipo_mantenimiento`
  MODIFY `tman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_medidor`
--
ALTER TABLE `pag_tipo_medidor`
  MODIFY `tmed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_trabajo`
--
ALTER TABLE `pag_tipo_trabajo`
  MODIFY `ttra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_unidad_medida`
--
ALTER TABLE `pag_unidad_medida`
  MODIFY `umed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pag_det_equipo_medidor`
--
ALTER TABLE `pag_det_equipo_medidor`
  ADD CONSTRAINT `pag_det_equipo_medidor_ibfk_1` FOREIGN KEY (`equi_id`) REFERENCES `pag_equipo` (`equi_id`),
  ADD CONSTRAINT `pag_det_equipo_medidor_ibfk_2` FOREIGN KEY (`tmed_id`) REFERENCES `pag_tipo_medidor` (`tmed_id`);

--
-- Filtros para la tabla `pag_det_herramienta_ot`
--
ALTER TABLE `pag_det_herramienta_ot`
  ADD CONSTRAINT `pag_det_herramienta_ot_ibfk_1` FOREIGN KEY (`ot_id`) REFERENCES `pag_orden_trabajo` (`ot_id`),
  ADD CONSTRAINT `pag_det_herramienta_ot_ibfk_2` FOREIGN KEY (`her_id`) REFERENCES `pag_herramienta` (`her_id`);

--
-- Filtros para la tabla `pag_det_insumo_ot`
--
ALTER TABLE `pag_det_insumo_ot`
  ADD CONSTRAINT `pag_det_insumo_ot_ibfk_1` FOREIGN KEY (`ot_id`) REFERENCES `pag_orden_trabajo` (`ot_id`),
  ADD CONSTRAINT `pag_det_insumo_ot_ibfk_2` FOREIGN KEY (`ins_id`) REFERENCES `pag_insumo` (`ins_id`);

--
-- Filtros para la tabla `pag_det_prestamo_herramienta`
--
ALTER TABLE `pag_det_prestamo_herramienta`
  ADD CONSTRAINT `pag_det_prestamo_herramienta_ibfk_1` FOREIGN KEY (`pher_id`) REFERENCES `pag_prestamo_herramienta` (`pher_id`),
  ADD CONSTRAINT `pag_det_prestamo_herramienta_ibfk_3` FOREIGN KEY (`est_id`) REFERENCES `pag_estado` (`est_id`);

--
-- Filtros para la tabla `pag_det_programacion`
--
ALTER TABLE `pag_det_programacion`
  ADD CONSTRAINT `pag_det_programacion_ibfk_1` FOREIGN KEY (`proequi_id`) REFERENCES `pag_programacion_equipo` (`proequi_id`),
  ADD CONSTRAINT `pag_det_programacion_ibfk_2` FOREIGN KEY (`ttra_id`) REFERENCES `pag_tipo_trabajo` (`ttra_id`),
  ADD CONSTRAINT `pag_det_programacion_ibfk_3` FOREIGN KEY (`equi_id`) REFERENCES `pag_equipo` (`equi_id`),
  ADD CONSTRAINT `pag_det_programacion_ibfk_4` FOREIGN KEY (`comp_id`) REFERENCES `pag_componente` (`comp_id`),
  ADD CONSTRAINT `pag_det_programacion_ibfk_5` FOREIGN KEY (`priotra_id`) REFERENCES `pag_prioridad_trabajo` (`priotra_id`),
  ADD CONSTRAINT `pag_det_programacion_ibfk_6` FOREIGN KEY (`tar_id`) REFERENCES `pag_tarea` (`tar_id`);

--
-- Filtros para la tabla `pag_equipo`
--
ALTER TABLE `pag_equipo`
  ADD CONSTRAINT `pag_equipo_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `pag_persona` (`per_id`),
  ADD CONSTRAINT `pag_equipo_ibfk_2` FOREIGN KEY (`cen_id`) REFERENCES `pag_centro` (`cen_id`);

--
-- Filtros para la tabla `pag_estado`
--
ALTER TABLE `pag_estado`
  ADD CONSTRAINT `pag_estado_ibfk_1` FOREIGN KEY (`tdoc_id`) REFERENCES `pag_tipo_doc` (`tdoc_id`);

--
-- Filtros para la tabla `pag_orden_trabajo`
--
ALTER TABLE `pag_orden_trabajo`
  ADD CONSTRAINT `pag_orden_trabajo_ibfk_1` FOREIGN KEY (`est_id`) REFERENCES `pag_estado` (`est_id`),
  ADD CONSTRAINT `pag_orden_trabajo_ibfk_2` FOREIGN KEY (`cen_id`) REFERENCES `pag_centro` (`cen_id`),
  ADD CONSTRAINT `pag_orden_trabajo_ibfk_3` FOREIGN KEY (`equi_id`) REFERENCES `pag_equipo` (`equi_id`),
  ADD CONSTRAINT `pag_orden_trabajo_ibfk_4` FOREIGN KEY (`comp_id`) REFERENCES `pag_componente` (`comp_id`),
  ADD CONSTRAINT `pag_orden_trabajo_ibfk_5` FOREIGN KEY (`tfa_id`) REFERENCES `pag_tipo_falla` (`tfa_id`),
  ADD CONSTRAINT `pag_orden_trabajo_ibfk_6` FOREIGN KEY (`per_id`) REFERENCES `pag_persona` (`per_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
