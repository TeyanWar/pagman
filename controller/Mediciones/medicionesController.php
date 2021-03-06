<?php

include_once '../model/Mediciones/medicionesModel.php';
include_once '../model/Personas/personasModel.php';
include_once '../model/Equipos/equiposModel.php';
include_once '../model/Medidores/medidoresModel.php';

class MedicionesController {

    public function crear() {

        $objEquipos = new EquiposModel();
        $sql = "SELECT * FROM pag_equipo pe,pag_tipo_medidor pt,pag_det_equipo_medidor pde "
                . "where pde.equi_id=pe.equi_id and "
                . "pde.tmed_id=pt.tmed_id and "
                . "pt.tmed_tipo='Manual '"
                . "order by equi_nombre asc";
        $equipos = $objEquipos->select($sql);
        $objEquipos->cerrar();

        $objPersona = new personasModel();
        $sql = "SELECT * FROM pag_persona order by per_nombre asc";
        $personas = $objPersona->select($sql);
        $objPersona->cerrar();


        include_once '../view/Mediciones/mediciones/crear.html.php';
    }

    public function listar() {
        include_once '../view/Mediciones/mediciones/buscador.html.php';
    }

//    public function listar() {
//        $objMediciones = new MedicionesModel();
//        //$varMedicion=$_POST['med_id'];
//        $sql="Select pe.equi_id,pe.equi_nombre,pc.ctrmed_fecha,pc.ctrmed_medida_actual,sum(ctrmed_medida_actual) as totalMedicion,ptm.tmed_nombre,concat(pp.per_nombre,' ',pp.per_apellido) as responsable "
//                . "from pag_control_medidas pc,pag_tipo_medidor ptm,pag_persona pp,pag_equipo pe "
//                . "where pc.tmed_id=ptm.tmed_id and pc.per_id=pp.per_id and pc.equi_id=pe.equi_id "
//                . "group by equi_nombre order by ctrmed_fecha desc";
//        
//        $equipos = $objMediciones->select($sql);
//        
//        /*
//             * Paginado
//             */
//            $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
//            $url = crearUrl('mediciones', 'mediciones', 'listar');
//
//            $paginado = new Paginado($equipos, $pagina, $url);
//
//            $equipos = $paginado->getDatos();
//            /*
//             * Fin paginado
//             */
//        
//        $objMediciones->cerrar();
//        include_once '../view/Mediciones/mediciones/listar.html.php';
//    }

    function detalle($parametros) {

        $objDetalle = new MedicionesModel();
        $id = $parametros[1];
        $equi_nombre = $parametros[2];
        $sql = "SELECT cm.ctrmed_fecha AS fecha_medicion, cm.ctrmed_medida_actual AS valor_medicion, tm.tmed_nombre AS tipo_medida, 
                CONCAT(p.per_nombre,' ',p.per_apellido) AS encargado 
              FROM pag_control_medidas cm, pag_tipo_medidor tm, pag_persona p  
              WHERE cm.tmed_id=tm.tmed_id AND cm.per_id=p.per_id AND cm.equi_id='$id' 
              ORDER BY fecha_medicion DESC;";
//              ORDER BY cm.ctrmed_fecha ASC;";
        // ORGANIZAR CON EL MÉTODO BURBUJA //

        $detalleMediciones = $objDetalle->select($sql);
        /*
         * Paginado
         */
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('mediciones', 'mediciones', 'detalle', array('noVista', $id, $equi_nombre));

        $paginado = new Paginado($detalleMediciones, $pagina, $url, 3);
        $detalleMediciones = $paginado->getDatos();
        /*
         * Fin paginado
         */
        // Cierra la conexion

        $sql = "SELECT tm.tmed_nombre AS medidor, SUM(cm.ctrmed_medida_actual) AS total 
              FROM pag_control_medidas cm, pag_tipo_medidor tm 
              WHERE cm.tmed_id=tm.tmed_id AND equi_id='$id' 
              GROUP BY cm.tmed_id; ";
        $totalPorMedidores = $objDetalle->select($sql);

        $objDetalle->cerrar();
        include_once("../view/Mediciones/mediciones/detalle.html.php");
    }

    public function eliminar($parametros) {
        $objMediciones = new MedicionesModel();
        $id = $parametros[0];
        $sql = "DELETE * FROM pag_control_medidas WHERE ctrmed_id = $id";
        $mediciones = $objMediciones->delete($sql);
        $objMediciones->cerrar();
        include_once '../view/Mediciones/mediciones/listar.html.php';
    }

