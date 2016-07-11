<div class="card-panel">
    <div id="chart-dashboard">
        <h4 class="header">Crear ciudad </h4>


        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("localizacion", "ciudad", "crear") ?>">Crear ciudad</a></li>
            <li class="active">Listar ciudad </li>
        </ol>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i>  A continuacion podras buscar la ciudad por: No.ciudad y/o nombre de la ciudad.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>


        <div class="col s12 m8 l8">

            <div class="card-content">
                <div id="right-search" class="row">

                    <div class="input-field">
                        <i class="mdi-action-search prefix"></i>
                        <input type="text" id="busquedaAjax5" name='busquedaciudad' class="form-control" data-url="<?php echo crearUrl("localizacion", "ciudad", "buscarAjax", array('noVista' => "noVista")) ?>" >
                        <label for="icon_prefix">Buscar ciudad </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="card-panel">
    <table id="tabla5" class="table table-striped ">

    </table>
</div>

