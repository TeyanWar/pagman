<div class="card-panel">
    <div class="container">
        <h5 class="header2">LISTA DE MEDIDORES</h5>

        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Medidores</a></li>
            <li class="active">Listar medidores</li>
        </ol>
        <!--Fin rastro de miga-->

        <!--Inicio mensaje de campos obligatorios-->
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : A continuaci&oacute;n podr&aacute; buscar o editar un medidor.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php $errores = getErrores();
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
                <input type="text" class="active" id="buscarMed" name='buscarMed' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("Medidores", "medidores", "buscador", array('noVista' => "noVista")) ?>" />
                <label for="buscarMed" class="active">Digite el nombre o acr&oacute;nimo de un medidor</label>
            </div>
        </form>

        <div id="buscarMedidor">

        </div>
        
        <a class="btn-floating teal modal-trigger editarMedidor" 
            href="#editarMedidor" data-url="<?php echo crearUrl('medidores', 'medidores', 'editar', array('noVista', 'id' => 2));?>"> 
            <i class="mdi-content-create small"></i>
        </a>
        
        <div id="editarMedidor" class="modal modal-fixed-footer">

            <div class="modal-content"></div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
            </div>
        </div>
        
        

        <?php if (isset($_REQUEST['pagina'])) { ?>
            <input type="hidden" id="pagina" name="pagina" value="<?php echo $_REQUEST['pagina'] ?>">
        <?php } else { ?>
            <input type="hidden" id="pagina" name="pagina" value="1">
        <?php } ?>

<?php //$paginado->render(); ?>
    </div>
</div>