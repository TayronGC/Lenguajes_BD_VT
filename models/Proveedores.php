<?php
class Proveedores {
    private $conn;
    private $table_name = "proveedores"

    public $id_Provedor;
    public $nombre;
    public $apellido;
    public $ciudad;
    public $telefono;
    public $id_estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    //Resto de codigo con procedimientos
}
?>