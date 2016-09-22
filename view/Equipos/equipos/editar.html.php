
<!--Inicio contenedor mensajes de error-->
<div class="card red">
    <div id="cont_errors_ajax" class="card-content white-text">
    </div>
</div>
<!--Fin contenedor mensajes de error-->

<div class="row">
    <form action="<?php echo crearUrl("equipos", "equipos", "postEditar",array('noVista'))?>" method="post" id="editarEquipos">
        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="equi_nombre" class="validate" value="<?php echo $equipo['equi_nombre']; ?>" data-error=".errorTxt1">
                <label for="equi-nombre" class="active">Nombre del Equipo:</label>
                <div class="errorTxt1"></div>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_modelo" class="validate" value="<?php echo $equipo['equi_modelo']; ?>" data-error=".errorTxt2">
                <label for="equi_modelo" class="active" >Modelo:</label>
                <div class="errorTxt2"></div>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_serie" class="validate" value="<?php echo $equipo['equi_serie']; ?>" data-error=".errorTxt3">
                <label for="equi_noserie" class="active">No. Serie:</label>
                <div class="errorTxt3"></div>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="equi_marca" class="validate" value="<?php echo $equipo['equi_marca']; ?>" data-error=".errorTxt4">
                <label for="equi_marca" class="active" >Marca:</label>
                <div class="errorTxt4"></div>
            </div>
            <div class="input-field col s4">
                <input type="text" class="validate" name="equi_fabricante" value="<?php echo $equipo['equi_fabricante']; ?>" data-error=".errorTxt5">
                <label for="equi_fabricante" class="active" >Fabricante:</label>
                <div class="errorTxt5"></div>
            </div>
            <div class="input-field col s4">
                <select class="select2" class="validate" name="equi_estado" data-error=".errorTxt6">
                    <?php
                    foreach ($estados as $estado) {
                        if ($estado['est_id'] == $equipo['est_id']) {
                            echo "<option value='" . $estado['est_id'] . "' selected>" . $estado['est_descripcion'] . "</option>";
                        } else {
                            echo "<option value='" . $estado['est_id'] . "' >" . $estado['est_descripcion'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="Estado_equipo" class="">Elija estado del equipo</label>
                <div class="errorTxt6"></div>
            </div>

        </div>
        <div class="row">
            <div class="input-field col s4">
                <select class="select2" class="validate" name="area_id" data-error=".errorTxt13">
                    <?php foreach ($areas as $area) { ?>
                        <option value="<?php echo $area['area_id']; ?>" ><?php echo $area['area_descripcion']; ?></option>
                    <?php }
                    ?>
                </select>
                <label for="Estado_equipo" class="">Elija Area del equipo</label>
                <div class="errorTxt13"></div>
            </div>
            <div class="input-field col s4">
                <select class="select2" class="validate" name="per_id" data-error=".errorTxt7">
                    <?php
                    foreach ($personas as $persona) {
                        if ($persona['per_id'] == $equipo['per_id']) {
                            echo "<option value='" . $persona['per_id'] . "' selected>" . $persona['per_nombre'] . "</option>";
                        } else {
                            echo "<option value='" . $persona['per_id'] . "'>" . $persona['per_nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <label for="Persona" class="">(*) Seleccion al encargado  </label>
                <div class="errorTxt7"></div>
            </div>
            <div class="input-field col s4">
                <label for="equi_ubicacion">Ubicacion:</label>
                <input type="text" name="equi_ubicacion" class="validate" value="<?php echo $equipo['equi_ubicacion']; ?>" data-error=".errorTxt11">
                <div class="errorTxt11"></div>
            </div>
        </div>
        <div class="row">

            <div class="input-field col s4">
                <input type="date" class="validate" value="<?php echo $equipo['equi_fecha_compra']; ?>" name="equi_fecha_compra" data-error=".errorTxt8">
                <label for="equi_fecha_compra" class="active">Fecha De Compra  :</label> 
                <div class="errorTxt8"></div>
            </div>
            <div class="input-field col s4">
                <input type="date" class="validate" name="equi_fecha_instalacion" value="<?php echo $equipo['equi_fecha_instalacion']; ?>" data-error=".errorTxt9">
                <label for="equi_fecha_instalacion" class="active">Fecha De Instalacion  :</label>
                <div class="errorTxt9"></div>
            </div>
            <div class="input-field col s4">
                <input type="date" class="validate" value="<?php echo $equipo['equi_vence_garantia']; ?>" name="equi_vence_garantia" data-error=".errorTxt10">
                <label for="equi_vence_garantia" class="active">Vecimiento de garantia  :</label>
                <div class="errorTxt10"></div>
            </div>
            <div class="input-field col s4">
                <select class="select2" class="validate" name="cen_id" data-error=".errorTxt12">
                    <?php foreach ($centros as $centro) { ?>
                        <option value="<?php echo $centro['cen_id']; ?>"><?php echo $centro['cen_nombre']; ?></option>
                    <?php }
                    ?>
                </select>
                <label for="Estado_equipo" class="">Elija el Centro de Formacion</label>
                <div class="errorTxt12"></div>
            </div>
        </div>
        <div id="edit">
            <center><h5><b><code>Editar Medidores</code></b></h5></center>
            <table>
                <thead>
                    <tr></tr>
                </thead>
                <?php foreach ($medidores as $medidor) { ?>
                    <td>
                        <input name="medidores[]" id ="<?php echo $medidor['tmed_id']; ?>" value="<?php echo $medidor['tmed_id']; ?>" type = "checkbox" <?php echo $medidor['checkeado']; ?> >
                        <label for="<?php echo $medidor['tmed_id']; ?>"><?php echo ucWords($medidor['tmed_nombre']); ?></label>
                    </td>
                    <?php
                }
                ?>
            </table>
        </div>

        <input type="hidden" class="validate" value="<?php echo $equipo['equi_id']; ?>" name="equi_placa">


        <div class="row">
            <div class="input-field col s5">
                <input type="button" id="editMedidor" value="Editar Medidores" class="btn teal darken-2 waves-effect waves-light right">
            </div>
            <div class="input-field col s5">
                <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right btn_submit_modal">Actualizar Equipo
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

    $("#editarEquipos").validate({
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
                letra:false,
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
                letra: "Sólo se permiten numeros",
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
    
    $("#edit").css("display", "none");
    
    $("#editMedidor").click(function(){
        $("#edit").css("display", "block");
    });



    $('select').material_select();
</script>