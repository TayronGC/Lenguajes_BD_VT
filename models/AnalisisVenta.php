<?php

class AnalisisVenta {
    private $conn;
    public $id_Analisis;
    public $id_persona;
    public $id_Producto;
    public $Total_ventas;
    public $Frecuencia;

    public function __construct($db) {
        $this->conn = $db;
    }
}

?>