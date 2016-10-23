<div id="bordered-table">
    <div class="col s12 m12 g12">
        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre de la Ciudad</th>                    
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($areas as $area) {
                    ?>

                    <tr>
                        <td><?php echo $paginado->count++ ?></td>
    <!--                        <td><?php //echo $depto['dept_id']          ?></td>-->
                        <td><?php echo $area['area_descripcion'] ?></td>
                        <td><a class="modal-trigger btn-floating  waves-effect waves-light teal editar" 
                               href="#editarArea" data-url="<?php echo crearUrl('localizacion', 'area', 'editar', array('noVista' => "noVista", 'id' => $area['area_id'])) ?>">
                                <i class="mdi-content-create small"></i></a>
                        </td>                        
                        <td>
                            <a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" 
                            data-tmed_id="<?php echo $area['area_id'] ?>" data-url="<?php echo crearUrl('localizacion', 'area', 'Eliminar', array('noVista' => 'noVista', 'id' => $area['area_id'])) ?>">
                            <i class="mdi-action-delete small"></i></a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        <?php $paginado->render(); ?>
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
