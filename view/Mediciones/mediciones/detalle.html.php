<table style="border: 1px solid black;">
    <tr>
        <th style="border: 1px solid black;">
    <center><img src="<?php echo addLib('img/sena/logo_sena.jpg') ?>" style="width: 100px;"></center>
        </th>
        <th style="border: 1px solid black;">
    <center><h5>Historial de Mediciones del equipo: <b><code><?php echo $equi_nombre ?></code></b></h5></h5></center>
        </th>
        <td style="border: 1px solid black;">
                <b>Fecha:</b> <?php
                $time = time();
                echo "<font face='arial'>" . date("d-m-Y");
                ?><br>
                <b>Usuario: </b><?php echo $_SESSION['login']['rol_nombre']; ?>
        </td>
    </tr>

</tr>
</table>

<div class="title center"><h5></div>
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
            <?php foreach ($totalPorMedidores as $totalPorMedidor) { ?>
                <b><font color="Navy"><?php echo $totalPorMedidor['total'] . " " . $totalPorMedidor['medidor']; ?></font>
                </b>
                <br>        
            <?php } ?>
        </center>
        </tbody>

</table>

<div class="row center-align fixed">
    <br>
</div>

<div class="ajax_paginate">
    <?php $paginado->render() ?>
</div>