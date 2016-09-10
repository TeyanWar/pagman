<?php

include_once '../model/Programacion/programacionModel.php';

$objProgramacion = new ProgramacionModel();

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
                $i = $programacion['proequi_fecha_inicio'] - mktime();

                if($i < 0){ //------si se paso de la fecha establecida------------------
                    if(date('d-m-Y')!=$programacion['proequi_fecha']){

                        $frectual = 1+$programacion['frec_actual'];
                        $alert = "UPDATE pag_det_programacion SET frec_actual=$frectual WHERE detprog_id=$programacion[detprog_id]";

                        $fechaactual = date('d-m-Y');
                        $frecprogm = $programacion['frecuencia'] * $programacion['tmed_tiempo'];
                        $inicnuevo = mktime() + $frecprogm;
                        $nuevafecha = "UPDATE pag_programacion_equipo "
                                    . "SET proequi_fecha='$fechaactual',proequi_fecha_inicio='$inicnuevo' "
                                    . "WHERE proequi_id=$programacion[proequi_id]";

                        $objProgramacion->update($alert);
                        $objProgramacion->update($nuevafecha);
                    }//cerrar if
                }//cerrar if
            }//cerrar if
        }//cerrar foreach


// Cierra la conexion
$objProgramacion->cerrar();
