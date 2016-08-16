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

        <?php $error=getErrores(); ?>
         <?php if (!$error=="") { ?>
            <div id="card-alert" class="card red">
                <div class="card-content white-text">
                    <p><i class="mdi-alert-error"></i> <?php echo $error; ?> </p>
                </div>

                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php } ?>
    <form id="fromcentro" class="col s12" action="<?php echo crearUrl("localizacion", "centro", "Postcrear") ?>" method="POST" novalidate>
            
          <div class="row">
            <div class="input-field col s6">
                <input type="text" id="cen_nom" name="cen_nom" class=" validate" data-error=".errorTxt1">
                <label for="cen_nom" class="active"> (*)Nombre de Centro De Formacion</label>
                <div class="errorTxt1"></div>
            </div>

            <div class="input-field col s6">
                <input type="text" id="cen_dir" name="cen_dir"class=" validate" data-error=".errorTxt2">
                <label for="cen_dir" class="active"> (*)Direccion del centro</label>
                <div class="errorTxt2"></div>
            </div>
          </div>
             
          <div class="row">
          <div class="input-field col s6">
                <input type="text" id="cen_telefono" name="cen_telefono"class=" validate" data-error=".errorTxt3">
                <label for="cen_telefono" class="active"> (*)Telefono del centro</label>
                <div class="errorTxt3"></div>
            </div>

            <div class="input-field col s6">
                 <select name="reg_id" class="error browser-default select2" data-error=".errorTxt4">
                     <option value="">(Vacio)</option>
                  <?php
                      foreach($regionales as $regional){
                      echo "<option value=".$regional['reg_id'] . ">" . $regional['reg_nombre'] . "</option>";
                      }
                  ?>
                  </select>
                <div class="errorTxt4"></div>
                 <br>
                  <label style="color:" for="reg_id" class="active">(*)Seleccione de la regional</label>
             </div>


          </div>

         <div class="row">
              <button name="action" type="submit" class="btn teal waves-effect waves-light right submit_ot animated infinite rubberBand">Crear
                  <i class="mdi-content-add left"> </i>
              </button>
          </div>
      </form>
  </div>
</div>

