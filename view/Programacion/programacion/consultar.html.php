<div class="card-panel">
        <h4 class="header">Consultar mantenimientos</h4>

        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Programacion</a></li>
            <li><a href="#">Consultar mantenimientos</a></li>
            <li class="active">Consulta de mantenimientos.</li>
        </ol>

    <div class="col-lg-6">
         <div id="card-alert" class="card teal">
        <div class="card-content white-text">
            <p><i class="mdi-action-info-outline"></i> A continuacion podra buscar las programaciones de mantenimiento por: nombre del equipo.</p>
            
        </div>
        
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
        
        <?php $error=getErrores(); ?>
        <?php if (!$error=="") { ?>
           <div id="card-alert" class="card red">
               <div class="card-content white-text">
                   <p><i class="mdi-alert-error"></i> <?php echo $error; ?> </p>
               </div>

               <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
       <?php } ?>
        
    <div class=" input-field col s11">
           
        <i class="mdi-action-search prefix small"></i>
       <input type="text" id="pro" name='program' class="form-control" data-url="<?php  echo crearUrl("Programacion", "programacion", "consultarAjax", array('noVista'=>"noVista"))?>" >
        <label  for="pro">BUSCAR EQUIPO CON MANTENIMIENTOS</label>  
    </div>
        
    <?php if(isset($_REQUEST['pagina'])){ ?>
        <input type="hidden" id="pagina" name="pagina" value="<?php echo $_REQUEST['pagina']?>">
    <?php } else{ ?>
        <input type="hidden" id="pagina" name="pagina" value="1">
    <?php } ?>

   
</div>
</div>

<div class="card-panel">
  <div id="tabla"></div>
</div>