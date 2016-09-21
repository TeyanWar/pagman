<?php include_once '../model/Programacion/programacionModel.php'; ?>
<div class="errorTxt215"></div>
<table id="data-table-simple" class="responsive-table display striped" cellspacing="0">
    <thead>
        <tr>
            <th>Seleccione</th>
            <th>Centro</th>
            <th>Equipo</th>
            <th>Componente</th>
            <th>Tipo de Trabajo</th>
            <th>Tarea</th>
            <th>Tipo Mantenimiento</th>
            <th>Frec.</th>
            <th>Medidor</th>
            <th>Frec.Actual</th>
            <th>Cuanto Falta</th>
        </tr>
    </thead>

    <tbody>
        
        <?php foreach ($programaciones as $programacion) { ?>
        
            <?php if($programacion['tmed_tipo']=='Automatico'){ ?>
                <?php $i = $programacion['proequi_fecha_inicio'] - mktime(); ?>
                <tr
                        <?php
                        if($i > 0 && $i < 86400){
                            ?>
                            class="#ff9100 orange accent-3"
                            <?php

                        }elseif ($i > 172800 && $i < 259200) {
                            ?>
                            class="#ffab00 amber accent-4"
                            <?php

                        }elseif ($i > 518400 && $i < 604800) {
                            ?>
                            class="#ffc400 amber accent-3"
                            <?php

                        }elseif ($i > 950400 && $i < 1036800) {
                            ?>
                            class="#ffea00 yellow accent-3"
                            <?php
                        }elseif($i < 0){
                            ?>
                            class="#c0ca33 lime darken-1"
                            <?php

                        }elseif($i){
                            ?>
                            class="#c0ca33 lime darken-1"
                            <?php
                        }
                        ?>
                    >
                    <td><input type="checkbox" name="id[]" id="<?php echo $programacion['detprog_id'] ?>" value="<?php echo $programacion['detprog_id'] ?>" data-error=".errorTxt215"><label for="<?php echo $programacion['detprog_id'] ?>"></label></td>
                    <td><input type="hidden" value="<?php echo $programacion['cen_id'] ?>" ><?php echo $programacion['cen_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['equi_id'] ?>" ><?php echo $programacion['equi_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['comp_id'] ?>" ><?php echo $programacion['comp_descripcion'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['ttra_id'] ?>" ><?php echo $programacion['ttra_descripcion'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['tar_id'] ?>" ><?php echo $programacion['tar_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['tman_id'] ?>" ><?php echo $programacion['tman_descripcion'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['frecuencia'] ?>" ><?php echo $programacion['frecuencia'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['tmed_id'] ?>" ><?php echo $programacion['tmed_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['frec_actual'] ?>" ><?php echo $programacion['frec_actual'] ?></td>
                    <td>

                       <?php
                            if($i > 0 && $i < 86400){
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "Hoy"; ?>
                                <?php

                            }elseif ($i > 86400 && $i < 172800) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "Maaacute;ana"; ?>
                                <?php

                            }elseif ($i > 172800 && $i < 259200) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "falta: un dia"; ?>
                                <?php

                            }elseif ($i > 259200 && $i < 345600) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "falta: 2 dias"; ?>
                                <?php

                            }elseif ($i > 345600 && $i < 432000) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "falta: 3 dias"; ?>
                                <?php

                            }elseif ($i > 432000 && $i < 518400) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "falta: 4 dias"; ?>
                                <?php

                            }elseif ($i > 518400 && $i < 604800) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 5 dias"; ?>
                                <?php

                            }elseif ($i > 604800 && $i < 691200) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 6 dias"; ?>
                                <?php

                            }elseif ($i > 691200 && $i < 777600) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 7 dias"; ?>
                                <?php

                            }elseif ($i > 777600 && $i < 864000) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 8 dias"; ?>
                                <?php

                            }elseif ($i > 864000 && $i < 950400) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 9 dias"; ?>
                                <?php

                            }elseif ($i > 950400 && $i < 1036800) {
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 10 dias"; ?>
                                <?php
                            }elseif($i < 0){//-----si se paso de la fecha establecida------
                                if(date('d-m-Y')!=$programacion['proequi_fecha']){
                                    $objProgramacion = new ProgramacionModel();

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
                                    // Cierra la conexion
                                    $objProgramacion->cerrar();
                                }

                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "pendiente"; ?>
                                <?php

                            }elseif($i){
                                ?>
                                <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "pendiente"; ?>
                                <?php

                            }
                       ?>
                    </td>

                </tr>
            <?php } ?>
        <?php } ?>
            
        <?php foreach ($mediciones as $med) { ?>
            <?php if($med['tmed_tipo']=='Manual'){ ?>
                <tr
                        <?php
                        if($med['frecuencia'] <= $med['totalMediciones']){
                            ?>
                            class="#ff9100 orange accent-3"
                            <?php
                        }elseif($med['frecuencia']>$med['totalMediciones']){
                            ?>
                            class="#c0ca33 lime darken-1"
                            <?php
                        }
                        ?>
                    >

                    <td><input type="checkbox" name="id[]" id="<?php echo -$med['detprog_id'] ?>" value="<?php echo $med['detprog_id'] ?>" data-error=".errorTxt215"><label for="<?php echo -$med['detprog_id'] ?>"></label></td>
                    <td><input type="hidden" value="<?php echo $med['cen_id'] ?>" ><?php echo $med['cen_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['equi_id'] ?>" ><?php echo $med['equi_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['comp_id'] ?>" ><?php echo $med['comp_descripcion'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['ttra_id'] ?>" ><?php echo $med['ttra_descripcion'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['tar_id'] ?>" ><?php echo $med['tar_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['tman_id'] ?>" ><?php echo $med['tman_descripcion'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['frecuencia'] ?>" ><?php echo $med['frecuencia'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['tmed_id'] ?>" ><?php echo $med['tmed_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $med['frec_actual'] ?>" ><?php echo $med['frec_actual'] ?></td>
                    <td>
                        <?php
                        if($med['frecuencia'] <= $med['totalMediciones']){
                            ?>
                            <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "Hoy"; ?>
                            <?php
                        }elseif($med['frecuencia']>$med['totalMediciones']){
                            ?>
                            <input type="hidden" value="<?php echo $med['totalMediciones'] ?>" ><?php echo $med['frecuencia']-$med['totalMediciones']." ".$med['tmed_nombre'] ?>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
            
    </tbody>
</table>
<div class="errorTxt215"></div>
