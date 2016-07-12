<?php

include_once("../model/Permisos/permisosClass.php");

class PermisosController {

    public function crear() {
        
        $objPerm = new PermisosClass();
        $sqlRol = "SELECT * FROM pag_rol";
        $sqlPermisos = "select * from pag_funcion,pag_permisos WHERE pag_permisos.func_id=pag_funcion.func_id;";
        
        $buscarPermisos = $objPerm->select($sqlPermisos);
        $buscarRol = $objPerm->select($sqlRol);
        $objPerm->cerrar();

        include_once '../view/Usuarios/permisos/crear.html.php';
    }

    public function crearPermisos($parametros = false) {

        $objPerm = new PermisosClass();
        $dirModulos = $objPerm->verFicheros();
        foreach ($dirModulos as $dirModulo) {

            // Registro el Modulo
            $sqlModulo = "INSERT INTO pag_modulo(mod_nombre,mod_descripcion) VALUES('$dirModulo','$dirModulo')";
            //$objPerm->insertar($sqlModulo);   
            //Registro los controladores de cada Modulo
//            $mod_id = $objPerm->find("SELECT MAX(mod_id) as mod_id FROM pag_modulo");

            $modulos = simplexml_load_file("../controller/$dirModulo/info.xml");
            //Registro de controladores
            foreach ($modulos->controladores->controlador as $controlador) {
                $sql = "INSERT INTO pag_controlador(mod_id,cont_nombre,cont_descripcion,estado)VALUES"
                        . "($mod_id[mod_id],'$controlador->display','$controlador->display',1)";
                
                $cont_id = $objPerm->find("SELECT MAX(cont_id) as cont_id FROM pag_controlador");
                //Registro de funciones
                foreach ($modulos->controladores->controlador->funciones->funcion as $funcion) {
                    $sqlFunciones = "INSERT INTO pag_funcion(cont_id,func_nombre,func_descripcion)VALUES"
                            . "($cont_id[cont_id],'$funcion->display','$funcion->display')";
                    //   $objPerm->insertar($sqlFunciones);
                }
                // $objPerm->insertar($sql);
            }

            $cont_id = $objPerm->find("SELECT MAX(cont_id) as cont_id FROM pag_controlador");
            // Resgitro funciones
            foreach ($modulos->controladores->controlador->funciones->funcion as $funcion) {
                $sqlFunciones = "INSERT INTO pag_funcion(cont_id,func_nombre,func_descripcion)VALUES"
                        . "($cont_id[cont_id],'$funcion->display','$funcion->display')";
                //   $objPerm->insertar($sqlFunciones);
            }
        }

        $sqlBuscar = "select * from pag_funcion WHERE cont_id='1'"; //Busqueda FUnciones PERMISOS
        $sqlLocalizacion = "select * from pag_funcion WHERE cont_id='2'"; //Busqueda FUnciones LOCALIZACION
        $sqlUsuarios = "select * from pag_funcion WHERE cont_id='3'"; //Busqueda FUnciones USUARIOS
        $sqlEquipos = "select * from pag_funcion WHERE cont_id='4'"; //Busqueda FUnciones EQUIPOS
        $sqlMedidores = "select * from pag_funcion WHERE cont_id='5'"; //Busqueda FUnciones MEDIDORES
        $sqlOT = "select * from pag_funcion WHERE cont_id='6'"; //Busqueda FUnciones OT
        $sqlRoles = "select * from pag_funcion WHERE cont_id='7'"; //Busqueda FUnciones ROLES
        $sqlInsumos = "select * from pag_funcion WHERE cont_id='8'"; //Busqueda FUnciones INSUMOS
        $sqlCostos = "select * from pag_funcion WHERE cont_id='9'"; //Busqueda FUnciones COSTOS
        $sqlHerramientas = "select * from pag_funcion WHERE cont_id='10'"; //Busqueda FUnciones HERRAMIENTAS
        $sqlPersonas = "select * from pag_funcion WHERE cont_id='11'"; //Busqueda FUnciones PERSONAS
        $sqlProgramacion = "select * from pag_funcion WHERE cont_id='12'"; //Busqueda FUnciones PROGRAMACION
        $sqlMediciones = "select * from pag_funcion WHERE cont_id='13'"; //Busqueda FUnciones MEDICIONES
        //Busqueda todos los roles
//        die(print_r($sqlBuscar));
        $funcionesBuscar = $objPerm->select($sqlBuscar);
        $buscarLocalizacion = $objPerm->select($sqlLocalizacion);
        $buscarUsuarios = $objPerm->select($sqlUsuarios);
        $buscarEquipos = $objPerm->select($sqlEquipos);
        $buscarMedidores = $objPerm->select($sqlMedidores);
        $buscarOT = $objPerm->select($sqlOT);
        $buscarRoles = $objPerm->select($sqlRoles);
        $buscarInsumos = $objPerm->select($sqlInsumos);
        $buscarCostos = $objPerm->select($sqlCostos);
        $buscarHerramientas = $objPerm->select($sqlHerramientas);
        $buscarPersonas = $objPerm->select($sqlPersonas);
        $buscarProgramacion = $objPerm->select($sqlProgramacion);
        $buscarMediciones = $objPerm->select($sqlMediciones);

        $id = $parametros[1];
        
        $sql = "SELECT * FROM pag_permisos WHERE rol_id='".$id."'";
        $buscarPermisos = $objPerm->find($sql);
        
        $sqlRol = "SELECT * FROM pag_rol where rol_id='".$id."'";
        $buscarRol = $objPerm->select($sqlRol);
        
        $objPerm->cerrar();

        include_once '../view/Usuarios/permisos/modalCrear.html.php';
    }

//cierre funcion Crear


    public function postCrear() {

        $rol_id = $_POST['roles'];
        $funcionModulos = $_POST['funcionesModulos'];

        $objPerm = new PermisosClass();

        foreach ($funcionModulos as $equipos) {
            $sqlPermisos = "INSERT INTO pag_permisos (func_id,rol_id)VALUES('$equipos','$rol_id')";
            $sqlInsertar = $objPerm->insertar($sqlPermisos);
        }

        if ($sqlInsertar) {
            redirect(crearUrl("permisos", "permisos", "crear"));
        } else {
            die(print_r("MALO"));
        }
    }

}
?>

