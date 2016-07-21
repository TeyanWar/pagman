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
                <?php if(isset($parametros[1])){ ?>
                    <div class="col s4">
                        <label>(*) Centro de Formación</label>
                        <?php foreach ($centrosFormacion as $centro) { ?>
                            <option value="<?php echo $centro['cen_id'] ?>"><?php echo $centro['cen_nombre'] ?></option>
                        <?php } ?>                        
                    </div>
                
                    <div class="col s4">
                        <label>(*) Equipo</label>
                        <?php foreach ($equipos as $equipo) { ?>
                            <option value="<?php echo $equipo['equi_id'] ?>"><?php echo $equipo['equi_nombre'] ?></option>
                        <?php } ?>
                    </div>
                
                    <div class="col s4">
                        <label>(*) Tipo de falla</label> 
                            <?php foreach ($fallas as $falla) { ?>
                                <option value="<?php echo $falla['tfa_id'] ?>"> <?php echo $falla['tfa_descripcion'] ?></option>
                            <?php } ?> 
                        </select>
                    </div>
                
                 <?php }else{ ?>
                    
                    <div class="col s4">                
                        <label>(*) Centro</label>
                        <select class="select2" id="selectCen" name="ot_centro_formacion"  data-url="<?php echo crearUrl('Ot', 'ot', 'selectCen', array('noVista' => 'noVista')) ?>">
                            <option value="" disabled selected>Seleccione</option>
                            <?php foreach ($centrosFormacion as $centro) { ?>
                                <option value="<?php echo $centro['cen_id'] ?>"><?php echo $centro['cen_nombre'] ?></option>
                            <?php } ?>                        
                        </select>
                    </div>

                    <div class="col s4">
                        <label>(*) Equipo</label>
                        <select class="select2" id="selectEqui" name="ot_equipo" >
                            <option value="" disabled selected>Seleccione</option>
                        </select>
                    </div>

                    <div class="col s4">
                        <label>(*) Tipo de falla</label> 
                        <select name="ot_tipo_falla" class="select2 ">
                            <option value="" disabled selected>Seleccione</option>
                            <?php foreach ($fallas as $falla) { ?>
                                <option value="<?php echo $falla['tfa_id'] ?>"> <?php echo $falla['tfa_descripcion'] ?></option>
                            <?php } ?> 
                        </select>
                    </div>

                 <?php } ?>
            </div>

            <div class="row">
                <div class="col s6">
                    <label>(*) Componentes</label> 
                    <select name="componente[]" class="select2" multiple="">
                        <?php foreach ($componentes as $componente) { ?>
                            <option value="<?php echo $componente['comp_id'] ?>"> <?php echo $componente['comp_descripcion'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col s6">                
                    <label for="equipo">(*)Herramientas</label>
                    <input placeholder="" type="text" id="equipo"  data-url="<?php echo crearUrl('Ot', 'ot', 'listarEquipo', array('noVista' => "noVista")) ?>">
                    <div id="conte" class="conte" style="z-index: 4; position: absolute; width: 90%;"></div>
                </div>  
                <div class="col s6"> 
                    <label for="input_text" class="">(*) Ayudantes</label>
                    <input name= "ot_ayudantes" id="input_text" type="text" class="validate" placeholder="
                        D&iacute;gite los ayudantes de la OT separados por coma: Ejemplo, ejemplo 2.">
                </div>
            </div>    
            <div class="row">                
                <div class="col s6">
                    <label>(*) Encargado</label> 
                    <select name="ot_encargado" class="select2 " >
                        <option value="" disabled selected>Seleccione</option>
                        <?php foreach ($encargados as $encargado) { ?>
                            <option value="<?php echo $encargado['per_id'] ?>"><?php echo $encargado['per_nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s4">
                    <input id="fecha_inicio" type="date" class="datepicker" name="ot_fecha_inicio">
                    <label for="fecha_inicio" class="validate active">(*) Fecha inicio</label>
                </div>

                <div class="input-field col s4">
                    <input id="fecha_fin" type="date" class="datepicker" name="ot_fecha_fin">
                    <label for="fecha_fin" class="validate active">(*) Fecha fin</label>
                </div>
                <div class="col s3">

                    <input type="hidden" value="3" name="estado" />

                </div>
                <div class="col s4">
                    <label class="active">(*) Prioridad</label> 
                    <select name="ot_prioridad" class="browser-default">
                        <option value="" disabled selected>Seleccione</option>
                        <?php foreach ($prioridades as $prioridad) { ?>
                            <option value="<?php echo $prioridad['priotra_id'] ?>"><?php echo $prioridad['priotra_descripcion'] ?></option>
                        <?php } ?>
                    </select>
                </div>  
            </div>
            
            <div class="row">                 
                <div class="input-field col s12">
                    <label for="textarea2">(*) Descripci&oacute;n de la falla</label>
                    <textarea id="textarea2" name="ot_desc_falla" class="materialize-textarea validate" style="height: 22px;"></textarea>
                </div>

                <div class="input-field col s12">
                    <label for="textarea2">
                        (*) Descripci&oacute;n del trabajo a realizar
                    </label>
                    <textarea id="textarea2" name="ot_desc_trabajo" class="materialize-textarea validate" style="height: 22px;"></textarea>  
                </div>
            </div>
          
            <div class="row">
                <div class="input-field">
                    <label>(*) Insumos</label>
                    <input type="text" name="buscarInsumo" id="buscarInsumo" data-url="<?php echo crearUrl('Ot', 'ot', 'buscarInsumos', array('noVista' => "noVista")) ?>" />
                </div>
                <!--Aquí empieza el código para agregar insumos-->
                <div class="col s6" id="respuestaInsumo"></div>
            </div>
            
            <div id="agregarInsumo">
                <table id="agregarInsumoTable"></table>
            </div>

            <!-- Aquí termina código para agregar insumos-->

            <div class="row">
                <button name="action" type="submit" class="btn teal waves-effect waves-light right submit_ot">Crear OT
                    <i class="mdi-content-add left"> </i>
                </button>
            </div>
        </form>
    </div>    
</div>
<script type="text/javascript">
    $(".select2").select2({});
</script>
<style>
    .modal{
        width: 90%;
        height: 90%;
    }
</style>