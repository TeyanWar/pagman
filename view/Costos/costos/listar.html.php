<!-- BRYAN DAVID RAMOS MUÑOZ TADSI03-->
<div id="bordered-table" id="pdf">
  <div class="row">
    <table class="striped">
        <thead>             
            <tr>
                <th>#</th>
                <th>C&oacute;digo Ot</th>
                <th>C&oacute;digo Equipo</th>
                <th>Nombre Equipo</th>
                <th>C&oacute;digo Componente</th>
                <th>Nombre Componente</th>
                <th>C&oacute;digo Insumo</th>
                <th>Nombre Insumo</th>
                <th>Valor Insumo</th>
                <th>C&oacute;digo Persona</th>
                <th>Nombre Persona</th>
                <th>Horas Trabajadas</th>
                <th>Valor Hora Persona</th>
                <th>Valor Total Horas</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $count = 1;
            foreach ($otRepors as $otRepor) {
                ?>
                <tr>
                    <td><?php echo $count++ ?></td>
                    <td><?php echo $otRepor['ot_id'] ?></td>
                    <td><?php echo $otRepor['equi_id'] ?></td>
                    <td><?php echo $otRepor['equi_nombre'] ?></td>
                    <td><?php echo $otRepor['comp_id'] ?></td>
                    <td><?php echo $otRepor['comp_descripcion'] ?></td>
                    <td><?php echo $otRepor['ins_id'] ?></td>
                    <td><?php echo $otRepor['ins_nombre'] ?></td>
                    <td><?php echo $otRepor['ins_valor'] ?></td>
                    <td><?php echo $otRepor['per_id'] ?></td>
                    <td><?php echo $otRepor['per_nombre'] ?></td>
                    <td><?php echo $otRepor['ot_horas_trabajadas'] ?></td>
                    <td><?php echo $otRepor['per_valor_hora'] ?></td> 
                    <th><?php echo $otRepor['Total'] ?></th>              
                </tr> 
                
            <?php }?> 
                
        </tbody>
    </table>
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
<form  id="formt" name="formulariopdf" class="col s12" action="<?php echo crearUrl("Costos","costos","Pdf",array('noVista'=>"noVista")) ?>" data-redirect="<?php echo crearUrl("Costos", "costos", "listar") ?>" method="POST" novalidate>
<div class="row">
    
    <div class="input-field col s2">
        <a class="btn teal waves-effect waves-light pdf" name="pdf">EXPORTAR PDF<i class="mdi-action-get-app"></i></a>
    </div>
</div>
</form>