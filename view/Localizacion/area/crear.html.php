<div class="col s12 m12 l6">
  <div class="card-panel">
        <h4 class="header">Crear Area </h4>
        
            
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Localizacion</a></li>
           
            <li class="active">Crear Area </li>
        </ol>
          <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

       <!--Inicio contenedor mensajes de error-->
        <div class="card red">
            <div id="cont_errors_ajax" class="card-content white-text">
            </div>
        </div>
        <!--Fin contenedor mensajes de error-->
      
            
        <form id="formarea" class="col s12" action="<?php echo crearUrl("localizacion", "area", "postCrear", array('noVista')) ?>" method="POST" novalidate>

            <div class="row">


                <div class="input-field col s12">
                    <input placeholder="Registre el nombre del area" id="area_nombre" name="area_nombre" type="text" class="validate" data-error=".errorTxt2">
                    <label  for="area_nombre" class="active">(*)Nombre Del Area </label>
                    <div class="errorTxt2"></div>
                </div>

            </div>

            <div class="row">
                <div class="input-field col s12">
                    <button name="action" type="submit" class="btn cyan waves-effect waves-light right teal btn_submit_modal">Crear
                        <i class="mdi-content-send right teal"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>