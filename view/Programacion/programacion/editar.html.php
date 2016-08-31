
<div class="row">

    <form  id="formulario1" class="col s12" data-url="<?php echo crearUrl("Programacion", "programacion", "postEditar", array('noVista'=>"noVista")) ?>" data-redirect="<?php echo crearUrl("Programacion", "programacion", "listar") ?>" method="post" novalidate>
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
                    <td><input id="horas" type="text" value="<?php echo $programacion['detprog_duracion_horas'] ?>" name="horas[]" data-error=".errorTxt97"></td> 
                <div class="errorTxt97"></div>
                <td><input id="frecuencia"  type="text" value="<?php echo $programacion['frecuencia'] ?>" name="frecuencia[]" data-error=".errorTxt98"></td>
                <div class="errorTxt98"></div>
                <td><?php echo $programacion['tmed_nombre'] ?></td>
                <td><input type="hidden" value="<?php echo $programacion['est_id'] ?>" ><?php echo $programacion['est_descripcion'] ?></td>   

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
<script type="text/javascript">
    $(document).ready(function () {

        $("#formulario1").validate({
            rules: {
                "horas[]": {
                    required: true,
                    digits: true,
                    minlength: 1,
                    maxlength: 10
                },
                "frecuencia[]": {
                    required: true,
                    digits: true,
                    minlength: 1,
                    maxlength: 10
                }
            },
            //For custom messages
            messages: {
                "horas[]": {
                    required: "La hora debe ser obligatorio.",
                    digits: "El valor debe ser numerico",
                    minlength: "Introduzca al menos 1 caracteres",
                    maxlength: "Solo se permite introducir maximo 10 caracteres"
                },
                "frecuencia[]": {
                    required: "La frecuencia es obligatorio.",
                    digits: "El valor debe ser numerico",
                    minlength: "Introduzca al menos 1 caracteres",
                    maxlength: "Solo se permite introducir maximo 10 caracteres"
                }
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });

    });

</script>


