<div class="card-panel"> 
    <div class="container">
        <form  class="formValidate" action="<?php echo crearUrl('medidores', 'medidores', 'postCrear') ?>" method="post" id="formMedidores" novalidate>
            <h4 class="header2">Crear T&iacute;po de Medidor</h4>
            <!--Inicio rastro de miga-->
            <ol class="breadcrumbs">
                <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
                <li><a href="#">Medidores</a></li>
                <li class="active">Crear T&iacute;po de medidor</li>
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

                <div class="input-field col s6">
                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="100" data-error=".errorTxt4" ></textarea>
                    <label for="descripcion">&nbsp;(*) Descripci&oacute;n</label>
                    <div class="errorTxt4"></div>
                </div>
                <div class="col s12">
                <button class="btn teal waves-effect waves-light right" type="submit" name="action" id="enviar"<!--onclick="Materialize.toast('¡Registro exitos!', 4000, 'rounded')"-->>
                        Crear medidor
                        <i class="mdi-content-add left"> </i>
                </button>
            </div>
            </div>
            
        </form>
    </div>
</div>