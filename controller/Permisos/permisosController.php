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
        $rol_id=$parametros[1];
        
        //Obtener funciones, y compararla con los permisos para checkear
        $funciones=$objPerm->select("SELECT cont_id,func_id,func_display FROM pag_funcion");
        $permisos=$objPerm->select("SELECT func_id FROM pag_permisos WHERE rol_id=$rol_id");
        foreach($funciones as $key=>$funcion){
            $funciones[$key]['checkeado']='';
            foreach($permisos as $permiso){
                if($funcion['func_id']==$permiso['func_id']){
                    $funciones[$key]['checkeado']='checked';
                    break;
                }
            }
        }//foreach
        //Obtener controladores y módulos
        $controladores=$objPerm->select("SELECT mod_id, cont_id, cont_display FROM pag_controlador");
        $modulos=$objPerm->select("SELECT mod_id,mod_nombre FROM pag_modulo");
        
        //Inicio modificación de vector módulos
            //Añadir a cada controlador sus respectivas funciones
            foreach($controladores as $key=>$controlador){
                foreach($funciones as $funcion){
                    if($controlador['cont_id']==$funcion['cont_id']){
                        $controladores[$key]['funciones'][]=$funcion;
                    }
                }
            }
            //Añadir a cada módulo sus respectivos controladores
            foreach($modulos as $key=>$modulo){
                foreach($controladores as $controlador){
                    if($modulo['mod_id']==$controlador['mod_id']){
                        $modulos[$key]['controladores'][]=$controlador;
                    }
                }
            }
        //Fin vector maestro

        //Obtener datos del rol actual
        $sqlRolActual = "SELECT * FROM pag_rol where rol_id=$rol_id";
        $rolActual = $objPerm->select($sqlRolActual);
        
        $objPerm->cerrar();
        
        include_once '../view/Usuarios/permisos/modalCrear.html.php';
    }//cierre funcion Crear
    
    public function postCrear() {
        $objPerm = new PermisosClass();
        $rol_id = $_POST['roles'];
        $funciones = $_POST['funciones'];

        //Eliminar los permisos que antes tenía para insertar los nuevos
        $objPerm->delete("DELETE FROM pag_permisos WHERE rol_id=".$rol_id);
        
        foreach ($funciones as $func_id) {
            $sqlPermisos = "INSERT INTO pag_permisos (func_id,rol_id)VALUES($func_id,$rol_id)";
            $sqlInsertar = $objPerm->insertar($sqlPermisos);
        }

        redirect(crearUrl("permisos", "permisos", "crear"));
        
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

    public function validarAcceso($cadena){
        $objPermiso = new PermisosClass();
        
        $sql= "SELECT cont_id FROM pag_controlador WHERE cont_nombre='$cadena[2]Controller'";
        $controlador=$objPermiso->find($sql);
        $cont_id=$controlador['cont_id'];
        
        $sql="SELECT func_id FROM pag_funcion WHERE cont_id=$cont_id AND func_nombre='$cadena[3]'";
        $funcion=$objPermiso->find($sql);

        //Si la función existe entonces validar si el rol la tiene asignada
        if($funcion){
            $func_id=$funcion['func_id'];        
            $sql="SELECT * FROM pag_permisos WHERE func_id=$func_id AND rol_id=".$_SESSION['login']['rol_id'];
            $permiso=$objPermiso->find($sql);
            //No la tiene asignada?
            if(empty($permiso)){
                return false;
//                die("No tiene permisos para acceder a la función solicitada, contacte con soporte");
            }
            
        }
        
        ////Sino existe la función, dejelo pasar porque es una función a la que no hay que controlar el acceso
        //Por ejemplo: Una función ajax, una función para validar, etc.
        
        return true;
    }//validarAcceso
    
}
?>

