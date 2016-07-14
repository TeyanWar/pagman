$(document).ready(function () {

     $(document).on("click", ".ver-detalle1", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle1 > .modal-content").html(data);
            }
        });
    });
    
    $(document).on('click','.modulo_permisos', function(){
       var divPermisos=$(this).data('div_permisos');
       $('#contenedor_permisos div').css('display','none');
       $(divPermisos).css('display','block');
    });
});


