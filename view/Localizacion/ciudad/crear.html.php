<div class="col s12 m12 l6">
  <div class="card-panel">
        <h4 class="header">Crear ciudad </h4>
        
            
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php  echo crearUrl("localizacion", "ciudad", "consulta")?>">Listar ciudad</a></li>
           
            <li class="active">Crear ciudad </li>
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
      
            
        <form id="formciudad" class="col s12" action="<?php echo crearUrl("localizacion", "ciudad", "postCrear") ?>" method="POST" novalidate>

            <div class="row">
                <div class="input-field col s6">

                    <select class="error browser-default select2" name="dept_id" data-error=".errorTxt1">
                        <option value="">(Vacio)</option>
                        <?php
                        foreach ($departamentos as $departamento) {
                            echo "<option value=" . $departamento['dept_id'] . ">" . $departamento['dept_nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="errorTxt1"></div>
                    <label   for=" dept_id" class="active">(*)Seleccione El Departamento</label>
                </div>


                <div class="input-field col s6">
                    <input placeholder="Registre el nombre de la ciudad " id="ciud_nombre" name="ciud_nombre" type="text" class="validate" data-error=".errorTxt2">
                    <label   for="ciud_nombre" class="active">(*)Nombre De La ciudad </label>
                    <div class="errorTxt2"></div>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s12">
                    <button name="action" type="submit" class="btn cyan waves-effect waves-light right teal ">Crear
                        <i class="mdi-content-send right teal"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>