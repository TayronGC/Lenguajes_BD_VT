<?php

class Pedido {
    private  $conn;
    public $id_pedido;
    public $id_persona;
    public $fecha_pedido;
    public $id_proveedor;
    public $id_Estado;

    public function __construct($db) {
        $this->conn = $db;
    }
}


?>