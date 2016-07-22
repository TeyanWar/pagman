<div class="col s12 m12 l6">
    
    <!--Inicio contenedor mensajes de error-->
    <div class="card red">
        <div id="cont_errors_ajax" class="card-content white-text">
            
        </div>
    </div>
    <!--Fin contenedor mensajes de error-->
    
    <form action = "<?php echo crearUrl("Permisos", "permisos", "postCrear",array('noVista')) ?>" name = "formRol" method = "POST">
        <div>
            <input type="hidden" name="rol_id" value="<?php echo $rolActual[0]['rol_id']; ?>" readonly> 
            Rol:
            <code><b><?php echo $rolActual[0]['rol_nombre']; ?></b></code>
        </div>
        
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
        /*top: 5% !important;*/
        max-height: 80%;
        height: 80%;
    }
</style>