    public function postEliminar() {
        $id = $_POST['id'];
        $objMediciones = new MedicionesModel();
        $sql = "DELETE  FROM pag_control_medidas WHERE ctrmed_id = $id";
        $actores = $objMediciones->delete($sql);
        $objMediciones->cerrar();
        redirect(crearUrl('mediciones', 'mediciones', 'listar'));
    }

    public function ajaxAgregarEquipo() {
        $idEquipo = $_POST['ids'];
        //die(print_r("codigo".$idEquipo));
        $equipos = array();
        $objEquipos = new EquiposModel();
        $objMedidor = new MedidoresModel();
        $sql = "SELECT equi_id, equi_nombre FROM pag_equipo WHERE equi_id = '$idEquipo'";
        $equipos = $objEquipos->select($sql);
        //$equipos[$equipo[0]['equi_id']] = $equipo[0];

        $objMedidor = new medidoresModel();
        $sql = "select ptm.tmed_acronimo,ptm.tmed_id from pag_equipo pe,pag_tipo_medidor ptm,pag_det_equipo_medidor pdt where 
                pdt.equi_id=pe.equi_id and
                pdt.tmed_id=ptm.tmed_id AND
                pdt.equi_id='$idEquipo' And "
                . "ptm.tmed_tipo='Manual'";
        $medidores = $objMedidor->select($sql);
        $objEquipos->cerrar();
        include_once '../view/Mediciones/mediciones/ajaxAgregarEquipo.html.php';
    }

    public function ajaxListarEquipos() {
        $objMedidores = New MedidoresModel();

        $equi_id = $_POST['equi_id'];
        $equi_nombre = $_POST['equi_nombre'];
        $medicion = $_POST['medicion'];
        $fecha = $_POST['fecha'];
        $tipoMedidor = $_POST['tipo_medidor'];
        $consecutivo = $_POST['consecutivo'];

        $sql = "select * from pag_tipo_medidor";

        $medidores = $objMedidores->select($sql);

        include_once '../view/Mediciones/mediciones/ajaxListarEquipos.html.php';
    }

    public function ajaxGuardarMedidas() {
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros = "/^[0-9a-zA-Z]+$/";
        $patronLetrasNumerosGuiones = "/^[0-9a-zA-Z(-_)-áéíóúñ\s]+$/";
        $patronFecha = "/^[0-9( )a-zA-Z(,)0-9]+$/";

        if (!isset($_POST['personas']) or $_POST['personas'] == "") {
            $errores[] = "El campo <code><b>Responsable</code></b> es Obligatorio";
        }
        if (isset($_POST['personas']) && !is_numeric($_POST['personas'])) {
            $errores[] = "En el campo <code><b>Responsable</code></b> &uacute;nicamente se aceptan letras";
        }
        if (!isset($_POST['equipos']) or $_POST['equipos'] == "") {
            $errores[] = "El campo <code><b>Equipo</code></b> no puede estar vac&iacute;o";
        }
        if (isset($_POST['equipos']) && (!preg_match($patronLetrasNumerosGuiones, $_POST['equipos']))) {
            $errores[] = "En el campo <code><b>Equipo</code></b> &uacute;nicamente se aceptan letras";
        }
        if (!isset($_POST['medidaActual']) or $_POST['medidaActual'] == "") {
            $errores[] = "El campo <code><b>Medida Actual</code></b> no puede estar vac&iacute;o";
        } else {
            if (isset($_POST['medidaActual']) && !is_numeric($_POST['medidaActual'])) {
                $errores[] = "En el campo <code><b>Medida Actual</code></b> &uacute;nicamente se aceptan Numeros";
            }
        }
        if (!isset($_POST['fecha']) or $_POST['fecha'] == "") {
            $errores[] = "El campo <code><b>Fecha</code></b> no puede estar vac&iacute;o";
        } else {
            if (isset($_POST['fecha']) && !preg_match($patronFecha, $_POST['fecha'])) {
                $errores[] = "En el campo <code><b>Fecha</code></b> &uacute;nicamente se aceptan Letras y Numeros";
            }
        }
        if (!isset($_POST['medidas']) or $_POST['medidas'] == "") {
            $errores[] = "<code><b>Debe agregar al menos 1 medici&oacute;n</code></b>";
        } else {
            $medidas = $_POST['medidas'];
            foreach ($medidas as $medida) {
                if ($medida['medicion'] == "") {
                    $errores[] = "El campo <code><b>Medidas</code></b> no puede estar vac&iacute;o";
                } else {
                    if (!is_numeric($medida['medicion'])) {
                        $errores[] = "En el campo <code><b>Medidas</code></b> unicamente se aceptan Numeros";
                    }
                    if (!preg_match($patronLetrasNumerosGuiones, $medida['equi_id'])) {
                        $errores[] = "El <code><b>c&oacute;digo del equipo</code></b> debe ser Numerico unicamente";
                    }
                    if (!preg_match($patronLetras, $medida['equi_nombre'])) {
                        $errores[] = "&Uacute;nicamente se admiten letras en el campo <code><b>Equipo</code></b>";
                    }
                    if (!is_numeric($medida['tipo_medidor'])) {
                        $errores[] = "&Uacute;nicamente se admiente numeros en el campo <code><b>Tipo medidor</code></b>";
                    }
                }
            }
        }
        if (count($errores) > 0) {
            setErrores($errores);
        } else {
            $medidas = $_POST['medidas'];
            $personaId = $_POST['personas'];
            $objMediciones = new MedicionesModel();

            foreach ($medidas as $medida) {
                explodeFecha($medida['fecha']);
                $fecha = getFecha();
                $sql = "INSERT INTO pag_control_medidas (per_id,equi_id,ctrmed_medida_actual,ctrmed_fecha,tmed_id)"
                        . "VALUES ('$personaId',"
                        . "'$medida[equi_id]',"
                        . "'$medida[medicion]',"
                        . "'$fecha',"
                        . "'$medida[tipo_medidor]')";
                $objMediciones->insertar($sql);
            }

            $objMediciones->cerrar();
        }
        echo getRespuestaAccion('listar');
    }

