$(document).ready(function () {
     //consulta Ciudad
    $("#busquedaAjax5").keyup(function () {
        var usuario = $("#busquedaAjax5").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaciudad=" + usuario,
            success: function (data) {
                $("#tabla5").html(data);
            }
        });
    });

    $("#busquedaAjax5").trigger("keyup");

    $(document).on("click", ".ver-detalle5", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle5 > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".editar5", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate5 > .modal-content").html(data);
            }
        });
    });
    /* $(document).on("click",".eliminar5", function(){
     var url = $(this).attr("data-url");
     
     $.ajax({
     url: url,
     type:"get",
     success: function(data){
     $("#modaleliminar5 > .modal-content").html(data);
     }
     });
     });
     */
    $(document).on('click', '.eliminar2', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var ciud_id = $(this).attr('data-ciud_id');

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
                    id: ciud_id
                }
            }).done(function (data) {

            });
            swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
          $("#busquedaAjax5").trigger('keyup');
        });
    });
    
    
    
});

