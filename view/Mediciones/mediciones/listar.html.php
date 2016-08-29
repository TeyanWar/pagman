<div class="card-panel">
    <div class="container">
        <h4 class="header2">Listado de mediciones</h4>
        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Mediciones</a></li>
            <li class="active">Listado mediciones</li>
        </ol>
        <!--Fin rastro de miga-->

        <!--Inicio mensaje de campos obligatorios-->
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : S&oacute;lo podr&aacute; modificar los campos: medida actual y fecha </p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php
        $errores = getErrores();
        if (!$errores == "") {
            ?>
            <div id="prueba">
                <div id="card-alert" class="card red">
                    <div class="card-content white-text">
                        <p><i class="mdi-alert-error"></i> 
                        <p><?php echo $errores ?></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        <?php } ?>

        <!--Fin mensaje de campos obligatorios-->
        <div id="right-search" class="row">
            <form class="col s12">
                <div class="input-field">
                    <i class="mdi-action-search prefix"></i>
                    <input type="text" class="validate" id="buscarMed" name='buscarMed' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("Mediciones", "Mediciones", "buscador", array('noVista' => "noVista")) ?>" />
                    <label for="icon_prefix" class="active">Buscador de Mediciones</label>
                </div>
            </form>
        </div>
        
        <div id="listadoMediciones">
            
        </div>