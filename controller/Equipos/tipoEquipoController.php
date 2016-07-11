<?php

include_once('../model/Equipos/tipoEquipoModel.php');

class TipoEquipoController {
    
    function crear() {        
        include_once("../view/Equipos/tipoEquipo/crear.html.php");
    }
    
    function postCrear() {
        $tequi_descripcion = $_POST['tequi_descripcion'];
        
        $insertTipoEquipo = "INSERT INTO pag_tipo_de_equipo (tequi_descripcion) values ('$tequi_descripcion')";
        
        $objTipoEquipos = new TipoEquipoModel();
        $insertar = $objTipoEquipos->insertar($insertTipoEquipo);
        
        //cierre de la conexion
        $objTipoEquipos->cerrar();
        
        redirect(crearUrl("equipos", "tipoEquipo", "listar"));
    }
    
    function listar() {
        $objTipoEquipos = new TipoEquipoModel();

        //$sql = "SELECT * FROM pag_tipo_de_equipo WHERE estado = 0";
        $sql = "SELECT * FROM pag_tipo_de_equipo";
        $tEquipos = $objTipoEquipos->select($sql);

        // Cierra la conexion
        $objTipoEquipos->cerrar();

        include_once("../view/Equipos/tipoEquipo/listar.html.php");
    }
    
    function editar($parametros = false) {
        $objTipoEquipos = new TipoEquipoModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_tipo_de_equipo WHERE tequi_id='" . $id . "'";
        $tEquipo = $objTipoEquipos->find($sql);

        // Cierra la conexion
        $objTipoEquipos->cerrar();

        include_once("../view/Equipos/tipoEquipo/editar.html.php");
    }
    
    function postEditar(){
        $tequi_id = $_POST['tequi_id'];
        $tequi_descripcion = $_POST['tequi_descripcion'];
        
        $objTipoEquipos = new TipoEquipoModel();
        
        $sql = "UPDATE "
                . "pag_tipo_de_equipo "
                . "SET "
                . "tequi_descripcion = '$tequi_descripcion' "
                . "WHERE tequi_id = $tequi_id";
        
        $respuesta = $objTipoEquipos->update($sql);
        
        // Cierra la conexion
        $objTipoEquipos->cerrar();
        
        redirect(crearUrl("equipos", "tipoEquipo", "listar"));        
    }
    
    function detalle($parametros = false){
        $objTipoEquipos = new TipoEquipoModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_tipo_de_equipo WHERE tequi_id='" . $id . "'";
        $tEquipo = $objTipoEquipos->find($sql);

        // Cierra la conexion
        $objTipoEquipos->cerrar();

        include_once("../view/Equipos/tipoEquipo/detalle.html.php");
    }
    
    function postEliminar() {
        $objTipoEquipos = new TipoEquipoModel();

        $id = $_POST['id'];

        $sql = "UPDATE pag_tipo_de_equipo SET estado = 1 WHERE equi_id='" . $id . "'";
        //die(print_r($sql));

        $respuesta = $objTipoEquipos->update($sql);

        // Cierra la conexion
        $objTipoEquipos->cerrar();

        redirect(crearUrl("equipos", "equipos", "listar"));

    }
    
}
