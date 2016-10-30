<!--Inicio contenedor mensajes de error-->
<div class="card red">
    <div id="cont_errors_ajax" class="card-content white-text">
    </div>
</div>
<!--Fin contenedor mensajes de error-->

<div class="col s12 m12 l6">
    <h4 class="header2">Modificar Tipo de Componente</h4> 
    <form action="<?php echo crearUrl("Equipos", "componentes", "postEditar", array('noVista')) ?>" method="post" id="editarComponentes">

        <div class="row">
            <div class="col s6">
                <label for="nombre">Nombre del componente</label>
                <input id="nombre" name="nombre" type="text" class="validate" value="<?php echo $componentes['comp_nombre'] ?>" data-error=".errorTxt1">	
                <div class="errorTxt1"></div>
            </div>
            <div class=" col s6">
                <label for="acronimo">Acrónimo</label>
                <input id="acronimo" name="acronimo" type="text" class="validate"  value="<?php echo $componentes['comp_acronimo'] ?>" data-error=".errorTxt2" >
                <div class="errorTxt2"></div>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s6">
                <select required name="equipo" class="select2" id="tipo_componente" data-error=".errorTxt1">
                    <?php
                    foreach ($equipos as $equipo) {
                        if ($equipo['equi_id'] == $componentes['equi_id']) {
                            echo "<option value='" . $equipo['equi_id'] . "' selected>" . $equipo['equi_nombre'] . "</option>";
                        } else {
                            echo "<option value='" . $equipo['equi_id'] . "'>" . $equipo['equi_nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div class="errorTxt1"></div>
                <label class="active">&nbsp;(*) Equipo al que pertenece el componente></label>
            </div>
            <div class="input-field col s6">
                <select required name="tipo_componente" class="select2" id="tipo_componente" data-error=".errorTxt1">
                    <?php
                    foreach ($tiposDeComponentes as $tiposDeComponente) {
                        if ($tiposDeComponente['tcomp_id'] == $componentes['tcomp_id']) {
                            echo "<option value='" . $tiposDeComponente['tcomp_id'] . "' selected>" . $tiposDeComponente['tcomp_nombre'] . "</option>";
                        } else {
                            echo "<option value='" . $tiposDeComponente['tcomp_id'] . "'>" . $tiposDeComponente['tcomp_nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div class="errorTxt1"></div>
                <label class="active">&nbsp;(*) Tipo de Componente</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="materialize-textarea" length="100" data-error=".errorTxt3"><?php echo $componentes['comp_descripcion'] ?></textarea>
                <div class="errorTxt3"></div>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $componentes['comp_id'] ?>">
        <!--
                    <button class="btn cyan waves-effect waves-light" type="submit" name="action">Actualizar
                        <i class="mdi-content-send"></i>
                    </button>-->

        <div class="row center" >
            <div class="input-field col  m3 "></div>
            <div class="input-field col  m3 "> 
                <button type="button" class="btn blue cerrar" value="">Cancelar</button>
            </div>
            <div class="input-field col  m3"> 
                <button type="submit" class="btn blue btn_submit_modal" value="submit" >Actualizar</button>
            </div>
        </div>
    </form>
</div>
<script>
    $('select').material_select();
</script>

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


    $("#editarMedidores").validate({
        rules: {
            tmed_nombre: {
                required: true,
                minlength: 2,
                maxlength: 44,
                lettersonly: true
            },
            tmed_acronimo: {
                required: true,
                minlength: 1,
                maxlength: 3
            },
            tmed_descripcion: {
                required: true,
                minlength: 5,
                maxlength: 44,
                lettersonly: true
            },
            tmed_estado: {
                required: true
            }
        },
        //For custom messages
        messages: {
            tmed_nombre: {
                required: "Este campo no puede estar vac&iacute;o",
                minlength: "Debe contener minimo 2 caracteres",
                maxlength: "En este campo solo se admiten 44 caracteres"
            },
            tmed_acronimo: {
                required: "Este campo es obligatorio",
                minlength: "Debe contener al menos 1 caracteres",
                maxlength: "No puede sobrepasar los 3 caracteres"
            },
            tmed_descripcion: {
                required: "Este campo es obligatorio",
                minlength: "Debe contener al menos 5 caracteres",
                maxlength: "No puede sobrepasar los 44 caracteres"
            },
            tmed_estado: {
                required: "Este campo es obligatorio"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        }
    });
</script>
<style>
    #editarTcomp{
        top: 2% !important;
        max-height: 100%;
        height: 65%;
        width: 1000px;
    }
</style>