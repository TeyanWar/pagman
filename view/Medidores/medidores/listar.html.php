<div id="bordered-table">
    <div class="row">
        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Medidor</th>
                    <th>Acr&oacute;nimo</th>
                    <th>Descripci&oacute;n</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($medidores as $medidor) {
                    ?>
                    <tr>
                        <td><?php echo $paginado->count++ ?></td>
                        <td><?php echo $medidor['tmed_nombre'] ?></td>
                        <td><?php echo $medidor['tmed_acronimo'] ?></td>
                        <td><?php echo $medidor['tmed_descripcion'] ?></td>
                        <td><?php
                            if ($medidor['estado'] == "") {
                                $medidor['tmed_estado'] = 'Activo';
                            } else {
                                $medidor['tmed_estado'] = 'Inactivo';
                            }
                            echo $medidor['tmed_estado'];
                            ?>
                        </td>
                        <td><a class="modal-trigger btn-floating  waves-effect waves-light teal" 
                               href="#editarMedidor" data-url="<?php echo crearUrl('medidores', 'medidores', 'editar', array('noVista' => "noVista", 'id' => $medidor['tmed_id'])) ?>">
                                <i class="mdi-content-create small"></i></a>
                        </td>
                        <td>
                            <a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" 
                            data-tmed_id="<?php echo $medidor['tmed_id'] ?>" data-url="<?php echo crearUrl('medidores', 'medidores', 'postEliminar', array('noVista' => 'noVista', 'id' => $medidor['tmed_id'])) ?>">
                            <i class="mdi-action-delete small"></i></a></td>
                        </td>
                                
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>

</div>


<?php $paginado->render(); ?>


<script type="text/javascript">
    $('.modal-trigger').leanModal({
        dismissible: false, // Modal can be dismissed by clicking outside of the modal
        opacity: .4, // Opacity of modal background
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