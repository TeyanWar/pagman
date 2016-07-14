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

        $rol_id = $parametros[1];

        $sqlBuscar = "SELECT * FROM pag_rol WHERE rol_id=$rol_id";
        $roles = $objRol->select($sqlBuscar);
        
        //Obtener funciones, y compararla con los permisos para checkear
        $funciones=$objRol->select("SELECT cont_id,func_id,func_display FROM pag_funcion");
        $permisos=$objRol->select("SELECT func_id FROM pag_permisos WHERE rol_id=$rol_id");
        foreach($funciones as $key=>$funcion){
            $funciones[$key]['checkeado']='';
            foreach($permisos as $permiso){
                if($funcion['func_id']==$permiso['func_id']){
                    $funciones[$key]['checkeado']='checked';
                    break;
                }
            }
        }//foreach
        //Obtener controladores y módulos
        $controladores=$objRol->select("SELECT mod_id, cont_id, cont_display FROM pag_controlador");
        $modulos=$objRol->select("SELECT mod_id,mod_nombre FROM pag_modulo");
        
        //Inicio modificación de vector módulos
            //Añadir a cada controlador sus respectivas funciones
            foreach($controladores as $key=>$controlador){
                foreach($funciones as $funcion){
                    if($controlador['cont_id']==$funcion['cont_id']){
                        $controladores[$key]['funciones'][]=$funcion;
                    }
                }
            }
            //Añadir a cada módulo sus respectivos controladores
            foreach($modulos as $key=>$modulo){
                foreach($controladores as $controlador){
                    if($modulo['mod_id']==$controlador['mod_id']){
                        $modulos[$key]['controladores'][]=$controlador;
                    }
                }
            }
        //Fin vector maestro
        
        $objRol->cerrar();

        include_once("../view/Usuarios/roles/editar.html.php");
    }

    public function postEditar($parametros = false) {

        $objRol = new RolesModel();

        $rol_id = $_POST['rol_id'];
        $nombreRol = $_POST['rol_nombre'];
        $rol_descripcion = $_POST['rol_descripcion'];
        $funciones = $_POST['funciones'];
        
        //Eliminar los permisos que antes tenía para insertar los nuevos
        $objRol->delete("DELETE FROM pag_permisos WHERE rol_id=".$rol_id);
        
        foreach ($funciones as $func_id) {
            $sqlPermisos = "INSERT INTO pag_permisos (func_id,rol_id)VALUES($func_id,$rol_id)";
            $sqlInsertar = $objRol->insertar($sqlPermisos);
        }
        
        $sql = "UPDATE pag_rol  SET rol_nombre='$nombreRol', rol_descripcion='$rol_descripcion'"
                . " WHERE rol_id=".$rol_id;
        
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
