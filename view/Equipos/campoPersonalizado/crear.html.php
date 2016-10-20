
<!--@Hecho : Diego Velez - TADSI 03
//Fecha: Setpiembre 7/2016 -->
<div class="col s12 m12 l6">
    <!--Inicio del card panel-->
    <div class="card-panel">
        <h5>CREAR UN CAMPO PERSONALIZADO</h5>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("equipos", "campoPersonalizado", "listar") ?>">Listar/Consultar</a></li>
            <li class="active">Crear campo personalizado</li>
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
            <form id="formCamposPersonalizados" class="col s12" action="<?php echo crearUrl("equipos", "campoPersonalizado", "postCrear", array('noVista')) ?>" method="POST" enctype='multipart/form-data' novalidate>
                <div class="row col s6">
                    <div class="input-field col s12">
                        <input type="text" id="codigoCP" name="codigoCP" data-error=".errorTxt1" class="validate" required>
                        <label for="codigoCP" class="active" >(*)Codigo campo personalizado:</label>
                        <div class="errorTxt1"></div>
                    </div>
                    <span class="help-block">
                        Por favor digite el codigo del campo Personalizado a registrar, recuerde que el <code>codigo del Campo Personalizado</code> 
                        debe corresponder al siguiente patron: <code>CP0XXXX</code>
                    </span>
                </div>
                <div class="row col s6">
                    <div class="input-field col s12">
                        <input type="text" id="nombreCP" data-error=".errorTxt2" name="nombreCP" class="validate" required>
                        <label for="nombreCP" class="active" >(*)Nombre campo personalizado:</label>
                        <div class="errorTxt2"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <button name="action" type="submit" class="btn teal waves-light right btn_submit_modal">Crear
                            <i class="mdi-content-add right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Fin del card panel-->
</div>
