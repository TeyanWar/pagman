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
            text: "Una vez eliminado, deberá contactar con soporte para recuperarlo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "Red",
            confirmButtonText: "Sí, eliminar registro",
            closeOnConfirm: false
        },
        function () {
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    rol_id: rol_id
                }
            }).done(function (data) {
//                alert(data);
                if(data==true){
                    swal("Eliminado!", "Registro eliminado.", "success");
                    window.setTimeout('location.reload()', 1000);
                }else{
                    swal("Acción denegada", "No tiene los permisos para realizar esta acción.", "error");
                }
            });
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