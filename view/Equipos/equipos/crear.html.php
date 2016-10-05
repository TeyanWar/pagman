<div class="col s12 m12 l6">
    <div class="card-panel">
        <h5>CREAR NUEVO EQUIPO</h5>
        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="<?php echo crearUrl("equipos", "equipos", "listar") ?>">Listar/Consultar</a></li>
            <li class="active">Crear Equipo</li>
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
            <form id="formEquipos" class="col s12" action="<?php echo crearUrl("equipos", "equipos", "postCrear", array('noVista')) ?>" method="POST" enctype='multipart/form-data' novalidate>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="equi_id" name="equi_id" class="validate" data-error=".errorTxt1">
                        <label for="equi_noplaca" class="active" >(*) N.Placa:</label>
                        <div class="errorTxt1"></div>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_nombre" name="equi_nombre" class="validate" data-error=".errorTxt3">
                        <label for="equi_nombre">(*) Nombre Del Equipo:</label>
                        <div class="errorTxt3"></div>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_modelo" name="equi_modelo" class="validate" data-error=".errorTxt5">
                        <label for="equi_modelo" class="active" >(*) Modelo (Año en el que se fabrico):</label>
                        <div class="errorTxt5"></div>
                    </div>
                </div>

                <!---- INICIO ROW QUE CONTIENE NUMERO SERIE, MARCA DEL EQUIPO Y FABRICANTE ------------>

                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" id="equi_serie" name="equi_serie" class="validate" data-error=".errorTxt6">
                        <label for="equi_noserie">(*) No. Serie:</label>
                        <div class="errorTxt6"></div>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_marca" name="equi_marca" class="validate" data-error=".errorTxt8">
                        <label for="equi_marca" class="active" >(*) Marca:</label>
                        <div class="errorTxt8"></div>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_fabricante" name="equi_fabricante" class="validate" data-error=".errorTxt7">
                        <label for="equi_fabricante" class="active" >(*) Fabricante:</label>
                        <div class="errorTxt7"></div>
                    </div>
                </div>

                <!--------------- NUEVO DIV ROW QUE CONTIENE ESTADO DEL EQUIPO, AREA DEL EQUIPO Y ENCARGADO --------------------->

                <div class="row">
                    <div class="input-field col s4">
                        <select class="error browser-default select2" id="est_id" name="est_id" data-error=".errorTxt4">
                            <option value="">(Vacio)</option>
                            <?php
                            foreach ($estados as $estado) {
                                echo "<option value=" . $estado['est_id'] . ">" . $estado['est_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="errorTxt4"></div>
                        <label for="Estado_equipo" class="active">(*) Elija Estado Del Equipo</label>
                    </div>

                    <div class="input-field col s4">
                        <select name="area_id" class="error browser-default select2" data-error=".errorTxt15">
                            <option value="" >(Vacio)</option>
                            <?php
                            foreach ($areas as $area) {
                                echo "<option value=" . $area['area_id'] . ">" . $area['area_descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="errorTxt15"></div>
                        <label for="area_id" class="active">(*) Seleccion El Area:</label>
                    </div>
                    <div class="input-field col s4">
                        <select class="error browser-default select2" id="per_id" name="per_id" data-error=".errorTxt2">
                            <option value="">(Vacio)</option>
                            <?php
                            foreach ($personas as $persona) {
                                echo "<option value=" . $persona['per_id'] . ">" . $persona['per_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="errorTxt2"></div>
                        <label for="Persona" class="active">(*) Seleccione El Encargado:</label>
                    </div>          
                </div>

                <!--------------------- NUEVO DIV ROW QUE CONTIENE FECHA DE COMPRA, INSTACION Y VIGENCIA DE LA GARAMTOA DEL EQUIPO----------------------------------->

                <div class="row">
                    <div class="input-field col s4">
                        <input type="date" name="equi_fecha_compra" data-error=".errorTxt10">
                        <label class="active" for="equi_fecha_compra">(*) Fecha De Compra:</label> 
                        <div class="errorTxt10"></div>
                    </div>
                    <div class="input-field col s4">
                        <input type="date" name="equi_fecha_instalacion" data-error=".errorTxt11">
                        <label class="active" for="equi_fecha_instalacion">(*) Fecha De Instalacion:</label>
                        <div class="errorTxt11"></div>
                    </div>
                    <div class="input-field col s4">
                        <input type="date" name="equi_vence_garantia" data-error=".errorTxt12">
                        <label class="active" for="equi_vence_garantia">(*) Vecimiento De Garantia:</label>
                        <div class="errorTxt12"></div>
                    </div>
                </div>

                <!-------------------- NUEVO DIV ROW QUE CONTIENE CENTRO DE FORMARION,  TIPO DE EQUIPO, UBICACION EN EL CENTRO------------------------------------------->

                <div class="row">
                    <div class="input-field col s4">
                        <select id="cen_id" name="cen_id" class="error browser-default select2" data-error=".errorTxt13">
                            <option value="">(Vacio)</option>
                            <?php
                            foreach ($centros as $centro) {
                                echo "<option value=" . $centro['cen_id'] . ">" . $centro['cen_nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="errorTxt13"></div>
                        <label for="cen_id" class="active">(*) Seleccione El Centro De Formacion:</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" id="equi_ubicacion" name="equi_ubicacion" class="validate" data-error=".errorTxt9">
                        <label for="equi_ubicacion">(*) Ubicacion en el centro:</label>
                        <div class="errorTxt9"></div>
                    </div>
                </div>

                <!------------------------- NUEVO DIV ROW QUE CONTIENE FOTO DEL EQUIPO, DIV QUE MUESTRA LOS CAMPOS PERSONALIZADOS Y EL TIPO DE MEDIDOR -------------------------------------------->

                <div class="row">
                    <div class="file-field input-field col s4">
                        <div class="btn teal waves-effect waves-light right animated infinite rubberBand">
                            <span>Subir Foto del Equipo</span>
                            <input type='file' id='ruta' name='ruta'>
                        </div>  
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Eliga la imagen" readonly="">
                        </div>
                    </div>
                    <center>
                        <div class="input-field col s4">
                            <div class="btn teal darken-2">
                                <div class="modal-trigger" href="#modal1">
                                    <span>Seleccione el tipo de medidor</span>
                                </div>    
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="hidden">
                            </div>
                        </div>
                    </center>
                </div>

                <!----------------------------- SELECCIONAR TIPO DE MEDIDOR ------------------------------->

                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4 class="header2">Seleccione el/los Medidor(es) a usar en este equipo</h4>
                        <br>
                        <?php foreach ($medidores as $medidor) { ?>
                            <p>
                                <input name="medidores[]" id="<?php echo $medidor['tmed_id'] ?>" value="<?php echo $medidor['tmed_id'] ?>" type="checkbox">
                                <label for="<?php echo $medidor['tmed_id'] ?>"><?php echo ucwords($medidor['tmed_nombre']); ?></label>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="modal-footer">
                        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
                    </div>
                </div>

                <!--------------------DIV ROW BOTON CREAR ------------------------------------------->
                <div class="row">
                    <div class="input-field col s12">
                        <button name="action" type="submit" class="btn teal waves-light right">Crear
                            <i class="mdi-content-add right"></i>
                        </button>
                    </div>
                </div>
            </form> <!-- Cierre FORM ---->
        </div> <!-- cierre ROW que abarca TODO ---->
    </div> <!----- Cierre CARD PANEL--->
</div> <!--- CIERRE DIV PRINCIPAL ------->
