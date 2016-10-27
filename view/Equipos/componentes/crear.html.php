<div class="card-panel"> 
    <div class="container">

        <h5 class="header2">CREAR COMPONENTE</h5>
        <!--Inicio rastro de miga-->
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Equipos</a></li>
            <li><a href="#">Componentes</a></li>
            <li class="active">Crear componente</li>
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

        <!--Inicio contenedor mensajes de error-->
        <div class="card red">
            <div id="cont_errors_ajax" class="card-content white-text">
            </div>
        </div>
        <!--Fin contenedor mensajes de error-->
        <form  class="formValidate" action="<?php echo crearUrl('equipos', 'Componentes', 'postCrear', array('noVista')) ?>" method="post" id="formTipoComponentes" novalidate>
            <div class="row">
                <div class="input-field col s4">
                    <input id="nombreMedidor" name="nombre" type="text" data-error=".errorTxt1" class="validate">
                    <label for="nombre">&nbsp;(*) Nombre del Componente</label>
                    <div class="errorTxt1"></div>
                </div>

                <div class="input-field col s4">
                    <input id="acronimo" name="acronimo" type="text" class="validate" data-error=".errorTxt2">
                    <label for="acronimo">&nbsp;(*) Acr&oacute;nimo</label>
                    <div class="errorTxt2"></div>
                </div>


                <div class="input-field col s4">
                    <select required name="tipo_componente" class="select2" id="tipo_componente" data-error=".errorTxt1">
                        <option value="" disabled selected>Escoja un Tipo de componente...</option>
                        <?php foreach ($tipoComponentes as $tipoComponente) { ?>
                            <option value="<?php echo $tipoComponente['tcomp_id'] ?>"><?php echo $tipoComponente['tcomp_nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="errorTxt1"></div>
                    <label class="active">&nbsp;(*) Tipo de Componente</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <select required name="equipo" class="select2" id="equipo" data-error=".errorTxt1">
                        <option value="" disabled selected>Escoja un Equipo...</option>
                        <?php foreach ($equipos as $equipo) { ?>
                            <option value="<?php echo $equipo['equi_id'] ?>"><?php echo $equipo['equi_nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="errorTxt1"></div>
                    <label class="active">&nbsp;(*) Equipo</label>
                </div>
                <div class="input-field col s6">
                    <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="100" data-error=".errorTxt4" ></textarea>
                    <label for="descripcion">&nbsp;(*) Descripci&oacute;n</label>
                    <div class="errorTxt4"></div>
                </div>
            </div>



            <div class="row">
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