<?php

include_once('../model/Prestamo/PrestamoModel.php');
include_once('../model/Herramientas/HerramientasModel.php');
include_once('../model/Usuarios/PersonasModel.php');

class PrestamoController {

    function crear() {
        $per_id = $_SESSION['login']['per_id'];
//        dd($per_id);
        //aqui empieza el select para la jornada
        $objJornada = new PersonasModel();

        $sql = "SELECT * FROM pag_jornada";

        $jornada = $objJornada->select($sql);

        $objJornada->cerrar();
        include_once("../view/Prestamo/prestamo/crear.html.php");
    }

    function postCrear() {
        // estos son los pos que llegan de los formularios.
//        dd($_POST);
        $pher_fecha = $_POST['pher_fecha'];
        $jor_id = $_POST['jor_id'];
        $pher_observaciones = $_POST['pher_observaciones'];
        $herramientas = $_POST['herramientasDetalle'];
        //dd($herramientas);

        $objPrestamo = new PrestamoModel();

        explodeFecha($pher_fecha);
        $fecha = getFecha();

        $insertPrestamo = "INSERT INTO pag_prestamo_herramienta "
                . "(pher_fecha,jor_id,pher_observaciones)"
                . " VALUES('$fecha','$jor_id','$pher_observaciones')";

        //        //aqui empieza el insert a la tabla detalle del prestamo (pag_det_prestamo_herramienta)
        $insertar = $objPrestamo->insertar($insertPrestamo);
        $sql = "select MAX(pher_id) as pher_id from pag_prestamo_herramienta";
        $pher_id = $objPrestamo->select($sql);

//        echo ($pher_id[0]['pher_id']);
        if ($insertPrestamo) {
            foreach ($herramientas as $herramienta) {
                $insertDetalleprestamo = "INSERT INTO pag_det_prestamo_herramienta "
                        . "(pher_id,her_id,detph_cant_solicita,detph_cant_entrega,est_id,detph_observacion) "
                        . "VALUES(" . $pher_id[0]['pher_id'] . ",'" . $herramienta['her_id'] . "'," . $herramienta['cantidad_solicitada'] . "," . $herramienta['cantidad_entregada'] . ",1,'" . $herramienta['observaciones'] . "')";
                $insertar = $objPrestamo->insertar($insertDetalleprestamo);
            }
            //die();
//        dd($insertPrestamo);
            // Cierra la conexion   
            $objPrestamo->cerrar();
        }

        redirect(crearUrl("prestamo", "prestamo", "listar"));
    }

    function listar() {
        $objPrestamo = new PrestamoModel();

        $sql = "SELECT pher_id,pher_fecha,jor_descripcion,pher_observaciones from pag_prestamo_herramienta,pag_jornada"
                . " where pag_prestamo_herramienta.jor_id=pag_jornada.jor_id";
        $listar = $objPrestamo->select($sql);

        //aqui empieza el paginado
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('prestamo', 'prestamo', 'listar');

        $paginado = new Paginado($listar, $pagina, $url);

        $listar = $paginado->getDatos();
//        // fin paginado
        // Cierra la conexion
        $objPrestamo->cerrar();

        include_once("../view/Prestamo/prestamo/listar.html.php");
    }

    function editar($parametros = false) {
        $objPrestamo = new PrestamoModel();
        $id = $parametros[1];
        $sql = "SELECT pher_id,pher_fecha,pher_observaciones,jor_id FROM pag_prestamo_herramienta WHERE pher_id='$id'";
        $prestamo = $objPrestamo->find($sql);
        // Cierra la conexion
        $objPrestamo->cerrar();
        include_once("../view/Prestamo/prestamo/editar.html.php");
    }

    function postEditar() {
        $objPrestamo = new PrestamoModel();
        $pher_id = $_POST['id'];
        $pher_fecha = $_POST['pher_fecha'];
        $jor_id = $_POST['jor_id'];
        $pher_observaciones = $_POST['pher_observaciones'];

        $sql = "UPDATE "
                . "pag_prestamo_herramienta "
                . "SET "
                . "pher_fecha='$pher_fecha', "
                . "pher_fecha='$jor_id', "
                . "pher_observaciones=$pher_observaciones, "
                . "WHERE pher_id=$pher_id";

        $respuesta = $objPrestamo->update($sql);
        // Cierra la conexion
        $objPrestamo->cerrar();

        redirect(crearUrl("prestamo", "prestamo", "listar"));
    }

    function eliminar($parametros) {
        $objPrestamo = new HerramientasModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_prestamo_herramienta WHERE pher_id='$id'";
        $prestamo = $objPrestamo->find($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objPrestamo->cerrar();

        include_once("../view/Prestamo/prestamo/eliminar.html.php");
    }

    function postEliminar() {
        $id = $_POST['id'];
        $objPrestamo = new HerramientasModel();

        $sql = "UPDATE pag_prestamo_herramienta SET estado=1 WHERE pher_id='$id'";
        $prestamo = $objPrestamo->update($sql);
        // Cierra la conexion
        $objPrestamo->cerrar();
    }

    function validarHerramientaRepetida() {
//        echo "llega";
        $herramientas = $_POST['id'];

//        print_r($_POST);
    }

    function buscarHerramientas() {
//        dd($_POST);
        $objPrestamo = new PrestamoModel();
        $herramienta = $_POST['buscarHerramienta'];

        $sql = "SELECT * FROM pag_herramienta WHERE her_id LIKE '%" . $herramienta . "%' or her_nombre LIKE '%" . $herramienta . "%'";

        $listarHerramienta = $objPrestamo->select($sql);
//        dd($listarHerramienta);
        if (isset($_POST['id_herramienta'])) {
            $herramientasVista = $_POST['id_herramienta'];
            foreach ($listarHerramienta as $key => $herramientaBD) {
                foreach ($herramientasVista as $herramientaVista) {
                    if ($herramientaBD['her_id'] == $herramientaVista) {
                        unset($listarHerramienta[$key]);
                    }
                }
            }
        }
//                dd($_POST);

        $objPrestamo->cerrar();
        if (empty($listarHerramienta)) {
            echo "No se encontraron resultados";
        } else {
            include_once("../view/Prestamo/prestamo/listarHerramienta.html.php");
        }
    }

    function agregarHerramienta($parametros) {

        $objPrestamo = new HerramientasModel();

        $id = $parametros[1];
        $obser = $parametros[2];
        $cantS = $parametros[3];
        $cantE = $parametros[4];

        $sql = "SELECT * FROM  pag_herramienta WHERE her_id='$id'";
        $agregarHer = $objPrestamo->find($sql);
        // Cierra la conexion
        $objPrestamo->cerrar();

        include_once ("../view/Prestamo/prestamo/agregarHerramienta.html.php");
    }

}
