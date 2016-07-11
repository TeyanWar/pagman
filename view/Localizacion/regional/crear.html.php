<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header">Crear Regional </h4>
       
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php  echo crearUrl("localizacion", "regional", "consulta")?>">Listar regional</a></li>
           
            <li class="active">Crear regional </li>
        </ol>
         <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        



        <form class="col s12" action="<?php echo crearUrl("localizacion", "regional", "postCrear") ?>" method="POST">
            <div class="row">
                <div class="input-field col s6">


                    <input placeholder="Registre el nombre de la regional " id="reg_nombre" name="reg_nombre" type="text" class="validate">
                    <label  for="reg_nombre" class="active">(*)Nombre de la regional </label>


                </div>
                
            </div>
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



