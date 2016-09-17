<div class="card-panel">
    <div class="container">
        <h5 class="header2">LISTAR EQUIPOS</h5>

        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('index.php') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("equipos","equipos","crear") ?>">Crear Nuevo Equipo</a></li>
            <li class="active">Listar Equipos</li>
        </ol>

        <!--Inicio mensaje de campos obligatorios-->
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : A continuaci&oacute;n podr&aacute; buscar un Equipo por medio de su <code>codigo</code> o <code>Nombre</code>.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php
        $errores = getErrores();
        if (!$errores == "") {
            ?>
            <div id="card-alert" class="card red">
                <div class="card-content white-text">
                    <p><i class="mdi-alert-error"></i> 
                        <?php echo $errores ?>
                    </p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <?php } ?>
        <!--Fin mensaje de campos obligatorios-->
        <form class="col s12">
            <div class="input-field">
                <i class="mdi-action-search prefix"></i>
                <input type="text" class="active" id="buscarEquipo" name='buscarEquipo' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("equipos", "equipos", "buscarAjax", array('noVista' => "noVista")) ?>" />
                <label for="buscarEquipo" class="active">Digite el nombre y/o codigo del Equipo a Buscar</label>
            </div>
        </form>

        <div id="divEquipos">

        </div>
<!--
        <div id="editarDepto" class="modal">
            <div class="modal-content"></div>
        </div>

        <div id="detalleDepto" class="modal">
            <div class="modal-content"></div>
        </div>-->
        <?php if (isset($_REQUEST['pagina'])) { ?>
            <input type="hidden" id="pagina" name="pagina" value="<?php echo $_REQUEST['pagina'] ?>">
        <?php } else { ?>
            <input type="hidden" id="pagina" name="pagina" value="1">
        <?php } ?>

        <?php //$paginado->render();  ?>
    </div>
</div>