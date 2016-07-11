<?php

include_once('../lib/config/conexion.php');

class MasterModel extends Conexion{
    
    function insertar($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);
        return $respuesta;
    }
    
    function select($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);
        
        $return = array();
        
        if ($respuesta) {
            while ($row = @mysqli_fetch_array($respuesta)) {
//                if(isset($row['estado']) ){
//                    if($row['estado']==null){
//                        $return[]=$row;
//                    }
//                }else{
                    $return[]=$row;
                //}
            }
        }

        return $return;
    }
    
    function find($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);
        
        $return = false;
        if ($respuesta) {
            $return = array();
            while ($row = @mysqli_fetch_array($respuesta)) {
                $return=$row;
            }
        }

        return $return;
    }
    
    function update($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);
        return $respuesta;
    }
    
    function delete($sql){
        $respuesta = mysqli_query($this->getConn(), $sql);
        return $respuesta;
    }
}
