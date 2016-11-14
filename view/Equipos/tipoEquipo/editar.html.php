<center>
    <?php include 'templates/adminMaterialize/estandarEditarSena.html.php'; ?>    
</center>
<br><?php
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
        <div class="input-field col s12">
            <input type="text" id="tipoEquipoNombreEditar" data-error=".errorTxt1" name="tipoEquipoNombreEditar" class="validate" value="<?php echo $tEquipo['tequi_descripcion']; ?>">
            <label for="tipoEquipoNombreEditar" class="active" >(*)Nombre Tipo de Equipo:</label>
            <div class="errorTxt1"></div>
        </div>
    </div>
    <table class="striped">
        <thead>
            <tr>
                <th colspan="4">
                    Campos personalizados de este Tipo de equipo
                </th>
            </tr>
        </thead>
        <tbody>
        <div class="col s6">
            <?php foreach ($camposPersonalizados as $campoPersonalizado) { ?>
                <td>
                    <p>
                        <input name="campoSeleccionado[]" id="<?php echo $campoPersonalizado['cp_id']; ?>" value="<?php echo $campoPersonalizado['cp_id']; ?>" type="checkbox" <?php echo $campoPersonalizado['checkeado']; ?> data-error=".errorTxt2" class="validate">
                        <label for="<?php echo $campoPersonalizado['cp_id']; ?>" class="active"><?php echo ucwords($campoPersonalizado['cp_nombre']); ?></label>
                    <div class="errorTxt2"></div>
                    </p>
                </td>
                <td> 
                    <div class="row col s6">
                        <div class="input-field">
                            <input type="text" name="cantidad[]" class="validate" data-error=".errorTxt3" placeholder="<?php echo $campoPersonalizado['cantidad']; ?>">
                        </div>
                        <div class="errorTxt3"></div>
                    </div>
                </td>
                <?php
            }
            ?>
        </div>
        </tbody>
    </table>

    <input type="hidden" id="tequi_id" name="tequi_id" data-error=".errorTxt1" class="validate" value="<?php echo $tEquipo['tequi_id']; ?>">

    <div class="row">
        <div class="input-field col s12">
            <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right">Editar
                <i class="mdi-content-add right"></i>
            </button>
        </div>
    </div>
    <br>
</form>
<script>


    jQuery.validator.addMethod("letra", function (value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });

    jQuery.validator.addMethod("espacio_blanco", function (value, element) {
        return this.optional(element) || /[a-z]/i.test(value);
    });

    $("#formEditarCamposPersonalizados").validate({
        rules: {
            tipoEquipoNombreEditar: {
                required: true,
                minlength: 3,
                maxlength: 50,
                letra: true,
                espacio_blanco: true
            },
            campoSeleccionado: {
                required: true,
            },
            cgender: "required",
            cagree: "required",
        },
        //For custom messages
        messages: {
            tipoEquipoNombreEditar: {
                required: "Este campo no puede quedar vacío, ingresa un Nombre",
                minlength: "El campo debe contener minimo 3 caracteres",
                maxlength: "Has sobrepasado el limite, maximo 50 caracteres",
                letra: "Solo se admiten Letras",
                espacio_blanco: "Este campo no puede quedar vacío, ingresa un Nombre"
            },
            campoSeleccionado: {
                required: "Debe de agregar al menos un campo personalizado"
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

    $('select').material_select();

</script>
