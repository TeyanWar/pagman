<tr id="row-<?php //echo //$consecutivo ?>">
    <td>
        <?php
        $count = 1;
        echo $count++
        ?>
    </td>

    <td><?php echo $cp_id ?>
        <input type="hidden" value="<?php echo $_POST['cp_id']; ?>" name="camposPersonalizados[<?php echo $consecutivo ?>][cp_id]"></td>

    <td><?php echo $cp_nombre ?>
        <input type="hidden" value="<?php echo $_POST['cp_nombre']; ?>" name="camposPersonalizados[<?php echo $consecutivo; ?>][cp_nombre]"></td>

    <td>
        
    <td><a href="#" class="remove" data-id="<?php echo $consecutivo ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
    </td>
    <td><a href="#" class="remove" data-id="<?php echo $consecutivo; ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
</tr>