$(document).ready(function () {
//-------validacion de crear ot-------------
    jQuery.validator.addMethod("letra", function(value, element) {
        return this.optional(element) || /^[a-z,áéóóúàèìòùäëïöüñ\s]+$/i.test(value);
    });
    $("#crearOt").validate({
        rules: {
            ot_centro_formacion: {
                required: true
            },
            ot_equipo: {
                required: true
            },
            ot_tipo_falla: {
                required: true
            },
            ot_fecha_inicio: {
                required: true
            },
            ot_fecha_fin: {
                required: true
            },
            ot_prioridad: {
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
            ot_desc_falla: {
                required: true,
                letra: true,
                minlength: 4,
                maxlength: 100
            },
            ot_desc_trabajo: {
                required: true,
                letra: true,
                minlength: 4,
                maxlength: 100
            },
            "cantins[]": {
                required: true,
                digits: true,
                maxlength: 2
            },
            "cantherra[]": {
                required: true,
                digits: true,
                maxlength: 2
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            ot_centro_formacion:{
                required: "El Centro es obligatorio."
            },
            ot_equipo:{
                required: "El Equipo es obligatorio."
            },
            ot_tipo_falla:{
                required: "El Tipo de falla es obligatorio."
            },
            ot_fecha_inicio:{
                required: "La Fecha inicio es obligatorio."
            },
            ot_fecha_fin:{
                required: "La Fecha fin es obligatorio."
            },
            ot_prioridad:{
                required: "La Prioridad es obligatorio."
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
            ot_desc_falla:{
                required: "Descripcion de la falla es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 4 caracteres",
                maxlength: "Solo se permite introducir maximo 100 caracteres"
            },
            ot_desc_trabajo:{
                required: "Descripcon de trabajo a realizar es obligatorio.",
                letra: "Solo se permiten letras",
                minlength: "Introduzca al menos 4 caracteres",
                maxlength: "Solo se permite introducir maximo 100 caracteres"
            },
            "cantins[]":{
                required: "La Cantidad Del Insumo es obligatorio.",
                digits: "La Cantidad Del Insumo debe ser: NUMERICO.",
                maxlength: "Solo se permite introducir maximo 2 caracteres."
            },
            "cantherra[]":{
                required: "La Cantidad De La Herramienta es obligatorio.",
                digits: "La Cantidad De La Herramienta debe ser: NUMERICO.",
                maxlength: "Solo se permite introducir maximo 2 caracteres."
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
    
    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");

        $(".model-data").html('Cargando ...');

        $(".modal").openModal();

        setTimeout(
            function () {
                $.ajax({
                    url: url,
                    type: "get",
                    success: function (data) {
                        $(".model-data").html(data);
                    }
                });
            }, 950);
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
    
    $(document).on('change', '#selectEqui', function () {
        var url = $('#selectEqui').attr("data-url");
        var id = $(this).val();

        $.ajax({
            url: url,
            type: 'POST',
            data: 'id=' + id,
            success: function (data) {
                $("#selecomp").html(data);
                $('select').material_select();
            }
        });
    });
    
//fin: select dependiente de select

    $(document).on('submit', '#editarOt', function (e) {
        e.preventDefault();
        var url = $('#editarOt').attr("data-url");
        var redirect = $('#editarOt').attr("data-redirect");
        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize()
        }).done(function (respuesta) {

            if (respuesta == true) {
                Materialize.toast("<i class= 'material-icons' ></i> Actualizacion exitosa.", 2000, 'green');
                setTimeout(
                    function () {
                        window.location.href = (redirect);
                    }, 1000);
            }
            else {
                Materialize.toast("<i class= 'material-icons' ></i> Error en la actualización.", 3000, 'red');
            }
        });
    });

    $('#buscador').focus();
    $('#buscador').keyup(function () {
        var otListar = $('#buscador').val();
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "POST",
            data: "resultado=" + otListar,
            success: function (data) {
                $('#listar').html(data);
            }
        });
    });

    $('#buscarInsumo').keyup(function () {
        var insumo = $('#buscarInsumo').val();
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "POST",
            data: "ins_id=" + insumo,
            success: function (data) {
                $('#respuestaInsumo').html(data);
//                $('#respuestaInsumo').fadeIn("slow");
            }
        });
    });

    $('#buscador').trigger('keyup');


    $(document).on('click', ".modal-eliminar", function (e) {
        e.preventDefault();
        swal({title: "¿Realmente desea eliminar este registro?",
            text: "Recuerde que una vez eliminado no se podrá recuperar.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#b71c1c",
            confirmButtonText: "Sí, eliminar registro.",
            closeOnConfirm: false},
        function () {
            var url = $('.modal-eliminar').attr('data-url');
            $.ajax({
                url: url,
                type: 'get'
            }).done(function (respuesta) {
                if (respuesta == true) {
                    swal("¡Eliminado!", "Su registro se ha eliminado exitosamente.", 'success');
                    $('#buscador').trigger('keyup');
                } else {
                    swal("¡Error!", "Su registro no se pudo eliminar.");
                }
            });

        });
        $("#herramientas").keyup(function () {
            var equipo = $("#equipo").val();
            var url = $(this).attr("data-url");
            $('#conte').show();
            $.ajax({
                url: url,
                type: "POST",
                data: "equipo=" + equipo,
                success: function (data) {
                    $("#conte").html(data);
                }
            });
        });

    });

    $(document).on('click', '.agregarInsumo', function () {
        var url = $(this).attr("data-url");
        var id = $(this).attr("data-id");
        var cant = $('#cantidad-'+ id).val();
        //alert(url);
        
        $.ajax({
            url: url + "/" + cant,
            type: "POST",
            data: "id="+id,
            success: function (data) {
                $('#agregarInsumoTable').append(data);
            }
        });
//        $('#agregarInsumoTable').fadeOut("slow");
    });

    /*
     $(".submenu").parent().mouseout(function(){
     $(this).children(".submenu-lista")
     .css("display","none");
     });
     */
	 
	$(document).on("click", "#imprime", function (){
		$('#orden').printArea();
		
	});
        
    //----------------carritos de compras----------------------
    
    //----------filtro de componentes--------------
    $("#componen").keyup(function () {
        var componente = $("#componen").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "componente=" + componente,
            success: function (data) {
                $("#resulcomp").html(data);
            }
        });
    });
    
    //-----------componentes------------------
    $(document).on('click', '.codcomponenteOT', function () {
        var cod = $(this).attr("data-id");
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                cod: cod
            }
        }).done(function (data) {
            $("#carroComponentes").append(data);
        });
    });
    
    $(document).on('click', '.Componenteremove', function () {
        var id = $(this).attr('data-id');

        $("#fcomp-" + id).remove();

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
                $("#resulins").html(data);
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
            $("#carroInsumos").append(data);
        });
    });
    
    $(document).on('click', '.Insumoremove', function () {
        var id = $(this).attr('data-id');

        $("#fins-" + id).remove();

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
                $("#resherra").html(data);
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
            $("#carroHerramientas").append(data);
        });
    });
    
    $(document).on('click', '.heremove', function () {
        var id = $(this).attr('data-id');

        $("#fher-" + id).remove();

    });
	
});