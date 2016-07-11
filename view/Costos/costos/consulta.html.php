
<div id = "striped-table">
    <div class = "row">
        <div class = "col s12 m8 l9">
            <table class = "striped">
                <thead>
                    <tr>
                        <th data-field = "ot_id">OT ID</th>
                        <th data-field = "fecha_ini">Fecha Inicio</th>
                        <th data-field = "fecha_fin">Fecha Fin</th>
                        <th data-field = "centro">Centro</th>
                        <th data-field = "equipo">Equipo</th>
                        <th data-field = "equipo">Mantenedor</th>
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
                            <td><?php echo $reporte['equi_noplaca'] ?></td>
                            <td><?php echo $reporte['mantenedor'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>