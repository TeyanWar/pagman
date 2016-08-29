<?php

include_once '../model/Mediciones/medicionesModel.php';
include_once '../model/Personas/personasModel.php';
include_once '../model/Equipos/equiposModel.php';
include_once '../model/Medidores/medidoresModel.php';

class MedicionesController {

    public function crear() {

        $objEquipos = new EquiposModel();
        $sql = "SELECT * FROM pag_equipo";
        $equipos = $objEquipos->select($sql);
        $objEquipos->cerrar();

        $objPersona = new personasModel();
        $sql = "SELECT * FROM pag_persona";
        $personas = $objPersona->select($sql);
        $objPersona->cerrar();

        $objMedidor = new medidoresModel();
        $sql = "SELECT tmed_id,tmed_acronimo from pag_tipo_medidor where tmed_estado=0";
        $medidores = $objMedidor->select($sql);
        $_SESSION['medidores'] = $medidores;
        $objMedidor->cerrar();

        include_once '../view/Mediciones/mediciones/crear.html.php';
    }

//    public function editar($parametros = false) {
//        $objMediciones = new MedicionesModel();
//        $id = $parametros[1];
//
//        $sql = "SELECT pag_control_medidas.ctrmed_id,pag_persona.per_id,"
//                . "pag_persona.per_nombre,pag_equipo.equi_id,pag_equipo.equi_nombre,"
//                . "pag_control_medidas.ctrmed_fecha,pag_control_medidas.ctrmed_medida_actual "
//                . "FROM pag_persona,pag_equipo,pag_control_medidas "
//                . "WHERE pag_control_medidas.per_id=pag_persona.per_id "
//                . "AND pag_control_medidas.equi_id=pag_equipo.equi_id "
//                . "AND pag_control_medidas.ctrmed_id=$id";
//
//        $mediciones = $objMediciones->find($sql);
//        $objMediciones->cerrar();
//        include_once '../view/Mediciones/mediciones/editar.html.php';
//    }


    public function listar() {
        $objMediciones = new MedicionesModel();
        $sql = "SELECT cm.equi_id, e.equi_nombre FROM pag_control_medidas cm, pag_equipo e 
              WHERE e.equi_id=cm.equi_id GROUP BY cm.equi_id";
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
            /*
             * Paginado
             */
            $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
            $url = crearUrl('mediciones', 'mediciones', 'listar');

            $paginado = new Paginado($equipos, $pagina, $url);

            $equipos = $paginado->getDatos();
            /*
             * Fin paginado
             */
        }
//        dd($equipos);
        $objMediciones->cerrar();
        include_once '../view/Mediciones/mediciones/listar.html.php';
    }

