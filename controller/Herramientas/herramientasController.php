<?php

include_once('../model/Herramientas/HerramientasModel.php');

class HerramientasController {

    function crear() {
        //este es el select que me permite elegir que tipo de herramienta registro
        $objtipo_Herramienta = new HerramientasModel();
        $sql = "SELECT * FROM pag_tipo_herramienta";
        $tipos = $objtipo_Herramienta->select($sql);
        //cierra conexion
        $objtipo_Herramienta->cerrar();

        include_once("../view/Herramientas/herramientas/crear.html.php");
    }

    function postCrear() {

        $her_id = $_POST['her_id'];
        $her_nombre = $_POST['her_nombre'];
        $her_descripcion = $_POST['her_descripcion'];
        $her_imagen = $_POST['her_imagen'];
        $her_fecha_ingreso = $_POST['her_fecha_ingreso'];
        $ther_id = $_POST['ther_id'];

        $insertHerramientas = "INSERT INTO pag_herramienta "
                . "(her_id,her_nombre,her_descripcion,her_imagen,her_fecha_ingreso) "
                . "VALUES('$her_id','$her_nombre','$her_descripcion','$her_imagen','$her_fecha_ingreso')";
        //die(print_r($_POST));
        $objHerramientas = new HerramientasModel();

        $insertar = $objHerramientas->insertar($insertHerramientas);
//        if ($insertar) {
//            foreach ($ther_id as $detph_id) {
//                $insertTipoHerramienta = "INSERT INTO pag_tipo_herramienta (ther_id,ther_descripcion)VALUES('$ther_id','$detph_id')";
//            }
//        }
        // Cierra la conexion
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

        $her_id = $_POST['her_id'];
        $her_nombre = $_POST['her_nombre'];
        $her_descripcion = $_POST['her_descripcion'];
        $her_imagen = $_POST['her_imagen'];
        $her_fecha_ingreso = $_POST['her_fecha_ingreso'];
        $ther_id = $_POST['ther_id'];

        $objHerramientass = new HerramientasModel();

        $sql = "UPDATE "
                . "pag_herramienta "
                . "SET "
                . "her_nombre='$her_nombre', "
                . "her_descripcion='$her_descripcion' "
                . "her_imagen='$her_imagen' "
                . "her_fecha_ingreso='$her_fecha_ingreso' "
                . "ther_id='$ther_id' "
                . "WHERE her_id='$her_id'";

        $respuesta = $objHerramientass->update($sql);

        // Cierra la conexion
        $objHerramientass->cerrar();

        redirect(crearUrl("herramientas", "herramientas", "listar"));
    }

    function listar() {
        $objHerramientas = new HerramientasModel();

        $sql = "SELECT * FROM pag_herramienta";
        $listarHer = $objHerramientas->select($sql);

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
