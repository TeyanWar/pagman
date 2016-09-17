$(document).ready(function () {
// aqui empieza el eliminar con la libreria sweetalert , completamente funcional con el eliminado logico.
//" CAMBIO DE ESTADO TRUE-FALSE "
    $(document).on('click', '.eliminarinsumo', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var ins_id = $(this).attr("data-eliminarinsumo");
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
                type: "POST",
                data: {
                    ins_id: ins_id
                }
            }).done(function (data) {

            });

            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");

            $("#buscainsumo").trigger('keyup');
        });
    });

//buscador ajax para los insumos
    $("#buscainsumo").keyup(function () {

        var insumo = $("#buscainsumo").val();
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "POST",
            data: "insumo=" + insumo,
            success: function (data) {
                $("#tablainsumo").html(data);
            }
        });
    });
    $("#buscainsumo").trigger('keyup');

    //aqui empieza las validaciones para los insumos
    //validacion para letras
//    jQuery.validator.addMethod("lettersonly", function (value, element) {
//        return this.optional(element) || /^[a-z]+$/i.test(value);
//    }, "Solo letras");
    $(".F_registrar_ins").validate({
        rules: {
            ins_id: {
                required: true,
                minlength: 3,
                maxlength: 10
            },
            ins_nombre: {
                required: true,
                letterswithbasicpunc: true,
                minlength: 5,
                maxlength: 20
            },
            ins_valor: {
                required: true,
                numeric: true
            },
            umed_id: "required"
        },
        //mensajes para cada dato validado
        messages: {
            ins_id: {
                required: "Este campo es obligatorio",
                minlength: "debe tener minimo: 3 caracteres",
                maxlength: "debe tener maximo: 10 caracteres"
            },
            ins_nombre: {
                required: "Este campo es obligatorio",
                letterswithbasicpunc: "solo se permiten letras y caracteres como:\n\
                (guión medio, punto, coma, paréntesis, comillas simples o dobles y espacio).",
                minlength: "Debe tener minimo: 5 caracteres",
                maxlength: "Debe tener maximo: 20 caracteres"
            },
            ins_valor: {
                required: "Este campo es obligatorio",
                numeric: "Este campo solo acepta numero"
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
});
    