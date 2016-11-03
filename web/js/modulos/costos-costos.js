
$(document).ready(function () {
 $("#buscaOt").keyup(function () {
        var OT = $("#buscaOt").val();
            
        if (OT != "") {
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val(); 
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "OT=" + OT +"&pagina"+pagina,
            success: function (data) {
                $("#tablaOt").html(data);
            }
        });
    });

    $("#buscaOt").trigger('keyup');
    
   //-------------funcion pdf-------------------------
    $(document).on('click', '.pdf', function () {
        document.formulariopdf.submit()
    });

 });