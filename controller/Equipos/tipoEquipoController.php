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
        include_once("../view/Equipos/tipoEquipo/consultar.html.php");
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

    function postEditar() {
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

    function detalle($parametros = false) {
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

    public function buscarAjax() {
        $objTipoEquipo = new TipoEquipoModel();

        $tipoEquipo = $_POST['tipoEquipo_id'];

        $sql = "SELECT * FROM pag_tipo_equipo WHERE tequi_descripcion LIKE '%" . $tipoEquipo . "%' or tequi_descripcion LIKE '%" . $tipoEquipo . "%' ORDER BY tequi_id ASC ";
        $consultaCampoAjax = $objTipoEquipo->select($sql);

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'tipoEquipo', 'listar');

        $paginado = new Paginado($consultaCampoAjax, $pagina, $url);

        $consultaCampoAjax = $paginado->getDatos();

        $objTipoEquipo->cerrar();

        include_once("../view/Equipos/tipoEquipo/listar.html.php");
    }

    
    public function buscarAjaxCampoPersonalizado() {
        $objTipoEquipo = new TipoEquipoModel();

        $tipoEquipo = $_POST['tipoEquipo_id'];

        $sql = "SELECT * FROM pag_campos_personalizados WHERE cp_nombre LIKE '%" . $tipoEquipo . "%' or cp_id LIKE '%" . $tipoEquipo . "%' ORDER BY cp_nombre ASC ";
        $consultaCampoAjax = $objTipoEquipo->select($sql);

//        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'tipoEquipo', 'crear');

        $paginado = new Paginado($consultaCampoAjax, $pagina, $url);

        $consultaCampoAjax = $paginado->getDatos();

        $objTipoEquipo->cerrar();

        include_once("../view/Equipos/tipoEquipo/listarCamposPersonalizados.html.php");
    }

}
