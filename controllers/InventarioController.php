<?php
require_once 'models/DataBase.php';
require_once 'models/Inventario.php';

class InventarioController{
    private $db;
    private $inventario;

    public function __construct() {
        // Crear la conexión a la base de datos
        $this->db = new Database();
        $this->db = $this->db->getConnection();

        $this->inventario = new Inventario($this->db);
    }

    
    public function insertarInventario() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->inventario->cantidad = $_POST['cantidad'];
            $this->inventario->id_producto = $_POST['id_producto'];
            $this->inventario->id_sucursal = $_POST['id_sucursal'];
            

            if($this->inventario->insertarInventario()) {
                //echo "inventario creada con exito";
                header ("Location: index.php?controller=Categoria&action=verTodasCategorias");
                
            }else {
                echo "Hubo un error al crear el Inventario.";
            }
    
        }  
    }

    public function verTodosInventarios(){
        $inventarios = $this->inventario->verTodosInventarios();
        if(!empty($inventarios)){
            include 'views/AddCategoria.php';
            //var_dump($categorias); 
            //return $categorias;
        }else{
            echo "No hay Inventarios";
            //return [];
        }
        //var_dump($categorias); // Muestra el contenido de $categorias
        
    }
   

    public function inactivarinventario(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_inventario'])) {
            $this->inventario->id_inventario = $_POST['id_inventario'];

            if($this->inventario->inactivarinventario()) {
                //echo "Categoria creada con exito";
                header ("Location: index.php?controller=Categoria&action=verTodasCategorias");
                exit(); 
                //echo "<script>window.location.href = 'index.php?controller=Categoria&action=list';</script>";
            }else {
                echo "Hubo un error al inactivar el Inventario.";
            }
    
        } else{
            echo "No se recibió el ID del Inventario.";
        } 
    }

    public function modificarInventario(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_inventario'])) {
            $this->inventario->id_inventario = $_POST['id_inventario'];
            $this->inventario->cantidad = $_POST['cantidad'];
            $this->inventario->id_producto = $_POST['id_producto'];
            $this->inventario->id_sucursal = $_POST['id_sucursal'];
            $this->inventario->id_estado = $_POST['id_estado'];

            if ($this->inventario->id_estado !== '1' && $this->inventario->id_estado !== '2') {
                echo "Error: El estado proporcionado no es válido.";
                return;
            }

            if($this->inventario->modificarInventario()) {
                //echo "Categoria creada con exito";
                header ("Location: index.php?controller=Categoria&action=verTodasCategorias");
                exit(); 
                //echo "<script>window.location.href = 'index.php?controller=Categoria&action=list';</script>";
            }else {
                echo "Hubo un error al modificar el Inventario.";
            }
    
        } else{
            echo "No se recibió el ID de la del Inventario.";
        }
    }
}


?>