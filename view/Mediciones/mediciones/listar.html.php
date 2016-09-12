<table class="highlight center striped bordered">
            <div class="row">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Equipo</th>
                    <th>Últimas Mediciones: Medidor/Valor/Encargado/Fecha</th>
                    <th>Total</th>
                    <th>Historial</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($equipos as $equipo) { ?>
                    <tr>
                        <td><?php echo $paginado->count++ ?></td>
                        <td><?php echo $equipo['equi_nombre'] ?></td>
                        <td>
                            <?php foreach($equipo['tiposMedidores'] as $tipoMedidor){ 
                                  explodeFecha($tipoMedidor['ultimaMedicion']['ctrmed_fecha']);
                                  $fecha=  getFecha();
                                echo "<code><b>".$tipoMedidor['tmed_nombre']."</code></b>: ".$tipoMedidor['ultimaMedicion']['ctrmed_medida_actual']
                                     ." ".$tipoMedidor['ultimaMedicion']['responsable']." ".$fecha."<br>"; 
                            } ?>
                        </td>
                        <td>
                            <?php foreach($equipo['tiposMedidores'] as $tipoMedidor){ ?>
                                <div class="col s2">
                                    <span style="font-size: 16px" class="task-cat yellow darken-4"><?php echo $tipoMedidor['totalMediciones']." ".$tipoMedidor['tmed_nombre']; ?></span>
                                </div>
                            <?php } ?>
                        </td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                                   href="#modal_detalle_mediciones" 
                                   data-url="<?php echo crearUrl("Mediciones", "mediciones", "detalle", array('noVista', 'id' => $equipo['equi_id'],$equipo['equi_nombre'])); ?>"><i class="mdi-action-find-in-page tiny"></i></a>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
        
        
        <div class="modal" id="modal_detalle_mediciones">
            <div class="modal-content">
            </div> 
        </div>
        
        <?php if(isset($paginado)){
        $paginado->render();
        }else{
            echo'<div id="card-alert" class="card orange">
                      <div class="card-content white-text">
                      <center>
                        <p><i class="mdi-alert-warning">
                        </i> 
                        ATENCI&Oacute;N :No se encontraron registros, por favor dir&iacute;jase a la opci&oacute;n "Crear Medici&oacute;n." 
                        del modulo para realizar un registro.</p></center>
                      </div>
                      <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>';
            
        }?>
                            
        
    </div>
</div>
<script type="text/javascript">
    $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        ready: function () {
            //alert('Ready'); 
        }, // Callback for Modal open
        complete: function () {
            //alert('Closed'); 
        } // Callback for Modal close.
    });
</script>