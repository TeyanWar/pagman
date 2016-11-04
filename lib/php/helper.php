<?php

function crearUrl($modulo, $controlador, $accion, $parametros = false) {

    if (isset($parametros) && is_array($parametros)) {
        $parametrosPlus = implode("/", $parametros);
        $url = $_SERVER['SCRIPT_NAME'] . "/$modulo/$controlador/$accion/$parametrosPlus";
    } else {
        $url = $_SERVER['SCRIPT_NAME'] . "/$modulo/$controlador/$accion";
    }

    return $url;
}

function dd($array) {
    echo "<pre>";
    die(print_r($array));
}

function addLib($enlace) {

    // Se reemplaza en la cadena SCRIPT_NAME es archivo index.php por vacio
    $url = str_replace('index.php', '', $_SERVER['SCRIPT_NAME']);

    return $url . "$enlace";
}

function addLibErrors($enlace) {

    // Se reemplaza en la cadena SCRIPT_NAME es archivo index.php por vacio
    $url = str_replace('templates/adminMaterialize/errors/error.php', '', $_SERVER['SCRIPT_NAME']);

    return $url . "$enlace";
}

function redirect($url) {
    echo "<script type='text/javascript'>window.location.href='$url'</script>";
}

function getDocumentRoot() {
    return str_replace("/web/index.php", "", $_SERVER['SCRIPT_FILENAME']);
}

//------------------ Inicio funcion de errores/ validaciones del servidor-------

function setErrores($errores = array()) {

    $mensajeError = "";

    if (is_array($errores) && count($errores) > 0) {

        $mensajeError = "<h6><strong>Por favor corregir los siguientes errores: </strong></h6>"
                . "<ul>";

        foreach ($errores as $error) {

            $mensajeError .= "<li>* " . $error . "</li>";
        }

        $mensajeError .= "</ul>";
    }

    $_SESSION['mensajeError'] = $mensajeError;
}

function getErrores() {

    $mensajeError = "";

    if (isset($_SESSION['mensajeError'])) {

        $mensajeError = $_SESSION['mensajeError'];
        unset($_SESSION['mensajeError']);
    }

    return $mensajeError;
}

//------------------ Fin funcion de errores/ validaciones del servidor----------
//------------------ Inicio función para errores de validación servidor AJAX----

function getRespuestaAccion($funcion = "") {
    $accion = true;
    $mensajes = "Acci&oacute;n exitosa. ";
    $redirect = $funcion;

    if (isset($_SESSION['mensajeError'])) {
        $accion = false;
        $mensajes = $_SESSION['mensajeError'];
        unset($_SESSION['mensajeError']);
    }

    return json_encode(array('accion' => $accion, 'mensajes' => $mensajes, 'redirect' => $redirect));
}

//------------------ Fin función para errores de validación servidor AJAX-------
//------------------ Inicio formato fechas -----------------------------------
function explodeFecha($cadena) {
    $patronFecha = "/^[0-9]*$|-/";
    if (preg_match($patronFecha, $cadena)) {
        $fecha = explode("-", $cadena);
        setFechaLetras($fecha[0], $fecha[1], $fecha[2]);
    } else {
        $fecha = explode(" ", $cadena);
        setFechaNumeros($fecha[0], $fecha[1], $fecha[2]);
    }
}

function setFechaNumeros($dia, $mes, $año) {
    if ($mes == "January,") {
        $mes = "01";
    } elseif ($mes == "February,") {
        $mes = "02";
    } elseif ($mes == "March,") {
        $mes = "03";
    } elseif ($mes == "April,") {
        $mes = "04";
    } elseif ($mes == "May,") {
        $mes = "05";
    } elseif ($mes == "June,") {
        $mes = "06";
    } elseif ($mes == "July,") {
        $mes = "07";
    } elseif ($mes == "August,") {
        $mes = "08";
    } elseif ($mes == "September,") {
        $mes = "09";
    } elseif ($mes == "October,") {
        $mes = "10";
    } elseif ($mes == "November,") {
        $mes = "11";
    } elseif ($mes == "December,") {
        $mes = "12";
    }

    $fecha = $año . "-" . $mes . "-" . $dia;
    $_SESSION['fecha'] = $fecha;
}

