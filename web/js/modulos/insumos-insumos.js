//bryan david ramos TADSI 03

$(document).ready(function () {


$("#formValidate").validate({

        rules: {
            ins_id: {
                required: true,
                number: true,
                minlength: 5,
                maxlength: 10
            },
            ins_nombre: {
                required: true,
                letterswithbasicpunc: true,
                minlength: 5,
                maxlength: 20,
                
             umed_id: "requiered"
             
            }
        },
        //mensajes para cada dato validado
        messages: {
            ins_id: {
                required: "Este campo es obligatorio",
                number: "Solo se aceptan numeros",
                minlength: "debe tener minimo: 5 caracteres",
                maxlength: "debe tener maximo: 10 caracteres"
            },
            ins_nombre: {
                required: "Este campo es obligatorio",
                letterswithbasicpunc: "solo se permiten letras y caracteres como:\n\
                (guión medio, punto, coma, paréntesis, comillas simples o dobles y espacio).",
                minlength: "Debe tener minimo: 5 caracteres",
                maxlength: "Debe tener maximo: 20 caracteres"
            },
            umed_id: {
                required: "Este campo es obligatorio seleccionar"
            }
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error);
            } else {
                error.insertAfter(element);
            }
        }
    });
   
// aqui empieza el eliminar con la libreria sweetalert , completamente funcional con el eliminado logico.
//" CAMBIO DE ESTADO TRUE-FALSE "
    $(document).on('click', '.eliminarinsumo', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var ins_id = $(this).attr("data-eliminarinsumo");
        swal({
            title: "Estas seguro de eliminar el registro?",
            text: "La información que estas apunto de eliminar no aparecera en pantalla!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Si, Elimine el Registro!",
            closeOnConfirm: false},
        function () {
            
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    ins_id: ins_id
                }
            }).done(function (data) {
                
            });

            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            
                $("#buscainsumo").trigger('keyup');
        });
    });
    
//buscador ajax para los insumos

 $("#buscainsumo").keyup(function () {
        var insumo = $("#buscainsumo").val();
            
        if (insumo != "") {
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val(); 
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "insumo=" + insumo +"&pagina"+pagina,
            success: function (data) {
                $("#tablainsumo").html(data);
            }
        });
    });

 $("#buscainsumo").trigger('keyup');
});
    