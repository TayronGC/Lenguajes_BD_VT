<?php

class Pedido {
    $conn;
    $id_pedido;
    $id_persona;
    $fecha_pedido;
    $id_proveedor;
    $id_Estado;

    public function __construct($db) {
        $this->conn = $db;
    }
}


?>