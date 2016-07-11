<div id="bordered-table">
    <div class="card-panel">
        <h4 class="header">Listar departamento </h4>

        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("localizacion", "departamento", "consulta") ?>">Listar departamento</a></li>
            <li><a href="<?php echo crearUrl("localizacion", "departamento", "crear") ?>">crear departamento</a></li>
            <li class="active"> consulta departamento </li>
        </ol>



        <div class="col s12 m12 g12">
            <table class="striped">
                <thead>
                    <tr>

                        <th>Codigo departamento</th>
                        <th>Nombre departamento </th>
                        <th>Editar</th>
                        <th>Detalle</th>

                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($departamentos as $departamento) {
                        ?>
                        <tr>

                            <td><?php echo $departamento['dept_id'] ?></td>
                            <td><?php echo $departamento['dept_nombre'] ?></td>

                            <td>
                                <a class="btn-floating waves-effect waves-light modal-trigger teal editar2" 
                                   href="#modalUpdate2" data-url="<?php echo crearUrl('localizacion', 'departamento', 'editar', array('noVista' => 'noVista', 'id' => $departamento['dept_id'])) ?>">
                                    <i class="mdi-content-create small  Teal "></i>
                                </a>

                            </td>
                            <td>
                                <a class="btn-floating waves-effect waves-light modal-trigger cyan
                                   darken-1 ver-detalle2"
                                   href="#modalDetalle2" data-url="<?php echo crearUrl('localizacion', 'departamento', 'detalle', array('noVista' => 'noVista', 'id' => $departamento['dept_id'])) ?>">
                                    <i class="mdi-action-find-in-page tiny"></i>
                                </a>
                            </td>
                           <!-- <td>
                                <a class="modal-trigger eliminar2" 
                                   href="#modaleliminar2" data-url="<?php echo crearUrl('localizacion', 'departamento', 'eliminar', array('noVista' => 'noVista', 'id' => $departamento['dept_id'])) ?>">
                                    <i class="btn-floating small mdi-action-delete red"></i>
                                </a>

                            </td>-->
                            <td>
                                <a class=" btn-floating waves-effect waves-light modal-eliminar red
                                   darken-4 eliminar3" data-dept_id="<?php echo $departamento['dept_id'] ?>"  data-url="<?php echo crearUrl('localizacion', 'departamento', 'postEliminar', array('noVista' => 'noVista', 'id' => $departamento['dept_id'])) ?>">
                                    <i class="mdi-action-delete small red "></i>
                                </a>

                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div id="modalDetalle2" class="modal modal-fixed-footer">
                <div class="modal-content"></div>
                <div class="modal-footer">
                    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
                </div>
            </div>
        </div>
        <div id="modalUpdate2" class="modal modal-fixed-footer">
            <div class="modal-content"></div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
            </div>
        </div>
        <div id="modaleliminar2" class="modal modal-fixed-footer">
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
