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
            foreach ($componetes as $componente) {
                ?>
                <tr>
                    <td><?php echo $componente['comp_descripcion'] ?></td>
                    <td>
                        <a class="btn-floating waves-effect waves-light codinsumoOT" data-id="<?php echo $componente['comp_id'] ?>"
                            data-url="<?php echo crearUrl("Ot", "ot", "FilaComponente", array('noVista'=>'noVista')) ?>">
                            <i class="teal mdi-action-add-shopping-cart"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>