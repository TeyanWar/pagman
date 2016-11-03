<div class="card-panel"> 
<div class="row">
        <h4 class="header2">Reporte Insumos </h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Costos</a></li>
            <li><a href="#">Reportes</a></li>
            <li class="active">Listado de reportes</li>
        </ol>
        
        <div class="row">
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i>
                        <strong>INFORMACI&Oacute;N GENERAL :</strong><br />
                        Aqu&iacute; se lleva acab&oacute; el reporte del valor total de los Insumos.<br />
           
                    </p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </div> 
</div>
<div class="card-panel">
<div id="bordered-table">
     
    <div class="">     
    <table class="striped">
        <thead>             
            <tr>
                <th>#</th>
                <th>Referencia</th>
                <th>Nombre</th>
                <th>valor C/U</th> 
            </tr>
        </thead>

        <tbody>
            <?php
            $count = 1;
            foreach ($insumo as $insumos) {
                ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $insumos['ins_id'] ?></td>
                    <td><?php echo $insumos['ins_nombre'] ?></td>
                    <td><?php echo $insumos['ins_valor'] ?></td>
                </tr> 
                
            <?php } 
            
            foreach ($totalInsumo as $totalInsumos) {
            ?> 
                <tr>
                    <th></th>
                    <th></th>
                    <th>Valor Total</th>
             
                    <th><?php echo $totalInsumos['sumaTotal'] ?></th>
                </tr> 
                
            <?php }?> 
        </tbody>
    </table>
    </div>
    
</div>
    <?php $paginado->render(); ?>
</div> 






