

<div class="row">
    <form class="col s12"  action="<?php echo crearUrl("localizacion", "centro", "postEditar") ?>" method="post">

        <h4> Editar Centro de Formacion</h4>

      <div class="input-field col s6">
          <input  readonly=""type="text" id="cen_codigo" class="validate" name="cen_id" value="<?php echo $centro['cen_id'] ?>">
            <label for="cen_codigo" class="active" >Codigo del Centro de Formacion:</label>

        </div>

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
             <label for="reg_id" class="active" >Regional: </label>

                 <select name="reg_id" class="css-input-p">
                                    <?php
                                        foreach($regionales as $regional){
                                        echo "<option value=".$regional['reg_id'] . ">" . $regional['reg_nombre'] . "</option>";
                                        }
                                    ?>
       
                                    </select>
             </div>
        <div class="input-field col s6">
            
             <label for="dept_id" class="active" >Departamento: </label>
                 <select name="dept_id" class="css-input-p">
                                    <?php
                                        foreach($departamentos as $departamento){
                                      echo "<option value=".$departamento['dept_id'] . ">" . $departamento['dept_nombre'] . "</option>";
                                        }
                                    ?>
                                    </select>
             </div>
      <div class="input-field col s6">
          <label for="ciud_id" class="active" >Ciudad: </label>
                 
                 <select name="ciud_id" class="css-input-p">
                                    <?php
                                        foreach($ciudades as $ciudad){
                                      echo "<option value=".$ciudad['ciud_id'] . ">" . $ciudad['ciud_nom'] . "</option>";
                                        }
                                    ?>
                                    </select>
             </div>
        
        
        

        <div class="col s12 m8 offset-m2 l6 offset-l3">
            <button name="action" type="submit" class="btn cyan waves-effect waves-light right">Editar
                <i class="mdi-content-send right"></i>
            </button>
        </div>

    </form>
</div>
<script>
    $('select').material_select();

</script>