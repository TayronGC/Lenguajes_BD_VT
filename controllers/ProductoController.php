<?php
require_once '../models/DataBase.php';
require_once '../models/Producto.php';

class ProductoController {
    private $db;
    private $producto;

    public function __construct() {
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->producto = new Producto($this->db);
    }

    public function verProducto($id) {
        $this->producto->verProducto($id);
    }

}

$productoController = new ProductoController;
$idProducto = 1;
$productoController->verProducto($idProducto);

?>