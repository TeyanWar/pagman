<?php

include_once('../model/Ot/solicitudesModel.php');
include_once('../model/Ot/regionalModel.php');
include_once('../model/Ot/tipoFallaModel.php');
include_once('../model/Ot/estadoModel.php');
include_once('../model/Ot/personasModel.php');

class SolicitudesController {

    function crear() {

        /*
         * Consulta de regionales
         */
        $objCentro= new SolicitudesModel();

        $sql = "SELECT * FROM pag_centro";
        $centros = $objCentro->select($sql);

        // Cierra la conexion
        $objCentro->cerrar();

        /*
         * Consulta de tipos de falla
         */
        $objTipoFalla = new TipoFallaModel();

        $sql = "SELECT * FROM pag_tipo_falla";
        $tipoFallas = $objTipoFalla->select($sql);

        // Cierra la conexion
        $objTipoFalla->cerrar();

        /*
         * Consulta de estado
         */
        $objEstado = new EstadoModel();

        $sql = "SELECT * FROM pag_estado where tdoc_id=4";
        $estados = $objEstado->select($sql);

        // Cierra la conexion
        $objEstado->cerrar();

        /*
         * Consulta de estado
         */
        $objPersona = new PersonasModel();

        $sql = "SELECT * FROM pag_persona";
        $personas = $objPersona->select($sql);

        // Cierra la conexion
        $objPersona->cerrar();

        include_once("../view/Ot/solicitudes/crear.html.php");

    }

    function postCrear() {
        $cen_id = $_POST['centro'];
        $equi_id = $_POST['equipo'];
        $sserv_descripcion = $_POST['descripcion'];
        $per_id = $_POST['solicitante'];
        $estado_id = $_POST['estado'];
        $tfa_id = $_POST['tipo_falla'];

        $insertSolicitudes = "INSERT INTO pag_solicitud_servicio (cen_id,equi_id,sserv_descripcion,per_id,est_id,tfa_id)"
                . " VALUES('$cen_id','$equi_id','$sserv_descripcion','$per_id','$estado_id','$tfa_id')";

        $objSolicitudes = new SolicitudesModel();

        $insertar = $objSolicitudes->insertar($insertSolicitudes);

        if ($insertar) {
            echo "OK";
        } else {
            echo "NO";
        }
        // Cierra la conexion
        $objSolicitudes->cerrar();

        //redirect(crearUrl("Ot", "solicitudes", "listar"));

    }

    function listar() {
        include_once("../view/Ot/solicitudes/buscador.html.php");

    }

    function buscar() {

        $buscar = $_POST['resul'];

        $objBuscar = new SolicitudesModel();

        $sql = "SELECT * "
                . " FROM pag_solicitud_servicio, pag_tipo_falla, pag_persona, pag_equipo, pag_centro, pag_estado
                    where  pag_solicitud_servicio.per_id=pag_persona.per_id 
                        and pag_solicitud_servicio.equi_id=pag_equipo.equi_id
                        and pag_solicitud_servicio.cen_id=pag_centro.cen_id
                        and pag_solicitud_servicio.tfa_id=pag_tipo_falla.tfa_id
                        and pag_solicitud_servicio.est_id=pag_estado.est_id
                        and pag_solicitud_servicio.estado IS NULL
                        and (pag_solicitud_servicio.sserv_id like '" . $buscar . "%'
                        or pag_solicitud_servicio.sserv_fecha like '" . $buscar . "%'
                        or pag_solicitud_servicio.sserv_descripcion like '%" . $buscar . "%'
                        or pag_centro.cen_nombre like '" . $buscar . "%'
                        or pag_tipo_falla.tfa_descripcion like '" . $buscar . "%'
                        or pag_estado.est_descripcion like '" . $buscar . "%'
                        or UPPER(pag_persona.per_nombre) like UPPER('" . $buscar . "%')
                    )";

        $solicitudes = $objBuscar->select($sql);

        // Cierra la conexion
        $objBuscar->cerrar();

        include_once("../view/Ot/solicitudes/listar.html.php");

    }

