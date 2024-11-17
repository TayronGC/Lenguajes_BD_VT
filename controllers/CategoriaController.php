<?php
require_once '../models/DataBase.php';
require_once '../models/Categoria.php';

$controller = new CategoriaController();

if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
    $action = $_GET['action'];

    if (isset($_GET['id_categoria'])) {
        // Llama al método pasando el parámetro desde GET
        $controller->$action($_GET['id_categoria']);
    } else {
        // Llama al método sin parámetros
        $controller->$action();
    }
} else {
    echo "Acción no válida o método no encontrado.";
}

/*

if (isset($_GET['action']) && $_GET['action'] == 'insertarCategoria') {
    $controller->insertarCategoria();
}
*/
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
    // Llama al método de la clase `Categoria` para obtener los datos
    if ($this->categoria->verCategoria($id)) {
        echo "La categoría se mostró correctamente.";
    } else {
        echo "No se encontró la categoría con el ID: " . $id . ".";
    }
    
    //$this->categoria->verCategoria($id);
    }

    public function insertarCategoria() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->categoria->id_categoria = $_POST['id_categoria'];
            $this->categoria->nombre_categoria = $_POST['nombre_categoria'];
            $this->categoria->descripcion = $_POST['descripcion'];

            if($this->categoria->insertarCategoria()) {
                //echo "Categoria creada con exito";
                header ("Location: http://localhost/Grupo2_SC-504_VT_ProyectoFinal/views/viewCategoria.php");
            }else {
                echo "Hubo un error al crear la categoría.";
            }
    
    }
}
}

//Ejecutar el metodo verCategoria
/*
$controller = new CategoriaController();
$id_categoria = 6;  
$controller->verCategoria($id_categoria);
*/
?>