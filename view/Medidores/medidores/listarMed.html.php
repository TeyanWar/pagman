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
                        foreach ($medidores as $medidor) {
                            ?>
                            <tr>
                                <td><?php echo $paginado->count++ ?></td>
                                <td><?php echo $medidor['tmed_nombre'] ?></td>
                                <td><?php echo $medidor['tmed_acronimo'] ?></td>
                                <td><?php echo $medidor['tmed_descripcion'] ?></td>
                                <td><?php if($medidor['tmed_estado'] ==0){
                                    $medidor['tmed_estado']='Activo';
                                }else{
                                    $medidor['tmed_estado']='Inactivo';
                                }
                                echo $medidor['tmed_estado'];
                                ?>
                                </td>
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
        
        <?php $paginado->render();?>