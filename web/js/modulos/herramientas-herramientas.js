$(document).ready(function () {
//validacion para letras
//    jQuery.validator.addMethod("lettersonly", function (value, element) {
//        return this.optional(element) || /^[a-z]+$/i.test(value);
//    }, "Solo letras");
    //aqui empieza las validaciones para las herramientas
    $(".F_registrar_her").validate({
        rules: {
            her_id: {
                required: true,
                alphanumeric: true,
                minlength: 5,
                maxlength: 40
            },
            her_nombre: {
                required: true,
                letterswithbasicpunc: true,
                minlength: 6,
                maxlength: 40
            },
            her_fecha_ingreso: {
                required: true
            }
        },
        //mensajes para cada dato validado
        messages: {
            her_id: {
                required: "Este campo es obligatorio",
                alphanumeric: "Solo se permiten letras, números y guiones bajos.",
                minlength: "debe tener minimo: 5 caracteres",
                maxlength: "debe tener maximo: 40 caracteres"
            },
            her_nombre: {
                required: "Este campo es obligatorio",
                letterswithbasicpunc: "solo se permiten letras y caracteres como:\n\
                (guión medio, punto, coma, paréntesis, comillas simples o dobles y espacio).",
                minlength: "Debe tener minimo: 6 caracteres",
                maxlength: "Debe tener maximo: 40 caracteres"
            },
            ther_id: {
                required: "Este campo es obligatorio seleccionar"
            },
            her_fecha_ingreso: {
                required: "Por favor selecciona una fecha de Ingreso"
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
    //-------------------------------------------------------------------------------//


    //aqui terminan las validaciones del formulario de herramientas
    //------------------------------------------------------------------------------//
    // aqui empieza la modal para editar herramientas
    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#model-data").html(data);
            }
        });
    });
    //aqui termina la modal para editar las herramientas
    //------------------------------------------------------------------------------//
    // aqui empieza el filtro de busqueda de herramientas por numero_placa o nombre herramienta
    //$('#buscarHer').focus();
    $("#buscarHer").keyup(function () {
        var Herramienta = $("#buscarHer").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "her_id=" + Herramienta,
            success: function (data) {
                $("#buscarHerramienta").html(data);
            }
        });
    });
    //aqui termina el filtro de busqueda de las herramientas
    // --------------------------------------------//--------------------
    $('#buscarHer').trigger('keyup');// function_trigger para visualizar las herramientas existentes
// aqui empieza el eliminar con la libreria sweetalert , completamente funcional con el eliminado logico.
//" CAMBIO DE ESTADO TRUE-FALSE "
    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var her_id = $(this).attr("data-her_id");
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
                    id: her_id
                }
            });
            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            window.location.href = "listar";
        });
    });
    // aqui termina el sweetAlert de herramientas
    //------------------------------------------------------------------------------//
//efecto para ampliar las imagenes en el listado de herramientas
    $('.fancybox').fancybox();

    //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
    });
});
    