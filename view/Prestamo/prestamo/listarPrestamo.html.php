<div class="row">
    <div class="card-panel col s12">     
        <h4 class="header2">Listado de prestamos de herramientas</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de
                    control</a></li>
            <li><a href="#">Prestamo</a></li>
            <li class="active">Listado de prestamos</li>
        </ol>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> Este es el listado de prestamos de herramientas </p>
            </div>
            <button type="button" class="close white-text" data- dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
</div>
<table class="centered card-panel striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Fecha inicio prestamo</th>
            <th>Id almacenista</th>
            <th>Id jornada</th>
            <th>Observaciones</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($listarPrestamo as $prestamo) {
            ?>
            <tr>
                <td><?php echo $paginado->count++ ?></td>
                <td><?php echo $prestamo['pher_fecha'] ?></td>
                <td><?php echo $prestamo['alm_id'] ?></td>
                <td><?php echo $prestamo['jor_id'] ?></td>
                <td><?php echo $prestamo['pher_observaciones'] ?></td>
                <td><a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" data-pher_id="<?php echo $prestamo['pher_id'] ?>" data-url="<?php echo crearUrl('prestamo', 'prestamo', 'postEliminar', array('noVista' => 'noVista', 'id' => $prestamo['pher_id'])) ?>"><i class="mdi-action-delete small"></i></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php $paginado->render() ?>