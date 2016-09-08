<div id="bordered-table">
    <div class="col s12 m12 g12">
        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Codigo Campo Personalizado</th>                    
                    <th>NOmbre Campo Personalizado</th>
                    <th>Editar</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($consultaCampoAjax as $datosCP) {
                    ?>

                    <tr>
                        <td><?php echo $paginado->count++ ?></td>
    <!--                        <td><?php //echo $depto['dept_id']          ?></td>-->
                        <td><?php echo $datosCP['cp_id'] ?></td>
                        <td><?php echo $datosCP['cp_nombre'] ?></td>
                        <td><a class="modal-trigger btn-floating  waves-effect waves-light teal" 
                               href="#editarDepto" data-url="<?php echo crearUrl('localizacion', 'departamento', 'editar', array('noVista' => "noVista", 'id' => $depto['dept_id'])) ?>">
                                <i class="mdi-content-create small"></i></a>
                        </td>                        
                        <td>
                            <a class="btn-floating cyan darken-1 modal-trigger" 
                               href="#detalleDepto" data-url="<?php echo crearUrl('localizacion', 'departamento', 'detalle', array('noVista' => "noVista", 'id' => $depto['dept_id'])) ?>">
                                <i class="mdi-action-find-in-page tiny"></i>
                            </a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
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
