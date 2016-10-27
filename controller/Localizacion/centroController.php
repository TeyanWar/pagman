<?php

include_once('../model/Localizacion/centroModel.php');

class centroController {

    function editar($parametros = false) {
        $objCentro = new centroModel();

        $id = $parametros[1];

       $sql = "SELECT * from "
                . "pag_centro,pag_regional "
                . "WHERE pag_centro.reg_id=pag_regional.reg_id and cen_id=$id";

        
        $centro = $objCentro->find($sql);

        $sql2 = "SELECT * FROM pag_regional";
        $regionales = $objCentro->select($sql2);

        // Cierra la conexion
        $objCentro->cerrar();

        include_once("../view/Localizacion/centro/editar.html.php");
    }

    function postEditar() {

        $cen_id = $_POST['cen_id'];
        $cen_nombre = $_POST['cen_nombre'];
        $cen_dir = $_POST['cen_dir'];
        $cen_telefono = $_POST['cen_telefono'];
        $reg_id = $_POST['reg_id'];

        $objCentro = new centroModel();

        $sql = "UPDATE "
                . "pag_centro "
                . "SET "
                . "cen_nombre='$cen_nombre', cen_dir='$cen_dir', cen_telefono='$cen_telefono',reg_id=$reg_id"
                . " WHERE cen_id=$cen_id";
        //die(print_r($sql));
        $respuesta = $objCentro->update($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objCentro->cerrar();

        redirect(crearUrl("Localizacion", "centro", "Consulta"));
    }

    function listar() {
        $objCentros = new centroModel();

        $sql = "SELECT * FROM pag_centro WHERE estado IS NULL";

        $centros = $objCentros->select($sql);

        // Cierra la conexion
        $objCentros->cerrar();

        include_once("../view/Localizacion/centro/consulta.html.php");
    }



    function crear() {
        $objRegionales = new centroModel();

        $sql = "SELECT * FROM pag_regional";
        $regionales = $objRegionales->select($sql);

        // Cierra la conexion
        $objRegionales->cerrar();


        //consulta select de departamentos
        $objDepartamentos = new centroModel();

        $sql = "SELECT * FROM pag_departamento";
        $departamentos = $objDepartamentos->select($sql);

        // Cierra la conexion
        $objDepartamentos->cerrar();
        
          $objCiudades = new centroModel();

        $sql = "SELECT * FROM pag_ciudad";
        $ciudades = $objCiudades->select($sql);

        // Cierra la conexion
        $objCiudades->cerrar();
        include_once("../view/Localizacion/centro/crear.html.php");
    }

    function postCrear() {
        
        //--------------expresiones regulaes-----------
        $patronDireccio="/^.*(?=.*[0-9])(?=.*[a-zA-ZñÑ\s]).*$/";
        $patronNumeros="/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $errores = array();

        //---------------validaciones-------------------

        if (!isset($_POST['cen_nom']) or $_POST['cen_nom'] == "") {
            $errores[] = '(*) El campo "Nombre Del Centro De Formacion" es obligatorio';
        }

        if (isset($_POST['cen_nom']) && !preg_match($patronLetras, $_POST['cen_nom'])) {
            $errores[] = '(*) El campo "Nombre Del Centro De Formacion" debe contener letras unicamente';
        }
        
        if(!isset($_POST['cen_dir']) or $_POST['cen_dir']==""){
            $errores[]='(*) El campo "Direccion Del Centro" es obligatorio';
        }
        if(isset($_POST['cen_dir']) && !preg_match($patronDireccio,$_POST['cen_dir'])){
            $errores[]='(*) El campo "Direccion Del Centro" debe ser valido';
        }
        
        if(!isset($_POST['cen_telefono']) or $_POST['cen_telefono']==""){
            $errores[]='(*) El campo "Telefono Del Centro" es obligatorio';
        }
        if(isset($_POST['cen_telefono']) && !preg_match($patronNumeros,$_POST['cen_telefono'])){
            $errores[]='(*) El campo "Telefono Del Centro" debe contener numeros unicamente';
        }
        
        if(!isset($_POST['reg_id']) or $_POST['reg_id']==""){
            $errores[]='(*) El campo "Regional" es obligatorio';
        }
        
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl("localizacion", "centro", "crear"));
            //----------------fin validaciones-----------------
        } else {
            $nom_centro = $_POST['cen_nom'];
            $cen_dir = $_POST['cen_dir'];
            $cen_telefono = $_POST['cen_telefono'];
            $reg_id = $_POST['reg_id'];

            $insertCentro = "INSERT INTO pag_centro (cen_nombre,cen_dir,cen_telefono,reg_id) 
            VALUES('$nom_centro','$cen_dir','$cen_telefono',$reg_id)";

            $objCentro = new centroModel();

            $insertar = $objCentro->insertar($insertCentro);

            // Cierra la conexion
            $objCentro->cerrar();

            redirect(crearUrl("localizacion", "centro", "Consulta"));
        }
        
    }

    function eliminar($parametros) {
        $objCentro = new centroModel();

        $id = $parametros[1];

        $sql = "update pag_centro set estado=NOW() WHERE cen_id=$id";

        $centro = $objCentro->find($sql);

        // Cierra la conexion
        $objCentro->cerrar();

        redirect(crearUrl("localizacion", "centro", "Consulta"));
    }

    function detalle($parametros = false) {
        $objCentro = new centromodel();
        $id = $parametros[1];
        
        $sql="SELECT * FROM (pag_centro,pag_regional) WHERE pag_centro.reg_id=pag_regional.reg_id AND pag_centro.cen_id=$id;";

        //$sql = "SELECT * FROM pag_centro WHERE cen_id=$id";
        $centro = $objCentro->find($sql);
        



        // Cierra la conexion
        $objCentro->cerrar();

        include_once("../view/Localizacion/centro/detalle.html.php");
    }
    
    function Consulta(){
     
      include_once("../view/Localizacion/centro/consulta.html.php");
        
        
        
    }
    function buscarAjax()
    {
      $objCentro = new Centromodel();

      $centro = $_POST['busquedacentro'];

     // $sql="SELECT * FROM pag_centro WHERE cen_nombre LIKE '%".$centro."%' or cen_id LIKE '%".$centro."%'";
       $sql="SELECT * FROM pag_centro WHERE estado IS NULL  AND (cen_nombre LIKE '%".$centro."%' or cen_id LIKE '%".$centro."%')";
     
      
      $centros= $objCentro->select($sql);
   

      $objCentro->cerrar();

      include_once("../view/Localizacion/centro/listar.html.php");
    }
}

