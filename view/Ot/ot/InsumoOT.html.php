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
            foreach ($insumos as $insu) {
                ?>
                <tr>
                    <td><?php echo $insu['ins_nombre'] ?></td>
                    <td>
                        <a class="btn-floating waves-effect waves-light codinsumoOT" data-id="<?php echo $insu['ins_id'] ?>"
                            data-url="<?php echo crearUrl("Ot", "ot", "FilaInsumo", array('noVista'=>'noVista')) ?>">
                            <i class="teal mdi-action-add-shopping-cart"></i>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>