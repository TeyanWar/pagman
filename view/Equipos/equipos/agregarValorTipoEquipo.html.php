<form id="formAgregarCantidad" class="col s12" action="<?php echo crearUrl("equipos", "equipos", "agregarValorCamposPersonalizados", array('noVista')) ?>" method="POST" enctype='multipart/form-data' novalidate>
    <div class="col s12">
        <div class="card col s10" style="margin-left: 50px; margin-bottom: 20px;">
            <br><h5>
                <center>
                    <code>AGREGAR VALOR A CAMPOS PERSONALIZADOS <?php echo $nombreEquipo['tequi_descripcion']; ?></code>
                </center>
            </h5><br>
            <input type="hidden" id="idTipoEquipo" name="idTipoEquipo" value="<?php echo $id; ?>">
            <?php 
            foreach ($consultaTipoEquipo as $tipoEquipo) { ?>
                <div class="input-field col s2">
                    <input type="text" name="cantidad[]" class="validate" data-error=".errorTxt20">
                    <label for="cantidad" class="active" ><?php echo $tipoEquipo['cp_nombre']; ?></label>
                    <div class="errorTxt20"></div>
                </div>
            <?php } ?>
            <!--<div class="ajax_paginate">
            <?php //$paginado->render() ?>
        </div>-->
            <br><br>
            <div class="row">
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <button name="action" type="submit" class="btn teal waves-light right ">Crear
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>