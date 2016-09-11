<div class="row">

    <form id="form2" class="col s12" action="<?php echo crearUrl("usuarios", "usuarios", "postEditar")?>" method="post" novalidate>
        <h4 class="header2">Modificar Usuario</h4>

        <div class="row">

            <div class="col s4">
                <label>(*) Login</label>
                <input id="login" type="text" class="validate" length="20" name="login" value="<?php echo $usu['usu_usuario'] ?>" data-error=".errorTxt31">
                <div class="errorTxt31"></div>
            </div>

            <div class="col s4">
                <label>(*) Clave</label>
                <input id="clave" type="text" class="validate" length="30" name="clave" value="<?php echo $usu['usu_clave'] ?>" data-error=".errorTxt32">
                <div class="errorTxt32"></div>

            </div>

            <div class="col s4">
                <label>(*) Estado</label>
                <select id="estado" class="error browser-default" name="estado" data-error=".errorTxt33">
                    <?php 
                        if($usu['usu_estado']==='activo'){
                            echo "<option value='".$usu['usu_estado']."' selected>". $usu['usu_estado'] . "</option>";
                        }elseif($usu['usu_estado']==='desactivado'){
                            echo "<option value='".$usu['usu_estado']."' selected>". $usu['usu_estado'] . "</option>";
                        }
                    ?>
                    <option value="activo" >activo</option>
                    <option value="desactivado" >desactivado</option>
                </select>
                <div class="errorTxt33"></div>
            </div>
        </div>

        <div class="row">
            <div class="col s4">
                <label>(*) Departamento</label>
                <select id="departamento" class="error browser-default select2" name="departamento" data-error=".errorTxt34">
                    <option value="" disabled selected>-Seleccione Departamento-</option>
                    <?php 
                        foreach($departamentos as $depto){
                            if($depto['dept_id']== $usu['dept_id']){
                                echo "<option value='".$depto["dept_id"]."' selected>". $depto["dept_nombre"] . "</option>";
                            }else{
                                echo "<option value='".$depto["dept_id"]."'>". $depto["dept_nombre"] . "</option>";
                            }
                        }
                    ?>
                </select>
                <div class="errorTxt34"></div>
            </div>

            <div class="col s8">
                <label>(*) Centro</label>
                <select id="centro" class="error browser-default select2" name="centro" data-error=".errorTxt35">
                    <option value="" disabled selected>-Seleccione Centro-</option>
                    <?php 
                        foreach($centros as $cen){
                            if($cen['cen_id']== $usu['cen_id']){
                                echo "<option value='".$cen["cen_id"]."' selected>". $cen["cen_nombre"] . "</option>";
                            }else{
                                echo "<option value='".$cen["cen_id"]."'>". $cen["cen_nombre"] . "</option>";
                            }
                        }
                    ?>
                </select>
                <div class="errorTxt35"></div>
            </div>


        </div>

        <div class="row">

            <div class="col s4">
                <label>(*) Numero Identificacion</label>
                <input disabled id="disabled" type="text" class="validate" length="10" value="<?php echo $usu['per_id'] ?>" data-error=".errorTxt36">
                <div class="errorTxt36"></div>

            </div>

            <div class="col s4">
                <label>(*) Nombre</label>
                <input id="nombre" type="text" class="validate" length="20" name="nombre" value="<?php echo $usu['per_nombre'] ?>" data-error=".errorTxt37">
                <div class="errorTxt37"></div>

            </div>

            <div class="col s4">
                <label>(*) Apellido</label>
                <input id="apellido" type="text" class="validate" length="30" name="apellido" value="<?php echo $usu['per_apellido'] ?>" data-error=".errorTxt38">
                <div class="errorTxt38"></div>

            </div>
        </div>

        <div class="row">

            <div class="col s4">
                <label>(*) Telefono</label>
                <input id="telefono" type="tel" class="validate" length="10" name="telefono" value="<?php echo $usu['per_telefono'] ?>" data-error=".errorTxt39">
                <div class="errorTxt39"></div>

            </div>

            <div class="col s4">
                <label>(*) Movil</label>
                <input id="movil" type="text" class="validate" length="10" name="movil" value="<?php echo $usu['per_movil'] ?>" data-error=".errorTxt40">
                <div class="errorTxt40"></div>

            </div>

            <div class="col s4">
                <label>(*) Email</label>
                <input id="email" type="email" class="validate" length="50" name="email" value="<?php echo $usu['per_email'] ?>" data-error=".errorTxt41">
                <div class="errorTxt41"></div>

            </div>
        </div>

        <div class="row">

            <div class="col s4">
                <label>(*) Direccion</label>
                <input id="direccion" type="text" class="validate" length="40" name="direccion" value="<?php echo $usu['per_direccion'] ?>" data-error=".errorTxt42">
                <div class="errorTxt42"></div>

            </div>

            <div class="col s4">
                <label>(*) Valor Hora</label>
                <input id="valorhora" type="text" class="validate" length="10" name="valorhora" value="<?php echo $usu['per_valor_hora'] ?>" data-error=".errorTxt43">
                <div class="errorTxt43"></div>

            </div>

            <div class="col s4">
                <label>(*) Cargo</label>
                <select id="cargo" class="error browser-default select2" name="cargo" data-error=".errorTxt44">
                    <option value="" disabled selected>-Seleccione Cargo-</option>
                    <?php 
                        foreach($cargos as $car){
                            if($car['car_id']== $usu['car_id']){
                                echo "<option value='".$car["car_id"]."' selected>". $car["car_descripcion"] . "</option>";
                            }else{
                                echo "<option value='".$car["car_id"]."'>". $car["car_descripcion"] . "</option>";
                            }
                        }
                    ?>
                </select>
                <div class="errorTxt44"></div>
            </div>
        </div>

        <div class="row">
            <div class="col s4">
                <label>(*) Perfil</label>
                <select id="perfil" class="error browser-default select2" name="perfil" data-error=".errorTxt45">
                    <option value="" disabled selected>-Seleccione perfil-</option>
                    <?php 
                        foreach($perfiles as $perfil){
                            if($perfil['rol_id']== $usu['rol_id']){
                                echo "<option value='".$perfil["rol_id"]."' selected>". $perfil["rol_nombre"] . "</option>";
                            }else{
                                echo "<option value='".$perfil["rol_id"]."'>". $perfil["rol_nombre"] . "</option>";
                            }
                        }
                    ?>
                </select>
                <div class="errorTxt45"></div>
            </div>
        </div>

        <!-- Campo para almacenar el id del equipo -->
        <input type="hidden" name="id" value="<?php echo $usu['per_id'] ?>">

        <div class="row">

            <div class="input-field col s4 offset-s4">
                <div class="input-field col s12">
                    <button class="btn cyan waves-effect waves-light teal" type="submit"><i class="mdi-action-perm-identity"></i>Guardar Cambios</button>
                </div>
            </div>
        </div>
    </form>
</div>

<style>
    #modalUpdate{
        top: 2% !important;
        max-height: 100%;
        height: 94%;
    }
</style>

<script>
    //----------------- validaciones ---------------
    
    /* Incluimos un método para validar el campo nombre */

    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    
        //----------------------validate editar----------------------------
    
    $("#form2").validate({
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
            login: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            clave: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            estado: {
                required: true
            },
            perfil: {
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
            login:{
                required: "El login es obligatorio.",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
            },
            clave:{
                required: "El clave es obligatorio.",
                minlength: "Introduzca al menos 4 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
            },
            estado:{
                required: "El estado es obligatorio."
            },
            perfil:{
                required: "El perfil es obligatorio."
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
