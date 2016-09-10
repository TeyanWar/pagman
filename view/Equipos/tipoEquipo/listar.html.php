<div class="row">
    <div class="col s12 m12 g12">
        <table class="striped hoverable centered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo de Equipo</th>
                    <th colspan="3">Acciones</th>
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
                        <td>Editar</td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                               href="#modal_detalle_tipoEquipo" 
                               data-url="<?php echo crearUrl("equipos", "tipoEquipo", "verDetalle", array('noVista', 'id' => $tEquipo['tequi_id'])); ?>">
                                <i class="mdi-action-find-in-page tiny"></i></a>
                        </td>
                        <td>Eliminar</td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div class="modal" id="modal_detalle_tipoEquipo">
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
