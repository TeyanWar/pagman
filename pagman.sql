-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-09-2016 a las 03:17:15
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
(1, 'Cali', 29, NULL),
(2, 'Medellin', 1, NULL),
(3, 'Palmira', 29, NULL),
(4, 'Neiva', 5, NULL),
(5, 'Pereira', 8, NULL),
(6, 'Leticia', 11, NULL),
(7, 'Florencia', 12, NULL),
(8, 'Bogota', 4, NULL),
(9, 'Riohacha', 21, NULL),
(10, 'Santa martha', 23, NULL),
(11, 'Villavicencio', 33, NULL);

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
('2', 'Pi&ntilde;&oacute;n', NULL);

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
(1, 1, 'costosController', 'mdi-editor-attach-money', 'Costos', 'Controlador de Costos'),
(2, 2, 'equiposController', 'mdi-hardware-desktop-windows', 'Equipos', 'Controlador de Equipos'),
(3, 2, 'tipoEquipoController', 'mdi-hardware-phonelink', 'Tipos de equipo', 'Controlador de Tipos de equipos'),
(4, 3, 'herramientasController', 'mdi-action-wallet-travel', 'Herramientas', 'Controlador de Herramientas'),
(5, 4, 'insumosController', 'mdi-maps-local-gas-station', 'Insumos', 'Controlador de Insumos'),
(6, 5, 'regionalController', 'mdi-communication-location-on', 'Regionales', 'Controlador de Regionales'),
(7, 5, 'departamentoController', 'mdi-image-filter-hdr', 'Departamentos', 'Controlador de Departamentos'),
(8, 5, 'ciudadController', 'mdi-image-assistant-photo', 'Ciudades', 'Controlador de Ciudades'),
(9, 5, 'centroController', 'mdi-image-center-focus-strong', 'Centros', 'Controlador de Centros'),
(10, 6, 'medicionesController', 'mdi-av-timer', 'Mediciones', 'Controlador de Mediciones'),
(11, 7, 'medidoresController', 'mdi-image-timer', 'Medidor', 'Controlador de Medidores'),
(12, 8, 'otController', 'mdi-action-assignment', 'Ordenes', 'Controlador de ot'),
(13, 8, 'solicitudesController', 'mdi-communication-quick-contacts-mail', 'Solicitudes', 'Controlador de solicitudes'),
(14, 9, 'permisosController', 'mdi-action-lock', 'Permisos', 'Controlador de Permisos'),
(15, 10, 'personasController', 'mdi-social-person-outline', 'Personas', 'Controlador de Personas'),
(16, 11, 'prestamoController', 'mdi-action-shopping-cart', 'Prestamo', 'Controlador de Prestamos'),
(17, 12, 'programacionController', 'mdi-editor-insert-invitation', 'Programacion', 'Controlador de Programacion'),
(18, 13, 'rolesController', 'mdi-social-group', 'Roles', 'Controlador de Roles'),
(19, 14, 'usuariosController', 'mdi-action-account-circle', 'Usuarios', 'Controlador de Usuarios');

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
  `dept_nombre` varchar(30) NOT NULL,
  `reg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pag_departamento`
--

