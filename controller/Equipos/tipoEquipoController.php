<?php

include_once('../model/Equipos/tipoEquipoModel.php');

class TipoEquipoController {

    function crear() {
        $objTipoEquipos = new TipoEquipoModel();

        $sql = "SELECT * FROM pag_campos_personalizados";
        $campoPer = $objTipoEquipos->select($sql);

        $objTipoEquipos->cerrar();
        include_once("../view/Equipos/tipoEquipo/crear.html.php");
    }

    function listar() {
        include_once("../view/Equipos/tipoEquipo/consultar.html.php");
    }

    function editar($parametros = false) {
        $objTipoEquipos = new TipoEquipoModel();

        $id = $parametros[1];

        $sqlEquipo = "SELECT * FROM pag_tipo_equipo WHERE tequi_id='$id'";
        $tEquipo = $objTipoEquipos->find($sqlEquipo);

        //die(print_r($id));
        $sqlCP = "SELECT * FROM pag_tipo_equipo,pag_campos_personalizados,pag_det_tipoEquipo_camposPersonalizados WHERE "
                . "pag_det_tipoEquipo_camposPersonalizados.tequi_id=pag_tipo_equipo.tequi_id AND "
                . "pag_det_tipoEquipo_camposPersonalizados.cp_id=pag_campos_personalizados.cp_id AND pag_det_tipoEquipo_camposPersonalizados.tequi_id='$id'";
        $sqlDetalle = $objTipoEquipos->select($sqlCP);

        // Cierra la conexion
        $objTipoEquipos->cerrar();

        include_once("../view/Equipos/tipoEquipo/editar.html.php");
    }

    function postEditar() {

        //  die(print_r($_POST['tequi_id']));

        $tequi_id = $_POST['tequi_id'];
        $tequi_descripcion = $_POST['tipoEquipoNombre'];

        //die(print_r($tequi_descripcion ));
        $objTipoEquipos = new TipoEquipoModel();

        $sql = "UPDATE "
                . "pag_tipo_equipo "
                . "SET "
                . "tequi_descripcion = '$tequi_descripcion' "
                . "WHERE tequi_id = '$tequi_id'";
        //die(print_r($sql));
        $respuesta = $objTipoEquipos->update($sql);

        // Cierra la conexion
        $objTipoEquipos->cerrar();

        redirect(crearUrl("equipos", "tipoEquipo", "listar"));
    }

    function verDetalle($parametros = false) {
        $objTipoEquipos = new TipoEquipoModel();


        $id = $parametros[1];

        $sqlEquipo = "SELECT * FROM pag_tipo_equipo WHERE tequi_id='$id'";
        $tEquipo = $objTipoEquipos->find($sqlEquipo);

        //die(print_r($id));
        $sqlCP = "SELECT * FROM pag_tipo_equipo,pag_campos_personalizados,pag_det_tipoEquipo_camposPersonalizados WHERE "
                . "pag_det_tipoEquipo_camposPersonalizados.tequi_id=pag_tipo_equipo.tequi_id AND "
                . "pag_det_tipoEquipo_camposPersonalizados.cp_id=pag_campos_personalizados.cp_id AND pag_det_tipoEquipo_camposPersonalizados.tequi_id='$id'";
        $sqlDetalle = $objTipoEquipos->select($sqlCP);


        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'tipoEquipo', 'verDetalle', array('noVista', $id));

        $paginado = new Paginado($sqlDetalle, $pagina, $url, 3);
        $sqlDetalle = $paginado->getDatos();

        // Cierra la conexion
        $objTipoEquipos->cerrar();

