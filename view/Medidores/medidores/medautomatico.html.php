<div class="col s1">
    <label for="numerotim">Numero</label>
    <input id="numerotim" type="text" class="validate" length="2" name="numerotim" data-error=".errorTxt7">
</div>
<div class="col s3">
    <label>Tiempo</label>
    <select class="error browser-default" id="tiempo" name="tiempo" data-error=".errorTxt8">
        <option value="" disabled selected>Seleccione</option>
        <?php 
            foreach($tiempo as $tm){
            echo "<option value='".$tm["tm_id"]."'>". $tm["tm_nombre"] . "</option>";
            }
        ?>
    </select>
</div>
