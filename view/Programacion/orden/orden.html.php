<div class="card-panel">
        <h4 class="header">Ordenes Programadas</h4>

        <ol class="breadcrumbs">
            <li><a href="<?php echo addLib('') ?>">Panel de control</a></li>
            <li><a href="#">Programacion</a></li>
            <li class="active">Ordenes Programadas</li>
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
        
        <?php $error=getErrores(); ?>
        <?php if (!$error=="") { ?>
           <div id="card-alert" class="card red">
               <div class="card-content white-text">
                   <p><i class="mdi-alert-error"></i> <?php echo $error; ?> </p>
               </div>

               <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
               </button>
           </div>
       <?php } ?>
    
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
        
<!--        action="<?php echo crearUrl('programacion', 'orden', 'Postordenpro') ?>"-->
        
        
<!--        data-url="<?php echo crearUrl("Programacion", "orden", "Postordenpro", array('noVista' => 'noVista')) ?>" data-redirect="<?php echo crearUrl("Ot", "ot", "listar") ?>"-->

    <form  id="formt" class="col s12" action="<?php echo crearUrl('programacion', 'orden', 'Postordenpro') ?>" method="POST" novalidate>
        <?php echo '<br />'; ?>
        <div class="divider"></div>
        <div id="tabla"></div>
        <div class="divider"></div>

        <?php echo '<br /><br />'; ?>

        <div class="row">
            <div class=" col s3">
                <label for="fechaorden">(*) Fecha Registro Orden</label>
                <input readonly="" type="text" value="<?php echo date('d-m-Y'); ?>">
            </div>

            <div class=" col s3">
                <label for="ot_fecha_inicio">(*) Fecha Inicio</label>
                <input id="inicio" type="date" id="ot_fecha_inicio" name="ot_fecha_inicio" data-error=".errorTxt211">
                <div class="errorTxt211"></div>
            </div>

            <div class="col s3">
                <label for="ot_fecha_fin">(*) Fecha Fin</label>
                <input id="inicio" type="date" id="ot_fecha_fin" name="ot_fecha_fin" data-error=".errorTxt212">
                <div class="errorTxt212"></div>
            </div>

            <div class="col s3">
                <label>(*) Encargado</label>
                <select class="error browser-default select2" id="ot_encargado" name="ot_encargado" data-error=".errorTxt213">
                    <option value="" disabled selected>Seleccione</option>
                    <?php
                        foreach($encargados as $enc){
                        echo "<option value='".$enc["per_id"]."'>". $enc["per_nombre"] . "</option>";
                        }
                    ?>
                </select>
                <div class="errorTxt213"></div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <label for="input_text">(*) Ayudantes</label>
                <input name= "ot_ayudantes" id="ot_ayudantes" type="text" length="100" class="validate" placeholder="
                       D&iacute;gite los ayudantes de la OT separados por coma: Ejemplo, ejemplo 2, ejemplo3." data-error=".errorTxt214">
                <div class="errorTxt214"></div>
            </div>
        </div>

        <div class="row">
            <div class="input-field col m2 offset-m8">
                <button class="btn teal waves-effect waves-light" type="submit"><i class="mdi-content-add"></i>CREAR OT</button>
            </div>
            <div class="input-field col m2">
                <button class="btn teal waves-effect waves-light" target="_blank" name="pdf"><i class="mdi-action-get-app"></i>EXPORTAR PDF</button>
            </div>
        </div>
    </form>

</div>