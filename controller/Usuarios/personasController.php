<?php

include_once('../model/Usuarios/personasModel.php');

class PersonasController
{
    
    function agregaruser($parametros=false)
    {
        
        $PersonasModel = new PersonasModel();
        
            $agre = $parametros[1];

            $sql = "SELECT pag_persona.per_id "
                    . "FROM pag_persona "
                    . "WHERE pag_persona.per_id='$agre'";

            $usuar = $PersonasModel->find($sql);

            //-------Consulta de tablas para el formulario agragar user------

            $sql = "SELECT rol_id,rol_nombre FROM pag_rol";
            $perfiles = $PersonasModel->select($sql);

        // Cierra la conexion
        $PersonasModel->cerrar();
        
        include_once("../view/Usuarios/personas/agregar.html.php");
    }
    
    function postAgregaruser()
    {   
        $errores=array();
        
        if(!isset($_POST['login']) or $_POST['login']==""){
        $errores[]='<h6><strong>(*) Para el registro de usuario el campo "login" es obligatorio</strong><h6>';
        }

        if(!isset($_POST['clave']) or $_POST['clave']==""){
        $errores[]='<h6><strong>(*) Para el registro de usuario el campo "clave" es obligatorio</strong><h6>';
        }

        if(!isset($_POST['estado']) or $_POST['estado']==""){
        $errores[]='<h6><strong>(*) Para el registro de usuario el campo "estado" es obligatorio</strong><h6>';
        }

        if(!isset($_POST['perfil']) or $_POST['perfil']==""){
        $errores[]='<h6><strong>(*) Para el registro de usuario el campo "perfil" es obligatorio</strong><h6>';
        }
        
        if(count($errores)>0){
            setErrores($errores);
            redirect(crearUrl('usuarios', 'usuarios', 'listar'));
            //----------------fin validaciones-----------------
        }  else {
            
            $idper = $_POST['idper'];
            $login = $_POST['login'];
            $clave = $_POST['clave'];
            $estado = $_POST['estado'];
            $perfil = $_POST['perfil'];
            
            if(isset($idper) && ($login) && ($clave) && ($estado) && ($perfil)){
                $PersonasModel = new PersonasModel();

                $sql = "UPDATE "
                    . "pag_persona "
                    . "SET "
                    . "per_tipo='usuario del sistema' "
                    . "WHERE per_id='$idper'";

                $respuesta = $PersonasModel->update($sql);

                //----------------------------------------------------------
                //aqui Inicia encriptacion de Password
                $salt = '$bgr$/';
                $passwordp = sha1(md5($salt . $clave));
                //aqui termina encriptacion password

                $insertusu = "INSERT INTO pag_usuario(per_id,"
                            . "usu_usuario,usu_clave,"
                            . "usu_estado,rol_id) "
                            . " VALUES('$idper',"
                            . "'$login',"
                            . "'$passwordp',"
                            . "'$estado',"
                            . "'$perfil')";

                $insertar = $PersonasModel->insertar($insertusu);

                // Cierra la conexion
                $PersonasModel->cerrar();
                echo true;
            }  else {
                echo false;
            }
            //----------------------------------------------------------

//            redirect(crearUrl("usuarios", "usuarios", "listar"));
        }
    }
    
    //--------- REGISTRO DE PERSONAS POR MEDIO DE ARCHIVOS PLANOS ------------------
    
    function crear()
    {
        include_once("../view/Usuarios/personas/planos.html.php");
    }
    
    function postPlanos()
    {   
        $plano = $_FILES['plano'];
        $errores=array();
        //-------------------------------validar el tipo de archivo-----------------------------
//        if($plano['type'] != 'text/csv'){
//            $errores[]='<h6><strong>(*) Este tipo de archivo no es valido.</strong><h6>';
//            $errores[]='<h6><strong>(*) Solo se permiten archivos con la extencion "csv".</strong><h6>';
//        } 
        
        //------------------------------------------------------------------------------------
        
        if(count($errores)>0){
            setErrores($errores);
            redirect(crearUrl('usuarios', 'personas', 'crear'));
            //----------------fin validaciones-----------------
        }else{
    //        die(print_r($plano));
            $tem = $plano['tmp_name'];

            //----------------------------------------------------------------------
            $fila = 1;
            if (($gestor = fopen("$tem", "r")) !== FALSE) {

                while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {

                    $PersonasModel = new PersonasModel();

        //                die(print_r($datos));
                        $numero = count($datos);
    //                    echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
                        $fila++;

                        for ($c=0; $c < $numero; $c++) {
        //                    echo $datos[$c] . "<br />\n";
                            $y = $datos[$c];

    //                        $dato = explode(";", $y);

                            $delimiter = array(",",";","'","\"","|","\\","/",":");
                            $replace = str_replace($delimiter, $delimiter[0], $y);
                            $dato = explode($delimiter[0], $replace);

                            if ($dato[0] != 'identificacion'){

                                $insertper = "INSERT INTO pag_persona "
                                . "(per_id,per_nombre,per_apellido,per_telefono,per_movil,"
                                . "per_email,per_direccion,dept_id,per_valor_hora,"
                                . "car_id,cen_id,per_tipo) "
                                . "VALUES('$dato[0]',"
                                . "'$dato[1]',"
                                . "'$dato[2]',"
                                . "'$dato[3]',"
                                . "'$dato[4]',"
                                . "'$dato[5]',"
                                . "'$dato[6]',"
                                . "'1',"
                                . "'$dato[7]',"
                                . "'1',"
                                . "'1',"
                                . "'persona')";

                                $insertar = $PersonasModel->insertar($insertper);

    //                            die($insertper);
                            }


                        } //explode
                    // Cierra la conexion
                    $PersonasModel->cerrar();
                }
                fclose($gestor);
            }
            //----------------------------------------------------------------------
            redirect(crearUrl("usuarios", "usuarios", "listar"));
        }
        
    }
    
}