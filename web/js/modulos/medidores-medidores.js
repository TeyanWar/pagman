$(document).ready(function () {
    
    
    
    //validacion para letras
    jQuery.validator.addMethod("lettersonly", function (value, element){
        return this.optional(element) || /^[a-zA-Z_áéíóúñ\s]*$/.test(value);
    },"Unicamente se admiten letras");
    
    //Inicio Validacion de formulario Crear Medidor
    $("#formMedidores").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 2,
                maxlength:44,
                lettersonly:true
            },
            acronimo: {
                required:true,
                minlength: 1,
                maxlength: 3
            },
            descripcion: {
                required:true,
                minlength: 5,
                maxlength: 44,
                lettersonly:true
            },
            tipomed:{
                required:true
            },
            numerotim:{
                required:true,
                digits: true
            },
            tiempo:{
                required:true
            },
            estado:{
                required:true
            }
        },
        //For custom messages
        messages: {
            nombre:{
                required:   "Este campo es obligatorio",
                minlength:  "Debe contener m&iacute;nimo 2 caracteres",
                maxlength:  "En este campo solo se admiten 44 caracteres"
            },
            acronimo: {
                required:   "Este campo es obligatorio",
                minlength:  "Debe contener al menos 1 caracteres",
                maxlength:  "No puede sobrepasar los 3 caracteres"
            },
            descripcion:{
                required:   "Este campo es obligatorio",
                minlength:  "Debe contener al menos 5 caracteres",
                maxlength:  "No puede sobrepasar los 44 caracteres"
            },
            tipomed:{
                required:   "Este campo es obligatorio"
            },
            numerotim:{
                required:   "Este campo es obligatorio",
                digits: "El valor debe ser numerico"
            },
            tiempo:{
                required:   "Este campo es obligatorio"
            },
            estado:{
                required:   "Este campo es obligatorio"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error);
          } else {
            error.insertAfter(element);
          }
        }
     });
   
     //------------------------------------------------------------------------------//
    // aqui empieza el filtro de busqueda de medidores 
    //$('#buscarMed').focus();
    $("#buscarMed").keyup(function () {
        var Medidor = $("#buscarMed").val();
        
        if(Medidor != ""){
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "medidor_id=" + Medidor+"&pagina="+pagina,
            success: function (data) {
                $("#buscarMedidor").html(data);
            }
        });
    });
    //aqui termina el filtro de busqueda de las herramientas
    // --------------------------------------------//--------------------
    $('#buscarMed').trigger('keyup');// function_trigger para visualizar las herramientas existentes
    $('.formValidate').ready(function(){
        $("#buscarMed").focus();
    });
    
   //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
    });
   
//Inicio Validacion de formulario Editar Medidor

   $("#editarMedidores").validate({
        rules: {
            tmed_nombre: {
                required: true,
                minlength: 2,
                maxlength:44,
                lettersonly:true
            },
            tmed_acronimo: {
                required:true,
                minlength: 1,
                maxlength: 3
            },
            tmed_descripcion: {
                required:true,
                minlength: 5,
                maxlength: 44,
                lettersonly:true
            },
            tmed_estado:{
                required:true
            }
        },
        //For custom messages
        messages: {
            tmed_nombre:{
                required:   "Este campo no puede estar vac&iacute;o",
                minlength:  "Debe contener m&iacute;nimo 2 caracteres",
                maxlength:  "En este campo solo se admiten 44 caracteres"
            },
            tmed_acronimo: {
                required:   "Este campo es obligatorio",
                minlength:  "Debe contener al menos 1 caracteres",
                maxlength:  "No puede sobrepasar los 3 caracteres"
            },
            tmed_descripcion:{
                required:   "Este campo es obligatorio",
                minlength:  "Debe contener al menos 5 caracteres",
                maxlength:  "No puede sobrepasar los 44 caracteres"
            },
            tmed_estado:{
                required:   "Este campo es obligatorio"
            }
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error);
          } else {
            error.insertAfter(element);
          }
        }
     });

    
     $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
//        alert(url);
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
//                alert(data);
                $("#editarMedidor > .modal-content").html(data);
                
            }
        });

    });
    
    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var tmed_id = $(this).attr("data-tmed_id");
        swal({
            title: "Esta seguro de eliminar el medidor?",
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
                    id: tmed_id
                }
            });
            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            window.location.href = "listar";
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