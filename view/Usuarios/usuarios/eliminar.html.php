
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Cuidado</strong> Estas a punto de eliminar el siguiente registro.<br />
  <small>Si estas seguro presiona el boton eliminar</small>
</div>


<form class="form-horizontal" role="form" action="<?php echo crearUrl("actores", "actores", "postEliminar") ?>" method="post">
    
    <dl class="dl-horizontal">
        <dt>Codigo Actor</dt>
        <dd><?php echo $actores['cod_act'] ?></dd>
        <dt>Nombre Actor</dt>
        <dd><?php echo $actores['nom_act'] ?></dd>
    </dl>

    <!-- Campo para almacenar el id del equipo -->
    <input type="hidden" name="id" value="<?php echo $actores['cod_act'] ?>">
    
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
    </div>
    
</form>