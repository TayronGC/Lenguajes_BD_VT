<?php

class FacturaDetalle {
    $conn;

    //Contructor para establecer la conexion
    public function __construct($db) {
        $this->conn = $db;
    }
}
?>