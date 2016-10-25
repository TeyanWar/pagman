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

         //--------------expresiones regulaes-----------
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $patronNumeros = "/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $errores = array();

        //---------------validaciones-------------------
        if(!isset($_POST['area_id']) or ($_POST['area_id']=="")){
            $errores[]="(*) El Id es Obligatorio";
        }
        if(isset($_POST['area_id']) && !empty($_POST['area_id'])){
            if(!preg_match($patronNumeros, $_POST['area_id'])){
                $errores[] = '(*) El ID solo puede ser numerico';
            }
        }
        
        if (!isset($_POST['area_nombre']) or $_POST['area_nombre'] == "") {
            $errores[] = '(*) El campo <code><strong>"Nombre Del Area"</code></strong> es obligatorio';
        }
        
        if(isset($_POST['area_nombre']) && !empty($_POST['area_nombre'])){
            if(!preg_match($patronLetras,$_POST['area_nombre'])){
                $errores[]="(*) En el campo <code><strong>'Nombre Del Area'</code></strong> unicamente se permiten letras";
            }
        }
        
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            //----------------fin validaciones-----------------
        } else {
            $nom_area = $_POST['area_nombre'];
            $id=$_POST['area_id'];
            $objArea=new AreaModel();
            
            $sql="Update Pag_area set area_descripcion='$nom_area' where area_id=$id";
            
            $area = $objArea->update($sql);
        }
        echo getRespuestaAccion('consultar');
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
        $objArea = new areaModel();

        $id = $parametros[1];

        $sql = "update pag_area set estado=NOW() WHERE area_id=$id";

        $area = $objArea->find($sql);

        // Cierra la conexion
        $objArea->cerrar();

        redirect(crearUrl("localizacion", "area", "Consulta"));
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

