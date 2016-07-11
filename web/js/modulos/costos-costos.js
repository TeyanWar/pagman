$("#filtroFecha").click(function (e) {
    $("#respuestaCostos").html("Cargando...");
    e.preventDefault();
    var url = $(this).attr("data-url");

    $.ajax({
        url: url,
        type: "POST",
        data: $("#formCostosAjax").serialize(),
        success: function (data) {
            $("#respuestaCostos").html(data);
        }
    });
});