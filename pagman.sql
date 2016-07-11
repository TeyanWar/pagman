-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2016 a las 17:25:41
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

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
  `estado` timestamp(1) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_almacenista`
--

CREATE TABLE `pag_almacenista` (
  `Alm_id` int(11) NOT NULL,
  `Alm_nombre` varchar(45) CHARACTER SET utf16 NOT NULL,
  `estado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pag_almacenista`
--

INSERT INTO `pag_almacenista` (`Alm_id`, `Alm_nombre`, `estado`) VALUES
(1, 'Alvaro', '0000-00-00 00:00:00'),
(2, 'Tejada', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_area`
--

CREATE TABLE `pag_area` (
  `area_id` int(11) NOT NULL,
  `area_descripcion` varchar(45) NOT NULL,
  `estado` timestamp(1) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_area`
--

INSERT INTO `pag_area` (`area_id`, `area_descripcion`, `estado`) VALUES
(1, 'Mecatronica', NULL),
(2, 'Refrigeración', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_campos_personalizados`
--

CREATE TABLE `pag_campos_personalizados` (
  `cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(45) DEFAULT NULL,
  `estado` timestamp(1) NULL DEFAULT NULL
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
(1, 'Desarrollador de Software', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_centro`
--

CREATE TABLE `pag_centro` (
  `cen_id` int(11) NOT NULL,
  `cen_nombre` varchar(100) NOT NULL,
  `cen_dir` varchar(45) NOT NULL,
  `cen_telefono` varchar(45) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_centro`
--

INSERT INTO `pag_centro` (`cen_id`, `cen_nombre`, `cen_dir`, `cen_telefono`, `reg_id`, `estado`) VALUES
(1, 'CDTI', 'Pondaje', '3275647', 1, '0000-00-00 00:00:00');

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
(1, 'Barranquilla', 3, NULL);

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
('1', 'Polea', '2016-04-14 05:00:00'),
('10', 'husillo', '2016-04-13 05:00:00'),
('2', 'Pinon', '2016-04-21 05:00:00'),
('3', 'cadena', '2016-04-22 05:00:00'),
('4', 'motor', '2016-04-28 05:00:00'),
('5', 'tuerca', '2016-04-21 05:00:00'),
('6', 'freno', '2016-04-28 05:00:00'),
('7', 'contrapunto', '2016-04-14 05:00:00'),
('8', 'bancada', '2016-04-28 05:00:00'),
('9', 'caja norton', '2016-04-13 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_controlador`
--

CREATE TABLE `pag_controlador` (
  `cont_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `cont_nombre` varchar(20) NOT NULL,
  `cont_descripcion` varchar(100) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_control_medidas`
--

CREATE TABLE `pag_control_medidas` (
  `ctrmed_id` int(11) NOT NULL,
  `ctrmed_fecha` date NOT NULL,
  `ctrmed_medida_actual` varchar(100) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `per_id` bigint(20) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pag_control_medidas`
--

INSERT INTO `pag_control_medidas` (`ctrmed_id`, `ctrmed_fecha`, `ctrmed_medida_actual`, `equi_id`, `per_id`, `estado`) VALUES
(1, '2016-04-27', '55555', 'EP_003', 1144125473, '2016-04-27 05:00:00'),
(2, '0000-00-00', '7', '1', 1144125473, NULL);

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
(1, 'VALLE DEL CAUCA', 0, '0000-00-00 00:00:00'),
(2, 'Buenaventura', 3, NULL),
(3, 'Atlantico', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_detalle_ot`
--

CREATE TABLE `pag_detalle_ot` (
  `dot_id` int(11) NOT NULL,
  `ot_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `ttra_id` int(11) NOT NULL,
  `ot_tiempo_trabajo` int(11) NOT NULL,
  `ot_valor_trabajo` int(11) NOT NULL,
  `ot_observacion` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_det_prestamo_herramienta`
--

CREATE TABLE `pag_det_prestamo_herramienta` (
  `detph_id` int(11) NOT NULL,
  `pher_id` int(11) NOT NULL,
  `her_id` int(11) NOT NULL,
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
(1, 1, 1, 8, '1', '1', 1, 1, 1, 6, 1),
(2, 2, 1, 5, 'EP_003', '10', 1, 4, 1, 8, 1),
(3, 3, 1, 8, 'PC_002', '7', 1, 3, 1, 3, 1),
(4, 4, 1, 67, '1', '2', 1, 5, 1, 21, 1),
(5, 5, 1, 2, '1', '5', 1, 6, 1, 70, 1),
(6, 6, 1, 7, '1', '7', 1, 5, 1, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_det_rol_funcion`
--

CREATE TABLE `pag_det_rol_funcion` (
  `drolfunc_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `equi_fecha_compra` date NOT NULL,
  `equi_fecha_instalacion` date NOT NULL,
  `equi_vence_garantia` date NOT NULL,
  `area_id` int(11) NOT NULL,
  `tequi_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_equipo`
--

INSERT INTO `pag_equipo` (`equi_id`, `per_id`, `equi_nombre`, `est_id`, `cen_id`, `equi_foto`, `tmed_id`, `equi_valor_tmed`, `equi_fabricante`, `equi_marca`, `equi_modelo`, `equi_serie`, `equi_ubicacion`, `equi_fecha_compra`, `equi_fecha_instalacion`, `equi_vence_garantia`, `area_id`, `tequi_id`, `estado`) VALUES
('1', 1144125473, 'Torno CNC', 0, 1, '', 1, 1, 'Mazda', 'Mazda', 'Mazda', 'Mazda 123', 'Cali', '2016-03-01', '2016-03-02', '2016-03-31', 1, 1, '0000-00-00 00:00:00'),
('EP_003', 1144125472, 'Equipo de computo MAC', 0, 1, '/srv/www/htdocs/localhost/pagman/web/media/img/Equipos/equipo-EP_003', 1, 1, 'HP', 'HP', 'HP', '3456', 'Salomia', '2016-02-02', '2016-03-02', '2018-02-02', 1, 2, '2016-04-21 05:00:00'),
('PC_002', 1144125473, 'Portatil Linux', 0, 1, '/srv/www/htdocs/localhost/pagman/web/media/img/Equipos/equipo-PC_002', 1, 1, 'Lenovo', 'Lenovo', 'Lenovo', '7431', 'Sena', '2016-04-08', '2016-04-08', '2016-04-15', 2, 1, '2016-04-27 05:00:00');

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
(2, '2', '1', NULL),
(3, '10', 'EP_003', '2016-04-29 05:00:00'),
(4, '9', 'EP_003', '2016-04-28 05:00:00'),
(5, '7', 'PC_002', '2016-04-30 05:00:00'),
(6, '8', 'PC_002', '2016-04-28 05:00:00'),
(7, '4', 'PC_002', '2016-04-29 05:00:00'),
(8, '3', 'PC_002', '2016-04-29 05:00:00'),
(9, '5', '1', '2016-04-16 05:00:00'),
(10, '7', '1', '2016-04-19 05:00:00');

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
(1, 'Activo', 1, '0000-00-00 00:00:00'),
(2, 'Inactivo', 1, '0000-00-00 00:00:00'),
(3, 'Creada', 2, NULL),
(4, 'En ejecución', 2, NULL),
(5, 'Gestionada', 2, NULL),
(6, 'Cerrada', 2, NULL),
(7, 'Por atender', 4, NULL),
(8, 'Atendida', 4, NULL),
(9, 'Cerrada', 3, NULL),
(10, 'Activo', 3, NULL),
(11, 'Inactivo', 3, NULL),
(12, 'Cerrada', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_funcion`
--

CREATE TABLE `pag_funcion` (
  `func_id` int(11) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `func_nombre` varchar(20) NOT NULL,
  `func_descripcion` varchar(100) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_herramienta`
--

CREATE TABLE `pag_herramienta` (
  `her_id` varchar(40) NOT NULL,
  `ther_id` int(11) NOT NULL,
  `her_nombre` varchar(45) NOT NULL,
  `her_descripcion` varchar(45) NOT NULL,
  `her_fecha_ingreso` varchar(200) NOT NULL,
  `est_id` int(11) DEFAULT NULL,
  `her_imagen` varchar(45) DEFAULT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9998, 'Gasolina', 'Gasolina x Litro', 21001, 1, '2016-04-07 19:31:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_inventario`
--

CREATE TABLE `pag_inventario` (
  `inv_id` int(11) NOT NULL,
  `inv_fecha` date NOT NULL,
  `inv_movimiento` varchar(45) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `inv_cant` int(11) NOT NULL,
  `inv_saldo` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_jornada`
--

CREATE TABLE `pag_jornada` (
  `jor_id` int(11) NOT NULL,
  `jor_descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_modulo`
--

CREATE TABLE `pag_modulo` (
  `mod_id` int(11) NOT NULL,
  `mod_nombre` varchar(20) NOT NULL,
  `mod_descripcion` varchar(100) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_orden_trabajo`
--

CREATE TABLE `pag_orden_trabajo` (
  `ot_id` int(11) NOT NULL,
  `ot_fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reg_id` int(11) NOT NULL,
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
  `per_id` bigint(20) DEFAULT NULL,
  `estado` timestamp(1) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_orden_trabajo`
--

INSERT INTO `pag_orden_trabajo` (`ot_id`, `ot_fecha_creacion`, `reg_id`, `cen_id`, `equi_id`, `tfa_id`, `ot_prioridad`, `ot_desc_falla`, `ot_desc_trabajo`, `est_id`, `ot_fecha_inicio`, `ot_fecha_fin`, `ot_ayudantes`, `per_id`, `estado`) VALUES
(1, '2016-04-07 20:11:47', 3, 1, '1', 2, 'Alta', ' Necesita lubricación en las poleas y piñones', ' Desarmar la maquina para afinar los filtros', 3, '8 April, 2016', '15 April, 2016', 'Alex Romero, Nicolas Gaviria, Javier Perezs', 1144125473, NULL),
(2, '2016-04-07 20:13:51', 4, 1, 'EP_003', 2, 'Media', 'Falla de mantenimiento', 'Reparar piñones', 3, '8 April, 2016', '15 April, 2016', 'Esteban, Ceron, Cortes', 1144125473, NULL),
(3, '2016-04-07 22:34:53', 3, 1, 'EP_003', 1, 'Media', ' Hay cortos en la maquina y sonidos.', ' Revisar el cableado de la maquina.', 3, '7 April, 2016', '21 April, 2016', 'Yan Carlo, Anibal, David.', 1144125473, '2016-04-07 22:34:53.0');

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
(1144125472, 'Jhon', 'perdomo', '3124534', '3128546345', 'tatan@gmail.com', 'Cra 45 45 567', 1, 800, 1, 1, 'persona', NULL),
(1144125473, 'David Fernando', 'Barona', '4434564', '3185235463', 'dferbac@gmail.com', 'Calle 8A 45 106', 1, 500, 1, 1, 'usuario del sistema', NULL),
(1151956249, 'Super', 'Administrador', '3845030', '3135396721', 'esteban@gmail.com', 'cll 45', 1, 5000, 1, 1, 'usuario del sistema', NULL),
(1222454654, 'andy lucia', 'tovar velez', '3124345', '3146665689', 'velez@gmail.com', 'cll 56 #56-9', 3, 12000, 1, 1, 'persona', NULL),
(1223345467, 'jenifer', 'duran valencia', '3147644', '3214344443', 'valencia@outlook.es', 'cll 5 #56-10', 3, 34000, 1, 1, 'usuario del sistema', NULL),
(1234444457, 'federico', 'prieto tovar', '3123560', '3198656667', 'tov@gmail.es', 'cll 89 #56-81', 3, 15800, 1, 1, 'persona', NULL),
(1332343009, 'cristina', 'carmona fernil', '5445567', '3233467567', 'fernil@hotmeil.com', 'crr 39 #11-17', 1, 8000, 1, 1, 'persona', NULL),
(1453234507, 'isabell', 'fernandez castillo', '3534547', '3225367655', 'isa@hotmail.com', 'cll 82 #22-21', 3, 4500, 1, 1, 'persona', NULL),
(1526365476, 'camilo', 'jimenez cartago', '3454545', '3124656768', 'cer@outlook.com', 'crr 56 #45-09', 1, 5600, 1, 1, 'persona', NULL),
(1544666087, 'veronica', 'villanueva', '3176446700', '3104676555', 'veronica@hotmail.com', 'crr 56 #67-88', 3, 54800, 1, 1, 'persona', NULL),
(3112254098, 'clara eugenia', 'valencia fernandez', '3445567', '3111556665', 'clara@gmail.com', 'cll 14 #16-61', 1, 5850, 1, 1, 'persona', NULL),
(3212454680, 'gloria maria', 'perez', '2365465', '3225655678', 'gloria@gmail.es', 'crr 5 #5-21', 1, 89700, 1, 1, 'persona', NULL),
(3213087654, 'analya', 'redondo ayala', '2344353', '3145676666', 'ayala@gmail.con', 'cll 73 #5-9', 1, 5000, 1, 1, 'persona', NULL),
(3324330087, 'ramiro', 'tavera hernandez', '3446587', '3115656679', 'her@gmail.com', 'cll 89 #45-90', 1, 7000, 1, 1, 'persona', NULL),
(4311123097, 'valentina', 'diaz restrepo', '3454466', '3187554454', 'valentina@hotmeil.es', 'cll 67 #15-11', 1, 7900, 1, 1, 'persona', NULL),
(4566447557, 'jamez', 'rodriguez', '3178760', '3216579676', 'rod@gmail.com', 'cll89 #56-78', 1, 5400, 1, 1, 'persona', NULL),
(4665434576, 'alejandra maria', 'ordonez ocampo', '4555780', '3125776787', 'ocampo@gmail.es', 'crr 45 #45-89', 1, 6000, 1, 1, 'persona', NULL),
(6450009777, 'rodrigo', 'melendez riano', '3195566545', '3344476567', 'medlo@gmail.com', 'cll 89 #45-44', 3, 5900, 1, 1, 'persona', NULL),
(6687544757, 'rodolfo alonso', 'melendez prieto', '5765567', '3187798678', 'prieto@gmail.com', 'cll 89 #45-12', 3, 566999, 1, 1, 'persona', NULL),
(6754634007, 'lucia', 'beltran ocampo', '5323564', '3144454758', 'bellucia@gmail.es', 'cll 89 #45-89', 1, 8000, 1, 1, 'persona', NULL),
(9809865434, 'carla vanessa', 'martinez vega', '4765769', '3114558766', 'vega@gmail.com', 'cll 89 #56-98', 1, 56888, 1, 1, 'persona', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_prestamo_herramienta`
--

CREATE TABLE `pag_prestamo_herramienta` (
  `pher_id` int(11) NOT NULL,
  `pher_fecha` date NOT NULL,
  `per_id_solicita` int(11) NOT NULL,
  `pher_fecha_devolucion` date NOT NULL,
  `pher_observaciones` varchar(100) NOT NULL,
  `alm_id` int(11) NOT NULL,
  `jor_id` int(11) NOT NULL,
  `per_id_entrega` int(11) NOT NULL,
  `estado` timestamp(1) NULL DEFAULT NULL
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
(2, 'Baja', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_programacion_equipo`
--

CREATE TABLE `pag_programacion_equipo` (
  `proequi_id` int(11) NOT NULL,
  `proequi_fecha` varchar(25) NOT NULL,
  `cen_id` int(11) NOT NULL,
  `proequi_fecha_inicio` varchar(25) NOT NULL,
  `tman_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_programacion_equipo`
--

INSERT INTO `pag_programacion_equipo` (`proequi_id`, `proequi_fecha`, `cen_id`, `proequi_fecha_inicio`, `tman_id`, `estado`) VALUES
(1, '21 April, 2016', 1, '30 April, 2016', 1, '2016-04-20 05:00:00'),
(2, '27 April, 2016', 1, '29 April, 2016', 1, '2016-04-25 05:00:00'),
(3, '27 April, 2016', 1, '29 April, 2016', 1, '2016-04-25 05:00:00'),
(4, '29 April, 2016', 1, '29 April, 2016', 1, '2016-04-25 05:00:00'),
(5, '25 April, 2016', 1, '29 April, 2016', 1, '2016-04-25 05:00:00'),
(6, '25 April, 2016', 1, '29 April, 2016', 1, '2016-04-25 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_regional`
--

CREATE TABLE `pag_regional` (
  `reg_id` int(11) NOT NULL,
  `reg_nombre` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_regional`
--

INSERT INTO `pag_regional` (`reg_id`, `reg_nombre`, `estado`) VALUES
(3, 'Zona pacifico2', NULL),
(4, 'Zona Caribe', NULL),
(5, 'Zona Sur', NULL);

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
(1, 'Administrador', 'Tiene acceso a todo el sistema', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_solicitud_servicio`
--

CREATE TABLE `pag_solicitud_servicio` (
  `sserv_id` int(11) NOT NULL,
  `sserv_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `sserv_descripcion` varchar(100) NOT NULL,
  `per_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_solicitud_servicio`
--

INSERT INTO `pag_solicitud_servicio` (`sserv_id`, `sserv_fecha`, `cen_id`, `equi_id`, `sserv_descripcion`, `per_id`, `est_id`, `tfa_id`, `estado`) VALUES
(1, '2016-04-03 19:59:42', 1, '1', 'Descripción', 1144125473, 1, 1, '2016-04-03 19:59:42'),
(2, '2016-04-07 22:30:03', 1, '1', 'Calibrar', 1144125473, 2, 1, '2016-04-07 22:30:03'),
(3, '2016-04-03 19:51:36', 1, '1', 'Orden de trabajo 1', 1151956249, 7, 1, NULL),
(4, '2016-04-03 20:07:22', 1, '', 'Hola Mundo', 1144125473, 7, 1, NULL),
(5, '2016-04-03 20:07:25', 1, '', 'Hola Mundo', 1144125473, 7, 1, NULL),
(6, '2016-04-03 20:07:39', 1, '', 'Hola Mundo', 1144125473, 7, 1, NULL),
(7, '2016-04-03 20:08:24', 1, '', 'Hola Mundo', 1144125473, 7, 1, NULL),
(8, '2016-04-03 20:08:25', 1, '', 'Hola Mundo', 1144125473, 7, 1, NULL),
(9, '2016-04-03 20:12:01', 1, '1', 'Hola Mundo', 1144125473, 7, 2, NULL),
(10, '2016-04-03 20:13:11', 1, '1', 'Hola 123', 1144125472, 8, 1, NULL),
(11, '2016-04-07 22:29:04', 1, 'EP_003', 'La maquina tiene un sonido raro.', 1144125445, 7, 2, NULL),
(12, '2016-04-23 23:41:09', 0, '', '', 0, 7, 0, NULL),
(13, '2016-04-23 23:41:12', 0, '', '', 0, 7, 0, NULL),
(14, '2016-04-23 23:41:16', 0, '', '', 0, 7, 0, NULL),
(15, '2016-04-23 23:41:21', 0, '', '', 0, 7, 0, NULL);

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
(2, 'Lubricacion', NULL),
(3, 'engrasar', NULL),
(4, 'limpieza', NULL),
(5, 'ensamble', NULL),
(6, 'desensamble', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_de_equipo`
--

CREATE TABLE `pag_tipo_de_equipo` (
  `tequi_id` int(11) NOT NULL,
  `tequi_descripcion` varchar(45) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_de_equipo`
--

INSERT INTO `pag_tipo_de_equipo` (`tequi_id`, `tequi_descripcion`, `estado`) VALUES
(1, 'Electromecanico', NULL),
(2, 'Hidraulico', NULL),
(3, 'Hola', NULL);

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
(4, 'Solicitudes de servicio', NULL),
(5, 'Equipo', NULL);

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
(1, 'Mecanica', '0000-00-00 00:00:00'),
(2, 'Hidraulica', '0000-00-00 00:00:00');

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
(1, 'Mecanica', NULL),
(2, 'Electrica', NULL);

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
  `tmed_estado` varchar(45) NOT NULL,
  `estado` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_medidor`
--

INSERT INTO `pag_tipo_medidor` (`tmed_id`, `tmed_nombre`, `tmed_descripcion`, `tmed_acronimo`, `tmed_estado`, `estado`) VALUES
(1, 'meses', 'gfhjghgytu', 'ero', 'Activo', '2016-04-13 05:00:00'),
(2, 'semanas', 'tyyuuyy', '677', 'Activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pag_tipo_trabajo`
--

CREATE TABLE `pag_tipo_trabajo` (
  `ttra_id` int(11) NOT NULL,
  `ttra_descripcion` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pag_tipo_trabajo`
--

INSERT INTO `pag_tipo_trabajo` (`ttra_id`, `ttra_descripcion`, `estado`) VALUES
(1, 'Hidraulico', 1),
(2, 'Limpieza', 1);

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
(2, 'Centrimetros cubicos', NULL),
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
(1144125473, 'dbarona', '12345', 'desactivado', 1),
(1151956249, 'admin', '0000', 'activo', 1),
(1223345467, 'jenifer', '12345', 'desactivado', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pag_almacen`
--
ALTER TABLE `pag_almacen`
  ADD PRIMARY KEY (`alm_id`);

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
  ADD PRIMARY KEY (`ctrmed_id`);

--
-- Indices de la tabla `pag_departamento`
--
ALTER TABLE `pag_departamento`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indices de la tabla `pag_detalle_ot`
--
ALTER TABLE `pag_detalle_ot`
  ADD PRIMARY KEY (`dot_id`),
  ADD KEY `ot_id` (`ot_id`),
  ADD KEY `comp_id` (`comp_id`);

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
-- Indices de la tabla `pag_det_rol_funcion`
--
ALTER TABLE `pag_det_rol_funcion`
  ADD PRIMARY KEY (`drolfunc_id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `func_id` (`func_id`);

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
  ADD PRIMARY KEY (`est_id`);

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
  ADD PRIMARY KEY (`ot_id`);

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
-- Indices de la tabla `pag_tipo_de_equipo`
--
ALTER TABLE `pag_tipo_de_equipo`
  ADD PRIMARY KEY (`tequi_id`);

--
-- Indices de la tabla `pag_tipo_doc`
--
ALTER TABLE `pag_tipo_doc`
  ADD PRIMARY KEY (`tdoc_id`);

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
  MODIFY `cen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_ciudad`
--
ALTER TABLE `pag_ciudad`
  MODIFY `ciud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_controlador`
--
ALTER TABLE `pag_controlador`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_control_medidas`
--
ALTER TABLE `pag_control_medidas`
  MODIFY `ctrmed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_departamento`
--
ALTER TABLE `pag_departamento`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_detalle_ot`
--
ALTER TABLE `pag_detalle_ot`
  MODIFY `dot_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_det_prestamo_herramienta`
--
ALTER TABLE `pag_det_prestamo_herramienta`
  MODIFY `detph_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_det_programacion`
--
ALTER TABLE `pag_det_programacion`
  MODIFY `detprog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pag_det_rol_funcion`
--
ALTER TABLE `pag_det_rol_funcion`
  MODIFY `drolfunc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_equipo_componente`
--
ALTER TABLE `pag_equipo_componente`
  MODIFY `equicomp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pag_funcion`
--
ALTER TABLE `pag_funcion`
  MODIFY `func_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_insumo`
--
ALTER TABLE `pag_insumo`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9999;
--
-- AUTO_INCREMENT de la tabla `pag_inventario`
--
ALTER TABLE `pag_inventario`
  MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_jornada`
--
ALTER TABLE `pag_jornada`
  MODIFY `jor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_modulo`
--
ALTER TABLE `pag_modulo`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_orden_trabajo`
--
ALTER TABLE `pag_orden_trabajo`
  MODIFY `ot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_prestamo_herramienta`
--
ALTER TABLE `pag_prestamo_herramienta`
  MODIFY `pher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_prioridad_trabajo`
--
ALTER TABLE `pag_prioridad_trabajo`
  MODIFY `priotra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_programacion_equipo`
--
ALTER TABLE `pag_programacion_equipo`
  MODIFY `proequi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pag_regional`
--
ALTER TABLE `pag_regional`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pag_rol`
--
ALTER TABLE `pag_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pag_solicitud_servicio`
--
ALTER TABLE `pag_solicitud_servicio`
  MODIFY `sserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `pag_tarea`
--
ALTER TABLE `pag_tarea`
  MODIFY `tar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_de_equipo`
--
ALTER TABLE `pag_tipo_de_equipo`
  MODIFY `tequi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_doc`
--
ALTER TABLE `pag_tipo_doc`
  MODIFY `tdoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_falla`
--
ALTER TABLE `pag_tipo_falla`
  MODIFY `tfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_herramienta`
--
ALTER TABLE `pag_tipo_herramienta`
  MODIFY `ther_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_mantenimiento`
--
ALTER TABLE `pag_tipo_mantenimiento`
  MODIFY `tman_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pag_tipo_medidor`
--
ALTER TABLE `pag_tipo_medidor`
  MODIFY `tmed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Filtros para la tabla `pag_detalle_ot`
--
ALTER TABLE `pag_detalle_ot`
  ADD CONSTRAINT `pag_detalle_ot_ibfk_1` FOREIGN KEY (`ot_id`) REFERENCES `pag_orden_trabajo` (`ot_id`),
  ADD CONSTRAINT `pag_detalle_ot_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `pag_componente` (`comp_id`);

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
-- Filtros para la tabla `pag_det_rol_funcion`
--
ALTER TABLE `pag_det_rol_funcion`
  ADD CONSTRAINT `pag_det_rol_funcion_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `pag_rol` (`rol_id`),
  ADD CONSTRAINT `pag_det_rol_funcion_ibfk_2` FOREIGN KEY (`func_id`) REFERENCES `pag_funcion` (`func_id`);

--
-- Filtros para la tabla `pag_equipo`
--
ALTER TABLE `pag_equipo`
  ADD CONSTRAINT `pag_equipo_ibfk_1` FOREIGN KEY (`per_id`) REFERENCES `pag_persona` (`per_id`),
  ADD CONSTRAINT `pag_equipo_ibfk_2` FOREIGN KEY (`cen_id`) REFERENCES `pag_centro` (`cen_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
