$(document).ready(function(){
    
    $(".submenu").parent().click(function(){
        
        if($(this).hasClass("active")){
            $(this).children(".submenu-lista")
                    .css("display","none");
            
            $(this).removeClass("active");
        }else{
            $(this).children(".submenu-lista")
                    .css("display","block");
            
            $(this).addClass("active");
        }
        
    });
    
    $(document).on('click',".modal-trigger",function(){
       
       var url = $(this).attr("data-url");
               
       $.ajax({
           url: url,
           type: "get",
           success: function(data){
               $("#model-data").html(data);
           }
       });
       
    });
    
    //----- INICIO de código del controlador Personas y login -----//
    $("#loginAjax").click(function() {
        login();
    });
    $("#password").keypress(function(e){
        if (e.which == 13){
            login();
        }
    });
    function login(){
        var url = $("#formLoginAjax").attr('action');
        $.ajax({
            url: url + "/noVista",
            type: "POST",
            data: $("#formLoginAjax").serialize(),
            success: function(data) {
                if (data == 1) {
                    //alert(window.location);
                    window.location.reload();
                } else if (data == 0) {
                    Materialize.toast('El usuario se encuentra temporalmente Bloqueado o no tiene permisos de Administrador', 3000, 'rounded col red');
                } else {
                    Materialize.toast('Error de Informacion', 2000, 'rounded col red');
                }

            }
        });
    }
    
});