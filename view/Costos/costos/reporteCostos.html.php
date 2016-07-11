
<?php if (isset($reportes) && count($reportes) > 0) { ?>
    <table class="striped">
        <thead>
            <tr>
                <th data-field="ot_id">OT ID</th>
                <th data-field="fecha_ini">Fecha Apertura</th>
                <th data-field="fecha_fin">Fecha Cierre</th>
                <th data-field="centro">Centro</th>
                <th data-field="equipo">Equipo</th>
                <th data-field="equipo">Mantenedor</th>
            </tr> 
        </thead>
        <tbody>
            <?php
            foreach ($reportes as $reporte) {
                ?>
                <tr>
                    <td><?php echo $reporte['ot_id'] ?></td>
                    <td><?php echo $reporte['ot_fecha_ini'] ?></td>
                    <td><?php echo $reporte['ot_fecha_fin'] ?></td>
                    <td><?php echo $reporte['centro'] ?></td>
                    <td><?php echo $reporte['equi_nombre'] ?></td>
                    <td><?php echo $reporte['mantenedor'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    No hay resultados
<?php } ?>
               