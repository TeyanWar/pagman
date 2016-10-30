<div class="title center"><h5>Detalle Componente</h5></div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Id Componente</h6></label> 
        <?php echo $verComp['comp_id']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Nombre</h6></label> 
        <?php echo $verComp['comp_nombre']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Descripcion</h6></label> 
        <?php echo $verComp['comp_descripcion']; ?>
    </div>

</div>
<br>
<div class="row">

    <div class="col s4">
        <label style="color: #448aff;"><h6>Acronimo</h6></label> 
        <?php echo $verComp['comp_acronimo']; ?>
    </div>

    <div class="col s4">
        <label style="color: #448aff;"><h6>Precio Componente</h6></label>
        <?php echo "$ ".number_format($verComp['comp_precio'],0,',','.')?>
    </div>
    
    <div class="col s4">
        <label style="color: #448aff;"><h6>Tipo Componente</h6></label> 
        <?php echo $verComp['tcomp_nombre']; ?>
    </div>

</div>
<br>
<div class="divider"></div>
<div class="row">
    <div class="col s6">
        <label style="color: #448aff;"><h6>EQUIPOS A LOS QUE PERTENECE</h6></label>
        <?php if(!empty($vCequipos)){ ?>
        <table class="striped">
            <thead>
                <tr>
                    <th data-field="placa">NO. Placa</th>
                    <th data-field="name">Nombre</th>
                </tr>
            </thead>
            <tbody>
                <?php					
                foreach ($vCequipos as $eq) {
                    ?>
                    <tr>
                        <td><?php echo $eq['equi_id'] ?></td>
                        <td><?php echo $eq['equi_nombre'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php }else{ ?>
        <h6 style="color: #FF0000;">Este componente no pertenece a ningun equipo</h6>
        <?php } ?>
    </div>
</div>
