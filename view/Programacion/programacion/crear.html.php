<form id="formValid" class="col s12" data-url="<?php echo crearUrl("Programacion", "programacion", "postCrear", array('noVista'=>"noVista")) ?>" data-redirect="<?php echo crearUrl("Programacion", "programacion", "listar") ?>" method="post" novalidate>
    <div class="card-panel">
        <div class="container">
            <h4 class="header">Crear nuevo mantenimiento</h4>

            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                <li><a href="#">Programacion</a></li>
                <li><a href="#">Programacion de mantenimiento</a></li>
                <li class="active">Crear nuevo mantenimiento</li>
            </ol>

            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>

                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!--Inicio contenedor mensajes de error-->
        <div class="card red">
            <div id="cont_errors_ajax" class="card-content white-text">
            </div>
        </div>
        <!--Fin contenedor mensajes de error-->

                <div class="row">  

                    <div class="input-field col s4">
                        <small style="color: #848484;">(*) Centro de formacion</small>
                        <select class="error browser-default select2" id="centro" name="centro" data-error=".errorTxt2">
                            <option value="" disabled selected>Seleccione</option>
                            <option value="">(Vacio)</option>
                            <?php foreach ($centros as $centro) { ?>
                                <option value="<?php echo $centro['cen_id']; ?>" ><?php echo $centro['cen_nombre']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="errorTxt2"></div>
                    </div>
                    <br>
                    <div class="input-field col s8">
                        <i class="mdi-action-search prefix"></i>
                        <input type="text" id="equipo"  data-url="<?php echo crearUrl('Programacion', 'programacion', 'listarEquipo', array('noVista' => "noVista")) ?>">
                        <label form="equipo">Equipos</label>
                        <div id="conte" class="conte" style="z-index: 4; position: absolute; width: 90%;">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class=" col s2">
                        <label for="fecha">(*) Fecha Registro Programacion</label>
                        <input readonly="" type="text"class="validate" value="<?php echo date('j F, Y'); ?>" >
                    </div>

                    <div class=" col s2">
                        <label for="inicio">(*) Fecha Inicio Programacion</label>
                        <input id="inicio" type="date" class="datepicker" required="true" name="inicio" data-error=".errorTxt4">
                        <div class="errorTxt4"></div>
                    </div>

                </div>
                <div id="mod" class="modal">
                    <div class="modal-content model-data">
                    </div>   
                    <!--div class="modal-footer">
                             <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">OK</a>
                           </div-->
                </div>
        </div>
    </div>
    <div class="card-panel">
        <div class="container">
            <div class="row">
                <label><h6>(*) PROGRAMACIONES:</h6></label>
                <div class="divider"></div>
                <div class="input-field col s12">
                    <table class="striped" cellspacing="0">
                        <thead>
                            <tr>
                                <th>(*) Placa</th>
                                <th>(*) Equipo</th>
                                <th>(*) Componente</th>
                                <th>(*) Tarea</th>
                                <th>(*) Tipo de trabajo</th>
                                <th>(*) Duracion horas</th>
                                <th>(*) Frecuencia</th>
                                <th>(*) Medidor</th>
                                <th>(*) Prioridad</th>
                                <th>Quitar</th>
                            </tr>
                        </thead>
                        <tbody id="programaciones"></tbody>
                    </table>
                </div>
            </div>
  
            <div class="row">
                <div class="input-field col s3 offset-s9">
                    <br><br>
                    <button class="btn teal waves-effect waves-light right" name="action" id="enviar" type="submit"><i class="mdi-content-add"></i>Registrar</button>
                    
                </div>
            </div>
        </div>
    </div>
</form>


<script type="text/javascript">
    $(".modal-trigger").leanModal({
        dismissible: true,
    opacity: .5,
        in_duration: 300,
        out_duration: 200,
        ready: function () {

        },
        complete: function () {

        }
    });
</script>






