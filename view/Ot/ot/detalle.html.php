<div class="title center">
    <h5>ORDEN DE TRABAJO # <?php echo $detalleOrdenes['ot_id']; ?></h5>
</div>
<div class="row">
    <a id="imprime" class="btn-floating waves-effect teal"><i class="mdi-maps-local-print-shop"></i></a>
</div>

<div id="orden" class="col s12 m12 l12">
    
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
            <label style="color: #448aff;"><h6>Centro de formaci&oacute;n</h6></label> 
            <?php echo $detalleOrdenes['cen_nombre'] ?>
        </div>
    </div>
    <div class=" row">
        <div class="col s12 m8 l4">
                <label style="color: #448aff;"><h6>Equipo</h6></label> 
                <?php echo $detalleOrdenes['equi_nombre'] ?>
        </div>
        <div class="col s12 m8 l4">
                <label style="color: #448aff;"><h6>Tipo de falla</h6></label> 
                <?php echo $detalleOrdenes['tfa_descripcion'] ?>
        </div>

        <div class="col s12 m8 l4">
        <?php if(!empty($detcomponentes) && $detcomponentes[0][0]!='INDEFINIDO'){ ?>
                  <label style="color: #448aff;"><h6>Componentes</h6></label>
                  <?php foreach ($detcomponentes as $detcomp) {
                           echo $detcomp['comp_descripcion']." "."";
                        }
                  ?>
        <?php } ?>
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
        <?php if($detalleOrdenes['ot_observacion']!=""){ ?>
            <div class="col s12 m8 l12">
                <label style="color: #448aff;"><h6>Observaci&oacute;n</h6></label> 
                <?php echo $detalleOrdenes['ot_observacion'] ?>
            </div>
        <?php } ?>
    </div>
    <br>
    <div class="divider"></div>
    <div class="row">
        <?php if(!empty($texto)){ ?>
            <div class="col s12 m8 l12">
                <label style="color: #448aff;"><h6>Guia Mantenimiento</h6></label>
		<?php $guia = explode(",", $texto['texto_guia']); ?>
                <?php $i=1; foreach ($guia as $tex) { ?>
                    <p>
                        <?php echo $i.") ".$tex; ?>
                    </p>
                <?php $i++; } ?>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <?php if($detalleOrdenes['estandar']!=""){ ?>
            <div class="input-field col s5 m5 l5">
                <small style="color: #448aff;"><h6>¿Cumplio con los estandares de mantenimiento?</h6></small>
                <?php echo $detalleOrdenes['estandar'] ?>
            </div>
        <?php } ?>
    </div>
    <br>
    <div class="row">        
        <div class="col s6">
            <label style="color: #448aff;"><h6>INSUMOS</h6></label>
            <?php if(!empty($detalleinsumos)){ ?>
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="registro">Nombre</th>
                        <th data-field="name">Unidad Medida</th>
                        <th data-field="id">Valor</th>
                        <th data-field="name">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php					
                    foreach ($detalleinsumos as $detins) {
                        ?>
                        <tr>
                            <td><?php echo $detins['ins_nombre'] ?></td>
                            <td><?php echo $detins['umed_descripcion'] ?></td>
                            <td><?php echo $detins['ins_valor'] ?></td>
                            <td><?php echo $detins['ins_cantidad'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{ ?>
            <h6 style="color: #FF0000;">Esta ot no cuenta con insumos</h6>
            <?php } ?>
        </div>

        <div class="col s6">
            <label style="color: #448aff;"><h6>HERRAMIENTAS</h6></label>
            <?php if(!empty($detalleherramientas)){ ?>
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="registro">Nombre</th>
                        <th data-field="name">Descripcion</th>
                        <th data-field="name">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php					
                    foreach ($detalleherramientas as $dether) {
                        ?>
                        <tr>
                            <td><?php echo $dether['her_nombre'] ?></td>
                            <td><?php echo $dether['her_descripcion'] ?></td>
                            <td><?php echo $dether['cantidad'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php }else{ ?>
                <h6 style="color: #FF0000;">Esta ot no cuenta con herramientas</h6>
            <?php } ?>
        </div>
        
    </div>
</div>
