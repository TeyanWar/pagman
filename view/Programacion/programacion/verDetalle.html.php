
<div class="row">

   
        <h5><?php echo $parametros[2]; ?></h5>
        
            <table class="bordered centered hoverable" >
                <tr>
                    <td>Componente</td>
                    <td>Tarea</td>
                    <td>Duracion horas</td>
                    <td>Frecuencia</td>
                    <td>Medidor</td>
                    <td>Estado</td>
                        
                </tr>  
                <?php
                $i = 0;
                foreach ($equipos as $programacion) {
                    ?>
                    <tr>
                        <td><input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" name="cod[]"><?php echo $programacion['comp_descripcion'] ?></td>
                        <td><?php echo $programacion['tar_nombre'] ?></td>
                        <td><?php echo $programacion['detprog_duracion_horas'] ?></td>
                        <td><?php echo $programacion['frecuencia'] ?></td>
                        <td><?php echo $programacion['tmed_nombre'] ?></td>
                        <td><?php echo $programacion['est_descripcion'] ?></td>                        
                       
                    </tr>

                    <?php
                    $i++;
                }
                ?>

            </table>
        
        <div class="row">
         <div class="input-field offset-s10 col s2 ">
             <a class="btn-floating btn-large waves-effect waves-light red  modal-action modal-close" href="#" >
                <i class="mdi-content-clear"></i></a>
        </div>
        </div>

</div>
<script>
    $(document).ready(function () {
    $(document).on('click', '.modal-close', function () {
        $("#detalle").closeModal();
    });
     });
</script>