<div class="card-panel">
    <h4 class="header2">Listar Equipos</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("equipos", "equipos", "Consulta") ?>">Listar/Consultar</a></li>
            <li class="active">Listar</li>
        </ol>
    <div id="bordered-table">
        <div class="row">
            <div class="col s12 m12 g12">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Numero de Placa</th>
                            <th>Nombre del Equipo</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($equipos as $equipo) {
                            ?>
                            <tr>
                                <td><?php echo $count++ ?></td>
                                <td><?php echo $equipo['equi_id'] ?></td>
                                <td><?php echo $equipo['equi_nombre'] ?></td>
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
                                    <a class="btn-floating modal-trigger red darken-4 eliminar1" 
                                       href="#modaleliminar1" data-url="<?php echo crearUrl('equipos', 'equipos', 'eliminar', array('noVista' => 'noVista', 'id' => $equipo['equi_id'])) ?>">
                                        <i class="mdi-action-delete small"></i>
                                    </a>

                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div id="modalDetalle1" class="modal modal-fixed-footer">
                    <div class="modal-header">
                        <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>
                        <hr>
                    </div>
                    <div class="modal-content"></div>
                    <div class="modal-footer">
                        <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
                    </div>
                </div>
            </div>
            <div id="modalUpdate1" class="modal modal-fixed-footer">
                <div class="modal-content"></div>
                <div class="modal-footer">
                    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
                </div>
            </div>
            <div id="modaleliminar1" class="modal modal-fixed-footer">
                <div class="modal-content"></div>
                <div class="modal-footer">
                    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
                </div>
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