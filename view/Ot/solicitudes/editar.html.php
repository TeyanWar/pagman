<div class="row">
    <form name="es" class="col s12" id="editarSolicitud" method="POST" action="#" data-url="<?php echo crearUrl("Ot", "solicitudes", "postEditar", array('noVista' => 'noVista')) ?>">
        <div class="row">
            <div class="header center">
                <h5>Editar solicitud de servicio</h5>
            </div>
            <div class="input-field col s12 m4 l4">
                <input type="text" name="sserv_id" value="<?php echo $registro['sserv_id'] ?>" readonly>
                <label class="active">Código solicitud</label>                   
            </div>
            <div class="input-field col s12 m4 l4">
                <input type="text" value="<?php echo $registro['cen_nombre'] ?>"  readonly>
                <label class="active">Centro de formación</label>                    
            </div> 
            <div class="input-field col s12 m4 l4">                    
                <input type="text" value="<?php echo $registro['tfa_descripcion'] ?>" readonly>
                <label class="active">Tipo de falla</label>                     
            </div>
        </div>                          

        <div class="row">
            <div class="input-field col s12 m4 l4">                    
                <input type="text" value="<?php echo $registro['per_nombre']." ".$registro['per_apellido'] ?>" readonly >
                <label class="active">Solicitante</label>
            </div>
            
            <div class="input-field col s12 m4 l4">
                <label class="active">Equipo</label>
                <select name="equi_id" class="browser-default" >

                    <!--<option value="" disabled selected>Seleccione</option> -->
                    <?php foreach ($equipos as $equipo) { ?>
                        <?php if ($registro['equi_id'] == $equipo['equi_id']) { ?>
                            <option value="<?php echo $equipo['equi_id'] ?> " readonly ><?php echo $equipo['equi_nombre'] ?></option>

                        <?php } else { ?>                            
                            <?php
                        }
                    }
                    ?>
                </select>                   
            </div>
            
            <div class="input-field col s12 m4 l4">
                <label class="active">Estado</label>
                <select name="est_id" class="browser-default">
                    <option value="" disabled selected>Seleccione</option>
                    <?php foreach ($estados as $estado) { ?>
                        <?php if ($registro['est_id'] == $estado['est_id']) { ?>
                            <option value="<?php echo $estado['est_id'] ?>" selected><?php echo $estado['est_descripcion'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $estado['est_id'] ?>"><?php echo $estado['est_descripcion'] ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m12 l12">
                <input readonly value="<?php echo $registro['sserv_descripcion'] ?>" id="sserv_descripcion" type="text" name="sserv_descripcion" class="validate">
                <label for="sserv_descripcion" class="active">Descripcion</label>                    
            </div>
        </div>
        
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <input value="<?php echo $registro['sserv_observacion'] ?>" id="sserv_observacion" type="text" name="sserv_observacion" class="validate">
                <label for="sserv_observacion" class="active">Observaciones</label>                    
            </div>
        </div>
                
        <div class="row center" >
            <div class="input-field col  m3 "></div>
            <div class="input-field col  m3 "> 
                <button type="button" class="btn blue cerrar" value="">Cancelar</button>
            </div>
            <div class="input-field col  m3"> 
                <button type="submit" class="btn blue " value="submit" >Guardar</button>
            </div>
        </div>
    </form>    
</div>