    function selectCen() {
        $id = $_POST['id'];


        $objSubSelect = new solicitudesModel();

        $sql = "SELECT * FROM pag_equipo where cen_id =$id";

        $subSelects = $objSubSelect->select($sql);

        $objSubSelect->cerrar();

        include_once("../view/Ot/solicitudes/selectEquipo.html.php");

    }

    function descripcion($parametros) {
        $id = $parametros[1];

        $objDescripcion = new SolicitudesModel();

        $sql = "SELECT * FROM pag_solicitud_servicio, pag_equipo, pag_persona, pag_tipo_falla, pag_estado "
                . "where pag_solicitud_servicio.equi_id=pag_equipo.equi_id "
                . "and pag_solicitud_servicio.per_id=pag_persona.per_id "
                . "and pag_solicitud_servicio.tfa_id=pag_tipo_falla.tfa_id "
                . "and pag_solicitud_servicio.est_id=pag_estado.est_id "
                . "and sserv_id = $id";
        $descripcion = $objDescripcion->find($sql);

        // Cierra la conexion
        $objDescripcion->cerrar();


        include_once("../view/Ot/solicitudes/descripcion.html.php");

    }

    function editar($parametros) {

        $id = $parametros[1];

        //Consulta de registros

        $objRegistros = new SolicitudesModel();

        $sql = "SELECT * FROM pag_solicitud_servicio, pag_equipo, pag_persona, pag_tipo_falla, pag_estado, pag_centro "
                . "where pag_solicitud_servicio.equi_id=pag_equipo.equi_id "
                . "and pag_solicitud_servicio.per_id=pag_persona.per_id "
                . "and pag_solicitud_servicio.tfa_id=pag_tipo_falla.tfa_id "
                . "and pag_solicitud_servicio.est_id=pag_estado.est_id "
                . "and pag_solicitud_servicio.cen_id=pag_centro.cen_id "
                . "and sserv_id = $id";

        $registro = $objRegistros->find($sql);

        // Cierra la conexion


        $objRegistros->cerrar();

        $objEstados = new SolicitudesModel();

        $sql = "SELECT * FROM pag_estado where tdoc_id = 4";

        $estados = $objEstados->select($sql);

        // Cierra la conexión

        $objEstados->cerrar();

        $objEquipos = new SolicitudesModel();

        $sql = "SELECT * FROM pag_equipo";

        $equipos = $objEquipos->select($sql);

        // Cierra la conexión

        $objEquipos->cerrar();

        include_once("../view/Ot/solicitudes/editar.html.php");

    }

    function postEditar() {

        $sserv_id = $_POST['sserv_id'];
        //$sserv_fecha = $_POST['sserv_fecha'];
        //$reg_id = $_POST['reg_id'];
        //$cen_id = $_POST['cen_id'];
        $equi_id = $_POST['equi_id'];
        $sserv_descripcion = $_POST['sserv_descripcion'];
        //$per_id = $_POST['per_id'];
        $est_id = $_POST['est_id'];
        //$tfa_id = $_POST['tfa_id'];      


        $objPostEditar = new SolicitudesModel();

        $sql = "UPDATE pag_solicitud_servicio SET equi_id='" . $equi_id . "',
         sserv_descripcion='" . $sserv_descripcion . "', est_id='" . $est_id . "', estado=NULL 
        WHERE pag_solicitud_servicio.sserv_id=" . $sserv_id;

        $respuesta = $objPostEditar->update($sql);

        if ($respuesta) {
            echo "OK";
        } else {
            echo "NO";
        }


        // Cierra la conexion
        $objPostEditar->cerrar();

        //redirect(crearUrl("Ot", "solicitudes", "listar"));

    }

    function Eliminar($parametros) {

        $id = $parametros[1];

        $objEliminar = new SolicitudesModel();

        $sql = "UPDATE pag_solicitud_servicio SET estado = NOW() WHERE sserv_id = $id";

        $objEliminar->update($sql);


        // Cierra la conexion
        $objEliminar->cerrar();

        //redirect(crearUrl("Ot", "solicitudes", "listar"));

    }

}
