<div class="card-panel">
    <table class="bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Agregar</th>                
            </tr>        
        </thead>

        <tbody> 
            <?php
            foreach ($herramientas as $herra) {
                ?>
                <tr>
                    <td><?php echo $herra['her_nombre'] ?></td>
                    <td>
                        <a class="btn-floating waves-effect waves-light carherra" data-id="<?php echo $herra['her_id'] ?>"
                           data-url="<?php echo crearUrl("Ot", "ot", "añadirFher", array('noVista'=>'noVista')) ?>">
                            <i class="teal mdi-action-add-shopping-cart"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>