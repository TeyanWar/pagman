<tr>
    <td>
        <?php 
            $count = 1;
            echo $count++
        ?>
    </td>
    
    <td><?php echo $equi_id ?>
    <input type="hidden" value="<?php echo $_POST['equi_id'];?>" name="medidas[<?php echo $_POST['equi_id'];?>][equi_id]"></td>
    
    <td><?php echo $equi_nombre ?>
    <input type="hidden" value="<?php echo $_POST['equi_nombre'];?>" name="medidas[<?php echo $_POST['equi_id'];?>][equi_nombre]"></td>
    
    <td><?php echo $medicion ?>
    <input type="hidden" value="<?php echo $_POST['medicion'];?>" name="medidas[<?php echo $_POST['equi_id'];?>][medicion]"></td>
    
    <td><?php echo $fecha ?>
    <input type="hidden" value="<?php echo $_POST['fecha'];?>" name="medidas[<?php echo $_POST['equi_id'];?>][fecha]"></td>
    
    <td><a href="#" class="remove " data-id="<?php echo $_POST['equi_id'];?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
</tr>


