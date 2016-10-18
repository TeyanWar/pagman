<?php

include_once '../model/Programacion/ordenModel.php';

class OrdenController {

    function consultarAjax() {

        $objOrden = new OrdenModel();

        $program = $_POST['program'];

        $sql = "SELECT pag_centro.cen_id,cen_nombre,pag_equipo.equi_id,equi_nombre,pag_equipo.estado,"
                . "pag_componente.comp_id,comp_descripcion,pag_tipo_trabajo.ttra_id,ttra_descripcion,"
                . "pag_tarea.tar_id,tar_nombre,pag_tipo_mantenimiento.tman_id,tman_descripcion,"
                . "pag_det_programacion.frecuencia,pag_tipo_medidor.tmed_id,tmed_nombre,tmed_tipo,tmed_tiempo,"
                . "pag_det_programacion.detprog_id,pag_programacion_equipo.proequi_fecha_inicio,"
                . "pag_programacion_equipo.proequi_id,proequi_fecha,pag_det_programacion.frec_actual "
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
        $sqlm = "SELECT SUM(pag_control_medidas.ctrmed_medida_actual) totalMediciones,"
                . "pag_centro.cen_id,cen_nombre,pag_equipo.equi_id,equi_nombre,pag_equipo.estado,"
                . "pag_componente.comp_id,comp_descripcion,pag_tipo_trabajo.ttra_id,ttra_descripcion,"
                . "pag_tarea.tar_id,tar_nombre,pag_tipo_mantenimiento.tman_id,tman_descripcion,"
                . "pag_det_programacion.frecuencia,frec_medc,pag_tipo_medidor.tmed_id,tmed_nombre,tmed_tipo,tmed_tiempo,"
                . "pag_det_programacion.detprog_id,pag_programacion_equipo.proequi_fecha_inicio,"
                . "pag_programacion_equipo.proequi_id,proequi_fecha,pag_det_programacion.frec_actual "
                . "FROM pag_programacion_equipo,pag_det_programacion,pag_control_medidas,pag_centro,pag_equipo,"
                . "pag_componente,pag_tipo_trabajo,pag_tarea,pag_tipo_mantenimiento,pag_tipo_medidor "
                . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
                . "AND pag_programacion_equipo.cen_id=pag_centro.cen_id "
                . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
                . "AND pag_control_medidas.equi_id=pag_equipo.equi_id "
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
                . "GROUP BY pag_det_programacion.detprog_id "
                . "ORDER BY pag_det_programacion.detprog_id DESC";

        $mediciones = $objOrden->select($sqlm);

        // Cierra la conexion
        $objOrden->cerrar();

        include_once("../view/Programacion/orden/listar.html.php");
    }

    function crear() {
        $objOrden = new OrdenModel();
        
        //-----------actualizacion datos recientes de programacion-----------------------
        
        $infrec = "SELECT SUM(pag_control_medidas.ctrmed_medida_actual) totalMediciones,"
                . "pag_det_programacion.detprog_id,frecuencia,frec_actual "
                . "FROM pag_programacion_equipo,pag_det_programacion,"
                . "pag_control_medidas,pag_equipo,pag_tipo_medidor "
                . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
                . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
                . "AND pag_control_medidas.equi_id=pag_equipo.equi_id "
                . "AND pag_det_programacion.tmed_id=pag_tipo_medidor.tmed_id "
                . "AND pag_tipo_medidor.tmed_tipo='Manual' "
                . "GROUP BY pag_det_programacion.detprog_id "
                . "ORDER BY pag_det_programacion.detprog_id DESC";

        $datos = $objOrden->select($infrec);
        
        foreach ($datos as $d) {
            $met=$d['frecuencia']*$d['frec_actual'];
            $fretotal=$d['totalMediciones']-$met;
            $histmed = "UPDATE pag_det_programacion SET frec_medc='$fretotal' WHERE detprog_id=$d[detprog_id]";
            $objOrden->update($histmed);
        }
        //---------------fin actualizacion de datos recientes----------------------------

        $sql1 = "SELECT equi_id,equi_nombre FROM pag_equipo";
        $equipos = $objOrden->select($sql1);

        //---------------------------------------------

        $sql2 = "SELECT ttra_id,ttra_descripcion FROM pag_tipo_trabajo";
        $ttrabajos = $objOrden->select($sql2);

        //---------------------------------------------

        $sql3 = "SELECT tmed_id,tmed_nombre FROM pag_tipo_medidor";
        $tmedidores = $objOrden->select($sql3);

        $sql4 = "SELECT pag_persona.per_id,CONCAT(per_nombre, ' ', per_apellido) As nombrecom,pag_cargo.car_descripcion "
                . "FROM pag_persona,pag_cargo WHERE pag_persona.car_id=pag_cargo.car_id";
        $encargados = $objOrden->select($sql4);

        // Cierra la conexion
        $objOrden->cerrar();

        include_once("../view/Programacion/orden/orden.html.php");
    }

