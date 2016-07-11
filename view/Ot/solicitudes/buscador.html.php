<div class="card-panel">
    <h4 class="header">Solicitud de servicio</h4>
                <ol class="breadcrumbs">
                    <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                    <li><a href="#">Solicitudes/Ordenes</a></li>
                    <li><a href="#">Ordenes de trabajo</a></li>
                    <li class="active">Crear orden de trabajo</li>
                </ol>
                <div id="card-alert" class="card teal">
                    <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
    <div class="input-field col s8">
        <i class="mdi-action-search prefix"></i>
        <input id="buscador" type="text" class="validate" data-url="<?php echo crearUrl("Ot", "solicitudes", "buscar", array('noVista' => 'noVista')) ?>">
        <label for="icon_prefix" class="">Buscar ordenes de trabajo</label>
    </div>
         
</div>

<div class="card-panel">
  <div id="listar"></div>
</div>
