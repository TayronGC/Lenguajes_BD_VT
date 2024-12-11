<?php
require_once 'models/DataBase.php';
require_once 'models/Producto.php';

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



    public function verTodosproductos(){
        $productos = $this->producto->verTodosproductos();
        if(!empty($productos)){
            include 'views/ViewAllProductosAdmin.php';
            //var_dump($productos); // Muestra el contenido de $productos
            //return $productos;
        }else{
            echo "No hay productos";
            //return [];
        }
        //var_dump($productos); // Muestra el contenido de $productos
        
    }


    //insertar 

    public function insertarProducto() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->producto->nombre_producto= $_POST['nombreProducto'];
            $this->producto->descripcion = $_POST['descripcion'];
            $this->producto->precio_unitario = $_POST['precioUnitario'];
            $this->producto->fecha_vencimiento = $_POST['fechaVencimiento'];
            

            if($this->producto->insertarProducto()) {
                echo "Categoria creada con exito";
                //header ("Location: index.php?controller=Categoria&action=verTodosProductos");
                //echo "<script>window.location.href = 'index.php?controller=Categoria&action=list';</script>";
            }else {
                echo "Hubo un error al crear la categoría.";
            }
    
        } else{
            echo "Hubo un error al crear la Producto.";
        }
    }

    public function insertarProductospage(){
        include 'views/CrearProducto.php';
    }

    public function inactivarproducto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_producto'])) {
            $this->producto->id_producto= $_POST['id_producto'];

            if($this->producto->inactivarproducto()) {
                //echo "producto creada con exito";
                header ("Location: index.php?controller=producto&action=verTodasproductos");
                exit(); 
                //echo "<script>window.location.href = 'index.php?controller=producto&action=list';</script>";
            }else {
                echo "Hubo un error al inactivar la categoría.";
            }
    
        } else{
            echo "No se recibió el ID de la categoría.";
        } 
    }

}

//$productoController = new ProductoController;
//$idProducto = 1;
//$productoController->verProducto($idProducto);




?>