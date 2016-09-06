$(document).ready(function () {
    $("#buscarCiu").keyup(function () {
        var Ciu = $("#buscarCiu").val();

        if (Ciu != "") {
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "buscarCiu=" + Ciu + "&pagina=" + pagina,
            success: function (data) {
                $("#buscarCiudad").html(data);
            }
        });
    });

    $('#buscarCiu').trigger('keyup');// function_trigger para visualizar las herramientas existentes


//Inicio Modal Editar Ciudad
    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
//        alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
//                alert(data);
                $("#editarCiu > .modal-content").html(data);

            }
        });

    });


//Inicio Modal Detalle ciudad
    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
//        alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
//                alert(data);
                $("#detalleCiu > .modal-content").html(data);

            }
        });

    });

    //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
        $(".lean-overlay").remove();
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

    jQuery.validator.addMethod("letra", function (value, element) {
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
                minlength: 3,
                maxlength: 15
            },
            cgender: "required",
            cagree: "required",
        },
        //For custom messages
        messages: {
            dept_id: {
                required: "El Departamento es obligatorio."
            },
            ciud_nombre: {
                required: "El Nombre De La ciudad es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Solo se permite introducir maximo 15 caracteres"
            },
            curl: "Enter your website",
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        }
    });



});