function setFechaLetras($año, $mes, $dia) {

    if ($mes == '01' or $mes == '1') {
        $mes = "Enero";
    } elseif ($mes == '02' or $mes == '2') {
        $mes = "Febrero";
    } elseif ($mes == '03' or $mes == '3') {
        $mes = "Marzo";
    } elseif ($mes == '04' or $mes == '4') {
        $mes = "Abril";
    } elseif ($mes == '05' or $mes == '5') {
        $mes = "Mayo";
    } elseif ($mes == '06' or $mes == '6') {
        $mes = "Junio";
    } elseif ($mes == '07' or $mes == '7') {
        $mes = "Julio";
    } elseif ($mes == '08' or $mes == '8') {
        $mes = "Agosto";
    } elseif ($mes == '09' or $mes == '9') {
        $mes = "Septiembre";
    } elseif ($mes == '10') {
        $mes = "Octubre";
    } elseif ($mes == '11') {
        $mes = "Noviembre";
    } elseif ($mes == '12') {
        $mes = "Diciembre";
    }
    $fecha = $dia . " de " . $mes . " del " . $año;
    $_SESSION['fecha'] = $fecha;
}

function getFecha() {
    $fecha = $_SESSION['fecha'];
    Unset($_SESSION['fecha']);
    return $fecha;
}

//------------------ Fin formato fechas -----------------------------------
//-----------------------consulta # progamaciones-------------------------

include_once('../model/Sesion/sesionModel.php');

function programaciones() {
    $objinicio = new sesionModel();

    $result = "SELECT COUNT(*) AS total "
            . "FROM pag_programacion_equipo,pag_det_programacion,pag_centro,pag_equipo,"
            . "pag_tipo_trabajo,pag_tarea,pag_tipo_medidor "
            . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
            . "AND pag_programacion_equipo.cen_id=pag_centro.cen_id "
            . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
            . "AND pag_det_programacion.ttra_id=pag_tipo_trabajo.ttra_id "
            . "AND pag_det_programacion.tar_id=pag_tarea.tar_id "
            . "AND pag_det_programacion.tmed_id=pag_tipo_medidor.tmed_id "
            . "AND pag_det_programacion.est_id=1";

    $row = $objinicio->find($result);
//        die(print_r($row));
    // Cierra la conexion
    $objinicio->cerrar();

    $numero = $row['total'];
    return $numero;
}

//-----------------------consulta # mediciones-------------------------

function mediciones() {
    $objinicio = new sesionModel();

    $result = "SELECT COUNT(*) AS total "
            . "FROM pag_control_medidas";

    $row = $objinicio->find($result);

    // Cierra la conexion
    $objinicio->cerrar();

    $numero = $row['total'];
    return $numero;
}

//-----------------------consulta # solicitudes-------------------------

function solicitudes() {
    $objinicio = new sesionModel();

    $result = "SELECT COUNT(*) AS total "
            . "FROM pag_solicitud_servicio, pag_tipo_falla, pag_persona, "
            . "pag_equipo, pag_centro, pag_estado "
            . "where  pag_solicitud_servicio.per_id=pag_persona.per_id "
            . "and pag_solicitud_servicio.equi_id=pag_equipo.equi_id "
            . "and pag_solicitud_servicio.cen_id=pag_centro.cen_id "
            . "and pag_solicitud_servicio.tfa_id=pag_tipo_falla.tfa_id "
            . "and pag_solicitud_servicio.est_id=pag_estado.est_id "
            . "and pag_solicitud_servicio.estado IS NULL";

    $row = $objinicio->find($result);

    // Cierra la conexion
    $objinicio->cerrar();

    $numero = $row['total'];
    return $numero;
}

