$(document).ready(function () {

//---------------------------------------------------
    $(document).on("click", "#mostrarDivCamposPersonalizados", function () {
        var url = $(this).attr("data-url");
        //alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#tablaCamposPersonalizados").html(data);
            }
        });
    });


//--------------------------------------------

    $(document).on('click', '.ajax_paginate > div > div > ul > li > a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET'
        }).done(function (response) {
            $("#tablaCamposPersonalizados").html(response);
        });
    });


//----------------------------------


//consulta Equipos
    $("#buscarEquipo").keyup(function () {

        var equipos = $("#buscarEquipo").val();
        if (equipos != "") {
            $('#pagina').val(1);
        }
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaEquipos=" + equipos + "&pagina" + pagina,
            success: function (data) {
                $("#divEquipos").html(data);
            }
        });
    });

    $("#buscarEquipo").trigger("keyup");
    //Ver detalle//


    //Capturamos el ID del select de formulario CREAR EQUIPO
    $("#tequi_id").change(function () {
        //capturamos el ID del select
        var id = document.getElementById("idEquipo").value;

        //alert(id);
        //capturamos la URL del SELECT
        var url = $(this).attr("data-url");
        //alert(url);
        $.ajax({
            url: url,
            type: POST,
            id: "idTipoEquipo=" + id,
            success: function (data) {
                $("#modalUpdate1 > .modal-content").html(data);
            }
        });
    })
    //Ver detale//
    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
        $(".modal-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modal_detalle_equipo> .modal-content").html(data);
            }
        });
    });

    //editar//
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

    $(document).on("click", ".AgregarCantidad", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalAgregarCantidad > .modal-content").html(data);
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
            confirmButtonText: "Sí, Eliminar registro",
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

    jQuery.validator.addMethod("letra", function (value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    $("#formEquipos").validate({
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
            cgender: "required",
            cagree: "required",
        },
        //For custom messages
        messages: {
            equi_id: {
                required: "El N.Placa es obligatorio.",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            per_id: {
                required: "El encargado del centro es obligatorio."
            },
            equi_nombre: {
                required: "El nombre del equipo es obligatorio.",
                letra: "Sólo se permiten letras",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            est_id: {
                required: "El estado del equipo es obligatorio."
            },
            equi_modelo: {
                required: "El modelo es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_serie: {
                required: "El número de serie es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_fabricante: {
                required: "El fabricante es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_marca: {
                required: "La marca es obligatoria.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_ubicacion: {
                required: "La ubicación es obligatoria.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Sólo se permite introducir máximo 20 caracteres"
            },
            equi_fecha_compra: {
                required: "La fecha de compra es obligatoria."
            },
            equi_fecha_instalacion: {
                required: "La fecha de instalacion es obligatoria."
            },
            equi_vence_garantia: {
                required: "La Fecha Vecimiento De Garantia es obligatorio."
            },
            cen_id: {
                required: "El dentro de formación es obligatorio."
            },
            tequi_id: {
                required: "El tipo de equipo es obligatorio."
            },
            area_id: {
                required: "El área es obligatoria."
            },
            curl: "Enter your website"
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


    //Codigo para observar Foto de Equipo

    $('.fancybox').fancybox({
        width: '75%',
        height: '75%',
        openEffect: 'elastic', //'fade', 'elastic'
        closeEffect: 'elastic',
        openSpeed: 'normal', //ms, slow, normal, fast (default 250ms)
        closeSpeed: 'normal',
        helpers: {
            title: {
                type: 'inside' //'float', 'inside', 'outside' or 'over'
            },
            overlay: {
                closeClick: true  // if true, se cierra al hacer click fuera de la imagen
            }
        },
        padding: 11
    });

    //Enviar formulario con archivos por ajax
    $(".file-form").on('submit', function () {
        $('.btn_submit_file').prop('disabled', true);
        var options = {
            url: $(this).attr("action"),
            success: function (response) {
//                alert(response);
                var respuesta = $.parseJSON(response);
                if (respuesta.accion === true) {
                    Materialize.toast(respuesta.mensajes, 1500, 'rounded col green');
                    window.setTimeout("location.href='" + respuesta.redirect + "'", 1500);
                } else {
                    $('#cont_errors_ajax').html(respuesta.mensajes);
                    $('#cont_errors_ajax').css('display', 'block');
                    $('.btn_submit_file').prop('disabled', false);
                    $('.modal-content').animate({scrollTop: $('#cont_errors_ajax').position().top}, 'slow');
                }
            }
        };//options

        $(this).ajaxSubmit(options);
        return false;
    });

});