$(document).ready(function () {
     $("#buscarDepto").keyup(function () {
        var usuario = $("#buscarDepto").val();
        //alert(usuario);
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedadepartamento=" + usuario,
            success: function (data) {
                $("#buscarDepartamento").html(data);
            }
        });
    });

    $("#buscarDepto").trigger("keyup");

    $(document).on("click", ".ver-detalle", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#detalleDepto > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".editar", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#editarDepto > .modal-content").html(data);
            }
        });
    });
    

    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
        $(".lean-overlay").remove();
    });
    
    
    
        //----------------- validaciones ---------------
    
    /* Incluimos un método para validar el campo nombre */

    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-záéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    
    $("#formdepto").validate({
        rules: {
            reg_id: {
                required: true
            },
            dept_nombre: {
                required: true,
                letra: true,
                minlength: 5,
                maxlength: 20
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            reg_id:{
                required: "La Regional es obligatorio."
            },
            dept_nombre:{
                required: "El Nombre Del Departamento es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
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
    
    
    
    
});
