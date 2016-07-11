


<div id="bordered-table">
    <div class="card-panel">
        <h4 class="header">Crear regional </h4>
        
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php  echo crearUrl("localizacion", "regional", "consulta")?>">Listar regional </a></li>
            <li><a href="<?php  echo crearUrl("localizacion", "regional", "crear")?>">Crear regional</a></li>
            <li class="active"> consultar regional </li>
        </ol>
      
        <div class="row">
          
            <div class="col s12 m12 g12">
                <table class="striped">
                    <thead>
                        <tr>

                            <th>Codigo regional</th>
                            <th>Nombre regional </th>
                            <th>Editar</th>
                            <th>Detalle</th>

                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($regionales as $regional) {
                            ?>
                            <tr>

                                <td><?php echo $regional['reg_id'] ?></td>
                                <td><?php echo $regional['reg_nombre'] ?></td>



                                <td>
                                    <a class="btn-floating waves-effect waves-light modal-trigger teal editar" 
                                       href="#modalUpdate" data-url="<?php echo crearUrl('localizacion', 'regional', 'editar', array('noVista' => 'noVista', 'id' => $regional['reg_id'])) ?>">
                                        <i class="mdi-content-create small  Teal"></i>
                                    </a>

                                </td>
                                <td>
                                    <a class="btn-floating waves-effect waves-light modal-trigger cyan
                                       darken-1 ver-detalle"
                                       href="#modalDetalle" data-url="<?php echo crearUrl('localizacion', 'regional', 'detalle', array('noVista' => 'noVista', 'id' => $regional['reg_id'])) ?>">
                                        <i class="mdi-action-find-in-page tiny"></i>
                                    </a>
                                </td>
                                <!--<td>
                                    <a class="modal-trigger eliminar" 
                                       href="#modaleliminar" data-url="<?php echo crearUrl('localizacion', 'regional', 'eliminar', array('noVista' => 'noVista', 'id' => $regional['reg_id'])) ?>">
                                        <i class="btn-floating small mdi-action-delete red"></i>
                                    </a>

                                </td>-->


                                <td>
                                    <a class=" btn-floating waves-effect waves-light modal-eliminar red
                                       darken-4 eliminar" data-reg_id="<?php echo $regional['reg_id'] ?>"  data-url="<?php echo crearUrl('localizacion', 'regional', 'postEliminar', array('noVista' => 'noVista', 'id' => $regional['reg_id'])) ?>">
                                        <i class="mdi-action-delete small red "></i>
                                    </a>

                                </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div id="modalDetalle" class="modal modal-fixed-footer">
                    <div class="modal-content"></div>
                    <div class="modal-footer">
                        <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
                    </div>
                </div>
            </div>
            <div id="modalUpdate" class="modal modal-fixed-footer">
                <div class="modal-content"></div>
                <div class="modal-footer">
                    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
                </div>
            </div>
            <div id="modaleliminar" class="modal modal-fixed-footer">
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
