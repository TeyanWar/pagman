<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2">Modificar herramienta</h4>
        <div class="row">
            <form class="centered form-horizontal" id="F_editar_herramienta" role="form" action="<?php echo crearUrl("herramientas", "herramientas", "postEditar") ?>" method="post">
                <div class="row">
                    <div class="input-field col s4">
                        <label for="her_id" class="active">N&uacute;mero de placa</label>
                        <input type="text" class="form-control" id="her_id" name="her_id" readonly="" value="<?php echo $herramienta['her_id'] ?>">
                    </div>
                    <div class="input-field col s4">
                        <label class="active"> *Fecha ingreso de herramienta: </label>
                        <input name="her_fecha_ingreso" type="date" id="her_fecha_ingreso" class="form-control datepicker" value="<?php echo $herramienta['her_fecha_ingreso'] ?>">
                    </div>
                    <div class="input-field col s4">
                        <label for="her_nombre" class="active">Nombre de herramienta</label>
                        <input type="text" class="form-control" id="her_nombre" name="her_nombre"value="<?php echo $herramienta['her_nombre'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="her_descripcion" class="active">Descripci&oacute;n de la Herramienta</label>
                        <input type="text" id="her_descripcion" class="form-control" name="her_descripcion" value="<?php echo $herramienta['her_descripcion'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s6">
                        <img width="100px" height="100px" src="../../../imagenes/<?php echo $herramienta['her_imagen'] ?>"/>
                        <!--<input type="text" name="her_imagen" id="her_imagen" value="<?php // echo $herramienta['her_imagen'] ?>">-->
                    </div>
                </div>
                <!-- Campo para almacenar el id de la herramienta -->
                <input type="hidden" name="id" value="<?php echo $herramienta['her_id'] ?>">

                <!--botonera de la ventana de editar-->
                <div class="row">
                    <div class="col s12">
                        <button name="action" type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand">Actualizar
                            <i class="mdi-action-autorenew left"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- aqui empiezan las validaciones en la ventana modal de editar herramientas -->
<script>
    //aqui empieza las validaciones para las herramientas
    $("#F_editar_herramienta").validate({
        rules: {
            her_nombre: {
                required: true,
                minlength: 10,
                maxlength: 40
            },
            her_descripcion: {
                required: true,
                minlength: 20,
                maxlength: 200
            },
            ther_id: "required",
        },
        //mensajes para cada dato validado
        messages: {
            her_nombre: {
                required: "Este campo es obligatorio",
                minlength: "Debe tener minimo: 10 caracteres",
                maxlength: "Debe tener maximo: 40 caracteres"
            },
            her_descripcion: {
                required: "Este campo es obligatorio",
                minlength: "debe tener minimo: 20 caracteres",
                maxlength: "debe tener maximo: 200 caracteres"
            },
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>