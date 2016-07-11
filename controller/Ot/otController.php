<?php

include_once('../model/Ot/otModel.php');
include_once('../model/Ot/detalleCompModel.php');

class OtController {

    function listar() {
        $objListar = new OtModel();
        include_once ("../view/Ot/ot/buscador.html.php");
    }

    function buscar() {
        $buscar = $_POST['resultado'];
        $objBuscar = new OtModel();

        $sql = "SELECT * FROM pag_orden_trabajo, pag_tipo_falla, pag_regional, pag_equipo, pag_persona,pag_estado,pag_tipo_doc "
                . "WHERE  pag_orden_trabajo.tfa_id = pag_tipo_falla.tfa_id "
                . "AND pag_orden_trabajo.equi_id=pag_equipo.equi_id "
                . "AND pag_orden_trabajo.per_id=pag_persona.per_id "
                . "AND pag_orden_trabajo.reg_id = pag_regional.reg_id "
                . "AND pag_orden_trabajo.est_id=pag_estado.est_id "
                . "AND pag_estado.tdoc_id=pag_tipo_doc.tdoc_id "
                . "AND pag_orden_trabajo.estado IS NULL AND (ot_id LIKE "
                . "'%" . $buscar . "%' OR equi_nombre LIKE "
                . "'" . $buscar . "%' OR per_nombre LIKE "
                . "'" . $buscar . "%' OR est_descripcion LIKE "
                . "'%" . $buscar . "%') LIMIT 0,10";


        $ordenes = $objBuscar->select($sql);

        // Cierra la conexion
        $objBuscar->cerrar();
        include_once("../view/Ot/ot/listar.html.php");
    }

    function detalle($parametros) {

        $id = $parametros[1];

        $objDetalle = new OtModel();

        $sql = "SELECT * FROM pag_orden_trabajo, pag_tipo_falla, pag_regional,"
                . " pag_centro, pag_equipo, pag_persona,pag_estado,pag_tipo_doc "
                . "WHERE  pag_orden_trabajo.tfa_id = pag_tipo_falla.tfa_id "
                . "AND pag_orden_trabajo.equi_id=pag_equipo.equi_id "
                . "AND pag_orden_trabajo.per_id=pag_persona.per_id "
                . "AND pag_orden_trabajo.reg_id = pag_regional.reg_id "
                . "AND pag_orden_trabajo.est_id=pag_estado.est_id "
                . "AND pag_estado.tdoc_id=pag_tipo_doc.tdoc_id "
                . "AND pag_orden_trabajo.estado IS NULL AND ot_id = $id";

        $detalleOrdenes = $objDetalle->find($sql);

        // Cierra la conexion
        $objDetalle->cerrar();

        include_once("../view/Ot/ot/detalle.html.php");
    }

    function registrar() {
        $objCentroFormacion = new OtModel();

        $sql = "SELECT * FROM pag_centro";
        $centrosFormacion = $objCentroFormacion->select($sql);
        //select Centro de Formación

        $objRegional = new OtModel();

        $sql = "SELECT * FROM pag_regional";
        $regionales = $objRegional->select($sql);
        //select Regionales

        $objEquipos = new OtModel();

        $sql = "SELECT * FROM pag_equipo";
        $equipos = $objEquipos->select($sql);
        //select equipos

        $objTipoFalla = new OtModel();

        $sql = "SELECT * FROM pag_tipo_falla";
        $fallas = $objTipoFalla->select($sql);
        //select tipo de fallas

        $objEncargado = new OtModel();

        $sql = "SELECT * FROM pag_persona";
        $encargados = $objEncargado->select($sql);
        //select encargados

        $objEstado = new OtModel();

        $sql = "SELECT * FROM pag_estado";
        $estados = $objEstado->select($sql);
        //select estado

        $objComponente = new OtModel();

        $sql = "SELECT * FROM pag_componente";
        $componentes = $objComponente->select($sql);
        //select componentes

        $objHerramienta = new OtModel();

        $sql = "SELECT her_id, her_nombre FROM pag_herramienta";
        $herramientas = $objHerramienta->select($sql);
        //select herramientas

        $objInsumo = new OtModel();

        $sql = "SELECT ins_id, ins_nombre FROM pag_insumo";
        $insumos = $objInsumo->select($sql);
        //select insumos
        //Cierra la conexion 
        $objCentroFormacion->cerrar();
        $objRegional->cerrar();
        $objEquipos->cerrar();
        $objTipoFalla->cerrar();
        $objEncargado->cerrar();
        $objEstado->cerrar();
        $objComponente->cerrar();
        $objHerramienta->cerrar();
        $objInsumo->cerrar();

        include_once("../view/Ot/ot/registrar.html.php");
    }