    function buscador() {

        $objMediciones = new MedicionesModel();
        $medicion = $_POST['med_id'];
        $sql = "SELECT cm.equi_id, e.equi_nombre FROM pag_control_medidas cm, pag_equipo e 
              WHERE e.equi_id=cm.equi_id and e.equi_nombre LIKE '%" . $medicion . "%'GROUP BY cm.equi_id";
        $equipos = $objMediciones->select($sql);

        //Para cada equipo seleccionar los tipos de medidores
        foreach ($equipos as $keyEquipo => $equipo) {
            $sql = "SELECT tm.tmed_id, tm.tmed_nombre FROM pag_control_medidas cm, pag_tipo_medidor tm 
                  WHERE cm.tmed_id=tm.tmed_id AND equi_id='" . $equipo['equi_id'] . "' GROUP BY tmed_id";
            $tiposMedidores = $objMediciones->select($sql);

            //Para cada tipo de medidor seleccionar el último registro y el total de mediciones
            foreach ($tiposMedidores as $keyTipoMedidor => $tipoMedidor) {
                $sql = "SELECT cm.ctrmed_fecha, cm.ctrmed_medida_actual,  
               CONCAT(p.per_nombre,' ',p.per_apellido) AS responsable 
                FROM pag_control_medidas cm, pag_tipo_medidor tm, pag_persona p    
                WHERE tm.tmed_id=cm.tmed_id AND cm.per_id=p.per_id AND cm.tmed_id='" . $tipoMedidor['tmed_id'] . "' 
                AND cm.equi_id='" . $equipo['equi_id'] . "' AND cm.ctrmed_fecha=
                   (SELECT MAX(ctrmed_fecha) FROM pag_control_medidas WHERE tmed_id='" . $tipoMedidor['tmed_id'] . "' 
                   AND equi_id='" . $equipo['equi_id'] . "')";
                $ultimaMedicion = $objMediciones->find($sql);
                $tiposMedidores[$keyTipoMedidor]['ultimaMedicion'] = $ultimaMedicion;

                $sql = "SELECT SUM(ctrmed_medida_actual) AS totalMediciones FROM pag_control_medidas 
                WHERE tmed_id='" . $tipoMedidor['tmed_id'] . "' AND equi_id='" . $equipo['equi_id'] . "'";
                $totalMediciones = $objMediciones->select($sql);
                $tiposMedidores[$keyTipoMedidor]['totalMediciones'] = $totalMediciones[0]['totalMediciones'];
            }

            $equipos[$keyEquipo]['tiposMedidores'] = $tiposMedidores;
        }

        /*
         * Paginado
         */
        $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
        $url = crearUrl('mediciones', 'mediciones', 'listar');

//        $paginado = new Paginado($equipos[$keyEquipo]['tiposMedidores'], $pagina, $url);
        $paginado = new Paginado($equipos, $pagina, $url, 2);

        $equipos = $paginado->getDatos();
        /*
         * Fin paginado.
         */

        $objMediciones->cerrar();
        include_once("../view/Mediciones/mediciones/listar.html.php");
    }

}
