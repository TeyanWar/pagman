<div class="card-panel">
    <h4 class="header">LISTA DE ORDENES DE TRABAJO</h4>
    <div id="card-alert" class="card teal">
        <div class="card-content white-text">
            <p><i class="mdi-action-info-outline"></i> A continuaci&oacute;n podr&aacute; buscar las ordenes de trabajo por: 
                <strong><code>No. Ot, nombre del equipo, encargado y/o estado de la OT.</code></strong></p>
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <ol class="breadcrumbs">
        <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
        <li><a href="#">Solicitudes/Ordenes</a></li>
        <li><a href="#">Ordenes de trabajo</a></li>
        <li class="active">Lista de ordenes de trabajo</li>
    </ol>
    <div class="input-field col s8">
        <i class="mdi-action-search prefix"></i>
        <input id="buscador" type="text" class="validate" data-url="<?php echo crearUrl("Ot", "ot", "buscar", array('noVista' => 'noVista')) ?>">
        <label for="icon_prefix" class="">Buscar ordenes de trabajo</label>
    </div>

</div>
<div id="listar">
   
</div>