<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexion
 *
 * @author dbarona
 */
class Conexion {
    
    private $host="localhost";
    private $user="root";
    private $password="";
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
    
}
