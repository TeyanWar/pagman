$(document).ready(function () {

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
                Materialize.toast("<i class= 'material-icons' ></i> Registro exitoso.", 2000, 'green');
                setTimeout(
                        function () {
                            window.location.href = (redirect);
                        }, 2000);
            }
            else {
                Materialize.toast("<i class= 'material-icons' ></i> Error al registrar.", 3000, 'red');
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
    
//fin: select dependiente de select

    //select dependiente de select
//    $(document).on('change', '#selectCen', function () {
//        var url = $('#selectCen').attr("data-url");
//        var id = $(this).val();
//
//        $.ajax({
//            url: url,
//            type: 'POST',
//            data: 'id=' + id,
//            success: function (data) {
//                $("#selectEqui").html(data);
//                $('select').material_select();
//            }
//        });
//    });


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
});