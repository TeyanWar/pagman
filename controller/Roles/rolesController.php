<?php

include_once '../model/Roles/rolesModel.php';

class RolesController {

    public function crear() {
        include_once ('../view/Usuarios/roles/crear.html.php');
    }

    public function postCrear() {
        
        $objRol = new rolesModel();
        
        $rol_nombre = isset($_POST['rol_nombre']) ? $_POST['rol_nombre'] : '';
        $rol_descripcion = isset($_POST['rol_descripcion']) ? $_POST['rol_descripcion'] : '';
                
        $objRol->rol_nombre['val']=$rol_nombre;
        $objRol->rol_descripcion['val']=$rol_descripcion;
        if ($this->camposCorrectos($objRol,false,'rol_nombre','rol_descripcion',false)) {
            $sql = "INSERT INTO pag_rol (rol_nombre,rol_descripcion) VALUES ('$rol_nombre','$rol_descripcion')";
            $crearRol = $objRol->insertar($sql);
        }
        
        $objRol->cerrar();
        
        echo getRespuestaAccion('listar');
    }

    public function listar() {

        $objRol = new rolesModel();
        $sqlBuscar = "SELECT * FROM pag_rol";

        $roles = $objRol->select($sqlBuscar);

        $pagina = (isset($_REQUEST['pagina'])?$_REQUEST['pagina']:1); 
        $url = crearUrl('roles', 'roles', 'listar');
        
        $paginado = new Paginado($roles, $pagina, $url);
        
        $roles = $paginado->getDatos();
        
        $objRol->cerrar();

        include_once("../view/Usuarios/roles/listar.html.php");
    }

    public function editar($parametros = false) {

        $objRol = new rolesModel();

        $rol_id = $parametros[1];

        $sqlBuscar = "SELECT * FROM pag_rol WHERE rol_id=$rol_id";
        $rol = $objRol->find($sqlBuscar);

        //Obtener funciones, y compararla con los permisos para checkear
        $funciones=$objRol->select("SELECT cont_id,func_id,func_display FROM pag_funcion");
        $permisos=$objRol->select("SELECT func_id FROM pag_permisos WHERE rol_id=$rol_id");
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
        $controladores=$objRol->select("SELECT mod_id, cont_id, cont_display FROM pag_controlador");
        $modulos=$objRol->select("SELECT mod_id,mod_nombre FROM pag_modulo");
        
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
        
        $objRol->cerrar();

        include_once("../view/Usuarios/roles/editar.html.php");
    }

    public function postEditar($parametros = false) {

        $objRol = new RolesModel();
        
        $objRol->rol_id['val'] = isset($_POST['rol_id']) ? $_POST['rol_id'] : '';
        $objRol->rol_nombre['val'] = isset($_POST['rol_nombre']) ? $_POST['rol_nombre'] : '';
        $objRol->rol_descripcion['val'] = isset($_POST['rol_descripcion']) ? $_POST['rol_descripcion'] : '';
        $objRol->funciones = isset($_POST['funciones']) ? $_POST['funciones'] : '';

        if($this->camposCorrectos($objRol, false,'rol_nombre','rol_descripcion','funciones')){
            
            //Eliminar los permisos que antes tenía para insertar los nuevos
            $objRol->delete("DELETE FROM pag_permisos WHERE rol_id=".$objRol->rol_id['val']);

            foreach ($objRol->funciones as $func_id) {
                $sqlPermisos = "INSERT INTO pag_permisos (func_id,rol_id)VALUES($func_id,".$objRol->rol_id['val'].")";
                $sqlInsertar = $objRol->insertar($sqlPermisos);
            }
            $sql = "UPDATE pag_rol  SET rol_nombre='".$objRol->rol_nombre['val']."', rol_descripcion='".$objRol->rol_descripcion['val']."' "
                    . "WHERE rol_id=".$objRol->rol_id['val'];
            $update = $objRol->update($sql);
        }
        
        $objRol->cerrar();
        
        echo getRespuestaAccion();
    }//postEditars

