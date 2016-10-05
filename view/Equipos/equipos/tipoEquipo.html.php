<?php ?><center><div class="col s10" style="margin-left: 50px; margin-bottom: 20px;">
        <table class="striped centered">
            <thead>
                <tr>
                    <th>Nombre tipo de Equipo</th>
                    <th>Seleccionar</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($consultaCampoAjax as $tipoEquipo) { ?>
                    <tr>
                        <td><?php echo $tipoEquipo['tequi_descripcion']; ?> </td>
                        <td><a class="btn-floating waves-effect waves-light modal-action teal darken-1"  
                               id="mostrarDivCamposPersonalizados" data-url="<?php echo crearUrl('equipos', 'equipos', 'agregarMedida', array('noVista' => 'noVista', 'id' => $tipoEquipo['tequi_id'])) ?>">
                                <i class="mdi-navigation-check"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>
</center>
<div id="tablaCamposPersonalizados">
</div>