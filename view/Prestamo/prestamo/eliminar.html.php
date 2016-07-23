<div class="col s12 m12 l12">
    <div class="card-panel">
        <div id="card-alert" class="card light-blue lighten-5">
            <div class="alert alert-warning alert-dismissable">
                <div class="card-content blue-text">
                    <strong>CUIDADO !!</strong> Estas a punto de eliminar el siguiente registro.<br />
                    <small>Si estas seguro presiona el boton eliminar</small>
                </div>
            </div>
        </div>
        <div class="row">
            <form class="form-horizontal" role="form" action="<?php echo crearUrl("prestamo", "prestamo", "postEliminar") ?>" method="post">

                <dl class="dl-horizontal">
                    <dt>Fecha del prestamo</dt>
                    <dd><?php echo $prestamo['pher_fecha'] ?></dd>
                    <dt>codigo del almacenista</dt>
                    <dd><?php echo $prestamo['alm_id'] ?></dd>
                    <dt>codigo jornada</dt>
                    <dd><?php echo $prestamo['jor_id'] ?></dd>
                    <dt>observaciones</dt>
                    <dd><?php echo $prestamo['pher_observaciones'] ?></dd>
                </dl>

                <!-- Campo para almacenar el id del equipo -->
                <input type="hidden" name="id" value="<?php echo $prestamo['pher_id'] ?>">

                <div class="row">
                    <div class="input-field col s6">
                        <button name="action" type="submit" class="btn cyan waves-effect waves-light">Eliminar
                            <i class="mdi-content-delete"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>