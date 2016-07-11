<div class="row">
    
    <div id="card-alert" class="card teal">
        <div class="card-content white-text">
            <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            <br>
            <p> <?php echo getErrores(); ?> </p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <form id="form4" class="col s12" action="<?php echo crearUrl("usuarios", "usuarios", "postEditar") ?>" method="post" novalidate>
        <h4 class="header2">Modificar Persona</h4>

        <div class="row">
            <div class="col s4">
                <label for="departamento">(*) Departamento</label>
                <select class="error browser-default" id="departamento" name="departamento" data-error=".errorTxt51">
                    <option value="" disabled selected>-Departamento-</option>
                    <?php
                    foreach ($departamentos as $depto) {
                        if ($depto['dept_id'] == $per['dept_id']) {
                            echo "<option value='" . $depto["dept_id"] . "' selected>" . $depto["dept_nombre"] . "</option>";
                        } else {
                            echo "<option value='" . $depto["dept_id"] . "'>" . $depto["dept_nombre"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div class="errorTxt51"></div>
            </div>

            <div class="col s8">
                <label for="centro">(*) Centro</label>
                <select class="error browser-default" id="centro" name="centro" data-error=".errorTxt52">
                    <option value="" disabled selected>-Seleccione Centro-</option>
                    <?php
                    foreach ($centros as $cen) {
                        if ($cen['cen_id'] == $per['cen_id']) {
                            echo "<option value='" . $cen["cen_id"] . "' selected>" . $cen["cen_nombre"] . "</option>";
                        } else {
                            echo "<option value='" . $cen["cen_id"] . "'>" . $cen["cen_nombre"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div class="errorTxt52"></div>
            </div>

        </div>

        <div class="row">

            <div class="col s4">
                <label for="disabled">(*) Numero Identificacion</label>
                <input disabled id="disabled" type="text" class="validate" length="10" value="<?php echo $per['per_id'] ?>">
            </div>

            <div class="col s4">
                <label for="nombre">(*) Nombre</label>
                <input id="nombre" type="text" class="validate" length="20" name="nombre" value="<?php echo $per['per_nombre'] ?>" data-error=".errorTxt54">
                <div class="errorTxt54"></div>
            </div>

            <div class="col s4">
                <label for="apellido">(*) Apellido</label>
                <input id="apellido" type="text" class="validate" length="30" name="apellido" value="<?php echo $per['per_apellido'] ?>" data-error=".errorTxt55">
                <div class="errorTxt55"></div>
            </div>
        </div>

        <div class="row">

            <div class="col s4">
                <label for="telefono">(*) Telefono</label>
                <input id="telefono" type="tel" class="validate" length="10" name="telefono" value="<?php echo $per['per_telefono'] ?>" data-error=".errorTxt56">
                <div class="errorTxt56"></div>
            </div>

            <div class="col s4">
                <label for="movil">(*) Movil</label>
                <input id="movil" type="text" class="validate" length="10" name="movil" value="<?php echo $per['per_movil'] ?>" data-error=".errorTxt57">
                <div class="errorTxt57"></div>
            </div>

            <div class="col s4">
                <label for="email">(*) Email</label>
                <input id="email" type="email" class="validate" length="50" name="email" value="<?php echo $per['per_email'] ?>" data-error=".errorTxt58">
                <div class="errorTxt58"></div>
            </div>
        </div>

        <div class="row">

            <div class="col s4">
                <label for="direccion">(*) Direccion</label>
                <input id="direccion" type="text" class="validate" length="40" name="direccion" value="<?php echo $per['per_direccion'] ?>" data-error=".errorTxt59">
                <div class="errorTxt59"></div>
            </div>

            <div class="col s4">
                <label for="valorhora">(*) Valor Hora</label>
                <input id="valorhora" type="text" class="validate" length="10" name="valorhora" value="<?php echo $per['per_valor_hora'] ?>" data-error=".errorTxt60">
                <div class="errorTxt60"></div>
            </div>

            <div class="col s4">
                <label for="cargo">(*) Cargo</label>
                <select class="error browser-default" id="cargo" name="cargo" data-error=".errorTxt61">
                    <option value="" disabled selected>-Seleccione Cargo-</option>
                    <?php
                    foreach ($cargos as $car) {
                        if ($car['car_id'] == $per['car_id']) {
                            echo "<option value='" . $car["car_id"] . "' selected>" . $car["car_descripcion"] . "</option>";
                        } else {
                            echo "<option value='" . $car["car_id"] . "'>" . $car["car_descripcion"] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div class="errorTxt61"></div>
            </div>

        </div>

        <!-- Campo para almacenar el id del equipo -->
        <input type="hidden" name="id" value="<?php echo $per['per_id'] ?>">

        <div class="row">

            <div class="input-field col s4 offset-s4">
                <div class="input-field col s12">
                    <button class="btn cyan waves-effect waves-light" type="submit"><i class="mdi-action-perm-identity"></i>Guardar Cambios</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $('select').material_select('destroy');
        $('select').material_select();
      
      $(document).on('click', '.modal-close', function () {    
      $("#mod").closeModal();
    });   

    });
</script>

<script>
    //----------------- validaciones ---------------
    
    /* Incluimos un método para validar el campo nombre */

    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    
        //----------------------validate editar----------------------------
    
    $("#form4").validate({
        rules: {
            departamento: {
                required: true
            },
            centro: {
                required: true
            },
            cargo: {
                required: true
            },
            nombre: {
                required: true,
                letra: true,
                minlength: 3,
                maxlength: 20
            },
            apellido: {
                required: true,
                letra: true,
                minlength: 5,
                maxlength: 30
            },
            telefono: {
                required: true,
                digits: true,
                minlength: 5,
                maxlength: 10
            },
            movil: {
                required: true,
                digits: true,
                minlength: 5,
                maxlength: 10
            },
            email: {
                required: true,
                email:true,
                minlength: 5,
                maxlength: 45
            },
            direccion: {
                required: true,
                minlength: 5,
                maxlength: 40
            },
            valorhora: {
                required: true,
                number: true,
                minlength: 3,
                maxlength: 10
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            departamento:{
                required: "El departamento es obligatorio."
            },
            centro:{
                required: "El centro es obligatorio."
            },
            cargo:{
                required: "El cargo es obligatorio."
            },
            nombre:{
                required: "El nombre es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
            },
            apellido:{
                required: "El apellido es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 30 caracteres"
            },
            telefono:{
                required: "El telefono es obligatorio.",
                digits: "El valor debe ser numerico",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 10 caracteres"
            },
            movil:{
                required: "El movil es obligatorio.",
                digits: "El valor debe ser numerico",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 10 caracteres"
            },
            email:{
                required: "El email es obligatorio.",
                email: "El correo debe ser valido",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 45 caracteres"
            },
            direccion:{
                required: "La direccion es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 40 caracteres"
            },
            valorhora:{
                required: "El valor hora es obligatorio.",
                number: "El valor debe ser numerico",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Solo se permite introducir maximo 10 caracteres"
            },
            curl: "Enter your website",
        },
        errorElement : 'div',
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
