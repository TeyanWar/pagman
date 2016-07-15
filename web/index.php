<?php

session_start();
// Se incluye archivo para helper
include_once("../lib/php/helper.php");

// Se incluyen todas las variables globales del sitio
include_once("../lib/php/global.php");

//se incluye el paginado
include_once("../lib/php/PaginadoClass.php");

//if(!isset($modulo) && !isset($controller) && !isset($accion)){
if (!isset($_SESSION['login']) && (!isset($_SERVER['PATH_INFO'])  || $_SERVER['PATH_INFO'] != "/sesion/sesion/postInicio/noVista")) {
    include_once('templates/adminMaterialize/login/header.html.php');
    include_once('templates/adminMaterialize/login/login.html.php');
    include_once('templates/adminMaterialize/login/footer.html.php');  
    
}elseif (!isset($_SERVER['PATH_INFO'])) {
    // Se carga el header de nuestra aplicación
    include_once('templates/adminMaterialize/header.html.php');
    include_once('templates/adminMaterialize/sidebar-left.html.php');
    // Se carga la vista principal del aplicativo
    include_once('templates/adminMaterialize/principal.html.php');
    include_once('templates/adminMaterialize/sidebar-right.html.php');
    // Se carga el footer de nuestra aplicación
    include_once('templates/adminMaterialize/footer.html.php');
} else {

    // /equipos/equipos/crear
    $cadena = explode("/", $_SERVER['PATH_INFO']);
//    dd($_SESSION);
    // Captura el nombre del modulo con la primer letra mayuscula
    $modulo = ucwords($cadena[1]);

    // Captura el nombre del controlador 
    $controller = $cadena[2];

    // Captura la funcion del controlador
    $accion = $cadena[3];
    
    //Inicio para validar permisos de navegación
        include_once('../controller/Permisos/permisosController.php');
        $objPermiso= new PermisosController();
        if(!$objPermiso->validarAcceso($cadena)){
            include_once('templates/adminMaterialize/header.html.php');
            include_once('templates/adminMaterialize/sidebar-left.html.php');
            include_once('templates/adminMaterialize/accessDenied.html.php');
            include_once('templates/adminMaterialize/sidebar-right.html.php');
            include_once('templates/adminMaterialize/footer.html.php');
            die();
        }
    //Fin validación permisos de navegación
    
    // /equipos/equipos/crear/noVista
    if (!isset($cadena[4]) || $cadena[4] != "noVista") {
        
        
        // Se carga el header de nuestra aplicación
        include_once('templates/adminMaterialize/header.html.php');

        include_once('templates/adminMaterialize/sidebar-left.html.php');

        echo "<section id='content'>
                <div class='container'>";
    }

    // Se cargan los parametros
    $count = 4;
    while (isset($cadena[$count])) {
        $parametros[] = $cadena[$count];
        $count++;
    }

    $pathController = "../controller/" . $modulo . "/" . $controller . "Controller.php";

    $controllerClass = ucwords($controller) . "Controller";

    include_once($pathController);

    // ajustar
    $objController = new $controllerClass();

    if (!isset($parametros)) {
        $objController->$accion();
    } else {
        $objController->$accion($parametros);
    }

    if (!isset($cadena[4]) || $cadena[4] != "noVista") {

        echo "</section'>
            </div>";

        include_once('templates/adminMaterialize/sidebar-right.html.php');

        // Se carga el footer de nuestra aplicación
        include_once('templates/adminMaterialize/footer.html.php');
    }
}
?>