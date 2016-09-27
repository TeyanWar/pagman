<?php
class OrdenModel{
    private $host="localhost";
    private $user="root";
    private $password="sena123";
    private $database="pagman";
    private $conn;

    public function __construct() {
        $this->conectar();
    }

    public function conectar() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
    }

    public function cerrar(){
        mysqli_close($this->conn);
    }

    function getConn(){
        return $this->conn;
    }
    //------------fin conexion---------------------
    function select($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);

        $return = array();

        if ($respuesta) {
            while ($row = @mysqli_fetch_array($respuesta)) {
                if(isset($row['estado']) ){
                    if($row['estado']==null){
                        $return[]=$row;
                    }
                }else{
                    $return[]=$row;
                }
            }
        }

        return $return;
    }

    function update($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);
        return $respuesta;
    }

    function find($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);

        $return = false;
        if ($respuesta) {
            $return = array();
            while ($row = @mysqli_fetch_array($respuesta)) {
                if(isset($row['estado']) ){
                    if($row['estado']==null){
                        $return=$row;
                    }
                }else{
                    $return=$row;
                }
            }
        }

        return $return;
    }
}

    $orprog = array(2,5,1,6);

    require_once("../../lib/pdf/dompdf_config.inc.php");

    $codigoHTML='
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Documento sin título</title>
    </head>
    <body>
    <table width="100%" border="1" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE ORDENES PROGRAMADDAS</strong></CENTER></td>
      </tr>
      <tr bgcolor="red">
        <td><strong>Centro</strong></td>
        <td><strong>Equipo</strong></td>
        <td><strong>Componente</strong></td>
        <td><strong>Tipo de Trabajo</strong></td>
        <td><strong>Tarea</strong></td>
        <td><strong>Tipo Mantenimiento</strong></td>
        <td><strong>Frecuencia</strong></td>
        <td><strong>Medidor</strong></td>
      </tr>';

    //------------------------------------------------------------------
    $objOrden = new OrdenModel();
    foreach ($orprog as $v) {
        $sql = "SELECT pag_centro.cen_nombre,pag_equipo.equi_nombre,"
            . "pag_componente.comp_descripcion,pag_tipo_trabajo.ttra_descripcion,"
            . "pag_tarea.tar_nombre,pag_tipo_mantenimiento.tman_descripcion,"
            . "pag_det_programacion.frecuencia,pag_tipo_medidor.tmed_nombre "
            . "FROM pag_programacion_equipo,pag_det_programacion,pag_centro,pag_equipo,"
            . "pag_componente,pag_tipo_trabajo,pag_tarea,pag_tipo_mantenimiento,pag_tipo_medidor "
            . "WHERE pag_det_programacion.proequi_id=pag_programacion_equipo.proequi_id "
            . "AND pag_programacion_equipo.cen_id=pag_centro.cen_id "
            . "AND pag_det_programacion.equi_id=pag_equipo.equi_id "
            . "AND pag_det_programacion.comp_id=pag_componente.comp_id "
            . "AND pag_det_programacion.ttra_id=pag_tipo_trabajo.ttra_id "
            . "AND pag_det_programacion.tar_id=pag_tarea.tar_id "
            . "AND pag_programacion_equipo.tman_id=pag_tipo_mantenimiento.tman_id "
            . "AND pag_det_programacion.tmed_id=pag_tipo_medidor.tmed_id "
            . "AND pag_det_programacion.detprog_id=$v "
            . "ORDER BY pag_det_programacion.detprog_id";

        $dato = $objOrden->find($sql);

        $codigoHTML.='	
        <tr>
                <td>'.$dato['cen_nombre'].'</td>
                <td>'.$dato['equi_nombre'].'</td>
                <td>'.$dato['comp_descripcion'].'</td>
                <td>'.$dato['ttra_descripcion'].'</td>
                <td>'.$dato['tar_nombre'].'</td>
                <td>'.$dato['tman_descripcion'].'</td>
                <td>'.$dato['frecuencia'].'</td>
                <td>'.$dato['tmed_nombre'].'</td>
        </tr>';

    }
    // Cierra la conexion
    $objOrden->cerrar();
    //------------------------------------------------------------------
    $codigoHTML.='
    </table>
    </body>
    </html>';
    $codigoHTML=utf8_encode($codigoHTML);
    $dompdf=new DOMPDF();
    $dompdf->load_html($codigoHTML);
    ini_set("memory_limit","128M");
    $dompdf->render();
    $dompdf->stream("Reporte.pdf");
?>
