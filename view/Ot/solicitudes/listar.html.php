<!--DataTables example-->
<div class="col s12 m12 l6">
    <div id="table-datatables">            
        <div class="row">
            <div class="col s12 m4 l4">
            </div>
            <div class="col s12 m8 l12">
                <table id="data-table-simple" class="responsive striped centered" cellspacing="100">
                    <thead>
                        <tr>
                            <th>Registro</th>
                            <th>Código</th>
                            <th>Equipo</th>
                            <th>Fecha</th>
                            <th>Solicitante</th>
                            <th>Tipo de falla</th>
                            <th>Estado</th>
                            <th>Convertir a OT</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Detalle</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        foreach ($solicitudes as $solicitud) {
                            ?>
                            <tr>        
                                <td><?php echo $paginado->count++ ?></td>
                                <td><?php echo $solicitud['sserv_id'] ?></td>
                                <td><?php echo $solicitud['equi_nombre'] ?></td>
                                <td><?php echo $solicitud['sserv_fecha'] ?></td>
                                <td><?php echo $solicitud['per_nombre'] . " " . $solicitud['per_apellido'] ?></td>
                                <td><?php echo $solicitud['tfa_descripcion'] ?></td>
                                <td><?php echo $solicitud['est_descripcion'] ?></td>    
                                
                                <?php if ($solicitud['est_descripcion']=="Atendida") { ?>
                                    <td>
                                        <a class="btn-floating waves-effect waves-light cyan darken-1 disabled" href="#" data-url=""> <i class="mdi-content-add tiny"/></a>
                                    </td>                                    
                                    <td>
                                        <a class="btn-floating waves-effect waves-light teal disabled" href="#" data-url=""> <i class="mdi-image-edit small"/></a>
                                    </td>
                                    <td>
                                        <a class="btn-floating waves-effect waves-light red darken-4 disabled" data-url=""><i class="mdi-action-delete small"></i></a>
                                    </td>                                    
                                <?php } else { ?> 
                                    <td>
                                        <a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" href="#crearOt" data-url="<?php echo crearUrl("Ot", "ot", "crear", array('noVista' => 'noVista', 'ot_id' => $solicitud['sserv_id'])) ?>"> <i class="mdi-content-add tiny"/></a>
                                    </td>
                                    <td>
                                        <a class="btn-floating waves-effect waves-light modal-trigger teal" href="#editar" data-url="<?php echo crearUrl("Ot", "solicitudes", "editar", array('noVista' => 'noVista', 'sserv_id' => $solicitud['sserv_id'])) ?>"> <i class="mdi-image-edit small"/></a>
                                    </td>
                                    <td>
                                        <a class="btn-floating waves-effect waves-light modal-eliminar red darken-4" data-url="<?php echo crearUrl("Ot", "solicitudes", "eliminar", array('noVista' => 'noVista', 'sserv_id' => $solicitud['sserv_id'])) ?>"><i class="mdi-action-delete small"></i></a>
                                    </td>                                                                         
                                <?php } ?>       
                                <td>
                                    <a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" href="#descripcion" data-url="<?php echo crearUrl("Ot", "solicitudes", "descripcion", array('noVista' => 'noVista', 'sserv_id' => $solicitud['sserv_id'])) ?>"> <i class="mdi-action-find-in-page tiny"/></a>
                                </td>                                
<!--                                <td>
                                    <a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" data-url="<?php echo crearUrl("Ot", "solicitudes", "eliminar", array('noVista' => 'noVista', 'sserv_id' => $solicitud['sserv_id'])) ?>"><i class="mdi-action-delete small"></i></a>
                                </td> -->
                            </tr>        
                            <?php } ?>
                    </tbody>
                </table>
                <?php $paginado->render() ?>  
            </div>
        </div>
        <!--modales para las acciones del listar solicitudes-->

        <!--Modal para descipcion -->
        <div class="modal" id="descripcion" style="display: none; opacity: 1; top: 0px;"> 
            <div class="modal-content model-data"></div>

        </div>
        <!--fin modal -->

        <!--Modal para editar -->
        <div class="modal" id="editar" style="display: none; opacity: 1; top: 0px;">
            <div class="modal-content model-data">                                            
            </div><!--fin modal --> 
        </div>
    </div>
</div>

