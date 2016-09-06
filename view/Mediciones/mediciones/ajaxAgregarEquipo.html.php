<!--=========================================================
DIV que muestra en una tabla el ID y NOMBRE de un equipo,
al igual de los campos a diligenciar: medida actual y fecha
=============================================================-->
<div id="lista-equipos">
    <div class="card-panel">
        <div>
            <table class="striped">
                <thead>
                    <tr>
                        <th data-field="cod_equ">C&oacute;digo equipo</th>
                        <th data-field="nom_equ">Nombre equipo</th>
                        <th data-field="medicion">Medici&oacute;n actual</th>
                        <th data-field="fecha_med">Fecha Medici&oacute;n</th>
                        <th>Tipo Medidor</th>
                        <th>Agregar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($equipos as $equipo) { ?>
                        <tr>
                    <div>
                        <td id="equi_id"><?php echo $equipo['equi_id'] ?></td>
                        <td id="equi_nombre"><?php echo $equipo['equi_nombre'] ?></td>
                        <td>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="medidaActual" name="medidaActual" type="text" class="validate" required="true">
                                    <label for="medidaActual">Medida actual</label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input placeholder="Fecha" id="fecha" name="fecha" type="date" class="datepicker" required="true">
                                    <label for="fecha"></label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="tipoMedidor" id="tipoMedidor">
                                        <?php
                                        foreach ($medidores as $medidor) {;?>
                                        
                                        <option value=<?php echo $medidor['tmed_id'] ?>> <?php echo $medidor['tmed_acronimo']?></option>
                                        <?php } 
                                        ?>
                                    </select>
                                    <label for="fecha"></label>
                                </div>
                            </div>
                        </td>
                    </div>
                    <td>
                        <a class="btn-agregar btn-floating btn-small waves-effect waves-light right teal" data-url="<?php echo crearUrl("Mediciones", "mediciones", "ajaxListarEquipos", array('noVista' => "noVista")) ?>">
                            <i class="mdi-action-add-shopping-cart"></i>
                        </a>
                    </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div> 
        <div>
        </div>
        <script>
            $(document).ready(function () {
                $('select').material_select('destroy');
                $('select').material_select();
                $('.datepicker').pickadate({
                    selectMonths: true, // Creates a dropdown to control month
                    selectYears: 15 // Creates a dropdown of 15 years to control year
                });

            });
        </script>