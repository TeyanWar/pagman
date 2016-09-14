<div class="row">
    <div class="col s12 m12 g12">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo de Equipo</th>
                    <th>Editar</th>
                    <th>Ver Detalle</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($consultaCampoAjax as $tEquipo) {
                    ?>
                    <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $tEquipo['tequi_descripcion'] ?></td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                               href="#modal_editar_tipoEquipo" 
                               data-url="<?php echo crearUrl("equipos", "tipoEquipo", "editar", array('noVista', 'id' => $tEquipo['tequi_id'])); ?>">
                                <i class="mdi-content-create teal"></i></a>
                        </td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                               href="#modal_detalle_tipoEquipo" 
                               data-url="<?php echo crearUrl("equipos", "tipoEquipo", "verDetalle", array('noVista', 'id' => $tEquipo['tequi_id'])); ?>">
                                <i class="mdi-action-find-in-page tiny"></i></a>
                        </td>
                        <td><a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" data-id="<?php echo $tEquipo['tequi_id'] ?>" data-url="<?php echo crearUrl('Equipos', 'tipoEquipo', 'postEliminar', array('noVista' => 'noVista', 'id' => $tEquipo['tequi_id'])) ?>"><i class="mdi-action-delete small"></i></a></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div class="modal" id="modal_detalle_tipoEquipo">
            <div class="modal-content">
            </div> 
        </div>
        <div class="modal" id="modal_editar_tipoEquipo">
            <div class="modal-content">
            </div> 
        </div>
    </div>
</div>
<?php $paginado->render(); ?>
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
