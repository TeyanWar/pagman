<div class="row">
    <div class="col s12 m8 l12">
        <div class="card-panel ">
      
            
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="id">No. OT</th>
                        <th data-field="name">Encargado</th>
                        <th data-field="name">Fecha y hora de creaci&oacute;n</th>
                        <th data-field="name">Equipo</th>
                        <th data-field="name">Estado de la orden</th>
                        <th data-field="name">Prioridad</th>
                        <th data-field="name">Editar</th>
                        <th data-field="name">Detalle</th>
                        <th data-field="name">Eliminar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($ordenes as $orden) {
                        ?>
                        <tr>
                            <td><?php echo $orden['ot_id'] ?></td>
                            <td><?php echo $orden['per_nombre'] ?></td>
                            <td><?php echo $orden['ot_fecha_creacion'] ?></td>
                            <td><?php echo $orden['equi_nombre'] ?></td>
                            <td><?php echo $orden['est_descripcion'] ?></td>
                            <td><?php echo $orden['ot_prioridad'] ?></td>
                            <td><a class="btn-floating waves-effect waves-light modal-trigger teal" href="#modal_editar" data-url="<?php echo crearUrl("Ot", "ot", "editar", array('noVista' => 'noVista', 'ot_id' => $orden['ot_id'])); ?>"> <i class="mdi-content-create small"/></a></td>
                            <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" href="#modal_detalle" data-url="<?php echo crearUrl("Ot", "ot", "detalle", array('noVista' => 'noVista', 'ot_id' => $orden['ot_id'])); ?>"><i class="mdi-action-find-in-page tiny"></i></a></td>                      
                            <td><a class="btn-floating waves-effect waves-light modal-eliminar red darken-4" data-url="<?php echo crearUrl("Ot", "ot", "eliminar", array('noVista' => 'noVista', 'ot_id' => $orden['ot_id'])); ?>"> <i class="mdi-action-delete small"></i></a></td>                          
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

            <ul class="pagination center">
                <li class="disabled"><a href="#!"><i class="mdi-navigation-chevron-left"></i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="mdi-navigation-chevron-right"></i></a></li>
            </ul>

        </div>
    </div>
</div>

<div class="modal" id="modal_editar" style="z-index: 1003; display: none; 
     opacity: 0; transform: scaleX(0.7); top: 341.06px; height: auto; width: 65%;" >  
    <div class="modal-content model-data">

    </div>
</div>

<div class="modal" id="modal_detalle" style="z-index: 1003; display: none; 
     opacity: 0; transform: scaleX(0.7); top: 341.06px; height: auto; width: 65%;" >   
<!--    <a class="btn-floating waves-effect waves-light brown right cerrar"><i class="mdi-content-clear"></i></a>-->
    <div class="modal-content model-data">

    </div>   
</div>

