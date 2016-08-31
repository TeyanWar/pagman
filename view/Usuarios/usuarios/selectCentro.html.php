<option value="" disabled selected>Seleccione</option>
<?php foreach ($centros as $subSelect) { ?>
    <option value="<?php echo $subSelect['cen_id'] ?>"><?php echo $subSelect['cen_nombre'] ?></option>
<?php } ?>