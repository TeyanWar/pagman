<div class="title center"><h5>DETALLE DEL EQUIPO SELECCIONADO</h5></div><br>
<table class="striped col s6">
    <thead>
        <tr>
            <th>Numero de Placa</th><td><?php echo $equipo['equi_id']; ?></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Nombre del Equipo: </th><td><?php echo $equipo['equi_nombre']; ?></td>
        </tr>
        <tr>
            <th>Nombre del Encargado:</th><td><?php echo $equipo['per_nombre']; ?></td>
        </tr>
        <tr>
            <th>Número de Serie:</th><td><?php echo $equipo['equi_serie']; ?></td>
        </tr>
        <tr>
            <th>Modelo</th><td><?php echo $equipo['equi_modelo']; ?></td>
        </tr>
    </tbody>
</table>
<table class="striped col s6">
    <thead>
        <tr>
            <th>Foto del Equipo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <?php
                $url_file = "media/img/Equipos/" . $equipo['equi_foto'];
                if (!file_exists($url_file)) {
                    echo "<code><b>Sin imagen</b></code>";
                } else {
                    ?>
        <center>
            <a class = "fancybox" href = "<?php echo addLib("media/img/Equipos/" . $equipo['equi_foto']); ?>"><img src = "<?php echo addLib("media/img/Equipos/" . $equipo['equi_foto']); ?>" width = "200" height = "200"></a>
        </center>
    <?php }
    ?>
</td>

</tr>   
</tbody>
</table>
<table class="striped col s12" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>Estado del Equipo</th>
            <th>Marca</th>
            <th>Tipo de Equipo</th>
            <th>Ubicación en el Centro</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $equipo['est_descripcion'] ?></td>
            <td><?php echo $equipo['equi_marca']; ?></td>
            <td><?php echo $tipoEquipo['tequi_descripcion'] ?></td>
            <td><?php echo $equipo['equi_ubicacion']; ?></td>
        </tr>

    </tbody>
</table>
<table class="striped col s12" style="margin-top: 20px;">
    <thead>
        <tr>
            <th>Fecha de Compra</th>
            <th>Fecha de Inatalcion</th>
            <th>Fecha de Garantía</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $equipo['equi_fecha_compra']; ?></td>
            <td><?php echo $equipo['equi_fecha_instalacion']; ?></td>
            <td><?php echo $equipo['equi_vence_garantia']; ?></td>
        </tr>
    </tbody>
</table>