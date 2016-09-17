<table class="striped centered" style="width: 500px; margin-left: 100px; margin-bottom: 30px">
    <thead>
        <tr>
            <th colspan="3"><h5><code>CAMPOS PERSONALIZADOS <?php echo $nombreEquipo['tequi_descripcion']; ?></code></h5></th>
        </tr>
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Valor a asignar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($consultaTipoEquipo as $tipoEquipo) { ?>
            <tr>
                <td>
                    <?php echo $tipoEquipo['cp_id']; ?></td>
                <td><?php echo $tipoEquipo['cp_nombre']; ?></td>
                <td><input type="text" class="col s10"/></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="ajax_paginate">
    <?php $paginado->render() ?>
</div>