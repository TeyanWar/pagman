<div id="card-alert" class="card teal">
    <div class="card-content white-text">
        <p><i class="mdi-action-info-outline"></i>&nbsp;DETALLES DEL ROL SELECCIONADO</p>
    </div>
</div>
<?php
foreach ($roles as $rol) {
    ?>

    <div class="row">
        <div class="input col s6">
            <label>Rol actual:</label>
            <input type="text" value="<?php echo $rol['rol_nombre'] ?>" type="text" readonly>
        </div>
        <div class="input col s6">
            <label>(*) Descripción</label>
            <input type="text" name="rol_descripcion" value="<?php echo $rol['rol_descripcion'] ?>" readonly>
        </div>
    </div> <!--fin datos rol-->

    <?php
}
?>
