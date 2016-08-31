<table class="highlight center striped bordered">
            <div class="row">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Equipo</th>
                        <th>Fecha Última(s) Medicion</th>
                        <th>Medida y Tipo Medidor</th>
                        <th>Responsable</th>
                        <th>Medicion Total</th>
                        <th>Ver Detalle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    foreach ($equipos as $equipo) {
                        ?>
                        <tr>
                            <td><?php echo $paginado->count++; ?></td>
                            <td>
                                <?php echo $equipo['equi_nombre'] ?></td>
                            <td>
                                <?php
                                explodeFecha($equipo['maxFecha']) .
                                        $fecha = getFecha();
                                echo $fecha;
                                ?>
                            </td>
                            <td>
                                <?php echo $equipo['ctrmed_medida_actual'] . " " . $equipo['tmed_nombre']; ?>
                            </td>
                            <td>
                                <?php echo $equipo['responsable']; ?>
                            </td>
                            <td>
                                <?php echo $equipo['totalMedicion'] . " " . $equipo['tmed_nombre']; ?>
                            </td>
                            <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                                   href="#modal_detalle_mediciones" 
                                   data-url="<?php echo crearUrl("Mediciones", "mediciones", "detalle", array('noVista' => 'noVista', 'id' => $equipo['equi_id'])); ?>"><i class="mdi-action-find-in-page tiny"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </div>

        </table>

        <div class="modal close" id="modal_detalle_mediciones" style="z-index: 1003; display: none; 
             opacity: 0; transform: scaleX(0.7); top: 341.06px; height:auto; width: 75%;" >
            <div class="modal-content" id="model-data"></div>
        </div>
        <?php $paginado->render() ?>

    </div>
</div>
<script type="text/javascript">
    $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        ready: function() {
            //alert('Ready'); 
        }, // Callback for Modal open
        complete: function() {
            //alert('Closed'); 
        } // Callback for Modal close
    });
</script>