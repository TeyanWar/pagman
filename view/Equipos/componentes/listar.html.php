<!--AGREADECIMIENTOS Y CREDITOS A @Nicolas Rodriguez por la funcion de formateo DE NUMEROS -->
<?php /* echo "$".number_format($valorNumeros,0,',','.')*/?>

<div id="bordered-table">
    <div class="row">
        <table class="striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID Componente</th>
                    <th>Nombre Componente</th>
                    <th>Acr&oacute;nimo</th>
                    <th>Descripci&oacute;n</th>
                    <th>Tipo Componente</th>
                    <th>Valor del Componente</th>
                    <th>Editar</th>
                    <th>Detalle</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($componentes as $componente) {
                    ?>
                    <tr>
                        <td><?php echo $paginado->count++ ?></td>
                        <td><?php echo $componente['comp_id'] ?></td>
                        <td><?php echo $componente['comp_nombre'] ?></td>
                        <td><?php echo $componente['comp_acronimo'] ?></td>
                        <td><?php echo $componente['comp_descripcion'] ?></td>
                        <td> <?php echo $componente['tcomp_nombre']?></td>
                        <td> <?php echo "$ ".number_format($componente['comp_precio'],0,',','.')?></td>
                        <td><a class="modal-trigger btn-floating  waves-effect waves-light teal" 
                               href="#editarTcomp" data-url="<?php echo crearUrl('equipos', 'componentes', 'editar', array('noVista' => "noVista", 'id' => $componente['comp_id'])) ?>">
                                <i class="mdi-content-create small"></i></a>
                        </td>
                        <td>
                            <a class="btn-floating cyan darken-1 modal-trigger ver-detallec"
                               href="#modalDetallec" data-url="<?php echo crearUrl('equipos', 'componentes', 'verDetalle', array('noVista' => 'noVista', 'id' => $componente['comp_id'])) ?>">
                                <i class="mdi-action-find-in-page tiny"></i>
                            </a>
                        </td>
                        <td>
                            <a class="modal-eliminar btn-floating waves-effect waves-light red darken-4" 
                            data-comp_id="<?php echo $componente['comp_id'] ?>" data-url="<?php echo crearUrl('equipos', 'componentes', 'postEliminar', array('noVista' => 'noVista', 'id' => $componente['comp_id'])) ?>">
                            <i class="mdi-action-delete small"></i></a></td>
                        </td>
                                
                    </tr>
<?php } ?>
            </tbody>
        </table>
    </div>

</div>
<div class="modal modal-fixed-footer" id="modalDetallec">
    <div class="modal-content"></div>
    <div class="modal-footer">
        <a id="cerrarDetalleComp"class="waves-effect waves-green btn-flat modal-action modal-close">cerrar</a>                 
    </div>
</div>


<?php $paginado->render(); ?>


<script type="text/javascript">
    $('.modal-trigger').leanModal({
        dismissible: false, // Modal can be dismissed by clicking outside of the modal
        opacity: .4, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        ready: function() {
            //alert('Ready'); 
        }, // Callback for Modal open
        complete: function() {
            //alert('Closed'); 
        } // Callback for Modal close
    });
</script>