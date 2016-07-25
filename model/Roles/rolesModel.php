<?php
include_once('../model/masterModel.php');

class RolesModel extends MasterModel{
   
    public $rol_id= array('val'=>'');
    public $rol_nombre=array('val'=>'','min'=>3,'max'=>20);
    public $rol_descripcion=array('val'=>'','min'=>0,'max'=>100);
    public $funciones=array();
    public $estado=array('val'=>'');
    
    public function getPermisos($id_rol){
        
    }
    
}