<div class="card-panel">
    <div id="chart-dashboard">
        <h4 class="header">Consultar centro</h4>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i>  A continuacion podras buscar centros por: codigo del centro y/o nombre del centro.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php  echo crearUrl("localizacion", "centro", "crear")?>">crear centro</a></li>
            <li><a href="<?php echo crearUrl("localizacion", "centro", "listar")?>">listar centro</a></li>
            <li href="<?php echo crearUrl("localizacion", "centro", "consulta") ?>" class="active">Consultar centro </li>
        </ol>


        <div class="col s12 m8 l8">

            <div class="card-content">
                <div id="right-search" class="row">

                    <div class="input-field">
                        <i class="mdi-action-search prefix"></i>
                        <input type="text" id="busquedaAjax26" name='busquedacentro' class="form-control" data-url="<?php echo crearUrl("localizacion", "centro", "buscarAjax", array('noVista' => "noVista")) ?>" >
                        <label for="icon_prefix">Buscar centro </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="card-panel">
<table id="tabla26" class="table table-striped ">

</table>
</div>

