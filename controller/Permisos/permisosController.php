<?php

include_once("../model/Permisos/permisosClass.php");

class PermisosController {

    public function crear() {
        
        $objPerm = new PermisosClass();
        $sqlRol = "SELECT * FROM pag_rol";
        $sqlPermisos = "select * from pag_funcion,pag_permisos WHERE pag_permisos.func_id=pag_funcion.func_id;";
        
        $permisos = $objPerm->select($sqlPermisos);
        $roles = $objPerm->select($sqlRol);
        $objPerm->cerrar();
        $this->registrarActualizarPermisos();
        include_once '../view/Usuarios/permisos/crear.html.php';
    }

    public function crearPermisos($parametros = false) {

        $objPerm = new PermisosClass();
        
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
        
        $sqlRolActual = "SELECT * FROM pag_rol where rol_id='".$id."'";
        $rolActual = $objPerm->select($sqlRolActual);
        $objPerm->cerrar();

        include_once '../view/Usuarios/permisos/modalCrear.html.php';
    }//cierre funcion Crear
    
//    public function crearPermisos($parametros = false) {
//
//        $objPerm = new PermisosClass();
//        
//        $sqlBuscar = "select * from pag_funcion WHERE cont_id='1'"; //Busqueda FUnciones PERMISOS
//        $sqlLocalizacion = "select * from pag_funcion WHERE cont_id='2'"; //Busqueda FUnciones LOCALIZACION
//        $sqlUsuarios = "select * from pag_funcion WHERE cont_id='3'"; //Busqueda FUnciones USUARIOS
//        $sqlEquipos = "select * from pag_funcion WHERE cont_id='4'"; //Busqueda FUnciones EQUIPOS
//        $sqlMedidores = "select * from pag_funcion WHERE cont_id='5'"; //Busqueda FUnciones MEDIDORES
//        $sqlOT = "select * from pag_funcion WHERE cont_id='6'"; //Busqueda FUnciones OT
//        $sqlRoles = "select * from pag_funcion WHERE cont_id='7'"; //Busqueda FUnciones ROLES
//        $sqlInsumos = "select * from pag_funcion WHERE cont_id='8'"; //Busqueda FUnciones INSUMOS
//        $sqlCostos = "select * from pag_funcion WHERE cont_id='9'"; //Busqueda FUnciones COSTOS
//        $sqlHerramientas = "select * from pag_funcion WHERE cont_id='10'"; //Busqueda FUnciones HERRAMIENTAS
//        $sqlPersonas = "select * from pag_funcion WHERE cont_id='11'"; //Busqueda FUnciones PERSONAS
//        $sqlProgramacion = "select * from pag_funcion WHERE cont_id='12'"; //Busqueda FUnciones PROGRAMACION
//        $sqlMediciones = "select * from pag_funcion WHERE cont_id='13'"; //Busqueda FUnciones MEDICIONES
//        //Busqueda todos los roles
////        die(print_r($sqlBuscar));
//        $funcionesBuscar = $objPerm->select($sqlBuscar);
//        $buscarLocalizacion = $objPerm->select($sqlLocalizacion);
//        $buscarUsuarios = $objPerm->select($sqlUsuarios);
//        $buscarEquipos = $objPerm->select($sqlEquipos);
//        $buscarMedidores = $objPerm->select($sqlMedidores);
//        $buscarOT = $objPerm->select($sqlOT);
//        $buscarRoles = $objPerm->select($sqlRoles);
//        $buscarInsumos = $objPerm->select($sqlInsumos);
//        $buscarCostos = $objPerm->select($sqlCostos);
//        $buscarHerramientas = $objPerm->select($sqlHerramientas);
//        $buscarPersonas = $objPerm->select($sqlPersonas);
//        $buscarProgramacion = $objPerm->select($sqlProgramacion);
//        $buscarMediciones = $objPerm->select($sqlMediciones);
//
//        $id = $parametros[1];
//        
//        $sql = "SELECT * FROM pag_permisos WHERE rol_id='".$id."'";
//        $buscarPermisos = $objPerm->find($sql);
//        
//        $sqlRolActual = "SELECT * FROM pag_rol where rol_id='".$id."'";
//        $rolActual = $objPerm->select($sqlRolActual);
//        $objPerm->cerrar();
//
//        include_once '../view/Usuarios/permisos/modalCrear.html.php';
//    }//cierre funcion Crear

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
            die("Error al asignar permisos, por favor comun&iacute;carse con soporte");
        }
    }//postCrear
    
    public function registrarActualizarPermisos(){

        $objPerm = new PermisosClass();
        $dirModulos = $objPerm->verFicheros();
        //Recorrer cada fichero para extraer módulos del archivo info.xml
        foreach ($dirModulos as $dirModulo) {
            $modulo = simplexml_load_file("../controller/$dirModulo/info.xml");
            
            // Validar existencia de módulo
            $existeModulo=$objPerm->find("SELECT * FROM pag_modulo WHERE mod_nombre='$modulo->nombre'");
            if($existeModulo){
                $mod_id = array('mod_id'=>$existeModulo['mod_id']);
                $objPerm->update("UPDATE pag_modulo SET mod_descripcion='$modulo->descripcion' WHERE mod_id=".$existeModulo['mod_id']);
            }else{
                $sqlModulo = "INSERT INTO pag_modulo(mod_nombre,mod_descripcion) VALUES('$modulo->nombre','$modulo->descripcion')";
                $objPerm->insertar($sqlModulo);
                $mod_id = $objPerm->find("SELECT MAX(mod_id) as mod_id FROM pag_modulo");
            }//if
            
            foreach ($modulo->controladores->controlador as $controlador) {
                //Validar existencia de controlador
                $existeControlador=$objPerm->find("SELECT * FROM pag_controlador WHERE cont_nombre='$controlador->nombre'");
                if($existeControlador){
                    $cont_id=array('cont_id'=>$existeControlador['cont_id']);
                    $objPerm->update("UPDATE pag_controlador SET cont_display='$controlador->display', cont_descripcion='$controlador->descripcion' "
                            . "WHERE cont_id=".$existeControlador['cont_id']);
                }else{
                    $sqlControlador = "INSERT INTO pag_controlador(mod_id,cont_nombre,cont_display,cont_descripcion,estado) VALUES"
                            . "(".$mod_id['mod_id'].",'$controlador->nombre','$controlador->display','$controlador->descripcion',1)";
                    $objPerm->insertar($sqlControlador);
                    $cont_id = $objPerm->find("SELECT MAX(cont_id) as cont_id FROM pag_controlador");
                }//if
                
                foreach ($controlador->funciones->funcion as $funcion) {
                    //Validar existencia de función
                    $existeFuncion=$objPerm->find("SELECT * FROM pag_funcion WHERE func_display='$funcion->display'");
                    if($existeFuncion){
                        $objPerm->update("UPDATE pag_funcion SET func_nombre='$funcion->nombre', func_descripcion='$funcion->descripcion' "
                                . "WHERE func_id=".$existeFuncion['func_id']);
                    }else{
                        $sqlFuncion = "INSERT INTO pag_funcion(cont_id,func_nombre,func_display,func_descripcion) VALUES"
                                . "(".$cont_id['cont_id'].",'$funcion->nombre','$funcion->display','$funcion->descripcion')";
                        $objPerm->insertar($sqlFuncion);
                    }//if
                    
                }//foreach funciones
            }//foreach controladores
        }//foreach ficheros
        
    }//registrarActualizarPermisos

}
?>

