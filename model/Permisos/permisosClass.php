<?php

include_once("../model/masterModel.php");

class PermisosClass extends MasterModel {

    public $lista;

    public function verFicheros() {
        $lista = array(); // creamos variables Null

        $directorio = opendir("../controller"); // Indicamos la ruta del directorio

        while (false !== ($elemento = readdir($directorio))) {
            if (is_dir("../controller/" . $elemento) && ($elemento != "." && $elemento != ".." && $elemento !="Sesion" && $elemento != "cargarPermisos")) {//indica si el nombre del archivo es un directorio
                $lista[] = $elemento;
            }
        }//cierre while
        return $lista;
    }

}
