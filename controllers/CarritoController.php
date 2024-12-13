<?php
//require_once 'models/DataBase.php';
//require_once 'models/Producto.php';

require_once "../models/DataBase.php";
require_once "../models/Producto.php";
require_once "../models/Item.php";

class CarritoController{
    private $db;
    private $productoModel;

    public function __construct(){
        $this->db = new Database;
        $this->db = $this->db->getConnection();
        $this->productoModel = new Producto($this->db);
    }


    //Funcion para agregar productos al carrito
    public function agregarAlCarrito($id,$cantidad){
        session_start();

        //Ejecutar metodo para traer un producto en especifio
        $this->productoModel->verProducto($id);

        echo "idModel: " . $this->productoModel->id_producto;
        echo "Nombre: " . $this->productoModel->nombre_producto;
        echo "id: " . $id;
        if (empty($this->productoModel->id_producto) || empty($this->productoModel->nombre_producto)) {
            throw new Exception('Producto no encontrado o datos incompletos');
        }
        
        //Instanciar item e incluirle los valores del metodo de verProducto
        $item = new Item($this->productoModel->id_producto, 
        $this->productoModel->nombre_producto , 2000);
        //$this->productoModel->precio_unitario);

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        $existe = false;
        foreach($_SESSION['carrito'] as &$carritoItem){
            if($carritoItem->id == $item->id){
                $carritoItem->cantidad += $cantidad;
                $existe = true;
                break;
            }
        }

        if(!$existe){
            $item->cantidad = $cantidad;
            $_SESSION['carrito'][] = $item;
        }
    }

    //listar lo que tiene el carrito

    public function listarCarrito(){
        include_once '../views/carrito.php';
    }


    //eliminar
    public function eliminarProducto($id) {
        session_start();
    
        // Verificar si el carrito está vacío
        if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
            echo "El carrito está vacío.";
            return;
        }
    
        // Buscar el índice del producto a eliminar
        foreach ($_SESSION['carrito'] as $key => $carritoItem) {
            if ($carritoItem->id == $id) {
                // Eliminar el producto del carrito
                unset($_SESSION['carrito'][$key]);
                $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar el array
                echo "Producto eliminado del carrito.";
                return;
            }
        }
    
        echo "Producto no encontrado en el carrito.";
    }
    

    //Facturar
}

$carritoController = new CarritoController();
$id = 21;
$cantidad = 1;
//$carritoController->listarCarrito();
$carritoController->agregarAlCarrito($id,$cantidad);


?>