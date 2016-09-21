<?php

include_once '../model/Programacion/programacionModel.php';

$objProgramacion = new ProgramacionModel();

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

        $datos = $objProgramacion->select($infrec);
        
        foreach ($datos as $d) {
            $met=$d['frecuencia']*$d['frec_actual'];
            $fretotal=$d['totalMediciones']-$met;
            $histmed = "UPDATE pag_det_programacion SET frec_medc='$fretotal' WHERE detprog_id=$d[detprog_id]";
            $objProgramacion->update($histmed);
        }
//---------------fin actualizacion de datos recientes----------------------------

//---------------------programaciones automaticas----------------------------------------------
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
                . "ORDER BY pag_det_programacion.detprog_id DESC";

        $programaciones = $objProgramacion->select($sql);
        
        //------------------------------------------------------------------------------
        
        foreach ($programaciones as $programacion){
            
            if($programacion['tmed_tipo']=='Automatico'){
                $factual=time()-18000;
                $i = $programacion['proequi_fecha_inicio'] - $factual;

                if($i < 0){ //------si se paso de la fecha establecida------------------
                    if(date('d-m-Y')!=$programacion['proequi_fecha']){

                        $frectual = 1+$programacion['frec_actual'];
                        $alert = "UPDATE pag_det_programacion SET frec_actual=$frectual WHERE detprog_id=$programacion[detprog_id]";

                        $fechaactual = date('d-m-Y');
                        $frecprogm = $programacion['frecuencia'] * $programacion['tmed_tiempo'];
                        $tmdefinido = time()-18000;
                        $inicnuevo = $tmdefinido + $frecprogm;
                        $nuevafecha = "UPDATE pag_programacion_equipo "
                                    . "SET proequi_fecha='$fechaactual',proequi_fecha_inicio='$inicnuevo' "
                                    . "WHERE proequi_id=$programacion[proequi_id]";

                        $objProgramacion->update($alert);
                        $objProgramacion->update($nuevafecha);
                    }//cerrar if
                }//cerrar if
            }//cerrar if
        }//cerrar foreach

//---------------------------programaciones manuales-------------------------------

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

        $mediciones = $objProgramacion->select($sqlm);
        
        //-----------------------------------------------------
        foreach ($mediciones as $med) {
            if($med['tmed_tipo']=='Manual'){
                
                if($med['frec_medc'] > $med['frecuencia']){
                    if(date('d-m-Y')!=$med['proequi_fecha']){
                        $objProgramacion = new ProgramacionModel();

                        $frectual = 1+$med['frec_actual'];
                        $amed = "UPDATE pag_det_programacion SET frec_actual=$frectual WHERE detprog_id=$med[detprog_id]";

                        $fechaactual = date('d-m-Y');
                        $nuevafec = "UPDATE pag_programacion_equipo "
                                . "SET proequi_fecha='$fechaactual' WHERE proequi_id=$med[proequi_id]";

                        $objProgramacion->update($amed);
                        $objProgramacion->update($nuevafec);
                        // Cierra la conexion
                        $objProgramacion->cerrar();
                    }
                }
            }
        } 
// Cierra la conexion
$objProgramacion->cerrar();
