<?php

include_once '../model/Permisos/permisosClass.php';

class MenuClass{
    
    function __construct() {
    }
    
    public function getModulos(){
        
        $objPerm=new PermisosClass();
        $rol_id=$_SESSION['login']['rol_id'];

        //Obtener funciones, y compararla con los permisos para checkear
        $funciones=$objPerm->select("SELECT f.cont_id, f.func_id, f.func_nombre, f.func_display FROM pag_funcion f, pag_permisos p 
            WHERE p.func_id=f.func_id AND p.rol_id=".$rol_id);
        //Obtener controladores y módulos
        $controladores=$objPerm->select("SELECT DISTINCT c.mod_id, c.cont_id, c.cont_nombre, c.cont_icono, c.cont_display 
            FROM pag_controlador c, pag_funcion f, pag_permisos p 
            WHERE p.func_id=f.func_id AND f.cont_id=c.cont_id AND p.rol_id=".$rol_id);
        $modulos=$objPerm->select("SELECT DISTINCT m.mod_id, m.mod_nombre, m.mod_icono, m.mod_sitio_menu 
            FROM pag_modulo m, pag_controlador c, pag_funcion f, pag_permisos p  
            WHERE p.func_id=f.func_id AND f.cont_id=c.cont_id AND c.mod_id=m.mod_id AND p.rol_id=".$rol_id);
//        dd($funciones);
        //Inicio modificación de vector módulos
            //Añadir a cada controlador sus respectivas funciones
            foreach($controladores as $key=>$controlador){
                $controladores[$key]['cont_nombre']=  str_replace("Controller", "", $controlador['cont_nombre']);
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
        
        $modulosMenu=array('principal'=>array(),'configuracion'=>array());
        //Separo los módulos de según sitio en el menú    
        foreach($modulos as $modulo){
            if($modulo['mod_sitio_menu']=='principal'){
                $modulosMenu['principal'][]=$modulo;
            }else{
                $modulosMenu['configuracion'][]=$modulo;
            }
        }

        return $modulosMenu;
    }
}