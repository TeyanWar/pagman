<div class="row">

    <form class="col s12">
        <div class="row">
            <div class="input-field col s4">
                <input readonly type="text" id="equi_noplaca" value="<?php echo $equipo['equi_noplaca']; ?>">
                <label for="equi_noplaca" class="active">N.Placa:</label>
            </div>
            <div class="input-field col s4">
                <input readonly type="text" id="per_nombre" value="<?php echo $equipo['per_id']; ?>">
                <label for="per_nombre" class="active" >Nombre del Encargado:</label>

            </div>
            <div class="input-field col s4">
                <input readonly type="text" id="equi-nombre" value="<?php echo $equipo['equi_nombre']; ?>">
                <label for="equi-nombre" class="active">Nombre del Equipo:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input readonly type="text" id="equi_nombre" value="<?php echo $equipo['equi_estado'] ?>">
                <label for="equi_nombre" class="active">Estado del equipo:</label>

            </div>
            <div class="input-field col s4">
                <input readonly type="text" id="equi_modelo" value="<?php echo $equipo['equi_modelo']; ?>">
                <label for="equi_modelo" class="active" >Modelo:</label>

            </div>
            <div class="input-field col s4">
                <input readonly type="text" id="equi_noserie" value="<?php echo $equipo['equi_noserie']; ?>">
                <label for="equi_noserie" class="active">No. Serie:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input readonly type="text" id="equi_fabricante" value="<?php echo $equipo['equi_fabricante']; ?>">
                <label for="equi_fabricante" class="active" >Fabricante:</label>
            </div>
            <div class="input-field col s4">
                <input readonly type="text" id="equi_marca" value="<?php echo $equipo['equi_marca']; ?>">
                <label for="equi_marca" class="active" >Marca:</label>

            </div>
            <div class="input-field col s4">
                <input readonly type="text" id="equi_ubicacion" value="<?php echo $equipo['equi_ubicacion']; ?>">
                <label for="equi_ubicacion" class="active">Ubicacion:</label>

            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
                <input readonly type="text" value="<?php echo $equipo['equi_fecha_compra']; ?>">
                <label for="equi_fecha_compra" class="active">Fecha De Compra  :</label> 

            </div>
            <div class="input-field col s4">
                <input readonly type="date" value="<?php echo $equipo['qui_fecha_instala']; ?>">
                <label for="equi_fecha_instala" class="active">Fecha De Instalacion  :</label>

            </div>
            <div class="input-field col s4">
                <input readonly type="date" value="<?php echo $equipo['equi_vence_garantia']; ?>">
                <label for="equi_vence_garantia" class="active">Vecimiento de garantia  :</label>

            </div>
        </div>
    </form>
</div>
