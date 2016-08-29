$(document).ready(function () {

    $.validator.setDefaults({
        ignore: []
    });

    //validacion formulario Crear mediciones
    //validacion para letras
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z_áéíóúñ\s]*$/.test(value);
    }, "Unicamente se admiten letras");

    //Inicio Validacion de formulario Crear Medidor
    $("#formMediciones").validate({
        rules: {
            personas: {
                required: true
            },
            equipos: {
                required: true
            },
            medidaActual: {
                required: true,
                numeric: true,
                minlength: 1,
                maxlength: 10
            },
            fecha: {
                required: true
            }
        },
        //For custom messages
        messages: {
            personas: {
                required: "Este campo es obligatorio",
            },
            equipos: {
                required: "Este campo es obligatorio",
            },
            medidaActual: {
                required: "Este campo es obligatorio",
                numeric: "Este campo es numerico unicamente",
                minlength: "Deber ingresar minimo 1 caracter",
                maxlength: "No puede sobrepasar los 10 caracteres"
            },
            fecha: {
                required: "Este campo obligatorio"
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

    //Inicio código modal tipo medidor para actualizacion
    $(".modificar").click(function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalModificar > .modal-content").html(data);
            }
        });
    });//Fin código modal tipo medidor para actualizacion

    //Inicio código filtro tipo de medidor
    $("#busquedaMedidor").keyup(function () {
        var medidor = $("#busquedaMedidor").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaMedidor=" + medidor,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });//Fin código filtro tipo de medidor

    //Inicio código agregar equipos(mediciones)
    $("#equipos").change(function () {
        var idsEquipos = $(this).val();//Captura id's (El  método .val () se utiliza principalmente para obtener los valores de los elementos de formulario)
        var url = $(this).attr("data-url");
        ajaxAgregarEquipo(idsEquipos, url);//Muestra los equipos que se han seleccionado
    });

    function ajaxAgregarEquipo(idsEquipos, url) {
        $.post(
                url, {ids: idsEquipos},
        function (data) {
            var elements = $(data).find('#lista-equipos');
            $("#equipos-agregados").html(data);
            $(".btn-agregar").click(function () {
                var urlListar = $(this).attr("data-url");
                ajaxListarEquipos($(this).parent().parent(), urlListar);

            });
        });
    }//fin código agregar equipos(mediciones)

    //inicio código listar equipo y su medicion
    function ajaxListarEquipos(tr, urlListar) {
        //var urlListar1="http://localhost"+urlListar;
        var consecutivo = $("#consecutivo").val();

        $.post(
                urlListar,
                {
                    equi_id: tr.children('#equi_id').html(),
                    equi_nombre: tr.children('#equi_nombre').html(),
                    medicion: tr.children().children().children().children('#medidaActual').val(),
                    fecha: tr.children().children().children().children('#fecha').val(),
                    tipo_medidor: tr.children().children().children().children().children('#tipoMedidor').val(),
                    consecutivo: consecutivo
                },
        function (data) {
            $("#contenedor-equipos > table").prepend(data);
            $("#consecutivo").val(parseInt(consecutivo) + 1);
        }
        );
    }//Fin código listar equipo y su medicion

    //Inicio código mensaje de alerta 
    $(document).on('click', '.editarSweetAlert', function (e) {

        e.preventDefault();

        swal({title: "¿Esta seguro?",
            text: "¿Esta seguro que desea actualizar la informacion?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Change it!",
            closeOnConfirm: false},
        function () {
            var url = $('form').attr('action');
            var nombre = $('#nombre').val();
            var acronimo = $('#acronimo').val();
            var descripcion = $('#descripcion').val();
            var estado = $('#estado').val();
            var id = $('#nombre').attr('data-id');

            $.ajax({
                url: url,
                type: 'post',
                data: {
                    nombre: nombre,
                    acronimo: acronimo,
                    descripcion: descripcion,
                    estado: estado,
                    id: id
                }
            }).done(function (data) {
                //alert(data);
                window.location.href = "listar";
            });
            //$(url).submit();
        });
    });//Fin código mensaje de alerta

    //Guardar medidas
//    $("#btn-guardar-medidas").click(function (e) {
//        e.preventDefault();
//        var datos = $("#formMediciones").serialize();
//        var redirect = $(this).attr("data-redirect");
//        var url = $(this).attr("data-url");
//
//        $.ajax({
//            type: "POST",
//            url: url,
//            data: datos,
//            success: function (response) {
//                window.location.href = redirect;
//            }
//        });
//        return;
//    });
    //Fin código modal tipo medidor para actualizacion

    $(document).on("click", ".remove", function () {
        var id = $(this).attr("data-id");

        $("#row-" + id).remove();
    });

    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");

        $(".modal-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#editar> .modal-content").html(data);
            }
        });

    });

});