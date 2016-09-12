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
            <form class="form-horizontal" role="form" action="<?php echo crearUrl("Equipos", "campoPersonalizado", "postEliminar") ?>" method="post">

                <dl class="dl-horizontal">
                    <dt>Código del Campo Personalizado</dt>
                    <dd><?php echo $camposPer['cp_id'] ?></dd>
                    <dt>Nombre del Campo Personalizado</dt>
                    <dd><?php echo $camposPer['cp_nombre'] ?></dd>
                </dl>

                <!-- Campo para almacenar el id del equipo -->
                <input type="hidden" name="id" value="<?php echo $camposPer['cp_id'] ?>">
                
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