//-----------------------consulta # ordenes trabajo-------------------------

function ot() {
    $objinicio = new sesionModel();

    $result = "SELECT COUNT(*) AS total "
            . "FROM pag_orden_trabajo "
            . "WHERE pag_orden_trabajo.estado IS NULL";

    $row = $objinicio->find($result);

    // Cierra la conexion
    $objinicio->cerrar();

    $numero = $row['total'];
    return $numero;
}

//---------------------Consulta Mediciones Creadas CADA mes------------->

function medicionesCreadas() {

    $objinicio = new SesionModel();

    $sql = "SELECT * FROM pag_control_medidas,pag_equipo,pag_persona WHERE "
            . "pag_control_medidas.equi_id=pag_equipo.equi_id AND "
            . "pag_control_medidas.per_id=pag_persona.per_id LIMIT 0,3";

    $consultaMedicion = $objinicio->select($sql);

    return $consultaMedicion;
}

//------------------# ultimas ots del encargado que inicie sesion------------
function notificaciones() {
    $objinicio = new sesionModel();

    $result = "SELECT COUNT(*) AS total "
            . "FROM pag_orden_trabajo,pag_persona "
            . "WHERE pag_orden_trabajo.per_id=pag_persona.per_id "
            . "AND pag_persona.per_id='" . $_SESSION['login']['per_id'] . "' "
            . "AND pag_orden_trabajo.est_id=3 "
            . "AND pag_orden_trabajo.estado IS NULL";

    $row = $objinicio->find($result);

    // Cierra la conexion
    $objinicio->cerrar();

    $numero = $row['total'];
    return $numero;
}

//----------------ots que le corresponden al encargado que inicio sesion-----
function encargadoOts() {
    $objinicio = new sesionModel();

    $encarOt = "SELECT pag_orden_trabajo.ot_id,ot_prioridad,pag_equipo.equi_nombre "
            . "FROM pag_orden_trabajo,pag_persona,pag_equipo "
            . "WHERE pag_orden_trabajo.per_id=pag_persona.per_id "
            . "AND pag_orden_trabajo.equi_id=pag_equipo.equi_id "
            . "AND pag_persona.per_id='" . $_SESSION['login']['per_id'] . "' "
            . "AND pag_orden_trabajo.est_id=3 "
            . "AND pag_orden_trabajo.estado IS NULL "
            . "ORDER BY pag_orden_trabajo.ot_id DESC LIMIT 0,5";

    $rowot = $objinicio->select($encarOt);

    // Cierra la conexion
    $objinicio->cerrar();

    return $rowot;
}

//------------------ Ordenes de Solucitud NO ATENDIDAS ----------------------

function socitudesNoAtendidas() {
    $objinicio = new SesionModel();

    $solicitudesOt = "SELECT * FROM pag_solicitud_servicio,pag_equipo,pag_persona WHERE pag_solicitud_servicio.equi_id=pag_equipo.equi_id AND pag_solicitud_servicio.per_id=pag_persona.per_id AND pag_solicitud_servicio.est_id=7 AND pag_solicitud_servicio.estado is NULL LIMIT 0,3";
    $sqlSolicitudesOt = $objinicio->select($solicitudesOt);

    $objinicio->cerrar();


    return $sqlSolicitudesOt;
}

function totalSolicitudesNoAtentidas() {

    $objinicio = new SesionModel();


    $soliTotal = "SELECT COUNT(*) AS total FROM pag_solicitud_servicio,pag_equipo,pag_persona WHERE pag_solicitud_servicio.equi_id=pag_equipo.equi_id AND pag_solicitud_servicio.per_id=pag_persona.per_id AND pag_solicitud_servicio.est_id=7 AND pag_solicitud_servicio.estado is NULL";
    $rowSoli = $objinicio->find($soliTotal);

    $numeroSoli = $rowSoli['total'];
    //cierra conexion
    $objinicio->cerrar();
    return $numeroSoli;
}
