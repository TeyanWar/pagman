<?php

include_once '../model/Medidores/medidoresModel.php';

class MedidoresController {
    
    public function crear(){
        include_once '../view/Medidores/medidores/crear.html.php';
    }
    
    public function postCrear(){
        //die(print_r($_POST));
        $nombre = $_POST['nombre'];
        $acronimo = $_POST['acronimo'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];
        $objMedidores = new MedidoresModel();
        $sql = "INSERT INTO pag_tipo_medidor (tmed_nombre, tmed_acronimo, tmed_descripcion, tmed_estado)"
                . "VALUES ('$nombre',"
                . "'$acronimo',"
                . "'$descripcion',"
                . "'$estado')";
        //die($sql);
        $medidores = $objMedidores->insertar($sql);
        $objMedidores->cerrar();
        redirect(crearUrl('medidores', 'medidores', 'listar'));
    }
    
    public function editar($parametros=false){
        $objMedidores = new MedidoresModel();
        $id = $parametros[1];

        $sql = "SELECT * FROM pag_tipo_medidor WHERE tmed_id = $id";

        $medidores = $objMedidores->find($sql);
//        die(print_r($medidores));
        $objMedidores->cerrar();
        include_once '../view/Medidores/medidores/editar.html.php';
        
    }
    
    public function postEditar(){
        $id = $_POST['id'];
        $tmed_nombre = $_POST['tmed_nombre'];
        $tmed_acronimo = $_POST['tmed_acronimo'];
        $tmed_descripcion = $_POST['tmed_descripcion'];
        $tmed_estado = $_POST['tmed_estado'];
        $objMedidores = new MedidoresModel();
        
        $sql = "UPDATE pag_tipo_medidor SET "
                . "tmed_nombre = '$tmed_nombre',"
                . "tmed_acronimo = '$tmed_acronimo',"
                . "tmed_descripcion = '$tmed_descripcion',"
                . "tmed_estado = '$tmed_estado' WHERE tmed_id = $id";
//        die($sql);
        $medidores = $objMedidores->update($sql);
        $objMedidores->cerrar();
        redirect(crearUrl('medidores', 'medidores', 'listar'));
    }
    
    public function listar(){
        $objMedidores = new MedidoresModel();
        $sql = "SELECT * FROM pag_tipo_medidor WHERE tmed_estado = 'Activo'";
        $medidores = $objMedidores->select($sql);

        $objMedidores->cerrar();
        include_once '../view/Medidores/medidores/listar.html.php';
    }
    
    function buscar() {
        include_once "../view/Medidores/medidores/buscar.html.php";
    }

    function buscarAjax() {
        $objMedidores = new MedidoresModel();
        $busqueda = $_POST['busquedaMedidor'];
        $sql = "SELECT * from pag_tipo_medidor WHERE tmed_nombre LIKE '%" . $busqueda . "%' or id LIKE '%" . $busqueda . "%'";
        $medidores = $objMedidores->select($sql);
        $objMedidores->cerrar();
        include_once "../view/Medidores/medidores/listar.html.php";
    }
}