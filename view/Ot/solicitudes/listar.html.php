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
                            <th>Código</th>
                            <th>Equipo</th>
                            <th>Fecha</th>
                            <th>Solicitante</th>
                            <th>Tipo de falla</th>
                            <th>Estado</th>
                            <th colspan="4" >Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                            
                        <?php
                        foreach ($solicitudes as $solicitud) {
                            ?>

                            <tr>
                                <td><?php echo $solicitud['sserv_id'] ?></td>
                                <td><?php echo $solicitud['equi_nombre'] ?></td>
                                <td><?php echo $solicitud['sserv_fecha'] ?></td>
                                <td><?php echo $solicitud['per_nombre'] . " " . $solicitud['per_apellido'] ?></td>
                                <td><?php echo $solicitud['tfa_descripcion'] ?></td>
                                <td><?php echo $solicitud['est_descripcion'] ?></td>
                                <td>
                                    <a class="btn-floating waves-effect waves-light modal-trigger teal" href="#editar" data-url="<?php echo crearUrl("Ot", "solicitudes", "editar", array('noVista' => 'noVista', 'sserv_id' => $solicitud['sserv_id'])) ?>"> <i class="mdi-image-edit small"/></a>
                                </td>
                                <td>
                                    <a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" href="#descripcion" data-url="<?php echo crearUrl("Ot", "solicitudes", "descripcion", array('noVista' => 'noVista', 'sserv_id' => $solicitud['sserv_id'])) ?>"> <i class="mdi-action-find-in-page tiny"/></a>
                                </td>
                                <td>
                                    <a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" data-url="<?php echo crearUrl("Ot", "solicitudes", "eliminar", array('noVista' => 'noVista', 'sserv_id' => $solicitud['sserv_id'])) ?>"><i class="mdi-action-delete small"></i></a>
                                </td>
                            </tr>        
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--modales para las acciones del listar solicitudes-->

        <!--Modal para descipcion -->
        <div class="modal" id="descripcion" style="display: none; opacity: 1; top: 0px;"> 
            <div class="modal-content model-data">                                        
            </div>

        </div>
        <!--fin modal -->

        <!--Modal para editar -->
        <div class="modal" id="editar" style="display: none; opacity: 1; top: 0px;">
            <div class="modal-content model-data">                                            
            </div>

        </div>
        <!--fin modal --> 
    </div>

    <div class="row">
        <div class="input-field col m4 offset-m8">
            <!-- <div class="dataTables_info" id="data-table-simple_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div> -->

            <ul class="pagination">
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

