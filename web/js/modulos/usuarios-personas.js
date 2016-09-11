$(document).ready(function () {
    
    //----------------------respuesta registro-------------------
    $(document).on('submit', '#agregar', function (e) {
        e.preventDefault();
        var url = $('#agregar').attr("data-url");
        var redirect = $('#agregar').attr("data-redirect");
        var error = $('#agregar').attr("action");
        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize()
        }).done(function (respuesta) {
            console.log(respuesta);
            if (respuesta==true) {
                Materialize.toast("<i class= 'material-icons' ></i> Registro exitoso.", 2000, 'rounded col green');
                setTimeout(
                        function () {
                            window.location.href = (redirect);
                        }, 2000);
            }
            else {
                Materialize.toast("<i class= 'material-icons' ></i> Error al registrar.", 3000, 'rounded col red');
                setTimeout(
                        function () {
                            window.location.href = (error);
                        }, 1000);
            }
        });
    });
    


});