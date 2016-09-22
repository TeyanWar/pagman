<div id="bordered-table">
    <div class="col s12 m12 g12">
        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Codigo Campo Personalizado</th>                    
                    <th>Nombre Campo Personalizado</th>
                    <th colspan="3"><center>Acciones</center></th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach ($consultaCampoAjax as $datosCP) {
                    ?>

                    <tr>
                        <td><?php echo $paginado->count++ ?></td>
    <!--                        <td><?php //echo $depto['dept_id']                  ?></td>-->
                        <td><?php echo $datosCP['cp_id'] ?></td>
                        <td><?php echo $datosCP['cp_nombre'] ?></td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                               href="#modal_editar_campoPersonalizado" 
                               data-url="<?php echo crearUrl("equipos", "campoPersonalizado", "editar", array('noVista', 'id' => $datosCP['cp_id'])); ?>">
                                <i class="mdi-content-create teal"></i></a>
                        </td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                               href="#modal_detalle_campoPersonalizado" 
                               data-url="<?php echo crearUrl("equipos", "campoPersonalizado", "verDetalle", array('noVista', 'id' => $datosCP['cp_id'])); ?>">
                                <i class="mdi-action-find-in-page tiny"></i></a>
                        </td>
                        <td><a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" data-id="<?php echo $datosCP['cp_id'] ?>" data-url="<?php echo crearUrl('Equipos', 'campoPersonalizado', 'postEliminar', array('noVista' => 'noVista', 'id' => $datosCP['cp_id'])) ?>"><i class="mdi-action-delete small"></i></a></td>

                    </tr>

                <?php } ?>
            </tbody>
        </table>


        <div class="modal" id="modal_editar_campoPersonalizado">
            <div class="modal-content">
            </div> 
        </div>

        <div class="modal" id="modal_detalle_campoPersonalizado">
            <div class="modal-content">
            </div> 
        </div>

        <?php $paginado->render(); ?>

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
        } // Callback for Modal close
    });
</script>
