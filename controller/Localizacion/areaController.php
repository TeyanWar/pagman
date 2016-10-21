<?php

include_once('../model/Localizacion/areaModel.php');

class areaController {

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
        $objAreas = new areaModel();

        $sql = "SELECT * FROM pag_centro WHERE estado IS NULL";

        $areas = $objAreas->select($sql);

        // Cierra la conexion
        $objAreas->cerrar();

        include_once("../view/Localizacion/centro/listar.html.php");
    }



    function crear() {
        
        include_once("../view/Localizacion/area/crear.html.php");
    }

    function postCrear() {
        
        //--------------expresiones regulaes-----------
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $errores = array();

        //---------------validaciones-------------------

        if (!isset($_POST['area_nombre']) or $_POST['area_nombre'] == "") {
            $errores[] = '(*) El campo "Nombre Del Area" es obligatorio';
        }
        
        if(isset($_POST['area_nombre']) && !empty($_POST['area_nombre'])){
            if(!preg_match($patronLetras,$_POST['area_nombre'])){
                $errores[]="(*) En el campo 'Nombre Del Area' unicamente se permiten letras";
            }
        }

        
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            //----------------fin validaciones-----------------
        } else {
            $nom_area = $_POST['area_nombre'];
            $insertArea = "INSERT INTO pag_area (area_descripcion) 
            VALUES('$nom_area')";

            $objArea = new areaModel();

            $insertar = $objArea->insertar($insertArea);

            // Cierra la conexion
            $objArea->cerrar();
        }
        echo getRespuestaAccion('listar');
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

