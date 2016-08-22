<div class="col s12 m12 l6">
    <!--Inicio del card panel-->
    <div class="card-panel">
        <h4 class="header2">Crear Tipo de Equipo</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("equipos", "tipoEquipo", "Consulta") ?>">Listar/Consultar</a></li>
            <li><a href="<?php echo crearUrl("equipos", "tipoEquipo", "Listar") ?>">Listar</a></li>
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
        <div class="row">
            <form class="col s12" action="<?php echo crearUrl("equipos", "tipoEquipo", "postCrear") ?>" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="tequi_descripcion" name="tequi_descripcion" class="validate" >
                        <label for="tequi_descripcion" class="active" >(*)Tipo de Equipo:</label>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <select class="select2" name="cp_id">
                            <option value="0">(Vacio)</option>
                            <?php
                            foreach ($campos_p as $campo_P) {
                                echo "<option value=" . $campo_P['#'] . ">" . $campo_P['#'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="Persona" class="active">(*) Seleccion el/los campos personalizados del equipo</label>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right">Crear
                            <i class="mdi-content-add right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Fin del card panel-->
</div>