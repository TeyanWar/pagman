$(document).ready(function () {
     //consulta Ciudad
    $("#busquedaAjax5").keyup(function () {
        var usuario = $("#busquedaAjax5").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaciudad=" + usuario,
            success: function (data) {
                $("#tabla5").html(data);
            }
        });
    });

    $("#busquedaAjax5").trigger("keyup");

    $(document).on("click", ".ver-detalle5", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle5 > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".editar5", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate5 > .modal-content").html(data);
            }
        });
    });

    $(document).on('click', '.eliminar2', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var ciud_id = $(this).attr('data-ciud_id');

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
                    id: ciud_id
                }
            }).done(function (data) {

            });
            swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
          $("#busquedaAjax5").trigger('keyup');
        });
    });
    
    
        //----------------- validaciones ---------------
    
    /* Incluimos un método para validar el campo nombre */

    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    
    $("#formciudad").validate({
        rules: {
            dept_id: {
                required: true
            },
            ciud_nombre: {
                required: true,
                letra: true,
                minlength: 5,
                maxlength: 20
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            dept_id:{
                required: "El Departamento es obligatorio."
            },
            ciud_nombre:{
                required: "El Nombre De La ciudad es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
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
    
    
    
});

