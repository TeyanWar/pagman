<div class="card-panel">
    <div class="container">
        <h4 class="header2">Listado de mediciones</h4>
        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Mediciones</a></li>
            <li class="active">Listado mediciones</li>
        </ol>
        <!--Fin rastro de miga-->

        <!--Inicio mensaje de campos obligatorios-->
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : A continuaci&oacute;n podr&aacute; consultar buscar un equipo y consultar su historial de mediciones. </p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php
            $errores = getErrores();
            if (!$errores == "") { ?>
                <div id="prueba">
                    <div id="card-alert" class="card red">
                        <div class="card-content white-text">
                            <p><i class="mdi-alert-error"></i> 
                            <p><?php echo $errores ?></p>
                        </div>
                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
        <?php } ?>

        <!--Fin mensaje de campos obligatorios-->

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
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $equipo['equi_nombre'] ?></td>
                        <td>
                            <?php foreach($equipo['tiposMedidores'] as $tipoMedidor){ 
                                echo "<code><b>".$tipoMedidor['tmed_nombre']."</code></b>: ".$tipoMedidor['ultimaMedicion']['ctrmed_medida_actual']
                                     ." ".$tipoMedidor['ultimaMedicion']['responsable']." ".$tipoMedidor['ultimaMedicion']['ctrmed_fecha']."<br>"; 
                            } ?>
                        </td>
                        <td>
                            <?php foreach($equipo['tiposMedidores'] as $tipoMedidor){ ?>
                                <div class="col s2">
                                    <span style="font-size: 16px" class="task-cat yellow darken-4"><?php echo $tipoMedidor['totalMediciones']; ?></span>
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
            </div>
            
        </table>
        
        
        <div class="modal" id="modal_detalle_mediciones">
            <div class="modal-content ">
            </div> 
        </div>
        
        <?php // $paginado->render() ?>
        
    </div>
</div>
<script type="text/javascript">
//    $('.modal-trigger').leanModal({
//        dismissible: true, // Modal can be dismissed by clicking outside of the modal
//        opacity: .5, // Opacity of modal background
//        in_duration: 300, // Transition in duration
//        out_duration: 200, // Transition out duration
//        ready: function () {
//            //alert('Ready'); 
//        }, // Callback for Modal open
//        complete: function () {
//            //alert('Closed'); 
//        } // Callback for Modal close
//    });
</script>