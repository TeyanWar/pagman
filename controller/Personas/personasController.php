<?php

include_once('../model/Personas/personasModel.php');


class PersonasController
{
    
    function editar($parametros=false){
        
        //-------Consulta de tablas para el formulario editar------
        
        $objPersonas = new PersonasModel();
 

            $sql = "SELECT * FROM pag_departamento";
            $departamentos = $objPersonas->select($sql);

            //---------------------------------------------

            $sql = "SELECT * FROM pag_cargo";
            $cargos = $objPersonas->select($sql);

            //---------------------------------------------

            $sql = "SELECT cen_id,cen_nombre FROM pag_centro";
            $centros = $objPersonas->select($sql);
        
        // Cierra la conexion
        $objPersonas->cerrar();
        
        //---------------------fin consultas----------------
        //--------------------------------------------------*/
        
        $objPersonas = new PersonasModel();
        
            $id = $parametros[1];

            $sql = "SELECT pag_persona.per_id,pag_persona.per_nombre,pag_persona.per_apellido,"
                    . "pag_persona.per_telefono,pag_persona.per_movil,"
                    . "pag_persona.per_email,pag_persona.per_direccion,"
                    . "pag_persona.per_valor_hora,pag_departamento.dept_id,"
                    . "pag_cargo.car_id,pag_centro.cen_id "
                    . "FROM pag_persona,pag_cargo,pag_departamento,pag_centro "
                    . "WHERE pag_persona.dept_id=pag_departamento.dept_id "
                    . "and pag_persona.car_id=pag_cargo.car_id "
                    . "and pag_persona.cen_id=pag_centro.cen_id and pag_persona.per_id='$id'";

            $per = $objPersonas->find($sql);
          
            include_once("../view/Personas/personas/editarper.html.php");

            
        // Cierra la conexion
        $objPersonas->cerrar();
        //*---------------------------------------------------------
    }
    
    function postEditar(){
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $movil = $_POST['movil'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];
        $valorhora = $_POST['valorhora'];
        $cargo = $_POST['cargo'];
        $departamento = $_POST['departamento'];
        $centro = $_POST['centro'];
        
        $objPersonas = new PersonasModel();
        
            $sql = "UPDATE "
                    . "pag_persona "
                    . "SET "
                    . "per_nombre='$nombre',"
                    . "per_apellido='$apellido',"
                    . "per_telefono='$telefono',"
                    . "per_movil='$movil',"
                    . "per_email='$email',"
                    . "per_direccion='$direccion',"
                    . "dept_id='$departamento',"
                    . "per_valor_hora='$valorhora',"
                    . "car_id='$cargo',"
                    . "cen_id='$centro' "
                    . "WHERE per_id='$id'";

                $respuesta = $objPersonas->update($sql);
        // Cierra la conexion
        $objPersonas->cerrar();
        
        redirect(crearUrl("usuarios", "usuarios", "listar"));
 
    }    
    
    function verDetalle($parametros=false){
        
        $objPersonas = new PersonasModel();
        
            $id = $parametros[1];

            $sql = "SELECT pag_persona.per_id,pag_persona.per_nombre,pag_persona.per_apellido,"
                    . "pag_persona.per_telefono,pag_persona.per_movil,"
                    . "pag_persona.per_email,pag_persona.per_direccion,"
                    . "pag_persona.per_valor_hora,pag_departamento.dept_descripcion,"
                    . "pag_cargo.car_descripcion,pag_centro.cen_nombre "
                    . "FROM pag_persona,pag_cargo,pag_departamento,pag_centro "
                    . "WHERE pag_persona.dept_id=pag_departamento.dept_id "
                    . "and pag_persona.car_id=pag_cargo.car_id "
                    . "and pag_persona.cen_id=pag_centro.cen_id and pag_persona.per_id='$id'";

            $per = $objPersonas->find($sql);
          
            include_once("../view/Personas/personas/verDetalleper.html.php");

        // Cierra la conexion
        $objPersonas->cerrar();

    }
    
    
    function agregaruser($parametros=false)
    {   
        
        $objPersonas = new PersonasModel();
        
            $id = $parametros[1];

            $sql = "SELECT pag_persona.per_id "
                    . "FROM pag_persona "
                    . "WHERE pag_persona.per_id='$id'";

            $usuar = $objPersonas->find($sql);

            //-------Consulta de tablas para el formulario agragar user------

            $sql = "SELECT rol_id,rol_nombre FROM pag_rol";
            $perfiles = $objPersonas->select($sql);

        // Cierra la conexion
        $objPersonas->cerrar();
        
        include_once("../view/Personas/personas/agregar.html.php");
    }
    
    function postAgregaruser()
    {   
        $objPersonas = new PersonasModel();
        
            $id = $_POST['id'];
            $login = $_POST['login'];
            $clave = $_POST['clave'];
            $estado = $_POST['estado'];
            $perfil = $_POST['perfil'];

            $sql = "UPDATE "
                . "pag_persona "
                . "SET "
                . "per_tipo='usuario del sistema' "
                . "WHERE per_id='$id'";

            $respuesta = $objPersonas->update($sql);

            //----------------------------------------------------------

            $insertusu = "INSERT INTO pag_usuario(per_id,"
                        . "usu_usuario,usu_clave,"
                        . "usu_estado,rol_id) "
                        . " VALUES('$id',"
                        . "'$login',"
                        . "'$clave',"
                        . "'$estado',"
                        . "'$perfil')";

            $insertar = $objPersonas->insertar($insertusu);

        // Cierra la conexion
        $objPersonas->cerrar();
        //----------------------------------------------------------
        
        redirect(crearUrl("usuarios", "usuarios", "listar"));
    }
    
}