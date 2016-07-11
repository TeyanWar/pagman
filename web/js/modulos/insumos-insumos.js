$(document).ready(function () {

   
// aqui empieza el eliminar con la libreria sweetalert , completamente funcional con el eliminado logico.
//" CAMBIO DE ESTADO TRUE-FALSE "
    $(document).on('click', '.eliminarinsumo', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var ins_id = $(this).attr("data-eliminarinsumo");
        swal({
            title: "Estas seguro de eliminar el registro?",
            text: "La información que estas apunto de eliminar no aparecera en pantalla!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Elimine el Registro!",
            closeOnConfirm: false},
        function () {
            
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    ins_id: ins_id
                }
            }).done(function (data) {
                
            });

            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            
                $("#buscainsumo").trigger('keyup');
        });
    });
    
//buscador ajax para los insumos
    $("#buscainsumo").keyup(function () {

        var insumo = $("#buscainsumo").val();
        var url = $(this).attr("data-url");
        
        $.ajax({
            url: url,
            type: "POST",
            data: "insumo=" + insumo,
            success: function (data) {
                $("#tablainsumo").html(data);
            }
        });
    });
     $("#buscainsumo").trigger('keyup');
});
    