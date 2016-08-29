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
        <?php
        $errores = getErrores();
        if (!$errores == "") {
            ?>
            <div id="prueba">
                <div id="card-alert" class="card red">
                    <div class="card-content white-text">
                        <p><i class="mdi-alert-error"></i> 
                        <p><?php echo $errores ?></p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        <?php } ?>

        <!--Fin mensaje de campos obligatorios-->
<<<<<<< HEAD

        <table class="highlight center striped bordered">
            <div class="row">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Equipo</th>
                    <th>Fecha Última(s) Medicion(es)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Medida y Tipo Medidor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Responsable</th>
                    <th>Medicion Total</th>
                    <th>Ver Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($equipos as $equipo) { ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $equipo['equi_nombre'] ?></td>
                        <td>
                            <?php foreach($equipo['tiposMedidores'] as $tipoMedidor){ 
                                explodeFecha($tipoMedidor['ultimaMedicion']['ctrmed_fecha']);
                                $fecha=getfecha();
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;".$fecha."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
                                     $tipoMedidor['ultimaMedicion']['ctrmed_medida_actual']." ".$tipoMedidor['tmed_nombre']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
                                     "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#160;&#160;&#160;&#160;".$tipoMedidor['ultimaMedicion']['responsable']."<br>"; 
                            } ?>
                        </td>
                        <td>
                            <?php foreach($equipo['tiposMedidores'] as $tipoMedidor){ 
                                echo $tipoMedidor['totalMediciones']."  ".$tipoMedidor['tmed_nombre']."<br>";
                            } ?>
                        </td>
                        <td><a class="btn-floating waves-effect waves-light modal-trigger cyan darken-1" 
                            href="#modal_detalle_mediciones" 
                            data-url="<?php echo crearUrl("Mediciones", "mediciones", "detalle", array('noVista' => 'noVista', 'id' => $equipo['equi_id'])); ?>"><i class="mdi-action-find-in-page tiny"></i></a></td>
                    </tr>
            <?php } ?>
            </tbody>
            </div>
            
        </table>
        
        <div class="modal close" id="modal_detalle_mediciones" style="z-index: 1003; display: none; 
     opacity: 0; transform: scaleX(0.7); top: 341.06px; height:auto; width: 75%;" >
            <div class="modal-content" id="model-data"></div>
        </div>
        <?php  $paginado->render() ?>
        
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
=======
        <div id="right-search" class="row">
            <form class="col s12">
                <div class="input-field">
                    <i class="mdi-action-search prefix"></i>
                    <input type="text" class="validate" id="buscarMed" name='buscarMed' class="header-search-input z-depth-2" data-url="<?php echo crearUrl("Mediciones", "Mediciones", "buscador", array('noVista' => "noVista")) ?>" />
                    <label for="icon_prefix" class="active">Buscador de Mediciones</label>
                </div>
            </form>
        </div>
        
        <div id="listadoMediciones">
            
        </div>
>>>>>>> 6d233e9926c3d920cbc0afd4f665ecbc1c0d25e8
