<?php

include_once('../model/Usuarios/usuariosModel.php');

class UsuariosController {

    function editar($parametros = false) {

        //-------Consulta de tablas para el formulario editar------

        $objUsuarios = new UsuariosModel();

        $sql = "SELECT rol_id,rol_nombre FROM pag_rol";
        $perfiles = $objUsuarios->select($sql);

        //---------------------------------------------

        $sql = "SELECT * FROM pag_departamento";
        $departamentos = $objUsuarios->select($sql);

        //---------------------------------------------

        $sql = "SELECT * FROM pag_cargo";
        $cargos = $objUsuarios->select($sql);

        //---------------------------------------------

        $sql = "SELECT cen_id,cen_nombre FROM pag_centro";
        $centros = $objUsuarios->select($sql);

        // Cierra la conexion
        $objUsuarios->cerrar();

        //---------------------fin consultas----------------
        //--------------------------------------------------*/

        $UsuariosModel = new UsuariosModel();

        $id = $parametros[1];

        $sql = "SELECT pag_persona.per_tipo "
                . "FROM pag_persona "
                . "WHERE pag_persona.per_id='$id'";

        $comprobar = $UsuariosModel->find($sql);

        if ($comprobar['per_tipo'] === 'persona') {

            $sql = "SELECT pag_persona.per_id,pag_persona.per_nombre,pag_persona.per_apellido,"
                    . "pag_persona.per_telefono,pag_persona.per_movil,"
                    . "pag_persona.per_email,pag_persona.per_direccion,"
                    . "pag_persona.per_valor_hora,pag_departamento.dept_id,"
                    . "pag_cargo.car_id,pag_centro.cen_id "
                    . "FROM pag_persona,pag_cargo,pag_departamento,pag_centro "
                    . "WHERE pag_persona.dept_id=pag_departamento.dept_id "
                    . "and pag_persona.car_id=pag_cargo.car_id "
                    . "and pag_persona.cen_id=pag_centro.cen_id and pag_persona.per_id='$id'";

            $per = $UsuariosModel->find($sql);

            include_once("../view/Usuarios/personas/editar.html.php");
        } else {

            $sql = "SELECT pag_rol.rol_id,"
                    . "pag_usuario.usu_usuario,pag_usuario.usu_clave,"
                    . "pag_usuario.usu_estado,pag_persona.per_id,"
                    . "pag_persona.per_nombre,pag_persona.per_apellido,"
                    . "pag_persona.per_telefono,pag_persona.per_movil,"
                    . "pag_persona.per_email,pag_persona.per_direccion,"
                    . "pag_persona.per_valor_hora,pag_departamento.dept_id,"
                    . "pag_cargo.car_id,pag_centro.cen_id "
                    . "FROM pag_usuario,pag_persona,pag_rol,pag_cargo,"
                    . "pag_departamento,pag_centro "
                    . "WHERE pag_usuario.rol_id=pag_rol.rol_id "
                    . "and pag_usuario.per_id=pag_persona.per_id "
                    . "and pag_persona.dept_id=pag_departamento.dept_id "
                    . "and pag_persona.car_id=pag_cargo.car_id "
                    . "and pag_persona.cen_id=pag_centro.cen_id and pag_persona.per_id='$id'";

            $usu = $UsuariosModel->find($sql);

            include_once("../view/Usuarios/usuarios/editar.html.php");
        }

        // Cierra la conexion
        $UsuariosModel->cerrar();
        //*---------------------------------------------------------
    }

