<?php

include_once '../model/Programacion/programacionModel.php';

class ProgramacionController {
    
    
    function consultar() {
        include_once("../view/Programacion/programacion/consultar.html.php");
    }

    function consultarAjax() {
        $objProgramacion = new ProgramacionModel();

        $program = $_POST['program'];
             $sql = "SELECT pag_centro.cen_id,cen_nombre,pag_equipo.equi_id,equi_nombre,count(*) as total,pag_equipo.estado,"
                     . "pag_det_programacion.tar_id"
                     . " FROM pag_centro,pag_equipo,pag_det_programacion"
                     . " WHERE  pag_det_programacion.equi_id=pag_equipo.equi_id "
                     . "AND pag_equipo.cen_id=pag_centro.cen_id "
                     . "AND equi_nombre LIKE '%$program%' GROUP BY pag_equipo.equi_nombre"
                     . "  ORDER BY pag_equipo.equi_id ASC";



        $programaciones = $objProgramacion->select($sql);

        // Cierra la conexion
        $objProgramacion->cerrar();

        include_once("../view/Programacion/programacion/listar.html.php");
    }
    
    function crear() {
        $objProgramacion = new ProgramacionModel();
        $reg = "SELECT * FROM pag_regional";
        $regionales = $objProgramacion->select($reg);
        $cen = "SELECT  *FROM pag_centro";
        $centros = $objProgramacion->select($cen);
        
        $objProgramacion->cerrar();
        include_once '../view/Programacion/programacion/crear.html.php';
    }

