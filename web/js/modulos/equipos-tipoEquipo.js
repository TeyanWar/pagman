$(document).ready(function () {

    $("#buscarTipoEquipo").keyup(function () {
        var tipoEquipo = $("#buscarTipoEquipo").val();

        if (tipoEquipo != "") {
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "tipoEquipo_id=" + tipoEquipo + "&pagina=" + pagina,
            success: function (data) {
                $("#buscarTipoDeEquipo").html(data);
            }
        });
    });
    //aqui termina el filtro de busqueda de Tipo de Equipo
    // --------------------------------------------//--------------------
    $('#buscarTipoEquipo').trigger('keyup');// function_trigger para visualizar las herramientas existentes

//EMPIEZA EL LISTAR DE CAMPOS PERSONALIZADOS EN EL CREAR TIPO EQUIPO




    $("#agregarCampoPer_Tipo_equipo").keyup(function () {
        var tipoEquipo = $("#agregarCampoPer_Tipo_equipo").val();

        if (tipoEquipo != "") {
            $('#pagina').val(1);
        }
        var pagina = $('#pagina').val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "tipoEquipo_id=" + tipoEquipo + "&pagina=" + pagina,
            success: function (data) {
                $("#tablaCampoPersonalizado").html(data);
            }
        });
    });

    $('#agregarCampoPer_Tipo_equipo').trigger('keyup');// function_trigger para visualizar las herramientas existentes


//------------------AQUI TERMINA EL LISTAR -----------------------------------------------------

    $(document).on("click", ".ver-detalle1", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalle1 > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".editar1", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdate1 > .modal-content").html(data);
            }
        });
    });
    $(document).on("click", ".eliminar1", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modaleliminar1 > .modal-content").html(data);
            }
        });
    });

    $('.btn-warning-confirm').click(function () {
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
            closeOnConfirm: false
        },
        function () {
            swal("Deleted!", "Your imaginary file has been deleted!", "success");
        });
    });

    $(document).on('click', '.eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var equi_id = $(this).attr('data-equi_id');

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
                    id: equi_id
                }
            }).done(function (data) {

            });
            swal("Eliminado!", "Su registro se ha eliminado exitosamente.", "success");
            window.location.href = "listar";
        });
    });

});