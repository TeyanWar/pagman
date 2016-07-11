<?php

include_once('../model/Costos/costosModel.php');

class CostosController
{
    
    function consultar()
    {
        $objMantenedor= new CostosModel();
        $objEquipos= new CostosModel();
        
        $sql="select per_id,per_nombre,per_apellido from pag_persona,pag_orden_trabajo "
                . "where pag_orden_trabajo.per_id_mantenedor=pag_persona.per_id";
        
        $mantenedores=$objMantenedor->select($sql);
        
        $sql="select pag_equipo.equi_id,equi_nombre from pag_equipo,pag_orden_trabajo where pag_orden_trabajo.equi_id=pag_equipo.equi_id";
        $equipos=$objEquipos->select($sql);
        
        // Cierra la conexion
        $objMantenedor->cerrar();
        $objEquipos->cerrar();
        
        include_once("../view/Costos/costos/consultar.html.php");
        
    }

	function reporteCostos()
    {   
        $objCostos = new costosModel();
        
        $fecha_ini=$_POST['fecha_ini'];
        $fecha_fin=$_POST['fecha_fin'];
        $mantenedor=$_POST['mantenedor'];
        $equipo=$_POST['equipo'];
        
        if($fecha_ini==""){
            $fecha_inicial=" and ot_fecha between ''";
        }else{
            $fecha_inicial=" and ot_fecha between '$fecha_ini'";
        }
        if($fecha_fin==""){
            $fechaActual= FECHA_ACTUAL;
            $fecha_final=" and '$fechaActual'";
        }else{
            $fecha_final=" and '$fecha_fin'";
        }
        if($equipo==0){
            $consultaEquipo="";
        }else{
            $consultaEquipo=" and pag_orden_trabajo.equi_id=$equipo";
        }
        if($mantenedor==""){
            $consultaMantenedor="";
        }else{
            $consultaMantenedor=" and pag_orden_trabajo.per_id=$mantenedor'";
        }
        
        $sql = "SELECT pag_orden_trabajo.ot_id,pag_centro.cen_nombre,pag_orden_trabajo.ot_fecha_ini,pag_orden_trabajo.ot_fecha,pag_persona.per_nombre,pag_persona.per_apellido,pag_equipo.equi_nombre,pag_tipo_mantenimiento.tman_descripcion,pag_tipo_falla.tfa_descripcion FROM pag_orden_trabajo,pag_tipo_mantenimiento,pag_equipo,pag_persona,pag_centro,pag_tipo_falla where "
                . "pag_orden_trabajo.equi_id=pag_equipo.equi_id and pag_orden_trabajo.per_id_mantenedor=pag_persona.per_id and pag_orden_trabajo.tman_id=pag_tipo_mantenimiento.tman_id and pag_orden_trabajo.tfa_id=pag_tipo_falla.tfa_id ".$fecha_inicial.$fecha_final.$consultaEquipo.$consultaMantenedor;
        
       
        $reportes = $objCostos->select($sql);
        
        // Cierra la conexion
        $objCostos->cerrar();
        
        include_once("../view/Costos/costos/reporteCostos.html.php");
    }
    
    function crear()
    {
        include_once("../view/Equipos/equipos/crear.html.php");
    }
    
    function postCrear()
    {
        $referencia = $_POST['referencia'];
        $descripcion = $_POST['descripcion'];
        
        $insertEquipos = "INSERT INTO equipos (referencia,descripcion) VALUES('$referencia', '$descripcion')";
        
        $objEquipos = new EquiposModel();
        
        $insertar = $objEquipos->insertar($insertEquipos);
        
        // Cierra la conexion
        $objEquipos->cerrar();
        
        redirect(crearUrl("equipos", "equipos", "listar"));
    }
    
    function eliminar($parametros){
        $objEquipos = new EquiposModel();
        
        $id = $parametros[0];
        
        $sql = "SELECT * FROM equipos WHERE id=$id";
        $equipo = $objEquipos->find($sql);
        
        // Cierra la conexion
        $objEquipos->cerrar();
        
        include_once("../view/Equipos/equipos/eliminar.html.php");
    }
    
    function postEliminar(){
        
        $id = $_POST['id'];
        
        $objEquipos = new EquiposModel();
        
        $sql = "DELETE FROM equipos WHERE id=$id";
        
        $respuesta = $objEquipos->delete($sql);
        
        // Cierra la conexion
        $objEquipos->cerrar();
        
        redirect(crearUrl("equipos", "equipos", "listar"));
    }
    
}