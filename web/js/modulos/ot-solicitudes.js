$(document).ready(function () {

//buscador solicitudes
    //$('#buscador').focus()
    $('#buscador').keyup(function () {
        var solicitud = $('#buscador').val();
        
        if(solicitud != ""){
            $('#pagina').val(1);
        }
        
        var pagina = $('#pagina').val();        
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "POST",
            data: "resul=" + solicitud+"&pagina="+pagina,
            success: function (data) {
                $('#listar').html(data);
            }
        });        
    });

    $('#buscador').trigger('keyup');
//fin: buscador solicitudes

//modales del listar
    $(document).on('click', '.modal-trigger', function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
        }).done(function (respuesta) {
            $(".modal").openModal();
            $('select').material_select();
            $(".model-data").html(respuesta);

        });
    });
//fin: modales del listar

//crear solicitud
    $(document).on('submit', '#crearSolicitud', function (e) {

        e.preventDefault();
        $("#btn-crear-solicitud").attr('disabled',true);
        var url = $('form').attr("data-url");
        var redirect = $('form').attr("data-redirect");

        $.ajax({
            type: 'POST',
            url: url,
            data: $(this).serialize(),
        }).done(function (respuesta) {
           //alert(respuesta);
            if (respuesta == true)
            {
                Materialize.toast("<i class='material-icons'></i>Registro exitoso", 2000, 'green');
                setTimeout(
                    function () {
                        window.location.href = (redirect);
                    }, 2000);
            }
            else
            {
//                $('#errores').();
//                
//                Materialize.toast("<i class='material-icons'></i>Ocurrio algun error ", 2000, 'red');
                    $("#btn-crear-solicitud").attr('disabled',false);
            }
        })
                .fail(function () {
                    Materialize.toast("<i class='material-icons'>warning</i>", 2000, 'blue');
                });
		
    });//fin: crear solicitud

	
	//Validation
		
		/*$("#crearSolicitud").validate({
			rules: {
				
				descripcion:{
					required:true
				}
			},
			messages: {
				descripcion: {
					required: "obligatorio",
				}
			},
			errorElement : 'em',
			errorPlacement: function(error, element){
				var placement = $(element).data('error');
				if (placement){
					$(placement).append(error)
				} else{
					error.insertAfter(element);
				}
			}
		
		});*/
	
//editar solicitud
    $(document).on('submit', '#editarSolicitud', function (e) {

        e.preventDefault();
        var url = $('form').attr("data-url");
        
//        alert($(this).serialize());
        $.ajax({
            type: 'POST',
            url: url,
            data: $(this).serialize(),
        }).done(function (respuesta) {
            if (respuesta == true)
            {
                Materialize.toast("<i class='material-icons'></i>Se actualizó el registro exitosamente", 4000, 'green');
            }else{
                Materialize.toast("<i class='material-icons'></i>Se produjo un error, no se guardaron los cambios", 4000, 'red');
            }
        })
                .fail(function () {
                    Materialize.toast("<i class='material-icons'>warning</i>", 4000, 'blue');
                });
        
        $(".modal").closeModal();
        $('#buscador').trigger('keyup');
    });//fin: editar solicitud

//select dependiente de select
    $(document).on('change', '#selectCen', function () {
        var url = $('#selectCen').attr("data-url");
        var id = $(this).val();

        $.ajax({
            url: url,
            type: 'POST',
            data: 'id=' + id,
            success: function (data) {
                $("#selectEqui").html(data);
                $('select').material_select();
            }
        });
    });  
    
    //fin: select dependiente de select

//sweetalert
    $(document).on('click', ".modal-eliminar", function (e) {
        
        e.preventDefault();
        swal({title: "¿Está seguro que desea eliminar este registro?",
            text: "Una vez eliminado no se podrá recuperar ningún dato.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Sí, eliminar registro.",
            closeOnConfirm: false},
        function () {
            var url = $('.modal-eliminar').attr('data-url');
            $.ajax({
                url: url,
                type: 'get',
                success: function () {
                    swal("¡Eliminado!", "Su registro se ha eliminado exitosamente.", 'success');
                    $('#buscador').trigger('keyup');
                    //alert(url);
                }
            });
        });
    });//fin: sweetalert

    //Botón para cerrar modales
    $(document).on('click', '.cerrar', function () {
        $(".modal").closeModal();
    });

});//fin: $(document).ready