<div class="title center"><h5>Historial de Mediciones del equipo: <b><code><?php echo $equi_nombre ?></code></b></h5></div>
<br>
<table class="highlight center striped bordered">
    <div class="row">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Medida Tomada</th>
                <th>Tipo Medida</th>
                <th>Encargado</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $totalMedida = 0;
            foreach ($detalleMediciones as $detalleMedicion) {
                $totalMedida = $totalMedida + $detalleMedicion['valor_medicion'];
                explodeFecha($detalleMedicion['fecha_medicion']);
                $fecha = getFecha();
                ?>
                <tr>
                    <td><?php echo $paginado->count++ ?></td>
                    <td><?php echo $fecha ?></td>
                    <td><?php echo $detalleMedicion['valor_medicion'] ?></td>
                    <td><?php echo $detalleMedicion['tipo_medida'] ?></td>
                    <td><?php echo $detalleMedicion['encargado'] ?></td>
                </tr>
            <?php } ?>
        <center> 
            <font color="Navy">Total por tipo de medidor</font><br>
            <?php foreach($totalPorMedidores as $totalPorMedidor){?>
                <b><font color="Navy"><?php echo $totalPorMedidor['total'] . " " . $totalPorMedidor['medidor']; ?></font>
                </b>
        <br>        
            <?php }?>
        </center>
        </tbody>

</table>

<div class="row center-align fixed">
    <br>
</div>

<div class="ajax_paginate">
    <?php $paginado->render() ?>
</div>