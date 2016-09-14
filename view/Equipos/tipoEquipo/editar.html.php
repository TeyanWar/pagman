<center><h5>EDITAR TIPO DE EQUIPO </h5></center><br>
<?php
$miserrores = getErrores();
if (!$miserrores == "") {
    ?>
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
            <p><i class="mdi-action-info-outline"></i>
                <?php echo $miserrores; ?> 
            </p>
        </div>
    </div>
<?php }
?>
<form class="col s12" id="formEditarCamposPersonalizados" action="<?php echo crearUrl("Equipos", "tipoEquipo", "postEditar") ?>" method="POST">
    <div class="row">
        <div class="input-field col s6">
            <input type="text" id="tipoEquipoNombre" data-error=".errorTxt2" name="tipoEquipoNombre" class="validate" value="<?php echo $tEquipo['tequi_id']; ?>">
            <label for="tipoEquipoNombre" class="active" >(*)Código Tipo de Equipo:</label>
            <div class="errorTxt2"></div>
        </div>
        <div class="input-field col s6">
            <input type="text" id="tipoEquipoNombre" data-error=".errorTxt2" name="tipoEquipoNombre" class="validate" value="<?php echo $tEquipo['tequi_descripcion']; ?>">
            <label for="tipoEquipoNombre" class="active" >(*)Nombre Tipo de Equipo:</label>
            <div class="errorTxt2"></div>
        </div>
    </div>
    <table class="striped">
        <thead>
            <tr>
                <th>
                    Seleccionado
                </th>
                <th>
                    Nombre del Campo
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sqlDetalle as $detalle) { ?>
            
                <tr>
                    <td>
                        <input type="checkbox" id="<?php echo $detalle['cp_id']; ?>" value="<?php echo $detalle['cp_id']; ?>"/>
                        <label for="<?php $detalle['cp_id']; ?>" value="<?php echo $detalle['cp_id']; ?>"></label>

                    </td>

                    <td>
                        <?php echo $detalle['cp_nombre']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <!--<input type="hidden" id="codigoCP" name="codigoCP" data-error=".errorTxt1" class="validate" value="<?php //echo $consulta['cp_id'];           ?>">-->
    <div class="row">
        <div class="input-field col s12">
            <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right">Editar
                <i class="mdi-content-add right"></i>
            </button>
        </div>
    </div><br>
</form>
<script>

    jQuery.validator.addMethod("letra", function (value, element) {
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
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>
