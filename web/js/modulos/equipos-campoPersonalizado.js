
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
    //------------------- ELIMINAR --------------------//

    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var her_id = $(this).attr("data-id");
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
    //--------------------- FIN ----------------------//
    //Empieza EDITAR desde la Modal

    $("#formEditarCamposPersonalizados").validate({
        rules: {
            codigoCP: {
                required: true,
                minlength: 3,
                maxlength: 40
            },
            nombreCP: {
                required: true,
                minlength: 3,
                maxlength: 50,
                lettersonly: true

            },
            cgender: "required",
            cagree: "required",
        },
        //For custom messages
        messages: {
            codigoCP: {
                required: "El campo no puede quedar vacío, por favor ingresa un <code>Codigo</code> ",
                minlength: "El campo debe contener minimo 3 caracteres",
                maxlength: "Has sobrepasado el limite, maximo 40 caracteres"
            },
            nombreCP: {
                required: "Este campo no puede quedar vacío, ingresa un Nombre",
                minlength: "El campo debe contener minimo 3 caracteres",
                maxlength: "Has sobrepasado el limite, maximo 50 caracteres",
            }
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





    //FIN

    //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
        $(".lean-overlay").remove();
    });


    //----------------- validaciones ---------------

    /* Incluimos un método para validar el campo nombre */

    jQuery.validator.addMethod("letra", function (value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });

    $("#formCamposPersonalizados").validate({
        rules: {
            codigoCP: {
                required: true,
                minlength: 3,
                maxlength: 40
            },
            nombreCP: {
                required: true,
                minlength: 3,
                maxlength: 50,
                letra: true
            },
            cgender: "required",
            cagree: "required",
        },
        //For custom messages
        messages: {
            codigoCP: {
                required: "El campo no puede quedar vacío, por favor ingresa un <code>Codigo</code> ",
                minlength: "El campo debe contener minimo 3 caracteres",
                maxlength: "Has sobrepasado el limite, maximo 40 caracteres"
            },
            nombreCP: {
                required: "Este campo no puede quedar vacío, ingresa un Nombre",
                minlength: "El campo debe contener minimo 3 caracteres",
                maxlength: "Has sobrepasado el limite, maximo 50 caracteres",
                letra: "Solo se permiten letras"
            }
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

    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
        $(".modal-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modal_editar_campoPersonalizado> .modal-content").html(data);
            }
        });
    });


    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
        $(".modal-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modal_detalle_campoPersonalizado> .modal-content").html(data);
            }
        });
    });



});

