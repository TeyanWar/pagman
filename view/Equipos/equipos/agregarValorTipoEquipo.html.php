<center><h5>AGREGAR VALOR A LOS CAMPOS PERSONALIZADOS</h5></center><br>
<table class="striped">
    <thead>
        <tr>
            <th data-field="cp_id">Código del Campo</th>
            <th data-field="name">Nombre del Campo</th>
            <th data-field="valor">Valor a Agregar</th>
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