<?php

include_once('../model/Localizacion/regionalModel.php');

class RegionalController {

    function editar($parametros = false) {
        $objRegional = new RegionalModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_regional WHERE reg_id=$id";
        $regional = $objRegional->find($sql);

        // Cierra la conexion
        $objRegional->cerrar();

        include_once("../view/Localizacion/regional/editar.html.php");
    }

    function postEditar() {

        $reg_id = $_POST['reg_id'];
        $reg_nombre = $_POST['reg_nombre'];

        
        $objRegional = new RegionalModel();
        //die(print_r($_POST));
        $sql = "UPDATE "
                . "pag_regional "
                . "SET "
                . "reg_nombre='$reg_nombre' "
                . "WHERE reg_id=$reg_id";

      
        $respuesta = $objRegional->update($sql);

        // Cierra la conexion
        $objRegional->cerrar();

        redirect(crearUrl("Localizacion", "regional", "Consulta"));
    }

    function listar() {
        $objRegional = new RegionalModel();

        $sql = "SELECT * FROM pag_regional WHERE estado IS NULL";
        $regionales = $objRegional->select($sql);

        // Cierra la conexion
        $objRegional->cerrar();

        include_once("../view/Localizacion/regional/listar.html.php");
    }

    function crear() {

        include_once("../view/Localizacion/regional/crear.html.php");
    }

    function postCrear() {
        
        //--------------expresiones regulaes-----------
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $errores = array();

        //---------------validaciones-------------------

        if (!isset($_POST['reg_nombre']) or $_POST['reg_nombre'] == "") {
            $errores[] = '(*) El campo "Nombre De La Regional" es obligatorio';
        }

        if (isset($_POST['reg_nombre']) && !preg_match($patronLetras, $_POST['reg_nombre'])) {
            $errores[] = '(*) El campo "Nombre De La Regional" debe contener letras unicamente';
        }
        
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl("localizacion", "regional", "crear"));
            //----------------fin validaciones-----------------
        } else {
            $reg_nombre = $_POST['reg_nombre'];

            $insertRegional = "INSERT INTO pag_regional(reg_nombre)"
                    . " VALUES('$reg_nombre')";

            $objRegional = new RegionalModel();

            $insertar = $objRegional->insertar($insertRegional);

            // Cierra la conexion
            $objRegional->cerrar();

            redirect(crearUrl("localizacion", "regional", "Consulta"));
        }
        
    }

    function eliminar($parametros) {
        $objRegional = new RegionalModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_regional WHERE reg_id=$id";
        $regional = $objRegional->find($sql);

        // Cierra la conexion
        $objRegional->cerrar();

        include_once("../view/Localizacion/regional/eliminar.html.php");
    }

    function postEliminar() {
        $objRegional = new RegionalModel();
        
        $id = $_POST['id'];


        $sql = "UPDATE pag_regional SET estado=NOW() WHERE reg_id=$id";

        $respuesta = $objRegional->update($sql);

        // Cierra la conexion
        $objRegional->cerrar();

    }

    function detalle($parametros = false) {
        $objRegional = new RegionalModel();
        $id = $parametros[1];


        $sql = "SELECT * FROM pag_regional WHERE reg_id=$id";
        $regional = $objRegional->find($sql);



        // Cierra la conexion
        $objRegional->cerrar();

        include_once("../view/Localizacion/regional/detalle.html.php");
    }

    function Consulta(){

      include_once("../view/Localizacion/regional/consulta.html.php");
        
    }

    function buscarAjax()
    {
      $objRegional = new RegionalModel();

      $regional = $_POST['busquedaregional'];

      $sql="SELECT * FROM pag_regional WHERE estado IS NULL AND (reg_nombre LIKE '%".$regional."%' or reg_id LIKE '%".$regional."%')";
      
     
      
      $regionales = $objRegional->select($sql);
   

      $objRegional->cerrar();

      include_once("../view/Localizacion/regional/listar2.html.php");
    }
}
