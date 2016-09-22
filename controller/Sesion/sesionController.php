<?php

include_once('../model/Sesion/sesionModel.php');

class SesionController {

    function postInicio() {
        $nom_usu = $_POST['nom_usu'];
        $pass_usu = $_POST['pass_usu'];
        $salt = '$bgr$/';
        $password = sha1(md5($salt . $pass_usu));
        

        $objSesion = new sesionModel();
        $sql = "SELECT * FROM pag_usuario WHERE usu_usuario='$nom_usu' and usu_clave='$password '";

        $consultar = $objSesion->find($sql);

        if ($consultar) {
            $arraySesion['sesion'] = $consultar;

            if ($arraySesion['sesion']['usu_estado'] == 'activo') {

                $sql = "select *,pag_permisos.func_id from pag_usuario,pag_persona,pag_rol,pag_permisos,pag_funcion 
                    where 
                    pag_usuario.per_id=pag_persona.per_id
                    and pag_permisos.func_id = pag_funcion.func_id
                    and pag_usuario.rol_id = pag_rol.rol_id
                    and pag_permisos.rol_id = pag_rol.rol_id
                    and pag_permisos.rol_id='" . $arraySesion['sesion']['rol_id'] . "' and pag_usuario.per_id='" . $arraySesion['sesion']['per_id'] . "'";
                $consultarUsuario = $objSesion->find($sql);
                $_SESSION['login'] = $consultarUsuario;
                
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }

        // Cierra la conexion
        $objSesion->cerrar();
    }

    function cerrarSesion() {
        unset($_SESSION['login']);
        redirect(addLib(''));
    }

    function nombreUsuario() {
        
    }

}
