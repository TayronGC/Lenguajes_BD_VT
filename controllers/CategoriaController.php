<?php
//require_once '../models/DataBase.php';
//require_once '../models/Categoria.php';

require_once 'models/DataBase.php';
require_once 'models/Categoria.php';

//$controller = new CategoriaController();

/*
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
*/
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
            $this->categoria->nombre_categoria = $_POST['nombre_categoria'];
            $this->categoria->descripcion = $_POST['descripcion'];

            if($this->categoria->insertarCategoria()) {
                //echo "Categoria creada con exito";
                header ("Location: index.php?controller=Categoria&action=verTodasCategorias");
                //echo "<script>window.location.href = 'index.php?controller=Categoria&action=list';</script>";
            }else {
                echo "Hubo un error al crear la categoría.";
            }
    
        }  
    }

    public function verTodasCategorias(){
        $categorias = $this->categoria->verTodasCategorias();
        if(!empty($categorias)){
            include 'views/AddCategoria.php';
            //var_dump($categorias); // Muestra el contenido de $categorias
            //return $categorias;
        }else{
            echo "No hay categorias";
            //return [];
        }
        //var_dump($categorias); // Muestra el contenido de $categorias
        
    }

    public function inactivarCategoria(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_categoria'])) {
            $this->categoria->id_categoria = $_POST['id_categoria'];

            if($this->categoria->inactivarCategoria()) {
                //echo "Categoria creada con exito";
                header ("Location: index.php?controller=Categoria&action=verTodasCategorias");
                exit(); 
                //echo "<script>window.location.href = 'index.php?controller=Categoria&action=list';</script>";
            }else {
                echo "Hubo un error al inactivar la categoría.";
            }
    
        } else{
            echo "No se recibió el ID de la categoría.";
        } 
    }


    public function modificarCategoria(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_categoria'])) {
            $this->categoria->id_categoria = $_POST['id_categoria'];
            $this->categoria->nombre_categoria = $_POST['nombre_categoria'];
            $this->categoria->descripcion = $_POST['descripcion'];
            $this->categoria->id_estado = $_POST['id_estado'];

            if ($this->categoria->id_estado !== '1' && $this->categoria->id_estado !== '2') {
                echo "Error: El estado proporcionado no es válido.";
                return;
            }

            if($this->categoria->modificarCategoria()) {
                //echo "Categoria creada con exito";
                header ("Location: index.php?controller=Categoria&action=verTodasCategorias");
                exit(); 
                //echo "<script>window.location.href = 'index.php?controller=Categoria&action=list';</script>";
            }else {
                echo "Hubo un error al modificar la categoría.";
            }
    
        } else{
            echo "No se recibió el ID de la categoría.";
        }
    }
}



//Ejecutar el metodo verCategoria

//$controller = new CategoriaController();
//$id_categoria = 6;  
//$controller->verTodasCategorias();


?>