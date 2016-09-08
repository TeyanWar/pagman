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

        $errores = array();
        $expresion = '/^[A-Z]{2}-[0-9]{4}$/';
        $cadena = "/^[a-zA-Z]+/";

        if (!isset($_POST['her_id']) or $_POST['her_id'] == "") {
            $errores[] = "El campo numero placa no debe estar vacio";
        }

        $sql = "SELECT her_id FROM pag_herramienta";
        $objHerramientas = new HerramientasModel();

        $consulta = $objHerramientas->select($sql);

        $objHerramientas->cerrar();

        foreach ($consulta as $id) {
            //die(print_r($consulta));
            if ($id['her_id'] == $_POST['her_id']) {
                //die(print_r($_POST['her_id']));
                $errores[] = "La placa Nro. <code>" . $id['her_id'] . "</code> ya se encuentra registrada.";
            }
        }

        if ($_POST['her_fecha_ingreso'] == date('Y-m-d')) {
            $errores[] = "La fecha ingresada, NO debe ser superior a la fecha actual (<code>" . date('Y-m-d') . "</code>)";
        }


//        if (isset($_POST['her_id']) && !preg_match($expresion, $_POST['her_id'])) {
//            $errores[] = "El campo numero placa debe ser de tipo alfanumerico";
//        }
        if (!isset($_POST['her_nombre']) or $_POST['her_nombre'] == "") {
            $errores[] = "El campor nombre no debe estar vacio";
        }
        if (isset($_POST['her_nombre']) && !preg_match($cadena, $_POST['her_nombre'])) {
            $errores[] = "El campo nombre herramienta debe contener solo letras";
        }
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('Herramientas', 'herramientas', 'crear'));
        }

        if ($_POST['her_fecha_ingreso'] == "") {
            $errores[] = "Por favor selecciona una fecha de ingreso";
        }
        // estos son los pos que llegan de los formularios.



        $her_id = $_POST['her_id'];
        $her_nombre = $_POST['her_nombre'];
        $her_descripcion = $_POST['her_descripcion'];
        $her_fecha_ingreso = $_POST['her_fecha_ingreso'];
        $ther_id = $_POST['ther_id'];

        //die(print_r($_FILES));
        $her_imagen = $_FILES['her_imagen']['name'];

        //Asigno el nombre de la foto segun numero de placa
        $herramienta_foto = "Herramienta-" . $her_id;

        //Hago un explode para capturar la extension de IMAGEN
        $fotoHerramienta = explode(".", $_FILES['her_imagen']['name']);
        //die(print_r($fotoHerramienta));
        //Nombre de la foto con la extension capturada
        $nombreFoto = $herramienta_foto . "." . end($fotoHerramienta);
        //die($nombreFoto);

        $ruta = $_FILES['her_imagen']['tmp_name'];
        //Capturo la ruta donde guardare la Imagen
        $rutaydoc = getDocumentRoot() . "/web/media/img/Herramientas/" . $nombreFoto;

        if ($ruta <> "") {
            if (move_uploaded_file($ruta, $rutaydoc)) {
                
            }
        } else {
            $rutaydoc = NULL;
        }

        $insertHerramientas = "INSERT INTO pag_herramienta "
                . "(her_id,"
                . "ther_id,"
                . "her_nombre,"
                . "her_descripcion,"
                . "her_fecha_ingreso,"
                . "her_imagen) "
                . "VALUES('$her_id',"
                . "'$ther_id',"
                . "'$her_nombre',"
                . "'$her_descripcion',"
                . "'$her_fecha_ingreso',"
                . "'$nombreFoto')";
        $objHerramientas = new HerramientasModel();
        //die(print_r($insertHerramientas));
        $insertar = $objHerramientas->insertar($insertHerramientas);
        // Cierra la conexion
//        dd($insertar);
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
        $listarHer = $paginado->getDatos();
//        // fin paginado
        // Cierra la conexion
//        dd();
        $objHerramientas->cerrar();

        include_once("../view/Herramientas/herramientas/buscador.html.php");
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
           /*
         * Paginado
         */
        $pagina = (isset($_REQUEST['pagina'])?$_REQUEST['pagina']:1); 
        $url = crearUrl('Herramientas', 'herramientas', 'listar');
        
        $paginado = new Paginado($listarHer, $pagina, $url);
        
        $listarHer = $paginado->getDatos();
        /*
         * Fin paginado
         */


        $objherramientas->cerrar();
        include_once("../view/Herramientas/herramientas/listar.html.php");
    }

}
