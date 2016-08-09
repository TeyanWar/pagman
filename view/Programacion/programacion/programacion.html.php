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
            <select id="componente">
                <?php foreach ($componentes as $componente) { ?>
                    <option  ><?php echo $componente['comp_descripcion']; ?></option>
                <?php } ?>

            </select>
            <label>(*) Componente</label>
        </div>
        <div class="input-field col s4">
            <select id="tra">
                <?php foreach ($tipos as $tipo) { ?>
                    <option><?php echo $tipo['ttra_descripcion']; ?></option>
                <?php } ?>

            </select>
            <label>(*) Tipo de Trabajo</label>
        </div>
        
        <div class="input-field col s4">
            <select id="tarea">
                <?php foreach ($tareas as $tarea) { ?>
                    <option><?php echo $tarea['tar_nombre']; ?></option>
                <?php } ?>

            </select>
            <label>(*) Tarea</label>

        </div>        
        
        
    </div>
    <div class='row'>
        <div class="input-field col s4">
            <label for="hora">(*) Duracion horas</label>
            <input type="text" id="hora" name="hora" data-error=".errorTxt91">
            <div class="errorTxt91"></div>
        </div>
        
        <div class=" input-field col s4">
              <label for="frecuencia">(*) Frecuencia</label>
              <input type="text" id="frecuencia" name="frecuencia" data-error=".errorTxt92">
            <div class="errorTxt92"></div>
        </div>
        
        <div class="input-field col s4">
            <select id="med">
                <?php foreach ($medidores as $medidor) { ?>
                    <option  ><?php echo $medidor['tmed_nombre']; ?></option>
                <?php } ?>

            </select>
            <label>(*) Medidores</label>
        </div>
        
    </div>
    <div class='row'>

  
        <div class="input-field col s4">
            <select id="prio">
                <?php foreach ($prioridades as $prio) { ?>
                    <option><?php echo $prio['priotra_descripcion']; ?></option>
                <?php } ?>

            </select>
            <label>(*) Prioridad de trabajo</label>

        </div>
      
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

<script>
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
                minlength: 1,
                maxlength: 10
            },
            frecuencia: {
                required: true,
                digits: true,
                minlength: 1,
                maxlength: 10
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            hora:{
                required: "El telefono es obligatorio.",
                digits: "El valor debe ser numerico",
                minlength: "Introduzca al menos 1 caracter",
                maxlength: "Solo se permite introducir maximo 10 caracteres"
            },
            frecuencia:{
                required: "El movil es obligatorio.",
                digits: "El valor debe ser numerico",
                minlength: "Introduzca al menos 1 caracter",
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
