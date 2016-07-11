<div class="col s12">
    <div class="card-panel">
        <div id="right-search" class="row">
            <form class="col s6">
                <div class="input-field">
                    <i class="mdi-action-search prefix"></i>
                    <input type="text" class="validate" id="buscar" name='busquedaHer' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("Herramientas", "herramientas", "buscador", array('noVista' => "noVista")) ?>" />
                    <label for="icon_prefix" class="active"></label>
                </div>
            </form>
        </div>
    </div>
    <div id="tabla-result-consulta">
        <table>

        </table>
    </div>
</div>