    function postCrear() {

        $regional = $_POST['ot_regional'];
        $centro_formacion = $_POST['ot_centro_formacion'];
        $equipo = $_POST['ot_equipo'];
        $tipoFalla = $_POST['ot_tipo_falla'];
        $prioridad = $_POST['ot_prioridad'];
        $encargado = $_POST['ot_encargado'];
        $fechaInicio = $_POST['ot_fecha_inicio'];
        $fechaFin = $_POST['ot_fecha_fin'];
        $ayudantes = $_POST['ot_ayudantes'];
        $descripcionFalla = $_POST['ot_desc_falla'];
        $descripcionTrabajo = $_POST['ot_desc_trabajo'];
        $otEstado = $_POST['ot_estado'];
        //Post para insercion a la tabla pag_orden_trabajo


        $componentes = $_POST ['componente'];
        //POST para insercion a tabla detalle

        if (isset($regional) && ($centro_formacion) && ($equipo) && ($tipoFalla) && ($prioridad) && ($encargado) && ($fechaInicio) && ($fechaFin) && ($ayudantes) && ($descripcionFalla) && ($descripcionTrabajo) && ($otEstado)) {

            $insertOt = "INSERT INTO pag_orden_trabajo(reg_id,cen_id,"
                    . "equi_id,tfa_id, ot_prioridad, per_id,"
                    . "ot_fecha_inicio,ot_fecha_fin,ot_ayudantes,ot_desc_falla,"
                    . "ot_desc_trabajo, est_id)"
                    . "VALUES('$regional', '$centro_formacion','$equipo', "
                    . "'$tipoFalla', '$prioridad', '$encargado', '$fechaInicio', "
                    . "'$fechaFin', '$ayudantes', '$descripcionFalla', '$descripcionTrabajo', '$otEstado')";


            $objOt = new OtModel();
            $insertar = $objOt->insertar($insertOt);
        }
        // if de validacion
        if ($insertar) {
            foreach ($componentes as $componente) {

                $objDetalle = new OtModel();
                $insertDetalle = "INSERT INTO pag_detalle_ot (comp_id) VALUES ('$componente')";

                $insertarDetalle = $objDetalle->insertar($insertDetalle);
            }

            echo "OK";
        } else {
            echo "NO";
        }

        // Cierra la conexion
        $objOt->cerrar();
        $objDetalle->cerrar();
    }

    function editar($parametros) {
        $objEditar = new OtModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_orden_trabajo, pag_tipo_falla, pag_regional, "
                . "pag_centro, pag_equipo, pag_persona,pag_estado,pag_tipo_doc "
                . "WHERE  pag_orden_trabajo.tfa_id = pag_tipo_falla.tfa_id "
                . "AND pag_orden_trabajo.equi_id=pag_equipo.equi_id "
                . "AND pag_orden_trabajo.per_id=pag_persona.per_id "
                . "AND pag_orden_trabajo.reg_id = pag_regional.reg_id "
                . "AND pag_orden_trabajo.est_id=pag_estado.est_id "
                . "AND pag_estado.tdoc_id=pag_tipo_doc.tdoc_id "
                . "AND pag_orden_trabajo.estado IS NULL AND ot_id=$id";

        $editarOt = $objEditar->find($sql);

        // Cierra la conexion
        $objEditar->cerrar();
        include_once("../view/Ot/ot/editar.html.php");
    }

    function postEditar() {

        $ot_id =$_POST['ot_id'];
        $ayudantes =$_POST['ayudantes'];
        $descripcionFalla = $_POST['ot_desc_falla'];
        $descripcionTrabajo = $_POST['ot_desc_trabajo'];

        $objPostEditar = new OtModel();

        $sql = "UPDATE  pag_orden_trabajo SET  ot_desc_falla ='$descripcionFalla',
                ot_desc_trabajo ='$descripcionTrabajo',
                ot_ayudantes ='$ayudantes' WHERE  pag_orden_trabajo.ot_id =$ot_id";
        
        $editarOt = $objPostEditar->update($sql);
        
        if($editarOt){
            echo "OK";
        }
        else{
            "NO";
        }
        //if validar para toast
        
        // Cierra la conexion
        $objPostEditar->cerrar();

        //include_once("../view/Ot/ot/editar.html.php");
    }

    function eliminar($parametros) {
        $objOt = new OtModel();

        $id = $parametros[1];

        $sql = "UPDATE pag_orden_trabajo SET estado = NOW() WHERE ot_id=$id";
        $eliminarOt = $objOt->find($sql);

        if ($eliminarOt) {
            echo "OK";
        } else {
            echo "NO";
        }

        // Cierra la conexion
        $objOt->cerrar();
    }

}
