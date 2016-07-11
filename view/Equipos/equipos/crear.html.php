<div class="col s12 m12 l6">

    <div class="card-panel">
        <h4 class="header2">Crear equipo</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("equipos", "equipos", "Consulta") ?>">Listar/Consultar</a></li>
            <li class="active">Crear Equipo</li>
        </ol>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="row">
            <form class="col s12" action="<?php echo crearUrl("equipos", "equipos", "postCrear") ?>" method="POST" enctype='multipart/form-data'>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="equi_noplaca" name="equi_id" class="validate" >
                        <label for="equi_noplaca" class="active" >(*) N.Placa:</label>
                    </div>
                    <div class="input-field col s4">
                        <select class="select2" name="per_id">
                            <option value="0">(Vacio)</option>
                            <?php
                            foreach ($personas as $persona) {
                                echo "<option value=" . $persona['per_id'] . ">" . $persona['per_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="Persona" class="active">(*) Seleccion al encargado  </label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_nombre" name="equi_nombre" class="validate">
                        <label for="equi_nombre">(*) Nombre del Equipo:</label>

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <select class="select2" name="est_id">
                            <option value="0">(Vacio)</option>
                            <?php
                            foreach ($estados as $estado) {
                                echo "<option value=" . $estado['est_id'] . ">" . $estado['est_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="Estado_equipo" class="active">(*) Elija estado del equipo</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_modelo" name="equi_modelo" class="validate">
                        <label for="equi_modelo" class="active" >(*) Modelo:</label>

                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_noserie" name="equi_serie" class="validate">
                        <label for="equi_noserie">(*) No. Serie:</label>

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="equi_fabricante" name="equi_fabricante" class="validate" >
                        <label for="equi_fabricante" class="active" >(*) Fabricante:</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_marca" name="equi_marca" class="validate">
                        <label for="equi_marca" class="active" >(*) Marca:</label>

                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_ubicacion" name="equi_ubicacion" class="validate">
                        <label for="equi_ubicacion">(*) Ubicacion:</label>

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <input type="date" name="equi_fecha_compra">
                        <label class="active" for="equi_fecha_compra">(*) Fecha De Compra  :</label> 

                    </div>
                    <div class="input-field col s4">
                        <input type="date" name="equi_fecha_instalacion">
                        <label class="active" for="equi_fecha_instala">(*) Fecha De Instalacion  :</label>

                    </div>
                    <div class="input-field col s4">
                        <input type="date" name="equi_vence_garantia">
                        <label class="active" for="equi_vence_garantia">(*) Vecimiento de garantia  :</label>

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s4">
                        <select name="cen_id" class="select2">
                            <option value="0" >(Vacio)</option>
                            <?php
                            foreach ($centros as $centro) {
                                echo "<option value=" . $centro['cen_id'] . ">" . $centro['cen_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="cen_id" class="active">(*) Seleccion el Centro de formacion  </label>
                    </div>
                    <div class="file-field input-field col s4">
                        <select name="tequi_id" class="select2">
                            <option value="0" >(Vacio)</option>
                            <?php
                            foreach ($tEquipos as $tEquipo) {
                                echo "<option value=" . $tEquipo['tequi_id'] . ">" . $tEquipo['tequi_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="tequi_id" class="active">(*) Seleccion el tipo de equipo  </label>
                    </div>
                    <div class="input-field col s4">
                        <select name="area_id" class="select2">
                            <option value="0" >(Vacio)</option>
                            <?php
                            foreach ($areas as $area) {
                                echo "<option value=" . $area['area_id'] . ">" . $area['area_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="area_id" class="active">(*) Seleccion el Area  </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <div class="btn teal darken-2">
                            <span>FOTO</span>
                            <input type='file' id='ruta' name='ruta'>
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <!-- 
                <div class="row">
                    <div class="input-field col s12">
                        <input type="text" id="email" id="descripcion" name="descripcion"
                               placeholder="Digite descripci&oacute;n del equipo">
                        <label for="descripcion" class="">Descripci&oacute;n del equipo</label>
                    </div>
                </div> 
                -->

                <div class="row">
                    <div class="input-field col s12">
                        <button name="action" type="submit" class="btn teal darken-2 waves-effect waves-light right">Crear
                            <i class="mdi-content-send right"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>