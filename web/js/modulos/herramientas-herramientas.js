$(document).ready(function () {

    // aqui empieza la modal para editar herramientas
    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#model-data").html(data);
            }
        });
    });
    // filtro de busqueda de herramientas por numero_placa o nombre herramienta
    //$('#buscarHer').focus();
    $("#buscarHer").keyup(function () {
        var Herramienta = $("#buscarHer").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "her_id=" + Herramienta,
            success: function (data) {
                $("#buscarHerramienta").html(data);
            }
        });
    });
    $('#buscarHer').trigger('keyup');
// aqui empieza el eliminar con la libreria sweetalert , completamente funcional con el eliminado logico.
//" CAMBIO DE ESTADO TRUE-FALSE "
    $(document).on('click', '.modal-eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr("data-url");
        var her_id = $(this).attr("data-her_id");
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
                type: "post",
                data: {
                    id: her_id
                }
            }).done(function (data) {

            });
            swal("Registro Eliminado!", "Su registro fue eliminado satisfactoriamente.", "success");
            window.location.href = "listar";
        });
    });
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: 15
    });
});
    