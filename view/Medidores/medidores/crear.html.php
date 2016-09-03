<div class="card-panel"> 
    <div class="container">
        <!--Inicio contenedor mensajes de error-->
        <div class="card red">
            <div id="cont_errors_ajax" class="card-content white-text">
            </div>
        </div>
        <!--Fin contenedor mensajes de error-->
        <form  class="formValidate" action="<?php echo crearUrl('medidores', 'medidores', 'postCrear') ?>" method="post" id="formMedidores" novalidate>
            <h5 class="header2">CREACION DE MEDIDOR</h5>
            <!--Inicio rastro de miga-->
            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                <li><a href="#">Medidores</a></li>
                <li class="active">Crear medidor</li>
            </ol>
            <!--Fin rastro de miga-->

            <!--Inicio mensaje de campos obligatorios-->
            <div id="card-alert" class="card teal">
                <div class="card-content white-text">
                    <p><i class="mdi-action-info-outline"></i> IMPORTANTE: Los campos marcados con (*) son obligatorios.</p>
                </div>
                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Fin mensaje de campos obligatorios--> 
            <?php
            $errores = getErrores();
            if (!$errores == "") {
                ?>
                <div id="prueba">
                    <div id="card-alert" class="card red">
                        <div class="card-content white-text">
                            <p><i class="mdi-alert-error"></i> 
                                <?php echo $errores ?>
                            </p>
                        </div>
                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="input-field col s6">
                    <input id="nombreMedidor" name="nombre" type="text" data-error=".errorTxt1" class="validate">
                    <label for="nombre">&nbsp;(*) Nombre del medidor</label>
                    <div class="errorTxt1"></div>
                </div>

                <div class="input-field col s6">
                    <input id="acronimo" name="acronimo" type="text" class="validate" data-error=".errorTxt2">
                    <label for="acronimo">&nbsp;(*) Acr&oacute;nimo</label>
                    <div class="errorTxt2"></div>
                </div>
            </div>

            <div class="row">

                <div class="input-field col s12">
                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="100" data-error=".errorTxt4" ></textarea>
                    <label for="descripcion">&nbsp;(*) Descripci&oacute;n</label>
                    <div class="errorTxt4"></div>
                </div>
                <div class="col s12">
                    <button class="btn teal waves-effect waves-light right btn_submit_modal" type="submit" name="action" id="enviar"<!--onclick="Materialize.toast('¡Registro exitos!', 4000, 'rounded')"-->
                            Crear
                            <i class="mdi-content-send right"></i>
                    </button>
                </div>
            </div>
            
        </form>
    </div>
</div>