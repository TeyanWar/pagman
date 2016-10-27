$(document).ready(function () {
    
    $("#buscartcomp").keyup(function () {
        var tcomp = $("#buscartcomp").val();
        
        if(tcomp != ""){
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "tcomp_id=" + tcomp+"&pagina="+pagina,
            success: function (data) {
                $("#buscatipocomponente").html(data);
            }
        });
    });
    
    
     //------------------------------------------------------------------------------//
    // aqui empieza el filtro de busqueda de tipo componentes
    
    //aqui termina el filtro de busqueda de las herramientas
    // --------------------------------------------//--------------------
    $('#buscartcomp').trigger('keyup');// function_trigger para visualizar las herramientas existentes
    
    
   //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
    });
   

    
     $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
//        alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
//                alert(data);
                $("#editarTcomp > .modal-content").html(data);
                
            }
        });

    });
    
    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var tmed_id = $(this).attr("data-tmed_id");
        swal({
            title: "Esta seguro de eliminar el medidor?",
            text: "La información que estas apunto de eliminar no aparecera en pantalla!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Elimine el Registro!",
            closeOnConfirm: false},
        function () {
            $.ajax({
                url: url,
                type: "post",
                data: {
                    id: tmed_id
                }
            });
            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            window.location.href = "listar";
        });
    });
    
    //-----------vista de asignar tiempo para medidores automaticos---------------
    
    $("#tipomed").change(function () {
        var tipomed = $("#tipomed").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "tipomed=" + tipomed,
            success: function (data) {
                $("#vistatiempo").html(data);
            }
        });
    });
    
});