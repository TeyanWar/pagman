
<div class="row">

    <form id="form8" class="col s12" action="<?php echo crearUrl("programacion", "programacion", "postEditar") ?>" method="post" novalidate>
        <h5><?php echo $parametros[2]; ?></h5>

        <table class="bordered centered hoverable" >
            <tr>
                <td>Componente</td>
                <td>Tarea</td>
                <td>Duracion horas</td>
                <td>Frecuencia</td>
                <td>Medidor</td>
                <td>Estado</td>
                <td>Desactivar/ Activar</td>           
            </tr>  
            <?php
            $i = 0;
            foreach ($equipos as $programacion) {
                ?>
                <tr>
                    <td><input type="hidden" value="<?php echo $programacion['detprog_id'] ?>" name="cod[]"><?php echo $programacion['comp_descripcion'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['tar_nombre'] ?>" name="tareas[]"><?php echo $programacion['tar_nombre'] ?></td>
                    <td><input id="horas" type="text" value="<?php echo $programacion['detprog_duracion_horas'] ?>" name="horas[]"></td>
                    <td><input id="frecuencia" type="text" value="<?php echo $programacion['frecuencia'] ?>" name="frecuencia[]"></td>
                    <td><?php echo $programacion['tmed_nombre'] ?></td>
                    <td><input type="hidden" value="<?php echo $programacion['est_id'] ?>" name="est[]"><?php echo $programacion['est_descripcion'] ?></td>   
                    
                    <td><p><input type="checkbox" name="id[]" id="<?php echo $i ?>" value="<?php echo $programacion['detprog_id'] ?>"> <label for="<?php echo $i ?>"></label></p></td>
                </tr>

                <?php
                $i++;
            }
            ?>

        </table>

        <div class="row">
           
            <div class="input-field offset-s8 col s2 ">
               <button class="btn-floating btn-large waves-effect waves-light cyan lighten-1  modal-action " type="submit">  <a href="#" >
                    <i class="mdi-action-cached"></i></a></button>
            </div>
             <div class="input-field col s2 ">
                 <a class="btn-floating btn-large waves-effect waves-light red  modal-action modal-close" href="#" >
                    <i class="mdi-content-clear"></i></a>
            </div>
        </div>

    </form>
</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '.modal-close', function () {
            $("#edit").closeModal();
        });
    });
</script>

<script>
        //----------------------validate editar----------------------------
    
    $("#form8").validate({
        rules: {
            horas: {
                required: true,
                digits: true
            },
            frecuencia: {
                required: true,
                digits: true
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            horas:{
                required: "Duracion Horas es obligatorio.",
                digits: "El valor debe ser numerico"
            },
            frecuencia:{
                required: "Frecuencia es obligatorio.",
                digits: "El valor debe ser numerico"
            },
            curl: "Enter your website",
        }
    });

</script>