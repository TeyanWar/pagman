$(document).ready(function () {

    //consulta Equipos
    $("#busquedaAjax").keyup(function () {
        var usuario = $("#busquedaAjax").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaEquipos=" + usuario,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });

    $("#busquedaAjax").trigger("keyup");



    $(document).on("click", ".ver-detalle1", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle1 > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".editar1", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate1 > .modal-content").html(data);
            }
        });
    });
    

    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var equi_id = $(this).attr('data-id');
        swal({title: "¿Realmente desea eliminar este registro?",
            text: "Recuerde  que una vez eliminado no se podra recuperar",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "Red ",
            confirmButtonText: "si,eliminar registro",
            closeOnConfirm: false},
        function () {
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    id: equi_id
                }
            });
    //       alert(equi_id);
            swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
          $("#busquedaAjax").trigger('keyup');
        });
    });
    
    
    //----------------- validaciones ---------------
    
    /* Incluimos un método para validar el campo nombre */

    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    
    $("#formequipo").validate({
        rules: {
            equi_id: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            per_id: {
                required: true
            },
            equi_nombre: {
                required: true,
                letra: true,
                minlength: 3,
                maxlength: 20
            },
            est_id: {
                required: true
            },
            equi_modelo: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_serie: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_fabricante: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_marca: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_ubicacion: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            equi_fecha_compra: {
                required: true
            },
            equi_fecha_instalacion: {
                required: true
            },
            equi_vence_garantia: {
                required: true
            },
            cen_id: {
                required: true
            },
            tequi_id: {
                required: true
            },
            area_id: {
                required: true
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            equi_id:{
                required: "El N.Placa es obligatorio.",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            per_id:{
                required: "El encargado del centro es obligatorio."
            },
            equi_nombre:{
                required: "El nombre del equipo es obligatorio.",
                letra: "Sólo se permiten letras",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            est_id:{
                required: "El estado del equipo es obligatorio."
            },
            equi_modelo:{
                required: "El modelo es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_serie:{
                required: "El número de serie es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_fabricante:{
                required: "El fabricante es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_marca:{
                required: "La marca es obligatoria.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_ubicacion:{
                required: "La ubicación es obligatoria.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_fecha_compra:{
                required: "La fecha de compra es obligatoria."
            },
            equi_fecha_instalacion:{
                required: "La fecha de instalacion es obligatoria."
            },
            equi_vence_garantia:{
                required: "La Fecha Vecimiento De Garantia es obligatorio."
            },
            cen_id:{
                required: "El dentro de formación es obligatorio."
            },
            tequi_id:{
                required: "El tipo de equipo es obligatorio."
            },
            area_id:{
                required: "El área es obligatoria."
            },
            curl: "Enter your website"
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

});