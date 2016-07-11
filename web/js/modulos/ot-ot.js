$(document).ready(function () {

    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");

        $(".model-data").html('Cargando ...');

        $(".modal").openModal();

        setTimeout(
                function () {
                    $.ajax({
                        url: url,
                        type: "get",
                        success: function (data) {
                            $(".model-data").html(data);
                        }
                    });

                }, 950);


    });

    $(document).on('submit', '#crearOt', function (e) {
        e.preventDefault();
        var url = $('#crearOt').attr("data-url");
        var redirect = $('#crearOt').attr("data-redirect");
        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize()
        }).done(function (respuesta) {

            if (respuesta === "OK") {
                Materialize.toast("<i class= 'material-icons' ></i> Registro exitoso.", 2000, 'green');
                setTimeout(
                        function () {
                            window.location.href = (redirect);
                        }, 2000);

            }
            else {
                Materialize.toast("<i class= 'material-icons' ></i> Error al registrar.", 3000, 'red');
            }

        });
    });

    $(document).on('submit', '#editarOt', function (e) {
        e.preventDefault();
        var url = $('#editarOt').attr("data-url");
        var redirect = $('#editarOt').attr("data-redirect");
        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize()
        }).done(function (respuesta) {

            if (respuesta === "OK") {
                Materialize.toast("<i class= 'material-icons' ></i> Actualizacion exitosa.", 2000, 'green');
                setTimeout(
                        function () {
                            window.location.href = (redirect);
                        }, 1000);

            }
            else {
                Materialize.toast("<i class= 'material-icons' ></i> Error en la actualización.", 3000, 'red');
            }

        });
    });

    $('#buscador').focus();
    $('#buscador').keyup(function () {
        var otListar = $('#buscador').val();
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "POST",
            data: "resultado=" + otListar,
            success: function (data) {
                $('#listar').html(data);
            }
        });
    });

    $('#buscador').trigger('keyup');


    $(document).on('click', ".modal-eliminar", function (e) {
        e.preventDefault();
        swal({title: "¿Realmente desea eliminar este registro?",
            text: "Recuerde que una vez eliminado no se podrá recuperar.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#b71c1c",
            confirmButtonText: "Sí, eliminar registro.",
            closeOnConfirm: false},
        function () {
            var url = $('.modal-eliminar').attr('data-url');
            $.ajax({
                url: url,
                type: 'get'
            }).done(function (respuesta) {
                if (respuesta === "NO") {
                    swal("¡Eliminado!", "Su registro se ha eliminado exitosamente.", 'success');
                    $('#buscador').trigger('keyup');
                } else {
                    swal("¡Error!", "Su registro no se pudo eliminar.");
                }
            });

        });
    });

   
    /*
     $(".submenu").parent().mouseout(function(){
     $(this).children(".submenu-lista")
     .css("display","none");
     });
     */
});