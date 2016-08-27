<div class="col s12 m12 l6">
    
    <!--Inicio contenedor mensajes de error-->
    <div class="card red">
        <div id="cont_errors_ajax" class="card-content white-text">
            
        </div>
    </div>
    <!--Fin contenedor mensajes de error-->
    
    <form action = "<?php echo crearUrl("Permisos", "permisos", "postCrear",array('noVista')) ?>" name = "formRol" method = "POST">
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> Asignar permisos al rol: <code><b><?php echo $rolActual[0]['rol_nombre']; ?></b></code></p>
            </div>
            <input type="hidden" name="rol_id" value="<?php echo $rolActual[0]['rol_id']; ?>"> 
        </div>
        <div class="row">
            <div id="contenedor_modulos" class="col s5">
                <?php foreach($modulos as $modulo){?>
                    <div class = "card-header modulo_permisos" data-div_permisos=".<?php echo $modulo['mod_nombre']; ?>">
                        <?php echo $modulo['mod_nombre']; ?>
                    </div>
                <?php } ?>
            </div>
            <div id="contenedor_permisos" class="col s7">
                <?php foreach($modulos as $modulo){?>
                    <div class="row <?php echo $modulo['mod_nombre']; ?>" style="display: none">
                        <?php foreach ($modulo['controladores'] as $key=> $controlaor) { ?>
                            <!--Para alinear los controladores-->
                            <?php if($key%2!=0){ ?>
                                    <div class="row <?php echo $modulo['mod_nombre']; ?>">
                            <?php } ?>
                            <div class="col s6 <?php echo $modulo['mod_nombre']; ?>" id="<?php echo $controlaor['cont_display']; ?>">
                                <h5><?php echo $controlaor['cont_display']; ?></h5>
                                <!--Seleccionar todo -->
                                <input onclick="selectAllFunctionsController(this)" class="filled-in" id="all_<?php echo $controlaor['cont_display']; ?>" type="checkbox" >
                                <label for="all_<?php echo $controlaor['cont_display']; ?>">Seleccionar todo</label>
                                <?php foreach ($controlaor['funciones'] as $funcion) { ?>
                                    <p>
                                       <input name="funciones[]" id="<?php echo $funcion['func_id'] ?>" value="<?php echo $funcion['func_id'] ?>" type="checkbox" <?php echo $funcion['checkeado']; ?> >
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
        <br>
        <button name="action" type="submit" class="btn waves-effect waves-light teal right btn_submit_modal">Asignar
            <i class="mdi-content-send right"></i>
        </button>
    </form>
</div>
<style>
    #modalDetalle1{
        top: 2% !important;
        max-height: 100%;
        height: 96%;
    }
</style>