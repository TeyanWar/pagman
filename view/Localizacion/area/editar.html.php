<center>
    <?php include 'templates/adminMaterialize/estandarEditarSena.html.php'; ?>    
</center>
<br>
<!--Inicio contenedor mensajes de error-->
<div class="card red">
    <div id="cont_errors_ajax" class="card-content white-text">
    </div>
</div>
<!--Fin contenedor mensajes de error-->
<div class="row">
    <form class="col s12"  action="<?php echo crearUrl("localizacion", "area", "postEditar", array('noVista')) ?>" method="post">
        <div class="input-field col s6">
            <input  readonly=""type="text" id="ciud_id" class="validate" name="area_id" value="<?php echo $area['area_id']; ?>">
            <label  style="color:#448aff;" for="ciud_id" class="active" >Codigo Area:</label>

        </div>
        <div class="input-field col s6">
            <input  type="text" id="ciud_nombre" class="validate" name="area_nombre" value="<?php echo $area['area_descripcion']; ?>">
            <label  style="color:#448aff;" for="ciud_nombre" class="active" >Nombre Area:</label>

        </div>
        
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <br>
            <center> <button name="action" type="submit" class="btn cyan waves-effect waves-light right teal btn_submit_modal">Editar
                    <i class="mdi-content-send right teal"></i>
                </button>
        </div>

    </form>
</div>
<script>
    $('select').material_select();

</script>


