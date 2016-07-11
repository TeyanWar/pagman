<div class="card-panel">
<table id="data-table-simple" class="responsive-table display" cellspacing="0">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>equipo</th>
                    <th>Centro</th>
                    <th>No.tareas</th>
                    <th>Editar</th>
                    <th>Detalle</th>
                    
                </tr>
            </thead>
           
            <tbody>
                <?php foreach ($programaciones as $programacion) {
                   ?>
                    <tr>
                        <td><?php echo $programacion['equi_id'] ?></td>
                        <td><?php echo $programacion['equi_nombre'] ?></td>
                        <td><?php echo $programacion['cen_nombre'] ?></td>
                        <td><?php echo $programacion['total'] ?></td>
                        <td><a class="btn-floating waves-effect waves-light teal modal-trigger "  href="#edit"  data-url="<?php echo crearUrl('programacion', 'programacion', 'editar', array('noVista' => "noVista", 'id' => $programacion['equi_id'],'nombre'=>$programacion['equi_nombre'])) ?>">
                                <i class="mdi-content-create"></i></a></td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" href="#detalle"  data-url="<?php echo crearUrl('programacion', 'programacion', 'verDetalle', array('noVista' => "noVista", 'id' => $programacion['equi_id'],'nombre'=>$programacion['equi_nombre'])) ?>">
                                <i class="mdi-action-find-in-page"></i></a></td>                      
                  


                    </tr>
                   
                <?php } ?>
            </tbody>
        </table>
    
    <div id="edit" class="modal">
        <div class="modal-content model-data">
        </div>
    </div>
    <div id="detalle" class="modal">
        <div class="modal-content model-data">
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".modal-trigger").leanModal({
        dismissible: true,
        opacity: .5,
        in_duration: 300,
        out_duration: 200,
        ready: function () {

        },
        complete: function () {

        }
    });
</script>