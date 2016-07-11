<div class="col s12 m12 l6">
    <div class="card-panel">
        <center><h4 class="header2">Modificar herramienta</h4></center><br />
        <div class="row">
            <form class="form-horizontal" role="form" action="<?php echo crearUrl("herramientas", "herramientas", "postEditar") ?>" method="post">

                <div class="row">
                    <div class="input-field col s6">
                        <label for="her_fecha_ingreso"> Fecha de ingreso herramienta </label>
                        <input name="her_fecha_ingreso" type="date" id="her_fecha_ingreso" class="form-control datepicker" value="<?php echo $herramienta['her_fecha_ingreso'] ?>">
                    </div>
                    <div class="input-field col s6">
                        <label for="her_id" class="active">N&uacute;mero de placa</label>
                        <input type="text" class="form-control" id="her_id" name="her_id" readonly="" value="<?php echo $herramienta['her_id'] ?>">
                    </div>
                    <div class="input-field col s6">
                        <label for="her_nombre" class="active">Nombre de herramienta</label>
                        <input type="text" class="form-control" id="her_nombre" name="her_nombre"value="<?php echo $herramienta['her_nombre'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="her_descripcion" class="active">Descripci&oacute;n de la Herramienta</label>
                        <input type="text" id="her_descripcion" class="form-control" name="her_descripcion" value="<?php echo $herramienta['her_descripcion'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="her_imagen" class="active">Imagen de la Herramienta</label>
                        <input type="text" id="her_imagen" class="form-control" name="her_imagen" value="<?php echo $herramienta['her_imagen'] ?>">
                    </div>
                </div>
                <!-- Campo para almacenar el id de la herramienta -->
                <input type="hidden" name="id" value="<?php echo $herramienta['id'] ?>">

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn cyan waves-effect waves-light right">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>