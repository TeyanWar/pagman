$(document).ready(function () {

    //Inicio código modal tipo medidor para actualizacion
    $(".modificar").click(function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalModificar > .modal-content").html(data);
            }
        });
    });//Fin código modal tipo medidor para actualizacion


    
     $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
       
    $(".modal-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#editar> .modal-content").html(data);
            }
        });

    });
    
});