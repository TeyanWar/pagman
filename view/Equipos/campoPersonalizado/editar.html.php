<center><h5>EDITAR CAMPO PERSONALIZADO Código <code><?php echo $consulta['cp_id']; ?></code></h5></center><br>
</div>
<!--Inicio contenedor mensajes de error-->
<div class="card red">
    <div id="cont_errors_ajax" class="card-content white-text">
    </div>
</div>
<!--Fin contenedor mensajes de error-->
<form class="col s12" id="formEditarCamposPersonalizados" action="<?php echo crearUrl("Equipos", "campoPersonalizado", "postEditar",array('noVista')) ?>" method="POST">
    <div class="row">
        <div class="input-field col s12">
            <input type="text" id="nombreCP" data-error=".errorTxt2" name="nombreCP" class="validate" value="<?php echo $consulta['cp_nombre']; ?>">
            <label for="nombreCP" class="active" >(*)Nombre campo personalizado:</label>
            <div class="errorTxt2"></div>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right btn_submit_modal">Editar
                <i class="mdi-content-add right"></i>
            </button>
        </div>
    </div>

    <input type="hidden" id="codigoCP" name="codigoCP" data-error=".errorTxt1" class="validate" value="<?php echo $consulta['cp_id']; ?>">

</form>
<script>
    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });

    $("#formEditarCamposPersonalizados").validate({
        rules: {
            codigoCP: {
                required: true,
                minlength: 3,
                maxlength: 40
            },
            nombreCP: {
                required: true,
                minlength: 3,
                maxlength: 50,
                letra: true
            },
            cgender: "required",
            cagree: "required",
        },
        //For custom messages
        messages: {
            codigoCP: {
                required: "El campo no puede quedar vacío, por favor ingresa un <code>Codigo</code> Recuerda seguir el patrón <code>CP0XXXX</code>",
                minlength: "El campo debe contener minimo 3 caracteres",
                maxlength: "Has sobrepasado el limite, maximo 40 caracteres"
            },
            nombreCP: {
                required: "Este campo no puede quedar vacío, ingresa un Nombre",
                minlength: "El campo debe contener minimo 3 caracteres",
                maxlength: "Has sobrepasado el limite, maximo 50 caracteres",
                letra: "Solo se admiten Letras"
            }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });



</script>