<!-- BRYAN DAVID RAMOS MUÑOZ TADSI03-->
<div class="col s12">
    <table class="centered striped card-panel">
        <thead>             
            <tr>
                <th>No. registro</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Valor</th>
                <th>Unidad de medida</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $count = 1;
            foreach ($insumos as $insumo) {
                ?>
                <tr>
                    <td><?php echo $insumo['ins_id'] ?></td>
                    <td><?php echo $insumo['ins_nombre'] ?></td>
                    <td><?php echo $insumo['ins_descripcion'] ?></td>
                    <td><?php echo $insumo['ins_valor'] ?></td>
                    <td><?php echo $insumo['umed_descripcion'] ?></td>

                    <td>
                        <a class="btn-floating waves-effect waves-light modal-trigger teal" 
                           href="#editar" data-url="<?php echo crearUrl('insumos', 'insumos', 'editar',
                                 array('noVista' => "noVista", 'id' => $insumo['ins_id']))?>">
                            <i class="mdi-content-create small"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn-floating waves-effect waves-light modal-eliminar red darken-4" 
                           data-ins_id="<?php echo $insumo['ins_id'] ?>" 
                           data-url="<?php echo crearUrl('insumos', 'insumos', 'postEliminar',
                                 array('noVista' => "noVista", 'id' => $insumo['ins_id']))?>"> 
                            <i class="mdi-action-delete small"></i>
                        </a>
                    </td>

                </tr> 

            <?php } ?> 

        </tbody>


    </table>



    <div class="modal" id="editar" style="display: none; opacity: 1; top: 0px;">
        <div class="modal-content" id="model-data"></div>
    </div>
</div>
<?php $paginado->render() ?>


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
            // alert('Closed');
        } // Callback for Modal close
    });
</script>
