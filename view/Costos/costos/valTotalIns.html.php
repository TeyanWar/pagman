<div class="card-panel"> 
    <div class="container">
        <h4>COSTOS</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Costos</a></li>
            <li><a href="#">Reportes</a></li>
            <li class="active">Listado de reportes</li>
        </ol>


        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p>
                    <i class="mdi-action-info-outline"></i>
                    <strong>INFORMACI&Oacute;N GENERAL :</strong><br />
                    En esta sección podrá ver, el valor de una Orden de Trabajo y de igual manera el valor de los insumos.<br />

                </p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>

    <!--card Valor Insumo start-->
    <div id="card-stats">
        <div class="row">
            <div class="col s12 m8 l6">
                <div class="card hoverable">
                    <div class="card-move-up waves-effect waves-block waves-light">
                        <div class="move-up cyan darken-1">
                            <div>
                                <span class="chart-title white-text"><h5>VALOR TOTAL DE LOS INSUMOS</h5></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <!--<a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>-->
                        <div class="col s6 m12 20" style="margin-bottom: -70px;">
                            <table class="striped">
                                <thead>             
                                    <tr>
                                        <th>Referencia</th>
                                        <th>Nombre</th>
                                        <th colspan="2">valor Unidad</th> 
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $count = 1;
                                    foreach ($insumo as $insumos) {
                                        ?>
                                        <tr>
                                            <td><?php echo $insumos['ins_id'] ?></td>
                                            <td><?php echo $insumos['ins_nombre'] ?></td>
                                            <td><?php echo "$ ".number_format($insumos['ins_valor'],0,',','.')?></td>
                                        </tr>
                                    <?php }
                                    ?> 
                                </tbody>
                            </table>
                            <hr>
                            <?php
                            foreach ($totalInsumo as $totalInsumos) {
                                ?>

                                <?php echo "<b>VALOR TOTAL:</b><font color='blue' size='4px' style='margin-left:80px;'>$ ".number_format($totalInsumos['sumaTotal'],0,',','.'); ?></font></code>
                                <?php $paginado->render(); ?>
                            <?php } ?>
                        </div>

                        <div class="col s12 m5 l6">
                            <div class="trending-bar-chart-wrapper">
                                <canvas id="trending-bar-chart" height="90">
                                </canvas>                                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--</div><!--Row tabla de insumos--->
            <!--</div><!--Card.stats Tabla de insumos-->

            <!--card Valor Orden de Trabajo start-->
            <div id="card-stats">
                <div class="row">
                    <div class="col s12 m8 l6">
                        <div class="card hoverable">
                            <div class="card-move-up waves-effect waves-block waves-light">
                                <div class="move-up cyan darken-1">
                                    <div>
                                        <span class="chart-title white-text"><h5>TOTAL DE INSUMOS EN LAS ORDENES DE TRABAJO</h5></span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <!--<a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>-->
                                <div class="col s6 m12 20" style="margin-bottom: -70px;">
                                    <table class="striped">
                                        <thead>             
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Fecha de creacion</th>
                                                <th>Encargado</th>
                                                <th>Insumo Utilizado</th>
                                                <th>Cantidad</th>
                                                <th>Valor de la Ot</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $valorTotal = 0;
                                            $valorParcial = 0;
                                            $count = 1;
                                            foreach ($OrdenTrabajo as $Orden) {
                                                $valorFinal = 0;
                                                $valorTotal = $Orden['ins_cantidad'] * $Orden['ins_valor'];
                                                $valorParcial = $valorTotal + $valorParcial;
                                                ?>
                                                <tr>
                                                    <td><?php echo $Orden['ot_id'] ?></td>
                                                    <td><?php echo $Orden['ot_fecha_creacion'] ?></td>
                                                    <td><?php echo $Orden['per_nombre'] ?></td>
                                                    <td><?php echo $Orden['ins_nombre']; ?></td>
                                                    <td><?php echo $Orden['ins_cantidad']; ?></td>
                                                    <td><?php echo "$ ".number_format($valorTotal,0,',','.')?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                    </table>
                                    <hr>
                                    <b style="margin-left: -20px;">TOTAL </b>
                                    <b style="margin-left: 50px;">Ordenes de Trabajo; </b><font color='blue' size='4px'><?php echo ot(); ?></font>
                                    <?php
                                    $cantidadInsu = 0;
                                    $cantidadIn = 0;
                                    foreach ($sqlTotalInsumo as $totalInsumos) {
                                        $cantidadInsu = $totalInsumos['ins_cantidad'] + $cantidadInsu;
                                    }
                                    ?>
                                    <font color='blue' size='4px' style='margin-left: 150px;'><?php echo $cantidadInsu; ?></font>
                                    <b style="margin-left: 30px;">
                                        <?php
                                        $valorTo = 0;
                                        $valorParc = 0;
                                        foreach ($sqlTotalInsumo as $totalInsumos) {
                                            $valorFin = 0;
                                            $cantidadInsu = $totalInsumos['ins_cantidad'] + $cantidadInsu;
                                            $valorTo = $totalInsumos['ins_cantidad'] * $totalInsumos['ins_valor'];
                                            $valorParc = $valorTo + $valorParc;
                                        }
                                        ?>
                                    </b><font color='blue' size='4px'>
                                    <?php echo "$ ".number_format($valorParc,0,',','.')?></font>
                                </div>

                                <div class="col s12 m5 l6">
                                    <div class="trending-bar-chart-wrapper">
                                        <canvas id="trending-bar-chart" height="90">
                                        </canvas>                                                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--Card Panel-->
    </div>
</div>

