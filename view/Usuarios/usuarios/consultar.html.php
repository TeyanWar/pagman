<div class="card-panel">
    <h4 class="header">LISTA DE PERSONAS Y/O USUARIOS</h4>
    
    <ol class="breadcrumbs">
        <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Listar</li>
    </ol>
    
    <div id="card-alert" class="card teal">
        <div class="card-content white-text">
            <p><i class="mdi-action-info-outline"></i> A continuaci&oacute;n podr&aacute; buscar las personas y/o usuarios del sistema por: 
                <strong><code>No.identificacion, nombre, apellido, tipo persona.</code></strong></p>
            
        </div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>

    <div class="input-field col s8">
        <i class="mdi-action-search prefix"></i>   
        <input type="text" id="cate" name='usuario' value="" class="validate" data-url="<?php echo crearUrl("Usuarios", "usuarios", "consultarAjax", array('noVista' => "noVista")) ?>" >

    </div>
    
    <?php if(isset($_REQUEST['pagina'])){ ?>
        <input type="hidden" id="pagina" name="pagina" value="<?php echo $_REQUEST['pagina']?>">
    <?php } else{ ?>
        <input type="hidden" id="pagina" name="pagina" value="1">
    <?php } ?>
        
</div>

<table id="tabla" class="table table-striped "></table>

<script type="text/javascript">
    $(document).ready(function(){
        $("#cate").trigger("keyup");
    });
</script>