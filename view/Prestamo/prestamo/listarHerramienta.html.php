<table class="centered card-panel col s6">
    <thead>
        <tr>
            <th>#</th>
            <th>N&uacute;mero de placa</th>
            <th>Nombre Herramienta</th>
            <th>Cant. solicitada</th>
            <th>Cant. entregada</th>
            <th>Obser. especificas</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($listarHerramienta as $herramienta) {
            ?>
            <tr>
                <td><?php echo $count++ ?></td>
                <td><input type="hidden" value="<?php echo $herramienta['her_id'] ?>" name="id[<?php echo $herramienta['her_id'] ?>]"><?php echo $herramienta['her_id'] ?></td>
                <td><?php echo $herramienta['her_nombre'] ?></td>
                <td><input type="text" id="detph_cant_solicita-<?php echo trim($herramienta['her_id']) ?>" name="herramientas[<?php echo $herramienta['her_id'] ?>][Cant. solicitada]" placeholder="Digite la cantidad solicitada"></td>
                <td><input type="text" id="detph_cant_entrega-<?php echo trim($herramienta['her_id']) ?>" name="herramientas[<?php echo $herramienta['her_id'] ?>][Cant. entregada]" placeholder="Digite la cantidad entregada"></td>
                <td><input type="text" id="observaciones-<?php echo trim($herramienta['her_id']) ?>" name="herramientas[<?php echo $herramienta['her_id'] ?>][observaciones]" placeholder="Digite las observaciones"></td>
                <td><a href="#" data-id="<?php echo $herramienta['her_id'] ?>" id="agregarHerramienta" data-url="<?php echo crearUrl('Prestamo', 'prestamo', "agregarHerramienta", array("noVista" => "noVista", "id" => $herramienta['her_id'])) ?>"><i class="medium mdi-content-add-circle-outline"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>