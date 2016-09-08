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
        <div class="row">
            <form class="col s12" action="<?php echo crearUrl("equipos", "tipoEquipo", "postCrear") ?>" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="tequi_descripcion" name="tequi_descripcion" class="validate" required>
                        <label for="tequi_descripcion" class="active" >(*)Descripción del Tipo de Equipo:</label>
                    </div>
                </div>
                <div class="col s5">
                    <div id="card-alert" class="card teal">
                        <div class="card-content white-text">
                            <span class="card-title white-text darken-1">Señor <code><?php echo $_SESSION['login']['rol_nombre'] ?></code></span>
                            <p>En esta sección usted podrá buscar los campos personalizados para este tipo de equipo.</p>
                            <p> <code>IMPORTANTE</code> debes seleccionar al menos un campo personalizado.</p>

                            <div class="card-panel black-text">
                                <div class="input-field">
                                    <input type="text" class="active" id="agregarCampoPer_Tipo_equipo" name='agregarCampoPer_Tipo_equipo' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("Equipos", "tipoEquipo", "buscarAjaxCampoPersonalizado", array('noVista' => "noVista")) ?>" />
                                    <label for="agregarCampoPer_Tipo_equipo" class="active">Digite el nombre y/o codigo del Campo personalizado</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s7">
                    <div id='tablaCampoPersonalizado'>

                    </div>
                </div>
                <?php if (isset($_REQUEST['pagina'])) { ?>
                    <input type="hidden" id="pagina" name="pagina" value="<?php echo $_REQUEST['pagina'] ?>">
                <?php } else { ?>
                    <input type="hidden" id="pagina" name="pagina" value="1">
                <?php } ?>

                <?php //$paginado->render();  ?>
                <div class="row">
                    <div class="input-field col s12">
                        <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right">Crear
                            <i class="mdi-content-add right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div><!--Cierre del ROW de tipo de equipo-->
    </div><!--Cierre del card panel-->