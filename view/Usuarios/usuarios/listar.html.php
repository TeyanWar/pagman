<div class="row">
    <div class="col s12 m8 l12">
        <div class="card-panel ">
            <table class="striped">
                <thead>
                  <tr>
                      <th data-field="id">#</th>
                      <th data-field="name">No. identificacion</th>
                      <th data-field="price">Nombre</th>
                      <th data-field="name">Apellido</th>
                      <th data-field="name">Tipo Persona</th>
                      <th data-field="price" colspan="4">Acciones</th>
                  </tr>
                </thead>

                <tbody>
                    <?php
                        $count = 1;
                        foreach($usuar as $user) {?>
                        <tr>
                            <td><?php echo $count++ ?></td>
                            <td><?php echo $user['per_id'] ?></td>
                            <td><?php echo $user['per_nombre'] ?></td>
                            <td><?php echo $user['per_apellido'] ?></td>
                            <td><?php echo strtoupper($user['per_tipo']) ?></td>

                            <td>
                                <a class="btn-floating waves-effect waves-light teal modal-trigger editar" 
                                   href="#modalUpdate" data-url="<?php echo crearUrl('usuarios', 'usuarios', 'editar', array('noVista' => 'noVista', 'id' => $user['per_id'])) ?>">
                                   <i class="mdi-content-create small"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn-floating waves-effect waves-light cyan modal-trigger ver-detalle"
                                   href="#modalDetalle" data-url="<?php echo crearUrl('usuarios', 'usuarios', 'verDetalle', array('noVista' => 'noVista', 'codver' => $user['per_id'])) ?>">
                                   <i class="mdi-action-find-in-page tiny"></i>
                                </a>
                            </td>

                    <?php if($user['per_tipo'] == 'persona') { ?>
                            <td>
                                <a class="btn-floating waves-effect waves-light teal modal-trigger agregar" 
                                   href="#modalAgregar" data-url="<?php echo crearUrl('usuarios', 'personas', 'agregaruser', array('noVista' => 'noVista', 'agre' => $user['per_id'])) ?>">
                                   <i class="small mdi-social-person-add"></i>
                                </a>
                            </td>
                         <?php
                        }  else {
                         ?>
                            <td>
                                <a class="btn-floating waves-effect grey darken-1" href="#">
                                   <i class="small mdi-action-done"></i>
                                </a>
                            </td>
                        <?php
                        } 
                    ?>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php $paginado->render() ?>
        </div>
    </div>
</div>
    
    <div id="modalDetalle" class="modal modal-fixed-footer">
        <div class="modal-content"></div>
        <div class="modal-footer">
            <a class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
        </div>
    </div>
    <div id="modalUpdate" class="modal modal-fixed-footer">
        <div class="modal-content"></div>
        <div class="modal-footer">
            <a class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>           
        </div>
    </div>
    <div id="modalAgregar" class="modal modal-fixed-footer">
        <div class="modal-content"></div>
        <div class="modal-footer">
            <a class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                    
        </div>
    </div>
</div>

<script type="text/javascript">
     $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { 
      //alert('Ready'); 
      }, // Callback for Modal open
      complete: function() { 
      //alert('Closed'); 
      } // Callback for Modal close
  });
</script>