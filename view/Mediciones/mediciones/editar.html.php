<form role="form" action="<?php echo crearUrl('mediciones', 'mediciones', 'postEditar') ?>" method="post" id="editarMediciones">

    <div class="row">

        <div class="col s6">
            <label for="nombreResponsable">Nombre</label>
            <input disabled id="disabled" type="text" class="validate" value="<?php echo $mediciones['per_nombre'] ?>">
        </div>

        <div class="col s6">
            <label for="nombreEquipo" align="center">Nombre equipo</label>
            <input disabled id="disabled" type="text" class="validate" value="<?php echo $mediciones['equi_nombre'] ?>">
        </div>
    </div>


    <div class="row">
        <div class="col s6">
            <label for="medidaActual" class="active">Medida actual</label>
            <input id="medidaActual" name="medidaActual" type="text" class="validate" value="<?php echo $mediciones['ctrmed_medida_actual'] ?>">

        </div>

        <div class="row">
            <div class="input-field col s6">
                <input id="fecha" name="fechaMedicion" type="date" class="datepicker" required="true" value="<?php echo $mediciones['ctrmed_fecha'] ?>">
                <label for="fecha" class="active">Fecha Medición</label>
            </div>
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

    $(document).ready(function () {
        $('select').material_select('destroy');
        $('select').material_select();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 15 // Creates a dropdown of 15 years to control year
        });

    });

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

    $("#editarMediciones").validate({
        rules: {
            medidaActual: {
                required: true,
                minlength: 1,
                maxlength: 5,
                numeric: true
            },
            fechaMedicion: {
                required: true,
                minlength: 10,
                maxlength: 20,
            }
        },
        //For custom messages
        messages: {
            medidaActual: {
                required: "Este campo no puede estar vacio",
                minlength: "Debe contener minimo 1 caracteres",
                maxlength: "En este campo no se admiten mas de 5 caracteres",
                numeric: "Unicamente numeros por favor"
            },
            fechaMedicion: {
                required: "Este campo no puede estar vacio",
                minlength: "Debe contener minimo 10 caracteres",
                maxlength: "En este campo no se admiten mas de 20 caracteres",
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