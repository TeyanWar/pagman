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
        //die(print_r($id));
        $sql = "SELECT * FROM pag_tipo_equipo WHERE tequi_id='".$id."'";
        //die(print_r($sql));
        $tEquipo = $objTipoEquipos->find($sql);
        
        $sqlCP = "select * from pag_campos_personalizados WHERE ";
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

    function verDetalle($parametros = false) {
        $objTipoEquipos = new TipoEquipoModel();

        $id = $parametros[1];

        $sqlEquipo = "SELECT * FROM pag_tipo_equipo WHERE tequi_id='" . $id . "'";
        $consultaEquipo = $objTipoEquipos->find($sqlEquipo);


//die(print_r($id));
        $sql = "SELECT * FROM pag_tipo_equipo,pag_detalle_tipoEquipo_campoPersonalizado,pag_campos_personalizados "
                . "WHERE pag_detalle_tipoEquipo_campoPersonalizado.cp_id=pag_campos_personalizados.cp_id AND "
                . "pag_detalle_tipoEquipo_campoPersonalizado.tequi_id=pag_tipo_equipo.tequi_id AND "
                . "pag_detalle_tipoEquipo_campoPersonalizado.tequi_id='$id'";
        $consulta = $objTipoEquipos->select($sql);

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


        $sql = "SELECT * FROM pag_tipo_equipo WHERE tequi_id='" . $_POST['id_tipo_Equipo'] . "'";
        $objTipoEquipo = new TipoEquipoModel();

        $consulta = $objTipoEquipo->select($sql);

        $objTipoEquipo->cerrar();

        foreach ($consulta as $campoId) {
            if ($_POST['id_tipo_Equipo'] = $campoId['tequi_id']) {
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

        $sql = "INSERT INTO pag_tipo_equipo (tequi_id,tequi_descripcion)VALUES('$id_tipo_Equipo','$tipo_Equipo')";
        $objTipoEquipo = New TipoEquipoModel();
        $insert = $objTipoEquipo->insertar($sql);

        if (count($errores) > 0) {
            setErrores($errores);
        } else {

            //DIE(PRINT_R($sql)); 
            if ($insert == true) {
                foreach ($id_campo as $campo) {
                    $sqlDetalle = "INSERT INTO pag_detalle_tipoEquipo_campoPersonalizado ("
                            . "tequi_id,"
                            . "cp_id) VALUES("
                            . "'$id_tipo_Equipo',"
                            . "'$campo[cp_id]')";

                    $insertCampo = $objTipoEquipo->insertar($sqlDetalle);
                }
//            if ($insertCampo = true) {
//                DIE(print_r("INSERTO DETALLE"));
//            }
            }
            $objTipoEquipo->cerrar();
        }


        redirect(crearUrl('Equipos', 'tipoEquipo', 'crear'));
    }

}
