$(document).ready(function () {
    $("#idCampoSelec").change(function () {
        var idsCampo = $(this).val(); //Captura id's (El  método .val () se utiliza principalmente para obtener los valores de los elementos de formulario)
        var url = $(this).attr("data-url");
        ajaxAgregarCampoPersonalizado(idsCampo, url); //Muestra los equipos que se han seleccionado
    });
    function ajaxAgregarCampoPersonalizado(idsCampo, url) {
        $.post(
                url, {ids: idsCampo},
        function (data) {
            var elements = $(data).find('#lista-campos');
            $("#campos-agregados").html(data);
            $(".btn-agregar-campos").click(function () {
                $("#contenedor-campos").show();
                var urlListar = $(this).attr("data-url");
                ajaxListarCampoPersonalizado($(this).parent().parent(), urlListar);

            });
        });
    }//fin código agregar Campo Personalizado(Tipo equipo)

//inicio código listar Tipo de equipo y su Campo personalizado
    function ajaxListarCampoPersonalizado(tr, urlListar) {

        var consecutivo = $("#consecutivo").val();
        $.post(
                urlListar,
                {
                    cp_id: tr.children('#cp_id').html(),
                    cp_nombre: tr.children('#cp_nombre').html(),
                    consecutivo: consecutivo
                },
        function (data) {
            $("#contenedor-campos > table").prepend(data);
            $("#consecutivo").val(parseInt(consecutivo) + 1);
        }
        );
    }//Fin código listar equipo y su medicion

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