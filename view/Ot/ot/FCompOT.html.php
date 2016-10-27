<tr id="fcomp-<?php echo $componentefila['comp_id'] ?>" >
    <input type="hidden" value="<?php echo $componentefila['comp_id']; ?>" name="codcomponente[]">
    <td><input type="hidden" value="<?php echo $componentefila['comp_descripcion']; ?>" ><?php echo $componentefila['comp_descripcion']; ?></td>    
    <td><input type="hidden" value="<?php echo $componentefila['comp_valor'] ?>" ><?php echo $componentefila['comp_valor']; ?></td>
    <td><input type="text" style="width: 80px;" name="cantcomp[]" class="validate" data-error=".errorTxt11"></td>                
    <td><a href="#" class="Componenteremove " data-id="<?php echo $componentefila['comp_id'] ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
</tr>
