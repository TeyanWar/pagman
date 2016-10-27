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
    
    //----- INICIO de login -----//
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
                    Materialize.toast('El Usuario o la contraseña ingresada es incorrecta', 3000, 'rounded col red');
                } else {
                    Materialize.toast('Usuario esta Bloqueado o no tiene permisos de administrador', 2000, 'rounded col red');
                }
            }
        });
    }
    //----- Fin de login -----//
    
    //Evento para los botones submit con ajax
    $(document).on('click','.btn_submit_modal',function(e){
       e.preventDefault();
       var url=$(this).parents("form:first").attr("action");
//        $(this).prop('disabled',true);
        $.ajax({
            url:url,
            type:"post",
            data: $(this).parents("form:first").serialize()
        }).done(function(response){
            alert(response);
            var respuesta = $.parseJSON(response);
            if(respuesta.accion===true){
                Materialize.toast(respuesta.mensajes, 1500, 'rounded col green');
                window.setTimeout("location.href='"+respuesta.redirect+"'", 1500);
            }else{
                $('#cont_errors_ajax').html(respuesta.mensajes);
                $('#cont_errors_ajax').css('display','block');
                $('.btn_submit_modal').prop('disabled',false);
                $('.modal-content').animate({scrollTop:$('#cont_errors_ajax').position().top}, 'slow');
            }
        });
    });
    
    //Enfoca campo username
     $('#formLoginAjax').ready(function(){$('#username').focus();});
    
    //Bajar el scroll de menú cuando se selecciona una opción
//    $(document).on('click','.module_menu',function(){
//        var elemento=$(this).children("a:first").attr('id');
//        var posicion = $('#'+elemento).position().top;
////        alert(elemento);
//        $("#slide-out").animate({
//            scrollTop: posicion
//        }); 
//    });

 
 //-----------------------------------------------------------------------------------

    //Sampel Pie Doughnut Chart
    var PieDoughnutChartSampleData = [
        {
            value: 20,
            color:"#F7464A",
            highlight: "#FF5A5E",
            label: "No Cumple"
        },
        {
            value: 80,
            color: "#FDB45C",
            highlight: "#FFC870",
            label: "Si Cumple"
        }
    ]

    window.onload = function() {

        window.PieChartSample = new Chart(document.getElementById("pie-chart-sample").getContext("2d")).Pie(PieDoughnutChartSampleData,{
            responsive:true
        });
    };

    
});