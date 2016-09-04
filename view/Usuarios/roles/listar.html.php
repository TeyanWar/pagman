<div class="col s12 m12 l6">
    <div class="card-panel">
        <h5>LISTA DE ROLES</h5>
        <ol class="breadcrumbs"> 
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li> 
            <li><a href="#">Usuarios</a></li> 
            <li><a href="#">Roles</a></li> 
            <li class="active">Listar roles</li> 
        </ol>   

        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> A continuaci&oacute;n podr&aacute; gestionar un rol.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>

        <div class="col s12 m6 l3" id="flight-card">
            <div class="input-field col s12">
                <div class="input-field col s12">
                    <table class="striped" style="border:1px; border-color: black;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><center>Rol</center></th>
                                <th colspan="3"><center>Funciones</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($roles as $rol) { ?>
                                <tr>
                                    <td><?php echo $paginado->count++; ?></td>
                                    <td><?php echo $rol['rol_nombre']; ?></td>
                                    <td>
                                        <a class="btn-floating modal-trigger teal editarRoles" 
                                           href="#modalUpdateRoles" data-url="<?php echo crearUrl('roles', 'roles', 'editar', array('noVista' => 'noVista', 'id' => $rol['rol_id'])) ?>">
                                            <i class="mdi-content-create small"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn-floating cyan darken-1 modal-trigger ver-detalle-roles"
                                           href="#modalDetalleRol" data-url="<?php echo crearUrl('roles', 'roles', 'verDetalle', array('noVista' => 'noVista', 'id' => $rol['rol_id'])) ?>">
                                            <i class="mdi-action-find-in-page tiny"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a class=" btn-floating waves-effect waves-light modal-eliminar red
                                           darken-4 eliminar" data-rol_id="<?php echo $rol['rol_id'] ?>"  data-url="<?php echo crearUrl('roles', 'roles', 'eliminar', array('noVista')) ?>">
                                            <i class="mdi-action-delete small red "></i>
                                        </a>
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                    <?php $paginado->render() ?>
                </div>
            </div>
        </div> 
        <div id="modalUpdateRoles" class="modal modal-fixed-footer">

            <div class="modal-content"></div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
            </div>
        </div>
        <div id="modalDetalleRol" class="modal modal-fixed-footer">

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