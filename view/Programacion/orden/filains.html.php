
<tr id="filain-<?php echo $insumofila['ins_id'] ?>">
    <input type="hidden" value="<?php echo $insumofila['ins_id']; ?>" name="idns[]">
    <td><input type="hidden" value="<?php echo $insumofila['ins_nombre']; ?>" ><?php echo $insumofila['ins_nombre']; ?></td>
    <td><input type="hidden" value="<?php echo $insumofila['ins_descripcion']; ?>" ><?php echo $insumofila['ins_descripcion']; ?></td>
    <td><input type="hidden" value="<?php echo $insumofila['ins_valor'] ?>" ><?php echo $insumofila['ins_valor']; ?></td>
    <td><input type="hidden" value="<?php echo $insumofila['umed_descripcion']; ?>" ><?php echo $insumofila['umed_descripcion']; ?></td>
    <td><input type="text" style="width: 80px;" name="cantidad[]" class="validate" data-error=".errorTxt99"></td>                
    <td><a href="#" class="remove " data-id="<?php echo $insumofila['ins_id'] ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
</tr>