INSERT INTO `pag_departamento` (`dept_id`, `dept_nombre`, `reg_id`) VALUES
(1, 'AntioquÃ­a', 1),
(2, 'Boyaca', 1),
(3, 'Caldas', 1),
(4, 'Cundinamarca', 1),
(5, 'Huila', 1),
(6, 'Norte de Santander', 1),
(7, 'Quindio', 1),
(8, 'Risaralda', 1),
(9, 'Santander', 1),
(10, 'Tolima', 1),
(11, 'Amazonas', 2),
(12, 'Caqueta', 2),
(13, 'Guainia', 2),
(14, 'Guaviare', 2),
(15, 'Putumay', 2),
(16, 'Vaupes', 2),
(17, 'Atlantico', 3),
(18, 'Bolivar', 3),
(19, 'Cesar', 3),
(20, 'Cordoba', 3),
(21, 'La Guajira', 3),
(23, 'Magdalena', 3),
(24, 'San Andres', 3),
(25, 'Sucre', 3),
(26, 'Cauca', 4),
(27, 'Choco', 4),
(28, 'NariÃ±o', 4),
(29, 'Valle del Cauca', 4),
(30, 'Arauca', 5),
(31, 'Casanare', 5),
(32, 'Vichada', 5),
(33, 'Meta', 5);

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
(1, 1, 2, 34, '1', '2', 1, 2, 1, 10, 1),
(2, 2, 1, 100, '1', '1', 1, 1, 1, 200, 1),
(3, 3, 1, 8, '1', '1', 1, 1, 1, 10, 2),
(4, 4, 1, 10, '1', '1', 1, 1, 1, 200, 1);

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
(1, 1, 'crear', 'Crear Costos', 'Crear Costos'),
(2, 1, 'editar', 'Editar Costos', 'Editar Costos'),
(3, 1, 'eliminar', 'Eliminar Costos', 'Eliminar Costos'),
(4, 1, 'listar', 'Listar Costos', 'Listar Costos'),
(5, 2, 'crear', 'Crear Equipos', 'Crear Equipos'),
(6, 2, 'editar', 'Editar Equipos', 'Editar Equipos '),
(7, 2, 'eliminar', 'Eliminar Equipos', 'Eliminar Equipos'),
(8, 2, 'Listar', 'Listar Equipos', 'Listar Equipos'),
(9, 3, 'crear', 'Crear Tipo equipo', 'Crear Tipo equipo'),
(10, 3, 'editar', 'Editar Tipo equipo', 'Editar Tipo equipo'),
(11, 3, 'eliminar', 'Eliminar Tipo equipo', 'Eliminar Tipo equipo'),
(12, 3, 'listar', 'Listar Tipos de equipos', 'Listar Tipos de equipos'),
(13, 4, 'crear', 'Crear Herramientas', 'Crear Herramientas'),
(14, 4, 'editar', 'Editar Herramientas', 'Editar Herramientas'),
(15, 4, 'eliminar', 'Eliminar Herramientas', 'Eliminar Herramientas'),
(16, 4, 'Listar', 'Listar Herramientas', 'Listar Herramientas'),
(17, 5, 'crear', 'Crear Insumos', 'Crear Insumos'),
(18, 5, 'editar', 'Editar Insumos', 'Editar Insumos'),
(19, 5, 'eliminar', 'Eliminar Insumos', 'Eliminar Insumos'),
(20, 5, 'Listar', 'Listar Insumos', 'Listar Insumos'),
(21, 6, 'crear', 'Crear Regional', 'Crear Regional'),
(22, 6, 'editar', 'Editar Regional', 'Editar Regional'),
(23, 6, 'eliminar', 'Eliminar Regional', 'Eliminar Regional'),
(24, 6, 'listar', 'Listar Regionales', 'Listar Regionales'),
(25, 7, 'crear', 'Crear Departamento', 'Crear Departamento'),
(26, 7, 'editar', 'Editar Departamento', 'Editar Departamento'),
(27, 7, 'eliminar', 'Eliminar Departamento', 'Eliminar Departamento'),
(28, 7, 'listar', 'Listar Departamentos', 'Listar '),
(29, 8, 'crear', 'Crear Ciudad', 'Crear Ciudad'),
(30, 8, 'editar', 'Editar Ciudad', 'Editar Ciudad'),
(31, 8, 'eliminar', 'Eliminar Ciudad', 'Eliminar Ciudad'),
(32, 8, 'listar', 'Listar Ciudades', 'Listar Ciudades'),
(33, 9, 'crear', 'Crear Centro', 'Crear Centro'),
(34, 9, 'editar', 'Editar Centro', 'Editar Centro'),
(35, 9, 'eliminar', 'Eliminar Centro', 'Eliminar Centro'),
(36, 9, 'listar', 'Listar Centros', 'Listar Centros'),
(37, 10, 'crear', 'Crear Mediciones', 'Crear Mediciones'),
(38, 10, 'editar', 'Editar Mediciones', 'Editar Mediciones'),
(39, 10, 'eliminar', 'Eliminar Mediciones', 'Eliminar Mediciones'),
(40, 10, 'Listar', 'Listar Mediciones', 'Listar Mediciones'),
(41, 11, 'crear', 'Crear Medidores', 'Crear Medidores'),
(42, 11, 'editar', 'Editar Medidores', 'Editar Medidores'),
(43, 11, 'eliminar', 'Eliminar Medidores', 'Eliminar Medidores'),
(44, 11, 'Listar', 'Listar Medidores', 'Listar Medidores'),
(45, 12, 'crear', 'Crear ot', 'Crear ot'),
(46, 12, 'editar', 'Editar ot', 'Editar ot'),
(47, 12, 'eliminar', 'Eliminar ot', 'Eliminar ot'),
(48, 12, 'listar', 'Listar ot', 'Listar ot'),
(49, 13, 'crear', 'Crear solicitud', 'Crear solicitud de servicio'),
(50, 13, 'editar', 'Editar solicitud', 'Editar solicitud'),
(51, 13, 'eliminar', 'Eliminar solicitud', 'Eliminar solicitud'),
(52, 13, 'listar', 'Listar solicitud', 'Listar solicitud'),
(53, 14, 'crear', 'Asignar', 'Asignar Permisos'),
(54, 15, 'crear', 'Crear Personas', 'Crear Personas'),
(55, 15, 'editar', 'Editar Personas', 'Editar Personas'),
(56, 15, 'eliminar', 'Eliminar Personas', 'Eliminar Personas'),
(57, 15, 'Listar', 'Listar Personas', 'Listar Personas'),
(58, 16, 'crear', 'Crear Prestamos', 'Crear Prestamo'),
(59, 16, 'eliminar', 'Eliminar Prestamo', 'Eliminar Prestamo'),
(60, 16, 'Listar', 'Listar Prestamos', 'Listar Prestamos'),
(61, 17, 'crear', 'Crear Programacion', 'Crear Programacion'),
(62, 17, 'editar', 'Editar Programacion', 'Editar Programacion'),
(63, 17, 'listar', 'Listar Programacion', 'Listar Programacion'),
(64, 17, 'eliminar', 'Eliminar Programacion', 'Eliminar Programacion'),
(65, 18, 'crear', 'Crear Rol', 'Crear Rol'),
(66, 18, 'editar', 'Editar Rol', 'Editar Rol'),
(67, 18, 'listar', 'Listar roles', 'Lista los roles'),
(68, 18, 'eliminar', 'ELiminar Rol', 'ELiminar Rol'),
(69, 19, 'crear', 'Crear Usuario', 'Crear Usuario'),
(70, 19, 'editar', 'Editar Usuario', 'Editar Usuario'),
(71, 19, 'listar', 'Listar Usuarios', 'Listar Usuarios'),
(72, 19, 'eliminar', 'Eliminar Usuario', 'Eliminar Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_herramienta`
--

CREATE TABLE `pag_herramienta` (
  `her_id` varchar(40) NOT NULL,
  `ther_id` int(11) NOT NULL,
  `her_nombre` varchar(45) NOT NULL,
  `her_descripcion` varchar(100) NOT NULL,
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
(1, 'Costos', 'mdi-editor-attach-money', 'principal', 'Modulo de Costos'),
(2, 'Equipos', 'mdi-hardware-desktop-windows', 'principal', 'Modulo de Equipos'),
(3, 'Herramientas', 'mdi-action-wallet-travel', 'principal', 'Modulo de Herramientas'),
(4, 'Insumos', 'mdi-maps-local-gas-station', 'principal', 'Modulo de Insumos'),
(5, 'Localizacion', 'mdi-maps-my-location', 'configuracion', 'Modulo de Localizacion'),
(6, 'Mediciones', 'mdi-av-timer', 'principal', 'Modulo de Mediciones'),
(7, 'Medidores', 'mdi-image-timer', 'principal', 'Modulo de Medidores'),
(8, 'OT', 'mdi-action-assignment', 'principal', 'Modulo de OT'),
(9, 'Permisos', 'mdi-action-lock', 'configuracion', 'Modulo de Permisos'),
(10, 'Personas', 'mdi-social-person-outline', 'configuracion', 'Modulo de Personas'),
(11, 'Prestamo', 'mdi-action-shopping-cart', 'principal', 'Modulo de prestamos'),
(12, 'Programacion', 'mdi-editor-insert-invitation', 'principal', 'Modulo Programacion'),
(13, 'Roles', 'mdi-social-group', 'configuracion', 'Modulo asignar Roles a un usuario'),
(14, 'Usuarios', 'mdi-action-account-circle', 'configuracion', 'Modulo Usuarios');

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
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 41, 1),
(42, 42, 1),
(43, 43, 1),
(44, 44, 1),
(45, 45, 1),
(46, 46, 1),
(47, 47, 1),
(48, 48, 1),
(49, 49, 1),
(50, 50, 1),
(51, 51, 1),
(52, 52, 1),
(53, 53, 1),
(54, 54, 1),
(55, 55, 1),
(56, 56, 1),
(57, 57, 1),
(58, 58, 1),
(59, 59, 1),
(60, 60, 1),
(61, 61, 1),
(62, 62, 1),
(63, 63, 1),
(64, 64, 1),
(65, 65, 1),
(66, 66, 1),
(67, 67, 1),
(68, 68, 1),
(69, 69, 1),
(70, 70, 1),
(71, 71, 1),
(72, 72, 1);

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
  `alma_id` int(11) NOT NULL,
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
(1, '5 April, 2016', 1, '29 April, 2016', 1, NULL);

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
(1, '', 'Region Andina', NULL),
(2, '', 'Region Amazonica', NULL),
(3, '', 'Region Caribe', NULL),
(4, '', 'Region Pacifica', NULL),
(5, '', 'Region de la Orinoquia', NULL);

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
(1, 'Kilometros', 'Kilometros por hora', 'Km', NULL),
(2, 'Centimetros', 'Unidad de medida', 'cm', NULL),
(3, 'Centimetros', 'Unidad de medida', 'cm', NULL);

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
  ADD PRIMARY KEY (`ciud_id`),
  ADD KEY `dept_id` (`dept_id`);

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
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `reg_id` (`reg_id`);

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
  ADD PRIMARY KEY (`pher_id`),
  ADD KEY `jor_id` (`jor_id`),
  ADD KEY `alma_id` (`alma_id`);

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
  MODIFY `ciud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `pag_controlador`
--
ALTER TABLE `pag_controlador`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `pag_control_medidas`
--
ALTER TABLE `pag_control_medidas`
  MODIFY `ctrmed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_departamento`
--
ALTER TABLE `pag_departamento`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `pag_det_equipo_medidor`
--
ALTER TABLE `pag_det_equipo_medidor`
  MODIFY `dequimed_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_det_herramienta_ot`
--
ALTER TABLE `pag_det_herramienta_ot`
  MODIFY `dherot_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_det_insumo_ot`
--
ALTER TABLE `pag_det_insumo_ot`
  MODIFY `dinsot_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
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
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `pag_orden_trabajo`
--
ALTER TABLE `pag_orden_trabajo`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `pag_permisos`
--
ALTER TABLE `pag_permisos`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
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
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
  MODIFY `tman_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_medidor`
--
ALTER TABLE `pag_tipo_medidor`
  MODIFY `tmed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Filtros para la tabla `pag_ciudad`
--
ALTER TABLE `pag_ciudad`
  ADD CONSTRAINT `pag_ciudad_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `pag_departamento` (`dept_id`);

--
-- Filtros para la tabla `pag_departamento`
--
ALTER TABLE `pag_departamento`
  ADD CONSTRAINT `pag_departamento_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `pag_regional` (`reg_id`);

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

--
-- Filtros para la tabla `pag_prestamo_herramienta`
--
ALTER TABLE `pag_prestamo_herramienta`
  ADD CONSTRAINT `pag_prestamo_herramienta_ibfk_1` FOREIGN KEY (`jor_id`) REFERENCES `pag_jornada` (`jor_id`),
  ADD CONSTRAINT `pag_prestamo_herramienta_ibfk_2` FOREIGN KEY (`alma_id`) REFERENCES `pag_almacenista` (`alma_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
