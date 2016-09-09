<div id="lista-campos">
    <div class="card-panel">
        <div>
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="cod_campo">C&oacute;digo equipo</th>
                        <th data-field="nom_campo">Nombre equipo</th>
                        <th>Agregar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($camposPersonalizados as $campoPer) { ?>
                        <tr>
                    <div>
                        <td id="cp_id"><?php echo $campoPer['cp_id'] ?></td>
                        <td id="cp_nombre"><?php echo $campoPer['cp_nombre'] ?></td>
                    </div>
                    <td>
                        <a class="btn-agregar-campos btn-floating btn-small waves-effect waves-light right teal" data-url="<?php echo crearUrl("Equipos", "tipoEquipo", "ajaxListarCampoPersonalizado", array('noVista' => "noVista")) ?>">
                            <i class="mdi-action-add-shopping-cart"></i>
                        </a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div> 
    </div>
</div>
<script>
    $(document).ready(function () {
        $('select').material_select('destroy');
        $('select').material_select();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month.
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

    });
</script>