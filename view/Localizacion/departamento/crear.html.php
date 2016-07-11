<div class="col s12 m12 l6">
 <div class="card-panel">
        <h4 class="header">Crear departamento </h4>
       
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php  echo crearUrl("localizacion", "departamento", "consulta")?>">Listar departamento</a></li>
           
            <li class="active">Crear departamento </li>
        </ol>
         <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        
        <form class="col s12" action="<?php echo crearUrl("localizacion", "departamento", "postCrear") ?>" method="POST">

            <div class="row">
                <div class="input-field col s6">

                    <select class="select2" name="reg_id">
                        <?php
                        foreach ($regionales as $regional) {
                            echo "<option value=" . $regional['reg_id'] . ">" . $regional['reg_nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    <label  for="regional" class="active">(*)Seleccion de la regional   </label>
                </div>


                <div class="input-field col s6">
                    
                    
                     <input placeholder="Registre el nombre del departamento " id="dept_nombre" name="dept_nombre" type="text" class="validate">
                    <label  for="dept_nombre" class="active">(*)Nombre del departamento </label>
                    
                 

                </div>

            </div>

            <!-- <div class="row">
                <div class="input-field col s6">

                    <select class="select2" multiple="multiple"id="ciud_id">
            <?php
            /*   foreach ($ciudades as $ciudad) {
              echo "<option value=" . $ciudad['ciud_id'] . ">" . $ciudad['ciud_nom'] . "</option>";
              } */
            ?>
                    </select>
                    <label for=" Ciudad" class="active">Seleccion de  ciudad  </label>
                </div>
            </div>-->



            <div class="row">
                <div class="input-field col s12">
                    <button name="action" type="submit" class="btn cyan waves-effect waves-light right  teal">Crear
                        <i class="mdi-content-send right  teal"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
 
