<?php

include_once('../model/Localizacion/departamentoModel.php');

class DepartamentoController {

    function editar($parametros = false) {
        $objDepartamento = new DepartamentoModel();

        $id = $parametros[1];

        $sql = "select pag_departamento.dept_id, pag_departamento.dept_nombre,pag_regional.reg_id,reg_nombre from "
                . "pag_departamento, pag_regional WHERE dept_id = $id and"
                . " pag_departamento.reg_id = pag_regional.reg_id";
        $departamentos = $objDepartamento->find($sql);
        //die(print_r($sql));
        $objRegional = new DepartamentoModel();
        $sql2 = "SELECT * FROM pag_regional WHERE estado IS NULL ";
        $regionales = $objRegional->select($sql2);

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
                . "dept_nombre='$dept_nombre' WHERE dept_id=$dept_id";

        $respuesta = $objDepartamento->update($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objDepartamento->cerrar();

        redirect(crearUrl("Localizacion", "departamento", "listar"));
    }

    function listar() {
        include_once("../view/Localizacion/departamento/consultar.html.php");
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

        //--------------expresiones regulaes-----------
        $patronLetras = "/^[a-zA-Z_,áéíóúñ\s]*$/";
        $errores = array();

        //---------------validaciones-------------------

        if (!isset($_POST['dept_nombre']) or $_POST['dept_nombre'] == "") {
            $errores[] = '(*) El campo "Nombre Del Departamento" es obligatorio';
        }

        if (isset($_POST['dept_nombre']) && !preg_match($patronLetras, $_POST['dept_nombre'])) {
            $errores[] = '(*) El campo "Nombre Del Departamento" debe contener letras unicamente';
        }

        if (!isset($_POST['reg_id']) or $_POST['reg_id'] == "") {
            $errores[] = '(*) El campo "Regional" es obligatorio';
        }


        $sql = "SELECT dept_nombre FROM pag_departamento WHERE dept_nombre ='" . $_POST['dept_nombre'] . "'";
        //die(print_r($sql));
        $objDepartamento = new DepartamentoModel();

        $consultar = $objDepartamento->select($sql);
        //die(print_r($consultar));
        $objDepartamento->cerrar();

        foreach ($consultar as $depto) {
            //die(print_r($depto));
            if ($_POST['dept_nombre'] = $depto['dept_nombre']) {
                //die(print_r($depto['dept_nombre']));
                $errores[] = '(*) El Departamento <code>' . $depto['dept_nombre'] . '</code> ya se encuentra registado';
            }
        }
        //----------------------------------------------
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl("localizacion", "departamento", "crear"));
            //----------------fin validaciones-----------------
        } else {
            $dept_nombre = $_POST['dept_nombre'];
            $reg_id = $_POST['reg_id'];

            $insertDepartamento = "INSERT INTO pag_departamento (dept_nombre,reg_id)"
                    . " VALUES('$dept_nombre',$reg_id)";

            $objDepartamento = new DepartamentoModel();

            $insertar = $objDepartamento->insertar($insertDepartamento);

            // Cierra la conexion
            $objDepartamento->cerrar();

            redirect(crearUrl("localizacion", "departamento", "listar"));
        }
    }

    function eliminar($parametros) {
        $objDepartamento = new DepartamentoModel();

        $id = $parametros[1];

        $sql = "UPDATE pag_departamento SET estado= NOW() WHERE dept_id=$id";
        $departamento = $objDepartamento->find($sql);

        // Cierra la conexion
        $objDepartamento->cerrar();
    }

    function detalle($parametros = false) {

        $objDepartamento = new DepartamentoModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_departamento,pag_regional WHERE pag_departamento.dept_id=$id";
        $departamento = $objDepartamento->find($sql);
        // Cierra la conexion
        $objDepartamento->cerrar();

        include_once("../view/Localizacion/departamento/detalle.html.php");
    }

    function buscarAjax() {
        $objdepartamento = new DepartamentoModel();

        $departamento = $_POST['busquedadepartamento'];

        $sql = "SELECT * FROM pag_departamento WHERE dept_nombre LIKE '%" . $departamento . "%' or dept_id LIKE '%" . $departamento . "%'  ORDER BY dept_nombre ASC";
        $departamentos = $objdepartamento->select($sql);

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('Localizacion', 'departamento', 'listar');

        $paginado = new Paginado($departamentos, $pagina, $url);

        $departamentos = $paginado->getDatos();

        $objdepartamento->cerrar();

        include_once("../view/Localizacion/departamento/listar.html.php");
    }

}
