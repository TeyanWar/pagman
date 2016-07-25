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

<form class="col s12" role="form" action="<?php echo crearUrl("roles", "roles", "postEditar",array('noVista')) ?>" method="post">
    <div class="row">
        <input type="hidden" value="<?php echo $rol['rol_id'] ?>" name="rol_id" required>
        <div class="input col s12">
            <label>(*) Rol:</label>
            <input type="text" name="rol_nombre" value="<?php echo $rol['rol_nombre'] ?>" type="text" required>
        </div>
        <div class="input col s12">
            <label>(*) Descripción</label>
            <input type="text" name="rol_descripcion" length="10" value="<?php echo $rol['rol_descripcion'] ?>" required>
        </div>
        <!--<div class="row">-->
<!--        <div class="input-field col s6">
            <input type="text" length="10" id="input_text1">
            <label for="input_text1" class="">Input text</label>
            <span class="character-counter" style="float: right; font-size: 12px; height: 1px;"></span>
        </div>-->
        <!--</div>-->
        
    </div> <!--fin datos rol-->

    <!--Inicio de asignación de permisos-->
    <div class="row">
        <div class="col s4" style="background: white">
            <?php foreach($modulos as $modulo){?>
                <div class = "card-header cyan darken-2 modulo_permisos" data-div_permisos=".<?php echo $modulo['mod_nombre']; ?>">
                    <?php echo $modulo['mod_nombre']; ?>
                </div>
            <?php } ?>
        </div>
        <div id="contenedor_permisos" class="col s8" style="background: white">
            <?php foreach($modulos as $modulo){?>
                <div class="row <?php echo $modulo['mod_nombre']; ?>" style="display: none">
                    <?php foreach ($modulo['controladores'] as $key=> $controlaor) { ?>
                        <!--Para alinear los controladores-->
                        <?php if($key%2!=0){ ?>
                                <div class="row <?php echo $modulo['mod_nombre']; ?>">
                        <?php } ?>
                        <div class="col s6 <?php echo $modulo['mod_nombre']; ?>" >
                            <h5><?php echo $controlaor['cont_display']; ?></h5>
                            <?php foreach ($controlaor['funciones'] as $funcion) { ?>
                                <p>
                                    <input name="funciones[]" id="<?php echo $funcion['func_id'] ?>" value="<?php echo $funcion['func_id'] ?>" type="checkbox" <?php echo $funcion['checkeado']; ?> required="">
                                   <label for="<?php echo $funcion['func_id'] ?>"><?php echo ucwords($funcion['func_display']) ?></label>
                                </p>
                            <?php } ?>
                        </div>
                        <?php if($key%2!=0){ ?>
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
<style>
    #modalUpdateRoles{
        top: 5% !important;
        max-height: 90%;
        height: 90%;
    }
    
</style>
