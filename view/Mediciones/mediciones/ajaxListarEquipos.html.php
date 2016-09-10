<tr id="row-<?php echo $consecutivo ?>">
    <td>
        <?php
        $count = 1;
        echo $count++
        ?>
    </td>

    <td><?php echo $equi_id ?>
        <input type="hidden" value="<?php echo $_POST['equi_id']; ?>" name="medidas[<?php echo $consecutivo ?>][equi_id]"></td>

    <td><?php echo $equi_nombre ?>
        <input type="hidden" value="<?php echo $_POST['equi_nombre']; ?>" name="medidas[<?php echo $consecutivo; ?>][equi_nombre]"></td>

    <td><?php echo $medicion ?>
        <input type="hidden" value="<?php echo $_POST['medicion']; ?>" name="medidas[<?php echo $consecutivo; ?>][medicion]"></td>

    <td><?php
        foreach ($medidores as $medidor) {
            if ($medidor['tmed_id'] == $tipoMedidor) {
                $tipoMedidor = $medidor['tmed_acronimo'];
                $tipoMedidorId = $medidor['tmed_id'];
            }
        }
        echo $tipoMedidor
        ?>
        <input type="hidden" value="<?php echo $_POST['tipo_medidor']; ?>" name="medidas[<?php echo $consecutivo; ?>][tipo_medidor]"></td>

    <td><?php echo $fecha ?>
        <input type="hidden" value="<?php echo $_POST['fecha']; ?>" name="medidas[<?php echo $consecutivo; ?>][fecha]"></td>

    <td><a href="#" class="remove" data-id="<?php echo $consecutivo ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
</tr>