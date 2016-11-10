<?php

// BRYAN DAVID RAMOS MUÑOZ TADSI03
include_once('../model/Insumos/insumosModel.php');

class InsumosController {

    //PLANOS

    function planos() {
        include_once("../view/Insumos/insumos/planos.html.php"); //lleva a la vista para importar el plano
    }

    function postPlanos() {
        $plano = $_FILES['plano'];
        $errores = array();
        //-------------------------------validar el tipo de archivo-----------------------------
//        if($plano['type'] != 'text/csv'){
//            $errores[]='<h6><strong>(*) Este tipo de archivo no es valido.</strong><h6>';
//            $errores[]='<h6><strong>(*) Solo se permiten archivos con la extencion "csv".</strong><h6>';
//        } 
        //------------------------------------------------------------------------------------
//        if(count($errores)>0){
//            setErrores($errores);
//            redirect(crearUrl('insumos', 'insumos', 'planos'));
//            //----------------fin validaciones-----------------
//        }else{
        //        die(print_r($plano));
        $tem = $plano['tmp_name'];

        //----------------------------------------------------------------------
        $fila = 1;
        if (($gestor = fopen("$tem", "r")) !== FALSE) {

            while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

                $insumosModel = new insumosModel();

                //                die(print_r($datos));
                $numero = count($datos);
                //                    echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
                $fila++;

                for ($c = 0; $c < $numero; $c++) {
                    //                    echo $datos[$c] . "<br />\n";
                    $y = $datos[$c];

                    //                        $dato = explode(";", $y);

                    $delimiter = array(",", ";", "'", "\"", "|", "\\", "/", ":");
                    $replace = str_replace($delimiter, $delimiter[0], $y);
                    $dato = explode($delimiter[0], $replace);

                    if ($dato[0] != 'identificacion') {

                        $insertper = "INSERT INTO pag_insumo (ins_id,ins_nombre,ins_descripcion,ins_valor,umed_id) "
                                . "VALUES ($dato[0],"
                                . "'$dato[1]',"
                                . "'$dato[2]',"
                                . "$dato[3],"
                                . "$dato[4])";


                        $insertar = $insumosModel->insertar($insertper);

//                                die($insertper);
                    }
                } //explode
                // Cierra la conexion
                $insumosModel->cerrar();
            }
            fclose($gestor);
        }
        //----------------------------------------------------------------------
        redirect(crearUrl("insumos", "insumos", "consultar"));
    }

//FIN PLANOS 
//crear
    function crear() {
        $objUmed = new InsumosModel();
        $sql = "SELECT * FROM pag_unidad_medida";
        $umeds = $objUmed->select($sql);
        // Cierra la conexion
        $objUmed->cerrar();
        include_once("../view/Insumos/insumos/crear.html.php");
    }

    function postCrear() {

        $objInsumos = new InsumosModel();
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronCorreo = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        $patronDireccion = "/^[0-9a-zA-Z]+$/";

        if (!isset($_POST['ins_nombre']) or $_POST['ins_nombre'] == "") {
            $errores[] = "El campo NOMBRE INSUMO no puede estar vacio";
        }
        if (!isset($_POST['ins_descripcion']) or $_POST['ins_descripcion'] == "") {
            $errores[] = "El campo DESCRIPCION INSUMO no puede estar vacio";
        }
        if (!isset($_POST['ins_valor']) or $_POST['ins_valor'] == "") {
            $errores[] = "El campo VALOR INSUMO no puede estar vacio";
        }
        if (isset($_POST['ins_valor']) && !is_numeric($_POST['ins_valor'])) {
            $errores[] = "El campo VALOR INSUMO solo admite numeros";
        }
        if (isset($_POST['umed_id']) && !is_numeric($_POST['umed_id'])) {
            $errores[] = "El campo UNIDAD DE MEDIDA solo admite numeros";
        }

        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('Insumos', 'insumos', 'crear'));
        } else {

//            $ins_id = $_POST['ins_id'];
            $ins_nombre = $_POST['ins_nombre'];
            $ins_descripcion = $_POST['ins_descripcion'];
            $ins_valor = $_POST['ins_valor'];
            $umed_id = $_POST['umed_id'];
//            dd($_POST);
            $insertInsumos = "INSERT INTO pag_insumo"
                    . "(ins_nombre,"
                    . "ins_descripcion,"
                    . "ins_valor,"
                    . "umed_id) "
                    . "VALUES ('$ins_nombre',"
                    . " '$ins_descripcion',"
                    . " '$ins_valor',"
                    . " '$umed_id')";
            
            $insertar = $objInsumos->insertar($insertInsumos);
            // Cierra la conexion
            $objInsumos->cerrar();

            redirect(crearUrl("insumos", "insumos", "Listar"));
        }
    }
    
    function buscadorAjax() {

        $objInsumos = new InsumosModel();

        $insumo = $_POST['insumo'];

        // if (is_numeric($insumo)) {
        //     $ins = " AND pi.ins_id LIKE '$insumo%'";
        // } else {
        //     $ins = " AND pi.ins_nombre LIKE '$insumo%'";
        // }
        // $sql = "SELECT pi.*, pum.umed_descripcion FROM pag_insumo pi, pag_unidad_medida pum "
        //         . "WHERE pi.umed_id=pum.umed_id " . $ins;
        $sql = "SELECT * FROM pag_insumo,pag_unidad_medida WHERE pag_insumo.umed_id=pag_unidad_medida.umed_id 
                 AND pag_insumo.ins_nombre  LIKE '%" . $insumo . "%' or pag_insumo.ins_id  LIKE '%" . $insumo . "%' AND pag_insumo.umed_id=pag_unidad_medida.umed_id";
        $insumos = $objInsumos->select($sql);

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('insumos', 'insumos', 'listar');

        $paginado = new Paginado($insumos, $pagina, $url);

        $insumos = $paginado->getDatos();

        if ($insumos == true) {
            
        } else {
            echo "<b>'", $insumo, "'</b>", " No se encontraron resultados para tu busqueda. . .";
        }
        $objInsumos->cerrar();
        include_once("../view/Insumos/insumos/listar.html.php");
    }

