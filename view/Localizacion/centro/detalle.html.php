<div class="title center"><h5>DETALLE DEL CENTRO DE FORMACÓN</h5></div>
<br>
<table class="striped">
    <thead>
        <tr>
            <th>Nombre del centro De Formaciónn</th>
            <th>Dirección del centro de formacion</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $centro['cen_nombre'] ?></td>
            <td><?php echo $centro['cen_dir'] ?></td>
        </tr>
    </tbody>
</table>

<table class="striped">
    <thead>
        <tr>
            <th>Telefono del Centro de Formación</th>
            <th>Regional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $centro['cen_telefono'] ?></td>
            <td><?php echo $centro['reg_nombre'] ?></td>
        </tr>
    </tbody>
</table>