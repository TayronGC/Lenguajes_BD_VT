<?php
require_once 'models/DataBase.php';
require_once 'models/Producto.php';
require_once "models/Item.php";

/*
require_once "../models/DataBase.php";
require_once "../models/Producto.php";
require_once "../models/Item.php";
*/

class CarritoController{
    private $db;
    private $productoModel;

    public function __construct(){
        $this->db = new Database;
        $this->db = $this->db->getConnection();
        $this->productoModel = new Producto($this->db);
    }

    public function agregarAlCarritoBoton(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $cantidad = 1;
        //$cantidad = isset($_GET['cantidad']) ? $_GET['cantidad'] : 1;  // Definir 1 como cantidad por defecto

        // Llamar al método para agregar al carrito
        if ($id) {
            echo "id: " .$id . "<br>";
            echo "Cantidida: " . $cantidad;
            $this->agregarAlCarrito($id, $cantidad);
        } else {
            // Manejar el caso donde el ID no está presente
            echo "El ID del producto no está presente en la URL.";
        }
    }


    //Funcion para agregar productos al carrito
    public function agregarAlCarrito($id,$cantidad){
        session_start();

        //Ejecutar metodo para traer un producto en especifio
        $this->productoModel->verProducto($id);

        
        if (empty($this->productoModel->id_producto) || empty($this->productoModel->nombre_producto)) {
            throw new Exception('Producto no encontrado o datos incompletos');
        }
        
        //Instanciar item e incluirle los valores del metodo de verProducto
        $item = new Item($this->productoModel->id_producto, 
        $this->productoModel->nombre_producto,
        $this->productoModel->precio_unitario);

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
        header ("Location: index.php?controller=Cliente&action=verTodosproductos");
    }

    //listar lo que tiene el carrito

    public function listarCarrito(){
        //include_once '../views/carrito.php';
        include_once 'views/carrito.php';
    }


    //eliminar
    public function eliminarProducto() {
        session_start();
        $id = isset($_GET['id']) ? $_GET['id'] : null;
    
        // Verificar si el carrito está vacío
        if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
            echo "El carrito está vacío.";
            return;
        }
    
        // Buscar el índice del producto a eliminar
        foreach ($_SESSION['carrito'] as $key => $carritoItem) {
            if ($carritoItem->id == $id) {
                if($carritoItem->cantidad > 1){
                    $carritoItem->cantidad--;
                    echo "Cantidad del producto reducida en el carrito.";
                }else{
                    unset($_SESSION['carrito'][$key]);
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar el array
                    echo "Producto eliminado del carrito.";
                }
                header ("Location: index.php?controller=Carrito&action=listarCarrito");
                return;
            }
        }
    
        echo "Producto no encontrado en el carrito.";
    }
    

    //Facturar
}
/*
$carritoController = new CarritoController();
$id = 21;
$cantidad = 1;
//$carritoController->listarCarrito();
$carritoController->agregarAlCarrito($id,$cantidad);
*/

?>