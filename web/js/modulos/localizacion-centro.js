
$(document).ready(function () {
    
     //consulta Centro
    $("#busquedaAjax26").keyup(function () {
        var usuario = $("#busquedaAjax26").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedacentro=" + usuario,
            success: function (data) {
                $("#tabla26").html(data);
            }
        });
    });
//Modal de Ver Detalle
   $(document).on("click", ".ver-detalle2", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle2 > .modal-content").html(data);
            }
        });
    });
    //Modal de Editar
     $(document).on("click", ".Editar2", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate2 > .modal-content").html(data);
            }
        });
    });
    //Modal de Eliminar

    $(document).on('click', '.eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var cen_id = $(this).attr('data-cen_id');
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
                            id: cen_id
                        }
                    }).done(function (data) {

                    });
                    swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
                    window.location.href = "listar";
                });
    });
});
