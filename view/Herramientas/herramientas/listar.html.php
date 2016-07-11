<div class="row">
    <div class="card-panel col s12">
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de
                    control</a></li>
            <li><a href="#">Herramientas</a></li>
            <li><a href="#">herramientaso</a></li>
            <li class="active">Listado de herramientas</li>
        </ol>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> ATENCI&Oacute;N:
                    Este es el listado de Herramientas.</p>
            </div>
            <button type="button" class="close white-text" data- dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div id="right-search" class="row">
            <form class="col s12">
                <div class="input-field">
                    <i class="mdi-action-search prefix"></i>
                    <input type="text" class="validate" id="buscarHer" name='buscarHer' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("Herramientas", "herramientas", "buscador", array('noVista' => "noVista")) ?>" />
                    <label for="icon_prefix" class="active">Buscador de herramientas</label>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="buscarHerramienta"></div>