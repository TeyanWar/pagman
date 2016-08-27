<div class="title center"><h5>Detalle Equipo</h5></div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>N.Placa:</h6></label> 
        <?php echo $equipo['equi_id']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Nombre del Encargado:</h6></label> 
        <?php echo $equipo['per_nombre']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Nombre del Equipo:</h6></label> 
        <?php echo $equipo['equi_nombre']; ?>
    </div>

</div>
<br>
<div class="row">
    
    <div class="col s4">
        <label style="color: #448aff;"><h6>Estado del equipo:</h6></label> 
        <?php echo $equipo['est_descripcion'] ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Modelo:</h6></label> 
        <?php echo $equipo['equi_modelo']; ?>
    </div>
    
    <div class="col s4">
        <label style="color: #448aff;"><h6>No. Serie:</h6></label> 
        <?php echo $equipo['equi_serie']; ?>
    </div>

    

</div>
<br>
<div class="row">
    
    <div class="col s4">
        <label style="color: #448aff;"><h6>Fabricante:</h6></label> 
        <?php echo $equipo['equi_fabricante']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Marca:</h6></label> 
        <?php echo $equipo['equi_marca']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Ubicacion:</h6></label> 
        <?php echo $equipo['equi_ubicacion']; ?>
    </div>

</div>
<br>
<div class="row">
    
    <div class="col s4">
        <label style="color: #448aff;"><h6>Fecha De Compra:</h6></label> 
        <?php echo $equipo['equi_fecha_compra']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Fecha De Instalacion:</h6></label> 
        <?php echo $equipo['equi_fecha_instalacion']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Vecimiento de garantia:</h6></label> 
        <?php echo $equipo['equi_vence_garantia']; ?>
    </div>

</div>

