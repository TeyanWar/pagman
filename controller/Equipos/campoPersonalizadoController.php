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
        //die($_POST['nombreCP']);
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
        //die(print_r($sql));
        $consulta = $objCp->select($sql);
        //die(print_r($consulta));
        $objCp->cerrar();

        foreach ($consulta as $codigoCP) {
            //die(print_r ($codigoCP));
            if ($_POST['codigoCP'] == $codigoCP['cp_id']) {
                $errores[] = "El codigo <code>" . $_POST['codigoCP'] . "</code> ya se encuentra registrado.";
            }
        }

        /* COnsulta si ya el Nombre CP se encuentra registrado */
        $sql = "SELECT cp_nombre FROM pag_campos_personalizados WHERE cp_nombre='" . $_POST['nombreCP'] . "'";
        $objCp = new campoPersonalizadoModel();

        $consultaN = $objCp->select($sql);

        $objCp->cerrar();

//        foreach ($consultaN as $nombreCP) {
//            if ($nombreCP['cp_nombre'] = $_POST['nombreCP']) {
//                $errores[] = "El nombre <code>" . $_POST['nombreCP'] . "</code> ya se encuentra registrado.";
//            }
//        }

        if (count($errores) > 0) {
            setErrores($errores);
        } else {

            $codigoCP = $_POST['codigoCP'];
            $nombreCP = $_POST['nombreCP'];
            //die($_POST['nombreCP']);

            $sql = "INSERT INTO pag_campos_personalizados (cp_id,cp_nombre)VALUES("
                    . "'$codigoCP',"
                    . "'$nombreCP')";
            //die(print_r($sql));
            $objCP = new campoPersonalizadoModel();

            $insertarCP = $objCP->insertar($sql);

//        if ($insertarCP = true) {
//            die("REGISTRO");
//        }

            $objCP->cerrar();
        }
        echo getRespuestaAccion('listar');
    }

    public function listar() {
        include_once('../view/Equipos/campoPersonalizado/consulta.html.php');
    }

    public function verDetalle($parametros) {
        $objCp = new campoPersonalizadoModel();


        $id = $parametros[1];
        //die(print_r($id));
        $sql = "SELECT * FROM pag_campos_personalizados WHERE cp_id='$id'";
        //die(print_r($sql));
        $detalleCampo = $objCp->find($sql);
        //die(print_r($detalleCampo));

        $objCp->cerrar();

        include_once('../view/Equipos/campoPersonalizado/detalle.html.php');
    }

    public function editar($parametros) {

        $objCp = new campoPersonalizadoModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_campos_personalizados WHERE cp_id='$id'";
        //die(print_r($sql));
        $consulta = $objCp->find($sql);

        $objCp->cerrar();

        include_once('../view/Equipos/campoPersonalizado/editar.html.php');
    }

    public function postEditar() {
        $objCp = new campoPersonalizadoModel();
        $errores = array();

        if (!isset($_POST['codigoCP']) or $_POST['codigoCP'] == "") {
            $errores[] = "El campo Codigo No puede estar vacío, por favor ingresa uno, recuerde seguir el patrón <code>CP0XXXX</code>";
        }
        if (!isset($_POST['nombreCP']) or $_POST['nombreCP'] == "") {
            $errores[] = "El campo <code><b>Nombre campo personalizado</b></code>No puede estar vacío, por favor ingresa uno, recuerde seguir el patrón <code>CP0XXXX</code>";
        }
        if(count($errores)>0){
            setErrores($errores);
        }else{
            $sql = "SELECT * FROM pag_campos_personalizados WHERE cp_id='" . $_POST['codigoCP'] . "'";
            //die(print_r($sql));
            $consulta = $objCp->select($sql);
            //die(print_r($consulta));
    //        foreach ($consulta as $codigo) {
    //            if ($codigoCP = $codigo['cp_id']) {
    //                
    //            }
    //        }

            $codigoCP = $_POST['codigoCP'];
            //die(print_r($codigoCP));
            $nombreCP = $_POST['nombreCP'];

            $sql = "UPDATE pag_campos_personalizados SET "
                    . "cp_nombre='$nombreCP'"
                    . "WHERE cp_id='$codigoCP'";
            //die(print_r($sql));
            $campoEditar = $objCp->update($sql);
            $objCp->cerrar();
        }
        echo getRespuestaAccion('listar');
        //redirect(crearUrl('equipos','campoPersonalizado','listar'));
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

    function eliminar($parametros) {
        $objCP = new campoPersonalizadoModelModel();

        $id = $parametros[1];

        $sql = "SELECT * FROM pag_campos_personalizados WHERE cp_id='$id'";
        $camposPer = $objCP->find($sql);
        //die(print_r($sql));
        // Cierra la conexion
        $objCP->cerrar();

        include_once("../view/Equipos/campoPersonalziado/eliminar.html.php");
    }

    function postEliminar() {
        $id = $_POST['id'];
        $objCp = new campoPersonalizadoModel();

        $sql = "UPDATE pag_campos_personalizados SET estado=false WHERE cp_id='$id'";
        $campos = $objCp->update($sql);
        // Cierra la conexion
        $objCp->cerrar();
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

