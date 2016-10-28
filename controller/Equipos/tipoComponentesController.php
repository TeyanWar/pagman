<?php

include_once '../model/Equipos/tipoComponentesModel.php';

class tipoComponentesController {

    public function crear() {
        include_once '../view/Equipos/tipoComponentes/crear.html.php';
    }

    public function postCrear() {
        //die(print_r($_POST));
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros = "/^[0-9a-zA-Z( )]+$/";
        $patronNumeros = "/^[0-9]+$/";
        $patronLetrasNumerosGuiones = "/^[0-9a-zA-Z(-_)-áéíóúñ\s]+$/";

        if (!isset($_POST['nombre']) or $_POST['nombre'] == "") {
            $errores[] = "El campo <code><b>Nombre de Componente</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo nombre medidor no llegue vac&iacute;o

        if (isset($_POST['nombre']) && !preg_match($patronLetras, $_POST['nombre'])) {
            $errores[] = "En el campo <code><b>Nombre de Componente</b></code> &uacute;nicamente se admiten letras";
        }//Valida que el campo nombre medidor contenga letras &uacute;nicamente

        if (!isset($_POST['acronimo']) or $_POST['acronimo'] == "") {
            $errores[] = "El campo <code><b>acr&oacute;nimo</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['acronimo']) && !preg_match($patronLetras, $_POST['acronimo'])) {
            $errores[] = "En el campo <code><b>acr&oacute;nimo</b></code> &uacute;nicamente se admiten letras";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente

        if (isset($_POST['acronimo']) && strlen($_POST['acronimo']) > 10) {
            $errores[] = "El campo <code><b>acr&oacute;nimo</b></code> no debe sobrepasar los 4 caracteres";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente


        if (!isset($_POST['descripcion']) or $_POST['descripcion'] == "") {
            $errores[] = "El campo <code><b>descripci&oacute;n</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o
        if (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {
            if (!preg_match($patronLetrasNumeros, $_POST['descripcion'])) {
                $errores[] = "En el campo <code><b>descripci&oacute;n</b></code> &uacute;nicamente se admiten letras y numeros";
            }//Valida que el campo acronimo contenga letras &uacute;nicamente
        }




        if (count($errores) > 0) {
            setErrores($errores);
        } else {

            $objComponentes = new tipoComponentesModel();
            $nombre = $_POST['nombre'];
            $acronimo = $_POST['acronimo'];
            $descripcion = $_POST['descripcion'];
            //--------si el medidor es automatico------------------

            $sqlComponente = "INSERT INTO pag_tipo_componente (tcomp_nombre,tcomp_descripcion,tcomp_acronimo,estado) values"
                    . " ('$nombre','$descripcion','$acronimo',null)";

            $componentes = $objComponentes->insertar($sqlComponente);

            $objComponentes->cerrar();
        }

        echo getRespuestaAccion('listar');
    }

    public function editar($parametros = false) {
        $objComponentes = new tipoComponentesModel();
        $id = $parametros[1];
        $sql = "SELECT * FROM pag_tipo_componente WHERE tcomp_id = $id";

        $componentes = $objComponentes->find($sql);


        $objComponentes->cerrar();
        include_once '../view/Equipos/tipoComponentes/editar.html.php';
    }

    public function postEditar() {
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros = "/^[0-9a-zA-Z( )]+$/";
        $patronNumeros = "/^[0-9]+$/";
        $patronLetrasNumerosGuiones = "/^[0-9a-zA-Z(-_)-áéíóúñ\s]+$/";

        if (!isset($_POST['nombre']) or $_POST['nombre'] == "") {
            $errores[] = "El campo <code><b>Nombre Tipo de Componente</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo nombre medidor no llegue vac&iacute;o

        if (isset($_POST['nombre']) && !preg_match($patronLetras, $_POST['nombre'])) {
            $errores[] = "En el campo <code><b>Nombre Tipo de Componente</b></code> &uacute;nicamente se admiten letras";
        }//Valida que el campo nombre medidor contenga letras &uacute;nicamente

        if (!isset($_POST['acronimo']) or $_POST['acronimo'] == "") {
            $errores[] = "El campo <code><b>acr&oacute;nimo</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['acronimo']) && !preg_match($patronLetras, $_POST['acronimo'])) {
            $errores[] = "En el campo <code><b>acr&oacute;nimo</b></code> &uacute;nicamente se admiten letras";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente

        if (isset($_POST['acronimo']) && strlen($_POST['acronimo']) > 10) {
            $errores[] = "El campo <code><b>acr&oacute;nimo</b></code> no debe sobrepasar los 4 caracteres";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente


        if (!isset($_POST['descripcion']) or $_POST['descripcion'] == "") {
            $errores[] = "El campo <code><b>descripci&oacute;n</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o
        if (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) {
            if (!preg_match($patronLetrasNumeros, $_POST['descripcion'])) {
                $errores[] = "En el campo <code><b>descripci&oacute;n</b></code> &uacute;nicamente se admiten letras y numeros";
            }//Valida que el campo acronimo contenga letras &uacute;nicamente
        }

        if (count($errores) > 0) {
            setErrores($errores);
        } else {

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $acronimo = $_POST['acronimo'];
            $descripcion = $_POST['descripcion'];
            $objComponentes= new tipoComponentesModel();

            $sql = "UPDATE pag_tipo_componente SET "
                    . "tcomp_nombre = '$nombre',"
                    . "tcomp_acronimo = '$acronimo',"
                    . "tcomp_descripcion = '$descripcion'"
                    . " WHERE tcomp_id = $id";


            $componentes = $objComponentes->update($sql);
            $objComponentes->cerrar();
        }

        echo getRespuestaAccion('listar');
    }

    public function listar() {
        include_once '../view/Equipos/tipoComponentes/buscador.html.php';
    }

    function buscador() {

        $objComponentes = new tipoComponentesModel();

        $componente = $_POST['tcomp_id'];
        
        $sql = "SELECT * from pag_tipo_componente where tcomp_nombre LIKE '%" . $componente . "%' or tcomp_acronimo LIKE '%" . $componente . "%'";


        $componentes = $objComponentes->select($sql);
        die(print_r('HOla'));
        /*
         * Paginado
         */
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('Equipos', 'componentes', 'listar');

        $paginado = new Paginado($componentes, $pagina, $url);

        $componentes = $paginado->getDatos();
        /*
         * Fin paginado
         */

        $objComponentes->cerrar();
        include_once("../view/Equipos/tipoComponentes/listar.html.php");
    }

    function postEliminar() {
        $id = $_POST['id'];
        $objComponentes = new tipoComponentesModel();

        $sql = "UPDATE pag_tipo_componente SET estado=now() WHERE tcomp_id='$id'";
        $componente = $objComponentes->update($sql);
        // Cierra la conexion
        $objComponentes->cerrar();
    }

}
