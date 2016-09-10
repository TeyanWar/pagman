<div class="col s12 m12 l6">
    <!--Inicio del card panel-->
    <div class="card-panel">
        <h5>CREAR TIPO DE EQUIPO</h5>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("equipos", "tipoEquipo", "listar") ?>">Listar/Consultar</a></li>
            <li class="active">Crear Tipo de equipo Equipo</li>
        </ol>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php
        $errores = getErrores();
        if (!$errores == "") {
            ?>
            <div id="card-alert" class="card red">
                <div class="card-content white-text">
                    <p><i class="mdi-alert-error"></i> 
                    <p><?php echo $errores ?></p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

        <?php } ?>
        <div class="row">
            <form class="col s12" action="<?php echo crearUrl("equipos", "tipoEquipo", "ajaxGuardarCampoPersonalizado") ?>" method="POST" id="formTipoEquipo">
                <div class="row col s6">
                    <div class="input-field">
                        <input type="text" id="id_tipo_Equipo" name="id_tipo_Equipo" class="validate" data-error=".errorTxt1">
                        <label for="tequi_descripcion" class="active" >(*)Codigo Tipo de Equipo:</label>
                    </div>
                    <div class="errorTxt1"></div>
                </div>
                <div class="row col s6">
                    <div class="input-field">
                        <input type="text" id="tequi_descripcion" name="tequi_descripcion" class="validate" required>
                        <label for="tequi_descripcion" class="active" >(*)Descripción del Tipo de Equipo:</label>
                    </div>
                </div>
                <div class="col s5">
                    <div id="card-alert" class="card teal">
                        <div class="card-content white-text">
                            <span class="card-title white-text darken-1">Señor <code><?php echo $_SESSION['login']['rol_nombre'] ?></code></span>
                            <p>En esta sección podrá ver los campos personalizados que usted a agregado a este tipo de equipo.</p><br>
                            <p> <code>IMPORTANTE</code> debes seleccionar al menos un campo personalizado.</p>

                            <div class="card-panel black-text">
                                <div class="input-field">
                                    <div id="contenedor-campos" display="none">
                                        <table class="striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th data-field="cod_campo">C&oacute;digo campo</th>
                                                    <th data-field="nom_campo">Nombre equipo</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="input-field col s6">
                    <select required name="idCampoSelec" id="idCampoSelec" data-error=".errorTxt2" data-url="<?php echo crearUrl("Equipos", "tipoEquipo", "ajaxAgregarCampoPersonalizado", array('noVista' => "noVista")) ?>" class="select2">
                        <option disabled selected>Seleccione un Campo...</option>
                        <?php foreach ($campoPer as $personalizado) { ?>
                            <option value="<?php echo $personalizado['cp_id'] ?>"><?php echo $personalizado['cp_nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="errorTxt2"></div>
                    <label class="active">&nbsp;(*) Seleccione un Campo personalizado</label>

                    <!--Inicion div que contiene los equipos que se van agregando-->
                    <div id="campos-agregados">

                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right">Crear
                            <i class="mdi-content-add right"></i>
                        </button>
                    </div>
                </div>
                <input type="hidden" id="consecutivo" value="0" />
            </form>
        </div><!--Cierre del ROW de tipo de equipo-->
    </div><!--Cierre del card panel-->
    <style>
        select:required:invalid {
            color: gray;
        }
        option[value=""][disabled] {
            display: none;
        }
        option {
            color: black;
        }
    </style>