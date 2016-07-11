
<div class="card-panel">
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Cuidado</strong> Estas a punto de eliminar el siguiente registro.<br />
        <small>Si estas seguro presiona el boton eliminar</small>
    </div>


    <form class="form-horizontal" role="form" action="<?php echo crearUrl("localizacion", "centro", "postEliminar") ?>" method="post">

        <dl class="dl-horizontal">

            <dd><?php echo $centro['cen_nombre'] ?></dd>

        </dl>


        <!-- Campo para almacenar el id del equipo -->
        <input type="hidden" name="id" value="<?php echo $centro['cen_id'] ?>">

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" name="Eliminar" class="btn btn-danger">Eliminar</button>
            </div>
        </div>

    </form>
</div>