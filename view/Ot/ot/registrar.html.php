<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header">Crear orden de trabajo</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Ot</a></li>
            <li><a href="#">Ordenes</a></li>
            <li class="active">Crear ot</li>
        </ol>

        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form class="col s12" data-url="<?php echo crearUrl("Ot", "ot", "postCrear", array('noVista' => 'noVista')) ?>" data-redirect="<?php echo crearUrl("Ot", "ot", "listar") ?>" method="POST" id="crearOt" novalidate>
            <div class="row">
                <?php if(isset($parametros[1])){ ?>
                
                    <div class="col s3">
                        <label><h6>(*) Código Solicitud de Servicio</h6></label>  
                        <?php echo $id_solicitud; ?>
                        <input type="hidden" name="id_solicitud" value="<?php echo $id_solicitud; ?>">
                    </div>
                
                    <div class="col s3">
                        <label>(*) Centro de Formación</label>
                        <?php foreach ($centrosFormacion as $centro) { ?>
                            <option value="<?php echo $centro['cen_id'] ?>"><?php echo $centro['cen_nombre'] ?></option>
                            <input type="hidden" name="ot_centro_formacion" value="<?php echo $centro['cen_id']; ?>">
                        <?php } ?>                        
                    </div>
                
                    <div class="col s3">
                        <label>(*) Equipo</label>
                        <?php foreach ($equipos as $equipo) { ?>
                            <option value="<?php echo $equipo['equi_id'] ?>"><?php echo $equipo['equi_nombre'] ?></option>
                            <input type="hidden" name="ot_equipo" value="<?php echo $equipo['equi_id']; ?>">
                        <?php } ?>
                    </div>
                
                    <div class="col s3">
                        <label>(*) Tipo de falla</label> 
                            <?php foreach ($fallas as $falla) { ?>
                                <option value="<?php echo $falla['tfa_id'] ?>"> <?php echo $falla['tfa_descripcion'] ?></option>
                                <input type="hidden" name="ot_tipo_falla" value="<?php echo $falla['tfa_id']; ?>">
                            <?php } ?> 
                        </select>
                    </div>
                
                 <?php }else{ ?>
                    
                    <div class="col s4">                
                        <label>(*) Centro</label>
                        <select class="error browser-default select2" id="selectCen" name="ot_centro_formacion"  data-url="<?php echo crearUrl('Ot', 'ot', 'selectCen', array('noVista' => 'noVista')) ?>" data-error=".errorTxt1">
                            <option value="" disabled selected>Seleccione</option>
                            <?php foreach ($centrosFormacion as $centro) { ?>
                                <option value="<?php echo $centro['cen_id'] ?>"><?php echo $centro['cen_nombre'] ?></option>
                            <?php } ?>                        
                        </select>
                        <div class="errorTxt1"></div>
                    </div>

                    <div class="col s4">
                        <label>(*) Equipo</label>
                        <select class="error browser-default select2" id="selectEqui" name="ot_equipo" data-url="<?php echo crearUrl('Ot', 'ot', 'selectComp', array('noVista' => 'noVista')) ?>" data-error=".errorTxt2">
                            <option value="" disabled selected>Seleccione</option>
                        </select>
                        <div class="errorTxt2"></div>
                    </div>

                    <div class="col s4">
                        <label>(*) Tipo de falla</label> 
                        <select name="ot_tipo_falla" class="error browser-default select2" data-error=".errorTxt3">
                            <option value="" disabled selected>Seleccione</option>
                            <?php foreach ($fallas as $falla) { ?>
                                <option value="<?php echo $falla['tfa_id'] ?>"> <?php echo $falla['tfa_descripcion'] ?></option>
                            <?php } ?> 
                        </select>
                        <div class="errorTxt3"></div>
                    </div>

                 <?php } ?>
            </div>

            <div class="row">
                <?php if(isset($parametros[1])){ ?>
                    <div class="col s4">
                        <label>Componentes (opcional)</label> 
                        <select name="componente[]" class="error browser-default select2" >
                            <option value="" disabled selected>Seleccione</option>
                            <?php foreach ($selectcomp as $comp) { ?>
                                <option value="<?php echo $comp['comp_id'] ?>"><?php echo $comp['comp_descripcion'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="errorTxt6"></div>
                    </div>
                <?php }else{ ?>
                    <div class="col s4">
                        <label>Componentes (opcional)</label>
                        <select class="select2" id="selecomp" name="componente[]" multiple=""></select>
                    </div>
                <?php } ?>
                
                <div class="col s4">
                    <label for="fecha_inicio">(*) Fecha inicio</label>
                    <input id="fecha_inicio" type="date" class="datepicker" name="ot_fecha_inicio" data-error=".errorTxt4">
                    <div class="errorTxt4"></div>
                </div>
                
                <div class="col s4">
                    <label for="fecha_fin">(*) Fecha fin</label>
                    <input id="fecha_fin" type="date" class="datepicker" name="ot_fecha_fin" data-error=".errorTxt5">
                    <div class="errorTxt5"></div>
                </div>
                
            </div>
               
            <div class="row">                
                <input type="hidden" value="3" name="estado" />
                
                <div class="col s4">
                    <label class="active">(*) Prioridad</label> 
                    <select name="ot_prioridad" class="error browser-default select2" data-error=".errorTxt6">
                        <option value="" disabled selected>Seleccione</option>
                        <?php foreach ($prioridades as $prioridad) { ?>
                            <option value="<?php echo $prioridad['priotra_descripcion'] ?>"><?php echo $prioridad['priotra_descripcion'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="errorTxt6"></div>
                </div>
                
                <div class="col s4">
                    <label>(*) Encargado</label> 
                    <select name="ot_encargado" class="error browser-default select2 " data-error=".errorTxt7">
                        <option value="" disabled selected>Seleccione</option>
                        <?php foreach ($encargados as $encargado) { ?>
                            <option value="<?php echo $encargado['per_id'] ?>"><?php echo $encargado['per_nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="errorTxt7"></div>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12">
                    <label for="input_text" class="">(*) Ayudantes</label>
                    <input name= "ot_ayudantes" id="input_text" type="text" class="validate" placeholder="
                        D&iacute;gite los ayudantes de la OT separados por coma: Ejemplo, ejemplo 2." data-error=".errorTxt8">
                    <div class="errorTxt8"></div>
                </div>
            </div>
            
            <div class="row">                 
                <div class="input-field col s12">
                    <label for="textarea2">(*) Descripci&oacute;n de la falla</label>
                    <textarea id="textarea2" name="ot_desc_falla" class="materialize-textarea validate" style="height: 22px;" data-error=".errorTxt9"></textarea>
                    <div class="errorTxt9"></div>
                </div>

                <div class="input-field col s12">
                    <label for="textarea2">
                        (*) Descripci&oacute;n del trabajo a realizar
                    </label>
                    <textarea id="textarea3" name="ot_desc_trabajo" class="materialize-textarea validate" style="height: 22px;" data-error=".errorTxt10"></textarea>
                    <div class="errorTxt10"></div>
                </div>
            </div>
            <div class="row">

                <div class="input-field col s3">
                    <i class="mdi-action-search prefix"></i>
                    <input placeholder="Buscar Insumos" id="insum" name="insumo" type="text" data-url="<?php  echo crearUrl("Ot", "ot", "listainsOT", array('noVista'=>"noVista"))?>" >
                    <label for="insumo" class="active">Busqueda De Insumos</label>
                    <div id="resulins" class="conte" style="z-index: 4; position: absolute; width: 90%;"></div>
                </div>

                <div class="input-field col s3">
                    <i class="mdi-action-search prefix"></i>
                    <input placeholder="Buscar Herramientas" id="herrm" name="herrami" type="text" data-url="<?php  echo crearUrl("Ot", "ot", "listaherOT", array('noVista'=>"noVista"))?>" >
                    <label for="herrm" class="active">Busqueda De Herramientas</label>
                    <div id="resherra" class="conteher" style="z-index: 4; position: absolute; width: 90%;"></div>
                </div>
            </div>
            <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="row">
            <div class="input-field col s6">
                <label><h6>(*) INSUMOS:</h6></label>
                <br>
                <br>
                <table class="striped carroInsumos" id="carroInsumos" cellspacing="0">
                    <thead>
                        <tr>
                            <th>(*) Nombre</th>
                            <th>(*) Descripcion</th>
                            <th>(*) Valor</th>
                            <th>(*) Unidad Medida</th>
                            <th>(*) Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>                  
                </table>
                <div class="row"><div class="errorTxt11"></div></div>
            </div>
            <div class="input-field col s1"></div>
            <div class="input-field col s5">
                <label><h6>(*) HERRAMIENTAS:</h6></label>
                <br>
                <br>
                <table class="striped carroHerramientas" id="carroHerramientas" cellspacing="0">
                    <thead>
                        <tr>
                            <th>(*) Nombre</th>
                            <th>(*) Descripcion</th>
                            <th>(*) Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>                  
                </table>
                <div class="row"><div class="errorTxt12"></div></div>
            </div>
        </div>
          <br>
        <br> 

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