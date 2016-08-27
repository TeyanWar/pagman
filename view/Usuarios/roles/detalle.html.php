<div id="card-alert" class="card teal">
    <div class="card-content white-text">
        <p><i class="mdi-action-info-outline"></i>&nbsp;Datos del rol seleccionado</p>
    </div>
</div>
<div class="row">
    <div class="input col s7">
        <label>Rol actual:</label>
        <input type="text" value="<?php echo $rol['rol_nombre'] ?>" type="text" readonly>
    </div>
    <div class="input col s12">
        <label>(*) Descripción</label>
        <input type="text" name="rol_descripcion" value="<?php echo $rol['rol_descripcion'] ?>" readonly>
    </div>
</div>
<div id="card-alert" class="card teal">
    <div class="card-content white-text">
        <p><i class="mdi-action-info-outline"></i>&nbsp;Permisos del rol</p>
    </div>
</div>
<div class="row">
    <div class="input col s12">
        <?php foreach ($rol['modulos'] as $modulo) {
            echo "<p><b>".$modulo['mod_nombre'].":</b> ".$modulo['funciones']."</p>";
        }?>
    </div>
</div>
<style>
    #modalDetalleRol{
        top: 2% !important;
        max-height: 100%;
        height: 96%;
        width: 65%;
    }
</style>