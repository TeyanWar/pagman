<option value="" disabled selected>Seleccione</option>
<?php foreach ($subSelects as $subSelect) { ?>
    <option value="<?php echo $subSelect['cen_id'] ?>"><?php echo $subSelect['cen_nombre'] ?></option>
<?php } ?>