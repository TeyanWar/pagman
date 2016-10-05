<div class="row">
    
    <h5 class="header">Nuevo Usuario</h5>
    
    <div id="card-alert" class="card teal">
        <div class="card-content white-text">
            <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <form id="agregar" class="col s12" data-url="<?php echo crearUrl("Usuarios", "personas", "postAgregaruser", array('noVista'=>"noVista")) ?>" data-redirect="<?php echo crearUrl("Usuarios", "usuarios", "listar") ?>" method="post" novalidate>

        <div class="row">

            <div class="input-field col s6">
                <input id="login" type="text" class="validate" length="20" name="login" data-error=".errorTxt91">
                <label for="first_name">(*) Login</label>
                <div class="errorTxt91"></div>
            </div>

            <div class="input-field col s6">
                <input id="clave" type="password" class="validate" length="20" name="clave" data-error=".errorTxt92">
                <label for="password">(*) Clave</label>
                <div class="errorTxt92"></div>
            </div>

        </div>

        <div class="row">
            <div class="input-field col s6">
                <small style="color: #848484;">(*) Estado</small>
                <select class="error browser-default select2" id="estado" name="estado" data-error=".errorTxt93">
                    <option value="" disabled selected>Seleccione</option>
                    <option value="activo">activo</option>
                    <option value="desactivado">desactivado</option>
                </select>
                <div class="errorTxt93"></div>
            </div>
            
            <div class="input-field col s6">
                <small style="color: #848484;">(*) Rol/perfil</small>
                <select class="error browser-default select2" id="perfil" name="perfil" data-error=".errorTxt94">
                    <option value="" disabled selected>Seleccione</option>
                    <?php 
                        foreach($perfiles as $perfil){
                        echo "<option value='".$perfil["rol_id"]."'>". $perfil["rol_nombre"] . "</option>";
                        }
                    ?>
                </select>
                <div class="errorTxt94"></div>
            </div>
        </div>

        <input type="hidden" name="idper" value="<?php echo $usuar['per_id'] ?>">
        
        <div class="row">

            <div class="input-field col s4 offset-s4">
                <div class="input-field col s12">
                    <button name="action" type="submit" class="btn teal waves-effect waves-light right submit_ot animated infinite rubberBand">Registrar
                        <i class="mdi-content-add left"> </i>
                    </button>
                </div>
            </div>
        </div>
        
    </form>

</div>

<script>
    $(".select2").select2({});
    //----------------- validaciones ---------------
    
    /* Incluimos un método para validar el campo nombre */

    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    //----------------------expresion para validar solo numeros y letras----------------
    jQuery.validator.addMethod("password", function(value, element) {
        return this.optional(element) || /^[0-9a-zA-Z]+$/i.test(value);
    });
    
        //----------------------validate editar----------------------------
    
    $("#agregar").validate({
        rules: {
            login: {
                required: true,
                minlength: 5,
                maxlength: 20
            },
            clave: {
                required: true,
                password: true,
                minlength: 5,
                maxlength: 20
            },
            estado: {
                required: true
            },
            perfil: {
                required: true
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            login:{
                required: "El login es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
            },
            clave:{
                required: "El clave es obligatorio.",
                password: "El valor debe ser alfanumerico.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
            },
            estado:{
                required: "El estado es obligatorio."
            },
            perfil:{
                required: "El perfil es obligatorio."
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
