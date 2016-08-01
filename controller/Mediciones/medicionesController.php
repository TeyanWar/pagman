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
        
        $objMedidor= new medidoresModel();
        $sql= "SELECT tmed_id,tmed_acronimo from pag_tipo_medidor where tmed_estado=0";
        $medidores= $objMedidor->select($sql);
        $_SESSION['medidores']=$medidores;
        $objMedidor->cerrar();

        include_once '../view/Mediciones/mediciones/crear.html.php';
    }

   
    public function editar($parametros = false) {
        $objMediciones = new MedicionesModel();
        $id = $parametros[1];

        $sql = "SELECT pag_control_medidas.ctrmed_id,pag_persona.per_id,"
                . "pag_persona.per_nombre,pag_equipo.equi_id,pag_equipo.equi_nombre,"
                . "pag_control_medidas.ctrmed_fecha,pag_control_medidas.ctrmed_medida_actual "
                . "FROM pag_persona,pag_equipo,pag_control_medidas "
                . "WHERE pag_control_medidas.per_id=pag_persona.per_id "
                . "AND pag_control_medidas.equi_id=pag_equipo.equi_id "
                . "AND pag_control_medidas.ctrmed_id=$id";

        $mediciones = $objMediciones->find($sql);
        $objMediciones->cerrar();
        include_once '../view/Mediciones/mediciones/editar.html.php';
    }

    public function postEditar() {
        //die(print_r($_POST));

        $errores = array();
        $patronLetras = "/^[a-zA-Z_áéíóúñ\s]*$/";
        $patronNumeros = "/^[0-9]*$/";

        if (!isset($_POST['id']) or $_POST['id'] == "") {
            $errores[] = "Debe existir el Id, no puede estar vacio";
        }
        if(isset($_POST['id']) && !preg_match($patronNumeros,$_POST['id'])){
            $errores[]="El id debe ser numerico";
        }
        if (!isset($_POST['equipo']) or $_POST['equipo'] == "") {
            $errores[] = "El campo Equipo no puede estar vacio";
        }
        if (isset($_POST['equipo']) && !is_numeric($_POST['equipo'])) {
            $errores[] = "El campo Equipo admiten Letras y numeros Unicamente";
        }
        if (!isset($_POST['medidaActual']) or $_POST['medidaActual'] == "") {
            $errores[] = "El campo Medida no puede estar vacio";
        }
        if (isset($_POST['medidaActual']) && !is_numeric($_POST['medidaActual'])) {
            $errores[] = "El campo Medida debe ser numerico unicamente";
        }
        if (count($errores) > 0) {
            setErrores($errores);
            redirect(crearUrl('mediciones', 'mediciones', 'listar'));
        } else {
            $id = $_POST['id'];
            $equipo = $_POST['equipo'];
            $persona = $_POST['persona'];
            $medidaActual = $_POST['medidaActual'];
            explodeFecha($_POST['fechaMedicion']);
            $fechaMedicion=  getFecha();
            $objMediciones = new MedicionesModel();

            $sql = "UPDATE pag_control_medidas SET "
                    . "ctrmed_fecha = '$fechaMedicion',"
                    . "ctrmed_medida_actual = '$medidaActual',"
                    . "equi_id=$equipo,"
                    . "per_id = $persona "
                    . "WHERE ctrmed_id = $id";
            $mediciones = $objMediciones->update($sql);
            redirect(crearUrl('mediciones', 'mediciones', 'listar'));
        }

        $objMediciones->cerrar();
    }

    public function listar() {
        $objMediciones = new MedicionesModel();
        $sql = "SELECT * FROM pag_control_medidas, pag_persona, pag_equipo,pag_tipo_medidor WHERE pag_control_medidas.per_id=pag_persona.per_id AND
                pag_control_medidas.equi_id=pag_equipo.equi_id and pag_control_medidas.tmed_id=pag_tipo_medidor.tmed_id order by ctrmed_fecha desc ";

        $mediciones = $objMediciones->select($sql);

        /*
         * Paginado
         */
        $pagina = (isset($_REQUEST['pagina'])?$_REQUEST['pagina']:1); 
        $url = crearUrl('mediciones', 'mediciones', 'listar');
        
        $paginado = new Paginado($mediciones, $pagina, $url);
        
        $mediciones = $paginado->getDatos();
        /*
         * Fin paginado
         */
        
        $objMediciones->cerrar();
        include_once '../view/Mediciones/mediciones/listar.html.php';
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
        $idsEquipos = $_POST['ids'];
        $equipos = array();
        $objEquipos = new EquiposModel();
        foreach ($idsEquipos as $idEquipo) {
            $sql = "SELECT equi_id, equi_nombre FROM pag_equipo WHERE equi_id = $idEquipo";
            $equipo = $objEquipos->select($sql);
            $equipos[$equipo[0]['equi_id']] = $equipo[0];
        }

        $objEquipos->cerrar();
        include_once '../view/Mediciones/mediciones/ajaxAgregarEquipo.html.php';
    }

    public function ajaxListarEquipos() {
        $objMedidores=New MedidoresModel();
        
        $equi_id = $_POST['equi_id'];
        $equi_nombre = $_POST['equi_nombre'];
        $medicion = $_POST['medicion'];
        $fecha = $_POST['fecha'];
        $tipoMedidor = $_POST['tipo_medidor'];
        $consecutivo = $_POST['consecutivo'];
        
        $sql = "Select * from pag_tipo_medidor";
                
        $medidores=$objMedidores->select($sql);
        
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
                $fecha=  getFecha();
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