        include_once("../view/Equipos/tipoEquipo/detalle.html.php");
    }

    function postEliminar() {
        $id = $_POST['id'];
        //die(print_r($id));

        $objTipoEquipo = new TipoEquipoModel();


        $sql = "UPDATE pag_tipo_equipo SET estado=false WHERE tequi_id='$id'";
        $campos = $objTipoEquipo->update($sql);
        // Cierra la conexion
        $objTipoEquipo->cerrar();
    }

    public function buscarAjax() {
        $objTipoEquipo = new TipoEquipoModel();

        $tipoEquipo = $_POST['tipoEquipo_id'];

        $sql = "SELECT * FROM pag_tipo_equipo WHERE tequi_descripcion LIKE '%" . $tipoEquipo . "%' or tequi_id LIKE '%" . $tipoEquipo . "%'  ORDER BY tequi_descripcion ASC";
        $consultaCampoAjax = $objTipoEquipo->select($sql);

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'tipoEquipo', 'listar');

        $paginado = new Paginado($consultaCampoAjax, $pagina, $url);

        $consultaCampoAjax = $paginado->getDatos();

        $objTipoEquipo->cerrar();

        include_once("../view/Equipos/tipoEquipo/listar.html.php");
    }

    public function ajaxAgregarCampoPersonalizado() {

        $idCampoPer = $_POST['ids'];

        $camposPersonalizados = array();
        $objTipoEquipo = new TipoEquipoModel();

        $sql = "SELECT * FROM pag_campos_personalizados WHERE cp_id = '$idCampoPer'";
        $camposPersonalizados = $objTipoEquipo->select($sql);

        $objTipoEquipo->cerrar();
        include_once '../view/Equipos/tipoEquipo/ajaxAgregarCampoPersonalizado.html.php';
    }

    public function ajaxListarCampoPersonalizado() {
        $objTipoEquipo = New TipoEquipoModel();

        $cp_id = $_POST['cp_id'];
        $cp_nombre = $_POST['cp_nombre'];
        $cantidad = $_POST['cantidad'];
        //die(print_r($cantidadCampo));
        $consecutivo = $_POST['consecutivo'];

        //die(print_r($consecutivo));

        include_once '../view/Equipos/tipoEquipo/ajaxListarCamposPersonalizados.html.php';
    }

    public function ajaxGuardarCampoPersonalizado() {
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros = "/^[0-9a-zA-Z]+$/";
        $patronLetrasNumerosGuiones = "/^[0-9a-zA-Z(-_)-áéíóúñ\s]+$/";
        $patronFecha = "/^[0-9( )a-zA-Z(,)0-9]+$/";

        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";


        $sql = "SELECT * FROM pag_tipo_equipo";
        $objTipoEquipo = new TipoEquipoModel();

        $consulta = $objTipoEquipo->select($sql);

        $objTipoEquipo->cerrar();

        foreach ($consulta as $campoId) {
            if ($_POST['id_tipo_Equipo'] == $campoId['tequi_id']) {
                $errores[] = "¡ERROR! El identificador de tipo de equipo <code>" . $campoId['tequi_id'] . "</code> se encuentra registrado";
            }
        }

        if (!isset($_POST['camposPersonalizados']) or $_POST['camposPersonalizados'] == "") {
            $errores[] = "Por favor, debe de <code>agregar al menos un Campo personalizado</code> a este Tipo de equipo";
        }

        if (!isset($_POST['id_tipo_Equipo']) or $_POST['id_tipo_Equipo'] == "") {
            $errores[] = "El campo <code><b>Equipo</code></b> no puede estar vac&iacute;o";
        }

        $id_tipo_Equipo = $_POST['id_tipo_Equipo'];
        //DIE(PRINT_R($id_tipo_Equipo)); 
        $tipo_Equipo = $_POST['tequi_descripcion'];
        $id_campo = $_POST['camposPersonalizados'];
        //die(print_r($tipo_Equipo));
        //die(print_r($id_campo));
        $objTipoEquipo = New TipoEquipoModel();

        $sql = "INSERT INTO pag_tipo_equipo (tequi_id,tequi_descripcion,estado)VALUES('$id_tipo_Equipo','$tipo_Equipo',NULL)";
        $objTipoEquipo = New TipoEquipoModel();
        $insert = $objTipoEquipo->insertar($sql);

        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('Equipos', 'tipoEquipo', 'crear'));
        }
        //DIE(PRINT_R($sql)); 
        foreach ($id_campo as $campo) {
            $id_tipo_Equipo = $_POST['id_tipo_Equipo'];
            //DIE(PRINT_R($tipo_Equipo)); 
            $sqlDetalle = "INSERT INTO pag_det_tipoEquipo_camposPersonalizados("
                    . "tequi_id,"
                    . "cp_id,"
                    . "cantidad) VALUES("
                    . "'$id_tipo_Equipo',"
                    . "'$campo[cp_id]',"
                    . "'$campo[cantidad]')";
            $insertCampo = $objTipoEquipo->insertar($sqlDetalle);
        }

        $objTipoEquipo->cerrar();
        redirect(crearUrl('Equipos', 'tipoEquipo', 'listar'));
    }

}
