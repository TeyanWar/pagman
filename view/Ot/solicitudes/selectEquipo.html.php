<option value="" disabled selected>Seleccione</option>
<?php foreach ($subSelects as $subSelect) { ?>
    <option value="<?php echo $subSelect['equi_id'] ?>"><?php echo $subSelect['equi_nombre'] ?></option>
<?php } ?>