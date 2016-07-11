<div class="col s12 m12 l6">
    <div class="card-panel">
        <h5>LISTA DE ROLES</h5>
        <ol class="breadcrumbs"> 
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li> 
            <li><a href="#">Usuarios</a></li> 
            <li><a href="#">Roles</a></li> 
            <li class="active">Lista de roles</li> 
        </ol>
        <div id="card-alert" class="card teal"> 
            <div class="card-content white-text"> 
                <p><i class="mdi-action-info-outline"></i> 
                    INFORMACIÓN: Aquí podrá consultar, editar o eliminar la información
                    de cualquier rol registrado.
                </p> 
            </div> 
            <button type="button" class="close white-text" datadismiss="alert" aria-label="Close"> 
                <span aria-hidden="true">×</span> 
            </button> 
        </div>
        <table class="striped">
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Editar</th>
                <th>Detalle</th>
                <th>Eliminar</th>
            </tr>
            <?php foreach ($roles as $rol) { ?>
                <tr>
                    <td><?php echo $rol['rol_nombre'] ?></td>
                    <td><?php echo $rol['rol_descripcion'] ?></td>
                    <td>
                        <a class="btn-floating waves-effect waves-light teal" href="<?php echo crearUrl('Roles', 'roles', "editar",array($rol['rol_id']))?>">
                            <i class="mdi-content-create small"/></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" href="#modal_detalle_rol">
                            <i class="mdi-action-find-in-page tiny detalle_rol" data-url="<?php echo crearUrl("Roles", "roles", "verDetalle", array('noVista' => 'noVista', 'rol_id' => $rol['rol_id'], 'rol_nombre' => $rol['rol_nombre'], 'rol_descripcion' => $rol['rol_descripcion'])) ?>"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn-floating waves-effect waves-light modal-eliminar red darken-4" href="#">
                            <i class="mdi-action-delete small eliminar_rol" data-url="<?php echo crearUrl("Roles", "roles", "eliminar", array('noVista' => 'noVista', 'rol_id' => $rol['rol_id'])) ?>" accesskey=""></i>
                        </a>   
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<!--Modal para ver detalle-->
<div style="z-index: 1003; display: none; opacity: 1; transform: scaleX(1); top: 10%;" id="modal_detalle_rol" class="modal modal-fixed-footer">
    <div id="modal_content_rol" class="modal-content">

    </div>
    <div class="modal-footer">
        <a class="waves-effect waves-red btn-flat modal-action modal-close">Cerrar</a>
        <a id="form_modificar_rol" class="waves-effect waves-green btn-flat modal-action modal-close">Modificar</a>
    </div>

</div>