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
            <th>Cuanto Falta</th>
        </tr>
    </thead>

    <tbody>
        
        <?php foreach ($programaciones as $programacion) {
           ?>
        
            <?php $i = $programacion['proequi_fecha_inicio'] - mktime(); ?>
            <tr
                    <?php
                    if($i > 0 && $i < 86400){
                        ?>
                        class="#ff9100 orange accent-3"
                        <?php

                    }elseif ($i > 86400 && $i < 259200) {
                        ?>
                        class="#ffab00 amber accent-4"
                        <?php

                    }elseif ($i > 432000 && $i < 604800) {
                        ?>
                        class="#ffc400 amber accent-3"
                        <?php

                    }elseif ($i > 864000 && $i < 1036800) {
                        ?>
                        class="#ffea00 yellow accent-3"
                        <?php
                    }elseif($i < 0){
                        ?>
                        class="#ff6d00 orange accent-4"
                        <?php

                    }elseif($i){
                        ?>
                        class="#c0ca33 lime darken-1"
                        <?php
                    }
                    ?>
                >
                <td><input type="checkbox" name="id[]" id="<?php echo $programacion['detprog_id'] ?>" value="<?php echo $programacion['detprog_id'] ?>" data-error=".errorTxt215"><label for="<?php echo $programacion['detprog_id'] ?>"></label></td>
                <div class="errorTxt215"></div>
                <td><input type="hidden" value="<?php echo $programacion['cen_id'] ?>" ><?php echo $programacion['cen_nombre'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['equi_id'] ?>" ><?php echo $programacion['equi_nombre'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['comp_id'] ?>" ><?php echo $programacion['comp_descripcion'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['ttra_id'] ?>" ><?php echo $programacion['ttra_descripcion'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['tar_id'] ?>" ><?php echo $programacion['tar_nombre'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['tman_id'] ?>" ><?php echo $programacion['tman_descripcion'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['frecuencia'] ?>" ><?php echo $programacion['frecuencia'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['tmed_id'] ?>" ><?php echo $programacion['tmed_nombre'] ?></td>
                <td>
                   
                   <?php
                        if($i > 0 && $i < 86400){
                            ?>
                            <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "Hoy"; ?>
                            <?php

                        }elseif ($i > 86400 && $i < 259200) {
                            ?>
                            <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "falta: un dia"; ?>
                            <?php

                        }elseif ($i > 432000 && $i < 604800) {
                            ?>
                            <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 5 dias"; ?>
                            <?php

                        }elseif ($i > 864000 && $i < 1036800) {
                            ?>
                            <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "faltan: 10 dias"; ?>
                            <?php
                        }elseif($i < 0){
                            ?>
                            <input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" ><?php echo "Atrasado!"; ?>
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
            
        <?php foreach ($mediciones as $med) { ?>

            <tr class="#c0ca33 lime darken-1">
                
                <td><input type="checkbox" name="me[]" id="<?php echo -$med['ctrmed_id'] ?>" value="<?php echo $med['ctrmed_id'] ?>" data-error=".errorTxt218"><label for="<?php echo -$med['ctrmed_id'] ?>"></label></td>
                <div class="errorTxt218"></div>
                <td><input type="hidden" value="<?php echo $med['cen_id'] ?>" ><?php echo $med['cen_nombre'] ?></td>
                <td><input type="hidden" value="<?php echo $med['equi_id'] ?>" ><?php echo $med['equi_nombre'] ?></td>
                <td><input type="hidden" value="<?php echo "motor"; ?>" ><?php echo "motor"; ?></td>
                <td><input type="hidden" value="<?php echo "mecanico"; ?>" ><?php echo "mecanico"; ?></td>
                <td><input type="hidden" value="<?php echo "cambio de aceite"; ?>" ><?php echo "cambio de aceite"; ?></td>
                <td><input type="hidden" value="<?php echo "preventivo"; ?>" ><?php echo "preventivo"; ?></td>
                <td><input type="hidden" value="<?php echo $med['ctrmed_medida_actual'] ?>" ><?php echo $med['ctrmed_medida_actual'] ?></td>
                <td><input type="hidden" value="<?php echo $med['tmed_id'] ?>" ><?php echo $med['tmed_nombre'] ?></td>
                <td><input type="hidden" value="<?php echo "pendiente"; ?>" ><?php echo "pendiente"; ?></td>
                
            </tr>
            
        <?php } ?>
            
    </tbody>
</table>
