<div class="card-panel">
    <table class="striped centered">
        <thead>
            <tr>
                <th>Nombre tipo de Equipo</th>
                <th>Seleccionar</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($consultaCampoAjax as $tipoEquipo) { ?>
                <tr>
                    <td><?php echo $tipoEquipo['tequi_descripcion']; ?> </td>
                    <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                           href="#modal_editar_campoPersonalizado" 
                           data-url="<?php echo crearUrl("equipos", "equipos", "agregarMedida", array('noVista', 'id' => $tipoEquipo['tequi_id'])); ?>">
                            <i class="mdi-action-done teal"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="modal" id="modal_editar_campoPersonalizado">
        <div class="modal-content">
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