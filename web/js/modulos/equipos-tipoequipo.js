$("#contenedor-campos").hide();
$(document).ready(function () {

    //Paginación por medio de ajax
    $(document).on('click', '.ajax_paginate > div > div > ul > li > a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        if (url != '#') {
            $.ajax({
                url: url,
                type: 'GET'
            }).done(function (response) {
                $("#modal_detalle_tipoEquipo> .modal-content").html(response);
            });
        }
    });
//Validaciones

    $.validator.setDefaults({
        ignore: []
    });
    //validacion formulario Crear mediciones
    //validacion para letras
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z_áéíóúñ\s]*$/.test(value);
    }, "Unicamente se admiten letras");
    $("#formTipoEquipo").validate({
        rules: {
            id_tipo_Equipo: {
                required: true,
                minlength: 4
            },
            tequi_descripcion: {
                required: true,
                numeric: false,
                minlength: 4,
                maxlength: 50
            },
            idCampoSelec: {
                required: true
            }
        },
        //For custom messages
        messages: {
            id_tipo_Equipo: {
                required: "Este campo no puede quedar vacio<br><br>",
                minlength: "Este campo debe contener como minimo 4 caracteres, NO olvides seguir el patron <code>TE0XXX</code><br><br>"
            },
            tequi_descripcion: {
                required: "Por favor, diligenciar este campo.",
                numeric: "Este campo no puede contener Numeros",
                minlength: "Por favor digite minimo 4 caracteres",
                maxlength: "Solo se permiten 50 carcateres."
            },
            idCampoSelect: {
                required: "Este campo es obligatorio"
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
    //Fin validaciones

    $("#idCampoSelec").change(function () {
        var idsCampo = $(this).val(); //Captura id's (El  método .val () se utiliza principalmente para obtener los valores de los elementos de formulario)
        var url = $(this).attr("data-url");
        ajaxAgregarCampoPersonalizado(idsCampo, url); //Muestra los equipos que se han seleccionado
    });
    function ajaxAgregarCampoPersonalizado(idsCampo, url) {
        $.post(
                url, {ids: idsCampo},
        function (data) {
            var elements = $(data).find('#lista-campos');
            $("#campos-agregados").html(data);
            $(".btn-agregar-campos").click(function () {
                $("#contenedor-campos").show();
                var urlListar = $(this).attr("data-url");
                ajaxListarCampoPersonalizado($(this).parent().parent(), urlListar);
            });
        });
    }//fin código agregar Campo Personalizado(Tipo equipo)

//inicio código listar Tipo de equipo y su Campo personalizado
    function ajaxListarCampoPersonalizado(tr, urlListar) {

        var consecutivo = $("#consecutivo").val();
        $.post(
                urlListar,
                {
                    cp_id: tr.children('#cp_id').html(),
                    cp_nombre: tr.children('#cp_nombre').html(),
                    cantidad: tr.children().children().children().children('#cp_cantidad').val(),
                    consecutivo: consecutivo
                },
        function (data) {
            $("#contenedor-campos > table").prepend(data);
            $("#consecutivo").val(parseInt(consecutivo) + 1);
        }
        );
    }//Fin código listar equipo y su medicion

//EMPIEZA EL LISTAR DE CAMPOS PERSONALIZADOS EN EL CREAR TIPO EQUIPO


    $(document).on("click", ".remove", function () {
        var id = $(this).attr("data-id");
        $("#row-" + id).remove();
    });


    $("#buscarTipoEquipo").keyup(function () {
        var tipoEquipo = $("#buscarTipoEquipo").val();
        if (tipoEquipo != "") {
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "tipoEquipo_id=" + tipoEquipo + "&pagina=" + pagina,
            success: function (data) {
                $("#buscarTipoDeEquipo").html(data);
            }
        });
    });
    $('#buscarTipoEquipo').trigger('keyup'); // function_trigger para visualizar las herramientas existentes


//------------------AQUI TERMINA EL LISTAR -----------------------------------------------------

    //------------------- ELIMINAR --------------------//

    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var equi_id = $(this).attr("data-id");
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
                    id: equi_id
                }
            });
            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            window.location.href = "listar";
        });
    });
    //--------------------- FIN ----------------------//

//    $(document).on('click', ".modal-trigger", function () {
//        var url = $(this).attr("data-url");
//        $(".modal-data").html('Cargando ....');
//        $.ajax({
//            url: url,
//            type: "get",
//            success: function (data) {
//                $("#modal_detalle_tipoEquipo> .modal-content").html(data);
//
//            }
//        });
//    });

    
    
    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
        var modal = $(this).attr("data-modal_name");
        $(".modal-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modal_"+modal+"_tipoEquipo> .modal-content").html(data);

            }
        });
    });

});