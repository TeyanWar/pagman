<center>
    <?php include 'templates/adminMaterialize/estandarSena.html.php'; ?>    
</center>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Login</h6></label> 
        <?php echo $usu['usu_usuario']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Estado</h6></label> 
        <?php echo $usu['usu_estado']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Rol</h6></label> 
        <?php echo $usu['rol_nombre']; ?>
    </div>

</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Departamento</h6></label> 
        <?php echo $usu['dept_nombre']; ?>
    </div>

    <div class="col s8">
        <label style="color: #448aff;"><h6>Centro</h6></label> 
        <?php echo $usu['cen_nombre']; ?>
    </div>

</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>No. identificacion</h6></label> 
        <?php echo $usu['per_id']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Nombre</h6></label> 
        <?php echo $usu['per_nombre']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Apellido</h6></label> 
        <?php echo $usu['per_apellido']; ?>
    </div>
</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Telefono</h6></label> 
        <?php echo $usu['per_telefono']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Movil</h6></label> 
        <?php echo $usu['per_movil']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Email</h6></label> 
        <?php echo $usu['per_email']; ?>
    </div>
</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Direccion</h6></label> 
        <?php echo $usu['per_direccion']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Valor Hora</h6></label> 
        <?php echo $usu['per_valor_hora']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Cargo</h6></label> 
        <?php echo $usu['car_descripcion']; ?>
    </div>
</div>
<br>
<div class="divider"></div>
<div class="row">
    <?php if ($usu['per_horas'] != "" && $usu['per_sueldo'] != "") { ?>
        <div class="col s4">
            <label style="color: #448aff;"><h6>Contratista</h6></label>
            <?php echo "SI" ?>
        </div>
        <div class="col s4">
            <label style="color: #448aff;"><h6>Cantidad Horas</h6></label> 
            <?php echo $usu['per_horas'] ?>
        </div>
        <div class="col s4">
            <label style="color: #448aff;"><h6>Valor Sueldo</h6></label>
            <?php echo $usu['per_sueldo'] ?>
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
        height: 90%;
    }
</style>