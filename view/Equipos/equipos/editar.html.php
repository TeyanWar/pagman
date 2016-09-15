<div class="row">
    <form  id="formedi" class="col s12" role="form" action="<?php echo crearUrl("equipos", "equipos", "postEditar") ?>" method="post">
        <div class="row">
            <div class="input-field col s4">
                <input readonly type="text" id="equi_noplaca" name="equi_noplaca" value="<?php echo $equipo['equi_id']; ?>">
                <label for="equi_noplaca" class="active">N.Placa:</label>
            </div>
            <div class="input-field col s4">
                <select class="select2" name="per_id">
                    <?php
                    foreach ($personas as $persona) {
                        if($persona['per_id'] == $equipo['per_id']){
                            echo "<option value='" . $persona['per_id'] . "' selected>" . $persona['per_nombre'] . "</option>";
                        }else{
                            echo "<option value='" . $persona['per_id'] . "'>" . $persona['per_nombre'] . "</option>";
                        }
                        
                    }
                    ?>
                </select>
                <label for="Persona" class="">(*) Seleccion al encargado  </label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_nombre" value="<?php echo $equipo['equi_nombre']; ?>">
                <label for="equi-nombre" class="active">Nombre del Equipo:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <select class="select2" name="equi_estado">
                    <?php
                    foreach ($estados as $estado) {
                        if($estado['est_id'] == $equipo['est_id']){
                            echo "<option value='" . $estado['est_id'] . "' selected>" . $estado['est_descripcion'] . "</option>";
                        }else{
                            echo "<option value='" . $estado['est_id'] . "' >" . $estado['est_descripcion'] . "</option>";
                        }
                        
                    }
                    ?>
                </select>
                <label for="Estado_equipo" class="">Elija estado del equipo</label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_modelo" value="<?php echo $equipo['equi_modelo']; ?>">
                <label for="equi_modelo" class="active" >Modelo:</label>

            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_noserie" value="<?php echo $equipo['equi_serie']; ?>">
                <label for="equi_noserie" class="active">No. Serie:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="equi_fabricante" value="<?php echo $equipo['equi_fabricante']; ?>">
                <label for="equi_fabricante" class="active" >Fabricante:</label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_marca" value="<?php echo $equipo['equi_marca']; ?>">
                <label for="equi_marca" class="active" >Marca:</label>

            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_ubicacion" value="<?php echo $equipo['equi_ubicacion']; ?>">
                <label for="equi_ubicacion" class="active">Ubicacion:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="date" value="<?php echo $equipo['equi_fecha_compra']; ?>" name="equi_fecha_compra">
                <label for="equi_fecha_compra" class="active">Fecha De Compra  :</label> 

            </div>
            <div class="input-field col s4">
                <input type="date" value="<?php echo $equipo['equi_fecha_instalacion']; ?>" name="equi_fecha_instala">
                <label for="equi_fecha_instala" class="active">Fecha De Instalacion  :</label>

            </div>
            <div class="input-field col s4">
                <input type="date" value="<?php echo $equipo['equi_vence_garantia']; ?>" name="equi_vence_garantia">
                <label for="equi_vence_garantia" class="active">Vecimiento de garantia  :</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right">Editar
                    <i class="mdi-content-send right"></i>
                </button>
            </div>
        </div>
    </form>
</div>
<script>
     jQuery.validator.addMethod("letra", function (value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });

    $("#formedi").validate({
        rules: {
            equi_id: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            per_id: {
                required: true
            },
            equi_nombre: {
                required: true,
                letra: true,
                minlength: 3,
                maxlength: 20
            },
            est_id: {
                required: true
            },
            equi_modelo: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_serie: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_fabricante: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_marca: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_ubicacion: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_fecha_compra: {
                required: true
            },
            equi_fecha_instalacion: {
                required: true
            },
            equi_vence_garantia: {
                required: true
            },
            cen_id: {
                required: true
            },
            tequi_id: {
                required: true
            },
            area_id: {
                required: true
            },
            cgender: "required",
            cagree: "required",
        },
        //For custom messages
        messages: {
            equi_id: {
                required: "El N.Placa es obligatorio.",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            per_id: {
                required: "El encargado del centro es obligatorio."
            },
            equi_nombre: {
                required: "El nombre del equipo es obligatorio.",
                letra: "Sólo se permiten letras",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            est_id: {
                required: "El estado del equipo es obligatorio."
            },
            equi_modelo: {
                required: "El modelo es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_serie: {
                required: "El número de serie es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_fabricante: {
                required: "El fabricante es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_marca: {
                required: "La marca es obligatoria.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_ubicacion: {
                required: "La ubicación es obligatoria.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_fecha_compra: {
                required: "La fecha de compra es obligatoria."
            },
            equi_fecha_instalacion: {
                required: "La fecha de instalacion es obligatoria."
            },
            equi_vence_garantia: {
                required: "La Fecha Vecimiento De Garantia es obligatorio."
            },
            cen_id: {
                required: "El dentro de formación es obligatorio."
            },
            tequi_id: {
                required: "El tipo de equipo es obligatorio."
            },
            area_id: {
                required: "El área es obligatoria."
            },
            curl: "Enter your website"
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