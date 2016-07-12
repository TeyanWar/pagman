<div class="col s12 m12 l6">
    <form action = "<?php echo crearUrl("Permisos", "permisos", "postCrear") ?>" name = "formRol" method = "POST">
        <div>
            <input type="hidden" name="roles" value="<?php echo $rolActual[0]['rol_id']; ?>" readonly> 
            ROL ACTUAL
            <code><b><?php echo $rolActual[0]['rol_nombre']; ?></b></code>
        </div>

        <div class = "row" style = "margin-top: 40px;">
            <div class = "row" style = "margin-top: 20px;">
                <div class = "col s12 m4 l4" id = "flight-card">
                    <div class = "card-header cyan darken-2">
                        <div class = "card-title">
                            <h5 class = "flight-card-title"><?php echo $modulo['mod_nombre']; ?></h5>
                        </div>
                    </div>
                    <div class = "input-field col s12">
                        <select multiple name = "funcionesModulos[]">
                            <option value = "" disabled selected>-- Seleccione --</option>
                            <?php
                            foreach ($buscarCostos as $costos) {
                                ?>
                                <option value="<?php echo $costos['func_id']; ?>" name=""><?php echo $costos['func_display']; ?></option><?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col s12 m8 l4" id="flight-card">
                    <div class="card-header cyan darken-2">
                        <div class="card-title">
                            <h5 class="flight-card-title">Equipos</h5>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <select multiple name="funcionesModulos[]">
                            <option value="" disabled selected>-- Seleccione --</option>
                            <?php
                            foreach ($buscarEquipos as $equipos) {
                                ?>
                                <option value="<?php echo $equipos['func_id']; ?>" name=""><?php echo $equipos['func_display']; ?></option><?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="col s12 m8 l4" id="flight-card">
                    <div class="card-header cyan darken-2">
                        <div class="card-title">
                            <h5 class="flight-card-title">Herramientas</h5>
                        </div>
                    </div>
                    <div class="input-field col s12">
                        <select multiple name="funcionesModulos[]">
                            <option value="" disabled selected>-- Seleccione --</option>
                            <?php
                            foreach ($buscarHerramientas as $herramientas) {
                                ?>
                                <option value="<?php echo $herramientas['func_id']; ?>" name=""><?php echo $herramientas['func_display']; ?></option><?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div><!--Cierre div Row Costos,Equipos,Herramientas-->
        <br>
        <div class="row">
            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title">Insumos</h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarInsumos as $insumos) {
                            ?>
                            <option value="<?php echo $insumos['func_id']; ?>" name=""><?php echo $insumos['func_display']; ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title"><center>Mediciones</center></h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarMediciones as $mediciones) {
                            ?>
                            <option value="<?php echo $mediciones['func_id']; ?>" name=""><?php echo $mediciones['func_display']; ?></option><?php
                        }
                        ?>
                    </select>
                </div>                    
            </div>


            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title">Medidores</h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarMedidores as $medidores) {
                            ?>
                            <option value="<?php echo $medidores['func_id']; ?>"><?php echo $medidores['func_display']; ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div><!--Cierre div Row Insumos,Medidores,Mediciones--> 
        <br>
        <div class="row" style="margin-left: 0px;">

            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h6 class="flight-card-title">Ordenes de Trabajo</h6>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="0" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarOT as $ot) {
                            ?>
                            <option value="<?php echo $ot['func_id']; ?>" name=""><?php echo $ot['func_display']; ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title">Permisos</h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($funcionesBuscar as $permisos) {
                            ?>
                            <option value="<?php echo $permisos['id_permiso']; ?>" name=""><?php echo $permisos['func_display']; ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>



            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title">Personas</h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarPermisos as $permi) {
                            ?>
                            <option value="<?php echo $permi['func_id']; ?>" name=""><?php echo $permi['func_display'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>                    
            </div>
        </div><!--Cierre div Row OT,Personas,Permisos--> 
        <br>
        <div class="row" style="margin-left: 0px;">

            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title">Programacion</h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarProgramacion as $programacion) {
                            ?>
                            <option value="<?php echo $programacion['func_id']; ?>" name=""><?php echo $programacion['func_display']; ?></option>
                            ?></option><?php }
                        ?>                
                    </select>
                </div>                    
            </div>

            <div class="col s12 m8 l4" id="flight-card">
                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title">Roles</h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarRoles as $roles) {
                            ?>
                            <option value="<?php echo $roles['func_id']; ?>" name=""><?php echo $roles['func_display']; ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col s12 m8 l4" id="flight-card">

                <div class="card-header cyan darken-2">
                    <div class="card-title">
                        <h5 class="flight-card-title">Usuarios</h5>
                    </div>
                </div>
                <div class="input-field col s12">
                    <select multiple name="funcionesModulos[]">
                        <option value="" disabled selected>-- Seleccione --</option>
                        <?php
                        foreach ($buscarUsuarios as $usuarios) {
                            ?>
                            <option value="<?php echo $usuarios['func_id']; ?>" name=""><?php echo $usuarios['func_display']; ?></option><?php
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div><!--Cierre DIV ROW programacion,Roles,Usuarios.-->
        <button name="action" type="submit" class="btn waves-effect waves-light teal">Registrar funciones
            <i class="mdi-content-send right"></i>
        </button>
    </form>
</div>
<script>
    $('select').material_select();
</script>
