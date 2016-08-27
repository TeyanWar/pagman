

<div class="row">
    <form class="col s12"  action="<?php echo crearUrl("localizacion", "centro", "postEditar") ?>" method="post">

        <h5> Editar Centro de Formacion</h5>
<input  type="hidden" id="cen_id" class="validate" name="cen_id" value="<?php echo $centro['cen_id'] ?>">
        <div class="input-field col s6">
            <input  type="text" id="reg_nombre" class="validate" name="cen_nombre" value="<?php echo $centro['cen_nombre'] ?>">
            <label for="cen_nombre" class="active" >Nombre del centro de formacion:</label>
        </div>
             <div class="input-field col s6">
            <input  type="text" id="cen_dir" class="validate" name="cen_dir" value="<?php echo $centro['cen_dir'] ?>">
            <label for="cen_dir" class="active" >Direccion del centro de formacion:</label>

        </div>
             <div class="input-field col s6">
            <input  type="text" id="reg_nombre" class="validate" name="cen_telefono" value="<?php echo $centro['cen_telefono'] ?>">
            <label for="cen_telefono" class="active" >Telefono del centro de formacion:</label>

        </div>
        
      
        
         <div class="input-field col s6">
         <label for="reg_id" class="active" >Regional:</label>
             <select name="reg_id" class="css-input-p">
                <?php 
                      foreach($regionales as $regional){
                          if($regional['reg_id']== $centro['reg_id']){
                              echo "<option value='".$regional["reg_id"]."' selected>". $regional["reg_nombre"] . "</option>";
                          }else{
                              echo "<option value='".$regional["reg_id"]."'>". $regional["reg_nombre"] . "</option>";
                          }
                      }
                  ?>
             </select>
         </div>

        <div class="row">
              <button name="action" type="submit" class="btn teal waves-effect waves-light right submit_ot animated infinite rubberBand">Editar
                  <i class="mdi-content-add left"> </i>
              </button>
          </div>

    </form>
</div>
<script>
    $('select').material_select();

</script>