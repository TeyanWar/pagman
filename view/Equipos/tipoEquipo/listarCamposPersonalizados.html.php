<div class="row">
    <div class="col s12 m12 g12">
        <table class="striped hoverable centered">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Campo Personalizado</th>
                    <th colspan="2">¿Seleccionar?</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                foreach ($consultaCampoAjax as $campoPersonalizado) {
                    ?>
                    <tr>
                        <td><?php echo $campoPersonalizado['cp_id'] ?></td>
                        <td><?php echo $campoPersonalizado['cp_nombre'] ?></td>
                        <td>
                            <input name="campoPersonalizado[]" id="<?php echo $campoPersonalizado['cp_id'] ?>" value="<?php $campoPersonalizado['cp_id'] ?>" type="checkbox">
                            <label for="<?php echo $campoPersonalizado['cp_id'] ?>"></label>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>        
    </div>
</div>
<?php   $paginado->render(); ?>
<script type="text/javascript">
    $('.modal-trigger').leanModal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        in_duration: 300, // Transition in duration
        out_duration: 200, // Transition out duration
        ready: function () {
            //alert('Ready'); 
        }, // Callback for Modal open
        complete: function () {
            //alert('Closed'); 
        } // Callback for Modal close
    });
</script>
