$(document).ready(function () {
     //consulta Regionales
    $("#busquedaAjax2").keyup(function () {
        var usuario = $("#busquedaAjax2").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaregional=" + usuario,
            success: function (data) {
                $("#tabla1").html(data);
            }
        });
    });

    $("#busquedaAjax2").trigger("keyup");

    $(document).on("click", ".ver-detalle", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".editar", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate > .modal-content").html(data);
            }
        });
    });


    $(document).on('click', '.eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var reg_id = $(this).attr('data-reg_id');

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
                    id: reg_id
                }
            }).done(function (data) {

            });
            swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
           $("#busquedaAjax2").trigger('keyup');
        });
    });

    
    
    
    
});