    function postCrear() {
        
        //--------expresiones regulares--------------------
        $patronNumeros="/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $errores=array();
        
        if(!isset($_POST['regional']) or $_POST['regional']==""){
            $errores[]='(*) El campo "Regional" es obligatorio';
        }
        
        if(!isset($_POST['centro']) or $_POST['centro']==""){
            $errores[]='(*) El campo "Centro de Formacion" es obligatorio';
        }
        
        if(!isset($_POST['fecha']) or $_POST['fecha']==""){
            $errores[]='(*) El campo "Fecha Programacion" es obligatorio';
        }
        
        if(!isset($_POST['inicio']) or $_POST['inicio']==""){
            $errores[]='(*) El campo "Fecha Inicio Programacion" es obligatorio';
        }
        
        if(!isset($_POST['placas']) or $_POST['placas']==""){
            $errores[]='<strong>(*) Debe tener al menos una programacion</strong>';
        }else {
            $a=0;

            foreach ($_POST['placas'] as $placa) {
                
                if(isset($placa[$a]) && empty($_POST['equipos'][$a])){
                    $errores[]='<strong>(*) El "Nombre del Equipo" es obligatorio.</strong>';
                }
                
                if(isset($placa[$a]) && empty($_POST['componentes'][$a])){
                    $errores[]='(*) El campo <strong>"Componente"</strong> es obligatorio. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                if(isset($placa[$a]) && !preg_match($patronNumeros,$_POST['componentes'][$a])){
                    $errores[]='(*) El campo <strong>"Componente"</strong> debe ser numerico. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                
                if(isset($placa[$a]) && empty($_POST['tareas'][$a])){
                    $errores[]='(*) El campo <strong>"Tarea"</strong> es obligatorio. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                if(isset($placa[$a]) && !preg_match($patronNumeros,$_POST['tareas'][$a])){
                    $errores[]='(*) El campo <strong>"Tarea"</strong> debe ser numerico. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                
                if(isset($placa[$a]) && empty($_POST['tipos'][$a])){
                    $errores[]='(*) El campo <strong>"Tipo de trabajo"</strong> es obligatorio. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                if(isset($placa[$a]) && !preg_match($patronNumeros,$_POST['tipos'][$a])){
                    $errores[]='(*) El campo <strong>"Tipo de trabajo"</strong> debe ser numerico. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                
                if(isset($placa[$a]) && empty($_POST['horas'][$a])){
                    $errores[]='(*) El campo <strong>"Duracion horas"</strong> es obligatorio. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                if(isset($placa[$a]) && !preg_match($patronNumeros,$_POST['horas'][$a])){
                    $errores[]='(*) El campo <strong>"Duracion horas"</strong> debe ser numerico. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                
                if(isset($placa[$a]) && empty($_POST['frecuencias'][$a])){
                    $errores[]='(*) El campo <strong>"Frecuencia"</strong> es obligatorio. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                if(isset($placa[$a]) && !preg_match($patronNumeros,$_POST['frecuencias'][$a])){
                    $errores[]='(*) El campo <strong>"Frecuencia"</strong> debe ser numerico. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                
                if(isset($placa[$a]) && empty($_POST['medidores'][$a])){
                    $errores[]='(*) El campo <strong>"Medidor"</strong> es obligatorio. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                if(isset($placa[$a]) && !preg_match($patronNumeros,$_POST['medidores'][$a])){
                    $errores[]='(*) El campo <strong>"Medidor"</strong> debe ser numerico. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                
                if(isset($placa[$a]) && empty($_POST['prioridades'][$a])){
                    $errores[]='(*) El campo <strong>"Prioridade"</strong> es obligatorio. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
                if(isset($placa[$a]) && !preg_match($patronNumeros,$_POST['prioridades'][$a])){
                    $errores[]='(*) El campo <strong>"Prioridade"</strong> debe ser numerico. para el equipo: <strong>' .$_POST['equipos'][$a]. '</strong>';
                }
        
                $a++;
            }
        }

        if(count($errores)>0){
            setErrores($errores);
            redirect(crearUrl("programacion", "programacion", "crear"));
            //----------------fin validaciones-----------------
        }else {
            
            $placas = $_POST['placas'];
            $equipos = $_POST['equipos'];
            $componentes = $_POST['componentes'];
            $tipos = $_POST['tipos'];
            $medidores = $_POST['medidores'];
            $inicio = $_POST['inicio'];
            $horas = $_POST['horas'];
            $frecuencias = $_POST['frecuencias'];
            $prioridades = $_POST['prioridades'];
            $centro = $_POST['centro'];
            $fecha = $_POST['fecha'];
            $tareas = $_POST['tareas'];
            
            $objProgramacion = new ProgramacionModel();
            $b = 0;
            $consecutivo = array();
            $GLOBALS['co'] = $consecutivo;
            for($i=0;$i<count($tareas);$i++){
                 $ven = "select max(proequi_id) as proequi_id from pag_programacion_equipo";
                $pro = $objProgramacion->find($ven);
                 $cons = $pro['proequi_id'] + 1;
                $sql = "INSERT INTO pag_programacion_equipo (proequi_id,proequi_fecha,cen_id,proequi_fecha_inicio,tman_id,estado) "
                        . "VALUES "
                        . "($cons,"
                        . "'".$fecha."',"
                        . "$centro,"
                        . "'" . $inicio . "',"
                        . "1,"
                        . "CURRENT_DATE())";

                $programaciones = $objProgramacion->insertar($sql);

                $co[$b] = $cons;
                $b++;
            }

            //-----------------------------------------------------------------------
            $a = 0;
            foreach ($placas as $placa) {
                 $man = "select max(detprog_id) as detprog_id from pag_det_programacion";
                $prog = $objProgramacion->find($man);
                $no = $prog['detprog_id']+ 1;
                $detalle = "INSERT INTO pag_det_programacion(detprog_id,proequi_id,ttra_id,detprog_duracion_horas,"
                        . "equi_id,comp_id,priotra_id,tar_id,tmed_id,frecuencia,est_id)"
                        . "VALUES"
                        . "(" . $no . ","
                        . "" . $co[$a] . ","
                        . "" . $tipos[$a] . ","
                        . "" . $horas[$a] . ","
                         . "'".$placa."',"
                          . "'".$componentes[$a]."',"
                        . "".$prioridades[$a].","                    
                        . "".$tareas[$a].","
                        . "".$medidores[$a].","
                        . "" . $frecuencias[$a] . ","
                        . "1)";

                $deta = $objProgramacion->insertar($detalle);
                $a++;
            }

            $objProgramacion->cerrar();
            redirect(crearUrl("programacion", "programacion", "consultar"));
        }
    }
    
    function verDetalle($parametros = false) {
        $objProgramacion = new ProgramacionModel();
        
        $id = $parametros[1];
        
        $sql = "SELECT detprog_id,detprog_duracion_horas,frecuencia,pag_det_programacion.comp_id,comp_descripcion,"
                . "pag_det_programacion.tar_id,tar_nombre,pag_det_programacion.tmed_id,tmed_nombre,pag_estado.est_id,est_descripcion"
                . " FROM pag_det_programacion,pag_componente,pag_tarea,pag_tipo_medidor,pag_estado"
                . " WHERE  pag_det_programacion.comp_id=pag_componente.comp_id "
                . "AND pag_det_programacion.tar_id=pag_tarea.tar_id"
                . " AND pag_det_programacion.tmed_id=pag_tipo_medidor.tmed_id"
                . " AND pag_det_programacion.est_id=pag_estado.est_id AND equi_id ='$id'";
        
       
        $equipos= $objProgramacion->select($sql);

        $objProgramacion->cerrar();


        include_once '../view/Programacion/programacion/verDetalle.html.php';
    }
    
    function editar($parametros = false) {
        $objProgramacion = new ProgramacionModel();
        
        $id = $parametros[1];
        
        $sql = "SELECT detprog_id,detprog_duracion_horas,frecuencia,pag_det_programacion.comp_id,comp_descripcion,"
                . "pag_det_programacion.tar_id,tar_nombre,pag_det_programacion.tmed_id,tmed_nombre,pag_estado.est_id,est_descripcion"
                . " FROM pag_det_programacion,pag_componente,pag_tarea,pag_tipo_medidor,pag_estado"
                . " WHERE  pag_det_programacion.comp_id=pag_componente.comp_id "
                . "AND pag_det_programacion.tar_id=pag_tarea.tar_id"
                . " AND pag_det_programacion.tmed_id=pag_tipo_medidor.tmed_id"
                . " AND pag_det_programacion.est_id=pag_estado.est_id AND equi_id ='$id'";
        
       
        $equipos= $objProgramacion->select($sql);

        $objProgramacion->cerrar();


        include_once '../view/Programacion/programacion/editar.html.php';
    }

    function postEditar() {

        //--------expresiones regulares--------------------
        $patronNumeros="/[0-9]{1,9}(\.[0-9]{0,2})?$/";
        $errores=array();
        
        if(isset($_POST['cod'])){
            $b=0;

            foreach ($_POST['cod'] as $codigo) {
                if(isset($codigo[$b]) && empty($_POST['horas'][$b])){
                    $errores[]='(*) El campo <strong>"Duracion horas"</strong> es obligatorio. para la tarea: <strong>' .$_POST['tareas'][$b]. '</strong>';
                }
                if(isset($codigo[$b]) && !preg_match($patronNumeros,$_POST['horas'][$b])){
                    $errores[]='(*) El campo <strong>"Duracion horas"</strong> debe ser numerico. para la tarea: <strong>' .$_POST['tareas'][$b]. '</strong>';
                }
                
                if(isset($codigo[$b]) && empty($_POST['frecuencia'][$b])){
                    $errores[]='(*) El campo <strong>"Frecuencia"</strong> es obligatorio. para la tarea: <strong>' .$_POST['tareas'][$b]. '</strong>';
                }
                if(isset($codigo[$b]) && !preg_match($patronNumeros,$_POST['frecuencia'][$b])){
                    $errores[]='(*) El campo <strong>"Frecuencia"</strong> debe ser numerico. para la tarea: <strong>' .$_POST['tareas'][$b]. '</strong>';
                }
                
                $b++;
            }
        }

        if(count($errores)>0){
            setErrores($errores);
            redirect(crearUrl("programacion", "programacion", "consultar"));
            //----------------fin validaciones-----------------
        }else{
            
            $cod=$_POST['cod'];
            $horas = $_POST['horas'];
            $frecuencia = $_POST['frecuencia'];

            $objProgramacion = new ProgramacionModel();
            
                $i=0;
            
                foreach ($horas as $hora){
                    $sql = "UPDATE pag_det_programacion SET detprog_duracion_horas=$hora,frecuencia=$frecuencia[$i] WHERE detprog_id=$cod[$i]";

                   $programaciones = $objProgramacion->update($sql);
                   $i++;
                }

                if(isset($_POST['id'])){
                    $a=0;
                    $estado=$_POST['id'];
//                    dd($_POST);
                    $est=$_POST['est'];
 
                    //foreach ($estado as $id){
                    for($i=0;$i<COUNT($estado);$i++){
                        if($est[$i]==1){    
                            $des = "UPDATE pag_det_programacion SET est_id=2 WHERE detprog_id=". $estado[$i];           
                            $desactivar = $objProgramacion->update($des); 
                            $a++;
                        }elseif($est[$i]==2){
                            $des= "UPDATE pag_det_programacion SET est_id=1 WHERE detprog_id=". $estado[$i];
                            $desactivar = $objProgramacion->update($des); 
                            $a++;
                        }

                    }
                }

            $objProgramacion->cerrar();
            
            redirect(crearUrl('programacion', 'programacion', 'consultar'));
        }//else    
    }

    function listar() {
        $objProgramacion = new ProgramacionModel();
        $sql = "SELECT pag_programacion_equipo.proequi_id,equi_id,equi_nombre,"
                . "pag_programacion_equipo.estado,"
                . " FROM pag_programacion_equipo,pag_det_programacion,pag_equipo "
                . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id AND"
                . " pag_det_programacion.equi_id=pag_equipo.equi_id";

        $programaciones = $objProgramacion->select($sql);
        $objProgramacion->cerrar();

        include_once '../view/Programacion/programacion/listar.html.php';
    }

    function listarEquipo() {
        $objProgramacion = new ProgramacionModel();
        $equipo = $_POST['equipo'];
        $sql = "SELECT * FROM pag_equipo where equi_nombre LIKE '$equipo%'";
        $equipos = $objProgramacion->select($sql);
        $objProgramacion->cerrar();

        include_once '../view/Programacion/programacion/listarEquipo.html.php';
    }

    function tablas() {
        $objProgramacion = new ProgramacionModel();
        $sql=" SELECT pag_componente.comp_id,comp_descripcion from pag_equipo_componente,"
                . "pag_componente where pag_equipo_componente.comp_id=pag_componente.comp_id and equi_id='".$_POST['equipo']."' ";
            
        $componentes=$tipos = $objProgramacion->select($sql);
        $tip = "SELECT * FROM pag_tipo_trabajo";
        $tipos = $objProgramacion->select($tip);
        $med = "SELECT* FROM pag_tipo_medidor";
        $medidores = $objProgramacion->select($med);
        $prio = "SELECT* FROM pag_prioridad_trabajo";
        $prioridades = $objProgramacion->select($prio);
        $tarea = "SELECT* FROM pag_tarea";
        $tareas = $objProgramacion->select($tarea);
        $objProgramacion->cerrar();

        include_once '../view/Programacion/programacion/programacion.html.php';
    }

    function añadirFila() {
        $ti = $_POST['tipo'];
        $medi = $_POST['med'];
        $pri = $_POST['prio'];
        $tarea = $_POST['tarea'];
        $co=$_POST['com'];
        $objProgramacion = new ProgramacionModel();
         $com = "SELECT comp_id FROM pag_componente where comp_descripcion='" . $co . "'";
        $compo= $objProgramacion->find($com);
        $tip = "SELECT ttra_id FROM pag_tipo_trabajo where ttra_descripcion='" . $ti . "'";
        $tipo = $objProgramacion->find($tip);
        $med = "SELECT tmed_id FROM pag_tipo_medidor where tmed_nombre='" . $medi . "'";
        $medidores = $objProgramacion->find($med);
        $prio = "SELECT priotra_id FROM pag_prioridad_trabajo where priotra_descripcion='" . $pri . "'";
        $prioridades = $objProgramacion->find($prio);
        $tar = "SELECT tar_id FROM pag_tarea where tar_nombre='" . $tarea . "'";
        $tareas = $objProgramacion->find($tar);
        $objProgramacion->cerrar();
        include_once '../view/Programacion/programacion/fila.html.php';
    }

}
