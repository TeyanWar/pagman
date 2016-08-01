<?php

include_once('../model/Herramientas/HerramientasModel.php');

class HerramientasController {

    function crear() {
        //die(print_r($_SERVER));
        //este es el select que me permite elegir que tipo de herramienta registro
        $objtipo_Herramienta = new HerramientasModel();
        $sql = "SELECT * FROM pag_tipo_herramienta";
        $tipos = $objtipo_Herramienta->select($sql);

        //cierra conexion
        $objtipo_Herramienta->cerrar();

        include_once("../view/Herramientas/herramientas/crear.html.php");
    }

    function postCrear() {
        $objHerramientas = new HerramientasModel();
        $errores = array();
        $expresion = '/^[A-Z]{2}-[0-9]{4}$/';
        $cadena = "/^[a-zA-Z]+/";

        if (!isset($_POST['her_id']) or $_POST['her_id'] == "") {
            $errores[] = "El campo numero placa no debe estar vacio";
        }
        if (!isset($_POST['her_nombre']) or $_POST['her_nombre'] == "") {
            $errores[] = "El campor nombre no debe estar vacio";
        }
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('herramientas', 'herramientas', 'crear'));
        }
        // estos son los post que llegan de los formularios.
        $her_id = $_POST['her_id'];
        $her_nombre = $_POST['her_nombre'];
        $her_descripcion = $_POST['her_descripcion'];
        $her_fecha_ingreso = $_POST['her_fecha_ingreso'];
        $ther_id = $_POST['ther_id'];
        $her_imagen = $_FILES['her_imagen']['name'];

        //aqui empieza la carga de archivos
        //Si es que hubo un error en la subida, mostrarlo, de la variable $_FILES podemos extraer el valor de [error], que almacena un valor booleano (1 o 0).
        if ($_FILES["her_imagen"]["error"] > 0) {
            echo $_FILES["her_imagen"]["error"] . "";
        } else {
            // Si no hubo error, hacemos otra condicion para asegurar que el archivo no este repetido
            if (file_exists("img/" . $_FILES["her_imagen"]["name"])) {
                echo $_FILES["her_imagen"]["name"] . " ya existe. ";
            } else {
                //$rutaImagen=$_FILES["her_imagen"]["name"];
                $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . "/poo/pagman/web/img/" . $_FILES["her_imagen"]["name"];
                // Si no es un archivo repetido y no hubo error, subimos a la carpeta /Imagenes para luego ser mostrada 
                move_uploaded_file($_FILES["her_imagen"]["tmp_name"], $rutaImagen);
//                    echo "Archivo Subido ";
            }
            $insertHerramientas = "INSERT INTO pag_herramienta (her_id,her_nombre,her_descripcion,her_imagen,her_fecha_ingreso,ther_id) "
                    . "VALUES('$her_id','$her_nombre','$her_descripcion','" . $_FILES["her_imagen"]["name"] . "','$her_fecha_ingreso','$ther_id')";

            $insertar = $objHerramientas->insertar($insertHerramientas);
//            die(print_r($insertHerramientas));
        }
        $objHerramientas->cerrar();

        redirect(crearUrl("herramientas", "herramientas", "listar"));
    }

    function editar($parametros = false) {

        $objHerramientas = new HerramientasModel();
        $id = $parametros[1];
        $sql = "SELECT * FROM pag_herramienta WHERE her_id='$id'";
        $herramienta = $objHerramientas->find($sql);
        // Cierra la conexion
        $objHerramientas->cerrar();
        include_once("../view/Herramientas/herramientas/editar.html.php");
    }

    function postEditar() {
        $objHerramientas = new HerramientasModel();
        $her_id = $_POST['id'];
        $her_nombre = $_POST['her_nombre'];
        $her_descripcion = $_POST['her_descripcion'];
        $her_fecha_ingreso = $_POST['her_fecha_ingreso'];
//        $her_imagen = $_FILES['her_imagen'];
////        $ther_id = $_POST['ther_id'];
//        //$rutaImagen=$_FILES["her_imagen"]["name"];
//        $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . "/pagman/web/img/" . $_FILES["her_imagen"];
//        // Si no es un archivo repetido y no hubo error, subimos a la carpeta /Imagenes para luego ser mostrada 
//        move_uploaded_file($_FILES["her_imagen"], $rutaImagen);

        $sql = "UPDATE "
                . "pag_herramienta "
                . "SET "
                . "her_nombre='$her_nombre', "
                . "her_descripcion='$her_descripcion', "
//                . "her_imagen='" . $_POST["her_imagen"] . "', "
                . "her_fecha_ingreso='$her_fecha_ingreso'  "
                . "WHERE her_id='$her_id'";
//        die(print_r($sql));
        $respuesta = $objHerramientas->update($sql);
        // Cierra la conexion
        $objHerramientas->cerrar();

        redirect(crearUrl("herramientas", "herramientas", "listar"));
    }

    function listar() {
        $objHerramientas = new HerramientasModel();

        $sql = "SELECT * FROM pag_herramienta";
        $listarHer = $objHerramientas->select($sql);

        //aqui empieza el paginado
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('herramientas', 'herramientas', 'listarHer');

        $paginado = new Paginado($listarHer, $pagina, $url);
//        dd($paginado);
        $listarHer = $paginado->getDatos();
//        // fin paginado
        // Cierra la conexion
        $objHerramientas->cerrar();

        include_once("../view/Herramientas/herramientas/listar.html.php");
    }

    function eliminar($parametros) {
        $objHerramientas = new HerramientasModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_herramienta WHERE her_id='$id'";
        $herramienta = $objHerramientas->find($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objHerramientas->cerrar();

        include_once("../view/Herramientas/herramientas/eliminar.html.php");
    }

    function postEliminar() {
        $id = $_POST['id'];
        $objHerramientas = new HerramientasModel();

        $sql = "UPDATE pag_herramienta SET estado=false WHERE her_id='$id'";
        $herramienta = $objHerramientas->update($sql);
        // Cierra la conexion
        $objHerramientas->cerrar();
    }

    function buscador() {

        $objherramientas = new herramientasModel();

        $herramienta = $_POST['her_id'];

        $sql = "SELECT * FROM pag_herramienta WHERE her_id LIKE '%" . $herramienta . "%' or her_nombre LIKE '%" . $herramienta . "%'";

        $listarHer = $objherramientas->select($sql);

        $objherramientas->cerrar();
        include_once("../view/Herramientas/herramientas/listarHer.html.php");
    }

}
