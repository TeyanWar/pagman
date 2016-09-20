<div class="col s12">
    <div class="card col s10" style="margin-left: 50px; margin-bottom: 20px;">
        <br><h5>
            <center>
                <code>AGREGAR VALOR A CAMPOS PERSONALIZADOS <?php echo $nombreEquipo['tequi_descripcion']; ?></code>
            </center>
        </h5><br>
        <?php foreach ($consultaTipoEquipo as $tipoEquipo) { ?>
            <div class="input-field col s2">
                <input type="text" id="equi_id" name="equi_id" class="validate" data-error=".errorTxt1">
                <label for="equi_noplaca" class="active" ><?php echo $tipoEquipo['cp_nombre']; ?></label>
                <div class="errorTxt1"></div>
            </div>
        <?php } ?>
        <!--<div class="ajax_paginate">
        <?php //$paginado->render() ?>
        </div>-->
        <br><br>
    </div>
</div>