<?php
require_once 'models/DataBase.php';
require_once 'models/Proveedores.php';
require_once 'models/Persona.php';

class PedidoController {
    private $db;
    private $proveedor;
    private $persona;
    

    public function __construct() {
        // Crear la conexión a la base de datos
        $this->db = new Database();
        $this->db = $this->db->getConnection();
        $this->proveedor = new Proveedores($this->db);
        $this->persona = new Persona($this->db);
    }

    public function crearPedidoPage(){
        $proveedores = $this->proveedor->verTodosProveedores();
        $personas = $this->persona->verTodasPersonas();
        include "views/CrearPedido.php";
    }
}


?>