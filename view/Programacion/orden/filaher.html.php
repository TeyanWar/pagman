
<tr id="filaher-<?php echo $herrafila['her_id'] ?>">
    <input type="hidden" value="<?php echo $herrafila['her_id']; ?>" name="idher[]">
    <td><input type="hidden" value="<?php echo $herrafila['her_nombre']; ?>" ><?php echo $herrafila['her_nombre']; ?></td>
    <td><input type="hidden" value="<?php echo $herrafila['her_descripcion']; ?>" ><?php echo $herrafila['her_descripcion']; ?></td>
    <td><input type="text" style="width: 80px;" name="cantidadher[]" class="validate" data-error=".errorTxt90"></td>                
    <td><a href="#" class="remoher " data-id="<?php echo $herrafila['her_id'] ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
</tr>
