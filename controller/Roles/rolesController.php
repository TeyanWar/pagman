<?php

include_once '../model/Roles/rolesModel.php';

class RolesController {

    public function crear() {
        include_once ('../view/Usuarios/roles/crear.html.php');
    }

    public function postCrear() {
        
        $rol_nombre = $_POST['rol_nombre'];
        $rol_descripcion = $_POST['rol_descripcion'];
        
        $sql = "INSERT INTO pag_rol (rol_nombre,rol_descripcion) VALUES ('$rol_nombre','$rol_descripcion')";
        //die(print_r($sqlRol));

        $objRol = new rolesModel();

        
        $crearRol = $objRol->insertar($sql);
        $objRol->cerrar();

        if ($crearRol) {
            redirect(crearUrl("roles", "roles", "listar"));
        }else{
            echo $sql;
        }
        
        
    }

    public function listar() {

        $objRol = new rolesModel();

        $sqlBuscar = "SELECT * FROM pag_rol";

        $roles = $objRol->select($sqlBuscar);

        $objRol->cerrar();

        include_once("../view/Usuarios/roles/listar.html.php");
    }

}
