
<div class="col s12 m12 l6">

    <div class="card-panel">
        <h4 class="header">Crear orden de trabajo</h4>

        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Solicitudes/Ordenes</a></li>
            <li><a href="#">Ordenes de trabajo</a></li>
            <li class="active">Crear orden de trabajo</li>
        </ol>

        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form class="col s12" data-url="<?php echo crearUrl("Ot", "ot", "postCrear", array('noVista' => 'noVista')) ?>" data-redirect="<?php echo crearUrl("Ot", "ot", "listar") ?>" method="POST" id="crearOt">
            <div class="row">

                <div class="col s3">
                    <label>(*) Regional</label> 
                    <select class="error browser-default select2" id="crole" name="ot_regional" data-error=".errorTxt6" aria-required="true" aria-describedby="crole-error" aria-invalid="true">       				          		
                        <option value="" disabled selected>Seleccione</option>
                        <?php
                        foreach ($regionales as $regional) {
                            ?>
                            <option value="<?php echo $regional['reg_id'] ?>"> <?php echo $regional['reg_nombre']; ?></option>
                            <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="col s3">
                    <label>(*) Centro de formaci&oacute;n</label> 
                    <select name="ot_centro_formacion" class="select2 ">
                        <option value="" disabled selected>Seleccione</option>
                        <?php
                        foreach ($centrosFormacion as $centroFormacion) {
                            ?>
                            <option value="<?php echo $centroFormacion['cen_id'] ?>"> <?php echo $centroFormacion['cen_nombre']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col s3">
                    <label>(*) Equipo</label> 
                    <select name="ot_equipo" class="select2 ">
                        <option value="" disabled selected>Seleccione</option>
                        <?php
                        foreach ($equipos as $equipo) {
                            ?>
                            <option value="<?php echo $equipo['equi_id'] ?>"> <?php echo $equipo['equi_nombre']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col s3">
                    <label>(*) Tipo de falla</label> 
                    <select name="ot_tipo_falla" class="select2 ">
                        <option value="" disabled selected>Seleccione</option>
                        <?php
                        foreach ($fallas as $falla) {
                            ?>
                            <option value="<?php echo $falla['tfa_id'] ?>"> <?php echo $falla['tfa_descripcion'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <br/>

            <div class="row">
                <div class="col s3">
                    <label>(*) Componentes</label> 
                    <select name="componente[]" class="select2" multiple="" >
                        <?php
                        foreach ($componentes as $componente) {
                            ?>
                            <option value="<?php echo $componente['comp_id'] ?>"> <?php echo $componente['comp_descripcion'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col s3">
                    <label>(*) Herramientas </label> 
                    <select name="herramienta[]" class="select2" multiple="">
                        <?php
                        foreach ($herramientas as $herramienta) {
                            ?>
                            <option value="<?php echo $herramienta['her_id'] ?>"><?php echo $herramienta['her_nombre'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col s3">
                    <label>(*) Insumos </label> 
                    <select name="ot_insumo" class="select2" multiple="">
                        <?php
                        foreach ($insumos as $insumo) {
                            ?>
                            <option value="<?php echo $insumo['ins_id'] ?>"><?php echo $insumo['ins_nombre'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col s3">
                    <label>(*) Encargado</label> 
                    <select name="ot_encargado" class="select2 ">
                        <option value="" disabled selected>Seleccione</option>
                        <?php
                        foreach ($encargados as $encargado) {
                            ?>
                            <option value="<?php echo $encargado['per_id'] ?>"><?php echo $encargado['per_nombre'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <br/>

            <div class="row">

                <div class="input-field col s3">
                    <input id="fecha_inicio" type="date" class="datepicker" name="ot_fecha_inicio">
                    <label for="fecha_inicio" class="validate active">(*) Fecha inicio</label>
                </div>

                <div class="input-field col s3">
                    <input id="fecha_fin" type="date" class="datepicker" name="ot_fecha_fin">
                    <label for="fecha_fin" class="validate active">(*) Fecha fin</label>
                </div>
                <div class="col s3">
                   
                    <label>(*) Estado de la OT</label> 
                    <select name="ot_estado" class="select2">
                        <option value="" disabled selected>Seleccione</option>
                        <?php
                        foreach ($estados as $estado) {
                            ?>
                            <option value="<?php echo $estado['est_id'] ?>"><?php echo $estado['est_descripcion'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                 <div class="col s3">
                        <label>(*) Prioridad</label> 
                        <select name="ot_prioridad" class="">
                            <option value="" disabled selected>Seleccione</option>
                            <option>Alta</option>
                            <option>Media</option>
                            <option>Baja</option>
                        </select>
                    </div>
                

            </div>
            
            <div class="row">
            <div class="input-field col s12"> 
                    <input name= "ot_ayudantes" id="input_text" type="text" class="validate" placeholder="
                           D&iacute;gite los ayudantes de la OT separados por coma: Ejemplo, ejemplo 2.">
                    <label for="input_text" class="">(*) Ayudantes</label>
                </div>
            </div>
            
            <div class="row">
                <div class="input-field col s6">
                    <textarea id="textarea2" name="ot_desc_falla" class="materialize-textarea validate" style="height: 22px;"></textarea>
                    <label for="textarea2">
                        (*) Descripci&oacute;n de la falla
                    </label>
                </div>
                <div class="input-field col s6">
                    <textarea id="textarea2" name="ot_desc_trabajo" class="materialize-textarea validate" style="height: 22px;"></textarea>
                    <label for="textarea2">
                        (*) Descripci&oacute;n del trabajo a realizar
                    </label>
                </div>
            </div>

            <div class="row">
                <button name="action" type="submit" class="btn teal waves-effect waves-light right submit_ot">Crear OT
                    <i class="mdi-content-add left"> </i>
                </button>
            </div>


        </form>
    </div>
</div>
