<?php

include_once '../model/Medidores/medidoresModel.php';

class MedidoresController {
    
    public function crear(){
        include_once '../view/Medidores/medidores/crear.html.php';
    }
    
    public function postCrear(){
        //die(print_r($_POST));
        $errores=array();
        $patronLetras="/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros="/^[0-9a-zA-Z ]+$/";
        
        if(!isset($_POST['nombre']) or $_POST['nombre']==""){
            $errores[]="El campo nombre no puede estar vacio";
        }//Valida que el campo nombre medidor no llegue vacio
        
        if(isset($_POST['nombre']) && !preg_match($patronLetras,$_POST['nombre'])){
            $errores[]="En el campo nombre unicamente se admiten Letras";
        }//Valida que el campo nombre medidor contenga letras unicamente
        
        if(!isset($_POST['acronimo']) or $_POST['acronimo']==""){
            $errores[]="El campo Acronimo no puede estar vacio";
        }//Valida que el campo acronimo no llegue vacio
        
        if(isset($_POST['acronimo']) && !preg_match($patronLetras,$_POST['acronimo'])){
            $errores[]="En el campo Acronimo unicamente se admiten Letras";
        }//Valida que el campo acronimo contenga letras unicamente
        
        if(isset($_POST['acronimo']) && strlen($_POST['acronimo'])>3){
            $errores[]="El campo acronimo no debe sobrepasar los 4 caracteres";
        }//Valida que el campo acronimo contenga letras unicamente
        

        if(!isset($_POST['descripcion']) or $_POST['descripcion']==""){
            $errores[]="El campo descripcion no puede estar vacio";
        }//Valida que el campo acronimo no llegue vacio
        
        if(isset($_POST['descripcion']) && !preg_match($patronLetrasNumeros,$_POST['descripcion'])){
            $errores[]="En el campo descripcion unicamente se admiten letras y numeros";
        }//Valida que el campo acronimo contenga letras unicamente
        
        
        if(count($errores)>0){
            setErrores($errores);
            redirect(crearUrl('medidores', 'medidores', 'crear'));
        }else{
        
            $nombre = $_POST['nombre'];
            $acronimo = $_POST['acronimo'];
            $descripcion = $_POST['descripcion'];
            $objMedidores = new MedidoresModel();
            $sql = "INSERT INTO pag_tipo_medidor (tmed_nombre, tmed_acronimo, tmed_descripcion,estado)"
                    . "VALUES ('$nombre',"
                    . "'$acronimo',"
                    . "'$descripcion',"
                    . "null)";
            $medidores = $objMedidores->insertar($sql);
            $objMedidores->cerrar();
            redirect(crearUrl('medidores', 'medidores', 'listar'));
        }
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
        $errores=array();
        $patronLetras="/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros="/^[0-9a-zA-Z]+$/";
        
        if(!isset($_POST['tmed_nombre']) or $_POST['tmed_nombre']==""){
            $errores[]="El campo nombre no puede estar vacio";
        }//Valida que el campo nombre medidor no llegue vacio
        
        if(isset($_POST['tmed_nombre']) && !preg_match($patronLetras,$_POST['tmed_nombre'])){
            $errores[]="En el campo nombre unicamente se admiten Letras";
        }//Valida que el campo nombre medidor contenga letras unicamente
        
        if(!isset($_POST['tmed_acronimo']) or $_POST['tmed_acronimo']==""){
            $errores[]="El campo Acronimo no puede estar vacio";
        }//Valida que el campo acronimo no llegue vacio
        
        if(isset($_POST['tmed_acronimo']) && !preg_match($patronLetras,$_POST['tmed_acronimo'])){
            $errores[]="En el campo Acronimo unicamente se admiten Letras";
        }//Valida que el campo acronimo contenga letras unicamente
        
        if(isset($_POST['tmed_acronimo']) && strlen($_POST['tmed_acronimo'])>3){
            $errores[]="El campo acronimo no debe sobrepasar los 4 caracteres";
        }//Valida que el campo acronimo contenga letras unicamente
        
        if(!isset($_POST['tmed_descripcion']) or $_POST['tmed_descripcion']==""){
            $errores[]="El campo descripcion no puede estar vacio";
        }//Valida que el campo acronimo no llegue vacio
        
        if(isset($_POST['tmed_descripcion']) && !preg_match($patronLetras,$_POST['tmed_descripcion'])){
            $errores[]="En el campo descripcion unicamente se admiten letras y numeros";
        }//Valida que el campo acronimo contenga letras unicamente
        
        
        if(count($errores)>0){
            setErrores($errores);
            redirect(crearUrl('medidores', 'medidores', 'listar'));
        }else{
        
        $id = $_POST['id'];
        $tmed_nombre = $_POST['tmed_nombre'];
        $tmed_acronimo = $_POST['tmed_acronimo'];
        $tmed_descripcion = $_POST['tmed_descripcion'];
        $objMedidores = new MedidoresModel();
        
        $sql = "UPDATE pag_tipo_medidor SET "
                . "tmed_nombre = '$tmed_nombre',"
                . "tmed_acronimo = '$tmed_acronimo',"
                . "tmed_descripcion = '$tmed_descripcion'"
                . " WHERE tmed_id = $id";
//        die($sql);
        
        $medidores = $objMedidores->update($sql);
        $objMedidores->cerrar();
        redirect(crearUrl('medidores', 'medidores', 'listar'));
        }
    }
    
    public function listar(){
        include_once '../view/Medidores/medidores/buscador.html.php';
    }
    
    function buscador() {

        $objMedidores = new MedidoresModel();

        $medidor = $_POST['medidor_id'];

        $sql = "SELECT * FROM pag_tipo_medidor WHERE tmed_nombre LIKE '%" . $medidor . "%' or tmed_acronimo LIKE '%" . $medidor . "%'";

        $medidores = $objMedidores->select($sql);
        
         /*
         * Paginado
         */
        $pagina = (isset($_REQUEST['pagina'])?$_REQUEST['pagina']:1); 
        $url = crearUrl('medidores', 'medidores', 'listar');
        
        $paginado = new Paginado($medidores, $pagina, $url);
        
        $medidores = $paginado->getDatos();
        /*
         * Fin paginado
         */

        $objMedidores->cerrar();
        include_once("../view/Medidores/Medidores/listar.html.php");
    }
}