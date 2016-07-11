<div class="col s12 m12 16">
    <div class="card-panel">
        <h4 class="header2">Buscar Tipo de Medidor</h4>
        <div class="card">
            <div class="card-content">
                <div id="right-search" class="row">
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search active"></i>
                        <input type="text" id="busquedaMedidor" name="busquedaMedidor" class="header-search-input z-depth-2" placeholder="Explore Medidores"
                               class="form-control" data-url="<?php echo crearUrl("Mediciones", "medidor", "buscarAjax", array('noVista' => "noVista")) ?>">
                        <label></label>
                    </div>
                    <table id="tabla" class="table table-striped"></table>
                </div>
            </div>
        </div>
    </div>	
</div>