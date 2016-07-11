<div class="card-panel">
    <div class="container">
        <h4 class="header2">Listado de mediciones</h4>
        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Mediciones</a></li>
            <li class="active">Listado mediciones</li>
        </ol>
        <!--Fin rastro de miga-->

        <!--Inicio mensaje de campos obligatorios-->
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : S&oacute;lo podr&aacute; modificar los campos: medida actual y fecha </p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <!--Fin mensaje de campos obligatorios-->

        <table class="highlight center striped bordered">
            <div class="row">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Medida</th>
                    <th>Equipo</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($mediciones as $medicion) {
                    ?>
                    <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $medicion['ctrmed_fecha'] ?></td>
                        <td><?php echo $medicion['ctrmed_medida_actual'] ?></td>
                        <td><?php echo $medicion['equi_nombre'] ?></td>
                        <td><?php echo $medicion['per_nombre'] ?></td>
                       <td><a class="btn-floating waves-effect waves-light modal-trigger teal" 
                               href="#editar" data-url="<?php echo crearUrl("mediciones", "mediciones", "editar", array('noVista' => 'noVista', 'id' => $medicion['ctrmed_id']));?>"> 
                                <i class="mdi-content-create small"></i></a></td>
                        
                    </tr>
            <?php } ?>
            </tbody>
            </div>
            
        </table>
        <div class="modal" id="editar">
            <div class="modal-content ">

            </div> 
        </div>
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