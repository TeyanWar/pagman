<?php

include_once '../model/Mediciones/medicionesModel.php';
include_once '../model/Personas/personasModel.php';
include_once '../model/Equipos/equiposModel.php';

class MedicionesController {
    
    public function crear(){
        
        $objEquipos = new EquiposModel();
        $sql = "SELECT * FROM pag_equipo";
        $equipos = $objEquipos->select($sql);
        $objEquipos->cerrar();
        
        $objPersona = new personasModel();
        $sql = "SELECT * FROM pag_persona";
        $personas = $objPersona->select($sql);
        $objPersona->cerrar();
        
        include_once '../view/Mediciones/mediciones/crear.html.php';
    }
    
    public function postCrear(){
        //die(print_r($_POST));
        $fechaMedicion = $_POST['fecha'];
        $medidaActual = $_POST['medidaActual'];
        $equipos = $_POST['equipos'];
        $personas = $_POST['personas'];
        $objMediciones = new MedicionesModel();
        $sql = "INSERT INTO pag_control_medidas (ctrmed_fecha, ctrmed_medida_actual, equi_id, per_id)"
                . "VALUES ('$fechaMedicion',"
                . "'$medidaActual',"
                . "'$equipos',"
                . "$personas)";
        
        //die($sql);
        $mediciones = $objMediciones->insertar($sql);
        $objMediciones->cerrar();       
        redirect(crearUrl('mediciones', 'mediciones', 'listar'));
    }
    
    public function editar($parametros=false){
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
    
    public function postEditar(){
        //die(print_r($_POST));
        $id = $_POST['id'];
        $equipo = $_POST['equipo'];
        $persona = $_POST['persona'];
        $medidaActual = $_POST['medidaActual'];
        $fechaMedicion = $_POST['fechaMedicion'];
        
        $objMediciones = new MedicionesModel();
        $sql = "UPDATE pag_control_medidas SET "
                . "ctrmed_fecha = '$fechaMedicion',"
                . "ctrmed_medida_actual = '$medidaActual',"
                . "equi_id = '$equipo',"
                . "per_id = $persona "
                . "WHERE ctrmed_id = $id";

        $mediciones = $objMediciones->update($sql);
        
        $objMediciones->cerrar();
        redirect(crearUrl('mediciones', 'mediciones', 'listar'));
    }
    
    public function listar(){
        $objMediciones = new MedicionesModel();
        $sql = "SELECT * FROM pag_control_medidas, pag_persona, pag_equipo WHERE pag_control_medidas.per_id=pag_persona.per_id AND
                pag_control_medidas.equi_id=pag_equipo.equi_id";
       
        $mediciones = $objMediciones->select($sql);
         
        $objMediciones->cerrar();
        include_once '../view/Mediciones/mediciones/listar.html.php';
    }
    
    public function eliminar($parametros){
        $objMediciones = new MedicionesModel();
        $id = $parametros[0];
        $sql = "DELETE * FROM pag_control_medidas WHERE ctrmed_id = $id";
        $mediciones = $objMediciones->delete($sql);
        $objMediciones->cerrar();
        include_once '../view/Mediciones/mediciones/listar.html.php';
    }
    
    public function postEliminar(){
        $id = $_POST['id'];
        $objMediciones = new MedicionesModel();
        $sql = "DELETE  FROM pag_control_medidas WHERE ctrmed_id = $id";
        $actores = $objMediciones->delete($sql);
        $objMediciones->cerrar();
        redirect(crearUrl('mediciones', 'mediciones', 'listar'));
    }

    public function ajaxAgregarEquipo(){
        $idsEquipos = $_POST['ids'];
        $equipos = array();
        $objEquipos = new EquiposModel();
        foreach($idsEquipos as $idEquipo){
            $sql = "SELECT equi_id, equi_nombre FROM pag_equipo WHERE equi_id = $idEquipo";
            $equipo = $objEquipos->select($sql);
            $equipos[$equipo[0]['equi_id']] = $equipo[0];
        }
        
        $objEquipos->cerrar();
        include_once '../view/Mediciones/mediciones/ajaxAgregarEquipo.html.php';
    }
    
    public function ajaxListarEquipos(){
        $equi_id = $_POST['equi_id'];
        $equi_nombre = $_POST['equi_nombre'];
        $medicion = $_POST['medicion'];
        $fecha = $_POST['fecha'];
        include_once '../view/Mediciones/mediciones/ajaxListarEquipos.html.php';
    }
    
    
    public function ajaxGuardarMedidas(){
        $medidas = $_POST['medidas'];
        $personaId = $_POST['personas'];
        $objMediciones = new MedicionesModel();
        
        foreach($medidas as $medida){
        
            $sql = "INSERT INTO pag_control_medidas (ctrmed_fecha, ctrmed_medida_actual, equi_id, per_id)"
                    . "VALUES ('$personaId',"
                    . "'$medida[equi_id]',"
                    . "'$medida[medicion]',"
                    . "'$medida[fecha]')";
            
            $objMediciones->insertar($sql);
            die($sql);
        }
        
        $objMediciones->cerrar();
        redirect(crearUrl('mediciones', 'mediciones', 'listar'));
    }
}
