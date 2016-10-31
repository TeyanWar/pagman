$(document).ready(function () {
    
    $("#buscarcomp").keyup(function () {
        var comp = $("#buscarcomp").val();
        
        if(comp != ""){
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "comp_id=" + comp+"&pagina="+pagina,
            success: function (data) {
                $("#buscacomponente").html(data);
            }
        });
    });
    
    
     //------------------------------------------------------------------------------//
    // aqui empieza el filtro de busqueda de tipo componentes
    
    //aqui termina el filtro de busqueda de las herramientas
    // --------------------------------------------//--------------------
    $('#buscarcomp').trigger('keyup');// function_trigger para visualizar las herramientas existentes
    
    
   //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
        $(".lean-overlay").remove();
    });
   
   $('#cerrarDetalleComp').click(function(){
       $(".lean-overlay").remove();
   });

    
     $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#editarTcomp > .modal-content").html(data);
                
            }
        });

    });
    
    $(document).on('click', ".ver-detallec", function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetallec > .modal-content").html(data);
                
            }
        });

    });
    
    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-comp_id");
        swal({
            title: "Esta seguro de eliminar el Componente?",
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
                    id: id
                }
                
            });
          swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
          $('#buscarcomp').trigger('keyup');
            //window.location.href = "listar";
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