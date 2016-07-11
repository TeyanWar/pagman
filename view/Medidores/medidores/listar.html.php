<div class="card-panel">
    <div class="container">
        <h4 class="header2">Listado de t&iacute;pos de medidor</h4>
        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Medidores</a></li>
            <li class="active">Listado T&iacute;pos de medidor</li>
        </ol>
        <!--Fin rastro de miga-->

        <!--Inicio mensaje de campos obligatorios-->
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Recuerde que si va modificar un t&iacute;po de medidor, el campo Acr&oacute;nimo s&oacute;lo permite 3 caracteres</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <!--Fin mensaje de campos obligatorios-->
        
        <div id="bordered-table">
            <div class="row">
                <table class="striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre Medidor</th>
                            <th>Acr&oacute;nimo</th>
                            <th>Descripci&oacute;n</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($medidores as $medidor) {
                            ?>
                            <tr>
                                <td><?php echo $count++ ?></td>
                                <td><?php echo $medidor['tmed_nombre'] ?></td>
                                <td><?php echo $medidor['tmed_acronimo'] ?></td>
                                <td><?php echo $medidor['tmed_descripcion'] ?></td>
                                <td><?php echo $medidor['tmed_estado'] ?></td>
                                
                                <td><a class="btn-floating waves-effect waves-light modal-trigger teal" 
                               href="#editar" data-url="<?php echo crearUrl('medidores', 'medidores', 'editar', array('noVista' => 'noVista', 'id' => $medidor['tmed_id']));?>"> 
                                <i class="mdi-content-create small"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
        </div>
        
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