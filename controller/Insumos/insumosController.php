<?php

include_once('../model/Insumos/insumosModel.php');

class InsumosController {

//crear
    function crear() {
        $objUmed = new InsumosModel();
        $sql = "SELECT * FROM pag_unidad_medida";
        $umeds = $objUmed->select($sql);
        // Cierra la conexion
        $objUmed->cerrar();
        include_once("../view/Insumos/insumos/crear.html.php");
    }

    function postCrear() {
        $objInsumos = new InsumosModel();
        $errores = array();
        //aqui se validan los insumos 
        
        if (!isset($_POST['ins_id']) or $_POST['ins_id'] == "") {
            $errores[] = "El campo codigo insumo no debe estar vacio";
        }

        if (!isset($_POST['ins_nombre']) or $_POST['ins_nombre'] == "") {
            $errores[] = "El campor nombre no debe estar vacio";
        }
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('herramientas', 'herramientas', 'crear'));
        }
        
        $ins_id = $_POST['ins_id'];
        $ins_nombre = $_POST['ins_nombre'];
        $ins_descripcion = $_POST['ins_descripcion'];
        $ins_valor = $_POST['ins_valor'];
        $umed_id = $_POST['umed_id'];

        $insertInsumos = "INSERT INTO pag_insumo (ins_id,ins_nombre,ins_descripcion,ins_valor,umed_id) VALUES ('$ins_id', '$ins_nombre', '$ins_descripcion', '$ins_valor', $umed_id)";

        $insertar = $objInsumos->insertar($insertInsumos);
        // Cierra la conexion
        $objInsumos->cerrar();

        redirect(crearUrl("insumos", "insumos", "consultar"));
    }

//Fin Crear
//Consultar
    function consultar() {
        include_once("../view/Insumos/insumos/consultar.html.php");
    }

//Fin Consultar
//Consulta Con Ajax
    function consultarAjax() {

        $objInsumos = new InsumosModel();

        $insumo = $_POST['insumo'];

        if (is_numeric($insumo)) {
            $ins = " AND pi.ins_id LIKE '$insumo%'";
        } else {
            $ins = " AND pi.ins_nombre LIKE '$insumo%'";
        }


        $sql = "SELECT pi.*, pum.umed_descripcion FROM pag_insumo pi, pag_unidad_medida pum "
                . "WHERE pi.umed_id=pum.umed_id " . $ins;


        $insumos = $objInsumos->select($sql);

        if ($insumos == true) {
            
        } else {
            echo "<b>'", $insumo, "'</b>", " No se encontraron resultados para tu busqueda. . .";
        }

        $objInsumos->cerrar();
        include_once("../view/Insumos/insumos/listar.html.php");
    }

//Fin Consulta Con Ajax
//Listar
    function listar() {

        $objInsumos = new InsumosModel();

        $sql = "SELECT pi.*, pum.umed_descripcion FROM pag_insumo pi, pag_unidad_medida pum "
                . "WHERE pi.umed_id=pum.umed_id AND pi.ins_id=pi.ins_id.estado=1";

        $insumos = $objInsumos->select($sql);

        // Cierra la conexion
        $objInsumos->cerrar();

        include_once("../view/Insumos/insumos/consultar.html.php");
    }

//Fin Listar
//Editar
    function editar($parametros = false) {
        //select a pag_insumo
        $objInsumo = new InsumosModel();
        $ins_id = $parametros[1];
        $sql = "SELECT pi.*, pum.umed_descripcion FROM pag_insumo pi, pag_unidad_medida pum "
                . "WHERE pi.umed_id=pum.umed_id AND pi.ins_id=$ins_id";
        $insumo = $objInsumo->find($sql);
        // Cierra la conexion
        $objInsumo->cerrar();

        //select a pag_unidad_medida
        $objUmeds = new Insumosmodel();
        $sql = "SELECT * FROM pag_unidad_medida";
        $umeds = $objUmeds->select($sql);
        //cierra la conexion
        $objUmeds->cerrar();
        include_once("../view/Insumos/insumos/editar.html.php");
    }

    function postEditar() {
        $ins_id = $_POST['ins_id'];
        $ins_nombre = $_POST['ins_nombre'];
        $ins_descripcion = $_POST['ins_descripcion'];
        $ins_valor = $_POST['ins_valor'];
        $umed_id = $_POST['umed_id'];
        //Update pag_insumo
        $objInsumos = new InsumosModel();
        $sql = "UPDATE "
                . "pag_insumo "
                . "SET "
                . "ins_nombre= '$ins_nombre',"
                . "ins_descripcion= '$ins_descripcion',"
                . "ins_valor= '$ins_valor',"
                . "umed_id= '$umed_id'"
                . "WHERE ins_id=$ins_id";
        $respuesta = $objInsumos->update($sql);
        // Cierra la conexion
        $objInsumos->cerrar();
        redirect(crearUrl("insumos", "insumos", "listar"));
    }

//Fin Editar
//eliminado
    function eliminar() {
        $ins_id = $_POST['ins_id'];
        $objInsumos = new InsumosModel();

        $sql = "UPDATE pag_insumo SET estado=now() WHERE ins_id=$ins_id";
        $objInsumos->update($sql);
        // Cierra la conexion
        $objInsumos->cerrar();
    }

//fin eliminado
}
