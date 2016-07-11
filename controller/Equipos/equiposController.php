<?php

include_once('../model/Equipos/equiposModel.php');

class EquiposController {

    function editar($parametros = false) {
        $objEquipos = new EquiposModel();
        $objPersona = new EquiposModel();
        $objEstado = new EquiposModel();
        $objCentro = new EquiposModel();
        $objArea = new EquiposModel();
        $objT_equipo = new EquiposModel();

        // Corregir: debe filtrar solo por NULL
        // $sql1 = "Select per_id, per_nombre from pag_persona WHERE estado = NULL ";
        $sql1 = "Select per_id, per_nombre from pag_persona";
        $personas = $objPersona->select($sql1);

        // $sql2 = "Select est_id, est_descripcion from pag_estado WHERE estado= 0";
        $sql2 = "Select est_id, est_descripcion from pag_estado WHERE tdoc_id=1";
        $estados = $objEstado->select($sql2);

        // $sql3 = "Select cen_id, cen_nombre from pag_centro WHERE estado= 0";
        $sql3 = "Select cen_id, cen_nombre from pag_centro";
        $centros = $objCentro->select($sql3);

        // $sql4 = "Select area_id, area_descripcion from pag_area WHERE ESTADO = 0";
        $sql4 = "Select area_id, area_descripcion from pag_area";
        $areas = $objArea->select($sql4);

        //$sql5 = "select tequi_id, tequi_descripcion from pag_tipo_de_equipo WHERE estado = 0";
        $sql5 = "select tequi_id, tequi_descripcion from pag_tipo_de_equipo";
        $tEquipos = $objT_equipo->select($sql5);

        $objPersona->cerrar();
        $objEstado->cerrar();
        $objCentro->cerrar();
        $objArea->cerrar();
        $objT_equipo->cerrar();


        $id = $parametros[1];

        $sql = "SELECT * FROM pag_equipo WHERE equi_id='" . $id . "'";
        $equipo = $objEquipos->find($sql);
//echo "<pre>"; die(print_r($equipo));
        // Cierra la conexion
        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/editar.html.php");

    }

    function postEditar() {

        $equi_noplaca = $_POST['equi_noplaca'];
        $per_id = $_POST['per_id'];
        $equi_nombre = $_POST['equi_nombre'];
        $equi_estado = $_POST['equi_estado'];
        $equi_modelo = $_POST['equi_modelo'];
        $equi_noserie = $_POST['equi_noserie'];
        $equi_fabricante = $_POST['equi_fabricante'];
        $equi_marca = $_POST['equi_marca'];
        $equi_ubicacion = $_POST['equi_ubicacion'];
        $equi_fecha_compra = $_POST['equi_fecha_compra'];
        $equi_fecha_instala = $_POST['equi_fecha_instala'];
        $equi_vence_garantia = $_POST['equi_vence_garantia'];
        $cen_codigo = $_POST['cen_codigo'];
        $area_id = $_POST['area_id'];

        $objEquipos = new EquiposModel();

        $sql = "UPDATE "
                . "pag_equipo "
                . "SET "
                . "equi_nombre='$equi_nombre', "
                . "per_id=$per_id, "
                . "equi_estado='$equi_estado', "
                . "equi_modelo='$equi_modelo', "
                . "equi_noserie='$equi_noserie', "
                . "equi_fabricante='$equi_fabricante', "
                . "equi_marca='$equi_marca', "
                . "equi_ubicacion='$equi_ubicacion', "
                . "equi_fecha_compra='$equi_fecha_compra', "
                . "equi_fecha_instala='$equi_fecha_instala', "
                . "equi_vence_garantia='$equi_vence_garantia', "
                . "cen_codigo=$cen_codigo, "
                . "area_id=$area_id "
                . "WHERE equi_noplaca=$equi_noplaca";

        // die(print_r($sql));

        $respuesta = $objEquipos->update($sql);

        // Cierra la conexion
        $objEquipos->cerrar();

        redirect(crearUrl("equipos", "equipos", "consulta"));

    }

    function crear() {
        $objPersona = new EquiposModel();
        $objEstado = new EquiposModel();
        $objCentro = new EquiposModel();
        $objArea = new EquiposModel();
        $objT_equipo = new EquiposModel();

        // Corregir: debe filtrar solo por NULL
        // $sql1 = "Select per_id, per_nombre from pag_persona WHERE estado = NULL ";
        $sql1 = "Select per_id, per_nombre from pag_persona";
        $personas = $objPersona->select($sql1);

        // $sql2 = "Select est_id, est_descripcion from pag_estado WHERE estado= 0";
        $sql2 = "Select est_id, est_descripcion from pag_estado WHERE tdoc_id=1";
        $estados = $objEstado->select($sql2);

        // $sql3 = "Select cen_id, cen_nombre from pag_centro WHERE estado= 0";
        $sql3 = "Select cen_id, cen_nombre from pag_centro";
        $centros = $objCentro->select($sql3);

        // $sql4 = "Select area_id, area_descripcion from pag_area WHERE ESTADO = 0";
        $sql4 = "Select area_id, area_descripcion from pag_area";
        $areas = $objArea->select($sql4);

        //$sql5 = "select tequi_id, tequi_descripcion from pag_tipo_de_equipo WHERE estado = 0";
        $sql5 = "select tequi_id, tequi_descripcion from pag_tipo_de_equipo";
        $tEquipos = $objT_equipo->select($sql5);

        $objPersona->cerrar();
        $objEstado->cerrar();
        $objCentro->cerrar();
        $objArea->cerrar();
        $objT_equipo->cerrar();



        include_once("../view/Equipos/equipos/crear.html.php");

    }

