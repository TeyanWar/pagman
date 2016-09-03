<?php

include_once '../model/Medidores/medidoresModel.php';

class medidoresController {
    
    public function crear(){
        include_once '../view/Medidores/medidores/crear.html.php';
    }
    
    public function postCrear(){
        //die(print_r($_POST));
        $errores=array();
        $patronLetras="/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros="/^[0-9a-zA-Z ]+$/";
        
        if(!isset($_POST['nombre']) or $_POST['nombre']==""){
            $errores[]="El campo nombre no puede estar vac&iacute;o";
        }//Valida que el campo nombre medidor no llegue vac&iacute;o
        
        if(isset($_POST['nombre']) && !preg_match($patronLetras,$_POST['nombre'])){
            $errores[]="En el campo nombre &uacute;nicamente se admiten letras";
        }//Valida que el campo nombre medidor contenga letras &uacute;nicamente
        
        if(!isset($_POST['acronimo']) or $_POST['acronimo']==""){
            $errores[]="El campo acr&oacute;nimo no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o
        
        if(isset($_POST['acronimo']) && !preg_match($patronLetras,$_POST['acronimo'])){
            $errores[]="En el campo acr&oacute;nimo &uacute;nicamente se admiten letras";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        
        if(isset($_POST['acronimo']) && strlen($_POST['acronimo'])>3){
            $errores[]="El campo acronimo no debe sobrepasar los 4 caracteres";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        

        if(!isset($_POST['descripci&oacute;n']) or $_POST['descripci&oacute;n']==""){
            $errores[]="El campo descripci&oacute;n no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o
        
        if(isset($_POST['descripci&oacute;n']) && !preg_match($patronLetrasNumeros,$_POST['descripci&oacute;n'])){
            $errores[]="En el campo descripci&oacute;n &uacute;nicamente se admiten letras y numeros";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        
        
        if(count($errores)>0){
            setErrores($errores);
        }else{
        
            $objMedidores = new MedidoresModel();
            $nombre = $_POST['nombre'];
            $acronimo = $_POST['acronimo'];
            $descripcion = $_POST['descripci&oacute;n'];
            $sql = "INSERT INTO pag_tipo_medidor (tmed_nombre, tmed_acronimo, tmed_descripcion, estado)"
                    . "VALUES ('$nombre',"
                    . "'$acronimo',"
                    . "'$descripci&oacute;n',"
                    . "null)";
            $medidores = $objMedidores->insertar($sql);
            $objMedidores->cerrar();
        }
        
        echo getRespuestaAccion('listar');
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
            $errores[]="El campo nombre no puede estar vac&iacute;o";
        }//Valida que el campo nombre medidor no llegue vac&iacute;o
        
        if(isset($_POST['tmed_nombre']) && !preg_match($patronLetras,$_POST['tmed_nombre'])){
            $errores[]="En el campo nombre &uacute;nicamente se admiten Letras";
        }//Valida que el campo nombre medidor contenga letras &uacute;nicamente
        
        if(!isset($_POST['tmed_acronimo']) or $_POST['tmed_acronimo']==""){
            $errores[]="El campo acr&oacute;nimo no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o
        
        if(isset($_POST['tmed_acronimo']) && !preg_match($patronLetras,$_POST['tmed_acronimo'])){
            $errores[]="En el campo acr&oacute;nimo &uacute;nicamente se admiten Letras";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        
        if(isset($_POST['tmed_acronimo']) && strlen($_POST['tmed_acronimo'])>3){
            $errores[]="El campo acronimo no debe sobrepasar los 4 caracteres";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        
        if(!isset($_POST['tmed_descripci&oacute;n']) or $_POST['tmed_descripci&oacute;n']==""){
            $errores[]="El campo descripci&oacute;n no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o
        
        if(isset($_POST['tmed_descripci&oacute;n']) && !preg_match($patronLetras,$_POST['tmed_descripci&oacute;n'])){
            $errores[]="En el campo descripci&oacute;n &uacute;nicamente se admiten letras y numeros";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        
        
        if(count($errores)>0){
            setErrores($errores);
            redirect(crearUrl('medidores', 'medidores', 'listar'));
        }else{
        
        $id = $_POST['id'];
        $tmed_nombre = $_POST['tmed_nombre'];
        $tmed_acronimo = $_POST['tmed_acronimo'];
        $tmed_descripcion = $_POST['tmed_descripci&oacute;n'];
        $objMedidores = new MedidoresModel();
        
        $sql = "UPDATE pag_tipo_medidor SET "
                . "tmed_nombre = '$tmed_nombre',"
                . "tmed_acronimo = '$tmed_acronimo',"
                . "tmed_descripci&oacute;n = '$tmed_descripcion'"
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
        $url = crearUrl('Medidores', 'medidores', 'listar');
        
        $paginado = new Paginado($medidores, $pagina, $url);
        
        $medidores = $paginado->getDatos();
        /*
         * Fin paginado
         */

        $objMedidores->cerrar();
        include_once("../view/Medidores/medidores/listar.html.php");
    }
}