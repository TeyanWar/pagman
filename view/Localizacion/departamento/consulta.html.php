<div class="card-panel">
    <div id="chart-dashboard">
        <div id="chart-dashboard">
            <h4 class="header">listar departamento </h4>
            <div class="row">

                <ol class="breadcrumbs">
                    <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                    <li><a href="<?php echo crearUrl("localizacion", "departamento", "crear") ?>">Crear departamento</a></li>
                    <li class="active">Listar departamento </li>
                </ol>
                <div id="card-alert" class="card teal">
                    <div class="card-content white-text">
                        <p><i class="mdi-action-info-outline"></i>  A continuacion podras buscar los departamentos por: No.departamento y/o nombre del departamento .</p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

            </div>
            <div class="col s12 m8 l8">

                <div class="card-content">
                    <div id="right-search" class="row">

                        <div class="input-field">
                            <i class="mdi-action-search prefix"></i>
                            <input type="text" id="busquedaAjax4" name='busquedadepartamento' class="form-control" data-url="<?php echo crearUrl("localizacion", "departamento", "buscarAjax", array('noVista' => "noVista")) ?>" >
                            <label for="icon_prefix">Buscar departamento</label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<div class="card-panel">
    <table id="tabla12" class="table table-striped ">

    </table>
</div>