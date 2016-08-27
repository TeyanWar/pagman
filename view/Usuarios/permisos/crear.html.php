<div class="col s12 m12 l6">
    <div class="card-panel">
        <h5>ASIGNACI&Oacute;N DE PERMISOS</h5>
        <ol class="breadcrumbs"> 
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li> 
            <li><a href="#">Usuarios</a></li> 
            <li><a href="#">Permisos</a></li> 
            <li class="active">Asignar permisos</li> 
        </ol>

        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> A cotinuaci&oacute;n podr&aacute; seleccionar un rol y asignarle permisos.</p>
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
                                <th><center>Asignar permisos</center></th>
                                <th>Nombre del Rol</th>
                                <th>Permisos asignados actualmente</th>
                            </tr>
                        </thead>
                        <tbody>                                
                            <?php foreach ($roles as $rol) { ?>
                                <tr>
                                    <td style="width: 200px;">
                                    <center>
                                        <a class="btn-floating teal darken-1 modal-trigger ver-detalle1"
                                        href="#modalDetalle1" data-url="<?php echo crearUrl('permisos', 'permisos', 'crearPermisos', array('noVista' => 'noVista', 'id' => $rol['rol_id'])) ?>">
                                            <i class="mdi-content-create small"></i>
                                        </a>
                                    </center>
                                    </td>
                                    <td style="width: 200px;">
                                        <?php echo $rol['rol_nombre']; ?>
                                    </td>
                                    <td>
                                        <?php foreach ($rol['modulos'] as $modulo) {
                                            echo "<p><b>".$modulo['mod_nombre'].":</b> ".$modulo['funciones']."</p>";
                                        }?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    
                    <center><ul class="pagination">
                            <li class="disabled"><a href="#!"><i class="mdi-navigation-chevron-left"></i></a></li>
                            <li class="active"><a href="#!">1</a></li>
                            <li class="waves-effect"><a href="#!">2</a></li>
                            <li class="waves-effect"><a href="#!">3</a></li>
                            <li class="waves-effect"><a href="#!"><i class="mdi-navigation-chevron-right"></i></a></li>
                        </ul></center>
                </div>
            </div>
        </div>     
        <div id="modalDetalle1" class="modal modal-fixed-footer">
            <div class="modal-content"></div>
            <div class="modal-footer">
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
            </div>
        </div>

    </div>
</div>

