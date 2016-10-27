<div id="bordered-table">
    <div class="row">
        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Tipo Componente</th>
                    <th>Nombre Componente</th>
                    <th>Acr&oacute;nimo</th>
                    <th>Descripci&oacute;n</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($componentes as $componente) {
                    ?>
                    <tr>
                        <td><?php echo $paginado->count++ ?></td>
                        <td><?php echo $componente['tcomp_id'] ?></td>
                        <td><?php echo $componente['tcomp_nombre'] ?></td>
                        <td><?php echo $componente['tcomp_acronimo'] ?></td>
                        <td><?php echo $componente['tcomp_descripcion'] ?></td>
                        <td><a class="modal-trigger btn-floating  waves-effect waves-light teal" 
                               href="#editarTcomp" data-url="<?php echo crearUrl('equipos', 'tipoComponentes', 'editar', array('noVista' => "noVista", 'id' => $componente['tcomp_id'])) ?>">
                                <i class="mdi-content-create small"></i></a>
                        </td>
                        <td>
                            <a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" 
                            data-tmed_id="<?php echo $componente['tcomp_id'] ?>" data-url="<?php echo crearUrl('equipos', 'tipoComponentes', 'postEliminar', array('noVista' => 'noVista', 'id' => $componente['tcomp_id'])) ?>">
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