<?php
require_once 'models/DataBase.php';
require_once 'models/Producto.php';
require_once 'models/Categoria.php';
require_once 'models/Proveedores.php';

class ProductoController {
    private $db;
    private $producto;
    private $categoria;
    private $proveedor;

    public function __construct() {
        $this->db = new Database();
        $this->db = $this->db->getConnection();
        $this->producto = new Producto($this->db);

        //Relaciones
        $this->categoria = new Categoria($this->db);
        $this->proveedor = new Proveedores($this->db);
    }

    public function verProducto($id) {
        $this->producto->verProducto($id);
    }



    public function verTodosproductos(){
        $productos = $this->producto->verTodosproductos();
        $categorias = $this->categoria->verTodasCategorias();
        $proveedores = $this->proveedor->verTodosProveedores();
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
            $this->producto->id_categoria = $_POST['categoria'];
            $this->producto->id_proveedor = $_POST['proveedor'];

            // $fechaConvertida= date('d-m-y', strtotime($this->producto->fecha_vencimiento));
            
            //$this->producto->fecha_vencimiento = $fechaConvertida;

            //echo $this->producto->nombre_producto . "<br>";
            //echo $this->producto->fecha_vencimiento . "<br>";
            //echo "fecha convertida: " . $fechaConvertida;
            

            if($this->producto->insertarProducto()) {
                //echo "Categoria creada con exito";
                header ("Location: index.php?controller=Producto&action=insertarProductospage");
                //echo "<script>window.location.href = 'index.php?controller=Producto&action=insertarProductospage';</script>";
            }else {
                echo "Hubo un error al crear el Producto.";
            }
    
        } else{
            echo "Hubo un error al crear la Producto.";
        }
    }

    public function insertarProductospage(){
        $categorias = $this->categoria->verTodasCategorias();
        $proveedores = $this->proveedor->verTodosProveedores();
        include 'views/CrearProducto.php';
    }

    public function inactivarproducto(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_producto'])) {
            $this->producto->id_producto= $_POST['id_producto'];

            if($this->producto->inactivarproducto()) {
                //echo "producto creada con exito";
                header ("Location: index.php?controller=Producto&action=verTodosproductos");
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