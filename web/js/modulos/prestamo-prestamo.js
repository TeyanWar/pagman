$(document).ready(function () {
    //aqui empieza las validaciones para el prestamo de herramientas
    $("#F_prestamo_herramienta").validate({
        rules: {
            pher_observaciones: {
                required: true
            },
            alma_id: "required",
            jor_id: "required",
            buscarHerramienta: "required",
        },
        //mensajes para cada validacion del prestamo de herramientas
        messages: {
            pher_observaciones: {
                required: "Este campo es obligatorio",
            },
            alma_id: {
                required: "Este campo es obligatorio seleccionar",
            },
            jor_id: {
                required: "Este campo es obligatorio seleccionar",
            },
            buscarHerramienta: {
                required: "Este campo es obligatorio seleccionar",
            },
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
    //------------------------------------------------------------------------------//

    //aqui empieza el filtro de busqueda herramienta para el prestamo de herramientas (carrito)
    $("#buscarHerramienta").keyup(function () {
        var Herramienta = $("#buscarHerramienta").val();
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "POST",
            data: $('#F_prestamo_herramienta').serialize(),
            success: function (data) {
                $("#RespuestaHerramienta").html(data);
                $('#RespuestaHerramienta').fadeIn("slow");
            }
        });
    });
    //aqui termina el filtro de busqueda del prestamo de herramientas
    //------------------------------------------------------------------------------//
    //aqui empieza la función para ir agregando las herramientas con su observacion especifica
    $(document).on('click', '#agregarHerramienta', function () {
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");

        var observaciones = $("#observaciones-" + id).val();
        var cantS = $("#detph_cant_solicita-" + id).val();
        var cantE = $("#detph_cant_entrega-" + id).val();

        $.ajax({
            url: url + "/" + observaciones + "/" + cantS + "/" + cantE,
            type: "GET",
            success: function (data) {
                $("#tabla").append(data);
            }
        });
        $('#RespuestaHerramienta').fadeOut("slow");
    });
//    $("#agregarPrestamo").show();
    //------------------------------------------------------------------------------//
    //esta es la funcion para remover cada registro del carrito de compras
    $(document).on('click', '.removeFila', function (e) {
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#herramienta-" + id).remove();
    });
//------------------------------------------------------------------------------//
// aqui empieza el eliminar con la libreria sweetalert , completamente funcional con el eliminado logico.
//" CAMBIO DE ESTADO TRUE-FALSE "
    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var pher_id = $(this).attr("data-pher_id");
        swal({
            title: "Estas seguro de eliminar el registro?",
            text: "La información que estas apunto de eliminar no aparecera en pantalla!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Elimine el Registro!",
            closeOnConfirm: false},
        function () {
            $.ajax({
                url: url,
                type: "post",
                data: {
                    id: pher_id
                }
            });
            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            window.location.href = "listarPrestamo";
        });
    });
    // aqui termina el sweetAlert de herramientas
    //------------------------------------------------------------------------------//
});