<?php

include_once('../model/localizacion/CentroModel.php');

class centroController {

    function editar($parametros = false) {
        $objCentro = new centroModel();

        $id = $parametros[1];
        $sql="select * from pag_centro WHERE cen_id=$id";

       /* $sql = "SELECT pag_centro.cen_id,pag_centro.cen_nombre,pag_centro.cen_dir"
                . "pag_centro.cen_telefono,pag_regional.reg_nombre,pag_departamento."
                . "dept_nombre,pag_ciudad.ciud_nombre from"
                . " pag_centro,pag_regional,pag_departamento,pag_ciudad "
                . "WHERE cen_id =$id and pag_centro.reg_id=pag_regional.reg_id and"
                . " pag_centro.dept_id=pag_departamento.dept_id"
                . " and pag_centro.ciud_id=pag_ciudad.ciud_id";

        */

        
        $centro = $objCentro->find($sql);
        $objRegionales = new centroModel();

        $sql2 = "SELECT * FROM pag_regional";
        $regionales = $objRegionales->select($sql2);
        
        $objDepartamentos = new centroModel();

        $sql3 = "SELECT * FROM pag_departamento";
        $departamentos = $objDepartamentos->select($sql3);

       
        
        $objCiudades = new centroModel();

        $sql4 = "SELECT * FROM pag_ciudad";
        $ciudades = $objCiudades->select($sql4);

        // Cierra la conexion
        
         // Cierra la conexion
        $objDepartamentos->cerrar();
        $objCiudades->cerrar();
        

        // Cierra la conexion
        $objRegionales->cerrar();
        

        // Cierra la conexion
        $objCentro->cerrar();

        include_once("../view/localizacion/centro/editar.html.php");
    }

    function postEditar() {

        $cen_id = $_POST['cen_id'];
        $cen_nombre = $_POST['cen_nombre'];
        $cen_dir = $_POST['cen_dir'];
        $cen_telefono = $_POST['cen_telefono'];
        $reg_id = $_POST['reg_id'];
        $dept_id = $_POST['dept_id'];
        $ciud_id = $_POST['ciud_id'];
        $objCentro = new centroModel();


        $sql = "UPDATE "
                . "pag_centro "
                . "SET "
                . "cen_nombre='$cen_nombre', cen_dir='$cen_dir', cen_telefono='$cen_telefono',reg_id='$reg_id',dept_id='$dept_id',ciud_id='$ciud_id'"
                . " WHERE cen_id=$cen_id";
        //die(print_r($sql));
        $respuesta = $objCentro->update($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objCentro->cerrar();

        redirect(crearUrl("Localizacion", "centro", "listar"));
    }

    function listar() {
        $objCentros = new centroModel();

        $sql = "SELECT * FROM pag_centro WHERE estado IS NULL";

        $centros = $objCentros->select($sql);

        // Cierra la conexion
        $objCentros->cerrar();

        include_once("../view/Localizacion/centro/listar.html.php");
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
        include_once("../view/localizacion/centro/crear.html.php");
    }

    function postCrear() {
        $cod_centro = $_POST['cen_cod'];
        $nom_centro = $_POST['cen_nom'];
        
        $cen_dir = $_POST['cen_dir'];
        $cen_telefono = $_POST['cen_telefono'];
        $cen_telefono = $_POST['cen_telefono'];
         $reg_id = $_POST['reg_id'];
          $dept_id = $_POST['dept_id'];
           $ciud_id = $_POST['ciud_id'];
        
        
       
        


        $insertCentro = "INSERT INTO pag_centro (cen_id,cen_nombre,cen_dir,cen_telefono,reg_id,dept_id,ciud_id) VALUES('$cod_centro','$nom_centro','$cen_dir','$cen_telefono','$reg_id','$dept_id','$ciud_id')";

        $objCentro = new centroModel();

        $insertar = $objCentro->insertar($insertCentro);

        // Cierra la conexion
        $objCentro->cerrar();

        redirect(crearUrl("localizacion", "centro", "listar"));
    }

    function eliminar($parametros) {
        $objCentro = new centroModel();

        $id = $parametros[1];

        $sql = "select * from pag_centro WHERE cen_id=$id";

        $centro = $objCentro->find($sql);

        // Cierra la conexion
        $objCentro->cerrar();

        include_once("../view/Localizacion/centro/eliminar.html.php");
    }

    function postEliminar() {

        $id = $_POST['id'];

        $objCentro = new centroModel();

        $sql = "update pag_centro set estado=NOW() WHERE cen_id=$id";

        $respuesta = $objCentro->delete($sql);

        // Cierra la conexion
        $objCentro->cerrar();

        redirect(crearUrl("Localizacion", "centro", "listar"));
    }

    function detalle($parametros = false) {
        $objCentro = new centromodel();
        $id = $parametros[1];
        
$sql="SELECT pag_centro.cen_id, pag_centro.cen_nombre, pag_centro.cen_dir, pag_centro.cen_telefono, pag_regional.reg_nombre, pag_ciudad.ciud_nom, pag_departamento.dept_nombre FROM (pag_centro, pag_ciudad, pag_regional, pag_departamento) WHERE pag_centro.reg_id=pag_regional.reg_id AND pag_centro.ciud_id=pag_ciudad.ciud_id AND pag_centro.dept_id=pag_departamento.dept_id AND pag_centro.cen_id=$id;";

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

      include_once("../view/Localizacion/centro/listar2.html.php");
    }
}

