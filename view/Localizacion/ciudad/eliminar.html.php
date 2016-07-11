
<form class="form-horizontal" role="form" action="<?php echo crearUrl("ciudad", "ciudad", "postEliminar") ?>" method="POST">
    <h4>Esta seguro que quiere eliminar </h4>
    
    <div class="col s12">
        <h5>Codigo de la ciudad </h5><h4><?php echo $ciudad['ciud_id']; ?><h4>
               <h5>nombre  de la ciudad</h5><h4><?php echo $ciudad['ciud_nom']; ?><h4>
    </div>
    <!-- Campo para almacenar el id del equipo -->
    <input type="hidden" name="id" value="<?php echo $ciudad['ciud_id']; ?>">

    <div class="col-lg-offset-2 col-lg-10">
        <input type="submit" class="btn btn-danger" value="Eliminar">
    </div>


</form>



