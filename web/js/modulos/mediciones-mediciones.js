$(document).ready(function () {

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

    //Inicio código filtro tipo de medidor
    $("#busquedaMedidor").keyup(function () {
        var medidor = $("#busquedaMedidor").val();
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            data: "busquedaMedidor=" + medidor,
            success: function (data) {
                $("#tabla").html(data);
            }
        });
    });//Fin código filtro tipo de medidor

    //Inicio código agregar equipos(mediciones)
    $("#equipos").change(function () {
        var idsEquipos = $(this).val();//Captura id's (El  método .val () se utiliza principalmente para obtener los valores de los elementos de formulario)
        ajaxAgregarEquipo(idsEquipos);//Muestra los equipos que se han seleccionado
    });
    
    
    //-----------------mediciones---------------------------

    function ajaxAgregarEquipo(idsEquipos) {
        $.post(
               'http://localhost/practica/pagman-pruebas/web/index.php/mediciones/mediciones/ajaxAgregarEquipo',
                {ids: idsEquipos},
        function (data) {
            var elements = $(data).find('#lista-equipos');
            $("#equipos-agregados").html(elements.html());
            $(".btn-agregar").click(function () {
                ajaxListarEquipos($(this).parent().parent());
            });
        });
    }//fin código agregar equipos(mediciones)

    //inicio código listar equipo y su medicion
    function ajaxListarEquipos(tr) {
        $.post(
                'http://localhost/practica/pagman-pruebas/web/index.php/mediciones/mediciones/ajaxListarEquipos/noVista',
                {
                    equi_id: tr.children('#equi_id').html(),
                    equi_nombre: tr.children('#equi_nombre').html(),
                    medicion: tr.children().children().children().children('#medidaActual').val(),
                    fecha: tr.children().children().children().children('#fecha').val()
                },
        function (data) {
            $("#contenedor-equipos > table").prepend(data);
        }
        );
    }//Fin código listar equipo y su medicion

    //Inicio código mensaje de alerta 
    $(document).on('click', '.editarSweetAlert', function (e) {

        e.preventDefault();

        swal({title: "¿Esta seguro?",
            text: "¿Esta seguro que desea actualizar la informacion?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Change it!",
            closeOnConfirm: false},
        function () {
            var url = $('form').attr('action');
            var nombre = $('#nombre').val();
            var acronimo = $('#acronimo').val();
            var descripcion = $('#descripcion').val();
            var estado = $('#estado').val();
            var id = $('#nombre').attr('data-id');

            $.ajax({
                url: url,
                type: 'post',
                data: {
                    nombre: nombre,
                    acronimo: acronimo,
                    descripcion: descripcion,
                    estado: estado,
                    id: id
                }
            }).done(function (data) {
                //alert(data);
                window.location.href = "listar";
            });
            //$(url).submit();
        });
    });//Fin código mensaje de alerta
    
    //Guardar medidas
    $("#btn-guardar-medidas").click(function(){
        
       var datos = $("#form-medidas").serialize();
       var redirect = $(this).attr("data-redirect");
        $.ajax({
            type:"POST",
            url: 'http://localhost/proyecto/mediciones/web/index.php/mediciones/mediciones/ajaxGuardarMedidas/noVista',
            data: datos,
            success: function(response){
                window.location.href = redirect;
            }
        });
            return;
    });
   //Fin código modal tipo medidor para actualizacion
    
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