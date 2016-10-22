<div class="row">
    <form class="col s12"  action="<?php echo crearUrl("localizacion", "area", "postEditar") ?>" method="post">

        <center> <h5> Editar ciudad </h5></center>
        <br>
        <br>

        <div class="input-field col s6">
            <input  readonly=""type="text" id="ciud_id" class="validate" name="area_id" value="<?php echo $area['area_id']; ?>">
            <label  style="color:#448aff;" for="ciud_id" class="active" >Codigo Area:</label>

        </div>
        <div class="input-field col s6">
            <input  type="text" id="ciud_nombre" class="validate" name="area_descripcion" value="<?php echo $area['area_descripcion']; ?>">
            <label  style="color:#448aff;" for="ciud_nombre" class="active" >Nombre Area:</label>

        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <center> <button name="action" type="submit" class="btn cyan waves-effect waves-light right teal">Editar
                <i class="mdi-content-send right teal"></i>
                </button>
        </div>

    </form>
</div>
<script>
    $('select').material_select();

</script>