    function postEditar() {

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

        $objUsuarios = new UsuariosModel();

        $sqli = "SELECT pag_persona.per_tipo "
                . "FROM pag_persona "
                . "WHERE pag_persona.per_id='$id'";

        $comprobar = $objUsuarios->find($sqli);

        //--------expresiones regulares--------------------
        $errores = array();
        $patronNumeros = "/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $NumerosLetras = "/^[0-9a-zA-Z]+$/";
        $patronCorreo = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        $patronDireccio = "/^.*(?=.*[0-9])(?=.*[a-zA-ZñÑ\s]).*$/";

        //--------------VALIDACIONES---------------------------------------

        if ($comprobar['per_tipo'] === 'usuario del sistema') {

            if (!isset($_POST['login']) or $_POST['login'] == "") {
                $errores[] = '<h6><strong>(*) Para editar usuario el campo "login" es obligatorio</strong><h6>';
            }
            
            if (isset($_POST['clave']) && !preg_match($NumerosLetras, $_POST['clave'])) {
                $errores[] = '<h6><strong>(*) Para editar usuario el campo "clave" debe contener numeros o letras unicamente</strong><h6>';
            }

            if (!isset($_POST['perfil']) or $_POST['perfil'] == "") {
                $errores[] = '<h6><strong>(*) Para editar usuario el campo "perfil" es obligatorio</strong><h6>';
            }

            if (!isset($_POST['departamento']) or $_POST['departamento'] == "") {
                $errores[] = '(*) Para editar usuario el campo "departamento" es obligatorio';
            }

            if (!isset($_POST['centro']) or $_POST['centro'] == "") {
                $errores[] = '(*) Para editar usuario el campo "centro" es obligatorio';
            }

            if (!isset($_POST['cargo']) or $_POST['cargo'] == "") {
                $errores[] = '(*) Para editar usuario el campo "cargo" es obligatorio';
            }

            if (!isset($_POST['id']) or $_POST['id'] == "") {
                $errores[] = '(*) Para editar usuario el campo "identificacion" es obligatorio';
            }
            if (isset($_POST['id']) && !preg_match($patronNumeros, $_POST['id'])) {
                $errores[] = '(*) Para editar usuario el campo "identificacion" debe contener numeros unicamente';
            }

            if (!isset($_POST['nombre']) or $_POST['nombre'] == "") {
                $errores[] = '(*) Para editar usuario el campo "nombre" es obligatorio';
            }
            if (isset($_POST['nombre']) && !preg_match($patronLetras, $_POST['nombre'])) {
                $errores[] = '(*) Para editar usuario el campo "nombre" debe contener letras unicamente';
            }

            if (!isset($_POST['apellido']) or $_POST['apellido'] == "") {
                $errores[] = '(*) Para editar usuario el campo "apellido" es obligatorio';
            }
            if (isset($_POST['apellido']) && !preg_match($patronLetras, $_POST['apellido'])) {
                $errores[] = '(*) Para editar usuario el campo "apellido" debe contener letras unicamente';
            }

            if (!isset($_POST['telefono']) or $_POST['telefono'] == "") {
                $errores[] = '(*) Para editar usuario el campo "telefono" es obligatorio';
            }
            if (isset($_POST['telefono']) && !preg_match($patronNumeros, $_POST['telefono'])) {
                $errores[] = '(*) Para editar usuario el campo "telefono" debe contener numeros unicamente';
            }

            if (!isset($_POST['movil']) or $_POST['movil'] == "") {
                $errores[] = '(*) Para editar usuario el campo "movil" es obligatorio';
            }
            if (isset($_POST['movil']) && !preg_match($patronNumeros, $_POST['movil'])) {
                $errores[] = '(*) Para editar usuario el campo "movil" debe contener numeros unicamente';
            }

            if (!isset($_POST['email']) or $_POST['email'] == "") {
                $errores[] = '(*) Para editar usuario el campo "email" es obligatorio';
            }
            if (isset($_POST['email']) && !preg_match($patronCorreo, $_POST['email'])) {
                $errores[] = '(*) Para editar usuario el campo "email" debe ser valido';
            }

            if (!isset($_POST['direccion']) or $_POST['direccion'] == "") {
                $errores[] = '(*) Para editar usuario el campo "direccion" es obligatorio';
            }
            if (isset($_POST['direccion']) && !preg_match($patronDireccio, $_POST['direccion'])) {
                $errores[] = '(*) Para editar usuario el campo "direccion" debe ser valido';
            }

            if (!isset($_POST['valorhora']) or $_POST['valorhora'] == "") {
                $errores[] = '(*) Para editar usuario el campo "valor hora" es obligatorio';
            }
            if (isset($_POST['valorhora']) && !preg_match($patronNumeros, $_POST['valorhora'])) {
                $errores[] = '(*) Para editar usuario el campo "valor hora" debe contener numeros unicamente';
            }

            if (count($errores) > 0) {
                setErrores($errores);
                redirect(crearUrl("usuarios", "usuarios", "listar"));
                //----------------fin validaciones-----------------
            } else {

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

                $respuesta1 = $objUsuarios->update($sql);

                if ($comprobar['per_tipo'] == 'usuario del sistema' &&
                        isset($_POST['login']) &&
                        isset($_POST['clave']) &&
                        isset($_POST['estado']) &&
                        isset($_POST['perfil'])) {

                    $login = $_POST['login'];
                    $clave = $_POST['clave'];
                    //aqui Inicia encriptacion de Password
                    $salt = '$bgr$/';
                    $password = sha1(md5($salt . $clave));
                    //aqui termina encriptacion password
                    $estado = $_POST['estado'];
                    $perfil = $_POST['perfil'];

                    $sqls = "UPDATE "
                            . "pag_usuario "
                            . "SET "
                            . "usu_usuario='$login',"
                            . "usu_clave='$password',"
                            . "usu_estado='$estado',"
                            . "rol_id='$perfil' "
                            . "WHERE per_id='$id'";

                    $respuesta = $objUsuarios->update($sqls);
                }
            }
        } else {

            if (!isset($_POST['departamento']) or $_POST['departamento'] == "") {
                $errores[] = '(*) El campo "departamento" es obligatorio';
            }

            if (!isset($_POST['centro']) or $_POST['centro'] == "") {
                $errores[] = '(*) El campo "centro" es obligatorio';
            }

            if (!isset($_POST['cargo']) or $_POST['cargo'] == "") {
                $errores[] = '(*) El campo "cargo" es obligatorio';
            }

            if (!isset($_POST['id']) or $_POST['id'] == "") {
                $errores[] = '(*) El campo "identificacion" es obligatorio';
            }
            if (isset($_POST['id']) && !preg_match($patronNumeros, $_POST['id'])) {
                $errores[] = '(*) El campo "identificacion" debe contener numeros unicamente';
            }

            if (!isset($_POST['nombre']) or $_POST['nombre'] == "") {
                $errores[] = '(*) El campo "nombre" es obligatorio';
            }
            if (isset($_POST['nombre']) && !preg_match($patronLetras, $_POST['nombre'])) {
                $errores[] = '(*) El campo "nombre" debe contener letras unicamente';
            }

            if (!isset($_POST['apellido']) or $_POST['apellido'] == "") {
                $errores[] = '(*) El campo "apellido" es obligatorio';
            }
            if (isset($_POST['apellido']) && !preg_match($patronLetras, $_POST['apellido'])) {
                $errores[] = '(*) El campo "apellido" debe contener letras unicamente';
            }

            if (!isset($_POST['telefono']) or $_POST['telefono'] == "") {
                $errores[] = '(*) El campo "telefono" es obligatorio';
            }
            if (isset($_POST['telefono']) && !preg_match($patronNumeros, $_POST['telefono'])) {
                $errores[] = '(*) El campo "telefono" debe contener numeros unicamente';
            }

            if (!isset($_POST['movil']) or $_POST['movil'] == "") {
                $errores[] = '(*) El campo "movil" es obligatorio';
            }
            if (isset($_POST['movil']) && !preg_match($patronNumeros, $_POST['movil'])) {
                $errores[] = '(*) El campo "movil" debe contener numeros unicamente';
            }

            if (!isset($_POST['email']) or $_POST['email'] == "") {
                $errores[] = '(*) El campo "email" es obligatorio';
            }
            if (isset($_POST['email']) && !preg_match($patronCorreo, $_POST['email'])) {
                $errores[] = '(*) El campo "email" debe ser valido';
            }

            if (!isset($_POST['direccion']) or $_POST['direccion'] == "") {
                $errores[] = '(*) El campo "direccion" es obligatorio';
            }
            if (isset($_POST['direccion']) && !preg_match($patronDireccio, $_POST['direccion'])) {
                $errores[] = '(*) El campo "direccion" debe ser valido';
            }

            if (!isset($_POST['valorhora']) or $_POST['valorhora'] == "") {
                $errores[] = '(*) El campo "valor hora" es obligatorio';
            }
            if (isset($_POST['valorhora']) && !preg_match($patronNumeros, $_POST['valorhora'])) {
                $errores[] = '(*) El campo "valor hora" debe contener numeros unicamente';
            }

            if (count($errores) > 0) {
                setErrores($errores);
                redirect(crearUrl("usuarios", "usuarios", "listar"));
                //----------------fin validaciones-----------------
            } else {

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

                $respuesta2 = $objUsuarios->update($sql);
            }
        }

        // Cierra la conexion
        $objUsuarios->cerrar();

        redirect(crearUrl("usuarios", "usuarios", "listar"));
    }

