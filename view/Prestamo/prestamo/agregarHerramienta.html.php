<tr id="herramienta-<?php echo $agregarHer['her_id'] ?>">
    <input type="hidden" value="<?php echo $agregarHer['her_id'] ?>" name="herramientasDetalle[<?php echo $agregarHer['her_id'] ?>]">
        <input type="hidden" value="<?php echo $id ?>" name="herramientasDetalle[<?php echo $agregarHer['her_id'] ?>][her_id]">
    <input type="hidden" value="<?php echo $cantS ?>" name="herramientasDetalle[<?php echo $agregarHer['her_id'] ?>][cantidad_solicitada]">
    <input type="hidden" value="<?php echo $cantE ?>" name="herramientasDetalle[<?php echo $agregarHer['her_id'] ?>][cantidad_entregada]">
    <input type="hidden" value="<?php echo $obser ?>" name="herramientasDetalle[<?php echo $agregarHer['her_id'] ?>][observaciones]">
    
    <td><input type="hidden" value="<?php echo $agregarHer['her_id'] ?>" name="id_herramienta[<?php echo $agregarHer['her_id'] ?>]"><?php echo $agregarHer['her_id'] ?></td>
    <td><?php echo $agregarHer['her_nombre'] ?></td>
    <td><input type="hidden" value="<?php echo $cantS ?>" name="cantidadSolicitada" /><?php echo $cantS ?></td>
    <td><input type="hidden" value="<?php echo $cantE ?>" name="cantidadEntregada" /><?php echo $cantE ?></td>
    <td><input type="hidden" value="<?php echo $obser ?>" name="observaciones" /><?php echo $obser ?></td>
    <td><a href="#" class="removeFila btn-floating waves-effect waves-light red darken-4 close" data-id="<?php echo $agregarHer['her_id'] ?>"><i class="mdi-action-delete small"></i></a></td>
</tr>