    function Postordenpro() {
        //--------------expresiones regulaes-----------
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $errores = array();

        //---------------validaciones-------------------
        if (!isset($_POST['id']) or $_POST['id'] == "") {
            $errores[] = '<code><b>Debe elegir al menos una orden programada</b></code>';
        }

        if (!isset($_POST['inicio']) or $_POST['inicio'] == "") {
            $errores[] = 'El campo <code><b>Fecha Inicio</b></code> es obligatorio';
        }

        if (!isset($_POST['ot_fin']) or $_POST['ot_fin'] == "") {
            $errores[] = 'El campo <code><b>Fecha Fin</b></code> es obligatorio';
        }

        if (isset($_POST['inicio']) && isset($_POST['ot_fin'])) {
            explodeFecha($_POST['inicio']);
            $iniciof = getFecha();
            $timestamp1 = date("U", strtotime($iniciof));

            explodeFecha($_POST['ot_fin']);
            $finf = getFecha();
            $timestamp2 = date("U", strtotime($finf));

            if ($timestamp1 >= $timestamp2) {
                $errores[] = '<strong>El campo <code><b>Fecha Fin</b></code> debe ser mayor que la <code><b>fecha Inicio</b></code></strong>';
                $errores[] = ' - Fecha de Inicio: ' . $_POST['inicio'];
                $errores[] = ' - Fecha Fin: ' . $_POST['ot_fin'];
            }
        }

        if (!isset($_POST['ot_encargado']) or $_POST['ot_encargado'] == "") {
            $errores[] = 'El campo <code><b>Encargado</b></code> es obligatorio';
        }

        if (!isset($_POST['ot_ayudantes']) or $_POST['ot_ayudantes'] == "") {
            $errores[] = 'El campo <code><b>Ayudantes</b></code> es obligatorio';
        }

        if (isset($_POST['ot_ayudantes']) && !preg_match($patronLetras, $_POST['ot_ayudantes'])) {
            $errores[] = 'El campo <code><b>Ayudantes</b></code> debe contener letras unicamente';
        }
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            echo getErrores();
            //----------------fin validaciones-----------------
        } else {

            $ids = $_POST['id'];
            $encargado = $_POST['ot_encargado'];
            $fechaInicio = $_POST['inicio'];
            $fechaFin = $_POST['ot_fin'];
            $ayudantes = $_POST['ot_ayudantes'];

            $objOrden = new OrdenModel();

            if (isset($ids) && ($encargado) && ($fechaInicio) && ($fechaFin) && ($ayudantes)) {

                foreach ($ids as $id) {

                    $ins = "SELECT pag_centro.cen_id,pag_equipo.equi_id,pag_componente.comp_id,"
                            . "pag_tarea.tar_nombre,pag_det_programacion.detprog_id,"
                            . "pag_prioridad_trabajo.priotra_descripcion "
                            . "FROM pag_det_programacion,pag_programacion_equipo,pag_centro,pag_equipo,"
                            . "pag_tarea,pag_componente,pag_prioridad_trabajo "
                            . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
                            . "AND pag_programacion_equipo.cen_id=pag_centro.cen_id "
                            . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
                            . "AND pag_det_programacion.tar_id=pag_tarea.tar_id "
                            . "AND pag_det_programacion.comp_id=pag_componente.comp_id "
                            . "AND pag_det_programacion.priotra_id=pag_prioridad_trabajo.priotra_id "
                            . "AND pag_det_programacion.detprog_id=$id";

                    $orden = $objOrden->find($ins);

                    //--------------------------insercion------------------------------------

                    $insertOt = "INSERT INTO pag_orden_trabajo(cen_id,"
                            . "equi_id,tfa_id, ot_prioridad, per_id,"
                            . "ot_fecha_inicio,ot_fecha_fin,ot_ayudantes,"
                            . "ot_desc_falla,ot_desc_trabajo,est_id)"
                            . "VALUES($orden[cen_id],'$orden[equi_id]', "
                            . "'1', '$orden[priotra_descripcion]', '$encargado', '$fechaInicio', "
                            . "'$fechaFin', '$ayudantes','mantenimiento preventivo',"
                            . "'$orden[tar_nombre]','3')";

                    $insertar = $objOrden->insertar($insertOt);

                    $otidsql = "select max(ot_id) as ot_id from pag_orden_trabajo";

                    $otid = $objOrden->find($otidsql);
                    //--------------componete----------------
                    $compdet = "INSERT INTO pag_det_componente_ot (ot_id,comp_id) "
                            . "VALUES ($otid[ot_id],'$orden[comp_id]')";

                    $insertcomp = $objOrden->insertar($compdet);

                    //---------------insumos-----------------
                    if(!empty($_POST['idns'])){
                        $idns = $_POST['idns'];
                        $cantidades = $_POST['cantidad'];
                        $i=0;
                        foreach ($idns as $insid){

                            $det = "INSERT INTO pag_det_insumo_ot (ot_id,ins_id,cantidad) "
                                    . "VALUES ($otid[ot_id],$insid,$cantidades[$i])";

                            $insedet = $objOrden->insertar($det);

                            $i++;
                        }
                    }

                    //---------------herramientas-----------------
                    if(!empty($_POST['idher'])){
                        $idher = $_POST['idher'];
                        $cantidadher = $_POST['cantidadher'];
                        $x=0;
                        foreach ($idher as $her){

                            $dether = "INSERT INTO pag_det_herramienta_ot (ot_id,her_id,cantidad) "
                                    . "VALUES ($otid[ot_id],'$her',$cantidadher[$x])";

                            $inseher = $objOrden->insertar($dether);

                            $x++;
                        }//cerrar foreach
                    }//cerrar if
                }//cerrar foreach

                //Cierra la conexion
                $objOrden->cerrar();

                echo true;
            }

        }
    }


    //------------------------carrito de insumos-----------------------
    function listarInsumos() {

        $objOrden = new OrdenModel();

        $insumo = $_POST['insumo'];

        $ins = "SELECT ins_id,ins_nombre FROM pag_insumo "
                . "WHERE pag_insumo.ins_nombre LIKE '%" . $insumo . "%' "
                . "ORDER BY pag_insumo.ins_id LIMIT 0,1";

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
    
    //------------------------carrito de herramientas-----------------------
    function listarherramientas() {

        $objOrden = new OrdenModel();

        $herrami = $_POST['herrami'];

        $sqlher = "SELECT her_id,her_nombre FROM pag_herramienta "
                . "WHERE pag_herramienta.her_nombre LIKE '%" . $herrami . "%' "
                . "ORDER BY pag_herramienta.her_id LIMIT 0,1";

        $herramientas = $objOrden->select($sqlher);

        // Cierra la conexion
        $objOrden->cerrar();

        include_once("../view/Programacion/orden/listarHer.html.php");
    }
    
    function añadirFher() {
        
        $objOrden = new OrdenModel();

        $idher = $_POST['cod_her'];

        $inher = "SELECT her_id,her_nombre,her_descripcion FROM pag_herramienta "
                . "WHERE pag_herramienta.her_id='$idher'";

        $herrafila = $objOrden->find($inher);

        // Cierra la conexion
        $objOrden->cerrar();
        
        include_once '../view/Programacion/orden/filaher.html.php';
    }

    function Pdf(){

        $orprog = $_POST['id'];
        require_once("../lib/pdf/dompdf_config.inc.php");

        $codigoHTML='
        <html lang="es">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ordenes Programadas</title>
        <style>
            table {
              border-collapse: collapse;
              border-spacing: 0;
            }

            ul li {
              list-style-type: none;
            }

            table, th, td {
              border: none;
            }

            table {
              width: 100%;
              display: table;
            }

            table.striped > tbody > tr:nth-child(odd) {
              background-color: #f2f2f2;
            }

            table.striped > tbody > tr > td {
              border-radius: 0px;
            }

            thead {
              border-bottom: 1px solid #d0d0d0;
            }

            td, th {
              padding: 15px 5px;
              display: table-cell;
              text-align: left;
              vertical-align: middle;
              border-radius: 2px;
            }
        </style>
        </head>
        <body>
        <table class="striped" cellspacing="0">
          <thead>
          <tr>
            <td colspan="9" ><CENTER><strong>REPORTE ORDENES PROGRAMADAS</strong></CENTER></td>
          </tr>
          <tr >
            <td><strong>Centro</strong></td>
            <td><strong>No. Placa</strong></td>
            <td><strong>Equipo</strong></td>
            <td><strong>Componente</strong></td>
            <td><strong>Tipo de Trabajo</strong></td>
            <td><strong>Tarea</strong></td>
            <td><strong>Tipo Mantenimiento</strong></td>
            <td><strong>Frecuencia</strong></td>
            <td><strong>Medidor</strong></td>
          </tr>
          </thead>';

        //------------------------------------------------------------------
        $objOrden = new OrdenModel();
        foreach ($orprog as $v) {
            $sql = "SELECT pag_centro.cen_nombre,pag_equipo.equi_id,equi_nombre,"
                . "pag_componente.comp_descripcion,pag_tipo_trabajo.ttra_descripcion,"
                . "pag_tarea.tar_nombre,pag_tipo_mantenimiento.tman_descripcion,"
                . "pag_det_programacion.frecuencia,pag_tipo_medidor.tmed_nombre "
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
                . "AND pag_det_programacion.detprog_id=$v "
                . "ORDER BY pag_det_programacion.detprog_id";

            $dato = $objOrden->find($sql);

            $codigoHTML.='
            <tbody>
            <tr>
                    <td>'.$dato['cen_nombre'].'</td>
                    <td>'.$dato['equi_id'].'</td>
                    <td>'.$dato['equi_nombre'].'</td>
                    <td>'.$dato['comp_descripcion'].'</td>
                    <td>'.$dato['ttra_descripcion'].'</td>
                    <td>'.$dato['tar_nombre'].'</td>
                    <td>'.$dato['tman_descripcion'].'</td>
                    <td>'.$dato['frecuencia'].'</td>
                    <td>'.$dato['tmed_nombre'].'</td>
            </tr>
            </tbody>';

        }
        // Cierra la conexion
        $objOrden->cerrar();
        //------------------------------------------------------------------
        $codigoHTML.='
        </table>
        </body>
        </html>';
        $codigoHTML=utf8_encode($codigoHTML);
        $dompdf=new DOMPDF();
        $dompdf->set_paper("A4","landscape");
        $dompdf->load_html($codigoHTML);
        ini_set("memory_limit","128M");
        $dompdf->render();
        $dompdf->stream("programaciones.pdf");
    }

}
