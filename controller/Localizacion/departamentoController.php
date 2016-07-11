<?php

include_once('../model/Localizacion/departamentoModel.php');

class DepartamentoController {

    function editar($parametros = false) {
        $objDepartamento = new DepartamentoModel();

        $id = $parametros[1];

        $sql = "select pag_departamento.dept_id, pag_departamento.dept_nombre, pag_regional.reg_nombre from "
                . "pag_departamento, pag_regional WHERE dept_id = $id and"
                . " pag_departamento.reg_id = pag_regional.reg_id";
        $departamentos = $objDepartamento->find($sql);
        //die(print_r($sql));
        $objRegional= new DepartamentoModel();
        $sql2="SELECT * FROM pag_regional WHERE estado IS NULL ";
        $regionales=$objRegional->select($sql2);
        
       


        // Cierra la conexion
    
        $objDepartamento->cerrar();
        $objRegional->cerrar();

        include_once("../view/Localizacion/departamento/editar.html.php");
    }

    function postEditar() {

        $dept_nombre = $_POST['dept_nombre'];
        $reg_id = $_POST['reg_id'];
        $dept_id = $_POST['dept_id'];

        $objDepartamento = new DepartamentoModel();

        $sql = "UPDATE "
                . "pag_departamento "
                . "SET "
                . "dept_nombre='$dept_nombre', "
                . "reg_id= $reg_id "
                . "WHERE dept_id=$dept_id";

        $respuesta = $objDepartamento->update($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objDepartamento->cerrar();

        redirect(crearUrl("localizacion", "departamento", "listar"));
    }

    function listar() {
        $objDepartamento = new DepartamentoModel();

        $sql = "SELECT * FROM pag_departamento WHERE estado IS NULL ";
        $departamentos = $objDepartamento->select($sql);

        // Cierra la conexion
        $objDepartamento->cerrar();

        include_once("../view/Localizacion/departamento/listar.html.php");
    }

    function crear() {

        $objDepartamento = new DepartamentoModel();

        $sql2 = "SELECT * FROM pag_departamento";
        $departamentos = $objDepartamento->select($sql2);

        // select departamento

        $objRegional = new DepartamentoModel();

        $sql = "SELECT * FROM pag_regional WHERE estado IS NULL ";
        $regionales = $objRegional->select($sql);


        // select Regional
        // Cierra la conexion
        $objRegional->cerrar();
        $objDepartamento->cerrar();



        include_once("../view/Localizacion/departamento/crear.html.php");
    }

    function postCrear() {

        $dept_nombre = $_POST['dept_nombre'];
        $reg_id = $_POST['reg_id'];


        $insertDepartamento = "INSERT INTO pag_departamento (dept_nombre,reg_id)"
                . " VALUES('$dept_nombre',$reg_id)";



        echo $insertDepartamento;

//       die(print_r($_POST));
        $objDepartamento = new DepartamentoModel();

        $insertar = $objDepartamento->insertar($insertDepartamento);

        // Cierra la conexion
        $objDepartamento->cerrar();

        redirect(crearUrl("localizacion", "departamento", "listar"));
    }

     function eliminar($parametros) {
        $objDepartamento = new DepartamentoModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_departamento WHERE dept_id=$id";
        $departamento = $objDepartamento->find($sql);

        // Cierra la conexion
        $objDepartamento->cerrar();

        include_once("../view/Localizacion/departamento/eliminar.html.php");
    }

    function postEliminar() {
        $objDepartamento = new DepartamentoModel();
        
        $id = $_POST['id'];


        $sql = "UPDATE pag_departamento SET estado= NOW() WHERE dept_id=$id";
        //die(print_r($sql));

        $respuesta = $objDepartamento->update($sql);

        // Cierra la conexion
        $objDepartamento->cerrar();

        redirect(crearUrl("localizacion", "departamento", "listar"));
    }

    function detalle($parametros = false) {
        $objDepartamento = new DepartamentoModel();
        $objRegional = new DepartamentoModel();
        $id = $parametros[1];


        $sql = "select pag_departamento.dept_id, pag_departamento.dept_nombre, pag_regional.reg_nombre from "
                . "pag_departamento, pag_regional WHERE dept_id = $id and"
                . " pag_departamento.reg_id = pag_regional.reg_id";
        $departamento = $objDepartamento->find($sql);



        // Cierra la conexion
        $objDepartamento->cerrar();

        include_once("../view/Localizacion/departamento/detalle.html.php");
    }
     function Consulta(){
         
         
         
         
      include_once("../view/Localizacion/departamento/consulta.html.php");
        
        
        
    }
    function buscarAjax()
    {
      $objdepartamento = new DepartamentoModel();

      $departamento = $_POST['busquedadepartamento'];

      $sql="SELECT * FROM pag_departamento WHERE estado IS NULL  AND (dept_nombre LIKE '%".$departamento."%' or dept_id LIKE '%".$departamento."%')";
      
     
      
      $departamentos = $objdepartamento->select($sql);
   

      $objdepartamento->cerrar();

      include_once("../view/Localizacion/departamento/listar2.html.php");
    }

}
