<?php

include_once ('../model/Equipos/campoPersonalizadoModel.php');

class campoPersonalizadoController {

    public function crear() {
        include_once('../view/Equipos/campoPersonalizado/crear.html.php');
    }

    public function postCrear() {
        //codigoCP = codgo Campo personalizado
        //nombreCP = nombre Campo personalizado
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";

        if (!isset($_POST['codigoCP']) or $_POST['codigoCP'] == "") {
            $errores[] = "El codigo del campo Personalizado no puede quedar vacio, recuerde seguir el patrón<code>CP0XXXX</code>";
        }

        if (!isset($_POST['nombreCP']) or $_POST['nombreCP'] == "") {
            $errores[] = "El nombre del campo Personalizado no puede quedar vacio, por favor, ingresa un <code>Nombre</code>";
        }

        if (isset($_POST['nombreCP']) && !preg_match($patronLetras, $_POST['nombreCP'])) {
            $errores[] = '(*) El campo "Nombre Campo Personalizado" debe contener letras únicamente.';
        }

        /* Consultando si el codigoCP ya se encuentra registrado en la BD */
        $sql = "SELECT cp_id FROM pag_campos_personalizados WHERE cp_id='" . $_POST['codigoCP'] . "'";
        $objCp = new campoPersonalizadoModel();

        $consulta = $objCp->select($sql);

        $objCp->cerrar();

        foreach ($consulta as $codigoCP) {
            if ($codigoCP['cp_id'] = $_POST['codigoCP']) {
                $errores[] = "El codigo <code>" . $_POST['codigoCP'] . "</code> ya se encuentra registrado.";
            }
        }

        /* COnsulta si ya el Nombre CP se encuentra registrado */
        $sql = "SELECT cp_nombre FROM pag_campos_personalizados WHERE cp_nombre='" . $_POST['nombreCP'] . "'";
        $objCp = new campoPersonalizadoModel();

        $consultaN = $objCp->select($sql);

        $objCp->cerrar();

        foreach ($consultaN as $nombreCP) {
            if ($nombreCP['cp_nombre'] = $_POST['nombreCP']) {
                $errores[] = "El nombre <code>" . $_POST['nombreCP'] . "</code> ya se encuentra registrado.";
            }
        }

        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('equipos', 'campoPersonalizado', 'crear'));
        }

        $codigoCP = $_POST['codigoCP'];
        $nombreCP = $_POST['nombreCP'];
        //die($_POST['nombreCP']);

        $sql = "INSERT INTO pag_campos_personalizados (cp_id,cp_nombre)VALUES("
                . "'$codigoCP',"
                . "'$nombreCP')";

        $objCP = new campoPersonalizadoModel();

        $insertarCP = $objCP->insertar($sql);

//        if ($insertarCP = true) {
//            die("REGISTRO");
//        }

        $objCP->cerrar();

        redirect(crearUrl("Equipos", "campoPersonalizado", "listar"));
    }

    public function listar() {
        include_once('../view/Equipos/campoPersonalizado/consulta.html.php');
    }

    public function buscarAjax() {
        $objCp = new campoPersonalizadoModel();

        $campoP = $_POST['buscarCP'];

        $sql = "SELECT * FROM pag_campos_personalizados WHERE cp_nombre LIKE '%" . $campoP . "%' or cp_nombre LIKE '%" . $campoP . "%' ORDER BY cp_id ASC ";
        $consultaCampoAjax = $objCp->select($sql);

        //aqui empieza el paginado       
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('equipos', 'campoPersonalizado', 'listar');

        $paginado = new Paginado($consultaCampoAjax, $pagina, $url);

        $consultaCampoAjax = $paginado->getDatos();

        $objCp->cerrar();

        include_once("../view/Equipos/campoPersonalizado/listar.html.php");
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

