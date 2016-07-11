<div class="card-panel">
<div class="row">
    
    
    <div class="input-field col2"></div>
  
    <h5>Nuevo Centro De Formacion </h5>
      <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("localizacion","centro","consultar")?>">Consultar centro</a></li>
            <li><a href="<?php echo crearUrl("localizacion","centro","listar")?>">Listar centro</a></li>
            <li class="active">Crear centro</li>
        </ol>
    <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
 <form class="col s12" action="<?php echo crearUrl("localizacion", "centro", "Postcrear") ?>" method="POST" enctype='multipart/form-data'>
        <div class="input-field col s4">
            <input type="text" id="cod_centro" name="cen_cod"class=" validate">
            <label for="cod_centro" class="active"> (*)Codigo de Centro De Formacion</label>
            
        </div>
      <div class="row">
     <div class="input-field col s4">
            <input type="text" id="cod_centro" name="cen_dir"class=" validate">
            <label for="cod_centro" class="active"> (*)Direccion del centro</label>
            
        </div>
        <div class="input-field col s4">
            <input type="text" id="Nom_centro" name="cen_nom" class=" validate">
            <label for="Nom_centro" class="active"> (*)Nombre de Centro De Formacion</label>
        </div>
            <div class="input-field col s4">
            <input type="text" id="cod_centro" name="cen_telefono"class=" validate">
            <label for="cod_centro" class="active"> (*)Telefono del centro</label>
            
        </div>
          
      
     
            
             <div class="input-field col s4">
                 <select name="reg_id" class="css-input-p">
                                    <option value="0">Regional</option>
                                    <?php
                                        foreach($regionales as $regional){
                                        echo "<option value=".$regional['reg_id'] . ">" . $regional['reg_nombre'] . "</option>";
                                        }
                                    ?>
                                    </select>
                 <br>
                  <label style="color:" for="regional" class="active">(*)Seleccione de la regional   </label>
             </div>
          
        <div class="input-field col s4">
                 <select name="dept_id" class="css-input-p">
                                    <option value="0">Departamento</option>
                                    <?php
                                        foreach($departamentos as $departamento){
                                      echo "<option value=".$departamento['dept_id'] . ">" . $departamento['dept_nombre'] . "</option>";
                                        }
                                    ?>
                                    </select>
            <br>
                  <label style="color:" for="regional" class="active">(*)Seleccione el departamento  </label>
             
               
      </div>
     
     
             
      <div class="input-field col s6">
                 <select name="ciud_id" class="css-input-p">
                                    <option value="0">Ciudad</option>
                                    <?php
                                        foreach($ciudades as $ciudad){
                                      echo "<option value=".$ciudad['ciud_id'] . ">" . $ciudad['ciud_nom'] . "</option>";
                                        }
                                    ?>
                                    </select>
      
          <br>
                  <label style="color:" for="regional" class="active">(*)Seleccione Ciudad  </label>
             </div>
      </div>
</div>
     
            
        </div>
     <div class="row">
                    <div class="input-field col s12 ">
                        <button name="action" type="submit" class="btn cyan waves-effect waves-light right">Crear
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>

    </div>

    
      
                        
      
        </div>
    </form>

    
</div>
</div>

