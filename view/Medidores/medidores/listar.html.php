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
                            <th>Editar</th>
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
                                <td><?php if($medidor['estado'] ==""){
                                    $medidor['tmed_estado']='Activo';
                                }else{
                                    $medidor['tmed_estado']='Inactivo';
                                }
                                echo $medidor['tmed_estado'];
                                ?>
                                </td>
                                <td>
                                    <a class="btn-floating teal modal-trigger editarMedidor" 
                                        href="#editarMedidor" data-url="<?php echo crearUrl('medidores', 'medidores', 'editar', array('noVista', 'id' => $medidor['tmed_id']));?>"> 
                                        <i class="mdi-content-create small"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            
        </div>

<!--        <div class="modal" id="editar">
            <div class="modal-content ">
            </div> 
        </div>-->
        
        <?php $paginado->render();?>