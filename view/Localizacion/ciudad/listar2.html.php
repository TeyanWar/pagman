<div id="bordered-table">
    <div class="col s12 m12 g12">
        <table class="striped">
            <thead>
                <tr>

                    <th>Codigo ciudad</th>
                    <th>Nombre ciudad </th>
                    <th>Editar</th>
                    <th>Detalle</th>

                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($ciudades as $ciudad) {
                    ?>
                    <tr>

                        <td><?php echo $ciudad['ciud_id'] ?></td>
                        <td><?php echo $ciudad['ciud_nombre'] ?></td>

                        <td>
                            <a class="btn-floating waves-effect waves-light modal-trigger teal editar5" 
                               href="#modalUpdate5" data-url="<?php echo crearUrl('localizacion', 'ciudad', 'editar', array('noVista' => 'noVista', 'id' => $ciudad['ciud_id'])) ?>">
                                <i class="mdi-content-create small  Teal"></i>
                            </a>

                        </td>
                        <td>
                            <a class="btn-floating waves-effect waves-light modal-trigger cyan
                               darken-1 ver-detalle5"
                               href="#modalDetalle5" data-url="<?php echo crearUrl('localizacion', 'ciudad', 'detalle', array('noVista' => 'noVista', 'id' => $ciudad['ciud_id'])) ?>">
                                <i class="mdi-action-find-in-page tiny"></i>
                            </a>
                        </td>
                       <!-- <td>
                            <a class="modal-trigger eliminar5" 
                               href="#modaleliminar5" data-url="<?php echo crearUrl('localizacion', 'ciudad', 'eliminar', array('noVista' => 'noVista', 'id' => $ciudad['ciud_id'])) ?>">
                                <i class="btn-floating small mdi-action-delete red"></i>
                            </a>

                        </td>-->


                        <td>
                            <a class=" btn-floating waves-effect waves-light modal-eliminar red
                               darken-4 eliminar2" data-ciud_id="<?php echo $ciudad['ciud_id'] ?>"  data-url="<?php echo crearUrl('localizacion', 'ciudad', 'postEliminar', array('noVista' => 'noVista', 'id' => $ciudad['ciud_id'])) ?>">
                                <i class="mdi-action-delete small red "></i>
                            </a>

                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="modalDetalle5" class="modal modal-fixed-footer">
            <div class="modal-content"></div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
            </div>
        </div>
    </div>
    <div id="modalUpdate5" class="modal modal-fixed-footer">
        <div class="modal-content"></div>
        <div class="modal-footer">
            <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
        </div>
    </div>
    <div id="modaleliminar5" class="modal modal-fixed-footer">
        <div class="modal-content"></div>
        <div class="modal-footer">
            <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
        </div>
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
