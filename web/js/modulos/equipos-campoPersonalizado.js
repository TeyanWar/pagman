

$(document).ready(function () {
    $("#buscarCP").keyup(function () {
        var buscarCP = $("#buscarCP").val();

        if (buscarCP != "") {
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "buscarCP=" + buscarCP + "&pagina=" + pagina,
            success: function (data) {
                $("#buscarCampoPersonalizado").html(data);
            }
        });
    });

    $('#buscarCP').trigger('keyup');// function_trigger para visualizar las herramientas existentes
//
////Inicio Modal Editar Departamento
//    $(document).on('click', ".modal-trigger", function () {
//        var url = $(this).attr("data-url");
////        alert(url);
//        $.ajax({
//            url: url,
//            type: "get",
//            success: function (data) {
////                alert(data);
//                $("#editarDepto > .modal-content").html(data);
//
//            }
//        });
//
//    });
//
//
////Inicio Modal Editar Departamento
//    $(document).on('click', ".modal-trigger", function () {
//        var url = $(this).attr("data-url");
////        alert(url);
//        $.ajax({
//            url: url,
//            type: "get",
//            success: function (data) {
////                alert(data);
//                $("#detalleDepto > .modal-content").html(data);
//
//            }
//        });
//
//    });

    //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
        $(".lean-overlay").remove();
    });


    //----------------- validaciones ---------------

    /* Incluimos un método para validar el campo nombre */
//
//    jQuery.validator.addMethod("letra", function (value, element) {
//        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
//    });
//
//    $("#formdepto").validate({
//        rules: {
//            reg_id: {
//                required: true
//            },
//            dept_nombre: {
//                required: true,
//                letra: true,
//                minlength: 3,
//                maxlength: 20
//            },
//            cgender: "required",
//            cagree: "required",
//        },
//        //For custom messages
//        messages: {
//            reg_id: {
//                required: "La Regional es obligatorio."
//            },
//            dept_nombre: {
//                required: "El Nombre Del Departamento es obligatorio.",
//                letra: "Solo se permiten letras",
//                minlength: "Introduzca al menos 3 caracteres",
//                maxlength: "Solo se permite introducir maximo 20 caracteres"
//            },
//            curl: "Enter your website",
//        },
//        errorElement: 'div',
//        errorPlacement: function (error, element) {
//            var placement = $(element).data('error');
//            if (placement) {
//                $(placement).append(error)
//            } else {
//                error.insertAfter(element);
//            }
//        }
//    });




});

