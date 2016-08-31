<div class="col s12 m12 l12">
    <form class="form-horizontal" id="F_prestamo_herramienta" role="form" action="<?php echo crearUrl("Prestamo", "prestamo", "postCrear") ?>" method="post" novalidate="novalidate">
        <div class="card-panel col s12 m12 l12">
            <h4 class="header2">Solicitud de Prestamo de Herramientas</h4>
            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de
                        control</a></li>
                <li><a href="<?php echo addLib('') ?>"> Prestamo </a></li>
                <li><a class="active" href="<?php echo addLib('') ?>"> Crear prestamo </a></li>
            </ol>
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="small mdi-action-info-outline"></i> La siguiente informaci&oacute;n que se muestra en pantalla, esta relacionada a la Creaci&oacute;n de:  PRESTAMOS DE HERRAMIENTAS </p>
                </div>
                <button type="button" class="close white-text" data-
                        dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <label for="fecha inicio prestamo" class="active"> (*) Fecha inicio prestamo: </label>
                    <input id="pher_fecha" placeholder="Fecha inicio prestamo" data-error=".errorTxt1" name="pher_fecha" type="date" class="datepicker">
                    <div class="errorTxt1"></div>
                </div>
                <!-- <div class="input-field col s6">
                 <label for="fecha de devolución" class="active"> (*) Fecha de la devolucion: </label>
                 <input id="pher_fecha_devolucion" placeholder="Fecha de devolucion" data-error=".errorTxt2" name="pher_fecha_devolucion" type="date" class="datepicker">
                 <div class="errorTxt2"></div>
                  </div>-->
                <div class="input-field col s6">
                    <label for="Almacenista" class="active"> (*) Seleccione el almacenista: </label>
                    <select class="error browser-default select2" data-error=".errorTxt2" name="alma_id" id="alma_id"   >
                        <?php
                        foreach ($almacenista as $trabajador) {

                            echo "<option value=" . $trabajador['alma_id'] . ">" . $trabajador['alma_nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="input-field">
                        <div class="errorTxt2"></div>
                    </div>
                </div>
                <div class="input-field col s6">
                    <label for="Jornada" class="active"> (*) Seleccione la jornada: </label>
                    <select class="error browser-default valid select2 required" aria-required="true" aria-invalid="false" data-error=".errorTxt3" name="jor_id" id="jor_id">
                        <?php
                        foreach ($jornada as $jor) {

                            echo "<option value=" . $jor['jor_id'] . ">" . $jor['jor_descripcion'] . "</option>";
                        }
                        ?>
                    </select>
                    <div class="input-field">
                        <div class="errorTxt3"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="mdi-action-search prefix"></i>
                    <label class="active"> (*) Busqueda de herramientas </label>
                    <input name="buscarHerramienta" type="text" id="buscarHerramienta" data-url="<?php echo crearUrl("Prestamo", "prestamo", "buscarHerramientas", array('noVista' => "noVista")) ?>">
                </div>
            </div>
            <div style="position: absolute;" class="col s9" id="RespuestaHerramienta"></div>
        </div>
</div>
<!-- aqui agrego lo que necesite para el prestamo de herramientas --> 
<div class="card-panel col s12 m12 l12" id="agregarPrestamo">
    <div class="row">
        <h4 class="header2"> Prestamo de herramientas </h4>
        <table class="center col s12 m12 l12" id="tabla">
            <thead>
                <tr>
                    <th>N&uacute;mero de placa</th>
                    <th>Nombre Herramienta</th>
                    <th>Cant. solicitada</th>
                    <th>Cant. entregada</th>
                    <th>Observaciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<div class="card-panel">
    <div class="input-field col s12">
        <textarea  id="pher_observaciones" name="pher_observaciones" data-error=".errorTxt5" class="materialize-textarea validate" length="200"></textarea>
        <label>Observaciones</label>
        <div class="errorTxt5" ></div>
    </div>
    <div class="row">
        <div class="col s12">
            <button name="action" type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand">Crear prestamo
                <i class="mdi-content-add left"></i>
            </button>
        </div>
    </div>
</div>
</form>
</div>
