<option value="" disabled selected>Seleccione</option>
<?php foreach ($subSelects as $subSelect) { ?>
    <option value="<?php echo $subSelect['reg_id'] ?>"><?php echo $subSelect['reg_nombre'] ?></option>
<?php } ?>