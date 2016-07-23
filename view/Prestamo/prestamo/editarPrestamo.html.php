<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2"> Editar Solicitud de Prestamo </h4>
                <div class="row">
            <form class="form-horizontal" role="form" action="<?php echo crearUrl("herramientas", "herramientas", "postEditar") ?>" method="post">

                <div class="row">
                    <div class="input-field col s6">
                        <label for="pher_fecha"> Fecha de ingreso herramienta </label>
                        <input name="pher_fecha" type="date" id="pher_fecha" class="form-control datepicker" value="<?php echo $prestamo['pher_fecha'] ?>">
                    </div>
                    <div class="input-field col s6">
                        <label for="her_id" class="active">N&uacute;mero de placa</label>
                        <input type="text" class="form-control" id="her_id" name="her_id" readonly="" value="<?php echo $prestamo['her_id'] ?>">
                    </div>
                    <div class="input-field col s6">
                        <label for="alma_id" class="active">Nombre del Almacenista</label>
                        <input type="text" class="form-control" id="alma_id" name="alma_id"value="<?php echo $prestamo['alma_id'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <label for="her_descripcion" class="active">Descripci&oacute;n de la Herramienta</label>
                        <input type="text" id="pher_observaciones" class="form-control" name="pher_observaciones" value="<?php echo $prestamo['pher_observaciones'] ?>">
                    </div>
                </div>
                <!-- Campo para almacenar el id de la herramienta -->
                <input type="hidden" name="id" value="<?php echo $prestamo['pher_id'] ?>">

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn cyan waves-effect waves-light right">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

