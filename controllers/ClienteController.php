<?php
require_once 'models/DataBase.php';
require_once 'models/Producto.php';

class ClienteController{
    private $db;
    private $producto;
    private $categoria;
    private $proveedor;


    public function __construct() {
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->producto = new Producto($this->db);
        //$this->categoria = new Categoria($this->db);
        //$this->proveedor = new Proveedores($this->db);
    }


    public function verTodosproductos(){
        $productos = $this->producto->verTodosproductos();
        //$categorias = $this->categoria->verTodasCategorias();
        //$proveedores = $this->proveedor->verTodosProveedores();
        if(!empty($productos)){
            include 'views/ProductosCliente.php';
        }else{
            echo "No hay productos";
        } 
    }
}
?>