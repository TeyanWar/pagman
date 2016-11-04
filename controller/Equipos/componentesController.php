<?php

include_once '../model/Equipos/componentesModel.php';

class componentesController {

    public function crear() {
        $objComponentes = new ComponentesModel();

        $sql = "Select * from pag_equipo where estado is null";
        $equipos = $objComponentes->select($sql);

        $sql2 = "Select * from pag_tipo_componente where estado is null";
        $tipoComponentes = $objComponentes->select($sql2);

        $objComponentes->cerrar();

        include_once '../view/Equipos/componentes/crear.html.php';
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


        if (!isset($_POST['tipo_componente']) or $_POST['tipo_componente'] == "") {
            $errores[] = "El campo <code><b>Tipo de Componente</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['tipo_componente']) && !preg_match($patronNumeros, $_POST['tipo_componente'])) {
            $errores[] = "En el campo <code><b>Tipo de Componente</b></code> &uacute;nicamente se admiten numeros";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        if (!isset($_POST['equipos']) or $_POST['equipos'] == "") {
            $errores[] = "Debes agregar al menos 1 <code><b>Equipo</b></code> a este Componente";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['equipos']) && !empty($_POST['equipos'])) {
            foreach ($_POST['equipos'] as $equipo) {
                if (!preg_match($patronLetrasNumerosGuiones, $equipo)) {
                    $errores[] = "En el campo <code><b>Equipo</b></code> &uacute;nicamente se admiten letras,numeros y guiones";
                }//Valida que el campo acronimo contenga letras &uacute;nicamente
            }
        }
        if (!isset($_POST['valor']) or $_POST['valor'] == "") {
            $errores[] = "El campo <code><b>Valor de Componente</b></code> es obligatorio";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['valor']) && !preg_match($patronNumeros, $_POST['valor'])) {
            $errores[] = "En el campo <code><b>Valor de Componente</b></code> &uacute;nicamente se admiten numeros";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente


        if (count($errores) > 0) {
            setErrores($errores);
        } else {

            $objComponentes = new ComponentesModel();
            $nombre = $_POST['nombre'];
            $acronimo = $_POST['acronimo'];
            $descripcion = $_POST['descripcion'];
            $tipoComponente = $_POST['tipo_componente'];
            $valor = $_POST['valor'];

            //--------si el medidor es automatico------------------

            $sqlComponente = "INSERT INTO pag_componente (comp_nombre,comp_descripcion,comp_acronimo,estado,comp_precio,tcomp_id) values"
                    . " ('$nombre','$descripcion','$acronimo',null,$valor,$tipoComponente)";
            $componentes = $objComponentes->insertar($sqlComponente);

            if ($componentes == true) {
                $sqlIdComp = "Select max(comp_id) as id from pag_componente";
                $idcomponente = $objComponentes->find($sqlIdComp);
                $idComp = $idcomponente['id'];

                foreach ($_POST['equipos'] as $equipo) {
                    $idEquipo = $equipo;
                    $sqlDetalle = "INSERT INTO pag_equipo_componente (comp_id,equi_id,estado) "
                            . "values ($idComp,'$idEquipo',null)";
                    $detalle = $objComponentes->insertar($sqlDetalle);
                }
            }
        }

        echo getRespuestaAccion('listar');
    }

    public function editar($parametros = false) {
        $objComponentes = new ComponentesModel();
        $id = $parametros[1];

        $sqlComponente = "SELECT comp_id,comp_nombre,comp_acronimo,comp_precio,comp_descripcion,tcomp_id "
                . "from pag_componente "
                . "where comp_id=$id";
        $componentes = $objComponentes->find($sqlComponente);

        $sqlTipoComponente = "SELECT * from pag_tipo_componente where estado is null";
        $tiposDeComponentes = $objComponentes->select($sqlTipoComponente);

        $sql2 = "SELECT equi_id,equi_nombre from pag_equipo where estado is null";
        $equipos = $objComponentes->select($sql2);

        $sql3 = "select * from pag_equipo_componente where comp_id='$id' and estado is null";
        $equiposDet = $objComponentes->select($sql3);

        foreach ($equipos as $key => $equipo) {
            $equipos[$key]['checkeado'] = '';
            foreach ($equiposDet as $equipoDet) {
                if ($equipo['equi_id'] == $equipoDet['equi_id']) {
                    $equipos[$key]['checkeado'] = 'checked';
                    break;
                }
            }
        }//foreach
        //die(print_r($medidores));
        $objComponentes->cerrar();
        include_once '../view/Equipos/componentes/editar.html.php';
    }

