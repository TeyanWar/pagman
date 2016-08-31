<?php

include_once '../model/Programacion/ordenModel.php';

class OrdenController {

    function consultarAjax() {

        $objOrden = new OrdenModel();

        $program = $_POST['program'];

        $sql = "SELECT pag_centro.cen_id,cen_nombre,pag_equipo.equi_id,equi_nombre,pag_equipo.estado,"
                . "pag_componente.comp_id,comp_descripcion,pag_tipo_trabajo.ttra_id,ttra_descripcion,"
                . "pag_tarea.tar_id,tar_nombre,pag_tipo_mantenimiento.tman_id,tman_descripcion,"
                . "pag_det_programacion.frecuencia,pag_tipo_medidor.tmed_id,tmed_nombre,"
                . "pag_det_programacion.detprog_id,pag_programacion_equipo.proequi_fecha_inicio "
                . "FROM pag_programacion_equipo,pag_det_programacion,pag_centro,pag_equipo,"
                . "pag_componente,pag_tipo_trabajo,pag_tarea,pag_tipo_mantenimiento,pag_tipo_medidor "
                . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
                . "AND pag_programacion_equipo.cen_id=pag_centro.cen_id "
                . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
                . "AND pag_det_programacion.comp_id=pag_componente.comp_id "
                . "AND pag_det_programacion.ttra_id=pag_tipo_trabajo.ttra_id "
                . "AND pag_det_programacion.tar_id=pag_tarea.tar_id "
                . "AND pag_programacion_equipo.tman_id=pag_tipo_mantenimiento.tman_id "
                . "AND pag_det_programacion.tmed_id=pag_tipo_medidor.tmed_id "
                . "AND pag_det_programacion.est_id=1 "
                . "AND (pag_equipo.equi_nombre LIKE "
                . "'%" . $program . "%' OR pag_tipo_trabajo.ttra_descripcion LIKE "
                . "'%" . $program . "%' OR pag_tipo_medidor.tmed_nombre LIKE "
                . "'%" . $program . "%') "
                . "ORDER BY pag_det_programacion.detprog_id DESC";

        $programaciones = $objOrden->select($sql);
        
        //----------------los de mediciones-----------------------------------------
        $sqlm = "SELECT pag_centro.cen_id,cen_nombre,pag_equipo.equi_id,equi_nombre,"
                . "pag_tipo_medidor.tmed_id,tmed_nombre,"
                . "pag_control_medidas.ctrmed_id,ctrmed_medida_actual "
                . "FROM pag_control_medidas,pag_centro,pag_equipo,pag_tipo_medidor "
                . "WHERE pag_control_medidas.equi_id=pag_equipo.equi_id "
                . "AND pag_equipo.cen_id=pag_centro.cen_id "
                . "AND pag_control_medidas.tmed_id=pag_tipo_medidor.tmed_id "
                . "AND (pag_equipo.equi_nombre LIKE "
                . "'%" . $program . "%' OR pag_tipo_medidor.tmed_nombre LIKE "
                . "'%" . $program . "%') "
                . "ORDER BY pag_control_medidas.tmed_id DESC";

        $mediciones = $objOrden->select($sqlm);

        // Cierra la conexion
        $objOrden->cerrar();

        include_once("../view/Programacion/orden/listar.html.php");
    }

    function crear() {
        $objOrden = new OrdenModel();

        $sql1 = "SELECT equi_id,equi_nombre FROM pag_equipo";
        $equipos = $objOrden->select($sql1);

        //---------------------------------------------

        $sql2 = "SELECT ttra_id,ttra_descripcion FROM pag_tipo_trabajo";
        $ttrabajos = $objOrden->select($sql2);

        //---------------------------------------------

        $sql3 = "SELECT tmed_id,tmed_nombre FROM pag_tipo_medidor";
        $tmedidores = $objOrden->select($sql3);

        $sql4 = "SELECT per_id,per_nombre FROM pag_persona";
        $encargados = $objOrden->select($sql4);

        // Cierra la conexion
        $objOrden->cerrar();

        include_once("../view/Programacion/orden/orden.html.php");
    }