    function listar() {
        include_once("../view/Usuarios/usuarios/consultar.html.php");
    }

    function consultarAjax() {
        $objUsuarios = new UsuariosModel();

        $usuario = $_POST['usuario'];

        $sql = "SELECT pag_persona.per_id,pag_persona.per_nombre,"
                . "pag_persona.per_apellido,pag_persona.per_tipo "
                . "FROM pag_persona "
                . "WHERE pag_persona.per_id LIKE '%$usuario%' "
                . "OR pag_persona.per_nombre LIKE '%$usuario%' "
                . "OR pag_persona.per_apellido LIKE '%$usuario%' "
                . "OR pag_persona.per_tipo LIKE '%$usuario%' "
                . "ORDER BY pag_persona.per_id ASC";

        $usuar = $objUsuarios->select($sql);

        /*
         * Paginado
         */
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('usuarios', 'usuarios', 'listar');
        $paginado = new Paginado($usuar, $pagina, $url);
        $usuar = $paginado->getDatos();
        /*
         * Fin paginado
         */

        // Cierra la conexion
        $objUsuarios->cerrar();

        include_once("../view/Usuarios/usuarios/listar.html.php");
    }

    function consultar() {
        $objUsuarios = new UsuariosModel();

        $sql = "SELECT pag_persona.per_id,pag_persona.per_nombre,"
                . "pag_persona.per_apellido,pag_persona.per_tipo "
                . "FROM pag_persona ";

        $usuar = $objUsuarios->select($sql);

        // Cierra la conexion
        $objUsuarios->cerrar();

        include_once("../view/Usuarios/usuarios/listar.html.php");
    }