//Fin Consulta Con Ajax
//Listar
    function listar() {
        include_once("../view/Insumos/insumos/buscador.html.php");
    }

//Fin Listar
//Editar
    function editar($parametros = false) {

        //select a pag_unidad_medida
        $objUmeds = new Insumosmodel();
        $sql = "SELECT * FROM pag_unidad_medida";
        $umeds = $objUmeds->select($sql);
        //cierra la conexion
        $objUmeds->cerrar();

        //select a pag_insumo
        $objInsumo = new InsumosModel();
        $id = $parametros[1];
        $sql = "SELECT * FROM pag_insumo WHERE ins_id='$id'";
//        dd($sql);
        $insumo = $objInsumo->find($sql);
        // Cierra la conexion
        $objInsumo->cerrar();

        include_once("../view/Insumos/insumos/editar.html.php");
    }

    function postEditar() {
        $objInsumo = new InsumosModel();
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronCorreo = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        $patronDireccion = "/^[0-9a-zA-Z]+$/";

        if (!isset($_POST['ins_id']) or $_POST['ins_id'] == "") {
            $errores[] = "El campo CODIGO INSUMO no puede estar vacio";
        }
        if (isset($_POST['ins_id']) && !is_numeric($_POST['ins_id'])) {
            $errores[] = "El campo CODIGO INSUMO solo admite numeros";
        }
        if (!isset($_POST['ins_nombre']) or $_POST['ins_nombre'] == "") {
            $errores[] = "El campo NOMBRE INSUMO no puede estar vacio";
        }
        if (!isset($_POST['ins_descripcion']) or $_POST['ins_descripcion'] == "") {
            $errores[] = "El campo DESCRIPCION INSUMO no puede estar vacio";
        }
        if (!isset($_POST['ins_valor']) or $_POST['ins_valor'] == "") {
            $errores[] = "El campo VALOR INSUMO no puede estar vacio";
        }
        if (isset($_POST['ins_valor']) && !is_numeric($_POST['ins_valor'])) {
            $errores[] = "El campo VALOR INSUMO solo admite numeros";
        }
        if (isset($_POST['umed_id']) && !is_numeric($_POST['umed_id'])) {
            $errores[] = "El campo UNIDAD DE MEDIDA solo admite numeros";
        }
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('insumos', 'insumos', 'listar'));
        } else {

            $ins_id = $_POST['id'];
            $ins_nombre = $_POST['ins_nombre'];
            $ins_descripcion = $_POST['ins_descripcion'];
            $ins_valor = $_POST['ins_valor'];
            $umed_id = $_POST['umed_id'];
            //Update pag_insumo

            $sql = "UPDATE "
                    . "pag_insumo "
                    . "SET "
                    . "ins_id= '$ins_id',"
                    . "ins_nombre= '$ins_nombre',"
                    . "ins_descripcion= '$ins_descripcion',"
                    . "ins_valor= '$ins_valor',"
                    . "umed_id= '$umed_id'"
                    . "WHERE ins_id='$ins_id'";

            $respuesta = $objInsumo->update($sql);
            // Cierra la conexion
            $objInsumo->cerrar();
            redirect(crearUrl("insumos", "insumos", "listar"));
        }
    }

//postEditar
//Fin Editar
//eliminado
    function postEliminar() {
        $id = $_POST['id'];
        $objInsumos = new InsumosModel();

        $sql = "UPDATE pag_insumo SET estado=now() WHERE ins_id='$id'";
        $insumo = $objInsumos->update($sql);
        // Cierra la conexion
        $objInsumos->cerrar();
    }

//fin eliminado
}
