<div class="card-panel">
    <h4 class="header2">Buscar Equipos</h4>
    <ol class="breadcrumbs">
        <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
        <li><a href="<?php echo crearUrl("equipos", "equipos", "Crear") ?>">Crear Equipo</a></li>
        <li class="active">Listar/Consultar</li>
    </ol>
    <div id="card-alert" class="card teal">
        <div class="card-content white-text">
            <p><i class="mdi-action-info-outline"></i> A continuacion podra buscar los EQUIPOS por: Nombre del Equipo y el Numero de Placa</p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div id="chart-dashboard">
        <div class="row">
            <div class="col s12 m12 g12">

                <div class="card-content">
                    <div id="right-search" class="row">

                        <div class="input-field">
                            <i class="mdi-action-search prefix"></i>
                            <input type="text" id="busquedaAjax" name='busquedaEquipos' class="form-control" data-url="<?php echo crearUrl("equipos", "equipos", "buscarAjax", array('noVista' => "noVista")) ?>" >
                            <label for="icon_prefix">Buscar</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<div>
    <table id="tabla" class="table table-striped ">

    </table>
</div>