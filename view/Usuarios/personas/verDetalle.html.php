<div class="title center"><h5>Detalle Persona</h5></div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Departamento</h6></label> 
        <?php echo $per['dept_nombre']; ?>
    </div>

    <div class="col s8">
        <label style="color: #448aff;"><h6>Centro</h6></label> 
        <?php echo $per['cen_nombre']; ?>
    </div>

</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>No. identificacion</h6></label> 
        <?php echo $per['per_id']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Nombre</h6></label> 
        <?php echo $per['per_nombre']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Apellido</h6></label> 
        <?php echo $per['per_apellido']; ?>
    </div>
</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Telefono</h6></label> 
        <?php echo $per['per_telefono']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Movil</h6></label> 
        <?php echo $per['per_movil']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Email</h6></label> 
        <?php echo $per['per_email']; ?>
    </div>
</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Direccion</h6></label> 
        <?php echo $per['per_direccion']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Valor Hora</h6></label> 
        <?php echo $per['per_valor_hora']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Cargo</h6></label> 
        <?php echo $per['car_descripcion']; ?>
    </div>
</div>
<br>
<div class="divider"></div>
<div class="row">
    <?php if ($per['per_horas']!="" && $per['per_sueldo']!="") { ?>
        <div class="col s4">
            <label style="color: #448aff;"><h6>Contratista</h6></label>
            <?php echo "SI" ?>
        </div>
        <div class="col s4">
            <label style="color: #448aff;"><h6>Cantidad Horas</h6></label> 
            <?php echo $per['per_horas'] ?>
        </div>
        <div class="col s4">
            <label style="color: #448aff;"><h6>Valor Sueldo</h6></label>
            <?php echo $per['per_sueldo'] ?>
        </div>
    <?php } else { ?>
        <div class="col s4">
            <label style="color: #448aff;"><h6>Contratista</h6></label>
            <?php echo "NO" ?>
        </div>
    <?php } ?>
</div>
<style>
    #modalDetalle{
        top: 2% !important;
        max-height: 100%;
        height: 80%;
    }
</style>
