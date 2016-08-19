<div class="card-panel">
    <div class="container">
        <div class="row">  
            <h4 class="header2">Registrar medici&oacute;n</h4>
            <form class="col s12" role="form" action="<?php echo crearUrl('mediciones', 'mediciones', 'ajaxGuardarMedidas', array('noVista' => 'noVista')) ?>" method="post" id="formMediciones">

                <!--Inicio rastro de miga-->
                <ol class="breadcrumbs">
                    <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                    <li><a href="#">Mediciones</a></li>
                    <li class="active">Registrar medici&oacute;n</li>
                </ol>
                <!--Fin rastro de miga-->

                <!--Inicio mensaje de campos obligatorios-->
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
                if (!$errores == "") {
                    ?>
                    <div id="prueba">
                        <div id="card-alert" class="card red">
                            <div class="card-content white-text">
                                <p><i class="mdi-alert-error"></i> 
                                <p><?php echo $errores ?></p>
                            </div>
                            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
<?php } ?>

                <!--Fin mensaje de campos obligatorios-->
                
                <div class="row">
                    <div class="input-field col s6">
                        <select class="select2" multiple="multiple" name="personas" id="personas" data-error=".errorTxt1">
                            <?php foreach ($personas as $persona) { ?>
                                <option value="<?php echo $persona['per_id'] ?>"><?php echo $persona['per_nombre'] ?></option>
<?php } ?>
                        </select>
                        <div class="errorTxt1"></div>
                        <label class="active">&nbsp;(*) Nombre del responsable</label>

                        <!--INICIO Div que Lista los equipos y su medicion-->
                        <div id="contenedor-equipos">
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-field="cod_equ">C&oacute;digo equ&iacute;po</th>
                                        <th data-field="nom_equ">Nombre equ&iacute;po</th>
                                        <th data-field="medicion">Medici&oacute;n actual</th>
                                        <th data-field="medicion">Tipo Medidor</th>
                                        <th data-field="fecha_med">Fecha Medici&oacute;n</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div><!--FIN Div que Lista los equipos y su medicion--> 

                    </div>

                    <div class="input-field col s6">
                        <select class="select2" multiple="multiple" name="equipos" id="equipos" data-error=".errorTxt2">
                            <?php foreach ($equipos as $equipo) { ?>
                                <option value="<?php echo $equipo['equi_id'] ?>"><?php echo $equipo['equi_nombre'] ?></option>
<?php } ?>
                        </select>
                        <div class="errorTxt2"></div>
                        <label class="active">&nbsp;(*) Seleccione un equ&iacute;po</label>

                        <!--Inicion div que contiene los equipos que se van agregando-->
                        <div id="equipos-agregados">
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-field="nom_equ">Nombre equ&iacute;po</th>
                                        <th data-field="medicion">Medici&oacute;n actual</th>
                                        <th data-field="fecha_med">Fecha Medici&oacute;n</th>
                                        <th>Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <!--Fin div que contiene los equipos que se van agregando-->

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s7 ">
                        <input data-url="<?php echo crearUrl('mediciones', 'mediciones', 'ajaxGuardarMedidas', array('noVista' => 'noVista')) ?>" data-redirect="<?php echo crearUrl('mediciones', 'mediciones', 'listar') ?>" 
                               id="btn-guardar-medidas" class="btn waves-effect waves-light teal darken-2 right" type="submit" name="action" value="Registrar medici&oacute;n"/>

                    </div>
                </div>
                <input type="hidden" id="consecutivo" value="0" />
            </form>

        </div>
    </div>
</div>

<script>



    //Inicio código modal tipo medidor para actualizacion
    $(".modificar").click(function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalModificar > .modal-content").html(data);
            }
        });
    });//Fin código modal tipo medidor para actualizacion

</script>