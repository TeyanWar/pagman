<div class="card-panel">
    <div class="container">
        <h5 class="header2">LISTA DE TIPO DE COMPONENTES</h5>

        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Equipos</a></li>
            <li><a href="#">Tipo de Componentes</a></li>
            <li class="active">Listar Tipo de Componentes</li>
        </ol>
        <!--Fin rastro de miga-->

        <!--Inicio mensaje de campos obligatorios-->
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : A continuaci&oacute;n podr&aacute; buscar, eliminar o editar un tipo de componente.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        
        <!--Fin mensaje de campos obligatorios-->
        <form class="col s12">
            <div class="input-field">
                <i class="mdi-action-search prefix"></i>
                <input type="text" class="active" id="buscartcomp" name='buscartcomp' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("Equipos", "tipoComponentes", "buscador", array('noVista' => "noVista")) ?>" />
                <label for="buscartcomp" class="active">Digite el nombre o acr&oacute;nimo de un Tipo de Componente</label>
            </div>
        </form>

        <div id="buscatipocomponente">
            
        </div>
        
        <div id="editarTcomp" class="modal">

            <div class="modal-content"></div>
        </div>
        
        

        <?php if (isset($_REQUEST['pagina'])) { ?>
            <input type="hidden" id="pagina" name="pagina" value="<?php echo $_REQUEST['pagina'] ?>">
        <?php } else { ?>
            <input type="hidden" id="pagina" name="pagina" value="1">
        <?php } ?>

<?php //$paginado->render(); ?>
    </div>
</div>