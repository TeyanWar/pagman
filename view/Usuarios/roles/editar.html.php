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
            <div class="input col s12">
                <label>(*) Rol actual:</label>
                <input type="text" name="nombreRol" value="<?php echo $rol['rol_nombre'] ?>" type="text">
            </div>
            <div class="input col s12">
                <label>(*) Descripción</label>
                <input type="text" name="rol_descripcion" value="<?php echo $rol['rol_descripcion'] ?>">
            </div>
        </div> <!--fin datos rol-->

        <?php
    }
    ?>
    <div class="col-lg-offset-2 col-lg-10">
        <input type="submit" class="btn" value="Editar">
    </div>
</form>
