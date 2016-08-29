

<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Cuidado</strong> Estas a punto de eliminar el siguiente registro.<br />
    <small>Si estas seguro presiona el boton eliminar</small>
</div>

<form class="form-horizontal" role="form" action="<?php echo crearUrl("equipos", "equipos", "postEliminar") ?>" method="POST">

    
    <div class="col s6">
        <h4><?php echo $equipos['equi_id']; ?><h4>
    </div>
    <!-- Campo para almacenar el id del equipo -->
    <input type="hidden" name="id" value="<?php echo $equipos['equi_noplaca']; ?>">

    <div class="col-lg-offset-2 col-lg-10">
        <input type="submit" class="btn btn-danger" value="Eliminar">
    </div>


</form>
