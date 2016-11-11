<center>
    <?php include 'templates/adminMaterialize/estandarEditarSena.html.php'; ?>    
</center>
<br>
<div id="card-alert" class="card teal">
    <div class="card-content white-text">
        <p><i class="mdi-action-info-outline"></i> IMPORTANTE: &nbsp;Los campos marcados con asteriscos(*) son obligatorios.</p>
    </div>
</div>
<!--Inicio contenedor mensajes de error-->
<div class="card red">
    <div id="cont_errors_ajax" class="card-content white-text">
    </div>
</div>
<!--Fin contenedor mensajes de error-->

<form id="form_editar_rol" class="col s12" action="<?php echo crearUrl("roles", "roles", "postEditar", array('noVista')) ?>" method="post">
    <div class="row">
        <input type="hidden" value="<?php echo $rol['rol_id'] ?>" name="rol_id" required>
        <div class="input-field col s7">
            <input value="<?php echo $rol['rol_nombre'] ?>" id="rol_nombre" name="rol_nombre" type="text" length="20">
            <label for="rol_nombre">(*) Nombre</label>
        </div>
        <div class="input-field col s12">
            <input value="<?php echo $rol['rol_descripcion'] ?>" id="rol_descripcion" name="rol_descripcion" type="text" length="100">
            <label for="rol_descripcion">(*) Descripción</label>
        </div>
    </div> <!--fin datos rol-->

    <!--Inicio de asignación de permisos-->
    <div class="row">
        <div class="col s5" style="background: white">
            <?php foreach ($modulos as $modulo) { ?>
                <div class = "card-header modulo_permisos" data-div_permisos=".<?php echo $modulo['mod_nombre']; ?>">
                    <?php echo $modulo['mod_nombre']; ?>
                </div>
            <?php } ?>
        </div>
        <div id="contenedor_permisos" class="col s7" style="background: white">
            <?php foreach ($modulos as $modulo) { ?>
                <div class="row <?php echo $modulo['mod_nombre']; ?>" style="display: none">
                    <?php foreach ($modulo['controladores'] as $key => $controlaor) { ?>
                        <!--Para alinear los controladores-->
                        <?php if ($key % 2 != 0) { ?>
                            <div class="row <?php echo $modulo['mod_nombre']; ?>">
                            <?php } ?>
                            <div class="col s6 <?php echo $modulo['mod_nombre']; ?>" id="<?php echo $controlaor['cont_display']; ?>">
                                <h5><?php echo $controlaor['cont_display']; ?></h5>
                                <!--Seleccionar todo -->
                                <input onclick="selectAllFunctionsController(this)" class="filled-in" id="all_<?php echo $controlaor['cont_display']; ?>" type="checkbox" >
                                <label for="all_<?php echo $controlaor['cont_display']; ?>">Seleccionar todo</label>
                                <?php foreach ($controlaor['funciones'] as $funcion) { ?>
                                    <p>
                                        <input name="funciones[]" id="<?php echo $funcion['func_id'] ?>" value="<?php echo $funcion['func_id'] ?>" type="checkbox" <?php echo $funcion['checkeado']; ?> required="">
                                        <label for="<?php echo $funcion['func_id'] ?>"><?php echo ucwords($funcion['func_display']) ?></label>
                                    </p>
                                <?php } ?>
                            </div>
                            <?php if ($key % 2 != 0) { ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--Fin de asignación de permisos-->
    <div class="row">
        <div class="input-field col s12">
            <button name="action" type="submit" class="btn cyan waves-effect waves-light teal right btn_submit_modal">Editar
                <i class="mdi-content-send right"></i>
            </button>
        </div>
    </div>
</form>

<!--materialize js para contar la longitud de los input -->
<script type="text/javascript" src="<?php echo addLib('templates/adminMaterialize/js/materialize.js') ?>"></script>
<style>
    #modalUpdateRoles{
        top: 2% !important;
        max-height: 100%;
        height: 96%;
    }
</style>
<script>
                                    $("#form_editar_rol").validate({
                                        rules: {
                                            rol_id: {
                                                required: true,
                                                numeric: true
                                            },
                                            rol_nombre: {
                                                required: true,
                                                minlength: 3,
                                                maxlength: 20
                                            },
                                            rol_descripcion: {
                                                maxlength: 100
                                            },
                                            funciones: {
                                                required: true
                                            }
                                        },
                                        messages: {
                                            rol_id: {
                                                required: "Por favor seleccione un registro",
                                                numeric: "Este campo debe contener sólo números"
                                            },
                                            rol_nombre: {
                                                required: "Por favor diligencie este campo",
                                                minlength: "Este campo debe contener entre 3 y 20 caracteres",
                                                maxlength: "Este campo debe contener entre 3 y 20 caracteres"
                                            },
                                            rol_descripcion: {
                                                maxlength: "Este campo debe contener 100 o menos caracteres"
                                            },
                                            funciones: {
                                                required: "Por favor asignar al menos una función al rol"
                                            }
                                        },
                                        errorElement: 'em',
                                        errorPlacement: function (error, element) {
                                            error.insertAfter(element);
                                        }
                                    });
</script>
