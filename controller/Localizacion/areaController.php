<?php

include_once('../model/Localizacion/areaModel.php');

class areaController {

    function editar($parametros = false) {
        $objArea = new areaModel();

        $id = $parametros[1];

        $sql="select * from pag_area where area_id=$id";
        
        $area = $objArea->find($sql);
        
        $objArea->cerrar();

        include_once("../view/Localizacion/area/editar.html.php");
    }

    function postEditar() {

        $area_id = $_POST['area_id'];
        $area_descripcion = $_POST['area_descripcion'];
        $objArea = new areaModel();

        $sql = "UPDATE "
                . "pag_area "
                . "SET "
                . "area_descripcion='$area_descripcion'"
                . " WHERE area_id=$area_id";
        //die(print_r($sql));
        $respuesta = $objArea->update($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objArea->cerrar();

        redirect(crearUrl("Localizacion", "area", "Consultar"));
    }

    function listar() {
        include_once("../view/Localizacion/area/consultar.html.php");
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
    
    function Consultar(){
     
      include_once("../view/Localizacion/area/consultar.html.php");
        
        
        
    }
    function buscarAjax()
    {
      $objArea = new areaModel();

      $area = $_POST['area_id'];
     // $sql="SELECT * FROM pag_centro WHERE cen_nombre LIKE '%".$centro."%' or cen_id LIKE '%".$centro."%'";
       $sql="SELECT * FROM pag_area WHERE estado IS NULL  AND (area_descripcion LIKE '%".$area."%' or area_id LIKE '%".$area."%')";
     
      
      $areas= $objArea->select($sql);
   
        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('Localizacion', 'area', 'listar');

        $paginado = new Paginado($areas, $pagina, $url);

        $areas = $paginado->getDatos();

        $objArea->cerrar();

        include_once("../view/Localizacion/area/listar.html.php");
    }
}

