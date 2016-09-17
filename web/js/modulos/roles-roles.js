$(document).ready(function () {

    $('#form_crear_rol').ready(function(){
        $('#rol_nombre').focus();
    });
    
    $(document).on("click", ".editarRoles", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalUpdateRoles > .modal-content").html(data);
            }
        });
    });

    $(document).on("click", ".ver-detalle-roles", function () {
        var url = $(this).attr("data-url");

        $.ajax({
            url: url,
            type: "get",
            success: function (data) {
                $("#modalDetalleRol > .modal-content").html(data);
            }
        });
    });


    $(document).on('click', '.eliminar', function (e) {
        e.preventDefault();
        var url = $(this).attr('data-url');
        var rol_id = $(this).attr('data-rol_id');

        swal({title: "¿Realmente desea eliminar este registro?",
            text: "Una vez eliminado, deberá contactar con soporte para recuperarlo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "Red",
            confirmButtonText: "Sí, eliminar registro",
            closeOnConfirm: false
        },
        function () {
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    rol_id: rol_id
                }
            }).done(function (data) {
//                alert(data);
                if(data==true){
                    swal("Eliminado!", "Registro eliminado.", "success");
                    window.setTimeout('location.reload()', 1000);
                }else{
                    swal("Acci&oacute;n denegada", "No tiene el permiso para realizar esta acci&oacute;n.", "error");
                }
            });
        });
    });
    
    //Para mostrar los controladores y sus funciones de un módulo 
    //al asignar permisos
    $(document).on('click','.modulo_permisos', function(){
       var divPermisos=$(this).data('div_permisos');
       $('#contenedor_permisos div').css('display','none');
       $(divPermisos).css('display','block');
    });
    
    //Inicio validaciones lado del cliente
    $("#form_crear_rol").validate({
        rules: {
            rol_nombre: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            rol_descripcion: {
                maxlength: 100
            }
        },
        messages: {
            rol_nombre: {
                required: "Por favor diligencie este campo",
                minlength: "Este campo debe contener entre 3 y 20 caracteres",
                maxlength: "Este campo debe contener entre 3 y 20 caracteres"
            },
            rol_descripcion: {
                maxlength: "Este campo debe contener 100 o menos caracteres"
            }
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.insertAfter(element);
        }
    });
    
//    $("#form_editar_rol").validate({
//        rules: {
//            rol_id: {
//                required: true,
//                numeric: true
//            },
//            rol_nombre: {
//                minlength: 3,
//                maxlength: 20
//            },
//            rol_descripcion: {
//                maxlength: 100
//            },
//            funciones: {
//                required: true
//            }
//        },
//        messages: {
//            rol_id: {
//                required: "Por favor diligencie este campo",
//                numeric: "Este campo debe contener sólo números"
//            },
//            rol_nombre: {
//                required: "Por favor diligencie este campo",
//                minlength: "Este campo debe contener entre 3 y 20 caracteres",
//                maxlength: "Este campo debe contener entre 3 y 20 caracteres"
//            },
//            rol_descripcion: {
//                maxlength: "Este campo debe contener 100 o menos caracteres"
//            },
//            funciones: {
//                required: "Por favor asignar al menos una función al rol"
//            }
//        },
//        errorElement: 'em',
//        errorPlacement: function (error, element) {
//            alert();
//            error.insertAfter(element);
//        }
//    });
    //Fin validaciones
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