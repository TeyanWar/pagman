<tr id="fher-<?php echo $herrafila['her_id'] ?>">
    <input type="hidden" value="<?php echo $herrafila['her_id']; ?>" name="codher[]">
    <td><input type="hidden" value="<?php echo $herrafila['her_nombre']; ?>" ><?php echo $herrafila['her_nombre']; ?></td>
    <td><input type="hidden" value="<?php echo $herrafila['her_descripcion']; ?>" ><?php echo $herrafila['her_descripcion']; ?></td>
    <td><input type="text" style="width: 80px;" name="cantherra[]" class="validate" data-error=".errorTxt12"></td>                
    <td><a href="#" class="heremove " data-id="<?php echo $herrafila['her_id'] ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
</tr>
