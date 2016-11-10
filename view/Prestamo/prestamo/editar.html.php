<head>
    <link href="<?php echo addLib('css/select2.css') ?>" rel="stylesheet" type="text/css">
</head>
<div class="col s12 m12 l6">
    <div class="card-panel">
        <h4 class="header2"> Editar Solicitud de Prestamo </h4>
        <div class="row">
            <form class="form-horizontal" role="form" action="<?php echo crearUrl("prestamo", "prestamo", "postEditar") ?>" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <label for="pher_observaciones" class="active">Observaciones generales</label>
                        <input type="text" class="form-control" id="pher_observaciones" name="pher_observaciones"value="<?php echo $prestamo['pher_observaciones'] ?>">
                    </div>
                    <div class="input-field col s6">
                        <label for="Jornada" class="active"> (*) Seleccione la jornada: </label>
                        <select class="error browser-default select2" name="jor_id" id="jor_id">
                            <?php
                            foreach ($jornada as $jor) {

                                echo "<option value=" . $jor['jor_id'] . ">" . $jor['jor_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <!-- Campo para almacenar el id de la herramienta -->
                <input type="hidden" name="id" value="<?php echo $prestamo['pher_id'] ?>">

                <!--botonera de la ventana de editar-->
                <div class="row center" >
                    <div class="input-field col  m3 "></div>
                    <div class="input-field col  m8"> 
                        <button type="submit" class="btn teal waves-effect waves-light right animated infinite rubberBand" value="submit" >Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo addLib('js/select2.full.min.js') ?>"></script>
<script type="text/javascript">
    $(".select2").select2({});
</script>