    public function verDetalle($parametros = false) {

        $objRol = new rolesModel();

        $rol_id = $parametros[1];
        $sql="SELECT rol_id, rol_nombre, rol_descripcion, estado FROM pag_rol WHERE rol_id=".$rol_id;
        $rol=$objRol->find($sql);
        
        //Contenedor de todas las funciones de cada módulo
        $funciones="";
        
        //Seleccionar los distintos módulos del rol
        $sql="SELECT DISTINCT m.mod_id, m.mod_nombre FROM pag_modulo m, pag_controlador c, pag_funcion f, pag_permisos p "
            . "WHERE p.func_id=f.func_id AND f.cont_id=c.cont_id AND c.mod_id=m.mod_id "
            . "AND p.rol_id=".$rol['rol_id'];
        $modulos= $objRol->select($sql);

        foreach($modulos as $keyMod=>$modulo){
            //Seleccionar las funciones de cada módulo del rol
            $sql="SELECT f.func_id, f.func_display "
                . "FROM pag_modulo m, pag_controlador c, pag_funcion f,pag_permisos p "
                . "WHERE p.func_id=f.func_id AND f.cont_id=c.cont_id AND c.mod_id=m.mod_id "
                . "AND m.mod_id=".$modulo['mod_id']." AND p.rol_id=".$rol['rol_id']
                . " ORDER BY f.func_id ASC";
            $funcionesBD= $objRol->select($sql);
            foreach($funcionesBD as $funcion){
                if ($funcion === end($funcionesBD)) {
                    $funciones.= "<em>".ucwords($funcion['func_display'])."</em>. ";
                }else{
                    $funciones.= "<em>".ucwords($funcion['func_display'])."</em>, ";
                }
            }
            $modulos[$keyMod]['funciones']=$funciones;
            $funciones="";
        }//foreach

        $rol['modulos']=$modulos;

        $objRol->cerrar();
        include_once("../view/Usuarios/roles/detalle.html.php");
    }

    public function eliminar() {
        
        $objRol = new rolesModel();

        $rol_id = $_POST['rol_id'];

        $sql = "UPDATE pag_rol SET estado = NOW() WHERE rol_id=" . $rol_id;
        //die(print_r($sql));
        $objRol->update($sql);

        // Cierra la conexion
        $objRol->cerrar();
        
        echo true;
    }

    public function camposCorrectos($objRol,$rol_id=false, $rol_nombre=false, $rol_descripcion=false, $funciones=false){
        
        $errores=array();
        
        if($rol_id){
            if(empty($objRol->rol_id['val'])) $errores[]= "Debe seleccionar un <code><b>rol</b></code>. ";
        }//rol_id
        
        if($rol_nombre){
            if (!between($objRol->rol_nombre['val'],$objRol->rol_nombre['min'],$objRol->rol_nombre['max'])) {
            $errores[] = "El campo <code><b>nombre</b></code> debe contener entre ".$objRol->rol_nombre['min']." y ".$objRol->rol_nombre['max']." caracteres.";
            }else{
                //Se creará un rol? Entonces verifique si su nombre es único en todos los registros
                if(empty($objRol->rol_id['val'])){
                    $sql="SELECT rol_nombre FROM pag_rol WHERE rol_nombre='".$objRol->rol_nombre['val']."'";// AND estado IS NULL";
                }//Se editará un rol? Entonces verifique si su nombre es único en todos los registros excepto el mismo
                else{
                    $sql="SELECT rol_nombre FROM pag_rol WHERE rol_nombre='".$objRol->rol_nombre['val']."' AND rol_id!=".$objRol->rol_id['val'];//." AND estado IS NULL";
                }
                $existeRol=$objRol->find($sql);
                if($existeRol) $errores[] = "Ya existe un rol registrado con el nombre <code><b>".$objRol->rol_nombre['val']."</b></code>.";
            }
        }//rol_nombre
        
        if($rol_descripcion){
            if (!between($objRol->rol_descripcion['val'],$objRol->rol_descripcion['min'],$objRol->rol_descripcion['max'])){
                $errores[] = "El campo <code><b>descripci&oacute;n</b></code> debe contener ".$objRol->rol_descripcion['max']." o menos caracteres.";
            }
        }//rol_descripcion
        
        if($funciones){
            if(empty($objRol->funciones)) $errores[]="Asignar al menos una <code><b>funci&oacute;n</b></code> al rol. ";
        }
        if(count($errores)>0){
            setErrores($errores);
            return false;
        }
                
        return true;
    }
    
}
