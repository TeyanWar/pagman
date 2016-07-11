<div class="row">
    <form class="col s12" role="form" action="<?php echo crearUrl("equipos", "tipoEquipo", "postEditar") ?>" method="post">
        <div class="row">
            <div class="input-field col s6">
                <input readonly type="text" id="tequi_id" name="tequi_id" value="<?php echo $tEquipo['tequi_id']; ?>">
                <label for="tequi_id" class="active">Codigo del Tipo de Equipo:</label>
            </div>
            <div class="input-field col s6">
                <input type="text" id="tequi_descripcion" name="tequi_descripcion" value="<?php echo $tEquipo['tequi_descripcion']; ?>">
                <label for="tequi_descripcion" class="active">Codigo del Tipo de Equipo:</label>
            </div>
        </div>
         <div class="col-lg-offset-2 col-lg-10">
            <input type="submit" class="btn" value="Editar">
        </div>
    </form>
</div>