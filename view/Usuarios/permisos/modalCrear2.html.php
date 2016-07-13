<div class="col s12 m12 l6">
    <form action = "<?php echo crearUrl("Permisos", "permisos", "postCrear") ?>" name = "formRol" method = "POST">
        <div>
            <input type="hidden" name="roles" value="<?php echo $rolActual[0]['rol_id']; ?>" readonly> 
            ROL ACTUAL
            <code><b><?php echo $rolActual[0]['rol_nombre']; ?></b></code>
        </div>
        <div class = "row" style = "margin-top: 40px;">
            <?php foreach($modulos as $modulo){?>
                    <div class = "col s12 m4 l4" id = "flight-card">
                        <div class = "card-header cyan darken-2">
                            <div class = "card-title">
                                <h5 class = "flight-card-title"><?php echo $modulo['mod_nombre']; ?></h5>
                            </div>
                        </div>
                        <div class = "input-field col s12">
                            <select multiple name = "funcionesModulos[]">
                                <option value = "" disabled selected>-- Seleccione --</option>
                                <?php foreach ($modulo['controladores'] as $controlaor) { ?>
                                      <!--<optgroup label="<?php // echo $controlaor['cont_display']; ?>">-->
                                    <?php foreach ($controlaor['funciones'] as $funcion) { ?>
                                            <option value="<?php echo $funcion['func_id']; ?>" name="opcion<?php echo $cont; ?>"><?php echo $funcion['func_display']; ?></option>
                                            <?php $cont++; ?>
                                    <?php } ?>
                                      <!--</optgroup>-->
                                <?php } ?>
                            </select>
                        </div>
                    </div>   
                    <br>
            <?php }?>
        </div><!--Cierre div Row Costos,Equipos,Herramientas-->
        <button name="action" type="submit" class="btn waves-effect waves-light teal">Registrar funciones
            <i class="mdi-content-send right"></i>
        </button>
    </form>
</div>
<script>
    $('select').material_select();
//    $();
</script>
