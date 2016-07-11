$(document).ready(function () {
     $("#busquedaAjax4").keyup(function () {
        var usuario = $("#busquedaAjax4").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedadepartamento=" + usuario,
            success: function (data) {
                $("#tabla12").html(data);
            }
        });
    });

    $("#busquedaAjax4").trigger("keyup");

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

    $(document).on("click", ".editar2", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate2 > .modal-content").html(data);
            }
        });
    });
     $(document).on('click', '.eliminar3', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var dept_id = $(this).attr('data-dept_id');

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
                    id: dept_id
                }
            }).done(function (data) {

            });
            swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
          $("#busquedaAjax4").trigger('keyup');
        });
    });
    
    
    
    
});