//    public function listar() {
//        $objMediciones = new MedicionesModel();
//        $sql = "SELECT * FROM pag_control_medidas, pag_persona, pag_equipo,pag_tipo_medidor WHERE pag_control_medidas.per_id=pag_persona.per_id AND
//                pag_control_medidas.equi_id=pag_equipo.equi_id and pag_control_medidas.tmed_id=pag_tipo_medidor.tmed_id group by equi_nombre order by ctrmed_fecha desc ";
//        $mediciones = $objMediciones->select($sql);
//        
//        $sql2="SELECT * from pag_equipo";
//        $equipos=$objMediciones->select($sql2);
//        $medicionTotal=Array();
//        $x=0;
//        $totalM=0;
//        foreach($equipos as $equipo){
//            foreach($mediciones as $medicion){
//                if($equipo['equi_id']==$medicion['equi_id']){
//                    $medicionTotal[$x]['equi_id']=$medicion['equi_id'];
//                    $medicionTotal[$x]['equi_nombre']=$medicion['equi_nombre'];
//                    $medicionTotal[$x]['ctrmed_actual']=$totalM+$medicion['ctrmed_medida_actual'];
//                }
//            }
//            $x+1;
//        }
//        
//        $objMediciones->cerrar();
//        include_once '../view/Mediciones/mediciones/listar.html.php';
//    }

    function detalle($parametros) {

        $objDetalle = new MedicionesModel();
        $id = $parametros[1];

        $sql = "SELECT * FROM pag_control_medidas, pag_persona, pag_equipo,pag_tipo_medidor WHERE pag_control_medidas.per_id=pag_persona.per_id AND
                pag_control_medidas.equi_id=pag_equipo.equi_id and pag_control_medidas.tmed_id=pag_tipo_medidor.tmed_id and pag_control_medidas.equi_id='$id' order by ctrmed_fecha desc";

        $detalleOrdenes = $objDetalle->select($sql);
            /*
             * Paginado
             */
            $pagina = (isset($_REQUEST['pagina']) ? $_REQUEST['pagina'] : 1);
            $url = crearUrl('mediciones', 'mediciones', 'detalle');

            $paginado = new Paginado($detalleOrdenes, $pagina, $url);

            $mediciones = $paginado->getDatos();
            /*
             * Fin paginado
             */
        // Cierra la conexion
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
        die(print_r($idEquipo));
        $equipos = array();
        $objEquipos = new EquiposModel();
            $sql = "SELECT equi_id, equi_nombre FROM pag_equipo WHERE equi_id = $idEquipo";
            $equipo = $objEquipos->select($sql);
//            $equipos[$equipo[0]['equi_id']] = $equipo[0];

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

        $sql = "Select * from pag_tipo_medidor";

        $medidores = $objMedidores->select($sql);

        include_once '../view/Mediciones/mediciones/ajaxListarEquipos.html.php';
    }

    public function ajaxGuardarMedidas() {
        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronLetrasNumeros = "/^[0-9a-zA-Z]+$/";

        if (!isset($_POST['personas']) or $_POST['personas'] == "") {
            $errores[] = "El campo Responsable es Obligatorio";
        }
        if (isset($_POST['personas']) && !is_numeric($_POST['personas'])) {
            $errores[] = "En el campo Responsable unicamente se aceptan letras";
        }
        if (!isset($_POST['equipos']) or $_POST['equipos'] == "") {
            $errores[] = "El campo Equipo no puede estar vacio";
        }
        if (isset($_POST['equipos']) && !is_numeric($_POST['equipos'])) {
            $errores[] = "En el campo Equipo unicamente se aceptan letras";
        }
        if (!isset($_POST['medidaActual']) or $_POST['medidaActual'] == "") {
            $errores[] = "El campo Medidas no puede estar vacio";
        } else {
            if (isset($_POST['medidaActual']) && !is_numeric($_POST['medidaActual'])) {
                $errores[] = "En el campo Medidas unicamente se aceptan Numeros";
            }
        }
        if (!isset($_POST['fecha']) or $_POST['fecha'] == "") {
            $errores[] = "El campo Fecha no puede estar vacio";
        } else {
//            if (isset($_POST['fecha']) && !preg_match($patronLetrasNumeros,$_POST['fecha'])) {
//                $errores[] = "En el campo Fecha unicamente se aceptan Letras y Numeros";
//            }
        }
        if (!isset($_POST['medidas']) or $_POST['medidas'] == "") {
            $errores[] = "Debe agregar al menos 1 medicion";
        } else {
            $medidas = $_POST['medidas'];
            foreach ($medidas as $medida) {
                if ($medida['medicion'] == "") {
                    $errores[] = "El campo Medidas no puede estar vacio";
                } else {
                    if (!is_numeric($medida['medicion'])) {
                        $errores[] = "En el campo Medidas unicamente se aceptan Numeros";
                    }
                    if (!is_numeric($medida['equi_id'])) {
                        $errores[] = "El codigo del equipo debe ser Numerico unicamente";
                    }
                    if (!preg_match($patronLetras, $medida['equi_nombre'])) {
                        $errores[] = "SOLO LETRAS";
                    }
                    if (!is_numeric($medida['tipo_medidor'])) {
                        $errores[] = "SOLO Numeros";
                    }
                }
            }
        }
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('mediciones', 'mediciones', 'crear'));
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
            redirect(crearUrl('mediciones', 'mediciones', 'listar'));
        }
    }

}
