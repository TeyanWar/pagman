<div class="header center">
    <h5>Detalle de la solicitud</h5>
</div>
<table>
    <tr>
        <td><label>Código Solicitud</label></td>
        <td><label>Equipo</label></td>
        <td><label>Fecha descripcion</label></td>
        <td><label>Solicitante</label></td>
        <td><label>Tipo de falla</label></td>
        <td><label>Estado</label></td>
    </tr>
    <tr>
        <td><?php echo $descripcion['sserv_id'] ?></td>                                            
        <td><?php echo $descripcion['equi_nombre'] ?></td>                                            
        <td><?php echo $descripcion['sserv_fecha'] ?></td>                                            
        <td><?php echo $descripcion['per_nombre']. " " . $descripcion['per_apellido'] ?></td>                                            
        <td><?php echo $descripcion['tfa_descripcion'] ?></td>
        <td><?php echo $descripcion['est_descripcion'] ?></td>
        <td></td>
</table>
<div class="divider"></div>
<label>Descripción</label>

<h6><?php echo $descripcion['sserv_descripcion'] ?></h6>

<label>Observaciones</label>

<h6><?php echo $descripcion['sserv_observaciones'] ?></h6>

<div class="input-field col  s12 center"> 
    <input type="button" class="btn blue cerrar" value="Cerrar">
</div>