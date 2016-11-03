
<!-- BRYAN DAVID RAMOS MUÑOZ TADSI03-->

<div id="bordered-table">
    <div class="card-panel"> 
        <h4 class="header2">Listado de ordenes de trabajo</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">costos</a></li>
            <li><a href="#">costos</a></li>
            <li class="active">listado de ordenes de trabajo</li>
        </ol>
        <div class="row" >
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i> IMPORTANTE : A continuaci&oacute;n podr&aacute; buscar una Orden de Trabaj&oacute; por: <b> C&oacute;digo Ot.</b> </p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>          

            <div class="input-field col s12 m12 "> 
                <i class="mdi-action-search prefix"></i>
                <input type="text" id="buscaOt" name='OT' class="form-control" data-url="<?php echo crearUrl("Costos", "costos", "buscadorAjax", array('noVista' => "noVista")) ?>" >
                <label for="icon_prefix" class="">Buscar</label>
            </div>
        </div>
        <br>
        
<?php if (isset($_REQUEST['pagina'])) { ?>
    <input type="hidden" id="pagina" name="pagina" value="<?php echo $_REQUEST['pagina'] ?>">
<?php } else { ?>
    <input type="hidden" id="pagina" name="pagina" value="1">
<?php } ?>



    </div>
    
</div>

<!--class="table table-striped "-->
    <div class="card-panel"> 
        <table id="tablaOt" class="table table-striped " ></table>
    </div>

