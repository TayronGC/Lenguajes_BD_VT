<?php

class AnalisisVenta {
    $conn;
    $id_Analisis;
    $id_persona;
    $id_Producto;
    $Total_ventas;
    $Frecuencia;

    public function __construct($db) {
        $this->conn = $db;
    }
}

?>