$(document).ready(function () {

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
    
    //Para mostrar los controladores y sus funciones de un módulo 
    //al asignar permisos
    $(document).on('click','.modulo_permisos', function(){
       var divPermisos=$(this).data('div_permisos');
       
       //Bloque para dejar seleccionado el módulo
       $('#contenedor_modulos div').css('background','teal');
       $(this).css('background','#1E90FF');
       
        $('#contenedor_permisos div').css('display','none');
       $(divPermisos).css('display','block');
    });
    
});

function selectAllFunctionsController(checkbox){
    //obtener el div contenedor del checkbox "Seleccionar todo"
    contCheckbox=document.getElementById(checkbox.id).parentNode;
   
    //obtener todos los input del div
    checkboxes=contCheckbox.getElementsByTagName('input');

    for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
    {
        if(checkboxes[i].type === "checkbox") //Entrar solo si es un checkbox
        {
           checkboxes[i].checked=checkbox.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
        }
    }
}

