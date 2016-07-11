<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2">Registrar herramienta</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de
                    control</a></li>
            <li><a href="#">Herramientas</a></li>
            <li><a href="#">herramientas</a></li>
            <li class="active">registrar herramienta</li>
        </ol>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> FORMULARIO REGISTRO HERRAMIENTAS:
                    aqui vamos a registrar todas las herramientas que son prestadas por el CDTI </p>
            </div>
            <button type="button" class="close white-text" data- dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="row">
            <form class="col s12" action="<?php echo crearUrl("herramientas", "herramientas", "postCrear") ?>" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <label class="active"> *Fecha ingreso de herramienta: </label>
                        <input id="her_fecha_ingreso" placeholder="Fecha ingreso herramienta" name="her_fecha_ingreso" type="date" class="datepicker">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id="her_id" name="her_id" placeholder="Digite n&uacute;mero de placa herramienta" length="40">
                        <label for="her_id" class="active">N&uacute;mero placa</label>
                        <span class="help-block">
                            Por favor digite el numero de la placa de la herramienta a registrar, recuerde que el <code>n&uacute;mero de la placa</code> 
                            debe corresponder al siguiente patron: <code>PC_001</code>
                        </span>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="her_nombre" name="her_nombre" placeholder="Digite el nombre de la herramienta" length="40">
                        <label for="her_nombre" class="active">Nombre de herramienta</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea  id="her_descripcion" name="her_descripcion" class="materialize-textarea" length="200"></textarea>
                        <label>Descripci&oacute;n</label>
                    </div>
                </div>
                <div class="file-field input-field col s6">
                    <div class="btn">
                        <span>Imagen</span>
                        <input type="file" name="her_imagen" multiple>
                    </div>  
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Eliga la imagen para la herramienta">
                    </div>
                </div>
                <div class="input-field col s6">
                    <label for="tipo_Herramienta" class="active"> *Seleccione el tipo de herramienta: </label>
                    <select class="select2" multiple="multiple" name="ther_id">
                        <?php
                        foreach ($tipos as $tipo) {

                            echo "<option value=" . $tipor['ther_id'] . ">" . $tipo['ther_descripcion'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="col s12">
                        <button name="action" type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand">Registrar
                            <i class="mdi-content-add left"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
