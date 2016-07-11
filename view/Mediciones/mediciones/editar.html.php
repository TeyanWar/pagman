<form role="form" action="<?php echo crearUrl('mediciones', 'mediciones', 'postEditar') ?>" method="post">
    
    <div class="row">
        
        <div class="col s6">
            <label for="nombreResponsable">Nombre</label>
            <input disabled id="disabled" type="text" class="validate" value="<?php echo $mediciones['per_nombre'] ?>">
            
        </div>
            
        <div class="col s6">
            <label for="nombreEquipo">Nombre equipo</label>
            <input disabled id="disabled" type="text" class="validate" value="<?php echo $mediciones['equi_nombre'] ?>">
            
        </div>
    </div>
       
    
    <div class="row">
        <div class="col s6">
            <label for="medidaActual">Medida actual</label>
            <input id="medidaActual" name="medidaActual" type="text" class="validate" value="<?php echo $mediciones['ctrmed_medida_actual'] ?>">
            
        </div>
    
    
    
        <div class="col s6">
            <label for="fechaMedicion">Fecha medicion</label>
            <input name="fechaMedicion"  type="date" class="datepicker" value="<?php echo $mediciones['ctrmed_fecha'] ?>">
            
        </div>
    </div>
    
    <input type="hidden" name="id" value="<?php echo $mediciones['ctrmed_id'] ?>">
    <input type="hidden" name="equipo" value="<?php echo $mediciones['equi_id'] ?>">
    <input type="hidden" name="persona" value="<?php echo $mediciones['per_id'] ?>">
    
    <button class="btn waves-effect waves-light teal" type="submit" name="action">Guardar
        <i class="material-icons right"></i>
    </button>
</form>

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
</script>