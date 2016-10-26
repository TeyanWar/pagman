<center>
    <h5>
        Campos Personalizados del Tipo de Equipo: <b><code><?php echo $tEquipo['tequi_descripcion']; ?></code></b>
    </h5>
</center>
<table class="striped">
    <thead>
        <tr>
            <th>#</th>
            <th data-field="name">Código del campo</th>
            <th data-field="price">Nombre/Descripción del campo</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <?php
//die(print_R($consulta));
//echo $consultaEquipo['tequi_id'];
    ?>

    <tbody>
        <?php foreach ($sqlDetalle as $tipoEquipo) { ?>
            <tr>
                <?php //die(print_r($tipoEquipo['cp_nombre']));   ?>
                <td><?php echo $paginado->count++ ?></td>
                <td><?php echo $tipoEquipo['cp_id']; ?></td>
                <td><?php echo $tipoEquipo['cp_nombre']; ?></td>
                <td><?php echo $tipoEquipo['cantidad']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="ajax_paginate">
    <?php $paginado->render() ?>
</div>
