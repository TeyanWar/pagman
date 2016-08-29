<div class="col s12 m12 l6">
    <form class="col s12 F_registrar_her" action="<?php echo crearUrl("Herramientas", "herramientas", "postCrear") ?>" 
          method="POST" enctype="multipart/form-data" novalidate="novalidate">
        <div class="card-panel">
            <h4 class="header2">Registrar herramienta</h4>
            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                <li><a href="#">herramientas</a></li>
                <li class="active">registrar herramienta</li>
            </ol>
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i> <strong> INFORMACION GENERAL </strong><br />
                        Aqui se lleva a cabo el registro de herramientas con los siguientes datos :
                        fecha ingreso, n&uacute;mero de placa, nombre herramienta, descripci&oacute;n, 
                        imagen y tipo de herramienta</p>
                </div>
                <button type="button" class="close white-text" data- dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php
            $miserrores = getErrores();
            if (!$miserrores == "") {
                ?>
                <div id="card-alert" class="card red">
                    <div class="card-content white-text">
                        <p><i class="mdi-action-info-outline"></i>
                            <?php echo $miserrores; ?> 
                        </p>
                    </div>
                </div>
            <?php }
            ?>
            <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <label class="active"> *Fecha ingreso de herramienta: </label>
                        <input id="her_fecha_ingreso" placeholder="dd/mm/aaaa" name="her_fecha_ingreso" type="date" class="datepicker">
                    </div>
                    <div class="input-field col s6">
                        <label for="tipo_Herramienta" class="active"> (*)Seleccione el tipo de herramienta: </label>
                        <select class="error browser-default valid select2 required" aria-required="true" aria-invalid="false" data-error=".errorTxt3" id="ther_id" name="ther_id">
                            <?php
                            foreach ($tipos as $tipo) {

                                echo "<option value=" . $tipo['ther_id'] . ">" . $tipo['ther_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="input-field">
                            <div class="errorTxt3"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="her_id" data-error=".errorTxt1" name="her_id" length="40" class="required">
                        <div class="errorTxt1"></div>
                        <label for="her_id" class=""> (*)N&uacute;mero placa: </label>
                        <span class="help-block">
                            Por favor digite el numero de la placa de la herramienta a registrar, recuerde que el <code>n&uacute;mero de la placa</code> 
                            debe corresponder al siguiente patron: <code>PCHP_001XXXX</code>
                        </span>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="her_nombre" data-error=".errorTxt2" name="her_nombre" length="20" class="required"/>
                        <div class="errorTxt2"></div>
                        <label for="her_nombre" class=""> (*)Nombre de herramienta: </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea  id="her_descripcion" name="her_descripcion" class="materialize-textarea validate" length="200"></textarea>
                        <label for="her_descripcion"> (*)Descripci&oacute;n: </label>
                    </div>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn teal waves-effect waves-light right animated infinite rubberBand">
                        <span>Subir imagen</span>
                        <input type="file" name="her_imagen" id="her_imagen"/>
                    </div>  
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Eliga la imagen">
                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button name="action" type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand">Crear Herramienta
                            <i class="mdi-content-add left"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