    public function postEditar() {
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


        if (!isset($_POST['tipo_componente']) or $_POST['tipo_componente'] == "") {
            $errores[] = "El campo <code><b>Tipo de Componente</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['tipo_componente']) && !preg_match($patronNumeros, $_POST['tipo_componente'])) {
            $errores[] = "En el campo <code><b>Tipo de Componente</b></code> &uacute;nicamente se admiten numeros";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente
        if (!isset($_POST['equipos']) or $_POST['equipos'] == "") {
            $errores[] = "Debes agregar al menos 1 <code><b>Equipo</b></code> a este Componente";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['equipos']) && !empty($_POST['equipos'])) {
            foreach ($_POST['equipos'] as $equipo) {
                if (!preg_match($patronLetrasNumerosGuiones, $equipo)) {
                    $errores[] = "En el campo <code><b>Equipo</b></code> &uacute;nicamente se admiten letras,numeros y guiones";
                }//Valida que el campo acronimo contenga letras &uacute;nicamente
            }
        }
        if (!isset($_POST['valor']) or $_POST['valor'] == "") {
            $errores[] = "El campo <code><b>Valor de Componente</b></code> es obligatorio";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['valor']) && !preg_match($patronNumeros, $_POST['valor'])) {
            $errores[] = "En el campo <code><b>Valor de Componente</b></code> &uacute;nicamente se admiten numeros";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente


        if (count($errores) > 0) {
            setErrores($errores);
        } else {

            $objComponentes = new ComponentesModel();
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $acronimo = $_POST['acronimo'];
            $descripcion = $_POST['descripcion'];
            $tipoComponente = $_POST['tipo_componente'];
            $valor = $_POST['valor'];

            //------------------------Actualizacion Table Pag componente---------------------------------------------------
            $sql = "UPDATE pag_componente SET "
                    . "comp_nombre = '$nombre',"
                    . "comp_acronimo = '$acronimo',"
                    . "comp_descripcion = '$descripcion',"
                    . "tcomp_id = '$tipoComponente',"
                    . "comp_precio = '$valor'"
                    . " WHERE comp_id = $id";
            $updateComponente = $objComponentes->update($sql);
            
            $sqlDelete = "Delete from pag_equipo_componente where comp_id=$id";
            $eliminacion = $objComponentes->delete($sqlDelete);
            if ($updateComponente == true && $sqlDelete == true) {
                foreach ($_POST['equipos'] as $equipo) {
                    $idEquipo = $equipo;
                    $sqlUpdateDetalle = "INSERT INTO pag_equipo_componente (comp_id,equi_id) values ('$id','$idEquipo')";
                    $updateDetalle = $objComponentes->insertar($sqlUpdateDetalle);
                }
            }


            $objComponentes->cerrar();
        }
        echo getRespuestaAccion('listar');
    }

    public function listar() {
        include_once '../view/Equipos/componentes/buscador.html.php';
    }

    function buscador() {

        $objComponentes = new ComponentesModel();

        $componente = $_POST['comp_id'];

        $sql = "SELECT pag_componente.comp_id,comp_nombre,
		comp_acronimo,comp_descripcion,pag_tipo_componente.tcomp_nombre,comp_precio 
	FROM pag_tipo_componente,pag_componente
	WHERE pag_componente.tcomp_id=pag_tipo_componente.tcomp_id AND pag_componente.estado IS NULL 
	AND (pag_componente.comp_nombre LIKE '%$componente%' OR pag_componente.comp_acronimo LIKE '%$componente%') ";

        $componentes = $objComponentes->select($sql);

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
        include_once("../view/Equipos/componentes/listar.html.php");
    }

    function postEliminar() {
        $id = $_POST['id'];
        $objComponentes = new ComponentesModel();

        $sql = "UPDATE pag_componente set estado=now() where comp_id=$id";
        $sql2 = "UPDATE pag_equipo_componente set estado=now() where comp_id=$id";
        $update1 = $objComponentes->update($sql);

        $update2 = $objComponentes->update($sql2);

        $objComponentes->cerrar();

        include_once "../view/Equipos/componentes/listar.html.php";
    }

    function verDetalle($parametros = false) {

        $objComponentes = new ComponentesModel();

        $id = $parametros[1];

        $sql = "SELECT pag_componente.comp_id,comp_nombre,comp_descripcion,"
                . "comp_acronimo,comp_precio,pag_tipo_componente.tcomp_nombre "
                . "FROM pag_componente,pag_tipo_componente "
                . "WHERE pag_componente.tcomp_id=pag_tipo_componente.tcomp_id "
                . "AND pag_componente.comp_id=$id";

        //-----------equipos a los que pertenece-------------
        $equipos = "SELECT pag_equipo.equi_id,equi_nombre "
                . "FROM pag_equipo,pag_equipo_componente,pag_componente "
                . "WHERE pag_equipo_componente.equi_id=pag_equipo.equi_id "
                . "AND pag_equipo_componente.comp_id=pag_componente.comp_id "
                . "AND pag_componente.comp_id=$id";

        $verComp = $objComponentes->find($sql);
        $vCequipos = $objComponentes->select($equipos);

        // Cierra la conexion
        $objComponentes->cerrar();
        include_once("../view/Equipos/componentes/detalle.html.php");
    }

}
