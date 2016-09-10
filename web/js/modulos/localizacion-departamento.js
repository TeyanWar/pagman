$(document).ready(function () {
     $("#busquedaAjax4").keyup(function () {
        var usuario = $("#busquedaAjax4").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedadepartamento=" + usuario,
            success: function (data) {
                $("#tabla12").html(data);
            }
        });
    });

    $("#busquedaAjax4").trigger("keyup");

    $(document).on("click", ".ver-detalle2", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle2 > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".editar2", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate2 > .modal-content").html(data);
            }
        });
    });
    

    $(document).on('click', '.eliminar3', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var dept_id = $(this).attr('data-dept_id');
        swal({title: "¿Realmente desea eliminar este registro?",
            text: "Recuerde  que una vez eliminado no se podra recuperar",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "Red ",
            confirmButtonText: "si,eliminar registro",
            closeOnConfirm: false},
                function () {
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {
                            id: dept_id
                        }
                    }).done(function (data) {

                    });
                    swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
                    window.location.href = "Consulta";
                });
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
