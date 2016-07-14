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
    
    //Para mostrar los controladores y sus funciones de un módulo 
    //al asignar permisos
    $(document).on('click','.modulo_permisos', function(){
       var divPermisos=$(this).data('div_permisos');
       $('#contenedor_permisos div').css('display','none');
       $(divPermisos).css('display','block');
    });
});


