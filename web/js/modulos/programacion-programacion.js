$(document).ready(function () {
    
    //------ paginador ------------------
    
    function mostrardatos(pagina){
       var numfilas = 3;
       var paginasamostrar=8;
       $.ajax({
          type: "POST",
          dataType: 'json',
          url: "programacionController.php",
          data: {filasxpagina:numfilas,paginasamostrar:paginasamostrar,pagina:pagina},
       }).done(function(respuesta){
          if(respuesta.estado == 1){
             $("#datos").html(respuesta.encabezados + respuesta.datos);
             $("#paginacion").html(respuesta.paginacion);
          }
          else
             $("#mensaje").html(respuesta.mensaje);
       });
    }
 
    $("#paginacion").on("click","a", function(event){
       pagina = this.id;
       mostrardatos(pagina);
    });
 
    mostrardatos(1);
    
    //--------- fin paginador ----------
    
    //------ validaciones ---------------
    
    $("#formValid").validate({
        rules: {
            regional: {
                required: true
            },
            centro: {
                required: true
            },
            fecha: {
                required: true
            },
            inicio: {
                required: true,
            },
            cgender:"required",
			cagree:"required",
        },
        //For custom messages
        messages: {
            regional:{
                required: "La regional es obligatorio."
            },
            centro:{
                required: "El centro es obligatorio."
            },
            fecha:{
                required: "La fecha es obligatorio."
            },
            inicio:{
                required: "La fecha de inicio es obligatorio."
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
    
    //----------- fin validations ---------------

    $("#equipo").keyup(function () {
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

    $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
    $(".model-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#edit > .modal-content").html(data);
            }
        });

    });
    
    
      $(document).on('click', ".modal-trigger", function () {
        var url = $(this).attr("data-url");
    $(".model-data").html('Cargando ....');
        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#detalle > .modal-content").html(data);
            }
        });

    });

    $(document).on('click', '.modal-trigger', function () {
        var url = $(this).attr('data-url');
        var equipo = $(this).parent().parent().children("td").children("input.co").val();
        var equi = $(this).parent().parent().children("td").children("input.col").val();

        $.ajax({
            url: url,
            type: "POST",
            data: {
                equipo: equipo,
                equi: equi
            }
        }).done(function (data) {
            $("#mod > .modal-content").html(data);

        });
        $("#conte").hide();




    });




    $(document).on('click', '#tab', function () {
        var equi = $("#plo").val();
        var cod = $("#pla").val();
        var tipo = $("#tra").val();
        var med = $("#med").val();
        var com = $("#componente").val();
        var hora = $("#hora").val();
        var fre = $("#frecuencia").val();
        var prio = $("#prio").val();
        var tarea = $("#tarea").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: {
                equi: equi,
                cod: cod,
                tipo: tipo,
                med: med,
                com: com,
                hora: hora,
                fre: fre,
                prio: prio,
                tarea: tarea
            }
        }).done(function (data) {
            $("#mod").closeModal();
            $("#programaciones").append(data);
        });
    });

    $("#busquedaAjax").keyup(function () {
        var usuario = $("#busquedaAjax").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaPersona=" + usuario,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });

    $("#cate").keyup(function () {
        var usuario = $("#cate").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "usuario=" + usuario,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });
    $(document).on("click", ".modal-eliminar", function (e) {
       
       e.preventDefault();
        swal({
            title: "Estas seguro de eliminar el registro?",
            text: "la informacion que estas apunto de eliminar no aparecera en pantalla!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#6699FF",
            confirmButtonText: "si, elimine el registro!",
            closeOnConfirm: false},
        function () {
                 var url = $(this).attr("data-url");
            $.ajax({
                url: url,
                type: "get",
                }).done(function (respuesta) {
                if (respuesta === "NO") {
                    swal("¡Eliminado!", "Su registro se ha eliminado exitosamente.", 'success');
                    $('#pro').trigger('keyup');
                } else {
                    swal("¡Error!", "Su registro no se pudo eliminar.");
                }
            });
                


        });
    });

    $(document).on('click', '.remove', function () {
        var id = $(this).attr('data-id');

        $("#fila-" + id).remove();

    });

    //----consulta ajax programacion-----------
    $("#pro").keyup(function () {
        var program = $("#pro").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "program=" + program,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });
    $("#pro").trigger("keyup");

});

