<div class="row">
    <form class="col s12" role="form" action="<?php echo crearUrl("equipos", "equipos", "postEditar") ?>" method="post">
        <div class="row">
            <div class="input-field col s4">
                <input readonly type="text" id="equi_noplaca" value="<?php echo $equipo['equi_id']; ?>">
                <label for="equi_noplaca" class="active">N.Placa:</label>
            </div>
            <div class="input-field col s4">
                <select class="select2" name="per_id">
                    <?php
                    foreach ($personas as $persona) {
                        if($persona['per_id'] == $equipo['per_id']){
                            echo "<option value='" . $persona['per_id'] . "' selected>" . $persona['per_nombre'] . "</option>";
                        }else{
                            echo "<option value='" . $persona['per_id'] . "'>" . $persona['per_nombre'] . "</option>";
                        }
                        
                    }
                    ?>
                </select>
                <label for="Persona" class="">(*) Seleccion al encargado  </label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi-nombre" value="<?php echo $equipo['equi_nombre']; ?>">
                <label for="equi-nombre" class="active">Nombre del Equipo:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <select class="select2" name="equi_estado">
                    <?php
                    foreach ($estados as $estado) {
                        if($estado['est_id'] == $equipo['est_id']){
                            echo "<option value='" . $estado['est_id'] . "' selected>" . $estado['est_descripcion'] . "</option>";
                        }else{
                            echo "<option value='" . $estado['est_id'] . "' >" . $estado['est_descripcion'] . "</option>";
                        }
                        
                    }
                    ?>
                </select>
                <label for="Estado_equipo" class="">Elija estado del equipo</label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_modelo" value="<?php echo $equipo['equi_modelo']; ?>">
                <label for="equi_modelo" class="active" >Modelo:</label>

            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_noserie" value="<?php echo $equipo['equi_serie']; ?>">
                <label for="equi_noserie" class="active">No. Serie:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="text" name="equi_fabricante" value="<?php echo $equipo['equi_fabricante']; ?>">
                <label for="equi_fabricante" class="active" >Fabricante:</label>
            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_marca" value="<?php echo $equipo['equi_marca']; ?>">
                <label for="equi_marca" class="active" >Marca:</label>

            </div>
            <div class="input-field col s4">
                <input type="text" name="equi_ubicacion" value="<?php echo $equipo['equi_ubicacion']; ?>">
                <label for="equi_ubicacion" class="active">Ubicacion:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input type="date" value="<?php echo $equipo['equi_fecha_compra']; ?>" name="equi_fecha_compra">
                <label for="equi_fecha_compra" class="active">Fecha De Compra  :</label> 

            </div>
            <div class="input-field col s4">
                <input type="date" value="<?php echo $equipo['equi_fecha_instalacion']; ?>" name="equi_fecha_instala">
                <label for="equi_fecha_instala" class="active">Fecha De Instalacion  :</label>

            </div>
            <div class="input-field col s4">
                <input type="date" value="<?php echo $equipo['equi_vence_garantia']; ?>" name="equi_vence_garantia">
                <label for="equi_vence_garantia" class="active">Vecimiento de garantia  :</label>

            </div>
        </div>
        <div class="col-lg-offset-2 col-lg-10">
            <input type="submit" class="btn" value="Editar">
        </div>
    </form>
</div>
<script>
    $('select').material_select();
</script>