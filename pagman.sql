-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 11-07-2016 a las 15:25:09
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `pagman`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_almacen`
-- 

CREATE TABLE `pag_almacen` (
  `alm_id` int(11) NOT NULL auto_increment,
  `alm_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`alm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_almacen`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_almacenista`
-- 

CREATE TABLE `pag_almacenista` (
  `alma_id` int(11) NOT NULL auto_increment,
  `alma_descripcion` varchar(40) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`alma_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `pag_almacenista`
-- 

INSERT INTO `pag_almacenista` VALUES (1, 'Alvaro', NULL);
INSERT INTO `pag_almacenista` VALUES (2, 'Tejada', NULL);
INSERT INTO `pag_almacenista` VALUES (3, 'Alvaro', '2016-06-17 09:07:35');
INSERT INTO `pag_almacenista` VALUES (4, 'Tejada', '2016-06-17 09:07:35');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_area`
-- 

CREATE TABLE `pag_area` (
  `area_id` int(11) NOT NULL auto_increment,
  `area_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`area_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_area`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_campos_personalizados`
-- 

CREATE TABLE `pag_campos_personalizados` (
  `cp_id` int(11) NOT NULL,
  `cp_nombre` varchar(45) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`cp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_campos_personalizados`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_cargo`
-- 

CREATE TABLE `pag_cargo` (
  `car_id` int(11) NOT NULL auto_increment,
  `car_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`car_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `pag_cargo`
-- 

INSERT INTO `pag_cargo` VALUES (1, 'Desarrollador de Software', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_centro`
-- 

CREATE TABLE `pag_centro` (
  `cen_id` int(11) NOT NULL auto_increment,
  `cen_nombre` varchar(100) NOT NULL,
  `cen_dir` varchar(45) NOT NULL,
  `cen_telefono` varchar(45) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`cen_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `pag_centro`
-- 

INSERT INTO `pag_centro` VALUES (1, 'CDTI', 'Pondaje', '3275647', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_ciudad`
-- 

CREATE TABLE `pag_ciudad` (
  `ciud_id` int(11) NOT NULL auto_increment,
  `ciud_nombre` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`ciud_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_ciudad`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_componente`
-- 

CREATE TABLE `pag_componente` (
  `comp_id` varchar(45) NOT NULL,
  `comp_descripcion` varchar(100) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`comp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_componente`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_controlador`
-- 

CREATE TABLE `pag_controlador` (
  `cont_id` int(11) NOT NULL auto_increment,
  `mod_id` int(11) NOT NULL,
  `cont_nombre` varchar(40) NOT NULL,
  `cont_icono` varchar(40) NOT NULL,
  `cont_display` varchar(40) NOT NULL,
  `cont_descripcion` varchar(100) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`cont_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_controlador`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_control_medidas`
-- 

CREATE TABLE `pag_control_medidas` (
  `ctrmed_id` int(11) NOT NULL auto_increment,
  `ctrmed_fecha` date NOT NULL,
  `ctrmed_medida_actual` varchar(100) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `per_id` bigint(20) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`ctrmed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_control_medidas`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_departamento`
-- 

CREATE TABLE `pag_departamento` (
  `dept_id` int(11) NOT NULL auto_increment,
  `dept_nombre` varchar(45) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`dept_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `pag_departamento`
-- 

INSERT INTO `pag_departamento` VALUES (1, 'VALLE DEL CAUCA', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_detalle_ot`
-- 

CREATE TABLE `pag_detalle_ot` (
  `dot_id` int(11) NOT NULL auto_increment,
  `ot_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `ttra_id` int(11) NOT NULL,
  `ot_tiempo_trabajo` int(11) NOT NULL,
  `ot_valor_trabajo` int(11) NOT NULL,
  `ot_observacion` varchar(45) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`dot_id`),
  KEY `ot_id` (`ot_id`),
  KEY `comp_id` (`comp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_detalle_ot`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_det_prestamo_herramienta`
-- 

CREATE TABLE `pag_det_prestamo_herramienta` (
  `detph_id` int(11) NOT NULL auto_increment,
  `pher_id` int(11) NOT NULL,
  `her_id` int(11) NOT NULL,
  `detph_cant_solicita` int(11) NOT NULL,
  `detph_cant_entrega` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `detph_observacion` varchar(100) NOT NULL,
  PRIMARY KEY  (`detph_id`),
  KEY `pher_id` (`pher_id`),
  KEY `her_id` (`her_id`),
  KEY `est_id` (`est_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_det_prestamo_herramienta`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_det_programacion`
-- 

CREATE TABLE `pag_det_programacion` (
  `detprog_id` int(11) NOT NULL auto_increment,
  `proequi_id` int(11) NOT NULL,
  `ttra_id` int(11) NOT NULL,
  `detprog_duracion_horas` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `comp_id` varchar(45) NOT NULL,
  `priotra_id` int(11) NOT NULL,
  `tar_id` int(11) NOT NULL,
  PRIMARY KEY  (`detprog_id`),
  KEY `proequi_id` (`proequi_id`),
  KEY `ttra_id` (`ttra_id`),
  KEY `equi_id` (`equi_id`),
  KEY `comp_id` (`comp_id`),
  KEY `priotra_id` (`priotra_id`),
  KEY `tar_id` (`tar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_det_programacion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_det_rol_funcion`
-- 

CREATE TABLE `pag_det_rol_funcion` (
  `drolfunc_id` int(11) NOT NULL auto_increment,
  `rol_id` int(11) NOT NULL,
  `func_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`drolfunc_id`),
  KEY `rol_id` (`rol_id`),
  KEY `func_id` (`func_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_det_rol_funcion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_equipo`
-- 

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
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`equi_id`),
  KEY `per_id` (`per_id`),
  KEY `cen_id` (`cen_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_equipo`
-- 

INSERT INTO `pag_equipo` VALUES ('1', 1144125473, 'Torno CNC', 1, '', 1, 1, 'Mazda', 'Mazda', 'Mazda', 'Mazda 123', 'Cali', '2016-03-01', '2016-03-02', '2016-03-31', 1, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_equipo_componente`
-- 

CREATE TABLE `pag_equipo_componente` (
  `equicomp_id` int(11) NOT NULL auto_increment,
  `comp_id` varchar(45) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`equicomp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_equipo_componente`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_equipo_cp`
-- 

CREATE TABLE `pag_equipo_cp` (
  `equicp_id` int(11) NOT NULL auto_increment,
  `equi_id` varchar(45) NOT NULL,
  `cp_id` int(11) NOT NULL,
  `equicp_valor` varchar(100) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`equicp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_equipo_cp`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_equipo_planos`
-- 

CREATE TABLE `pag_equipo_planos` (
  `equipla_id` int(11) NOT NULL auto_increment,
  `equi_id` varchar(45) NOT NULL,
  `equipla_descripcion` varchar(100) NOT NULL,
  `equipla_ruta` varchar(100) NOT NULL,
  PRIMARY KEY  (`equipla_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_equipo_planos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_estado`
-- 

CREATE TABLE `pag_estado` (
  `est_id` int(11) NOT NULL auto_increment,
  `est_descripcion` varchar(45) NOT NULL,
  `tdoc_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`est_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- 
-- Volcar la base de datos para la tabla `pag_estado`
-- 

INSERT INTO `pag_estado` VALUES (1, 'Activo', 1, '0000-00-00 00:00:00');
INSERT INTO `pag_estado` VALUES (2, 'Inactivo', 1, '0000-00-00 00:00:00');
INSERT INTO `pag_estado` VALUES (3, 'Creada', 2, NULL);
INSERT INTO `pag_estado` VALUES (4, 'En ejecución', 2, NULL);
INSERT INTO `pag_estado` VALUES (5, 'Gestionada', 2, NULL);
INSERT INTO `pag_estado` VALUES (6, 'Cerrada', 2, NULL);
INSERT INTO `pag_estado` VALUES (7, 'Por atender', 4, NULL);
INSERT INTO `pag_estado` VALUES (8, 'Atendida', 4, NULL);
INSERT INTO `pag_estado` VALUES (9, 'Cerrada', 3, NULL);
INSERT INTO `pag_estado` VALUES (10, 'Activo', 3, NULL);
INSERT INTO `pag_estado` VALUES (11, 'Inactivo', 3, NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_funcion`
-- 

CREATE TABLE `pag_funcion` (
  `func_id` int(11) NOT NULL auto_increment,
  `cont_id` int(11) NOT NULL,
  `func_nombre` varchar(40) NOT NULL,
  `func_display` varchar(40) NOT NULL,
  `func_descripcion` varchar(100) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`func_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_funcion`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_permisos`
-- 

CREATE TABLE `pag_permisos` (
  `perm_id` int(11) NOT NULL auto_increment,
  `func_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY  (`perm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_permisos`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_herramienta`
-- 

CREATE TABLE `pag_herramienta` (
  `her_id` varchar(60) NOT NULL,
  `her_nombre` varchar(45) NOT NULL,
  `her_descripcion` varchar(45) NOT NULL,
  `ther_id` int(11) NOT NULL,
  `her_fecha_ingreso` varchar(20) NOT NULL,
  `est_id` int(11) NOT NULL,
  `her_imagen` varchar(45) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`her_id`),
  KEY `ther_id` (`ther_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_herramienta`
-- 

INSERT INTO `pag_herramienta` VALUES ('nueva_herramienta_p', 'nueva herramienta prueba', 'herramienta de prueba', 3, '14 July, 2016', 0, 'Koala.jpg', NULL);
INSERT INTO `pag_herramienta` VALUES ('pc_andres_41xn_HP', 'HPandres prueba', 'herramienta de prueba', 1, '14 June, 2016', 0, 'portatilHP.jpg', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_insumo`
-- 

CREATE TABLE `pag_insumo` (
  `ins_id` int(11) NOT NULL auto_increment,
  `ins_nombre` varchar(45) NOT NULL,
  `ins_descripcion` varchar(45) NOT NULL,
  `ins_valor` int(11) NOT NULL,
  `umed_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`ins_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_insumo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_inventario`
-- 

CREATE TABLE `pag_inventario` (
  `inv_id` int(11) NOT NULL auto_increment,
  `inv_fecha` date NOT NULL,
  `inv_movimiento` varchar(45) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `inv_cant` int(11) NOT NULL,
  `inv_saldo` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`inv_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_inventario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_jornada`
-- 

CREATE TABLE `pag_jornada` (
  `jor_id` int(11) NOT NULL auto_increment,
  `jor_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`jor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `pag_jornada`
-- 

INSERT INTO `pag_jornada` VALUES (1, 'Mañana', NULL);
INSERT INTO `pag_jornada` VALUES (2, 'Tarde', NULL);
INSERT INTO `pag_jornada` VALUES (3, 'noche', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_modulo`
-- 

CREATE TABLE `pag_modulo` (
  `mod_id` int(11) NOT NULL auto_increment,
  `mod_nombre` varchar(20) NOT NULL,
  `mod_icono` varchar(40) NOT NULL,
  `mod_sitio_menu` varchar(20) NOT NULL,
  `mod_descripcion` varchar(100) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`mod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_modulo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_orden_trabajo`
-- 

CREATE TABLE `pag_orden_trabajo` (
  `ot_id` int(11) NOT NULL auto_increment,
  `ot_fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `per_id_mantenedor` int(11) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `tman_id` int(11) NOT NULL,
  `ot_num_doc` int(11) NOT NULL,
  `tdoc_id` int(11) NOT NULL,
  `ot_observacion` varchar(100) NOT NULL,
  `est_id` int(11) NOT NULL,
  `ot_fecha_ini` date default NULL,
  `ot_ayudantes` varchar(100) default NULL,
  `per_id_responsables` int(11) default NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`ot_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_orden_trabajo`
-- 


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
  `per_direccion` varchar(45) default NULL,
  `dept_id` int(11) NOT NULL,
  `per_valor_hora` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `cen_id` int(11) NOT NULL,
  `per_tipo` varchar(50) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`per_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_persona`
-- 

INSERT INTO `pag_persona` VALUES (1144125472, 'Jhonatan', 'Tavera', '3124534', '3128546345', 'tatan@gmail.com', 'Cra 45 45 567', 1, 300000, 1, 1, 'persona', NULL);
INSERT INTO `pag_persona` VALUES (1144125473, 'David Fernando', 'Barona', '4434564', '3185235463', 'dferbac@gmail.com', 'Calle 8A 45 106', 1, 200000, 1, 1, 'usuario del sistema', NULL);
INSERT INTO `pag_persona` VALUES (1151956249, 'Super', 'Administrador', '3845030', '3135396721', 'esteban@gmail.com', NULL, 1, 5000, 1, 1, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_prestamo_herramienta`
-- 

CREATE TABLE `pag_prestamo_herramienta` (
  `pher_id` int(11) NOT NULL auto_increment,
  `pher_fecha` date NOT NULL,
  `per_id_solicita` int(11) NOT NULL,
  `pher_fecha_devolucion` date NOT NULL,
  `pher_observaciones` varchar(100) NOT NULL,
  `alm_id` int(11) NOT NULL,
  `jor_id` int(11) NOT NULL,
  `per_id_entrega` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`pher_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `pag_prestamo_herramienta`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_prioridad_trabajo`
-- 

CREATE TABLE `pag_prioridad_trabajo` (
  `priotra_id` int(11) NOT NULL,
  `priotra_descripcion` varchar(20) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`priotra_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_prioridad_trabajo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_programacion_equipo`
-- 

CREATE TABLE `pag_programacion_equipo` (
  `proequi_id` int(11) NOT NULL auto_increment,
  `proequi_fecha` date NOT NULL,
  `cen_id` int(11) NOT NULL,
  `proequi_fecha_inicio` date NOT NULL,
  `tman_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`proequi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_programacion_equipo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_regional`
-- 

CREATE TABLE `pag_regional` (
  `reg_id` int(11) NOT NULL auto_increment,
  `reg_nombre` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`reg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `pag_regional`
-- 

INSERT INTO `pag_regional` VALUES (1, 'VALLE DEL CAUCA', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_rol`
-- 

CREATE TABLE `pag_rol` (
  `rol_id` int(11) NOT NULL auto_increment,
  `rol_nombre` varchar(20) NOT NULL,
  `rol_descripcion` varchar(100) default NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`rol_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `pag_rol`
-- 

INSERT INTO `pag_rol` VALUES (1, 'Administrador', 'Tiene acceso a todo el sistema', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_solicitud_servicio`
-- 

CREATE TABLE `pag_solicitud_servicio` (
  `sserv_id` int(11) NOT NULL auto_increment,
  `sserv_fecha` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `cen_id` int(11) NOT NULL,
  `equi_id` varchar(45) NOT NULL,
  `sserv_descripcion` varchar(100) NOT NULL,
  `per_id` int(11) NOT NULL,
  `est_id` int(11) NOT NULL,
  `tfa_id` int(11) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`sserv_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `pag_solicitud_servicio`
-- 

INSERT INTO `pag_solicitud_servicio` VALUES (1, '2016-03-28 13:50:07', 1, '1', 'Descripción', 1144125473, 1, 1, NULL);
INSERT INTO `pag_solicitud_servicio` VALUES (2, '2016-03-30 10:34:55', 1, '1', 'Calibrar', 1144125473, 2, 1, NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tarea`
-- 

CREATE TABLE `pag_tarea` (
  `tar_id` int(11) NOT NULL auto_increment,
  `tar_nombre` varchar(200) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`tar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_tarea`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tipo_de_equipo`
-- 

CREATE TABLE `pag_tipo_de_equipo` (
  `tequi_id` int(11) NOT NULL,
  `tequi_descripcion` varchar(45) NOT NULL,
  `cp_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`tequi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_tipo_de_equipo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tipo_doc`
-- 

CREATE TABLE `pag_tipo_doc` (
  `tdoc_id` int(11) NOT NULL auto_increment,
  `tdoc_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`tdoc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `pag_tipo_doc`
-- 

INSERT INTO `pag_tipo_doc` VALUES (1, 'General', NULL);
INSERT INTO `pag_tipo_doc` VALUES (2, 'Orden de trabajo', NULL);
INSERT INTO `pag_tipo_doc` VALUES (3, 'Programación equipos', NULL);
INSERT INTO `pag_tipo_doc` VALUES (4, 'Solicitudes de servicio', NULL);
INSERT INTO `pag_tipo_doc` VALUES (5, 'Equipo', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tipo_falla`
-- 

CREATE TABLE `pag_tipo_falla` (
  `tfa_id` int(11) NOT NULL auto_increment,
  `tfa_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`tfa_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `pag_tipo_falla`
-- 

INSERT INTO `pag_tipo_falla` VALUES (1, 'Mecanica', '0000-00-00 00:00:00');
INSERT INTO `pag_tipo_falla` VALUES (2, 'Hidraulica', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tipo_herramienta`
-- 

CREATE TABLE `pag_tipo_herramienta` (
  `ther_id` int(11) NOT NULL auto_increment,
  `ther_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`ther_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `pag_tipo_herramienta`
-- 

INSERT INTO `pag_tipo_herramienta` VALUES (1, 'Digitales', NULL);
INSERT INTO `pag_tipo_herramienta` VALUES (2, 'Analogas', NULL);
INSERT INTO `pag_tipo_herramienta` VALUES (3, 'Pesadas', NULL);
INSERT INTO `pag_tipo_herramienta` VALUES (4, 'otras..', NULL);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tipo_mantenimiento`
-- 

CREATE TABLE `pag_tipo_mantenimiento` (
  `ther_id` int(11) NOT NULL auto_increment,
  `ther_descripcion` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`ther_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `pag_tipo_mantenimiento`
-- 

INSERT INTO `pag_tipo_mantenimiento` VALUES (1, 'Digitales', '2016-06-03 09:17:23');
INSERT INTO `pag_tipo_mantenimiento` VALUES (2, 'Analogas', '2016-06-03 09:17:23');
INSERT INTO `pag_tipo_mantenimiento` VALUES (3, 'Pesadas', '2016-06-03 09:17:23');
INSERT INTO `pag_tipo_mantenimiento` VALUES (4, 'otras..', '2016-06-03 09:17:23');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tipo_medidor`
-- 

CREATE TABLE `pag_tipo_medidor` (
  `tmed_id` int(11) NOT NULL auto_increment,
  `tmed_nombre` varchar(45) NOT NULL,
  `tmed_descripcion` varchar(45) NOT NULL,
  `tmed_acronimo` varchar(45) NOT NULL,
  `tmed_estado` varchar(45) NOT NULL,
  `estado` timestamp NULL default NULL,
  PRIMARY KEY  (`tmed_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_tipo_medidor`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_tipo_trabajo`
-- 

CREATE TABLE `pag_tipo_trabajo` (
  `ttra_id` int(11) NOT NULL auto_increment,
  `ttra_descripcion` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`ttra_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `pag_tipo_trabajo`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `pag_usuario`
-- 

CREATE TABLE `pag_usuario` (
  `per_id` bigint(20) NOT NULL,
  `usu_usuario` varchar(45) NOT NULL,
  `usu_clave` varchar(45) NOT NULL,
  `usu_estado` varchar(45) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY  (`per_id`),
  UNIQUE KEY `usu_usuario_UNIQUE` (`usu_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `pag_usuario`
-- 

INSERT INTO `pag_usuario` VALUES (1144125473, 'dbarona', '1234', 'activo', 1);
INSERT INTO `pag_usuario` VALUES (1151956249, 'admin', '0000', 'activo', 1);
