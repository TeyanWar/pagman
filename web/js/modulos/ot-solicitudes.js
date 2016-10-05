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
            else {
//                $('#errores').();                
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
    
//    $('#buscarInsumo').keyup(function () {
//        var insumo = $('#buscarInsumo').val();
//        var url = $(this).attr("data-url");
//
//        $.ajax({
//            url: url,
//            type: "POST",
//            data: "ins_id=" + insumo,
//            success: function (data) {
//                $('#respuestaInsumo').html(data);
////                $('#respuestaInsumo').fadeIn("slow");
//            }
//        });
//    });
//    
//    $(document).on('click', '.agregarInsumo', function () {
//        var url = $(this).attr("data-url");
//        var id = $(this).attr("data-id");
//        var cant = $('#cantidad-'+ id).val();
//        //alert(url);
//        
//        $.ajax({
//            url: url + "/" + cant,
//            type: "POST",
//            data: "id="+id,
//            success: function (data) {
//                $('#agregarInsumoTable').append(data);
//            }
//        });
////        $('#agregarInsumoTable').fadeOut("slow");
//    });
    
    
    //----------------carritos de compras----------------------
    
        //----------filtro de insumos--------------
    $(document).on("keyup","#insum",function () {
        var insumo = $(this).val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "insumo=" + insumo,
            success: function (data) {                
                $(".conte").html(data);
            }
        });
    });
    
    //-----------insumos------------------
    $(document).on('click', '.codinsumoOT', function () {
        var cod = $(this).attr("data-id");
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                cod: cod
            }
        }).done(function (data) {
            $(".carroInsumos").append(data);
        });
    });
    
    $(document).on('click', '.Insumoremove', function () {
        var id = $(this).attr('data-id');
        $("#fins-" + id).remove();
    });
    
    
    //----------filtro de herramientas--------------
    
    $(document).on("keyup","#herrm",function () {
        var herrami = $(this).val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "herrami=" + herrami,
            success: function (data) {
                $(".conte").html(data);
            }
        });
    });
    
    $(document).on('submit', '#crearOt', function (e) {
        e.preventDefault();
        var url = $('#crearOt').attr("data-url");
        var redirect = $('#crearOt').attr("data-redirect");
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
            }
        });
    });
    
    //---------------herramientas------------------
    $(document).on('click', '.codherraOT', function () {
        var cod_her = $(this).attr("data-id");
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                cod_her: cod_her
            }
        }).done(function (data) {
            $(".carroHerramientas").append(data);
        });
    });
    
    $(document).on('click', '.heremove', function () {
        var id = $(this).attr('data-id');
        $("#fher-" + id).remove();
    });

});//fin: $(document).ready