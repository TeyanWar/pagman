
<div class="row">
    <form class="col s12">
        <h5> Ver Detalle </h5>
        <div class="row">

            <div class="input-field col s6">
                <input readonly=""  type="text" id="cen_codigo" class="validate" value="<?php echo $centro['cen_id'] ?>">
                <label for="reg_id" class="active">Codigo de  la regional:</label>
            </div>
            <div class="input-field col s6">
                <input readonly=""  type="text" id="cen_nombre" class="validate"  value="<?php echo $centro['cen_nombre'] ?>">
                <label for="cen_nombre" class="active" >Nombre del centro :</label>

            </div>
            <div class="input-field col s6">
                <input readonly=""  type="text" id="cen_dir" class="validate"  value="<?php echo $centro['cen_dir'] ?>">
                <label for="cen_dir" class="active" >Direccion del centro :</label>

            </div>
            <div class="input-field col s6">
                <input readonly=""  type="text" id="cen_telefono" class="validate"  value="<?php echo $centro['cen_telefono'] ?>">
                <label for="cen_telefono" class="active" >Telefono del centro :</label>
                </div>
                
             
                
                <div class="input-field col s6">
                    <input readonly=""  type="text" id="reg_nombre" class="validate"  value="<?php echo $centro['reg_nombre'] ?>">
                    <label for="reg_nombre" class="active" >Nombre de la regional:</label>

                </div>
                
                     <div class="input-field col s6">
                    <input readonly=""  type="text" id="dept_nombre" class="validate"  value="<?php echo $centro['dept_nombre'] ?>">
                    <label for="dept_nombre" class="active" >Nombre del departamento:</label>

                </div>
                
                     <div class="input-field col s6">
                    <input readonly=""  type="text" id="ciud_nom" class="validate"  value="<?php echo $centro['ciud_nom'] ?>">
                    <label for="ciud_nom" class="active" >Nombre de la ciudad:</label>

                </div>

            
            <div class="input-field col s12">
                 <select name="reg_id" class="css-input-p">
                                    <option value="0">Regional</option>
                                    <?php
                                        foreach($regionales as $regional){
                                        echo "<option value=".$regional['reg_id'] . ">" . $regional['reg_nombre'] . "</option>";
                                        }
                                    ?>
                                    </select>
             </div>
        <div class="input-field col s12">
                 <select name="dept_id" class="css-input-p">
                                    <option value="0">Departamento</option>
                                    <?php
                                        foreach($departamentos as $departamento){
                                      echo "<option value=".$departamento['dept_id'] . ">" . $departamento['dept_nombre'] . "</option>";
                                        }
                                    ?>
                                    </select>
             </div>
      <div class="input-field col s12">
                 <select name="ciud_id" class="css-input-p">
                                    <option value="0">Ciudad</option>
                                    <?php
                                        foreach($ciudades as $ciudad){
                                      echo "<option value=".$ciudad['ciud_id'] . ">" . $ciudad['ciud_nom'] . "</option>";
                                        }
                                    ?>
                                    </select>
             </div>
       

        
        </div>
