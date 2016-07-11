<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div class="row">
                
                <h4 class="header">Registrar Persona y/o Usuario</h4>

                <ol class="breadcrumbs">
                    <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                    <li><a href="#">Usuarios</a></li>
                    <li class="active">Registrar</li>
                </ol>
                
                <div id="card-alert" class="card teal">
                    <div class="card-content white-text">
                        <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
                        <p><i class="mdi-action-info-outline"></i> Presiona la opcion: <i class="small mdi-social-person-add"></i> si desea registrar la persona como usuario del sistema</p>
                        
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <?php $error=getErrores(); ?>
                 <?php if (!$error=="") { ?>
                    <div id="card-alert" class="card red">
                        <div class="card-content white-text">
                            <p><i class="mdi-alert-error"></i> <?php echo $error; ?> </p>
                        </div>

                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <?php } ?>

                <form id="formValidate" class="col s12 formValidate" action="<?php echo crearUrl("usuarios", "usuarios", "postCrear") ?>" method="post" novalidate>
                    
                    <div class="row">
                        
                        <div class="col s4">
                            <label>(*) Departamento</label>
                            <select class="error browser-default select2" id="departamento" name="departamento" data-error=".errorTxt1">
                                <option value="" disabled selected>Seleccione</option>
                                <?php 
                                    foreach($departamentos as $depto){
                                    echo "<option value='".$depto["dept_id"]."'>". $depto["dept_nombre"] . "</option>";
                                    }
                                ?>
                            </select>
                                <div class="errorTxt1"></div>
                        </div>
                        
                        <div class="col s4">
                            <label>(*) Centro</label>
                            <select class="error browser-default select2" id="centro" name="centro" data-error=".errorTxt2">
                                <option value="" disabled selected>Seleccione</option>
                                <?php 
                                    foreach($centros as $cen){
                                    echo "<option value='".$cen["cen_id"]."'>". $cen["cen_nombre"] . "</option>";
                                    }
                                ?>
                            </select>
                                <div class="errorTxt2"></div>
                        </div>
                        
                        <div class="col s4">
                            <label>(*) Cargo</label>
                            <select class="error browser-default select2" id="cargo" name="cargo" data-error=".errorTxt3">
                                <option value="" disabled selected>Seleccione</option>
                                <?php 
                                    foreach($cargos as $car){
                                    echo "<option value='".$car["car_id"]."'>". $car["car_descripcion"] . "</option>";
                                    }
                                ?>
                            </select>
                                <div class="errorTxt3"></div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        
                        <div class="input-field col s4">
                            <input id="identificacion" type="text" class="validate" length="10" name="identificacion" data-error=".errorTxt4">
                            <label for="identificacion">(*) Numero Identificacion</label>
                            <div class="errorTxt4"></div>
                        </div>
                        
                        <div class="input-field col s4">
                            <input id="nombre" type="text" class="validate" length="20" name="nombre" data-error=".errorTxt5">
                            <label for="first_name">(*) Nombre</label>
                            <div class="errorTxt5"></div>
                        </div>
                        
                        <div class="input-field col s4">
                            <input id="apellido" type="text" class="validate" length="30" name="apellido" data-error=".errorTxt6">
                            <label for="first_name">(*) Apellido</label>
                            <div class="errorTxt6"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="input-field col s4">
                            <input id="telefono" type="tel" class="validate" length="10" name="telefono" data-error=".errorTxt7">
                            <label for="first_name">(*) Telefono</label>
                            <div class="errorTxt7"></div>
                        </div>
                        
                        <div class="input-field col s4">
                            <input id="movil" type="text" class="validate" length="10" name="movil" data-error=".errorTxt8">
                            <label for="first_name">(*) Movil</label>
                            <div class="errorTxt8"></div>
                        </div>
                        
                        <div class="input-field col s4">
                            <input id="email" type="email" class="validate" length="45" name="email" data-error=".errorTxt9">
                            <label for="email">(*) Email</label>
                            <div class="errorTxt9"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        
                        <div class="input-field col s4">
                            <input id="direccion" type="text" class="validate" length="40" name="direccion" data-error=".errorTxt10">
                            <label for="first_name">(*) Direccion</label>
                            <div class="errorTxt10"></div>
                        </div>
                        
                        <div class="input-field col s4">
                            <input id="valorhora" type="text" class="validate" length="10" name="valorhora" data-error=".errorTxt11">
                            <label for="first_name">(*) Valor Hora</label>
                            <div class="errorTxt11"></div>
                        </div>
                        <br>
                        <!-- Modal Trigger -->
                        <a class="btn-floating waves-effect waves-light teal modal-trigger" href="#modal1"><i class="small mdi-social-person-add"></i></a>

                        <!-- Modal Structure -->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4 class="header2">Registro Usuario</h4>
                                <div class="row">

                                    <div class="input-field col s4">
                                        <input id="name4" type="text" class="validate" length="20" name="login">
                                        <label for="first_name">(*) Login</label>
                                    </div>

                                    <div class="input-field col s4">
                                        <input id="password5" type="password" class="validate" length="30" name="clave">
                                        <label for="password">(*) Clave</label>
                                    </div>
                                    
                                    <div class="col s4">
                                        <label>(*) Rol/perfil</label>
                                        <select class="error browser-default select2" name="perfil">
                                            <option value="" disabled selected>Seleccione</option>
                                            <?php 
                                                foreach($perfiles as $perfil){
                                                echo "<option value='".$perfil["rol_id"]."'>". $perfil["rol_nombre"] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col s4">
                                        <label>(*) Estado</label>
                                        <select class="error browser-default select2" name="estado">
                                            <option value="" disabled selected>Seleccione</option>
                                            <option value="activo" >activo</option>
                                            <option value="desactivado" >desactivado</option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                              <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
                            </div>
                        </div>

                    </div>

                    
                    <div class="row">
                        <button name="action" type="submit" class="btn teal waves-effect waves-light right submit_ot animated infinite rubberBand">Registrar
                            <i class="mdi-content-add left"> </i>
                        </button>
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>

<script>
    $("select").material_select();
</script>