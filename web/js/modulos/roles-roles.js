$(document).ready(function () {

    $(document).on("click", ".editarRoles", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdateRoles > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".ver-detalle-roles", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalleRol > .modal-content").html(data);
            }
        });
    });


    $(document).on('click', '.eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var rol_id = $(this).attr('data-rol_id');

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
                            id: rol_id
                        }
                    }).done(function (data) {

                    });
                    swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
                    $('#busquedaAjax').triger('keyup');
                });
    });

});