    function Postordenpro() {
//        die(print_r($_POST));
        if (isset($_POST['pdf'])) {
            $this->Pdf();
        } else {

            //--------------expresiones regulaes-----------
            $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
            $errores = array();

            //---------------validaciones-------------------
            if (!isset($_POST['inicio']) or $_POST['inicio'] == "") {
                $errores[] = '(*) El campo "Fecha Inicio" es obligatorio';
            }

            if (!isset($_POST['ot_fin']) or $_POST['ot_fin'] == "") {
                $errores[] = '(*) El campo "Fecha Fin" es obligatorio';
            }

            if (isset($_POST['inicio']) && isset($_POST['ot_fin'])) {
                $timestamp1 = date("U", strtotime($_POST['inicio']));
                $timestamp2 = date("U", strtotime($_POST['ot_fin']));

                if ($timestamp1 >= $timestamp2) {
                    $errores[] = '<strong>(*) El campo "Fecha Fin" debe ser mayor que la "fecha de Inicio"</strong>';
                    $errores[] = ' - Fecha de Inicio: ' . $_POST['inicio'];
                    $errores[] = ' - Fecha Fin: ' . $_POST['ot_fin'];
                }
            }

            if (!isset($_POST['ot_encargado']) or $_POST['ot_encargado'] == "") {
                $errores[] = '(*) El campo "Encargado" es obligatorio';
            }

            if (!isset($_POST['ot_ayudantes']) or $_POST['ot_ayudantes'] == "") {
                $errores[] = '(*) El campo "Ayudantes" es obligatorio';
            }

            if (isset($_POST['ot_ayudantes']) && !preg_match($patronLetras, $_POST['ot_ayudantes'])) {
                $errores[] = '(*) El campo "Ayudantes" debe contener letras unicamente';
            }

            if (!isset($_POST['id']) && !isset($_POST['me'])) {
                $errores[] = '<strong>(*) Debe elegir al menos una orden programada</strong>';
            }
            //----------------------------------------------
            if (count($errores) > 0) {
                setErrores($errores);
//                redirect(crearUrl("programacion", "orden", "crear"));
                //----------------fin validaciones-----------------
            } else {
                
                $encargado = $_POST['ot_encargado'];
                $fechaInicio = $_POST['inicio'];
                $fechaFin = $_POST['ot_fin'];
                $ayudantes = $_POST['ot_ayudantes'];
                $idns = $_POST['idns'];
                $cantidades = $_POST['cantidad'];
                
                $objOrden = new OrdenModel();
                
                if (isset($encargado) && ($fechaInicio) && ($fechaFin) && ($ayudantes) && ($idns) && ($cantidades)) {

                    if(isset($_POST['id'])){
                        $ids = $_POST['id'];
                    
                        foreach ($ids as $id) {

                            $ins = "SELECT pag_centro.cen_id,pag_equipo.equi_id,"
                                    . "pag_tarea.tar_nombre,pag_det_programacion.detprog_id,"
                                    . "pag_prioridad_trabajo.priotra_descripcion "
                                    . "FROM pag_det_programacion,pag_programacion_equipo,pag_centro,pag_equipo,"
                                    . "pag_tarea,pag_prioridad_trabajo "
                                    . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
                                    . "AND pag_programacion_equipo.cen_id=pag_centro.cen_id "
                                    . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
                                    . "AND pag_det_programacion.tar_id=pag_tarea.tar_id "
                                    . "AND pag_det_programacion.priotra_id=pag_prioridad_trabajo.priotra_id "
                                    . "AND pag_det_programacion.detprog_id=$id";

                            $orden = $objOrden->find($ins);
                            //--------------------------insercion------------------------------------

                            $insertOt = "INSERT INTO pag_orden_trabajo(cen_id,"
                                    . "equi_id,tfa_id, ot_prioridad, per_id,"
                                    . "ot_fecha_inicio,ot_fecha_fin,ot_ayudantes,"
                                    . "ot_desc_falla,ot_desc_trabajo, est_id)"
                                    . "VALUES($orden[cen_id],'$orden[equi_id]', "
                                    . "'1', '$orden[priotra_descripcion]', '$encargado', '$fechaInicio', "
                                    . "'$fechaFin', '$ayudantes','mantenimiento preventivo', '$orden[tar_nombre]', '3')";

                            $insertar = $objOrden->insertar($insertOt);
                            
                            $otidsql = "select max(ot_id) as ot_id from pag_orden_trabajo";

                            $otid = $objOrden->find($otidsql);

                            $i=0;
                            foreach ($idns as $insid){
                                
                                $det = "INSERT INTO pag_detalle_ot (ot_id,ins_id,cantidad) "
                                        . "VALUES ($otid[ot_id],$insid,$cantidades[$i])";

                                $insedet = $objOrden->insertar($det);
                                
                                $i++;
                            }
                            
                        }
                    }
                    
                    //------------------------------los de mediciones-------------------------------
                    if(isset($_POST['me'])){
                        $idms = $_POST['me'];
                        
                        foreach ($idms as $idm) {

                            $inmed = "SELECT pag_centro.cen_id,pag_equipo.equi_id,"
                                    . "pag_tipo_medidor.tmed_id,tmed_nombre,pag_control_medidas.ctrmed_id "
                                    . "FROM pag_control_medidas,pag_centro,pag_equipo,pag_tipo_medidor "
                                    . "WHERE pag_control_medidas.equi_id=pag_equipo.equi_id "
                                    . "AND pag_equipo.cen_id=pag_centro.cen_id "
                                    . "AND pag_control_medidas.tmed_id=pag_tipo_medidor.tmed_id "
                                    . "AND pag_control_medidas.ctrmed_id=$idm";

                            $ormed = $objOrden->find($inmed);
                            //--------------------------insercion------------------------------------

                            $medr = "INSERT INTO pag_orden_trabajo(cen_id,"
                                    . "equi_id,tfa_id, ot_prioridad, per_id,"
                                    . "ot_fecha_inicio,ot_fecha_fin,ot_ayudantes,"
                                    . "ot_desc_falla,ot_desc_trabajo, est_id)"
                                    . "VALUES($ormed[cen_id],'$ormed[equi_id]', "
                                    . "'1', 'Alta', '$encargado', '$fechaInicio', "
                                    . "'$fechaFin', '$ayudantes','mantenimiento preventivo', 'cambio de aceite', '3')";

                            $insermed = $objOrden->insertar($medr);
                            
                            $otidsq = "select max(ot_id) as ot_id from pag_orden_trabajo";
                            
                            $otidn = $objOrden->find($otidsq);
                            
                            $a=0;
                            foreach ($idns as $insi){
                                
                                $dets = "INSERT INTO pag_detalle_ot (ot_id,ins_id,cantidad) "
                                        . "VALUES ($otidn[ot_id],$insi,$cantidades[$a])";
                                
                                $insed = $objOrden->insertar($dets);
                                
                                $a++;
                            }
                            
                        }
                    }
                    
                    //Cierra la conexion
                    $objOrden->cerrar();
                
                    echo true;
//                    redirect(crearUrl("Ot", "ot", "listar"));
                    
                } else {
                    echo false;
                }

            }
        }
    }


    //------------------------carrito de insumos-----------------------
    function listarInsumos() {

        $objOrden = new OrdenModel();

        $insumo = $_POST['insumo'];

        $ins = "SELECT ins_id,ins_nombre FROM pag_insumo "
                . "WHERE pag_insumo.ins_nombre LIKE '%" . $insumo . "%' "
                . "ORDER BY pag_insumo.ins_id LIMIT 0,2";

        $insumos = $objOrden->select($ins);

        // Cierra la conexion
        $objOrden->cerrar();

        include_once("../view/Programacion/orden/listarIns.html.php");
    }
    
    function añadirFila() {
        
        $objOrden = new OrdenModel();

        $id = $_POST['cod'];

        $inf = "SELECT * FROM pag_insumo,pag_unidad_medida "
                . "WHERE pag_insumo.umed_id=pag_unidad_medida.umed_id "
                . "AND pag_insumo.ins_id=$id ";

        $insumofila = $objOrden->find($inf);

        // Cierra la conexion
        $objOrden->cerrar();
        
        include_once '../view/Programacion/orden/filains.html.php';
    }



}