    function postCrear() {
        $equi_id = $_POST['equi_id'];
        $per_id = $_POST['per_id'];
        $equi_nombre = $_POST['equi_nombre'];
        $est_id = $_POST['est_id'];
        $equi_modelo = $_POST['equi_modelo'];
        $equi_serie = $_POST['equi_serie'];
        $equi_fabricante = $_POST['equi_fabricante'];
        $equi_marca = $_POST['equi_marca'];
        $equi_ubicacion = $_POST['equi_ubicacion'];
        $equi_fecha_compra = $_POST['equi_fecha_compra'];
        $equi_fecha_instalacion = $_POST['equi_fecha_instalacion'];
        $equi_vence_garantia = $_POST['equi_vence_garantia'];
        $cen_id = $_POST['cen_id'];

        $equi_foto = "equipo-".$equi_id;
        $ruta = $_FILES['ruta']['tmp_name'];
        $rutaydoc = getDocumentRoot()."/web/media/img/Equipos/" . $equi_foto;
        if ($ruta <> "") {
            if (move_uploaded_file($ruta, $rutaydoc)) {
                
            }
        } else {
            $rutaydoc = NULL;
        }

        $area_id = $_POST['area_id'];
        $tequi_id = $_POST['tequi_id'];


        $insertEquipos = "INSERT INTO pag_equipo "
                    . "(equi_id,"
                    . "per_id,"
                    . "equi_nombre,"
                    . "cen_id,"
                    . "est_id,"
                    . "equi_foto,"
                    . "equi_fabricante,"
                    . "equi_marca,"
                    . "equi_modelo,"
                    . "equi_serie,"
                    . "equi_ubicacion,"
                    . "equi_fecha_compra,"
                    . "equi_fecha_instalacion,"
                    . "equi_vence_garantia,"
                    . "area_id,"
                    . "tequi_id)"
                . " VALUES('$equi_id', "
                    . "$per_id, "
                    . "'$equi_nombre', "
                    . "'$cen_id', "
                    . "$est_id, "
                    . "'$rutaydoc', "
                    . "'$equi_fabricante', "
                    . "'$equi_marca', "
                    . "'$equi_modelo', "
                    . "'$equi_serie', "
                    . "'$equi_ubicacion', "
                    . "'$equi_fecha_compra', "
                    . "'$equi_fecha_instalacion', "
                    . "'$equi_vence_garantia', "
                    . "$area_id,"
                    . "$tequi_id)";

        $objEquipos = new EquiposModel();

        $insertar = $objEquipos->insertar($insertEquipos);

        // Cierra la conexion
        $objEquipos->cerrar();

        redirect(crearUrl("equipos", "equipos", "consultar"));

    }
    
    /*
    function eliminar($parametros) {
        $objEquipos = new EquiposModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_equipo WHERE equi_noplaca='" . $id . "'";
        $equipos = $objEquipos->find($sql);

        // Cierra la conexion
        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/eliminar.html.php");

    }
    */

    function postEliminar() {
        $objEquipos = new EquiposModel();

        $id = $_POST['id'];


        $sql = "UPDATE pag_equipo SET estado = NOW() WHERE equi_id='" . $id . "'";
        //die(print_r($sql));

        $respuesta = $objEquipos->update($sql);

        // Cierra la conexion
        $objEquipos->cerrar();

        redirect(crearUrl("equipos", "equipos", "listar"));

    }

    function detalle($parametros = false) {
        $objEquipos = new EquiposModel();
        $id = $parametros[1];

        $sql = "SELECT * FROM pag_equipo WHERE equi_noplaca='" . $id . "'";
        $equipo = $objEquipos->find($sql);

        // Cierra la conexion
        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/detalle.html.php");

    }

    function listar() {
        $objEquipos = new EquiposModel();

        $sql = "SELECT * FROM pag_equipo WHERE estado = ''";
        //$sql = "SELECT * FROM pag_equipo";
        $equipos = $objEquipos->select($sql);

        // Cierra la conexion
        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/listar.html.php");

    }

    function Consulta() {
        include_once("../view/Equipos/equipos/consulta.html.php");

    }

    function buscarAjax() {
        $objEquipos = new EquiposModel();

        $buscarEquipo = $_POST['busquedaEquipos'];

        $sql = "SELECT * FROM pag_equipo WHERE equi_nombre LIKE '%" . $buscarEquipo . "%' or equi_id LIKE '%" . $buscarEquipo . "%'";

        $equipos = $objEquipos->select($sql);
        $objEquipos->cerrar();

        include_once("../view/Equipos/equipos/listar.html.php");

    }

}
