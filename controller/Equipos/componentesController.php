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

        $sqlComponente = "SELECT pag_equipo.equi_id,pag_equipo.equi_nombre,pag_componente.comp_id,comp_nombre,
		comp_acronimo,comp_descripcion,pag_tipo_componente.tcomp_nombre 
	FROM pag_equipo,pag_equipo_componente,pag_tipo_componente,
		pag_det_componente_tipocomponente,pag_componente 
	WHERE pag_equipo_componente.equi_id=pag_equipo.equi_id 
	AND pag_equipo_componente.comp_id=pag_componente.comp_id 
	AND pag_det_componente_tipocomponente.comp_id=pag_componente.comp_id 
	AND pag_det_componente_tipocomponente.tcomp_id=pag_tipo_componente.tcomp_id
        and pag_componente.comp_id=$id";

        $sql2 = "SELECT * from pag_tipo_componente where estado is null";

        $sql3 = "Select equi_id,equi_nombre from pag_equipo where estado is null";



        $componentes = $objComponentes->find($sqlComponente);
        $tiposDeComponentes = $objComponentes->select($sql2);
        $equipos = $objComponentes->select($sql3);


//        die(print_r($medidores));
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
        if (!isset($_POST['equipo']) or $_POST['equipo'] == "") {
            $errores[] = "El campo <code><b>Equipo</b></code> no puede estar vac&iacute;o";
        }//Valida que el campo acronimo no llegue vac&iacute;o

        if (isset($_POST['equipo']) && !preg_match($patronLetrasNumerosGuiones, $_POST['equipo'])) {
            $errores[] = "En el campo <code><b>Equipo</b></code> &uacute;nicamente se admiten letras,numeros y guiones";
        }//Valida que el campo acronimo contenga letras &uacute;nicamente


        if (count($errores) > 0) {
            setErrores($errores);
        } else {

            $objComponentes = new ComponentesModel();
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $acronimo = $_POST['acronimo'];
            $descripcion = $_POST['descripcion'];
            $equipo = $_POST['equipo'];
            $tipoComponente = $_POST['tipo_componente'];

            //------------------------Actualizacion Table Pag componente---------------------------------------------------
            $sql = "UPDATE pag_componente SET "
                    . "comp_nombre = '$nombre',"
                    . "comp_acronimo = '$acronimo',"
                    . "comp_descripcion = '$descripcion'"
                    . " WHERE comp_id = $id";
            $updateComponente = $objComponentes->update($sql);

//------------------------ Busqueda Id detalle entre equipo y Componente para Actualizar el Equipo-------------------------------------------------------------------------------------
            $sqlIdDetEquiComp = "Select equicomp_id from pag_equipo_componente where comp_id='$id' and equi_id='$equipo'";
            $idDetalleEquiComp = $objComponentes->find($sqlIdDetEquiComp);
            $idDetEquiComp = $idDetalleEquiComp['equicomp_id'];

//-------------------------Actualizacion detalle entre Equipo y Componente---------------------------------------------------------------------
            $sqlUpdateEquiComp = "Update pag_equipo_componente Set "
                    . "equi_id='$equipo'"
                    . " where equicomp_id='$idDetEquiComp'";
            $updateEquiComp = $objComponentes->update($sqlUpdateEquiComp);

//------------------------Busqueda id entre Tipo de componente y Componente para actualizar el tipo de componente--------------------------
            $sqlIdDetTipoComp = "Select det_id from pag_det_componente_tipocomponente where tcomp_id='$tipoComponente' and comp_id='$id'";
            $idDetalleTipoComp = $objComponentes->find($sqlIdDetTipoComp);
            $idDetTipoComp = $idDetalleTipoComp['det_id'];

//------------------------Actualizacion detalle entre Tipo componente y Componente para Actualizar el tipo de componente-----------
            $sqlUpdateTipoComp = "Update pag_det_componente_tipocomponente Set "
                    . "tcomp_id='$tipoComponente'"
                    . " where det_id='$$idDetTipoComp'";
            $updateTipoComp = $objComponentes->update($sqlUpdateTipoComp);

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
	WHERE pag_componente.tcomp_id=pag_tipo_componente.tcomp_id 
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

        $sql = "SELECT pag_equipo.equi_id,pag_componente.comp_id,comp_nombre,
            pag_tipo_componente.tcomp_id 
	FROM pag_equipo,pag_equipo_componente,pag_tipo_componente,
		pag_det_componente_tipocomponente,pag_componente 
	WHERE pag_equipo_componente.equi_id=pag_equipo.equi_id 
	AND pag_equipo_componente.comp_id=pag_componente.comp_id 
	AND pag_det_componente_tipocomponente.comp_id=pag_componente.comp_id 
	AND pag_det_componente_tipocomponente.tcomp_id=pag_tipo_componente.tcomp_id
        and pag_componente.comp_id='$id'";

        $componente = $objComponentes->find($sql);

        $idEquipo = $componente['equi_id'];
        $idTipoComponente = $componente['tcomp_id'];

        $sql2 = "UPDATE pag_componente SET estado=now() WHERE comp_id='$id'";
        $eliminarcomponente = $objComponentes->update($sql2);

        //------------------------ Busqueda Id detalle entre equipo y Componente para Actualizar el Equipo-------------------------------------------------------------------------------------
        $sqlIdDetEquiComp = "Select equicomp_id from pag_equipo_componente where comp_id='$id' and equi_id='$idEquipo'";
        $idDetalleEquiComp = $objComponentes->find($sqlIdDetEquiComp);
        $idDetEquiComp = $idDetalleEquiComp['equicomp_id'];

        //-------------------------Eliminar detalle entre Equipo y Componente---------------------------------------------------------------------
        $sqlUpdateEquiComp = "Update pag_equipo_componente Set "
                . "estado=now()"
                . " where equicomp_id='$idDetEquiComp'";
        $updateEquiComp = $objComponentes->update($sqlUpdateEquiComp);
        //------------------------Busqueda id entre Tipo de componente y Componente para actualizar el tipo de componente--------------------------
        $sqlIdDetTipoComp = "Select det_id from pag_det_componente_tipocomponente where tcomp_id='$idTipoComponente' and comp_id='$id'";
        $idDetalleTipoComp = $objComponentes->find($sqlIdDetTipoComp);
        $idDetTipoComp = $idDetalleTipoComp['det_id'];

        //------------------------Actualizacion detalle entre Tipo componente y Componente para Actualizar el tipo de componente-----------
        $sqlUpdateTipoComp = "Update pag_det_componente_tipocomponente Set "
                . "estado=now()"
                . " where det_id='$idDetTipoComp'";
        $updateTipoComp = $objComponentes->update($sqlUpdateTipoComp);


        $objComponentes->cerrar();

        include_once "../view/Equipos/componentes/listar.html.php";
    }

}
