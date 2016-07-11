<h5 id="tit_det_rol" data-rol_id="<?php echo $rol_id ?>" class="center">Detalle del rol</h5>
<p><b>Nombre:</b> <?php echo $rol_nombre ?></p>
<p><b>Descripcion:</b> <?php echo $rol_descripcion ?></p>
<!--<div class="divider"></div>-->
<hr />
<p><b>Permisos asignados sobre módulos</b></p>
<?php
$cont = 0;
foreach ($registros as $pos => $registro) {

    if ($funciones == "") {
        $funciones.=$registro['func_descripcion'];
    } else {
        $funciones.=", " . $registro['func_descripcion'];
    }

    //Imprimo el módulo actual
    if ($registro['mod_nombre'] != $modActual) {
        $modActual = $registro['mod_nombre'];
//        echo "<div class='row'>";
        if (($cont % 2) == 0) {
            echo "<div class='row'>";
        }
        echo "<div class='col s6'>";
        echo "<p style='color:#006064'><b>$modActual</b></p>";
        echo "<div class='divider'></div>";
        $cont++;
    }
    //Imprimo los controladores del módulo actual

    if (isset($registros[($pos + 1)])) {
        if ($registro['cont_nombre'] != $registros[($pos + 1)]['cont_nombre']) {
            $contActual = $registro['cont_nombre'];
            echo "<b>" . ucwords($contActual) . "</b>: <em> $funciones </em><br>";
            $funciones = "";
        }
    } else {
        echo "<b>" . ucwords($registro['cont_nombre']) . "</b>: <em> $funciones </em><br>";
    }

    if (isset($registros[($pos + 1)])) {
        if ($modActual != $registros[($pos + 1)]['mod_nombre']) {
            echo "</div>";
            if (($cont % 2) == 0) {
                echo "</div>";
            }
        }
    }
    ?>
<?php } ?>


