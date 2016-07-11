<div id="bordered-table">
    <div class="card-panel"> 
        <h4 class="header2">Listado de Insumos</h4>
         <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Inventario</a></li>
            <li><a href="#">Insumos</a></li>
            <li class="active">listado de insumo</li>
        </ol>
        <div class="row" >
            <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> Acontinuacion podra buscar insumos por: <b> Referencia o nombre.</b> </p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
            <div class="input-field col s12 m12 "> 
                <i class="mdi-action-search prefix"></i>
                <input type="text" id="buscainsumo" name='insumo' class="form-control" data-url="<?php echo crearUrl("Insumos", "insumos", "consultarAjax", array('noVista' => "noVista")) ?>" >
                <label for="icon_prefix" class="">Buscar</label>
            </div>
        </div>
        <br>
        

    </div>
    <!--class="table table-striped "-->
        <div class="card-panel"> 
        <table id="tablainsumo" class="table table-striped " ></table>
        </div>
</div>

<br>