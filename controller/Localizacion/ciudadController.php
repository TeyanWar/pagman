<?php

include_once('../model/Localizacion/ciudadModel.php');

class CiudadController {

    function editar($parametros = false) {

        $objCiudad = new CiudadModel();

        $id = $parametros[1];

        $sql = "select pag_ciudad.ciud_id,pag_ciudad.ciud_nombre,pag_departamento.dept_id
       ,dept_nombre from "
                . "pag_ciudad,pag_departamento WHERE ciud_id = $id and"
                . " pag_ciudad.dept_id = pag_departamento.dept_id";

        $ciudades = $objCiudad->find($sql);
        //die(print_r($sql));

        $objDepartamento = new CiudadModel();

        $sql2 = "SELECT * FROM pag_departamento";

        $departamentos = $objDepartamento->select($sql2);

        // Cierra la conexion

        $objDepartamento->cerrar();
        $objCiudad->cerrar();

        include_once("../view/Localizacion/ciudad/editar.html.php");
    }

    function postEditar() {

        $ciud_nom = $_POST['ciud_nombre'];
        $dept_id = $_POST['dept_id'];
        $ciud_id = $_POST['ciud_id'];

        $objCiudad = new CiudadModel();

        $sql = "UPDATE "
                . "pag_ciudad "
                . "SET "
                . "ciud_nombre='$ciud_nom', "
                . "dept_id=$dept_id "
                . "WHERE ciud_id=$ciud_id";

        $respuesta = $objCiudad->update($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objCiudad->cerrar();

        redirect(crearUrl("localizacion", "ciudad", "Consulta"));
    }

    function listar() {
        include_once("../view/Localizacion/ciudad/consultar.html.php");
    }

    function crear() {

        $objDepartamento = new CiudadModel();

        $sql2 = "SELECT * FROM pag_departamento";
        $departamentos = $objDepartamento->select($sql2);

        // select departamento
//        
//        $objCiudad= new CiudadModel();
//        $sql="SELECT * FROM pag_ciudad" ;
//        $ciudades= $objCiudad->select($sql);
//        
        // Cierra la conexion
//        $objCiudad->cerrar();
        $objDepartamento->cerrar();

        include_once("../view/Localizacion/ciudad/crear.html.php");
    }

    function postCrear() {

        //--------------expresiones regulaes-----------
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $errores = array();

        //---------------validaciones-------------------
        if (!isset($_POST['ciud_nombre']) or $_POST['ciud_nombre'] == "") {
            $errores[] = '(*) El campo "Nombre De La Ciudad" es obligatorio';
        }

        if (isset($_POST['ciud_nombre']) && !preg_match($patronLetras, $_POST['ciud_nombre'])) {
            $errores[] = '(*) El campo "Nombre De La Ciudad" debe contener letras unicamente';
        }

        if (!isset($_POST['dept_id']) or $_POST['dept_id'] == "") {
            $errores[] = '(*) El campo "Departamento" es obligatorio';
        }

        $sql = "SELECT ciud_nombre FROM pag_ciudad WHERE ciud_nombre ='" . $_POST['ciud_nombre'] . "'";
        //die(print_r($sql));
        $objCiudad = new CiudadModel();

        $consultar = $objCiudad->select($sql);
        //die(print_r($consultar));
        $objCiudad->cerrar();

        foreach ($consultar as $ciudad) {
            if ($_POST['ciud_nombre'] = $ciudad) {
                $errores[] = "La ciudad <code>" . $ciudad['ciud_nombre'] . "</code> ya se encuentra registrada.";
            }
        }
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl("localizacion", "ciudad", "crear"));
            //----------------fin validaciones-----------------
        } else {
            $ciud_nombre = $_POST['ciud_nombre'];
            $dept_id = $_POST['dept_id'];

            $insertCiudad = "INSERT INTO pag_ciudad (ciud_nombre,dept_id)"
                    . " VALUES('$ciud_nombre',$dept_id)";

            $objCiudad = new CiudadModel();

            $insertar = $objCiudad->insertar($insertCiudad);

            // Cierra la conexion
            $objCiudad->cerrar();

            redirect(crearUrl("localizacion", "ciudad", "listar"));
        }
    }
//
//    function eliminar($parametros) {
//        $objCiudad = new CiudadModel();
//
//        $id = $parametros[1];
//
//        $sql = "SELECT * FROM pag_ciudad WHERE ciud_id=$id";
//        $ciudad = $objCiudad->find($sql);
//
//        // Cierra la conexion
//        $objCiudad->cerrar();
//
//        include_once("../view/Localizacion/ciudad/eliminar.html.php");
//    }
//
//    function postEliminar() {
//        $objCiudad = new CiudadModel();
//
//        $id = $_POST['id'];
//
//
//        $sql = "UPDATE pag_ciudad SET estado= NOW() WHERE ciud_id=$id";
//        //die(print_r($sql));
//
//        $respuesta = $objCiudad->update($sql);
//
//        // Cierra la conexion
//        $objCiudad->cerrar();
//    }

    function detalle($parametros = false) {
        $objCiudad = new CiudadModel();
        $id = $parametros[1];
        
        $sql = "SELECT * FROM pag_ciudad,pag_departamento WHERE pag_ciudad.dept_id=pag_departamento.dept_id AND pag_ciudad.ciud_id=$id";
        $ciudades = $objCiudad->find($sql);

        // Cierra la conexion
        $objCiudad->cerrar();

        include_once("../view/Localizacion/ciudad/detalle.html.php");
    }

    function Consulta() {
        include_once("../view/Localizacion/ciudad/consultar.html.php");
    }

    function buscarAjax() {
        $objCiudad = new CiudadModel();

        $ciudad = $_POST['busquedaciudad'];

        $sql = "SELECT * FROM pag_ciudad WHERE estado IS NULL  AND (ciud_nombre LIKE '%" . $ciudad . "%' or ciud_id LIKE '%" . $ciudad . "%') ORDER BY ciud_nombre ASC";
        $ciudades = $objCiudad->select($sql);
        

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('Localizacion', 'ciudad', 'listar');

        $paginado = new Paginado($ciudades, $pagina, $url);

        $ciudades = $paginado->getDatos();

        $objCiudad->cerrar();

        include_once("../view/Localizacion/ciudad/listar.html.php");
    }

}
