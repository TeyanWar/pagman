<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    function Pdf() {
//        echo 'pdf <br /><br />';
        
        //--------------expresiones regulaes-----------
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $errores = array();

        //---------------validaciones-------------------
        if (!isset($_POST['ot_fecha_inicio']) or $_POST['ot_fecha_inicio'] == "") {
            $errores[] = '(*) PARA EXPORTAR PDF, El campo "Fecha Inicio" es obligatorio';
        }

        if (!isset($_POST['ot_fecha_fin']) or $_POST['ot_fecha_fin'] == "") {
            $errores[] = '(*) PARA EXPORTAR PDF, El campo "Fecha Fin" es obligatorio';
        }

        if (isset($_POST['ot_fecha_inicio']) && isset($_POST['ot_fecha_fin'])) {
            $timestamp1 = date("U", strtotime($_POST['ot_fecha_inicio']));
            $timestamp2 = date("U", strtotime($_POST['ot_fecha_fin']));

            if ($timestamp1 <= mktime()) {
                $errores[] = '<strong>(*) PARA EXPORTAR PDF, El campo "Fecha Inicio" debe ser mayor que la "Fecha Registro Orden" : </strong>' . date('Y-m-d');
                $errores[] = ' - Fecha de Inicio: ' . $_POST['ot_fecha_inicio'];
            }

            if ($timestamp2 <= mktime()) {
                $errores[] = '<strong>(*) PARA EXPORTAR PDF, El campo "Fecha Fin" debe ser mayor que la "Fecha Registro Orden" : </strong>' . date('Y-m-d');
                $errores[] = ' - Fecha de Fin: ' . $_POST['ot_fecha_fin'];
            }

            if ($timestamp1 >= $timestamp2) {
                $errores[] = '<strong>(*) PARA EXPORTAR PDF, El campo "Fecha Fin" debe ser mayor que la "fecha de Inicio"</strong>';
                $errores[] = ' - Fecha de Inicio: ' . $_POST['ot_fecha_inicio'];
                $errores[] = ' - Fecha Fin: ' . $_POST['ot_fecha_fin'];
            }
        }

        if (!isset($_POST['ot_encargado']) or $_POST['ot_encargado'] == "") {
            $errores[] = '(*) PARA EXPORTAR PDF, El campo "Encargado" es obligatorio';
        }

        if (!isset($_POST['ot_ayudantes']) or $_POST['ot_ayudantes'] == "") {
            $errores[] = '(*) PARA EXPORTAR PDF, El campo "Ayudantes" es obligatorio';
        }

        if (isset($_POST['ot_ayudantes']) && !preg_match($patronLetras, $_POST['ot_ayudantes'])) {
            $errores[] = '(*) PARA EXPORTAR PDF, El campo "Ayudantes" debe contener letras unicamente';
        }

        if (!isset($_POST['id']) or $_POST['id'] == "") {
            $errores[] = '<strong>(*) PARA EXPORTAR PDF, Debe elegir al menos una orden programada</strong>';
        }
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl("programacion", "orden", "ordenpro"));
            //----------------fin validaciones-----------------
        } else {
            
            echo 'pdf';
//            echo 'esto es un pdf ...';

//            require('../lib/fpdf/fpdf.php');
//
//            $pdf = new FPDF('P','mm','A4');
//            $pdf->AddPage();
//            $pdf->SetFont('Arial','B',16);
//            $pdf->Cell(60,10,'Hecho con FPDF.',0,1,'C');
//            $pdf->Output();

//                $objOrden = new OrdenModel();
//                
//                $ids = $_POST['id'];
//
//                foreach ($ids as $id) {
//
//                    $ins = "SELECT pag_centro.cen_id,pag_equipo.equi_id,"
//                            . "pag_tarea.tar_nombre,pag_det_programacion.detprog_id,"
//                            . "pag_prioridad_trabajo.priotra_descripcion "
//                            . "FROM pag_det_programacion,pag_programacion_equipo,pag_centro,pag_equipo,"
//                            . "pag_tarea,pag_prioridad_trabajo "
//                            . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
//                            . "AND pag_programacion_equipo.cen_id=pag_centro.cen_id "
//                            . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
//                            . "AND pag_det_programacion.tar_id=pag_tarea.tar_id "
//                            . "AND pag_det_programacion.priotra_id=pag_prioridad_trabajo.priotra_id "
//                            . "AND pag_det_programacion.detprog_id=$id";
//
//                    $orden = $objOrden->find($ins);
//                    
//                    
//                    //--------------------------tabla----------------------------
//                }
//                
////                include_once("../view/Programacion/orden/pdf.html.php");
//                
//                //Cierra la conexion
//                $objOrden->cerrar();
        }
    }

