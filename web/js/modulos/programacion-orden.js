$(document).ready(function () {
    
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
            ot_fecha_inicio: {
                required: true
            },
            ot_fecha_fin: {
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
                required: "Debe elegir al menos una orden programada."
            },
            ot_fecha_inicio:{
                required: "La Fecha Inicio es obligatorio."
            },
            ot_fecha_fin:{
                required: "La Fecha Fin es obligatorio."
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


});

