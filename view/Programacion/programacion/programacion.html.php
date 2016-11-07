<?php if(isset($infogarantia)) { ?>
    <div class="container"><!--start container-->

        <div class="card red" id="card-alert">
            <div class="card-content white-text">
              <h4><i class="mdi-alert-warning" style="font-size: 30px;"></i> Cuidado </h4>
              <p>
                  Actualmente el equipo <code><b><?php echo $infogarantia; ?></b></code> cuenta con 
                  una fecha de garantia vigente.
                  <br>
                  Fecha Vecimiento De Garantia: <?php echo $vencegarantia; ?>
                  <br>
                  <br>
                  <code><b>PAGMAN no se hace responsable del mal uso que le den</b></code>
              </p>
            </div>
            <button aria-label="Close" data-dismiss="alert" class="close white-text" type="button">
              <span aria-hidden="true">×</span>
            </button>
        </div>
    </div>
<?php } ?>


<form  id="progr" novalidate>
    <div class='row' id="tabla">
        <div class='col s6' id="codigo">
            <label>(*) Placa</label>
            <input readonly="" id="pla"  type='text' value="<?php echo $_POST['equipo']; ?>">
        </div>
        <div class='col s6' id="nombre">
            <label>(*) Nombre</label>
            <input readonly="" id="plo" type='text' value="<?php echo $_POST['equi']; ?>" >
        </div>
    </div>
    <div class='row'>
        <div class="input-field col s4">
            <small style="color: #848484;">Componente (opcional)</small>
            <select id="componente" class="select2">
                <option value="INDEFINIDO">(Vacio)</option>
                <?php foreach ($componentes as $componente) { ?>
                    <option  ><?php echo $componente['comp_nombre']; ?></option>
                <?php } ?>

            </select>
        </div>
        <div class="input-field col s4">
            <small style="color: #848484;">(*) Tipo de Trabajo</small>
            <select id="tra" class="select2">
                <?php foreach ($tipos as $tipo) { ?>
                    <option><?php echo $tipo['ttra_descripcion']; ?></option>
                <?php } ?>

            </select>
        </div>
        
        <div class="input-field col s4">
            <small style="color: #848484;">(*) Tarea</small>
            <select id="tarea" class="select2">
                <?php foreach ($tareas as $tarea) { ?>
                    <option><?php echo $tarea['tar_nombre']; ?></option>
                <?php } ?>

            </select>
        </div>        
        
        
    </div>
    <div class='row'>
        <div class="input-field col s4">
            <small style="color: #848484;" for="hora">(*) Duracion horas</small>
            <input type="text" id="hora" name="hora" data-error=".errorTxt91">
            <div class="errorTxt91"></div>
        </div>
        
        <div class=" input-field col s4">
              <small style="color: #848484;" for="frecuencia">(*) Frecuencia</small>
              <input type="text" id="frecuencia" name="frecuencia" data-error=".errorTxt92">
            <div class="errorTxt92"></div>
        </div>
        
        <div class="input-field col s4">
            <small style="color: #848484;">(*) Medidores</small>
            <select id="med" class="select2">
                <?php foreach ($medidores as $medidor) { ?>
                    <option  ><?php echo $medidor['tmed_nombre']; ?></option>
                <?php } ?>

            </select>
        </div>
        
    </div>
    <div class='row'>

        <div class="input-field col s4">
            <small style="color: #848484;">(*) Prioridad de trabajo</small>
            <select id="prio" class="select2">
                <?php foreach ($prioridades as $prio) { ?>
                    <option><?php echo $prio['priotra_descripcion']; ?></option>
                <?php } ?>
            </select>
        </div>

    </div>
    
    <div class="row">
        <br>
        <div class="input-field col s12">
            <label for="tario"  class="active">Comentario guia</label>
            <textarea id="tario" class="materialize-textarea" length="120"></textarea>
            <span class="help-block">
                Por favor ingrese el paso a paso separado por: <code>coma (,)</code>
            </span>
        </div>
    </div>

    <div class="row">
        
        <div class="input-field offset-s4 col s2 ">
            <a class="btn-floating btn-large waves-effect waves-light cyan lighten-1  modal-action modal-close" href="#" id="tab"  data-url="<?php echo crearUrl('Programacion', 'programacion', 'añadirFila', array('noVista' => "noVista")); ?>">
                <i class="mdi-content-add"></i></a>
        </div>
         <div class="input-field col s2 ">
             <a class="btn-floating btn-large waves-effect waves-light red  modal-action modal-close" href="#" >
                <i class="mdi-content-clear"></i></a>
        </div>
        
    </div>
   

</form>

<style>
    #mod{
        top: 17% !important;
        max-height: 100%;
        height: 75%;
        width: 80%;
    }
</style>

<script>
    $(".select2").select2({});
    
    $(document).ready(function () {
        $('select').material_select('destroy');
        $('select').material_select();
      
      $(document).on('click', '.modal-close', function () {    
        $("#mod").closeModal();
      });   

    });
</script>

<script>
    //----------------- validaciones ---------------
    $("#progr").validate({
        rules: {
            hora: {
                required: true,
                digits: true,
                maxlength: 10
            },
            frecuencia: {
                required: true,
                digits: true,
                maxlength: 10
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            hora:{
                required: "Duracion horas es obligatorio.",
                digits: "El valor debe ser numerico",
                maxlength: "Solo se permite introducir maximo 10 caracteres"
            },
            frecuencia:{
                required: "Frecuencia es obligatorio.",
                digits: "El valor debe ser numerico",
                maxlength: "Solo se permite introducir maximo 10 caracteres"
            },
            curl: "Enter your website",
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
    });

</script>
