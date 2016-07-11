
<form class="form-horizontal" role="form" action="<?php echo crearUrl("regional", "regional", "postEliminar") ?>" method="POST">
    <h4>Esta seguro que quiere eliminar </h4>
    
    <div class="col s12">
        <h5>Codigo de la regional </h5><h4><?php echo $regional['reg_id']; ?><h4>
               <h5>nombre  de la regional </h5><h4><?php echo $regional['reg_nombre']; ?><h4>
    </div>
    <!-- Campo para almacenar el id del equipo -->
    <input type="hidden" name="id" value="<?php echo $regional['reg_id']; ?>">

    <div class="col-lg-offset-2 col-lg-10">
        <input type="submit" class="btn btn-danger" value="Eliminar">
    </div>


</form>


