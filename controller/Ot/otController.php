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

        $sql = "SELECT * FROM pag_orden_trabajo, pag_tipo_falla, pag_equipo, "
                . "pag_persona,pag_estado,pag_tipo_doc, pag_prioridad_trabajo "
                . "WHERE  pag_orden_trabajo.tfa_id = pag_tipo_falla.tfa_id "
                . "AND pag_orden_trabajo.equi_id=pag_equipo.equi_id "
                . "AND pag_orden_trabajo.per_id=pag_persona.per_id "
                . "AND pag_orden_trabajo.est_id=pag_estado.est_id "
                . "AND pag_estado.tdoc_id=pag_tipo_doc.tdoc_id "
                . "AND pag_orden_trabajo.estado IS NULL AND (ot_id LIKE "
                . "'%" . $buscar . "%' OR equi_nombre LIKE "
                . "'" . $buscar . "%' OR per_nombre LIKE "
                . "'" . $buscar . "%' OR est_descripcion LIKE "
                . "'%" . $buscar . "%') "
                . "GROUP BY pag_orden_trabajo.ot_id "
                . "ORDER BY pag_orden_trabajo.ot_id DESC";

        $ordenes = $objBuscar->select($sql);
		
        //Paginado
	
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('ot', 'ot', 'listar');
        
        $paginado = new Paginado($ordenes, $pagina, $url);
        
        $ordenes = $paginado->getDatos();        
        //Fin paginado
        
        // Cierra la conexion
        $objBuscar->cerrar();
        include_once("../view/Ot/ot/listar.html.php");
    }

    function detalle($parametros) {

        $id = $parametros[1];
        
        $objDetalle = new OtModel();

        $sql = "SELECT * FROM pag_orden_trabajo,pag_tipo_falla,pag_centro,"
                . "pag_equipo,pag_persona,pag_estado,pag_tipo_doc "
                . "WHERE  pag_orden_trabajo.tfa_id=pag_tipo_falla.tfa_id "
                . "AND pag_orden_trabajo.cen_id=pag_centro.cen_id "
                . "AND pag_orden_trabajo.equi_id=pag_equipo.equi_id "
                . "AND pag_orden_trabajo.per_id=pag_persona.per_id "
                . "AND pag_orden_trabajo.est_id=pag_estado.est_id "
                . "AND pag_estado.tdoc_id=pag_tipo_doc.tdoc_id "
                . "AND pag_orden_trabajo.estado IS NULL AND ot_id=$id";

        $detalleOrdenes = $objDetalle->find($sql);
        //----------------------consulta de componentes---------------------
        $sqlc = "SELECT pag_componente.comp_descripcion "
                . "FROM pag_det_componente_ot,pag_orden_trabajo,pag_componente "
                . "WHERE pag_det_componente_ot.ot_id=pag_orden_trabajo.ot_id "
                . "AND pag_det_componente_ot.comp_id=pag_componente.comp_id "
                . "AND pag_det_componente_ot.ot_id=$id";

        $detcomponentes = $objDetalle->select($sqlc);

        //----------------------consulta de insumos---------------------
        $sqlin = "SELECT pag_insumo.ins_nombre,pag_insumo.ins_valor,"
                . "pag_unidad_medida.umed_descripcion,pag_det_insumo_ot.cantidad "
                . "FROM pag_det_insumo_ot,pag_insumo,pag_unidad_medida,pag_orden_trabajo "
                . "WHERE pag_det_insumo_ot.ot_id=pag_orden_trabajo.ot_id "
                . "AND pag_det_insumo_ot.ins_id=pag_insumo.ins_id "
                . "AND pag_insumo.umed_id=pag_unidad_medida.umed_id "
                . "AND pag_orden_trabajo.estado IS NULL "
                . "AND pag_det_insumo_ot.ot_id=$id";

        $detalleinsumos = $objDetalle->select($sqlin);
        
        //----------------------consulta de herramientas---------------------
        $sqlher = "SELECT pag_herramienta.her_nombre,pag_herramienta.her_descripcion,"
                . "pag_det_herramienta_ot.cantidad "
                . "FROM pag_det_herramienta_ot,pag_herramienta,pag_orden_trabajo "
                . "WHERE pag_det_herramienta_ot.ot_id=pag_orden_trabajo.ot_id "
                . "AND pag_det_herramienta_ot.her_id=pag_herramienta.her_id "
                . "AND pag_orden_trabajo.estado IS NULL "
                . "AND pag_det_herramienta_ot.ot_id=$id";

        $detalleherramientas = $objDetalle->select($sqlher);

        // Cierra la conexion
        $objDetalle->cerrar();

        include_once("../view/Ot/ot/detalle.html.php");
    }

    function selectCen() {
        $id = $_POST['id'];

        $objSubSelect = new OtModel();

        $sql = "SELECT * FROM pag_equipo where cen_id =$id";

        $subSelects = $objSubSelect->select($sql);

        $objSubSelect->cerrar();

        include_once("../view/Ot/ot/selectEquipo.html.php");
    }
    
    function selectComp() {
        $id = $_POST['id'];

        $objSubSelect = new OtModel();

        $sqlcomp = "SELECT pag_componente.comp_id,comp_descripcion FROM pag_equipo,pag_equipo_componente,pag_componente "
                . "WHERE pag_equipo_componente.equi_id=pag_equipo.equi_id "
                . "AND pag_equipo_componente.comp_id=pag_componente.comp_id "
                . "AND pag_equipo.equi_id='$id'";

        $selectcomp = $objSubSelect->select($sqlcomp);

        $objSubSelect->cerrar();

        include_once("../view/Ot/ot/selectComponente.html.php");
    }

    function crear($parametros=false) {
        
        $objCentroFormacion = new OtModel();
        $objTipoFalla = new OtModel();
        
        //Llegó un id de solicitud?
        if(isset($parametros[1])){
            $id_solicitud=$parametros[1];
  
            $sql = "SELECT * FROM pag_centro pc, pag_solicitud_servicio pss WHERE pss.cen_id=pc.cen_id AND pss.sserv_id=$id_solicitud";
            $centrosFormacion = $objCentroFormacion->select($sql);
            //select Centro de Formación
            
            $objEquipos = new OtModel();

            $sql = "SELECT * FROM pag_equipo pe, pag_solicitud_servicio pss WHERE pss.equi_id=pe.equi_id AND pss.sserv_id=$id_solicitud";
            $equipos = $objEquipos->select($sql);
            //select equipos

            $sql = "SELECT * FROM pag_tipo_falla tf, pag_solicitud_servicio pss WHERE pss.tfa_id=tf.tfa_id AND pss.sserv_id=$id_solicitud";
            $fallas = $objTipoFalla->select($sql);
            //select Tipo de falla
            
        }else{
            
            $sql = "SELECT * FROM pag_centro";
            $centrosFormacion = $objCentroFormacion->select($sql);
            //select Centro de Formación

            $objRegional = new OtModel();

//            $sql = "SELECT * FROM pag_regional";
//            $regionales = $objRegional->select($sql);
            //select Regionales

            $objEquipos = new OtModel();

            $sql = "SELECT * FROM pag_equipo";
            $equipos = $objEquipos->select($sql);
            //select equipos

            $sql = "SELECT * FROM pag_tipo_falla";
            $fallas = $objTipoFalla->select($sql);
            //select tipo de fallas
        }
//        dd($equipos);
        $objEncargado = new OtModel();

        $sql = "SELECT * FROM pag_persona";
        $encargados = $objEncargado->select($sql);
        //select encargados

        $objPrioridad = new OtModel();

        $sql = "SELECT * FROM pag_prioridad_trabajo";
        $prioridades = $objPrioridad->select($sql);
        //select prioridades

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
//        $objInsumo = new OtModel();
//
//        $sql = "SELECT ins_id, ins_nombre FROM pag_insumo";
//        $insumos = $objInsumo->select($sql);
        //select insumos
        //Cierra la conexion 
        $objCentroFormacion->cerrar();
        //$objRegional->cerrar();
        $objEquipos->cerrar();
        $objTipoFalla->cerrar();
        $objEncargado->cerrar();
        $objPrioridad->cerrar();
        $objEstado->cerrar();
        $objComponente->cerrar();
        $objHerramienta->cerrar();
//        $objInsumo->cerrar();

        include_once("../view/Ot/ot/registrar.html.php");
    }

    function postCrear() {
        
        $centro_formacion = $_POST['ot_centro_formacion'];
        $equipo = $_POST['ot_equipo'];
        $tipoFalla = $_POST['ot_tipo_falla'];
        $fechaInicio = $_POST['ot_fecha_inicio'];
        $fechaFin = $_POST['ot_fecha_fin'];
        $prioridad = $_POST['ot_prioridad'];
        $encargado = $_POST['ot_encargado'];
        $ayudantes = $_POST['ot_ayudantes'];
        $descripcionFalla = $_POST['ot_desc_falla'];
        $descripcionTrabajo = $_POST['ot_desc_trabajo'];
        //Post para insercion a la tabla pag_orden_trabajo
        
        if (isset($centro_formacion) && ($equipo) && ($tipoFalla) && ($fechaInicio) && 
                ($fechaFin) && ($prioridad) && ($encargado) && ($ayudantes) && 
                ($descripcionFalla) && ($descripcionTrabajo)) {

            $insertOt = "INSERT INTO pag_orden_trabajo(cen_id,"
                . "equi_id,tfa_id, ot_prioridad, per_id,"
                . "ot_fecha_inicio,ot_fecha_fin,ot_ayudantes, ot_desc_falla,"
                . "ot_desc_trabajo, est_id)"
                . "VALUES('$centro_formacion','$equipo', "
                . "'$tipoFalla', '$prioridad', '$encargado', '$fechaInicio', "
                . "'$fechaFin', '$ayudantes','$descripcionFalla', '$descripcionTrabajo', '3')";

            $objOt = new OtModel();
            $insertar = $objOt->insertar($insertOt);
            // Cierra la conexion
            $objOt->cerrar();
            //-------------insercion a tablas detalle--------------
            $objDetalle = new OtModel();
            
            $idsql = "select max(ot_id) as ot_id from pag_orden_trabajo";

            $otid = $objDetalle->find($idsql);//------capturamos el codigo de la ot
            //--------------componete----------------
            if(!empty($_POST['componente'])){
                $idcomps = $_POST['componente'];
                foreach ($idcomps as $comp){
                    $compdet = "INSERT INTO pag_det_componente_ot (ot_id,comp_id) "
                            . "VALUES ($otid[ot_id],'$comp')";

                    $objDetalle->insertar($compdet);
                }
            }
            //---------------insumos-----------------
            if(!empty($_POST['codinsumo'])){
                $codinsumo = $_POST['codinsumo'];
                $cantins = $_POST['cantins'];
                $f=0;
                foreach ($codinsumo as $insumo){

                    $det = "INSERT INTO pag_det_insumo_ot (ot_id,ins_id,cantidad) "
                            . "VALUES ($otid[ot_id],$insumo,$cantins[$f])";

                    $objDetalle->insertar($det);

                    $f++;
                }
            }

            //---------------herramientas-----------------
            if(!empty($_POST['codher'])){
                $codhers = $_POST['codher'];
                $cantherra = $_POST['cantherra'];
                $a=0;
                foreach ($codhers as $herr){

                    $dether = "INSERT INTO pag_det_herramienta_ot (ot_id,her_id,cantidad) "
                            . "VALUES ($otid[ot_id],'$herr',$cantherra[$a])";

                    $objDetalle->insertar($dether);

                    $a++;
                }//cerrar foreach
            }//cerrar if
            
            // Cierra la conexion
            $objDetalle->cerrar();
            echo true;
        } else {
            echo false;
        }//cerrar else

    }

    function editar($parametros) {

        $objEditar = new OtModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_orden_trabajo, pag_tipo_falla, pag_centro, "
                . " pag_equipo, pag_persona, pag_estado,pag_tipo_doc "
                . "WHERE  pag_orden_trabajo.tfa_id = pag_tipo_falla.tfa_id "
                . "AND pag_orden_trabajo.cen_id = pag_centro.cen_id "
                . "AND pag_orden_trabajo.equi_id=pag_equipo.equi_id "
                . "AND pag_orden_trabajo.per_id=pag_persona.per_id "
                . "AND pag_orden_trabajo.est_id=pag_estado.est_id "                
                . "AND pag_estado.tdoc_id=pag_tipo_doc.tdoc_id "
                . "AND pag_orden_trabajo.estado IS NULL AND ot_id=$id";

        $sql2 = "SELECT * FROM pag_estado where tdoc_id=2";
        $estados = $objEditar->select($sql2);
        $editarOt = $objEditar->find($sql);
 
        //--------------------------- Componentes ------------------------------//
        
        $sqlc = "SELECT pag_componente.comp_descripcion "
                . "FROM pag_det_componente_ot,pag_orden_trabajo,pag_componente "
                . "WHERE pag_det_componente_ot.ot_id=pag_orden_trabajo.ot_id "
                . "AND pag_det_componente_ot.comp_id=pag_componente.comp_id "
                . "AND pag_det_componente_ot.ot_id=$id";

        $detcomponentes = $objEditar->select($sqlc);

        //----------------------consulta de insumos---------------------
        $sqlin = "SELECT pag_insumo.ins_nombre,pag_insumo.ins_valor,"
                . "pag_unidad_medida.umed_descripcion,pag_det_insumo_ot.cantidad "
                . "FROM pag_det_insumo_ot,pag_insumo,pag_unidad_medida,pag_orden_trabajo "
                . "WHERE pag_det_insumo_ot.ot_id=pag_orden_trabajo.ot_id "
                . "AND pag_det_insumo_ot.ins_id=pag_insumo.ins_id "
                . "AND pag_insumo.umed_id=pag_unidad_medida.umed_id "
                . "AND pag_orden_trabajo.estado IS NULL "
                . "AND pag_det_insumo_ot.ot_id=$id";

        $detalleinsumos = $objEditar->select($sqlin);
        
        //----------------------consulta de herramientas---------------------
        $sqlher = "SELECT pag_herramienta.her_nombre,pag_herramienta.her_descripcion,"
                . "pag_det_herramienta_ot.cantidad "
                . "FROM pag_det_herramienta_ot,pag_herramienta,pag_orden_trabajo "
                . "WHERE pag_det_herramienta_ot.ot_id=pag_orden_trabajo.ot_id "
                . "AND pag_det_herramienta_ot.her_id=pag_herramienta.her_id "
                . "AND pag_orden_trabajo.estado IS NULL "
                . "AND pag_det_herramienta_ot.ot_id=$id";

        $detalleherramientas = $objEditar->select($sqlher);
        
        //Cierra la conexion
        $objEditar->cerrar();

        include_once("../view/Ot/ot/editar.html.php");
    }

    function postEditar() {

        $ot_id = $_POST['ot_id'];
        $est_id = $_POST['est_id'];
        $ot_observacion = $_POST['ot_observacion'];
        
        $objPostEditar = new OtModel();

        $sql = "UPDATE  pag_orden_trabajo SET est_id=$est_id, ot_observacion ='$ot_observacion' "
                . "WHERE  pag_orden_trabajo.ot_id=$ot_id";

        $editarOt = $objPostEditar->update($sql);

        if ($editarOt) {
            echo true;
        } else {
            false;
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
        $eliminarOt = $objOt->update($sql);

        if ($eliminarOt) {
            echo true;
        } else {
            echo false;
        }
        // Cierra la conexion
        $objOt->cerrar();
    }

    function buscarInsumos() {
        $objInsumos = new OtModel();
        $insumos = $_POST['ins_id'];
        //die($insumos);
        $sql = "SELECT * FROM pag_insumo WHERE ins_id LIKE '%" . $insumos . "%' or "
                . "ins_nombre LIKE '%" . $insumos . "%' ";
        $listarInsumo = $objInsumos->select($sql);
        $objInsumos->cerrar();
        include_once ("../view/Ot/ot/listarInsumo.html.php");
    }

    function agregarElementos($parametros) {
        
        $ins_id = $_POST['id'];
        $cant = $parametros[1];
        $objInsumo = new OtModel();
        $sql = "SELECT * FROM pag_insumo where ins_id = $ins_id";
        $agregarInsumo = $objInsumo->find($sql);
        $objInsumo->cerrar();
        
        include_once("../view/Ot/ot/agregar.html.php");
    }
    
    //-----------------------carritos de compras---------------------
        //------------------------carrito de insumos-----------------------
    function listainsOT() {

        $objOt = new OtModel();

        $insumo = $_POST['insumo'];

        $ins = "SELECT ins_id,ins_nombre FROM pag_insumo "
                . "WHERE pag_insumo.ins_nombre LIKE '%" . $insumo . "%' "
                . "ORDER BY pag_insumo.ins_id LIMIT 0,1";

        $insumos = $objOt->select($ins);

        // Cierra la conexion
        $objOt->cerrar();

        include_once("../view/Ot/ot/InsumoOT.html.php");
    }
    
    function FilaInsumo() {
        
        $objOt = new OtModel();

        $id = $_POST['cod'];

        $inf = "SELECT * FROM pag_insumo,pag_unidad_medida "
                . "WHERE pag_insumo.umed_id=pag_unidad_medida.umed_id "
                . "AND pag_insumo.ins_id=$id ";

        $insumofila = $objOt->find($inf);

        // Cierra la conexion
        $objOt->cerrar();
        
        include_once '../view/Ot/ot/FinsOT.html.php';
    }
    
    //------------------------carrito de herramientas-----------------------
    function listaherOT() {

        $objOt = new OtModel();

        $herrami = $_POST['herrami'];

        $sqlher = "SELECT her_id,her_nombre FROM pag_herramienta "
                . "WHERE pag_herramienta.her_nombre LIKE '%" . $herrami . "%' "
                . "ORDER BY pag_herramienta.her_id LIMIT 0,1";

        $herramientas = $objOt->select($sqlher);

        // Cierra la conexion
        $objOt->cerrar();

        include_once("../view/Ot/ot/HerramientaOT.html.php");
    }
    
    function filaHerramienta() {
        
        $objOt = new OtModel();

        $idher = $_POST['cod_her'];

        $inher = "SELECT her_id,her_nombre,her_descripcion FROM pag_herramienta "
                . "WHERE pag_herramienta.her_id='$idher'";

        $herrafila = $objOt->find($inher);

        // Cierra la conexion
        $objOt->cerrar();
        
        include_once '../view/Ot/ot/FherOT.html.php';
    }


}
