<!--Inicio contenedor mensajes de error-->
        <div class="card red">
            <div id="cont_errors_ajax" class="card-content white-text">
            </div>
        </div>
        <!--Fin contenedor mensajes de error-->
<div class="row">
    <form class="col s12"  action="<?php echo crearUrl("localizacion", "ciudad", "postEditar",array('noVista')) ?>" method="post">

        <center> <h5> Editar ciudad </h5></center>
        <br>
        <br>

        <div class="input-field col s6">
            <input  readonly=""type="text" id="ciud_id" class="validate" name="ciud_id" value="<?php echo $ciudades['ciud_id']; ?>">
            <label  style="color:#448aff;" for="ciud_id" class="active" >Codigo Ciudad:</label>

        </div>
        <div class="input-field col s6">
            <input  type="text" id="ciud_nombre" class="validate" name="ciud_nombre" value="<?php echo $ciudades['ciud_nombre']; ?>">
            <label  style="color:#448aff;" for="ciud_nombre" class="active" >Nombre Ciudad:</label>

        </div>
        <div class="input-field col s12">
             <select class="select2"  name="dept_id">
                <?php 
                      foreach($departamentos as $departamento){
                          if($departamento['dept_id']== $ciudades['dept_id']){
                              echo "<option value='".$departamento["dept_id"]."' selected>". $departamento["dept_nombre"] . "</option>";
                          }else{
                              echo "<option value='".$departamento["dept_id"]."'>". $departamento["dept_nombre"] . "</option>";
                          }
                      }
                  ?>
            </select>

        </div>
        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <center> <button name="action" type="submit" class="btn cyan waves-effect waves-light right teal btn_submit_modal">Editar
                <i class="mdi-content-send right teal"></i>
                </button>
        </div>

    </form>
</div>
<script>
    $('select').material_select();

</script>


