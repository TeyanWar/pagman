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
<table class="centered card-panel striped">
    <thead>
        <tr>
            <th>No. registro</th>
            <th>Fecha inicio prestamo</th>
            <th>Nombre jornada</th>
            <th>Observaciones</th>
            <th colspan="2">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        foreach ($listar as $prestamo) {
            explodeFecha($prestamo['pher_fecha']);
            $fechaPrestamo = getFecha();
            ?>
            <tr>
                <td><?php echo $paginado->count++ ?></td>
                <td><?php echo $fechaPrestamo ?></td>
                <td><?php echo $prestamo['jor_descripcion'] ?></td>
                <td><?php echo $prestamo['pher_observaciones'] ?></td>
                <td>
                    <a class="modal-trigger btn-floating waves-effect waves-light teal"
                       href="#M_editar_prestamo" data-url="<?php echo crearUrl('prestamo', 'prestamo', 'editar', 
                       array('noVista' => "noVista", 'id' => $prestamo['pher_id']))?>">
                        <i class="mdi-content-create small"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<!--aqui empieza la estructura de mi ventana modal para editar herramientas-->
<div id="M_editar_prestamo" class="modal" style="z-index: 1003; display: none; opacity: 0; transform: scaleX(0.7); top: 318.246px;">
    <div class="modal-content" id="model-data"></div>
</div>
<?php $paginado->render() ?>
<script type="text/javascript">
    $('.modal-trigger').leanModal({
        dismissible: false,
        opacity: .5,
        in_duration: 300,
        out_duration: 200,
        ready: function () {

        },
        complete: function () {

        }
    });
</script>
