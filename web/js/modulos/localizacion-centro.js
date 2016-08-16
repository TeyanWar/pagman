$(document).ready(function () {
    
     //consulta Centro
    $("#busquedaAjax26").keyup(function () {
        var busquedacentro = $("#busquedaAjax26").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedacentro=" + busquedacentro,
            success: function (data) {
                $("#tabla26").html(data);
            }
        });
    });
    $("#busquedaAjax26").trigger("keyup");
//Modal de Ver Detalle


   $(document).on("click", ".ver-detalle", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle2 > .modal-content").html(data);
            }
        });
    });
    //Modal de Editar
     $(document).on("click", ".Editar2", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate2 > .modal-content").html(data);
            }
        });
    });
    //Modal de Eliminar

    $(document).on('click', '.eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var cen_id = $(this).attr('data-cen_id');
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
                            id: cen_id
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
    
    $("#fromcentro").validate({
        rules: {
            reg_id: {
                required: true
            },
            cen_nom: {
                required: true,
                letra: true,
                minlength: 3,
                maxlength: 20
            },
            cen_telefono: {
                required: true,
                digits: true,
                minlength: 5,
                maxlength: 10
            },
            cen_dir: {
                required: true,
                minlength: 5,
                maxlength: 40
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            reg_id:{
                required: "La regional es obligatorio."
            },
            cen_nom:{
                required: "El Nombre del Centro es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 3 caracteres",
                maxlength: "Solo se permite introducir maximo 20 caracteres"
            },
            cen_telefono:{
                required: "El Telefono del centro es obligatorio.",
                digits: "El valor debe ser numerico",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 10 caracteres"
            },
            cen_dir:{
                required: "La Direccion del centro es obligatorio.",
                minlength: "Introduzca al menos 5 caracteres",
                maxlength: "Solo se permite introducir maximo 40 caracteres"
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
