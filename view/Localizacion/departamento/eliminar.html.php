


<form class="form-horizontal" role="form" action="<?php echo crearUrl("localizacion", "departamento", "postEliminar") ?>" method="POST">
    <h4>Esta seguro que quiere eliminar </h4>
    
    <div class="col s12">
        <h5>Codigo del departamento </h5><h4><?php echo $departamento['dept_id']; ?><h4>
               <h5>nombre  del departamento  </h5><h4><?php echo $departamento['dept_nombre']; ?><h4>
    </div>
    <!-- Campo para almacenar el id del equipo -->
    <input type="hidden" name="id" value="<?php echo $departamento['dept_id']; ?>">

    <div class="col-lg-offset-2 col-lg-10">
        <input type="submit" class="btn btn-danger" value="Eliminar">
    </div>


</form>



