
<tr id="fila-<?php echo $_POST['cod'] ?>">
    <td><input type="hidden" value="<?php echo $_POST['cod']; ?>" name="placas[]"><?php echo $_POST['cod']; ?></td>
    <td><input type="hidden" value="<?php echo $_POST['equi']; ?>" name="equipos[]"><?php echo $_POST['equi']; ?></td>
    <td><input type="hidden" value="<?php echo $compo['comp_id'] ?>" name="componentes[]"><?php echo $co; ?></td>
    <td><input type="hidden" value="<?php echo $tareas['tar_id']; ?>" name="tareas[]"><?php echo $tarea; ?></td>
    <td><input type="hidden" value="<?php echo $tipo['ttra_id']; ?>" name="tipos[]"><?php echo $ti; ?></td>
    <td><input type="hidden" value="<?php echo $_POST['hora']; ?>" name="horas[]"><?php echo $_POST['hora']; ?></td>
    <td><input type="hidden" value="<?php echo $_POST['fre']; ?>" name="frecuencias[]"><?php echo $_POST['fre']; ?></td>
    <td><input type="hidden" value="<?php echo $medidores['tmed_id']; ?>" name="medidores[]"><?php echo $medi; ?></td>                  
    <td><input type="hidden" value="<?php echo $prioridades['priotra_id']; ?>" name="prioridades[]"><?php echo $pri; ?></td>
    <td><a href="#" class="remove " data-id="<?php echo $_POST['cod'] ?>"><i class="mdi-action-highlight-remove small" ></i></a></td>
    <td><input type="hidden" value="<?php echo $_POST['tario']; ?>" name="comentario[]"></td>
</tr>