    //------no se puede hacer select dependiente
    //la tabla pag_centro y pag_departamento no estan relacionados
//    function selectCentro() {
//        $id = $_POST['id'];
//
//        $objUsuarios = new UsuariosModel();
//
//        $sql = "";
//
//        $centros = $objUsuarios->select($sql);
//
//        $objUsuarios->cerrar();
//
//        include_once("../view/Usuarios/usuarios/selectCentro.html.php");
//    }


    function crear() {

        $objUsuarios = new UsuariosModel();

        $sql = "SELECT rol_id,rol_nombre FROM pag_rol";
        $perfiles = $objUsuarios->select($sql);

        //---------------------------------------------

        $sql = "SELECT * FROM pag_departamento";
        $departamentos = $objUsuarios->select($sql);

        //---------------------------------------------

        $sql = "SELECT * FROM pag_cargo";
        $cargos = $objUsuarios->select($sql);

        //---------------------------------------------

        $sql = "SELECT cen_id,cen_nombre FROM pag_centro";
        $centros = $objUsuarios->select($sql);

        // Cierra la conexion
        $objUsuarios->cerrar();

        include_once("../view/Usuarios/usuarios/crear.html.php");
    }

    function postCrear() {

        $objUsuarios = new UsuariosModel();


        //--------expresiones regulares--------------------
        $errores = array();
        $patronNumeros = "/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $NumerosLetras = "/^[0-9a-zA-Z]+$/";
        $patronCorreo = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        $patronDireccio = "/^.*(?=.*[0-9])(?=.*[a-zA-ZñÑ\s]).*$/";

        //-----------------validaciones para usuario--------------------
        if (isset($_POST) &&
                isset($_POST['login']) && $_POST['login'] != "" or
                isset($_POST['clave']) && $_POST['clave'] != "" or
                isset($_POST['estado']) && $_POST['estado'] != "" or
                isset($_POST['perfil']) && $_POST['perfil'] != "") {

            if (!isset($_POST['login']) or $_POST['login'] == "") {
                $errores[] = '<h6><strong>(*) Para el registro de usuario el campo "login" es obligatorio</strong><h6>';
            }

            if (!isset($_POST['clave']) or $_POST['clave'] == "") {
                $errores[] = '<h6><strong>(*) Para el registro de usuario el campo "clave" es obligatorio</strong><h6>';
            }
            
            if (isset($_POST['clave']) && !preg_match($NumerosLetras, $_POST['clave'])) {
                $errores[] = '<h6><strong>(*) Para el registro de usuario el campo "clave" debe contener numeros o letras unicamente</strong><h6>';
            }

            if (!isset($_POST['estado']) or $_POST['estado'] == "") {
                $errores[] = '<h6><strong>(*) Para el registro de usuario el campo "estado" es obligatorio</strong><h6>';
            }

            if (!isset($_POST['perfil']) or $_POST['perfil'] == "") {
                $errores[] = '<h6><strong>(*) Para el registro de usuario el campo "perfil" es obligatorio</strong><h6>';
            }

            if (!isset($_POST['departamento']) or $_POST['departamento'] == "") {
                $errores[] = '(*) El campo departamento es obligatorio';
            }

            if (!isset($_POST['centro']) or $_POST['centro'] == "") {
                $errores[] = '(*) El campo "centro" es obligatorio';
            }

            if (!isset($_POST['cargo']) or $_POST['cargo'] == "") {
                $errores[] = '(*) El campo "cargo" es obligatorio';
            }

            if (!isset($_POST['identificacion']) or $_POST['identificacion'] == "") {
                $errores[] = '(*) El campo "identificacion" es obligatorio';
            }
            if (isset($_POST['identificacion']) && !preg_match($patronNumeros, $_POST['identificacion'])) {
                $errores[] = '(*) El campo "identificacion" debe contener numeros unicamente';
            }

            //-------------------------------------------------------------
            $doc = "SELECT per_id FROM pag_persona";
            $ids = $objUsuarios->select($doc);

            foreach ($ids as $id) {
                if ($id['per_id'] == $_POST['identificacion']) {
                    $errores[] = '<strong>(*) El No. Identificacion ingresado ya se encuentra registrado</strong>';
                }
            }
            //-------------------------------------------------------------

            if (!isset($_POST['nombre']) or $_POST['nombre'] == "") {
                $errores[] = '(*) El campo "nombre" es obligatorio';
            }
            if (isset($_POST['nombre']) && !preg_match($patronLetras, $_POST['nombre'])) {
                $errores[] = '(*) El campo "nombre" debe contener letras unicamente';
            }

            if (!isset($_POST['apellido']) or $_POST['apellido'] == "") {
                $errores[] = '(*) El campo "apellido" es obligatorio';
            }
            if (isset($_POST['apellido']) && !preg_match($patronLetras, $_POST['apellido'])) {
                $errores[] = '(*) El campo "apellido" debe contener letras unicamente';
            }

            if (!isset($_POST['telefono']) or $_POST['telefono'] == "") {
                $errores[] = '(*) El campo "telefono" es obligatorio';
            }
            if (isset($_POST['telefono']) && !preg_match($patronNumeros, $_POST['telefono'])) {
                $errores[] = '(*) El campo "telefono" debe contener numeros unicamente';
            }

            if (!isset($_POST['movil']) or $_POST['movil'] == "") {
                $errores[] = '(*) El campo "movil" es obligatorio';
            }
            if (isset($_POST['movil']) && !preg_match($patronNumeros, $_POST['movil'])) {
                $errores[] = '(*) El campo "movil" debe contener numeros unicamente';
            }

            if (!isset($_POST['email']) or $_POST['email'] == "") {
                $errores[] = '(*) El campo "email" es obligatorio';
            }
            if (isset($_POST['email']) && !preg_match($patronCorreo, $_POST['email'])) {
                $errores[] = '(*) El campo "email" debe ser valido';
            }

            if (!isset($_POST['direccion']) or $_POST['direccion'] == "") {
                $errores[] = '(*) El campo "direccion" es obligatorio';
            }
            if (isset($_POST['direccion']) && !preg_match($patronDireccio, $_POST['direccion'])) {
                $errores[] = '(*) El campo "direccion" debe ser valido';
            }

            if (!isset($_POST['valorhora']) or $_POST['valorhora'] == "") {
                $errores[] = '(*) El campo "valor hora" es obligatorio';
            }
            if (isset($_POST['valorhora']) && !preg_match($patronNumeros, $_POST['valorhora'])) {
                $errores[] = '(*) El campo "valor hora" debe contener numeros unicamente';
            }
        } else {
            //-----------------validaciones para persona--------------------

            if (!isset($_POST['departamento']) or $_POST['departamento'] == "") {
                $errores[] = '(*) El campo "departamento" es obligatorio';
            }

            if (!isset($_POST['centro']) or $_POST['centro'] == "") {
                $errores[] = '(*) El campo "centro" es obligatorio';
            }

            if (!isset($_POST['cargo']) or $_POST['cargo'] == "") {
                $errores[] = '(*) El campo "cargo" es obligatorio';
            }

            if (!isset($_POST['identificacion']) or $_POST['identificacion'] == "") {
                $errores[] = '(*) El campo "identificacion" es obligatorio';
            }
            if (isset($_POST['identificacion']) && !preg_match($patronNumeros, $_POST['identificacion'])) {
                $errores[] = '(*) El campo "identificacion" debe contener numeros unicamente';
            }

            //-------------------------------------------------------------
            $doc = "SELECT per_id FROM pag_persona";
            $ids = $objUsuarios->select($doc);

            foreach ($ids as $id) {
                if ($id['per_id'] === $_POST['identificacion']) {
                    $errores[] = '<strong>(*) El No. Identificacion ingresado ya se encuentra registrado</strong>';
                }
            }
            //-------------------------------------------------------------

            if (!isset($_POST['nombre']) or $_POST['nombre'] == "") {
                $errores[] = '(*) El campo "nombre" es obligatorio';
            }
            if (isset($_POST['nombre']) && !preg_match($patronLetras, $_POST['nombre'])) {
                $errores[] = '(*) El campo "nombre" debe contener letras unicamente';
            }

            if (!isset($_POST['apellido']) or $_POST['apellido'] == "") {
                $errores[] = '(*) El campo "apellido" es obligatorio';
            }
            if (isset($_POST['apellido']) && !preg_match($patronLetras, $_POST['apellido'])) {
                $errores[] = '(*) El campo "apellido" debe contener letras unicamente';
            }

            if (!isset($_POST['telefono']) or $_POST['telefono'] == "") {
                $errores[] = '(*) El campo "telefono" es obligatorio';
            }
            if (isset($_POST['telefono']) && !preg_match($patronNumeros, $_POST['telefono'])) {
                $errores[] = '(*) El campo "telefono" debe contener numeros unicamente';
            }

            if (!isset($_POST['movil']) or $_POST['movil'] == "") {
                $errores[] = '(*) El campo "movil" es obligatorio';
            }
            if (isset($_POST['movil']) && !preg_match($patronNumeros, $_POST['movil'])) {
                $errores[] = '(*) El campo "movil" debe contener numeros unicamente';
            }

            if (!isset($_POST['email']) or $_POST['email'] == "") {
                $errores[] = '(*) El campo "email" es obligatorio';
            }
            if (isset($_POST['email']) && !preg_match($patronCorreo, $_POST['email'])) {
                $errores[] = '(*) El campo "email" debe ser valido';
            }

            if (!isset($_POST['direccion']) or $_POST['direccion'] == "") {
                $errores[] = '(*) El campo "direccion" es obligatorio';
            }
            if (isset($_POST['direccion']) && !preg_match($patronDireccio, $_POST['direccion'])) {
                $errores[] = '(*) El campo "direccion" debe ser valido';
            }

            if (!isset($_POST['valorhora']) or $_POST['valorhora'] == "") {
                $errores[] = '(*) El campo "valor hora" es obligatorio';
            }
            if (isset($_POST['valorhora']) && !preg_match($patronNumeros, $_POST['valorhora'])) {
                $errores[] = '(*) El campo "valor hora" debe contener numeros unicamente';
            }
        }

        if (count($errores) > 0) {
            setErrores($errores);
            echo false;
//                redirect(crearUrl('usuarios', 'usuarios', 'crear'));
            //----------------fin validaciones-----------------
        } else {

            $identificacion = $_POST['identificacion'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $movil = $_POST['movil'];
            $email = $_POST['email'];
            $direccion = $_POST['direccion'];
            $valorhora = $_POST['valorhora'];
            $departamento = $_POST['departamento'];
            $centro = $_POST['centro'];
            $cargo = $_POST['cargo'];


            if (isset($_POST['login']) &&
                    isset($_POST['clave']) &&
                    isset($_POST['estado']) &&
                    isset($_POST['perfil'])) {

                $login = $_POST['login'];
                $clave = $_POST['clave'];
                $salt = '$bgr$/';
                $passwd = sha1(md5($salt . $clave));
                $estado = $_POST['estado'];
                $perfil = $_POST['perfil'];

                //--------------------------------------

                $insertper = "INSERT INTO pag_persona "
                        . "(per_id,per_nombre,per_apellido,per_telefono,per_movil,"
                        . "per_email,per_direccion,dept_id,per_valor_hora,"
                        . "car_id,cen_id,per_tipo) "
                        . "VALUES('$identificacion',"
                        . "'$nombre',"
                        . "'$apellido',"
                        . "'$telefono',"
                        . "'$movil',"
                        . "'$email',"
                        . "'$direccion',"
                        . "'$departamento',"
                        . "'$valorhora',"
                        . "'$cargo',"
                        . "'$centro',"
                        . "'usuario del sistema')";

                $inserta = $objUsuarios->insertar($insertper);

                //-----------insercion pag_usuario-------------------

                $insertusu = "INSERT INTO pag_usuario(per_id,"
                        . "usu_usuario,usu_clave,"
                        . "usu_estado,rol_id) "
                        . " VALUES('$identificacion',"
                        . "'$login',"
                        . "'$passwd',"
                        . "'$estado',"
                        . "'$perfil')";

                $insertar = $objUsuarios->insertar($insertusu);

                echo true;
            } else {

                $insertper = "INSERT INTO pag_persona "
                        . "(per_id,per_nombre,per_apellido,per_telefono,per_movil,"
                        . "per_email,per_direccion,dept_id,per_valor_hora,"
                        . "car_id,cen_id,per_tipo) "
                        . "VALUES('$identificacion',"
                        . "'$nombre',"
                        . "'$apellido',"
                        . "'$telefono',"
                        . "'$movil',"
                        . "'$email',"
                        . "'$direccion',"
                        . "'$departamento',"
                        . "'$valorhora',"
                        . "'$cargo',"
                        . "'$centro',"
                        . "'persona')";

                $insertar = $objUsuarios->insertar($insertper);

                echo true;
            }

//                redirect(crearUrl("usuarios", "usuarios", "listar")); 
            // Cierra la conexion
            $objUsuarios->cerrar();
        }
    }

    function verDetalle($parametros = false) {

        $UsuariosModel = new UsuariosModel();

        $codver = $parametros[1];

        $sql = "SELECT pag_persona.per_tipo "
                . "FROM pag_persona "
                . "WHERE pag_persona.per_id='$codver'";

        $comprobar = $UsuariosModel->find($sql);

        if ($comprobar['per_tipo'] === 'persona') {

            $sql = "SELECT pag_persona.per_id,pag_persona.per_nombre,pag_persona.per_apellido,"
                    . "pag_persona.per_telefono,pag_persona.per_movil,"
                    . "pag_persona.per_email,pag_persona.per_direccion,"
                    . "pag_persona.per_valor_hora,pag_departamento.dept_nombre,"
                    . "pag_cargo.car_descripcion,pag_centro.cen_nombre "
                    . "FROM pag_persona,pag_cargo,pag_departamento,pag_centro "
                    . "WHERE pag_persona.dept_id=pag_departamento.dept_id "
                    . "and pag_persona.car_id=pag_cargo.car_id "
                    . "and pag_persona.cen_id=pag_centro.cen_id and pag_persona.per_id='$codver'";

            $per = $UsuariosModel->find($sql);

            include_once("../view/Usuarios/personas/verDetalle.html.php");
        } else {

            $sql = "SELECT pag_rol.rol_nombre,"
                    . "pag_usuario.usu_usuario,pag_usuario.usu_clave,"
                    . "pag_usuario.usu_estado,pag_persona.per_id,"
                    . "pag_persona.per_nombre,pag_persona.per_apellido,"
                    . "pag_persona.per_telefono,pag_persona.per_movil,"
                    . "pag_persona.per_email,pag_persona.per_direccion,"
                    . "pag_persona.per_valor_hora,pag_departamento.dept_nombre,"
                    . "pag_cargo.car_descripcion,pag_centro.cen_nombre "
                    . "FROM pag_usuario,pag_persona,pag_rol,pag_cargo,"
                    . "pag_departamento,pag_centro "
                    . "WHERE pag_usuario.rol_id=pag_rol.rol_id "
                    . "and pag_usuario.per_id=pag_persona.per_id "
                    . "and pag_persona.dept_id=pag_departamento.dept_id "
                    . "and pag_persona.car_id=pag_cargo.car_id "
                    . "and pag_persona.cen_id=pag_centro.cen_id and pag_persona.per_id='$codver'";

            $usu = $UsuariosModel->find($sql);

            include_once("../view/Usuarios/usuarios/verDetalle.html.php");
        }

        // Cierra la conexion
        $UsuariosModel->cerrar();
        //*---------------------------------------------------------
    }

}
