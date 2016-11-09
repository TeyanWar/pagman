<center>
    <?php include 'templates/adminMaterialize/estandarSena.html.php'; ?>    
</center>
<br>
<table class="striped">
    <thead>
        <tr>
            <th data-field="cp_id">Código del Campo</th>
            <th data-field="name">Nombre del Campo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>

                <?php echo $detalleCampo['cp_id']; ?></td>
            <td><?php echo $detalleCampo['cp_nombre']; ?></td>
        </tr>
    </tbody>
</table>