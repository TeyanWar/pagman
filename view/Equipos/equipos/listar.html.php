
<div class="row">
    <div class="col s12 m12 g12">
        <table class="striped">
            <thead>
                <tr>
                    <th>Numero de Placa</th>
                    <th>Nombre del Equipo</th>
                    <th>Imagen del Equipo</th>
                    <th colspan="3"><center>Acciones</center></th>
            </tr>
            </thead>
            <tbody>
                <?php
                foreach ($consultaEquipo as $equipo) {
                    ?>
                    <tr>
                        <td><?php echo $equipo['equi_id'] ?></td>
                        <td><?php echo $equipo['equi_nombre'] ?></td>
                        <td>
                            <?php
                            $url_file = "media/img/Equipos/" . $equipo['equi_foto'];
                            if (!file_exists($url_file)) {
                                echo "<code><b>Sin imagen</b></code>";
                            } else {
                                ?>
                                <a class = "fancybox" href = "<?php echo addLib("media/img/Equipos/" . $equipo['equi_foto']); ?>"><img src = "<?php echo addLib("media/img/Equipos/" . $equipo['equi_foto']); ?>" width = "100" height = "100"></a>
                            <?php }
                            ?>
                        </td>
                        <td>
                            <a class="btn-floating modal-trigger teal editar1" 
                               href="#modalUpdate1" data-url="<?php echo crearUrl('equipos', 'equipos', 'editar', array('noVista' => 'noVista', 'id' => $equipo['equi_id'])) ?>">
                                <i class="mdi-content-create small"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn-floating cyan darken-1 modal-trigger ver-detalle1"
                               href="#modalDetalle1" data-url="<?php echo crearUrl('equipos', 'equipos', 'detalle', array('noVista' => 'noVista', 'id' => $equipo['equi_id'])) ?>">
                                <i class="mdi-action-find-in-page tiny"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn-floating waves-effect modal-eliminar waves-light red darken-4" data-id="<?php echo $equipo['equi_id'] ?>" 
                               data-url="<?php echo crearUrl('equipos', 'equipos', 'eliminar', array('noVista' => 'noVista', 'id' => $equipo['equi_id'])) ?>">
                                <i class="mdi-action-delete small red "></i>
                            </a>

                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="modalDetalle1" class="modal modal-fixed-footer">

            <div class="modal-content"></div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
            </div>
        </div>
        <div id="modalUpdate1" class="modal modal-fixed-footer">
            <div class="modal-content"></div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
            </div>
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