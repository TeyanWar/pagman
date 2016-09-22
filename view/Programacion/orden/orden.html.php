<div class="card-panel">
        <h4 class="header">Ordenes Programadas</h4>

        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Programacion</a></li>
            <li><a href="#">Ordenes Programadas</a></li>
            <li class="active">Crear orden</li>
        </ol>

    <div class="col-lg-6">
        <div id="card-alert" class="card teal">
            <div class="card-content white-text">
                <p><i class="mdi-action-info-outline"></i> IMPORTANTE : Los campos marcados con (*) son obligatorios.</p>
                <p><i class="mdi-action-info-outline"></i> A continuacion podra buscar las ordenes programadas por Equipo, Tipo Trabajo y Tipo Medidor.</p>
            </div>

            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
    
    <div class="row">

        <div class="col s3">
            <label>Busqueda por: Equipo</label>
            <select class="select2" id="equipo" name="program" data-url="<?php  echo crearUrl("Programacion", "orden", "consultarAjax", array('noVista'=>"noVista"))?>" >
                <option value="" disabled selected>Seleccione</option>
                <?php 
                    foreach($equipos as $equi){
                    echo "<option value='".$equi["equi_nombre"]."'>". $equi["equi_nombre"] . "</option>";
                    }
                ?>
            </select>
        </div>

        <div class="col s3">
            <label>Busqueda por: Tipo trabajo</label>
            <select class="select2" id="trabajo" name="program" data-url="<?php  echo crearUrl("Programacion", "orden", "consultarAjax", array('noVista'=>"noVista"))?>" >
                <option value="" disabled selected>Seleccione</option>
                <?php 
                    foreach($ttrabajos as $ttra){
                    echo "<option value='".$ttra["ttra_descripcion"]."'>". $ttra["ttra_descripcion"] . "</option>";
                    }
                ?>
            </select>
        </div>

        <div class="col s3">
            <label>Busqueda por: Tipo Medidor</label>
            <select class="select2" id="medidor" name="program" data-url="<?php  echo crearUrl("Programacion", "orden", "consultarAjax", array('noVista'=>"noVista"))?>" >
                <option value="" disabled selected>Seleccione</option>
                <?php 
                    foreach($tmedidores as $tmed){
                    echo "<option value='".$tmed["tmed_nombre"]."'>". $tmed["tmed_nombre"] . "</option>";
                    }
                ?>
            </select>
        </div>
        
        <div class="input-field col s3">
            <input type="hidden" id="pro" name='program' data-url="<?php  echo crearUrl("Programacion", "orden", "consultarAjax", array('noVista'=>"noVista"))?>" >
        </div>

    </div>

    <form  id="formt" class="col s12" data-url="<?php echo crearUrl("Programacion", "orden", "Postordenpro", array('noVista'=>"noVista")) ?>" data-redirect="<?php echo crearUrl("Ot", "ot", "listar") ?>" method="POST" novalidate>
        <br />
        <div class="divider"></div>
        <div id="tabla"></div>
        <div class="divider"></div>
        <br />
        <!--Inicio contenedor mensajes de error-->
        <div class="card red">
            <div id="cont_errors_ajax" class="card-content white-text">
            </div>
        </div>
        <!--Fin contenedor mensajes de error-->
        <div class="row">
            

            <div class="col s3">
                <label>(*) Encargado</label>
                <select class="error browser-default select2" id="ot_encargado" name="ot_encargado" data-error=".errorTxt213">
                    <option value="" disabled selected>Seleccione</option>
                    <?php
                        foreach($encargados as $enc){
                        echo "<option value='".$enc["per_id"]."'>". $enc["nombrecom"] . "</option>";
                        }
                    ?>
                </select>
                <div class="errorTxt213"></div>
            </div>
            
            <div class="col s9">
                <label for="input_text">(*) Ayudantes</label>
                <input name= "ot_ayudantes" id="ot_ayudantes" type="text" length="100" class="validate" placeholder="
                       D&iacute;gite los ayudantes de la OT separados por coma: Ejemplo, ejemplo 2, ejemplo3." data-error=".errorTxt214">
                <div class="errorTxt214"></div>
            </div>
        </div>

        <div class="row">
            <div class=" col s2">
                <label for="fechaorden">(*) Fecha Registro Orden</label>
                <input readonly="" type="text" value="<?php echo date('d-m-Y'); ?>">
            </div>

            <div class=" col s2">
                <label for="ot_fecha_inicio">(*) Fecha Inicio</label>
                <input id="inicio" type="date" id="inicio" class="datepicker" required="true" name="inicio" data-error=".errorTxt324">
                <div class="errorTxt324"></div>
            </div>

            <div class="col s2">
                <label for="ot_fecha_fin">(*) Fecha Fin</label>
                <input id="inicio" type="date" id="ot_fin" class="datepicker" required="true" name="ot_fin" data-error=".errorTxt212">
                <div class="errorTxt212"></div>
            </div>

            <div class="input-field col s3">
                <i class="mdi-action-search prefix"></i>
                <input placeholder="Buscar Insumos" id="insum" name="insumo" type="text" data-url="<?php  echo crearUrl("Programacion", "orden", "listarInsumos", array('noVista'=>"noVista"))?>" >
                <label for="insumo" class="active">Busqueda De Insumos</label>
                <div id="conte" class="conte" style="z-index: 4; position: absolute; width: 90%;"></div>
            </div>
            
            <div class="input-field col s3">
                <i class="mdi-action-search prefix"></i>
                <input placeholder="Buscar Herramientas" id="herrm" name="herrami" type="text" data-url="<?php  echo crearUrl("Programacion", "orden", "listarherramientas", array('noVista'=>"noVista"))?>" >
                <label for="herrm" class="active">Busqueda De Herramientas</label>
                <div id="conteher" class="conteher" style="z-index: 4; position: absolute; width: 90%;"></div>
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="row">
            <div class="input-field col s6">
                <label><h6>(*) INSUMOS:</h6></label>
                <br>
                <br>
                <table class="striped" cellspacing="0">
                    <thead>
                        <tr>
                            <th>(*) Nombre</th>
                            <th>(*) Descripcion</th>
                            <th>(*) Valor</th>
                            <th>(*) Unidad Medida</th>
                            <th>(*) Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody id="insumosprog"></tbody>
                </table>
                <div class="row"><div class="errorTxt99"></div></div>
            </div>
            <div class="input-field col s1"></div>
            <div class="input-field col s5">
                <label><h6>(*) HERRAMIENTAS:</h6></label>
                <br>
                <br>
                <table class="striped" cellspacing="0">
                    <thead>
                        <tr>
                            <th>(*) Nombre</th>
                            <th>(*) Descripcion</th>
                            <th>(*) Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                    </thead>
                    <tbody id="herramientasprog"></tbody>
                </table>
                <div class="row"><div class="errorTxt90"></div></div>
            </div>
        </div>
        
        
        <br>
        <br>
        <div class="row">
            <div class="input-field col s5 "></div>
            <div class="input-field col s4">
                <button class="btn teal waves-effect waves-light" type="submit"><i class="mdi-content-add"></i>CREAR OT</button>
            </div>
<!--            <div class="input-field col s2">
                <a class="btn teal waves-effect waves-light" target="_blank" name="pdf"><i class="mdi-action-get-app"></i>EXPORTAR PDF</a>
            </div>-->
        </div>
    </form>

</div>