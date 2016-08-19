<div class="title center"><h5>Historial de Mediciones de <?php echo $detalleOrdenes[0]['equi_nombre'] ?></h5></div>
<br>
<table class="highlight center striped bordered">
    <div class="row">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Medida Tomada</th>
                <th>Tipo Medida</th>
                <th>Equipo</th>
                <th>Nombre Encargado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 1;
            $totalMedida = 0;
            foreach ($detalleOrdenes as $detalleOrden) {
                $totalMedida = $totalMedida + $detalleOrden['ctrmed_medida_actual'];
                explodeFecha($detalleOrden['ctrmed_fecha']);
                $fecha = getFecha();
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $fecha ?></td>
                    <td><?php echo $detalleOrden['ctrmed_medida_actual'] ?></td>
                    <td><?php echo $detalleOrden['tmed_acronimo'] ?></td>
                    <td><?php echo $detalleOrden['equi_nombre'] ?></td>
                    <td><?php echo $detalleOrden['per_nombre'] ?></td>
                </tr>
            <?php } ?>
        <center><b><font color="Navy"><?php echo "Medida Total :" . $totalMedida . " " . $detalleOrden['tmed_acronimo']; ?></font></b></center><br>        
        </tbody>
    </div>

</table>

<div class="row center-align fixed">
    <br>
</div>
<?php $paginado->render() ?>