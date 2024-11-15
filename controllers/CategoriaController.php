<?php
require_once '../models/DataBase.php';
require_once '../models/Categoria.php';

class CategoriaController {
    private $db;
    private $categoria;

    public function __construct() {
        // Crear la conexión a la base de datos
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->categoria = new Categoria($this->db);
    }

    // Método para ver una categoría por su ID
    public function verCategoria($id) {
        // Llamar al método verCategoria() de la clase Categoria
        $this->categoria->verCategoria($id);
    }
}

//Ejecutar el metodo verCategoria
$controller = new CategoriaController();
$id_categoria = 1;  
$controller->verCategoria($id_categoria);

?>