<?php

include_once '../model/Roles/rolesModel.php';

class RolesController {

    public function crear() {
        include_once ('../view/Usuarios/roles/crear.html.php');
    }

    public function postCrear() {

        $objRol = new rolesModel();

        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";

        if (!isset($_POST['rol_nombre']) or $_POST['rol_nombre'] == "") {
            $errores[] = "El campo rol no puede quedar vacio.";
        }

        if (!isset($_POST['rol_descripcion']) or $_POST['rol_descripcion'] == "") {
            $errores[] = "Por favor, el rol debe de tener una descripcion.";
        }

        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('roles', 'roles', 'crear'));
        } else {


            $rol_nombre = $_POST['rol_nombre'];
            $rol_descripcion = $_POST['rol_descripcion'];

            $sql = "INSERT INTO pag_rol (rol_nombre,rol_descripcion) VALUES ('$rol_nombre','$rol_descripcion')";
            //die(print_r($sqlRol));




            $crearRol = $objRol->insertar($sql);
            $objRol->cerrar();

            if ($crearRol) {
                redirect(crearUrl("roles", "roles", "listar"));
            } else {
                echo $sql;
            }
        }
    }

    public function listar() {

        $objRol = new rolesModel();
        $sqlBuscar = "SELECT * FROM pag_rol";

        $roles = $objRol->select($sqlBuscar);

        $pagina = (isset($_REQUEST['pagina'])?$_REQUEST['pagina']:1); 
        $url = crearUrl('roles', 'roles', 'listar');
        
        $paginado = new Paginado($roles, $pagina, $url);
        
        $roles = $paginado->getDatos();
        
        $objRol->cerrar();

        include_once("../view/Usuarios/roles/listar.html.php");
    }

    public function editar($parametros = false) {

        $objRol = new rolesModel();

        $id = $parametros[1];

        $sqlBuscar = "SELECT * FROM pag_rol WHERE rol_id=$id";
        $roles = $objRol->select($sqlBuscar);

        $objRol->cerrar();

        include_once("../view/Usuarios/roles/editar.html.php");
    }

    public function postEditar($parametros = false) {

        $objRol = new RolesModel();

        $id = $_POST['idRol'];
        $nombreRol = $_POST['nombreRol'];
        $rol_descripcion = $_POST['rol_descripcion'];


        $sql = "UPDATE pag_rol"
                . " SET rol_nombre='$nombreRol',"
                . "rol_descripcion='$rol_descripcion'"
                . " WHERE rol_id='$id'";
        //die(print_r($sql)); 
        $update = $objRol->update($sql);

        $objRol->cerrar();

        redirect(crearUrl("roles", "roles", "listar"));
    }

    public function verDetalle($parametros = false) {

        $objRol = new rolesModel();

        $id = $parametros[1];

        $sqlRol = "SELECT * FROM pag_rol Where rol_id=$id";
        $roles = $objRol->select($sqlRol);

        include_once("../view/Usuarios/roles/detalle.html.php");
    }

    public function postEliminar() {
        
        $objRol = new rolesModel();

        $id = $_POST['id'];


        $sql = "UPDATE pag_rol SET estado = NOW() WHERE rol_id='" . $id . "'";
        //die(print_r($sql));

        $respuesta = $objRol->update($sql);

        // Cierra la conexion
        $objRol->cerrar();

        redirect(crearUrl("roles", "roles", "listar"));
    }

}
