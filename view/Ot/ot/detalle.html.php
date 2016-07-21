<div class="title center"><h5>ORDEN DE TRABAJO # <?php echo $detalleOrdenes['ot_id'];?></h5></div>
<br>
<div class=" row">
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>No. OT</h6></label> 
        <?php echo $detalleOrdenes['ot_id']; ?>
    </div>
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Fecha y hora de creaci&oacute;n</h6></label> 
        <?php echo $detalleOrdenes['ot_fecha_creacion']; ?>
    </div>
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Regional</h6></label> 
        <?php echo $detalleOrdenes['reg_nombre']; ?>
    </div>
</div>

<div class=" row">
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Centro de formaci&oacute;n</h6></label> 
        <?php echo $detalleOrdenes['cen_nombre'] ?>
    </div>
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Equipo</h6></label> 
        <?php echo $detalleOrdenes['equi_nombre'] ?>
    </div>
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Tipo de falla</h6></label> 
        <?php echo $detalleOrdenes['tfa_descripcion'] ?>
    </div>
</div>
<div class="row">
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Prioridad</h6></label> 
        <?php echo $detalleOrdenes['ot_prioridad'] ?>
    </div>
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Encargado</h6></label> 
        <?php echo $detalleOrdenes['per_nombre'] ?>
    </div>
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Estado de la orden</h6></label> 
        <?php echo $detalleOrdenes['est_descripcion'] ?>
    </div>
</div>
<div class="row">
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Fecha inicio</h6></label> 
        <?php echo $detalleOrdenes['ot_fecha_inicio'] ?>
    </div>
    
    <div class="col s12 m8 l4">
        <label style="color: #448aff;"><h6>Fecha fin</h6></label> 
        <?php echo $detalleOrdenes['ot_fecha_fin'] ?>
    </div>
</div>
<br>
<div class="divider"></div>
<br>
<div class="row">
    <div class="col s12 m8 l12">
        <label style="color: #448aff;"><h6>Descripci&oacute;n de la falla</h6></label> 
        <?php echo $detalleOrdenes['ot_desc_falla'] ?>
    </div>
</div>
<div class="row">
    <div class="col s12 m8 l12">
        <label style="color: #448aff;"><h6>Descripci&oacute;n del trabajo a realizar</h6></label> 
        <?php echo $detalleOrdenes['ot_desc_trabajo'] ?>
    </div>
</div>
<div class="row">
    <div class="col s12 m8 l8">
        <label style="color: #448aff;"><h6>Ayudantes</h6></label> 
        <?php echo $detalleOrdenes['ot_ayudantes'] ?>
    </div>
</div>
<div class="row">
    <div class="col s12 m8 l8">
        <label style="color: #448aff;"><h6>Insumos</h6></label> 
        <?php echo $detalleOrdenes['ins_id'] ?>
    </div>
</div>
<div class="row center-align fixed">
    <br>
</div>

