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

    //Inicio código modal tipo medidor para actualizacion
    $(".modificar").click(function () {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalModificar > .modal-content").html(data);
            }
        });
    });//Fin código modal tipo medidor para actualizacion


    
     $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
       
    $(".modal-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#editar> .modal-content").html(data);
            }
        });

    });
    
       
     
    
});