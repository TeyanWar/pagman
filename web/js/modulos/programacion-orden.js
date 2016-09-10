$(document).ready(function () {
    
    $(document).on('submit', '#formt', function (e) {
        e.preventDefault();
        var url = $('#formt').attr("data-url");
        var redirect = $('#formt').attr("data-redirect");
        var error = $('#formt').attr("action");
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
    
    //--------------validaciones-----------------
    
    /* Incluimos un método para validar el campo ot_ayudantes */

    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-z,áéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    
    $("#formt").validate({
        rules: {
            "id[]": {
                required: true
            },
            "cantidad[]": {
                required: true,
                digits: true,
                maxlength: 2
            },
            "cantidadher[]": {
                required: true,
                digits: true,
                maxlength: 2
            },
            inicio: {
                required: true
            },
            ot_fin: {
                required: true
            },
            ot_encargado: {
                required: true
            },
            ot_ayudantes: {
                required: true,
                letra: true,
                minlength: 4,
                maxlength: 100
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            "id[]":{
                required: "Debe seleccionar al menos una orden programada."
            },
            "cantidad[]":{
                required: "La Cantidad Del Insumo es obligatorio.",
                digits: "La Cantidad Del Insumo debe ser: NUMERICO.",
                maxlength: "Solo se permite introducir maximo 2 caracteres."
            },
            "cantidadher[]":{
                required: "La Cantidad De La Herramienta es obligatorio.",
                digits: "La Cantidad De La Herramienta debe ser: NUMERICO.",
                maxlength: "Solo se permite introducir maximo 2 caracteres."
            },
            inicio:{
                required: "La Fecha es obligatorio."
            },
            ot_fin:{
                required: "La Fecha es obligatorio."
            },
            ot_encargado:{
                required: "El Encargado es obligatorio."
            },
            ot_ayudantes:{
                required: "Los Ayudantes son obligatorios.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 4 caracteres",
                maxlength: "Solo se permite introducir maximo 100 caracteres"
            },
            curl: "Enter your website",
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
    });
    
    $("#pro").keyup(function () {
        var program = $("#pro").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "program=" + program,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });
    $("#pro").trigger("keyup");
    
    //----FILTRO DE BUSQUEDA CON SELECT EQUIPOS-----------
    $("#equipo").change(function () {
        var program = $("#equipo").val();
//        alert(program);
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "program=" + program,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });
    
    //----FILTRO DE BUSQUEDA CON SELECT TIPO TRABAJO-----------
    $("#trabajo").change(function () {
        var program = $("#trabajo").val();
//        alert(program);
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "program=" + program,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });

    
    //----FILTRO DE BUSQUEDA CON SELECT TIPO MEDIDOR-----------
    $("#medidor").change(function () {
        var program = $("#medidor").val();
//        alert(program);
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "program=" + program,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });
    
    //----------filtro de insumos--------------
    $("#insum").keyup(function () {
        var insumo = $("#insum").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "insumo=" + insumo,
            success: function (data) {
                $("#conte").html(data);
            }
        });
    });
    
    //-----------insumos------------------
    $(document).on('click', '.carro', function () {
        var cod = $(this).attr("data-id");
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                cod: cod
            }
        }).done(function (data) {
            $("#insumosprog").append(data);
        });
    });
    
    $(document).on('click', '.remove', function () {
        var id = $(this).attr('data-id');

        $("#filain-" + id).remove();

    });
    

    //----------filtro de herramientas--------------
    $("#herrm").keyup(function () {
        var herrami = $("#herrm").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "herrami=" + herrami,
            success: function (data) {
                $("#conteher").html(data);
            }
        });
    });
    
    //---------------herramientas------------------
    $(document).on('click', '.carherra', function () {
        var cod_her = $(this).attr("data-id");
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                cod_her: cod_her
            }
        }).done(function (data) {
            $("#herramientasprog").append(data);
        });
    });
    
    $(document).on('click', '.remoher', function () {
        var id = $(this).attr('data-id');

        $("#filaher-" + id).remove();

    });
    



});

