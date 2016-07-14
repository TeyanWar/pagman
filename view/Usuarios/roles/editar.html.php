<div id="card-alert" class="card teal">
    <div class="card-content white-text">
        <p><i class="mdi-action-info-outline"></i>IMPORTANTE: &nbsp;Los campos marcados con asteriscos(*) son obligatorios.</p>
    </div>
</div>
<?php
foreach ($roles as $rol) {
    ?>
    <form class="col s12" role="form" action="<?php echo crearUrl("roles", "roles", "postEditar") ?>" method="post">
        <div class="row">
            <input type="hidden" value="<?php echo $rol['rol_id'] ?>" name="rol_id" >
            <div class="input col s12">
                <label>(*) Rol:</label>
                <input type="text" name="rol_nombre" value="<?php echo $rol['rol_nombre'] ?>" type="text">
            </div>
            <div class="input col s12">
                <label>(*) Descripción</label>
                <input type="text" name="rol_descripcion" value="<?php echo $rol['rol_descripcion'] ?>">
            </div>
        </div> <!--fin datos rol-->

        <?php
    }
    ?>
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
    <!--Fin de asignación de permisos-->
    <div class="col-lg-offset-2 col-lg-10">
        <input type="submit" class="btn" value="Editar">
    </div>
</form>
<style>
    #modalUpdateRoles{
        top: 5% !important;
        max-height: 90%;
        height: 90%;
    }
    
</style>
