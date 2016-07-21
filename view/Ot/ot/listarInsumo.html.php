<table class="striped card-panel">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Acciones</th>                
        </tr>        
    </thead>

    <tbody> 
        <?php
        foreach ($listarInsumo as $insumo) {
            ?>
            <tr>
                <td><input type="hidden" name="id[<?php echo $insumo['ins_id'] ?>]" value="<?php echo $insumo['ins_id'] ?>"><?php echo $insumo['ins_id'] ?></td>
                <td><?php echo $insumo['ins_nombre'] ?></td>
                <td><input type="text" id="cantidad-<?php echo trim($insumo['ins_id']) ?>" name="insumo[<?php $insumo['ins_id'] ?>][cantidad]" placeholder="Ingrese cantidad"></td>
                <td><a class="agregarInsumo" data-id="<?php echo $insumo['ins_id'] ?>" data-url="<?php echo crearUrl('Ot', 'ot', 'agregarElementos', array('noVista'=>'noVista')) ?>"> <i class="btn-floating waves-effect waves-light teal mdi-content-add small"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
