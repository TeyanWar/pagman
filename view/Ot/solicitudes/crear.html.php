<div class="col s12 m12 l6">    
    <div class="card-panel">
        <h4 class="header">Crear solicitud de servicio</h4>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Solicitudes/Ordenes</a></li>
            <li><a href="#">Solicitudes de servicio</a></li>
            <li class="active">Crear solicitud de servicio</li>
        </ol>
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
            </div>
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <?php
        $errores = getErrores();
        if (!$errores=="") {
            ?>
            <div id="card-alert" class="card red">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i>
            <?php echo $errores; ?>
                    </p>
                </div>
            </div>
        <?php }
        ?>
        <form class="col s12" id="crearSolicitud" method="POST" data-redirect="<?php echo crearUrl("Ot", "solicitudes", "listar") ?>" data-url="<?php echo crearUrl("Ot", "solicitudes", "postCrear", array('noVista' => 'noVista')) ?>">
            <div class="row">
                <div class="col s12 m4 l4">                
                    <label>(*) Centro</label>
                    <select class="select2" id="selectCen" name="centro"  data-url="<?php echo crearUrl('Ot', 'solicitudes', 'selectCen', array('noVista' => 'noVista')) ?>">
                        <option value="" disabled selected>Seleccione</option>
                        <?php foreach ($centros as $centro) { ?>
                            <option value="<?php echo $centro['cen_id'] ?>"><?php echo $centro['cen_nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col s12 m4 l4">
                    <label>(*) Equipo</label>
                    <select class="select2" id="selectEqui" name="equipo" >
                        <option value="" disabled selected>Seleccione</option>
                    </select>
                </div>

                <div class="col s12 m4 l4">
                    <label>(*) Tipo de falla</label>
                    <select class="select2" name="tipo_falla" >
                        <option value="" disabled selected>Seleccione</option>
                        <?php foreach ($tipoFallas as $tipoFalla) { ?>
                            <option value="<?php echo $tipoFalla['tfa_id'] ?>"><?php echo $tipoFalla['tfa_descripcion'] ?></option><?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m4 l4">
                    <label>(*) Solicitante</label>                    
                    <select name="solicitante" class="select2 ">
                        <option value="" disabled selected>Seleccione</option>
                        <?php foreach ($personas as $persona) { ?>
                            <option value="<?php echo $persona['per_id'] ?>"><?php echo $persona['per_nombre'] . " " . $persona['per_apellido'] ?></option>
<?php } ?>
                    </select>
                </div>

                <div class="input-field col s8">
                    <input type="text" name="descripcion" id="textarea1" ></input>
                    <label for="textarea1">Descripci&oacute;n de la solicitud</label>
                </div>
            </div>                

            <input type="hidden" value="7" name="estado" />

            <div class="row">
                <div class="input-field col m2 offset-m8">
                    <button class="btn teal waves-effect waves-light right" type="submit" name="action">Cancelar
                        <!-- <i class="mdi-content-send right"></i> -->
                    </button>
                </div>
                <div class="input-field col m2">
                    <button class="btn teal waves-effect waves-light right" type="submit" id="btn-crear-solicitud" name="action">Crear
                        <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
    </div>