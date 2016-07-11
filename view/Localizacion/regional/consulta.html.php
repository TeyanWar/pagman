<div class="card-panel">
    <div id="chart-dashboard">
        <h4 class="header">listar Regional  </h4>
        <div class="row">

            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                <li><a href="<?php echo crearUrl("localizacion", "regional", "crear") ?>">Crear regional</a></li>
                <li class="active">Listar regional </li>
            </ol>
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i>  A continuacion podras buscar las regionales por: No.regional y/o nombre de regional .</p>
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
                        <input type="text" id="busquedaAjax2" name='busquedaregional' class="form-control" data-url="<?php echo crearUrl("localizacion", "regional", "buscarAjax", array('noVista' => "noVista")) ?>" >
                        <label for="icon_prefix">Buscar regional</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-panel">
    <table id="tabla1" class="table table-striped ">

    </table>
</div>
